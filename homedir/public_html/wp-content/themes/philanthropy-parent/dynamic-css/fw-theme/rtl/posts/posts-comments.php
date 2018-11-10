/* RTL Post Comment */
/* -------------------------------------------------- */
.children .comment-avatar:before {
  filter: progid:DXImageTransform.Microsoft.gradient.BasicImage(rotation=0, mirror=1);
  -webkit-transform: scale(1, -1);
  -moz-transform: scale(1, -1);
  -ms-transform: scale(1, -1);
  -o-transform: scale(1, -1);
  transform: scale(1, -1);
}
.rtl .comment-avatar {
  float: right;
}
.rtl .comment-aside {
  padding-left: 0;
  padding-right: 90px;
}
.rtl .comment-author {
  float: right;
}
.rtl .comment-meta {
  text-align: left;
}
.rtl .children .depth-2 {
  margin-right: 90px;
  margin-left: 0;
}
.rtl .children .depth-3 {
  margin-right: 90px;
  margin-left: 0;
}
.rtl .children .comment-avatar:before {
  right: -60px;
  left: initial;
  content: '\f149';
}
.rtl .wrap-rating.listing {
  float: left;
  margin-right: 10px;
}
.rtl .comment-form .wrap-rating {
  text-align: right;
}
.rtl .comment-form .wrap-rating .rating-title sup {
  left: initial;
  right: 4px;
}
.rtl .comment-form .wrap-rating .rating {
  display: inline-block;
}
