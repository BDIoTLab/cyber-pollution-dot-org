/* Widget Text */
.widget_text .textwidget a {
  font-family: <?php echo ($the_core_less_variables['fw-widget-inner-title-font-family']); ?>;
  font-size: <?php echo esc_js($the_core_less_variables['fw-widget-inner-title-font-size']); ?>;
  font-weight: <?php echo esc_js($the_core_less_variables['fw-widget-inner-title-font-weight']); ?>;
  font-style: <?php echo esc_js($the_core_less_variables['fw-widget-inner-title-font-style']); ?>;
  line-height: <?php echo esc_js($the_core_less_variables['fw-widget-inner-title-line-height']); ?>;
  letter-spacing: <?php echo esc_js($the_core_less_variables['fw-widget-inner-title-letter-spacing']); ?>;
  color: <?php echo esc_js($the_core_less_variables['fw-widget-inner-title-color']); ?>;
}
.widget_text .textwidget a:hover {
  color: <?php echo esc_js($the_core_less_variables['fw-widget-inner-title-hover-color']); ?>;
}
.widget_text .textwidget .wp-caption img {
  height: auto;
}
.widget_text .textwidget form select {
  max-width: 100%;
}
.widget_text .textwidget ul {
  list-style: inherit;
}
.widget_text .textwidget ul,
.widget_text .textwidget ol {
  padding-left: 20px;
  margin-bottom: 1em;
}