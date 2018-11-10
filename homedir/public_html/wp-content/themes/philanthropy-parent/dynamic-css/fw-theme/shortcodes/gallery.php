/* Gallery */
/* -------------------------------------------------- */
.fw-gallery {
  max-width: <?php echo esc_js($the_core_less_variables['fw-page-side-boxed']); ?>;
  margin: 0 auto;
}
.fw-gallery * {
  -webkit-backface-visibility: hidden!important;
  backface-visibility: hidden!important;
}
.fw-gallery .fw-gallery-col.fw-gallery-col {
  float: left;
}
.fw-gallery .fw-gallery-col .fw-height-sm,
.fw-gallery .fw-gallery-col .fw-height-md,
.fw-gallery .fw-gallery-col .fw-height-lg {
  overflow: hidden;
}
.fw-gallery .fw-gallery-col .fw-block-image-parent .fw-block-image-overlay .fw-overlay-title,
.fw-gallery.fw-gallery-type5 .fw-block-image-parent .fw-block-image-overlay .fw-overlay-title {
  font-family: <?php echo ($the_core_less_variables['fw-h5-font-family']); ?>;
  font-style: <?php echo esc_js($the_core_less_variables['fw-h5-font-style']); ?>;
  font-weight: <?php echo esc_js($the_core_less_variables['fw-h5-font-weight']); ?>;
  font-size: <?php echo esc_js($the_core_less_variables['fw-h5-font-size']); ?>;
  line-height: <?php echo esc_js($the_core_less_variables['fw-h5-line-height']); ?>;
  letter-spacing: <?php echo esc_js($the_core_less_variables['fw-h5-letter-spacing']); ?>;
  color: <?php echo esc_js($the_core_less_variables['fw-h5-color']); ?>;
  padding-bottom: 0;
}
.fw-gallery .fw-gallery-col .fw-block-image-parent .fw-block-image-overlay .fw-overlay-description,
.fw-gallery.fw-gallery-type5 .fw-block-image-parent .fw-block-image-overlay .fw-overlay-description {
  font-family: <?php echo ($the_core_less_variables['font-family-base']); ?>;
  font-style: <?php echo esc_js($the_core_less_variables['font-style-base']); ?>;
  font-weight: <?php echo esc_js($the_core_less_variables['font-weight-base']); ?>;
  font-size: <?php echo esc_js($the_core_less_variables['font-size-base']); ?>;
  line-height: <?php echo esc_js($the_core_less_variables['line-height-base']); ?>;
  letter-spacing: <?php echo esc_js($the_core_less_variables['letter-spacing-base']); ?>;
  color: <?php echo esc_js($the_core_less_variables['text-color']); ?>;
}

/* Gallery Title & Description Visible */
.fw-gallery .fw-gallery-display-title-visible .fw-block-image-child .fw-overlay-title,
.fw-gallery .fw-gallery-display-description-visible .fw-block-image-child .fw-overlay-description,
.fw-gallery.fw-gallery-type1 .fw-gallery-display-title-visible .fw-block-image-child .fw-overlay-title,
.fw-gallery.fw-gallery-type1 .fw-gallery-display-description-visible .fw-block-image-child .fw-overlay-description,
.fw-gallery.fw-gallery-type3 .fw-gallery-display-title-visible .fw-block-image-child .fw-overlay-title,
.fw-gallery.fw-gallery-type3 .fw-gallery-display-description-visible .fw-block-image-child .fw-overlay-description {
  opacity: 1;
  -webkit-transform: translate3d(0, 0, 0);
  -moz-transform: translate3d(0, 0, 0);
  -ms-transform: translate3d(0, 0, 0);
  -o-transform: translate3d(0, 0, 0);
  transform: translate3d(0, 0, 0);
}

/* Gallery Type 1 */
/* Gallery Width Col Size */
.fw-gallery.fw-gallery-type1 .fw-col-width1 {
  width: 412px;
}
.fw-gallery.fw-gallery-type1 .fw-col-width2 {
  width: 316px;
}
/* Gallery Height Size */
.fw-gallery.fw-gallery-type1 .fw-gallery-image.fw-height-sm {
  height: 178px;
}
.fw-gallery.fw-gallery-type1 .fw-gallery-image.fw-height-md {
  height: 232px;
}
.fw-gallery.fw-gallery-type1 .fw-gallery-image.fw-height-lg {
  height: 410px;
}
.fw-gallery.fw-gallery-type1 .fw-gallery-image.fw-block-image-parent .fw-icell {
  vertical-align: bottom;
}
.fw-gallery.fw-gallery-type1 .fw-gallery-image.fw-block-image-parent .fw-overlay-title,
.fw-gallery.fw-gallery-type1 .fw-gallery-image.fw-block-image-parent .fw-overlay-description {
  margin: 0;
  padding: 0;
  text-align: left;
  opacity: 0;
  -webkit-transition: all 0.2s ease-in-out;
  -o-transition: all 0.2s ease-in-out;
  transition: all 0.2s ease-in-out;
}
.fw-gallery.fw-gallery-type1 .fw-gallery-image.fw-block-image-parent:hover .fw-overlay-title,
.fw-gallery.fw-gallery-type1 .fw-gallery-image.fw-block-image-parent:hover .fw-overlay-description {
  opacity: 1;
}
.fw-gallery.fw-gallery-type1 .fw-gallery-image.fw-block-image-parent .fw-overlay-title {
  font-size: <?php echo esc_js($the_core_less_variables['fw-h3-font-size']); ?>;
  padding-bottom: 0;
}
.fw-gallery.fw-gallery-type1 .fw-gallery-image.fw-block-image-parent i[class*='fw-icon-'] {
  position: absolute;
  top: 50%;
  left: 50%;
  margin-top: -24px;
  margin-left: -24px;
  opacity: 0;
}
.fw-gallery.fw-gallery-type1 .fw-gallery-image.fw-block-image-parent:hover i[class*='fw-icon-'] {
  opacity: 1;
}
.fw-gallery.fw-gallery-type1 .fw-gallery-image.fw-block-image-parent .fw-block-image-child {
  max-height: 100%;
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
}

/* Gallery Type 1 Title & Description Visible */
.fw-gallery.fw-gallery-type1 .fw-gallery-image.fw-gallery-display-title-visible .fw-block-image-child .fw-block-image-overlay,
.fw-gallery.fw-gallery-type1 .fw-gallery-image.fw-gallery-display-description-visible .fw-block-image-child .fw-block-image-overlay,
.fw-gallery.fw-gallery-type1 .fw-gallery-image.fw-block-image-parent.fw-gallery-display-title-visible .fw-overlay-title,
.fw-gallery.fw-gallery-type1 .fw-gallery-image.fw-block-image-parent.fw-gallery-display-description-visible .fw-overlay-description {
  opacity: 1;
}

/* Gallery Type 2 */
/* Gallery Width Col Size */
.fw-gallery.fw-gallery-type2 .fw-col-width1 {
  width: 570px;
}
.fw-gallery.fw-gallery-type2 .fw-col-width2 {
  width: 285px;
}
.fw-gallery.fw-gallery-type2 .fw-gallery-image {
  width: 100%;
}
/* Gallery Height Size */
.fw-gallery.fw-gallery-type2 .fw-gallery-image.fw-height-sm {
  height: 285px;
}
.fw-gallery.fw-gallery-type2 .fw-gallery-image.fw-height-md {
  height: 380px;
}
.fw-gallery.fw-gallery-type2 .fw-gallery-image.fw-block-image-parent .fw-overlay-title {
  font-size: <?php echo esc_js($the_core_less_variables['fw-h3-font-size']); ?>;
  padding-bottom: 5px;
}
.fw-gallery.fw-gallery-type2 .fw-gallery-image.fw-block-image-parent i[class*='fw-icon-'] {
  display: none;
}
.fw-gallery.fw-gallery-type2 .fw-gallery-image.fw-block-image-parent .fw-block-image-child {
  max-height: 100%;
}

/* Gallery Type 3 */
/* Gallery Width Col Size */
.fw-gallery.fw-gallery-type3 .fw-col-width1 {
  width: 850px;
}
.fw-gallery.fw-gallery-type3 .fw-col-width2 {
  width: 290px;
}
.fw-gallery.fw-gallery-type3 .fw-inner-col-width1 {
  width: 290px;
}
.fw-gallery.fw-gallery-type3 .fw-inner-col-width2 {
  width: 560px;
}
.fw-gallery.fw-gallery-type3 .fw-gallery-image {
  width: 100%;
}
/* Gallery Height Size */
.fw-gallery.fw-gallery-type3 .fw-gallery-image.fw-height-sm {
  height: 282px;
}
.fw-gallery.fw-gallery-type3 .fw-gallery-image.fw-height-md {
  height: 564px;
}
.fw-gallery.fw-gallery-type3 .fw-gallery-image.fw-block-image-parent .fw-overlay-title {
  font-size: <?php echo esc_js($the_core_less_variables['fw-h5-font-size']); ?>;
}
.fw-gallery.fw-gallery-type3 .fw-gallery-image.fw-block-image-parent .fw-block-image-child {
  position: absolute;
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
}
.fw-gallery.fw-gallery-type3 .fw-gallery-image.fw-block-image-parent i[class*='fw-icon-'] {
  display: none;
}
.fw-gallery.fw-gallery-type3 .fw-gallery-image.fw-block-image-parent .fw-block-image-child {
  max-height: 100%;
}
.fw-gallery-type3 .fw-gallery-image .fw-block-image-child .fw-overlay-title {
  opacity: 0;
  -webkit-transition: all 0.35s ease-in-out;
  -o-transition: all 0.35s ease-in-out;
  transition: all 0.35s ease-in-out;
}
.fw-gallery-type3 .fw-gallery-image .fw-block-image-child .fw-overlay-title {
  -webkit-transform: scale(1.5);
  -moz-transform: scale(1.5);
  -ms-transform: scale(1.5);
  -o-transform: scale(1.5);
  transform: scale(1.5);
}
.fw-gallery-type3 .fw-gallery-image:hover .fw-overlay-title {
  opacity: 1;
  -webkit-transform: scale(1);
  -moz-transform: scale(1);
  -ms-transform: scale(1);
  -o-transform: scale(1);
  transform: scale(1);
  -webkit-transition: all 0.35s ease-in-out;
  -o-transition: all 0.35s ease-in-out;
  transition: all 0.35s ease-in-out;
}

/* Gallery Type 4 */
/* Gallery Width Col Size */
.fw-gallery.fw-gallery-type4 .fw-col-width1 {
  width: 760px;
}
.fw-gallery.fw-gallery-type4 .fw-col-width2 {
  width: 380px;
}
.fw-gallery.fw-gallery-type4 .fw-col-width2 .fw-inner-col {
  width: 100%;
}
.fw-gallery.fw-gallery-type4 .fw-gallery-image {
  width: 100%;
}
/* Gallery Height Size */
.fw-gallery.fw-gallery-type4 .fw-gallery-image.fw-height-sm {
  height: 230px;
}
.fw-gallery.fw-gallery-type4 .fw-gallery-image.fw-height-md {
  height: 460px;
}
.fw-gallery.fw-gallery-type4 .fw-gallery-image.fw-block-image-parent .fw-icell {
  vertical-align: top;
}
.fw-gallery.fw-gallery-type4 .fw-gallery-image.fw-block-image-parent .fw-block-image-child {
  position: absolute;
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
}
.fw-gallery.fw-gallery-type4 .fw-gallery-image.fw-block-image-parent .fw-overlay-title,
.fw-gallery.fw-gallery-type4 .fw-gallery-image.fw-block-image-parent .fw-overlay-description {
  text-align: left;
  opacity: 0;
  -webkit-transition: all 0.35s ease;
  -o-transition: all 0.35s ease;
  transition: all 0.35s ease;
}
.fw-gallery.fw-gallery-type4 .fw-gallery-image.fw-block-image-parent:hover .fw-overlay-title,
.fw-gallery.fw-gallery-type4 .fw-gallery-image.fw-block-image-parent:hover .fw-overlay-description,
.fw-gallery.fw-gallery-type4 .fw-gallery-image.fw-block-image-parent.fw-gallery-display-title-visible .fw-overlay-title,
.fw-gallery.fw-gallery-type4 .fw-gallery-image.fw-block-image-parent.fw-gallery-display-description-visible .fw-overlay-description {
  opacity: 1;
}
.fw-gallery.fw-gallery-type4 .fw-gallery-image.fw-block-image-parent .fw-overlay-description {
  padding-left: 0;
  padding-right: 0;
}
.fw-gallery.fw-gallery-type4 .fw-gallery-image.fw-block-image-parent .fw-overlay-title {
  padding: 20px 0 10px;
  margin-bottom: 0;
}
.fw-gallery.fw-gallery-type4 .fw-gallery-image.fw-block-image-parent i[class*='fw-icon-'] {
  display: none;
}
.fw-gallery.fw-gallery-type4 .fw-gallery-image.fw-block-image-parent .fw-block-image-child {
  max-height: 100%;
}

/* Column no Padding */
.fw-col-no-padding .fw-gallery.fw-gallery-type1 .fw-col-width1 {
  width: 422px;
}
.fw-col-no-padding .fw-gallery.fw-gallery-type1 .fw-col-width2 {
  width: 324px;
}
.fw-col-no-padding .fw-gallery.fw-gallery-type1 .fw-gallery-image.fw-height-sm {
  height: 182.68674px;
}
.fw-col-no-padding .fw-gallery.fw-gallery-type1 .fw-gallery-image.fw-height-md {
  height: 238.10856px;
}
.fw-col-no-padding .fw-gallery.fw-gallery-type1 .fw-gallery-image.fw-height-lg {
  height: 420.7953px;
}
.fw-col-no-padding .fw-gallery.fw-gallery-type2 .fw-col-width1 {
  width: 585px;
}
.fw-col-no-padding .fw-gallery.fw-gallery-type2 .fw-col-width2 {
  width: 292px;
}
.fw-col-no-padding .fw-gallery.fw-gallery-type2 .fw-gallery-image.fw-height-sm {
  height: 292.50405px;
}
.fw-col-no-padding .fw-gallery.fw-gallery-type2 .fw-gallery-image.fw-height-md {
  height: 390.0092px;
}
.fw-col-no-padding .fw-gallery.fw-gallery-type3 .fw-col-width1 {
  width: 871px;
}
.fw-col-no-padding .fw-gallery.fw-gallery-type3 .fw-col-width2 {
  width: 297px;
}
.fw-col-no-padding .fw-gallery.fw-gallery-type3 .fw-inner-col-width1 {
  width: 297px;
}
.fw-col-no-padding .fw-gallery.fw-gallery-type3 .fw-inner-col-width2 {
  width: 574px;
}
.fw-col-no-padding .fw-gallery.fw-gallery-type3 .fw-gallery-image.fw-height-sm {
  height: 289.42506px;
}
.fw-col-no-padding .fw-gallery.fw-gallery-type3 .fw-gallery-image.fw-height-md {
  height: 578.85012px;
}
.fw-col-no-padding .fw-gallery.fw-gallery-type4 .fw-col-width1 {
  width: 780px;
}
.fw-col-no-padding .fw-gallery.fw-gallery-type4 .fw-col-width2 {
  width: 390px;
}
.fw-col-no-padding .fw-gallery.fw-gallery-type4 .fw-gallery-image.fw-height-sm {
  height: 236.0559px;
}
.fw-col-no-padding .fw-gallery.fw-gallery-type4 .fw-gallery-image.fw-height-md {
  height: 472.1118px;
}

/* Gallery Type 5 */
.fw-gallery.fw-gallery-type5 {
  max-width: inherit;
}
.fw-gallery-type5 .grid-sizer {
  width: 25%;
  height: 370px;
}
.fw-gallery-type5 .fw-gallery-item-wrap {
  position: relative;
  width: 25%;
}
/*.fw-gallery-type5 .fw-gallery-item-wrap:before,
.fw-gallery-type5 .fw-gallery-item-wrap:after {
  display: block;
}*/
.fw-gallery-type5 .fw-gallery-item-wrap.fw-gallery-rectangle-item,
.fw-gallery-type5 .fw-gallery-item-wrap.fw-gallery-square-item {
  width: 50%;
}
.fw-gallery-type5 .fw-gallery-item-wrap .fw-gallery-item {
  display: block;
  position: relative;
  padding-bottom: 100%;
  height: 100%;
  box-sizing: border-box;
}
.fw-gallery-type5 .fw-gallery-item-wrap .fw-gallery-item .fw-gallery-item-image-div {
  position: relative;
  display: block;
  min-height: 100%;
  max-width: 100%;
  background: <?php echo esc_js($the_core_less_variables['theme-color-1']); ?>;
  background-size: cover;
  -webkit-transition: all 0.35s ease-in-out;
  -o-transition: all 0.35s ease-in-out;
  transition: all 0.35s ease-in-out;
  transform: scale(1.01);
}
.fw-gallery-type5 .fw-gallery-item-wrap .fw-gallery-image:hover .fw-gallery-item-image-div {
  opacity: 0.2;
  transform: scale(1.1);
}
.fw-gallery-type5 .fw-gallery-item-wrap.fw-gallery-rectangle-item .fw-gallery-item {
  padding-bottom: 50%;
}
.fw-gallery-type5 .fw-gallery-item-wrap.fw-gallery-square-item .fw-gallery-item {
  padding-bottom: 100%;
}
.fw-gallery-type5 .fw-gallery-item-wrap .fw-gallery-item .fw-gallery-item-content {
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
}
.fw-gallery-type5 .fw-overlay-4 .fw-block-image-child .fw-overlay-title {
  -webkit-transition: all 0.3s ease-in-out;
  transition: all 0.3s ease-in-out;
}

/* Responsive */
/* Screen for Laptop screen size 1440px */
@media only screen and (min-width: 1370px) and (max-width: 1441px) {
  /*=> Gallery Width Col Size if Header 6 is activate */
  .header-6 .fw-gallery.fw-gallery-type1 .fw-col-width1 {
    width: 405px;
  }
  .header-6 .fw-gallery.fw-gallery-type1 .fw-col-width2 {
    width: 298px;
  }
  .header-6 .fw-gallery.fw-gallery-type2 .fw-col-width1 {
    width: 554px;
  }
  .header-6 .fw-gallery.fw-gallery-type2 .fw-col-width2 {
    width: 277px;
  }
  .header-6 .fw-gallery.fw-gallery-type3 .fw-col-width1 {
    width: 810px;
  }
  .header-6 .fw-gallery.fw-gallery-type3 .fw-col-width2 {
    width: 298px;
  }
  .header-6 .fw-gallery.fw-gallery-type3 .fw-inner-col-width1 {
    width: 270px;
  }
  .header-6 .fw-gallery.fw-gallery-type3 .fw-inner-col-width2 {
    width: 540px;
  }
  .header-6 .fw-gallery.fw-gallery-type4 .fw-col-width1 {
    width: 744px;
  }
  .header-6 .fw-gallery.fw-gallery-type4 .fw-col-width2 {
    width: 364px;
  }
  /* Column no Padding */
  .header-6 .fw-col-no-padding .fw-gallery.fw-gallery-type1 .fw-col-width1 {
    width: 415px;
  }
  .header-6 .fw-col-no-padding .fw-gallery.fw-gallery-type1 .fw-col-width2 {
    width: 308px;
  }
  .header-6 .fw-col-no-padding .fw-gallery.fw-gallery-type2 .fw-col-width1 {
    width: 569px;
  }
  .header-6 .fw-col-no-padding .fw-gallery.fw-gallery-type2 .fw-col-width2 {
    width: 284px;
  }
  .header-6 .fw-col-no-padding .fw-gallery.fw-gallery-type3 .fw-col-width1 {
    width: 825px;
  }
  .header-6 .fw-col-no-padding .fw-gallery.fw-gallery-type3 .fw-col-width2 {
    width: 313px;
  }
  .header-6 .fw-col-no-padding .fw-gallery.fw-gallery-type3 .fw-inner-col-width1 {
    width: 277px;
  }
  .header-6 .fw-col-no-padding .fw-gallery.fw-gallery-type3 .fw-inner-col-width2 {
    width: 548px;
  }
  .header-6 .fw-col-no-padding .fw-gallery.fw-gallery-type4 .fw-col-width1 {
    width: 759px;
  }
  .header-6 .fw-col-no-padding .fw-gallery.fw-gallery-type4 .fw-col-width2 {
    width: 379px;
  }
}

/* Screen for Laptop screen size 1366px */
@media only screen and (min-width: 1199px) and (max-width: 1370px) {
  /*=> Gallery Width Col Size if Header 6 is activate */
  .header-6 .fw-gallery.fw-gallery-type1 .fw-col-width1 {
    width: 379px;
  }
  .header-6 .fw-gallery.fw-gallery-type1 .fw-col-width2 {
    width: 290px;
  }
  .header-6 .fw-gallery.fw-gallery-type1 .fw-gallery-image.fw-height-sm {
    height: 163.76px;
  }
  .header-6 .fw-gallery.fw-gallery-type1 .fw-gallery-image.fw-height-md {
    height: 213.44px;
  }
  .header-6 .fw-gallery.fw-gallery-type1 .fw-gallery-image.fw-height-lg {
    height: 377.2px;
  }
  .header-6 .fw-gallery.fw-gallery-type2 .fw-col-width1 {
    width: 524px;
  }
  .header-6 .fw-gallery.fw-gallery-type2 .fw-col-width2 {
    width: 262px;
  }
  .header-6 .fw-gallery.fw-gallery-type2 .fw-gallery-image.fw-height-sm {
    height: 262px;
  }
  .header-6 .fw-gallery.fw-gallery-type2 .fw-gallery-image.fw-height-md {
    height: 349px;
  }
  .header-6 .fw-gallery.fw-gallery-type3 .fw-col-width1 {
    width: 781px;
  }
  .header-6 .fw-gallery.fw-gallery-type3 .fw-col-width2 {
    width: 267px;
  }
  .header-6 .fw-gallery.fw-gallery-type3 .fw-inner-col-width1 {
    width: 266px;
  }
  .header-6 .fw-gallery.fw-gallery-type3 .fw-inner-col-width2 {
    width: 515px;
  }
  .header-6 .fw-gallery.fw-gallery-type3 .fw-gallery-image.fw-height-sm {
    height: 259.44px;
  }
  .header-6 .fw-gallery.fw-gallery-type3 .fw-gallery-image.fw-height-md {
    height: 518.88px;
  }
  .header-6 .fw-gallery.fw-gallery-type4 .fw-col-width1 {
    width: 699px;
  }
  .header-6 .fw-gallery.fw-gallery-type4 .fw-col-width2 {
    width: 349px;
  }
  .header-6 .fw-gallery.fw-gallery-type4 .fw-gallery-image.fw-height-sm {
    height: 211.6px;
  }
  .header-6 .fw-gallery.fw-gallery-type4 .fw-gallery-image.fw-height-md {
    height: 423.2px;
  }
  /* Column no Padding */
  .header-6 .fw-col-no-padding .fw-gallery.fw-gallery-type1 .fw-col-width1 {
    width: 390px;
  }
  .header-6 .fw-col-no-padding .fw-gallery.fw-gallery-type1 .fw-col-width2 {
    width: 299px;
  }
  .header-6 .fw-col-no-padding .fw-gallery.fw-gallery-type1 .fw-gallery-image.fw-height-sm {
    height: 168.922px;
  }
  .header-6 .fw-col-no-padding .fw-gallery.fw-gallery-type1 .fw-gallery-image.fw-height-md {
    height: 220.168px;
  }
  .header-6 .fw-col-no-padding .fw-gallery.fw-gallery-type1 .fw-gallery-image.fw-height-lg {
    height: 389.09px;
  }
  .header-6 .fw-col-no-padding .fw-gallery.fw-gallery-type2 .fw-col-width1 {
    width: 539px;
  }
  .header-6 .fw-col-no-padding .fw-gallery.fw-gallery-type2 .fw-col-width2 {
    width: 269px;
  }
  .header-6 .fw-col-no-padding .fw-gallery.fw-gallery-type2 .fw-gallery-image.fw-height-sm {
    height: 269px;
  }
  .header-6 .fw-col-no-padding .fw-gallery.fw-gallery-type2 .fw-gallery-image.fw-height-md {
    height: 359px;
  }
  .header-6 .fw-col-no-padding .fw-gallery.fw-gallery-type3 .fw-col-width1 {
    width: 804px;
  }
  .header-6 .fw-col-no-padding .fw-gallery.fw-gallery-type3 .fw-col-width2 {
    width: 275px;
  }
  .header-6 .fw-col-no-padding .fw-gallery.fw-gallery-type3 .fw-inner-col-width1 {
    width: 274px;
  }
  .header-6 .fw-col-no-padding .fw-gallery.fw-gallery-type3 .fw-inner-col-width2 {
    width: 530px;
  }
  .header-6 .fw-col-no-padding .fw-gallery.fw-gallery-type3 .fw-gallery-image.fw-height-sm {
    height: 267.054px;
  }
  .header-6 .fw-col-no-padding .fw-gallery.fw-gallery-type3 .fw-gallery-image.fw-height-md {
    height: 534.108px;
  }
  .header-6 .fw-col-no-padding .fw-gallery.fw-gallery-type4 .fw-col-width1 {
    width: 719px;
  }
  .header-6 .fw-col-no-padding .fw-gallery.fw-gallery-type4 .fw-col-width2 {
    width: 359px;
  }
  .header-6 .fw-col-no-padding .fw-gallery.fw-gallery-type4 .fw-gallery-image.fw-height-sm {
    height: 217.81px;
  }
  .header-6 .fw-col-no-padding .fw-gallery.fw-gallery-type4 .fw-gallery-image.fw-height-md {
    height: 435.62px;
  }
}

/* Screen 1400px */
@media (min-width: 767px) {
  .fw-gallery.fw-gallery-type1 .fw-gallery-col:not:first-child .fw-gallery-image.fw-block-image-parent {
    border-left: none;
  }
  .fw-gallery.fw-gallery-type1 .fw-gallery-col:not:first-child .fw-gallery-image.fw-block-image-parent:not:last-child {
    border-bottom: none;
  }
  .fw-gallery.fw-gallery-type1 .fw-gallery-col:first-child .fw-gallery-image.fw-block-image-parent:not:last-child {
    border-bottom: none;
  }
  .fw-gallery.fw-gallery-type2 .fw-gallery-col:not:first-child .fw-gallery-col .fw-gallery-image.fw-block-image-parent {
    border-left: none;
  }
  .fw-gallery.fw-gallery-type2 .fw-gallery-col:not:first-child .fw-gallery-col .fw-gallery-image.fw-block-image-parent:not:last-child {
    border-bottom: none;
  }
  .fw-gallery.fw-gallery-type2 .fw-gallery-col:not:first-child .fw-gallery-image:not:last-child.fw-height-md {
    border-top: none;
    border-bottom: none;
    border-left: none;
  }
  .fw-gallery.fw-gallery-type2 .fw-gallery-col:not:first-child .fw-gallery-image:last-child.fw-height-md {
    border-top: none;
    border-left: none;
  }
  .fw-gallery.fw-gallery-type2 .fw-gallery-col:first-child .fw-gallery-image.fw-block-image-parent:not:last-child {
    border-bottom: none;
  }
  .fw-gallery.fw-gallery-type3 .fw-col-width1 .fw-gallery-col:not:nth-child(odd) .fw-gallery-image.fw-block-image-parent {
    border-left: none;
  }
  .fw-gallery.fw-gallery-type3 .fw-col-width1 .fw-gallery-col:not:nth-child(1):not:nth-child(2) .fw-gallery-image.fw-block-image-parent {
    border-top: none;
  }
  .fw-gallery.fw-gallery-type3 .fw-col-width2 .fw-gallery-image.fw-block-image-parent {
    border-left: none;
  }
  .fw-gallery.fw-gallery-type3 .fw-col-width2 .fw-gallery-image.fw-block-image-parent:last-child:not:first-child {
    border-top: none;
  }
  .fw-gallery.fw-gallery-type4 .fw-gallery-col:nth-child(2n):not(.fw-inner-col) .fw-gallery-image.fw-block-image-parent {
    border-left: none;
  }
  .fw-gallery.fw-gallery-type4 .fw-gallery-col:not:nth-child(1):not:nth-child(2) .fw-gallery-image.fw-block-image-parent {
    border-top: none;
  }
}

/* Screen 1024px */
@media(max-width:1199px){
  .fw-col-inner .fw-gallery.fw-gallery-type1 .fw-col-width1 {
    width: 339px;
  }
  .fw-col-inner .fw-gallery.fw-gallery-type1 .fw-col-width2 {
    width: 260px;
  }
  .fw-col-inner .fw-gallery.fw-gallery-type1 .fw-gallery-image.fw-height-sm {
    height: 146.7076px;
  }
  .fw-col-inner .fw-gallery.fw-gallery-type1 .fw-gallery-image.fw-height-md {
    height: 191.2144px;
  }
  .fw-col-inner .fw-gallery.fw-gallery-type1 .fw-gallery-image.fw-height-lg {
    height: 337.922px;
  }
  .fw-gallery.fw-gallery-type2 .fw-gallery-image {
    width: 100%;
  }
  .fw-col-inner .fw-gallery.fw-gallery-type2 .fw-col-width1 {
    width: 469px;
  }
  .fw-col-inner .fw-gallery.fw-gallery-type2 .fw-col-width2 {
    width: 234px;
  }
  .fw-col-inner .fw-gallery.fw-gallery-type2 .fw-gallery-image.fw-height-sm {
    height: 234px;
  }
  .fw-col-inner .fw-gallery.fw-gallery-type2 .fw-gallery-image.fw-height-md {
    height: 313px;
  }
  .fw-gallery.fw-gallery-type3 .fw-gallery-image {
    width: 100%;
  }
  .fw-col-inner .fw-gallery.fw-gallery-type3 .fw-col-width1 {
    width: 700px;
  }
  .fw-col-inner .fw-gallery.fw-gallery-type3 .fw-col-width2 {
    width: 239px;
  }
  .fw-col-inner .fw-gallery.fw-gallery-type3 .fw-inner-col-width1 {
    width: 239px;
  }
  .fw-col-inner .fw-gallery.fw-gallery-type3 .fw-inner-col-width2 {
    width: 461px;
  }
  .fw-col-inner .fw-gallery.fw-gallery-type3 .fw-gallery-image.fw-height-sm {
    height: 232.4244px;
  }
  .fw-col-inner .fw-gallery.fw-gallery-type3 .fw-gallery-image.fw-height-md {
    height: 464.8488px;
  }
  .fw-col-inner .fw-gallery.fw-gallery-type4 .fw-col-width1 {
    width: 626px;
  }
  .fw-col-inner .fw-gallery.fw-gallery-type4 .fw-col-width2 {
    width: 313px;
  }
  .fw-col-inner .fw-gallery.fw-gallery-type4 .fw-gallery-image.fw-height-sm {
    height: 189.566px;
  }
  .fw-col-inner .fw-gallery.fw-gallery-type4 .fw-gallery-image.fw-height-md {
    height: 379.132px;
  }
  .fw-gallery.fw-gallery-type4 .fw-col-width2 .fw-inner-col {
    width: 100%;
  }
  .fw-gallery.fw-gallery-type4 .fw-gallery-image {
    width: 100%;
  }

  /* Column no Padding */
  .fw-col-no-padding .fw-col-inner .fw-gallery.fw-gallery-type1 .fw-col-width1 {
    width: 350px;
  }
  .fw-col-no-padding .fw-col-inner .fw-gallery.fw-gallery-type1 .fw-col-width2 {
    width: 268px;
  }
  .fw-col-no-padding .fw-col-inner .fw-gallery.fw-gallery-type1 .fw-gallery-image.fw-height-sm {
    height: 151.44730746px;
  }
  .fw-col-no-padding .fw-col-inner .fw-gallery.fw-gallery-type1 .fw-gallery-image.fw-height-md {
    height: 197.39199624px;
  }
  .fw-col-no-padding .fw-col-inner .fw-gallery.fw-gallery-type1 .fw-gallery-image.fw-height-lg {
    height: 348.8393037px;
  }
  .fw-col-no-padding .fw-col-inner .fw-gallery.fw-gallery-type2 .fw-col-width1 {
    width: 484px;
  }
  .fw-col-no-padding .fw-col-inner .fw-gallery.fw-gallery-type2 .fw-col-width2 {
    width: 242px;
  }
  .fw-col-no-padding .fw-col-inner .fw-gallery.fw-gallery-type2 .fw-gallery-image.fw-height-sm {
    height: 242.48585745px;
  }
  .fw-col-no-padding .fw-col-inner .fw-gallery.fw-gallery-type2 .fw-gallery-image.fw-height-md {
    height: 323.3144766px;
  }
  .fw-col-no-padding .fw-col-inner .fw-gallery.fw-gallery-type3 .fw-col-width1 {
    width: 722px;
  }
  .fw-col-no-padding .fw-col-inner .fw-gallery.fw-gallery-type3 .fw-col-width2 {
    width: 246px;
  }
  .fw-col-no-padding .fw-col-inner .fw-gallery.fw-gallery-type3 .fw-inner-col-width1 {
    width: 246px;
  }
  .fw-col-no-padding .fw-col-inner .fw-gallery.fw-gallery-type3 .fw-inner-col-width2 {
    width: 476px;
  }
  .fw-col-no-padding .fw-col-inner .fw-gallery.fw-gallery-type3 .fw-gallery-image.fw-height-sm {
    height: 239.93337474px;
  }
  .fw-col-no-padding .fw-col-inner .fw-gallery.fw-gallery-type3 .fw-gallery-image.fw-height-md {
    height: 479.86674948px;
  }
  .fw-col-no-padding .fw-col-inner .fw-gallery.fw-gallery-type4 .fw-col-width1 {
    width: 646px;
  }
  .fw-col-no-padding .fw-col-inner .fw-gallery.fw-gallery-type4 .fw-col-width2 {
    width: 323px;
  }
  .fw-col-no-padding .fw-col-inner .fw-gallery.fw-gallery-type4 .fw-gallery-image.fw-height-sm {
    height: 195.6903411px;
  }
  .fw-col-no-padding .fw-col-inner .fw-gallery.fw-gallery-type4 .fw-gallery-image.fw-height-md {
    height: 391.3806822px;
  }
}
/* Screen 768px */
@media(max-width:991px){
  .fw-col-inner .fw-gallery.fw-gallery-type1 .fw-col-width1 {
    width: 260px;
  }
  .fw-col-inner .fw-gallery.fw-gallery-type1 .fw-col-width2 {
    width: 199px;
  }
  .fw-col-inner .fw-gallery.fw-gallery-type1 .fw-gallery-image.fw-height-sm {
    height: 112.3536px;
  }
  .fw-col-inner .fw-gallery.fw-gallery-type1 .fw-gallery-image.fw-height-md {
    height: 146.4384px;
  }
  .fw-col-inner .fw-gallery.fw-gallery-type1 .fw-gallery-image.fw-height-lg {
    height: 258.792px;
  }
  .fw-gallery.fw-gallery-type2 .fw-gallery-image {
    width: 100%;
  }
  .fw-col-inner .fw-gallery.fw-gallery-type2 .fw-col-width1 {
    width: 359px;
  }
  .fw-col-inner .fw-gallery.fw-gallery-type2 .fw-col-width2 {
    width: 179px;
  }
  .fw-col-inner .fw-gallery.fw-gallery-type2 .fw-gallery-image.fw-height-sm {
    height: 179.892px;
  }
  .fw-col-inner .fw-gallery.fw-gallery-type2 .fw-gallery-image.fw-height-md {
    height: 239.856px;
  }
  .fw-gallery.fw-gallery-type3 .fw-gallery-image {
    width: 100%;
  }
  .fw-col-inner .fw-gallery.fw-gallery-type3 .fw-col-width1 {
    width: 536px;
  }
  .fw-col-inner .fw-gallery.fw-gallery-type3 .fw-col-width2 {
    width: 183px;
  }
  .fw-col-inner .fw-gallery.fw-gallery-type3 .fw-inner-col-width1 {
    width: 183px;
  }
  .fw-col-inner .fw-gallery.fw-gallery-type3 .fw-inner-col-width2 {
    width: 353px;
  }
  .fw-col-inner .fw-gallery.fw-gallery-type3 .fw-gallery-image.fw-height-sm {
    height: 177.9984px;
  }
  .fw-col-inner .fw-gallery.fw-gallery-type3 .fw-gallery-image.fw-height-md {
    height: 355.9968px;
  }
  .fw-gallery.fw-gallery-type4 .fw-col-width2 .fw-inner-col {
    width: 100%;
  }
  .fw-gallery.fw-gallery-type4 .fw-gallery-image {
    width: 100%;
  }
  .fw-col-inner .fw-gallery.fw-gallery-type4 .fw-col-width1 {
    width: 479px;
  }
  .fw-col-inner .fw-gallery.fw-gallery-type4 .fw-col-width2 {
    width: 239px;
  }
  .fw-col-inner .fw-gallery.fw-gallery-type4 .fw-gallery-image.fw-height-sm {
    height: 145.176px;
  }
  .fw-col-inner .fw-gallery.fw-gallery-type4 .fw-gallery-image.fw-height-md {
    height: 290.352px;
  }
  /* Column no Padding */
  .fw-col-no-padding .fw-col-inner .fw-gallery.fw-gallery-type1 .fw-col-width1 {
    width: 270px;
  }
  .fw-col-no-padding .fw-col-inner .fw-gallery.fw-gallery-type1 .fw-col-width2 {
    width: 207px;
  }
  .fw-col-no-padding .fw-col-inner .fw-gallery.fw-gallery-type1 .fw-gallery-image.fw-height-sm {
    height: 117.04556745px;
  }
  .fw-col-no-padding .fw-col-inner .fw-gallery.fw-gallery-type1 .fw-gallery-image.fw-height-md {
    height: 152.55377331px;
  }
  .fw-col-no-padding .fw-col-inner .fw-gallery.fw-gallery-type1 .fw-gallery-image.fw-height-lg {
    height: 269.59934076px;
  }
  .fw-col-no-padding .fw-col-inner .fw-gallery.fw-gallery-type2 .fw-col-width1 {
    width: 374px;
  }
  .fw-col-no-padding .fw-col-inner .fw-gallery.fw-gallery-type2 .fw-col-width2 {
    width: 187px;
  }
  .fw-col-no-padding .fw-col-inner .fw-gallery.fw-gallery-type2 .fw-gallery-image.fw-height-sm {
    height: 187.40441979px;
  }
  .fw-col-no-padding .fw-col-inner .fw-gallery.fw-gallery-type2 .fw-gallery-image.fw-height-md {
    height: 249.87255973px;
  }
  .fw-col-no-padding .fw-col-inner .fw-gallery.fw-gallery-type3 .fw-col-width1 {
    width: 558px;
  }
  .fw-col-no-padding .fw-col-inner .fw-gallery.fw-gallery-type3 .fw-col-width2 {
    width: 190px;
  }
  .fw-col-no-padding .fw-col-inner .fw-gallery.fw-gallery-type3 .fw-inner-col-width1 {
    width: 190px;
  }
  .fw-col-no-padding .fw-col-inner .fw-gallery.fw-gallery-type3 .fw-inner-col-width2 {
    width: 368px;
  }
  .fw-col-no-padding .fw-col-inner .fw-gallery.fw-gallery-type3 .fw-gallery-image.fw-height-sm {
    height: 185.43174169px;
  }
  .fw-col-no-padding .fw-col-inner .fw-gallery.fw-gallery-type3 .fw-gallery-image.fw-height-md {
    height: 370.86348338px;
  }
  .fw-col-no-padding .fw-col-inner .fw-gallery.fw-gallery-type4 .fw-col-width1 {
    width: 499px;
  }
  .fw-col-no-padding .fw-col-inner .fw-gallery.fw-gallery-type4 .fw-col-width2 {
    width: 249px;
  }
  .fw-col-no-padding .fw-col-inner .fw-gallery.fw-gallery-type4 .fw-gallery-image.fw-height-sm {
    height: 151.23865457px;
  }
  .fw-col-no-padding .fw-col-inner .fw-gallery.fw-gallery-type4 .fw-gallery-image.fw-height-md {
    height: 302.47730914px;
  }
}

/* Screen 568px */
@media(max-width:767px){
  .fw-gallery .fw-gallery-col {
    float: none !important;
    margin: 0 auto !important;
  }
  .fw-gallery .fw-gallery-col {
    width: 70% !important;
  }
  .fw-gallery .fw-gallery-col *.fw-gallery-col{
    width: 100% !important;
  }
  .fw-gallery .fw-gallery-image.fw-height-sm,
  .fw-gallery .fw-gallery-image.fw-height-md,
  .fw-gallery .fw-gallery-image.fw-height-lg {
    height: auto !important;
  }
  .fw-gallery .fw-gallery-image.fw-block-image-parent .fw-block-image-child {
    position: relative !important;
  }
  .fw-gallery .fw-gallery-col .fw-block-image-parent .fw-block-image-overlay .fw-overlay-title {
    font-size: 15px !important;
  }
  .fw-gallery .fw-gallery-col .fw-block-image-parent .fw-block-image-overlay .fw-overlay-description {
    font-size: 12px !important;
  }
  .fw-gallery .fw-gallery-col:not(:last-child) .fw-block-image-parent {
    border-bottom: none !important;
  }
  .fw-gallery .fw-gallery-col:last-child .fw-block-image-parent:not:last-child {
    border-bottom: none !important;
  }
  .fw-gallery.fw-gallery-type2 .fw-gallery-image {
    width: 100%;
  }
  /* Gallery Width Col Size */
  .fw-gallery.fw-gallery-type3 .fw-gallery-image {
    width: 100%;
  }
  /* Gallery Width Col Size */
  .fw-gallery.fw-gallery-type4 .fw-col-width2 .fw-inner-col {
    width: 100%;
  }
  .fw-gallery.fw-gallery-type4 .fw-gallery-image {
    width: 100%;
  }
}

/* Screen 320px */
@media(max-width:479px){
  .fw-gallery .fw-gallery-col {
    width: 100% !important;
  }
  .fw-gallery.fw-gallery-type3 .fw-gallery-image {
    width: 100%;
  }
  .fw-gallery.fw-gallery-type4 .fw-gallery-image {
    width: 100%;
  }
  .fw-gallery-type5 .fw-gallery-item-wrap.fw-gallery-rectangle-item,
  .fw-gallery-type5 .fw-gallery-item-wrap.fw-gallery-square-item,
  .fw-gallery-type5 .fw-gallery-item-wrap {
    width: 100%;
  }
}

