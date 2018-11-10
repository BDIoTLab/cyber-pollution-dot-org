/* Typography */
/* -------------------------------------------------- */

/* Body text */
/* -------------------------*/
body {
  font-family: <?php echo ($the_core_less_variables['font-family-base']); ?>;
  font-size: <?php echo esc_js($the_core_less_variables['font-size-base']); ?>;
  line-height: <?php echo esc_js($the_core_less_variables['line-height-base']); ?>;
  font-weight: <?php echo esc_js($the_core_less_variables['font-weight-base']); ?>;
  font-style: <?php echo esc_js($the_core_less_variables['font-style-base']); ?>;
  letter-spacing: <?php echo esc_js($the_core_less_variables['font-letter-spacing-base']); ?>;
  color: <?php echo esc_js($the_core_less_variables['text-color']); ?>;
}

p {
  margin: 0 0 1em 0;
}
p:last-child {
  margin-bottom: 0;
}

/* Links */
a {
  color: <?php echo esc_js($the_core_less_variables['link-color']); ?>;
}
a:hover {
  color: <?php echo esc_js($the_core_less_variables['link-hover-color']); ?>;
}
a:focus,
a:active {
  color: <?php echo esc_js($the_core_less_variables['link-color']); ?>;
}
a:hover,
a:focus,
a:active {
  text-decoration: none;
  outline: none;
}

/* Headings */
/* ------------------------- */
h1,
.h1 {
  font-family: <?php echo ($the_core_less_variables['fw-h1-font-family']); ?>;
  font-style: <?php echo esc_js($the_core_less_variables['fw-h1-font-style']); ?>;
  font-weight: <?php echo esc_js($the_core_less_variables['fw-h1-font-weight']); ?>;
  font-size: <?php echo esc_js($the_core_less_variables['fw-h1-font-size']); ?>;
  line-height: <?php echo esc_js($the_core_less_variables['fw-h1-line-height']); ?>;
  letter-spacing: <?php echo esc_js($the_core_less_variables['fw-h1-letter-spacing']); ?>;
  color: <?php echo esc_js($the_core_less_variables['fw-h1-color']); ?>;
}
h2,
.h2 {
  font-family: <?php echo ($the_core_less_variables['fw-h2-font-family']); ?>;
  font-style: <?php echo esc_js($the_core_less_variables['fw-h2-font-style']); ?>;
  font-weight: <?php echo esc_js($the_core_less_variables['fw-h2-font-weight']); ?>;
  font-size: <?php echo esc_js($the_core_less_variables['fw-h2-font-size']); ?>;
  line-height: <?php echo esc_js($the_core_less_variables['fw-h2-line-height']); ?>;
  letter-spacing: <?php echo esc_js($the_core_less_variables['fw-h2-letter-spacing']); ?>;
  color: <?php echo esc_js($the_core_less_variables['fw-h2-color']); ?>;
}
h3,
.h3 {
  font-family: <?php echo ($the_core_less_variables['fw-h3-font-family']); ?>;
  font-style: <?php echo esc_js($the_core_less_variables['fw-h3-font-style']); ?>;
  font-weight: <?php echo esc_js($the_core_less_variables['fw-h3-font-weight']); ?>;
  font-size: <?php echo esc_js($the_core_less_variables['fw-h3-font-size']); ?>;
  line-height: <?php echo esc_js($the_core_less_variables['fw-h3-line-height']); ?>;
  letter-spacing: <?php echo esc_js($the_core_less_variables['fw-h3-letter-spacing']); ?>;
  color: <?php echo esc_js($the_core_less_variables['fw-h3-color']); ?>;
}
h4,
.h4 {
  font-family: <?php echo ($the_core_less_variables['fw-h4-font-family']); ?>;
  font-style: <?php echo esc_js($the_core_less_variables['fw-h4-font-style']); ?>;
  font-weight: <?php echo esc_js($the_core_less_variables['fw-h4-font-weight']); ?>;
  font-size: <?php echo esc_js($the_core_less_variables['fw-h4-font-size']); ?>;
  line-height: <?php echo esc_js($the_core_less_variables['fw-h4-line-height']); ?>;
  letter-spacing: <?php echo esc_js($the_core_less_variables['fw-h4-letter-spacing']); ?>;
  color: <?php echo esc_js($the_core_less_variables['fw-h4-color']); ?>;
}
h5,
.h5 {
  font-family: <?php echo ($the_core_less_variables['fw-h5-font-family']); ?>;
  font-style: <?php echo esc_js($the_core_less_variables['fw-h5-font-style']); ?>;
  font-weight: <?php echo esc_js($the_core_less_variables['fw-h5-font-weight']); ?>;
  font-size: <?php echo esc_js($the_core_less_variables['fw-h5-font-size']); ?>;
  line-height: <?php echo esc_js($the_core_less_variables['fw-h5-line-height']); ?>;
  letter-spacing: <?php echo esc_js($the_core_less_variables['fw-h5-letter-spacing']); ?>;
  color: <?php echo esc_js($the_core_less_variables['fw-h5-color']); ?>;
}
h6,
.h6 {
  font-family: <?php echo ($the_core_less_variables['fw-h6-font-family']); ?>;
  font-style: <?php echo esc_js($the_core_less_variables['fw-h6-font-style']); ?>;
  font-weight: <?php echo esc_js($the_core_less_variables['fw-h6-font-weight']); ?>;
  font-size: <?php echo esc_js($the_core_less_variables['fw-h6-font-size']); ?>;
  line-height: <?php echo esc_js($the_core_less_variables['fw-h6-line-height']); ?>;
  letter-spacing: <?php echo esc_js($the_core_less_variables['fw-h6-letter-spacing']); ?>;
  color: <?php echo esc_js($the_core_less_variables['fw-h6-color']); ?>;
}
h1 small,
h2 small,
h3 small,
h4 small,
h5 small,
h6 small,
.h1 small,
.h2 small,
.h3 small,
.h4 small,
.h5 small,
.h6 small,
h1 .small,
h2 .small,
h3 .small,
h4 .small,
h5 .small,
h6 .small,
.h1 .small,
.h2 .small,
.h3 .small,
.h4 .small,
.h5 .small,
.h6 .small {
  font-weight: normal;
  line-height: 1;
}
h1,
.h1,
h2,
.h2,
h3,
.h3 {
  margin-top: 10px;
  margin-bottom: 10px;
}
h1 small,
.h1 small,
h2 small,
.h2 small,
h3 small,
.h3 small,
h1 .small,
.h1 .small,
h2 .small,
.h2 .small,
h3 .small,
.h3 .small {
  font-size: 65%;
}
h4 small,
.h4 small,
h5 small,
.h5 small,
h6 small,
.h6 small,
h4 .small,
.h4 .small,
h5 .small,
.h5 .small,
h6 .small,
.h6 .small {
  font-size: 75%;
}
/* text inside Post */
.fw-text h1 small,
.entry-content h1 small,
.fw-text h2 small,
.entry-content h2 small,
.fw-text h3 small,
.entry-content h3 small,
.fw-text h4 small,
.entry-content h4 small,
.fw-text h5 small,
.entry-content h5 small,
.fw-text h6 small,
.entry-content h6 small,
.fw-text .h1 small,
.entry-content .h1 small,
.fw-text .h2 small,
.entry-content .h2 small,
.fw-text .h3 small,
.entry-content .h3 small,
.fw-text .h4 small,
.entry-content .h4 small,
.fw-text .h5 small,
.entry-content .h5 small,
.fw-text .h6 small,
.entry-content .h6 small,
.fw-text h1 .small,
.entry-content h1 .small,
.fw-text h2 .small,
.entry-content h2 .small,
.fw-text h3 .small,
.entry-content h3 .small,
.fw-text h4 .small,
.entry-content h4 .small,
.fw-text h5 .small,
.entry-content h5 .small,
.fw-text h6 .small,
.entry-content h6 .small,
.fw-text .h1 .small,
.entry-content .h1 .small,
.fw-text .h2 .small,
.entry-content .h2 .small,
.fw-text .h3 .small,
.entry-content .h3 .small,
.fw-text .h4 .small,
.entry-content .h4 .small,
.fw-text .h5 .small,
.entry-content .h5 .small,
.fw-text .h6 .small,
.entry-content .h6 .small {
  color: #bfbfbf;
}

hr{
  margin: <?php echo ( (int)$the_core_less_variables['fw-space-between-elements-sm'] ) / 2; ?>px auto;
}

/* Blockquote */
blockquote {
  color: <?php echo esc_js($the_core_less_variables['text-color']); ?>;
  font-family: <?php echo ($the_core_less_variables['font-family-base']); ?>;
  font-weight: <?php echo esc_js($the_core_less_variables['font-weight-base']); ?>;
  font-size: 19px;
  line-height: 35px;
  font-style: italic;
  border: none;
  padding: 0;
  margin: 1.8em 0 1.8em 0;
  clear: both;
}
blockquote .fw-symbols-quote {
  color: <?php echo esc_js($the_core_less_variables['text-color']); ?>;
  display: block;
  font-size: 100px;
}
blockquote:after {
  display: block;
  content: "";
  width: 33%;
  height: 1px;
  margin: 1.5em auto 0 auto;
  background-color: #dee0e1;
}
blockquote.fw-quote-position {
  position: relative;
}
blockquote.fw-quote-position .fw-symbols-quote {
  position: absolute;
  z-index: 1;
  width: 50px;
  top: 35%;
  left: 50%;
  text-align: center !important;
}
blockquote.fw-quote-position .fw-quote-text {
  z-index: 4;
  position: relative;
}
blockquote cite {
  color: <?php echo esc_js($the_core_less_variables['theme-color-3']); ?>;
  font-family: <?php echo ($the_core_less_variables['fw-buttons-font-family']); ?>;
  font-weight: <?php echo esc_js($the_core_less_variables['fw-buttons-font-weight']); ?>;
  font-style: <?php echo esc_js($the_core_less_variables['fw-buttons-font-style']); ?>;
  font-size: <?php echo ceil( floatval($the_core_less_variables['font-size-base']) * 1.06); ?>px;
  display: block;
  text-align: center;
  margin-top: 0.6em;
}

/*Responsive*/
/*Screen 568px*/
@media(max-width:767px){
  h1, .h1,
  h2, .h2,
  h3, .h3,
  h4, .h4,
  h5, .h5,
  h6, .h6{
    letter-spacing: 0 !important;
  }
}