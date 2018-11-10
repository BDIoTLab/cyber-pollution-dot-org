/* Pagination , paging navigation */
/* -------------------------------------------------- */
/* General style for paging navigation */
.paging-navigation,
nav.woocommerce-pagination {
  padding: <?php echo esc_js($the_core_less_variables['fw-section-padding-sm']); ?>;
  font-family: <?php echo ($the_core_less_variables['fw-buttons-font-family']); ?>;
  font-weight: <?php echo esc_js($the_core_less_variables['fw-buttons-font-weight']); ?>;
  font-style: <?php echo esc_js($the_core_less_variables['fw-buttons-font-style']); ?>;
  background-color: <?php echo the_core_hex2rgba($the_core_less_variables['text-color'], 0.1); ?>;
  margin: <?php echo esc_js($the_core_less_variables['fw-space-between-elements-sm']); ?> 0;
  overflow: hidden;
}
.paging-navigation h1,
nav.woocommerce-pagination h1 {
  display: none;
}
.paging-navigation .loop-pagination,
nav.woocommerce-pagination .loop-pagination {
  text-align: center;
  position: relative;
  display: block;
  margin: 0;
}
.paging-navigation .page-numbers,
nav.woocommerce-pagination .page-numbers {
  color: <?php echo esc_js($the_core_less_variables['theme-color-2']); ?>;
  display: inline-block;
  line-height: <?php echo esc_js($the_core_less_variables['line-height-large']); ?>;
  margin-left: 10px;
  margin-right: 10px;
  font-size: 18px;
  padding: <?php echo esc_js($the_core_less_variables['padding-large-vertical']); ?> 0;
  -webkit-transition: all 0.2s ease;
  -o-transition: all 0.2s ease;
  transition: all 0.2s ease;
}
.paging-navigation .page-numbers:hover,
nav.woocommerce-pagination .page-numbers:hover,
.paging-navigation .page-numbers.current,
nav.woocommerce-pagination .page-numbers.current {
  color: <?php echo esc_js($the_core_less_variables['theme-color-1']); ?>;
}
.paging-navigation .page-numbers.dots,
nav.woocommerce-pagination .page-numbers.dots {
  color: <?php echo esc_js($the_core_less_variables['theme-color-2']); ?>;
}
.paging-navigation .page-numbers.prev,
nav.woocommerce-pagination .page-numbers.prev,
.paging-navigation .page-numbers.next,
nav.woocommerce-pagination .page-numbers.next {
  text-transform: uppercase;
  padding: <?php echo esc_js($the_core_less_variables['padding-large-vertical']); ?> <?php echo esc_js($the_core_less_variables['padding-large-horizontal']); ?>;
  font-size: <?php echo ceil(floatval($the_core_less_variables['fw-buttons-font-size'])*1.15); ?>px;
  line-height: <?php echo ceil(floatval($the_core_less_variables['fw-buttons-line-height'])*1.15); ?>px;
  background-color: <?php echo esc_js($the_core_less_variables['theme-color-2']); ?>;
  color: #fff;
}
.paging-navigation .page-numbers.prev i,
nav.woocommerce-pagination .page-numbers.prev i,
.paging-navigation .page-numbers.next i,
nav.woocommerce-pagination .page-numbers.next i {
  color: <?php echo esc_js($the_core_less_variables['theme-color-1']); ?>;
  font-size: 20px;
  line-height: 15px;
  position: relative;
  top: 1px;
}
.paging-navigation .page-numbers.prev:hover,
nav.woocommerce-pagination .page-numbers.prev:hover,
.paging-navigation .page-numbers.next:hover,
nav.woocommerce-pagination .page-numbers.next:hover {
  background-color: <?php echo esc_js($the_core_less_variables['theme-color-1']); ?>;
}
.paging-navigation .page-numbers.prev:hover i,
nav.woocommerce-pagination .page-numbers.prev:hover i,
.paging-navigation .page-numbers.next:hover i,
nav.woocommerce-pagination .page-numbers.next:hover i {
  color: #fff;
}
.paging-navigation .page-numbers.prev:active,
nav.woocommerce-pagination .page-numbers.prev:active,
.paging-navigation .page-numbers.next:active,
nav.woocommerce-pagination .page-numbers.next:active {
  box-shadow: inset 0 0 15px <?php echo the_core_adjustColorLightenDarken($the_core_less_variables['theme-color-1'], 20); ?>;
}
.paging-navigation .page-numbers.prev,
nav.woocommerce-pagination .page-numbers.prev {
  float: left;
  margin-left: 0;
}
.paging-navigation .page-numbers.prev i,
nav.woocommerce-pagination .page-numbers.prev i {
  margin-right: 10px;
}
.paging-navigation .page-numbers.next,
nav.woocommerce-pagination .page-numbers.next {
  float: right;
  margin-right: 0;
}
.paging-navigation .page-numbers.next i,
nav.woocommerce-pagination .page-numbers.next i {
  margin-left: 10px;
}
.paging-navigation .page-numbers.disabled,
nav.woocommerce-pagination .page-numbers.disabled {
  pointer-events: none;
  cursor: not-allowed;
  filter: alpha(opacity=65);
  -webkit-box-shadow: none;
  box-shadow: none;
  opacity: .65;
}
.paging-navigation .page-numbers.disabled:hover,
nav.woocommerce-pagination .page-numbers.disabled:hover {
  background: <?php echo esc_js($the_core_less_variables['theme-color-1']); ?>;
}
/* Blog Pagintation Type 1 */
.paging-navigation.paging-navigation-type-1 .before-hr,
nav.woocommerce-pagination.paging-navigation-type-1 .before-hr,
.paging-navigation.paging-navigation-type-1 .after-hr,
nav.woocommerce-pagination.paging-navigation-type-1 .after-hr {
  display: none;
}
.paging-navigation.paging-navigation-type-1 .pagination-numbers-wrap,
nav.woocommerce-pagination.paging-navigation-type-1 .pagination-numbers-wrap {
  display: inline-block;
}
/*  Blog Pagination Type 2 */
.paging-navigation.paging-navigation-type-2,
nav.woocommerce-pagination.paging-navigation-type-2 {
  font-size: 0;
  padding: 0;
  margin: 165px 0 105px;
  position: relative;
  background-color: transparent;
}
.paging-navigation.paging-navigation-type-2 .pagination-numbers-wrap,
nav.woocommerce-pagination.paging-navigation-type-2 .pagination-numbers-wrap {
  display: inline-block;
  line-height: 0;
}
.paging-navigation.paging-navigation-type-2 .pagination-numbers-wrap .page-numbers:first-child,
nav.woocommerce-pagination.paging-navigation-type-2 .pagination-numbers-wrap .page-numbers:first-child {
  padding-left: 38px;
}
.paging-navigation.paging-navigation-type-2 .pagination-numbers-wrap .page-numbers:last-child,
nav.woocommerce-pagination.paging-navigation-type-2 .pagination-numbers-wrap .page-numbers:last-child {
  padding-right: 38px;
}
.paging-navigation.paging-navigation-type-2 .before-hr,
nav.woocommerce-pagination.paging-navigation-type-2 .before-hr,
.paging-navigation.paging-navigation-type-2 .after-hr,
nav.woocommerce-pagination.paging-navigation-type-2 .after-hr {
  content: '';
  position: absolute;
  top: 50%;
  width: 100%;
  height: 1px;
  margin-top: -5px;
  background-color: #dbdbdb;
}
.paging-navigation.paging-navigation-type-2 .before-hr,
nav.woocommerce-pagination.paging-navigation-type-2 .before-hr {
  left: -100%;
}
.paging-navigation.paging-navigation-type-2 .after-hr,
nav.woocommerce-pagination.paging-navigation-type-2 .after-hr {
  right: -100%;
}
.paging-navigation.paging-navigation-type-2 .page-numbers,
nav.woocommerce-pagination.paging-navigation-type-2 .page-numbers {
  font-size: 15px;
  font-weight: 400;
  line-height: normal;
  color: <?php echo esc_js($the_core_less_variables['text-color']); ?>;
  padding: 0 10px;
  margin: 0;
}
.paging-navigation.paging-navigation-type-2 .page-numbers.disabled,
nav.woocommerce-pagination.paging-navigation-type-2 .page-numbers.disabled {
  opacity: 1;
  color: <?php echo the_core_adjustColorLightenDarken($the_core_less_variables['text-color'], -10); ?>;
}
.paging-navigation.paging-navigation-type-2 .page-numbers.current,
nav.woocommerce-pagination.paging-navigation-type-2 .page-numbers.current,
.paging-navigation.paging-navigation-type-2 .page-numbers.current:hover,
nav.woocommerce-pagination.paging-navigation-type-2 .page-numbers.current:hover {
  color: <?php echo the_core_adjustColorLightenDarken($the_core_less_variables['text-color'], -10); ?>;
}
.paging-navigation.paging-navigation-type-2 .page-numbers:hover,
nav.woocommerce-pagination.paging-navigation-type-2 .page-numbers:hover {
  color: <?php echo esc_js($the_core_less_variables['link-hover-color']); ?>;
}
.paging-navigation.paging-navigation-type-2 .prev.page-numbers,
nav.woocommerce-pagination.paging-navigation-type-2 .prev.page-numbers,
.paging-navigation.paging-navigation-type-2 .next.page-numbers,
nav.woocommerce-pagination.paging-navigation-type-2 .next.page-numbers {
  font-size: 14px;
  background-color: transparent;
}
.paging-navigation.paging-navigation-type-2 .prev.page-numbers strong,
nav.woocommerce-pagination.paging-navigation-type-2 .prev.page-numbers strong,
.paging-navigation.paging-navigation-type-2 .next.page-numbers strong,
nav.woocommerce-pagination.paging-navigation-type-2 .next.page-numbers strong {
  font-weight: 400;
}
.paging-navigation.paging-navigation-type-2 .prev.page-numbers i,
nav.woocommerce-pagination.paging-navigation-type-2 .prev.page-numbers i,
.paging-navigation.paging-navigation-type-2 .next.page-numbers i,
nav.woocommerce-pagination.paging-navigation-type-2 .next.page-numbers i {
  color: <?php echo esc_js($the_core_less_variables['text-color']); ?>;
  font-style: normal;
}
.paging-navigation.paging-navigation-type-2 .prev.page-numbers:hover i,
nav.woocommerce-pagination.paging-navigation-type-2 .prev.page-numbers:hover i,
.paging-navigation.paging-navigation-type-2 .next.page-numbers:hover i,
nav.woocommerce-pagination.paging-navigation-type-2 .next.page-numbers:hover i {
  color: <?php echo esc_js($the_core_less_variables['link-hover-color']); ?>;
}
.paging-navigation.paging-navigation-type-2 .prev.page-numbers:focus,
nav.woocommerce-pagination.paging-navigation-type-2 .prev.page-numbers:focus,
.paging-navigation.paging-navigation-type-2 .next.page-numbers:focus,
nav.woocommerce-pagination.paging-navigation-type-2 .next.page-numbers:focus,
.paging-navigation.paging-navigation-type-2 .prev.page-numbers:active,
nav.woocommerce-pagination.paging-navigation-type-2 .prev.page-numbers:active,
.paging-navigation.paging-navigation-type-2 .next.page-numbers:active,
nav.woocommerce-pagination.paging-navigation-type-2 .next.page-numbers:active {
  box-shadow: none;
}
.paging-navigation.paging-navigation-type-2 .prev.page-numbers,
nav.woocommerce-pagination.paging-navigation-type-2 .prev.page-numbers {
  padding: 0 17px 0 0;
  position: relative;
}
.paging-navigation.paging-navigation-type-2 .next.page-numbers,
nav.woocommerce-pagination.paging-navigation-type-2 .next.page-numbers {
  padding: 0 0 0 17px;
}
/* pagination for comments */
.paging-navigation.comment-navigation,
nav.woocommerce-pagination.comment-navigation {
  padding: 0;
  background-color: transparent;
  text-align: left;
}
.paging-navigation.comment-navigation .loop-pagination,
nav.woocommerce-pagination.comment-navigation .loop-pagination {
  text-align: left;
}
.paging-navigation.comment-navigation .page-numbers,
nav.woocommerce-pagination.comment-navigation .page-numbers {
  border: 2px solid <?php echo esc_js($the_core_less_variables['theme-color-2']); ?>;
  padding: <?php echo esc_js($the_core_less_variables['padding-small-vertical']); ?> <?php echo esc_js($the_core_less_variables['padding-small-horizontal']); ?>;
  font-size: <?php echo ceil(floatval($the_core_less_variables['fw-buttons-font-size'])*1.15); ?>px;
  line-height: <?php echo esc_js($the_core_less_variables['fw-buttons-line-height']); ?>;
  float: none;
  margin: 5px;
}
.paging-navigation.comment-navigation .page-numbers.prev,
nav.woocommerce-pagination.comment-navigation .page-numbers.prev,
.paging-navigation.comment-navigation .page-numbers.next,
nav.woocommerce-pagination.comment-navigation .page-numbers.next {
  text-transform: uppercase;
  background-color: transparent;
  color: <?php echo esc_js($the_core_less_variables['theme-color-2']); ?>;
}
.paging-navigation.comment-navigation .page-numbers.prev i,
nav.woocommerce-pagination.comment-navigation .page-numbers.prev i,
.paging-navigation.comment-navigation .page-numbers.next i,
nav.woocommerce-pagination.comment-navigation .page-numbers.next i {
  margin: 0;
  color: <?php echo esc_js($the_core_less_variables['theme-color-2']); ?>;
  font-size: 20px;
  font-weight: bold;
}
.paging-navigation.comment-navigation .page-numbers:hover,
nav.woocommerce-pagination.comment-navigation .page-numbers:hover,
.paging-navigation.comment-navigation .page-numbers.current,
nav.woocommerce-pagination.comment-navigation .page-numbers.current {
  color: <?php echo esc_js($the_core_less_variables['theme-color-1']); ?>;
  border-color: <?php echo esc_js($the_core_less_variables['theme-color-1']); ?>;
}
.paging-navigation.comment-navigation .page-numbers:hover i,
nav.woocommerce-pagination.comment-navigation .page-numbers:hover i,
.paging-navigation.comment-navigation .page-numbers.current i,
nav.woocommerce-pagination.comment-navigation .page-numbers.current i {
  color: <?php echo esc_js($the_core_less_variables['theme-color-1']); ?>;;
}
.paging-navigation.comment-navigation .page-numbers span,
nav.woocommerce-pagination.comment-navigation .page-numbers span {
  display: none;
}

/* Pages in Post */
.page-links .page-links-title {
  font-weight: bold;
  margin: 0 5px 0 0;
  color: inherit;
}
.page-links a {
  color: <?php echo esc_js($the_core_less_variables['theme-color-2']); ?>;
  display: inline-block;
  line-height: <?php echo esc_js($the_core_less_variables['line-height-large']); ?>;
  margin-left: 10px;
  margin-right: 10px;
  font-size: 18px;
  padding: 0;
  -webkit-transition: all 0.2s ease;
  -o-transition: all 0.2s ease;
  transition: all 0.2s ease;
}
.page-links a:hover,
.page-links a.current {
  color: <?php echo esc_js($the_core_less_variables['theme-color-1']); ?>;
}
.page-links a.dots {
  color: <?php echo esc_js($the_core_less_variables['theme-color-2']); ?>;
}
.page-links a.prev,
.page-links a.next {
  text-transform: uppercase;
  padding: <?php echo esc_js($the_core_less_variables['padding-large-vertical']); ?> <?php echo esc_js($the_core_less_variables['padding-large-horizontal']); ?>;
  font-size: <?php echo ceil(floatval($the_core_less_variables['fw-buttons-font-size'])*1.15); ?>px;
  line-height: <?php echo ceil(floatval($the_core_less_variables['fw-buttons-line-height'])*1.15); ?>px;
  background-color: <?php echo esc_js($the_core_less_variables['theme-color-2']); ?>;
  color: #fff;
}
.page-links a.prev i,
.page-links a.next i {
  color: <?php echo esc_js($the_core_less_variables['theme-color-1']); ?>;
  font-size: 20px;
  line-height: 15px;
  position: relative;
  top: 1px;
}
.page-links a.prev:hover,
.page-links a.next:hover {
  background-color: <?php echo esc_js($the_core_less_variables['theme-color-1']); ?>;
}
.page-links a.prev:hover i,
.page-links a.next:hover i {
  color: #fff;
}
.page-links a.prev:active,
.page-links a.next:active {
  box-shadow: inset 0 0 15px <?php echo the_core_adjustColorLightenDarken($the_core_less_variables['theme-color-1'], 20); ?>;
}
.page-links a.prev {
  float: left;
  margin-left: 0;
}
.page-links a.prev i {
  margin-right: 10px;
}
.page-links a.next {
  float: right;
  margin-right: 0;
}
.page-links a.next i {
  margin-left: 10px;
}
.page-links a.disabled {
  pointer-events: none;
  cursor: not-allowed;
  filter: alpha(opacity=65);
  -webkit-box-shadow: none;
  box-shadow: none;
  opacity: .65;
}
.page-links a.disabled:hover {
  background: <?php echo esc_js($the_core_less_variables['theme-color-2']); ?>;
}
.page-links > span {
  display: inline-block;
  color: <?php echo esc_js($the_core_less_variables['theme-color-2']); ?>;
  font-weight: bold;
  margin: 2px;
}

/* Blog Post Navigation */
.blog-post-navigation {
  margin-bottom: <?php echo ceil(floatval($the_core_less_variables['fw-space-between-elements-md'])*0.85); ?>px;
  padding: 0 15px;
}
.blog-post-navigation a {
  display: inline-block;
  width: 49%;
  height: 180px;
  background-color: <?php echo the_core_hex2rgba($the_core_less_variables['text-color'], 0.1); ?>;
  position: relative;
  text-align: center;
  padding: 0 50px;
  font-weight: normal;
  color: <?php echo esc_js($the_core_less_variables['text-color']); ?> !important;
  font-size: 14px !important;
}
.blog-post-navigation a i {
  position: absolute;
  top: 50%;
  margin-top: -37px;
  left: 15px;
  font-size: 70px;
  color: <?php echo the_core_hex2rgba($the_core_less_variables['text-color'], 0.2); ?>;
}
.blog-post-navigation a[rel="prev"] {
  padding-left: 75px;
}
.blog-post-navigation a[rel="next"] {
  float: right;
  padding-right: 75px;
}
.blog-post-navigation a[rel="next"] i {
  left: auto;
  right: 15px;
}
.blog-post-navigation a span {
  font-size: 15px !important;
  font-family: <?php echo ($the_core_less_variables['fw-buttons-font-family']); ?> !important;
  font-weight: normal !important;
  font-style: <?php echo esc_js($the_core_less_variables['fw-buttons-font-style']); ?> !important;
  color: <?php echo the_core_adjustColorLightenDarken($the_core_less_variables['text-color'], 50); ?> !important;
  margin-bottom: 10px;
  display: block;
  text-transform: uppercase !important;
}
.blog-post-navigation a strong,
.blog-post-navigation a strong span {
  font-family: <?php echo ($the_core_less_variables['fw-buttons-font-family']); ?> !important;
  font-size: 14px !important;
  line-height: 28px !important;
  font-style: <?php echo esc_js($the_core_less_variables['fw-buttons-font-style']); ?> !important;
  font-weight: 400 !important;
  letter-spacing: 0 !important;
  color: <?php echo esc_js($the_core_less_variables['text-color']); ?> !important;
}
.blog-post-navigation a:hover {
  opacity: 0.8;
}

/*Responsive*/
/* Screen 568px */
@media(max-width:767px){
  .paging-navigation,
  .woocommerce nav.woocommerce-pagination {
    padding: 20px 0;
  }
  .blog-post-navigation{
    margin-bottom: <?php echo ceil(floatval($the_core_less_variables['fw-space-between-elements-md'])*0.5); ?>px;
    overflow: hidden;
  }
  .paging-navigation.paging-navigation-type-1 .page-numbers,
  .woocommerce nav.woocommerce-pagination.paging-navigation-type-1 .page-numbers {
    display: none;
  }
  .paging-navigation .prev.page-numbers,
  .paging-navigation .next.page-numbers,
  .woocommerce nav.woocommerce-pagination .prev.page-numbers,
  .woocommerce nav.woocommerce-pagination .next.page-numbers {
    display: inline-block;
  }
}

/* Screen 320px */
@media(max-width:479px){
  .blog-post-navigation a{
    width: 100%;
  }
  .blog-post-navigation a i{
    color: <?php echo the_core_hex2rgba($the_core_less_variables['text-color'], 0.4); ?>;
  }
  .paging-navigation .prev.page-numbers,
  .paging-navigation .next.page-numbers,
  .woocommerce nav.woocommerce-pagination .prev.page-numbers,
  .woocommerce nav.woocommerce-pagination .next.page-numbers {
    float: none;
    margin: 0 auto;
  }
  .paging-navigation .next.page-numbers,
  .woocommerce nav.woocommerce-pagination .next.page-numbers{
    margin-top: 20px;
  }
  .paging-navigation.paging-navigation-type-2 .pagination-numbers-wrap,
  nav.woocommerce-pagination.paging-navigation-type-2 .pagination-numbers-wrap {
    display: none;
  }
}