<?php if ( ! defined( 'ABSPATH' ) ) {
    die( 'Direct access forbidden.' );
}

class Widget_Fw_Flickr extends WP_Widget {

	function __construct() {
		$widget_ops = array( 'description' => esc_html__( 'Flickr widget', 'the-core' ) );
		parent::__construct( false, esc_html__( 'Flickr - TF', 'the-core' ), $widget_ops );
	}

	function widget( $args, $instance ) {
		extract( $args );
		$params = array();

		foreach ( $instance as $key => $value ) {
			$params[ $key ] = $value;
		}

		$title = '';
		if ( ! empty( $instance['title'] ) ) {
			$title = $before_title . apply_filters( 'widget_title', $instance['title'] ) . $after_title;
		}

		unset( $params['title'] );

		wp_enqueue_script(
			'fw-theme-flickr-widget',
			get_template_directory_uri() . '/theme-includes/widgets/fw-flickr/static/js/scripts.js',
			array( 'jquery', 'imagesloaded' ),
			'1.0'
		);

		$filepath = get_template_directory() . '/theme-includes/widgets/fw-flickr/views/widget.php';

		$data = array(
			'instance'      => $params,
			'title'         => $title,
			'before_widget' => str_replace( 'class="widget ', 'class="widget fw-widget-flickr ', $before_widget ),
			'after_widget'  => $after_widget,
		);

		echo the_core_render_view( $filepath, $data );
	}

	function update( $new_instance, $old_instance ) {
		$instance             = wp_parse_args( (array) $new_instance, $old_instance );
		$instance['album_id'] = !empty( $new_instance['album_id'] ) ? $new_instance['album_id'] : '';

		return $instance;
	}

	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 'api_key' => '', 'album_id ' => '', 'number' => '', 'title' => '' ) );
		$api_link = 'https://www.flickr.com/services/api/misc.api_keys.html';
		$album_link = 'https://weblizar.com/get-flickr-album-id/';
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'the-core' ); ?> </label>
			<input type="text" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"/>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'api_key' ) ); ?>"><?php esc_html_e( 'API KEY', 'the-core' ); ?> (<a href="<?php echo esc_url($api_link); ?>" target="_blank"><?php esc_html_e('API KEY', 'the-core'); ?></a>):</label>
			<input type="text" name="<?php echo esc_attr( $this->get_field_name( 'api_key' ) ); ?>" value="<?php echo esc_attr( $instance['api_key'] ); ?>" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'api_key' ) ); ?>"/>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'album_id' ) ); ?>"><?php esc_html_e( 'Album ID', 'the-core' ); ?> (<a href="<?php echo esc_url($album_link); ?>" target="_blank"><?php esc_html_e('Album ID', 'the-core'); ?></a>):</label>
			<input type="text" name="<?php echo esc_attr( $this->get_field_name( 'album_id' ) ); ?>" value="<?php echo @esc_attr( $instance['album_id'] ); ?>" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'album_id' ) ); ?>"/>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>"><?php esc_html_e( 'Number of photos', 'the-core' ); ?>:</label>
			<input type="text" name="<?php echo esc_attr( $this->get_field_name( 'number' ) ); ?>" value="<?php echo esc_attr( $instance['number'] ); ?>" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>"/>
		</p>
	<?php
	}
}