/* Footer Widget */
.fw-footer-widgets {
  position: relative;
  padding-top: <?php echo esc_js($the_core_less_variables['fw-footer-widgets-padding-top']); ?>;
  padding-bottom: <?php echo esc_js($the_core_less_variables['fw-footer-widgets-padding-bot']); ?>;
  background-color: <?php echo esc_js($the_core_less_variables['fw-footer-widgets-bg']); ?>;
  background-image: url(<?php echo ($the_core_less_variables['fw-footer-widget-bg-image']); ?>);
  background-repeat: <?php echo esc_js($the_core_less_variables['fw-footer-widget-bg-repeat']); ?>;
  background-position: <?php echo esc_js($the_core_less_variables['fw-footer-widget-bg-position']); ?>;
  background-size: <?php echo esc_js($the_core_less_variables['fw-footer-widget-bg-size']); ?>;
}
.fw-footer-widgets .widget,
.fw-footer-widgets .widget li {
  color: <?php echo esc_js($the_core_less_variables['fw-footer-widgets-text-color']); ?>;
}
.fw-footer-widgets .widget a,
.fw-footer-widgets .widget .comment-author-link a {
  color: <?php echo esc_js($the_core_less_variables['fw-footer-widgets-link-color']); ?>;
}
.fw-footer-widgets .widget a:hover,
.fw-footer-widgets .widget .comment-author-link a:hover {
  color: <?php echo the_core_adjustColorLightenDarken($the_core_less_variables['fw-footer-widgets-link-color'], 10); ?>;
}
.fw-footer-widgets .widget-title {
  font-family: <?php echo ($the_core_less_variables['subtitles-family']); ?>;
  font-weight: <?php echo esc_js($the_core_less_variables['subtitles-weight']); ?>;
  font-style: <?php echo esc_js($the_core_less_variables['subtitles-style']); ?>;
  color: <?php echo esc_js($the_core_less_variables['fw-footer-widgets-title']); ?>;
  font-size: <?php echo esc_js($the_core_less_variables['fw-footer-widgets-title-size']); ?>;
  text-transform: none;
}
.fw-footer-widgets .widget-title span {
  color: <?php echo esc_js($the_core_less_variables['fw-footer-widgets-title']); ?>;
  background-color: transparent !important;
}
.fw-footer-widgets .widget-title span:after {
  display: none;
}
.fw-footer-widgets .widget_text .textwidget {
  font-size: <?php echo floatval($the_core_less_variables['font-size-base'])*0.9; ?>px;
}

/* Responsive */
/* Screen 768px */
@media(max-width:991px){
  .fw-footer-widgets.footer-cols-4 .fw-col-sm-6:nth-child(1),
  .fw-footer-widgets.footer-cols-4 .fw-col-sm-6:nth-child(2) {
    margin-bottom: 40px;
  }
  .fw-footer-widgets .widget .widget-title {
    margin-bottom: 15px;
  }
}
/* Screen 568px */
@media (max-width: 767px) {
  .fw-footer-widgets {
    padding-top: <?php echo ceil(floatval($the_core_less_variables['fw-footer-widgets-padding-top'])*0.5); ?>px;
    padding-bottom: <?php echo ceil(floatval($the_core_less_variables['fw-footer-widgets-padding-bot'])*0.5); ?>px;
  }
}

