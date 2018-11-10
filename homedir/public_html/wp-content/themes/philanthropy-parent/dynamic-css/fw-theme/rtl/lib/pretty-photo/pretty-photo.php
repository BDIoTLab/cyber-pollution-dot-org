/* RTL prettyPhoto */
/* -------------------------------------------------- */
.rtl .pp_content_container {
  direction: <?php echo esc_js($the_core_less_variables['ltr-direction']); ?>;
}
.rtl .pp_pic_holder.dark_square a.pp_close {
  right: initial;
  left: 30px;
}
.rtl .pp_pic_holder.dark_square a.pp_expand,
.rtl .pp_pic_holder.dark_square a.pp_contract {
  right: initial;
  left: 110px;
}
