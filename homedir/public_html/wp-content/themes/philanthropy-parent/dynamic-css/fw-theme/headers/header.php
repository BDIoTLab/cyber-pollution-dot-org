/* Header Layout */
/* -------------------------------------------------- */
.fw-header {
  position: relative;
  z-index: 100;
}
.fw-header .fw-header-main {
  width: 100%;
  text-align: right;
  position: relative;
  z-index: 100;
  background: <?php echo esc_js($the_core_less_variables['fw-top-menu-bg']); ?>;
}
.fw-top-social-right .fw-text-top-bar {
  float: left;
}
.fw-top-social-right .fw-top-bar-social {
  float: none;
}
.fw-top-social-left .fw-text-top-bar {
  float: right;
}
.fw-top-social-left .fw-top-bar-social {
  float: left;
}
.fw-absolute-header .fw-header {
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
}
.fw-header-sticky .fw-sticky-menu {
  position: fixed;
  top: 0;
  right: 0;
  left: 0;
  visibility: visible;
  z-index: 100;
  opacity: 0;
  -webkit-box-shadow: 0 1px 5px 0 rgba(0,0,0,0.09);
  -moz-box-shadow: 0 1px 5px 0 rgba(0,0,0,0.09);
  box-shadow: 0 1px 5px 0 rgba(0,0,0,0.09);
  transform: translate(0, -100%);
  transition: transform 600ms ease, opacity 600ms ease;
}
.fw-header-sticky .fw-sticky-menu.fw-sticky-menu-open {
  transition: transform 600ms ease, opacity 600ms ease;
  transform: translate(0, 0);
  opacity: 1;
}
.fw-header-sticky .fw-sticky-menu .fw-top-bar {
  display: none;
}
.fw-header.fw-sticky-menu .fw-header-main {
  background: <?php echo esc_js($the_core_less_variables['fw-sticky-menu-bg']); ?>;
  background: <?php echo the_core_hex2rgba( $the_core_less_variables['fw-sticky-menu-bg'], floatval($the_core_less_variables['fw-sticky-menu-bg-opacity'])/100 ); ?>;
}
.fw-absolute-header.fw-header-sticky .fw-sticky-menu.fw-sticky-menu-open {
  top: 0 !important;
}
.fw-top-bar-on.fw-absolute-header .fw-main-row-custom + .fw-main-row {
  margin-top: 0;
}
.fw-absolute-header section.password-protected-section,
.fw-absolute-header .no-header-image {
  padding-top: 125px;
}
.fw-header-boxed .fw-header:not(.fw-sticky-menu) .fw-container {
  padding-left: 40px;
  padding-right: 40px;
}
.fw-header-boxed .fw-sticky-menu.fw-sticky-menu-open .fw-header-main {
  margin-top: 0;
}
/* header overlap on next section */
.fw-absolute-header .fw-header .fw-header-main {
  background: <?php echo esc_js($the_core_less_variables['fw-top-menu-bg']); ?>;
  background: <?php echo the_core_hex2rgba( $the_core_less_variables['fw-top-menu-bg'], floatval($the_core_less_variables['fw-header-absolute-opacity'])/100 ); ?>;
}
.fw-absolute-header .fw-sticky-menu-open .fw-header-main {
  background: <?php echo the_core_hex2rgba( $the_core_less_variables['fw-sticky-menu-bg'], floatval($the_core_less_variables['fw-sticky-menu-bg-opacity'])/100 ); ?>;
}
/* top bar on */
.fw-top-bar-on.fw-absolute-header .site-main {
  margin-top: <?php echo floatval($the_core_less_variables['fw-top-bar-height']) + floatval($the_core_less_variables['fw-top-bar-padding'])*2; ?>px;
}
.fw-top-bar-on.fw-absolute-header .fw-header {
  top: -<?php echo floatval($the_core_less_variables['fw-top-bar-height']) + floatval($the_core_less_variables['fw-top-bar-padding'])*2; ?>px;
}
/* header boxed */
.fw-header-boxed .fw-header:not(.fw-sticky-menu) .fw-header-main {
  margin-top: <?php echo esc_js($the_core_less_variables['fw-header-boxed-position-top']); ?>;
  background: transparent;
}
.fw-header-boxed .fw-header:not(.fw-sticky-menu) .fw-header-main .fw-container {
  background: <?php echo esc_js($the_core_less_variables['fw-top-menu-bg']); ?>;
}
.fw-header-boxed.fw-absolute-header .fw-header:not(.fw-sticky-menu) .fw-header-main .fw-container {
  background: <?php echo esc_js($the_core_less_variables['fw-top-menu-bg']); ?>;
  background: <?php echo the_core_hex2rgba($the_core_less_variables['fw-top-menu-bg'], floatval($the_core_less_variables['fw-header-absolute-opacity'])/100 ); ?>;
}
.fw-header-boxed.fw-absolute-header .fw-header:not(.fw-sticky-menu).fw-sticky-menu-open .fw-header-main .fw-container {
  background-color: <?php echo esc_js($the_core_less_variables['fw-top-menu-bg']); ?>;
}

/* Responsive */
<?php if( $the_core_less_variables['fw-top-bar-bg'] == 'transparent' ) : ?>
  /* Screen 1024px */
  @media(max-width:1199px){
    .fw-top-bar-on.fw-absolute-header .fw-top-bar {
       background-color: <?php echo esc_js($the_core_less_variables['body-bg']); ?>;
    }
  }
<?php endif; ?>

/*Screen 768px*/
@media(max-width: 991px){
  /* Top Bar */
  .search-in-top-bar .fw-search.fw-mini-search {
    display: block;
    position: relative;
    top: 0 !important;
    border: none !important;
    margin: 0 !important;
    padding: 0 !important;
    left: 0;
  }
  .search-in-top-bar .fw-search.fw-mini-search .fw-search-icon {
    margin: 0 auto;
  }
  .search-in-top-bar .fw-search.fw-mini-search .fw-wrap-search-form {
    margin-right: -<?php echo floatval($the_core_less_variables['fw-header-search-width'])/2; ?>px;
  }
  .search-in-top-bar .fw-search,
  .header-4.search-in-top-bar .fw-search,
  .fw-text-top-bar,
  .fw-top-bar-social {
    display: inline-block;
    width: 100%;
    text-align: center !important;
    float: none !important;
    padding: 0;
    margin: 0;
    position: initial;
  }
  .search-in-top-bar .fw-search {
    padding: 0 !important;
    margin: 0 !important;
  }
  .search-in-top-bar .fw-search.fw-mini-search .fw-wrap-search-form {
    right: 0;
  }
  .search-in-top-bar .fw-search .fw-wrap-search-form {
    margin: 0 auto;
  }
  .fw-top-bar-on.fw-absolute-header .site-main {
    margin-top: <?php echo (floatval($the_core_less_variables['fw-top-bar-height']) + floatval($the_core_less_variables['fw-top-bar-padding']) ) * 2; ?>px;
  }
  .fw-top-bar-on.fw-absolute-header .fw-header {
    top: -<?php echo ( floatval($the_core_less_variables['fw-top-bar-height']) + floatval($the_core_less_variables['fw-top-bar-padding']) ) * 2; ?>px;
  }
}
/* Screen 568px */
@media(max-width:767px){
  .fw-absolute-header .fw-header .fw-header-main {
    background: <?php echo esc_js($the_core_less_variables['fw-top-menu-bg']); ?>;
  }
  .fw-absolute-header .fw-sticky-menu-open .fw-header-main {
    background: <?php echo the_core_hex2rgba( $the_core_less_variables['fw-sticky-menu-bg'], floatval($the_core_less_variables['fw-sticky-menu-bg-opacity'])/100 ); ?>;
  }
  .fw-absolute-header .fw-header {
    position: relative;
  }
  .fw-top-bar-on.fw-absolute-header .fw-header {
    top: 0 !important;
  }
  .fw-absolute-header.fw-header-sticky .fw-header.fw-sticky-menu {
    position: fixed;
  }
  .fw-top-bar-on.fw-absolute-header .site-main {
    margin-top: 0 !important;
  }
}
