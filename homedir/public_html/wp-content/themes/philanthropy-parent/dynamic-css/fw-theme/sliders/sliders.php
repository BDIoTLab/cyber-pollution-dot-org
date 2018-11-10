/* Slider Layout */
/* -------------------------------------------------- */

/*Fade Effect on Fade Slider*/
.fade-effect .item {
  opacity: 0;
  -webkit-transition: opacity 0.7s ease-in-out;
  -o-transition: opacity 0.7s ease-in-out;
  transition: opacity 0.7s ease-in-out;
}
.fade-effect .item.active {
  opacity: 1;
}
.fade-effect .active.left,
.fade-effect .active.right {
  left: 0;
  z-index: 2;
  opacity: 0;
}
/*Shot Effect on Fade Slider*/
.shot-effect .item {
  top: 0;
  left: 0 !important;
  -webkit-transition: top 0.9s cubic-bezier(0.95, 0.1, 0.25, 1);
  -o-transition: top 0.9s cubic-bezier(0.95, 0.1, 0.25, 1);
  transition: top 0.9s cubic-bezier(0.95, 0.1, 0.25, 1);
}
.shot-effect .item.prev {top: 100%; z-index: 3;}
.shot-effect .item.next {top: -100%; z-index: 3;}

.shot-effect .item.prev.left,
.shot-effect .item.prev.right,
.shot-effect .item.next.left,
.shot-effect .item.next.right {
  top: 0;
}
/*Loading Spinner*/
.spinner .wBall .wInnerBall{
  background: <?php echo esc_js($the_core_less_variables['theme-color-3']); ?>;
}
/* Revolution Slider */
/* -------------------------------------------------- */
.fw-side-boxed .rev_slider_wrapper,
.widget_revslider .rev_slider_wrapper {
  max-width: 100%;
  left: auto !important;
}

/*----> Responsive <---- */
/* Screen 1024px */
@media(max-width:1199px){
  .rev_slider_wrapper {
    left: 0 !important;
  }
}

/*Loading Spinner*/
.spinner {
  width: 32px;
  height:32px;
  position: absolute;
  top: 50%;
  left: 50%;
  z-index: 3;
  margin-top: -25px;
  margin-left: -25px;
}
.spinner .wBall {
  position: absolute;
  width: 30px;
  height: 30px;
  opacity: 0;
  -moz-transform: rotate(225deg);
  -moz-animation: orbit 4.4s infinite;
  -webkit-transform: rotate(225deg);
  -webkit-animation: orbit 4.4s infinite;
  -ms-transform: rotate(225deg);
  -ms-animation: orbit 4.4s infinite;
  -o-transform: rotate(225deg);
  -o-animation: orbit 4.4s infinite;
  transform: rotate(225deg);
  animation: orbit 4.4s infinite;
}
.spinner .wBall .wInnerBall{
  position: absolute;
  width: 4px;
  height: 4px;
  left:0;
  top:0;
  -moz-border-radius: 4px;
  -webkit-border-radius: 4px;
  -ms-border-radius: 4px;
  -o-border-radius: 4px;
  border-radius: 4px;
}
.spinner #wBall_1 {
  -moz-animation-delay: 0.96s;
  -webkit-animation-delay: 0.96s;
  -ms-animation-delay: 0.96s;
  -o-animation-delay: 0.96s;
  animation-delay: 0.96s;
}
.spinner #wBall_2 {
  -moz-animation-delay: 0.19s;
  -webkit-animation-delay: 0.19s;
  -ms-animation-delay: 0.19s;
  -o-animation-delay: 0.19s;
  animation-delay: 0.19s;
}
.spinner #wBall_3 {
  -moz-animation-delay: 0.38s;
  -webkit-animation-delay: 0.38s;
  -ms-animation-delay: 0.38s;
  -o-animation-delay: 0.38s;
  animation-delay: 0.38s;
}
.spinner #wBall_4 {
  -moz-animation-delay: 0.58s;
  -webkit-animation-delay: 0.58s;
  -ms-animation-delay: 0.58s;
  -o-animation-delay: 0.58s;
  animation-delay: 0.58s;
}
.spinner #wBall_5 {
  -moz-animation-delay: 0.77s;
  -webkit-animation-delay: 0.77s;
  -ms-animation-delay: 0.77s;
  -o-animation-delay: 0.77s;
  animation-delay: 0.77s;
}

@-moz-keyframes orbit {
  0% {
    opacity: 1;
    z-index:99;
    -moz-transform: rotate(180deg);
    -moz-animation-timing-function: ease-out;
  }
  7% {
    opacity: 1;
    -moz-transform: rotate(300deg);
    -moz-animation-timing-function: linear;
    -moz-origin:0%;
  }
  30% {
    opacity: 1;
    -moz-transform:rotate(410deg);
    -moz-animation-timing-function: ease-in-out;
    -moz-origin:7%;
  }
  39% {
    opacity: 1;
    -moz-transform: rotate(645deg);
    -moz-animation-timing-function: linear;
    -moz-origin:30%;
  }
  70% {
    opacity: 1;
    -moz-transform: rotate(770deg);
    -moz-animation-timing-function: ease-out;
    -moz-origin:39%;
  }
  75% {
    opacity: 1;
    -moz-transform: rotate(900deg);
    -moz-animation-timing-function: ease-out;
    -moz-origin:70%;
  }
  76% {
    opacity: 0;
    -moz-transform:rotate(900deg);
  }
  100% {
    opacity: 0;
    -moz-transform: rotate(900deg);
  }
}

@-webkit-keyframes orbit {
  0% {
    opacity: 1;
    z-index:99;
    -webkit-transform: rotate(180deg);
    -webkit-animation-timing-function: ease-out;
  }
  7% {
    opacity: 1;
    -webkit-transform: rotate(300deg);
    -webkit-animation-timing-function: linear;
    -webkit-origin:0%;
  }
  30% {
    opacity: 1;
    -webkit-transform:rotate(410deg);
    -webkit-animation-timing-function: ease-in-out;
    -webkit-origin:7%;
  }
  39% {
    opacity: 1;
    -webkit-transform: rotate(645deg);
    -webkit-animation-timing-function: linear;
    -webkit-origin:30%;
  }
  70% {
    opacity: 1;
    -webkit-transform: rotate(770deg);
    -webkit-animation-timing-function: ease-out;
    -webkit-origin:39%;
  }
  75% {
    opacity: 1;
    -webkit-transform: rotate(900deg);
    -webkit-animation-timing-function: ease-out;
    -webkit-origin:70%;
  }
  76% {
    opacity: 0;
    -webkit-transform:rotate(900deg);
  }
  100% {
    opacity: 0;
    -webkit-transform: rotate(900deg);
  }
}

@-ms-keyframes orbit {
  0% {
    opacity: 1;
    z-index:99;
    -ms-transform: rotate(180deg);
    -ms-animation-timing-function: ease-out;
  }
  7% {
    opacity: 1;
    -ms-transform: rotate(300deg);
    -ms-animation-timing-function: linear;
    -ms-origin:0%;
  }
  30% {
    opacity: 1;
    -ms-transform:rotate(410deg);
    -ms-animation-timing-function: ease-in-out;
    -ms-origin:7%;
  }
  39% {
    opacity: 1;
    -ms-transform: rotate(645deg);
    -ms-animation-timing-function: linear;
    -ms-origin:30%;
  }
  70% {
    opacity: 1;
    -ms-transform: rotate(770deg);
    -ms-animation-timing-function: ease-out;
    -ms-origin:39%;
  }
  75% {
    opacity: 1;
    -ms-transform: rotate(900deg);
    -ms-animation-timing-function: ease-out;
    -ms-origin:70%;
  }
  76% {
    opacity: 0;
    -ms-transform:rotate(900deg);
  }
  100% {
    opacity: 0;
    -ms-transform: rotate(900deg);
  }
}

@-o-keyframes orbit {
  0% {
    opacity: 1;
    z-index:99;
    -o-transform: rotate(180deg);
    -o-animation-timing-function: ease-out;
  }
  7% {
    opacity: 1;
    -o-transform: rotate(300deg);
    -o-animation-timing-function: linear;
    -o-origin:0%;
  }
  30% {
    opacity: 1;
    -o-transform:rotate(410deg);
    -o-animation-timing-function: ease-in-out;
    -o-origin:7%;
  }
  39% {
    opacity: 1;
    -o-transform: rotate(645deg);
    -o-animation-timing-function: linear;
    -o-origin:30%;
  }
  70% {
    opacity: 1;
    -o-transform: rotate(770deg);
    -o-animation-timing-function: ease-out;
    -o-origin:39%;
  }
  75% {
    opacity: 1;
    -o-transform: rotate(900deg);
    -o-animation-timing-function: ease-out;
    -o-origin:70%;
  }
  76% {
    opacity: 0;
    -o-transform:rotate(900deg);
  }
  100% {
    opacity: 0;
    -o-transform: rotate(900deg);
  }
}

@keyframes orbit {
  0% {
    opacity: 1;
    z-index:99;
    transform: rotate(180deg);
    animation-timing-function: ease-out;
  }
  7% {
    opacity: 1;
    transform: rotate(300deg);
    animation-timing-function: linear;
    origin:0%;
  }
  30% {
    opacity: 1;
    transform:rotate(410deg);
    animation-timing-function: ease-in-out;
    origin:7%;
  }
  39% {
    opacity: 1;
    transform: rotate(645deg);
    animation-timing-function: linear;
    origin:30%;
  }
  70% {
    opacity: 1;
    transform: rotate(770deg);
    animation-timing-function: ease-out;
    origin:39%;
  }
  75% {
    opacity: 1;
    transform: rotate(900deg);
    animation-timing-function: ease-out;
    origin:70%;
  }
  76% {
    opacity: 0;
    transform:rotate(900deg);
  }
  100% {
    opacity: 0;
    transform: rotate(900deg);
  }
}
