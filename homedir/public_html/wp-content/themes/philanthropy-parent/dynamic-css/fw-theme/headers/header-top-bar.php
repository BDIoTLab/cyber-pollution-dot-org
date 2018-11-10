/* Top bar */
.fw-top-bar {
  background-color: <?php echo esc_js($the_core_less_variables['fw-top-bar-bg']); ?>;
  padding: <?php echo esc_js($the_core_less_variables['fw-top-bar-padding']); ?> 0;
  line-height: <?php echo esc_js($the_core_less_variables['fw-top-bar-height']); ?>;
  font-size: <?php echo esc_js($the_core_less_variables['fw-top-bar-font-size-text']); ?>;
  color: <?php echo esc_js($the_core_less_variables['fw-top-bar-text-color']); ?>;
  text-align: right;
}
.fw-top-bar .fw-container {
  z-index: 101;
}
.fw-top-bar a {
  color: <?php echo esc_js($the_core_less_variables['fw-top-bar-text-color']); ?>;
}
.fw-top-bar a:hover {
  color: <?php echo esc_js($the_core_less_variables['fw-top-bar-text-color']); ?>;
  text-decoration: underline;
}
.fw-top-bar .fw-text-top-bar {
  color: <?php echo esc_js($the_core_less_variables['fw-top-bar-text-color']); ?>;
  letter-spacing: <?php echo esc_js($the_core_less_variables['fw-top-bar-letter-spacing']); ?>;
  font-weight: <?php echo esc_js($the_core_less_variables['fw-top-bar-font-weight']); ?>;
  font-family: <?php echo ($the_core_less_variables['fw-top-bar-font-family']); ?>;
  font-style: <?php echo esc_js($the_core_less_variables['fw-top-bar-font-style']); ?>;
  text-align: left;
  display: inline-block;
}
.fw-top-bar .fw-top-bar-social {
  display: inline-block;
}
.fw-top-bar .fw-top-bar-social a {
  font-size: <?php echo esc_js($the_core_less_variables['fw-top-bar-font-size-social']); ?>;
  color: <?php echo esc_js($the_core_less_variables['fw-header-social-color']); ?>;
  margin-left: 10px;
}
.fw-top-bar .fw-top-bar-social a:first-child {
  margin-left: 0;
}
.fw-top-bar .fw-top-bar-social a:hover {
  color: <?php echo esc_js($the_core_less_variables['fw-header-social-hover-color']); ?>;
}

/*----> Responsive <---- */
/* Screen 568px */
@media(max-width:767px){
  .fw-top-bar .fw-top-bar-social a {
    margin-left: 15px;
  }
}
