/* Content Layout */
/* -------------------------------------------------- */

/* Wrap col inner */
.fw-wrap-col-inner {
  position: relative;
}

/* z-index for .fw-inner */
.fw-inner,
.fw-col-inner{
  position: relative;
  z-index: 10;
}

/* Content Row Overlay */
.fw-main-row-overlay {
  position: absolute !important;
  z-index: 2;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
}
.fw-container,
.fw-container-fluid{
  z-index: 10;
}

/* Content Row Overlay */
.overlay_color_1{
  background-color: <?php echo esc_js($the_core_less_variables['theme-color-1']); ?> !important;
}
.overlay_color_2{
  background-color: <?php echo esc_js($the_core_less_variables['theme-color-2']); ?> !important;
}
.overlay_color_3{
  background-color: <?php echo esc_js($the_core_less_variables['theme-color-3']); ?> !important;
}
.overlay_color_4{
  background-color: <?php echo esc_js($the_core_less_variables['theme-color-4']); ?> !important;
}
.overlay_color_5{
  background-color: <?php echo esc_js($the_core_less_variables['theme-color-5']); ?> !important;
}

/* Parallax Styling */
.parallax-section {
  background-attachment: fixed;
  background-size: cover !important;
}

/* Section Overlay*/
/* next section will be under current */
.fw-content-overlay-sm,
.fw-content-overlay-md,
.fw-content-overlay-lg,
.fw-content-overlay-custom {
  overflow: hidden;
}
.fw-content-overlay-sm{
  margin-bottom: -<?php echo esc_js($the_core_less_variables['fw-content-overlay-sm']); ?>;
}
.fw-content-overlay-md{
  margin-bottom: -<?php echo esc_js($the_core_less_variables['fw-content-overlay-md']); ?>;
}
.fw-content-overlay-lg{
  margin-bottom: -<?php echo esc_js($the_core_less_variables['fw-content-overlay-lg']); ?>;
}
/*-> Section position with overlap */
.fw-section-position-front {
  z-index: 20;
}
.fw-section-position-back {
  z-index: auto;
}

/* Section Height */
.fw-section-height-custom,
.fw-column-height-custom {
  overflow: hidden;
}
.fw-section-height-sm{
  height: <?php echo esc_js($the_core_less_variables['fw-section-height-sm']); ?>;
}
.fw-section-height-md{
  height: <?php echo esc_js($the_core_less_variables['fw-section-height-md']); ?>;
}
.fw-section-height-lg{
  height: <?php echo esc_js($the_core_less_variables['fw-section-height-lg']); ?>;
}
.fw-section-height-custom,
.fw-column-height-custom {
  overflow: hidden;
}

/* tablets */
@media (max-width: 991px) {
  .fw-content-overlay-sm{
    margin-bottom: -<?php echo esc_js( ( (int)$the_core_less_variables['fw-content-overlay-sm'] ) / 2 ); ?>px;
  }
  .fw-content-overlay-md{
    margin-bottom: -<?php echo esc_js( ( (int)$the_core_less_variables['fw-content-overlay-md'] ) / 2); ?>px;
  }
  .fw-content-overlay-lg{
    margin-bottom: -<?php echo esc_js( ( (int)$the_core_less_variables['fw-content-overlay-lg'] ) / 2 ); ?>px;
  }
}
/* mobiles */
@media (max-width: 767px) {
  .fw-section-height-lg{
    height: <?php echo esc_js($the_core_less_variables['fw-section-height-md']); ?>;
  }
}

/* Typography density */
.fw-section-space-sm .fw-main-row-custom .fw-container,
.fw-section-space-sm .fw-main-row .fw-container,
.fw-section-space-sm .fw-main-row-custom .fw-container-fluid,
.fw-section-space-sm .fw-main-row .fw-container-fluid {
  padding-top: <?php echo esc_js($the_core_less_variables['fw-section-padding-sm']); ?>;
  padding-bottom: <?php echo esc_js($the_core_less_variables['fw-section-padding-sm']); ?>;
}
.fw-section-space-md .fw-main-row-custom .fw-container,
.fw-section-space-md .fw-main-row .fw-container,
.fw-section-space-md .fw-main-row-custom .fw-container-fluid,
.fw-section-space-md .fw-main-row .fw-container-fluid {
  padding-top: <?php echo esc_js($the_core_less_variables['fw-section-padding-md']); ?>;
  padding-bottom: <?php echo esc_js($the_core_less_variables['fw-section-padding-md']); ?>;
}
.fw-section-space-lg .fw-main-row-custom .fw-container,
.fw-section-space-lg .fw-main-row .fw-container,
.fw-section-space-lg .fw-main-row-custom .fw-container-fluid,
.fw-section-space-lg .fw-main-row .fw-container-fluid {
  padding-top: <?php echo esc_js($the_core_less_variables['fw-section-padding-lg']); ?>;
  padding-bottom: <?php echo esc_js($the_core_less_variables['fw-section-padding-lg']); ?>;
}

/* Responsive for section space */
/* Screen 568px */
@media(max-width:767px){
  .fw-section-space-sm .fw-main-row .fw-container,
  .fw-section-space-sm .fw-main-row .fw-container-fluid,
  .fw-section-space-sm .fw-main-row-custom .fw-container,
  .fw-section-space-sm .fw-main-row-custom .fw-container-fluid {
    padding-top: <?php echo ceil($the_core_less_variables['fw-section-padding-sm'])*0.5; ?>px;
    padding-bottom: <?php echo ceil($the_core_less_variables['fw-section-padding-sm'])*0.5; ?>px;
  }
  .fw-section-space-md .fw-main-row .fw-container,
  .fw-section-space-md .fw-main-row .fw-container-fluid,
  .fw-section-space-md .fw-main-row-custom .fw-container,
  .fw-section-space-md .fw-main-row-custom .fw-container-fluid {
    padding-top: <?php echo ceil($the_core_less_variables['fw-section-padding-md'])*0.5; ?>px;
    padding-bottom: <?php echo ceil($the_core_less_variables['fw-section-padding-md'])*0.5; ?>px;
  }
  .fw-section-space-lg .fw-main-row .fw-container,
  .fw-section-space-lg .fw-main-row .fw-container-fluid,
  .fw-section-space-lg .fw-main-row-custom .fw-container,
  .fw-section-space-lg .fw-main-row-custom .fw-container-fluid {
    padding-top: <?php echo ceil($the_core_less_variables['fw-section-padding-lg'])*0.5; ?>px;
    padding-bottom: <?php echo ceil($the_core_less_variables['fw-section-padding-lg'])*0.5; ?>px;
  }
}

/* Screen 320px */
@media(max-width:479px){
  .fw-section-space-sm .fw-main-row .fw-container,
  .fw-section-space-sm .fw-main-row .fw-container-fluid,
  .fw-section-space-sm .fw-main-row-custom .fw-container,
  .fw-section-space-sm .fw-main-row-custom .fw-container-fluid {
    padding-top: <?php echo ceil($the_core_less_variables['fw-section-padding-sm'])*0.3; ?>px;
    padding-bottom: <?php echo ceil($the_core_less_variables['fw-section-padding-sm'])*0.3; ?>px;
  }
  .fw-section-space-md .fw-main-row .fw-container,
  .fw-section-space-md .fw-main-row .fw-container-fluid,
  .fw-section-space-md .fw-main-row-custom .fw-container,
  .fw-section-space-md .fw-main-row-custom .fw-container-fluid {
    padding-top: <?php echo ceil($the_core_less_variables['fw-section-padding-md'])*0.3; ?>px;
    padding-bottom: <?php echo ceil($the_core_less_variables['fw-section-padding-md'])*0.3; ?>px;
  }
  .fw-section-space-lg .fw-main-row .fw-container,
  .fw-section-space-lg .fw-main-row .fw-container-fluid,
  .fw-section-space-lg .fw-main-row-custom .fw-container,
  .fw-section-space-lg .fw-main-row-custom .fw-container-fluid {
    padding-top: <?php echo ceil($the_core_less_variables['fw-section-padding-lg'])*0.3; ?>px;
    padding-bottom: <?php echo ceil($the_core_less_variables['fw-section-padding-lg'])*0.3; ?>px;
  }
}

/* Disable: Replacement Image for Video Bg on Desktop */
.background-video.fs-background-element .fs-background-media.fs-background-animated:before {
  content: '';
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
}
@media (min-width: 1199px) {
  .fs-background-element .fs-background-media.fs-background-native {
    display: none !important;
  }
  .fs-background-element .fs-background-media.fs-background-animated {
    opacity: 1 !important;
  }
}

/* Remove the padding-left/right for page-builder in blog post, pages, events, products, projects */
.fw-col-sm-12 .fw-page-builder-content .fw-row{
  margin-left: 0;
  margin-right: 0;
}

/* Main top section under the Header */
body.fw-no-absolute-header .fw-main-row-top.fw-section-image.fw-content-overlay-md .fw-row {
  padding-bottom: <?php echo esc_js($the_core_less_variables['fw-content-overlay-md']); ?>;
}
body.fw-no-absolute-header .fw-main-row-top.fw-section-image.fw-content-overlay-sm .fw-row {
  padding-bottom: <?php echo esc_js($the_core_less_variables['fw-content-overlay-sm']); ?>;
}
body.fw-no-absolute-header .fw-main-row-top.fw-section-image.fw-content-overlay-lg .fw-row {
  padding-bottom: <?php echo esc_js($the_core_less_variables['fw-content-overlay-lg']); ?>;
}

/* Main top section under the Header */
/* vertical align middle for all that inside Row */
.fw-middle-align.fw-content-vertical-align-middle .fw-container *,
.fw-middle-align.fw-content-vertical-align-middle .fw-container-fluid * {
  visibility: visible;
}
.fw-content-vertical-align-middle .fw-container *,
.fw-content-vertical-align-middle .fw-container-fluid * {
  visibility: hidden;
}

/*fixed problem with blog alignment when is absolute header*/
/*.fw-absolute-header .fw-main-row-top.fw-main-row-custom.fw-content-overlay-sm.fw-content-vertical-align-middle,
.fw-absolute-header .fw-main-row-top.fw-main-row-custom.fw-content-overlay-md.fw-content-vertical-align-middle,
.fw-absolute-header .fw-main-row-top.fw-main-row-custom.fw-content-overlay-lg.fw-content-vertical-align-middle,
.fw-absolute-header .fw-main-row-top.fw-main-row-custom.fw-content-overlay-custom.fw-content-vertical-align-middle,
.fw-absolute-header .fw-main-row-top.fw-main-row-custom.fw-content-vertical-align-middle {
  padding-top: 0 !important;
}*/
/* Remove Section & Coll Padding */
.fw-section-no-padding .fw-container,
.fw-section-no-padding .fw-container-fluid {
  padding-top: 0 !important;
  padding-bottom: 0 !important;
}
.fw-col-no-padding{
  padding-left: 0 !important;
  padding-right: 0 !important;
}
body.fw-no-absolute-header .fw-main-row-top .fw-container .fw-row,
body.fw-no-absolute-header .fw-main-row-top .fw-container-fluid .fw-row {
  margin-top: 0;
}
.fw-wp-embed-shortcode iframe {
  border: 1px solid transparent;
}

/* WP mobile bar */
@media(max-width:1199px) {
 html .fw-wrap-wp-bar > div {
   -webkit-transition: -webkit-transform 0.4s ease;
   -ms-transition: -ms-transform 0.4s ease;
   transition: transform 0.4s ease;
 }
}
@media screen and (max-width: 600px) {
 html .fw-wrap-wp-bar > div {
   position: fixed !important;
 }
}
@media (min-width: 550px) {
 .mm-opening .fw-wrap-wp-bar > div {
   -webkit-transform: translate(440px, 0);
   -moz-transform: translate(440px, 0);
   -ms-transform: translate(440px, 0);
   -o-transform: translate(440px, 0);
   transform: translate(440px, 0);
 }
 .mm-opening .fw-top-logo-left .fw-wrap-wp-bar > div {
   -webkit-transform: translate(-440px, 0);
   -moz-transform: translate(-440px, 0);
   -ms-transform: translate(-440px, 0);
   -o-transform: translate(-440px, 0);
   transform: translate(-440px, 0);
 }
}
@media (max-width: 550px) {
 .mm-opening .fw-wrap-wp-bar > div {
   -webkit-transform: translate(80%, 0);
   -moz-transform: translate(80%, 0);
   -ms-transform: translate(80%, 0);
   -o-transform: translate(80%, 0);
   transform: translate(80%, 0);
 }
 .mm-opening .fw-top-logo-left .fw-wrap-wp-bar > div {
   -webkit-transform: translate(-80%, 0);
   -moz-transform: translate(-80%, 0);
   -ms-transform: translate(-80%, 0);
   -o-transform: translate(-80%, 0);
   transform: translate(-80%, 0);
 }
}

/* Section Custom Shape */
.custom-shape .custom-shape-wrap {
  width: 100%;
  display: block;
  position: absolute;
  left: 0;
  right: 0;
  z-index: 10;
  box-sizing: border-box;
}
.custom-shape .custom-shape-wrap[class*="custom-shape-top-"] {
  top: 0;
}
.custom-shape .custom-shape-wrap[class*="custom-shape-bottom-"] {
  bottom: 0;
}
.custom-shape .custom-shape-wrap .shape-container {
  width: 100%;
}
.custom-shape .custom-shape-wrap .shape-container svg {
  display: block;
  position: relative;
}
.custom-shape .custom-shape-wrap[class*="custom-shape-top-"] .shape-container svg {
  top: -1px;
}
.custom-shape .custom-shape-wrap[class*="custom-shape-bottom-"] .shape-container svg {
  top: 1px;
}

/* Variables for changes the color (background, text, border) */
.fw_theme_bg_color_1{
  background-color: <?php echo esc_js($the_core_less_variables['theme-color-1']); ?> !important;
}
.fw_theme_hover_bg_color_1{
  background-color: <?php echo esc_js($the_core_less_variables['theme-color-1']); ?> !important;
}
.fw_theme_bg_color_2{
  background-color: <?php echo esc_js($the_core_less_variables['theme-color-2']); ?> !important;
}
.fw_theme_hover_bg_color_2{
  background-color: <?php echo esc_js($the_core_less_variables['theme-color-2']); ?> !important;
}
.fw_theme_bg_color_3{
  background-color: <?php echo esc_js($the_core_less_variables['theme-color-3']); ?> !important;
}
.fw_theme_hover_bg_color_3{
  background-color: <?php echo esc_js($the_core_less_variables['theme-color-3']); ?> !important;
}
.fw_theme_bg_color_4{
  background-color: <?php echo esc_js($the_core_less_variables['theme-color-4']); ?> !important;
}
.fw_theme_hover_bg_color_4{
  background-color: <?php echo esc_js($the_core_less_variables['theme-color-4']); ?> !important;
}
.fw_theme_bg_color_5{
  background-color: <?php echo esc_js($the_core_less_variables['theme-color-5']); ?> !important;
}
.fw_theme_hover_bg_color_5{
  background-color: <?php echo esc_js($the_core_less_variables['theme-color-5']); ?> !important;
}
.fw_theme_text_color_1{
  color: <?php echo esc_js($the_core_less_variables['theme-color-1']); ?> !important;
}
.fw_theme_text_color_2{
  color: <?php echo esc_js($the_core_less_variables['theme-color-2']); ?> !important;
}
.fw_theme_text_color_3{
  color: <?php echo esc_js($the_core_less_variables['theme-color-3']); ?> !important;
}
.fw_theme_text_color_4{
  color: <?php echo esc_js($the_core_less_variables['theme-color-4']); ?> !important;
}
.fw_theme_text_color_5{
  color: <?php echo esc_js($the_core_less_variables['theme-color-5']); ?> !important;
}
.fw_theme_border_color_1{
  border: 1px solid <?php echo esc_js($the_core_less_variables['theme-color-1']); ?> !important;
}
.fw_theme_border_color_2{
  border: 1px solid <?php echo esc_js($the_core_less_variables['theme-color-2']); ?> !important;
}
.fw_theme_border_color_3{
  border: 1px solid <?php echo esc_js($the_core_less_variables['theme-color-3']); ?> !important;
}
.fw_theme_border_color_4{
  border: 1px solid <?php echo esc_js($the_core_less_variables['theme-color-4']); ?> !important;
}
.fw_theme_border_color_5{
  border: 1px solid <?php echo esc_js($the_core_less_variables['theme-color-5']); ?> !important;
}
.fw_theme_border_only_color_1{
  border-color: <?php echo esc_js($the_core_less_variables['theme-color-1']); ?> !important;
}
.fw_theme_border_only_color_2{
  border-color: <?php echo esc_js($the_core_less_variables['theme-color-2']); ?> !important;
}
.fw_theme_border_only_color_3{
  border-color: <?php echo esc_js($the_core_less_variables['theme-color-3']); ?> !important;
}
.fw_theme_border_only_color_4{
  border-color: <?php echo esc_js($the_core_less_variables['theme-color-4']); ?> !important;
}
.fw_theme_border_only_color_5{
  border-color: <?php echo esc_js($the_core_less_variables['theme-color-5']); ?> !important;
}

.fw_hover_bg_color_1:hover{
  background-color: <?php echo esc_js($the_core_less_variables['theme-color-1']); ?> !important;
}
.fw_hover_bg_color_2:hover{
  background-color: <?php echo esc_js($the_core_less_variables['theme-color-2']); ?> !important;
}
.fw_hover_bg_color_3:hover{
  background-color: <?php echo esc_js($the_core_less_variables['theme-color-3']); ?> !important;
}
.fw_hover_bg_color_4:hover{
  background-color: <?php echo esc_js($the_core_less_variables['theme-color-4']); ?> !important;
}
.fw_hover_bg_color_5:hover{
  background-color: <?php echo esc_js($the_core_less_variables['theme-color-5']); ?> !important;
}

/* Responsive */
@media (min-width: 1200px) {
  .fw-desktop-hide-element {
    display: none !important;
  }
}
@media only screen and (min-width: 992px) and (max-width: 1199px) {
  .fw-tablet-landscape-hide-element {
    display: none !important;
  }
}
@media only screen and (min-width: 768px) and (max-width: 991px) {
  .fw-tablet-hide-element {
    display: none !important;
  }
}
/* Screen 568px */
@media (max-width: 767px) {
  .fw-main-row-custom,
  div[class^="fw-col-"].fw-column-height-custom {
    height: auto !important;
  }
  .fw-content-overlay-sm,
  .fw-content-overlay-md,
  .fw-content-overlay-lg,
  .fw-content-overlay-custom {
    margin-bottom: 0 !important;
  }
  .fw-mobile-hide-element {
    display: none !important;
  }
  .fw-main-row-top.fw-content-vertical-align-middle .fw-row:first-child div[class*="fw-col-sm-"] {
    padding-top: 0 !important;
  }
  /* Disable content vertical align middle if screen > 767px */
  .fw-content-vertical-align-middle .fw-container *,
  .fw-content-vertical-align-middle .fw-container-fluid * {
    visibility: visible;
  }
  .fw-content-vertical-align-middle .fw-container div[id*="column-"],
  .fw-content-vertical-align-middle .fw-container-fluid div[id*="column-"] {
    margin-top: 0 !important;
  }
}
