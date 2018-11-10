/* bbPress Style */
/* -------------------------------------------------- */
.bbpress .post-details{
  margin-bottom: 0;
}
.bbpress .post-details .entry-content {
  border-bottom: none;
  padding-bottom: 0;
}
.bbpress .post-details .entry-content #bbpress-forums {
  overflow: visible;
}
#bbpress-forums {
  font-size: <?php echo esc_js($the_core_less_variables['font-size-base']); ?>;
}
#bbpress-forums .bbp-forums-list li {
  font-size: 14px;
  display: block;
}
#bbpress-forums .bbp-body .bbp-topic-freshness,
#bbpress-forums .bbp-body .bbp-forum-freshness {
  font-size: 14px;
}
#bbpress-forums ul p.bbp-topic-meta {
  font-size: 14px;
}
#bbpress-forums p.bbp-topic-meta img.avatar,
#bbpress-forums ul.bbp-reply-revision-log img.avatar,
#bbpress-forums ul.bbp-topic-revision-log img.avatar,
#bbpress-forums div.bbp-template-notice img.avatar {
  margin-bottom: auto;
  border: none;
}
#bbpress-forums p.bbp-topic-meta .bbp-author-name {
  vertical-align: middle;
}
#bbpress-forums:last-child,
#bbpress-forums .bbp-forums:last-child {
  margin-bottom: 0;
}
#bbpress-forums li.bbp-body ul.forum,
#bbpress-forums li.bbp-body ul.topic {
  padding: 15px;
  border-color: #dee0e1;
}
#bbpress-forums .bbp-forums-list {
  border-left-color: #dee0e1;
}
div.bbp-forum-header,
div.bbp-topic-header,
div.bbp-reply-header {
  border-color: #dee0e1;
}
#bbpress-forums ul li.bbp-header .bbp-reply-content #subscription-toggle {
  color: #dee0e1;
}
#bbpress-forums ul li.bbp-body > div:last-child {
  border-bottom: 1px solid #dee0e1;
}
#bbpress-forums li.bbp-header,
#bbpress-forums li.bbp-footer {
  background: none;
}
#bbpress-forums li.bbp-header,
#bbpress-forums li.bbp-footer {
  padding: 8px 15px;
  border-top: none;
}
#bbpress-forums ul.bbp-lead-topic,
#bbpress-forums ul.bbp-topics,
#bbpress-forums ul.bbp-forums,
#bbpress-forums ul.bbp-replies,
#bbpress-forums ul.bbp-search-results {
  font-size: <?php echo esc_js($the_core_less_variables['font-size-base']); ?>;
  border: none;
}
#bbpress-forums div.odd,
#bbpress-forums ul.odd,
#bbpress-forums div.even,
#bbpress-forums ul.even {
  background-color: transparent;
}
#bbpress-forums ul .bbp-forum-info .bbp-forum-title,
#bbpress-forums ul .bbp-topic-title .bbp-topic-permalink {
  font-weight: bold;
}
div.bbp-template-notice,
div.indicator-hint {
  border: none !important;
  background-color: transparent !important;
  padding-left: 0;
}
div.bbp-template-notice p {
  padding-left: 0;
  font-size: 13px;
}
#bbpress-forums li.bbp-footer .bbp-reply-author,
#bbpress-forums li.bbp-footer .bbp-reply-content {
  display: none;
}
#bbpress-forums span.bbp-admin-links a {
  font-size: 11px;
}
#bbpress-forums .bbp-meta .bbp-reply-post-date {
  font-size: 15px;
}
#bbpress-forums .bbp-body div.bbp-reply-header {
  padding-left: 15px;
  padding-right: 15px;
}
#bbpress-forums .forums.bbp-replies .bbp-header {
  padding-left: 5px;
}
#bbpress-forums ul .bbp-forum-info .bbp-forum-content {
  font-size: <?php echo esc_js($the_core_less_variables['font-size-base']); ?>;
}
#bbpress-forums ul .bbp-forum-info .bbp-forum-title {
  font-size: <?php echo esc_js($the_core_less_variables['fw-h5-font-size']); ?>;
}
#bbpress-forums ul .bbp-topic-title .bbp-topic-permalink {
  font-size: <?php echo esc_js($the_core_less_variables['fw-h5-font-size']); ?>;
}
#bbpress-forums ul .bbp-header .forum-titles {
  color: <?php echo esc_js($the_core_less_variables['fw-h4-color']); ?>;
}
#bbpress-forums ul li.bbp-header .bbp-reply-author,
#bbpress-forums ul li.bbp-header .bbp-reply-content {
  color: <?php echo esc_js($the_core_less_variables['fw-h4-color']); ?>;
}

/* bbPress Breadcrumbs Style */
div.bbp-breadcrumb,
div.bbp-topic-tags {
  font-size: 14px;
}
div.bbp-breadcrumb .bbp-breadcrumb-sep {
  font-size: 18px;
  line-height: normal;
}

/* bbPress Widget Layout */
/* -------------------------------------------------- */
