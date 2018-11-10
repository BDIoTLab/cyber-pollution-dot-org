<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}

class Widget_Fw_Twitter extends WP_Widget {

	/**
	 * @internal
	 */
	function __construct() {
		$widget_ops = array( 'description' => 'Twitter Feed' );
		parent::__construct( false, esc_html__( 'Twitter - TF', 'the-core' ), $widget_ops );
	}

	/**
	 * @param array $args
	 * @param array $instance
	 */
	function widget( $args, $instance ) {
		extract( $args );
		$params = array();

		foreach ( $instance as $key => $value ) {
			$params[ $key ] = $value;
		}

		$user          = esc_attr( $instance['user'] );
		$number        = ( (int) ( esc_attr( $instance['number'] ) ) > 0 ) ? esc_attr( $instance['number'] ) : 5;
		$before_widget = str_replace( 'class="widget ', 'class="widget fw-widget-twitter ', $before_widget );

		$title = '';
		if ( ! empty( $instance['title'] ) ) {
			$title = $before_title . apply_filters( 'widget_title', $instance['title'] ) . $after_title;
		}

		unset( $params['title'] );

		$tweets = get_site_transient( 'fw_theme_tweets_' . $user . '_' . $number );

		if ( empty( $tweets ) || isset( $tweets->errors ) ) {
			/* @var $connection TwitterOAuth */
			$connection = fw_ext_social_twitter_get_connection();
			$tweets     = $connection->get( "https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=" . $user . "&count=" . $number );
			if ( ! isset( $tweets->errors ) ) {
				set_site_transient( 'fw_theme_tweets_' . $user . '_' . $number, $tweets, 12 * HOUR_IN_SECONDS );
			}
		}

		$filepath = get_template_directory() . '/theme-includes/widgets/fw-twitter/views/widget.php';

		$data = array(
			'instance'      => $params,
			'tweets'        => $tweets,
			'title'         => $title,
			'before_widget' => str_replace( 'class="widget ', 'class="widget fw-widget-twitter ', $before_widget ),
			'after_widget'  => $after_widget,
		);

		echo the_core_render_view( $filepath, $data );
	}

	function update( $new_instance, $old_instance ) {
		$instance                 = wp_parse_args( (array) $new_instance, $old_instance );
		$instance['display_logo'] = isset( $new_instance['display_logo'] );
		$instance['display_date'] = isset( $new_instance['display_date'] );

		return $new_instance;
	}

	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance,
			array(
				'title'         => '',
				'user'          => '',
				'number'        => '',
				'display_logo'  => '',
				'display_date'  => '',
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
			<label for="<?php echo esc_attr( $this->get_field_id( 'user' ) ); ?>"><?php esc_html_e( 'User:',
					'the-core' ); ?> </label>
			<input type="text" name="<?php echo esc_attr( $this->get_field_name( 'user' ) ); ?>"
			       value="<?php echo esc_attr( $instance['user'] ); ?>" class="widefat"
			       id="<?php echo esc_attr( $this->get_field_id( 'user' ) ); ?>"/>
		</p>
		<p>
			<label
				for="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>"><?php esc_html_e( 'Number of Tweets:',
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
			<input id="<?php echo esc_attr( $this->get_field_id( 'display_logo' ) ); ?>"
			       name="<?php echo esc_attr( $this->get_field_name( 'display_logo' ) ); ?>"
			       type="checkbox" <?php checked( isset( $instance['display_logo'] ) && $instance['display_logo'] != '' ? 1 : 0 ); ?> />
			<label
				for="<?php echo esc_attr( $this->get_field_id( 'display_logo' ) ); ?>"><?php esc_html_e( 'Display Logo?',
					'the-core' ); ?></label>
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