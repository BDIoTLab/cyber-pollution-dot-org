/* Tabs RTL */
/* -------------------------------------------------- */
.rtl .fw-tabs .nav-tabs {
  padding-right: 0;
}
.rtl .fw-tabs .nav-tabs li i {
  margin-left: 5px;
}
.rtl .fw-tabs-framed.fw-tabs-top .nav-tabs > li {
  float: right;
}
.rtl .fw-tabs-framed.fw-tabs-top .nav-tabs > li > a {
  margin-right: 0;
  margin-left: 2px;
}
.rtl .fw-tabs-framed.fw-tabs-top .nav-tabs.nav-justified > li {
  float: none;
  padding: 0;
}
.rtl .fw-tabs-framed.fw-tabs-top .nav-tabs.nav-justified > li:last-child > a {
  margin-left: 0;
}
.rtl .fw-tabs-framed .nav-tabs {
  border-bottom: 2px solid #ddd;
}
.rtl .fw-tabs-framed .nav-tabs > li > a:before {
  right: -2px;
  left: -2px;
}
.rtl .fw-tabs-framed .nav-tabs > li.active a:before {
  border-left: 2px solid #ddd;
  border-right: 2px solid #ddd;
}
.rtl .fw-tabs-framed .nav-justified > li {
  padding-left: 2px;
}
.rtl .fw-tabs-framed .nav-justified > li:first-child {
  border-right: none;
}
.rtl .fw-tabs-framed .nav-justified > li:last-child {
  padding-left: 0;
}

/*----> Responsive <---- */
@media (min-width: 768px) {
  .rtl .fw-tabs-left .nav-tabs {
    float: right;
    border-left: 2px solid #ddd;
  }
  .rtl .fw-tabs-left .nav-tabs > li > a {
    border-left-color: transparent;
    margin-left: 0;
    border-left: none;
    border-radius: 0 4px 4px 0;
    border-right: 2px solid #ddd;
  }
  .rtl .fw-tabs-left .nav-tabs > li.active a,
  .rtl .fw-tabs-left .nav-tabs > li.active a:hover,
  .rtl .fw-tabs-left .nav-tabs > li.active a:focus {
    margin-left: -2px;
    margin-right: auto;
    border-left: transparent;
    border-right: 2px solid #ddd;
  }
  .rtl .fw-tabs-left .tab-content {
    margin-right: 150px;
    margin-left: 0;
  }

  .rtl .fw-tabs-framed.fw-tabs-left .nav-tabs {
    border-bottom: none;
    border-right: none
  }
  .rtl .fw-tabs-left.fw-tabs-minimal .nav-tabs > li.active > a,
  .rtl .fw-tabs-left.fw-tabs-minimal .nav-tabs > li.active > a:hover,
  .rtl .fw-tabs-left.fw-tabs-minimal .nav-tabs > li.active > a:focus {
    margin-left: -6px;
    border-left: 6px solid <?php echo esc_js($the_core_less_variables['theme-color-1']); ?>;
  }
  .rtl .fw-tabs-left.fw-tabs-minimal .tab-content {
    padding: 0 20px 0 0;
    border-right: 6px solid #dddddd;
  }
  .rtl .nav-tabs > li {
    float: right;
  }
  .rtl .fw-tabs-minimal.fw-tabs-left .nav-tabs > li,
  .rtl .fw-tabs-framed.fw-tabs-left .nav-tabs > li {
    float: none;
  }
  .rtl .fw-tabs-minimal.fw-tabs-left .nav-tabs > li a {
    border-radius: 0;
    border-right: none;
  }
  .rtl .nav-tabs.nav-justified > li {
    float: none;
  }
}
