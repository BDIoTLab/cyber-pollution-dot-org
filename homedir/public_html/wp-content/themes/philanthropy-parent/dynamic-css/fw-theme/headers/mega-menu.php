/* Mega Menu */
.fw-site-navigation > ul > .menu-item-has-mega-menu {
  position: relative;
}
.fw-site-navigation > ul .mega-menu {
  display: none;
  position: absolute;
  left: 0;
  z-index: 1308;
  width: 100%;
  text-align: left;
  text-transform: none;
  top: <?php echo floatval($the_core_less_variables['fw-menu-item-height'])/2 + floatval($the_core_less_variables['fw-menu-item-font-size'])/2; ?>px;
  padding-top: <?php echo floatval($the_core_less_variables['fw-menu-item-height'])/2 - floatval($the_core_less_variables['fw-menu-item-font-size'])/2; ?>px;
  font-size: <?php echo esc_js($the_core_less_variables['fw-dropdown-font-size']); ?>;
  font-family: <?php echo ($the_core_less_variables['fw-dropdown-font-family']); ?>;
}
.fw-site-navigation > ul .mega-menu.mega-menu-select {
  display: block !important;
}
.fw-site-navigation > ul .mega-menu p {
  font-size: <?php echo ceil(floatval($the_core_less_variables['fw-dropdown-font-size'])*0.9); ?>px;
  font-family: <?php echo ($the_core_less_variables['fw-dropdown-font-family']); ?>;
  margin: 0 0 1em 0;
  padding: 10px 12% !important;
  text-transform: none;
}
.fw-site-navigation > ul .mega-menu ul {
  top: 0;
  left: 0;
  float: none;
  position: static;
  display: table;
  table-layout: fixed;
  width: auto;
  padding: 13px 0;
  background: <?php echo esc_js($the_core_less_variables['fw-dropdown-bg-color']); ?>;
  background: <?php echo the_core_hex2rgba($the_core_less_variables['fw-dropdown-bg-color'], 0.94); ?>;
}
.fw-site-navigation > ul .mega-menu ul > li {
  width: <?php echo esc_js($the_core_less_variables['fw-dropdown-width']); ?>;
  font-family: <?php echo ($the_core_less_variables['fw-menu-font-family']); ?>;
  font-size: <?php echo esc_js($the_core_less_variables['fw-menu-item-font-size']); ?>;
  display: table-cell;
  float: none;
  background: transparent;
}
.fw-site-navigation > ul .mega-menu ul > li:first-child {
  border-left: none;
  padding-top: 0;
}
.fw-site-navigation > ul .mega-menu ul > li:last-child{
  padding-bottom: 0;
}
.fw-site-navigation > ul .mega-menu ul li > ul {
  background: none;
  padding: 0;
}
.fw-site-navigation > ul .mega-menu ul > li a {
  padding: 10px 12% !important;
}
.fw-site-navigation > ul .mega-menu ul > li ul > li {
  font-size: <?php echo esc_js($the_core_less_variables['fw-dropdown-font-size']); ?>;
  font-family: <?php echo ($the_core_less_variables['fw-dropdown-font-family']); ?>;
  display: block;
  text-transform: none;
  width: 100%;
  background: transparent;
  border: none;
}
.fw-site-navigation > ul .mega-menu > ul > li > a {
  color: #fff;
}
.fw-site-navigation > ul .mega-menu > ul > li > a:before {
  display: none;
}
.fw-site-navigation > ul .mega-menu > ul > li:hover a {
  background: none;
}
.fw-site-navigation > ul .mega-menu ul > li > ul,
.fw-site-navigation > ul li:hover > ul {
  display: block;
}
/* Titles in Sub menu */
.fw-site-navigation > ul .mega-menu > ul > li > ul > li:hover a {
  color: <?php echo esc_js($the_core_less_variables['fw-dropdown-text-color-hover']); ?>;
  background: <?php echo esc_js($the_core_less_variables['fw-dropdown-bg-color-hover']); ?>;
}
.fw-site-navigation > ul > li ul > li > div {
  color: <?php echo esc_js($the_core_less_variables['fw-dropdown-text-color']); ?>;
  padding: 0 12%;
  line-height: 1.5em;
  font-weight: 400;
}
/* mega menu row */
.fw-site-navigation > ul .mega-menu-row {
  width: 100%;
  display: table;
  table-layout: fixed;
  border-top: 1px solid rgba(255, 255, 255, 0.15);
}
.fw-site-navigation > ul .mega-menu-row:first-child {
  border-top: none;
}
/* mega menu column */
.fw-site-navigation > ul .mega-menu-col {
  display: table-cell;
  width: 240px;
  border-left: 1px solid rgba(255, 255, 255, 0.15);
}
.fw-site-navigation > ul .mega-menu-col:first-child {
  border-left: none;
}
.fw-site-navigation > ul .mega-menu-col > a {
  display: inline-block;
  width: auto !important;
}
.fw-site-navigation > ul .mega-menu-col > a:before {
  top: 2px;
}
