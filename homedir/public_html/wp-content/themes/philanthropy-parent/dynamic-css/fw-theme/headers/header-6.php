/* Header Type 6 */
/* Menu Styling */
.header-6 .fw-header .fw-header-main {
  display: none;
}
.header-6 .fw-container {
  max-width: 100%;
}
.header-6 #mm-blocker {
  display: none !important;
}
.header-6 .mm-slideout {
  width: auto !important;
  margin-left: 0;
  -webkit-transition: -webkit-transform 0.4s ease;
  -ms-transition: -ms-transform 0.4s ease;
  transition: transform 0.4s ease;
}
.header-6 .fullwidthbanner-container {
  max-width: 100%;
  left: 0 !important;
}
.fw-logo-retina .fw-site-logo,
.fw-logo-no-retina .fw-site-logo {
  max-width: 100%;
}
.header-6 .fw-wrap-logo {
  padding-top: 36px;
}
.header-6 .mm-menu {
  text-transform: none;
}
.header-6 .mm-menu:before {
  content: '';
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
}
.header-6 .mm-menu.mm-widescreen.mm-pageshadow:after {
  content:none;
  display:none;
}
.header-6 .mm-menu > .mm-navbar,
.header-6 .mm-panels > .mm-panel {
  padding: 0 30px;
}
.header-6 .mm-panels > .mm-panel {
  height: 97%;
}
.header-6 .mm-panels,
.header-6 .mm-panels > .mm-panel {
  background: none;
}
.header-6 .mm-menu .mm-panels,
.header-6 .mm-menu .mm-panel,
.header-6 .mm-menu .mm-panel.mm-current {
  box-shadow: none;
}
.header-6 #header-menu {
  background-color: <?php echo esc_js($the_core_less_variables['fw-header-6-bg-color']); ?>;
  background-image: url(<?php echo ($the_core_less_variables['fw-header-6-bg-image']); ?>);
  background-repeat: <?php echo esc_js($the_core_less_variables['fw-header-6-bg-repeat']); ?>;
  background-position-x: <?php echo esc_js($the_core_less_variables['fw-header-6-bg-horizontal-position']); ?>;
  background-position-y: <?php echo esc_js($the_core_less_variables['fw-header-6-bg-vertical-position']); ?>;
  background-size: <?php echo esc_js($the_core_less_variables['fw-header-6-bg-size']); ?>;
  -webkit-box-shadow: 1px 0 15px 0 rgba(0, 0, 0, 0.1);
  box-shadow: 1px 0 15px 0 rgba(0, 0, 0, 0.1);
  -webkit-transition: transform 0.4s ease;
  -o-transition: transform 0.4s ease;
  transition: transform 0.4s ease;
}
.header-6 #header-menu.mm-menu {
  color: <?php echo esc_js($the_core_less_variables['fw-top-menu-color']); ?>;
  font-size: <?php echo esc_js($the_core_less_variables['font-size-base']); ?>;
}
/* Set bg-color for opened menu */
.header-6 #header-menu.mm-menu:before {
  background-color: <?php echo the_core_hex2rgba($the_core_less_variables['fw-header-6-overlay-color'], floatval($the_core_less_variables['fw-header-6-overlay-transparent'])/100 ); ?>;
}
.header-6 .mm-listview {
  width: 100%;
}
.header-6 .mm-listview > li,
.header-6 .mm-listview > li:after,
.header-6 .mm-listview > li .mm-next,
.header-6 .mm-listview > li .mm-next:before,
.header-6 .mm-panel.mm-hasnavbar .mm-navbar {
  border: none;
}
.header-6 .mm-listview > li > a,
.header-6 .mm-listview > li > span {
  padding: 0;
}
.mm-menu > .mm-navbar {
  border: none;
  padding: 0 20px;
  height: auto;
  background: none;
}
.header-6 .mm-menu .mm-navbar .mm-title {
  display: none;
}
.header-6 #header-menu.mm-menu .mm-listview {
  font-family: <?php echo ($the_core_less_variables['fw-menu-font-family']); ?>;
  font-size: <?php echo esc_js($the_core_less_variables['fw-menu-item-font-size']); ?>;
  font-weight: <?php echo esc_js($the_core_less_variables['fw-menu-font-weight']); ?>;
  font-style: <?php echo esc_js($the_core_less_variables['fw-menu-font-style']); ?>;
  line-height: <?php echo esc_js($the_core_less_variables['fw-menu-item-height']); ?>;
  letter-spacing: <?php echo esc_js($the_core_less_variables['fw-menu-letter-spacing']); ?>;
}
.header-6 #header-menu .mm-panels > .mm-panel > .mm-listview {
  margin: 0;
}
.header-6 #header-menu.mm-menu .mm-listview > li {
  margin-top: <?php echo esc_js($the_core_less_variables['fw-menu-item-margin-left']); ?>;
  height: <?php echo esc_js($the_core_less_variables['fw-menu-item-height']); ?>;
}
.header-6 #header-menu.mm-menu .mm-listview > li:first-child {
  margin-top: 0;
}
.header-6 #header-menu.mm-menu .mm-listview > li > a:not(.mm-next) {
  color: <?php echo esc_js($the_core_less_variables['fw-top-menu-color']); ?>;
}
.header-6 .mm-menu .mm-listview > li.mm-selected > a:not(.mm-next),
.header-6 .mm-menu .mm-listview > li.mm-selected > span {
  background: none;
}
.header-6 .mm-menu .mm-listview > li > a:not(.mm-next) {
  position: relative;
  display: inline-block;
}
.header-6 .mm-menu .mm-listview > li > a:not(.mm-next):after {
  content: "";
  height: 1px;
  left: 50%;
  position: absolute;
  width: 0;
}
.header-6 .mm-menu .mm-listview > li > a:hover:not(.mm-next):after {
  width: 100%;
  margin-left: -50%;
}
.header-6 .mm-menu .mm-listview > li.current-menu-item a:not(.mm-next):after,
.header-6 .mm-menu .mm-listview > li.current-menu-ancestor a:not(.mm-next):after {
  width: 100%;
  margin-left: -50%;
}
.header-6 .mm-listview > li .mm-next {
  position: relative;
  right: auto;
  background: transparent;
  display: inline-block;
}

/* current menu line */
<?php $the_core_less_variables['calculate-position-for-item'] = ceil( floatval($the_core_less_variables['fw-menu-item-height'])/2 - floatval($the_core_less_variables['fw-menu-item-font-size'])/2 + floatval($the_core_less_variables['fw-menu-item-font-size']) + 8  ).'px'; ?>

.header-6 #header-menu.mm-menu .mm-listview > li > a:not(.mm-next):after {
  background: <?php echo esc_js($the_core_less_variables['fw-top-menu-line-color']); ?>;
  -webkit-transition: all 0.2s ease 0s;
  -o-transition: all 0.2s ease 0s;
  transition: all 0.2s ease 0s;
  top: <?php echo esc_js($the_core_less_variables['calculate-position-for-item']); ?>;
}

<?php if( floatval($the_core_less_variables['calculate-position-for-item']) >= floatval($the_core_less_variables['fw-menu-item-height']) ) : ?>
  /* if top value > line height item then set for current menu item top:auto & bottom: 0 */
  .header-6 #header-menu.mm-menu .mm-listview > li > a:not(.mm-next):after{
    top: auto;
    bottom: 0;
  }
<?php endif?>

/* hover style */
.header-6 #header-menu.mm-menu .mm-listview > li > a:not(.mm-next):hover {
  color: <?php echo esc_js($the_core_less_variables['fw-top-menu-item-color-hover']); ?>;
}
/* mm-next */
.header-6 #header-menu.mm-menu .mm-listview > li a.mm-next {
  height: <?php echo esc_js($the_core_less_variables['fw-menu-item-height']); ?>;
}
.header-6 #header-menu.mm-menu .mm-listview > li a.mm-next:after {
  border-color: <?php echo esc_js($the_core_less_variables['fw-top-menu-color']); ?>;
}
/* current menu item */
.header-6 #header-menu.mm-menu .mm-listview > li.current-menu-item > a,
.header-6 #header-menu.mm-menu .mm-listview > li.current-menu-ancestor > a {
  color: <?php echo esc_js($the_core_less_variables['fw-top-menu-item-color-hover']); ?>;
}
/* Add space for 'Back' button */
.header-6 #header-menu.mm-menu .mm-panel:not(:first-child) .mm-listview li:first-child {
  margin-top: <?php echo floatval($the_core_less_variables['fw-menu-item-margin-left'])/2; ?>px;
}
/* Back Button */
.header-6 .mm-menu .mm-panel .mm-navbar {
  padding: 0 30px;
}
.header-6 .mm-menu .mm-navbar .mm-btn {
  position: relative;
  display: inline-block;
  width: auto;
}
.header-6 .mm-navbar .mm-btn:first-child {
  padding-left: 0;
}
.header-6 .mm-prev:before {
  left: 1px;
}
.header-6 .mm-menu .mm-navbar .mm-prev {
  opacity: 0.85;
}
.header-6 .mm-panel > .mm-navbar {
  height: auto;
}
.header-6 .mm-panel > .mm-navbar .mm-btn.mm-prev {
  padding: 0;
  height: auto;
}
.header-6 #header-menu.mm-menu .mm-navbar .mm-prev span {
  font-family: <?php echo ($the_core_less_variables['fw-menu-font-family']); ?>;
  font-size: <?php echo esc_js($the_core_less_variables['fw-menu-item-font-size']); ?>;
  font-weight: <?php echo esc_js($the_core_less_variables['fw-menu-font-weight']); ?>;
  color: <?php echo esc_js($the_core_less_variables['fw-top-menu-color']); ?>;
  text-transform: none;
  margin-left: 20px;
}
.header-6 #header-menu.mm-menu .mm-navbar .mm-prev:before {
  border-color: <?php echo esc_js($the_core_less_variables['fw-top-menu-color']); ?>;
}
.header-6 #header-menu.mm-menu .mm-navbar .mm-prev:hover span {
  color: <?php echo esc_js($the_core_less_variables['fw-top-menu-item-color-hover']); ?>;
}
.header-6 #header-menu.mm-menu .mm-navbar .mm-prev:hover:before {
  border-color: <?php echo esc_js($the_core_less_variables['fw-top-menu-item-color-hover']); ?>;
}

<?php if( floatval($the_core_less_variables['fw-menu-item-font-size']) > 30 ) : ?>
  .header-6 #header-menu.mm-menu .mm-navbar .mm-prev span {
    font-size: <?php echo ceil(floatval($the_core_less_variables['fw-menu-item-font-size'])*0.6); ?>px;
  }
<?php elseif( floatval($the_core_less_variables['fw-menu-item-font-size']) <= 15 ) : ?>
  .header-6 #header-menu.mm-menu .mm-navbar .mm-prev span {
    font-size: <?php echo ceil(floatval($the_core_less_variables['fw-menu-item-font-size'])*0.8); ?>px;
  }
<?php elseif( floatval($the_core_less_variables['fw-menu-item-font-size']) <= 30 ) : ?>
  .header-6 #header-menu.mm-menu .mm-navbar .mm-prev span {
    font-size: <?php echo ceil(floatval($the_core_less_variables['fw-menu-item-font-size'])*0.7); ?>px;
  }
<?php endif; ?>

/* Menu social */
.header-6 .header-6-socials {
  padding-bottom: 20px;
}
.header-6 .header-6-socials a {
  margin-left: 13px;
}
.header-6 .header-6-socials a:first-child {
  margin-left: 0;
}
.header-6 #header-menu.mm-menu .header-6-socials a {
  color: <?php echo esc_js($the_core_less_variables['fw-header-6-menu-social-color']); ?>;
  font-size: <?php echo esc_js($the_core_less_variables['fw-header-6-menu-social-size']); ?>;
  line-height: <?php echo esc_js($the_core_less_variables['fw-header-6-menu-social-size']); ?>;
}
.header-6 #header-menu.mm-menu .header-6-socials a:hover {
  color: <?php echo esc_js($the_core_less_variables['fw-header-6-menu-social-color-hover']); ?>;
}
/* ----------- */
/* Effect Panel: right/left */
.header-6 #header-menu.mm-menu.mm-mm-effect-panels-left-right .mm-panel.mm-subopened {
  -webkit-transform: translate3d(-100%, 0, 0);
  -moz-transform: translate3d(-100%, 0, 0);
  -ms-transform: translate3d(-100%, 0, 0);
  -o-transform: translate3d(-100%, 0, 0);
  transform: translate3d(-100%, 0, 0);
}
/* Effect Panel: FadeIn */
.header-6 .mm-menu.mm-effect-panels-fadeIn .mm-panel.mm-opened.mm-hidden,
.header-6 .mm-menu.mm-effect-panels-fadeIn .mm-panel.mm-opened.mm-subopened,
.header-6 .mm-menu.mm-effect-panels-fadeIn .mm-panel.mm-highest {
  display: none;
  -webkit-animation: fadeOut 1s;
  animation: fadeOut 1s;
}
.header-6 .mm-menu.mm-effect-panels-fadeIn .mm-panel.mm-current.mm-opened,
.header-6 .mm-menu.mm-effect-panels-fadeIn .mm-panel.mm-highest.mm-current.mm-opened {
  display: block;
  -webkit-animation: fadeIn 1s;
  animation: fadeIn 1s;
}
.header-6 #header-menu.mm-menu.mm-effect-panels-fadeIn .mm-panel {
  -webkit-transform: translate3d(0, 0, 0);
  -moz-transform: translate3d(0, 0, 0);
  -ms-transform: translate3d(0, 0, 0);
  -o-transform: translate3d(0, 0, 0);
  transform: translate3d(0, 0, 0);
  -webkit-transition: all 1s linear;
  -o-transition: all 1s linear;
  transition: all 1s linear;
}
.header-6 #header-menu.mm-menu.mm-effect-panels-fadeIn .mm-panel.mm-subopened {
  -webkit-transform: translate3d(0, 0, 0);
  -moz-transform: translate3d(0, 0, 0);
  -ms-transform: translate3d(0, 0, 0);
  -o-transform: translate3d(0, 0, 0);
  transform: translate3d(0, 0, 0);
}
/* Effect Panel: Zoom */
.header-6 #header-menu.mm-menu.mm-effect-panels-zoom .mm-panel.mm-opened.mm-subopened {
  -webkit-transform: scale(0.7, 0.7) translate3d(-100%, 0, 0);
  -moz-transform: scale(0.7, 0.7) translate3d(-100%, 0, 0);
  -ms-transform: scale(0.7, 0.7) translate3d(-100%, 0, 0);
  -o-transform: scale(0.7, 0.7) translate3d(-100%, 0, 0);
  transform: scale(0.7, 0.7) translate3d(-100%, 0, 0);
}
.header-6 .mm-menu.mm-effect-panels-zoom .mm-panel.mm-opened.mm-subopened {
  overflow: hidden;
}
/* Open icon */
.header-6 .fw-menu-open {
  display: none;
  box-sizing: border-box;
  width: 51px;
  height: 51px;
  position: absolute;
  top: 2px;
  right: 0;
  z-index: 100;
}
.header-6 .fw-menu-open span {
  top: 25px;
}
.header-6 .fw-menu-open:before {
  top: 18px;
}
.header-6 .fw-menu-open:after {
  top: 32px;
}
.header-6 #header-menu .fw-menu-open:before,
.header-6 #header-menu .fw-menu-open:after,
.header-6 #header-menu .fw-menu-open span {
  content: '';
  display: block;
  width: 25px;
  height: 2px;
  position: absolute;
  left: 50%;
  margin-left: -12.5px;
  -webkit-transition: none 0.5s ease 0.5s;
  transition: none 0.5s ease 0.5s;
  -webkit-transition-property: transform, top, bottom, left, opacity;
  transition-property: transform, top, bottom, left, opacity;
  background: <?php echo esc_js($the_core_less_variables['fw-top-menu-color']); ?>;
}
.header-6 #header-menu .fw-menu-open:before:hover,
.header-6 #header-menu .fw-menu-open:after:hover,
.header-6 #header-menu .fw-menu-open span:hover {
  background: <?php echo esc_js($the_core_less_variables['fw-top-menu-item-color-hover']); ?>;
}
html.mm-opening .header-6 .fw-menu-open span {
  left: -50px;
  opacity: 0;
}
html.mm-opening .header-6 .fw-menu-open:before,
html.mm-opening .header-6 .fw-menu-open:after {
  top: 25px;
}
html.mm-opening .header-6 .fw-menu-open:before {
  transform: rotate( 45deg );
}
html.mm-opening .header-6 .fw-menu-open:after {
  transform: rotate( -45deg );
}
/* Search */
.header-6.search-in-menu .fw-wrap-search-form,
.header-6.search-in-menu .fw-wrap-search-form .fw-search-form .fw-input-search,
.header-6.search-in-top-bar .fw-wrap-search-form.fw-form-search-full,
.header-6.search-in-top-bar .fw-wrap-search-form.fw-form-search-full .fw-search-form .fw-input-search {
  box-sizing: border-box;
}
/*=> Search Full */
.header-6.search-in-menu .fw-wrap-search-form.fw-form-search-full,
.header-6.search-in-top-bar .fw-wrap-search-form.fw-form-search-full {
  width: 100%;
  height: 100%;
}
.header-6.search-in-menu .fw-form-search-full.fw-wrap-search-form .fw-search-form,
.header-6.search-in-top-bar .fw-form-search-full.fw-wrap-search-form .fw-search-form {
  margin-top: -<?php echo floatval($the_core_less_variables['fw-header-search-input-height'])/2; ?>px;
}
.header-6.search-in-menu .fw-search.fw-mini-search,
.header-6.search-in-menu .fw-search.fw-input-search {
  margin-top: <?php echo floatval($the_core_less_variables['fw-menu-item-height']) + floatval($the_core_less_variables['fw-menu-item-margin-left'])/2 + 3; ?>px;
}
/* Items Align Left */
.header-6.header-item-align-left .mm-listview > li > a,
.header-6.header-item-align-left .mm-listview > li > span {
  float: left;
}
.header-6.header-item-align-left .mm-menu .mm-panels,
.header-6.header-item-align-left .mm-menu .mm-panel .mm-navbar,
.header-6.header-item-align-left .header-6-socials {
  text-align: left;
}
/* Items Align Center */
.header-6.header-item-align-center .mm-menu .mm-panels,
.header-6.header-item-align-center .mm-listview > li,
.header-6.header-item-align-center .mm-menu .mm-panel .mm-navbar,
.header-6.header-item-align-center .header-6-socials {
  text-align: center;
}
.header-6.header-item-align-center .fw-wrap-logo .fw-site-logo {
  margin: 0 auto;
}
.header-6.header-item-align-center .mm-listview > li > a.mm-next {
  position: absolute;
}
/* Items Align Right */
.header-6.header-item-align-right .mm-menu .mm-listview > li a:not(.mm-next) {
  margin-right: 0;
}
.header-6.header-item-align-right .mm-menu .mm-panels,
.header-6.header-item-align-right .mm-listview > li,
.header-6.header-item-align-right .mm-menu .mm-panel .mm-navbar,
.header-6.header-item-align-right .header-6-socials {
  text-align: right;
}
.header-6.header-item-align-right .mm-menu .mm-listview > li a.mm-next {
  transform: scale(-1);
}
.header-6.header-item-align-right .fw-wrap-logo {
  overflow: hidden;
}
.header-6.header-item-align-right .mm-panels > .mm-panel > .mm-listview,
.header-6.header-item-align-right .fw-wrap-logo .fw-site-logo {
  float: right;
}
.mm-opening .header-6 .site {
  display: none;
}
/* WP mobile bar */

/*----> Responsive <---- */
@media(min-width:1199px){
  .header-6 .site {
    -webkit-transform: none !important;
    -ms-transform: none !important;
    transform: none !important;
    width: 80% !important;
    background: inherit;
    box-sizing: border-box;
  }
  .header-6 #header-menu {
    display: block;
    width: 20% !important;
    min-width: none !important;
    max-width: none !important;
    top: 0 !important;
    bottom: 0 !important;
    z-index: 9999 !important;
    border: none;
    position: fixed;
  }
  .header-6 .fw-wrap-wp-bar > div {
    width: 80% !important;
  }
  /* Align Left */
  .header-6.header-align-left .site {
    margin-left: 20% !important;
  }
  .header-6.header-align-left #header-menu {
    left: 0;
  }
  .header-6.header-align-left .fw-wrap-wp-bar > div {
    /*left: 20% !important;*/
    -webkit-transform: translate(25%, 0);
    -moz-transform: translate(25%, 0);
    -ms-transform: translate(25%, 0);
    -o-transform: translate(25%, 0);
    transform: translate(25%, 0);
  }
  /* Align Right */
  .header-6.header-align-right .site {
    margin-right: 20% !important;
  }
  .header-6.header-align-right #header-menu {
    right: 0;
  }
}
/* Screen 1024px */
@media(max-width:1199px){
  .header-6 #header-menu {
    display: block;
  }
  .header-6 .fw-menu-open {
    display: inline-block;
  }
  .header-6 .mm-navbar.mm-navbar-top,
  .header-6 .mm-panels {
    opacity: 0;
    -webkit-transition: opacity 0.3s ease-in-out;
    -moz-transition: opacity 0.3s ease-in-out;
    -o-transition: opacity 0.3s ease-in-out;
    transition: opacity 0.3s ease-in-out;
  }
  html.mm-opening .header-6 .mm-navbar.mm-navbar-top,
  html.mm-opening .header-6 .mm-panels {
    opacity: 1;
    -webkit-transition-delay: 0.4s;
    -moz-transition-delay: 0.4s;
    -o-transition-delay: 0.4s;
    transition-delay: 0.4s;
  }
  .header-6 .mm-navbar.mm-navbar-bottom {
    width: 50px;
    right: 0;
    left: auto;
    padding: 0;
  }
  .header-6 #header-menu.mm-menu .header-6-socials a {
    margin: 30px auto 0;
    display: block;
    text-align: center;
  }
  html.mm-opening .header-6 .mm-navbar.mm-navbar-bottom {
    width: 100%;
    right: auto;
    padding: 0 30px;
    box-sizing: border-box;
  }
  html.mm-opening .header-6 #header-menu.mm-menu .header-6-socials a {
    display: inline-block;
    margin: 0 0 0 15px;
  }
  html.mm-opening .header-6 #header-menu {
    -webkit-transform: translate(0, 0);
    -moz-transform: translate(0, 0);
    -ms-transform: translate(0, 0);
    -o-transform: translate(0, 0);
    transform: translate(0, 0);
  }
  .header-6 .mm-slideout {
    width: 95% !important;
  }
  /* Align Left */
  .header-6.header-align-left .mm-slideout {
    margin-left: 0 !important;
    -webkit-transform: translate(5.5%, 0);
    -moz-transform: translate(5.5%, 0);
    -ms-transform: translate(5.5%, 0);
    -o-transform: translate(5.5%, 0);
    transform: translate(5.5%, 0);
  }
  .header-6.header-align-left #header-menu {
    -webkit-transform: translate(-88%, 0);
    -moz-transform: translate(-88%, 0);
    -ms-transform: translate(-88%, 0);
    -o-transform: translate(-88%, 0);
    transform: translate(-88%, 0);
  }
  html.mm-opening .header-6.header-align-left .mm-slideout {
    -webkit-transform: translate(440px, 0);
    -moz-transform: translate(440px, 0);
    -ms-transform: translate(440px, 0);
    -o-transform: translate(440px, 0);
    transform: translate(440px, 0);
  }
  .header-6.header-align-left .fw-wrap-wp-bar > div {
    width: 95% !important;
    -webkit-transform: translate(54px, 0);
    -moz-transform: translate(54px, 0);
    -ms-transform: translate(54px, 0);
    -o-transform: translate(54px, 0);
    transform: translate(54px, 0);
  }
  html.mm-opening .header-6 .fw-wrap-wp-bar > div {
    -webkit-transform: translate(440px, 0);
    -moz-transform: translate(440px, 0);
    -ms-transform: translate(440px, 0);
    -o-transform: translate(440px, 0);
    transform: translate(440px, 0);
  }
  /* Align Right */
  .header-6.header-align-right .mm-slideout {
    margin-right: 0 !important;
    float: right;
    -webkit-transform: translate(-5.5%, 0);
    -moz-transform: translate(-5.5%, 0);
    -ms-transform: translate(-5.5%, 0);
    -o-transform: translate(-5.5%, 0);
    transform: translate(-5.5%, 0);
  }
  .header-6.header-align-right #header-menu {
    -webkit-transform: translate(88%, 0);
    -moz-transform: translate(88%, 0);
    -ms-transform: translate(88%, 0);
    -o-transform: translate(88%, 0);
    transform: translate(88%, 0);
  }
  html.mm-opening .header-6.header-align-right .mm-slideout {
    -webkit-transform: translate(-440px, 0);
    -moz-transform: translate(-440px, 0);
    -ms-transform: translate(-440px, 0);
    -o-transform: translate(-440px, 0);
    transform: translate(-440px, 0);
  }
  .header-6.header-align-right .mm-navbar.mm-navbar-bottom,
  .header-6.header-align-right .fw-menu-open {
    right: auto;
    left: 0;
  }
  .header-6.header-align-right .fw-wrap-wp-bar > div {
    -webkit-transition: all 0.4s ease;
    -ms-transition: all 0.4s ease;
    transition: all 0.4s ease;
    -webkit-transform: translate(0, 0);
    -moz-transform: translate(0, 0);
    -ms-transform: translate(0, 0);
    -o-transform: translate(0, 0);
    transform: translate(0, 0);
    width: 94.6% !important;
  }
  html.mm-opening .header-6.header-align-right .fw-wrap-wp-bar > div {
    -webkit-transform: translate(-386px, 0);
    -moz-transform: translate(-386px, 0);
    -ms-transform: translate(-386px, 0);
    -o-transform: translate(-386px, 0);
    transform: translate(-386px, 0);
  }
}
/* Screen 768px */
@media(max-width:991px){
  .header-6 .mm-slideout {
    max-width: 93% !important;
  }
  /* Align Left */
  .header-6.header-align-left .mm-slideout {
    margin-left: 0 !important;
    -webkit-transform: translate(7.5%, 0);
    -moz-transform: translate(7.5%, 0);
    -ms-transform: translate(7.5%, 0);
    -o-transform: translate(7.5%, 0);
    transform: translate(7.5%, 0);
  }
  .header-6.header-align-left .fw-wrap-wp-bar > div {
    width: 93% !important;
  }
  /* Align Right */
  .header-6.header-align-right .mm-slideout {
    margin-right: 0 !important;
    -webkit-transform: translate(-7.5%, 0);
    -moz-transform: translate(-7.5%, 0);
    -ms-transform: translate(-7.5%, 0);
    -o-transform: translate(-7.5%, 0);
    transform: translate(-7.5%, 0);
  }
  .header-6.header-align-right .fw-wrap-wp-bar > div {
    width: 93% !important;
  }
  html.mm-opening .header-6.header-align-right .fw-wrap-wp-bar > div {
    -webkit-transform: translate(-391px, 0);
    -moz-transform: translate(-391px, 0);
    -ms-transform: translate(-391px, 0);
    -o-transform: translate(-391px, 0);
    transform: translate(-391px, 0);
  }
}
/* Screen 667px */
@media(max-width:767px){
  .header-6 .mm-slideout {
    max-width: 92% !important;
  }
  /* Align Left */
  .header-6.header-align-left .mm-slideout {
    margin-left: 0 !important;
    -webkit-transform: translate(8.8%, 0);
    -moz-transform: translate(8.8%, 0);
    -ms-transform: translate(8.8%, 0);
    -o-transform: translate(8.8%, 0);
    transform: translate(8.8%, 0);
  }
  .header-6.header-align-left .fw-wrap-wp-bar > div {
    width: 92% !important;
  }
  /* Align right */
  .header-6.header-align-right .mm-slideout {
    margin-right: 0 !important;
    -webkit-transform: translate(-8.5%, 0);
    -moz-transform: translate(-8.5%, 0);
    -ms-transform: translate(-8.5%, 0);
    -o-transform: translate(-8.5%, 0);
    transform: translate(-8.5%, 0);
  }
  .header-6.header-align-right .fw-wrap-wp-bar > div {
    width: 91.6% !important;
  }
  html.mm-opening .header-6.header-align-right .fw-wrap-wp-bar > div {
    -webkit-transform: translate(-392px, 0);
    -moz-transform: translate(-392px, 0);
    -ms-transform: translate(-392px, 0);
    -o-transform: translate(-392px, 0);
    transform: translate(-392px, 0);
  }
}
/* Screen 568px */
@media(max-width:600px){
  .header-6 .mm-slideout {
    max-width: 91% !important;
  }
  /* Align Left */
  .header-6.header-align-left .mm-slideout {
    margin-left: 0 !important;
    -webkit-transform: translate(10.5%, 0);
    -moz-transform: translate(10.5%, 0);
    -ms-transform: translate(10.5%, 0);
    -o-transform: translate(10.5%, 0);
    transform: translate(10.5%, 0);
  }
  .header-6.header-align-left .fw-wrap-wp-bar > div {
    width: 91% !important;
  }
  /* Align right */
  .header-6.header-align-right .mm-slideout {
    margin-right: 0 !important;
    -webkit-transform: translate(-10.5%, 0);
    -moz-transform: translate(-10.5%, 0);
    -ms-transform: translate(-10.5%, 0);
    -o-transform: translate(-10.5%, 0);
    transform: translate(-10.5%, 0);
  }
  .header-6.header-align-right .fw-wrap-wp-bar > div {
    width: 90.1% !important;
  }
  html.mm-opening .header-6.header-align-right .fw-wrap-wp-bar > div {
    -webkit-transform: translate(-390px, 0);
    -moz-transform: translate(-390px, 0);
    -ms-transform: translate(-390px, 0);
    -o-transform: translate(-390px, 0);
    transform: translate(-390px, 0);
  }
}
/* Screen 320px */
@media(max-width:479px){
  html.mm-opening .header-6 #header-menu {
    width: 100%;
  }
  .header-6 .mm-slideout {
    max-width: 86% !important;
  }
  /* Align Left */
  .header-6.header-align-left #header-menu {
    -webkit-transform: translate(-82%, 0);
    -moz-transform: translate(-82%, 0);
    -ms-transform: translate(-82%, 0);
    -o-transform: translate(-82%, 0);
    transform: translate(-82%, 0);
  }
  .header-6.header-align-left .mm-slideout {
    margin-left: 0 !important;
    -webkit-transform: translate(17.3%, 0);
    -moz-transform: translate(17.3%, 0);
    -ms-transform: translate(17.3%, 0);
    -o-transform: translate(17.3%, 0);
    transform: translate(17.3%, 0);
  }
  html.mm-opening .header-6.header-align-left .mm-slideout {
    -webkit-transform: translate(150%, 0);
    -moz-transform: translate(150%, 0);
    -ms-transform: translate(150%, 0);
    -o-transform: translate(150%, 0);
    transform: translate(150%, 0);
  }
  .header-6.header-align-left .fw-wrap-wp-bar > div {
    width: 85% !important;
    -webkit-transform: translate(56px, 0);
    -moz-transform: translate(56px, 0);
    -ms-transform: translate(56px, 0);
    -o-transform: translate(56px, 0);
    transform: translate(56px, 0);
  }
  /* Align right */
  .header-6.header-align-right #header-menu {
    -webkit-transform: translate(82%, 0);
    -moz-transform: translate(82%, 0);
    -ms-transform: translate(82%, 0);
    -o-transform: translate(82%, 0);
    transform: translate(82%, 0);
  }
  .header-6.header-align-right .mm-slideout {
    margin-right: 0 !important;
    -webkit-transform: translate(-17.3%, 0);
    -moz-transform: translate(-17.3%, 0);
    -ms-transform: translate(-17.3%, 0);
    -o-transform: translate(-17.3%, 0);
    transform: translate(-17.3%, 0);
  }
  html.mm-opening .header-6.header-align-right .mm-slideout {
    -webkit-transform: translate(-150%, 0);
    -moz-transform: translate(-150%, 0);
    -ms-transform: translate(-150%, 0);
    -o-transform: translate(-150%, 0);
    transform: translate(-150%, 0);
  }
  .header-6.header-align-right .fw-wrap-wp-bar > div {
    width: 84.5% !important;
  }
  html.mm-opening .header-6.header-align-right .fw-wrap-wp-bar > div {
    -webkit-transform: translate(-390px, 0);
    -moz-transform: translate(-390px, 0);
    -ms-transform: translate(-390px, 0);
    -o-transform: translate(-390px, 0);
    transform: translate(-390px, 0);
  }
}
@media(max-width:350px){
  /* Align left */
  .header-6.header-align-left .fw-wrap-wp-bar > div {
    width: 85% !important;
    min-width: 272px !important;
    -webkit-transform: translate(48px, 0);
    -moz-transform: translate(48px, 0);
    -ms-transform: translate(48px, 0);
    -o-transform: translate(48px, 0);
    transform: translate(48px, 0);
  }
  /* Align right */
  .header-6.header-align-right .fw-wrap-wp-bar > div {
    width: 85% !important;
    min-width: 272px !important;
    -webkit-transform: translate(-2px, 0);
    -moz-transform: translate(-2px, 0);
    -ms-transform: translate(-2px, 0);
    -o-transform: translate(-2px, 0);
    transform: translate(-2px, 0);
  }
}