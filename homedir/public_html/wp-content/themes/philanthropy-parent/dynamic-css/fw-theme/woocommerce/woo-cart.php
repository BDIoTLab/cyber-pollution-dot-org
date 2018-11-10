/* Woocommerce Cart */
/* -------------------------------------------------- */
.shop_table.cart .coupon input[type="text"].input-text,
.woocommerce-page .quantity .qty {
  height: <?php echo floatval($the_core_less_variables['padding-base-vertical'])*2 + floatval($the_core_less_variables['fw-buttons-line-height']); ?>px;
}
.shop_table.cart .cart_item .quantity .qty {
  height: auto;
}
.woocommerce div.product form.cart .variations td,
.woocommerce div.product form.cart .variations th {
  padding: .5em 0;
}
.woocommerce div.product form.cart .variations td label,
.woocommerce div.product form.cart .variations th label {
  line-height: <?php echo esc_js($the_core_less_variables['input-height-base']); ?>;
  display: inline-block;
}
.woocommerce div.product form.cart .variations td td.label,
.woocommerce div.product form.cart .variations th td.label {
  display: table-cell;
  color: inherit;
  font-size: 100%;
  text-align: left;
  padding: .5em 1em .5em 0;
}
.woocommerce ul.cart_list li,
.woocommerce ul.product_list_widget li {
  padding-top: 0.5em;
}
.woocommerce ul.cart_list li:after,
.woocommerce ul.product_list_widget li:after,
.woocommerce ul.cart_list li:before,
.woocommerce ul.product_list_widget li:before {
  content: " ";
  display: table;
}
.woocommerce ul.cart_list li:after,
.woocommerce ul.product_list_widget li:after {
  clear: both;
}
.woocommerce ul.cart_list li a,
.woocommerce ul.product_list_widget li a {
  display: block;
  font-weight: 700;
}
.woocommerce ul.cart_list li a.remove,
.woocommerce ul.product_list_widget li a.remove {
  top: 0.3em;
}
.woocommerce ul.cart_list li img,
.woocommerce ul.product_list_widget li img {
  width: 50px;
  background-color: #fff;
  padding: 5px;
}
/* Remove products icon */
.woocommerce-cart .woocommerce a.remove {
  color: <?php echo esc_js($the_core_less_variables['theme-color-1']); ?> !important;
}
.woocommerce-cart .woocommerce a.remove:hover {
  color: <?php echo esc_js($the_core_less_variables['theme-color-2']); ?> !important;
  background: none;
}
.woocommerce-cart .wc-proceed-to-checkout a.checkout-button {
  display: inline-block;
}
.woocommerce-cart .cart-collaterals .cart_totals {
  background-color: <?php echo the_core_hex2rgba($the_core_less_variables['text-color'], 0.1); ?>;
  padding: 15px 2%;
}
.woocommerce-cart .cart-collaterals .cart_totals .shipping .woocommerce-shipping-calculator{
  background-color: transparent;
  padding: 0;
}
.woocommerce-cart .cart-collaterals .cart_totals table tr td {
  color: <?php echo esc_js($the_core_less_variables['text-color']); ?>;
}
.woocommerce-cart .cart-collaterals .cart_totals table tr th {
  font-weight: bold;
}
.woocommerce-cart .cart-collaterals .cart_totals table tr td,
.woocommerce-cart .cart-collaterals .cart_totals table tr th {
  border-bottom-width: 1px;
}
.woocommerce-cart .cart-collaterals .cart_totals .discount td {
  color: <?php echo esc_js($the_core_less_variables['theme-color-1']); ?>;
}
.woocommerce-cart .cart-collaterals .cart_totals .amount {
  font-weight: bold;
  font-size: 120%;
}
.woocommerce-cart .cart-collaterals .cart_totals h2 {
  font-weight: bold;
}
.woocommerce-cart .cart-collaterals .cross-sells ul.products li.product {
  margin-top: 0;
  width: 48%;
}

/*----> Responsive <---- */
/* Screen 320px */
@media(max-width:479px){
  .woocommerce table.shop_table thead tr th.product-thumbnail,
  .woocommerce table.shop_table thead tr th.product-subtotal,
  .woocommerce table.shop_table tbody tr.cart_item td.product-thumbnail,
  .woocommerce table.shop_table tbody tr.cart_item td.product-subtotal {
    display: none;
  }
  .woocommerce table.shop_table thead tr td.product-remove,
  .woocommerce table.shop_table tbody tr.cart_item td.product-remove {
    padding-left: 2px;
  }
  .woocommerce table.shop_table thead tr td,
  .woocommerce table.shop_table tbody tr.cart_item td {
    padding-right: 0;
  }
}
