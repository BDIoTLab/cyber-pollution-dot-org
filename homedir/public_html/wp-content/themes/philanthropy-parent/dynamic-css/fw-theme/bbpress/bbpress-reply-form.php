/* bbPress Reply/Topic Forms */
#bbpress-forums fieldset.bbp-form {
  position: relative;
  padding: 30px;
  margin-bottom: 0;
  border: none;
  background-color: <?php echo the_core_hex2rgba($the_core_less_variables['text-color'], 0.1); ?>;
}
#bbpress-forums fieldset.bbp-form:before,
#bbpress-forums fieldset.bbp-form:after {
  content: " ";
  display: table;
}
#bbpress-forums fieldset.bbp-form:after {
  clear: both;
}
#bbpress-forums fieldset.bbp-form legend {
  position: relative;
  top: 43px;
  padding: 0;
  border-bottom: none;
}
#bbpress-forums div.bbp-the-content-wrapper textarea.bbp-the-content {
  min-height: 234px;
  max-height: 320px;
}
#bbpress-forums div.bbp-the-content-wrapper .quicktags-toolbar {
  border-bottom: none;
}
#bbpress-forums fieldset.bbp-form .bbp-submit-wrapper {
  display: block;
  width: 50%;
  margin-top: 0;
  padding: 0;
  float: none;
  overflow: hidden;
}
#bbpress-forums fieldset.bbp-form .bbp-submit-wrapper button.button.submit {
  width: 100%;
}
#bbpress-forums fieldset.bbp-form input:focus,
#bbpress-forums fieldset.bbp-form textarea:focus {
  border-color: <?php echo the_core_adjustColorLightenDarken($the_core_less_variables['input-border'], 10); ?>;
}
/* Rating */
#bbpress-forums fieldset.bbp-form .wrap-rating.in-post .rating-title {
  font-family: <?php echo ($the_core_less_variables['form-label-font-family']); ?>;
  font-size: <?php echo esc_js($the_core_less_variables['form-label-font-size']); ?>;
  font-style: <?php echo esc_js($the_core_less_variables['form-label-font-style']); ?>;
  font-weight: <?php echo esc_js($the_core_less_variables['form-label-font-weight']); ?>;
  line-height: <?php echo esc_js($the_core_less_variables['form-label-line-height']); ?>;
  letter-spacing: <?php echo esc_js($the_core_less_variables['form-label-letter-spacing']); ?>;
  color: <?php echo esc_js($the_core_less_variables['form-label-color']); ?>;
}
#bbpress-forums fieldset.bbp-form .wrap-rating.in-post .rating span {
  color: <?php echo the_core_adjustColorLightenDarken($the_core_less_variables['theme-color-5'], -20); ?>;
}
#bbpress-forums fieldset.bbp-form .wrap-rating.in-post .rating .fa.fa-star.voted {
  color: <?php echo esc_js($the_core_less_variables['theme-color-5']); ?>;
}
#bbpress-forums fieldset.bbp-form .wrap-rating.in-post .rating:hover .fa.fa-star {
  color: <?php echo the_core_adjustColorLightenDarken($the_core_less_variables['theme-color-5'], -20); ?> !important;
}
#bbpress-forums fieldset.bbp-form .wrap-rating.in-post .rating:hover .fa.fa-star.over,
#bbpress-forums fieldset.bbp-form .wrap-rating.in-post .rating:hover .fa.fa-star.voted {
  color: <?php echo esc_js($the_core_less_variables['theme-color-5']); ?> !important;
}
#bbpress-forums fieldset.bbp-form div.bbp-the-content-wrapper textarea.bbp-the-content {
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
}
#bbpress-forums fieldset.bbp-form div.bbp-the-content-wrapper textarea.bbp-the-content:focus {
  border-color: <?php echo the_core_adjustColorLightenDarken($the_core_less_variables['input-border'], 10); ?>;
}
#bbpress-forums fieldset.bbp-form .bbp-submit-wrapper button.button.submit {
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
  padding: <?php echo esc_js($the_core_less_variables['padding-base-vertical']); ?> <?php echo esc_js($the_core_less_variables['padding-base-horizontal']); ?>;
  font-size: <?php echo esc_js($the_core_less_variables['fw-buttons-font-size']); ?>;
  line-height: <?php echo esc_js($the_core_less_variables['fw-buttons-line-height']); ?>;
}
#bbpress-forums fieldset.bbp-form .bbp-submit-wrapper button.button.submit span,
#bbpress-forums fieldset.bbp-form .bbp-submit-wrapper button.button.submit i {
  position: relative;
  top: 1px;
}
#bbpress-forums fieldset.bbp-form .bbp-submit-wrapper button.button.submit:hover,
#bbpress-forums fieldset.bbp-form .bbp-submit-wrapper button.button.submit:focus {
  text-decoration: none;
  outline: none;
}
#bbpress-forums fieldset.bbp-form .bbp-submit-wrapper button.button.submit i,
#bbpress-forums fieldset.bbp-form .bbp-submit-wrapper button.button.submit img {
  margin-right: 13px;
}
#bbpress-forums fieldset.bbp-form .bbp-submit-wrapper button.button.submit i.pull-right,
#bbpress-forums fieldset.bbp-form .bbp-submit-wrapper button.button.submit img.pull-right,
#bbpress-forums fieldset.bbp-form .bbp-submit-wrapper button.button.submit i.pull-right-icon,
#bbpress-forums fieldset.bbp-form .bbp-submit-wrapper button.button.submit img.pull-right-icon {
  margin-right: 0;
  margin-left: 13px;
  position: relative;
}
#bbpress-forums fieldset.bbp-form .bbp-submit-wrapper button.button.submit i.pull-right,
#bbpress-forums fieldset.bbp-form .bbp-submit-wrapper button.button.submit img.pull-right {
  top: 0.3em;
}
#bbpress-forums fieldset.bbp-form .bbp-submit-wrapper button.button.submit img {
  position: relative;
  top: -0.1em;
}
#bbpress-forums fieldset.bbp-form .bbp-submit-wrapper button.button.submit i {
  top: -1px;
  vertical-align: middle;
}
/* Button side by side */
#bbpress-forums fieldset.bbp-form .bbp-submit-wrapper button.button.submit.fw-btn-side-by-side {
  margin-right: 10px;
}
#bbpress-forums fieldset.bbp-form .bbp-submit-wrapper button.button.submit.fw-btn-side-by-side:last-child {
  margin-right: 0;
}
#bbpress-forums fieldset.bbp-form .bbp-submit-wrapper button.button.submit:focus {
  background-color: <?php echo esc_js($the_core_less_variables['fw-btn-bg-color']); ?>;
  border-color: <?php echo esc_js($the_core_less_variables['fw-btn-border-color']); ?>;
  color: <?php echo esc_js($the_core_less_variables['fw-btn-text-color']); ?>;
}
#bbpress-forums fieldset.bbp-form .bbp-submit-wrapper button.button.submit:hover{
  background-color: <?php echo esc_js($the_core_less_variables['fw-btn-bg-color-hover']); ?>;
  color: <?php echo esc_js($the_core_less_variables['fw-btn-text-color-hover']); ?>;
}
#bbpress-forums fieldset.bbp-form .bbp-submit-wrapper button.button.submit:active {
  box-shadow: none;
}
/* bbpress Replay Form Link PopUp */
.bbpress #wp-link-wrap #link-options input[type="text"],
.bbpress #wp-link-wrap .link-search-wrapper input[type="text"] {
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
}
.bbpress #wp-link-wrap #link-options input[type="text"]:focus,
.bbpress #wp-link-wrap .link-search-wrapper input[type="text"]:focus {
  border-color: <?php echo the_core_adjustColorLightenDarken($the_core_less_variables['input-border'], 10); ?>;
}
/* bbpress Replay Form Link PopUp */
.bbpress #wp-link-wrap #link-modal-title {
  padding: 0 16px;
}
.bbpress #wp-link-wrap #wp-link-close {
  width: auto;
  right: 16px;
}
