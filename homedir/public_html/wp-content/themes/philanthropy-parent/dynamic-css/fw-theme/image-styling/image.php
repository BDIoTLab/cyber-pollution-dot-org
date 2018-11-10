/* Image Block */
/* -------------------------------------------------- */
.fw-block-image-parent {
  position: relative;
  display: block;
}
.fw-block-image-parent .fw-block-image-child {
  display: block;
}
.fw-block-image-parent.fw-block-image-circle {
  border-radius: 50%;
}
.fw-block-image-parent.fw-block-image-circle:before {
  border-radius: 50%;
}
.fw-block-image-parent.fw-block-image-circle .fw-block-image-child {
  border-radius: 50%;
  z-index: 1;
}
.fw-block-image-parent.fw-block-image-circle .fw-block-image-child img {
  border-radius: 50%;
}
.fw-block-image-parent.fw-block-image-circle .fw-block-image-overlay {
  border-radius: 50%;
}
.fw-block-image-parent.fw-block-image-overlay .fw-noratio img {
  display: block;
}
/* Image Position */
.fw-block-image-parent.fw-block-image-left {
  width: 250px;
  float: left;
  margin-right: 30px;
  margin-bottom: 0;
}
.fw-block-image-parent.fw-block-image-right {
  width: 250px;
  float: right;
  margin-left: 30px;
  margin-bottom: 0;
}
.fw-block-image-parent.fw-block-image-center {
  margin: 0 auto;
}
/* Image Block Caption */
.fw-block-image-parent .fw-block-image-caption {
  background-color: <?php echo the_core_hex2rgba($the_core_less_variables['theme-color-1'], 0.9); ?>;
  position: absolute;
  bottom: 10%;
  left: -<?php echo esc_js($the_core_less_variables['fw-space-between-elements-sm']); ?>;
  z-index: 2;
  font-size: <?php echo esc_js($the_core_less_variables['font-size-base']); ?>;
  line-height: 1.2em;
  padding: 3%;
  width: 400px;
  max-width: 100%;
  color: #fff;
  font-style: italic;
}

/* Image Frame */
.fw-block-image-frame {
    border: <?php echo esc_js($the_core_less_variables['fw-block-image-frame-size']); ?> solid <?php echo esc_js($the_core_less_variables['fw-block-image-frame-color']); ?>;
}
/* Video Frame */
.fw-video{
  max-width: 100%;
}
.fw-video-frame iframe {
  border: <?php echo esc_js($the_core_less_variables['fw-block-image-frame-size']); ?> solid <?php echo esc_js($the_core_less_variables['fw-block-image-frame-color']); ?>;
}

/* Image Switch */
.fw-block-image-parent.fw-switch-image .fw-switch-image-hover {
  opacity: 0;
  -webkit-transition: all 0.3s ease-in-out;
  -o-transition: all 0.3s ease-in-out;
  transition: all 0.3s ease-in-out;
}
.fw-block-image-parent.fw-switch-image:hover .fw-switch-image-hover {
  opacity: 1;
}

/* Image Moving Animation */
/*=> Vertical Moving */
.fw-image-moving.fw-image-vertical-moving.fw-image-moving-on-default > .fw-block-image-child,
.fw-image-moving.fw-image-vertical-moving.fw-image-moving-on-hover > .fw-block-image-child:hover {
  -webkit-animation: vertical-moving 1.8s infinite linear;
  -moz-animation: vertical-moving 1.8s infinite linear;
  -ms-animation: vertical-moving 1.8s infinite linear;
  -o-animation: vertical-moving 1.8s infinite linear;
}
@-webkit-keyframes vertical-moving {
  0%,100% {
    top: 0
  }
  50% {
    top: 15px
  }
}
@keyframes vertical-moving {
  0%,100% {
    top: 0
  }
  50% {
    top: 15px
  }
}
/*=> Horizontal Moving */
.fw-image-moving.fw-image-horizontal-moving.fw-image-moving-on-default > .fw-block-image-child,
.fw-image-moving.fw-image-horizontal-moving.fw-image-moving-on-hover > .fw-block-image-child:hover {
  -webkit-animation: horizontal-moving 1.8s infinite linear;
  -moz-animation: horizontal-moving 1.8s infinite linear;
  -ms-animation: horizontal-moving 1.8s infinite linear;
  -o-animation: horizontal-moving 1.8s infinite linear;
}
@-webkit-keyframes horizontal-moving {
  0%,100% {
    left: 0
  }
  50% {
    left: 15px
  }
}
@keyframes horizontal-moving {
  0%,100% {
    left: 0
  }
  50% {
    left: 15px
  }
}
/*=> Tossing Moving */
.fw-image-moving.fw-image-tossing-moving.fw-image-moving-on-default > .fw-block-image-child,
.fw-image-moving.fw-image-tossing-moving.fw-image-moving-on-hover > .fw-block-image-child:hover {
  -webkit-animation: tossing-moving 1.8s infinite linear;
  -moz-animation: tossing-moving 1.8s infinite linear;
  -ms-animation: tossing-moving 1.8s infinite linear;
  -o-animation: tossing-moving 1.8s infinite linear;
}
@-webkit-keyframes tossing-moving {
  0% {
    -webkit-transform: rotate(0deg)
  }
  25% {
    -webkit-transform: rotate(6deg)
  }
  50% {
    -webkit-transform: rotate(0deg)
  }
  75% {
    -webkit-transform: rotate(-6deg)
  }
  100% {
    -webkit-transform: rotate(0deg)
  }
}
@keyframes tossing-moving {
  0% {
    -webkit-transform: rotate(0deg);
    transform: rotate(0deg)
  }
  25% {
    -webkit-transform: rotate(6deg);
    transform: rotate(6deg)
  }
  50% {
    -webkit-transform: rotate(0deg);
    transform: rotate(0deg)
  }
  75% {
    -webkit-transform: rotate(-6deg);
    transform: rotate(-6deg)
  }
  100% {
    -webkit-transform: rotate(0deg);
    transform: rotate(0deg)
  }
}
/*=> Zoom Moving */
.fw-image-moving.fw-image-zoom-moving.fw-image-moving-on-default > .fw-block-image-child,
.fw-image-moving.fw-image-zoom-moving.fw-image-moving-on-hover > .fw-block-image-child:hover {
  -webkit-animation: zoom-moving 3s infinite linear;
  -moz-animation: zoom-moving 3s infinite linear;
  -ms-animation: zoom-moving 3s infinite linear;
  -o-animation: zoom-moving 3s infinite linear;
}
@-webkit-keyframes zoom-moving {
  0% {
    -webkit-transform: scale(1);
  }
  25% {
    -webkit-transform: scale(.9);
  }
  50% {
    -webkit-transform: scale(1);
  }
  75% {
    -webkit-transform: scale(.9);
  }
  100% {
    -webkit-transform: scale(1);
  }
}
@keyframes zoom-moving {
  0% {
    -webkit-transform: scale(1);
    transform: scale(1);
  }
  25% {
    -webkit-transform: scale(.9);
    transform: scale(.9);
  }
  50% {
    -webkit-transform: scale(1);
    transform: scale(1);
  }
  75% {
    -webkit-transform: scale(.9);
    transform: scale(.9);
  }
  100% {
    -webkit-transform: scale(1);
    transform: scale(1);
  }
}



/* Responsive */
/* Screen 1024px */
@media(max-width:1199px){
  .fw-block-image-parent .fw-block-image-caption {
    left: <?php echo ceil(floatval($the_core_less_variables['fw-space-between-elements-sm'])*0.88); ?>px;
  }
}

/* Screen 768px */
@media(max-width:991px){
  .fw-block-image-parent .fw-block-image-caption {
    left: <?php echo ceil(floatval($the_core_less_variables['fw-space-between-elements-sm'])*0.43); ?>px;
  }
}

/* Screen 568px */
@media(max-width:767px){
  .fw-block-image-parent {
    max-width: 100%;
  }
  .fw-block-image-parent .fw-block-image-caption {
      left: -<?php echo ceil(floatval($the_core_less_variables['fw-space-between-elements-sm'])*0.33); ?>px;
  }
}