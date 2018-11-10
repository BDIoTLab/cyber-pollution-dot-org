/* Woocommerce Widget Price Filter */
/* -------------------------------------------------- */
.woocommerce.widget_price_filter .ui-slider .ui-slider-handle {
  background-color: <?php echo the_core_adjustColorLightenDarken($the_core_less_variables['fw-widget-inner-title-color'], 20); ?>;
}
.woocommerce.widget_price_filter .ui-slider .ui-slider-range {
  background-color: <?php echo esc_js($the_core_less_variables['fw-widget-inner-title-color']); ?>;
}
.woocommerce.widget_price_filter .price_slider_wrapper .ui-widget-content {
  background-color: <?php echo esc_js($the_core_less_variables['fw-widget-inner-title-hover-color']); ?>;
}
.woocommerce.widget_price_filter .price_slider_amount .button {
  font-size: <?php echo esc_js($the_core_less_variables['fw-buttons-font-size']); ?>;
}
