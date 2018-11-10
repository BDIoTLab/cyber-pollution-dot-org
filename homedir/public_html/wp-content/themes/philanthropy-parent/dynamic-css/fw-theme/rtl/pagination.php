/* RTL Pagination */
/* -------------------------------------------------- */
.rtl .paging-navigation .page-numbers.prev {
  float: right;
  margin-right: 0;
}
.rtl .paging-navigation .page-numbers.prev i {
  margin-left: 10px;
  margin-right: 0;
}
.rtl .paging-navigation .page-numbers.prev i.fa-angle-left:before {
  content: "\f105";
}
.rtl .paging-navigation .page-numbers.next {
  float: left;
  margin-right: 0;
}
.rtl .paging-navigation.paging-navigation-type-1 .page-numbers.next {
  margin-left: 0;
}
.rtl .paging-navigation .page-numbers.next i {
  margin-right: 10px;
  margin-left: 0;
}
.rtl .paging-navigation .page-numbers.next i.fa-angle-right:before {
  content: "\f104";
}

/* RTL Pagination Type 2 */
.rtl .paging-navigation.paging-navigation-type-2 .prev.page-numbers,
.rtl nav.woocommerce-pagination.paging-navigation-type-2 .prev.page-numbers {
  padding: 0 0 0 17px;
}
.rtl .paging-navigation.paging-navigation-type-2 .next.page-numbers,
.rtl nav.woocommerce-pagination.paging-navigation-type-2 .next.page-numbers {
  padding: 0 17px 0 0;
}
.rtl .paging-navigation.paging-navigation-type-2 .page-numbers.prev i,
.rtl .paging-navigation.paging-navigation-type-2 .page-numbers.next i {
  display: inline-block;
  -moz-transform: scaleX(-1);
  -o-transform: scaleX(-1);
  -webkit-transform: scaleX(-1);
  transform: scaleX(-1);
  filter: FlipH;
  -ms-filter: "FlipH";
}