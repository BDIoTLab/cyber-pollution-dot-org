/* Widget buddyPress LogIn */
.widget_bp_core_login_widget .standard-form input.input {
  width: 100%;
  line-height: <?php echo esc_js($the_core_less_variables['input-height-base']); ?>;
  border: none;
  color: <?php echo esc_js($the_core_less_variables['fw-widget-inner-title-color']); ?>;
  background-color: <?php echo the_core_hex2rgba($the_core_less_variables['fw-widget-input-bg'], 0.7); ?>;
  font-family: <?php echo ($the_core_less_variables['fw-buttons-font-family']); ?>;
  font-weight: <?php echo esc_js($the_core_less_variables['fw-buttons-font-weight']); ?>;
  font-style: <?php echo esc_js($the_core_less_variables['fw-buttons-font-style']); ?>;
  font-size: <?php echo esc_js($the_core_less_variables['input-font-size']); ?>;
  padding: <?php echo esc_js($the_core_less_variables['input-padding-y']); ?> <?php echo esc_js($the_core_less_variables['input-padding-x']); ?>;
}
.widget_bp_core_login_widget .standard-form input.input::-moz-placeholder {
  color: <?php echo the_core_hex2rgba($the_core_less_variables['fw-widget-inner-title-color'], 0.25); ?>;
  opacity: 1;
}
.widget_bp_core_login_widget .standard-form input.input:-ms-input-placeholder {
  color: <?php echo the_core_hex2rgba($the_core_less_variables['fw-widget-inner-title-color'], 0.25); ?>;
}
.widget_bp_core_login_widget .standard-form input.input::-webkit-input-placeholder {
  color: <?php echo the_core_hex2rgba($the_core_less_variables['fw-widget-inner-title-color'], 0.25); ?>;
}
.widget_bp_core_login_widget .standard-form input[type="submit"] {
  /* fw-btn */
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
  -ms-user-select: none;
  user-select: none;
  -webkit-transition: all 0.3s ease;
  -o-transition: all 0.3s ease;
  transition: all 0.3s ease;
  max-width: 100%;
  /* fw-btn-1 */
  background-color: <?php echo esc_js($the_core_less_variables['fw-btn-bg-color']); ?>;
  border-color: <?php echo esc_js($the_core_less_variables['fw-btn-border-color']); ?>;
  border-width: <?php echo esc_js($the_core_less_variables['fw-btn-border-width']); ?>;
  color: #fff !important;
  border-radius: <?php echo esc_js($the_core_less_variables['fw-btn-radius']); ?>;
  /* fw-btn-md */
  padding: <?php echo esc_js($the_core_less_variables['padding-base-vertical']); ?> <?php echo esc_js($the_core_less_variables['padding-base-horizontal']); ?>;
  font-size: <?php echo esc_js($the_core_less_variables['fw-buttons-font-size']); ?>;
  line-height: <?php echo esc_js($the_core_less_variables['fw-buttons-line-height']); ?>;
}
.widget_bp_core_login_widget .standard-form input[type="submit"] span,
.widget_bp_core_login_widget .standard-form input[type="submit"] i {
  position: relative;
  top: 1px;
}
.widget_bp_core_login_widget .standard-form input[type="submit"]:hover,
.widget_bp_core_login_widget .standard-form input[type="submit"]:focus {
  text-decoration: none;
  outline: none;
}
.widget_bp_core_login_widget .standard-form input[type="submit"] i,
.widget_bp_core_login_widget .standard-form input[type="submit"] img {
  margin-right: 13px;
}
.widget_bp_core_login_widget .standard-form input[type="submit"] i.pull-right,
.widget_bp_core_login_widget .standard-form input[type="submit"] img.pull-right,
.widget_bp_core_login_widget .standard-form input[type="submit"] i.pull-right-icon,
.widget_bp_core_login_widget .standard-form input[type="submit"] img.pull-right-icon {
  margin-right: 0;
  margin-left: 13px;
  position: relative;
}
.widget_bp_core_login_widget .standard-form input[type="submit"] i.pull-right,
.widget_bp_core_login_widget .standard-form input[type="submit"] img.pull-right {
  top: 0.3em;
}
.widget_bp_core_login_widget .standard-form input[type="submit"] img {
  position: relative;
  top: -0.1em;
}
.widget_bp_core_login_widget .standard-form input[type="submit"] i {
  top: -1px;
  vertical-align: middle;
}
.widget_bp_core_login_widget .standard-form input[type="submit"].fw-btn-side-by-side {
  margin-right: 10px;
}
.widget_bp_core_login_widget .standard-form input[type="submit"].fw-btn-side-by-side:last-child {
  margin-right: 0;
}
.widget_bp_core_login_widget .standard-form input[type="submit"]:focus {
  background-color: <?php echo esc_js($the_core_less_variables['fw-btn-bg-color']); ?>;
  border-color: <?php echo esc_js($the_core_less_variables['fw-btn-border-color']); ?>;
  color: <?php echo esc_js($the_core_less_variables['fw-btn-text-color']); ?>;
}
.widget_bp_core_login_widget .standard-form input[type="submit"]:hover {
  background-color: <?php echo esc_js($the_core_less_variables['fw-btn-bg-color-hover']); ?>;
  color: #fff !important;
}
.widget_bp_core_login_widget .standard-form input[type="submit"]:active {
  box-shadow: none;
}

/*-> Log In */
.widget_bp_core_login_widget .standard-form .forgetmenot {
  margin-bottom: 1.2em;
}

/*-> Log Out */
.widget_bp_core_login_widget {
  overflow: hidden;
}
.widget.buddypress .bp-login-widget-user-links>div {
  margin-bottom: auto;
  padding-left: 16px;
}
.widget_bp_core_login_widget .bp-login-widget-user-link {
  display: inline-block;
}
.widget_bp_core_login_widget .bp-login-widget-user-logout {
  float: right;
  padding-left: 5px !important;
}
