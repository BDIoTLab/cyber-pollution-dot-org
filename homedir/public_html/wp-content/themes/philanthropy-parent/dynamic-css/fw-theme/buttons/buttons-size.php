/* Buttons Size */
.fw-btn-lg {
  padding: <?php echo esc_js($the_core_less_variables['padding-large-vertical']); ?> <?php echo esc_js($the_core_less_variables['padding-large-horizontal']); ?>;
  font-size: <?php echo ceil(floatval($the_core_less_variables['fw-buttons-font-size'])*1.15); ?>px;
  line-height: <?php echo ceil(floatval($the_core_less_variables['fw-buttons-line-height'])*1.15); ?>px;
}
.fw-btn-md {
  padding: <?php echo esc_js($the_core_less_variables['padding-base-vertical']); ?> <?php echo esc_js($the_core_less_variables['padding-base-horizontal']); ?>;
  font-size: <?php echo esc_js($the_core_less_variables['fw-buttons-font-size']); ?>;
  line-height: <?php echo esc_js($the_core_less_variables['fw-buttons-line-height']); ?>;
}
.fw-btn-sm {
  padding: <?php echo esc_js($the_core_less_variables['padding-small-vertical']); ?> <?php echo esc_js($the_core_less_variables['padding-small-horizontal']); ?>;
  font-size: <?php echo ceil(floatval($the_core_less_variables['fw-buttons-font-size'])*0.85); ?>px;
  line-height: <?php echo ceil(floatval($the_core_less_variables['fw-buttons-line-height'])*0.85); ?>px;
}