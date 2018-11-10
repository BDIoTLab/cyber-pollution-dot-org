/* Posts Comments List Layout */
/* -------------------------------------------------- */
.comments-area {
  position: relative;
}
.comments-area.user-is-logged .comment-respond .right-side-comment {
  width: 100%;
  float: none;
}
.comments-area.user-is-logged .comment-respond .form-submit,
.comments-area.user-is-logged .comment-respond .right-side-comment {
  padding: 0;
}
.comments-title,
.comment-reply-title,
.fw-title-related {
  display: block;
  position: relative;
  margin-bottom: 20px;
}
.link-add-comment {
  color: <?php echo esc_js($the_core_less_variables['theme-color-2']); ?>;
}
.comment-list {
  padding: 0;
  border-bottom: 1px solid #dee0e1;
  list-style: none;
  margin: 0 0 <?php echo esc_js($the_core_less_variables['fw-space-between-elements-sm']); ?> 0;
}
.comment-list .comment,
.comment-list .pingback {
  list-style: none;
  border-top: 1px solid #dee0e1;
}
.comment-list > .comment:first-child {
  border-top: none;
}
.comment-body {
  position: relative;
  padding: <?php echo floatval($the_core_less_variables['fw-content-density'])*4.5; ?>px 0;
}
.comment-body .wrap-rating {
  margin-left: 10px;
}
.pingback .comment-body {
  padding-top: 0;
}
.comment-body:before,
.comment-body:after {
  content: " ";
  display: table;
}
.comment-body:after {
  clear: both;
}
.comment-aside {
  padding-left: 90px;
}
.comment-avatar {
  float: left;
  width: 60px;
  height: 60px;
}
.comment-avatar img {
  border-radius: 50%;
}
.children {
  padding-left: 0;
}
.children .depth-2 {
  margin-left: 90px;
}
.children .depth-3 {
  margin-left: 90px;
}
.children .comment-avatar:before {
  font-family: 'FontAwesome';
  content: '\f148';
  font-size: 20px;
  line-height: 1em;
  color: #dee0e1;
  position: absolute;
  top: 60px;
  left: -60px;
}
.children .comment-avatar:before {
  filter: progid:DXImageTransform.Microsoft.gradient.BasicImage(rotation=0, mirror=1);
  -webkit-transform: scale(-1, 1);
  -moz-transform: scale(-1, 1);
  -ms-transform: scale(-1, 1);
  -o-transform: scale(-1, 1);
  transform: scale(-1, 1);
}
.comment-meta {
  margin-bottom: 10px;
  line-height: 1em;
  font-size: 15px;
  text-align: right;
  font-family: <?php echo ($the_core_less_variables['fw-buttons-font-family']); ?>;
  font-weight: <?php echo esc_js($the_core_less_variables['fw-buttons-font-weight']); ?>;
  font-style: <?php echo esc_js($the_core_less_variables['fw-buttons-font-style']); ?>;
  color: <?php echo esc_js($the_core_less_variables['theme-color-3']); ?>;
}
.comment-content p:last-child {
  margin-bottom: 0;
}
.comment-reply-link {
  margin-left: 5px;
  text-transform: capitalize;
}
.comment-author {
  display: inline-block;
  float: left;
  margin-bottom: 5px;
  font-size: 17px;
}
.comment-author a {
  color: <?php echo esc_js($the_core_less_variables['theme-color-2']); ?>;
}
.comment-author a:hover {
  color: <?php echo esc_js($the_core_less_variables['theme-color-1']); ?>;
}
.bypostauthor > article .comment-author a{
  color: <?php echo esc_js($the_core_less_variables['theme-color-1']); ?>;
}

/* Comment Respond Form */
/* -------------------------------------------------- */
.comment-respond {
  margin: <?php echo esc_js($the_core_less_variables['fw-space-between-elements-md']); ?> 0 0;
}
.comment-respond textarea {
  min-height: 234px;
  max-height: 320px;
}
.comment-respond .left-side-comment,
.comment-respond .right-side-comment {
  width: 50%;
  display: inline-block;
}
.comment-respond .left-side-comment p,
.comment-respond .right-side-comment p {
  position: relative;
}
.comment-respond .left-side-comment p .optional,
.comment-respond .right-side-comment p .optional {
  position: absolute;
  font-size: 15px;
  font-style: italic;
  bottom: -25px;
  left: 0;
}
.comment-respond .left-side-comment {
  float: left;
  padding-right: 2.6%;
}
.comment-respond .right-side-comment {
  float: right;
  padding-left: 2.6%;
}
.comment-respond .comment-reply-title {
  margin-top: 0;
}
#cancel-comment-reply-link {
  float: right;
  position: relative;
  top: 14px;
  font-size: 13px;
  letter-spacing: 1px;
  border-bottom: 1px dashed <?php echo esc_js($the_core_less_variables['theme-color-1']); ?>;
  font-family: <?php echo ($the_core_less_variables['fw-buttons-font-family']); ?>;
  font-weight: <?php echo esc_js($the_core_less_variables['fw-buttons-font-weight']); ?>;
  font-style: <?php echo esc_js($the_core_less_variables['fw-buttons-font-style']); ?>;
}
.comment-form:before,
.comment-form:after {
  content: " ";
  display: table;
}
.comment-form:after {
  clear: both;
}
.comment-form {
  padding: 30px;
  position: relative;
  background-color: <?php echo the_core_hex2rgba($the_core_less_variables['text-color'], 0.1); ?>;
}
.comment-form input:focus,
.comment-form textarea:focus {
  border-color: <?php echo the_core_adjustColorLightenDarken($the_core_less_variables['input-border'], 10); ?>;
}
/* Rating */
.comment-form .wrap-rating.in-post .rating-title {
  font-family: <?php echo ($the_core_less_variables['form-label-font-family']); ?>;
  font-size: <?php echo esc_js($the_core_less_variables['form-label-font-size']); ?>;
  font-style: <?php echo esc_js($the_core_less_variables['form-label-font-style']); ?>;
  font-weight: <?php echo esc_js($the_core_less_variables['form-label-font-weight']); ?>;
  line-height: <?php echo esc_js($the_core_less_variables['form-label-line-height']); ?>;
  letter-spacing: <?php echo esc_js($the_core_less_variables['form-label-letter-spacing']); ?>;
  color: <?php echo esc_js($the_core_less_variables['form-label-color']); ?>;
}
.comment-form .wrap-rating.in-post .rating span {
  color: <?php echo the_core_adjustColorLightenDarken($the_core_less_variables['theme-color-5'], -20); ?>;
}
.comment-form .wrap-rating.in-post .rating .fa.fa-star.voted {
  color: <?php echo esc_js($the_core_less_variables['theme-color-5']); ?>;
}
.comment-form .wrap-rating.in-post .rating:hover .fa.fa-star {
  color: <?php echo the_core_adjustColorLightenDarken($the_core_less_variables['theme-color-5'], -20); ?> !important;
}
.comment-form .wrap-rating.in-post .rating:hover .fa.fa-star.over,
.comment-form .wrap-rating.in-post .rating:hover .fa.fa-star.voted {
  color: <?php echo esc_js($the_core_less_variables['theme-color-5']); ?> !important;
}
.comment-notes {
  font-style: italic;
}
.required-label {
  color: #e14d47;
}
.form-submit {
  padding-top: 2.3em;
  display: block;
  width: 50%;
  padding-right: 2.6%;
  margin-bottom: 0;
  overflow: hidden;
}
.form-submit .submit,
.form-submit #submit {
  border: none;
  width: 100%;
  color: #fff !important;
  margin-top: 10px;
}
.form-submit .submit:hover,
.form-submit #submit:hover {
  color: #fff !important;
}

/* Responsive */
/* Screen 768px */
@media (max-width: 991px) {
  .comments-area {
    padding: 0 15px;
  }
}
/* Screen 568px */
@media (max-width:767px) {
  .comment-author {
    display: inline-block;
    float: left;
  }
  .comment-meta {
    text-align: right;
  }
  .children .depth-3 {
    margin-left: 0;
  }
  .comment-respond textarea {
    min-height: 150px;
    max-height: 200px;
  }
  .comment-respond{
    margin-top: <?php echo ceil( floatval($the_core_less_variables['fw-space-between-elements-lg'])*0.53 ); ?>px;
  }
}
/* Screen 320px */
@media(max-width:479px){
  .comment-respond .left-side-comment,
  .comment-respond .right-side-comment{
    float: none;
    padding: 0;
    width: 100%;
  }
  .comment-respond .right-side-comment{
    margin-top: 1.5em;
  }
  .comment-avatar {
    float: none;
    margin-bottom: 20px;
  }
  .comment-aside {
    padding-left: 0;
  }
  .comments-title {
    margin-bottom: 0;
  }
  .comment-meta {
    text-align: left;
  }
  .comment-author {
    float: none;
    display: block;
  }
  .children .depth-2,
  .children .depth-3 {
    margin-left: 0;
  }
  .children .comment-avatar:before {
    left: auto;
    right: 15px;
  }
  .form-submit {
    width: 100%;
    padding-top: 1em;
  }
  .comment-form {
    padding: 20px;
  }
  .comment-respond .left-side-comment p .optional,
  .comment-respond .right-side-comment p .optional {
    font-size: 10px;
  }
  .children .comment-avatar:before {
    filter: progid:DXImageTransform.Microsoft.gradient.BasicImage(rotation=0, mirror=1);
    -webkit-transform: scale(1,1);
    -moz-transform: scale(1,1);
    -ms-transform: scale(1,1);
    -o-transform: scale(1,1);
    transform: scale(1,1);
  }
}

.fw-comments-checkbox label {
	width: 100%;
}
.fw-comments-checkbox input[type="checkbox"] {
	float: left;
	display: block;
	margin-top: 8px;
	margin-right: 8px;
}
