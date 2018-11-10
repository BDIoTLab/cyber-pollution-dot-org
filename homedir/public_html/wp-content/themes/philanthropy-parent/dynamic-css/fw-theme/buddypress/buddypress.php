/* buddyPress Style */
/* -------------------------------------------------- */
#buddypress div.item-list-tabs#subnav {
  margin-bottom: 35px;
}
#buddypress div.pagination,
#buddypress div.pagination .pagination-links a,
#buddypress div.pagination .pagination-links span {
  font-size: inherit;
}
#buddypress div.pagination .pagination-links {
  margin-right: 0;
}
#buddypress div.pagination .pag-count {
  margin-left: 0;
}
#buddypress .item-list-tabs ul li.last {
  width: 221px;
}
#buddypress div.item-list-tabs#subnav {
  overflow: visible;
}
#buddypress #profile-edit-form ul.button-nav:before,
#buddypress #profile-edit-form ul.button-nav:after,
#buddypress div.item-list-tabs#subnav:before,
#buddypress div.item-list-tabs#subnav:after {
  content: '';
  display: table;
}
#buddypress #profile-edit-form ul.button-nav:after,
#buddypress div.item-list-tabs#subnav:after {
  clear: both;
}
.buddypress #buddypress .item-list-tabs ul li.current a,
.buddypress #buddypress .item-list-tabs ul li.selected a {
  opacity: 1;
}
#buddypress div.item-list-tabs ul li a span {
  width: 25px;
  height: 25px;
  line-height: 25px;
  display: inline-block;
  padding: 0;
}
#buddypress form#whats-new-form textarea {
  overflow: hidden;
}
#buddypress #reply-title small a span,
#buddypress a.bp-primary-action span {
  background: none;
  font-size: inherit;
  top: auto !important;
  vertical-align: middle;
}
#buddypress #reply-title small a:hover span,
#buddypress a.bp-primary-action:hover span {
  background: none;
}
#buddypress div.activity-comments form .ac-textarea {
  background: none;
  border: none;
  padding: 0;
}
#buddypress div.activity-comments form .ac-textarea textarea {
  padding: 5px 10px !important;
}
#buddypress div#item-header div#item-meta {
  font-size: 100%;
}
.buddypress #buddypress .comment-reply-link,
.buddypress #buddypress .generic-button a,
.buddypress #buddypress a.button,
.buddypress #buddypress .bp-uploader-window input.button,
.buddypress #buddypress input[type="reset"],
.buddypress #buddypress input[type="submit"],
.buddypress #buddypress ul.button-nav li a,
.buddypress a.bp-title-button {
  /* fw-btn */
  font-family: <?php echo ($the_core_less_variables['fw-buttons-font-family']); ?>;
  font-weight: <?php echo esc_js($the_core_less_variables['fw-buttons-font-weight']); ?>;
  font-style: <?php echo esc_js($the_core_less_variables['fw-buttons-font-style']); ?>;
  font-size: <?php echo esc_js($the_core_less_variables['fw-buttons-font-size']); ?>;
  line-height: <?php echo esc_js($the_core_less_variables['fw-buttons-line-height']); ?>;
  letter-spacing: <?php echo esc_js($the_core_less_variables['fw-buttons-letter-spacing']); ?>;
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
  /*  fw-btn-1*/
  background-color: <?php echo esc_js($the_core_less_variables['fw-btn-bg-color']); ?>;
  border-color: <?php echo esc_js($the_core_less_variables['fw-btn-border-color']); ?>;
  border-width: <?php echo esc_js($the_core_less_variables['fw-btn-border-width']); ?>;
  color: <?php echo esc_js($the_core_less_variables['fw-btn-text-color']); ?>;
  border-radius: <?php echo esc_js($the_core_less_variables['fw-btn-radius']); ?>;
  /* fw-btn-sm */
  padding: <?php echo esc_js($the_core_less_variables['padding-small-vertical']); ?> <?php echo esc_js($the_core_less_variables['padding-small-horizontal']); ?>;
  font-size: <?php echo ceil(floatval($the_core_less_variables['fw-buttons-font-size'])*0.85); ?>px;
  line-height: <?php echo ceil(floatval($the_core_less_variables['fw-buttons-line-height'])*0.85); ?>px;
}
.buddypress #buddypress .comment-reply-link span,
.buddypress #buddypress .generic-button a span,
.buddypress #buddypress a.button span,
.buddypress #buddypress .bp-uploader-window input.button span,
.buddypress #buddypress input[type="reset"] span,
.buddypress #buddypress input[type="submit"] span,
.buddypress #buddypress ul.button-nav li a span,
.buddypress a.bp-title-button span,
.buddypress #buddypress .comment-reply-link i,
.buddypress #buddypress .generic-button a i,
.buddypress #buddypress a.button i,
.buddypress #buddypress .bp-uploader-window input.button i,
.buddypress #buddypress input[type="reset"] i,
.buddypress #buddypress input[type="submit"] i,
.buddypress #buddypress ul.button-nav li a i,
.buddypress a.bp-title-button i {
  position: relative;
  top: 1px;
}
.buddypress #buddypress .comment-reply-link:hover,
.buddypress #buddypress .generic-button a:hover,
.buddypress #buddypress a.button:hover,
.buddypress #buddypress .bp-uploader-window input.button:hover,
.buddypress #buddypress input[type="reset"]:hover,
.buddypress #buddypress input[type="submit"]:hover,
.buddypress #buddypress ul.button-nav li a:hover,
.buddypress a.bp-title-button:hover,
.buddypress #buddypress .comment-reply-link:focus,
.buddypress #buddypress .generic-button a:focus,
.buddypress #buddypress a.button:focus,
.buddypress #buddypress .bp-uploader-window input.button:focus,
.buddypress #buddypress input[type="reset"]:focus,
.buddypress #buddypress input[type="submit"]:focus,
.buddypress #buddypress ul.button-nav li a:focus,
.buddypress a.bp-title-button:focus {
  text-decoration: none;
  outline: none;
}
.buddypress #buddypress .comment-reply-link i,
.buddypress #buddypress .generic-button a i,
.buddypress #buddypress a.button i,
.buddypress #buddypress .bp-uploader-window input.button i,
.buddypress #buddypress input[type="reset"] i,
.buddypress #buddypress input[type="submit"] i,
.buddypress #buddypress ul.button-nav li a i,
.buddypress a.bp-title-button i,
.buddypress #buddypress .comment-reply-link img,
.buddypress #buddypress .generic-button a img,
.buddypress #buddypress a.button img,
.buddypress #buddypress .bp-uploader-window input.button img,
.buddypress #buddypress input[type="reset"] img,
.buddypress #buddypress input[type="submit"] img,
.buddypress #buddypress ul.button-nav li a img,
.buddypress a.bp-title-button img {
  margin-right: 13px;
}
.buddypress #buddypress .comment-reply-link i.pull-right,
.buddypress #buddypress .generic-button a i.pull-right,
.buddypress #buddypress a.button i.pull-right,
.buddypress #buddypress .bp-uploader-window input.button i.pull-right,
.buddypress #buddypress input[type="reset"] i.pull-right,
.buddypress #buddypress input[type="submit"] i.pull-right,
.buddypress #buddypress ul.button-nav li a i.pull-right,
.buddypress a.bp-title-button i.pull-right,
.buddypress #buddypress .comment-reply-link img.pull-right,
.buddypress #buddypress .generic-button a img.pull-right,
.buddypress #buddypress a.button img.pull-right,
.buddypress #buddypress .bp-uploader-window input.button img.pull-right,
.buddypress #buddypress input[type="reset"] img.pull-right,
.buddypress #buddypress input[type="submit"] img.pull-right,
.buddypress #buddypress ul.button-nav li a img.pull-right,
.buddypress a.bp-title-button img.pull-right,
.buddypress #buddypress .comment-reply-link i.pull-right-icon,
.buddypress #buddypress .generic-button a i.pull-right-icon,
.buddypress #buddypress a.button i.pull-right-icon,
.buddypress #buddypress .bp-uploader-window input.button i.pull-right-icon,
.buddypress #buddypress input[type="reset"] i.pull-right-icon,
.buddypress #buddypress input[type="submit"] i.pull-right-icon,
.buddypress #buddypress ul.button-nav li a i.pull-right-icon,
.buddypress a.bp-title-button i.pull-right-icon,
.buddypress #buddypress .comment-reply-link img.pull-right-icon,
.buddypress #buddypress .generic-button a img.pull-right-icon,
.buddypress #buddypress a.button img.pull-right-icon,
.buddypress #buddypress .bp-uploader-window input.button img.pull-right-icon,
.buddypress #buddypress input[type="reset"] img.pull-right-icon,
.buddypress #buddypress input[type="submit"] img.pull-right-icon,
.buddypress #buddypress ul.button-nav li a img.pull-right-icon,
.buddypress a.bp-title-button img.pull-right-icon {
  margin-right: 0;
  margin-left: 13px;
  position: relative;
}
.buddypress #buddypress .comment-reply-link i.pull-right,
.buddypress #buddypress .generic-button a i.pull-right,
.buddypress #buddypress a.button i.pull-right,
.buddypress #buddypress .bp-uploader-window input.button i.pull-right,
.buddypress #buddypress input[type="reset"] i.pull-right,
.buddypress #buddypress input[type="submit"] i.pull-right,
.buddypress #buddypress ul.button-nav li a i.pull-right,
.buddypress a.bp-title-button i.pull-right,
.buddypress #buddypress .comment-reply-link img.pull-right,
.buddypress #buddypress .generic-button a img.pull-right,
.buddypress #buddypress a.button img.pull-right,
.buddypress #buddypress .bp-uploader-window input.button img.pull-right,
.buddypress #buddypress input[type="reset"] img.pull-right,
.buddypress #buddypress input[type="submit"] img.pull-right,
.buddypress #buddypress ul.button-nav li a img.pull-right,
.buddypress a.bp-title-button img.pull-right {
  top: 0.3em;
}
.buddypress #buddypress .comment-reply-link img,
.buddypress #buddypress .generic-button a img,
.buddypress #buddypress a.button img,
.buddypress #buddypress .bp-uploader-window input.button img,
.buddypress #buddypress input[type="reset"] img,
.buddypress #buddypress input[type="submit"] img,
.buddypress #buddypress ul.button-nav li a img,
.buddypress a.bp-title-button img {
  position: relative;
  top: -0.1em;
}
.buddypress #buddypress .comment-reply-link i,
.buddypress #buddypress .generic-button a i,
.buddypress #buddypress a.button i,
.buddypress #buddypress .bp-uploader-window input.button i,
.buddypress #buddypress input[type="reset"] i,
.buddypress #buddypress input[type="submit"] i,
.buddypress #buddypress ul.button-nav li a i,
.buddypress a.bp-title-button i {
  top: -1px;
  vertical-align: middle;
}
.buddypress #buddypress .comment-reply-link.fw-btn-side-by-side,
.buddypress #buddypress .generic-button a.fw-btn-side-by-side,
.buddypress #buddypress a.button.fw-btn-side-by-side,
.buddypress #buddypress .bp-uploader-window input.button.fw-btn-side-by-side,
.buddypress #buddypress input[type="reset"].fw-btn-side-by-side,
.buddypress #buddypress input[type="submit"].fw-btn-side-by-side,
.buddypress #buddypress ul.button-nav li a.fw-btn-side-by-side,
.buddypress a.bp-title-button.fw-btn-side-by-side {
  margin-right: 10px;
}
.buddypress #buddypress .comment-reply-link.fw-btn-side-by-side:last-child,
.buddypress #buddypress .generic-button a.fw-btn-side-by-side:last-child,
.buddypress #buddypress a.button.fw-btn-side-by-side:last-child,
.buddypress #buddypress .bp-uploader-window input.button.fw-btn-side-by-side:last-child,
.buddypress #buddypress input[type="reset"].fw-btn-side-by-side:last-child,
.buddypress #buddypress input[type="submit"].fw-btn-side-by-side:last-child,
.buddypress #buddypress ul.button-nav li a.fw-btn-side-by-side:last-child,
.buddypress a.bp-title-button.fw-btn-side-by-side:last-child {
  margin-right: 0;
}
.buddypress #buddypress .comment-reply-link:focus,
.buddypress #buddypress .generic-button a:focus,
.buddypress #buddypress a.button:focus,
.buddypress #buddypress .bp-uploader-window input.button:focus,
.buddypress #buddypress input[type="reset"]:focus,
.buddypress #buddypress input[type="submit"]:focus,
.buddypress #buddypress ul.button-nav li a:focus,
.buddypress a.bp-title-button:focus {
  background-color: <?php echo esc_js($the_core_less_variables['fw-btn-bg-color']); ?>;
  border-color: <?php echo esc_js($the_core_less_variables['fw-btn-border-color']); ?>;
  color: <?php echo esc_js($the_core_less_variables['fw-btn-text-color']); ?>;
}
.buddypress #buddypress .comment-reply-link:hover,
.buddypress #buddypress .generic-button a:hover,
.buddypress #buddypress a.button:hover,
.buddypress #buddypress .bp-uploader-window input.button:hover,
.buddypress #buddypress input[type="reset"]:hover,
.buddypress #buddypress input[type="submit"]:hover,
.buddypress #buddypress ul.button-nav li a:hover,
.buddypress a.bp-title-button:hover {
  background-color: <?php echo esc_js($the_core_less_variables['fw-btn-bg-color-hover']); ?>;
  color: <?php echo esc_js($the_core_less_variables['fw-btn-text-color-hover']); ?>;
  border: none;
}
.buddypress #buddypress .comment-reply-link:active,
.buddypress #buddypress .generic-button a:active,
.buddypress #buddypress a.button:active,
.buddypress #buddypress .bp-uploader-window input.button:active,
.buddypress #buddypress input[type="reset"]:active,
.buddypress #buddypress input[type="submit"]:active,
.buddypress #buddypress ul.button-nav li a:active,
.buddypress a.bp-title-button:active {
  box-shadow: none;
}
.buddypress .post,
.buddypress .post-details {
  margin-bottom: 0;
}
.buddypress .post-details .entry-content {
  padding-bottom: 0;
  border: none;
}
.buddypress #buddypress .item-list-tabs ul li .selectize-control .selectize-input {
  background-color: <?php echo the_core_hex2rgba($the_core_less_variables['fw-widget-input-bg'], 0.07); ?>;
}
.buddypress #buddypress .item-list-tabs ul li.current a,
.buddypress #buddypress .item-list-tabs ul li.selected a {
  background-color: <?php echo the_core_hex2rgba($the_core_less_variables['fw-widget-input-bg'], 0.07); ?>;
  color: <?php echo esc_js($the_core_less_variables['input-color']); ?>;
}
.buddypress #buddypress .standard-form input[type="text"],
.buddypress #buddypress .standard-form input[type="email"],
.buddypress #buddypress .standard-form input[type="password"],
.buddypress #buddypress .standard-form input[type="number"],
.buddypress #buddypress .standard-form textarea {
  background-color: <?php echo the_core_hex2rgba($the_core_less_variables['fw-widget-input-bg'], 0.07); ?>;
  color: <?php echo esc_js($the_core_less_variables['input-color']); ?>;
  font-family: <?php echo ($the_core_less_variables['input-font-family']); ?>;
  font-size: <?php echo esc_js($the_core_less_variables['input-font-size']); ?>;
  font-style: <?php echo esc_js($the_core_less_variables['input-font-style']); ?>;
  font-weight: <?php echo esc_js($the_core_less_variables['input-font-weight']); ?>;
  letter-spacing: <?php echo esc_js($the_core_less_variables['input-letter-spacing']); ?>;
  line-height: <?php echo esc_js($the_core_less_variables['input-line-height']); ?>;
  padding: <?php echo esc_js($the_core_less_variables['input-padding-y']); ?> <?php echo esc_js($the_core_less_variables['input-padding-x']); ?>;
  border: 1px solid transparent;
}
.buddypress #buddypress .standard-form input[type="text"]:focus,
.buddypress #buddypress .standard-form input[type="email"]:focus,
.buddypress #buddypress .standard-form input[type="password"]:focus,
.buddypress #buddypress .standard-form input[type="number"]:focus,
.buddypress #buddypress .standard-form textarea:focus {
  border-color: <?php echo the_core_adjustColorLightenDarken($the_core_less_variables['input-border'], 10); ?>;
}
.buddypress #buddypress .standard-form .selectize-control .selectize-input {
  background-color: <?php echo the_core_hex2rgba($the_core_less_variables['fw-widget-input-bg'], 0.07); ?>;
}
.buddypress #buddypress form#whats-new-form textarea,
.buddypress #buddypress div.activity-comments form textarea {
  background: <?php echo esc_js($the_core_less_variables['input-bg']); ?>;
  color: <?php echo esc_js($the_core_less_variables['input-color']); ?>;
  font-family: <?php echo ($the_core_less_variables['input-font-family']); ?>;
  font-size: <?php echo esc_js($the_core_less_variables['input-font-size']); ?>;
  font-style: <?php echo esc_js($the_core_less_variables['input-font-style']); ?>;
  font-weight: <?php echo esc_js($the_core_less_variables['input-font-weight']); ?>;
  letter-spacing: <?php echo esc_js($the_core_less_variables['input-letter-spacing']); ?>;
  line-height: <?php echo esc_js($the_core_less_variables['input-line-height']); ?>;
  border: 1px solid rgba(0, 0, 0, 0.13);
  padding: 6px;
  background: none;
}
.buddypress #buddypress form#whats-new-form textarea:focus,
.buddypress #buddypress div.activity-comments form textarea:focus {
  border-color: <?php echo the_core_adjustColorLightenDarken($the_core_less_variables['input-border'], 10); ?> !important;
}
.buddypress #buddypress form#whats-new-form .selectize-control,
.buddypress #buddypress div.activity-comments form .selectize-control {
  margin-top: 40px;
}
.buddypress #buddypress form#whats-new-form .selectize-control .selectize-input,
.buddypress #buddypress div.activity-comments form .selectize-control .selectize-input {
  background-color: <?php echo the_core_hex2rgba($the_core_less_variables['fw-widget-input-bg'], 0.07); ?>;
}
.buddypress #buddypress .checkbox,
.buddypress #buddypress .radio {
  padding-left: 0;
  margin-top: 0;
}
.buddypress #buddypress .checkbox .custom-radio label,
.buddypress #buddypress .radio .custom-radio label,
.buddypress #buddypress .checkbox .custom-checkbox label,
.buddypress #buddypress .radio .custom-checkbox label {
  font-size: <?php echo esc_js($the_core_less_variables['form-label-font-size']); ?> !important;
}

/* bbPress Widget Style */
