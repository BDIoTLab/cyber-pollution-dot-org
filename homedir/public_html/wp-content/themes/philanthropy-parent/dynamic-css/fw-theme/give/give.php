/* Give Donation Plugin Style */
/* -------------------------------------------------- */
.give-page .post-details {
  margin-bottom: 0;
}
.give-page .post-details .entry-content {
  padding-bottom: 0;
  border-bottom: none;
}
.give-progress-bar {
  background-color: rgba(204, 204, 204, 0.4);
  height: 8px;
}
.give-goal-progress .income {
  font-size: inherit;
  line-height: inherit;
  letter-spacing: inherit;
  color: inherit;
}
form[id*=give-form] #give-final-total-wrap .give-final-total-amount {
  background-color: #fff;
}
form.give-form legend,
form[id*=give-form] legend,
[id*=give-form] .give-form-title,
form.give-form .give-form-title{
  color: #1f1f1f;
}
form.give-form #give_checkout_login_register #give_register_account_fields,
form[id*=give-form] #give_checkout_login_register #give_register_account_fields {
  margin-top: 10px;
}
form.give-form #give_checkout_login_register #give_register_account_fields .sub-text,
form[id*=give-form] #give_checkout_login_register #give_register_account_fields .sub-text {
  font-size: 15px;
}
form.give-form #give_checkout_login_register #give_register_account_fields label[for="password"],
form[id*=give-form] #give_checkout_login_register #give_register_account_fields label[for="password"],
form.give-form #give_checkout_login_register #give_register_account_fields label[for="password_again"],
form[id*=give-form] #give_checkout_login_register #give_register_account_fields label[for="password_again"] {
  display: none;
}
form.give-form #give_checkout_login_register #give_register_account_fields > legend,
form[id*=give-form] #give_checkout_login_register #give_register_account_fields > legend {
  padding-bottom: 0;
}
.give-page form.give-form .form-row input[type="text"],
.give-page form[id*=give-form] .form-row input[type="text"],
.give-page form.give-form.floated-labels .form-row input[type="text"],
.give-page form[id*=give-form].floated-labels .form-row input[type="text"],
.give-page form.give-form .form-row input[type="email"],
.give-page form[id*=give-form] .form-row input[type="email"],
.give-page form.give-form.floated-labels .form-row input[type="email"],
.give-page form[id*=give-form].floated-labels .form-row input[type="email"],
.give-page form.give-form .form-row input[type="password"],
.give-page form[id*=give-form] .form-row input[type="password"],
.give-page form.give-form.floated-labels .form-row input[type="password"],
.give-page form[id*=give-form].floated-labels .form-row input[type="password"],
.give-page form.give-form .form-row input[type="tel"],
.give-page form[id*=give-form] .form-row input[type="tel"],
.give-page form.give-form.floated-labels .form-row input[type="tel"],
.give-page form[id*=give-form].floated-labels .form-row input[type="tel"],
.give-page form.give-form .form-row input[type="url"],
.give-page form[id*=give-form] .form-row input[type="url"],
.give-page form.give-form.floated-labels .form-row input[type="url"],
.give-page form[id*=give-form].floated-labels .form-row input[type="url"],
.give-page form.give-form .form-row textarea,
.give-page form[id*=give-form] .form-row textarea,
.give-page form.give-form.floated-labels .form-row textarea,
.give-page form[id*=give-form].floated-labels .form-row textarea {
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
.give-page form.give-form .give-currency-symbol,
.give-page form[id*=give-form] .give-currency-symbol,
.give-page form.give-form.floated-labels .give-currency-symbol,
.give-page form[id*=give-form].floated-labels .give-currency-symbol,
.give-page form.give-form #give-final-total-wrap .give-donation-total-label,
.give-page form[id*=give-form] #give-final-total-wrap .give-donation-total-label,
.give-page form.give-form.floated-labels #give-final-total-wrap .give-donation-total-label,
.give-page form[id*=give-form].floated-labels #give-final-total-wrap .give-donation-total-label {
  border-color: rgba(0, 0, 0, 0.13);
  color: <?php echo esc_js($the_core_less_variables['input-color']); ?>;
}
.give-page form.give-form #give-final-total-wrap .give-final-total-amount,
.give-page form[id*=give-form] #give-final-total-wrap .give-final-total-amount,
.give-page form.give-form.floated-labels #give-final-total-wrap .give-final-total-amount,
.give-page form[id*=give-form].floated-labels #give-final-total-wrap .give-final-total-amount {
  color: <?php echo esc_js($the_core_less_variables['input-color']); ?>;
}
.give-page form.give-form .selectize-input,
.give-page form[id*=give-form] .selectize-input,
.give-page form.give-form.floated-labels .selectize-input,
.give-page form[id*=give-form].floated-labels .selectize-input {
  border: 1px solid rgba(0, 0, 0, 0.13);
  line-height: <?php echo esc_js($the_core_less_variables['input-line-height']); ?>;
}
.give-page form.give-form.floated-labels .floatlabel.is-focused label.floatlabel-label,
.give-page form[id*=give-form].floated-labels .floatlabel.is-focused label.floatlabel-label,
.give-page form.give-form.floated-labels.floated-labels .floatlabel.is-focused label.floatlabel-label,
.give-page form[id*=give-form].floated-labels.floated-labels .floatlabel.is-focused label.floatlabel-label {
  color: <?php echo esc_js($the_core_less_variables['form-label-color']); ?>;
}
.give-btn,
.give_submit,
input.button[name="give_register_submit"] {
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
  /* fw-btn-sm */
  padding: <?php echo esc_js($the_core_less_variables['padding-small-vertical']); ?> <?php echo esc_js($the_core_less_variables['padding-small-horizontal']); ?>;
  font-size: <?php echo ceil(floatval($the_core_less_variables['fw-buttons-font-size'])*0.85); ?>px;
  line-height: <?php echo ceil(floatval($the_core_less_variables['fw-buttons-line-height'])*0.85); ?>px;
}
.give-btn span,
.give_submit span,
input.button[name="give_register_submit"] span,
.give-btn i,
.give_submit i,
input.button[name="give_register_submit"] i {
  position: relative;
  top: 1px;
}
.give-btn:hover,
.give_submit:hover,
input.button[name="give_register_submit"]:hover,
.give-btn:focus,
.give_submit:focus,
input.button[name="give_register_submit"]:focus {
  text-decoration: none;
  outline: none;
}
.give-btn i,
.give_submit i,
input.button[name="give_register_submit"] i,
.give-btn img,
.give_submit img,
input.button[name="give_register_submit"] img {
  margin-right: 13px;
}
.give-btn i.pull-right,
.give_submit i.pull-right,
input.button[name="give_register_submit"] i.pull-right,
.give-btn img.pull-right,
.give_submit img.pull-right,
input.button[name="give_register_submit"] img.pull-right,
.give-btn i.pull-right-icon,
.give_submit i.pull-right-icon,
input.button[name="give_register_submit"] i.pull-right-icon,
.give-btn img.pull-right-icon,
.give_submit img.pull-right-icon,
input.button[name="give_register_submit"] img.pull-right-icon {
  margin-right: 0;
  margin-left: 13px;
  position: relative;
}
.give-btn i.pull-right,
.give_submit i.pull-right,
input.button[name="give_register_submit"] i.pull-right,
.give-btn img.pull-right,
.give_submit img.pull-right,
input.button[name="give_register_submit"] img.pull-right {
  top: 0.3em;
}
.give-btn img,
.give_submit img,
input.button[name="give_register_submit"] img {
  position: relative;
  top: -0.1em;
}
.give-btn i,
.give_submit i,
input.button[name="give_register_submit"] i {
  top: -1px;
  vertical-align: middle;
}
.give-btn.fw-btn-side-by-side,
.give_submit.fw-btn-side-by-side,
input.button[name="give_register_submit"].fw-btn-side-by-side {
  margin-right: 10px;
}
.give-btn.fw-btn-side-by-side:last-child,
.give_submit.fw-btn-side-by-side:last-child,
input.button[name="give_register_submit"].fw-btn-side-by-side:last-child {
  margin-right: 0;
}
.give-btn:focus,
.give_submit:focus,
input.button[name="give_register_submit"]:focus {
  background-color: <?php echo esc_js($the_core_less_variables['fw-btn-bg-color']); ?>;
  border-color: <?php echo esc_js($the_core_less_variables['fw-btn-border-color']); ?>;
  color: <?php echo esc_js($the_core_less_variables['fw-btn-text-color']); ?>;
}
.give-btn:hover,
.give_submit:hover,
input.button[name="give_register_submit"]:hover {
  background-color: <?php echo esc_js($the_core_less_variables['fw-btn-bg-color-hover']); ?>;
  color: <?php echo esc_js($the_core_less_variables['fw-btn-text-color-hover']); ?>;
}
.give-btn:active,
.give_submit:active,
input.button[name="give_register_submit"]:active {
  box-shadow: none;
}
table.give-table {
  color: <?php echo esc_js($the_core_less_variables['text-color']); ?>;
  text-shadow: none;
}

/* Give Other Style */
