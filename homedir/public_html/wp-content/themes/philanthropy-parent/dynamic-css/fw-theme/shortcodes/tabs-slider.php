/* Tabs Slider */
/* -------------------------------------------------- */

.fw-tabs-slider .fw-tabs-slider-content-wrap .owl-item {
    background-color: #cccccc;
    position: relative;
}
.fw-tabs-slider .fw-tabs-slider-content-wrap .fw-tabs-slider-media,
.fw-tabs-slider .fw-tabs-slider-content-wrap .fw-tabs-slider-content {
    display: block;
    width: 50%;
    float: left;
    height: 100%;
    max-height: 100%;
}
.fw-tabs-slider .fw-tabs-slider-content-wrap .fw-tabs-slider-media-right .fw-tabs-slider-media {
    float: right
}
.fw-tabs-slider .fw-tabs-slider-content-wrap .fw-tabs-slider-content {
    padding: 0 50px;
    position: absolute;
    overflow-y: auto;
}
.fw-tabs-slider .fw-tabs-slider-content-wrap .fw-tabs-slider-content .fw-tabs-slider-content-inner-wrap,
.fw-tabs-slider .fw-tabs-slider-content-wrap .fw-tabs-slider-content .fw-tabs-slider-content-inner {
    display: block;
}
.fw-tabs-slider .fw-tabs-slider-content-wrap .fw-tabs-slider-media-right .fw-tabs-slider-content {
    left: 0;
}
.fw-tabs-slider .fw-tabs-slider-content-wrap .fw-tabs-slider-media-left .fw-tabs-slider-content {
    right: 0
}
/* Content Horizontal Align */
.fw-tabs-slider .fw-tabs-slider-content-wrap .fw-tabs-slider-content.fw-tabs-slider-content-align .fw-tabs-slider-content-inner-wrap {
    display: table;
    height: 100%;
    width: 100%;
}
.fw-tabs-slider .fw-tabs-slider-content-wrap .fw-tabs-slider-content.fw-tabs-slider-content-align .fw-tabs-slider-content-inner {
    display: table-cell;
    vertical-align: middle;
}
/* Content Align */
.fw-tabs-slider .fw-tabs-slider-content-wrap .fw-tabs-slider-content.fw-tabs-slider-content-align-left {
    text-align: left;
}
.fw-tabs-slider .fw-tabs-slider-content-wrap .fw-tabs-slider-content.fw-tabs-slider-content-align-center {
    text-align: center;
}
.fw-tabs-slider .fw-tabs-slider-content-wrap .fw-tabs-slider-content.fw-tabs-slider-content-align-right {
    text-align: right;
}
/* Divide Align & Color */
.fw-tabs-slider .fw-tabs-slider-content-wrap .fw-tabs-slider-content .fw-divider {
    border-color: <?php echo esc_js($the_core_less_variables['fw-h3-color']); ?>;
}
.fw-tabs-slider .fw-tabs-slider-content-wrap .fw-tabs-slider-content.fw-tabs-slider-content-align-left .fw-divider {
    margin-left: 0;
}
.fw-tabs-slider .fw-tabs-slider-content-wrap .fw-tabs-slider-content.fw-tabs-slider-content-align-center .fw-divider {
    margin-left: auto;
    margin-right: auto;
}
.fw-tabs-slider .fw-tabs-slider-content-wrap .fw-tabs-slider-content.fw-tabs-slider-content-align-right .fw-divider {
    margin-right: 0;
}
.fw-tabs-slider .fw-tabs-slider-content-wrap .fw-tabs-slider-content .fw-btn {
    margin-top: 20px;
}
/* Title */
.fw-tabs-slider .fw-tabs-slider-content-wrap .fw-tabs-slider-content .fw-tabs-slider-title {
    position: relative;
    margin-top: 0;
    margin-bottom: 0;
}

/* Tabs Slider Social */
.fw-tabs-slider .fw-tabs-slider-content-wrap .fw-tabs-slider-social {
    position: absolute;
    bottom: 50px;
    right: 50px;
    list-style: none;
    padding: 0;
    margin: 0;
}
.fw-tabs-slider .fw-tabs-slider-content-wrap .fw-tabs-slider-social li {
    display: inline-block;
    margin-left: 10px;
}
.fw-tabs-slider .fw-tabs-slider-content-wrap .fw-tabs-slider-social li:first-child {
    margin-left: 0;
}

/* Tabs Slider Nav */
.fw-tabs-slider .fw-tabs-slider-nav {
    position: relative;
    bottom: auto;
    left: auto;
    margin: 0 auto 30px;
    width: 100%;
    padding: 0;
}
.fw-tabs-slider .fw-tabs-slider-nav li {
    font-size: <?php echo esc_js( floatval( $the_core_less_variables['font-size-base'] ) )*1.3.'px'; ?>;
    width: auto;
    height: auto;
    border: none;
    text-indent: 0;
    background-color: transparent;
    border-radius: 0;
    margin: 0 10px;
    -webkit-transition: all 0.1s ease;
    -o-transition: all 0.1s ease;
    transition: all 0.1s ease;
}
.fw-tabs-slider .fw-tabs-slider-nav li.owl-dot span {
    width: auto;
    height: auto;
    margin: 0;
    display: inline-block;
    background-color: transparent;
}
.fw-tabs-slider.owl-carousel .owl-dots.fw-tabs-slider-nav li.active span,
.fw-tabs-slider.owl-carousel .owl-dots.fw-tabs-slider-nav li:hover span {
    background-color: transparent;
}

.fw-tabs-slider .fw-tabs-slider-nav li.active,
.fw-tabs-slider .fw-tabs-slider-nav li:hover {
    color: <?php echo esc_js($the_core_less_variables['theme-color-1']); ?>;
}
.fw-tabs-slider .fw-tabs-slider-nav li i {
    margin-right: 5px;
    font-size: <?php echo esc_js( floatval( $the_core_less_variables['font-size-base'] ) )*1.3.'px'; ?>;
}
.fw-tabs-slider .fw-tabs-slider-nav li img {
    width: <?php echo esc_js( floatval( $the_core_less_variables['font-size-base'] ) )*1.3.'px'; ?>;
    height: <?php echo esc_js( floatval( $the_core_less_variables['font-size-base'] ) )*1.3.'px'; ?>;
}
/*-> Tabs Slider Nav Align  */
.fw-tabs-slider .fw-tabs-slider-nav {
    padding: 0 15px;
}
.fw-tabs-slider .fw-tabs-slider-nav.fw-tabs-slider-nav-left {
    text-align: left;
}
.fw-tabs-slider .fw-tabs-slider-nav.fw-tabs-slider-nav-center {
    text-align: center;
}
.fw-tabs-slider .fw-tabs-slider-nav.fw-tabs-slider-nav-right {
    text-align: right;
}
/*----> Responsive <---- */
/* Screen 740px */
@media(max-width:767px){
    .fw-tabs-slider .fw-tabs-slider-content-wrap .fw-tabs-slider-content {
        padding: 25px !important;
    }
}
/* Screen 568px */
@media(max-width:600px){
    .fw-tabs-slider .fw-tabs-slider-content-wrap .fw-tabs-slider-media,
    .fw-tabs-slider .fw-tabs-slider-content-wrap .fw-tabs-slider-content {
        width: 100%;
    }
    .fw-tabs-slider .fw-tabs-slider-content-wrap .fw-tabs-slider-content {
        position: relative;
    }
}
/* Screen 320px */
@media(max-width:479px){
    .fw-tabs-slider .fw-tabs-slider-content-wrap .fw-tabs-slider-content {

    }
}