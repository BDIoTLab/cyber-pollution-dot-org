/* Header Type 2 */
.header-2 .fw-header-main {
  text-align: center;
}
.header-2 .fw-header-main .fw-nav-wrap .fw-nav-menu {
  padding-left: 0;
  margin-right: 0;
}
.header-2 .fw-header-main .fw-wrap-logo {
  margin: 0;
  text-align: center;
  padding: 0 <?php echo esc_js($the_core_less_variables['fw-header-2-padding-logo']); ?>;
}
.header-2 .fw-header-main .fw-wrap-logo a {
  display: inline-block;
}
.header-2 .fw-header-main .fw-container {
  display: table;
  padding-top: <?php echo ceil(floatval($the_core_less_variables['fw-header-padding-top'])*0.87); ?>px;
  padding-bottom: <?php echo ceil(floatval($the_core_less_variables['fw-header-padding-bot'])*0.87); ?>px;
}
.header-2 .fw-header-main .fw-nav-wrap.fw-nav-left,
.header-2 .fw-header-main .fw-nav-wrap.fw-nav-right,
.header-2 .fw-header-main .fw-wrap-logo {
  display: table-cell;
  vertical-align: middle;
  width: 33.33%;
}
.header-2 .fw-header-main .fw-nav-wrap.fw-nav-left .fw-nav-menu {
  float: right;
}
.header-2 .fw-header-main .fw-nav-wrap.fw-nav-right .fw-nav-menu {
  float: left;
}
.header-2 .fw-header-main .fw-site-navigation > ul > li {
  border-bottom: none;
}
.header-2 .fw-header-main .fw-site-navigation > ul > li:first-child a {
  margin-left: 0;
}
.header-2 .fw-header-main .fw-site-navigation > ul > li:first-child > ul {
  left: 0;
}
.header-2 .fw-header-main .fw-site-navigation > ul > li > a {
  margin-right: 0;
  margin-left: <?php echo esc_js($the_core_less_variables['fw-menu-item-margin-left']); ?>;
}
.header-2 .fw-header-main .fw-site-navigation > ul > li > ul {
  left: <?php echo floatval($the_core_less_variables['fw-menu-item-margin-left']); ?>px;
}
.header-2 .fw-header-main .fw-site-navigation > ul > li > ul.left {
  right: 0;
  left: auto;
}
.header-2.fw-logo-retina .fw-nav-wrap.fw-nav-left,
.header-2.fw-logo-retina .fw-nav-wrap.fw-nav-right {
  width: 40%;
}
.header-2.fw-logo-retina .fw-wrap-logo {
  width: 20%;
}

/* Sticky Header */
.header-2 .fw-sticky-menu .fw-header-main .fw-container {
  padding-top: <?php echo esc_js($the_core_less_variables['fw-sticky-menu-padding']); ?>px;
  padding-bottom: <?php echo esc_js($the_core_less_variables['fw-sticky-menu-padding']); ?>px;
}

/*----> Responsive <---- */
/* Screen 1024px */
@media (max-width: 1199px) {
  .header-2 .fw-header-main .fw-wrap-logo {
    width: 99%;
    padding: 0;
  }
  .header-2 .fw-header-main .fw-site-navigation > ul > li > ul {
    left: <?php echo floatval($the_core_less_variables['fw-menu-item-margin-left'])/2; ?>px;
  }
  .header-2 .fw-header-main .fw-site-navigation > ul > li > a {
    margin-left: <?php echo floatval($the_core_less_variables['fw-menu-item-margin-left'])/2; ?>px;
  }
}

