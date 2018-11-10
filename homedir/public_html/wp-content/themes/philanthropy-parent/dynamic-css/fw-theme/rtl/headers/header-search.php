/* RTL Header Search */
/* -------------------------------------------------- */
.rtl .fw-search .fw-input-search {
  text-align: right;
  padding: 0 10px 0 35px;
}
.rtl .fw-submit-wrap {
  right: initial;
  left: 0;
}
.rtl.fw-submit-wrap input {
  left: initial;
  right: 0;
}
.rtl.fw-form-search-full.fw-wrap-search-form .fw-search-form .fw-close-search-form {
  right: initial;
  left: 17px;
}
.rtl.fw-form-search-full.fw-wrap-search-form .fw-search-form .fw-submit-wrap {
  right: 10px;
  left: auto;
}
/* Search in top bar */
.search-in-top-bar.fw-top-social-right .fw-top-bar .fw-mini-search {
  border-right: 1px solid <?php echo esc_js($the_core_less_variables['fw-header-search-input-icon-color']); ?>;
}
.search-in-top-bar.fw-top-social-left .fw-mini-search {
  border-right: 1px solid <?php echo esc_js($the_core_less_variables['fw-header-search-input-icon-color']); ?>;
}
.rtl.search-in-top-bar .fw-search {
  float: left !important;
  margin-left: 0;
  margin-right: 15px !important;
}
.rtl.search-in-top-bar.fw-top-social-right .fw-top-bar .fw-search {
  padding-left: 0;
  padding-right: 10px;
}
.rtl.search-in-top-bar.fw-top-social-right .fw-top-bar .fw-mini-search {
  border-left: none;
}
.rtl.search-in-top-bar.fw-top-social-left .fw-text-top-bar {
  float: none;
}
.rtl.search-in-top-bar.fw-top-social-left .fw-search {
  padding-left: 0;
  padding-right: 10px;
}
.rtl.search-in-top-bar.fw-top-social-left .fw-mini-search {
  border-left: none;
  margin-left: 0;
  margin-right: 10px;
}
