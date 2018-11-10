/* Learning */
/* -------------------------------------------------- */
.fw_form_learning-quiz-quiz-form .submit input {
  /* fw-btn */
  font-family: <?php echo ($the_core_less_variables['fw-buttons-font-family']); ?>;
  font-weight: <?php echo esc_js($the_core_less_variables['fw-buttons-font-weight']); ?>;
  font-style: <?php echo esc_js($the_core_less_variables['fw-buttons-font-style']); ?>;
  font-size: <?php echo esc_js($the_core_less_variables['fw-buttons-font-size']); ?>;
  line-height: <?php echo esc_js($the_core_less_variables['fw-buttons-line-height']); ?> !important;
  letter-spacing: <?php echo esc_js($the_core_less_variables['fw-buttons-letter-spacing']); ?>;
  color: #fff !important;
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
  border-radius: <?php echo esc_js($the_core_less_variables['fw-btn-radius']); ?>;
  /* fw-btn-md */
  padding: <?php echo esc_js($the_core_less_variables['padding-base-vertical']); ?> <?php echo esc_js($the_core_less_variables['padding-base-horizontal']); ?>;
  font-size: <?php echo esc_js($the_core_less_variables['fw-buttons-font-size']); ?>;
  line-height: <?php echo esc_js($the_core_less_variables['fw-buttons-line-height']); ?> ;
}
.fw_form_learning-quiz-quiz-form .submit input:hover,
.fw_form_learning-quiz-quiz-form .submit input:focus {
  text-decoration: none;
  outline: none;
}
.fw_form_learning-quiz-quiz-form .submit input i,
.fw_form_learning-quiz-quiz-form .submit input img {
  margin-right: 13px;
}
.fw_form_learning-quiz-quiz-form .submit input i.pull-right,
.fw_form_learning-quiz-quiz-form .submit input img.pull-right,
.fw_form_learning-quiz-quiz-form .submit input i.pull-right-icon,
.fw_form_learning-quiz-quiz-form .submit input img.pull-right-icon {
  margin-right: 0;
  margin-left: 13px;
  position: relative;
}
.fw_form_learning-quiz-quiz-form .submit input i.pull-right,
.fw_form_learning-quiz-quiz-form .submit input img.pull-right {
  top: 0.3em;
}
.fw_form_learning-quiz-quiz-form .submit input img {
  position: relative;
  top: -0.1em;
}
.fw_form_learning-quiz-quiz-form .submit input i {
  top: -1px;
  vertical-align: middle;
}
.fw_form_learning-quiz-quiz-form .submit input.fw-btn-side-by-side {
  margin-right: 10px;
}
.fw_form_learning-quiz-quiz-form .submit input.fw-btn-side-by-side:last-child {
  margin-right: 0;
}
.fw_form_learning-quiz-quiz-form .submit input:focus {
  background-color: <?php echo esc_js($the_core_less_variables['fw-btn-bg-color']); ?>;
  border-color: <?php echo esc_js($the_core_less_variables['fw-btn-border-color']); ?>;
  color: <?php echo esc_js($the_core_less_variables['fw-btn-text-color']); ?>;
}
.fw_form_learning-quiz-quiz-form .submit input:hover {
  background-color: <?php echo esc_js($the_core_less_variables['fw-btn-bg-color-hover']); ?>;
  color: #fff !important;
}
.fw_form_learning-quiz-quiz-form .submit input:active {
  box-shadow: none;
}
.fw_form_learning-quiz-quiz-form .submit input {
  width: auto;
}