<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

class FW_Extension_ThemeFuse_Update extends FW_Extension {

	/**
	 * Transient ID, the length must be 40 characters or less
	 * @var string
	 */
	private $items_details_transient_id = 'fw_ext_themefuse_update';

	/**
	 * How long to cache server responses
	 * @var int seconds
	 */
	private $transient_expiration = DAY_IN_SECONDS;

	private $api_timeout = 300;

	private $licence_key_option_name = 'theme_licence_key';

	/**
	 * URL to the marketplace api,
	 * @var string
	 */
	private $store_api_url = 'http://updates.themefuse.com/';

	public function _filter_pre_set_site_transient_update_themes( $updates ) {

		if ( isset( $updates->checked ) ) {
			/* @var WP_Theme $current */
			$current   = wp_get_theme();
			$current   = ( $current->parent() ) ? $current->parent() : $current;
			$new_theme = $this->retrieve_theme_update_details( $current );
			if ( ! empty( $new_theme ) ) {
				//remove all persistent-notices
				fw_set_db_extension_data( $this->get_name(), 'persistent-notices', array() );
				$update                                          = array(
					"url"         => $new_theme['url'],
					"new_version" => $new_theme['version'],
					"package"     => $new_theme['zip_url']
				);
				$updates->response[ $current->get_stylesheet() ] = $update;
			}

		}

		return $updates;
	}

	/**
	 * @param $theme WP_Theme
	 *
	 * @return array|bool|mixed
	 */
	private function retrieve_theme_update_details( $theme ) {
		global $wp_version, $wpdb;
		add_filter( "http_request_args", array( $this, "_filter_http_timeout" ), 10, 1 );
		$response = wp_remote_post( $this->store_api_url, array(
			'body' => array(
				'theme_name'    => fw()->theme->manifest->get_name(),
				'prefix'        => fw()->theme->manifest->get_id(),
				'theme_version' => $theme->get('Version'),
				'request_type'  => 'update',
				'wp_version'    => $wp_version,
				'php_version'   => phpversion(),
				'mysql_version' => $wpdb->db_version(),
				'uri'           => esc_url( home_url('/') ),
				'locale'        => get_locale(),
				'is_multi'      => (int) is_multisite(),
				'is_child'      => (int) is_child_theme(),
				// todo: temporary is disabled the licence key
				/*'licence_key'   => fw_get_db_settings_option( apply_filters( 'fw_ext_themefuse_update_licence_key_option_name', $this->licence_key_option_name ), '' ),*/
				'email_notices' => fw_get_db_extension_data( $this->get_name(), 'email_notices', array() ),
				'domain'        => (!empty($_SERVER['HTTP_HOST'])) ? $_SERVER['HTTP_HOST'] : $_SERVER['SERVER_NAME'],
				'skin'          => fw()->theme->manifest->get( 'skin' )
			)
		) );
		remove_filter( "http_request_args", array( $this, "_filter_http_timeout" ) );

		$response_body = wp_remote_retrieve_body( $response );

		if ( ( $response_code = intval( wp_remote_retrieve_response_code( $response ) ) ) !== 200 ) {
			FW_Flash_Messages::add(
				'fw_ext_update_theme_request_failed',
				esc_html__( 'An error occurred, please try again later. ', 'the-core' ),
				'error'
			);

			return false;
		}

		$response = json_decode( $response_body, true );
		if ( ! empty( $response['actions'] ) ) {
			foreach($response['actions'] as $action){
				$id = $action['id'];
				switch ( $action['type'] ) {
					case 'show-persistent-notice':
						$stored_noticed = fw_get_db_extension_data( $this->get_name(), 'persistent-notices', array() );
						if ( ! empty( $action['data']['force_show'] ) || empty( $stored_noticed[$id]['dismissed'] ) ) {
							$stored_noticed[ $id ]['dismissed'] = false;
							$stored_noticed[ $id ]['data']      = $action['data'];
						}
						fw_set_db_extension_data( $this->get_name(), 'persistent-notices', $stored_noticed );
						break;
					case 'show-fw-flash-message' :
							FW_Flash_Messages::add(
								$id,
								$action['data']['message'],
								$action['data']['type']
							);
						break;
					default:
						break;
				}
			}
			return false;
		}

		if ( isset( $response[0] ) ) {
			$new_theme = $response[0];
		}

		if ( ! empty( $new_theme['error'] ) ) {
			FW_Flash_Messages::add(
				'fw_ext_update_theme_error',
				$new_theme['error'],
				'error'
			);
		}

		return ( ! empty( $new_theme ) ) ? $new_theme : false;

	}

	/**
	 *  increase timeout for api request
	 *
	 * @param $request
	 *
	 * @return mixed
	 */
	public function _filter_http_timeout( $request ) {
		$request["timeout"] = $this->api_timeout;

		return $request;
	}

	/**
	 * @internal
	 */
	protected function _init() {

		if ( ! current_user_can( 'update_themes' ) ) {
			return;
		}

		$this->add_filters();
		$this->add_actions();
	}

	private function add_filters() {
		add_filter( 'pre_set_site_transient_update_themes', array(
			$this,
			'_filter_pre_set_site_transient_update_themes'
		) );
	}

	private function add_actions() {
		add_action( 'admin_notices', array( $this, '_action_admin_notices' ) );
		add_action( 'wp_ajax_fw_ext_themefuse_update_dismiss_notice', array(
			$this,
			'_action_wp_ajax_fw_ext_themefuse_update_dismiss_notice'
		) );
		add_action( 'admin_enqueue_scripts', array( $this, '_action_admin_enqueue_scripts' ) );
		add_action( 'fw_settings_form_saved', array( $this, '_action_remove_notice_invalid_licence_key_if_exists' ) );
	}

	public function _action_remove_notice_invalid_licence_key_if_exists() {
		$notices = fw_get_db_extension_data( $this->get_name(), 'persistent-notices', array() );
		if ( ! empty( $notices['invalid-licence-key'] ) && empty( $notices['invalid-licence-key']['dismissed'] ) ) {
			$notices['invalid-licence-key']['dismissed'] = true;
			fw_set_db_extension_data( $this->get_name(), 'persistent-notices', $notices );
		}
	}

	public function _action_admin_enqueue_scripts() {
		wp_enqueue_script(
			'fw-extension-' . $this->get_name() . '-scripts',
			$this->get_uri( '/static/js/scripts.js' ),
			array( 'jquery' ),
			$this->manifest->get_version()
		);
	}

	/*
	 * Type of notices: info, error, success, warning
	 */
	public function _action_admin_notices() {
		// todo: temporary is disabled the licence key
		/*$notices = fw_get_db_extension_data( $this->get_name(), 'persistent-notices', array() );

		$update_licence_key = fw_get_db_settings_option( apply_filters( 'fw_ext_themefuse_update_licence_key_option_name', $this->licence_key_option_name ), false );
		{ //Notification of the need to add a license key to receive updates.

			if ( empty( $update_licence_key ) ) {
				$notices['need_licence_key'] = array(
					'dismissed' => ! empty( $notices['need_licence_key']['dismissed'] ),
					'data'      => array(
						'message' => '<strong>' . sprintf( esc_html__( 'It needs to fill Licence key field from <a href="%s">Theme Settings</a> page, that you received by email so you can receive updates.', 'the-core' ), admin_url( 'themes.php?page=fw-settings' ) ) . '</strong>',
						'type'    => 'warning'
					)
				);
			} elseif ( ! empty( $notices['need_licence_key'] ) && $notices['need_licence_key']['dismissed'] !== true ) {
				unset( $notices['need_licence_key'] );
			}
		}

		foreach ( $notices as $id => $notice ) {
			if ( $notice['dismissed'] ) {
				continue;
			}
			echo '<div id="' . $id . '" data-source="fw-themefuse-update" class="notice notice-' . $notice['data']['type'] . ' is-dismissible"><p>' . $notice['data']['message'] . '</p></div>';
		}

		fw_set_db_extension_data( $this->get_name(), 'persistent-notices', $notices );*/
	}


	public function _action_wp_ajax_fw_ext_themefuse_update_dismiss_notice() {
		if ( ! current_user_can( 'update_themes' ) || empty( $_POST['notice_id'] ) ) {
			die( '0' );
		}

		$id = $_POST['notice_id'];

		$notices = fw_get_db_extension_data( $this->get_name(), 'persistent-notices', array() );

		if ( in_array( $id, array_keys( $notices ) ) ) {
			$notices[ $id ]['dismissed'] = true;
			//No need to store message in database
			unset( $notices[ $id ]['data']['message'] );
		}
		fw_set_db_extension_data( $this->get_name(), 'persistent-notices', $notices );
		wp_send_json_success( $notices );
	}
}
