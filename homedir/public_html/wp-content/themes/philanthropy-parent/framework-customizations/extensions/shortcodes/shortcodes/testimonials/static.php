<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$testimonials = fw()->extensions->get( 'shortcodes' )->get_shortcode( 'testimonials' );

wp_enqueue_script(
	'fw-testimonial-scripts',
	$testimonials->locate_URI( '/static/js/scripts.js' ),
	array( 'jquery' ),
	'',
	true
);