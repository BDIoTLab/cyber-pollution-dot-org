/* Woocommerce Widget Layered Nav */
/* -------------------------------------------------- */
/* Layered Nav Filters */
.woocommerce.widget_layered_nav_filters ul li {
  margin-right: <?php echo esc_js($the_core_less_variables['fw-content-density-lg']); ?>;
}
.woocommerce.widget_layered_nav_filters ul li a {
  font-family: <?php echo ($the_core_less_variables['fw-widget-inner-title-font-family']); ?>;
  font-size: <?php echo esc_js($the_core_less_variables['fw-widget-inner-title-font-size']); ?>;
  font-weight: <?php echo esc_js($the_core_less_variables['fw-widget-inner-title-font-weight']); ?>;
  font-style: <?php echo esc_js($the_core_less_variables['fw-widget-inner-title-font-style']); ?>;
  line-height: <?php echo esc_js($the_core_less_variables['fw-widget-inner-title-line-height']); ?>;
  letter-spacing: <?php echo esc_js($the_core_less_variables['fw-widget-inner-title-letter-spacing']); ?>;
  color: <?php echo esc_js($the_core_less_variables['fw-widget-inner-title-color']); ?>;
}
.woocommerce.widget_layered_nav_filters ul li a:before {
  color: <?php echo esc_js($the_core_less_variables['fw-widget-inner-title-color']); ?>;
}
.woocommerce.widget_layered_nav_filters ul li a:hover {
  color: <?php echo esc_js($the_core_less_variables['fw-widget-inner-title-hover-color']); ?>;
}
.woocommerce.widget_layered_nav_filters ul li a:hover:before {
  color: <?php echo esc_js($the_core_less_variables['fw-widget-inner-title-hover-color']); ?>;
}

/* Layered Nav */
.woocommerce.widget_layered_nav ul li.chosen a:before {
  color: #fff;
}
.woocommerce.widget_layered_nav ul li a:before {
  color: #fff;
}
