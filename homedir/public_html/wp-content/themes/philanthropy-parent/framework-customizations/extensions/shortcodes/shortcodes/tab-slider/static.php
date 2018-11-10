<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$the_core_tab_slider         = fw()->extensions->get( 'shortcodes' )->get_shortcode( 'tab_slider' );
$the_core_template_directory = get_template_directory_uri();
if ( defined('FW') ) {
	$the_core_version = fw()->theme->manifest->get_version();
} else {
	$the_core_version = '1.0';
}

// owl Slider
wp_enqueue_style(
	'owlCarousel',
	$the_core_template_directory . '/css/owl.carousel.min.css',
	array(),
	$the_core_version
);
wp_enqueue_style(
	'owlCarouselTheme',
	$the_core_template_directory . '/css/owl.theme.default.min.css',
	array(),
	$the_core_version
);

wp_enqueue_script(
	'owlCarousel',
	$the_core_template_directory . '/js/owl.carousel.js',
	array('jquery'),
	$the_core_version,
	true
);

wp_enqueue_script(
	'fw-tab-slider-scripts',
	$the_core_tab_slider->locate_URI( '/static/js/scripts.js' ),
	array( 'jquery' ),
	$the_core_version,
	true
);