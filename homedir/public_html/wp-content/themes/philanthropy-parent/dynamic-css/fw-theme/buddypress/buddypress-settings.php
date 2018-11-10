/* buddyPress Settings Page */
#buddypress #pass-strength-result.short {
  color: #fff;
}
#buddypress table.notification-settings th,
#buddypress table.notification-settings td,
#buddypress table.profile-settings#xprofile-settings-base th,
#buddypress table.profile-settings#xprofile-settings-base td,
#buddypress table.profile-settings#xprofile-settings-single-fields th,
#buddypress table.profile-settings#xprofile-settings-single-fields td,
#buddypress table.profile-settings#xprofile-settings-multi-fields th,
#buddypress table.profile-settings#xprofile-settings-multi-fields td {
  border-width: 0 1px 1px 0;
}
#buddypress .standard-form table.notification-settings label,
#buddypress .standard-form table.notification-settings span.label {
  margin: 10px 0;
}
#buddypress .standard-form table.notification-settings .custom-checkbox label,
#buddypress .standard-form table.notification-settings .custom-radio label {
  padding-left: 15px;
}
#buddypress table.profile-settings#xprofile-settings-base,
#buddypress table.profile-settings#xprofile-settings-single-fields {
  margin-bottom: 30px;
}
#buddypress table.profile-settings#xprofile-settings-multi-fields {
  margin-bottom: 20px;
}
#buddypress .standard-form#settings-form label {
  font-family: <?php echo ($the_core_less_variables['form-label-font-family']); ?>;
  font-size: <?php echo esc_js($the_core_less_variables['form-label-font-size']); ?>;
  font-style: <?php echo esc_js($the_core_less_variables['form-label-font-style']); ?>;
  font-weight: <?php echo esc_js($the_core_less_variables['form-label-font-weight']); ?>;
  line-height: <?php echo esc_js($the_core_less_variables['form-label-line-height']); ?>;
  letter-spacing: <?php echo esc_js($the_core_less_variables['form-label-letter-spacing']); ?>;
  color: <?php echo esc_js($the_core_less_variables['form-label-color']); ?>;
  text-transform: <?php echo esc_js($the_core_less_variables['form-label-text-transform']); ?>;
}
#buddypress .standard-form#settings-form table.profile-settings .selectize-control .selectize-input {
  background-color: <?php echo the_core_hex2rgba($the_core_less_variables['fw-widget-input-bg'], 0.07); ?>;
}
