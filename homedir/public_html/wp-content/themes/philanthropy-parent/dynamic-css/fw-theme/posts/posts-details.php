/* Post Details */
.single .post.post-details {
  margin-top: 8px;
  margin-bottom: <?php echo ceil(floatval($the_core_less_variables['fw-space-between-elements-md'])*0.5); ?>px;
}
/*Image Align */
.post-details img.aligncenter,
.post-details .wp-caption {
  margin-bottom: 20px;
}
.single .post.post-details .fw-post-image {
  margin-bottom: <?php echo esc_js($the_core_less_variables['fw-space-between-elements-sm']); ?>;
}
.single .post.post-details .entry-header .wrap-entry-meta {
  margin: 0 0 <?php echo esc_js($the_core_less_variables['fw-space-between-elements-sm']); ?> 0;
}
.single .post.post-details .entry-header .entry-title {
  display: block;
  margin: 0 0 <?php echo esc_js($the_core_less_variables['fw-space-between-elements-sm']); ?> 0;
}
.single .post.post-details .entry-header,
.single .post.post-details .entry-content {
  padding-left: <?php echo esc_js($the_core_less_variables['fw-space-between-elements-sm']); ?>;
  padding-right: <?php echo esc_js($the_core_less_variables['fw-space-between-elements-sm']); ?>;
}
.single .post.post-details .entry-content {
  border-bottom: 1px solid #dee0e1;
  padding-bottom: <?php echo esc_js($the_core_less_variables['fw-space-between-elements-md']); ?>;
}
.post-details .entry-content p:last-child {
  margin-bottom: 0;
}
.single .post.post-details footer.entry-meta {
  margin-bottom: <?php echo ceil(floatval($the_core_less_variables['fw-space-between-elements-md'])*0.5); ?>px;
}
.post-details footer.entry-meta .fw-tag-links {
  padding: 1em 2%;
  border-bottom: 1px solid #dee0e1;
}
.post-details footer.entry-meta .fw-tag-links a {
  letter-spacing: normal;
  text-transform: initial;
}
.post-details .entry-header .wrap-entry-meta .entry-date {
  white-space: nowrap;
}
.post-details .entry-header .wrap-entry-meta .cat-links {
  float: right;
}

/* Author Description */
/*-----------------------------------*/
.author-description {
  border-bottom: 1px solid #dee0e1;
  padding: 0 0 <?php echo ceil(floatval($the_core_less_variables['fw-space-between-elements-md'])*0.5); ?>px;
  margin-bottom: <?php echo esc_js($the_core_less_variables['fw-space-between-elements-md']); ?>;
}
.author-description:after {
  content: '';
  display: block;
  clear: both;
}
.author-description .author-text {
  font-size: <?php echo floatval($the_core_less_variables['font-size-base'])-1; ?>px;
  margin-left: 130px;
}
.author-description .author-name {
  font-size: <?php echo esc_js($the_core_less_variables['fw-h5-font-size']); ?>;
  color: <?php echo esc_js($the_core_less_variables['fw-h3-color']); ?>;
  margin-bottom: 5px;
  margin-top: 14px;
  font-weight: bold;
}
.author-description .author-name span {
  color: <?php echo esc_js($the_core_less_variables['theme-color-1']); ?>;
  font-style: italic;
  font-weight: normal;
}
.author-description .author-image {
  float: left;
  border-radius: 50%;
  overflow: hidden;
}
.author-description .author-image,
.author-description .author-image img {
  width: 100px;
  height: 100px;
}

/* Responsive */
/* Screen 568px */
@media(max-width:767px){
  .post-details .entry-header .wrap-entry-meta,
  .post-details .entry-header .entry-title {
    margin-bottom: <?php echo ceil(floatval($the_core_less_variables['fw-space-between-elements-sm'])*0.5); ?>px;
  }
  .author-description,
  .post-details footer.entry-meta,
  .post-details {
    margin-bottom: <?php echo ceil(floatval($the_core_less_variables['fw-space-between-elements-md'])*0.5); ?>px;
  }
  .author-description{
    padding-bottom: <?php echo ceil(floatval($the_core_less_variables['fw-space-between-elements-md'])*0.5); ?>px;
  }
  .post-details .entry-content{
    padding-bottom: <?php echo ceil(floatval($the_core_less_variables['fw-space-between-elements-md'])*0.5); ?>px;
    margin-bottom: 0;
  }
  .post-details footer.entry-meta {
    margin-bottom: 0;
  }
}
/* Screen 320px */
@media (max-width: 479px) {
  .post.post-details .entry-content,
  .post.post-details .entry-header {
    padding-left: 0;
    padding-right: 0;
  }
  .post-details .entry-header .wrap-entry-meta .cat-links {
    float: none;
    margin-left: 10px;
  }
  .post.post-details .wp-caption.alignleft,
  .post.post-details img.alignleft {
    margin-left: 0;
  }
  .author-description .author-image {
    float: none;
  }
  .author-description .author-text {
    margin-left: 0;
  }
}