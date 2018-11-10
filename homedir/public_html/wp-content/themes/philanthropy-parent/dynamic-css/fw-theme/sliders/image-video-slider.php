/* Image Video Slider */
/* -------------------------------------------------- */
.fw-wrap-image-slider{
  z-index: 15;
  position: relative;
}
.fw-wrap-image-slider .carousel-inner{
  overflow: visible;
}
.fw-image-video-slider {
  position: relative;
}
.fw-image-video-slider.main-carousel .item.left {
  float: none !important;
}
.fw-image-video-slider.main-carousel .item.right {
  float: none !important;
}
.fw-image-video-slider .carousel-control {
  width: 30px;
  height: 30px;
}
.fw-image-video-slider .carousel-indicators {
  left: 2%;
  top: 50%;
  margin: 0;
  width: auto;
  z-index: 21;
}
.fw-image-video-slider .carousel-indicators li {
  display: block;
  margin-bottom: 5px;
  width: 12px;
  height: 12px;
  border-color: rgba(255, 255, 255, 0.5);
}
.fw-image-video-slider .carousel-indicators li.active {
  margin: 1px 1px 5px;
  background: rgba(255, 255, 255, 0.5);
  border-color: rgba(255, 255, 255, 0.5);
}
.fw-image-video-slider .item {
  height: 700px;
  overflow: hidden;
  z-index: 10;
  background-size: cover;
}
.fw-image-video-slider .item .fw-container {
  display: block;
  padding: 0 !important;
  height: 100%;
  background: transparent;
  z-index: 5;
}
.fw-image-video-slider .item .fw-text-wrap .fw-image-video-slider-text {
  font-size: <?php echo esc_js($the_core_less_variables['subtitles-size']); ?>;
}
.fw-image-video-slider .item .fw-text-wrap .animated {
  margin-bottom: <?php echo floatval($the_core_less_variables['fw-content-density-lg'])*2; ?>px;
}
.fw-image-video-slider .item .fw-text-wrap .fw-image-video-slider-title {
  margin: 0;
}
.fw-image-video-slider .item .fw-text-wrap .fw-image-video-slider-title-after {
  font-family: <?php echo ($the_core_less_variables['subtitles-family']); ?>;
  font-weight: <?php echo esc_js($the_core_less_variables['subtitles-weight']); ?>;
  font-style: <?php echo esc_js($the_core_less_variables['subtitles-style']); ?>;
  font-size: <?php echo esc_js($the_core_less_variables['subtitles-size']); ?>;
  line-height: <?php echo esc_js($the_core_less_variables['subtitles-line-height']); ?>;
  color: <?php echo esc_js($the_core_less_variables['subtitles-color']); ?>;
  letter-spacing: <?php echo esc_js($the_core_less_variables['subtitles-letter-spacing']); ?>;
  margin: 0 0 30px;
}
.fw-image-video-slider .item .fw-text-wrap .animated:last-child {
  margin-bottom: 0;
}

/* No fluid */
.fw-container .fw-image-video-slider .carousel-indicators {
  top: 35%;
  left: 18px;
}
.fw-image-video-slider .fw-text-wrap,
.fw-image-video-slider .fw-media-wrap {
  padding: 0 3em;
  display: inline-block;
  width: 48%;
  vertical-align: middle;
}
.fw-image-video-slider .fw-media-wrap{
  text-align: center;
}
.fw-image-video-slider .fw-media-wrap iframe {
  border: 1px solid transparent;
}
.fw-image-video-slider .border-media {
  display: inline-block;
}

/* Responsive */
/* Screen 1024px */
@media(max-width:1199px){
  .fw-image-video-slider .item .fw-text-wrap .fw-image-video-slider-text{
    margin-bottom: 30px;
  }
  .fw-image-video-slider .item.fw-image-video-slider-text-left .fw-text-wrap{
    padding-right: 2em;
  }
  .fw-image-video-slider .item.fw-image-video-slider-text-right .fw-text-wrap{
    padding-left: 2em;
  }
  .fw-image-video-slider .fw-media-wrap{
    padding: 0 2em;
  }
  .fw-image-video-slider .item .fw-text-wrap{
    word-wrap: break-word;
  }
  .fw-image-video-slider .item .fw-media-wrap .border-media{
    max-width: 100%;
  }
  .fw-image-video-slider .item .fw-media-wrap .border-media iframe{
    height: 360px;
  }
}

/* Screen 768px */
@media(max-width:991px){
  .fw-image-video-slider .fw-text-wrap,
  .fw-image-video-slider .fw-media-wrap{
    padding: 0 2em;
  }
  .fw-image-video-slider .item.fw-image-video-slider-text-left .fw-text-wrap{
    padding-right: 1em;
  }
  .fw-image-video-slider .item.fw-image-video-slider-text-right .fw-text-wrap{
    padding-left: 1em;
  }
  .fw-image-video-slider .fw-image-video-slider-text-left .fw-media-wrap{
    padding-right: 20px;
  }
  .fw-image-video-slider .fw-image-video-slider-text-right .fw-text-wrap{
    padding-right: 0;
  }
  .fw-image-video-slider .item .fw-media-wrap .border-media iframe{
    height: 290px;
  }
}

/* Screen 568px */
@media(max-width:767px){
  .fw-image-video-slider .item.fw-image-video-slider-text-left .fw-media-wrap,
  .fw-image-video-slider .item.fw-image-video-slider-text-right .fw-media-wrap {
    margin-bottom: 30px;
    padding: 0 2em !important;
  }
  .fw-image-video-slider .item.fw-image-video-slider-text-left .fw-text-wrap,
  .fw-image-video-slider .item.fw-image-video-slider-text-right .fw-text-wrap{
    margin-bottom: 0;
    padding: 0 2em !important;
  }
  .fw-container .fw-image-video-slider .fw-media-wrap,
  .fw-container .fw-image-video-slider .fw-text-wrap {
    padding: 0 50px;
  }
  .fw-image-video-slider .item{
    padding: 30px 15px;
    height: auto;
  }
  .fw-image-video-slider .fw-text-wrap,
  .fw-image-video-slider .fw-media-wrap{
    width: 100%;
  }
  .fw-image-video-slider .item .fw-media-wrap .border-media iframe{
    width: 100%;
    height: 400px !important;
  }
  .fw-image-video-slider .item .fw-media-wrap .border-media{
    width: 100% !important;
  }
}
/* Screen 320px */
@media(max-width:479px){
  .fw-image-video-slider .item .fw-itable,
  .fw-image-video-slider .item .fw-icell{
    display: block;
  }
  .fw-image-video-slider .item .fw-media-wrap .border-media iframe{
    height: 220px !important;
  }
}