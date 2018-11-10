/* Top Nav Menu */
/* -------------------------------------------------- */
.fw-nav-wrap .fw-site-navigation {
  font-size: 0;
}
.fw-site-navigation > ul {
  font-family: <?php echo ($the_core_less_variables['fw-menu-font-family']); ?>;
  font-size: <?php echo esc_js($the_core_less_variables['fw-menu-item-font-size']); ?>;
  font-weight: <?php echo esc_js($the_core_less_variables['fw-menu-font-weight']); ?>;
  font-style: <?php echo esc_js($the_core_less_variables['fw-menu-font-style']); ?>;
  margin: 0 auto;
  padding: 0;
  list-style: none;
}
.fw-site-navigation > ul li {
  position: relative;
  list-style: none;
}
.fw-site-navigation > ul .menu-item-has-icon i {
  font-size: <?php echo esc_js($the_core_less_variables['fw-dropdown-icon-size']); ?>;
  margin-right: 10px;
  position: relative;
}
/* 1st level */
.fw-site-navigation > ul > li {
  float: left;
  position: relative;
}
.fw-site-navigation > ul > li > a {
  display: inline-block;
  float: left;
  position: relative;
  color: <?php echo esc_js($the_core_less_variables['fw-top-menu-color']); ?>;
  line-height: <?php echo esc_js($the_core_less_variables['fw-menu-item-height']); ?>;
  letter-spacing: <?php echo esc_js($the_core_less_variables['fw-menu-letter-spacing']); ?>;
  -webkit-transition: all 0.2s ease 0s;
  -o-transition: all 0.2s ease 0s;
  transition: all 0.2s ease 0s;
}
.fw-sticky-menu .fw-site-navigation > ul > li > a {
  color: <?php echo esc_js($the_core_less_variables['fw-sticky-menu-item-color']); ?>;
}

/* current menu line */
.fw-site-navigation > ul > li > a:after {
  content: "";
  bottom: 0;
  height: 1px;
  left: 50%;
  position: absolute;
  width: 0;
  background: <?php echo esc_js($the_core_less_variables['fw-top-menu-line-color']); ?>;
  -webkit-transition: all 0.2s ease 0s;
  -o-transition: all 0.2s ease 0s;
  transition: all 0.2s ease 0s;
}
.fw-sticky-menu .fw-site-navigation > ul > li > a:after {
  background: <?php echo esc_js($the_core_less_variables['fw-sticky-menu-item-color-hover']); ?>;
}

/* hover style */
.fw-site-navigation > ul > li:hover a:after {
  width: 100%;
  margin-left: -50%;
}
.fw-site-navigation > ul > li > a:hover {
  color: <?php echo esc_js($the_core_less_variables['fw-top-menu-item-color-hover']); ?>;
}
.fw-sticky-menu .fw-site-navigation > ul > li > a:hover {
  color: <?php echo esc_js($the_core_less_variables['fw-sticky-menu-item-color-hover']); ?>;
}

/* current menu item */
.fw-site-navigation > ul > li.current-menu-item a:after,
.fw-site-navigation > ul > li.current-menu-ancestor a:after {
  width: 100%;
  margin-left: -50%;
}
.fw-site-navigation > ul > li.current-menu-item > a {
  color: <?php echo esc_js($the_core_less_variables['fw-top-menu-item-color-hover']); ?>;
}
.fw-sticky-menu .fw-site-navigation > ul > li.current-menu-item > a {
  color: <?php echo esc_js($the_core_less_variables['fw-sticky-menu-item-color-hover']); ?>;
}

/* Menu Separators */
.fw-site-navigation > ul > li.menu-separator a:after {
  display: none;
}
.fw-site-navigation > ul > li.menu-separator a:hover {
  color: <?php echo esc_js($the_core_less_variables['fw-top-menu-color']); ?>;
  cursor: default;
}
/* 2nd level */
.fw-site-navigation > ul > li ul {
  top: <?php echo floatval($the_core_less_variables['fw-menu-item-height'])/2 + floatval($the_core_less_variables['fw-menu-item-font-size'])/2; ?>px;
  width: <?php echo esc_js($the_core_less_variables['fw-dropdown-width']); ?>;
  font-size: <?php echo esc_js($the_core_less_variables['fw-dropdown-font-size']); ?>;
  font-family: <?php echo ($the_core_less_variables['fw-dropdown-font-family']); ?>;
  padding-top: <?php echo floatval($the_core_less_variables['fw-menu-item-height'])/2 - floatval($the_core_less_variables['fw-menu-item-font-size'])/2; ?>px;
  padding-left: 0;
  padding-right: 0;
  position: absolute;
  left: 0;
  z-index: 1308;
  text-align: left;
  text-transform: none;
  display: none;
}
.fw-site-navigation > ul > li > ul > li:first-child:hover > ul {
  top: 13px;
}
.fw-site-navigation > ul > li ul > li {
  display: block;
  width: 100%;
  margin-left: 0;
  float: left;
}
.fw-site-navigation > ul > li ul > li:first-child {
  padding-top: 13px;
}
.fw-site-navigation > ul > li ul > li:last-child {
  padding-bottom: 13px;
}
.fw-site-navigation > ul > li ul > li > a {
  display: block;
  letter-spacing: <?php echo esc_js($the_core_less_variables['fw-dropdown-letter-spacing']); ?>;
  line-height: 1.2em;
  padding: 10px 12% !important;
  margin: 0 !important;
}
.fw-site-navigation > ul > li ul > li.menu-item-has-icon > a:before {
  margin-right: 0;
  content: "";
}
.fw-site-navigation > ul > li ul.left {
  left: -<?php echo floatval($the_core_less_variables['fw-dropdown-width'])+1; ?>px;
}
.fw-site-navigation > ul > li ul.left ul {
  left: -<?php echo floatval($the_core_less_variables['fw-dropdown-width'])+1; ?>px;
}
.fw-site-navigation > ul > li ul > li {
  color: <?php echo esc_js($the_core_less_variables['fw-dropdown-text-color']); ?>;
  background: <?php echo esc_js($the_core_less_variables['fw-dropdown-bg-color']); ?>;
  background: <?php echo the_core_hex2rgba($the_core_less_variables['fw-dropdown-bg-color'], 0.94); ?>;
  -webkit-transition: all 0.2s ease;
  -o-transition: all 0.2s ease;
  transition: all 0.2s ease;
}
.fw-site-navigation > ul > li ul > li > a {
  color: <?php echo esc_js($the_core_less_variables['fw-dropdown-text-color']); ?>;
}
.fw-site-navigation > ul > li ul > li > a:before {
  width: <?php echo esc_js($the_core_less_variables['fw-dropdown-font-size']); ?>;
  font-size: <?php echo floor(floatval($the_core_less_variables['fw-dropdown-icon-size'])*1.35); ?>px;
}
.fw-site-navigation > ul > li ul > li:hover > a,
.fw-site-navigation > ul > li ul > li.parent.hover > a,
.fw-site-navigation > ul > li ul > li.current-menu-item > a {
  color: <?php echo esc_js($the_core_less_variables['fw-dropdown-text-color-hover']); ?>;
  background: <?php echo esc_js($the_core_less_variables['fw-dropdown-bg-color-hover']); ?>;
}
/* 3rd level */
.fw-site-navigation > ul > li ul > li > ul {
  top: 0;
  padding: 0;
  background: none;
  left: <?php echo floatval($the_core_less_variables['fw-dropdown-width'])+1; ?>px;
}
.fw-site-navigation > ul > li ul > li:hover > ul {
  display: block;
}
.fw-site-navigation > ul > li ul > li > ul > li {
  background: <?php echo esc_js($the_core_less_variables['fw-dropdown-bg-color']); ?>;
  background: <?php echo the_core_hex2rgba($the_core_less_variables['fw-dropdown-bg-color'], 0.94); ?>;
}
.fw-site-navigation > ul > li ul > li > ul > li:first-child,
.fw-site-navigation > ul > li ul > li > ul > li:last-child {
  padding: 0;
}
.fw-site-navigation > ul > li > ul.left {
  right: <?php echo floatval($the_core_less_variables['fw-menu-item-margin-left'])*2; ?>px;
  left: auto;
}
/* other level */
.fw-site-navigation > ul > li ul > li > ul ul{
  top: 0;
}
/* Primary & Secondary Menu Error Message */
.fw-primary-menu-message,
.fw-secondary-menu-message {
  color: #ff0000;
  background: #fff;
  border: 1px solid #ff0000;
  padding: 5px;
}
.fw-primary-menu-message a,
.fw-secondary-menu-message a {
  color: #ff0000;
  text-decoration: underline;
}
.fw-primary-menu-message a:hover,
.fw-secondary-menu-message a:hover {
  color: #ff0000;
  text-decoration: none;
}
