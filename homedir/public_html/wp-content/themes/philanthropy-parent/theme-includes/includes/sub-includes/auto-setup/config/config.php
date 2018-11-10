<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}

return array(
	/**
	 * Array for demos
	 */
	'demos'              => the_core_get_the_demo_required_plugins(),
	'plugins'            => the_core_get_the_theme_required_plugins(),
	'theme_id'           => the_core_get_the_theme_id(),
	'child_theme_source' => 'http://updates.themefuse.com/plugins/' . the_core_get_the_theme_id() . '-child.zip',
	'has_demo_content'   => the_core_theme_has_demo_content()
);