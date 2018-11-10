/* Header Logo */
.fw-wrap-logo {
  font-family: <?php echo ($the_core_less_variables['font-family-base']); ?>;
  z-index: 100;
}
.fw-wrap-logo .fw-site-logo {
  display: block;
  text-align: center;
  max-width: 100%;
}
/* Text Logo */
.fw-wrap-logo .fw-site-logo strong {
  font-family: <?php echo ($the_core_less_variables['fw-logo-title-font-family']); ?>;
  font-weight: <?php echo esc_js($the_core_less_variables['fw-logo-title-font-weight']); ?>;
  font-style: <?php echo esc_js($the_core_less_variables['fw-logo-title-font-style']); ?>;
  font-size: <?php echo esc_js($the_core_less_variables['fw-logo-title-font-size']); ?>;
  color: <?php echo esc_js($the_core_less_variables['fw-logo-title-color']); ?>;
  letter-spacing: <?php echo esc_js($the_core_less_variables['fw-logo-title-letter-spacing']); ?>;
  line-height: <?php echo esc_js($the_core_less_variables['fw-logo-title-line-height']); ?>;
  display: block;
}
.fw-wrap-logo .fw-site-logo span {
  font-family: <?php echo ($the_core_less_variables['fw-logo-subtitle-font-family']); ?>;
  font-weight: <?php echo esc_js($the_core_less_variables['fw-logo-subtitle-font-weight']); ?>;
  font-style: <?php echo esc_js($the_core_less_variables['fw-logo-subtitle-font-style']); ?>;
  font-size: <?php echo esc_js($the_core_less_variables['fw-logo-subtitle-font-size']); ?>;
  color: <?php echo esc_js($the_core_less_variables['fw-logo-subtitle-color']); ?>;
  letter-spacing: <?php echo esc_js($the_core_less_variables['fw-logo-subtitle-letter-spacing']); ?>;
  line-height: <?php echo esc_js($the_core_less_variables['fw-logo-subtitle-line-height']); ?>;
  display: block;
  margin-top: 6px;
}
/* Logo Retina & No-Retina */
.fw-logo-retina .fw-site-logo,
.fw-sticky-logo-retina .fw-header.fw-sticky-menu .fw-site-logo,
.fw-sticky-logo-no-retina .fw-header.fw-sticky-menu .fw-site-logo {
  line-height: normal;
}
.fw-logo-retina .fw-site-logo {
  width: <?php echo floatval($the_core_less_variables['fw-menu-logo-width'])/2; ?>px;
}

/* Logo Retina & No-Retina in Header Sticky */
.fw-sticky-logo-retina .fw-header.fw-sticky-menu .fw-site-logo {
  width: <?php echo floatval($the_core_less_variables['fw-menu-sticky-logo-width'])/2; ?>px;
}
.fw-sticky-logo-no-retina .fw-header.fw-sticky-menu .fw-site-logo {
  width: <?php echo floatval($the_core_less_variables['fw-menu-sticky-logo-width']); ?>px;
}

/* No Logo Set */
body[class*="header-"].fw-logo-no-set .fw-nav-wrap,
body[class*="header-"].fw-logo-no-set .fw-nav-wrap .primary-navigation {
  margin-top: 0;
}
