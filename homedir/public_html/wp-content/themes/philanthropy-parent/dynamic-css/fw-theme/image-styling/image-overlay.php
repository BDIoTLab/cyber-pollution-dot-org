/* Image Overlay 1 */
.fw-overlay-1 .fw-block-image-child {
  position: relative;
  overflow: hidden;
  -webkit-backface-visibility: hidden;
  -moz-backface-visibility: hidden;
  backface-visibility: hidden;
}
.fw-overlay-1 .fw-block-image-child .fw-block-image-overlay {
  opacity: 0;
  position: absolute;
  background-color: rgba(0, 0, 0, 0.7);
  text-align: center;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  z-index: 10;
  padding: 10px;
  -webkit-transition: all 0.3s ease;
  -o-transition: all 0.3s ease;
  transition: all 0.3s ease;
}
.fw-overlay-1 .fw-block-image-child .fw-block-image-overlay i[class*='fw-icon-'] {
  font-family: 'FontAwesome';
  width: 43px;
  height: 43px;
  font-size: 18px;
  line-height: 44px;
  text-align: center;
  color: #fff;
  display: inline-block;
  border-radius: 50%;
  background-color: <?php echo esc_js($the_core_less_variables['theme-color-2']); ?>;
  z-index: 11;
  transform: scale(0.5);
  -webkit-transition: all 0.2s ease-in-out;
  -o-transition: all 0.2s ease-in-out;
  transition: all 0.2s ease-in-out;
}
.fw-overlay-1 .fw-block-image-child img {
  -webkit-transition: all 0.2s linear;
  -o-transition: all 0.2s linear;
  transition: all 0.2s linear;
  -webkit-font-smoothing: antialiased;
}
.fw-overlay-1 .fw-block-image-child:hover {
  cursor: pointer;
}
.fw-overlay-1 .fw-block-image-child:hover .fw-block-image-overlay {
  opacity: 1;
  -webkit-transition: all 0.3s ease;
  -o-transition: all 0.3s ease;
  transition: all 0.3s ease;
}
.fw-overlay-1 .fw-block-image-child:hover .fw-block-image-overlay i {
  -webkit-transform: scale(1);
  -moz-transform: scale(1);
  -ms-transform: scale(1);
  -o-transform: scale(1);
  transform: scale(1);
}
.fw-overlay-1 .fw-block-image-child:hover img {
  -webkit-transform: scale(1.1);
  -moz-transform: scale(1.1);
  -ms-transform: scale(1.1);
  -o-transform: scale(1.1);
  transform: scale(1.1);
}

/* Image Block Overlay 2 */
.fw-overlay-2 {
  overflow: hidden;
  position: relative;
  cursor: default;
}
.fw-overlay-2 img {
  display: block;
}
.fw-overlay-2 .fw-block-image-child:before {
  content: '';
  background-color: #fff;
  opacity: 0;
  -webkit-transition: all 0.3s ease;
  -o-transition: all 0.3s ease;
  transition: all 0.3s ease;
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  overflow: hidden;
  z-index: 1;
}
.fw-overlay-2 .fw-block-image-child:hover {
  cursor: pointer;
}
.fw-overlay-2 .fw-block-image-child:hover:before {
  opacity: 0.2;
}
.fw-overlay-2 .fw-overlay-title {
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  -webkit-transform-origin: translateY(0px);
  -moz-transform-origin: translateY(0px);
  -ms-transform-origin: translateY(0px);
  transform-origin: translateY(0px);
  -webkit-transition: all 0.6s ease-in-out 0.7s;
  -o-transition: all 0.6s ease-in-out 0.7s;
  transition: all 0.6s ease-in-out 0.7s;
  background: <?php echo the_core_hex2rgba($the_core_less_variables['theme-color-5'], 0.94); ?>;
  opacity: 1;
  z-index: 2;
}

/* Image overlay 3 */
.fw-overlay-3 {
  overflow: hidden;
  position: relative;
}
.fw-overlay-3 .fw-block-image-child {
  position: relative;
  overflow: hidden;
  -webkit-backface-visibility: hidden;
  -moz-backface-visibility: hidden;
  backface-visibility: hidden;
}
.fw-overlay-3 .fw-block-image-child .fw-block-image-overlay {
  opacity: 0;
  position: absolute;
  background-color: rgba(255, 255, 255, 0.95);
  text-align: center;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  z-index: 10;
  padding: 10px;
  -webkit-transition: all 0.3s ease;
  -o-transition: all 0.3s ease;
  transition: all 0.3s ease;
}
.fw-overlay-3 .fw-block-image-child .fw-block-image-overlay .fw-overlay-title {
  color: <?php echo esc_js($the_core_less_variables['theme-color-1']); ?>;
  position: relative;
  margin-bottom: 35px;
  vertical-align: middle;
  text-align: center;
  display: block;
  height: auto !important;
  padding: 0;
}
.fw-overlay-3 .fw-block-image-child .fw-block-image-overlay .fw-overlay-title:before {
  content: '';
  position: absolute;
  width: 130px;
  height: 1px;
  background: #e2e2e2;
  margin: 0 auto;
  bottom: -20px;
  left: 0;
  right: 0;
}
.fw-overlay-3 .fw-block-image-child .fw-block-image-overlay .fw-overlay-description {
  display: block;
  text-align: center;
  color: <?php echo esc_js($the_core_less_variables['text-color']); ?>;
  padding: 0;
}
.fw-overlay-3 .fw-block-image-child img {
  transition: all 0.2s linear;
  -webkit-font-smoothing: antialiased;
}
.fw-overlay-3 .fw-block-image-child:hover {
  cursor: pointer;
}
.fw-overlay-3 .fw-block-image-child:hover .fw-block-image-overlay {
  opacity: 1;
  -webkit-transition: all 0.3s ease;
  -o-transition: all 0.3s ease;
  transition: all 0.3s ease;
}
.fw-overlay-3 .fw-block-image-child:hover img {
  -webkit-transform: scale(1.1);
  -moz-transform: scale(1.1);
  -ms-transform: scale(1.1);
  -o-transform: scale(1.1);
  transform: scale(1.1);
}

/* Image overlay 4 (Gallery) */
.fw-overlay-4 {
  overflow: hidden;
  position: relative;
  background: <?php echo esc_js($the_core_less_variables['theme-color-1']); ?>;
  -webkit-transition: background 0.5s linear;
  -o-transition: background 0.5s linear;
  transition: background 0.5s linear;
}
.fw-overlay-4 .fw-block-image-child {
  position: absolute;
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
  z-index: 10;
}
.fw-overlay-4 .fw-block-image-child img {
  -webkit-transition: opacity 0.5s;
  -o-transition: opacity 0.5s;
  transition: opacity 0.5s;
  position: relative;
  display: block;
  min-height: 100%;
  max-width: 100%;
}
.fw-overlay-4 .fw-block-image-child .fw-overlay-title {
  -webkit-transition: -webkit-transform 0.5s;
  transition: transform 0.5s;
  -webkit-transform: translate3d(0, -20px, 0);
  -moz-transform: translate3d(0, -20px, 0);
  -ms-transform: translate3d(0, -20px, 0);
  -o-transform: translate3d(0, -20px, 0);
  transform: translate3d(0, -20px, 0);
  padding-bottom: 0;
}
.fw-overlay-4 .fw-block-image-child .fw-overlay-title,
.fw-overlay-4 .fw-block-image-child .fw-overlay-description {
  opacity: 0;
  -webkit-transform: scale3d(0.8, 0.8, 1);
  -moz-transform: scale3d(0.8, 0.8, 1);
  -ms-transform: scale3d(0.8, 0.8, 1);
  -o-transform: scale3d(0.8, 0.8, 1);
  transform: scale3d(0.8, 0.8, 1);
}
.fw-overlay-4 .fw-block-image-child .fw-overlay-description {
  padding: 0 2.5em 20px;
  opacity: 0;
  -webkit-transition: opacity 0.5s, -webkit-transform 0.5s;
  transition: opacity 0.5s, transform 0.5s;
  -webkit-transform: translate3d(0, 20px, 0);
  -moz-transform: translate3d(0, 20px, 0);
  -ms-transform: translate3d(0, 20px, 0);
  -o-transform: translate3d(0, 20px, 0);
  transform: translate3d(0, 20px, 0);
}
.fw-overlay-4:before {
  border-top: 1px solid #fff;
  border-bottom: 1px solid #fff;
  -webkit-transform: scale(0, 1);
  -moz-transform: scale(0, 1);
  -ms-transform: scale(0, 1);
  -o-transform: scale(0, 1);
  transform: scale(0, 1);
}
.fw-overlay-4:after {
  border-right: 1px solid #fff;
  border-left: 1px solid #fff;
  -webkit-transform: scale(1, 0);
  -moz-transform: scale(1, 0);
  -ms-transform: scale(1, 0);
  -o-transform: scale(1, 0);
  transform: scale(1, 0);
}
.fw-overlay-4:before,
.fw-overlay-4:after {
  position: absolute;
  top: 30px;
  right: 30px;
  bottom: 30px;
  left: 30px;
  content: '';
  opacity: 0;
  -webkit-transition: opacity 0.5s, -webkit-transform 0.5s;
  transition: opacity 0.5s, transform 0.5s;
}
.fw-overlay-4:hover {
  background: <?php echo esc_js($the_core_less_variables['theme-color-1']); ?>;
  -webkit-transition: background 0.5s linear;
  -o-transition: background 0.5s linear;
  transition: background 0.5s linear;
}
.fw-overlay-4:hover img {
  opacity: 0.2;
}
.fw-overlay-4:hover .fw-overlay-title,
.fw-overlay-4:hover .fw-overlay-description {
  opacity: 1;
  -webkit-transform: translate3d(0, 0, 0);
  -moz-transform: translate3d(0, 0, 0);
  -ms-transform: translate3d(0, 0, 0);
  -o-transform: translate3d(0, 0, 0);
  transform: translate3d(0, 0, 0);
}
.fw-overlay-4:hover:after,
.fw-overlay-4:hover:before {
  opacity: 1;
  -webkit-transform: scale(1);
  -moz-transform: scale(1);
  -ms-transform: scale(1);
  -o-transform: scale(1);
  transform: scale(1);
}

/* Image overlay 5 (Gallery type 3) */
.fw-overlay-5 {
  overflow: hidden;
  position: relative;
  background: <?php echo esc_js($the_core_less_variables['theme-color-1']); ?>;
  -webkit-transition: background 0.5s linear;
  -o-transition: background 0.5s linear;
  transition: background 0.5s linear;
}
.fw-overlay-5 .fw-block-image-child {
  position: absolute;
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
  z-index: 10;
}
.fw-overlay-5 .fw-block-image-child img {
  opacity: 1;
  -webkit-transform: scale(1.12);
  -moz-transform: scale(1.12);
  -ms-transform: scale(1.12);
  -o-transform: scale(1.12);
  transform: scale(1.12);
  -webkit-transition: all 0.35s ease-in-out;
  -o-transition: all 0.35s ease-in-out;
  transition: all 0.35s ease-in-out;
}
.fw-overlay-5 .fw-block-image-child .fw-overlay-description,
.fw-overlay-5 .fw-block-image-child:before {
  opacity: 0;
  -webkit-transition: all 0.35s ease-in-out;
  -o-transition: all 0.35s ease-in-out;
  transition: all 0.35s ease-in-out;
}
.fw-overlay-5 .fw-block-image-child .fw-overlay-description {
  -webkit-transform: scale(1.5);
  -moz-transform: scale(1.5);
  -ms-transform: scale(1.5);
  -o-transform: scale(1.5);
  transform: scale(1.5);
}
.fw-overlay-5 .fw-block-image-child .fw-overlay-title,
.fw-overlay-5 .fw-block-image-child .fw-overlay-description {
  padding: 0;
}
.fw-overlay-5:before {
  position: absolute;
  top: 30px;
  right: 30px;
  bottom: 30px;
  left: 30px;
  border: 1px solid #fff;
  content: '';
  -webkit-transform: scale(1.1);
  -moz-transform: scale(1.1);
  -ms-transform: scale(1.1);
  -o-transform: scale(1.1);
  transform: scale(1.1);
  -webkit-transition: all 0.35s ease-in-out;
  -o-transition: all 0.35s ease-in-out;
  transition: all 0.35s ease-in-out;
}
.fw-overlay-5:hover {
  background: <?php echo esc_js($the_core_less_variables['theme-color-1']); ?>;
  -webkit-transition: background 0.35s linear;
  -o-transition: background 0.35s linear;
  transition: background 0.35s linear;
}
.fw-overlay-5:hover img {
  opacity: 0.5;
  -webkit-transform: scale(1);
  -moz-transform: scale(1);
  -ms-transform: scale(1);
  -o-transform: scale(1);
  transform: scale(1);
  -webkit-transition: all 0.35s ease-in-out;
  -o-transition: all 0.35s ease-in-out;
  transition: all 0.35s ease-in-out;
}
.fw-overlay-5:hover .fw-overlay-description,
.fw-overlay-5:hover:before {
  opacity: 1;
  -webkit-transform: scale(1);
  -moz-transform: scale(1);
  -ms-transform: scale(1);
  -o-transform: scale(1);
  transform: scale(1);
  -webkit-transition: all 0.35s ease-in-out;
  -o-transition: all 0.35s ease-in-out;
  transition: all 0.35s ease-in-out;
}

/* Image overlay 6 (Gallery type 4) */
.fw-overlay-6 {
  overflow: hidden;
  position: relative;
  background: <?php echo esc_js($the_core_less_variables['theme-color-1']); ?>;
}
.fw-overlay-6 img {
  -webkit-transition: all 0.35s ease-in-out;
  -o-transition: all 0.35s ease-in-out;
  transition: all 0.35s ease-in-out;
  -webkit-transform: scale(1.5);
  -moz-transform: scale(1.5);
  -ms-transform: scale(1.5);
  -o-transform: scale(1.5);
  transform: scale(1.5);
  -webkit-backface-visibility: hidden;
  backface-visibility: hidden;
}
.fw-overlay-6 .fw-block-image-overlay {
  position: relative;
  padding: 0 30px;
}
.fw-overlay-6 .fw-block-image-overlay .fw-overlay-title {
  position: relative;
  overflow: hidden;
  display: inline-block;
}
.fw-overlay-6 .fw-block-image-overlay .fw-overlay-title:after {
  content: '';
  position: absolute;
  bottom: 0;
  left: 0;
  width: 100%;
  height: 2px;
  background: <?php echo esc_js($the_core_less_variables['fw-h5-color']); ?>;
  -webkit-transition: all 0.35s;
  -o-transition: all 0.35s;
  transition: all 0.35s;
  -webkit-transform: translate3d(-100%, 0, 0);
  -moz-transform: translate3d(-100%, 0, 0);
  -ms-transform: translate3d(-100%, 0, 0);
  -o-transform: translate3d(-100%, 0, 0);
  transform: translate3d(-100%, 0, 0);
}
.fw-overlay-6 .fw-block-image-overlay .fw-overlay-description {
  opacity: 0;
  -webkit-transition: all 0.35s ease-in-out;
  -o-transition: all 0.35s ease-in-out;
  transition: all 0.35s ease-in-out;
  -webkit-transform: translate3d(100%, 0, 0);
  -moz-transform: translate3d(100%, 0, 0);
  -ms-transform: translate3d(100%, 0, 0);
  -o-transform: translate3d(100%, 0, 0);
  transform: translate3d(100%, 0, 0);
  padding: 0;
}
.fw-overlay-6:hover {
  background: <?php echo esc_js($the_core_less_variables['theme-color-1']); ?>;
  -webkit-transition: background 0.35s ease;
  -o-transition: background 0.35s ease;
  transition: background 0.35s ease;
}
.fw-overlay-6:hover .fw-block-image-overlay .fw-overlay-title:after {
  -webkit-transform: translate3d(0, 0, 0);
  -moz-transform: translate3d(0, 0, 0);
  -ms-transform: translate3d(0, 0, 0);
  -o-transform: translate3d(0, 0, 0);
  transform: translate3d(0, 0, 0);
}
.fw-overlay-6:hover img {
  opacity: 0.5;
  -webkit-transform: scale(1.1);
  -moz-transform: scale(1.1);
  -ms-transform: scale(1.1);
  -o-transform: scale(1.1);
  transform: scale(1.1);
}
.fw-overlay-6:hover .fw-overlay-description {
  opacity: 1;
  -webkit-transform: translate3d(0, 0, 0);
  -moz-transform: translate3d(0, 0, 0);
  -ms-transform: translate3d(0, 0, 0);
  -o-transform: translate3d(0, 0, 0);
  transform: translate3d(0, 0, 0);
}

/* Overlay 7(gallery) */
.fw-overlay-7 {
  position: relative;
  overflow: hidden;
  background: #000;
}
.fw-overlay-7 .fw-block-image-child {
  -webkit-backface-visibility: hidden;
}
.fw-overlay-7 .fw-block-image-child .fw-block-image-overlay {
  opacity: 0;
  position: absolute;
  text-align: center;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  z-index: 10;
  padding: 20px;
  -webkit-transition: all 0.2s ease-in-out;
  -o-transition: all 0.2s ease-in-out;
  transition: all 0.2s ease-in-out;
}
.fw-overlay-7 .fw-block-image-child .fw-block-image-overlay i[class*='fw-icon-'] {
  font-family: 'FontAwesome';
  width: 43px;
  height: 43px;
  font-size: 18px;
  line-height: 44px;
  text-align: center;
  color: #fff;
  display: inline-block;
  border-radius: 50%;
  background-color: <?php echo esc_js($the_core_less_variables['theme-color-2']); ?>;
  z-index: 11;
  transform: scale(0.5);
  -webkit-transition: all 0.2s ease-in-out;
  -o-transition: all 0.2s ease-in-out;
  transition: all 0.2s ease-in-out;
}
.fw-overlay-7 .fw-block-image-child img {
  opacity: 1;
  -webkit-transition: all 0.2s ease-in-out;
  -o-transition: all 0.2s ease-in-out;
  transition: all 0.2s ease-in-out;
}
.fw-overlay-7:hover {
  background: #000;
}
.fw-overlay-7:hover img {
  opacity: 0.5;
  transform: scale(1.1);
  -webkit-transition: all 0.2s ease-in-out;
  -o-transition: all 0.2s ease-in-out;
  transition: all 0.2s ease-in-out;
}
.fw-overlay-7:hover .fw-block-image-overlay {
  opacity: 1;
  -webkit-transition: all 0.2s ease-in-out;
  -o-transition: all 0.2s ease-in-out;
  transition: all 0.2s ease-in-out;
}
.fw-overlay-7:hover .fw-block-image-overlay i {
  transform: scale(1) !important;
  -webkit-transition: all 0.2s ease-in-out;
  -o-transition: all 0.2s ease-in-out;
  transition: all 0.2s ease-in-out;
}

/* Video */
.fw-block-image-parent.fw-block-image-video .fw-block-image-overlay {
  opacity: 1;
  background-color: transparent;
}
.fw-block-image-parent.fw-block-image-video .fw-block-image-overlay:hover {
  background-color: rgba(0, 0, 0, 0.7);
}
.fw-block-image-parent.fw-block-image-video .fw-block-image-overlay:hover i {
  border-color: transparent!important;
  background-color: <?php echo esc_js($the_core_less_variables['theme-color-2']); ?> !important;
}
.fw-block-image-parent.fw-block-image-video .fw-block-image-overlay i {
  transform: scale(1) !important;
  background-color: transparent !important;
  border: 2px solid #fff;
  line-height: 41px !important;
}
.fw-block-image-parent .fw-icon-zoom,
.fw-block-image-parent .fw-icon-link,
.fw-block-image-parent .fw-icon-video,
.fw-block-image-parent .fw-icon-more,
.fw-block-image-parent .fw-icon-like {
  font-family: 'FontAwesome';
  font-style: normal;
}
.fw-block-image-parent .fw-icon-zoom:before {
  content: "\f065";
}
.fw-block-image-parent .fw-icon-link:before {
  content: "\f105";
  padding-left: 4px;
}
.fw-block-image-parent .fw-icon-video:before {
  content: "\f04b";
  text-indent: 0.2em;
  margin-left: .2em;
}
.fw-block-image-parent .fw-icon-more:before {
  content: "\f0f6";
}
.fw-block-image-parent .fw-icon-like:before {
  content: "\f08a";
}
.fw-block-image-parent .fw-block-image-overlay .fw-overlay-description {
  text-align: center;
  color: <?php echo esc_js($the_core_less_variables['theme-color-4']); ?>;
  line-height: normal;
  padding: 20px;
  font-size: <?php echo floatval($the_core_less_variables['font-size-base'])-1; ?>px;
}
.fw-block-image-parent .fw-block-image-overlay .fw-overlay-description p:last-child {
  margin-bottom: 0;
}
.fw-block-image-parent .fw-block-image-overlay .fw-overlay-title {
  font-family: <?php echo ($the_core_less_variables['font-family-2']); ?>;
  font-weight: 400;
  font-style: normal;
  padding: 5%;
  text-align: center;
  color: <?php echo esc_js($the_core_less_variables['theme-color-4']); ?>;
}