/* Quote */
/* -------------------------------------------------- */
.fw-quote {
  color: <?php echo esc_js($the_core_less_variables['text-color']); ?>;
  margin: 0;
}
.fw-quote:after {
  display: none;
}
.fw-quote .fw-quote-text *:last-child {
  margin-bottom: 0;
}
.fw-quote small.fw-quote-author {
  font-family: <?php echo ($the_core_less_variables['subtitles-family']); ?>;
  font-weight: <?php echo esc_js($the_core_less_variables['subtitles-weight']); ?>;
  font-style: <?php echo esc_js($the_core_less_variables['subtitles-style']); ?>;
  font-size: <?php echo floor(floatval($the_core_less_variables['font-size-base'])*1.06); ?>px;
  line-height: <?php echo esc_js($the_core_less_variables['subtitles-line-height']); ?>;
  letter-spacing: <?php echo esc_js($the_core_less_variables['subtitles-letter-spacing']); ?>;
  color: <?php echo esc_js($the_core_less_variables['subtitles-color']); ?>;
  display: block;
}
.fw-quote small.fw-quote-author span {
  display: block;
}
.fw-quote small.fw-quote-author .fw-quote-author-line {
  display: inline-block;
  max-width: 100%;
  width: 33%;
  height: 1px;
  margin: 0.5em auto 0.5em auto;
  background-color: #dee0e1;
  overflow: hidden;
}
.fw-quote small.fw-quote-author:before {
  display: none;
}
/* quote text align */
.fw-quote.fw-quote-left small:before {
  margin-left: 0;
  margin-bottom: 1em;
}
.fw-quote.fw-quote-left:before {
  text-align: left;
}
.fw-quote.fw-quote-left p:first-child:before {
  text-align: left;
}
.fw-quote.fw-quote-right {
  text-align: right;
}
.fw-quote.fw-quote-right small:before {
  float: none;
  margin-right: 0;
  margin-bottom: 1em;
}
.fw-quote.fw-quote-right:before {
  text-align: right;
}
.fw-quote.fw-quote-right p:first-child:before {
  text-align: right;
}
.fw-quote.fw-quote-center {
  text-align: center;
}
.fw-quote.fw-quote-center small:before {
  margin: 5px auto 10px auto;
}
.fw-quote.fw-quote-center:before {
  text-align: center;
}
