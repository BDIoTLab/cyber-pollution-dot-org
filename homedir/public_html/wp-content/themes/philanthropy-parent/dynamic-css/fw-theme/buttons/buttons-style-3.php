/* Buttons Style 3 */
.fw-btn-3 {
  background-color: transparent;
  border-top: <?php echo esc_js($the_core_less_variables['fw-btn-border-width3']); ?> solid <?php echo esc_js($the_core_less_variables['fw-btn-border-color3']); ?>;
  border-bottom: <?php echo esc_js($the_core_less_variables['fw-btn-border-width3']); ?> solid <?php echo esc_js($the_core_less_variables['fw-btn-border-color3']); ?>;
  color: <?php echo esc_js($the_core_less_variables['fw-btn-text-color3']); ?>;
  border-radius: <?php echo esc_js($the_core_less_variables['fw-btn-radius3']); ?>;
}
.fw-btn-3:focus {
  background-color: transparent;
  border-top-color: <?php echo esc_js($the_core_less_variables['fw-btn-border-color3']); ?>;
  border-bottom-color: <?php echo esc_js($the_core_less_variables['fw-btn-border-color3']); ?>;
  color: <?php echo esc_js($the_core_less_variables['fw-btn-text-color3']); ?>;
}
.fw-btn-3:hover {
  border-top-color: <?php echo esc_js($the_core_less_variables['fw-btn-bg-color-hover3']); ?>;
  border-bottom-color: <?php echo esc_js($the_core_less_variables['fw-btn-bg-color-hover3']); ?>;
  background-color: <?php echo esc_js($the_core_less_variables['fw-btn-bg-color-hover3']); ?>;
  color: <?php echo esc_js($the_core_less_variables['fw-btn-text-color-hover3']); ?>;
}
.fw-btn-3:active {
  box-shadow: none;
}