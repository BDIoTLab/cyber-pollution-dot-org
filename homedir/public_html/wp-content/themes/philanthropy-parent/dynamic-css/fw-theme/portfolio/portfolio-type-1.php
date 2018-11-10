/* Portfolio Type 1 */
/* Content Align Left */
.fw-portfolio-1.fw-portfolio-content-align-left .fw-portfolio-image .fw-block-image-overlay .fw-overlay-title,
.fw-portfolio-1.fw-portfolio-content-align-left .fw-portfolio-image .fw-block-image-overlay .fw-overlay-description {
  text-align: left;
}
.fw-portfolio-1.fw-portfolio-content-align-left .fw-portfolio-image .fw-block-image-overlay .fw-overlay-title:before {
  right: auto;
}
.fw-portfolio-1.fw-portfolio-content-align-left .fw-portfolio-image .fw-block-image-overlay .fw-overlay-description {
  float: left;
}
/* Content Align Center */
.fw-portfolio-1.fw-portfolio-content-align-center .fw-portfolio-image .fw-block-image-overlay .fw-overlay-title,
.fw-portfolio-1.fw-portfolio-content-align-center .fw-portfolio-image .fw-block-image-overlay .fw-overlay-description {
  text-align: center;
}
.fw-portfolio-1.fw-portfolio-content-align-center .fw-portfolio-image .fw-block-image-overlay .fw-overlay-title:before {
  left: 0;
  right: 0;
}
.fw-portfolio-1.fw-portfolio-content-align-center .fw-portfolio-image .fw-block-image-overlay .fw-overlay-description {
  float: none;
}
/* Content Align Right */
.fw-portfolio-1.fw-portfolio-content-align-right .fw-portfolio-image .fw-block-image-overlay .fw-overlay-title,
.fw-portfolio-1.fw-portfolio-content-align-right .fw-portfolio-image .fw-block-image-overlay .fw-overlay-description {
  text-align: right;
}
.fw-portfolio-1.fw-portfolio-content-align-right .fw-portfolio-image .fw-block-image-overlay .fw-overlay-title:before {
  left: auto;
}
.fw-portfolio-1.fw-portfolio-content-align-right .fw-portfolio-image .fw-block-image-overlay .fw-overlay-description {
  float: none;
}
.fw-portfolio-1.fw-portfolio-content-align-right .fw-portfolio-image .fw-block-image-overlay .fw-overlay-description * {
  float: right;
}
.fw-portfolio-1 .fw-portfolio-list li {
  background: #fff;
  border: 1px solid #ece8df;
  padding: 20px;
  -webkit-box-shadow: 0 9px 40px rgba(236, 232, 223, 0.68);
  box-shadow: 0 9px 40px rgba(236, 232, 223, 0.68);
}
.fw-portfolio-1 .fw-portfolio-image {
  display: block;
  overflow: hidden;
}
.fw-portfolio-1 .fw-portfolio-image .fw-overlay-title {
  font-size: <?php echo ceil(floatval($the_core_less_variables['font-size-base'])*1.32); ?>px;
  line-height: <?php echo (ceil(floatval($the_core_less_variables['font-size-base'])*1.32)+2); ?>px;
  padding: 0 6% 2%;
}
.fw-portfolio-1 .fw-portfolio-image .fw-overlay-description * {
  max-width: 200px;
  white-space: nowrap;
  text-overflow: ellipsis;
  overflow: hidden;
  margin: 0 auto;
}
/* 2 columns */
.fw-portfolio-1.fw-portfolio-cols-2 .fw-portfolio-wrapper .fw-portfolio-title {
  font-size: <?php echo ceil( floatval( $the_core_less_variables['font-size-base'] ) *1.32); ?>px;
}
.fw-portfolio-1.fw-portfolio-cols-2 .fw-portfolio-wrapper li {
  width: 47%;
  margin: 0 1.41% 32px;
}
.fw-portfolio-1.fw-portfolio-cols-2 .fw-portfolio-wrapper .fw-portfolio-image img {
  width: 100%;
}
/* 3 columns */
.fw-portfolio-1.fw-portfolio-cols-3 .fw-portfolio-wrapper li {
  width: 30.6%;
  margin: 0 1.36% 32px;
}
/* 4 columns */
.fw-portfolio-1.fw-portfolio-cols-4 .fw-portfolio-wrapper li {
  width: 22%;
  margin: 0 1.36% 32px;
}
.fw-portfolio-1.fw-portfolio-cols-4 .fw-portfolio-wrapper .fw-portfolio-title {
  font-size: <?php echo ceil(floatval($the_core_less_variables['font-size-base'])*1.056); ?>px;
  padding: 10px;
}
.fw-portfolio-1 .fw-portfolio-image .fw-block-image-child .fw-block-image-overlay{
  padding: 20px !important;
}
/* Overlay is visible if device is touch */
body.fw-touchDevice .fw-portfolio-1 .fw-block-image-child .fw-block-image-overlay {
  opacity: 1;
}

