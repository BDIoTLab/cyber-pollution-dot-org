<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$shortcodes       = fw_ext( 'shortcodes' );
$shortcode        = $shortcodes->get_shortcode( 'latest_posts' );
$the_core_version = fw()->theme->manifest->get_version();

wp_enqueue_script(
	'fw-latest-posts-script',
	$shortcode->locate_URI( '/static/js/scripts.js' ),
	array( 'jquery' ),
	$the_core_version,
	true
);

