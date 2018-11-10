/* Widget Categories, Nav Menu, Meta, Pages */
.widget_categories ul > li,
.widget_nav_menu ul > li,
.widget_meta ul > li,
.widget_pages ul > li,
.woocommerce.widget_product_categories ul > li {
  color: <?php echo esc_js($the_core_less_variables['fw-widget-inner-title-hover-color']); ?>;
  font-style: italic;
}
.widget_categories ul > li a,
.widget_nav_menu ul > li a,
.widget_meta ul > li a,
.widget_pages ul > li a,
.woocommerce.widget_product_categories ul > li a {
  font-family: <?php echo ($the_core_less_variables['fw-widget-inner-title-font-family']); ?>;
  font-size: <?php echo esc_js($the_core_less_variables['fw-widget-inner-title-font-size']); ?>;
  font-weight: <?php echo esc_js($the_core_less_variables['fw-widget-inner-title-font-weight']); ?>;
  font-style: <?php echo esc_js($the_core_less_variables['fw-widget-inner-title-font-style']); ?>;
  line-height: <?php echo esc_js($the_core_less_variables['fw-widget-inner-title-line-height']); ?>;
  letter-spacing: <?php echo esc_js($the_core_less_variables['fw-widget-inner-title-letter-spacing']); ?>;
  color: <?php echo esc_js($the_core_less_variables['fw-widget-inner-title-color']); ?>;
}
.widget_categories ul > li a:hover,
.widget_nav_menu ul > li a:hover,
.widget_meta ul > li a:hover,
.widget_pages ul > li a:hover,
.woocommerce.widget_product_categories ul > li a:hover {
  color: <?php echo esc_js($the_core_less_variables['fw-widget-inner-title-hover-color']); ?>;
}
.widget_categories ul > li ul.children,
.widget_nav_menu ul > li ul.children,
.widget_meta ul > li ul.children,
.widget_pages ul > li ul.children,
.woocommerce.widget_product_categories ul > li ul.children,
.widget_categories ul > li ul.sub-menu,
.widget_nav_menu ul > li ul.sub-menu,
.widget_meta ul > li ul.sub-menu,
.widget_pages ul > li ul.sub-menu,
.woocommerce.widget_product_categories ul > li ul.sub-menu {
  margin-bottom: 0.3em;
}
.widget_categories ul > li ul.children li:before,
.widget_nav_menu ul > li ul.children li:before,
.widget_meta ul > li ul.children li:before,
.widget_pages ul > li ul.children li:before,
.woocommerce.widget_product_categories ul > li ul.children li:before,
.widget_categories ul > li ul.sub-menu li:before,
.widget_nav_menu ul > li ul.sub-menu li:before,
.widget_meta ul > li ul.sub-menu li:before,
.widget_pages ul > li ul.sub-menu li:before,
.woocommerce.widget_product_categories ul > li ul.sub-menu li:before {
  content: '\f148';
  font-family: 'FontAwesome';
  font-style: normal;
  display: inline-block;
  -webkit-transform: rotate(90deg);
  -moz-transform: rotate(90deg);
  -ms-transform: rotate(90deg);
  -o-transform: rotate(90deg);
  transform: rotate(90deg);
  color: <?php echo esc_js($the_core_less_variables['theme-color-3']); ?>;
  margin-right: 20px;
}
.widget_categories .screen-reader-text,
.widget_nav_menu .screen-reader-text,
.widget_meta .screen-reader-text,
.widget_pages .screen-reader-text,
.woocommerce.widget_product_categories .screen-reader-text {
  display: none;
}

/* Widget Menu */
.widget_nav_menu .sub-menu-has-icons .fa {
  margin-right: 10px;
}
.widget_nav_menu .menu-separator {
  display: none;
}

/* Style for this widget in footer */
.fw-footer-widgets .selectize-input > *,
.fw-footer-widgets .widget_categories ul > li a,
.fw-footer-widgets .widget_nav_menu ul > li a,
.fw-footer-widgets .widget_meta ul > li a,
.fw-footer-widgets .widget_pages ul > li a,
.fw-footer-widgets .woocommerce.widget_product_categories ul > li a {
  color: <?php echo esc_js($the_core_less_variables['fw-footer-widgets-link-color']); ?>;
}
.fw-footer-widgets .widget_categories ul > li a:hover,
.fw-footer-widgets .widget_nav_menu ul > li a:hover,
.fw-footer-widgets .widget_meta ul > li a:hover,
.fw-footer-widgets .widget_pages ul > li a:hover,
.fw-footer-widgets .woocommerce.widget_product_categories ul > li a:hover {
  color: <?php echo the_core_adjustColorLightenDarken($the_core_less_variables['fw-footer-widgets-link-color'], 10); ?>;
}

