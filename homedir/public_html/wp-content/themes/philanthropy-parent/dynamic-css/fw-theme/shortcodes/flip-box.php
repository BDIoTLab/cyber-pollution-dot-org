/* Flip Box */
/* -------------------------------------------------- */

.fw-flip-box {
    -webkit-transform: perspective(1000px);
    transform: perspective(1000px);
    -webkit-transform-style: preserve-3d;
    transform-style: preserve-3d;
    overflow: hidden;
}
.fw-flip-box .fw-flip-box-wrap {
    width: 200%;
    height: 100%;
    -webkit-transform: perspective(1000px);
    transform: perspective(1000px);
    -webkit-transform-style: preserve-3d;
    transform-style: preserve-3d;
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;
    -webkit-align-items: stretch;
    -ms-flex-align: stretch;
    -ms-grid-row-align: stretch;
    align-items: stretch;
    -webkit-transform: translateX(-50%);
    transform: translateX(-50%);
    pointer-events: none;
}
.fw-flip-box .fw-flip-box-front,
.fw-flip-box .fw-flip-box-back {
    width: 100%;
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;
    -webkit-align-items: center;
    -ms-flex-align: center;
    -ms-grid-row-align: center;
    align-items: center;
    -webkit-transform-origin: center;
    -ms-transform-origin: center;
    transform-origin: center;
    -webkit-backface-visibility: hidden;
    backface-visibility: hidden;
    transition: all .5s cubic-bezier(.645,.045,.355,1);
}
.fw-flip-box .fw-flip-box-content {
    width: 100%;
    padding: 10px;
    z-index: 3;
}
.fw-flip-box .fw-flip-box-content .fw-flip-box-title {
    margin-top: 0;
}
.fw-flip-box .fw-flip-box-content >* {
    margin-bottom: 10px;
}
.fw-flip-box .fw-flip-box-content > div:last-child {
    margin-bottom: 0;
}
.fw-flip-box .fw-flip-box-front {
    -webkit-transform: translateX(100%);
    transform: translateX(100%);
    background-color: <?php echo esc_js($the_core_less_variables['theme-color-1']); ?>;
    background-image: none;
    background-repeat: no-repeat;
}
.fw-flip-box .fw-flip-box-back {
    pointer-events: auto;
    background-color: <?php echo esc_js($the_core_less_variables['theme-color-2']); ?>;
    background-image: none;
    background-repeat: no-repeat;
}

/* Content Align */
 /*-> Align Left */
.fw-flip-box.fw-flip-box-content-align-left .fw-flip-box-content {
    text-align: left;
}
.fw-flip-box.fw-flip-box-content-align-left .fw-flip-box-content .fw-flip-box-icon {
    margin-left: 0;
}
 /*-> Align Center */
.fw-flip-box.fw-flip-box-content-align-center .fw-flip-box-content {
    text-align: center;
}
.fw-flip-box.fw-flip-box-content-align-center .fw-flip-box-content .fw-flip-box-icon {
    margin-left: auto;
    margin-right: auto;
}
 /*-> Align Right */
.fw-flip-box.fw-flip-box-content-align-right .fw-flip-box-content {
    text-align: right;
}
.fw-flip-box.fw-flip-box-content-align-right .fw-flip-box-content .fw-flip-box-icon {
    margin-right: 0;
}

/* Animation Type */
 /*-> Horizontal */
.fw-flip-box.fw-flip-box-horizontal-flip {
    overflow: visible;
}
.fw-flip-box.fw-flip-box-horizontal-flip:hover .fw-flip-box-front {
    -webkit-transform: translateX(100%) rotateY(-180deg);
    transform: translateX(100%) rotateY(-180deg);
}
.fw-flip-box.fw-flip-box-horizontal-flip .fw-flip-box-back {
    -webkit-transform: rotateY(180deg);
    transform: rotateY(180deg);
}
.fw-flip-box.fw-flip-box-horizontal-flip:hover .fw-flip-box-back {
    -webkit-transform: rotateY(0);
    transform: rotateY(0);
}
 /*-> Vertical */
.fw-flip-box.fw-flip-box-vertical-flip {
    overflow: visible;
}
.fw-flip-box.fw-flip-box-vertical-flip:hover .fw-flip-box-front {
    -webkit-transform: translateX(100%) rotateX(-180deg);
    transform: translateX(100%) rotateX(-180deg);
}
.fw-flip-box.fw-flip-box-vertical-flip .fw-flip-box-back {
    -webkit-transform: rotateX(180deg);
    transform: rotateX(180deg);
}
.fw-flip-box.fw-flip-box-vertical-flip:hover .fw-flip-box-back {
    -webkit-transform: rotateX(0);
    transform: rotateX(0);
}
 /*-> Slide In Down */
.fw-flip-box.fw-flip-box-slide-down-flip .fw-flip-box-back {
    -webkit-transform: translateY(-101%);
    transform: translateY(-101%);
}
.fw-flip-box.fw-flip-box-slide-down-flip:hover .fw-flip-box-back {
    -webkit-transform: translateY(0);
    transform: translateY(0);
}
 /*-> Slide In Up */
.fw-flip-box.fw-flip-box-slide-up-flip .fw-flip-box-back {
    -webkit-transform: translateY(101%);
    transform: translateY(101%);
}
.fw-flip-box.fw-flip-box-slide-up-flip:hover .fw-flip-box-back {
    -webkit-transform: translateY(0);
    transform: translateY(0);
}
 /*-> Slide In Left */
.fw-flip-box.fw-flip-box-slide-left-flip .fw-flip-box-back {
    -webkit-transform: translateX(-101%);
    transform: translateX(-101%);
}
.fw-flip-box.fw-flip-box-slide-left-flip:hover .fw-flip-box-back {
    -webkit-transform: translateX(0);
    transform: translateX(0);
}
 /*-> Slide In Right */
.fw-flip-box.fw-flip-box-slide-right-flip .fw-flip-box-back {
    -webkit-transform: translateX(101%);
    transform: translateX(101%);
}
.fw-flip-box.fw-flip-box-slide-right-flip:hover .fw-flip-box-back {
    -webkit-transform: translateX(0);
    transform: translateX(0);
}
 /*-> Slide Fade */
.fw-flip-box.fw-flip-box-fade-flip .fw-flip-box-front {
    z-index: 5;
}
.fw-flip-box.fw-flip-box-fade-flip .fw-flip-box-back {
    opacity: 0;
    z-index: 6;
}
.fw-flip-box.fw-flip-box-fade-flip:hover .fw-flip-box-back {
    opacity: 1;
}