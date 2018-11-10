<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

if ( $atts['id'] == '0' ) {
	return;
}

$the_core_shortcode_params = '';
$the_core_shortcode_params .= ' id="' . $atts['id'] . '"';
$the_core_shortcode_params .= ' title="' . $atts['title'] . '"';
$the_core_shortcode_params .= ' description="' . $atts['description'] . '"';
$the_core_shortcode_params .= ' ajax="' . $atts['ajax'] . '"';

if ( isset( $atts['tabindex'] ) && ! empty( $atts['tabindex'] ) ) {
	$the_core_shortcode_params .= ' tabindex="' . $atts['tabindex'] . '"';
}

echo do_shortcode( '[gravityform ' . $the_core_shortcode_params . ']' );