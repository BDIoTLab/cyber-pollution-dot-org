/* Portfolio Type 3 */
/* Content Align Left */
.fw-portfolio-3.fw-portfolio-content-align-left .fw-block-image-overlay,
.fw-portfolio-3.fw-portfolio-content-align-left .fw-block-image-overlay .fw-overlay-description {
  text-align: left;
}
.fw-portfolio-3.fw-portfolio-content-align-left .fw-block-image-overlay .fw-overlay-description * {
  margin-left: 0 !important;
}
.fw-portfolio-3.fw-portfolio-content-align-left .fw-block-image-icons a {
  margin-right: 10px;
  margin-left: auto;
}
/* Content Align Center */
.fw-portfolio-3.fw-portfolio-content-align-center .fw-block-image-overlay {
  text-align: center;
}
.fw-portfolio-3.fw-portfolio-content-align-center .fw-block-image-icons a {
  margin: 0 5px;
}
/* Content Align Right */
.fw-portfolio-3.fw-portfolio-content-align-right .fw-block-image-overlay,
.fw-portfolio-3.fw-portfolio-content-align-right .fw-block-image-overlay .fw-overlay-description {
  text-align: right;
}
.fw-portfolio-3.fw-portfolio-content-align-right .fw-block-image-overlay .fw-overlay-description * {
  margin-right: 0 !important;
}
.fw-portfolio-3.fw-portfolio-content-align-right .fw-block-image-icons a{
  margin-left: 10px;
  margin-right: auto;
}
.fw-portfolio-3 .fw-portfolio-image .fw-block-image-child .fw-block-image-overlay{
  padding: 27px !important;
}
.fw-portfolio-3 .fw-portfolio-image .fw-block-image-overlay {
  overflow: hidden;
}
.fw-portfolio-3 .fw-portfolio-image .fw-block-image-overlay i {
  font-style: normal;
}
.fw-portfolio-3 .fw-portfolio-image .fw-block-image-overlay .fw-portfolio-title {
  color: #fff;
  display: block;
  font-weight: 400;
  font-style: normal;
}
.fw-portfolio-3 .fw-portfolio-image .fw-block-image-overlay .fw-overlay-description {
  padding: 10px 0 0 0;
}
.fw-portfolio-3 .fw-portfolio-image .fw-block-image-overlay .fw-overlay-description * {
  max-width: 200px;
  white-space: nowrap;
  text-overflow: ellipsis;
  overflow: hidden;
  margin: 0 auto;
}
.fw-portfolio-3 .fw-block-image-icons a {
  display: inline-block;
  text-align: center;
  margin-top: 0;
  margin-bottom: 0;
  border-radius: 50%;
  font-size: 25px;
  line-height: 48px;
}
.fw-portfolio-3.fw-portfolio-cols-2 .fw-portfolio-wrapper li {
  width: 47%;
  margin: 0 1.41% 32px;
}
.fw-portfolio-3.fw-portfolio-cols-2 .fw-portfolio-wrapper .fw-overlay-title {
  font-size: <?php echo ceil(floatval($the_core_less_variables['font-size-base'])*1.32); ?>px;
}
.fw-portfolio-3.fw-portfolio-cols-2 .fw-portfolio-wrapper .fw-portfolio-image img {
  width: 100%;
}
.fw-portfolio-3.fw-portfolio-cols-3 .fw-portfolio-wrapper li {
  width: 30.6%;
  margin: 0 1.36% 32px;
}
.fw-portfolio-3.fw-portfolio-cols-3 .fw-portfolio-wrapper .fw-overlay-title {
  font-size: <?php echo ceil(floatval($the_core_less_variables['font-size-base'])*1.32); ?>px;
}
.fw-portfolio-3.fw-portfolio-cols-4 .fw-portfolio-wrapper li {
  width: 22%;
  margin: 0 1.36% 32px;
}
.fw-portfolio-3.fw-portfolio-cols-4 .fw-portfolio-wrapper .fw-overlay-title {
  font-size: <?php echo ceil(floatval($the_core_less_variables['font-size-base'])*1.056); ?>px;
}
.fw-portfolio-3 .fw-portfolio-image .fw-block-image-overlay .fw-portfolio-title {
  font-size: <?php echo ceil(floatval($the_core_less_variables['font-size-base'])*1.32); ?>px;
  font-family: <?php echo ($the_core_less_variables['font-family-2']); ?>;
}
.fw-portfolio-3 .fw-block-image-icons {
  margin-bottom: <?php echo esc_js( floatval($the_core_less_variables['fw-space-between-elements-sm'])/2); ?>px;
}
.fw-portfolio-3 .fw-block-image-icons a {
  color: <?php echo esc_js($the_core_less_variables['theme-color-1']); ?>;
  border: 2px solid <?php echo esc_js($the_core_less_variables['theme-color-1']); ?>;
  width: 48px;
  height: 48px;
  -webkit-transition: all 0.3s linear;
  -o-transition: all 0.3s linear;
  transition: all 0.3s linear;
}
.fw-portfolio-3 .fw-block-image-icons a:hover {
  color: <?php echo esc_js($the_core_less_variables['theme-color-4']); ?>;
  background: <?php echo esc_js($the_core_less_variables['theme-color-1']); ?>;
}
/* Overlay is visible if device is touch */
body.fw-touchDevice .fw-portfolio-3 .fw-block-image-child .fw-block-image-overlay {
  opacity: 1;
}

