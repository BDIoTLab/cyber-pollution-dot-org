/* Icon Title */
/* -------------------------------------------------- */
/* Icon with Title */
.fw-icon-title {
  width: 100%;
  padding: 10px 0;
  position: relative;
}
.fw-icon-title.fw-icon-title-border-on .fw-icon-title-icon {
  width: 42px;
  height: 42px;
  border-radius: 50%;
}
.fw-icon-title .fw-icon-title-icon,
.fw-icon-title .fw-icon-title-name {
  display: inline-block;
}
.fw-icon-title .fw-icon-title-icon {
  color: <?php echo esc_js($the_core_less_variables['fw-h4-color']); ?>;
  font-size: 0;
  display: inline-block;
  text-align: center;
  position: relative;
  overflow: hidden;
}
.fw-icon-title .fw-icon-title-text {
  margin: 0;
}
.fw-icon-title h1.fw-icon-title-text a {
  font-family: <?php echo ($the_core_less_variables['fw-h1-font-family']); ?>;
  font-style: <?php echo esc_js($the_core_less_variables['fw-h1-font-style']); ?>;
  font-weight: <?php echo esc_js($the_core_less_variables['fw-h1-font-weight']); ?>;
  font-size: <?php echo esc_js($the_core_less_variables['fw-h1-font-size']); ?>;
  line-height: <?php echo esc_js($the_core_less_variables['fw-h1-line-height']); ?>;
  letter-spacing: <?php echo esc_js($the_core_less_variables['fw-h1-letter-spacing']); ?>;
  color: <?php echo esc_js($the_core_less_variables['fw-h1-color']); ?>;
}
.fw-icon-title h2.fw-icon-title-text a {
  font-family: <?php echo ($the_core_less_variables['fw-h2-font-family']); ?>;
  font-style: <?php echo esc_js($the_core_less_variables['fw-h2-font-style']); ?>;
  font-weight: <?php echo esc_js($the_core_less_variables['fw-h2-font-weight']); ?>;
  font-size: <?php echo esc_js($the_core_less_variables['fw-h2-font-size']); ?>;
  line-height: <?php echo esc_js($the_core_less_variables['fw-h2-line-height']); ?>;
  letter-spacing: <?php echo esc_js($the_core_less_variables['fw-h2-letter-spacing']); ?>;
  color: <?php echo esc_js($the_core_less_variables['fw-h2-color']); ?>;
}
.fw-icon-title h3.fw-icon-title-text a {
  font-family: <?php echo ($the_core_less_variables['fw-h3-font-family']); ?>;
  font-style: <?php echo esc_js($the_core_less_variables['fw-h3-font-style']); ?>;
  font-weight: <?php echo esc_js($the_core_less_variables['fw-h3-font-weight']); ?>;
  font-size: <?php echo esc_js($the_core_less_variables['fw-h3-font-size']); ?>;
  line-height: <?php echo esc_js($the_core_less_variables['fw-h3-line-height']); ?>;
  letter-spacing: <?php echo esc_js($the_core_less_variables['fw-h3-letter-spacing']); ?>;
  color: <?php echo esc_js($the_core_less_variables['fw-h3-color']); ?>;
}
.fw-icon-title h4.fw-icon-title-text a {
  font-family: <?php echo ($the_core_less_variables['fw-h4-font-family']); ?>;
  font-style: <?php echo esc_js($the_core_less_variables['fw-h4-font-style']); ?>;
  font-weight: <?php echo esc_js($the_core_less_variables['fw-h4-font-weight']); ?>;
  font-size: <?php echo esc_js($the_core_less_variables['fw-h4-font-size']); ?>;
  line-height: <?php echo esc_js($the_core_less_variables['fw-h4-line-height']); ?>;
  letter-spacing: <?php echo esc_js($the_core_less_variables['fw-h4-letter-spacing']); ?>;
  color: <?php echo esc_js($the_core_less_variables['fw-h4-color']); ?>;
}
.fw-icon-title h5.fw-icon-title-text a {
  font-family: <?php echo ($the_core_less_variables['fw-h5-font-family']); ?>;
  font-style: <?php echo esc_js($the_core_less_variables['fw-h5-font-style']); ?>;
  font-weight: <?php echo esc_js($the_core_less_variables['fw-h5-font-weight']); ?>;
  font-size: <?php echo esc_js($the_core_less_variables['fw-h5-font-size']); ?>;
  line-height: <?php echo esc_js($the_core_less_variables['fw-h5-line-height']); ?>;
  letter-spacing: <?php echo esc_js($the_core_less_variables['fw-h5-letter-spacing']); ?>;
  color: <?php echo esc_js($the_core_less_variables['fw-h5-color']); ?>;
}
.fw-icon-title h6.fw-icon-title-text a {
  font-family: <?php echo ($the_core_less_variables['fw-h6-font-family']); ?>;
  font-style: <?php echo esc_js($the_core_less_variables['fw-h6-font-style']); ?>;
  font-weight: <?php echo esc_js($the_core_less_variables['fw-h6-font-weight']); ?>;
  font-size: <?php echo esc_js($the_core_less_variables['fw-h6-font-size']); ?>;
  line-height: <?php echo esc_js($the_core_less_variables['fw-h6-line-height']); ?>;
  letter-spacing: <?php echo esc_js($the_core_less_variables['fw-h6-letter-spacing']); ?>;
  color: <?php echo esc_js($the_core_less_variables['fw-h6-color']); ?>;
}
.fw-icon-title img {
  width: 100%;
  height: 100%;
  line-height: normal;
}
.fw-icon-title .fw-icon-title-name {
  color: <?php echo esc_js($the_core_less_variables['fw-h4-color']); ?>;
  display: inline-block;
  -ms-word-wrap: break-word;
  word-wrap: break-word;
}
.fw-icon-title .fw-icon-title-name a {
  color: <?php echo esc_js($the_core_less_variables['fw-h4-color']); ?>;
}

/* Content alignment */
.fw-icon-title.fw-content-align-left {
  text-align: left;
}
.fw-icon-title.fw-content-align-center {
  text-align: center;
}
.fw-icon-title.fw-content-align-right {
  text-align: right;
}

/* Icon Position */
.fw-icon-title.fw-icon-title-left .fw-icon-title-name,
.fw-icon-title.fw-icon-title-right .fw-icon-title-name {
  display: inline-block;
}
.fw-icon-title.fw-icon-title-left .fw-icon-title-name .fw-icon-title-name-inner,
.fw-icon-title.fw-icon-title-right .fw-icon-title-name .fw-icon-title-name-inner {
  display: flex;
  align-items: center;
  flex-wrap: wrap;
}
.fw-icon-title.fw-icon-title-left .fw-icon-title-name .fw-icon-title-text,
.fw-icon-title.fw-icon-title-right .fw-icon-title-name .fw-icon-title-text {
  flex: 1;
  -ms-flex: 0 1 auto;
}
.fw-icon-title.fw-icon-title-left .fw-icon-title-name .fw-icon-title-icon,
.fw-icon-title.fw-icon-title-right .fw-icon-title-name .fw-icon-title-icon {
  -ms-flex: 1 1 auto;
}

/*-> Icon position left */
.fw-icon-title.fw-icon-title-left .fw-icon-title-icon {
  margin-right: 12px;
}
/*-> Icon position right */
.fw-icon-title.fw-icon-title-right .fw-icon-title-name .fw-icon-title-name-inner {
  flex-direction: row-reverse;
}
.fw-icon-title.fw-icon-title-right .fw-icon-title-icon {
  margin-left: 12px;
}

/* Icon Top & Bottom align */
/* Icon Top & Bottom */
.fw-icon-title.fw-content-align-center.fw-icon-title-top .fw-icon-title-name,
.fw-icon-title.fw-content-align-center.fw-icon-title-bottom .fw-icon-title-name {
  display: block;
  width: 100%;
}
.fw-icon-title.fw-icon-title-top .fw-icon-title-name,
.fw-icon-title.fw-icon-title-bottom .fw-icon-title-name {
  line-height: normal;
  text-align: center;
}
.fw-icon-title.fw-icon-title-top .fw-icon-title-name .fw-icon-title-icon,
.fw-icon-title.fw-icon-title-bottom .fw-icon-title-name .fw-icon-title-icon {
  display: block;
  margin: 0 auto;
}
.fw-icon-title .fw-custom-icon-image {
  overflow: hidden;
}

