/* Styles for standard selects */

/* when selectize.js not used */
/* archive as dropdown */
.wp-widget-select select,
.widget_categories select,
.widget_archive select {
  height: <?php echo esc_js($the_core_less_variables['input-height-base']); ?>;
  padding-left: <?php echo esc_js($the_core_less_variables['input-padding-x']); ?>;
  color: <?php echo esc_js($the_core_less_variables['theme-color-2']); ?>;
  background-color: <?php echo esc_js($the_core_less_variables['theme-color-4']); ?>;
  font-family: <?php echo ($the_core_less_variables['fw-buttons-font-family']); ?>;
  font-weight: <?php echo esc_js($the_core_less_variables['fw-buttons-font-weight']); ?>;
  font-style: <?php echo esc_js($the_core_less_variables['fw-buttons-font-style']); ?>;
  font-size: <?php echo esc_js($the_core_less_variables['input-font-size']); ?>;
  border: none;
}
.wp-widget-select select option {
  padding: 3px 5px;
}