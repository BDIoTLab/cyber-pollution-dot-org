/* Header Type 5 */
/* Aligned Element Header 5 */
.header-5 .fw-header-main .fw-container {
  padding-top: <?php echo ceil(floatval($the_core_less_variables['fw-header-padding-top'])*0.87); ?>px;
  padding-bottom: <?php echo ceil(floatval($the_core_less_variables['fw-header-padding-bot'])*0.87); ?>px;
}
.header-5.fw-top-logo-left .fw-wrap-logo {
  float: left;
}
.header-5.fw-top-logo-left .fw-search {
  float: right;
  margin-left: 20px;
}
.header-5.fw-top-logo-left .fw-nav-wrap {
  float: right;
}
.header-5.fw-top-logo-right .fw-wrap-logo {
  float: right;
}
.header-5.fw-top-logo-right .fw-search {
  float: left;
  margin-right: 20px;
}
.header-5.fw-top-logo-right .fw-search .fw-wrap-search-form {
  margin-left: 0;
}
.header-5.fw-top-logo-right .fw-nav-wrap {
  float: left;
}
.header-5 .fw-header-main .fw-search,
.header-5 .fw-header-main .fw-mini-search {
  top: 1px;
}
.header-5 .fw-nav-wrap {
  max-width: 78%;
}
.header-5 .primary-navigation > ul > li {
  border-bottom: none;
}
.header-5 .primary-navigation > ul > li:first-child > a {
  margin-left: 0;
}
.header-5 .primary-navigation > ul > li:first-child > ul {
  left: 0;
}
.header-5 .primary-navigation > ul > li > a {
  margin-right: 0;
}
.header-5.fw-logo-retina .fw-mini-search {
  top: 0;
}
.header-5.fw-logo-no-retina .fw-mini-search,
.header-5.fw-logo-no-retina .mmenu-link {
  top: 0;
}
.header-5.search-in-top-bar .fw-search {
  margin-top: 0 !important;
}

/* Sticky Header */
.header-5.fw-logo-no-retina .fw-sticky-menu .fw-mini-search,
.header-5.fw-logo-no-retina .fw-sticky-menu .mmenu-link {
  top: 0;
}
.header-5 .fw-sticky-menu .fw-header-main .fw-container {
  padding-top: <?php echo esc_js($the_core_less_variables['fw-sticky-menu-padding']); ?>px;
  padding-bottom: <?php echo esc_js($the_core_less_variables['fw-sticky-menu-padding']); ?>px;
}
.header-5 .fw-sticky-menu .fw-menu-open i.fa:before {
  background: <?php echo esc_js($the_core_less_variables['fw-sticky-menu-item-color']); ?>;
  box-shadow: 0 <?php echo ceil(floatval($the_core_less_variables['fw-header-5-menu-icon-height'])/2-1); ?>px 0 0 <?php echo esc_js($the_core_less_variables['fw-sticky-menu-item-color']); ?>, 0 <?php echo esc_js($the_core_less_variables['fw-header-5-menu-icon-height']-2); ?>px 0 0 <?php echo esc_js($the_core_less_variables['fw-sticky-menu-item-color']); ?>;
}
.header-5 .fw-sticky-menu .fw-menu-open:hover i.fa:before {
  background: <?php echo esc_js($the_core_less_variables['fw-sticky-menu-item-color-hover']); ?>;
  box-shadow: 0 <?php echo ceil(floatval($the_core_less_variables['fw-header-5-menu-icon-height'])/2-1); ?>px 0 0 <?php echo esc_js($the_core_less_variables['fw-sticky-menu-item-color-hover']); ?>, 0 <?php echo esc_js($the_core_less_variables['fw-header-5-menu-icon-height']-2); ?>px 0 0 <?php echo esc_js($the_core_less_variables['fw-sticky-menu-item-color-hover']); ?>;
}

/* Styling Menu in Header 5 */
.header-5 .site .fw-site-navigation.primary-navigation {
  display: none;
}
.header-5 .mm-menu {
  width: 100%;
  height: 100%;
  max-width: 100%;
  max-height: 100%;
  background-color: transparent;
}
.header-5 .mm-menu:before {
  content: '';
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  z-index: 5;
}
/* Icon Menu (Menu Open Icon) */
.header-5 .fw-menu-open {
  line-height: 0;
  display: block;
}
.header-5 .fw-menu-open i.fa {
  width: <?php echo esc_js($the_core_less_variables['fw-header-5-menu-icon-size']); ?>;
  height: <?php echo esc_js($the_core_less_variables['fw-header-5-menu-icon-height']); ?>;
  position: relative;
}
.header-5 .fw-menu-open i.fa:before {
  content: "";
  position: absolute;
  left: 0;
  top: 0;
  width: 100%;
  height: 2px;
  background: <?php echo esc_js($the_core_less_variables['fw-header-5-menu-icon-color']); ?>;
  box-shadow: 0 <?php echo ceil(floatval($the_core_less_variables['fw-header-5-menu-icon-height'])/2-1); ?>px 0 0 <?php echo esc_js($the_core_less_variables['fw-header-5-menu-icon-color']); ?>, 0 <?php echo esc_js($the_core_less_variables['fw-header-5-menu-icon-height']-2); ?>px 0 0 <?php echo esc_js($the_core_less_variables['fw-header-5-menu-icon-color']); ?>;
}
.header-5 .fw-menu-open:hover i.fa:before {
  background: <?php echo esc_js($the_core_less_variables['fw-header-5-menu-icon-color-hover']); ?>;
  box-shadow: 0 <?php echo ceil(floatval($the_core_less_variables['fw-header-5-menu-icon-height'])/2-1); ?>px 0 0 <?php echo esc_js($the_core_less_variables['fw-header-5-menu-icon-color-hover']); ?>, 0 <?php echo esc_js($the_core_less_variables['fw-header-5-menu-icon-height']-2); ?>px 0 0 <?php echo esc_js($the_core_less_variables['fw-header-5-menu-icon-color-hover']); ?>;
}
/* Menu Styling */
.header-5 .mm-panels,
.header-5 .mm-panels > .mm-panel {
  background: none;
  z-index: 10;
}
.header-5 .mm-menu .mm-panels,
.header-5 .mm-menu .mm-panel,
.header-5 .mm-menu .mm-panel.mm-current {
  box-shadow: none;
}
.header-5 .mm-panels .mm-panel {
  height: 100%;
  display: -webkit-flex;
  display: flex;
  -webkit-align-content: center;
  align-content: center;
  -webkit-flex-flow: row wrap;
  flex-flow: row wrap;
  padding: 0 50px;
}
html.ie9 .header-5 .mm-panels .mm-panel {
  display: table;
  width: 100%;
  height: 100%;
}
.header-5 .mm-panels .mm-panel.mm-hasnavbar {
  padding-top: 40px;
}
.header-5 .mm-panels > .mm-panel > .mm-listview {
  margin-left: 0;
  max-height: 100%;
}
html.ie9 .header-5 .mm-panels > .mm-panel > .mm-listview {
  display: table-cell;
  vertical-align: middle;
  max-height: 100%;
}
.mm-panels > .mm-panel > .mm-listview:first-child,
.mm-panels > .mm-panel > .mm-navbar + .mm-listview {
  margin: 0;
}
.header-5 .mm-listview > li,
.header-5 .mm-listview > li:after,
.header-5 .mm-listview > li .mm-next,
.header-5 .mm-listview > li .mm-next:before {
  border: none;
}
.header-5 .mm-listview > li {
  overflow: hidden;
  display: inline-block;
  float: left;
  text-transform: none;
}
.header-5 .mm-listview > li > a,
.header-5 .mm-listview > li > span {
  padding: 0;
  float: left;
}
.header-5 .mm-listview > li:last-child {
  margin-bottom: 30px;
}
.header-5 .mm-menu {
  background-color: <?php echo esc_js($the_core_less_variables['fw-header-5-bg-color']); ?>;
  background-image: url(<?php echo ($the_core_less_variables['fw-header-5-bg-image']); ?>);
  background-repeat: <?php echo esc_js($the_core_less_variables['fw-header-5-bg-repeat']); ?>;
  background-position-x: <?php echo esc_js($the_core_less_variables['fw-header-5-bg-horizontal-position']); ?>;
  background-position-y: <?php echo esc_js($the_core_less_variables['fw-header-5-bg-vertical-position']); ?>;
  background-size: <?php echo esc_js($the_core_less_variables['fw-header-5-bg-size']); ?>;
  color: <?php echo esc_js($the_core_less_variables['fw-top-menu-color']); ?>;
  font-size: <?php echo esc_js($the_core_less_variables['font-size-base']); ?>;
}
/* Set bg-color for opened menu */
.header-5 .mm-menu:before {
  background-color: <?php echo the_core_hex2rgba($the_core_less_variables['fw-header-5-overlay-color'], floatval($the_core_less_variables['fw-header-5-overlay-transparent'])/100 ); ?>;
}
.header-5 .mm-menu .mm-listview {
  font-family: <?php echo ($the_core_less_variables['fw-menu-font-family']); ?>;
  font-size: <?php echo esc_js($the_core_less_variables['fw-menu-item-font-size']); ?>;
  font-weight: <?php echo esc_js($the_core_less_variables['fw-menu-font-weight']); ?>;
  font-style: <?php echo esc_js($the_core_less_variables['fw-menu-font-style']); ?>;
  line-height: <?php echo esc_js($the_core_less_variables['fw-menu-item-height']); ?>;
  letter-spacing: <?php echo esc_js($the_core_less_variables['fw-menu-letter-spacing']); ?>;
}
.header-5 .mm-menu .mm-listview > li {
  margin-top: <?php echo esc_js($the_core_less_variables['fw-menu-item-margin-left']); ?>;
}
.header-5 .mm-menu .mm-listview > li:first-child {
  margin-top: 0;
}
.header-5 .mm-menu .mm-listview > li > a:not(.mm-next) {
  color: <?php echo esc_js($the_core_less_variables['fw-top-menu-color']); ?>;
}

/* current menu line */
<?php $the_core_less_variables['calculate-position-for-item'] = ceil( floatval($the_core_less_variables['fw-menu-item-height'])/2 - floatval($the_core_less_variables['fw-menu-item-font-size'])/2 + floatval($the_core_less_variables['fw-menu-item-font-size']) + 8  ).'px'; ?>

.header-5 .mm-menu .mm-listview > li > a:not(.mm-next):after {
  background: <?php echo esc_js($the_core_less_variables['fw-top-menu-line-color']); ?>;
  -webkit-transition: all 0.2s ease 0s;
  -o-transition: all 0.2s ease 0s;
  transition: all 0.2s ease 0s;
  top: <?php echo esc_js($the_core_less_variables['calculate-position-for-item']); ?>;
}

<?php if( floatval($the_core_less_variables['calculate-position-for-item']) > floatval($the_core_less_variables['fw-menu-item-height']) ) : ?>
  /* if top value > line height item then set for current menu item top:auto & bottom: 0 */
  .header-5 .mm-menu .mm-listview > li > a:not(.mm-next):after {
    top: auto;
    bottom: 0;
  }
<?php endif; ?>

/* hover style */
.header-5 .mm-menu .mm-listview > li > a:not(.mm-next):hover {
  color: <?php echo esc_js($the_core_less_variables['fw-top-menu-item-color-hover']); ?>;
}
/* mm-next */
.header-5 .mm-menu .mm-listview > li a.mm-next:after {
  border-color: <?php echo esc_js($the_core_less_variables['fw-top-menu-color']); ?>;
}
/* current menu item */
.header-5 .mm-menu .mm-listview > li.current-menu-item > a,
.header-5 .mm-menu .mm-listview > li.current-menu-ancestor > a {
  color: <?php echo esc_js($the_core_less_variables['fw-top-menu-item-color-hover']); ?>;
}
/* Add space for 'Back' button */
.header-5 .mm-menu .mm-panel:not(:first-child) .mm-listview li:first-child {
  margin-top: <?php echo floatval($the_core_less_variables['fw-menu-item-margin-left'])/2; ?>px;
}
/* FadeIn Open Menu */
.header-5 .mm-menu.mm-fadeIn {
  opacity: 0;
  -webkit-transition: opacity 0.3s ease-in-out;
  -o-transition: opacity 0.3s ease-in-out;
  transition: opacity 0.3s ease-in-out;
}
.header-5 .mm-menu.mm-fadeIn.mm-front,
.header-5 .mm-menu.mm-fadeIn.mm-next {
  -webkit-transform: translate3d(0, 0, 0);
  -moz-transform: translate3d(0, 0, 0);
  -ms-transform: translate3d(0, 0, 0);
  -o-transform: translate3d(0, 0, 0);
  transform: translate3d(0, 0, 0);
}
html.mm-opening .header-5 .mm-fadeIn.mm-menu.mm-front,
html.mm-opening .header-5 .mm-menu.mm-next {
  opacity: 1;
}

/* Effect Panels */
/* Effect Panel: right/left */
.header-5 .mm-menu.mm-mm-effect-panels-left-right .mm-panel.mm-subopened {
  -webkit-transform: translate3d(-100%, 0, 0);
  -moz-transform: translate3d(-100%, 0, 0);
  -ms-transform: translate3d(-100%, 0, 0);
  -o-transform: translate3d(-100%, 0, 0);
  transform: translate3d(-100%, 0, 0);
}
/* Effect Panel: FadeIn */
.header-5 .mm-menu.mm-effect-panels-fadeIn .mm-panel {
  -webkit-transform: translate3d(0, 0, 0);
  -moz-transform: translate3d(0, 0, 0);
  -ms-transform: translate3d(0, 0, 0);
  -o-transform: translate3d(0, 0, 0);
  transform: translate3d(0, 0, 0);
  -webkit-transition: all 1s linear;
  -o-transition: all 1s linear;
  transition: all 1s linear;
}
.header-5 .mm-menu.mm-effect-panels-fadeIn .mm-panel.mm-subopened {
  -webkit-transform: translate3d(0, 0, 0);
  -moz-transform: translate3d(0, 0, 0);
  -ms-transform: translate3d(0, 0, 0);
  -o-transform: translate3d(0, 0, 0);
  transform: translate3d(0, 0, 0);
}
.header-5 .mm-menu.mm-effect-panels-fadeIn .mm-panel.mm-opened.mm-hidden,
.header-5 .mm-menu.mm-effect-panels-fadeIn .mm-panel.mm-opened.mm-subopened,
.header-5 .mm-menu.mm-effect-panels-fadeIn .mm-panel.mm-highest {
  display: none;
  -webkit-animation: fadeOut 1s;
  animation: fadeOut 1s;
}
.header-5 .mm-menu.mm-effect-panels-fadeIn .mm-panel.mm-current.mm-opened,
.header-5 .mm-menu.mm-effect-panels-fadeIn .mm-panel.mm-highest.mm-current.mm-opened {
  display: flex;
  -webkit-animation: fadeIn 1s;
  animation: fadeIn 1s;
}
/* Effect Panels: Zoom */
.header-5 .mm-menu.mm-effect-panels-zoom .mm-panel.mm-opened.mm-subopened {
  overflow: hidden;
}
/* Prev Button */
.header-5 .mm-menu .mm-navbar {
  border: none;
  position: relative;
  width: 100%;
  padding: 0;
}
.header-5 .mm-menu .mm-navbar .mm-btn {
  position: relative;
  display: inline-block;
  width: auto;
}
.header-5 .mm-navbar .mm-btn:first-child {
  padding-left: 0;
}
.header-5 .mm-prev:before {
  left: 0;
}
.header-5 .mm-menu .mm-navbar .mm-title {
  display: none;
}
.header-5 .mm-menu .mm-navbar .mm-prev {
  opacity: 0.85;
}
.header-5 .mm-menu .mm-navbar .mm-prev span {
  text-transform: none;
  margin-left: 20px;
}
.header-5 .mm-panel > .mm-navbar {
  height: auto;
}
.header-5 .mm-panel > .mm-navbar .mm-btn.mm-prev {
  padding: 0;
  height: auto;
}
.header-5 .mm-panels > .mm-panel:before,
.header-5 .mm-panels > .mm-panel:after {
  display: none;
}
.header-5 .mm-listview > li.menu-separator {
  display: none !important;
}
.header-5 .mm-menu .mm-listview > li.mm-selected > a:not(.mm-next),
.header-5 .mm-menu .mm-listview > li.mm-selected > span {
  background: none;
}
.header-5 .mm-menu .mm-listview > li > a:not(.mm-next) {
  position: relative;
  display: inline-block;
}
.header-5 .mm-menu .mm-listview > li > a:not(.mm-next):after {
  content: "";
  height: 1px;
  left: 50%;
  position: absolute;
  width: 0;
}
.header-5 .mm-menu .mm-listview > li > a:hover:not(.mm-next):after {
  width: 100%;
  margin-left: -50%;
}
.header-5 .mm-menu .mm-listview > li.current-menu-item a:not(.mm-next):after,
.header-5 .mm-menu .mm-listview > li.current-menu-ancestor a:not(.mm-next):after {
  width: 100%;
  margin-left: -50%;
}
.header-5 .mm-menu .mm-navbar .mm-prev span {
  font-family: <?php echo ($the_core_less_variables['fw-menu-font-family']); ?>;
  font-size: <?php echo esc_js($the_core_less_variables['fw-menu-item-font-size']); ?>;
  font-weight: <?php echo esc_js($the_core_less_variables['fw-menu-font-weight']); ?>;
  color: <?php echo esc_js($the_core_less_variables['fw-top-menu-color']); ?>;
}
.header-5 .mm-menu .mm-navbar .mm-prev:before {
  border-color: <?php echo esc_js($the_core_less_variables['fw-top-menu-color']); ?>;
}
.header-5 .mm-menu .mm-navbar .mm-prev:hover span {
  color: <?php echo esc_js($the_core_less_variables['fw-top-menu-item-color-hover']); ?>;
}
.header-5 .mm-menu .mm-navbar .mm-prev:hover:before {
  border-color: <?php echo esc_js($the_core_less_variables['fw-top-menu-item-color-hover']); ?>;
}

<?php if( floatval($the_core_less_variables['fw-menu-item-font-size']) > 30 ) : ?>
  .header-5 .mm-menu .mm-navbar .mm-prev span {
    font-size: <?php echo ceil(floatval($the_core_less_variables['fw-menu-item-font-size'])*0.6); ?>px;
  }
<?php elseif( floatval($the_core_less_variables['fw-menu-item-font-size']) <= 15 ) : ?>
  .header-5 .mm-menu .mm-navbar .mm-prev span {
    font-size: <?php echo ceil(floatval($the_core_less_variables['fw-menu-item-font-size'])*0.8); ?>px;
  }
<?php elseif( floatval($the_core_less_variables['fw-menu-item-font-size']) <= 30 ) : ?>
  .header-5 .mm-menu .mm-navbar .mm-prev span {
    font-size: <?php echo ceil(floatval($the_core_less_variables['fw-menu-item-font-size'])*0.7); ?>px;
  }
<?php endif; ?>

/* Next Arrow */
.header-5 .mm-next:after {
  top: 50%;
  margin-top: -4px;
}
.header-5 .mm-listview .mm-next {
  opacity: 0.6;
}
/* Close Button */
.header-5 .fw-close-menu-header5 {
  position: absolute;
  z-index: 100;
  top: 20px;
  right: 27px;
  opacity: 0.8;
}
.header-5 .fw-close-menu-header5 .mm-close {
  width: 35px;
  height: 35px;
  display: block;
  font-style: normal;
}
.header-5 .fw-close-menu-header5 .mm-close:before,
.header-5 .fw-close-menu-header5 .mm-close:after {
  content: '';
  position: absolute;
  height: 2px;
  width: 100%;
  top: 50%;
  left: 0;
  margin-top: -1px;
  background: <?php echo esc_js($the_core_less_variables['fw-top-menu-color']); ?>;
}
.header-5 .fw-close-menu-header5 .mm-close:before {
  transform: rotate(45deg);
}
.header-5 .fw-close-menu-header5 .mm-close:after {
  transform: rotate(-45deg);
}
.header-5 .fw-close-menu-header5:hover .mm-close:before,
.header-5 .fw-close-menu-header5:hover .mm-close:after {
  background: <?php echo esc_js($the_core_less_variables['fw-top-menu-item-color-hover']); ?>;
}
/* No Set Logo */
.header-5.fw-logo-no-set .fw-nav-wrap {
  max-width: 100%;
  text-align: center;
  float: none;
}
/* Align Menu */
/* Align Left */
.header-5.header-align-left .mm-panels .mm-panel {
  -webkit-justify-content: flex-start;
  justify-content: flex-start;
}
.header-5.header-align-left .mm-listview > li {
  margin-right: 50%;
}
.header-5.header-align-left .mm-panel.mm-hasnavbar .mm-navbar {
  text-align: left;
}
/* Align Center */
.header-5.header-align-center .mm-listview > li,
.header-5.header-align-center .mm-listview .mm-next {
  height: <?php echo esc_js($the_core_less_variables['fw-menu-item-height']); ?>;
}
.header-5.header-align-center .mm-panels .mm-panel {
  -webkit-justify-content: center;
  justify-content: center;
}
.header-5.header-align-center .mm-listview > li {
  display: block;
  float: none;
  text-align: center;
}
.header-5.header-align-center .fw-list-has-children .mm-listview > li:not(.menu-item-has-children) > a:not(.mm-next) {
  margin-right: 50px;
}
.header-5.header-align-center .mm-listview > li > a {
  float: none;
}
.header-5.header-align-center .mm-listview .mm-next {
  position: relative;
  display: inline-block;
}
.header-5.header-align-center .mm-panel.mm-hasnavbar .mm-navbar {
  text-align: center;
}
.header-5.header-align-center .fw-list-has-children .mm-navbar .mm-btn:first-child {
  margin-right: 50px;
}
/* Align Right */
.header-5.header-align-right .mm-panels .mm-panel {
  -webkit-justify-content: flex-end;
  justify-content: flex-end;
}
.header-5.header-align-right .mm-listview > li {
  margin-left: 50%;
  float: right;
}
.header-5.header-align-right .mm-listview .mm-next + a,
.header-5.header-align-right .mm-listview .mm-next + span {
  margin-right: auto;
  margin-left: 50px;
}
.header-5.header-align-right .mm-listview .mm-next {
  right: auto;
  left: 0;
  transform: scale(-1);
}
.header-5.header-align-right .mm-panel.mm-hasnavbar .mm-navbar {
  text-align: right;
}
/* WP mobile bar */
.mm-opening .header-5 .fw-wrap-wp-bar > div {
  -webkit-transform: translate(0, 0) !important;
  -moz-transform: translate(0, 0) !important;
  -ms-transform: translate(0, 0) !important;
  -o-transform: translate(0, 0) !important;
  transform: translate(0, 0) !important;
  z-index: 1 !important;
}

/*----> Responsive <---- */
/* Screen 1024px */
@media(max-width:1199px){
  .header-5.header-align-right .fw-close-menu-header5 {
    right: auto;
    left: 27px;
  }
}
/* Screen 568px */
@media(max-width:767px){
  .header-5 .mm-menu .mm-panel .mm-listview {
    font-size: 18px;
    line-height: 26px;
  }
  .header-5.header-align-center .mm-panel .mm-listview > li,
  .header-5.header-align-center .mm-panel .mm-listview .mm-next {
    height: 26px;
  }
  .header-5 .mm-menu .mm-panel .mm-listview > li {
    margin-top: 30px;
  }
  .header-5 .mm-panels .mm-panel {
    padding: 0 40px;
  }
  .mm-menu.mm-effect-panels-zoom .mm-panel.mm-opened.mm-subopened {
    -webkit-transform: scale(0.7, 0.7) translate3d(-100%, 0, 0);
    -moz-transform: scale(0.7, 0.7) translate3d(-100%, 0, 0);
    -ms-transform: scale(0.7, 0.7) translate3d(-100%, 0, 0);
    -o-transform: scale(0.7, 0.7) translate3d(-100%, 0, 0);
    transform: scale(0.7, 0.7) translate3d(-100%, 0, 0);
  }
}
/* Screen 320px */
@media(max-width:479px){
  .header-5 .mm-panels .mm-panel {
    padding: 0 25px;
  }
}
