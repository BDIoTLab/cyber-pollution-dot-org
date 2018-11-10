<?php
wp_enqueue_script(
	'fw-slideshow-scripts',
	fw()->extensions->get( 'shortcodes' )->get_shortcode( 'slideshow' )->locate_URI( '/static/js/scripts.js' ),
	array( 'jquery', 'carouFredSel', 'imagesloaded' ),
	defined( 'FW' ) ? fw()->theme->manifest->get_version() : '1.0',
	true
);