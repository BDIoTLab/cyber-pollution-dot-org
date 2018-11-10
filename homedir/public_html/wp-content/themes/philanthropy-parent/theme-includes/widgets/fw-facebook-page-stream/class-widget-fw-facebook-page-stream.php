<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}

$base_path = locate_template( 'theme-includes/widgets/fw-facebook-page-stream' );

if ( defined( 'FW' ) && function_exists( 'fw_ext_social_facebook_graph_api_explorer' ) ) {
	load_template( "$base_path/with-fw.php", true );
} else {
	load_template( "$base_path/no-fw.php", true );
}