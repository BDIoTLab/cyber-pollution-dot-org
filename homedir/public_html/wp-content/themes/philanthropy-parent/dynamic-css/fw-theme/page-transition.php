/* Page Animation */
/* -------------------------------------------------- */

.fw-page-transition {
    position: relative;
    opacity: 0;
    -webkit-animation-fill-mode: both;
    -o-animation-fill-mode: both;
    animation-fill-mode: both;
    -webkit-transition-timing-function: linear;
    -o-animation-timing-function: linear;
    transition-timing-function: linear;
    -webkit-animation-delay: 0;
    -o-animation-delay: 0;
    animation-delay: 0;
    -webkit-animation-iteration-count: 1;
    -o-animation-iteration-count: 1;
    animation-iteration-count: 1;
    -webkit-animation-name: initial;
    -o-animation-name: initial;
    animation-name: initial;
    -webkit-animation-duration: 1.5s;
    animation-duration: 1.5s;
    z-index: 10;
}
.fw-page-transition.pageTransitionEnd {
    opacity: 1;
}
.fw-page-transition.fadeInDown,
.fw-page-transition.fadeInUp {

}
.fw-page-transition .fw-col-no-padding .fullwidthbanner-container {
    left: 0 !important;
}
.fw-page-transition .fullwidthbanner-container {
    left: -15px !important
}
/* Page Animation Spinners */
.fw-page-transition-spinner {
    position: fixed;
    left: 50%;
    top: 50%;
    z-index: 9;
}
/* Spinners 1 Rotate Plane */
.fw-page-transition-spinner.fw-spinner-rotate-plane {
    width: 40px;
    height: 40px;
    background-color: <?php echo esc_js($the_core_less_variables['fw-page-transition-spinner-color']); ?>;
    margin: -20px 0 0 -20px;
    -webkit-animation: fw-spinner-rotate-plane 1.2s infinite ease-in-out;
    animation: fw-spinner-rotate-plane 1.2s infinite ease-in-out;
}
@-webkit-keyframes fw-spinner-rotate-plane {
    0% { -webkit-transform: perspective(120px) }
    50% { -webkit-transform: perspective(120px) rotateY(180deg) }
    100% { -webkit-transform: perspective(120px) rotateY(180deg)  rotateX(180deg) }
}
@keyframes fw-spinner-rotate-plane {
    0% {
        transform: perspective(120px) rotateX(0deg) rotateY(0deg);
        -webkit-transform: perspective(120px) rotateX(0deg) rotateY(0deg)
    } 50% {
        transform: perspective(120px) rotateX(-180.1deg) rotateY(0deg);
        -webkit-transform: perspective(120px) rotateX(-180.1deg) rotateY(0deg)
    } 100% {
        transform: perspective(120px) rotateX(-180deg) rotateY(-179.9deg);
        -webkit-transform: perspective(120px) rotateX(-180deg) rotateY(-179.9deg);
    }
}
/* Spinners 2 Double Bounce */
.fw-page-transition-spinner.fw-spinner-double-bounce {
    width: 40px;
    height: 40px;
    margin: -20px 0 0 -20px;
}
.fw-page-transition-spinner.fw-spinner-double-bounce .fw-spinner-double-bounce1,
.fw-page-transition-spinner.fw-spinner-double-bounce .fw-spinner-double-bounce2 {
    width: 100%;
    height: 100%;
    border-radius: 50%;
    background-color: <?php echo esc_js($the_core_less_variables['fw-page-transition-spinner-color']); ?>;
    opacity: 0.6;
    position: absolute;
    top: 0;
    left: 0;
    -webkit-animation: fw-spinner-double-bounce 2.0s infinite ease-in-out;
    animation: fw-spinner-double-bounce 2.0s infinite ease-in-out;
}
.fw-page-transition-spinner.fw-spinner-double-bounce .fw-spinner-double-bounce2 {
    -webkit-animation-delay: -1.0s;
    animation-delay: -1.0s;
}

@-webkit-keyframes fw-spinner-double-bounce {
    0%, 100% { -webkit-transform: scale(0.0) }
    50% { -webkit-transform: scale(1.0) }
}

@keyframes fw-spinner-double-bounce {
    0%, 100% {
        transform: scale(0.0);
        -webkit-transform: scale(0.0);
    } 50% {
        transform: scale(1.0);
        -webkit-transform: scale(1.0);
    }
}
/* Spinners 3 Rect */
.fw-page-transition-spinner.fw-spinner-rect {
    width: 50px;
    height: 40px;
    margin: -20px 0 0 -25px;
    text-align: center;
    font-size: 10px;
}
.fw-page-transition-spinner.fw-spinner-rect > div {
    background-color: <?php echo esc_js($the_core_less_variables['fw-page-transition-spinner-color']); ?>;
    height: 100%;
    width: 6px;
    display: inline-block;
    -webkit-animation: fw-spinner-rect 1.2s infinite ease-in-out;
    animation: fw-spinner-rect 1.2s infinite ease-in-out;
}
.fw-page-transition-spinner.fw-spinner-rect .fw-spinner-rect2 {
    -webkit-animation-delay: -1.1s;
    animation-delay: -1.1s;
}
.fw-page-transition-spinner.fw-spinner-rect .fw-spinner-rect3 {
    -webkit-animation-delay: -1.0s;
    animation-delay: -1.0s;
}
.fw-page-transition-spinner.fw-spinner-rect .fw-spinner-rect4 {
    -webkit-animation-delay: -0.9s;
    animation-delay: -0.9s;
}
.fw-page-transition-spinner.fw-spinner-rect .fw-spinner-rect5 {
    -webkit-animation-delay: -0.8s;
    animation-delay: -0.8s;
}
@-webkit-keyframes fw-spinner-rect {
    0%, 40%, 100% { -webkit-transform: scaleY(0.4) }
    20% { -webkit-transform: scaleY(1.0) }
}
@keyframes fw-spinner-rect {
    0%, 40%, 100% {
        transform: scaleY(0.4);
        -webkit-transform: scaleY(0.4);
    }  20% {
        transform: scaleY(1.0);
        -webkit-transform: scaleY(1.0);
    }
}
/* Spinners 4 Cube Move */
.fw-page-transition-spinner.fw-spinner-cube-move {
    width: 40px;
    height: 40px;
    margin: -20px 0 0 -20px;
}
.fw-page-transition-spinner.fw-spinner-cube-move .fw-spinner-cube-move1,
.fw-page-transition-spinner.fw-spinner-cube-move .fw-spinner-cube-move2 {
    background-color: <?php echo esc_js($the_core_less_variables['fw-page-transition-spinner-color']); ?>;
    width: 15px;
    height: 15px;
    position: absolute;
    top: 0;
    left: 0;
    -webkit-animation: fw-spinner-cube-move 1.8s infinite ease-in-out;
    animation: fw-spinner-cube-move 1.8s infinite ease-in-out;
}
.fw-page-transition-spinner.fw-spinner-cube-move .fw-spinner-cube-move2 {
    -webkit-animation-delay: -0.9s;
    animation-delay: -0.9s;
}
@-webkit-keyframes fw-spinner-cube-move {
    25% { -webkit-transform: translateX(42px) rotate(-90deg) scale(0.5) }
    50% { -webkit-transform: translateX(42px) translateY(42px) rotate(-180deg) }
    75% { -webkit-transform: translateX(0px) translateY(42px) rotate(-270deg) scale(0.5) }
    100% { -webkit-transform: rotate(-360deg) }
}
@keyframes fw-spinner-cube-move {
    25% {
        transform: translateX(42px) rotate(-90deg) scale(0.5);
        -webkit-transform: translateX(42px) rotate(-90deg) scale(0.5);
    } 50% {
        transform: translateX(42px) translateY(42px) rotate(-179deg);
        -webkit-transform: translateX(42px) translateY(42px) rotate(-179deg);
    } 50.1% {
        transform: translateX(42px) translateY(42px) rotate(-180deg);
        -webkit-transform: translateX(42px) translateY(42px) rotate(-180deg);
    } 75% {
        transform: translateX(0px) translateY(42px) rotate(-270deg) scale(0.5);
        -webkit-transform: translateX(0px) translateY(42px) rotate(-270deg) scale(0.5);
    } 100% {
        transform: rotate(-360deg);
        -webkit-transform: rotate(-360deg);
    }
}
/* Spinners 5 Scale Out */
.fw-page-transition-spinner.fw-spinner-scale-out {
    width: 40px;
    height: 40px;
    margin: -20px 0 0 -20px;
    background-color: <?php echo esc_js($the_core_less_variables['fw-page-transition-spinner-color']); ?>;
    border-radius: 100%;
    -webkit-animation: fw-spinner-scale-out 1.0s infinite ease-in-out;
    animation: fw-spinner-scale-out 1.0s infinite ease-in-out;
}
@-webkit-keyframes fw-spinner-scale-out {
    0% { -webkit-transform: scale(0) }
    100% {
        -webkit-transform: scale(1.0);
        opacity: 0;
    }
}
@keyframes fw-spinner-scale-out {
    0% {
        -webkit-transform: scale(0);
        transform: scale(0);
    } 100% {
        -webkit-transform: scale(1.0);
        transform: scale(1.0);
        opacity: 0;
    }
}
/* Spinners 6 Dot Rotate */
.fw-page-transition-spinner.fw-spinner-dot-rotate {
    width: 40px;
    height: 40px;
    margin: -20px 0 0 -20px;
    text-align: center;
    -webkit-animation: fw-spinner-dot-rotate2 2.0s infinite linear;
    animation: fw-spinner-dot-rotate2 2.0s infinite linear;
}
.fw-page-transition-spinner.fw-spinner-dot-rotate .fw-spinner-dot-rotate1,
.fw-page-transition-spinner.fw-spinner-dot-rotate .fw-spinner-dot-rotate2 {
    width: 60%;
    height: 60%;
    display: inline-block;
    position: absolute;
    top: 0;
    background-color: <?php echo esc_js($the_core_less_variables['fw-page-transition-spinner-color']); ?>;
    border-radius: 100%;
    -webkit-animation: fw-spinner-dot-rotate1 2.0s infinite ease-in-out;
    animation: fw-spinner-dot-rotate1 2.0s infinite ease-in-out;
}
.fw-page-transition-spinner.fw-spinner-dot-rotate .fw-spinner-dot-rotate2 {
    top: auto;
    bottom: 0;
    -webkit-animation-delay: -1.0s;
    animation-delay: -1.0s;
}
@-webkit-keyframes fw-spinner-dot-rotate2 { 100% { -webkit-transform: rotate(360deg) }}
@keyframes fw-spinner-dot-rotate2 { 100% { transform: rotate(360deg); -webkit-transform: rotate(360deg) }}
@-webkit-keyframes fw-spinner-dot-rotate1 {
    0%, 100% { -webkit-transform: scale(0.0) }
    50% { -webkit-transform: scale(1.0) }
}
@keyframes fw-spinner-dot-rotate1 {
    0%, 100% {
        transform: scale(0.0);
        -webkit-transform: scale(0.0);
    } 50% {
        transform: scale(1.0);
        -webkit-transform: scale(1.0);
    }
}
/* Spinners 7 Bounce Delay */
.fw-page-transition-spinner.fw-spinner-bounce-delay {
    width: 70px;
    margin: -9px 0 0 -35px;
    text-align: center;
}
.fw-page-transition-spinner.fw-spinner-bounce-delay > div {
    width: 18px;
    height: 18px;
    background-color: <?php echo esc_js($the_core_less_variables['fw-page-transition-spinner-color']); ?>;
    border-radius: 100%;
    display: inline-block;
    -webkit-animation: fw-spinner-bounce-delay 1.4s infinite ease-in-out both;
    animation: fw-spinner-bounce-delay 1.4s infinite ease-in-out both;
}
.fw-page-transition-spinner.fw-spinner-bounce-delay .fw-spinner-bounce-delay1 {
    -webkit-animation-delay: -0.32s;
    animation-delay: -0.32s;
}
.fw-page-transition-spinner.fw-spinner-bounce-delay .fw-spinner-bounce-delay2 {
    -webkit-animation-delay: -0.16s;
    animation-delay: -0.16s;
}
@-webkit-keyframes fw-spinner-bounce-delay {
    0%, 80%, 100% { -webkit-transform: scale(0) }
    40% { -webkit-transform: scale(1.0) }
}
@keyframes fw-spinner-bounce-delay {
    0%, 80%, 100% {
        -webkit-transform: scale(0);
        transform: scale(0);
    } 40% {
        -webkit-transform: scale(1.0);
        transform: scale(1.0);
    }
}
/* Spinners 8 Circle */
.fw-page-transition-spinner.fw-spinner-circle {
    width: 40px;
    height: 40px;
    margin: -20px 0 0 -20px;
}
.fw-page-transition-spinner.fw-spinner-circle > div {
    width: 100%;
    height: 100%;
    position: absolute;
    left: 0;
    top: 0;
}
.fw-page-transition-spinner.fw-spinner-circle > div:before {
    content: '';
    display: block;
    margin: 0 auto;
    width: 15%;
    height: 15%;
    background-color: <?php echo esc_js($the_core_less_variables['fw-page-transition-spinner-color']); ?>;
    border-radius: 100%;
    -webkit-animation: fw-spinner-circle 1.2s infinite ease-in-out both;
    animation: fw-spinner-circle 1.2s infinite ease-in-out both;
}
.fw-page-transition-spinner.fw-spinner-circle .fw-spinner-circle2 {
    -webkit-transform: rotate(30deg);
    -ms-transform: rotate(30deg);
    transform: rotate(30deg);
}
.fw-page-transition-spinner.fw-spinner-circle .fw-spinner-circle3 {
    -webkit-transform: rotate(60deg);
    -ms-transform: rotate(60deg);
    transform: rotate(60deg);
}
.fw-page-transition-spinner.fw-spinner-circle .fw-spinner-circle4 {
    -webkit-transform: rotate(90deg);
    -ms-transform: rotate(90deg);
    transform: rotate(90deg);
}
.fw-page-transition-spinner.fw-spinner-circle .fw-spinner-circle5 {
    -webkit-transform: rotate(120deg);
    -ms-transform: rotate(120deg);
    transform: rotate(120deg);
}
.fw-page-transition-spinner.fw-spinner-circle .fw-spinner-circle6 {
    -webkit-transform: rotate(150deg);
    -ms-transform: rotate(150deg);
    transform: rotate(150deg);
}
.fw-page-transition-spinner.fw-spinner-circle .fw-spinner-circle7 {
    -webkit-transform: rotate(180deg);
    -ms-transform: rotate(180deg);
    transform: rotate(180deg);
}
.fw-page-transition-spinner.fw-spinner-circle .fw-spinner-circle8 {
    -webkit-transform: rotate(210deg);
    -ms-transform: rotate(210deg);
    transform: rotate(210deg);
}
.fw-page-transition-spinner.fw-spinner-circle .fw-spinner-circle9 {
    -webkit-transform: rotate(240deg);
    -ms-transform: rotate(240deg);
    transform: rotate(240deg);
}
.fw-page-transition-spinner.fw-spinner-circle .fw-spinner-circle10 {
    -webkit-transform: rotate(270deg);
    -ms-transform: rotate(270deg);
    transform: rotate(270deg);
}
.fw-page-transition-spinner.fw-spinner-circle .fw-spinner-circle11 {
    -webkit-transform: rotate(300deg);
    -ms-transform: rotate(300deg);
    transform: rotate(300deg);
}
.fw-page-transition-spinner.fw-spinner-circle .fw-spinner-circle12 {
    -webkit-transform: rotate(330deg);
    -ms-transform: rotate(330deg);
    transform: rotate(330deg);
}
.fw-page-transition-spinner.fw-spinner-circle .fw-spinner-circle2:before {
    -webkit-animation-delay: -1.1s;
    animation-delay: -1.1s;
}
.fw-page-transition-spinner.fw-spinner-circle .fw-spinner-circle3:before {
    -webkit-animation-delay: -1s;
    animation-delay: -1s;
}
.fw-page-transition-spinner.fw-spinner-circle .fw-spinner-circle4:before {
    -webkit-animation-delay: -0.9s;
    animation-delay: -0.9s;
}
.fw-page-transition-spinner.fw-spinner-circle .fw-spinner-circle5:before {
    -webkit-animation-delay: -0.8s;
    animation-delay: -0.8s;
}
.fw-page-transition-spinner.fw-spinner-circle .fw-spinner-circle6:before {
    -webkit-animation-delay: -0.7s;
    animation-delay: -0.7s;
}
.fw-page-transition-spinner.fw-spinner-circle .fw-spinner-circle7:before {
    -webkit-animation-delay: -0.6s;
    animation-delay: -0.6s;
}
.fw-page-transition-spinner.fw-spinner-circle .fw-spinner-circle8:before {
    -webkit-animation-delay: -0.5s;
    animation-delay: -0.5s;
}
.fw-page-transition-spinner.fw-spinner-circle .fw-spinner-circle9:before {
    -webkit-animation-delay: -0.4s;
    animation-delay: -0.4s;
}
.fw-page-transition-spinner.fw-spinner-circle .fw-spinner-circle10:before {
    -webkit-animation-delay: -0.3s;
    animation-delay: -0.3s;
}
.fw-page-transition-spinner.fw-spinner-circle .fw-spinner-circle11:before {
    -webkit-animation-delay: -0.2s;
    animation-delay: -0.2s;
}
.fw-page-transition-spinner.fw-spinner-circle .fw-spinner-circle12:before {
    -webkit-animation-delay: -0.1s;
    animation-delay: -0.1s;
}
@-webkit-keyframes fw-spinner-circle {
    0%, 80%, 100% {
        -webkit-transform: scale(0);
        transform: scale(0);
    } 40% {
        -webkit-transform: scale(1);
        transform: scale(1);
    }
}
@keyframes fw-spinner-circle {
    0%, 80%, 100% {
        -webkit-transform: scale(0);
        transform: scale(0);
    } 40% {
        -webkit-transform: scale(1);
        transform: scale(1);
    }
}
/* Spinners 9 Cube Grid */
.fw-page-transition-spinner.fw-spinner-cube-grid {
    width: 40px;
    height: 40px;
    margin: -20px 0 0 -20px;
}
.fw-page-transition-spinner.fw-spinner-cube-grid > div {
    width: 33%;
    height: 33%;
    background-color: <?php echo esc_js($the_core_less_variables['fw-page-transition-spinner-color']); ?>;
    float: left;
    -webkit-animation: fw-spinner-cube-grid 1.3s infinite ease-in-out;
    animation: fw-spinner-cube-grid 1.3s infinite ease-in-out;
}
.fw-page-transition-spinner.fw-spinner-cube-grid .fw-spinner-cube-grid1 {
    -webkit-animation-delay: 0.2s;
    animation-delay: 0.2s;
}
.fw-page-transition-spinner.fw-spinner-cube-grid .fw-spinner-cube-grid2 {
    -webkit-animation-delay: 0.3s;
    animation-delay: 0.3s;
}
.fw-page-transition-spinner.fw-spinner-cube-grid .fw-spinner-cube-grid3 {
    -webkit-animation-delay: 0.4s;
    animation-delay: 0.4s;
}
.fw-page-transition-spinner.fw-spinner-cube-grid .fw-spinner-cube-grid4 {
    -webkit-animation-delay: 0.1s;
    animation-delay: 0.1s;
}
.fw-page-transition-spinner.fw-spinner-cube-grid .fw-spinner-cube-grid5 {
    -webkit-animation-delay: 0.2s;
    animation-delay: 0.2s;
}
.fw-page-transition-spinner.fw-spinner-cube-grid .fw-spinner-cube-grid6 {
    -webkit-animation-delay: 0.3s;
    animation-delay: 0.3s;
}
.fw-page-transition-spinner.fw-spinner-cube-grid .fw-spinner-cube-grid7 {
    -webkit-animation-delay: 0s;
    animation-delay: 0s;
}
.fw-page-transition-spinner.fw-spinner-cube-grid .fw-spinner-cube-grid8 {
    -webkit-animation-delay: 0.1s;
    animation-delay: 0.1s;
}
.fw-page-transition-spinner.fw-spinner-cube-grid .fw-spinner-cube-grid9 {
    -webkit-animation-delay: 0.2s;
    animation-delay: 0.2s;
}
@-webkit-keyframes fw-spinner-cube-grid {
    0%, 70%, 100% {
        -webkit-transform: scale3D(1, 1, 1);
        transform: scale3D(1, 1, 1);
    } 35% {
        -webkit-transform: scale3D(0, 0, 1);
        transform: scale3D(0, 0, 1);
    }
}
@keyframes fw-spinner-cube-grid {
    0%, 70%, 100% {
        -webkit-transform: scale3D(1, 1, 1);
        transform: scale3D(1, 1, 1);
    } 35% {
        -webkit-transform: scale3D(0, 0, 1);
        transform: scale3D(0, 0, 1);
    }
}
/* Spinners 10 Cube */
.fw-page-transition-spinner.fw-spinner-cube {
    margin: -20px 0 0 -20px;
    width: 40px;
    height: 40px;
    -webkit-transform: rotateZ(45deg);
    transform: rotateZ(45deg);
}
.fw-page-transition-spinner.fw-spinner-cube > div {
    float: left;
    width: 50%;
    height: 50%;
    position: relative;
    -webkit-transform: scale(1.1);
    -ms-transform: scale(1.1);
    transform: scale(1.1);
}
.fw-page-transition-spinner.fw-spinner-cube > div:before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: <?php echo esc_js($the_core_less_variables['fw-page-transition-spinner-color']); ?>;
    -webkit-animation: fw-spinner-foldCubeAngle 2.4s infinite linear both;
    animation: fw-spinner-foldCubeAngle 2.4s infinite linear both;
    -webkit-transform-origin: 100% 100%;
    -ms-transform-origin: 100% 100%;
    transform-origin: 100% 100%;
}
.fw-page-transition-spinner.fw-spinner-cube .fw-spinner-cube2 {
    -webkit-transform: scale(1.1) rotateZ(90deg);
    transform: scale(1.1) rotateZ(90deg);
}
.fw-page-transition-spinner.fw-spinner-cube .fw-spinner-cube3 {
    -webkit-transform: scale(1.1) rotateZ(180deg);
    transform: scale(1.1) rotateZ(180deg);
}
.fw-page-transition-spinner.fw-spinner-cube .fw-spinner-cube4 {
    -webkit-transform: scale(1.1) rotateZ(270deg);
    transform: scale(1.1) rotateZ(270deg);
}
.fw-page-transition-spinner.fw-spinner-cube .fw-spinner-cube2:before {
    -webkit-animation-delay: 0.3s;
    animation-delay: 0.3s;
}
.fw-page-transition-spinner.fw-spinner-cube .fw-spinner-cube3:before {
    -webkit-animation-delay: 0.6s;
    animation-delay: 0.6s;
}
.fw-page-transition-spinner.fw-spinner-cube .fw-spinner-cube4:before {
    -webkit-animation-delay: 0.9s;
    animation-delay: 0.9s;
}
@-webkit-keyframes fw-spinner-foldCubeAngle {
    0%, 10% {
        -webkit-transform: perspective(140px) rotateX(-180deg);
        transform: perspective(140px) rotateX(-180deg);
        opacity: 0;
    } 25%, 75% {
        -webkit-transform: perspective(140px) rotateX(0deg);
        transform: perspective(140px) rotateX(0deg);
        opacity: 1;
    } 90%, 100% {
        -webkit-transform: perspective(140px) rotateY(180deg);
        transform: perspective(140px) rotateY(180deg);
        opacity: 0;
    }
}

@keyframes fw-spinner-foldCubeAngle {
    0%, 10% {
        -webkit-transform: perspective(140px) rotateX(-180deg);
        transform: perspective(140px) rotateX(-180deg);
        opacity: 0;
    } 25%, 75% {
        -webkit-transform: perspective(140px) rotateX(0deg);
        transform: perspective(140px) rotateX(0deg);
        opacity: 1;
    } 90%, 100% {
        -webkit-transform: perspective(140px) rotateY(180deg);
        transform: perspective(140px) rotateY(180deg);
        opacity: 0;
    }
}

/*----> Responsive <---- */
/* Screen 1024px */
@media(max-width:1199px){
    .fw-page-transition {
        opacity: 1;
    }
    .fw-page-transition-spinner {
        display: none;
    }
}