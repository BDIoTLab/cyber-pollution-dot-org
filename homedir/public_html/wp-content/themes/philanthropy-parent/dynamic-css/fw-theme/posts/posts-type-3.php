/* Posts Type 3 */
.post-list-type-3 .fw-post-image {
  margin-bottom: <?php echo esc_js($the_core_less_variables['fw-space-between-elements-sm']); ?>;
}
.post-list-type-3 .cat-links {
  font-family: <?php echo ($the_core_less_variables['fw-blog-meta-font-family']); ?>;
  font-style: <?php echo esc_js($the_core_less_variables['fw-blog-meta-font-style']); ?>;
  font-weight: <?php echo esc_js($the_core_less_variables['fw-blog-meta-font-weight']); ?>;
  font-size: <?php echo esc_js($the_core_less_variables['fw-blog-meta-font-size']); ?>;
  line-height: <?php echo floatval($the_core_less_variables['fw-blog-meta-line-height'])+4; ?>px;
  letter-spacing: <?php echo esc_js($the_core_less_variables['fw-blog-meta-letter-spacing']); ?>;
  color: <?php echo esc_js($the_core_less_variables['text-color']); ?>;
  text-transform: <?php echo esc_js($the_core_less_variables['fw-blog-meta-lettercase']); ?>;
}
.post-list-type-3 .cat-links a {
  color: <?php echo esc_js($the_core_less_variables['fw-blog-meta-color']); ?>;
}
.post-list-type-3 .cat-links a:before {
  color: <?php echo esc_js($the_core_less_variables['fw-blog-meta-color']); ?>;
}
.post-list-type-3 .cat-links a:hover {
  color: <?php echo esc_js($the_core_less_variables['fw-blog-meta-color-hover']); ?>;
}
.post-list-type-3 .cat-links a:hover:before {
  color: <?php echo esc_js($the_core_less_variables['fw-blog-meta-color-hover']); ?>;
}
.postlist .post.post-list-type-3 .fw-post-image {
  margin-bottom: <?php echo esc_js($the_core_less_variables['fw-space-between-elements-sm']); ?>;
}
.post-list-type-3 {
  position: relative;
  overflow: hidden;
}
.post-list-type-3:before {
  content: '';
  height: 1px;
  background-color: #e5e5e5;
  position: absolute;
  display: block !important;
  top: 0;
  left: 94px;
  right: 94px;
}
.post-list-type-3:first-child:before {
  display: none !important;
}
.post-list-type-3 .entry-header {
  text-align: center;
  padding: 0 100px;
  margin-bottom: 40px;
}
.post-list-type-3 .fw-post-image.fw-block-image-circle {
  width: 50%;
  margin: 0 auto;
}
.post-list-type-3 .entry-header .wrap-entry-meta {
  margin-bottom: 20px;
}
.postlist .post.post-list-type-3 .entry-content {
  padding: 0 80px;
}
.postlist .post.post-list-type-3.fw-block-image-left-align .entry-content,
.postlist .post.post-list-type-3.fw-block-image-right-align .entry-content {
  padding: 0;
}
.post-list-type-3 .entry-content .cat-links {
  text-align: center;
  display: block;
}
.post-list-type-3 .entry-content .cat-links a {
  margin-right: 55px;
  display: inline-block;
  position: relative;
  padding-left: 15px;
}
.post-list-type-3 .entry-content .cat-links a:last-child {
  margin-right: 0;
}
.post-list-type-3 .entry-content .cat-links a:before {
  content: '\f292';
  font-family: 'FontAwesome';
  font-size: 10px;
  vertical-align: middle;
  display: inline-block;
  margin-right: 2px;
  position: absolute;
  top: 1px;
  left: 0;
}
.post-list-type-3 .entry-content .entry-content-divider {
  display: block;
  width: 100%;
  max-width: 100%;
  text-align: center;
  line-height: 0;
  margin: 37px 0 33px;
}
.post-list-type-3 .entry-content .entry-content-divider .divider-item {
  display: inline-block;
  width: 6px;
  height: 6px;
  background-color: #dfdfdf;
  border-radius: 50%;
  margin-right: 2px;
}
.post-list-type-3 .entry-content .entry-content-divider .divider-item:last-child {
  margin-right: 0;
}
.post-list-type-3 .entry-content footer.entry-meta {
  display: table;
  width: 100%;
}
.postlist .post.post-list-type-3 footer.entry-meta {
  margin-top: 55px;
}
.post-list-type-3 .entry-content footer.entry-meta >*:not(.publisher) {
  display: table-cell;
  width: 33.33%;
  vertical-align: middle;
}
.post-list-type-3 .entry-content footer.entry-meta .wrap-blog-button {
  text-align: center;
}
.post-list-type-3 .entry-content footer.entry-meta.post-author-no >* {
  width: 50%;
}
.post-list-type-3 .entry-content footer.entry-meta.comments-link-no >* {
  width: 50%;
}
.post-list-type-3 .entry-content footer.entry-meta.post-author-no .wrap-blog-button {
  text-align: left;
}
.post-list-type-3 .entry-content footer.entry-meta.comments-link-no .wrap-blog-button {
  text-align: right;
}
.post-list-type-3 .entry-content footer.entry-meta.comments-link-no .wrap-comments-link {
  display: none;
}
.post-list-type-3 .entry-content footer.entry-meta.comments-link-no.post-author-no .wrap-blog-button {
  width: 100%;
  text-align: center;
}
.post.post-list-type-3 {
  padding-top: 96px;
  margin-bottom: 96px;
}
.post.post-list-type-3:first-child {
  padding-top: 0;
}
.post.post-list-type-3.fw-block-image-left-align .fw-post-image.fw-block-image-circle,
.post.post-list-type-3.fw-block-image-right-align .fw-post-image.fw-block-image-circle {
  width: 250px;
}
/* Full Width */
.col-md-12 .postlist .post.post-list-type-3 .entry-content {
  padding: 0 125px;
}
.col-md-12 .post-list-type-3 .entry-header {
  padding: 0 195px;
}

/* Posts Type 3 Grid View */
.postlist.postlist-grid .post.post-list-type-3,
.postlist.postlist-grid .post.post-list-type-3.fw-block-image-left-align,
.postlist.postlist-grid .post.post-list-type-3.fw-block-image-right-align {
  margin-bottom: 30px;
}
.postlist.postlist-grid .post.post-list-type-3 .entry-content,
.postlist.postlist-grid .post.post-list-type-3.fw-block-image-left-align .entry-content,
.postlist.postlist-grid .post.post-list-type-3.fw-block-image-right-align .entry-content {
  padding: <?php echo esc_js($the_core_less_variables['fw-postlist-grid-content-padding']); ?>;
  background-color: <?php echo esc_js($the_core_less_variables['fw-postlist-grid-content-bg']); ?>;
}
.postlist.postlist-grid .post.post-list-type-3 .entry-content .post-content p:first-child:first-letter,
.postlist.postlist-grid .post.post-list-type-3.fw-block-image-left-align .entry-content .post-content p:first-child:first-letter,
.postlist.postlist-grid .post.post-list-type-3.fw-block-image-right-align .entry-content .post-content p:first-child:first-letter {
  color: inherit;
}
.postlist.postlist-grid .post.post-list-type-3 {
  margin-bottom: 30px;
}
.postlist.postlist-grid .post.post-list-type-3 .entry-header {
  padding: 0;
}
.postlist.postlist-grid .post.post-list-type-3:before {
  display: none !important;
}
.postlist.postlist-grid .post.post-list-type-3 .fw-post-image {
  margin-bottom: 0;
}
.postlist.postlist-grid .post-list-type-3 .entry-content .post-content p:first-child:first-letter {
  float: none;
  font-size: inherit;
  line-height: inherit;
  padding: 0;
}
.postlist.postlist-grid .post-list-type-3 .entry-content .cat-links a {
  margin: 0 15px;
}
.postlist.postlist-grid .post-list-type-3 .entry-content .cat-links a:last-child {
  margin-right: 15px;
}

<?php if( $the_core_less_variables['fw-postlist-grid-content-bg'] == 'transparent' ) : ?>
  /* only for transparent background */
  .postlist.postlist-grid .post.post-list-type-3,
  .postlist.postlist-grid .post.post-list-type-3.fw-block-image-left-align,
  .postlist.postlist-grid .post.post-list-type-3.fw-block-image-right-align {
    margin-bottom: 90px;
  }
  .postlist.postlist-grid .post.post-list-type-3 .entry-content,
  .postlist.postlist-grid .post.post-list-type-3.fw-block-image-left-align .entry-content,
  .postlist.postlist-grid .post.post-list-type-3.fw-block-image-right-align .entry-content {
    padding: <?php echo esc_js($the_core_less_variables['fw-space-between-elements-sm']); ?> 0 0;
  }
<?php endif; ?>

/*----> Responsive <---- */
/* Screen 1024px */
@media(max-width:1199px){
  .col-md-12 .post-list-type-3 .entry-header,
  .col-md-12 .postlist .post.post-list-type-3 .entry-content {
    padding: 0 100px;
  }
  .postlist.postlist-grid .post.post-list-type-3 .entry-content,
  .postlist.postlist-grid .post.post-list-type-3.fw-block-image-left-align .entry-content,
  .postlist.postlist-grid .post.post-list-type-3.fw-block-image-right-align .entry-content {
    padding: 20px 10px !important;
  }
}
/* Screen 768px */
@media(max-width:991px){
  .post.post-list-type-3 {
    padding-top: 40px !important;
    margin-bottom: 40px !important;
  }
  .post.post-list-type-3:first-child {
    padding-top: 0 !important;
  }
  .post-list-type-3 .entry-header,
  .col-md-12 .post-list-type-3 .entry-header,
  .postlist .post.post-list-type-3 .entry-content,
  .col-md-12 .postlist .post.post-list-type-3 .entry-content {
    padding: 0 80px;
  }
  .postlist.postlist-grid .post.post-list-type-3 .entry-content,
  .postlist.postlist-grid .post.post-list-type-3.fw-block-image-left-align .entry-content,
  .postlist.postlist-grid .post.post-list-type-3.fw-block-image-right-align .entry-content {
    padding: 20px 15px !important;
  }
}
/* Screen 568px */
@media(max-width:767px){
  .post-list-type-3 .entry-header,
  .col-md-12 .post-list-type-3 .entry-header,
  .postlist .post.post-list-type-3 .entry-content,
  .col-md-12 .postlist .post.post-list-type-3 .entry-content {
    padding: 0;
  }
  .postlist.postlist-grid .post.post-list-type-3 .entry-content,
  .postlist.postlist-grid .post.post-list-type-3.fw-block-image-left-align .entry-content,
  .postlist.postlist-grid .post.post-list-type-3.fw-block-image-right-align .entry-content {
    padding: 20px 10px !important;
  }
}
/* Screen 320px */
@media(max-width:479px){
  .post-list-type-3 .entry-content footer.entry-meta >* {
    display: block;
    width: 100%;
    float: none;
    margin-bottom: 20px;
    text-align: center;
  }
  .postlist .post.post-list-type-3 footer.entry-meta .wrap-comments-link {
    margin-bottom: 0;
  }
  .postlist .post.post-list-type-3 footer.entry-meta .comments-link {
    float: none;
  }
  .postlist.postlist-grid .post.post-list-type-3 .entry-content,
  .postlist.postlist-grid .post.post-list-type-3.fw-block-image-left-align .entry-content,
  .postlist.postlist-grid .post.post-list-type-3.fw-block-image-right-align .entry-content {
    padding: 30px !important;
  }
}