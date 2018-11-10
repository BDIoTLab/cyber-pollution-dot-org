/* Testimonials RTL */
/* -------------------------------------------------- */

/* Testimonials Type 2 */
.rtl .fw-testimonials-2 .fw-testimonials-text:before {
  left: auto;
  right: 37px;
  margin-left: auto;
  margin-right: -1px;
}
.rtl .fw-testimonials-2 .fw-testimonials-pagination {
  right: auto;
  left: 70px;
}
.rtl .fw-testimonials-2 .fw-testimonials-arrows {
  right: auto;
  left: 0;
  direction: <?php echo esc_js($the_core_less_variables['ltr-direction']); ?>;
}
.rtl .fw-testimonials-2 .fw-testimonials-author {
  padding-left: 0;
  padding-right: 20px;
  text-align: right;
}
