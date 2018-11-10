/* Slideshow Slider */
/* -------------------------------------------------- */
.fw-container-fluid .fw-col-no-padding .fw-slider {
  margin-left: 0;
  margin-right: 0;
}
.fw-container-fluid .fw-slider {
  margin-left: -15px;
  margin-right: -15px;
}
.fw-slider .fw-ratio-container {
  display: block;
  float: left;
}
.fw-slider-item {
  display: block;
  float: left;
  position: relative;
  max-width: 100%;
  text-align: center;
}
.fw-slider-item img {
  width: 100%;
  height: 100%;
}
.fw-slider-item > a {
  display: block;
  position: relative;
}
.fw-slider-caption {
  background-color: rgba(0, 0, 0, 0.6);
  width: 100%;
  display: block;
  position: absolute;
  bottom: 0;
  color: #fff;
  padding: 1em 20px;
  font-size: 16px;
  text-align: left;
}
.fw-slider {
  position: relative;
}
.fw-slider .fw-slider-prev,
.fw-slider .fw-slider-next {
  display: block;
  width: 32px;
  height: 32px;
  line-height: 32px;
  position: absolute;
  z-index: 10;
  top: 50%;
  margin-top: -20px;
  border-radius: 50%;
  background-color: rgba(0, 0, 0, 0.5);
  color: #fff;
  font-family: FontAwesome;
  text-align: center;
  font-size: 24px;
  font-weight: normal;
}
.fw-slider .fw-slider-prev:hover,
.fw-slider .fw-slider-next:hover {
  background-color: rgba(0, 0, 0, 0.8);
}
.fw-slider .fw-slider-prev {
  left: 10px;
}
.fw-slider .fw-slider-prev span:before {
  content: "\f104";
  margin-right: 0.1em;
}
.fw-slider .fw-slider-next {
  right: 10px;
}
.fw-slider .fw-slider-next span:before {
  content: "\f105";
  margin-left: 0.1em;
}
.fw-slider .fw-slider-pagination {
  position: absolute;
  z-index: 11;
  right: 15px;
  bottom: 15px;
  text-align: right;
}
.fw-slider .fw-slider-pagination a {
  display: inline-block;
  overflow: hidden;
  border-radius: 50%;
  border: 2px solid #fff;
  margin: 0 3px;
}
.fw-slider .fw-slider-pagination a span {
  display: block;
  text-indent: 400px;
}
.fw-slider .fw-slider-pagination a.selected {
  background-color: #fff;
}
.fw-slider.hide-elements {
  height: 1px;
  overflow: hidden;
}
.fw-slider.hide-elements .fw-slider-item img {
  visibility: hidden;
}
.fw-slider.hide-elements .fw-slider-prev,
.fw-slider.hide-elements .fw-slider-next,
.fw-slider.hide-elements .fw-slider-pagination,
.fw-slider.hide-elements .fw-slider-caption {
  display: none !important;
}
.fw-slider .fw-slider-prev:active,
.fw-slider .fw-slider-next:active {
  margin-top: -19px;
}
.fw-slider .fw-slider-pagination a {
  width: 10px;
  height: 10px;
}

/* Custom Sliders */
/* -------------------------------------------------- */
/* Slider With Caption */


.fw-container-fluid .slider-main {
  margin-left: -15px;
  margin-right: -15px;
}
.slider-main {
  position: relative;
}
/* slider item */
.slider-main .slider-item {
  float: left;
  position: relative;
  max-width: 100%;
}
.slider-main .slider-item img {
  width: 100%;
  height: 100%;
}
.slider-main .slider-item .slide-title {
  visibility: hidden;
  position: absolute;
}
.slider-main .slider-main-caption {
  position: absolute;
  left: -3%;
  bottom: 13%;
  z-index: 2;
  width: 57%;
  color: #fff;
}
.slider-main .caption-inner {
  background-color: <?php echo the_core_hex2rgba($the_core_less_variables['theme-color-1'], 0.9); ?>;
  position: relative;
  width: 100%;
  padding: 40px 80px;
}
.slider-main .slider-main-title a {
  color: #fff;
  display: inline-block;
  font-size: <?php echo floor(floatval($the_core_less_variables['font-size-base'])*2.55); ?>px;
  line-height: 1em;
}
.slider-main .slider-prev,
.slider-main .slider-next {
  color: #000;
  font-size: 48px;
  line-height: 1em;
  position: absolute;
  top: 50%;
  margin-top: -24px;
}
.slider-main .slider-prev:hover,
.slider-main .slider-next:hover {
  color: #fff;
}
.slider-main .slider-prev:active,
.slider-main .slider-next:active {
  margin-top: -23px;
}
.slider-main .slider-prev {
  left: 30px;
}
.slider-main .slider-next {
  right: 30px;
}
.slider-main .slider-pagination {
  position: absolute;
  bottom: 5%;
  left: 4%;
  z-index: 3;
}
.slider-main .slider-pagination a {
  width: 10px;
  height: 10px;
  background-color: rgba(255, 255, 255, 0.3);
  display: inline-block;
  overflow: hidden;
  border-radius: 50%;
  margin: 0 5px;
  font-size: 0;
}
.slider-main .slider-pagination a:hover,
.slider-main .slider-pagination a.selected {
  background-color: rgba(255, 255, 255, 0.7);
}
.slider-main .slider-progress {
  width: 80%;
  left: 10%;
  position: absolute;
  bottom: 0;
  background-color: rgba(0, 0, 0, 0.5);
}
.slider-main .timer {
  height: 6px;
  background-color: rgba(255, 255, 255, 0.6);
}

/* Responsive */
@media (max-width: 1199px) {
  .slider-main .slider-main-title a {
    font-size: <?php echo floor(floatval($the_core_less_variables['font-size-base'])*2); ?>px;
  }
  .slider-main .slider-main-caption {
    width: 62%;
  }
  .slider-main .caption-inner {
    padding: 30px 60px;
  }
}
@media (max-width: 991px) {
  .slider-main .slider-main-title a {
    font-size: <?php echo floor(floatval($the_core_less_variables['font-size-base'])*1.5); ?>px;
  }
  .slider-main .slider-main-caption {
    width: 62%;
  }
  .slider-main .caption-inner {
    padding: 20px 60px;
  }
  .slider-main .slider-prev {
    left: 4%;
  }
  .slider-main .slider-next {
    right: 4%;
  }
}
/* Screen 568px */
@media(max-width:767px){
  .fw-slider .fw-slider-caption{
    font-size: 95% !important;
    line-height: normal !important;
  }
}