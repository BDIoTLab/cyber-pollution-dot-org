/* Footer Logo */
.fw-footer-logo {
  position: relative;
  float: left;
  margin-right: 20px;
}
/* Logo Retina & No-Retina */
.fw-footer-logo-retina .fw-footer-logo {
  max-width: <?php echo esc_js($the_core_less_variables['fw-menu-logo-max-width']); ?>;
}
.fw-footer-logo-retina .fw-footer-logo a img {
  width: <?php echo floatval($the_core_less_variables['fw-footer-logo-width'])/2; ?>px;
}
.fw-footer-logo-no-retina .fw-footer-logo {
  max-width: <?php echo esc_js($the_core_less_variables['fw-menu-logo-max-width']); ?>;
}
