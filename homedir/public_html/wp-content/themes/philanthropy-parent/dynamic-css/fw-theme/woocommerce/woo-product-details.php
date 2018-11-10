/* Woocommerce Product Details */
/* -------------------------------------------------- */
.woocommerce div.product p.price {
  color: <?php echo esc_js($the_core_less_variables['theme-color-1']); ?>;
}
.woocommerce div.product p.price del {
  color: <?php echo esc_js($the_core_less_variables['theme-color-3']); ?>;
}
.woocommerce div.product p.price ins {
  color: <?php echo esc_js($the_core_less_variables['theme-color-1']); ?>;
}
/* => Product Gallery */
.woocommerce div.product div.images .woocommerce-product-gallery__image:nth-child(n+2) {
  width: 30.75%;
}
.woocommerce div.product div.images .woocommerce-product-gallery__image:nth-child(3n+1) {
  margin-right: 0;
}
.woocommerce .woocommerce-product-gallery__wrapper .woocommerce-product-gallery__image {
  margin-right: 3.8%;
  margin-bottom: 0.6em;
}
.woocommerce .woocommerce-product-gallery__wrapper .woocommerce-product-gallery__image > a {
  display: block;
}
.woocommerce .woocommerce-product-gallery__wrapper .woocommerce-product-gallery__image:first-child {
  margin-bottom: 1em;
}

/* => Stock */
.woocommerce div.product .stock {
  color: <?php echo esc_js($the_core_less_variables['theme-color-1']); ?>;
}
/* => Woocommerce Tabs */
.woocommerce div.product .woocommerce-tabs ul.tabs li a {
  color: <?php echo esc_js($the_core_less_variables['text-color']); ?>;
}
.woocommerce div.product .woocommerce-tabs ul.tabs li a:hover {
  color: <?php echo esc_js($the_core_less_variables['theme-color-1']); ?>;
}
.woocommerce div.product .woocommerce-tabs ul.tabs li.active a {
  color: <?php echo esc_js($the_core_less_variables['theme-color-1']); ?>;
}
/* Woocommerce Product Rating */
.woocommerce .woocommerce-product-rating .star-rating {
  color: <?php echo esc_js($the_core_less_variables['theme-color-5']); ?>;
}
/* Woocommerce Reviews */
.woocommerce #reviews #comments ol.commentlist {
  margin: <?php echo esc_js($the_core_less_variables['fw-space-between-elements-sm']); ?> 0;
}
.woocommerce #reviews #review_form #respond p.stars a {
  color: <?php echo the_core_adjustColorLightenDarken($the_core_less_variables['theme-color-2'], -15); ?>;
}
.woocommerce-page div.product {
  margin-top: 30px;
}
.woocommerce-page div.product p.price {
  font-size: 1.25em;
}
/* => Stock */
.woocommerce-page div.product .out-of-stock {
  /*color: #fff;*/
}
/* => Woocommerce Tabs */
.woocommerce-page div.product .woocommerce-tabs ul.tabs li {
  padding: 0 2em;
}
.woocommerce-page div.product .woocommerce-tabs ul.tabs li.active {
  background: #fff;
  border-bottom-color: #fff;
}
.woocommerce-page div.product .woocommerce-tabs ul.tabs li.active a {
  text-shadow: inherit;
}
/* => Woocommerce Tabs Comment Form */
.woocommerce-page div.product .woocommerce-tabs .comment-form {
  position: relative;
  margin-top: 20px;
}
.woocommerce-page div.product .woocommerce-tabs .comment-form p {
  width: 100%;
  float: none;
}
.woocommerce-page div.product .woocommerce-tabs .comment-form .form-submit {
  clear: both;
  padding: 0;
}
/* Woocommerce Product Rating */
.woocommerce-page .woocommerce-product-rating {
  line-height: 2;
  display: block;
}
.woocommerce-page .woocommerce-product-rating:after,
.woocommerce-page .woocommerce-product-rating:before {
  content: " ";
  display: table;
}
.woocommerce-page .woocommerce-product-rating:after {
  clear: both;
}
.woocommerce-page .woocommerce-product-rating .star-rating {
  margin: .5em 4px 0 0;
  float: left;
}
.woocommerce-page .hreview-aggregate .star-rating {
  margin: 10px 0 0;
}
/* Woocommerce Quantity */
.woocommerce-page .quantity .qty {
  width: 68px;
  text-align: center;
  font-size: 19px;
  line-height: 28px;
  margin-right: 0.5em;
  border: 1px solid #ccc;
}
/* Woocommerce Respond (Buttons) */
.woocommerce-page #respond input#submit,
.woocommerce-page a.button,
.woocommerce-page button.button,
.woocommerce-page input.button {
  line-height: normal !important;
}
.woocommerce-page #respond input#submit.alt,
.woocommerce-page a.button.alt,
.woocommerce-page button.button.alt,
.woocommerce-page input.button.alt {
  line-height: normal !important;
}
.woocommerce #respond input#submit,
.woocommerce a.button,
.woocommerce button.button,
.woocommerce input.button,
.woocommerce #respond input#submit.alt,
.woocommerce a.button.alt,
.woocommerce button.button.alt,
.woocommerce input.button.alt {
  /* fw-btn */
  font-family: <?php echo ($the_core_less_variables['fw-buttons-font-family']); ?>;
  font-weight: <?php echo esc_js($the_core_less_variables['fw-buttons-font-weight']); ?>;
  font-style: <?php echo esc_js($the_core_less_variables['fw-buttons-font-style']); ?>;
  font-size: <?php echo esc_js($the_core_less_variables['fw-buttons-font-size']); ?>;
  line-height: <?php echo esc_js($the_core_less_variables['fw-buttons-line-height']); ?> !important;
  letter-spacing: <?php echo esc_js($the_core_less_variables['fw-buttons-letter-spacing']); ?>;
  color: #fff !important;
  display: inline-block;
  margin-bottom: 0;
  text-align: center;
  vertical-align: middle;
  cursor: pointer;
  background-image: none;
  border: 1px solid transparent;
  text-decoration: none;
  white-space: nowrap;
  outline: none;
  position: relative;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
  -webkit-transition: all 0.3s ease;
  -o-transition: all 0.3s ease;
  transition: all 0.3s ease;
  max-width: 100%;
  /* fw-btn-1 */
  background-color: <?php echo esc_js($the_core_less_variables['fw-btn-bg-color']); ?>;
  border-color: <?php echo esc_js($the_core_less_variables['fw-btn-border-color']); ?>;
  border-width: <?php echo esc_js($the_core_less_variables['fw-btn-border-width']); ?>;
  border-radius: <?php echo esc_js($the_core_less_variables['fw-btn-radius']); ?>;
  /* fw-btn-md */
  padding: <?php echo esc_js($the_core_less_variables['padding-base-vertical']); ?> <?php echo esc_js($the_core_less_variables['padding-base-horizontal']); ?>;
  font-size: <?php echo esc_js($the_core_less_variables['fw-buttons-font-size']); ?>;
  line-height: <?php echo esc_js($the_core_less_variables['fw-buttons-line-height']); ?> ;
}
.woocommerce #respond input#submit span,
.woocommerce a.button span,
.woocommerce button.button span,
.woocommerce input.button span,
.woocommerce #respond input#submit.alt span,
.woocommerce a.button.alt span,
.woocommerce button.button.alt span,
.woocommerce input.button.alt span,
.woocommerce #respond input#submit i,
.woocommerce a.button i,
.woocommerce button.button i,
.woocommerce input.button i,
.woocommerce #respond input#submit.alt i,
.woocommerce a.button.alt i,
.woocommerce button.button.alt i,
.woocommerce input.button.alt i {
  position: relative;
  top: 1px;
}
.woocommerce #respond input#submit:hover,
.woocommerce a.button:hover,
.woocommerce button.button:hover,
.woocommerce input.button:hover,
.woocommerce #respond input#submit.alt:hover,
.woocommerce a.button.alt:hover,
.woocommerce button.button.alt:hover,
.woocommerce input.button.alt:hover,
.woocommerce #respond input#submit:focus,
.woocommerce a.button:focus,
.woocommerce button.button:focus,
.woocommerce input.button:focus,
.woocommerce #respond input#submit.alt:focus,
.woocommerce a.button.alt:focus,
.woocommerce button.button.alt:focus,
.woocommerce input.button.alt:focus {
  text-decoration: none;
  outline: none;
}
.woocommerce #respond input#submit i,
.woocommerce a.button i,
.woocommerce button.button i,
.woocommerce input.button i,
.woocommerce #respond input#submit.alt i,
.woocommerce a.button.alt i,
.woocommerce button.button.alt i,
.woocommerce input.button.alt i,
.woocommerce #respond input#submit img,
.woocommerce a.button img,
.woocommerce button.button img,
.woocommerce input.button img,
.woocommerce #respond input#submit.alt img,
.woocommerce a.button.alt img,
.woocommerce button.button.alt img,
.woocommerce input.button.alt img {
  margin-right: 13px;
}
.woocommerce #respond input#submit i.pull-right,
.woocommerce a.button i.pull-right,
.woocommerce button.button i.pull-right,
.woocommerce input.button i.pull-right,
.woocommerce #respond input#submit.alt i.pull-right,
.woocommerce a.button.alt i.pull-right,
.woocommerce button.button.alt i.pull-right,
.woocommerce input.button.alt i.pull-right,
.woocommerce #respond input#submit img.pull-right,
.woocommerce a.button img.pull-right,
.woocommerce button.button img.pull-right,
.woocommerce input.button img.pull-right,
.woocommerce #respond input#submit.alt img.pull-right,
.woocommerce a.button.alt img.pull-right,
.woocommerce button.button.alt img.pull-right,
.woocommerce input.button.alt img.pull-right,
.woocommerce #respond input#submit i.pull-right-icon,
.woocommerce a.button i.pull-right-icon,
.woocommerce button.button i.pull-right-icon,
.woocommerce input.button i.pull-right-icon,
.woocommerce #respond input#submit.alt i.pull-right-icon,
.woocommerce a.button.alt i.pull-right-icon,
.woocommerce button.button.alt i.pull-right-icon,
.woocommerce input.button.alt i.pull-right-icon,
.woocommerce #respond input#submit img.pull-right-icon,
.woocommerce a.button img.pull-right-icon,
.woocommerce button.button img.pull-right-icon,
.woocommerce input.button img.pull-right-icon,
.woocommerce #respond input#submit.alt img.pull-right-icon,
.woocommerce a.button.alt img.pull-right-icon,
.woocommerce button.button.alt img.pull-right-icon,
.woocommerce input.button.alt img.pull-right-icon {
  margin-right: 0;
  margin-left: 13px;
  position: relative;
}
.woocommerce #respond input#submit i.pull-right,
.woocommerce a.button i.pull-right,
.woocommerce button.button i.pull-right,
.woocommerce input.button i.pull-right,
.woocommerce #respond input#submit.alt i.pull-right,
.woocommerce a.button.alt i.pull-right,
.woocommerce button.button.alt i.pull-right,
.woocommerce input.button.alt i.pull-right,
.woocommerce #respond input#submit img.pull-right,
.woocommerce a.button img.pull-right,
.woocommerce button.button img.pull-right,
.woocommerce input.button img.pull-right,
.woocommerce #respond input#submit.alt img.pull-right,
.woocommerce a.button.alt img.pull-right,
.woocommerce button.button.alt img.pull-right,
.woocommerce input.button.alt img.pull-right {
  top: 0.3em;
}
.woocommerce #respond input#submit img,
.woocommerce a.button img,
.woocommerce button.button img,
.woocommerce input.button img,
.woocommerce #respond input#submit.alt img,
.woocommerce a.button.alt img,
.woocommerce button.button.alt img,
.woocommerce input.button.alt img {
  position: relative;
  top: -0.1em;
}
.woocommerce #respond input#submit i,
.woocommerce a.button i,
.woocommerce button.button i,
.woocommerce input.button i,
.woocommerce #respond input#submit.alt i,
.woocommerce a.button.alt i,
.woocommerce button.button.alt i,
.woocommerce input.button.alt i {
  top: -1px;
  vertical-align: middle;
}
/* Button side by side */
.woocommerce #respond input#submit.fw-btn-side-by-side,
.woocommerce a.button.fw-btn-side-by-side,
.woocommerce button.button.fw-btn-side-by-side,
.woocommerce input.button.fw-btn-side-by-side,
.woocommerce #respond input#submit.alt.fw-btn-side-by-side,
.woocommerce a.button.alt.fw-btn-side-by-side,
.woocommerce button.button.alt.fw-btn-side-by-side,
.woocommerce input.button.alt.fw-btn-side-by-side {
  margin-right: 10px;
}
.woocommerce #respond input#submit.fw-btn-side-by-side:last-child,
.woocommerce a.button.fw-btn-side-by-side:last-child,
.woocommerce button.button.fw-btn-side-by-side:last-child,
.woocommerce input.button.fw-btn-side-by-side:last-child,
.woocommerce #respond input#submit.alt.fw-btn-side-by-side:last-child,
.woocommerce a.button.alt.fw-btn-side-by-side:last-child,
.woocommerce button.button.alt.fw-btn-side-by-side:last-child,
.woocommerce input.button.alt.fw-btn-side-by-side:last-child {
  margin-right: 0;
}
.woocommerce #respond input#submit:focus,
.woocommerce a.button:focus,
.woocommerce button.button:focus,
.woocommerce input.button:focus,
.woocommerce #respond input#submit.alt:focus,
.woocommerce a.button.alt:focus,
.woocommerce button.button.alt:focus,
.woocommerce input.button.alt:focus {
  background-color: <?php echo esc_js($the_core_less_variables['fw-btn-bg-color']); ?>;
  border-color: <?php echo esc_js($the_core_less_variables['fw-btn-border-color']); ?>;
  color: <?php echo esc_js($the_core_less_variables['fw-btn-text-color']); ?>;
}
.woocommerce #respond input#submit:hover,
.woocommerce a.button:hover,
.woocommerce button.button:hover,
.woocommerce input.button:hover,
.woocommerce #respond input#submit.alt:hover,
.woocommerce a.button.alt:hover,
.woocommerce button.button.alt:hover,
.woocommerce input.button.alt:hover {
  background-color: <?php echo esc_js($the_core_less_variables['fw-btn-bg-color-hover']); ?>;
  color: #fff !important;
}
.woocommerce #respond input#submit:active,
.woocommerce a.button:active,
.woocommerce button.button:active,
.woocommerce input.button:active,
.woocommerce #respond input#submit.alt:active,
.woocommerce a.button.alt:active,
.woocommerce button.button.alt:active,
.woocommerce input.button.alt:active {
  box-shadow: none;
}
.woocommerce #respond input#submit.alt.disabled,
.woocommerce #respond input#submit.alt.disabled:hover,
.woocommerce #respond input#submit.alt:disabled,
.woocommerce #respond input#submit.alt:disabled:hover,
.woocommerce #respond input#submit.alt:disabled[disabled],
.woocommerce #respond input#submit.alt:disabled[disabled]:hover,
.woocommerce a.button.alt.disabled,
.woocommerce a.button.alt.disabled:hover,
.woocommerce a.button.alt:disabled,
.woocommerce a.button.alt:disabled:hover,
.woocommerce a.button.alt:disabled[disabled],
.woocommerce a.button.alt:disabled[disabled]:hover,
.woocommerce button.button.alt.disabled,
.woocommerce button.button.alt.disabled:hover,
.woocommerce button.button.alt:disabled,
.woocommerce button.button.alt:disabled:hover,
.woocommerce button.button.alt:disabled[disabled],
.woocommerce button.button.alt:disabled[disabled]:hover,
.woocommerce input.button.alt.disabled,
.woocommerce input.button.alt.disabled:hover,
.woocommerce input.button.alt:disabled,
.woocommerce input.button.alt:disabled:hover,
.woocommerce input.button.alt:disabled[disabled],
.woocommerce input.button.alt:disabled[disabled]:hover {
  background-color: <?php echo the_core_adjustColorLightenDarken($the_core_less_variables['fw-btn-bg-color'], -10); ?>;
}

/* Woocommerce Reviews */
.woocommerce-page #reviews #comments ol.commentlist li:last-child {
  margin-bottom: 0;
}
.woocommerce-page #reviews #review_form #respond {
  position: static;
  margin: 0;
  width: auto;
  padding: 0;
  background: 0 0;
  border: 0;
}
.woocommerce-page #reviews #review_form #respond:after,
.woocommerce-page #reviews #review_form #respond:before {
  content: " ";
  display: table;
}

/* Attributes & variation */
.woocommerce table.shop_attributes td {
  padding: 8px;
}
.woocommerce table.shop_attributes td p {
  padding: 0;
}
.woocommerce .variations td.label {
  display: table-cell;
  text-align: left;
  padding-top: 20px !important;
  width: 1%;
}
.woocommerce .variations td.label label {
  font-family: <?php echo ($the_core_less_variables['form-label-font-family']); ?>;
  font-size: <?php echo esc_js($the_core_less_variables['form-label-font-size']); ?>;
  font-style: <?php echo esc_js($the_core_less_variables['form-label-font-style']); ?>;
  font-weight: <?php echo esc_js($the_core_less_variables['form-label-font-weight']); ?>;
  line-height: <?php echo esc_js($the_core_less_variables['form-label-line-height']); ?>;
  letter-spacing: <?php echo esc_js($the_core_less_variables['form-label-letter-spacing']); ?>;
  color: <?php echo esc_js($the_core_less_variables['form-label-color']); ?>;
  text-transform: <?php echo esc_js($the_core_less_variables['form-label-text-transform']); ?>;
  margin: 0;
}
.woocommerce div.product form.cart .variations tr td,
.woocommerce div.product form.cart .variations tr th {
  line-height: inherit;
  vertical-align: middle;
  padding: 0;
}
.woocommerce div.product form.cart .variations td.value {
  position: relative;
}
.woocommerce div.product form.cart .reset_variations {
  display: none !important;
}
.woocommerce .variations td.label {
    padding: 2em 1em !important;
}

/* Related */
.has-sidebar.woocommerce-page .related ul.products li.product,
.has-sidebar.woocommerce-page .upsells.products ul.products li.product,
.has-sidebar.woocommerce-page .related ul li.product,
.has-sidebar.woocommerce-page .upsells.products ul li.product{
  width: 40%;
}
.woocommerce-page .related ul.products li.product,
.woocommerce-page .upsells.products ul.products li.product,
.woocommerce-page .related ul li.product,
.woocommerce-page .upsells.products ul li.product {
  width: 22%;
}
.woocommerce-page .logged-in .comment-respond .comment-form p {
  width: 100%;
  float: none;
}
.woocommerce-page ul#shipping_method li {
  padding: .25em 0 .25em 0;
  text-indent: 0;
}
.woocommerce.single-product .related.products {
  float: left;
  width: 100%;
  display: block;
}

/* Screen 320px */
@media(max-width:479px){
  .woocommerce-page .related ul.products li.product,
  .woocommerce-page .related ul li.product {
    width: 100% !important;
  }
}
