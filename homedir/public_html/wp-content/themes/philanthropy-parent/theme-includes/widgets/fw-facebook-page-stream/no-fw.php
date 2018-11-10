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
}