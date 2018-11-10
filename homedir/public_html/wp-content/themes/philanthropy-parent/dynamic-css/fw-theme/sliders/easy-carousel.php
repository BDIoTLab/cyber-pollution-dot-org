/* Easy Carousel */
/* -------------------------------------------------- */
.fw-easy-carousel {
  position: relative;
  margin: 0;
}
.fw-easy-carousel .caroufredsel_wrapper {
  margin: 0 !important;
}
.fw-easy-carousel ul {
  padding-left: 0;
  list-style: none;
}
.fw-easy-carousel ul li {
  width: 292px;
  display: block;
  float: left;
  text-align: center;
  position: relative;
  margin: 0;
}
.fw-easy-carousel ul li .fw-ratio-container {
  position: static;
}
.fw-easy-carousel .fw-block-image-parent {
  margin-bottom: 0;
}
.fw-easy-carousel .fw-easy-carousel-view-details {
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  opacity: 0;
  background: <?php echo the_core_hex2rgba($the_core_less_variables['theme-color-1'], 0.8); ?>;
  -webkit-transition: all 0.5s;
  -o-transition: all 0.5s;
  transition: all 0.5s;
}
.fw-easy-carousel li:hover .fw-easy-carousel-view-details {
  opacity: 1;
  z-index: 10;
}
.fw-easy-carousel .prev,
.fw-easy-carousel .next {
  position: absolute;
  width: 55px;
  height: 70px;
  line-height: 70px;
  top: 50%;
  margin-top: -35px;
  color: #fff;
  font-size: 28px;
  text-align: center;
  z-index: 11;
  background: rgba(0, 0, 0, 0.35);
  -webkit-transition: all 0.5s;
  -o-transition: all 0.5s;
  transition: all 0.5s;
}
.fw-easy-carousel .prev:hover,
.fw-easy-carousel .next:hover {
  color: <?php echo esc_js($the_core_less_variables['theme-color-1']); ?>;
  background: rgba(0, 0, 0, 0.5);
}
.fw-easy-carousel .prev .fw-easy-carousel-icon-left:before,
.fw-easy-carousel .next .fw-easy-carousel-icon-left:before,
.fw-easy-carousel .prev .fw-easy-carousel-icon-right:before,
.fw-easy-carousel .next .fw-easy-carousel-icon-right:before {
  font-family: 'FontAwesome';
  font-style: normal;
}
.fw-easy-carousel .prev {
  left: 1px;
}
.fw-easy-carousel .prev .fw-easy-carousel-icon-left:before {
  content: '\f104';
}
.fw-easy-carousel .next .fw-easy-carousel-icon-right:before {
  content: '\f105';
}