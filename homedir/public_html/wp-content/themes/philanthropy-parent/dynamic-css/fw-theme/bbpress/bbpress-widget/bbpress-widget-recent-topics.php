/* bbPress Widget Recent Topics */
.widget_display_topics li {
  margin-bottom: 1.3em;
}
.widget_display_topics li:last-child {
  margin-bottom: 0;
}
.widget_display_topics li .bbp-forum-title {
  font-family: <?php echo ($the_core_less_variables['fw-widget-inner-title-font-family']); ?>;
  font-size: <?php echo esc_js($the_core_less_variables['fw-widget-inner-title-font-size']); ?>;
  font-weight: <?php echo esc_js($the_core_less_variables['fw-widget-inner-title-font-weight']); ?>;
  font-style: <?php echo esc_js($the_core_less_variables['fw-widget-inner-title-font-style']); ?>;
  line-height: <?php echo esc_js($the_core_less_variables['fw-widget-inner-title-line-height']); ?>;
  letter-spacing: <?php echo esc_js($the_core_less_variables['fw-widget-inner-title-letter-spacing']); ?>;
  color: <?php echo esc_js($the_core_less_variables['fw-widget-inner-title-color']); ?>;
}
.widget_display_topics li .bbp-forum-title:hover {
  color: <?php echo esc_js($the_core_less_variables['fw-widget-inner-title-hover-color']); ?>;
}
.widget_display_topics .bbp-forum-title {
  display: block;
}
.widget_display_topics .topic-author {
  line-height: normal;
}
.widget_display_topics .topic-author .bbp-author-name {
  vertical-align: middle;
}
