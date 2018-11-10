/* RTL Buttons */
/* -------------------------------------------------- */
.rtl .fw-btn {
  direction: <?php echo esc_js($the_core_less_variables['ltr-direction']); ?>;
}
.rtl .fw-btn.fw-btn.fw-btn-side-by-side {
  margin-right: 0;
  margin-left: 10px;
}
.rtl .fw-btn.fw-btn-side-by-side:last-child {
  margin-left: 0;
}