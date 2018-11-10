/* Fade Slider */
/* -------------------------------------------------- */
.fw-wrap-fade-slider {
  z-index: 15;
  position: relative;
}
.fw-fade-slider {
  position: relative;
}
.fw-fade-slider.main-carousel .item.left {
  float: none !important;
}
.fw-fade-slider.main-carousel .item.right {
  float: none !important;
}
.fw-fade-slider .item .fw-fade-slide-text-wrap .fw-fade-slider-title-after {
  font-family: <?php echo ($the_core_less_variables['subtitles-family']); ?>;
  font-weight: <?php echo esc_js($the_core_less_variables['subtitles-weight']); ?>;
  font-style: <?php echo esc_js($the_core_less_variables['subtitles-style']); ?>;
  font-size: <?php echo esc_js($the_core_less_variables['subtitles-size']); ?>;
  line-height: <?php echo esc_js($the_core_less_variables['subtitles-line-height']); ?>;
  letter-spacing: <?php echo esc_js($the_core_less_variables['subtitles-letter-spacing']); ?>;
  color: <?php echo esc_js($the_core_less_variables['subtitles-color']); ?>;
}
.fw-fade-slider .fw-fade-slider-title,
.fw-fade-slider .fw-fade-slider-title-after {
  margin-top: 10px;
  margin-bottom: 10px;
}
.fw-fade-slider .carousel-indicators {
  left: 2%;
  top: 50%;
  bottom: auto;
  margin: 0;
  width: auto;
  z-index: 21;
}
.fw-fade-slider .carousel-indicators li {
  display: block;
  margin-bottom: 5px;
  width: 12px;
  height: 12px;
  border-color: rgba(255, 255, 255, 0.5);
}
.fw-fade-slider .carousel-indicators li.active {
  background: rgba(255, 255, 255, 0.5);
  border-color: rgba(255, 255, 255, 0.5);
  margin: 1px 1px 5px;
}
.fw-fade-slider .carousel-control {
  width: 30px;
  height: 30px;
  box-shadow: none;
  background: transparent;
  z-index: 20;
  position: absolute;
  top: 50%;
  margin-top: -15px;
}
.fw-fade-slider .item {
  height: 700px;
  padding: 30px 15px;
  background-size: cover;
  background-position: center center;
  overflow: hidden;
  z-index: 10;
}
.fw-fade-slider .item .fw-container {
  display: block;
  padding: 0;
  height: 100%;
}
.fw-fade-slider .item.fw-fade-slider-content-align-left {
  text-align: left;
}
.fw-fade-slider .item.fw-fade-slider-content-align-left .fw-slide-slider-button {
  float: left;
}
.fw-fade-slider .item.fw-fade-slider-content-align-center {
  text-align: center;
}
.fw-fade-slider .item.fw-fade-slider-content-align-center .fw-slide-slider-button {
  margin: 0 auto;
}
.fw-fade-slider .item.fw-fade-slider-content-align-right {
  text-align: right;
}
.fw-fade-slider .item.fw-fade-slider-content-align-right .fw-slide-slider-button {
  float: right;
}
.fw-fade-slider .item .fw-fade-slide-text-wrap {
  position: relative;
  z-index: 5;
  padding: 0 15px;
}
.fw-fade-slider .item .fw-fade-slide-text-wrap .animated {
  margin-bottom: <?php echo esc_js($the_core_less_variables['fw-space-between-elements-sm']); ?>;
}
.fw-fade-slider .item .fw-fade-slide-text-wrap .animated:last-child {
  margin-bottom: 0;
}
/* button */
.fw-fade-slider .fw-slide-slider-button {
  border-color: <?php echo esc_js($the_core_less_variables['theme-color-5']); ?>;
  color: <?php echo esc_js($the_core_less_variables['theme-color-5']); ?>;
  background: transparent;
}
.fw-fade-slider .fw-slide-slider-button:hover {
  color: <?php echo esc_js($the_core_less_variables['theme-color-2']); ?>;
}

/* No fluid */
.fw-container .fw-fade-slider .carousel-indicators {
  top: auto;
  left: 50%;
  bottom: 10%;
}
.fw-container .fw-fade-slider .carousel-indicators li{
  display: inline-block;
  margin-bottom: 1px;
}
.fw-container .fw-fade-slider .carousel-control.left {
  left: 10px;
  right: initial;
}
.fw-container .fw-fade-slider .carousel-control.right {
  right: 10px;
  left: initial;
}
.fw-container .fw-fade-slider .fw-fade-slide-text-wrap {
  padding: 0 5em;
}

/* Responsive */
/* Screen 568px */
@media(max-width:767px){
  .fw-fade-slider .item{
    height: auto;
  }
}