/* Easy Slider */
/* -------------------------------------------------- */
.fw-container-fluid .fw-easy-slider {
  margin-left: -15px;
  margin-right: -15px;
}
.fw-easy-slider {
  position: relative;
  margin-bottom: -1px;
}
.fw-easy-slider .fw-easy-slider-container {
  list-style: none;
  padding: 0;
  margin: 0;
}
/* slider item */
.fw-easy-slider .fw-easy-slider-container .fw-easy-slider-item {
  float: left;
  position: relative;
  max-width: 100%;
}
.fw-easy-slider .fw-easy-slider-container .fw-easy-slider-item img {
  width: 100%;
  height: 100%;
}
.fw-easy-slider .fw-easy-slider-container .fw-easy-slider-item .fw-easy-slider-title {
  visibility: hidden;
  position: absolute;
}
.fw-easy-slider .fw-easy-slider-container .fw-easy-slider-item .fw-block-image-parent {
  margin-bottom: 1px;
}
/* slider caption */
.fw-easy-slider .fw-easy-slider-caption {
  position: absolute;
  left: -3%;
  bottom: 13%;
  z-index: 2;
  width: 57%;
  color: #fff;
}
.fw-easy-slider .fw-easy-slider-caption .fw-easy-slider-caption-inner {
  position: relative;
  width: 100%;
  padding: 40px 80px;
  background-color: <?php echo the_core_hex2rgba($the_core_less_variables['theme-color-1'], 0.9); ?>;
}
.fw-easy-slider .fw-easy-slider-caption .fw-easy-slider-title-clone a {
  display: inline-block;
}
.fw-easy-slider .fw-easy-slider-prev,
.fw-easy-slider .fw-easy-slider-next {
  color: #000;
  font-size: 48px;
  line-height: 1em;
  position: absolute;
  top: 50%;
  margin-top: -24px;
  opacity: 0.3;
  -webkit-transition: all 0.3s ease;
  -o-transition: all 0.3s ease;
  transition: all 0.3s ease;
}
.fw-easy-slider .fw-easy-slider-prev:hover,
.fw-easy-slider .fw-easy-slider-next:hover {
  color: #fff;
}
.fw-easy-slider .fw-easy-slider-prev:active,
.fw-easy-slider .fw-easy-slider-next:active {
  margin-top: -23px;
}
.fw-easy-slider .fw-easy-slider-prev i,
.fw-easy-slider .fw-easy-slider-next i {
  font-style: normal;
}
.fw-easy-slider .fw-easy-slider-prev i:before,
.fw-easy-slider .fw-easy-slider-next i:before {
  font-family: 'FontAwesome';
}
.fw-easy-slider .fw-easy-slider-prev .fw-easy-slider-icon-left:before,
.fw-easy-slider .fw-easy-slider-next .fw-easy-slider-icon-left:before {
  content: '\f104';
}
.fw-easy-slider .fw-easy-slider-prev .fw-easy-slider-icon-right:before,
.fw-easy-slider .fw-easy-slider-next .fw-easy-slider-icon-right:before {
  content: '\f105';
}
.fw-easy-slider .fw-easy-slider-prev {
  left: 30px;
}
.fw-easy-slider .fw-easy-slider-next {
  right: 30px;
}
.fw-easy-slider .fw-easy-slider-pagination {
  position: absolute;
  bottom: 5%;
  left: 4%;
  z-index: 3;
}
.fw-easy-slider .fw-easy-slider-pagination a {
  width: 12px;
  height: 12px;
  font-size: 0;
  margin: 0 5px;
  border-radius: 50%;
  display: inline-block;
  overflow: hidden;
  background-color: rgba(255, 255, 255, 0.3);
}
.fw-easy-slider .fw-easy-slider-pagination a:hover,
.fw-easy-slider .fw-easy-slider-pagination a.selected {
  background-color: rgba(255, 255, 255, 0.7);
}
.fw-easy-slider .fw-easy-slider-progress {
  width: 80%;
  left: 10%;
  position: absolute;
  bottom: 1px;
  background-color: rgba(0, 0, 0, 0.5);
}
.fw-easy-slider .fw-easy-slider-timer {
  background-color: rgba(255, 255, 255, 0.6);
  height: 6px;
}

/* fluid */
.fw-container-fluid .fw-easy-slider .fw-easy-slider-caption {
  left: 0;
}

@media (max-width: 1199px) {
  .fw-easy-slider .fw-easy-slider-caption {
    width: 62%;
  }
  .fw-easy-slider .caption-inner {
    padding: 30px 60px;
  }
}
@media (max-width: 991px) {
  .fw-easy-slider .fw-easy-slider-caption {
    width: 62%;
  }
  .fw-easy-slider .caption-inner {
    padding: 20px 60px;
  }
  .fw-easy-slider .fw-easy-slider-prev {
    left: 4%;
  }
  .fw-easy-slider .fw-easy-slider-next {
    right: 4%;
  }
}

/* Responsive */
/* Screen 768px */
@media(max-width:991px){
  .fw-easy-slider .fw-easy-slider-caption .fw-easy-slider-caption-inner {
    padding: 20px 60px;
  }
}
/* Screen 568px */
@media(max-width:767px){
  .fw-easy-slider .fw-easy-slider-caption .fw-easy-slider-title-clone a {
    font-size: 19px !important;
    letter-spacing: 0 !important;
    line-height: 24px !important;
  }
}
/* Screen 320px */
@media(max-width:479px){
  .fw-easy-slider .fw-easy-slider-caption {
    bottom: 18%;
  }
  .fw-easy-slider .fw-easy-slider-caption .fw-easy-slider-caption-inner {
    padding: 5px 10px;
  }
  .fw-easy-slider .fw-easy-slider-prev,
  .fw-easy-slider .fw-easy-slider-next {
    display: none !important;
  }
}