/* Widget Posts with image */
.fw-side-posts-list li {
  display: table;
  clear: both;
  margin-bottom: 1em;
}
.fw-side-posts-list li:last-child {
  margin-bottom: 0;
}
.fw-side-posts-list li .fw-widget-post-image {
  width: 60px;
  height: 60px;
  float: left;
  margin: 0 10px 10px 0;
  display: table-cell;
}
.fw-side-posts-list li .fw-widget-post-image a {
  display: block;
  position: relative;
}
.fw-side-posts-list li .fw-widget-post-image span {
  font-size: <?php echo esc_js($the_core_less_variables['fw-widget-font-size']); ?>;
  color: <?php echo esc_js($the_core_less_variables['theme-color-1']); ?>;
  font-family: <?php echo ($the_core_less_variables['font-family-2']); ?>;
}
.fw-side-posts-list li .fw-widget-post-image.fw-overlay-1 .fw-block-image-overlay i[class*='fw-icon-'] {
  width: 36px;
  height: 36px;
  font-size: <?php echo esc_js( floatval($the_core_less_variables['font-size-base']) - 4); ?>px;
}
.fw-side-posts-list li .posts-content .post-title {
  font-family: <?php echo ($the_core_less_variables['fw-widget-inner-title-font-family']); ?>;
  font-size: <?php echo esc_js($the_core_less_variables['fw-widget-inner-title-font-size']); ?>;
  font-weight: <?php echo esc_js($the_core_less_variables['fw-widget-inner-title-font-weight']); ?>;
  font-style: <?php echo esc_js($the_core_less_variables['fw-widget-inner-title-font-style']); ?>;
  line-height: <?php echo esc_js($the_core_less_variables['fw-widget-inner-title-line-height']); ?>;
  letter-spacing: <?php echo esc_js($the_core_less_variables['fw-widget-inner-title-letter-spacing']); ?>;
  color: <?php echo esc_js($the_core_less_variables['fw-widget-inner-title-color']); ?>;
  display: block;
  margin-bottom: 10px;
}
.fw-side-posts-list li .posts-content .post-title:hover {
  color: <?php echo esc_js($the_core_less_variables['fw-widget-inner-title-hover-color']); ?> ;
}
.fw-side-posts-list li .fw-widget-post-image.fw-overlay-1 .fw-block-image-overlay i[class*='fw-icon-'] {
  line-height: 36px;
}
.fw-side-posts-list li .fw-widget-post-image.fw-overlay-1 .fw-block-image-overlay i[class*='fw-icon-']:before{
  padding-left: 0;
}
.fw-side-posts-list li .posts-content {
  display: table-cell;
  vertical-align: middle;
}
.fw-side-posts-list li .posts-content .post-date {
  margin-bottom: 0;
}

/* Style for this widget in footer */
.fw-footer ul li .post-date {
  color: #fff;
  font-weight: normal;
}
.fw-footer-widgets .fw-side-posts-list li .posts-content .post-title {
  color: <?php echo esc_js($the_core_less_variables['fw-footer-widgets-link-color']); ?>;
}
.fw-footer-widgets .fw-side-posts-list li .posts-content .post-title:hover {
  color: <?php echo the_core_adjustColorLightenDarken($the_core_less_variables['fw-footer-widgets-link-color'], 10); ?>;
}