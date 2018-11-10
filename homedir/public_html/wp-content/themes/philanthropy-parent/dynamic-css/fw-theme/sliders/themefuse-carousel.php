/* Themefuse Carousel */
/* -------------------------------------------------- */
.fw-themefuse-carousel-wrapper {
  padding: 30px 0;
  margin: auto -15px 19px -15px;
  position: relative;
}
.fw-themefuse-carousel-wrapper ul {
  padding-left: 0;
}
.fw-themefuse-carousel-wrapper ul li {
  margin: 0;
}
.fw-themefuse-carousel-wrapper .fw-themefuse-carousel li {
  width: 292px;
  height: 519px;
  display: block;
  float: left;
  text-align: center;
  position: relative;
  background-size: cover;
}
.fw-themefuse-carousel-wrapper .fw-themefuse-carousel li .fw-themefuse-carousel-content-wrap {
  display: block;
  height: 100%;
  position: relative !important;
}
.fw-themefuse-carousel-wrapper .fw-themefuse-carousel li .fw-themefuse-carousel-content-wrap .fw-themefuse-carousel-content {
  background: #fff;
  height: 150px;
  position: absolute;
  right: 0;
  left: 0;
  bottom: 50px;
  overflow: hidden;
  z-index: 2;
  -webkit-box-shadow: 1px 8px 8px -4px rgba(185, 169, 143, 0.1);
  box-shadow: 1px 8px 8px -4px rgba(185, 169, 143, 0.1);
}
.fw-themefuse-carousel-wrapper .fw-themefuse-carousel li .fw-themefuse-carousel-content-wrap .fw-themefuse-carousel-content .item-title {
  position: relative;
  margin-top: 0;
}
.fw-themefuse-carousel-wrapper .fw-themefuse-carousel li .fw-themefuse-carousel-content-wrap .fw-themefuse-carousel-content .item-divider {
  width: 50%;
  height: 1px;
  margin: 15px auto;
  display: block;
  background: <?php echo the_core_hex2rgba($the_core_less_variables['theme-color-5'], 0.1); ?>;
}

/* Carousel control */
.fw-themefuse-carousel-wrapper .fw-themefuse-carousel .fw-themefuse-carousel-control {
  width: 294px;
  height: 584px;
  display: block;
  background: #fff;
  position: absolute;
  top: 0;
  left: 292px;
  text-align: center;
  z-index: 3;
  -webkit-box-shadow: 0 0 24px 0 rgba(158, 113, 113, 0.17);
  box-shadow: 0 0 24px 0 rgba(158, 113, 113, 0.17);
}

/* Control Title Wrap */
.fw-themefuse-carousel-wrapper .number-project,
.fw-themefuse-carousel-wrapper .fw-control-title-before {
  font-family: <?php echo ($the_core_less_variables['subtitles-family']); ?>;
  font-weight: <?php echo esc_js($the_core_less_variables['subtitles-weight']); ?>;
  font-style: <?php echo esc_js($the_core_less_variables['subtitles-style']); ?>;
  font-size: <?php echo esc_js($the_core_less_variables['subtitles-size']); ?>;
  line-height: <?php echo esc_js($the_core_less_variables['subtitles-line-height']); ?>;
  color: <?php echo esc_js($the_core_less_variables['subtitles-color']); ?>;
  letter-spacing: <?php echo esc_js($the_core_less_variables['subtitles-letter-spacing']); ?>;
}
.fw-themefuse-carousel-wrapper .fw-themefuse-carousel .fw-themefuse-carousel-control .fw-control-title-wrap {
  height: 182px;
  background-repeat: no-repeat;
  background-position: top center;
  background-size: cover;
  background-color: <?php echo the_core_hex2rgba($the_core_less_variables['theme-color-1'], 0.9); ?>;
}
.fw-themefuse-carousel-wrapper .fw-themefuse-carousel .fw-themefuse-carousel-control .fw-control-title-wrap .fw-control-title-before {
  font-family: <?php echo ($the_core_less_variables['subtitles-family']); ?>;
  font-weight: <?php echo esc_js($the_core_less_variables['subtitles-weight']); ?>;
  font-style: <?php echo esc_js($the_core_less_variables['subtitles-style']); ?>;
  font-size: <?php echo esc_js($the_core_less_variables['subtitles-size']); ?>;
  line-height: <?php echo esc_js($the_core_less_variables['subtitles-line-height']); ?>;
  color: <?php echo esc_js($the_core_less_variables['subtitles-color']); ?>;
  letter-spacing: <?php echo esc_js($the_core_less_variables['subtitles-letter-spacing']); ?>;
  margin-top: 0;
  margin-bottom: .6em;
}
.fw-themefuse-carousel-wrapper .fw-themefuse-carousel .fw-themefuse-carousel-control .fw-control-title-wrap .fw-control-title-after {
  margin: 0;
}

/* Control Title Description */
.fw-themefuse-carousel-wrapper .fw-themefuse-carousel .fw-themefuse-carousel-control .fw-control-description {
  font-size: <?php echo floatval($the_core_less_variables['font-size-base'])-2; ?>px;
  padding: 0 40px;
  margin-top: 30px;
  font-weight: 400;
  max-height: 39%;
  overflow: hidden;
  text-overflow: ellipsis;
}
.fw-themefuse-carousel-wrapper .fw-themefuse-carousel .fw-themefuse-carousel-control .fw-control-description p {
  text-overflow: ellipsis;
}
.fw-themefuse-carousel-wrapper .fw-themefuse-carousel .fw-themefuse-carousel-control .fw-control-description p:last-child {
  margin-bottom: 0;
}

/* Navigation */
.fw-themefuse-carousel-wrapper .fw-themefuse-carousel .fw-themefuse-carousel-control .fw-control-nav {
  color: <?php echo esc_js($the_core_less_variables['theme-color-3']); ?>;
  font-family: <?php echo ($the_core_less_variables['subtitles-family']); ?>;
  font-weight: <?php echo esc_js($the_core_less_variables['subtitles-weight']); ?>;
  font-style: <?php echo esc_js($the_core_less_variables['subtitles-style']); ?>;
  line-height: <?php echo floatval($the_core_less_variables['font-size-base'])+1; ?>px;
  padding: 0 30px;
  font-size: 12px;
  margin-top: 37px;
  letter-spacing: 3px;
}
.fw-themefuse-carousel-wrapper .fw-themefuse-carousel .fw-themefuse-carousel-control .fw-control-nav i {
  font-family: "FontAwesome";
  font-size: <?php echo floatval($the_core_less_variables['font-size-base'])+9; ?>px;
  font-style: normal;
}
.fw-themefuse-carousel-wrapper .fw-themefuse-carousel .fw-themefuse-carousel-control .fw-control-nav .prev {
  float: left;
}
.fw-themefuse-carousel-wrapper .fw-themefuse-carousel .fw-themefuse-carousel-control .fw-control-nav .prev .fw-nav-icon:before {
  content: '\f104';
}
.fw-themefuse-carousel-wrapper .fw-themefuse-carousel .fw-themefuse-carousel-control .fw-control-nav .next {
  float: right;
}
.fw-themefuse-carousel-wrapper .fw-themefuse-carousel .fw-themefuse-carousel-control .fw-control-nav .next .fw-nav-icon:before {
  content: '\f105';
}

/* Responsive */
/* Screen 568px */
@media(max-width:767px){
  .fw-themefuse-carousel-wrapper .fw-themefuse-carousel li {
    width: 260px;
  }
  .fw-themefuse-carousel-wrapper .fw-themefuse-carousel .fw-themefuse-carousel-control {
    width: 260px;
    height: 640px;
    top: -10px;
  }
}
/* Screen 320px */
@media(max-width: 479px){
  .fw-themefuse-carousel-wrapper {
    padding-top: 565px;
  }
  .fw-themefuse-carousel-wrapper .fw-themefuse-carousel .fw-themefuse-carousel-control {
    top: 0;
    left: 50% !important;
    margin-left: -130px;
    height: 584px;
  }
  .fw-themefuse-carousel-wrapper .fw-themefuse-carousel .fw-themefuse-carousel-control .fw-control-nav .next,
  .fw-themefuse-carousel-wrapper .fw-themefuse-carousel .fw-themefuse-carousel-control .fw-control-nav .prev {
    position: absolute;
    float: none;
    top: 972px;
  }
  .fw-themefuse-carousel-wrapper .fw-themefuse-carousel .fw-themefuse-carousel-control .fw-control-nav .next {
    right: 10px;
  }
  .fw-themefuse-carousel-wrapper .fw-themefuse-carousel .fw-themefuse-carousel-control .fw-control-nav .prev {
    left: 10px;
  }
}