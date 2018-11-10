/* Woocommerce Widget Cart */
/* -------------------------------------------------- */
ul.cart_list li,
ul.product_list_widget li {
  padding: 8px 0;
  border-bottom: 1px solid rgba(0, 0, 0, 0.1);
}
ul.cart_list li a,
ul.product_list_widget li a {
  font-family: <?php echo ($the_core_less_variables['font-family-2']); ?>;
  font-weight: 400;
  font-style: normal;
}
.woocommerce.widget_shopping_cart a.button {
  /* fw-btn */
  font-family: <?php echo ($the_core_less_variables['fw-buttons-font-family']); ?>;
  font-weight: <?php echo esc_js($the_core_less_variables['fw-buttons-font-weight']); ?>;
  font-style: <?php echo esc_js($the_core_less_variables['fw-buttons-font-style']); ?>;
  font-size: <?php echo esc_js($the_core_less_variables['fw-buttons-font-size']); ?>;
  line-height: <?php echo esc_js($the_core_less_variables['fw-buttons-line-height']); ?>;
  letter-spacing: <?php echo esc_js($the_core_less_variables['fw-buttons-letter-spacing']); ?>;
  color: #fff !important;
  display: inline-block;
  margin-bottom: 0;
  text-align: center;
  vertical-align: middle;
  cursor: pointer;
  background-image: none;
  border: 1px solid transparent;
  text-decoration: none;
  white-space: nowrap;
  outline: none;
  position: relative;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
  -webkit-transition: all 0.3s ease;
  -o-transition: all 0.3s ease;
  transition: all 0.3s ease;
  max-width: 100%;
  /* fw-btn-1 */
  background-color: <?php echo esc_js($the_core_less_variables['fw-btn-bg-color']); ?>;
  border-color: <?php echo esc_js($the_core_less_variables['fw-btn-border-color']); ?>;
  border-width: <?php echo esc_js($the_core_less_variables['fw-btn-border-width']); ?>;
  border-radius: <?php echo esc_js($the_core_less_variables['fw-btn-radius']); ?>;
  /* fw-btn-md */
  padding: <?php echo esc_js($the_core_less_variables['padding-base-vertical']); ?> <?php echo esc_js($the_core_less_variables['padding-base-horizontal']); ?>;
  font-size: <?php echo esc_js($the_core_less_variables['fw-buttons-font-size']); ?>;
  line-height: <?php echo esc_js($the_core_less_variables['fw-buttons-line-height']); ?>;
}
.woocommerce.widget_shopping_cart a.button span,
.woocommerce.widget_shopping_cart a.button i {
  position: relative;
  top: 1px;
}
.woocommerce.widget_shopping_cart a.button:hover,
.woocommerce.widget_shopping_cart a.button:focus {
  text-decoration: none;
  outline: none;
}
.woocommerce.widget_shopping_cart a.button i,
.woocommerce.widget_shopping_cart a.button img {
  margin-right: 13px;
}
.woocommerce.widget_shopping_cart a.button i.pull-right,
.woocommerce.widget_shopping_cart a.button img.pull-right,
.woocommerce.widget_shopping_cart a.button i.pull-right-icon,
.woocommerce.widget_shopping_cart a.button img.pull-right-icon {
  margin-right: 0;
  margin-left: 13px;
  position: relative;
}
.woocommerce.widget_shopping_cart a.button i.pull-right,
.woocommerce.widget_shopping_cart a.button img.pull-right {
  top: 0.3em;
}
.woocommerce.widget_shopping_cart a.button img {
  position: relative;
  top: -0.1em;
}
.woocommerce.widget_shopping_cart a.button i {
  top: -1px;
  vertical-align: middle;
}
/* Button side by side */
.woocommerce.widget_shopping_cart a.button.fw-btn-side-by-side {
  margin-right: 10px;
}
.woocommerce.widget_shopping_cart a.button.fw-btn-side-by-side:last-child {
  margin-right: 0;
}
.woocommerce.widget_shopping_cart a.button:focus {
  background-color: <?php echo esc_js($the_core_less_variables['fw-btn-bg-color']); ?>;
  border-color: <?php echo esc_js($the_core_less_variables['fw-btn-border-color']); ?>;
  color: <?php echo esc_js($the_core_less_variables['fw-btn-text-color']); ?>;
}
.woocommerce.widget_shopping_cart a.button:hover {
  background-color: <?php echo esc_js($the_core_less_variables['fw-btn-bg-color-hover']); ?>;
  color: #fff !important;
}
.woocommerce.widget_shopping_cart a.button:active {
  box-shadow: none;
}
.woocommerce.widget_shopping_cart a {
  font-family: <?php echo ($the_core_less_variables['fw-widget-inner-title-font-family']); ?>;
  font-size: <?php echo esc_js($the_core_less_variables['fw-widget-inner-title-font-size']); ?>;
  font-weight: <?php echo esc_js($the_core_less_variables['fw-widget-inner-title-font-weight']); ?>;
  font-style: <?php echo esc_js($the_core_less_variables['fw-widget-inner-title-font-style']); ?>;
  line-height: <?php echo esc_js($the_core_less_variables['fw-widget-inner-title-line-height']); ?>;
  letter-spacing: <?php echo esc_js($the_core_less_variables['fw-widget-inner-title-letter-spacing']); ?>;
  color: <?php echo esc_js($the_core_less_variables['fw-widget-inner-title-color']); ?>;
}
.woocommerce.widget_shopping_cart a:hover {
  color: <?php echo esc_js($the_core_less_variables['fw-widget-inner-title-hover-color']); ?>;
}
.woocommerce.widget_shopping_cart a.remove {
  color: <?php echo esc_js($the_core_less_variables['fw-widget-inner-title-color']); ?> !important;
}
.woocommerce.widget_shopping_cart a.remove:hover {
  color: <?php echo esc_js($the_core_less_variables['fw-widget-inner-title-hover-color']); ?> !important;
  background: none;
}
