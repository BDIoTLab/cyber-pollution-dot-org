/* Widget bbPress Statistics */
.widget_display_stats dl[role="main"] {
  margin-bottom: 0;
}
.widget_display_stats dl[role="main"] dt {
  font-family: <?php echo ($the_core_less_variables['fw-widget-inner-title-font-family']); ?>;
  font-size: <?php echo esc_js($the_core_less_variables['fw-widget-inner-title-font-size']); ?>;
  font-weight: <?php echo esc_js($the_core_less_variables['fw-widget-inner-title-font-weight']); ?>;
  font-style: <?php echo esc_js($the_core_less_variables['fw-widget-inner-title-font-style']); ?>;
  line-height: <?php echo esc_js($the_core_less_variables['fw-widget-inner-title-line-height']); ?>;
  letter-spacing: <?php echo esc_js($the_core_less_variables['fw-widget-inner-title-letter-spacing']); ?>;
  color: <?php echo esc_js($the_core_less_variables['fw-widget-inner-title-color']); ?>;
  float: left;
  margin-right: 7px;
}
.widget_display_stats dl[role="main"] dd strong {
  color: <?php echo esc_js($the_core_less_variables['fw-widget-inner-title-hover-color']); ?>;
  font-style: italic;
  position: relative;
  top: 3px;
}
.widget_display_stats dl[role="main"] dt,
.widget_display_stats dl[role="main"] dd {
  height: <?php echo esc_js($the_core_less_variables['fw-widget-inner-title-line-height']); ?>;
  display: block;
}
