/* Testimonails */
/* -------------------------------------------------- */
.fw-testimonials {
  position: relative;
  opacity: 1;
  width: 100%;
  min-width: 260px;
  -webkit-transition: all 0.5s ease;
  -o-transition: all 0.5s ease;
  transition: all 0.5s ease;
}
.fw-testimonials.hide-slider {
  height: 1px;
  overflow: hidden;
  opacity: 0;
}
.fw-testimonials.hide-slider .fw-slider-item img {
  visibility: hidden;
}
.fw-testimonials.hide-slider .fw-slider-prev,
.fw-testimonials.hide-slider .fw-slider-next,
.fw-testimonials.hide-slider .fw-slider-pagination,
.fw-testimonials.hide-slider .fw-slider-caption {
  opacity: 0 !important;
}
.fw-testimonials .fw-testimonials-item {
  position: relative;
  float: left;
}
.fw-testimonials .fw-testimonials-text {
  font-size: <?php echo esc_js($the_core_less_variables['font-size-base']); ?>;
  font-family: <?php echo ($the_core_less_variables['font-family-base']); ?>;
  font-weight: <?php echo esc_js($the_core_less_variables['font-weight-base']); ?>;
  color: <?php echo esc_js($the_core_less_variables['text-color']); ?>;
  font-style: italic;
}
.fw-testimonials .fw-testimonials-text p {
  margin-bottom: 1.4em;
}
.fw-testimonials .fw-testimonials-text p:last-child {
  margin-bottom: 0;
}
.fw-testimonials .prev,
.fw-testimonials .next {
  color: <?php echo esc_js($the_core_less_variables['text-color']); ?>;
  height: 40px;
  line-height: 40px;
  font-size: 40px;
  text-align: center;
  font-weight: normal;
  opacity: 0.3;
}
.fw-testimonials .prev:hover,
.fw-testimonials .next:hover {
  opacity: 0.4
}
.fw-testimonials .prev:active,
.fw-testimonials .next:active {
  margin-top: 1px;
  opacity: 0.4
}
.fw-testimonials .prev i:before {
  content: "\f104";
}
.fw-testimonials .next i:before {
  content: "\f105";
}
.fw-testimonials .fw-testimonials-pagination a {
  width: 10px;
  height: 10px;
  background-color: <?php echo esc_js($the_core_less_variables['text-color']); ?>;
  display: inline-block;
  margin: 3px;
  border-radius: 50%;
  overflow: hidden;
  opacity: 0.1;
}
.fw-testimonials .fw-testimonials-pagination a.selected,
.fw-testimonials .fw-testimonials-pagination a:hover {
  opacity: 0.3;
}
.fw-testimonials .fw-testimonials-pagination a span {
  display: block;
  text-indent: -300px;
}

/* Testimonial rating */
.fw-testimonials .fw-testimonials-rating {
  margin-top: 5px;
}
.fw-testimonials .fw-testimonials-rating i {
  color: #f2b827;
}

/* Testimonials Type 1 */
.fw-testimonials-1 {
  text-align: center;
}
.fw-testimonials-1 .fw-testimonials-item {
  text-align: center;
}
.fw-testimonials-1 .fw-testimonials-avatar {
  margin: <?php echo (floatval($the_core_less_variables['fw-space-between-elements-sm'])/2).'px'; ?> 0;
}
.fw-testimonials-1 .fw-testimonials-avatar .fw-testimonials-avatar-img {
  width: 90px;
  height: 90px;
  margin: 0 auto;
  border-radius: 50%;
}
.fw-testimonials-1 .fw-testimonials-avatar img {
  display: inline-block;
  border-radius: 50%;
}
.fw-testimonials-1 .fw-testimonials-text {
  text-align: center;
  padding: 10px 10% 0;
}
.fw-testimonials-1 .fw-testimonials-author {
  color: <?php echo esc_js($the_core_less_variables['theme-color-5']); ?>;
  padding: 0 10px 0;
}
.fw-testimonials-1 .fw-testimonials-author .author-name {
  font-family: <?php echo ($the_core_less_variables['subtitles-family']); ?>;
  font-weight: <?php echo esc_js($the_core_less_variables['subtitles-weight']); ?>;
  font-style: <?php echo esc_js($the_core_less_variables['subtitles-style']); ?>;
  font-size: <?php echo esc_js($the_core_less_variables['subtitles-size']); ?>;
  letter-spacing: <?php echo esc_js($the_core_less_variables['subtitles-letter-spacing']); ?>;
  display: block;
}
.fw-testimonials-1 .fw-testimonials-author .author-name strong {
  font-style: normal;
}
.fw-testimonials-1 .fw-testimonials-author em {
  font-size: 14px;
}
.fw-testimonials-1 .fw-testimonials-author .fw-testimonials-url:before {
  content: " | ";
  margin-left: 2px;
}
.fw-testimonials-1 .fw-testimonials-author em,
.fw-testimonials-1 .fw-testimonials-author .fw-testimonials-url {
  font-family: <?php echo ($the_core_less_variables['fw-buttons-font-family']); ?>;
}
.fw-testimonials-1 .prev,
.fw-testimonials-1 .next {
  position: absolute;
  z-index: 2;
  top: 42%;
  font-size: 40px;
}
.fw-testimonials-1 .prev i,
.fw-testimonials-1 .next i {
  position: relative;
  top: -1px;
}
.fw-testimonials-1 .prev:hover,
.fw-testimonials-1 .next:hover {
  color: <?php echo esc_js($the_core_less_variables['theme-color-2']); ?>;
}
.fw-testimonials-1 .prev:active,
.fw-testimonials-1 .next:active {
  margin-top: 1px;
}
.fw-testimonials-1 .prev {
  left: 1px;
}
.fw-testimonials-1 .prev i {
  left: -2px;
}
.fw-testimonials-1 .prev i:before {
  content: "\f104";
}
.fw-testimonials-1 .next {
  right: 1px;
}
.fw-testimonials-1 .next i {
  right: -2px;
}
.fw-testimonials-1 .next i:before {
  content: "\f105";
}
.fw-testimonials-1 .fw-testimonials-pagination {
  text-align: center;
  margin-top: 10px;
}

/* Testimonials Type 2 */
.fw-testimonials-2 .fw-testimonials-item {
  margin-top: 1px;
}
.fw-testimonials-2 .fw-testimonials-text {
  position: relative;
  border-radius: 0;
  padding: 20px;
  margin-bottom: 30px;
  background-color: <?php echo esc_js($the_core_less_variables['theme-color-4']); ?>;
}
.fw-testimonials-2 .fw-testimonials-text:before {
  content: '';
  display: block;
  width: 0;
  height: 0;
  position: absolute;
  border-style: solid;
  left: 37px;
  bottom: -15px;
  margin-left: -1px;
  border-width: 15px 15px 0 15px;
  border-color: <?php echo esc_js($the_core_less_variables['theme-color-4']); ?> transparent transparent transparent;
}
.fw-testimonials-2 .fw-testimonials-meta {
  display: table;
}
.fw-testimonials-2 .fw-testimonials-meta > div {
  display: table-cell;
  vertical-align: middle;
}
.fw-testimonials-2 .fw-testimonials-avatar {
  margin-right: 10px;
}
.fw-testimonials-2 .fw-testimonials-avatar .fw-testimonials-avatar-img {
  width: 90px;
  height: 90px;
  border-radius: 50%;
}
.fw-testimonials-2 .fw-testimonials-avatar img {
  border-radius: 50%;
}
.fw-testimonials-2 .fw-testimonials-author {
  color: <?php echo esc_js($the_core_less_variables['theme-color-5']); ?>;
  padding: 0 0 0 20px;
}
.fw-testimonials-2 .fw-testimonials-author .author-name {
  font-family: <?php echo ($the_core_less_variables['subtitles-family']); ?>;
  font-weight: <?php echo esc_js($the_core_less_variables['subtitles-weight']); ?>;
  font-style: <?php echo esc_js($the_core_less_variables['subtitles-style']); ?>;
  font-size: <?php echo esc_js($the_core_less_variables['subtitles-size']); ?>;
  letter-spacing: <?php echo esc_js($the_core_less_variables['subtitles-letter-spacing']); ?>;
  display: block;
}
.fw-testimonials-2 .fw-testimonials-author .author-name strong {
  font-style: normal;
}
.fw-testimonials-2 .fw-testimonials-author em {
  font-style: normal;
  font-size: 14px;
}
.fw-testimonials-2 .fw-testimonials-author .fw-testimonials-url {
  display: block;
  font-size: 95%;
}
.fw-testimonials-2 .fw-testimonials-author em,
.fw-testimonials-2 .fw-testimonials-author .fw-testimonials-url {
  font-family: <?php echo ($the_core_less_variables['fw-buttons-font-family']); ?>;
}
.fw-testimonials-2 .fw-testimonials-arrows {
  display: inline-block;
  position: absolute;
  bottom: 20px;
  right: 0;
  z-index: 2;
}
.fw-testimonials-2 .fw-testimonials-arrows a {
  margin: 0 5px;
}
.fw-testimonials-2 .fw-testimonials-pagination {
  position: absolute;
  display: inline-block;
  bottom: 20px;
  right: 70px;
  z-index: 2;
}
.fw-testimonials.fw-testimonials-2 .fw-testimonials-pagination a.selected,
.fw-testimonials.fw-testimonials-2 .fw-testimonials-pagination a:hover {
  opacity: 0.5;
}
.fw-testimonials.fw-testimonials-2 .prev,
.fw-testimonials.fw-testimonials-2 .next{
  opacity: 0.5;
}

/*----> Responsive <---- */
/* Screen 568px */
@media(max-width:767px){
  .fw-col-no-padding .fw-testimonials-1 .prev {
    left: 10px;
  }
  .fw-col-no-padding .fw-testimonials-1 .prev i {
    left: 0;
  }
  .fw-col-no-padding .fw-testimonials-1 .next {
    right: 10px;
  }
  .fw-col-no-padding .fw-testimonials-1 .next i {
    right: 0;
  }
}
/* Screen 380px */
@media(max-width:479px){
  .fw-testimonials-2 .fw-testimonials-pagination {
    bottom: -5px;
    right: 15px;
  }
  .fw-testimonials-2 .fw-testimonials-arrows {
    display: none;
  }
  .fw-col-no-padding .fw-testimonials-2 .fw-testimonials-pagination {
    right: 0;
  }
  .fw-testimonials-1 .prev {
    left: 10px;
  }
  .fw-testimonials-1 .next {
    right: 10px;
  }
  .fw-col-no-padding .fw-testimonials-1,
  .fw-col-no-padding .fw-testimonials-2 {
    left: auto;
  }
  .fw-testimonials-2 .fw-testimonials-item {
    padding: 0 15px;
  }
  .fw-col-no-padding .fw-testimonials-2 .fw-testimonials-item {
    padding: 0;
  }
}
/* Screen 320px */
@media(max-width:320px){
  .fw-testimonials-1,
  .fw-testimonials-2 {
    left: -15px;
  }
}