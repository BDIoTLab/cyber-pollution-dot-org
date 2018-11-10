<?php if (!defined('FW')) die('Forbidden');
// Page Builder Predefined Templates

/** @internal */
function _tf_theme_predefined_templates_init() {
	remove_action(
		'fw_ext_builder:option_type:builder:before_enqueue',
		'_tf_theme_predefined_templates_init'
	);

	require_once get_template_directory().'/theme-includes/includes/predefined-templates/class-tf-theme-predefined-templates.php';
	new _TF_Theme_Predefined_Templates();
}

if (defined('DOING_AJAX') && DOING_AJAX) {
	_tf_theme_predefined_templates_init();
} else {
	add_action(
		'fw_ext_builder:option_type:builder:before_enqueue',
		'_tf_theme_predefined_templates_init'
	);
}