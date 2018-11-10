<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}

/* Please don't rewrite this file in child theme */

function the_core_get_the_theme_id() {
	return 'philanthropy';
}


function the_core_get_the_theme_name() {
	return esc_html__( 'Philanthropy', 'the-core' );
}


if ( ! function_exists( 'the_core_style_file_name' ) ) :
	/**
	 * Return the file name for file that is generated with all theme styles
	 *
	 * @return string
	 */
	function the_core_style_file_name() {
		return apply_filters( '_filter_the_core_style_file_name', 'the-core-style' );
	}
endif;


function the_core_get_the_theme_required_plugins() {
	return array(
		array(
			'name' => esc_html__( 'Brizy - Page Builder', 'the-core' ),
			'slug' => 'brizy',
		),
	);
}


function the_core_theme_has_demo_content() {
	return apply_filters( 'filter_the_core_theme_has_demo_content', true );
}


/**
 * @param FW_Ext_Backups_Demo[] $demos
 *
 * @return FW_Ext_Backups_Demo[]
 */
function _the_core_filter_fw_ext_backups_demos( $demos ) {
	if ( is_rtl() ) {
		$demos_array = array(
			'philanthropy-rtl' => array(
				'title'        => esc_html__( 'Philanthropy', 'the-core' ),
				'screenshot'   => 'http://updates.themefuse.com/demos/screenshots/philanthropy-rtl.png',
				'preview_link' => 'https://demo.themefuse.com/he/philanthropy/',
			),
		);
	} else {
		$demos_array = array(
			'philanthropy' => array(
				'title'        => esc_html__( 'Philanthropy', 'the-core' ),
				'screenshot'   => 'http://updates.themefuse.com/demos/screenshots/philanthropy.png',
				'preview_link' => 'https://demo.themefuse.com/philanthropy/',
			),
		);
	}

	foreach ( $demos_array as $id => $data ) {
		$demo = new FW_Ext_Backups_Demo( $id, 'piecemeal', array(
			'url'     => 'http://updates.themefuse.com/demos/',
			'file_id' => $id,
		) );
		$demo->set_title( $data['title'] );
		$demo->set_screenshot( $data['screenshot'] );
		$demo->set_preview_link( $data['preview_link'] );

		$demos[ $demo->get_id() ] = $demo;

		unset( $demo );
	}

	return $demos;
}

add_filter( 'fw:ext:backups-demo:demos', '_the_core_filter_fw_ext_backups_demos' );


function the_core_get_the_demo_required_plugins() {
	return array(
		'philanthropy' => array(
			array(
				'name' => 'Give - WordPress Donation Plugin',
				'slug' => 'give'
			),
		),
	);
}


function the_core_tgm_required_plugins() {
	return array(
		array(
			'name'     => esc_html__( 'Unyson', 'the-core' ),
			'slug'     => 'unyson',
			'required' => true,
		),
		array(
			'name' => esc_html__( 'Give - WordPress Donation Plugin', 'the-core' ),
			'slug' => 'give'
		),
		array(
			'name' => esc_html__( 'Brizy - Page Builder', 'the-core' ),
			'slug' => 'brizy',
		),
	);
}


// recommend Brizy plugin
add_action( 'admin_init', 'the_core_install_recommended_plugins' );
function the_core_install_recommended_plugins() {
	global $pagenow;
	if ( is_admin() && 'themes.php' == $pagenow ) {
		return;
	}

	if ( get_option( 'the_core_brizy_installed', false ) ) {
		return;
	}

	$custom_plugin = new The_Core_Ext_Download_Source_Custom();
	$custom_plugin->download(
		array(
			'plugin' => 'brizy/brizy.php',
			'remote' => 'https://downloads.wordpress.org/plugin/brizy'
		)
	);

	update_option( 'the_core_brizy_installed', true );
}


class The_Core_Ext_Download_Source_Custom {
	/**
	 * @param array $set
	 *
	 * @return WP_Error|bool
	 */
	public function download( array $set ) {
		$set['tag'] = $this->get_version( $set );

		if ( is_wp_error( $set['tag'] ) ) {
			return $set['tag'];
		}

		return $this->install_plugin( $set, $set['remote'] );
	}

	public function get_version( $set ) {
		if ( ! function_exists( 'plugins_api' ) ) {
			include ABSPATH . 'wp-admin/includes/plugin-install.php';
		}

		$wp_org = plugins_api(
			'plugin_information',
			array(
				'slug'   => 'brizy',
				'fields' => array(
					'downloaded'        => false,
					'versions'          => false,
					'reviews'           => false,
					'banners'           => false,
					'icons'             => false,
					'rating'            => false,
					'active_installs'   => false,
					'group'             => false,
					'contributors'      => false,
					'description'       => false,
					'short_description' => false,
					'donate_link'       => false,
					'tags'              => false,
					'sections'          => false,
					'homepage'          => false,
					'added'             => false,
					'last_updated'      => false,
					'compatibility'     => false,
					'tested'            => false,
					'requires'          => false,
					'downloadlink'      => true,
				)
			)
		);

		if ( is_wp_error( $wp_org ) ) {
			return new WP_Error( sprintf( __( 'Cannot get latest versions for extension: %s', 'fw' ), $set['extension_title'] ) );
		}

		return $wp_org->version;
	}

	public function install_plugin( $set ) {

		if ( ! function_exists( 'is_plugin_active' ) ) {
			include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
		}

		$installed = get_plugins();
		if ( is_plugin_active( $set['plugin'] ) || isset( $installed[ $set['plugin'] ] ) ) {
			return '';
		}

		if ( ! class_exists( 'Plugin_Upgrader', false ) ) {
			require_once ABSPATH . 'wp-admin/includes/class-wp-upgrader.php';
		}

		$upgrader = new Plugin_Upgrader( new Automatic_Upgrader_Skin() );

		$install = $upgrader->install( esc_url( "{$set['remote']}.{$set['tag']}.zip" ) );

		if ( ! $install || is_wp_error( $install ) ) {
			return new WP_Error( sprintf( __( 'Cannot install plugin: %s', 'fw' ), $set['extension_title'] ) );
		}

		if ( ! ( $installed = get_plugins() ) || ! isset( $installed[ $set['plugin'] ] ) ) {
			return new WP_Error( sprintf( __( 'Cannot find plugin: %s', 'fw' ), $set['extension_title'] ) );
		}

		$cache_plugins                       = ( $c = wp_cache_get( 'plugins', 'plugins' ) ) && ! empty( $c ) ? $c : array();
		$cache_plugins[''][ $set['plugin'] ] = $installed[ $set['plugin'] ];
		wp_cache_set( 'plugins', $cache_plugins, 'plugins' );

		return activate_plugin( $set['plugin'] );
	}
}


