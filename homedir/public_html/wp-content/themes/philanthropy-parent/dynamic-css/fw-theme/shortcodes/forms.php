/* Forms & Form Elements */
/* Form Placeholder */
::-moz-placeholder {
  color: #cccccc;
  opacity: 1;
}
:-ms-input-placeholder {
  color: #cccccc;
}
::-webkit-input-placeholder {
  color: #cccccc;
}

input[type="text"],
input[type="password"],
input[type="search"],
input[type="url"],
input[type="email"],
input[type="tel"],
input[type="number"],
textarea,
select {
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
  width: 100%;
}
textarea {
  height: auto;
  resize: vertical;
}
select {
  -webkit-appearance: menulist;
  -moz-appearance: menulist;
  padding: <?php echo esc_js( floatval($the_core_less_variables['input-padding-y']) + 5); ?>px <?php echo esc_js($the_core_less_variables['input-padding-x']); ?>;
}
select option {
  color: <?php echo esc_js($the_core_less_variables['input-color']); ?>;
  font-family: <?php echo ($the_core_less_variables['input-font-family']); ?>;
  font-size: <?php echo esc_js($the_core_less_variables['input-font-size']); ?>;
  font-weight: <?php echo esc_js($the_core_less_variables['input-font-weight']); ?>;
}
label{
  font-family: <?php echo ($the_core_less_variables['form-label-font-family']); ?>;
  font-size: <?php echo esc_js($the_core_less_variables['form-label-font-size']); ?>;
  font-style: <?php echo esc_js($the_core_less_variables['form-label-font-style']); ?>;
  font-weight: <?php echo esc_js($the_core_less_variables['form-label-font-weight']); ?>;
  line-height: <?php echo esc_js($the_core_less_variables['form-label-line-height']); ?>;
  letter-spacing: <?php echo esc_js($the_core_less_variables['form-label-letter-spacing']); ?>;
  color: <?php echo esc_js($the_core_less_variables['form-label-color']); ?>;
  text-transform: <?php echo esc_js($the_core_less_variables['form-label-text-transform']); ?>;
}
/* Wrap forms */
.wrap-forms {
  background-color: <?php echo esc_js($the_core_less_variables['input-border']); ?>;
  padding: <?php echo esc_js( floatval($the_core_less_variables['fw-content-density']) *3 ); ?>px;
}
.wrap-forms .selectize-input.full {
  background-color: <?php echo esc_js($the_core_less_variables['input-bg']); ?>;
}
.wrap-forms .header.title {
  margin-bottom: <?php echo esc_js( floatval($the_core_less_variables['fw-content-density']) *3 ); ?>px;
}
.wrap-forms,
.wrap-forms .header.title {
  padding-left: 15px;
  padding-right: 15px;
}
.wrap-forms .header.title .fw-contact-form-description {
  font-family: <?php echo ($the_core_less_variables['subtitles-family']); ?>;
  font-weight: <?php echo esc_js($the_core_less_variables['subtitles-weight']); ?>;
  font-style: <?php echo esc_js($the_core_less_variables['subtitles-style']); ?>;
  font-size: <?php echo esc_js($the_core_less_variables['subtitles-size']); ?>;
  line-height: <?php echo esc_js($the_core_less_variables['subtitles-line-height']); ?>;
  letter-spacing: <?php echo esc_js($the_core_less_variables['subtitles-letter-spacing']); ?>;
  color: <?php echo esc_js($the_core_less_variables['subtitles-color']); ?>;
}
.wrap-forms .fw-row {
  padding-top: <?php echo esc_js($the_core_less_variables['fw-content-density']); ?>;
  padding-bottom: <?php echo esc_js($the_core_less_variables['fw-content-density']); ?>;
}
.wrap-forms .row-submit {
  padding-top: <?php echo esc_js( floatval($the_core_less_variables['fw-content-density']) * 2 ); ?>px;
}
.wrap-forms .form-builder-item p {
  font-size: <?php echo esc_js( floatval($the_core_less_variables['font-size-small']) - 1 ); ?>px;
}
.wrap-forms .input-styled > label {
  margin-bottom: 10px;
}
.wrap-forms .input-styled.fw-item-one-column .options .custom-radio {
  display: inline-block;
}
.wrap-forms .input-styled.fw-item-two-columns .options {
  width: 50%;
  float: left;
}
.wrap-forms .input-styled.fw-item-three-columns .options {
  width: 33.33%;
  float: left;
}
.wrap-forms .input-styled.fw-item-side-by-side .options {
  float: left;
  margin-right: 5%;
}
.wrap-forms .input-styled .custom-checkbox:before,
.wrap-forms .input-styled .custom-checkbox:after,
.wrap-forms .input-styled .custom-radio:before,
.wrap-forms .input-styled .custom-radio:after {
  content: " ";
  display: table;
}
.wrap-forms .input-styled .custom-checkbox:after,
.wrap-forms .input-styled .custom-radio:after {
  clear: both;
}
.wrap-forms form.fw_form_fw_form label {
  text-transform: none;
}
.wrap-forms .fw-contact-form-title {
  margin: 0;
}
.wrap-forms .form-builder-item > div > label sup {
  color: #d3604d;
}
.wrap-forms .form-builder-item p {
  margin-top: 6px;
  margin-bottom: 0;
}
.wrap-forms .form-builder-item textarea {
  height: 150px;
}
.wrap-forms .form-builder-item input,
.wrap-forms .form-builder-item .selectize-input {
  padding-top: 8px;
  padding-bottom: 7px;
}

/* Post Password & Search Form */
.search-form {
  position: relative;
}
.search-form .search-form {
  position: relative;
}
.search-form .screen-reader-text {
  display: none;
}
.search-form label {
  display: block;
}
.search-form .search-field::-moz-placeholder {
  color: <?php echo the_core_hex2rgba($the_core_less_variables['fw-widget-inner-title-color'], 0.25); ?>;
  opacity: 1;
}
.search-form .search-field:-ms-input-placeholder {
  color: <?php echo the_core_hex2rgba($the_core_less_variables['fw-widget-inner-title-color'], 0.25); ?>;
}
.search-form .search-field::-webkit-input-placeholder {
  color: <?php echo the_core_hex2rgba($the_core_less_variables['fw-widget-inner-title-color'], 0.25); ?>;
}
.search-form .search-field {
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
.search-form .search-submit {
  width: 28px;
  height: 28px;
  background-color: transparent;
  border: none;
  text-indent: 100px;
  position: absolute;
  top: 10px;
  right: 10px;
  z-index: 2;
  overflow: hidden;
}
.search-form label:after {
  display: inline-block;
  width: 28px;
  height: 28px;
  text-align: center;
  line-height: 28px;
  font-family: FontAwesome;
  content: "\f002";
  font-size: 16px;
  font-weight: normal;
  color: <?php echo esc_js($the_core_less_variables['fw-widget-inner-title-color']); ?>;
  position: absolute;
  top: 50%;
  margin-top: -14px;
  right: 10px;
  z-index: 1;
}

.post-password-form label {
  margin-right: 10px;
  margin-bottom: 0;
  vertical-align: bottom;
}
.post-password-form label input[type="password"]::-moz-placeholder {
  color: <?php echo the_core_hex2rgba($the_core_less_variables['fw-widget-inner-title-color'], 0.25); ?>;
  opacity: 1;
}
.post-password-form label input[type="password"]:-ms-input-placeholder {
  color: <?php echo the_core_hex2rgba($the_core_less_variables['fw-widget-inner-title-color'], 0.25); ?>;
}
.post-password-form label input[type="password"]::-webkit-input-placeholder {
  color: <?php echo the_core_hex2rgba($the_core_less_variables['fw-widget-inner-title-color'], 0.25); ?>;
}
.post-password-form label input[type="password"] {
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
.post-password-form input[type="submit"] {
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
.post-password-form input[type="submit"]:hover,
.post-password-form input[type="submit"]:focus {
  text-decoration: none;
  outline: none;
}
.post-password-form input[type="submit"]:focus {
  background-color: <?php echo esc_js($the_core_less_variables['fw-btn-bg-color']); ?>;
  border-color: <?php echo esc_js($the_core_less_variables['fw-btn-border-color']); ?>;
  color: <?php echo esc_js($the_core_less_variables['fw-btn-text-color']); ?>;
}
.post-password-form input[type="submit"]:hover {
  background-color: <?php echo esc_js($the_core_less_variables['fw-btn-bg-color-hover']); ?>;
  color: <?php echo esc_js($the_core_less_variables['fw-btn-text-color-hover']); ?>;
}
.post-password-form input[type="submit"]:active {
  box-shadow: none;
}
.post-password-form input[type="submit"] span,
.post-password-form input[type="submit"] i {
  position: relative;
  top: 1px;
}

/* Flash messages */
.flash-messages-info,
.flash-messages-success,
.flash-messages-error {
  padding: 0;
  margin: 0;
  list-style: none;
  text-align: center;
}
.field-radio .custom-radio .options {
  line-height: 11px;
}
.woocommerce .login .custom-checkbox {
  display: inline-block;
}
