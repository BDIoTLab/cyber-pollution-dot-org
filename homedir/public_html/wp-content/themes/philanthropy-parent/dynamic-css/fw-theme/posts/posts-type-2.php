/* Posts Type 2 */
.post-list-type-2 .fw-post-image {
  margin-right: <?php echo esc_js($the_core_less_variables['fw-space-between-elements-sm']); ?>;
}
.post-list-type-2 .fw-post-image.fw-block-image-left,
.post-list-type-2 .fw-post-image.fw-block-image-right {
  margin-right: <?php echo esc_js($the_core_less_variables['fw-space-between-elements-sm']); ?>;
}
.post-list-type-2 footer.entry-meta .wrap-entry-meta .separator {
  color: <?php echo esc_js($the_core_less_variables['theme-color-3']); ?>;
}
.has-post-thumbnail.post-list-type-2 .fw-post-image {
  float: none;
}
.has-post-thumbnail.post-list-type-2 .fw-post-image.fw-block-image-left {
  float: left;
}
.has-post-thumbnail.post-list-type-2 .fw-post-image.fw-block-image-right {
  float: right;
}
.has-post-thumbnail.post-list-type-2 .fw-block-image-parent.fw-block-image-left,
.has-post-thumbnail.post-list-type-2 .fw-block-image-parent.fw-block-image-right {
  width: 250px;
}
.has-post-thumbnail.post-list-type-2 .comments-link {
  position: absolute;
  left: -9px;
  bottom: 40px;
  z-index: 100;
}
.has-post-thumbnail.post-list-type-2.fw-block-image-circle .comments-link {
  bottom: 80px;
}
.post-list-type-2 {
  border-bottom: none;
}
.post-list-type-2 .fw-post-image {
  box-shadow: none;
  float: left;
  margin-left: 0;
}
.post-list-type-2 .fw-post-image.fw-block-image-left,
.post-list-type-2 .fw-post-image.fw-block-image-right {
  float: left;
  margin-left: 0;
}
.post-list-type-2 .fw-block-image-parent.fw-block-image-left,
.post-list-type-2 .fw-block-image-parent.fw-block-image-right {
  width: auto;
}
.post-list-type-2 .entry-header .entry-title {
  margin-bottom: 30px;
}
.post-list-type-2 footer.entry-meta {
  margin: 30px 0 0;
}
.post-list-type-2 footer.entry-meta .wrap-entry-meta .footer-meta {
  overflow: hidden;
  padding: 12px 0;
}
.post-list-type-2 footer.entry-meta .wrap-entry-meta .footer-meta .entry-date {
  float: right;
}
.post-list-type-2 footer.entry-meta .wrap-entry-meta .footer-meta .author{
  float: left;
}
.post-list-type-2 footer.entry-meta .wrap-entry-meta .cat-links {
  margin-top: 25px;
  display: block;
}
.post-list-type-2 footer.entry-meta .wrap-entry-meta .cat-links a {
  font-style: italic;
}
.post-list-type-2 footer.entry-meta .wrap-entry-meta .separator {
  margin: 0 5px;
}

/* Posts Type 2 Grid View */
.postlist.postlist-grid .post-list-type-2 .entry-content {
  padding-top: <?php echo esc_js($the_core_less_variables['fw-postlist-grid-content-padding']); ?>;
}
.postlist.postlist-grid .post-list-type-2 footer.entry-meta {
  padding-bottom: <?php echo esc_js($the_core_less_variables['fw-postlist-grid-content-padding']); ?>;
}
.postlist.postlist-grid .post-list-type-2 .fw-post-empty-div {
  padding-bottom: <?php echo esc_js($the_core_less_variables['fw-postlist-grid-content-padding']); ?>;
}
.postlist.postlist-grid .post-list-type-2 .entry-content,
.postlist.postlist-grid .post-list-type-2 footer.entry-meta,
.postlist.postlist-grid .post-list-type-2 .fw-post-empty-div {
  padding-left: <?php echo esc_js($the_core_less_variables['fw-postlist-grid-content-padding']); ?>;
  padding-right: <?php echo esc_js($the_core_less_variables['fw-postlist-grid-content-padding']); ?>;
  background-color:<?php echo esc_js($the_core_less_variables['fw-postlist-grid-content-bg']); ?>;
}

<?php if( $the_core_less_variables['fw-postlist-grid-content-bg'] == 'transparent' ) : ?>
  /* only for transparent background */
  .postlist.postlist-grid .post-list-type-2 {
    margin-bottom: 90px;
  }
  .postlist.postlist-grid .post-list-type-2 .entry-content,
  .postlist.postlist-grid .post-list-type-2 footer.entry-meta,
  .postlist.postlist-grid .post-list-type-2 .fw-post-empty-div {
    padding-left: 0;
    padding-right: 0;
  }
  .postlist.postlist-grid .post-list-type-2 footer.entry-meta,
  .postlist.postlist-grid .post-list-type-2 .fw-post-empty-div {
    padding-bottom: 0;
  }
  .postlist.postlist-grid .post-list-type-2 .entry-content {
    padding-top: 30px;
  }
<?php else: ?>
  .postlist.postlist-grid .post-list-type-2 {
    margin-bottom: 30px;
  }
<?php endif; ?>

.postlist.postlist-grid .post-list-type-2 .entry-header .entry-title {
  margin-bottom: 10px;
}
.postlist.postlist-grid .has-post-thumbnail.post-list-type-2 .fw-post-image {
  width: 100%;
  position: relative;
  top: 0;
}
.postlist .post-list-type-2 .fw-post-image .fw-block-image-child .fw-block-image-overlay{
  z-index: auto;
}
.postlist.postlist-grid .has-post-thumbnail.post-list-type-2 .fw-post-image .fw-block-image-parent {
  width: 100%;
}
.postlist.postlist-grid .has-post-thumbnail.post-list-type-2 .fw-post-image .fw-block-image-circle {
  width: 250px;
  margin-left: auto;
  margin-right: auto;
  float: none;
}
.postlist.postlist-grid .post-list-type-2 footer.entry-meta {
  margin: 0;
  padding-top: 30px;
}
.postlist.postlist-grid .post-list-type-2 .fw-post-image {
  position: absolute;
  top: 9px;
  right: 0;
  width: auto;
  margin-bottom: 0;
  margin-right: 0;
}
.postlist.postlist-grid .post-list-type-2 .fw-post-image.fw-block-image-left,
.postlist.postlist-grid .post-list-type-2 .fw-post-image.fw-block-image-right {
  margin-right: 0;
  margin-left: 0;
  float: none;
}
.postlist.postlist-grid .post-list-type-2 .entry-meta .footer-meta {
  margin: 0;
}

/*Responsive*/
/* Screen 1024px */
@media(max-width:1199px){
  .post-list-type-2 .fw-post-image {
    margin-bottom: <?php echo ceil( floatval($the_core_less_variables['fw-space-between-elements-sm'])*0.55 ); ?>px;
    margin-right: <?php echo ceil( floatval($the_core_less_variables['fw-space-between-elements-sm'])*0.55 ); ?>px;
  }
}
/* Screen 768px */
@media (max-width: 991px) {
  .postlist.postlist-grid .has-post-thumbnail.post-list-type-2 .fw-post-image.fw-block-image-circle {
    width: 250px;
    float: none;
    margin: 0 auto;
  }
  .postlist.postlist-grid .post-list-type-2 {
    margin-bottom: 40px !important;
  }
  .postlist.postlist-grid.postlist-grid-cols3 .post-list-type-2 .footer-meta{
    text-align: left;
  }
  .postlist.postlist-grid.postlist-grid-cols3 .post-list-type-2 .footer-meta .author,
  .postlist.postlist-grid.postlist-grid-cols3 .post-list-type-2 .footer-meta .entry-date {
    width: 100%;
    display: block;
    float: none;
  }
}
/* Screen 568px */
@media(max-width:767px) {
  .postlist.postlist-grid .post-list-type-2 {
    margin-bottom: 20px !important;
  }
}
/* Screen 320px */
@media (max-width: 479px) {
  .post-list-type-2 footer.entry-meta .wrap-entry-meta .footer-meta .entry-date {
    float: left;
    margin-top: 10px;
  }
  .has-post-thumbnail.post-list-type-2 .fw-post-image.fw-block-image-left,
  .has-post-thumbnail.post-list-type-2 .fw-post-image.fw-block-image-right {
    float: none;
    margin: 0 auto;
  }
}
/* Screen 320px */
@media(max-width:479px){
  .postlist .post-list-type-2 .footer-meta,
  .postlist.postlist-grid.postlist-grid-cols2 .post-list-type-2 .footer-meta{
    text-align: left;
  }
  .postlist .post-list-type-2 .footer-meta .author,
  .postlist .post-list-type-2 .footer-meta .entry-date,
  .postlist.postlist-grid.postlist-grid-cols2 .post-list-type-2 .footer-meta .author,
  .postlist.postlist-grid.postlist-grid-cols2 .post-list-type-2 .footer-meta .entry-date {
    width: 100%;
    display: block;
    float: none;
  }
}