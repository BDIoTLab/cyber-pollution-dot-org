/* Buttons Layout */
/* -------------------------------------------------- */
.fw-btn {
  font-family: <?php echo ($the_core_less_variables['fw-buttons-font-family']); ?>;
  font-weight: <?php echo esc_js($the_core_less_variables['fw-buttons-font-weight']); ?>;
  font-style: <?php echo esc_js($the_core_less_variables['fw-buttons-font-style']); ?>;
  font-size: <?php echo esc_js($the_core_less_variables['fw-buttons-font-size']); ?>;
  line-height: <?php echo esc_js($the_core_less_variables['fw-buttons-line-height']); ?>;
  letter-spacing: <?php echo esc_js($the_core_less_variables['fw-buttons-letter-spacing']); ?>;
  color: <?php echo esc_js($the_core_less_variables['fw-buttons-color']); ?>;
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
}
.fw-btn span,
.fw-btn i {
  position: relative;
  top: 1px;
}
.fw-btn:hover,
.fw-btn:focus {
  text-decoration: none;
  outline: none;
}
/* button icon */
.fw-btn i,
.fw-btn img {
  margin-right: 13px;
}
.fw-btn i.pull-right,
.fw-btn img.pull-right,
.fw-btn i.pull-right-icon,
.fw-btn img.pull-right-icon {
  margin-right: 0;
  margin-left: 13px;
  position: relative;
}
.fw-btn i.pull-right,
.fw-btn img.pull-right {
  top: 0.3em;
}
.fw-btn img {
  position: relative;
  top: -0.1em;
}
.fw-btn i {
  top: -1px;
  vertical-align: middle;
}
/* Button side by side */
.fw-btn.fw-btn-side-by-side {
  margin-right: 10px;
}
.fw-btn.fw-btn-side-by-side:last-child {
  margin-right: 0;
}
/* Full width button */
.fw-btn.fw-btn-full {
  width: 100%;
}
