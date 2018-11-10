/* Widget bbPress LogIn */
.bbp_widget_login .bbp-login-form .bbp-username input,
.bbp_widget_login .bbp-login-form .bbp-password input {
  width: 100%;
  line-height: <?php echo esc_js($the_core_less_variables['input-height-base']); ?>;
  border: none;
  color: <?php echo esc_js($the_core_less_variables['fw-widget-inner-title-color']); ?>;
  background-color: <?php echo the_core_hex2rgba($the_core_less_variables['fw-widget-input-bg'], 0.07); ?>;
  font-family: <?php echo ($the_core_less_variables['fw-buttons-font-family']); ?>;
  font-weight: <?php echo esc_js($the_core_less_variables['fw-buttons-font-weight']); ?>;
  font-style: <?php echo esc_js($the_core_less_variables['fw-buttons-font-style']); ?>;
  font-size: <?php echo esc_js($the_core_less_variables['input-font-size']); ?>;
  padding: <?php echo esc_js($the_core_less_variables['input-padding-y']); ?> <?php echo esc_js($the_core_less_variables['input-padding-x']); ?>;
}
.bbp_widget_login .bbp-login-form .bbp-username input::-moz-placeholder,
.bbp_widget_login .bbp-login-form .bbp-password input::-moz-placeholder {
  color: <?php echo the_core_hex2rgba($the_core_less_variables['fw-widget-inner-title-color'], 0.25); ?>;
  opacity: 1;
}
.bbp_widget_login .bbp-login-form .bbp-username input:-ms-input-placeholder,
.bbp_widget_login .bbp-login-form .bbp-password input:-ms-input-placeholder {
  color: <?php echo the_core_hex2rgba($the_core_less_variables['fw-widget-inner-title-color'], 0.25); ?>;
}
.bbp_widget_login .bbp-login-form .bbp-username input::-webkit-input-placeholder,
.bbp_widget_login .bbp-login-form .bbp-password input::-webkit-input-placeholder {
  color: <?php echo the_core_hex2rgba($the_core_less_variables['fw-widget-inner-title-color'], 0.25); ?>;
}
.bbp_widget_login .bbp-login-form .bbp-submit-wrapper .user-submit {
/* fw-btn */
  font-family: <?php echo ($the_core_less_variables['fw-buttons-font-family']); ?>;
  font-weight: <?php echo esc_js($the_core_less_variables['fw-buttons-font-weight']); ?>;
  font-style: <?php echo esc_js($the_core_less_variables['fw-buttons-font-style']); ?>;
  font-size: <?php echo esc_js($the_core_less_variables['fw-buttons-font-size']); ?>;
  line-height: <?php echo esc_js($the_core_less_variables['fw-buttons-line-height']); ?>;
  letter-spacing: <?php echo esc_js($the_core_less_variables['fw-buttons-letter-spacing']); ?>;
  color: <?php echo esc_js($the_core_less_variables['fw-buttons-color']); ?>;
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
  color: <?php echo esc_js($the_core_less_variables['fw-btn-text-color']); ?>;
  border-radius: <?php echo esc_js($the_core_less_variables['fw-btn-radius']); ?>;
  /* fw-btn-md */
  padding: <?php echo esc_js($the_core_less_variables['padding-base-vertical']); ?> <?php echo esc_js($the_core_less_variables['padding-base-horizontal']); ?>;
  font-size: <?php echo esc_js($the_core_less_variables['fw-buttons-font-size']); ?>;
  line-height: <?php echo esc_js($the_core_less_variables['fw-buttons-line-height']); ?>;
}
.bbp_widget_login .bbp-login-form .bbp-submit-wrapper .user-submit span,
.bbp_widget_login .bbp-login-form .bbp-submit-wrapper .user-submit i {
  position: relative;
  top: 1px;
}
.bbp_widget_login .bbp-login-form .bbp-submit-wrapper .user-submit:hover,
.bbp_widget_login .bbp-login-form .bbp-submit-wrapper .user-submit:focus {
  text-decoration: none;
  outline: none;
}
.bbp_widget_login .bbp-login-form .bbp-submit-wrapper .user-submit i,
.bbp_widget_login .bbp-login-form .bbp-submit-wrapper .user-submit img {
  margin-right: 13px;
}
.bbp_widget_login .bbp-login-form .bbp-submit-wrapper .user-submit i.pull-right,
.bbp_widget_login .bbp-login-form .bbp-submit-wrapper .user-submit img.pull-right,
.bbp_widget_login .bbp-login-form .bbp-submit-wrapper .user-submit i.pull-right-icon,
.bbp_widget_login .bbp-login-form .bbp-submit-wrapper .user-submit img.pull-right-icon {
  margin-right: 0;
  margin-left: 13px;
  position: relative;
}
.bbp_widget_login .bbp-login-form .bbp-submit-wrapper .user-submit i.pull-right,
.bbp_widget_login .bbp-login-form .bbp-submit-wrapper .user-submit img.pull-right {
  top: 0.3em;
}
.bbp_widget_login .bbp-login-form .bbp-submit-wrapper .user-submit img {
  position: relative;
  top: -0.1em;
}
.bbp_widget_login .bbp-login-form .bbp-submit-wrapper .user-submit i {
  top: -1px;
  vertical-align: middle;
}
/* Button side by side */
.bbp_widget_login .bbp-login-form .bbp-submit-wrapper .user-submit.fw-btn-side-by-side {
  margin-right: 10px;
}
.bbp_widget_login .bbp-login-form .bbp-submit-wrapper .user-submit.fw-btn-side-by-side:last-child {
  margin-right: 0;
}
.bbp_widget_login .bbp-login-form .bbp-submit-wrapper .user-submit:focus {
  background-color: <?php echo esc_js($the_core_less_variables['fw-btn-bg-color']); ?>;
  border-color: <?php echo esc_js($the_core_less_variables['fw-btn-border-color']); ?>;
  color: <?php echo esc_js($the_core_less_variables['fw-btn-text-color']); ?>;
}
.bbp_widget_login .bbp-login-form .bbp-submit-wrapper .user-submit:hover {
  background-color: <?php echo esc_js($the_core_less_variables['fw-btn-bg-color-hover']); ?>;
  color: <?php echo esc_js($the_core_less_variables['fw-btn-text-color-hover']); ?>;
}
.bbp_widget_login .bbp-login-form .bbp-submit-wrapper .user-submit:active {
  box-shadow: none;
}
.bbp-logged-in h4 {
  font-weight: <?php echo esc_js($the_core_less_variables['fw-h4-font-weight']); ?>;
}

/*-> Log In */
.bbp_widget_login .bbp-login-form .bbp-submit-wrapper {
  clear: both;
  margin-bottom: 0;
  width: 100%;
  margin-top: 0;
  float: none;
  text-align: left;
}

/*-> Log Out */
.bbp_widget_login,
.bbp_widget_login .bbp-logged-in {
  overflow: hidden;
}
.bbp_widget_login .bbp-logged-in h4 {
  display: inline-block;
  margin: 0;
}

.bbp_widget_login .bbp-logged-in h4 a {
  display: block;
}

.bbp_widget_login .bbp-logged-in .button.logout-link{
  float: right;
  margin-top: 3px;
}
