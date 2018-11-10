<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}


wp_enqueue_script(
	'countdown',
	get_template_directory_uri() . '/js/lib/jquery.countdown.min.js',
	array(),
	fw()->manifest->get_version(),
	true
);

$the_core_countdown = fw()->extensions->get( 'shortcodes' )->get_shortcode( 'countdown' );
wp_enqueue_script(
	'fw-countdown-scripts',
	$the_core_countdown->locate_URI( '/static/js/scripts.js' ),
	array( 'jquery' ),
	fw()->manifest->get_version(),
	true
);