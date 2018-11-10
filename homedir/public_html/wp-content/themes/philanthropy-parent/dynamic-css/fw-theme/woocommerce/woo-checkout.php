/* Woocommerce Checkout */
/* -------------------------------------------------- */
.woocommerce-checkout .checkout h3 {
  margin-top: 1em;
}
.checkout_coupon {
  background-color: <?php echo the_core_hex2rgba($the_core_less_variables['text-color'], 0.1); ?>;
  padding: 30px !important;
  border-radius: 0 !important;
}
.checkout_coupon p {
  margin-bottom: 0 !important;
}
.woocommerce-checkout form.checkout_coupon {
  border: none;
  padding: 0;
}
.woocommerce-checkout-review-order .order-total .amount {
  background-color: #fff8cf;
  padding: 0 2px;
}
.woocommerce-checkout-review-order table.shop_table {
  border-radius: 0;
}
.woocommerce-checkout-review-order table.shop_table thead tr th {
  font-weight: 700;
}
.woocommerce-checkout-review-order table.shop_table tbody td {
  font-size: 100%;
  font-weight: 400;
}
.woocommerce-checkout-review-order table.shop_table tfoot {
  color: <?php echo esc_js($the_core_less_variables['theme-color-2']); ?>;
}
.woocommerce-checkout-review-order table.shop_table tfoot td {
  border-right: none;
}
.woocommerce-checkout-review-order table.shop_table tfoot tr.order-total .amount {
  color: #fff;
  padding: 2px 5px;
  background-color: <?php echo esc_js($the_core_less_variables['theme-color-1']); ?>;
}
.woocommerce-checkout-review-order #payment {
  background: #f2f2f2;
  border-radius: 0;
}
.woocommerce-checkout-review-order #payment div.payment_box:after {
  top: 1px;
}
.woocommerce-checkout-review-order #payment .about_paypal {
  margin-left: 5px;
  float: none !important;
}
.woocommerce label {
  font-weight: bold;
}
.woocommerce-checkout .select2-container,
.woocommerce-checkout .select2-drop {
  font-family: <?php echo ($the_core_less_variables['fw-buttons-font-family']); ?>;
  font-weight: <?php echo esc_js($the_core_less_variables['fw-buttons-font-weight']); ?>;
  font-style: <?php echo esc_js($the_core_less_variables['fw-buttons-font-style']); ?>;
}
.woocommerce .form-row .select2-container .select2-choice {
  border-radius: 0;
  border: none;
}
#ship-to-different-address {
  position: relative;
}
#ship-to-different-address-checkbox {
  position: absolute;
  top: 20px;
  left: 0;
}
.woocommerce-page form.woocommerce-checkout,
.woocommerce-page .woocommerce form {
  background-color: rgba(168, 168, 168, 0.2);
  padding: 30px;
}
.woocommerce-page form.woocommerce-checkout fieldset,
.woocommerce-page .woocommerce form fieldset {
  margin-top: 30px;
}
.woocommerce-page form.woocommerce-checkout fieldset legend,
.woocommerce-page .woocommerce form fieldset legend {
  color: <?php echo esc_js($the_core_less_variables['text-color']); ?>;
  font-family: <?php echo ($the_core_less_variables['form-label-font-family']); ?>;
  font-style: italic;
  font-weight: <?php echo esc_js($the_core_less_variables['form-label-font-weight']); ?>;
  letter-spacing: <?php echo esc_js($the_core_less_variables['form-label-letter-spacing']); ?>;
  border-bottom-color: <?php echo esc_js($the_core_less_variables['text-color']); ?>;
}
.woocommerce-page form.woocommerce-checkout .selectize-input,
.woocommerce-page .woocommerce form .selectize-input {
  border: 1px solid rgba(0, 0, 0, 0.13);
}
.woocommerce-page .select2-container--default {
  display: none !important;
}
.woocommerce form .form-row label {
  line-height: <?php echo esc_js($the_core_less_variables['form-label-line-height']); ?>;
}
.woocommerce label {
  font-weight: <?php echo esc_js($the_core_less_variables['form-label-font-weight']); ?>;
}
.woocommerce form .form-row.woocommerce-invalid .selectize-input {
  border-color: #a00;
}
.country_select .selectize-input > input[type="text"] {
  display: inline-block !important;
}

/*----> Responsive <---- */
/* Screen 1024px */
@media(max-width:1199px){
  .country_select .selectize-input > input[type="text"] {
    display: none !important;
  }
}

/* Screen 1024px */
@media(max-width:767px) {
	.woocommerce a.checkout-button,
	.woocommerce-page table.cart td.actions .coupon .button,
	.woocommerce table.shop_table tbody td.actions .coupon .input-text {
		width: 100%;
	}
	.woocommerce-page table.cart td.actions .coupon .button {
		margin-top: 20px;
		margin-bottom: 15px;
	}
}

