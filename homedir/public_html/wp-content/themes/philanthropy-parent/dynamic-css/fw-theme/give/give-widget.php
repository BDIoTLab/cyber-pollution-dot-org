/* Give Widget */
/* -------------------------------------------------- */
.widget_give_forms_widget .give-form-wrap form.give-form,
.widget_give_forms_widget .give-form-wrap form[id*=give-form] {
  color: <?php echo esc_js($the_core_less_variables['text-color']); ?>;
}
.widget_give_forms_widget .give-form-wrap form.give-form input.give-input,
.widget_give_forms_widget .give-form-wrap form[id*=give-form] input.give-input {
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
.widget_give_forms_widget .give-form-wrap form.give-form input.give-input::-moz-placeholder,
.widget_give_forms_widget .give-form-wrap form[id*=give-form] input.give-input::-moz-placeholder {
  color: <?php echo the_core_hex2rgba($the_core_less_variables['fw-widget-inner-title-color'], 0.25); ?>;
  opacity: 1;
}
.widget_give_forms_widget .give-form-wrap form.give-form input.give-input:-ms-input-placeholder,
.widget_give_forms_widget .give-form-wrap form[id*=give-form] input.give-input:-ms-input-placeholder {
  color: <?php echo the_core_hex2rgba($the_core_less_variables['fw-widget-inner-title-color'], 0.25); ?>;
}
.widget_give_forms_widget .give-form-wrap form.give-form input.give-input::-webkit-input-placeholder,
.widget_give_forms_widget .give-form-wrap form[id*=give-form] input.give-input::-webkit-input-placeholder {
  color: <?php echo the_core_hex2rgba($the_core_less_variables['fw-widget-inner-title-color'], 0.25); ?>;
}
.widget_give_forms_widget .give-form-wrap form.give-form .give-currency-symbol,
.widget_give_forms_widget .give-form-wrap form[id*=give-form] .give-currency-symbol,
.widget_give_forms_widget .give-form-wrap form.give-form #give-final-total-wrap .give-donation-total-label,
.widget_give_forms_widget .give-form-wrap form[id*=give-form] #give-final-total-wrap .give-donation-total-label {
  background-color: <?php echo the_core_hex2rgba($the_core_less_variables['fw-widget-input-bg'], 0.07); ?>;
  border-color: <?php echo the_core_hex2rgba($the_core_less_variables['fw-widget-input-bg'], 0.2); ?>;
}
.widget_give_forms_widget .give-form-wrap form.give-form .give-currency-symbol,
.widget_give_forms_widget .give-form-wrap form[id*=give-form] .give-currency-symbol,
.widget_give_forms_widget .give-form-wrap form.give-form #give-final-total-wrap .give-donation-total-label,
.widget_give_forms_widget .give-form-wrap form[id*=give-form] #give-final-total-wrap .give-donation-total-label,
.widget_give_forms_widget .give-form-wrap form.give-form #give-final-total-wrap .give-final-total-amount,
.widget_give_forms_widget .give-form-wrap form[id*=give-form] #give-final-total-wrap .give-final-total-amount {
  color: <?php echo the_core_hex2rgba($the_core_less_variables['fw-widget-inner-title-color'], 0.5); ?>;
}
.widget_give_forms_widget .give-form-wrap form.give-form #give-final-total-wrap .give-final-total-amount,
.widget_give_forms_widget .give-form-wrap form[id*=give-form] #give-final-total-wrap .give-final-total-amount,
.widget_give_forms_widget .give-form-wrap form.give-form .give-donation-amount #give-amount,
.widget_give_forms_widget .give-form-wrap form[id*=give-form] .give-donation-amount #give-amount,
.widget_give_forms_widget .give-form-wrap form.give-form .give-donation-amount #give-amount-text,
.widget_give_forms_widget .give-form-wrap form[id*=give-form] .give-donation-amount #give-amount-text {
  border-color: <?php echo the_core_hex2rgba($the_core_less_variables['fw-widget-input-bg'], 0.2); ?>;
}
.widget_give_forms_widget .give-form-wrap form.give-form .custom-checkbox label,
.widget_give_forms_widget .give-form-wrap form[id*=give-form] .custom-checkbox label,
.widget_give_forms_widget .give-form-wrap form.give-form .custom-radio label,
.widget_give_forms_widget .give-form-wrap form[id*=give-form] .custom-radio label {
  color: <?php echo esc_js($the_core_less_variables['text-color']); ?>;
}
.widget_give_forms_widget .give-form-wrap form.give-form legend,
.widget_give_forms_widget .give-form-wrap form[id*=give-form] legend {
  color: <?php echo esc_js($the_core_less_variables['fw-widget-inner-title-color']); ?>;
  border-bottom-color: #dee0e1;
}
.widget_give_forms_widget .give-form-wrap form.give-form .selectize-input,
.widget_give_forms_widget .give-form-wrap form[id*=give-form] .selectize-input {
  background-color: <?php echo the_core_hex2rgba($the_core_less_variables['fw-widget-input-bg'], 0.07); ?>;
  border: none;
}
.widget_give_forms_widget .give-form-wrap .give-goal-progress .income {
  color: <?php echo esc_js($the_core_less_variables['fw-widget-inner-title-color']); ?>;
}
.widget_give_forms_widget form.floated-labels .floatlabel.is-active label.floatlabel-label,
.widget_give_forms_widget form.floated-labels .floatlabel.is-focused label.floatlabel-label {
  color: <?php echo esc_js($the_core_less_variables['form-label-color']); ?>;
}
