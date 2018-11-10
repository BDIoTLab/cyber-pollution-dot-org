/* Special Heading */
/* -------------------------------------------------- */
.fw-heading {
  margin-bottom: 1em;
  position: relative;
  z-index: 50;
}
.fw-heading .fw-special-title {
  margin: 0;
}
.fw-heading .fw-special-title span {
  font-weight: normal;
}
.fw-heading .fw-special-subtitle {
  font-family: <?php echo ($the_core_less_variables['subtitles-family']); ?>;
  font-weight: <?php echo esc_js($the_core_less_variables['subtitles-weight']); ?>;
  font-style: <?php echo esc_js($the_core_less_variables['subtitles-style']); ?>;
  font-size: <?php echo esc_js($the_core_less_variables['subtitles-size']); ?>;
  line-height: <?php echo esc_js($the_core_less_variables['subtitles-line-height']); ?>;
  letter-spacing: <?php echo esc_js($the_core_less_variables['subtitles-letter-spacing']); ?>;
  color: <?php echo esc_js($the_core_less_variables['subtitles-color']); ?>;
  margin-top: 5px;
}
.fw-heading.fw-heading-h5 .fw-special-subtitle,
.fw-heading.fw-heading-h6 .fw-special-subtitle {
  font-size: 100%;
}
.fw-heading.fw-heading-left {
  text-align: left;
}
.fw-heading.fw-heading-center {
  text-align: center;
}
.fw-heading.fw-heading-right {
  text-align: right;
}
