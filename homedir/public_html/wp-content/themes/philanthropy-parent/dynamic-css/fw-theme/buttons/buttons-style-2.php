/* Buttons Style 2 */
.fw-btn-2 {
  background-color: transparent;
  border-color: <?php echo esc_js($the_core_less_variables['fw-btn-border-color2']); ?>;
  border-width: <?php echo esc_js($the_core_less_variables['fw-btn-border-width2']); ?>;
  color: <?php echo esc_js($the_core_less_variables['fw-btn-text-color2']); ?>;
  border-radius: <?php echo esc_js($the_core_less_variables['fw-btn-radius2']); ?>;
}
.fw-btn-2:focus {
  background-color: transparent;
  border-color: <?php echo esc_js($the_core_less_variables['fw-btn-border-color2']); ?>;
  color: <?php echo esc_js($the_core_less_variables['fw-btn-text-color2']); ?>;
}
.fw-btn-2:hover {
  background-color: <?php echo esc_js($the_core_less_variables['fw-btn-bg-color-hover2']); ?>;
  color: <?php echo esc_js($the_core_less_variables['fw-btn-text-color-hover2']); ?>;
  border-color: <?php echo esc_js($the_core_less_variables['fw-btn-bg-color-hover2']); ?>;
}
.fw-btn-2:active {
  box-shadow: none;
}