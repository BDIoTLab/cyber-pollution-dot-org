/* Header Type 3 */
.header-3 .fw-header-main {
  text-align: center;
  height: auto;
  line-height: normal;
  padding-top: <?php echo ceil(floatval($the_core_less_variables['fw-header-padding-top'])*0.87); ?>px;
  padding-bottom: <?php echo ceil(floatval($the_core_less_variables['fw-header-padding-bot'])*0.87); ?>px;
}
.header-3 .fw-header-main .fw-wrap-logo {
  padding-bottom: <?php echo ceil(floatval($the_core_less_variables['fw-header-padding-bot'])*0.62); ?>px;
}
.header-3 .fw-wrap-logo {
  display: block;
  width: 100%;
  text-align: center;
}
.header-3 .fw-wrap-logo .fw-site-logo {
  display: inline-block;
}
.header-3 .fw-nav-wrap {
  text-align: center;
}
.header-3 .fw-nav-wrap .fw-container {
  display: table;
}
.header-3 .fw-nav-wrap .fw-container .fw-site-navigation {
  display: table-cell;
  vertical-align: middle;
}
.header-3 .fw-nav-wrap .fw-container .fw-site-navigation .fw-nav-menu {
  display: inline-block;
}
.header-3 .primary-navigation > ul > li:first-child a {
  margin-left: <?php echo floatval($the_core_less_variables['fw-menu-item-margin-left'])*2; ?>px;
}
.header-3 .primary-navigation > ul > li:first-child > ul {
  left: <?php echo floatval($the_core_less_variables['fw-menu-item-margin-left'])*2; ?>px;
}
.header-3 .primary-navigation > ul > li:last-child a {
  margin-right: <?php echo floatval($the_core_less_variables['fw-menu-item-margin-left'])*2; ?>px;
}
.header-3 .primary-navigation > ul > li > a {
  margin: 0 <?php echo esc_js($the_core_less_variables['fw-menu-item-margin-left']); ?>;
}
.header-3 .primary-navigation > ul > li > ul {
  left: <?php echo esc_js($the_core_less_variables['fw-menu-item-margin-left']); ?>;
}
.header-3 .fw-nav-wrap {
  background-color: <?php echo esc_js($the_core_less_variables['fw-menu-wrap-bg']); ?>;
}
.header-3.fw-header-boxed .fw-header-main {
  padding: 0;
}
.header-3.fw-header-boxed .fw-header-main .fw-wrap-logo {
  padding-bottom: 0;
}
.header-3.fw-header-boxed .fw-header-main .fw-wrap-logo .fw-container {
  padding-top: <?php echo ceil(floatval($the_core_less_variables['fw-header-padding-top'])*0.87); ?>px;
  padding-bottom: <?php echo ceil(floatval($the_core_less_variables['fw-header-padding-bot'])*0.62); ?>px;
}
.header-3.fw-header-boxed .fw-header-main .fw-nav-wrap .fw-container {
  padding-bottom: <?php echo ceil(floatval($the_core_less_variables['fw-header-padding-bot'])*0.87); ?>px;
}
.header-3.fw-header-boxed.fw-logo-no-set .fw-nav-wrap .fw-container,
.header-3.fw-header-boxed.fw-header-sticky .fw-sticky-menu .fw-nav-wrap .fw-container {
  padding-top: <?php echo ceil(floatval($the_core_less_variables['fw-header-padding-bot'])*0.87); ?>px;
}
.header-3.search-in-menu .fw-search {
  display: table-cell;
  width: 1%;
  vertical-align: middle;
}
.header-3.search-in-menu .fw-mini-search {
  position: relative;
}

/* Sticky Header */
.header-3 .fw-sticky-menu .fw-header-main .fw-wrap-logo {
  display: none;
}
.header-3 .fw-sticky-menu .fw-header-main {
  padding-top: <?php echo esc_js($the_core_less_variables['fw-sticky-menu-padding']); ?>px;
  padding-bottom: <?php echo esc_js($the_core_less_variables['fw-sticky-menu-padding']); ?>px;
}

/* Screen 568px */
@media(max-width:767px){
  .header-3 .fw-nav-wrap .fw-container{
    width: 100%;
  }
}
