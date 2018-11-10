/* Custom Styled CheckBox  & Radio */
/*-----------------------------------*/
.custom-checkbox,
.custom-radio {
  position: relative;
}
.custom-checkbox input,
.custom-radio input {
  -webkit-appearance: none;
  -moz-appearance: none;
  appearance: none;
  position: absolute;
  top: 0;
  left: 10px;
  margin: 0;
  border: none;
  width: 1px;
  height: 1px;
  display: none;
}
.custom-checkbox label,
.custom-radio label,
.custom-checkbox .wpcf7-list-item-label,
.custom-radio .wpcf7-list-item-label {
  display: block;
  position: relative;
  padding-left: 24px;
  margin-bottom: 1.2em;
  line-height: normal !important;
  min-height: 14px;
  cursor: pointer;
  font-family: <?php echo ($the_core_less_variables['form-label-font-family']); ?>;
  font-size: <?php echo esc_js($the_core_less_variables['form-label-font-size']); ?>;
  font-style: <?php echo esc_js($the_core_less_variables['form-label-font-style']); ?>;
  font-weight: <?php echo esc_js($the_core_less_variables['form-label-font-weight']); ?>;
  letter-spacing: <?php echo esc_js($the_core_less_variables['form-label-letter-spacing']); ?>;
  color: <?php echo esc_js($the_core_less_variables['form-label-color']); ?>;
}
.custom-checkbox label:before,
.custom-radio label:before,
.custom-checkbox .wpcf7-list-item-label:before,
.custom-radio .wpcf7-list-item-label:before {
  width: 14px;
  height: 14px;
  -webkit-transition: all .3s ease-out;
  -o-transition: all .3s ease-out;
  transition: all .3s ease-out;
}
.custom-checkbox label:after,
.custom-radio label:after,
.custom-checkbox .wpcf7-list-item-label:after,
.custom-radio .wpcf7-list-item-label:after {
  width: 6px;
  height: 6px;
}
.custom-checkbox label.checked:after,
.custom-checkbox .wpcf7-list-item-label.checked:after {
  background: <?php echo esc_js($the_core_less_variables['theme-color-1']); ?>;
}
.custom-radio label.checked:after,
.custom-radio .wpcf7-list-item-label.checked:after {
  background: <?php echo esc_js($the_core_less_variables['theme-color-1']); ?>;
}
.custom-checkbox::selection,
.custom-radio::selection {
  background: transparent;
  color: inherit;
}
.custom-checkbox label::selection,
.custom-checkbox .wpcf7-list-item-label::selection,
.custom-radio .wpcf7-list-item-label::selection,
.custom-radio label::selection {
  background: transparent;
  color: inherit;
}
.custom-checkbox label.focus,
.custom-checkbox .wpcf7-list-item-label.focus,
.custom-radio .wpcf7-list-item-label.focus,
.custom-radio label.focus {
  outline: none;
}
.custom-checkbox label:before,
.custom-checkbox .wpcf7-list-item-label:before,
.custom-radio label:before,
.custom-radio .wpcf7-list-item-label:before,
.custom-checkbox label:after,
.custom-checkbox .wpcf7-list-item-label:after,
.custom-radio label:after,
.custom-radio .wpcf7-list-item-label:after {
  content: '';
  position: absolute;
  top: 50%;
  left: 0;
}
.custom-checkbox label:before,
.custom-checkbox .wpcf7-list-item-label:before,
.custom-radio .wpcf7-list-item-label:before,
.custom-radio label:before {
  border-radius: 1px;
  border: 1px solid #bfbfbf;
  background: #fff;
  margin-top: -7px;
}
.custom-checkbox label.checked:before,
.custom-checkbox .wpcf7-list-item-label.checked:before,
.custom-radio label.checked:before,
.custom-radio .wpcf7-list-item-label.checked:before {
  background: #fff;
}
.custom-checkbox label:after,
.custom-checkbox .wpcf7-list-item-label:after,
.custom-radio label:after,
.custom-radio .wpcf7-list-item-label:after {
  margin-top: -3px;
  left: 4px;
}
.custom-radio label.checked:after,
.custom-radio .wpcf7-list-item-label.checked:after {
  border-radius: 50%;
}
.custom-radio label:before,
.custom-radio .wpcf7-list-item-label:before,
.custom-radio label.checked:after,
.custom-radio .wpcf7-list-item-label.checked:after {
  border-radius: 50%;
}
.ie8 .custom-checkbox input,
.ie8 .custom-radio input {
  display: block;
}