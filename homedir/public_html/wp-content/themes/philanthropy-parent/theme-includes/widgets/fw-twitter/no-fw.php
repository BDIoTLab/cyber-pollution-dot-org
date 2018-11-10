<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}

class Widget_Fw_Twitter extends WP_Widget {
	function __construct() {
		$widget_ops = array( 'description' => 'Twitter Feed' );
		parent::__construct( false, esc_html__( 'Twitter - TF', 'the-core' ), $widget_ops );
	}

	function form( $instance ) {
		if ( ! function_exists( 'curl_exec' ) ) {
			echo '<p>';
			esc_html_e( 'Please enable the curl on your web server.', 'the-core' );
			echo '</p>';
		}
	}

	function widget( $args, $instance ) {

	}
}