/* Lightbox CSS */
.pp_pic_holder.dark_square .pp_nav {
  position: relative;
  margin-top: 8px;
  width: 100%;
  text-align: center;
  font-family: <?php echo ($the_core_less_variables['font-family-2']); ?>;
  line-height: <?php echo esc_js( floatval($the_core_less_variables['font-size-base'] ) ); ?>px;
  line-height: <?php echo esc_js( floatval($the_core_less_variables['font-size-base'] ) + 4 ); ?>px;
}
.pp_pic_holder.dark_square .pp_nav .pp_text_devider {
  display: inline;
  margin: 0 10px;
  color: rgba(255, 255, 255, 0.5);
}
.pp_pic_holder.dark_square .pp_nav .pp_arrow_next,
.pp_pic_holder.dark_square .pp_nav .pp_arrow_previous {
  text-indent: 0;
  width: auto;
  background: none;
  position: relative;
  font-weight: bold;
  font-size: <?php echo esc_js( floatval($the_core_less_variables['font-size-base']) ); ?>px;
  font-size: <?php echo esc_js( floatval($the_core_less_variables['font-size-base'])*0.7 ); ?>px;
  color: rgba(255, 255, 255, 0.5);
}
.pp_pic_holder.dark_square .pp_nav .pp_arrow_next:hover,
.pp_pic_holder.dark_square .pp_nav .pp_arrow_previous:hover {
  color: rgba(255, 255, 255, 0.8);
}
.pp_pic_holder.dark_square .pp_nav a.pp_arrow_previous,
.pp_pic_holder.dark_square .pp_nav a.pp_arrow_next {
  font-family: <?php echo ($the_core_less_variables['font-family-1']); ?>;
}
.pp_pic_holder.dark_square .pp_nav .currentTextHolder {
  color: rgba(255, 255, 255, 0.5);
  font-size: <?php echo esc_js( floatval($the_core_less_variables['font-size-base']) - 1 ); ?>px;
}
.pp_pic_holder.dark_square a.pp_close {
  opacity: 1;
  color: rgba(255, 255, 255, 0.5);
}
.pp_pic_holder.dark_square a.pp_close:hover {
  color: rgba(255, 255, 255, 0.8);
}

.pp_pic_holder.dark_square .pp_nav .pp_play {
  display: none;
}
.pp_pic_holder.dark_square .pp_nav .pp_arrow_previous:before,
.pp_pic_holder.dark_square .pp_nav .pp_arrow_next:after {
  font-size: 20px;
  font-family: 'FontAwesome';
  font-weight: bold;
  line-height: 20px;
  vertical-align: top;
}
.pp_pic_holder.dark_square .pp_nav .pp_arrow_previous:before {
  content: '\f104';
  margin-right: 10px;
}
.pp_pic_holder.dark_square .pp_nav .pp_arrow_next:after {
  content: '\f105';
  margin-left: 10px;
}
.pp_pic_holder.dark_square .pp_nav a.pp_arrow_previous,
.pp_pic_holder.dark_square .pp_nav a.pp_arrow_next {
  height: auto;
  overflow: visible;
  vertical-align: top;
  display: inline;
  float: none;
}
.pp_pic_holder.dark_square .pp_nav a.pp_arrow_previous {
  margin-right: 50px;
}
.pp_pic_holder.dark_square .pp_nav a.pp_arrow_next {
  margin-left: 50px;
}
.pp_pic_holder.dark_square .pp_nav .currentTextHolder {
  font-weight: bold;
  display: inline;
  float: none;
}
.pp_pic_holder.dark_square a.pp_previous,
.pp_pic_holder.dark_square a.pp_next {
  display: none;
}
.pp_pic_holder.dark_square a.pp_close {
  width: 23px;
  top: 25px;
  right: 30px;
  opacity: 0.5;
  z-index: 2;
  background: none;
}
.pp_pic_holder.dark_square a.pp_close.fa-times:before {
  text-indent: 0;
  position: absolute;
  right: 0;
  font-size: 23px;
}
.pp_pic_holder.dark_square .pp_content_container .pp_left {
  padding-left: 60px;
  overflow: hidden;
}
.pp_pic_holder.dark_square .pp_top {
  height: 80px;
}
.pp_pic_holder.dark_square .pp_top .pp_left,
.pp_pic_holder.dark_square .pp_top .pp_middle,
.pp_pic_holder.dark_square .pp_top .pp_right {
  height: 80px;
}
.pp_pic_holder.dark_square .pp_bottom {
  height: 20px;
}
.pp_pic_holder.dark_square .pp_bottom .pp_left,
.pp_pic_holder.dark_square .pp_bottom .pp_middle,
.pp_pic_holder.dark_square .pp_bottom .pp_right {
  height: 50px;
}
.pp_pic_holder.dark_square a.pp_expand,
.pp_pic_holder.dark_square a.pp_contract {
  right: 110px;
}
.pp_pic_holder.dark_square .pp_details .pp_description {
  margin: 0;
  display: inline-block !important;
  position: absolute;
  left: 0;
  top: -16px;
}
.pp_pic_holder.dark_square .ppt {
  display: none !important;
}

/*----> Responsive <---- */
/* Screen 768px */
@media(max-width:991px){
  .pp_pic_holder.dark_square .pp_expand {
    display: none !important;
  }
}

/* Screen 568px */
@media (max-width: 767px) {
  .pp_pic_holder.dark_square {
    width: 100% !important;
    height: 100% !important;
    top: 0 !important;
    left: 0 !important;
    position: fixed;
    background: #000;
    display: -webkit-flex;
    display: flex;
    -webkit-flex-flow: row wrap;
    flex-flow: row wrap;
  }
  .pp_pic_holder.dark_square .pp_top {
    align-self: flex-start;
  }
  .pp_pic_holder.dark_square .pp_content_container {
    align-self: flex-start;
  }
  .pp_pic_holder.dark_square a.pp_close {
    top: 15px;
    right: 15px;
  }
  .pp_pic_holder.dark_square .pp_content_container .pp_left {
    padding-left: 30px;
  }
  .pp_pic_holder.dark_square .pp_content_container .pp_right {
    padding-right: 30px;
  }
  .pp_pic_holder.dark_square .pp_content_container .pp_content,
  .pp_pic_holder.dark_square .pp_content_container .pp_hoverContainer {
    width: 100% !important;
    height: 250px !important;
  }
  .pp_pic_holder.dark_square .pp_content_container #pp_full_res {
    text-align: center;
  }

  .pp_pic_holder.dark_square .pp_content_container #pp_full_res iframe {
    width: 100%;
    height: 230px;
    position: relative;
    top: 1px;
  }
  .pp_pic_holder.dark_square .pp_content_container #pp_full_res img {
    width: auto !important;
    height: auto !important;
    max-height: 200px !important;
  }
  .pp_pic_holder.dark_square .pp_content_container .pp_nav a.pp_arrow_previous {
    margin-right: 35px;
  }
  .pp_pic_holder.dark_square .pp_content_container .pp_nav a.pp_arrow_next {
    margin-left: 35px;
  }
  .pp_pic_holder.dark_square .pp_details {
    width: 100% !important;
    margin-bottom: 10px;
    z-index: 2001;
  }
  .pp_pic_holder.dark_square .pp_top,
  .pp_pic_holder.dark_square .pp_top .pp_left,
  .pp_pic_holder.dark_square .pp_top .pp_middle,
  .pp_pic_holder.dark_square .pp_top .pp_right {
    width: 100%;
    height: 50px;
  }
  .pp_pic_holder.dark_square .pp_bottom,
  .pp_pic_holder.dark_square .pp_bottom .pp_left,
  .pp_pic_holder.dark_square .pp_bottom .pp_middle,
  .pp_pic_holder.dark_square .pp_bottom .pp_right {
    height: 15px;
  }
}

/* Screen 320px */
@media (max-width: 479px) {
  .pp_pic_holder.dark_square .pp_content_container .pp_left {
    padding-left: 20px;
  }
  .pp_pic_holder.dark_square .pp_content_container .pp_right {
    padding-right: 20px;
  }
  .pp_pic_holder.dark_square .pp_content_container .pp_content,
  .pp_pic_holder.dark_square .pp_content_container .pp_hoverContainer {
    height: auto !important;
    max-height: 400px !important;
  }
  .pp_pic_holder.dark_square .pp_content_container #pp_full_res iframe {
    top: 0;
    height: 200px;
  }
  .pp_pic_holder.dark_square .pp_content_container #pp_full_res img {
    max-height: 400px !important;
  }
}