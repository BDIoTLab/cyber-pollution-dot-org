/* buddyPress Members */
#buddypress ul.item-list li div.item-title span {
  display: none;
}
#buddypress span.activity {
  font-size: inherit;
}
#buddypress ul.item-list li div.action {
  position: relative;
  top: auto;
  text-align: left;
  margin-top: 5px;
  margin-left: 0 !important;
}
#buddypress .dir-form .dir-list .item-list li {
  width: 33.33%;
  display: block;
  float: left;
  box-sizing: border-box;
}
#buddypress ul.item-list li div.item-title,
#buddypress ul.item-list li h4 {
  font-size: <?php echo esc_js($the_core_less_variables['fw-h5-font-size']); ?>;
}
#buddypress .dir-form .dir-list #members-list.item-list li.is-current-user {
  height: 130px;
}

/*----> Responsive <---- */
/* Screen 768px */
@media(max-width:991px){
  #buddypress .dir-form .dir-list .item-list li {
    width: 50%;
  }
}
/* Screen 568px */
@media(max-width:767px){
  #buddypress .dir-form .dir-list .item-list li {
    width: 100%;
  }
  #buddypress .dir-form .dir-list #members-list.item-list li.is-current-user {
    height: auto;
  }
}
