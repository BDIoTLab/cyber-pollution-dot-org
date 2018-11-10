/* Woocommerce Widget Top Rated Product */
/* -------------------------------------------------- */
.woocommerce.widget_top_rated_products {
  overflow: hidden;
}
.woocommerce.widget_top_rated_products ul.product_list_widget li a {
  font-family: <?php echo ($the_core_less_variables['fw-widget-inner-title-font-family']); ?>;
  font-size: <?php echo esc_js($the_core_less_variables['fw-widget-inner-title-font-size']); ?>;
  font-weight: <?php echo esc_js($the_core_less_variables['fw-widget-inner-title-font-weight']); ?>;
  font-style: <?php echo esc_js($the_core_less_variables['fw-widget-inner-title-font-style']); ?>;
  line-height: <?php echo esc_js($the_core_less_variables['fw-widget-inner-title-line-height']); ?>;
  letter-spacing: <?php echo esc_js($the_core_less_variables['fw-widget-inner-title-letter-spacing']); ?>;
  color: <?php echo esc_js($the_core_less_variables['fw-widget-inner-title-color']); ?>;
}
.woocommerce.widget_top_rated_products ul.product_list_widget li a:hover {
  color: <?php echo esc_js($the_core_less_variables['fw-widget-inner-title-hover-color']); ?>;
}

/* Style for this widget in footer */
.fw-footer-widgets .woocommerce.widget_top_rated_products ul.product_list_widget li a {
  color: <?php echo esc_js($the_core_less_variables['fw-footer-widgets-link-color']); ?>;
}
.fw-footer-widgets .woocommerce.widget_top_rated_products ul.product_list_widget li a:hover {
  color: <?php echo the_core_adjustColorLightenDarken($the_core_less_variables['fw-footer-widgets-link-color'], 10); ?>;
}

