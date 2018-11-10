/* General Styles */
/* -------------------------------------------------- */

/* background image for body */
body {
  position: relative;
  overflow: hidden;
  background-color: <?php echo esc_js($the_core_less_variables['body-bg']); ?>;
  background-image: url(<?php echo ($the_core_less_variables['body-bg-image']); ?> );
  background-repeat: <?php echo esc_js($the_core_less_variables['body-bg-repeat']); ?>;
  -webkit-overflow-scrolling: touch;
}
html {
  overflow-x: hidden;
  background-color: <?php echo esc_js($the_core_less_variables['body-bg']); ?>;
  -webkit-overflow-scrolling: touch;
}

/* wrapper for boxed & full style */
.site {}
.single .fw-page-builder-content .fw-main-row .fw-container,
.single .fw-page-builder-content .fw-main-row-custom .fw-container,
.single .fw-page-builder-content .fw-main-row .fw-container-fluid,
.single .fw-page-builder-content .fw-main-row-custom .fw-container-fluid {
  padding-right: 0;
  padding-left: 0;
  max-width: 100%;
}
.fw-side-boxed .site-main {
  background-color: <?php echo esc_js($the_core_less_variables['container-bg']); ?>;
}
.fw-side-boxed .site-main .fw-main-row > .fw-container {
  background-color: <?php echo esc_js($the_core_less_variables['container-bg']); ?>;
}
.fw-full .site,
.fw-side-boxed .site {
  margin-top: <?php echo esc_js($the_core_less_variables['fw-site-margin-top']); ?>;
  margin-bottom: <?php echo esc_js($the_core_less_variables['fw-site-margin-bottom']); ?>;
}
.fw-full .site {
  max-width: <?php echo esc_js($the_core_less_variables['fw-page-full']); ?>;
}
.fw-side-boxed .site {
  max-width: <?php echo esc_js($the_core_less_variables['fw-page-side-boxed']); ?>;
}

/* Section Default Page Background Option */
.fw-section-default-page{
  background-repeat: no-repeat;
  background-size: cover;
  background-position: center;
}
/* wrapper for all sections */
.site-main {
  position: relative;
  z-index: 0;
}
.fw-full .site,
.fw-side-boxed .site {
  position: relative;
}
section{
  position: relative;
}

/* Web site align */
.fw-website-align-left .site {
  margin-left: 0;
  margin-right: auto;
}
.fw-website-align-center .site {
  margin-left: auto;
  margin-right: auto;
}
.fw-website-align-right .site {
  margin-left: auto;
  margin-right: 0;
}

/* No Header Image */
.no-header-image {
  margin: 0 auto;
  max-width: <?php echo esc_js($the_core_less_variables['fw-page-side-boxed']); ?>;
}

/* Element Display none */
.fw-display-none {
  display: none;
}

/* text selection*/
::-moz-selection {
  color: #fff;
  text-shadow: none;
  background: <?php echo esc_js($the_core_less_variables['theme-color-1']); ?>;
}
::selection {
  color: #fff;
  text-shadow: none;
  background: <?php echo esc_js($the_core_less_variables['theme-color-1']); ?>;
}

/* Image Ratio Container */
.fw-ratio-container {
  position: relative;
  display: block;
}
.fw-ratio-container:after {
  content: '';
  display: block;
  height: 0;
  width: 100%;
}
.fw-ratio-container.fw-noratio:after,
.fw-ratio-container.fw-original-ratio:after {
  display: none;
}
.fw-noratio .fw-after-no-ratio,
.fw-ratio-container.fw-original-ratio .fw-after-no-ratio {
  position: relative !important;
  display: block;
}
.fw-ratio-container.fw-ratio-1:after {
  padding-bottom: 100%;
}
.fw-ratio-container.fw-ratio-2-1:after {
  padding-bottom: 50%;
}
.fw-ratio-container.fw-ratio-1-2:after {
  padding-bottom: 200%;
}
.fw-ratio-container.fw-ratio-4-3:after {
  padding-bottom: 75%;
}
.fw-ratio-container.fw-ratio-3-4:after {
  padding-bottom: 133%;
}
.fw-ratio-container.fw-ratio-16-9:after {
  padding-bottom: 56.25%;
}
.fw-ratio-container.fw-ratio-9-16:after {
  padding-bottom: 177.77%;
}
.fw-ratio-container.fw-ratio-3-2:after {
  padding-bottom: 66.66%;
}
.fw-ratio-container.fw-ratio-2-3:after {
  padding-bottom: 150%;
}
.fw-ratio-container.fw-ratio-5-3:after {
  padding-bottom: 60%;
}
.fw-ratio-container.fw-ratio-3-5:after {
  padding-bottom: 166.66%;
}
.fw-ratio-container.fw-ratio-16-10:after {
  padding-bottom: 62.5%;
}
.fw-ratio-container.fw-ratio-10-16:after {
  padding-bottom: 160%;
}
.fw-ratio-container video,
.fw-ratio-container iframe,
.fw-ratio-container a {
  max-width: 100%;
  max-height: 100%;
  width: auto;
  height: auto;
}
.fw-ratio-container > * {
  position: absolute !important;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
}
.fw-ratio-container.fw-original-ratio > * {
  position: relative !important;
}
/* Set max-width & max-height for vertical image if unyson is disabled */
.fw-unyson-disabled .fw-ratio-container.fw-ratio-1-2 {
  max-width: 300px;
  max-height: 600px;
}
.fw-ratio-container .fw-svg-file {
  position: relative !important;
}

/* LazyLoading */
.lazyload,
.lazyloading {
  position: absolute;
  background-position: center center;
  background-size: 24px;
  background-repeat: no-repeat;
  background-image: url(data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMzgiIGhlaWdodD0iMzgiIHZpZXdCb3g9IjAgMCAzOCAzOCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiBzdHJva2U9IiNmZmYiPiAgICA8ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPiAgICAgICAgPGcgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoMSAxKSIgc3Ryb2tlLXdpZHRoPSIyIj4gICAgICAgICAgICA8Y2lyY2xlIHN0cm9rZS1vcGFjaXR5PSIuNSIgY3g9IjE4IiBjeT0iMTgiIHI9IjE4Ii8+ICAgICAgICAgICAgPHBhdGggZD0iTTM2IDE4YzAtOS45NC04LjA2LTE4LTE4LTE4Ij4gICAgICAgICAgICAgICAgPGFuaW1hdGVUcmFuc2Zvcm0gICAgICAgICAgICAgICAgICAgIGF0dHJpYnV0ZU5hbWU9InRyYW5zZm9ybSIgICAgICAgICAgICAgICAgICAgIHR5cGU9InJvdGF0ZSIgICAgICAgICAgICAgICAgICAgIGZyb209IjAgMTggMTgiICAgICAgICAgICAgICAgICAgICB0bz0iMzYwIDE4IDE4IiAgICAgICAgICAgICAgICAgICAgZHVyPSIxcyIgICAgICAgICAgICAgICAgICAgIHJlcGVhdENvdW50PSJpbmRlZmluaXRlIi8+ICAgICAgICAgICAgPC9wYXRoPiAgICAgICAgPC9nPiAgICA8L2c+PC9zdmc+);
}

/* Animation Element */
.fw-animated-element {
  visibility: hidden !important;
}
.fw-animated-element.animated {
  visibility: visible !important;
}
.animated.fill-mode-none {
  animation-fill-mode: none !important;
}

@media(max-width:767px){
  .fw-animation-mobile-off .fw-animated-element {
    visibility: visible !important;
  }
}

/* Scroll To Top Button */
.scroll-to-top {
  position: fixed;
  right: 20px;
  bottom: 20px;
  z-index: 999;
  display: block;
  width: 45px;
  height: 45px;
  text-decoration: none;
  text-align: center;
  border: 2px solid transparent;
  -moz-border-radius: 50%;
  -webkit-border-radius: 50%;
  border-radius: 50%;
}
.scroll-to-top i {
  color: <?php echo esc_js($the_core_less_variables['fw-scroll-to-top-color']); ?>;
  font-size: 22px;
  line-height: 45px;
  position: relative;
  top: -1px;
}
.scroll-to-top img {
  width: 30px;
  height: 30px;
  position: absolute;
  top: 50%;
  left: 0;
  right: 0;
  margin: -15px auto auto;
}
.scroll-to-top:hover {
  border-color: <?php echo esc_js($the_core_less_variables['fw-scroll-to-top-color']); ?>;
  -moz-transition: all 0.5s ease;
  -o-transition: all 0.5s ease;
  -ms-transition: all 0.5s ease;
  transition: all 0.5s ease;
}

/*----> Responsive <---- */
/* Screen 568px */
@media(max-width:767px){
  .fw-full .site,
  .fw-side-boxed .site {
    margin-top: 0 !important;
  }
}

/* Style for plugin: jQuery Pin It Button for Images */
.jpibfi_container .fw-noratio > * {
  z-index: 10;
}
.jpibfi_container .fw-noratio .fw-after-no-ratio,
.jpibfi_container .fw-original-ratio .fw-after-no-ratio {
  z-index: 9;
}