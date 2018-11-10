/* Dividers & Space */
/* -------------------------------------------------- */

/* Divider space (empty) */
.fw-divider-space {
  clear: both;
  width: 100%;
}
.fw-divider-space.space-sm {
  height: <?php echo esc_js($the_core_less_variables['fw-divider-space-sm']); ?>;
}
.fw-divider-space.space-md {
  height: <?php echo esc_js($the_core_less_variables['fw-divider-space-md']); ?>;
}
.fw-divider-space.space-lg {
  height: <?php echo esc_js($the_core_less_variables['fw-divider-space-lg']); ?>;
}
/* Positionate the divider */
.fw-divider.fw-divider-align-left{
  margin-left: 0;
  margin-right: auto;
}
.fw-divider.fw-divider-align-center{
  margin-left: auto;
  margin-right: auto;
}
.fw-divider.fw-divider-align-right{
  margin-left: auto;
  margin-right: 0;
}
/* Divider only Line */
.fw-divider-line {
  clear: both;
  position: relative;
  margin-left: auto;
  margin-right: auto;
  max-width: 100%;
}
.fw-divider-line.space-sm {
  margin-bottom: <?php echo floatval($the_core_less_variables['fw-divider-space-sm']) / 2; ?>px;
  padding-top: <?php echo floatval($the_core_less_variables['fw-divider-space-sm']) / 2; ?>px;
}
.fw-divider-line.space-md {
  margin-bottom: <?php echo floatval($the_core_less_variables['fw-divider-space-md']) / 2; ?>px;
  padding-top: <?php echo floatval($the_core_less_variables['fw-divider-space-md']) / 2; ?>px;
}
.fw-divider-line.space-lg {
  margin-bottom: <?php echo floatval($the_core_less_variables['fw-divider-space-lg']) / 2; ?>px;
  padding-top: <?php echo floatval($the_core_less_variables['fw-divider-space-lg']) / 2; ?>px;
}
/* Divider line styles */
.fw-divider-line.fw-line-solid {
  border-bottom: 2px solid #666;
}
.fw-divider-line.fw-line-dashed {
  border-bottom: 2px dashed #666;
}
.fw-divider-line.fw-line-dotted {
  border-bottom: 2px dotted #666;
}
.fw-divider-line.fw-line-double {
  border-bottom: 3px double #666;
}
.fw-divider-line.fw-line-thick {
  border-bottom: 4px solid #666;
}
/* Divider Special (text or icon) */
.fw-divider-special {
  clear: both;
  position: relative;
  text-align: center;
  overflow: hidden;
}
.fw-divider-special .fw-divider-title{
  color: #666;
}
.fw-divider-special.space-sm {
  margin-top: <?php echo floatval($the_core_less_variables['fw-divider-space-sm']) / 2; ?>px;
  margin-bottom: <?php echo floatval($the_core_less_variables['fw-divider-space-sm']) / 2; ?>px;
}
.fw-divider-special.space-md {
  margin-top: <?php echo floatval($the_core_less_variables['fw-divider-space-md']) / 2; ?>px;
  margin-bottom: <?php echo floatval($the_core_less_variables['fw-divider-space-md']) / 2; ?>px;
}
.fw-divider-special.space-lg {
  margin-top: <?php echo floatval($the_core_less_variables['fw-divider-space-lg']) / 2; ?>px;
  margin-bottom: <?php echo floatval($the_core_less_variables['fw-divider-space-lg']) / 2; ?>px;
}
.fw-divider-special .fw-divider-inner {
  color: <?php echo esc_js($the_core_less_variables['theme-color-1']); ?>;
  font-family: <?php echo ($the_core_less_variables['font-family-2']); ?>;
}
/* Title / Icon alignment */
.fw-divider-special.title-right {
  clear: both;
}
.fw-divider-special.title-left {
  text-align: left;
}
.fw-divider-special.title-left .fw-divider-title {
  padding-left: 0;
}
.fw-divider-special.title-right {
  text-align: right;
}
.fw-divider-special.title-right .fw-divider-title {
  padding-right: 0;
}
/* line holder styles */
.fw-divider-special .fw-divider-holder {
  border-color: #666;
  content: "";
  display: block;
  position: absolute;
  top: 50%;
  margin-top: -0.5px;
  width: 3000px;
}
.fw-divider-special .fw-divider-left {
  margin-right: 10px;
  right: 100%;
}
.fw-divider-special .fw-divider-right {
  left: 100%;
  margin-left: 10px;
}
.fw-divider-special.fw-line-solid .fw-divider-holder {
  border-top-style: solid;
  border-top-width: 1px;
}
.fw-divider-special.fw-line-dashed .fw-divider-holder {
  border-top-style: dashed;
  border-top-width: 1px;
}
.fw-divider-special.fw-line-dotted .fw-divider-holder {
  border-top-style: dotted;
  border-top-width: 1px;
}
.fw-divider-special.fw-line-double .fw-divider-holder {
  border-top-style: double;
  border-top-width: 3px;
}
.fw-divider-special.fw-line-thick .fw-divider-holder {
  border-top-style: solid;
  border-top-width: 4px;
}
.fw-divider-special.fw-line-none .fw-divider-holder {
  display: none;
}
/* divider space top & bottom */
.fw-divider-special .fw-divider-inner {
  display: inline-block;
  position: relative;
  top: 50%;
}

/* divider icon & title size */
.fw-divider-special.fw-divider-size-sm .fw-divider-inner{
  font-size: 16px;
}
.fw-divider-special.fw-divider-size-md .fw-divider-inner{
  font-size: 22px;
}
.fw-divider-special.fw-divider-size-lg .fw-divider-inner{
  font-size: 36px;
}

/* Icon as Title */
.fw-divider-special.fw-divider-icon-upload .fw-divider-inner,
.fw-divider-special.fw-divider-icon .fw-divider-inner{
  padding: 0;
  border-radius: 50%;
  text-align: center;
  font-size: 18px;
  width: 40px;
  height: 40px;
  line-height: 40px;
}
.fw-divider-icon.divider-bg-on .fw-divider-title,
.fw-divider-icon-upload.divider-bg-on .fw-divider-title{
  position: relative;
  top: 1px;
}
.fw-divider-special.fw-divider-icon .fw-divider-inner .fw-divider-title i{
  position: relative;
  font-size: 18px;
}
.fw-divider-special.fw-divider-icon-upload .fw-divider-inner{
  font-size: 12px !important;
  line-height: 30px;
}
.fw-divider-special.fw-divider-icon-upload .fw-divider-inner .fw-divider-title{
  vertical-align: middle;
  top: 0;
}
.fw-divider-special.fw-divider-icon-upload .fw-divider-inner .fw-divider-title img{
  width: 18px;
}
/* Style with background color */
.divider-bg-on .fw-divider-inner{
  padding: 0.5em 1em;
  background-color: #666;
  border-radius: 3px;
  color: #fff;
}
.divider-bg-on .fw-divider-title{
  color: #fff;
}

/*----> Responsive <---- */
/* Screen 568px */
@media(max-width:767px){
  .fw-divider-space.space-lg {
    max-height: 70px;
  }
  .fw-divider-space.fw-custom-space {
    max-height: 60px;
  }
}