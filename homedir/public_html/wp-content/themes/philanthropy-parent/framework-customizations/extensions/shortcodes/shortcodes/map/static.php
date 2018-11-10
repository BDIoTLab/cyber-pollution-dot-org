<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

/** @var FW_Extension_Shortcodes $shortcodes */
$shortcodes = fw_ext( 'shortcodes' );
/** @var FW_Shortcode_Map $shortcode */
$shortcode = $shortcodes->get_shortcode( 'map' );

wp_enqueue_style(
	'fw-shortcode-map',
	$shortcodes->get_declared_URI( '/shortcodes/map/static/css/styles.css' )
);

wp_enqueue_script(
	'google-maps-api-v3',
	'https://maps.googleapis.com/maps/api/js?' . http_build_query(array(
		'v' => '3.27',
		'libraries' => 'places',
		'language' => substr( get_locale(), 0, 2 ),
		'key' => method_exists('FW_Option_Type_Map', 'api_key')
			? FW_Option_Type_Map::api_key()
			: '' // You can set here some default key
	)),
	array(),
	'3.27',
	true
);

wp_enqueue_script(
	'fw-shortcode-map-script',
	$shortcode->locate_URI( '/static/js/scripts.js' ),
	array( 'jquery', 'underscore', 'google-maps-api-v3' ),
	fw()->manifest->get_version(),
	true
);
