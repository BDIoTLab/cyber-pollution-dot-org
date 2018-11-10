/* Reload Slider */
/* -------------------------------------------------- */
.fw-reload-slider ul {
  padding: 0;
  margin: 0;
  list-style: none;
}
.fw-reload-slider ul li {
  width: 1170px;
  display: table;
}
.fw-reload-slider ul li .fw-reload-slider-image-wrap {
  width: 42%;
  height: 100%;
  padding-left: 90px;
  background-size: cover;
  background-position: top center;
}
.fw-reload-slider-image-wrap .fw-reload-slider-image{
  margin-right: -60px;
}
.fw-reload-slider ul li .fw-reload-slider-content {
  width: 58%;
  padding-right: 60px;
  padding-left: 135px;
}
.fw-reload-slider ul li .fw-reload-slider-image-wrap,
.fw-reload-slider ul li .fw-reload-slider-content {
  display: table-cell;
  vertical-align: middle;
  padding-top: 80px;
  padding-bottom: 80px;
}
.fw-reload-slider ul li .fw-reload-slider-content .fw-reload-slider-title {
  margin-top: 0;
  margin-bottom: 15px;
  line-height: normal;
}
.fw-reload-slider ul li .fw-reload-slider-content .fw-reload-slider-subtitle {
  font-family: <?php echo ($the_core_less_variables['subtitles-family']); ?>;
  font-weight: <?php echo esc_js($the_core_less_variables['subtitles-weight']); ?>;
  font-style: <?php echo esc_js($the_core_less_variables['subtitles-style']); ?>;
  font-size: <?php echo esc_js($the_core_less_variables['subtitles-size']); ?>;
  line-height: <?php echo esc_js($the_core_less_variables['subtitles-line-height']); ?>;
  color: <?php echo esc_js($the_core_less_variables['subtitles-color']); ?>;
  letter-spacing: <?php echo esc_js($the_core_less_variables['subtitles-letter-spacing']); ?>;
  margin-top: 0;
  margin-bottom: 35px;
}
.fw-reload-slider ul li .fw-reload-slider-content .fw-reload-slider-subtitle span {
  font-style: italic;
}
.fw-reload-slider-content .fw-btn {
  margin-top: 25px;
}
/* Reload Slider Control */
.fw-reload-slider .fw-reload-slider-controls {
  position: absolute;
  bottom: 5%;
  left: 50%;
  line-height: normal;
}
.fw-reload-slider .fw-reload-slider-controls a {
  width: 12px;
  height: 12px;
  background-color: <?php echo esc_js($the_core_less_variables['text-color']); ?>;
  opacity: 0.1;
  display: inline-block;
  margin-right: 12px;
  border-radius: 50%;
  vertical-align: middle;
}
.fw-reload-slider .fw-reload-slider-controls a.selected,
.fw-reload-slider .fw-reload-slider-controls a:hover {
  width: 12px;
  height: 12px;
  background-color: <?php echo esc_js($the_core_less_variables['text-color']); ?>;
  opacity: 0.3;
  border-color: transparent;
  margin-right: 12px;
}
.fw-reload-slider .fw-reload-slider-controls a span {
  display: none;
}

/* Responsive */
/* Screen 1199px */
@media(max-width:1199px){
  .fw-reload-slider ul{
    left: 0 !important;
  }
  .fw-reload-slider ul li {
    width: 940px;
  }
}
/* Screen 768px tablet portrait */
@media(max-width:991px){
  .fw-reload-slider{
    margin-left: auto;
  }
  .fw-reload-slider ul li {
    width: 768px;
  }
  .fw-reload-slider ul li .fw-reload-slider-image-wrap {
    padding-left: 55px;
  }
  .fw-reload-slider ul li .fw-reload-slider-content {
    padding-right: 55px;
    padding-left: 80px;
  }
  .fw-reload-slider ul li .fw-reload-slider-image-wrap,
  .fw-reload-slider ul li .fw-reload-slider-content {
    padding-top: 40px;
    padding-bottom: 40px;
  }
  .fw-reload-slider-image-wrap .fw-reload-slider-image{
    margin-right: -35px;
  }
  .fw-reload-slider ul li .fw-reload-slider-content .fw-reload-slider-subtitle{
    margin-bottom: 20px;
  }
}

/* Screen 568px */
@media(max-width:767px){
  .fw-reload-slider ul li {
    width: 568px;
  }
  .fw-reload-slider ul li .fw-reload-slider-image-wrap {
    padding-left: 30px;
  }
  .fw-reload-slider ul li .fw-reload-slider-content {
    padding-right: 30px;
    padding-left: 60px;
  }
  .fw-reload-slider ul li .fw-reload-slider-image-wrap,
  .fw-reload-slider ul li .fw-reload-slider-content {
    padding-top: 20px;
    padding-bottom: 20px;
  }
  .fw-reload-slider-image-wrap .fw-reload-slider-image {
    margin-right: -25px;
  }
}

/* Screen 320px */
@media(max-width:479px){
  .fw-reload-slider ul li {
    width: 320px;
    padding-bottom: 50px;
  }
  .fw-reload-slider ul li .fw-reload-slider-image-wrap {
    padding: 40px;
    height: auto;
    display: block;
    width: 100%;
  }
  .fw-reload-slider ul li .fw-reload-slider-content {
    padding: 40px;
    display: block;
    width: 100%;
  }
  .fw-reload-slider-image-wrap .fw-reload-slider-image{
    margin-right: 0;
  }
}