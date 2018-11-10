/* widget archive */
.widget_archive ul li {
  font-style: italic;
  font-size: 0.95em;
  color: <?php echo esc_js($the_core_less_variables['fw-widget-inner-title-hover-color']); ?>;
}
.widget_archive ul li a {
  font-family: <?php echo ($the_core_less_variables['fw-widget-inner-title-font-family']); ?>;
  font-size: <?php echo esc_js($the_core_less_variables['fw-widget-inner-title-font-size']); ?>;
  font-weight: <?php echo esc_js($the_core_less_variables['fw-widget-inner-title-font-weight']); ?>;
  font-style: <?php echo esc_js($the_core_less_variables['fw-widget-inner-title-font-style']); ?>;
  line-height: <?php echo esc_js($the_core_less_variables['fw-widget-inner-title-line-height']); ?>;
  letter-spacing: <?php echo esc_js($the_core_less_variables['fw-widget-inner-title-letter-spacing']); ?>;
  color: <?php echo esc_js($the_core_less_variables['fw-widget-inner-title-color']); ?>;
}
.widget_archive ul li a:hover {
  color: <?php echo esc_js($the_core_less_variables['fw-widget-inner-title-hover-color']); ?>;
}
.fw-footer-widgets.footer-cols-4 .widget_archive ul li,
.fw-footer-widgets.footer-cols-5 .widget_archive ul li,
.fw-footer-widgets.footer-cols-6 .widget_archive ul li {
  float: none;
  width: 100%;
}

@media (min-width: 1200px) {
  .widget_archive ul li {
    float: left;
    width: 50%;
  }
}
.widget_archive .screen-reader-text {
  display: none;
}