<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}

$base_path = locate_template( 'theme-includes/widgets/fw-twitter' );

if ( defined( 'FW' ) && function_exists( 'fw_ext_social_twitter_get_connection' ) && function_exists( 'curl_exec' ) ) {
	load_template( "$base_path/with-fw.php", true );
} else {
	load_template( "$base_path/no-fw.php", true );
}