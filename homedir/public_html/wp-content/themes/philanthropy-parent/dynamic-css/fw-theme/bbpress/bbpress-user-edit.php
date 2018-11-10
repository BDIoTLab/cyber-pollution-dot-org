/* bbPress User Edit */

/*-> bbpress User Edit Form */
#bbp-user-wrapper #bbp-your-profile fieldset {
  background-color: <?php echo the_core_hex2rgba($the_core_less_variables['text-color'], 0.1); ?>;
}
#bbp-user-wrapper #bbp-your-profile fieldset input[type="text"],
#bbp-user-wrapper #bbp-your-profile fieldset input[type="password"],
#bbp-user-wrapper #bbp-your-profile fieldset textarea {
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
#bbp-user-wrapper #bbp-your-profile fieldset input[type="text"]:focus,
#bbp-user-wrapper #bbp-your-profile fieldset input[type="password"]:focus,
#bbp-user-wrapper #bbp-your-profile fieldset textarea:focus {
  border-color: <?php echo the_core_adjustColorLightenDarken($the_core_less_variables['input-border'], 10); ?>;
  box-shadow: none;
}
#bbp-user-wrapper #bbp-your-profile fieldset.submit button {
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
#bbp-user-wrapper #bbp-your-profile fieldset.submit button span,
#bbp-user-wrapper #bbp-your-profile fieldset.submit button i {
  position: relative;
  top: 1px;
}
#bbp-user-wrapper #bbp-your-profile fieldset.submit button:hover,
#bbp-user-wrapper #bbp-your-profile fieldset.submit button:focus {
  text-decoration: none;
  outline: none;
}
#bbp-user-wrapper #bbp-your-profile fieldset.submit button i,
#bbp-user-wrapper #bbp-your-profile fieldset.submit button img {
  margin-right: 13px;
}
#bbp-user-wrapper #bbp-your-profile fieldset.submit button i.pull-right,
#bbp-user-wrapper #bbp-your-profile fieldset.submit button img.pull-right,
#bbp-user-wrapper #bbp-your-profile fieldset.submit button i.pull-right-icon,
#bbp-user-wrapper #bbp-your-profile fieldset.submit button img.pull-right-icon {
  margin-right: 0;
  margin-left: 13px;
  position: relative;
}
#bbp-user-wrapper #bbp-your-profile fieldset.submit button i.pull-right,
#bbp-user-wrapper #bbp-your-profile fieldset.submit button img.pull-right {
  top: 0.3em;
}
#bbp-user-wrapper #bbp-your-profile fieldset.submit button img {
  position: relative;
  top: -0.1em;
}
#bbp-user-wrapper #bbp-your-profile fieldset.submit button i {
  top: -1px;
  vertical-align: middle;
}
#bbp-user-wrapper #bbp-your-profile fieldset.submit button.fw-btn-side-by-side {
  margin-right: 10px;
}
#bbp-user-wrapper #bbp-your-profile fieldset.submit button.fw-btn-side-by-side:last-child {
  margin-right: 0;
}
#bbp-user-wrapper #bbp-your-profile fieldset.submit button:focus {
  background-color: <?php echo esc_js($the_core_less_variables['fw-btn-bg-color']); ?>;
  border-color: <?php echo esc_js($the_core_less_variables['fw-btn-border-color']); ?>;
  color: <?php echo esc_js($the_core_less_variables['fw-btn-text-color']); ?>;
}
#bbp-user-wrapper #bbp-your-profile fieldset.submit button:hover {
  background-color: <?php echo esc_js($the_core_less_variables['fw-btn-bg-color-hover']); ?>;
  color: <?php echo esc_js($the_core_less_variables['fw-btn-text-color-hover']); ?>;
}
#bbp-user-wrapper #bbp-your-profile fieldset.submit button:active {
  box-shadow: none;
}

#bbpress-forums .bbp-user-subscriptions h2.entry-title:first-child,
#bbpress-forums .bbp-user-profile h2.entry-title:first-child,
#bbpress-forums .bbp-user-topics-started h2.entry-title:first-child,
#bbpress-forums .bbp-user-replies-created h2.entry-title:first-child,
#bbpress-forums .bbp-user-favorites h2.entry-title:first-child,
#bbpress-forums form#bbp-your-profile h2.entry-title:first-child {
  line-height: 1em;
  margin-top: -2px !important;
  margin-bottom: 15px;
}
#bbpress-forums #bbp-your-profile fieldset {
  padding: 30px;
}
#bbpress-forums #bbp-your-profile fieldset .selectize-control {
  width: 60%;
  display: inline-block;
  float: none;
  vertical-align: middle;
  margin-bottom: 0;
}
#bbpress-forums #bbp-your-profile fieldset label[for="display_name"] {
  display: inline-block;
  float: none;
  vertical-align: top;
}
#bbpress-forums #bbp-your-profile fieldset .selectize-control .selectize-input,
#bbpress-forums #bbp-your-profile fieldset .selectize-control .selectize-input input,
#bbpress-forums #bbp-your-profile fieldset div:last-child input,
#bbpress-forums #bbp-your-profile fieldset div:last-child textarea {
  margin-bottom: 0;
}
#bbpress-forums #bbp-your-profile fieldset .selectize-control .selectize-input .item {
  margin-bottom: 0;
  float: none;
  width: auto;
}
#bbpress-forums fieldset.bbp-form #password .bbp-form.password {
  background-color: transparent;
  margin-bottom: 0;
}
#bbpress-forums form#bbp-your-profile .bbp-form {
  margin-bottom: 30px;
}
#bbpress-forums #bbp-your-profile fieldset div input,
#bbpress-forums #bbp-your-profile fieldset div textarea {
  margin-bottom: 20px;
}
#bbpress-forums #bbp-your-profile fieldset div {
  margin-bottom: 0;
}
#bbp-user-wrapper #bbp-your-profile fieldset.submit {
  margin-top: -30px;
}
#bbpress-forums #bbp-user-wrapper ul.bbp-lead-topic,
#bbpress-forums #bbp-user-wrapper ul.bbp-topics,
#bbpress-forums #bbp-user-wrapper ul.bbp-forums,
#bbpress-forums #bbp-user-wrapper ul.bbp-replies {
  clear: left;
}
#bbpress-forums #bbp-user-wrapper fieldset.bbp-form {
  clear: none;
}
.bbp-row-actions #favorite-toggle span.is-favorite a,
.bbp-row-actions #subscription-toggle span.is-subscribed a {
  color: #ff0000;
  border: none;
  background-color: transparent;
}
.bbp-row-actions #favorite-toggle span.is-favorite a:hover,
.bbp-row-actions #subscription-toggle span.is-subscribed a:hover{
  color: #ff0000;
  opacity: 0.7;
  border: none;
  background-color: transparent;
}
.bbp-row-actions #favorite-toggle a,
.bbp-row-actions #subscription-toggle a {
  font-size: 26px;
}
