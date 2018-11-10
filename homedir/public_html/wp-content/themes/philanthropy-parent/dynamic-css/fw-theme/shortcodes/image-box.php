/* Image Box */
/* -------------------------------------------------- */
.fw-imagebox {
  position: relative;
}
/* Overlay styling */
.fw-imagebox .fw-block-image-parent {
  font-style: normal;
  margin-bottom: 0;
  z-index: 3;
}
.fw-imagebox .fw-block-image-parent .fw-block-image-child:hover {
  cursor: default;
}
.fw-imagebox .fw-block-image-parent .fw-block-image-child.fw-imagebox-image:hover {
  cursor: pointer !important;
}
.fw-imagebox.bg-on {
  background-color: #e2e2e2;
}
.fw-imagebox.bg-on .fw-imagebox-aside {
  position: relative;
  padding: 20px 15px;
  z-index: 3;
}
.fw-imagebox.bg-on .fw-imagebox-title {
  margin-top: 0;
}
.fw-imagebox.text-center .fw-imagebox-title:after {
  margin: 10px auto 0 auto;
}
.fw-imagebox .fw-imagebox-image {
  position: relative;
  display: block;
}
.fw-imagebox .fw-imagebox-image.fw-block-image-child:hover {
  cursor: pointer;
}
.fw-imagebox.imagebox-boxed {
  padding: 20px;
  border: 1px solid #ccc;
}
.fw-imagebox.imagebox-boxed.bg-on .fw-imagebox-aside {
  padding-bottom: 0;
}
.fw-imagebox.no-divider .fw-imagebox-title:after {
  display: none;
}
/* Image position "Left, Right" (Other option for position image in map image-styling/image) */
.fw-imagebox .fw-block-image-left,
.fw-imagebox .fw-block-image-right {
  margin: 0;
}
.fw-imagebox-title-wrap{
  margin-bottom: 15px;
}
.fw-imagebox-title {
  margin-top: 0;
  margin-bottom: 5px;
}
.fw-imagebox-title strong {
  font-style: normal;
}
.fw-imagebox-subtitle {
  font-family: <?php echo ($the_core_less_variables['subtitles-family']); ?>;
  font-style: <?php echo esc_js($the_core_less_variables['subtitles-style']); ?>;
  font-size: <?php echo esc_js($the_core_less_variables['subtitles-size']); ?>;
  font-weight: <?php echo esc_js($the_core_less_variables['subtitles-weight']); ?>;
  line-height: <?php echo esc_js($the_core_less_variables['subtitles-line-height']); ?>;
  letter-spacing: <?php echo esc_js($the_core_less_variables['subtitles-letter-spacing']); ?>;
  color: <?php echo esc_js($the_core_less_variables['subtitles-color']); ?>;
  margin: 0;
}
.fw-imagebox-text {
  padding: 0 0 10px 0;
}
.fw-imagebox-text p:last-child {
  margin-bottom: 0;
}
.fw-imagebox-btn {
  padding-top: 15px;
  padding-bottom: 15px;
}
/* Style 1 */
.fw-imagebox-1 .fw-imagebox-aside {
  display: block;
  overflow: hidden;
  width: 100%;
}
.fw-imagebox-1 .fw-block-image-parent{
  margin-bottom: 1em;
}
/* Style 2 */
.fw-imagebox-2 {
  background-position: center center;
  background-repeat: no-repeat;
  background-size: cover;
  position: relative;
}
.fw-imagebox-2 .fw-imagebox-aside {
  margin: 20px;
  padding: 20px;
  display: block;
}
.fw-imagebox-2 .fw-imagebox-link {
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  z-index: 2;
}
.fw-imagebox-2 .fw-imagebox-text a {
  text-decoration: underline;
}
.fw-imagebox-2 .fw-imagebox-btn {
  padding-bottom: 0;
}
.fw-imagebox-2 .fw-main-row-overlay {
  left: 20px;
  right: 20px;
  top: 20px;
  bottom: 20px;
  z-index: 1;
}
.fw-imagebox-2 .fw-imagebox-aside {
  z-index: 2;
  position: relative;
}
