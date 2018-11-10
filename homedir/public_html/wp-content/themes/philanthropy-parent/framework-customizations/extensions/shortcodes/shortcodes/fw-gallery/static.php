<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$shortcodes                  = fw_ext( 'shortcodes' );
$shortcode                   = $shortcodes->get_shortcode( 'fw_gallery' );
$the_core_version            = fw()->theme->manifest->get_version();
$the_core_template_directory = get_template_directory_uri();

wp_enqueue_script(
	'masonry-theme',
	$the_core_template_directory . '/js/masonry.pkgd.min.js',
	array( 'jquery' ),
	$the_core_version,
	true
);

wp_enqueue_script(
	'fw-gallery-shortcode-script',
	$shortcode->locate_URI( '/static/js/script.js' ),
	array( 'jquery' ),
	$the_core_version,
	true
);

