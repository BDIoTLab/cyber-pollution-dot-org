/* Team Member */
/* -------------------------------------------------- */
.fw-team {
  text-align: center;
}
/* Team Member Content Align */
.fw-team.fw-content-align-left {
  text-align: left;
}
.fw-team.fw-content-align-left .fw-team-image {
  margin-right: auto;
}
.fw-team.fw-content-align-center {
  text-align: center;
}
.fw-team.fw-content-align-center .fw-team-image {
  margin-left: auto;
  margin-right: auto;
}
.fw-team.fw-content-align-right {
  text-align: right;
}
.fw-team.fw-content-align-right .fw-team-image {
  margin-left: auto;
}
.fw-team .fw-team-text {
  margin-top: 15px;
}
.fw-team .fw-team-name h1,
.fw-team .fw-team-name h2,
.fw-team .fw-team-name h3,
.fw-team .fw-team-name h4,
.fw-team .fw-team-name h5,
.fw-team .fw-team-name h6 {
  margin: 0;
}
.fw-team .fw-team-name h1 strong,
.fw-team .fw-team-name h2 strong,
.fw-team .fw-team-name h3 strong,
.fw-team .fw-team-name h4 strong,
.fw-team .fw-team-name h5 strong,
.fw-team .fw-team-name h6 strong {
  font-style: normal;
}
.fw-team .fw-team-name > span {
  font-family: <?php echo ($the_core_less_variables['subtitles-family']); ?>;
  font-weight: <?php echo esc_js($the_core_less_variables['subtitles-weight']); ?>;
  font-style: <?php echo esc_js($the_core_less_variables['subtitles-style']); ?>;
  font-size: <?php echo esc_js($the_core_less_variables['subtitles-size']); ?>;
  line-height: <?php echo esc_js($the_core_less_variables['subtitles-line-height']); ?>;
  letter-spacing: <?php echo esc_js($the_core_less_variables['subtitles-letter-spacing']); ?>;
  display: block;
  margin-top: 5px;
}
.fw-team .fw-team-image {
  margin-bottom: 1em;
}
.fw-team .fw-team-image .fw-image-link {
  display: inline-block;
  max-width: 100%;
}
.fw-team .fw-team-socials {
  margin-top: 15px;
}
.fw-team .fw-team-socials a {
  display: inline-block;
  margin: 0 2px;
  font-size: 20px;
  color: #b7b8ba;
  opacity: 1;
}
.fw-team .fw-team-socials a:hover {
  color: <?php echo esc_js($the_core_less_variables['theme-color-1']); ?>;
  opacity: 0.7;
}

/* Team Member Type 2 */
.fw-team.fw-team-member-type-2.fw-content-align-left .fw-block-image-overlay {
  text-align: left;
}
.fw-team.fw-team-member-type-2.fw-content-align-center .fw-block-image-overlay {
  text-align: center;
}
.fw-team.fw-team-member-type-2.fw-content-align-right .fw-block-image-overlay {
  text-align: right;
}
.fw-team.fw-team-member-type-2 .fw-team-inner {
  max-height: 100%;
  overflow-y: auto;
  padding: 5px 0;
}
.fw-team.fw-team-member-type-2 .fw-team-image {
  margin-bottom: 0;
}
.fw-team.fw-team-member-type-2 .fw-block-image-child {
  box-shadow: inset 0 0 0 1px <?php echo esc_js($the_core_less_variables['fw-block-image-frame-color']); ?>;
}
.fw-team.fw-team-member-type-2.fw-overlay-1 .fw-block-image-child:hover {
  cursor: default;
}
.fw-team.fw-team-member-type-2 .fw-team-socials {
  line-height: 0;
}

