<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}


class Widget_Fw_Facebook_Page_Stream extends WP_Widget {

	/**
	 * @internal
	 */
	function __construct() {
		$widget_ops = array( 'description' => esc_html__( 'Facebook Page Steam', 'the-core' ) );
		parent::__construct( false, esc_html__( 'Facebook - TF', 'the-core' ), $widget_ops );
	}

	/**
	 * @param array $args
	 * @param array $instance
	 */
	function widget( $args, $instance ) {
		extract( $args );

		$page_id = isset( $instance['page_id'] ) ? esc_attr( $instance['page_id'] ) : null;

		if ( empty( $page_id ) ) {
			return;
		}

		$display_date  = isset( $instance['display_date'] ) ? esc_attr( $instance['display_date'] ) : '';
		$follow_button = isset( $instance['follow_button'] ) ? esc_attr( $instance['follow_button'] ) : '';
		$number        = ( isset( $instance['number'] ) && (int) ( esc_attr( $instance['number'] ) ) > 0 )
			? esc_attr( $instance['number'] )
			: 5;
		$before_widget = str_replace( 'class="widget ', 'class="widget fw-widget-facebook ', $before_widget );

		$title = '';
		if ( ! empty( $instance['title'] ) ) {
			$title = $before_title . apply_filters( 'widget_title', $instance['title'] ) . $after_title;
		}

		// get result from transient
		$result = get_site_transient( 'fw_theme_facebook_posts_' . $page_id . '_' . $number );

		// if result from transient is empty make a request to facebook API
		if ( empty( $result ) || isset( $result->errors ) ) {
			$result = fw_ext_social_facebook_graph_api_explorer( 'GET',
				$page_id,
				array( 'fields' => 'posts.limit(' . $number . '){message,created_time}' ) );

			$result = json_decode( $result );
			if ( ! isset( $result->errors ) && ! isset( $result->error ) ) {
				set_site_transient( 'fw_theme_facebook_posts_' . $page_id . '_' . $number, $result, 1 * HOUR_IN_SECONDS );
			}
		}
		else {
			// decode from existing transient
			if ( ! is_object($result) ) {
				$result = json_decode( $result );
			}
		}

		if ( ! empty( $result->posts->data ) ) {
			$posts     = $result->posts->data;
			$view_path = get_template_directory() . '/theme-includes/widgets/fw-facebook-page-stream/views/widget.php';
			echo the_core_render_view( $view_path,
				compact( 'before_widget',
					'title',
					'posts',
					'number',
					'after_widget',
					'display_date',
					'follow_button',
					'page_id' ) );
		}
	}

	function update( $new_instance, $old_instance ) {
		$instance                 = wp_parse_args( (array) $new_instance, $old_instance );
		$instance['display_date'] = isset( $new_instance['display_date'] );

		return $new_instance;
	}

	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance,
			array(
				'title'         => '',
				'page_id'       => '',
				'number'        => '',
				'follow_button' => ''
			) );
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:',
					'the-core' ); ?> </label>
			<input type="text" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>"
			       value="<?php echo esc_attr( $instance['title'] ); ?>" class="widefat"
			       id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"/>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'page_id' ) ); ?>"><?php esc_html_e( 'Page Link:',
					'the-core' ); ?> </label>
			<input type="text" name="<?php echo esc_attr( $this->get_field_name( 'page_id' ) ); ?>"
			       value="<?php echo esc_attr( $instance['page_id'] ); ?>" class="widefat"
			       id="<?php echo esc_attr( $this->get_field_id( 'page_id' ) ); ?>"/>
		</p>
		<p>
			<label
				for="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>"><?php esc_html_e( 'Number of Posts:',
					'the-core' ); ?></label>
			<input type="text" name="<?php echo esc_attr( $this->get_field_name( 'number' ) ); ?>"
			       value="<?php echo esc_attr( $instance['number'] ); ?>" class="widefat"
			       id="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>"/>
		</p>
		<p>
			<label
				for="<?php echo esc_attr( $this->get_field_id( 'follow_button' ) ); ?>"><?php esc_html_e( 'Follow Button Title:',
					'the-core' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'follow_button' ) ); ?>"
			       name="<?php echo esc_attr( $this->get_field_name( 'follow_button' ) ); ?>" type="text"
			       value="<?php echo esc_attr( $instance['follow_button'] ); ?>"/>
		</p>
		<p>
			<input id="<?php echo esc_attr( $this->get_field_id( 'display_date' ) ); ?>"
			       name="<?php echo esc_attr( $this->get_field_name( 'display_date' ) ); ?>"
			       type="checkbox" <?php checked( isset( $instance['display_date'] ) && $instance['display_date'] != '' ? 1 : 0 ); ?> />
			<label
				for="<?php echo esc_attr( $this->get_field_id( 'display_date' ) ); ?>"><?php esc_html_e( 'Display Date?',
					'the-core' ); ?></label>
		</p>
		<?php
	}
}