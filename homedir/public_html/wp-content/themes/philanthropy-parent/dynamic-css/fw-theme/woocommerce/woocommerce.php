/* Woocommerce Style */
/* -------------------------------------------------- */
p.demo_store {
  background-color: #fff;
  color: #fff;
  box-shadow: 0 1px 1em rgba(0, 0, 0, 0.2);
}
/* Woocommerce Error, Info, Message style */
.woocommerce .woocommerce-error,
.woocommerce .woocommerce-info,
.woocommerce .woocommerce-message {
  background-color: #f7f6f7;
  border-top: 3px solid #fff;
}
.woocommerce .woocommerce-info,
.woocommerce .woocommerce-message {
  color: <?php echo esc_js($the_core_less_variables['text-color']); ?>;
}
/* => Error */
.woocommerce .woocommerce-error {
  border-top-color: red;
}
.woocommerce .woocommerce-error {
  color: red;
}
.woocommerce .woocommerce-error:before {
  content: "\e016";
  color: red;
}
/* => Info */
.woocommerce .woocommerce-info {
  border-top-color: #fff;
}
.woocommerce .woocommerce-info:before {
  color: <?php echo esc_js($the_core_less_variables['text-color']); ?>;
}
/* => Message */
.woocommerce .woocommerce-message {
  border-top-color: #fff;
}
.woocommerce .woocommerce-message:before {
  color: #fff;
}
.woocommerce.woocommerce-page .woocommerce-message:before{
  color: #8fae1b;
}
/* Woocommerce Breadcrumb */
.woocommerce .woocommerce-breadcrumb a {
  color: <?php echo esc_js($the_core_less_variables['theme-color-2']); ?>;
}
.woocommerce .woocommerce-breadcrumb a:hover {
  color: <?php echo esc_js($the_core_less_variables['theme-color-1']); ?>;
}
/* Woocommerce Titles */
.woocommerce .page-title,
.woocommerce div.product .product_title {
  font-family: <?php echo ($the_core_less_variables['fw-h2-font-family']); ?>;
  font-size: <?php echo esc_js($the_core_less_variables['fw-h2-font-size']); ?>;
  font-weight: <?php echo esc_js($the_core_less_variables['fw-h2-font-weight']); ?>;
  font-style: <?php echo esc_js($the_core_less_variables['fw-h2-font-style']); ?>;
  line-height: <?php echo esc_js($the_core_less_variables['fw-h2-line-height']); ?>;
  letter-spacing: <?php echo esc_js($the_core_less_variables['fw-h2-letter-spacing']); ?>;
  color: <?php echo esc_js($the_core_less_variables['fw-h2-color']); ?>;
}
.woocommerce .comment-reply-title {
  font-size: 34px;
}
.woocommerce .product h2,
.woocommerce .addresses h3,
.woocommerce h3 {
  font-size: 26px;
}
.woocommerce .cart-collaterals h2 {
  font-size: 22px;
}
/* Woocommerce Pagination note: styling for woocommerce pagination find in file pagination.css */

/* Woocommerce LogIn form */
.woocommerce form.login,
.woocommerce form.register,
.woocommerce .addresses .address {
  padding: 20px;
  background-color: #f2f2f2;
}
/* Woocommerce Shop Table */
.woocommerce table.shop_table {
  border-radius: 0;
}
.woocommerce table.shop_table tbody td {
  color: <?php echo esc_js($the_core_less_variables['text-color']); ?>;
  font-size: 100%;
}
.woocommerce table.shop_table tbody td small {
  font-weight: 400;
}
.woocommerce table.shop_table tbody td.actions {
  padding-top: 20px;
  padding-bottom: 20px;
  border-bottom: none;
}
.woocommerce table.shop_table tbody td.actions .coupon .input-text {
  padding: 0 6px;
  width: 130px;
  line-height: 36px;
}
.woocommerce table.shop_table thead tr th,
.woocommerce table.shop_table tbody tr td {
  font-weight: 400;
  border: none;
}
.woocommerce table.shop_table thead tr th {
  color: <?php echo esc_js($the_core_less_variables['text-color']); ?>;
}
.woocommerce table.shop_table tbody td .amount {
  color: <?php echo esc_js($the_core_less_variables['text-color']); ?>;
}
.woocommerce table.shop_table thead tr th,
.woocommerce table.shop_table tbody tr td {
  border-bottom: 1px solid rgba(0, 0, 0, 0.1);
}
/* Woocommerce Entry Content Titles */
.entry-content .woocommerce h2 {
  font-size: 26px;
}

/* Woocommerce Other Style */
.woocommerce form .form-row input.input-text {
  line-height: <?php echo esc_js($the_core_less_variables['input-line-height']); ?>;
}