<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}

/**
 * Include static files: javascript and css
 */

$the_core_template_directory = get_template_directory_uri();
// include media (was included for wp ecommerce plugin, now works fin without this, plus need to include only for custom type "wpsc-product" )
//wp_enqueue_media();

if ( defined( 'FW' ) ) {
	$the_core_version = fw()->theme->manifest->get_version();
} else {
	$the_core_version = '1.0';
}

wp_enqueue_style(
	'css-theme-admin',
	$the_core_template_directory . '/css/theme-admin.css',
	array(),
	$the_core_version
);

if ( is_rtl() ) {
	wp_enqueue_style(
		'css-admin-rtl',
		$the_core_template_directory . '/css/admin-rtl.css',
		array(),
		$the_core_version
	);
}

wp_enqueue_script(
	'js-theme-admin',
	$the_core_template_directory . '/js/theme-admin.js',
	array( 'jquery', ),
	$the_core_version,
	true
);

$js_vars = array(
	'ajaxUrl' => admin_url( 'admin-ajax.php' ),
	'nonce'   => wp_create_nonce( '_the_core_nonce_admin' )
);

wp_localize_script( 'js-theme-admin', 'TheCore', $js_vars );


