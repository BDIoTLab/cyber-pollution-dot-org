/* Woocommerce Products List */
/* -------------------------------------------------- */
.woocommerce ul.products li.product h3,
.woocommerce ul.products li.product .woocommerce-loop-product__title {
  font-size: <?php echo ceil(floatval($the_core_less_variables['fw-h3-font-size'])*0.7); ?>px;
  line-height: normal;
}
.woocommerce ul.products li.product a:hover h3,
.woocommerce ul.products li.product a:hover .woocommerce-loop-product__title {
  color: <?php echo esc_js($the_core_less_variables['theme-color-1']); ?>;
}
.woocommerce ul.products li.product .price {
  color: <?php echo esc_js($the_core_less_variables['theme-color-1']); ?>;
}
.woocommerce ul.products li.product .price del {
  color: <?php echo esc_js($the_core_less_variables['theme-color-3']); ?>;
}
.woocommerce ul.products li.product a.added_to_cart {
  font-size: <?php echo ceil(floatval($the_core_less_variables['font-size-base'])*0.85); ?>px;
}
.woocommerce .woocommerce-tabs .panel.entry-content h2,
.woocommerce .related.products h2,
.woocommerce #reviews h2,
.woocommerce .comment-respond h3.comment-reply-title {
  font-family: <?php echo ($the_core_less_variables['fw-h3-font-family']); ?>;
  font-size: <?php echo esc_js($the_core_less_variables['fw-h3-font-size']); ?> !important;
  font-style: <?php echo esc_js($the_core_less_variables['fw-h3-font-style']); ?>;
  line-height: <?php echo esc_js($the_core_less_variables['fw-h3-line-height']); ?>;
  font-weight: <?php echo esc_js($the_core_less_variables['fw-h3-font-weight']); ?>;
  letter-spacing: <?php echo esc_js($the_core_less_variables['fw-h3-letter-spacing']); ?>;
  color: <?php echo esc_js($the_core_less_variables['fw-h3-color']); ?> !important;
}
.woocommerce-page ul.products li.product {
  padding-bottom: 25px;
}
.woocommerce-page ul.products li.product a:hover img {
  opacity: 0.8;
}
.woocommerce ul.products li.product .price {
  font-weight: 700;
  font-size: 1.2em;
}
.woocommerce-page ul.products li.product .price del {
  float: right;
  opacity: 1;
}
.woocommerce-page ul.products li.product .price ins {
  text-decoration: none;
}
/* Woocommerce Link Added to Cart, Cart List, Product List Widget  */
.woocommerce-page ul.products li.product a.added_to_cart {
  margin-top: 0;
  line-height: normal;
  padding: 0;
  float: none;
  position: absolute;
  left: 0;
  bottom: 1%;
}
/* Product loading & ok added to cart icon */
.woocommerce-page ul.products li.product a.button.add_to_cart_button.loading:after {
  position: static;
  margin-left: .53em;
}
/* Ordering */
.woocommerce .woocommerce-ordering,
.woocommerce .woocommerce-result-count {
  line-height: <?php echo esc_js($the_core_less_variables['input-height-base']); ?>;
}
.woocommerce .woocommerce-ordering .selectize-input.focus {
  border-color: <?php echo esc_js($the_core_less_variables['theme-color-3']); ?>;
  -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, 0.2);
  box-shadow: 0 1px 1px rgba(0, 0, 0, 0.2);
}
.woocommerce-page .woocommerce-ordering,
.woocommerce-page .woocommerce-result-count {
  margin: 0 0 1em;
  color: #bfbfbf;
}
.woocommerce-page .woocommerce-ordering .selectize-input {
  padding: 8px 45px 8px 18px;
}
.woocommerce-page .woocommerce-ordering .selectize-input input[type="text"] {
  width: 0 !important;
}
.woocommerce .product span.onsale {
  background-color: <?php echo esc_js($the_core_less_variables['theme-color-3']); ?> !important;
  padding: 0 .202em !important;
  z-index: 10 !important;
}
/* Checkout */
.woocommerce-page form .form-row .selectize-control.select2-hidden-accessible,
.woocommerce-page form .form-row .selectize-dropdown.select2-hidden-accessible {
  border: inherit !important;
  height: auto !important;
  margin: auto !important;
  overflow: inherit !important;
  padding: inherit !important;
  position: inherit !important;
  width: auto !important;
}
/* Product Rating */
.woocommerce .product .star-rating {
  color: <?php echo esc_js($the_core_less_variables['theme-color-5']); ?>;
  display: block;
  margin: 0 0 .5em;
  float: none;
}
.woocommerce .product .star-rating:before {
  content: "\73\73\73\73\73";
  color: #d3ced2;
  float: left;
  top: 0;
  left: 0;
  position: absolute;
}
.woocommerce .product .star-rating span {
  overflow: hidden;
  float: left;
  top: 0;
  left: 0;
  position: absolute;
  padding-top: 1.5em;
}
.woocommerce .product .star-rating span:before {
  content: "\53\53\53\53\53";
  top: 0;
  position: absolute;
  left: 0;
}
/* Screen 568px */
@media(max-width:767px) {
  .woocommerce ul.products li.product,
  .woocommerce-page ul.products li.product {
    width: 48% !important;
  }
}
/* Screen 320px */
@media(max-width:479px){
  .woocommerce ul.products li.product,
  .woocommerce-page ul.products li.product {
    width: 100% !important;
  }
}
