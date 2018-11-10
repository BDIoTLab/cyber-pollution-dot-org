/* Contact Form 7 Layout */
/* -------------------------------------------------- */
/* Other Style for checkbox & radio box you can find in the file custom-checkbox-radio.css */
.wpcf7 .wpcf7-form div.wpcf7-validation-errors {
  border-color: #d12a5c;
  color: #d12a5c;
}
.wpcf7 .wpcf7-form  span.wpcf7-list-item {
  margin-left: 0;
}
.wpcf7 .wpcf7-form .wpcf7-list-item-label {
  margin-top: -2em;
}
.wpcf7 .wpcf7-form .wpcf7-list-item-label.acceptance-check {
  margin-top: 0;
  float: left;
  top: 6px;
}
.wpcf7 .wpcf7-form  span.wpcf7-list-item label .wpcf7-list-item-label {
  margin-top: -1em;
}
.wpcf7 .wpcf7-form  span.wpcf7-list-item label {
  padding-left: 0;
}
.wpcf7 .wpcf7-form  span.wpcf7-list-item label:before,
.wpcf7 .wpcf7-form  span.wpcf7-list-item label:after {
  display: none;
}
.wpcf7 .wpcf7-form input.wpcf7-submit {
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
  color: <?php echo esc_js($the_core_less_variables['fw-btn-text-color']); ?>;
  border-radius: <?php echo esc_js($the_core_less_variables['fw-btn-radius']); ?>;
  /* fw-btn-md */
  padding:  <?php echo esc_js($the_core_less_variables['padding-base-vertical']); ?> <?php echo esc_js($the_core_less_variables['padding-base-horizontal']); ?>;
  font-size: <?php echo esc_js($the_core_less_variables['fw-buttons-font-size']); ?>;
  line-height: <?php echo esc_js($the_core_less_variables['fw-buttons-line-height']); ?>;
}
.wpcf7 .wpcf7-form input.wpcf7-submit:hover,
.wpcf7 .wpcf7-form input.wpcf7-submit:focus {
  text-decoration: none;
  outline: none;
}
.wpcf7 .wpcf7-form input.wpcf7-submit:focus {
  background-color: <?php echo esc_js($the_core_less_variables['fw-btn-bg-color']); ?>;
  border-color: <?php echo esc_js($the_core_less_variables['fw-btn-border-color']); ?>;
  color: <?php echo esc_js($the_core_less_variables['fw-btn-text-color']); ?>;
}
.wpcf7 .wpcf7-form input.wpcf7-submit:hover {
  background-color: <?php echo esc_js($the_core_less_variables['fw-btn-bg-color-hover']); ?>;
  color: <?php echo esc_js($the_core_less_variables['fw-btn-text-color-hover']); ?>;
}
.wpcf7 .wpcf7-form input.wpcf7-submit:active {
  box-shadow: none;
}
