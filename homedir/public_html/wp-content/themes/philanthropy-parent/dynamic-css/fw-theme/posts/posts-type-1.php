/* Posts Listing & Type 1 */
.post {
  position: relative;
  padding-top: <?php echo esc_js($the_core_less_variables['fw-space-between-elements-sm']); ?>;
  margin-bottom: <?php echo esc_js($the_core_less_variables['fw-space-between-elements-sm']); ?>;
}
.post:first-child {
  border-top: none;
  padding-top: 0;
  margin-top: 0;
}
/* Overlay for fist section in post single */
.post.fw-content-overlay-sm {
  margin-bottom: -<?php echo esc_js($the_core_less_variables['fw-content-overlay-sm']); ?>;
}
.post.fw-content-overlay-md {
  margin-bottom: -<?php echo esc_js($the_core_less_variables['fw-content-overlay-md']); ?>;
}
.post.fw-content-overlay-lg {
  margin-bottom: -<?php echo esc_js($the_core_less_variables['fw-content-overlay-lg']); ?>;
}
.post .wrap-entry-meta,
.post footer.entry-meta {
  font-family: <?php echo ($the_core_less_variables['fw-blog-meta-font-family']); ?>;
  font-style: <?php echo esc_js($the_core_less_variables['fw-blog-meta-font-style']); ?>;
  font-weight: <?php echo esc_js($the_core_less_variables['fw-blog-meta-font-weight']); ?>;
  font-size: <?php echo esc_js($the_core_less_variables['fw-blog-meta-font-size']); ?>;
  line-height: <?php echo esc_js($the_core_less_variables['fw-blog-meta-line-height']); ?>;
  letter-spacing: <?php echo esc_js($the_core_less_variables['fw-blog-meta-letter-spacing']); ?>;
  color: <?php echo esc_js($the_core_less_variables['text-color']); ?>;
  text-transform: <?php echo esc_js($the_core_less_variables['fw-blog-meta-lettercase']); ?>;
}
.post .wrap-entry-meta a,
.post footer.entry-meta a {
  color: <?php echo esc_js($the_core_less_variables['fw-blog-meta-color']); ?>;
}
.post .wrap-entry-meta a:hover,
.post footer.entry-meta a:hover {
  color: <?php echo esc_js($the_core_less_variables['fw-blog-meta-color-hover']); ?>;
}
.post .entry-title {
  display: block;
}
.post .entry-title strong,
.post .entry-title span {
  font-style: normal;
}
.separator {
  color: #b6b8b9;
}
.postlist .post header .entry-meta {
  margin: 0 0 5px 0;
  font-weight: 600;
}
.postlist .post header .entry-meta a {
  font-style: italic;
}
.postlist .post .fw-post-image.fw-block-image-left,
.postlist .post .fw-post-image.fw-block-image-right {
  margin-bottom: 0;
}
.postlist .post .entry-title {
  margin: 0 0 10px 0;
}
.postlist .post .entry-title strong,
.postlist .post .entry-title span {
  font-style: normal;
}
.postlist .post .entry-content {
  padding: 0;
}
.postlist .post .entry-content iframe,
.postlist .post .entry-content embed,
.postlist .post .entry-content img {
  max-width: 100% !important;
}
.postlist .post footer.entry-meta {
  margin: 20px 0 0;
}
.postlist .post footer.entry-meta .comments-link {
  float: right;
}
.postlist.postlist-list .post {
  border-bottom: 1px solid #dee0e1;
}
.postlist.postlist-list .post:last-child {
  border-bottom: none;
}
.postlist.postlist-list .comments-link {
  float: right;
}
.post h1.entry-title a {
  font-family: <?php echo ($the_core_less_variables['fw-h1-font-family']); ?>;
  font-style: <?php echo esc_js($the_core_less_variables['fw-h1-font-style']); ?>;
  font-weight: <?php echo esc_js($the_core_less_variables['fw-h1-font-weight']); ?>;
  font-size: <?php echo esc_js($the_core_less_variables['fw-h1-font-size']); ?>;
  line-height: <?php echo esc_js($the_core_less_variables['fw-h1-line-height']); ?>;
  letter-spacing: <?php echo esc_js($the_core_less_variables['fw-h1-letter-spacing']); ?>;
  color: <?php echo esc_js($the_core_less_variables['fw-h1-color']); ?>;
}
.post h2.entry-title a {
  font-family: <?php echo ($the_core_less_variables['fw-h2-font-family']); ?>;
  font-style: <?php echo esc_js($the_core_less_variables['fw-h2-font-style']); ?>;
  font-weight: <?php echo esc_js($the_core_less_variables['fw-h2-font-weight']); ?>;
  font-size: <?php echo esc_js($the_core_less_variables['fw-h2-font-size']); ?>;
  line-height: <?php echo esc_js($the_core_less_variables['fw-h2-line-height']); ?>;
  letter-spacing: <?php echo esc_js($the_core_less_variables['fw-h2-letter-spacing']); ?>;
  color: <?php echo esc_js($the_core_less_variables['fw-h2-color']); ?>;
}
.post h3.entry-title a {
  font-family: <?php echo ($the_core_less_variables['fw-h3-font-family']); ?>;
  font-style: <?php echo esc_js($the_core_less_variables['fw-h3-font-style']); ?>;
  font-weight: <?php echo esc_js($the_core_less_variables['fw-h3-font-weight']); ?>;
  font-size: <?php echo esc_js($the_core_less_variables['fw-h3-font-size']); ?>;
  line-height: <?php echo esc_js($the_core_less_variables['fw-h3-line-height']); ?>;
  letter-spacing: <?php echo esc_js($the_core_less_variables['fw-h3-letter-spacing']); ?>;
  color: <?php echo esc_js($the_core_less_variables['fw-h3-color']); ?>;
}
.post h4.entry-title a {
  font-family: <?php echo ($the_core_less_variables['fw-h4-font-family']); ?>;
  font-style: <?php echo esc_js($the_core_less_variables['fw-h4-font-style']); ?>;
  font-weight: <?php echo esc_js($the_core_less_variables['fw-h4-font-weight']); ?>;
  font-size: <?php echo esc_js($the_core_less_variables['fw-h4-font-size']); ?>;
  line-height: <?php echo esc_js($the_core_less_variables['fw-h4-line-height']); ?>;
  letter-spacing: <?php echo esc_js($the_core_less_variables['fw-h4-letter-spacing']); ?>;
  color: <?php echo esc_js($the_core_less_variables['fw-h4-color']); ?>;
}
.post h5.entry-title a {
  font-family: <?php echo ($the_core_less_variables['fw-h5-font-family']); ?>;
  font-style: <?php echo esc_js($the_core_less_variables['fw-h5-font-style']); ?>;
  font-weight: <?php echo esc_js($the_core_less_variables['fw-h5-font-weight']); ?>;
  font-size: <?php echo esc_js($the_core_less_variables['fw-h5-font-size']); ?>;
  line-height: <?php echo esc_js($the_core_less_variables['fw-h5-line-height']); ?>;
  letter-spacing: <?php echo esc_js($the_core_less_variables['fw-h5-letter-spacing']); ?>;
  color: <?php echo esc_js($the_core_less_variables['fw-h5-color']); ?>;
}
.post h6.entry-title a {
  font-family: <?php echo ($the_core_less_variables['fw-h6-font-family']); ?>;
  font-style: <?php echo esc_js($the_core_less_variables['fw-h6-font-style']); ?>;
  font-weight: <?php echo esc_js($the_core_less_variables['fw-h6-font-weight']); ?>;
  font-size: <?php echo esc_js($the_core_less_variables['fw-h6-font-size']); ?>;
  line-height: <?php echo esc_js($the_core_less_variables['fw-h6-line-height']); ?>;
  letter-spacing: <?php echo esc_js($the_core_less_variables['fw-h6-letter-spacing']); ?>;
  color: <?php echo esc_js($the_core_less_variables['fw-h6-color']); ?>;
}
.entry-content:before,
.entry-content:after {
  content: " ";
  display: table;
}
.entry-content:after {
  clear: both;
}

.post-tags {
  /* styling details in file: widgets/widget-tagcloud.css */
}

/* Posts Type 1 Grid View */
.postlist.postlist-grid .post.post-list-type-1 .entry-header {
  padding-top: <?php echo esc_js($the_core_less_variables['fw-postlist-grid-content-padding']); ?>;
}
.postlist.postlist-grid .post.post-list-type-1 .entry-content {
  padding-bottom: <?php echo esc_js($the_core_less_variables['fw-postlist-grid-content-padding']); ?>;
}
.postlist.postlist-grid .post.post-list-type-1 .entry-header,
.postlist.postlist-grid .post.post-list-type-1 .entry-content {
  padding-left: <?php echo esc_js($the_core_less_variables['fw-postlist-grid-content-padding']); ?>;
  padding-right: <?php echo esc_js($the_core_less_variables['fw-postlist-grid-content-padding']); ?>;
  background-color: <?php echo esc_js($the_core_less_variables['fw-postlist-grid-content-bg']); ?>;
}
.postlist.postlist-grid .post.post-list-type-1 .fw-post-image {
  margin-bottom: 0;
}
.postlist.postlist-grid .post.post-list-type-1 footer.entry-meta .comments-link.fw-comment-link-type-6 {
  top: <?php echo ( (floatval($the_core_less_variables['fw-buttons-line-height']) + floatval($the_core_less_variables['padding-base-vertical'])) *2) - floatval($the_core_less_variables['fw-blog-meta-line-height'])/2; ?>px;
}
.postlist.postlist-grid .post-list-type-1 {
  margin-bottom: 30px;
}
.postlist.postlist-grid .post-list-type-1 .fw-post-image {
  float: none;
}
.postlist.postlist-grid .post .entry-title {
  margin: 0;
}
.postlist.postlist-grid .post.post-list-type-1 .entry-content {
  padding-top: 10px;
}
.postlist.postlist-grid .post.post-list-type-1 footer.entry-meta .comments-link {
  top: 6px;
}
.postlist .post header .entry-meta {
  color: <?php echo esc_js($the_core_less_variables['text-color']); ?>;
}
.postlist .post .fw-post-image {
  margin-bottom: <?php echo esc_js($the_core_less_variables['fw-space-between-elements-sm']); ?>;
}
.postlist.postlist-list .post {
  margin-bottom: <?php echo floatval($the_core_less_variables['fw-content-density'])*5; ?>px;
  padding-bottom: <?php echo floatval($the_core_less_variables['fw-content-density'])*5; ?>px;
}

<?php if( $the_core_less_variables['fw-postlist-grid-content-bg'] == 'transparent' ) : ?>
  /* only for transparent background */
  .postlist.postlist-grid .post.post-list-type-1 {
    margin-bottom: 90px;
  }
  .postlist.postlist-grid .post.post-list-type-1 .entry-header,
  .postlist.postlist-grid .post.post-list-type-1 .entry-content {
    padding-left: 0;
    padding-right: 0;
  }
  .postlist.postlist-grid .post.post-list-type-1 .entry-header {
    padding-top: 20px;
  }
  .postlist.postlist-grid .post.post-list-type-1 .entry-content {
    padding-bottom: 0;
  }
<?php endif; ?>

/*--- Responsive ---*/
/* Screen 768px */
@media(max-width:991px) {
  .postlist.postlist-grid .post-list-type-1 {
    margin-bottom: 45px !important;
  }
}

/* Screen 568px */
@media(max-width:767px) {
  .postlist.postlist-grid .post-list-type-1 {
    margin-bottom: 20px !important;
  }
  .post {
    padding-top: 25px !important;
    margin-bottom: 25px !important;
  }
  .fw-shortcode-latest-posts.postlist-grid .post {
    margin-bottom: 0 !important;
    padding-top: 0 !important;
  }
}
/* Screen 320px */
@media(max-width:479px){
  .postlist .post .fw-post-image.fw-block-image-left,
  .postlist .post .fw-post-image.fw-block-image-right,
  .postlist .post .fw-post-image{
    width: 100%;
    float: none;
    margin-left: auto;
    margin-right: auto;
  }
}