/* buddyPress Profile */
#buddypress table.forum tr td.label,
#buddypress table.messages-notices tr td.label,
#buddypress table.notifications tr td.label,
#buddypress table.notifications-settings tr td.label,
#buddypress table.profile-fields tr td.label,
#buddypress table.wp-profile-fields tr td.label {
  color: <?php echo esc_js($the_core_less_variables['text-color']); ?>;
  font-size: <?php echo floor(floatval($the_core_less_variables['font-size-base'])*0.85); ?>px;
  display: table-cell;
  border-radius: 0;
}
#buddypress table.forum tr td,
#buddypress table.messages-notices tr td,
#buddypress table.notifications tr td,
#buddypress table.notifications-settings tr td,
#buddypress table.profile-fields tr td,
#buddypress table.wp-profile-fields tr td{
  border-width: 0 1px 1px 0;
}
#buddypress table,
#buddypress table,
#buddypress table,
#buddypress table,
#buddypress table,
#buddypress table {
  border-width: 1px 0 0 1px;
}
#buddypress div.profile h4 {
  margin-bottom: 10px;
  margin-top: 20px;
}
#buddypress .wp-editor-wrap .wp-editor-tools button {
  padding: 8px 15px;
}
#buddypress .profile .single-fields .datebox .selectize-control {
  width: auto;
  display: inline-block;
}
#buddypress .profile .single-fields .datebox .selectize-control .selectize-input input[type="text"]{
  padding-left: 20px !important;
}
#buddypress .standard-form .wp-editor-container textarea {
  border: none;
  background: none;
}
#buddypress #profile-edit-form .field-visibility-settings .radio li {
  margin-bottom: 5px;
}
#buddypress #profile-edit-form .field_multiselectbox .selectize-control .selectize-input .item {
  background: #fff;
  border-color: #fff;
  margin: 0 5px 0 0;
}
#buddypress #profile-edit-form .field_multiselectbox .selectize-control .selectize-input .item:last-child {
  margin-right: 0;
}
#buddypress #profile-edit-form .field_multiselectbox .selectize-control .selectize-input {
  padding: 12px 15px;
}
#buddypress #profile-edit-form .datebox .selectize-control .selectize-input,
#buddypress #profile-edit-form .field_selectbox .selectize-control .selectize-input,
#buddypress #profile-edit-form .field_multiselectbox .selectize-control .selectize-input {
  background-color: <?php echo the_core_hex2rgba($the_core_less_variables['fw-widget-input-bg'], 0.07); ?>;
}
#buddypress #profile-edit-form ul.button-nav,
#buddypress .field-visibility-settings .radio {
  padding-left: 0;
}
#buddypress .field-visibility-settings .radio {
  margin-top: 0;
}
