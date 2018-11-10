<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

/** @var FW_Extension_Shortcodes $shortcodes */

$shortcodes       = fw_ext( 'shortcodes' );
$shortcode        = $shortcodes->get_shortcode( 'fw_external_booking' );
$the_core_version = fw()->theme->manifest->get_version();

wp_enqueue_style(
	'datetimepicker',
	$shortcode->locate_URI( '/static/css/jquery.datetimepicker.css' ),
	array(),
	$the_core_version
);

wp_enqueue_script(
	'datetimepicker',
	$shortcode->locate_URI( '/static/js/jquery.datetimepicker.js' ),
	array( 'jquery' ),
	$the_core_version,
	true
);

wp_enqueue_script(
	'fw-external-booking-script',
	$shortcode->locate_URI( '/static/js/script.js' ),
	array( 'jquery', 'datetimepicker' ),
	$the_core_version,
	true
);