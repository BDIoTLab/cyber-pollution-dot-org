/* Posts */
/* -------------------------------------------------- */

/*-------------------------------------*/
/*       Other Style for Posts         */
/*         Inlude Style css            */
/*-------------------------------------*/
.footer-meta {
  border-top: 1px solid #dee0e1;
  border-bottom: 1px solid #dee0e1;
  padding: 1em 0;
}
.postlist.postlist-grid .fw-post-image {
  display: block;
  width: 100%;
  position: relative;
}
.postlist.postlist-grid .fw-post-image.fw-block-image-circle {
  width: 250px;
  margin: 0 auto 20px auto;
  float: none;
}
.postlist.postlist-grid .fw-post-image.fw-block-image-left,
.postlist.postlist-grid .fw-post-image.fw-block-image-right {
  float: none;
}
.postlist-grid .fw-block-image-parent.fw-block-image-right{
  margin-left: 0
}
.postlist.postlist-grid .no-post-thumbnail .fw-post-image {
  margin: 0 15px 0 -5px;
  float: left;
}
.postlist.postlist-grid footer .footer-meta {
  margin-top: 1em;
  margin-bottom: 1.2em;
}
.postlist.postlist-grid footer .footer-meta .entry-date {
  float: right;
}
.postlist .sticky-icon {
  z-index: 11;
  font-style: normal;
}
.postlist .sticky-icon:before {
  content: '\f097';
  font-family: 'FontAwesome';
  line-height: 1em;
}
.postlist.fw-letter-caps .post .entry-content p:first-child:first-letter {
  color: <?php echo esc_js($the_core_less_variables['fw-h2-color']); ?>;
  float: left;
  font-size: 120px;
  line-height: 100px;
  padding-top: 3px;
  padding-right: 13px;
  padding-left: 3px;
}

/* Postlist - Grid view */
.postlist.postlist-grid footer .footer-meta a {
  color: <?php echo esc_js($the_core_less_variables['theme-color-2']); ?>;
}
.postlist.postlist-grid footer .cat-links {
  font-size: <?php echo floor( floatval($the_core_less_variables['font-size-base'])*0.9 ); ?>px;
  color: <?php echo esc_js($the_core_less_variables['theme-color-2']); ?>;
}
/* Sticky Icon */
.postlist .sticky-icon:before {
  color: <?php echo esc_js($the_core_less_variables['theme-color-1']); ?>;
  text-shadow: 0 1px 1px rgba(15, 31, 37, 0.7);
}
/*Style for Read More Posts Buttons*/
.postlist .fw-btn-post-read-more-blog {
  color: #fff !important;
}
.postlist .fw-btn-post-read-more-blog:hover {
  color: #fff !important;
}
.fw-js-load-more-posts {
  width: 100%;
  margin-top: 25px;
}

/*Responsive*/
@media (min-width: 768px) {
  .fw-col-sm-4 .postlist .has-post-thumbnail.post-list-type-1 .fw-post-image,
  .fw-col-sm-3 .postlist .has-post-thumbnail.post-list-type-1 .fw-post-image,
  .fw-col-sm-4 .postlist .has-post-thumbnail.post-list-type-2 .fw-post-image,
  .fw-col-sm-3 .postlist .has-post-thumbnail.post-list-type-2 .fw-post-image,
  .fw-col-sm-4 .postlist .has-post-thumbnail.post-list-type-3 .fw-post-image,
  .fw-col-sm-3 .postlist .has-post-thumbnail.post-list-type-3 .fw-post-image {
    width: 100%;
    margin-right: 0;
  }
  .fw-col-sm-4 .postlist .post-list-type-2 .fw-post-image,
  .fw-col-sm-3 .postlist .post-list-type-2 .fw-post-image {
    margin-bottom: 10px;
  }
}
/*Screen 768px*/
@media (max-width: 991px) {
  .fw-content-area {
    margin-bottom: 60px;
  }
}
/* Screen 568px */
@media(max-width:767px){
  .single-fw-event .fw-main-row-top,
  .single-fw-portfolio .fw-main-row-top,
  .single-post .fw-main-row-top,
  .single-product .fw-main-row-top,
  .single-fw-learning-articles .fw-main-row-top,
  .single-fw-learning-courses .fw-main-row-top,
  .archive .fw-main-row-top,
  .woocommerce-page .fw-main-row-top {
    height: auto !important;
    padding-top: 5px !important;
  }
  .archive .fw-section-default-page .fw-col-sm-12,
  .single .fw-section-default-page .fw-col-sm-12 {
    top: 0 !important;
  }
  .single-fw-event .fw-main-row-top .fw-heading,
  .single-fw-portfolio .fw-main-row-top .fw-heading,
  .single-post .fw-main-row-top .fw-heading,
  .single-product .fw-main-row-top .fw-heading,
  .single-fw-learning-articles .fw-main-row-top .fw-heading,
  .single-fw-learning-courses .fw-main-row-top .fw-heading,
  .archive .fw-main-row-top .fw-heading,
  .woocommerce-page .fw-main-row-top .fw-heading {
    margin-bottom: 0;
  }
  .postlist.postlist-grid .postlist-col {
    width: 50%;
  }
}
/* Screen 320px */
@media(max-width:479px){
  .postlist.postlist-grid .postlist-col {
    width: 100%;
  }
  .postlist .post .fw-post-image.fw-block-image-left,
  .postlist .post .fw-post-image.fw-block-image-right,
  .postlist .post .fw-post-image {
    margin-bottom: <?php echo ceil( floatval($the_core_less_variables['fw-space-between-elements-sm']) * 0.55 ); ?>px;
  }
}

/* Grid View for different columns*/
@media (min-width: 768px) {
  .fw-col-sm-4 .postlist .has-post-thumbnail.post-list-type-1 .fw-post-image,
  .fw-col-sm-3 .postlist .has-post-thumbnail.post-list-type-1 .fw-post-image,
  .fw-col-sm-4 .postlist .has-post-thumbnail.post-list-type-2 .fw-post-image,
  .fw-col-sm-3 .postlist .has-post-thumbnail.post-list-type-2 .fw-post-image,
  .fw-col-sm-4 .postlist .has-post-thumbnail.post-list-type-3 .fw-post-image,
  .fw-col-sm-3 .postlist .has-post-thumbnail.post-list-type-3 .fw-post-image {
    margin-bottom: <?php echo esc_js($the_core_less_variables['fw-space-between-elements-sm']); ?>;
  }
}

.fw-js-load-more-posts {
  clear: both;
}

.fw-portfolio-masonry-off.fw-portfolio-cols-2 .postlist-col:nth-child(2n+1),
.fw-portfolio-masonry-off.fw-portfolio-cols-3 .postlist-col:nth-child(3n+1),
.fw-portfolio-masonry-off.fw-portfolio-cols-4 .postlist-col:nth-child(4n+1) {
  clear: left;
}

.fw-portfolio-masonry-off.postlist .post footer.entry-meta {
	display: table;
	width: 100%;
}
.fw-portfolio-masonry-off.postlist .post{
	display: -webkit-box;
	display: -ms-flexbox;
	display: flex;
	-webkit-box-orient: vertical;
	-webkit-box-direction: normal;
	-ms-flex-direction: column;
	flex-direction: column;
}
.fw-portfolio-masonry-off.postlist .post .entry-content{
	display: -webkit-box;
	display: -ms-flexbox;
	display: flex;
	-webkit-box-orient: vertical;
	-webkit-box-direction: normal;
	-ms-flex-direction: column;
	flex-direction: column;
	-webkit-box-flex: 1;
	-ms-flex: 1 1 100%;
	flex: 1 1 100%;
}
.fw-portfolio-masonry-off.postlist .post .entry-meta{
	margin-bottom: 0;
	margin-top: auto !important;
}
.fw-portfolio-masonry-off.postlist .post.post-list-type-3 .entry-meta {
	padding-top: 25px;
}
