/* Recent Entries */
.widget_recent_entries ul li {
  margin-bottom: 1em;
}
.widget_recent_entries ul li a {
  font-family: <?php echo ($the_core_less_variables['fw-widget-inner-title-font-family']); ?>;
  font-size: <?php echo esc_js($the_core_less_variables['fw-widget-inner-title-font-size']); ?>;
  font-weight: <?php echo esc_js($the_core_less_variables['fw-widget-inner-title-font-weight']); ?>;
  font-style: <?php echo esc_js($the_core_less_variables['fw-widget-inner-title-font-style']); ?>;
  line-height: <?php echo esc_js($the_core_less_variables['fw-widget-inner-title-line-height']); ?>;
  letter-spacing: <?php echo esc_js($the_core_less_variables['fw-widget-inner-title-letter-spacing']); ?>;
  color: <?php echo esc_js($the_core_less_variables['fw-widget-inner-title-color']); ?>;
  -webkit-transition: all 0.3s ease;
  -o-transition: all 0.3s ease;
  transition: all 0.3s ease;
}
.widget_recent_entries ul li a:hover {
  color: <?php echo esc_js($the_core_less_variables['fw-widget-inner-title-hover-color']); ?>;
}