/* Utility classes */
.pull-right {
  float: right !important;
}
.pull-left {
  float: left !important;
}

/* Clearfix */
.clearfix:before,
.clearfix:after {
  content: " ";
  display: table;
}
.clearfix:after {
  clear: both;
}
.center-block {
  display: block;
  margin-left: auto;
  margin-right: auto;
}
.text-hide {
  font: 0/0 a;
}

/* Toggling content */
/* ------------------------- */
/* Note: Deprecated .hide in favor of .hidden or .sr-only (as appropriate) in v3.0.1 */
.hide {
  display: none !important;
}
.show {
  display: block !important;
}
.invisible {
  visibility: hidden;
}
.text-hide {
  color: transparent;
  text-shadow: none;
  background-color: transparent;
  border: 0;
}

/* Hide from screenreaders and browsers */
/* Credit: HTML5 Boilerplate */
.hidden {
  display: none !important;
  visibility: hidden !important;
}

/* For Affix plugin */
/* ------------------------- */
.affix {
  position: fixed;
}

/* For Vertical Align text */
/* ------------------------- */
.fw-itable {
  display: table;
  height: 100%;
  width: 100%;
}
.fw-icell {
  display: table-cell;
  vertical-align: middle;
}
img,
iframe,
embed{
  max-width: 100%;
}