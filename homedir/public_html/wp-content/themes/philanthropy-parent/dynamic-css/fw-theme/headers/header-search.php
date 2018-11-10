/* Header Search */
.fw-search {
  display: inline-block;
  line-height: normal;
  position: relative;
}
.fw-search-form {
  position: relative;
  display: inline-block;
  width: 100%;
}
.fw-wrap-search-form {
  width: <?php echo esc_js($the_core_less_variables['fw-header-search-width']); ?>;
}
.fw-submit-wrap {
  position: absolute;
  top: 0;
  right: 0;
  width: 35px;
  text-align: center;
  background: <?php echo esc_js($the_core_less_variables['fw-header-search-input-icon-bg-color']); ?>;
  height: <?php echo esc_js($the_core_less_variables['fw-header-search-input-height']); ?>;
  line-height: <?php echo esc_js($the_core_less_variables['fw-header-search-input-height']); ?>;
}
.fw-submit-wrap:before {
  content: '\f002';
  font-family: 'FontAwesome';
  font-size: <?php echo esc_js($the_core_less_variables['fw-header-search-input-icon-font-size']); ?>;
  color: <?php echo esc_js($the_core_less_variables['fw-header-search-input-icon-color']); ?>;
}
.fw-submit-wrap:hover:before {
  color: <?php echo esc_js($the_core_less_variables['fw-header-search-input-icon-color-hover']); ?>;
}
.fw-submit-wrap input {
  border: none;
  width: 100%;
  height: 100%;
  padding: 0;
  position: absolute;
  left: 0;
  background: <?php echo esc_js($the_core_less_variables['fw-header-search-input-icon-bg-color']); ?>;
}
.fw-submit-wrap input:focus,
.fw-submit-wrap input:active {
  outline: none;
}
.fw-submit-wrap input:hover {
  opacity: 0.8;
}
input.fw-input-search {
  font-family: <?php echo ($the_core_less_variables['fw-header-search-input-font-family']); ?>;
  font-weight: <?php echo esc_js($the_core_less_variables['fw-header-search-input-font-weight']); ?>;
  font-style: <?php echo esc_js($the_core_less_variables['fw-header-search-input-font-style']); ?>;
  font-size: <?php echo esc_js($the_core_less_variables['fw-header-search-input-font-size']); ?>;
  letter-spacing: <?php echo esc_js($the_core_less_variables['fw-header-search-input-letter-spacing']); ?>;
  height: <?php echo esc_js($the_core_less_variables['fw-header-search-input-height']); ?>;
  line-height: <?php echo esc_js($the_core_less_variables['fw-header-search-input-height']); ?>;
  border: <?php echo esc_js($the_core_less_variables['fw-header-search-input-border-size']); ?> solid <?php echo esc_js($the_core_less_variables['fw-header-search-input-border-color']); ?>;
  color: <?php echo esc_js($the_core_less_variables['fw-header-search-input-color']); ?>;
  background-color: <?php echo esc_js($the_core_less_variables['fw-header-search-input-bg-color']); ?>;
  width: 100%;
  padding: 0 35px 0 10px !important;
  border-radius: 0;
}
input.fw-input-search::-moz-placeholder {
  color: <?php echo esc_js($the_core_less_variables['fw-form-search-full-placeholder-font-color']); ?>;
  opacity: 1;
}
input.fw-input-search:-ms-input-placeholder {
  color: <?php echo esc_js($the_core_less_variables['fw-form-search-full-placeholder-font-color']); ?>;
}
input.fw-input-search::-webkit-input-placeholder {
  color: <?php echo esc_js($the_core_less_variables['fw-form-search-full-placeholder-font-color']); ?>;
}
input.fw-input-search:focus,
input.fw-input-search:active {
  outline: none;
}
/* Search Input */
.fw-search-icon {
  display: none;
  line-height: 1em;
  text-align: center;
  background: <?php echo esc_js($the_core_less_variables['fw-header-search-input-icon-bg-color']); ?>;
  width: <?php echo esc_js($the_core_less_variables['fw-header-search-input-icon-font-size']); ?>;
  height: <?php echo esc_js($the_core_less_variables['fw-header-search-input-icon-font-size']); ?>;
  font-size: <?php echo esc_js($the_core_less_variables['fw-header-search-input-icon-font-size']); ?>;
}
.fw-search-icon:hover {
  border-color: <?php echo esc_js($the_core_less_variables['fw-header-search-input-icon-bg-color']); ?>;
  color: <?php echo esc_js($the_core_less_variables['fw-header-search-input-icon-color-hover']); ?>;
  background: none;
}
/* Search Mini */
.fw-mini-search .fw-search-icon {
  color: <?php echo esc_js($the_core_less_variables['fw-header-search-input-icon-color']); ?>;
  display: block;
}
.fw-mini-search .fw-search-icon:hover {
  color: <?php echo esc_js($the_core_less_variables['fw-header-search-input-icon-color-hover']); ?>;
}
/* Search Full */
.fw-form-search-full {
  background-color: <?php echo esc_js($the_core_less_variables['fw-form-search-full-bg']); ?>;
}
.fw-form-search-full.fw-wrap-search-form {
  display: none;
  position: absolute;
  width: 100%;
  height: 0;
  overflow: hidden;
  left: 0;
  right: 0;
  z-index: 600;
  padding: <?php echo esc_js($the_core_less_variables['fw-header-search-mini-padding']); ?>;
}
.fw-form-search-full.fw-wrap-search-form .fw-search-form {
  display: block;
  margin: 0 auto;
  top: 50%;
  transform: translateY(-50%);
}
.fw-form-search-full.fw-wrap-search-form .fw-search-form .fw-input-search {
  background-color: <?php echo esc_js($the_core_less_variables['fw-form-search-full-input-bg']); ?>;
  font-family: <?php echo ($the_core_less_variables['fw-header-search-input-font-family']); ?>;
  font-weight: <?php echo esc_js($the_core_less_variables['fw-header-search-input-font-weight']); ?>;
  font-style: <?php echo esc_js($the_core_less_variables['fw-header-search-input-font-style']); ?>;
  font-size: <?php echo esc_js($the_core_less_variables['fw-form-search-full-input-font-size']); ?>;
  letter-spacing: <?php echo esc_js($the_core_less_variables['fw-header-search-input-letter-spacing']); ?>;
  color: <?php echo esc_js($the_core_less_variables['fw-form-search-full-font-color']); ?>;
  border: <?php echo esc_js($the_core_less_variables['fw-header-search-input-border-size']); ?> solid <?php echo esc_js($the_core_less_variables['fw-header-search-input-border-color']); ?>;
  padding-left: 50px !important;
  padding-right: 50px !important;
  height: calc(100%/2);
  line-height: calc(100%/2);
}
.fw-form-search-full.fw-wrap-search-form .fw-search-form .fw-input-search::-moz-placeholder {
  color: <?php echo esc_js($the_core_less_variables['fw-form-search-full-placeholder-font-color']); ?>;
  opacity: 1;
}
.fw-form-search-full.fw-wrap-search-form .fw-search-form .fw-input-search:-ms-input-placeholder {
  color: <?php echo esc_js($the_core_less_variables['fw-form-search-full-placeholder-font-color']); ?>;
}
.fw-form-search-full.fw-wrap-search-form .fw-search-form .fw-input-search::-webkit-input-placeholder {
  color: <?php echo esc_js($the_core_less_variables['fw-form-search-full-placeholder-font-color']); ?>;
}
.fw-form-search-full.fw-wrap-search-form .fw-search-form .fw-close-search-form {
  color: <?php echo esc_js($the_core_less_variables['fw-form-search-full-close-color']); ?>;
  position: absolute;
  right: 0;
  top: 50%;
  font-size: 20px;
  line-height: normal;
  padding: 15px;
  transform: translateY(-50%);
}
.fw-form-search-full.fw-wrap-search-form .fw-search-form .fw-submit-wrap {
  right: auto;
  left: 10px;
  top: 50%;
  transform: translateY(-50%);
}
.fw-form-search-full.fw-wrap-search-form .fw-search-form .fw-submit-wrap:before {
  font-size: 20px;
  color: <?php echo esc_js($the_core_less_variables['fw-form-search-full-loop-color']); ?>;
}
.fw-header.fw-sticky-menu .fw-form-search-full.fw-wrap-search-form {
  top: 0 !important;
}
/* Search in top bar */
.fw-top-bar-on.search-in-top-bar .fw-header .fw-top-bar .fw-search {
  top: <?php echo ( floatval($the_core_less_variables['fw-top-bar-height']) - floatval($the_core_less_variables['fw-header-search-input-height']) ) / 2; ?>px;
}
.fw-top-bar-on.search-in-top-bar .fw-header .fw-top-bar .fw-search.fw-mini-search {
  top: <?php echo ( floatval($the_core_less_variables['fw-top-bar-height']) - floatval($the_core_less_variables['fw-top-bar-font-size-text']) ) / 2; ?>px;
}
.fw-top-bar-on.search-in-top-bar.fw-top-social-right .fw-top-bar .fw-mini-search {
  border-left: 1px solid <?php echo esc_js($the_core_less_variables['fw-header-search-input-icon-color']); ?>;
}
.fw-top-bar-on.search-in-top-bar.fw-top-social-left .fw-mini-search {
  border-left: 1px solid <?php echo esc_js($the_core_less_variables['fw-header-search-input-icon-color']); ?>;
}
.search-in-top-bar .fw-search {
  float: right !important;
  margin-left: 15px !important;
  margin-right: 0 !important;
}
.search-in-top-bar .fw-top-bar-social,
.search-in-top-bar .fw-text-top-bar {
  position: relative;
}
.search-in-top-bar.fw-top-social-right .fw-top-bar .fw-search {
  padding-left: 10px !important;
}
.search-in-top-bar.fw-top-social-left .fw-text-top-bar {
  float: none;
}
.search-in-top-bar.fw-top-social-left .fw-search {
  padding-left: 10px !important;
}
.search-in-top-bar.fw-top-social-left .fw-mini-search {
  margin-left: 10px !important;
}

/*----> Responsive <---- */
/*Screen 768px*/
@media(max-width: 991px){
  .search-in-top-bar.fw-top-social-right .fw-top-bar .fw-search,
  .search-in-top-bar.fw-top-social-left .fw-top-bar .fw-search {
    margin: 0 !important;
    padding: 0 !important;
  }
}