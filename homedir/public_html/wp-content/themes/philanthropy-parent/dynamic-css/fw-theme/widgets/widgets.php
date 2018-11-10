/* WP Widgets Layout */
/* -------------------------------------------------- */
.widget {
  margin-bottom: <?php echo esc_js($the_core_less_variables['fw-widget-margin-bot']); ?>;
  font-size: <?php echo esc_js($the_core_less_variables['fw-widget-font-size']); ?>;
  line-height: <?php echo esc_js($the_core_less_variables['fw-widget-line-height']); ?>;
}
.widget p a {
  font-family: <?php echo ($the_core_less_variables['fw-widget-inner-title-font-family']); ?>;
  font-size: <?php echo esc_js($the_core_less_variables['fw-widget-inner-title-font-size']); ?>;
  font-weight: <?php echo esc_js($the_core_less_variables['fw-widget-inner-title-font-weight']); ?>;
  font-style: <?php echo esc_js($the_core_less_variables['fw-widget-inner-title-font-style']); ?>;
  line-height: <?php echo esc_js($the_core_less_variables['fw-widget-inner-title-line-height']); ?>;
  letter-spacing: <?php echo esc_js($the_core_less_variables['fw-widget-inner-title-letter-spacing']); ?>;
  color: <?php echo esc_js($the_core_less_variables['fw-widget-inner-title-color']); ?>;
}
.widget p a:hover {
  color: <?php echo esc_js($the_core_less_variables['fw-widget-inner-title-hover-color']); ?>;
}
.widget:last-child {
  margin-bottom: 0;
}
.widget .widget-title {
  margin: 0 0 <?php echo ceil( floatval($the_core_less_variables['fw-widget-margin-bot']) * 0.3); ?>px 0;
  font-family: <?php echo ($the_core_less_variables['subtitles-family']); ?>;
  font-weight: normal;
  font-style: <?php echo esc_js($the_core_less_variables['subtitles-style']); ?>;
  font-size: <?php echo esc_js($the_core_less_variables['fw-widget-title-font-size']); ?>;
  line-height: <?php echo esc_js($the_core_less_variables['fw-widget-title-line-height']); ?>;
  position: relative;
  color: <?php echo esc_js($the_core_less_variables['fw-widget-title-color']); ?>;
  letter-spacing: 0;
}
.widget .widget-title span {
  background-color: <?php echo esc_js($the_core_less_variables['body-bg']); ?>;
  display: inline-block;
  padding-right: 10px;
}
.widget .widget-title span:after {
  border-bottom: 1px solid #dee0e1;
  content: "";
  left: 0;
  position: absolute;
  right: 0;
  top: 50%;
  z-index: -1;
}
/* Date for all widget */
.widget .post-date,
.widget .facebook-post-date,
.widget .rss-date,
.widget .tweet-date,
.widget.widget_display_replies li div:last-child,
.widget.widget_display_topics li div:last-child {
  display: block;
  line-height: 1em;
  font-size: 1em;
  font-weight: normal;
  color: <?php echo esc_js($the_core_less_variables['fw-widget-inner-title-hover-color']); ?>;
  margin-bottom: 10px;
}
.widget ul {
  list-style: none;
  overflow: hidden;
  padding-left: 0;
  margin: 0;
}
.widget div[class*='fw-btn-'] a {
  text-align: left;
  font-style: italic;
}
.widget div[class*='fw-btn-'] a span:before {
  font-family: 'FontAwesome';
  font-style: normal;
  margin-right: 6px;
}
.fw-side-boxed .widget .widget-title span {
  background-color: <?php echo esc_js($the_core_less_variables['container-bg']); ?>;
}
.fw-sidebar .widget:first-child,
.fw-footer .fw-col-md-3 .widget:first-child,
.fw-footer .fw-col-md-4 .widget:first-child {
  margin-top: 0;
}

/* General Widget Responsive */

/* Screen 768px */
@media(max-width:991px){
  .widget {
    margin-bottom: <?php echo ceil( floatval($the_core_less_variables['fw-space-between-elements-md'])*0.7); ?>px;
  }
  .widget .widget-title {
    margin-bottom: <?php echo ceil( floatval($the_core_less_variables['fw-space-between-elements-sm'])*0.55); ?>px;
  }
}

/*-------------------------------------*/
/*       Other Style for Widgets       */
/*-------------------------------------*/
