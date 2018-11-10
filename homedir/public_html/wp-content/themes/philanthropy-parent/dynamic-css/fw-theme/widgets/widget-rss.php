/* RSS */
.widget_rss ul li .rsswidget {
  font-family: <?php echo ($the_core_less_variables['fw-widget-inner-title-font-family']); ?>;
  font-size: <?php echo esc_js($the_core_less_variables['fw-widget-inner-title-font-size']); ?>;
  font-weight: <?php echo esc_js($the_core_less_variables['fw-widget-inner-title-font-weight']); ?>;
  font-style: <?php echo esc_js($the_core_less_variables['fw-widget-inner-title-font-style']); ?>;
  line-height: <?php echo esc_js($the_core_less_variables['fw-widget-inner-title-line-height']); ?>;
  letter-spacing: <?php echo esc_js($the_core_less_variables['fw-widget-inner-title-letter-spacing']); ?>;
  color: <?php echo esc_js($the_core_less_variables['fw-widget-inner-title-color']); ?>;
  -webkit-transition: all 0.3s ease;
  -o-transition: all 0.3s ease;
  transition: all 0.3s ease;
}
.widget_rss ul li .rsswidget:hover {
  color: <?php echo esc_js($the_core_less_variables['fw-widget-inner-title-hover-color']); ?>;
}
.widget_rss ul li .rssSummary {
  font-size: <?php echo ceil( floatval($the_core_less_variables['font-size-base']) * 0.85); ?>px;
}
.widget_rss ul li cite {
  color: #b6b8b9;
  font-size: <?php echo esc_js($the_core_less_variables['fw-widget-font-size']); ?>;
}
.widget_rss .widget-title a {
  color: #b6b8b9;
}
.widget_rss .widget-title a:hover {
  color: #b6b8b9;
}
.widget_rss .widget-title a:first-child {
  float: left;
  margin-right: 5px;
  position: relative;
  top: 10px;
  line-height: 10px;
}
.widget_rss ul li {
  margin-bottom: 1em;
}
.widget_rss ul li .rss-date {
  display: block;
}