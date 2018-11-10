/* buddyPress Search */
.dir-search form,
.dir-search form label,
#search-members-form,
#search-message-form {
  position: relative;
}
#search-message-form label.bp-screen-reader-text {
  width: 100%;
  height: 100%;
  clip: auto;
  color: transparent;
}
#buddypress div.dir-search input[type="submit"],
#buddypress li.groups-members-search input[type="submit"],
#buddypress #search-message-form input[type="submit"] {
  padding: 0;
}
#buddypress div.dir-search input[type="submit"]:hover,
#buddypress div.dir-search input[type="submit"]:active,
#buddypress div.dir-search input[type="submit"]:focus,
#buddypress li.groups-members-search input[type="submit"]:hover,
#buddypress li.groups-members-search input[type="submit"]:active,
#buddypress li.groups-members-search input[type="submit"]:focus,
#buddypress #search-message-form input[type="submit"]:hover,
#buddypress #search-message-form input[type="submit"]:active,
#buddypress #search-message-form input[type="submit"]:focus {
  background-color: transparent;
  box-shadow: none;
}
#buddypress div.dir-search,
#buddypress li.groups-members-search,
#buddypress #search-message-form {
  position: relative;
}
#buddypress div.dir-search label:after,
#buddypress li.groups-members-search label:after,
#buddypress #search-message-form label:after {
  display: inline-block;
  width: 28px;
  height: 28px;
  text-align: center;
  line-height: 28px;
  font-family: 'FontAwesome';
  content: "\f002";
  font-size: 16px;
  font-weight: normal;
  color: <?php echo esc_js($the_core_less_variables['fw-widget-inner-title-color']); ?>;
  position: absolute;
  top: 50%;
  margin-top: -14px;
  right: 10px;
  z-index: 1;
}
#buddypress div.dir-search input[type="text"],
#buddypress div.dir-search input[type="search"],
#buddypress li.groups-members-search input[type="text"],
#buddypress li.groups-members-search input[type="search"],
#buddypress #search-message-form input[type="text"],
#buddypress #search-message-form input[type="search"] {
  padding-top: 5px;
  padding-bottom: 5px;
}
#buddypress div.dir-search input[type="text"],
#buddypress li.groups-members-search input[type="text"],
#buddypress #search-message-form input[type="text"],
#buddypress div.dir-search input[type="search"],
#buddypress li.groups-members-search input[type="search"],
#buddypress #search-message-form input[type="search"] {
  width: 100%;
  line-height: <?php echo esc_js($the_core_less_variables['input-height-base']); ?>;
  border: none;
  color: <?php echo esc_js($the_core_less_variables['fw-widget-inner-title-color']); ?>;
  background-color: <?php echo the_core_hex2rgba($the_core_less_variables['fw-widget-input-bg'], 0.07); ?>;
  font-family: <?php echo ($the_core_less_variables['fw-buttons-font-family']); ?>;
  font-weight: <?php echo esc_js($the_core_less_variables['fw-buttons-font-weight']); ?>;
  font-style: <?php echo esc_js($the_core_less_variables['fw-buttons-font-style']); ?>;
  font-size: <?php echo esc_js($the_core_less_variables['input-font-size']); ?>;
  padding: <?php echo esc_js($the_core_less_variables['input-padding-y']); ?> <?php echo esc_js($the_core_less_variables['input-padding-x']); ?>;
}
#buddypress div.dir-search input[type="text"]::-moz-placeholder,
#buddypress li.groups-members-search input[type="text"]::-moz-placeholder,
#buddypress #search-message-form input[type="text"]::-moz-placeholder,
#buddypress div.dir-search input[type="search"]::-moz-placeholder,
#buddypress li.groups-members-search input[type="search"]::-moz-placeholder,
#buddypress #search-message-form input[type="search"]::-moz-placeholder {
  color: <?php echo the_core_hex2rgba($the_core_less_variables['fw-widget-inner-title-color'], 0.25); ?>;
  opacity: 1;
}
#buddypress div.dir-search input[type="text"]:-ms-input-placeholder,
#buddypress li.groups-members-search input[type="text"]:-ms-input-placeholder,
#buddypress #search-message-form input[type="text"]:-ms-input-placeholder,
#buddypress div.dir-search input[type="search"]:-ms-input-placeholder,
#buddypress li.groups-members-search input[type="search"]:-ms-input-placeholder,
#buddypress #search-message-form input[type="search"]:-ms-input-placeholder {
  color: <?php echo the_core_hex2rgba($the_core_less_variables['fw-widget-inner-title-color'], 0.25); ?>;
}
#buddypress div.dir-search input[type="text"]::-webkit-input-placeholder,
#buddypress li.groups-members-search input[type="text"]::-webkit-input-placeholder,
#buddypress #search-message-form input[type="text"]::-webkit-input-placeholder,
#buddypress div.dir-search input[type="search"]::-webkit-input-placeholder,
#buddypress li.groups-members-search input[type="search"]::-webkit-input-placeholder,
#buddypress #search-message-form input[type="search"]::-webkit-input-placeholder {
  color: <?php echo the_core_hex2rgba($the_core_less_variables['fw-widget-inner-title-color'], 0.25); ?>;
}
#buddypress div.dir-search input[type="submit"],
#buddypress li.groups-members-search input[type="submit"],
#buddypress #search-message-form input[type="submit"] {
  width: 28px;
  height: 28px;
  background-color: transparent;
  border: none;
  text-indent: 100px;
  position: absolute;
  top: 10px;
  right: 10px;
  z-index: 2;
  overflow: hidden;
}
