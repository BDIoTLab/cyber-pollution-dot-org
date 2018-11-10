/* Widget Facebook */
.fw-widget-facebook li {
  position: relative;
  font-size: 0.9em;
  line-height: 1.3em;
  padding-bottom: 20px;
  margin-bottom: 20px;
  border-bottom: 1px dashed rgba(222, 224, 225, 0.9);
}
.fw-widget-facebook li a {
  font-family: <?php echo ($the_core_less_variables['fw-widget-inner-title-font-family']); ?>;
  font-size: <?php echo esc_js($the_core_less_variables['fw-widget-inner-title-font-size']); ?>;
  font-weight: <?php echo esc_js($the_core_less_variables['fw-widget-inner-title-font-weight']); ?>;
  font-style: <?php echo esc_js($the_core_less_variables['fw-widget-inner-title-font-style']); ?>;
  line-height: <?php echo esc_js($the_core_less_variables['fw-widget-inner-title-line-height']); ?>;
  letter-spacing: <?php echo esc_js($the_core_less_variables['fw-widget-inner-title-letter-spacing']); ?>;
  color: <?php echo esc_js($the_core_less_variables['fw-widget-inner-title-color']); ?>;
}
.fw-widget-facebook li a:hover {
  color: <?php echo esc_js($the_core_less_variables['fw-widget-inner-title-hover-color']); ?>;
}

.fw-footer .fw-widget-facebook li {
  border-bottom: 1px dashed <?php echo the_core_adjustColorLightenDarken($the_core_less_variables['fw-footer-widgets-bg'], -10); ?>;
}
.fw-widget-facebook .tweet-list {
  margin-bottom: 0;
}
.fw-widget-facebook .fw-btn-facebook a span:before {
  content: '\f09a';
}
.fw-footer .fw-widget-facebook li .facebook-post-date {
  color: #fff;
}