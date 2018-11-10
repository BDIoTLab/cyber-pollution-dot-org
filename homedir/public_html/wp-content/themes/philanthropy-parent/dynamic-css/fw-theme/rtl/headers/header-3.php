/* RTL Header Type 3 */
/* -------------------------------------------------- */
.rtl.header-3 .fw-site-navigation > ul > li {
  float: right;
}
.rtl.header-3 .primary-navigation > ul > li:first-child a {
  margin-left: <?php echo esc_js($the_core_less_variables['fw-menu-item-margin-left']); ?>;
  margin-right: <?php echo floatval($the_core_less_variables['fw-menu-item-margin-left'])*2; ?>px;
}
.rtl.header-3 .primary-navigation > ul > li:last-child a {
  margin-right: <?php echo esc_js($the_core_less_variables['fw-menu-item-margin-left']); ?>;
  margin-left: <?php echo floatval($the_core_less_variables['fw-menu-item-margin-left'])*2; ?>px;
}
