/* Mobile Menu */
.site #mobile-menu {
  display: none !important;
}
.mm-menu {
  z-index: 998;
  font-size: 14px;
  font-weight: normal;
  font-style: normal;
  letter-spacing: 0;
  text-transform: <?php echo esc_js($the_core_less_variables['fw-mobile-menu-text-transform']); ?>;
  position: relative;
}
.mm-menu.mm-theme-dark {
  background-color: <?php echo esc_js($the_core_less_variables['fw-mobile-menu-bg-color']); ?>;
  background-image: url(<?php echo ($the_core_less_variables['fw-mobile-menu-bg-image']); ?>);
  background-repeat: <?php echo esc_js($the_core_less_variables['fw-mobile-menu-bg-repeat']); ?>;
  background-position: <?php echo esc_js($the_core_less_variables['fw-mobile-menu-bg-position-x']); ?> <?php echo esc_js($the_core_less_variables['fw-mobile-menu-bg-position-y']); ?>;
  background-size: <?php echo esc_js($the_core_less_variables['fw-mobile-menu-bg-size']); ?>;
}
.mm-menu > .mm-navbar,
.mm-panels,
.mm-panels > .mm-panel {
  background: none;
  z-index: 10;
}
.fw-mobile-menu-overlay .mm-menu:before {
  content: '';
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  z-index: 1;
  background-color: <?php echo esc_js($the_core_less_variables['fw-mobile-menu-overlay-color']); ?>;
  opacity: <?php echo esc_js($the_core_less_variables['fw-mobile-menu-overlay-opacity']); ?>;
}
html.mm-opening .mm-slideout,
html.mm-menu-event-open .mm-slideout {
  -webkit-transition: -webkit-transform 0.4s ease;
  -ms-transition: -ms-transform 0.4s ease;
  transition: transform 0.4s ease;
}
.mm-slideout {
  -webkit-transition-property: none;
  -moz-transition-property: none;
  -o-transition-property: none;
  transition-property: none;
  z-index: 999;
}
.mm-menu * {
  box-sizing: content-box;
}
.mmenu-link {
  display: none;
  line-height: 0;
  white-space: nowrap;
}
.mmenu-link i {
  font-size: <?php echo esc_js($the_core_less_variables['fw-icon-font-size-mobile-menu']); ?>;
  line-height: <?php echo esc_js($the_core_less_variables['fw-icon-line-height-mobile-menu']); ?>;
  color: <?php echo esc_js($the_core_less_variables['fw-top-menu-color']); ?>;
  font-weight: normal;
}
.show-mobile-only {
  display: none;
}
#mobile-menu .mm-listview,
#mobile-menu .mm-title,
#mobile-menu .mm-listview .mm-counter {
  font-family: <?php echo  ($the_core_less_variables['fw-mobile-menu-font-family']); ?>;
  font-size: <?php echo esc_js($the_core_less_variables['fw-mobile-menu-font-size']); ?>;
  line-height: <?php echo esc_js($the_core_less_variables['fw-mobile-menu-line-height']); ?>;
  font-weight: <?php echo esc_js($the_core_less_variables['fw-mobile-menu-font-weight']); ?>;
  font-style: <?php echo esc_js($the_core_less_variables['fw-mobile-menu-font-style']); ?>;
  letter-spacing: <?php echo esc_js($the_core_less_variables['fw-mobile-menu-letter-spacing']); ?>;
}
#mobile-menu .mm-listview > li > a,
#mobile-menu .mm-listview > li > span,
#mobile-menu .mm-title,
#mobile-menu .mm-listview .mm-counter {
  color: <?php echo esc_js($the_core_less_variables['fw-mobile-menu-color']); ?>;
}
#mobile-menu .mm-title {
  font-size: 16px;
  line-height: 20px;
}
#mobile-menu .mm-navbar .mm-prev:before,
#mobile-menu .mm-listview .mm-next:after {
  border-color: <?php echo esc_js($the_core_less_variables['fw-mobile-menu-color']); ?>;
}
.mm-listview > li > p {
  padding: 10px 10px 10px 20px;
  color: rgba(255, 255, 255, 0.4);
}
.mm-listview > li > a i{
  margin-right: 10px;
}
#mobile-menu.mm-menu .menu-separator {
  display: none ;
}
.fw-header.fw-sticky-menu nav#mobile-menu {
  display: none;
}
.fw-header .fw-mobile-mega-menu-item-list {
  display: none !important;
}

/* Nav bar social */
.mm-menu .mm-navbar.mm-navbar-bottom {
  height: <?php echo floatval($the_core_less_variables['fw-mobile-menu-social-size']) + 25; ?>px;
}
.mm-menu.mm-hasnavbar-bottom-1 .mm-panels {
  bottom: <?php echo floatval($the_core_less_variables['fw-mobile-menu-social-size']) + 25; ?>px;
}

/* Animation */
#mobile-menu.mm-menu.mm-mm-effect-panels-left-right .mm-panel.mm-subopened {
  -webkit-transform: translate3d(-100%, 0, 0);
  -moz-transform: translate3d(-100%, 0, 0);
  -ms-transform: translate3d(-100%, 0, 0);
  -o-transform: translate3d(-100%, 0, 0);
  transform: translate3d(-100%, 0, 0);
}


/* Mobile menu social */
.mm-menu .mm-navbar.mm-navbar-bottom .mobile-menu-socials a {
  font-size: <?php echo esc_js($the_core_less_variables['fw-mobile-menu-social-size']); ?>px;
  color: <?php echo esc_js($the_core_less_variables['fw-mobile-menu-social-color']); ?>;
  margin: 0 10px;
}

/* Menu item align */
/* Align Left */
.mobile-menu-item-align-left .mm-listview > li > a,
.mobile-menu-item-align-left .mm-listview > li > span {
  padding: 15px 10px 15px 20px;
}
.mobile-menu-item-align-left em.mm-counter + a.mm-next + a,
.mobile-menu-item-align-left em.mm-counter + a.mm-next + span {
  margin-right: 120px;
}

/* Align Center */
.mobile-menu-item-align-center .mm-menu {
  text-align: center;
}
.mobile-menu-item-align-center .mm-menu.mm-theme-dark .mm-listview > li a:not(.mm-next) {
  padding: 15px 10px;
}
.mobile-menu-item-align-center .mobile-menu-wrap-navigation {
  position: relative;
}
.mobile-menu-item-align-center .mm-listview .menu-item {
  display: flex;
  justify-content: center;
  align-items: center;
}
.mobile-menu-item-align-center .mm-listview .menu-item.menu-item-has-children {
  padding-left: 28px;
}
.mobile-menu-item-align-center .mobile-menu-wrap-navigation em.mm-counter {
  top: auto;
  right: 0;
  margin-right: 5px;
}
.mobile-menu-item-align-center .mobile-menu-wrap-navigation .mm-counter,
.mobile-menu-item-align-center .mobile-menu-wrap-navigation .mm-next {
  position: relative;
  display: inline-block;
}
.mobile-menu-item-align-center .mobile-menu-wrap-navigation .mm-next {
  width: 16px;
  height: 16px;
}
.mobile-menu-item-align-center .mobile-menu-wrap-navigation .mm-next:before {
  display: none;
}
.mobile-menu-item-align-center .mobile-menu-wrap-navigation .mm-next:after {
  right: 8px;
  top: auto;
}
.mobile-menu-item-align-center .mm-menu.mm-theme-dark .mm-listview > li.mm-selected > a:not(.mm-next),
.mobile-menu-item-align-center .mm-menu.mm-theme-dark .mm-listview > li.mm-selected > span {
  background: none;
}
.mobile-menu-item-align-center .mm-menu.mm-theme-dark .mm-listview > li.mm-selected {
  background: rgba(0, 0, 0, 0.1);
}

/* Align Right */
.mobile-menu-item-align-right .mm-menu {
  text-align: right;
}
.mobile-menu-item-align-right .mm-listview > li > a,
.mobile-menu-item-align-right .mm-listview > li > span {
  padding: 15px 20px 15px 10px;
}
.mobile-menu-item-align-right em.mm-counter + a.mm-next + a,
.mobile-menu-item-align-right em.mm-counter + a.mm-next + span {
  margin-left: 120px;
  margin-right: auto;
}
.mobile-menu-item-align-right em.mm-counter,
.mobile-menu-item-align-right .mm-listview .mm-next {
  right: auto;
}
.mobile-menu-item-align-right em.mm-counter {
  left: 45px;
}
.mobile-menu-item-align-right .mm-listview .mm-next {
  left: 0;
}
.mobile-menu-item-align-right .mm-listview .mm-next:before {
  right: 0;
  left: auto;
}
/*-> Border style */
.mobile-menu-item-align-right .mm-border-offset .mm-listview > li:not(.mm-divider):after {
  left: 20px;
  right: 20px;
}
.mobile-menu-item-align-right .mm-border-full .mm-listview > li:not(.mm-divider):after {
  left: 0;
  right: 0;
}
.mobile-menu-item-align-right .mm-indent .mm-listview > li:not(.mm-divider):after {
  left: 0;
  right: 20px;
}
#mobile-menu.mm-border-none .mm-listview .mm-next:before {
  display: none;
}

/* Effect Panels */
/* Effect Panel: FadeIn */
#mobile-menu.mm-menu.mm-effect-panels-fadeIn .mm-panel.mm-opened.mm-hidden,
#mobile-menu.mm-menu.mm-effect-panels-fadeIn .mm-panel.mm-opened.mm-subopened,
#mobile-menu.mm-menu.mm-effect-panels-fadeIn .mm-panel.mm-highest {
  display: none;
  -webkit-animation: fadeOut 1s;
  animation: fadeOut 1s;
}
#mobile-menu.mm-menu.mm-effect-panels-fadeIn .mm-panel.mm-current.mm-opened,
#mobile-menu.mm-menu.mm-effect-panels-fadeIn .mm-panel.mm-highest.mm-current.mm-opened {
  display: block;
  -webkit-animation: fadeIn 1s;
  animation: fadeIn 1s;
}
#mobile-menu.mm-menu.mm-effect-panels-fadeIn .mm-panel {
  -webkit-transform: translate3d(0, 0, 0);
  -moz-transform: translate3d(0, 0, 0);
  -ms-transform: translate3d(0, 0, 0);
  -o-transform: translate3d(0, 0, 0);
  transform: translate3d(0, 0, 0);
  -webkit-transition: all 1s linear;
  -o-transition: all 1s linear;
  transition: all 1s linear;
}
#mobile-menu.mm-menu.mm-effect-panels-fadeIn .mm-panel.mm-subopened {
  -webkit-transform: translate3d(0, 0, 0);
  -moz-transform: translate3d(0, 0, 0);
  -ms-transform: translate3d(0, 0, 0);
  -o-transform: translate3d(0, 0, 0);
  transform: translate3d(0, 0, 0);
}
/* Effect Panel: Zoom */
#mobile-menu.mm-menu.mm-effect-panels-zoom .mm-panel.mm-opened.mm-subopened {
  -webkit-transform: scale(0.7, 0.7) translate3d(-100%, 0, 0);
  -moz-transform: scale(0.7, 0.7) translate3d(-100%, 0, 0);
  -ms-transform: scale(0.7, 0.7) translate3d(-100%, 0, 0);
  -o-transform: scale(0.7, 0.7) translate3d(-100%, 0, 0);
  transform: scale(0.7, 0.7) translate3d(-100%, 0, 0);
}
#mobile-menu.mm-menu.mm-effect-panels-zoom .mm-panel.mm-opened.mm-subopened {
  overflow: hidden;
}
#mobile-menu .mm-panels > .mm-counter {
  display: none;
}

/* Border Style */
#mobile-menu .mm-navbar,
#mobile-menu .mm-listview > li,
#mobile-menu .mm-listview > li:after,
#mobile-menu .mm-listview > li .mm-next,
#mobile-menu .mm-listview > li .mm-next:before {
  border-color: <?php echo esc_js($the_core_less_variables['fw-mobile-menu-border-color']); ?>;
}
#mobile-menu .mm-listview > li:not(.mm-divider):after {
  border-bottom-width: <?php echo esc_js($the_core_less_variables['fw-mobile-menu-border-size']); ?>;
}
#mobile-menu .mm-navbar {
  border-bottom-width: <?php echo esc_js($the_core_less_variables['fw-mobile-menu-border-size']); ?>;
}
#mobile-menu .mm-navbar.mm-navbar-bottom {
  border-top-width: <?php echo esc_js($the_core_less_variables['fw-mobile-menu-border-size']); ?>;
}
.mm-listview .mm-next:before {
  border-left-width: <?php echo esc_js($the_core_less_variables['fw-mobile-menu-border-size']); ?>;
}

/* Screen 1024px */
@media (max-width: <?php echo esc_js($the_core_less_variables['fw-mobile-menu-screen-size']); ?>px) {
  .mm-menu {
    font-family: 'Helvetica', sans-serif;
  }
  .fw-header .mmenu-link {
    display: inline-block;
  }
  /* Reponsive Header 1 */
  .header-1.fw-top-logo-left .mmenu-link {
    float: right;
    margin-left: 1em;
  }
  .header-1.fw-top-logo-left.search-in-menu .fw-search.fw-mini-search {
    float: right;
  }
  .header-1.fw-top-logo-right .mmenu-link {
    float: left;
    margin-right: 1em;
  }
  .header-1.fw-top-logo-right.search-in-menu .fw-search.fw-mini-search {
    float: left;
  }
  /* Reponsive Header 2 */
  .header-2 .mmenu-link {
    display: table-cell;
    vertical-align: middle;
    width: 1%;
  }

  /* Reponsive Header 3 */
  .header-3.search-in-menu .fw-search,
  .header-3 .mmenu-link {
    display: table-cell;
    width: 50%;
  }
  .header-3 .fw-nav-wrap {
    margin-top: 1em;
  }
  .header-3.search-in-menu .fw-mini-search .fw-search-icon {
    margin: 0 auto;
  }
  /* Reponsive Header 4 */
  .header-4 .fw-nav-wrap .fw-container {
    border-bottom: none;
    background-color: transparent;
  }
  .header-4.search-in-menu .fw-header-main .fw-nav-wrap .fw-search,
  .header-4.search-in-menu .fw-header-main .fw-nav-wrap .mmenu-link {
    display: table-cell;
    width: 50%;
    text-align: center;
  }
  .header-4.search-in-menu .fw-header-main .fw-nav-wrap .fw-mini-search .fw-search-icon {
    margin: 0 auto;
  }
  .header-1 .fw-site-navigation,
  .header-2 .fw-nav-wrap.fw-nav-left,
  .header-2 .fw-nav-wrap.fw-nav-right,
  .header-3 .fw-site-navigation,
  .header-4 .fw-site-navigation {
    display: none !important;
  }
  em.mm-counter + a.mm-subopen {
    padding-left: 30px !important;
  }
  .mm-menu .mm-search input {
    border-radius: 4px;
  }
}
@media (min-width: <?php echo esc_js( floatval( $the_core_less_variables['fw-mobile-menu-screen-size'] ) + 1 ); ?>px) {
  #mm-my-menu,
  #mobile-menu {
    display: none !important;
  }
  .show-mobile-only {
    display: none !important;
  }
}

@media (max-width: <?php echo esc_js( floatval( $the_core_less_variables['fw-mobile-menu-screen-size'] ) ); ?>px) {
  /* Reponsive Header 1 */
  .header-1.fw-top-logo-left .mmenu-link,
  .header-1.fw-top-logo-right .mmenu-link {
    width: 100%;
    text-align: center;
    float: inherit;
    margin: 0 0 1em;
  }
  .header-1.fw-top-logo-left.search-in-menu .fw-search,
  .header-1.fw-top-logo-right.search-in-menu .fw-search {
    display: inline-block;
    width: 100%;
    text-align: center;
    float: inherit;
    position: inherit;
    margin: 1em 0 0;
  }
  .header-1.fw-top-logo-left.search-in-menu .fw-search .fw-wrap-search-form,
  .header-1.fw-top-logo-right.search-in-menu .fw-search .fw-wrap-search-form {
    margin: 0 auto;
    left: 0;
    right: 0;
  }
  .header-1.fw-top-logo-right.search-in-menu .fw-search.fw-mini-search {
    float: inherit;
  }
  .fw-mobile-menu-position-left.header-1.search-in-menu .fw-search.fw-mini-search {
    width: auto;
    float: left;
    margin-left: 15px;
  }
  .header-1.fw-top-logo-left.search-in-menu .fw-search.fw-mini-search .fw-search-icon,
  .header-1.fw-top-logo-right.search-in-menu .fw-search.fw-mini-search .fw-search-icon {
    margin: 0 auto;
  }
  .header-1.fw-top-logo-left .fw-wrap-logo,
  .header-1.fw-top-logo-right .fw-wrap-logo {
    float: inherit;
    display: inline-block;
    width: 100%;
  }
  .header-1.fw-top-logo-left .fw-wrap-logo .fw-site-logo,
  .header-1.fw-top-logo-right .fw-wrap-logo .fw-site-logo {
    margin: 0 auto;
  }
  .header-1 .fw-sticky-menu .fw-wrap-logo {
    display: block;
    margin: 0 auto;
  }

  /* header 1 - burger menu align */
  .fw-mobile-menu-position-left.header-1.fw-top-logo-left.search-in-menu .fw-search.fw-mini-search,
  .fw-mobile-menu-position-left.header-1.fw-top-logo-left .mmenu-link,
  .fw-mobile-menu-position-left.header-1.fw-top-logo-right .mmenu-link {
    width: auto;
    float: left;
  }
  .fw-mobile-menu-position-left.header-1.fw-top-logo-left .fw-wrap-logo,
  .fw-mobile-menu-position-left.header-1.fw-top-logo-right .fw-wrap-logo {
    width: auto;
    float: right;
  }
  .fw-mobile-menu-position-left.header-1.fw-top-logo-left.search-in-menu .fw-search.fw-mini-search {
    margin-left: 15px;
  }

  .fw-mobile-menu-position-right.header-1.fw-top-logo-left.search-in-menu .fw-search.fw-mini-search,
  .fw-mobile-menu-position-right.header-1.fw-top-logo-left .mmenu-link,
  .fw-mobile-menu-position-right.header-1.fw-top-logo-right .mmenu-link {
    width: auto;
    float: right;
  }
  .fw-mobile-menu-position-right.header-1.fw-top-logo-left .fw-wrap-logo,
  .fw-mobile-menu-position-right.header-1.fw-top-logo-right .fw-wrap-logo {
    width: auto;
    float: left;
  }
  .fw-mobile-menu-position-right.header-1.search-in-menu .fw-search.fw-mini-search,
  .fw-mobile-menu-position-right.header-1.fw-top-logo-right.search-in-menu .fw-search.fw-mini-search,
  .fw-mobile-menu-position-right.header-1.fw-top-logo-left.search-in-menu .fw-search.fw-mini-search {
    width: auto;
    float: right;
    margin-right: 15px;
  }

  /* Reponsive Header 2 */
  .header-2 .fw-container .mmenu-link,
  .header-2 .fw-container .fw-wrap-logo {
    width: 100%;
    display: table-row;
  }
  .header-2 .fw-container .mmenu-link i {
    margin-bottom: 20px;
  }

  /* header 2 - burger menu align */
  .fw-mobile-menu-position-right.header-2 .fw-header-main .fw-container,
  .fw-mobile-menu-position-left.header-2 .fw-header-main .fw-container {
    display: flex;
    align-items: center;
  }
  .fw-mobile-menu-position-left.header-2 .fw-container .fw-wrap-logo .fw-site-logo {
    float: right;
  }
  .fw-mobile-menu-position-left.header-2 .fw-container .mmenu-link {
    width: auto;
    margin-left: 5px;
  }
  .fw-mobile-menu-position-right.header-2 .fw-container .mmenu-link i,
  .fw-mobile-menu-position-left.header-2 .fw-container .mmenu-link i {
    margin-bottom: 0;
  }

  .fw-mobile-menu-position-right.header-2 .fw-container .mmenu-link {
    width: auto;
    margin-right: 5px;
    order: 2;
  }
  .fw-mobile-menu-position-right.header-2 .fw-container .fw-wrap-logo {
    display: flex;
  }

  /* header 3 - burger menu align */
  .fw-mobile-menu-position-right.header-3 .fw-nav-wrap .fw-container,
  .fw-mobile-menu-position-left.header-3 .fw-nav-wrap .fw-container {
    display: flex;
  }
  .fw-mobile-menu-position-right.header-3 .fw-nav-wrap .fw-container {
    justify-content: flex-end;
  }
  .fw-mobile-menu-position-right.header-3 .fw-header > .fw-header-main,
  .fw-mobile-menu-position-left.header-3 .fw-header > .fw-header-main {
    display: flex;
    align-items: center;
  }
  .fw-mobile-menu-position-right.header-3 .fw-header .fw-container,
  .fw-mobile-menu-position-left.header-3 .fw-header .fw-container {
    max-width: 100%;
  }
  .fw-mobile-menu-position-left.header-3 .fw-nav-wrap .fw-container {
    display: flex;
    width: auto;
  }
  .fw-mobile-menu-position-right.header-3 .fw-nav-wrap,
  .fw-mobile-menu-position-left.header-3 .fw-nav-wrap {
    width: 30%;
    margin-top: 0;
  }
  .fw-mobile-menu-position-left.header-3 .mmenu-link {
    display: block;
    width: auto;
    margin-left: 5px;
  }
  .fw-mobile-menu-position-left.header-3.search-in-menu .fw-search {
    display: block;
    width: auto;
    margin-left: 15px;
  }
  .fw-mobile-menu-position-right.header-3 .fw-header-main .fw-wrap-logo,
  .fw-mobile-menu-position-left.header-3 .fw-header-main .fw-wrap-logo {
    order: 2;
    width: 70%;
    padding-bottom: 0;
  }
  .fw-mobile-menu-position-left.header-3 .fw-site-logo {
    float: right;
    margin-right: 15px;
  }

  .fw-mobile-menu-position-right.header-3 .fw-header-main .fw-wrap-logo {
    order: 1;
  }
  .fw-mobile-menu-position-right.header-3 .fw-nav-wrap {
    order: 2;
  }
  .fw-mobile-menu-position-right.header-3 .fw-site-logo {
    float: left;
  }
  .fw-mobile-menu-position-right.header-3.search-in-menu .fw-search,
  .fw-mobile-menu-position-right.header-3 .mmenu-link {
    display: block;
    width: auto;
    margin-right: 5px;
  }
  .fw-mobile-menu-position-right.header-3 .mmenu-link {
    order: 2;
  }
  .fw-mobile-menu-position-right.header-3.search-in-menu .fw-search {
    margin-right: 15px;
  }

  /* header 4 - burger menu align */
  .fw-mobile-menu-position-right.header-4 .fw-info-text-header-main,
  .fw-mobile-menu-position-left.header-4 .fw-info-text-header-main {
    display: none;
  }
  .fw-mobile-menu-position-right.header-4 .fw-header-main,
  .fw-mobile-menu-position-left.header-4 .fw-header-main {
    display: flex;
    align-items: center;
  }
  .fw-mobile-menu-position-right.header-4 .fw-header .fw-container {
    max-width: 100%;
  }
  .fw-mobile-menu-position-right.header-4 .fw-header-main .fw-container,
  .fw-mobile-menu-position-left.header-4 .fw-header-main .fw-container {
    width: 100%;
    display: flex;
  }
  .fw-mobile-menu-position-left.header-4 .fw-header-main .fw-wrap-logo-info-text .fw-container {
    justify-content: flex-end;
  }
  .fw-mobile-menu-position-left.header-4.search-in-menu .fw-header-main .fw-nav-wrap .fw-search,
  .fw-mobile-menu-position-left.header-4.search-in-menu .fw-header-main .fw-nav-wrap .mmenu-link {
    display: block;
    float: left;
    width: auto;
  }
  .fw-mobile-menu-position-right.header-4 .fw-wrap-logo-info-text,
  .fw-mobile-menu-position-left.header-4 .fw-wrap-logo-info-text {
    display: flex;
    width: 70%;
    order: 2
  }
  .fw-mobile-menu-position-right.header-4 .fw-wrap-logo-info-text,
  .fw-mobile-menu-position-left.header-4 .fw-wrap-logo-info-text {
    padding-bottom: 0;
  }
  .fw-mobile-menu-position-right.header-4 .fw-nav-wrap,
  .fw-mobile-menu-position-left.header-4 .fw-nav-wrap {
    width: 30%;
  }
  .fw-mobile-menu-position-left.header-4 .mmenu-link {
    margin-left: 5px;
  }
  .fw-mobile-menu-position-left.header-4.search-in-menu .fw-search {
    margin-left: 15px;
  }

  .fw-mobile-menu-position-right.header-4.search-in-menu .fw-header-main .fw-nav-wrap .fw-search,
  .fw-mobile-menu-position-right.header-4.search-in-menu .fw-header-main .fw-nav-wrap .mmenu-link {
    display: block;
    float: right;
    width: auto;
  }
  .fw-mobile-menu-position-right.header-4 .mmenu-link {
    margin-right: 5px;
    order: 2;
  }
  .fw-mobile-menu-position-right.header-4.search-in-menu .fw-search {
    margin-right: 15px;
  }
  .fw-mobile-menu-position-right.header-4 .fw-wrap-logo {
    float: left;
  }
  .fw-mobile-menu-position-right.header-4 .fw-wrap-logo-info-text {
    order: 1;
  }
  .fw-mobile-menu-position-right.header-4 .fw-nav-wrap .fw-container {
    justify-content: flex-end;
  }
  .fw-mobile-menu-position-right.header-4 .fw-nav-wrap {
    order: 2;
  }

}

