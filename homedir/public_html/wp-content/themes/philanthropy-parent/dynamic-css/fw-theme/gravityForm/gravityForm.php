/* Gravity Form Plugin Style */
/* -------------------------------------------------- */

/* Progressbar */
.gform_wrapper form .gf_progressbar_wrapper h3.gf_progressbar_title {
	font-size: 1em;
	letter-spacing: 0;
}
.gform_wrapper form .gf_progressbar {
	box-shadow: none;
	background-color: transparent;
}
.gform_wrapper form .gf_progressbar > div {
	background-color: <?php echo esc_js($the_core_less_variables['theme-color-1']); ?>;
}
.gform_wrapper form .gf_progressbar_percentage {
	background: none;
}

/* Form */
body .gform_wrapper form .top_label div.ginput_container {
	margin-top: 0;
}
.gform_wrapper form label.gfield_label,
.gform_wrapper form .top_label .gfield_label {
	font-family: <?php echo ($the_core_less_variables['form-label-font-family']); ?>;
	font-size: <?php echo esc_js($the_core_less_variables['form-label-font-size']); ?>;
	font-style: <?php echo esc_js($the_core_less_variables['form-label-font-style']); ?>;
	font-weight: <?php echo esc_js($the_core_less_variables['form-label-font-weight']); ?>;
	line-height: <?php echo esc_js($the_core_less_variables['form-label-line-height']); ?>;
	letter-spacing: <?php echo esc_js($the_core_less_variables['form-label-letter-spacing']); ?>;
	color: <?php echo esc_js($the_core_less_variables['form-label-color']); ?>;
	text-transform: <?php echo esc_js($the_core_less_variables['form-label-text-transform']); ?>;
}
.gform_wrapper form textarea {
	resize: vertical;
}
.gform_wrapper form input:not([type=radio]):not([type=checkbox]):not([type=submit]):not([type=button]):not([type=image]):not([type=file]),
.gform_wrapper form textarea {
	background: <?php echo esc_js($the_core_less_variables['input-bg']); ?>;
	color: <?php echo esc_js($the_core_less_variables['input-color']); ?>;
	font-family: <?php echo ($the_core_less_variables['input-font-family']); ?>;
	font-size: <?php echo esc_js($the_core_less_variables['input-font-size']); ?>;
	font-style: <?php echo esc_js($the_core_less_variables['input-font-style']); ?>;
	font-weight: <?php echo esc_js($the_core_less_variables['input-font-weight']); ?>;
	letter-spacing: <?php echo esc_js($the_core_less_variables['input-letter-spacing']); ?>;
	line-height: <?php echo esc_js($the_core_less_variables['input-line-height']); ?>;
	padding: <?php echo esc_js($the_core_less_variables['input-padding-y']); ?> <?php echo esc_js($the_core_less_variables['input-padding-x']); ?>;
	border: 1px solid rgba(0, 0, 0, 0.13);
	-webkit-appearance: none;
	-moz-appearance: none;
	margin: 0;
	outline: none;
}
.gform_wrapper form .field_sublabel_above .description,
.gform_wrapper form .field_sublabel_above .gfield_description,
.gform_wrapper form .field_sublabel_above .gsection_description,
.gform_wrapper form .right_label .gfield_description {
	padding-top: 0;
	margin-top: 5px;
}
.gform_wrapper form .description_above .gfield_description {
	padding-bottom: 5px;
}
.gform_wrapper form .gfield_checkbox li label,
.gform_wrapper form .gfield_radio li label {
	font-family: <?php echo ($the_core_less_variables['form-label-font-family']); ?>;
	font-size: <?php echo esc_js($the_core_less_variables['form-label-font-size']); ?>;
	font-style: <?php echo esc_js($the_core_less_variables['form-label-font-style']); ?>;
	font-weight: <?php echo esc_js($the_core_less_variables['form-label-font-weight']); ?>;
	letter-spacing: <?php echo esc_js($the_core_less_variables['form-label-letter-spacing']); ?>;
	color: <?php echo esc_js($the_core_less_variables['form-label-color']); ?>;
	padding-left: 24px;
}
.gform_wrapper form ul.gfield_checkbox li label,
.gform_wrapper form ul.gfield_radio li label {
	display: block;
	letter-spacing: <?php echo esc_js($the_core_less_variables['form-label-letter-spacing']); ?>;
	margin: 0 0 1.2em;
}
.gform_wrapper form ul.gfield_checkbox li input[type=checkbox]:checked+label,
.gform_wrapper form ul.gfield_radio li input[type=radio]:checked+label {
	font-weight: <?php echo esc_js($the_core_less_variables['form-label-font-weight']); ?>;
}
.gform_wrapper form input.ginput_quantity[type=text],
.gform_wrapper form .gfield_time_hour input,
.gform_wrapper form .gfield_time_minute input {
	width: 65px;
	text-align: center;
}
.gform_wrapper form .gfield_time_hour,
.gform_wrapper form .gfield_time_minute {
	max-width: inherit !important;
	width: auto !important;
}
.gform_wrapper form .gfield_time_ampm {
	max-width: inherit !important;
	width: 70px !important;
}
.gform_wrapper form .selectize-input,
.gform_wrapper form .selectize-input.focus,
.gform_wrapper form .selectize-input.input-active,
.gform_wrapper form .selectize-input.dropdown-active {
	border: 1px solid rgba(0, 0, 0, 0.13);
}
.gform_wrapper .name_prefix_select {
	padding-top: 2px;
}
.gform_wrapper form .selectize-input > input[type="text"] {
	display: inline-block !important;
}
.gform_wrapper form .chosen-container {
	display: none;
}

/* Button */
.gform_wrapper form .gform_page_footer input.button:not(.gform_image_button),
.gform_wrapper form .gform_footer input.button:not(.gform_image_button) {
	font-family: <?php echo ($the_core_less_variables['fw-buttons-font-family']); ?>;
	font-weight: <?php echo esc_js($the_core_less_variables['fw-buttons-font-weight']); ?>;
	font-style: <?php echo esc_js($the_core_less_variables['fw-buttons-font-style']); ?>;
	font-size: <?php echo esc_js($the_core_less_variables['fw-buttons-font-size']); ?>;
	line-height: <?php echo esc_js($the_core_less_variables['fw-buttons-line-height']); ?>;
	letter-spacing: <?php echo esc_js($the_core_less_variables['fw-buttons-letter-spacing']); ?>;
	display: inline-block;
	margin-bottom: 0;
	text-align: center;
	vertical-align: middle;
	cursor: pointer;
	background-image: none;
	border: 1px solid transparent;
	text-decoration: none;
	white-space: nowrap;
	outline: none;
	position: relative;
	-webkit-user-select: none;
	-moz-user-select: none;
	-ms-user-select: none; /* IE10+ */
	user-select: none;
	-webkit-transition: all 0.3s ease;
	-o-transition: all 0.3s ease;
	transition: all 0.3s ease;
	max-width: 100%;
	/* fw-btn-md */
	padding: <?php echo esc_js($the_core_less_variables['padding-base-vertical']); ?> <?php echo esc_js($the_core_less_variables['padding-base-horizontal']); ?>;
	/* fw-btn-1 */
	background-color: <?php echo esc_js($the_core_less_variables['fw-btn-bg-color']); ?>;
	border-color: <?php echo esc_js($the_core_less_variables['fw-btn-border-color']); ?>;
	border-width: <?php echo esc_js($the_core_less_variables['fw-btn-border-width']); ?>;
	color: <?php echo esc_js($the_core_less_variables['fw-btn-text-color']); ?>;
	border-radius: <?php echo esc_js($the_core_less_variables['fw-btn-radius']); ?>;
}
.gform_wrapper form .gform_page_footer input.button:not(.gform_image_button):hover,
.gform_wrapper form .gform_page_footer input.button:not(.gform_image_button):focus,
.gform_wrapper form .gform_footer input.button:not(.gform_image_button):hover,
.gform_wrapper form .gform_footer input.button:not(.gform_image_button):focus {
	text-decoration: none;
	outline: none;
}
.gform_wrapper form .gform_page_footer input.button:not(.gform_image_button):focus,
.gform_wrapper form .gform_footer input.button:not(.gform_image_button):focus {
	background-color: <?php echo esc_js($the_core_less_variables['fw-btn-bg-color']); ?>;
	border-color: <?php echo esc_js($the_core_less_variables['fw-btn-border-color']); ?>;
	color: <?php echo esc_js($the_core_less_variables['fw-btn-text-color']); ?>;
}
.gform_wrapper form .gform_page_footer input.button:not(.gform_image_button):hover,
.gform_wrapper form .gform_footer input.button:not(.gform_image_button):hover {
	background-color: <?php echo esc_js($the_core_less_variables['fw-btn-bg-color-hover']); ?>;
	color: <?php echo esc_js($the_core_less_variables['fw-btn-text-color-hover']); ?>;
}
.gform_wrapper form .gform_page_footer input.button:not(.gform_image_button):active,
.gform_wrapper form .gform_footer input.button:not(.gform_image_button):active {
	box-shadow: none;
}
.gform_wrapper form .gform_page_footer input.button:not(.gform_image_button) span,
.gform_wrapper form .gform_page_footer input.button:not(.gform_image_button) i,
.gform_wrapper form .gform_footer input.button:not(.gform_image_button) span,
.gform_wrapper form .gform_footer input.button:not(.gform_image_button) i {
	position: relative;
	top: 1px;
}
.gform_wrapper form .ginput_complex span.ginput_cardextras {
	overflow: visible;
}
.gform_wrapper form .ginput_complex  .ginput_cardinfo_right {
	margin-left: 10px;
}

