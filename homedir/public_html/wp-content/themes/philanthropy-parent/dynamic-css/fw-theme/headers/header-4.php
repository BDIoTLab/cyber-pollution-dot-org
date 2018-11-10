/* Header Type 4 */
.header-4 .fw-header-main {
  padding: <?php echo floatval($the_core_less_variables['fw-header-padding-top'])*0.75; ?>px 0;
}
.header-4 .fw-header-main .fw-container {
  display: table;
}
.header-4 .fw-header-main .fw-container .fw-site-navigation {
  display: table-cell;
  vertical-align: middle;
}
.header-4 .fw-header-main .fw-container .fw-search {
  display: table-cell;
  vertical-align: middle;
  width: 1%;
}
.header-4 .fw-header-main .fw-wrap-logo-info-text {
  padding-bottom: <?php echo ceil(floatval($the_core_less_variables['fw-header-padding-bot'])*0.37); ?>px;
}
.header-4 .fw-wrap-logo {
  display: inline-block;
  float: left;
}
.header-4 .fw-wrap-logo-info-text {
  display: block;
  width: 100%;
}
.header-4 .fw-info-text-header-main {
  display: table;
  float: right;
}
.header-4 .fw-info-text-header-main .fw-text {
  display: table-cell;
  vertical-align: middle;
  font-size: 17px;
}
.header-4 .fw-header-main .fw-info-text-header-main .fw-text {
  height: <?php echo esc_js($the_core_less_variables['fw-logo-wrap-height']); ?>;
  color: <?php echo esc_js($the_core_less_variables['fw-header-info-text-color']); ?>;
}
.header-4 .primary-navigation > ul > li {
  border-bottom: none;
}
.header-4 .fw-header-main .primary-navigation > ul > li > a,
.header-4 .fw-header-main .primary-navigation > ul > li:first-child > a {
  margin-left: <?php echo floatval($the_core_less_variables['fw-menu-item-margin-left'])/2; ?>px;
  margin-right: <?php echo floatval($the_core_less_variables['fw-menu-item-margin-left'])/2; ?>px;
}
.header-4 .fw-header-main .primary-navigation > ul > li > ul {
  left: <?php echo floatval($the_core_less_variables['fw-menu-item-margin-left'])/2; ?>px;
}
.header-4 .fw-header-main .primary-navigation > ul > li > ul.left {
  right: <?php echo floatval($the_core_less_variables['fw-menu-item-margin-left'])/2; ?>px;
}
.header-4 .fw-nav-wrap .fw-search {
  position: relative;
}
.header-4.search-in-top-bar .fw-nav-wrap {
  text-align: center;
}
.header-4.search-in-top-bar .fw-search {
  width: auto;
}
.header-4.fw-header-boxed .fw-header-main {
  padding: 0;
}
.header-4.fw-header-boxed .fw-header-main .fw-wrap-logo-info-text {
  padding-bottom: 0;
}
.header-4.fw-header-boxed .fw-header-main .fw-wrap-logo-info-text .fw-container {
  padding-top: <?php echo floatval($the_core_less_variables['fw-header-padding-top'])*0.75; ?>px;
}
.header-4.fw-header-boxed .fw-header-main .fw-wrap-logo-info-text .fw-container .fw-wrap-logo,
.header-4.fw-header-boxed .fw-header-main .fw-wrap-logo-info-text .fw-container .fw-info-text-header-main {
  padding-bottom: <?php echo ceil(floatval($the_core_less_variables['fw-header-padding-bot'])*0.37); ?>px;
}
.header-4.fw-header-boxed .fw-header-main .fw-nav-wrap .fw-container {
  padding-bottom: <?php echo floatval($the_core_less_variables['fw-header-padding-top'])*0.75; ?>px;
}
.header-4.fw-header-boxed.fw-header-sticky .fw-sticky-menu .fw-nav-wrap .fw-container {
  padding-top: <?php echo floatval($the_core_less_variables['fw-header-padding-top'])*0.75; ?>px;
}

/* Sticky Header */
.header-4 .fw-sticky-menu .fw-header-main .fw-wrap-logo-info-text {
  display: none;
}
.header-4 .fw-sticky-menu .fw-header-main {
  padding-top: <?php echo esc_js($the_core_less_variables['fw-sticky-menu-padding']); ?>px;
  padding-bottom: <?php echo esc_js($the_core_less_variables['fw-sticky-menu-padding']); ?>px;
}
.header-4.fw-header-boxed .fw-sticky-menu .fw-header-main {
  padding: 0;
}
.header-4.fw-header-boxed.fw-header-sticky .fw-sticky-menu .fw-nav-wrap .fw-container {
  padding-top: <?php echo esc_js($the_core_less_variables['fw-sticky-menu-padding']); ?>px;
  padding-bottom: <?php echo esc_js($the_core_less_variables['fw-sticky-menu-padding']); ?>px;
}


/*----> Responsive <---- */
/* Screen 1024px */
@media (max-width: 1199px) {
  .header-4 .primary-navigation > ul > li > a,
  .header-4 .primary-navigation > ul > li:first-child > a {
    margin-left: <?php echo floatval($the_core_less_variables['fw-menu-item-margin-left'])/3; ?>px;
    margin-right: <?php echo floatval($the_core_less_variables['fw-menu-item-margin-left'])/3; ?>px;
  }
}
/* Screen 568px */
@media(max-width:767px){
  .header-4 .fw-nav-wrap .fw-container{
    width: 100%;
  }
}
