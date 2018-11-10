/* RTL Header Type 1 */
/* -------------------------------------------------- */
.rtl.header-1 .fw-header-main .fw-container .fw-site-navigation > ul > li {
  float: right;
}
.rtl.header-1 .primary-navigation > ul > li:first-child > a {
  margin-left: <?php echo esc_js($the_core_less_variables['fw-menu-item-margin-left']); ?>;
}
.rtl.header-1 .primary-navigation > ul > li:last-child > a {
  margin-left: 0;
}
.rtl.header-1 .primary-navigation > ul > li:last-child > ul {
  left: 0;
}
