/* RTL Header Type 2 */
/* -------------------------------------------------- */
.rtl.header-2 .fw-header-main .fw-container .fw-site-navigation > ul > li {
  float: right;
}
.rtl.header-2 .fw-header-main .fw-nav-wrap.fw-nav-right .fw-site-navigation > ul > li:first-child > a,
.rtl.header-2 .fw-header-main .fw-nav-wrap.fw-nav-left .primary-navigation > ul > li:first-child > a {
  margin-left: <?php echo esc_js($the_core_less_variables['fw-menu-item-margin-left']); ?>;
}
.rtl.header-2 .fw-header-main .fw-nav-wrap.fw-nav-right .fw-site-navigation > ul > li:last-child > a,
.rtl.header-2 .fw-header-main .fw-nav-wrap.fw-nav-left .primary-navigation > ul > li:last-child > a {
  margin-left: 0;
}

.rtl.header-2 .fw-header-main .fw-site-navigation > ul > li:last-child > ul {
  left: 0;
}
.rtl.header-2 .fw-header-main .fw-site-navigation > ul > li:first-child > ul {
  left: <?php echo floatval($the_core_less_variables['fw-menu-item-margin-left']); ?>px;
}
.rtl.header-2 .fw-header-main .fw-nav-wrap.fw-nav-right .fw-nav-menu {
  float: right;
}
.rtl.header-2 .fw-header-main .fw-nav-wrap.fw-nav-left .fw-nav-menu {
  float: left;
}

/*----> Responsive <---- */
/* Screen 1024px */
@media (max-width: 1199px) {
  .rtl.header-2 .fw-header-main .fw-site-navigation > ul > li:first-child > ul {
    left: <?php echo floatval($the_core_less_variables['fw-menu-item-margin-left'])/2; ?>px;
  }
}