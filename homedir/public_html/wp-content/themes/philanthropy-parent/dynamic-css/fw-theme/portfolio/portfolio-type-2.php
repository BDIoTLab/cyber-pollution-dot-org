/* Portfolio Type 2 */
.fw-portfolio-2.fw-portfolio-content-align-left .fw-portfolio-description {
  text-align: left;
}
.fw-portfolio-2.fw-portfolio-content-align-center .fw-portfolio-description {
  text-align: center;
}
.fw-portfolio-2.fw-portfolio-content-align-right .fw-portfolio-description {
  text-align: right;
}
.fw-portfolio-2 .fw-portfolio-image .fw-block-image-overlay i {
  font-style: normal;
}
.fw-portfolio-2.fw-portfolio-cols-2 .fw-portfolio-wrapper .fw-portfolio-title {
  font-size: <?php echo ceil(floatval($the_core_less_variables['font-size-base'])+1); ?>px;
}
.fw-portfolio-2.fw-portfolio-cols-2 .fw-portfolio-wrapper li {
  width: 47%;
  margin: 0 1.41% 32px;
}
.fw-portfolio-2.fw-portfolio-cols-2 .fw-portfolio-wrapper .fw-portfolio-image img {
  width: 100%;
}
.fw-portfolio-2.fw-portfolio-cols-3 .fw-portfolio-wrapper .fw-portfolio-title {
  font-size: <?php echo ceil(floatval($the_core_less_variables['font-size-base'])+1); ?>px;
}
.fw-portfolio-2.fw-portfolio-cols-3 .fw-portfolio-wrapper li {
  width: 30.6%;
  margin: 0 1.36% 32px;
}
.fw-portfolio-2.fw-portfolio-cols-4 .fw-portfolio-wrapper .fw-portfolio-title {
  font-size: <?php echo ceil( (floatval($the_core_less_variables['font-size-base'])+1) * 0.8 ); ?>px;
}
.fw-portfolio-2.fw-portfolio-cols-4 .fw-portfolio-wrapper li {
  width: 22%;
  margin: 0 1.36% 32px;
}
.fw-portfolio-2 .fw-portfolio-description .fw-portfolio-content {
  display: block;
  clear: both;
}
.fw-portfolio-2 .fw-portfolio-description .fw-portfolio-content p:last-child {
  margin-bottom: 0;
}
.fw-portfolio-2 .fw-portfolio-title {
  margin: 0 0 17px 0;
  display: block;
  font-style: italic;
}
.fw-portfolio-2 .fw-portfolio-title strong {
  font-style: normal;
}
.fw-portfolio-2 .fw-portfolio-title a {
  color: #333;
}
.fw-portfolio-2 .fw-portfolio-description {
  background-color: <?php echo esc_js($the_core_less_variables['theme-color-4']); ?>;
  padding: <?php echo esc_js($the_core_less_variables['fw-space-between-elements-sm']); ?> 25px;
}
.fw-portfolio-2 .fw-portfolio-description .fw-portfolio-content {
  font-size: <?php echo floor(floatval($the_core_less_variables['font-size-base'])*0.9); ?>px;
  margin-bottom: <?php echo esc_js( floatval($the_core_less_variables['fw-space-between-elements-sm'])/2); ?>px;
}
.fw-portfolio-2 .fw-portfolio-title a:hover {
  color: <?php echo esc_js($the_core_less_variables['theme-color-1']); ?>;
}