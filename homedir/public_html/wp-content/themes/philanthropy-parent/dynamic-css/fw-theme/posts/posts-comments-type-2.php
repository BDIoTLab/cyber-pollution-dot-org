/* Posts Comments Type 2 List Layout */
/* -------------------------------------------------- */
.comments-template-2 .comments-title {
  font-style: normal;
  color: #bababa;
}
.comments-template-2 .comments-title strong {
  color: <?php echo esc_js($the_core_less_variables['fw-h3-color']); ?>;
}
.comments-template-2 .comment-list {
  border-bottom: 1px solid #dfdfdf;
}
.comments-template-2 .comment-aside {
  padding-top: 10px;
  padding-left: 75px;
}
.comments-template-2 .comment-aside:before,
.comments-template-2 .comment-aside:after {
  content: " ";
  display: table;
}
.comments-template-2 .comment-aside:after {
  clear: both;
}
.comments-template-2 .comment-avatar {
  width: 55px;
  height: 55px;
}
.comments-template-2 .comment-reply-link {
  font-family: <?php echo ($the_core_less_variables['fw-buttons-font-family']); ?>;
  font-weight: <?php echo esc_js($the_core_less_variables['fw-buttons-font-weight']); ?>;
  font-style: <?php echo esc_js($the_core_less_variables['fw-buttons-font-style']); ?>;
  color: <?php echo esc_js($the_core_less_variables['text-color']); ?>;
}
.comments-template-2 .comment-reply-link:hover {
  color: <?php echo esc_js($the_core_less_variables['theme-color-2']); ?>;
}
.comments-template-2 .comment-author a,
.comments-template-2 .bypostauthor > article .comment-author a {
  color: <?php echo esc_js($the_core_less_variables['theme-color-3']); ?>;
}
.comments-template-2 .comment-author a:hover,
.comments-template-2 .bypostauthor > article .comment-author a:hover {
  color: <?php echo esc_js($the_core_less_variables['theme-color-2']); ?>;
}
.comments-template-2 .comment-date {
  color: <?php echo esc_js($the_core_less_variables['theme-color-1']); ?>;
}
.comments-template-2 .comment-content {
  padding-right: 130px;
  padding-left: 200px;
}
.sidebar-right .comments-template-2 .comment-content,
.sidebar-left .comments-template-2 .comment-content {
  padding-right: 70px;
  padding-left: 170px;
}
.comments-template-2 .comment-meta {
  text-align: left;
  float: left;
  margin-right: 70px;
}
.sidebar-right .comments-template-2 .comment-meta,
.sidebar-left .comments-template-2 .comment-meta {
  margin-right: 40px;
}
.comments-template-2 .comment-author {
  display: block;
  float: none;
}
.comments-template-2 .comment-reply-link {
  float: right;
}
.comments-template-2 .comment-reply-link .reply-icon {
  display: block;
  text-align: right;
  margin-right: 5px;
  font-size: 20px;
  line-height: 12px;
  font-style: normal;
  position: relative;
  top: -2px;
}
.comments-template-2 .comment-list .comment-date {
  text-transform: none;
}
.comments-template-2 .children .comment-avatar:before {
  display: none;
}
.comments-template-2 .comment-date {
  font-style: italic;
}
.comments-template-2 .children .depth-2,
.comments-template-2 .children .depth-3 {
  margin-left: 124px;
}

.comments-template-2 .comment-list .comment,
.comments-template-2 .comment-list .pingback {
  border: none;
}
.comments-template-2 .comment.depth-1 > article.comment-body {
  border-top: 1px solid #dfdfdf;
}
.comments-template-2 .comment.depth-1 > ul.children {
  border-top: 1px solid #dfdfdf;
}
.comments-template-2 .comment.odd > article.comment-body {
  background-color: #f2f2f2;
}
.comments-template-2 .comment-body {
  padding-left: 25px;
  padding-right: 25px;
}
/* Comments Form */
.comments-template-2 .comment-form {
  background-color: transparent;
  padding: 24px;
}
.comments-template-2 .comment-form .form-submit .submit,
.comments-template-2 .comment-form .form-submit #submit {
  width: auto;
}
.comments-template-2 .comment-form input[type="text"],
.comments-template-2 .comment-form input[type="url"],
.comments-template-2 .comment-form input[type="email"],
.comments-template-2 .comment-form textarea {
  border-width: 2px;
}


/*----> Responsive <---- */
/* Screen 1024px */
@media(max-width:1199px){
  .sidebar-right .comments-template-2 .children .depth-2,
  .sidebar-left .comments-template-2 .children .depth-2,
  .sidebar-right .comments-template-2 .children .depth-3,
  .sidebar-left .comments-template-2 .children .depth-3 {
    margin-left: 80px;
  }
}
/* Screen 768px */
@media(max-width:991px){
  .comments-template-2 .children .depth-2,
  .comments-template-2 .children .depth-3,
  .sidebar-right .comments-template-2 .children .depth-2,
  .sidebar-left .comments-template-2 .children .depth-2,
  .sidebar-right .comments-template-2 .children .depth-3,
  .sidebar-left .comments-template-2 .children .depth-3 {
    margin-left: 65px;
  }
  .sidebar-right .comments-template-2 .comment-content,
  .sidebar-left .comments-template-2 .comment-content,
  .comments-template-2 .comment-content {
    padding-right: 65px;
    padding-left: 165px;
  }
  .comments-template-2 .comment-meta {
    margin-right: 34px;
  }
}
/* Screen 568px */
@media(max-width:767px){
  .comments-template-2 .children .depth-2,
  .comments-template-2 .children .depth-3,
  .sidebar-right .comments-template-2 .children .depth-2,
  .sidebar-left .comments-template-2 .children .depth-2,
  .sidebar-right .comments-template-2 .children .depth-3,
  .sidebar-left .comments-template-2 .children .depth-3 {
    margin-left: 30px;
  }
}
/* Screen 320px */
@media(max-width:479px){
  .comments-template-2 .children .depth-2,
  .comments-template-2 .children .depth-3,
  .sidebar-right .comments-template-2 .children .depth-2,
  .sidebar-left .comments-template-2 .children .depth-2,
  .sidebar-right .comments-template-2 .children .depth-3,
  .sidebar-left .comments-template-2 .children .depth-3 {
    margin-left: 0;
  }
  .comments-template-2 .comment-avatar {
    margin-bottom: 10px;
  }
  .comments-template-2 .comment-meta {
    margin-right: 0;
    float: none;
  }
  .comments-template-2 .comment-aside {
    padding-left: 0;
  }
  .comments-template-2 .comment-reply-link {
    position: absolute;
    right: 25px;
    top: 55px;
  }
  .sidebar-right .comments-template-2 .comment-content,
  .sidebar-left .comments-template-2 .comment-content,
  .comments-template-2 .comment-content {
    padding: 0;
  }
  .comments-template-2 .children .comment-avatar:before {
    display: block;
    top: 56px;
    right: auto;
    left: 6px;
    filter: progid:DXImageTransform.Microsoft.gradient.BasicImage(rotation=0, mirror=1);
    -webkit-transform: scale(-1,1);
    -moz-transform: scale(-1,1);
    -ms-transform: scale(-1,1);
    -o-transform: scale(-1,1);
    transform: scale(-1,1);
  }
}