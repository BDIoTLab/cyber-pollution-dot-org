/* Widget Twitter Feed */
.fw-widget-twitter .tweet-item {
  position: relative;
  font-size: 0.9em;
  padding-bottom: 20px;
  margin-bottom: 20px;
  border-bottom: 1px dashed rgba(222, 224, 225, 0.9);
}
.fw-widget-twitter .tweet-avatar {
  float: left;
  margin-right: 10px;
}
.fw-widget-twitter .tweet-avatar a {
  display: inline-block;
  line-height: 30px;
  font-style: italic;
}
.fw-widget-twitter .tweet-avatar img {
  margin-top: 0.4em;
  width: 30px;
  height: 30px;
}
.fw-widget-twitter .tweet-text {
  position: relative;
  line-height: 1.3em;
}
.fw-widget-twitter .tweet-text a {
  font-family: <?php echo ($the_core_less_variables['fw-widget-inner-title-font-family']); ?>;
  font-size: <?php echo esc_js($the_core_less_variables['fw-widget-inner-title-font-size']); ?>;
  font-weight: <?php echo esc_js($the_core_less_variables['fw-widget-inner-title-font-weight']); ?>;
  font-style: <?php echo esc_js($the_core_less_variables['fw-widget-inner-title-font-style']); ?>;
  line-height: <?php echo esc_js($the_core_less_variables['fw-widget-inner-title-line-height']); ?>;
  letter-spacing: <?php echo esc_js($the_core_less_variables['fw-widget-inner-title-letter-spacing']); ?>;
  color: <?php echo esc_js($the_core_less_variables['fw-widget-inner-title-color']); ?>;
}
.fw-widget-twitter .tweet-text a:hover {
  color: <?php echo esc_js($the_core_less_variables['fw-widget-inner-title-hover-color']); ?>;
}
.fw-widget-twitter .tweet-list {
  margin-bottom: 0;
}
.fw-widget-twitter .fw-btn-tweet a span:before {
  content: '\f099';
}
.fw-footer .fw-widget-twitter .tweet-item {
  border-bottom: 1px dashed <?php echo the_core_adjustColorLightenDarken($the_core_less_variables['fw-footer-widgets-bg'], -10); ?>;
}