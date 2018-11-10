/* Map Style */
/* -------------------------------------------------- */
.site .fw-map-canvas .infowindow-title a {
  font-family: <?php echo ($the_core_less_variables['font-family-base']); ?>;
  font-style: <?php echo esc_js($the_core_less_variables['font-style-base']); ?>;
  font-weight: <?php echo esc_js($the_core_less_variables['font-weight-base']); ?>;
  font-size: <?php echo esc_js($the_core_less_variables['font-size-base']); ?>;
  line-height: <?php echo esc_js($the_core_less_variables['line-height-base']); ?>;
  letter-spacing: <?php echo esc_js($the_core_less_variables['letter-spacing-base']); ?>;
  color: <?php echo esc_js($the_core_less_variables['link-color']); ?>;
  text-decoration: underline;
}
.site .fw-map-canvas .infowindow-title a:hover {
  color: <?php echo esc_js($the_core_less_variables['link-hover-color']); ?>;
}
.site .fw-map-canvas .infowindow-description {
  font-family: <?php echo ($the_core_less_variables['font-family-base']); ?>;
  font-style: <?php echo esc_js($the_core_less_variables['font-style-base']); ?>;
  font-weight: <?php echo esc_js($the_core_less_variables['font-weight-base']); ?>;
  font-size: <?php echo esc_js($the_core_less_variables['font-size-small']); ?>;
  line-height: <?php echo esc_js($the_core_less_variables['line-height-base']); ?>;
  letter-spacing: <?php echo esc_js($the_core_less_variables['letter-spacing-base']); ?>;
  color: <?php echo esc_js($the_core_less_variables['text-color']); ?>;
}

/*----> Responsive <---- */
/* Screen 568px */
@media(max-width:767px){
  .single-fw-event .wrap-map.fw-map .fw-map-canvas.map,
  .wrap-map.fw-map .fw-map-canvas.map {
    max-height: 250px !important;
  }
}
