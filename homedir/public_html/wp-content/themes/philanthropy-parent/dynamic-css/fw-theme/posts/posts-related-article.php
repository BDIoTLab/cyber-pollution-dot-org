/* Posts Related Article */
/* -------------------------------------------------- */

.fw-wrap-related-article {
  padding: 0 15px;
  text-align: justify;
  margin-bottom: <?php echo ceil(floatval($the_core_less_variables['fw-space-between-elements-md'])*0.5); ?>px;
}
.fw-wrap-related-article.fw-related-article-type-2 {
  margin-bottom: <?php echo ceil(floatval($the_core_less_variables['fw-space-between-elements-md'])*0.5)+10; ?>px;
}
.fw-related-article-image.fw-block-image-parent .fw-block-image-overlay .fw-overlay-title {
  font-family: <?php echo ($the_core_less_variables['font-family-base']); ?>;
  background-color: <?php echo esc_js($the_core_less_variables['fw-widget-inner-title-color']); ?>;
}
.fw-wrap-related-article .fw-related-article-image {
  margin-bottom: 0;
}
.fw-title-related {
  font-style: normal;
  margin-top: 0;
}
.fw-wrap-related-article .fw-related-article {
  padding: 0;
  margin: 0;
}
.sidebar-right .fw-wrap-related-article .fw-related-article li,
.sidebar-left .fw-wrap-related-article .fw-related-article li {
  width: 48%;
}
.fw-wrap-related-article .fw-related-article li {
  display: inline-block;
  width: 30%;
}

.fw-wrap-related-article .fw-related-article:after {
  content: '';
  width: 100%;
  height: 0;
  display: inline-block;
}
.fw-related-article-image.fw-block-image-parent .fw-block-image-overlay .fw-overlay-title {
  color: #fff;
}
.fw-wrap-related-article.fw-related-article-type-1 .fw-related-article-description {
  position: absolute;
  left: 0;
  right: 0;
  bottom: 0;
  text-align: center;
  padding: 20px;
  font-style: italic;
}
.fw-wrap-related-article.fw-related-article-type-1 .fw-related-article-description strong {
  font-style: normal;
}

/*-- Responsive --*/
/* Screen 768px */
@media(max-width:991px){
  .fw-wrap-related-article .fw-related-article li {
    width: 48%;
    margin-bottom: 100px;
  }
  .fw-wrap-related-article .fw-related-article li:last-child {
    margin-bottom: 0;
  }
  .sidebar-right .fw-wrap-related-article .fw-related-article li,
  .sidebar-left .fw-wrap-related-article .fw-related-article li {
    margin-bottom: 0;
  }
}
/* Screen 320px */
@media(max-width:479px) {
  .fw-wrap-related-article .fw-related-article li {
    display: inline-block;
    width: 100%;
  }
}
