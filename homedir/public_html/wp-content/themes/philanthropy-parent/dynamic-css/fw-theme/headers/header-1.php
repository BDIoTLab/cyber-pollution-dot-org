/* Header Type 1 */
.header-1.fw-top-logo-left .fw-wrap-logo {
  float: left;
}
.header-1.fw-top-logo-left .fw-search {
  float: right;
  margin-left: <?php echo esc_js($the_core_less_variables['fw-menu-item-margin-left']); ?>;
}
.header-1.fw-top-logo-left .fw-nav-wrap {
  float: right;
}
.header-1.fw-top-logo-right .fw-wrap-logo {
  float: right;
}
.header-1.fw-top-logo-right .fw-search {
  float: left;
  margin-right: <?php echo esc_js($the_core_less_variables['fw-menu-item-margin-left']); ?>;
}
.header-1.fw-top-logo-right .fw-search .fw-wrap-search-form {
  margin-left: 0;
}
.header-1.fw-top-logo-right .fw-nav-wrap {
  float: left;
}
.header-1 .fw-header-main .fw-container {
  padding-top: <?php echo ceil(floatval($the_core_less_variables['fw-header-padding-top'])*0.87); ?>px;
  padding-bottom: <?php echo ceil(floatval($the_core_less_variables['fw-header-padding-bot'])*0.87); ?>px;
}
.header-1 .fw-header-main .fw-search,
.header-1 .fw-header-main .fw-mini-search {
  top: 1px;
}
.header-1 .fw-nav-wrap {
  max-width: 78%;
}
.header-1 .primary-navigation > ul > li {
  border-bottom: none;
}
.header-1 .primary-navigation > ul > li:first-child > a {
  margin-left: 0;
}
.header-1 .primary-navigation > ul > li:first-child > ul {
  left: 0;
}
.header-1 .primary-navigation > ul > li > a {
  margin-right: 0;
  margin-left: <?php echo esc_js($the_core_less_variables['fw-menu-item-margin-left']); ?>;
}
.header-1 .primary-navigation > ul > li > ul {
  left: <?php echo esc_js($the_core_less_variables['fw-menu-item-margin-left']); ?>;
}
.header-1 .primary-navigation > ul > li > ul.left {
  left: auto;
  right: 0;
}
.header-1.fw-logo-retina .fw-mini-search {
  top: 0;
}
.header-1.fw-logo-no-retina .fw-mini-search,
.header-1.fw-logo-no-retina .mmenu-link {
  top: 0;
}
.header-1.fw-logo-no-retina .fw-sticky-menu .fw-mini-search,
.header-1.fw-logo-no-retina .fw-sticky-menu .mmenu-link {
  top: 0;
}
.header-1.search-in-top-bar .fw-search {
  margin-top: 0 !important;
}

/* Sticky Header */
.header-1 .fw-sticky-menu .fw-header-main .fw-container {
  padding-top: <?php echo esc_js($the_core_less_variables['fw-sticky-menu-padding']); ?>px;
  padding-bottom: <?php echo esc_js($the_core_less_variables['fw-sticky-menu-padding']); ?>px;
}