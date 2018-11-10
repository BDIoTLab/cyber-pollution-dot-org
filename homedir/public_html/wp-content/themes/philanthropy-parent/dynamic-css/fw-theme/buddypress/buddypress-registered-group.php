/* buddyPress Registered Form & Create Group Form */
#buddypress .standard-form#signup_form input[type=text],
#buddypress .standard-form#signup_form input[type=email],
#buddypress .standard-form#signup_form input[type=password],
#buddypress .standard-form#signup_form textarea {
  width: 100%;
}
#buddypress #create-group-form.standard-form .bp-avatar-nav {
  margin-top: 90px;
}
.group-members.members #buddypress #item-body div.item-list-tabs {
  margin-top: 30px;
}
#buddypress ul.acfb-holder li.friend-tab {
  margin-right: 50%;
  margin-bottom: 10px;
  display: inline-block;
  border-radius: 0;
  float: none;
}
#buddypress li.friend-tab img.avatar {
  margin-right: 10px;
}
#buddypress ul.item-list li div.item-desc {
  width: 65%;
  font-size: 85%;
  margin-top: 0;
}
#buddypress ul.item-list li div.item-desc p {
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
}
#buddypress #create-group-form.standard-form .submit#previous-next input[type="button"]#group-creation-previous {
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
  /* fw-btn-1 */
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
#buddypress #create-group-form.standard-form .submit#previous-next input[type="button"]#group-creation-previous span,
#buddypress #create-group-form.standard-form .submit#previous-next input[type="button"]#group-creation-previous i {
  position: relative;
  top: 1px;
}
#buddypress #create-group-form.standard-form .submit#previous-next input[type="button"]#group-creation-previous:hover,
#buddypress #create-group-form.standard-form .submit#previous-next input[type="button"]#group-creation-previous:focus {
  text-decoration: none;
  outline: none;
}
#buddypress #create-group-form.standard-form .submit#previous-next input[type="button"]#group-creation-previous i,
#buddypress #create-group-form.standard-form .submit#previous-next input[type="button"]#group-creation-previous img {
  margin-right: 13px;
}
#buddypress #create-group-form.standard-form .submit#previous-next input[type="button"]#group-creation-previous i.pull-right,
#buddypress #create-group-form.standard-form .submit#previous-next input[type="button"]#group-creation-previous img.pull-right,
#buddypress #create-group-form.standard-form .submit#previous-next input[type="button"]#group-creation-previous i.pull-right-icon,
#buddypress #create-group-form.standard-form .submit#previous-next input[type="button"]#group-creation-previous img.pull-right-icon {
  margin-right: 0;
  margin-left: 13px;
  position: relative;
}
#buddypress #create-group-form.standard-form .submit#previous-next input[type="button"]#group-creation-previous i.pull-right,
#buddypress #create-group-form.standard-form .submit#previous-next input[type="button"]#group-creation-previous img.pull-right {
  top: 0.3em;
}
#buddypress #create-group-form.standard-form .submit#previous-next input[type="button"]#group-creation-previous img {
  position: relative;
  top: -0.1em;
}
#buddypress #create-group-form.standard-form .submit#previous-next input[type="button"]#group-creation-previous i {
  top: -1px;
  vertical-align: middle;
}
#buddypress #create-group-form.standard-form .submit#previous-next input[type="button"]#group-creation-previous.fw-btn-side-by-side {
  margin-right: 10px;
}
#buddypress #create-group-form.standard-form .submit#previous-next input[type="button"]#group-creation-previous.fw-btn-side-by-side:last-child {
  margin-right: 0;
}
#buddypress #create-group-form.standard-form .submit#previous-next input[type="button"]#group-creation-previous:focus {
  background-color: <?php echo esc_js($the_core_less_variables['fw-btn-bg-color']); ?>;
  border-color: <?php echo esc_js($the_core_less_variables['fw-btn-border-color']); ?>;
  color: <?php echo esc_js($the_core_less_variables['fw-btn-text-color']); ?>;
}
#buddypress #create-group-form.standard-form .submit#previous-next input[type="button"]#group-creation-previous:hover {
  background-color: <?php echo esc_js($the_core_less_variables['fw-btn-bg-color-hover']); ?>;
  color: <?php echo esc_js($the_core_less_variables['fw-btn-text-color-hover']); ?>;
  border: none;
}
#buddypress #create-group-form.standard-form .submit#previous-next input[type="button"]#group-creation-previous:active {
  box-shadow: none;
}
