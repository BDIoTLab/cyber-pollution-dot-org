/* selectize.theme */
.selectize-dropdown,
.selectize-dropdown.form-control {
	height: auto;
	padding: 0;
	margin: 2px 0 0 0;
	z-index: 1000;
	background: #fff;
	border: 1px solid #ccc;
	border-radius: 0;
	box-shadow: 0 6px 12px rgba(0, 0, 0, 0.175);
}

.selectize-dropdown,
.selectize-input,
.selectize-input input {
  font-family: <?php echo ($the_core_less_variables['input-font-family']); ?>;
  font-size: <?php echo esc_js($the_core_less_variables['input-font-size']); ?>;
  font-style: <?php echo esc_js($the_core_less_variables['input-font-style']); ?>;
  font-weight: <?php echo esc_js($the_core_less_variables['input-font-weight']); ?>;
  letter-spacing: <?php echo esc_js($the_core_less_variables['input-letter-spacing']); ?>;
  min-height: <?php echo esc_js($the_core_less_variables['input-line-height']); ?>;
  line-height: <?php echo esc_js($the_core_less_variables['input-line-height']); ?>;
  color: <?php echo esc_js($the_core_less_variables['input-color']); ?>;
}
.selectize-dropdown .optgroup-header {
	font-size: <?php echo esc_js($the_core_less_variables['font-size-small']); ?>;
	line-height: <?php echo esc_js($the_core_less_variables['line-height-base']); ?>;
}
.selectize-dropdown .optgroup:before {
	content: ' ';
	display: block;
	height: 1px;
	margin-top: <?php echo esc_js( (floatval($the_core_less_variables['line-height-computed']) / 2) - 1 ); ?>px;
	margin-bottom: <?php echo esc_js( (floatval($the_core_less_variables['line-height-computed']) / 2) - 1 ); ?>px;
	margin-left: -<?php echo esc_js( $the_core_less_variables['padding-base-horizontal']); ?>;
	margin-right: -<?php echo esc_js( $the_core_less_variables['padding-base-horizontal']); ?>;
	overflow: hidden;
	background-color: #e5e5e5;
}
.selectize-dropdown .optgroup:first-child:before {
	display: none;
}
.selectize-dropdown-header {
	padding: 6px <?php echo esc_js($the_core_less_variables['padding-base-horizontal']); ?>;
}
.selectize-input {
	font-weight: normal;
	border: none;
	box-shadow: none;
	border-radius: <?php echo esc_js($the_core_less_variables['input-border-radius']); ?>;
	padding: <?php echo esc_js($the_core_less_variables['input-padding-y']); ?> <?php echo esc_js($the_core_less_variables['input-padding-x']); ?>;
}
.selectize-input > input[type="text"] {
	display: none !important;
}
.selectize-input input {
	height: auto !important;
	position: static !important;
}
.selectize-input.dropdown-active {
	border-radius: <?php echo esc_js($the_core_less_variables['input-border-radius']); ?>;
}
.selectize-input.dropdown-active::before {
	display: none;
}
.selectize-input.focus {
	border-color: <?php echo esc_js($the_core_less_variables['input-border-focus']); ?>;
	box-shadow: none;
	outline: 0;
}
.has-error .selectize-input {
	border-color: #fff;
	box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
}
.has-error .selectize-input:focus {
	border-color: <?php echo the_core_adjustColorLightenDarken( '#fff', -10); ?>;
	box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 6px <?php echo the_core_adjustColorLightenDarken('#fff', -20); ?>;
}
.selectize-control.multi .selectize-input.has-items {
	padding: <?php echo esc_js($the_core_less_variables['input-padding-y']); ?> <?php echo esc_js($the_core_less_variables['input-padding-x']); ?>;
}
.selectize-control.multi .selectize-input > div {
	border-radius: <?php echo esc_js($the_core_less_variables['input-border-radius']); ?>;
}
.selectize-control.multi .selectize-input > input[type="text"] {
	display: inline-block !important;
}
.selectize-input > * {
	line-height: <?php echo esc_js($the_core_less_variables['line-height-computed']); ?>;
}
.widget_archive .selectize-input,
.widget_categories .selectize-input,
.widget_product_categories .selectize-input,
.widget_archive .selectize-control.single .selectize-input.input-active,
.widget_product_categories .selectize-control.single .selectize-input.input-active,
.widget_categories .selectize-control.single .selectize-input.input-active {
	background-color: <?php echo the_core_hex2rgba($the_core_less_variables['fw-widget-input-bg'], 0.07); ?>;
}
.selectize-dropdown-content {
	padding: 5px 0;
}
.form-control.selectize-control {
	padding: 0;
	height: auto;
	border: none;
	background: none;
	box-shadow: none;
	border-radius: 0;
}
.selectize-input.focus,
.selectize-input.input-active,
.selectize-input.dropdown-active {
	border: none;
	box-shadow: none;
}
.widget_archive .selectize-input,
.widget_categories .selectize-input {
	border: none;
}