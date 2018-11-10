<?php if ( ! defined( 'ABSPATH' ) ) {
    die( 'Direct access forbidden.' );
}

/*
 * Automatic install Unyson and install supported extensions after theme install/switch.
 */
if ( is_admin() && current_user_can('switch_themes') && !class_exists( 'FW_Theme_Auto_Setup' )) {
	load_template( get_template_directory().'/theme-includes/includes/sub-includes/auto-setup/class-fw-auto-install.php', true );
}
