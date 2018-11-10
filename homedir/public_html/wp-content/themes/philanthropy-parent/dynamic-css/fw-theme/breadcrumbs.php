/* Breadcrumbs */
/* -------------------------------------------------- */
.breadcrumbs {
  position: relative;
  margin-top: 0;
  margin-bottom: <?php echo ceil(floatval($the_core_less_variables['fw-widget-margin-bot'])*0.30); ?>px;
  line-height: <?php echo esc_js($the_core_less_variables['fw-widget-title-line-height']); ?>;
  font-size: 0;
}
.breadcrumbs >* {
  font-size:  <?php echo floor(floatval($the_core_less_variables['font-size-base'])*0.8); ?>px;
}
.breadcrumbs span {
  background-color: <?php echo esc_js($the_core_less_variables['body-bg']); ?>;
}
.breadcrumbs span:last-child {
  background-color: <?php echo esc_js($the_core_less_variables['body-bg']); ?>;
  display: inline-block;
  padding-right: 10px;
}
.breadcrumbs span:last-child:after {
  border-bottom: 1px solid #dee0e1;
  content: "";
  left: 0;
  position: absolute;
  right: 0;
  top: 50%;
  margin-top: -2.5px;
  z-index: -1;
}
.breadcrumbs span.separator {
  padding: 0 5px;
}
.fw-side-boxed .breadcrumbs span,
.fw-side-boxed .breadcrumbs span:last-child {
  background-color: <?php echo esc_js($the_core_less_variables['container-bg']); ?>;
}
