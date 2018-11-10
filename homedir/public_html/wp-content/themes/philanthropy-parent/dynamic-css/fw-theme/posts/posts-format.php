/* Posts Format */
/* -------------------------------------------------- */
.wp-caption-text,
.sticky,
.gallery-caption,
.bypostauthor {
  text-transform: none;
}
.post .entry-format:before {
  font-family: "FontAwesome";
  font-style: normal;
  margin-right: 5px;
}
.post.format-gallery .entry-format:before {
  content: "\f083";
}
.post.format-image .entry-format:before {
  content: "\f03e";
}
.post.format-audio .entry-format:before {
  content: "\f028";
}
.post.format-video .entry-format:before {
  content: "\f03d";
}
.post.format-aside .entry-format:before {
  content: "\f06a";
}
.post.format-status .entry-format:before {
  content: "\f0a1";
}
.post.format-link .entry-format:before {
  content: "\f0c1";
}
.post.format-quote .entry-format:before {
  content: "\f10d";
}
.post .aligncenter,
.post div.aligncenter {
  display: block;
  margin-left: auto;
  margin-right: auto;
}
.post .alignleft {
  float: left;
}
.post .alignright {
  float: right;
}
.post img.aligncenter,
.post .wp-caption {
  margin-bottom: 0;
}
.post img.alignleft,
.post .wp-caption.alignleft {
  margin: 0 5% 5px 0;
}
.post img.alignright,
.post .wp-caption.alignright {
  margin: 0 0 5px 5%;
}
.post img.alignnone,
.post .wp-caption.alignnone {
  margin: 0 0 5px;
}
.post .wp-caption img[class*="wp-image-"] {
  display: block;
  margin: 0;
}
.post figure.wp-caption {
  max-width: 100%;
  color: #767676;
}
.post .alignnone img,
.post img.alignnone,
.post .alignleft img,
.post img.alignleft,
.post .alignright img,
.post img.alignright,
.post .aligncenter img,
.post img.aligncenter {
  height: auto;
}
.post .wp-caption-text {
  font-size: <?php echo floor(floatval($the_core_less_variables['font-size-base'])*0.8); ?>px;
  line-height: <?php echo esc_js($the_core_less_variables['line-height-base']); ?>;
  color: #b6b8b9;
  position: relative;
  margin: 9px 0 0 0;
  padding: 0 5px 0 10px;
}
/* Post Format Gallery */
.gallery:before,
.gallery:after {
  content: " ";
  display: table;
}
.gallery:after {
  clear: both;
}
.gallery {
  margin: 0 -1.79104477% 20px;
  clear: both;
}
.gallery-item {
  display: inline-block;
  padding-right: 1.79104477%;
  padding-left: 1.79104477%;
  text-align: center;
  vertical-align: top;
  width: 100%;
  margin: 0 0 3.58%;
  box-sizing: border-box;
}
.gallery .gallery-item .gallery-icon {
  margin: 0;
  padding: 0;
  border: none;
}
.gallery-item .gallery-caption {
  display: block;
  padding: 0.5em 0;
}
.gallery-item img {
  display: block;
  margin: 0 auto;
  height: auto;
}
.gallery-columns-2 .gallery-item {
  max-width: 50%;
}
.gallery-columns-3 .gallery-item {
  max-width: 33.33%;
}
.gallery-columns-4 .gallery-item {
  max-width: 25%;
}
.gallery-columns-5 .gallery-item {
  max-width: 20%;
}
.gallery-columns-6 .gallery-item {
  max-width: 16.66%;
}
.gallery-columns-7 .gallery-item {
  max-width: 14.28%;
}
.gallery-columns-8 .gallery-item {
  max-width: 12.5%;
}
.gallery-columns-9 .gallery-item {
  max-width: 11.11%;
}
.gallery-columns-6 .gallery-caption,
.gallery-columns-7 .gallery-caption,
.gallery-columns-8 .gallery-caption,
.gallery-columns-9 .gallery-caption {
  display: none;
}
.gallery-item:hover .gallery-caption {
  opacity: 1;
}
.gallery-columns-7 .gallery-caption,
.gallery-columns-8 .gallery-caption,
.gallery-columns-9 .gallery-caption {
  display: none;
}

/* Post Format Audio & Video */
.archive .post .fw-wp-audio-shortcode,
.archive .post .fw-wp-video-shortcode {
  margin-bottom: 1em;
}

