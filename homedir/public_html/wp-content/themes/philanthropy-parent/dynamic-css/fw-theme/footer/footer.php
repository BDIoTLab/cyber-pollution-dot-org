/* Footer Layout */
/* -------------------------------------------------- */

.fw-footer-middle {
  background-color: <?php echo esc_js($the_core_less_variables['fw-footer-middle-bg']); ?>;
  background-image: url(<?php echo ($the_core_less_variables['fw-menu-bar-bg-image']); ?>);
  background-repeat: <?php echo esc_js($the_core_less_variables['fw-menu-bar-bg-repeat']); ?>;
  background-position: <?php echo esc_js($the_core_less_variables['fw-menu-bar-bg-position']); ?>;
  background-size: <?php echo esc_js($the_core_less_variables['fw-footer-middle-bg-size']); ?>;
}
.fw-footer-middle {
  position: relative;
}
.fw-footer-middle .fw-container {
  position: relative;
  z-index: 10;
}
