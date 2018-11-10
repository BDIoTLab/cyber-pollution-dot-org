/* Buttons Style 4 */
.fw-btn-4 {
  color: <?php echo esc_js($the_core_less_variables['fw-btn-text-color4']); ?>;
  border: none;
  background-color: transparent;
}
.fw-btn-4.fw-btn-sm,
.fw-btn-4.fw-btn-md,
.fw-btn-4.fw-btn-lg {
  padding-left: 0;
  padding-right: 0;
}
.fw-btn-4.fw-btn-sm.fw-btn-side-by-side,
.fw-btn-4.fw-btn-md.fw-btn-side-by-side,
.fw-btn-4.fw-btn-lg.fw-btn-side-by-side {
  margin-right: 0;
}
.fw-btn-4.fw-btn-sm.fw-btn-side-by-side:last-child,
.fw-btn-4.fw-btn-md.fw-btn-side-by-side:last-child,
.fw-btn-4.fw-btn-lg.fw-btn-side-by-side:last-child {
  padding-right: 0;
}
.fw-btn-4.fw-btn-sm.fw-btn-side-by-side {
  padding-right: <?php echo esc_js($the_core_less_variables['padding-small-horizontal']); ?>;
}
.fw-btn-4.fw-btn-md.fw-btn-side-by-side {
  padding-right: <?php echo esc_js($the_core_less_variables['padding-base-horizontal']); ?>;
}
.fw-btn-4.fw-btn-lg.fw-btn-side-by-side {
  padding-right: <?php echo esc_js($the_core_less_variables['padding-large-horizontal']); ?>;
}
.fw-btn-4:focus {
  color: <?php echo esc_js($the_core_less_variables['fw-btn-text-color4']); ?>;
}
.fw-btn-4:hover {
  color: <?php echo esc_js($the_core_less_variables['fw-btn-text-color-hover4']); ?>;
}
.fw-btn-4:active {
  box-shadow: none;
}