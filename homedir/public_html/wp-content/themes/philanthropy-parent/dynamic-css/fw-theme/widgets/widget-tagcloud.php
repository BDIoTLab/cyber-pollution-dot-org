/* Widget TagCloud */
.widget_tag_cloud .tagcloud a,
.fw-tag-links a,
.post-tags a,
.woocommerce.widget_product_tag_cloud .tagcloud a {
  display: inline-block;
  font-size: 11px !important;
  font-family: <?php echo ($the_core_less_variables['fw-buttons-font-family']); ?>;
  font-weight: <?php echo esc_js($the_core_less_variables['fw-buttons-font-weight']); ?>;
  font-style: <?php echo esc_js($the_core_less_variables['fw-buttons-font-style']); ?>;
  color: #fff !important;
  height: 32px;
  line-height: 32px;
  padding: 0 10px;
  margin: 8px;
  background-color: <?php echo esc_js($the_core_less_variables['fw-widget-inner-title-color']); ?>;
  border-radius: 0 3px 3px 0;
  position: relative;
  -webkit-transition: all .3s ease;
  -o-transition: all .3s ease;
  transition: all .3s ease;
}
.widget_tag_cloud .tagcloud a:before,
.fw-tag-links a:before,
.post-tags a:before,
.woocommerce.widget_product_tag_cloud .tagcloud a:before {
  content: '';
  width: 0;
  height: 0;
  border-top: 16px solid transparent;
  border-right: 10px solid <?php echo esc_js($the_core_less_variables['fw-widget-inner-title-color']); ?>;
  border-bottom: 16px solid transparent;
  position: absolute;
  top: 0;
  left: -10px;
  box-shadow: 2px 0 0 -1px <?php echo esc_js($the_core_less_variables['fw-widget-inner-title-color']); ?>;
  -webkit-transition: all .3s ease;
  -o-transition: all .3s ease;
  transition: all .3s ease;
}
.widget_tag_cloud .tagcloud a:after,
.fw-tag-links a:after,
.post-tags a:after,
.woocommerce.widget_product_tag_cloud .tagcloud a:after {
  content: '';
  width: 6px;
  height: 6px;
  background-color: #fff;
  border-radius: 50%;
  position: absolute;
  left: -2px;
  top: 13px;
}
.widget_tag_cloud .tagcloud a:hover,
.fw-tag-links a:hover,
.post-tags a:hover,
.woocommerce.widget_product_tag_cloud .tagcloud a:hover {
  background-color: <?php echo esc_js($the_core_less_variables['fw-widget-inner-title-hover-color']); ?>;
  color: #fff;
}
.widget_tag_cloud .tagcloud a:hover:before,
.fw-tag-links a:hover:before,
.post-tags a:hover:before,
.woocommerce.widget_product_tag_cloud .tagcloud a:hover:before {
  border-right-color: <?php echo esc_js($the_core_less_variables['fw-widget-inner-title-hover-color']); ?>;
  box-shadow: 2px 0 0 -1px <?php echo esc_js($the_core_less_variables['fw-widget-inner-title-hover-color']); ?>;
}