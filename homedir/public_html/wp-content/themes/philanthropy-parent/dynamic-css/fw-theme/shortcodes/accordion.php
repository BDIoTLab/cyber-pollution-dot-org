/* Accordion */
/* -------------------------------------------------- */
.fw-accordion .panel-title {
  font-family: <?php echo ($the_core_less_variables['fw-h6-font-family']); ?>;
  font-style: <?php echo esc_js($the_core_less_variables['fw-h6-font-style']); ?>;
  font-weight: <?php echo esc_js($the_core_less_variables['fw-h6-font-weight']); ?>;
  font-size: <?php echo esc_js($the_core_less_variables['fw-h6-font-size']); ?>;
  line-height: <?php echo esc_js($the_core_less_variables['fw-h6-line-height']); ?>;
  letter-spacing: <?php echo esc_js($the_core_less_variables['fw-h6-letter-spacing']); ?>;
  color: <?php echo esc_js($the_core_less_variables['fw-h6-color']); ?>;
  position: relative;
}
.fw-accordion .panel-title a {
  display: block;
}
.fw-accordion .panel-title a:before {
  font-family: FontAwesome;
  content: "\f068";
  display: inline-block;
  font-size: <?php echo floor(floatval($the_core_less_variables['panel-icon-size']) * 0.83 ); ?>px;
  margin-top: -<?php echo floatval($the_core_less_variables['panel-icon-size']) / 2; ?>px;
  width: <?php echo esc_js($the_core_less_variables['panel-icon-size']); ?>;
  height: <?php echo esc_js($the_core_less_variables['panel-icon-size']); ?>;
  line-height: <?php echo floatval($the_core_less_variables['panel-icon-size'] ) + 2; ?>px;
  margin-left: 3px;
  position: absolute;
  right: 0;
  top: 50%;
  font-weight: normal;
  text-align: center;
}
.fw-accordion .panel-title a.collapsed:before {
  content: "\f067";
}
.fw-accordion .panel-title i,
.fw-accordion .panel-title img {
  margin-right: 5px;
}
.fw-accordion .panel-title img {
  position: relative;
  top: -0.1em;
}
.panel-body * {
  color: <?php echo esc_js($the_core_less_variables['text-color']); ?>;
}
.panel-body {
  padding: 15px 20px;
}

.panel-body *:last-child {
  margin-bottom: 0;
}
.panel-heading {
  padding: 10px 15px;
  border-bottom: 1px solid transparent;
  border-radius: 0;
  background: #bfbfbf;
}
.panel-group .panel {
  border-radius: 0;
  border-color: #bfbfbf;
}
