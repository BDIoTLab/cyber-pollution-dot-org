/* Tabs */
/* -------------------------------------------------- */
.fw-tabs .nav-tabs li i {
  font-size: 18px;
  position: relative;
  top: 1px;
  margin-right: 5px;
}
.fw-tabs .nav-tabs li img {
  max-width: 18px;
}
.fw-tabs .nav-tabs {
  font-family: <?php echo ($the_core_less_variables['subtitles-family']); ?>;
  font-weight: <?php echo esc_js($the_core_less_variables['subtitles-weight']); ?>;
  font-style: <?php echo esc_js($the_core_less_variables['subtitles-style']); ?>;
  font-size: <?php echo esc_js($the_core_less_variables['subtitles-size']); ?>;
  line-height: <?php echo esc_js($the_core_less_variables['subtitles-line-height']); ?>;
  letter-spacing: <?php echo esc_js($the_core_less_variables['subtitles-letter-spacing']); ?>;
}

/* Framed Tabs */
.fw-tabs-framed .nav-tabs {
  border-bottom: 2px solid #ddd;
}
.fw-tabs-framed .nav-tabs > li {
  padding-top: 0;
  margin-bottom: -2px;
}
.fw-tabs-framed .nav-tabs > li > a {
  border: 2px solid #ddd;
  background-color: #ededed;
  padding: 8px 20px;
  color: #666;
  border-radius: 4px 4px 0 0;
  -moz-border-radius: 4px 4px 0 0;
  -webkit-border-radius: 4px 4px 0 0;
  -webkit-transition: none;
  -o-transition: none;
  transition: none;
}
.fw-tabs-framed .nav-tabs > li > a:hover {
  color: <?php echo esc_js($the_core_less_variables['theme-color-1']); ?>;
}
.fw-tabs-framed .nav-tabs > li > a:before {
  content: '';
  height: 2px;
  background: #ddd;
  position: absolute;
  bottom: -2px;
  left: -2px;
  right: -2px;
}
.fw-tabs-framed .nav-tabs > li.active {
  padding-top: 0;
}
.fw-tabs-framed .nav-tabs > li.active a:before {
  background: #fff;
  border-right: 2px solid #ddd;
  border-left: 2px solid #ddd;
}
.fw-tabs-framed .nav-tabs > li.active > a,
.fw-tabs-framed .nav-tabs > li.active > a:hover,
.fw-tabs-framed .nav-tabs > li.active > a:focus {
  color: <?php echo esc_js($the_core_less_variables['theme-color-1']); ?>;
  background-color: #fff;
  padding: 8px 20px;
  border: 2px solid #ddd;
  border-bottom: none;
}
.fw-tabs-framed .tab-content {
  background-color: #fff;
  border: 2px solid #ddd;
  border-top: none;
  padding: 20px;
  border-radius: 0 0 4px 4px;
}
.fw-tabs-framed .tab-content p:last-child {
  margin-bottom: 0;
}
.fw-tabs-framed .nav-justified > li {
  padding-top: 0;
  bottom: -2px;
  margin-bottom: -2px;
  padding-right: 2px;
}
.fw-tabs-framed .nav-justified > li:first-child {
  border-left: none;
}
.fw-tabs-framed .nav-justified > li:last-child {
  padding-right: 0;
}
.fw-tabs-framed .nav-justified > li a {
  padding: 8px 20px;
  border-bottom: 2px solid #ddd;
  position: relative;
}


/* Minimalistic Tabs */
.fw-tabs-minimal .nav-tabs {
  border-bottom: 6px solid #ddd;
}
.fw-tabs-minimal .nav-tabs > li {
  margin-bottom: 0;
}
.fw-tabs-minimal .nav-tabs > li > a {
  background-color: transparent;
  border: none;
  padding: 8px 20px;
  color: #666;
  margin-bottom: -6px;
  -webkit-transition: none;
  -o-transition: none;
  transition: none;
}
.fw-tabs-minimal .nav-tabs > li > a:hover {
  color: <?php echo esc_js($the_core_less_variables['theme-color-1']); ?>;
}
.fw-tabs-minimal .nav-tabs > li.active > a,
.fw-tabs-minimal .nav-tabs > li.active > a:hover,
.fw-tabs-minimal .nav-tabs > li.active > a:focus {
  background-color: transparent;
  border: none;
  border-bottom: 6px solid <?php echo esc_js($the_core_less_variables['theme-color-1']); ?>;
  color: <?php echo esc_js($the_core_less_variables['theme-color-1']); ?>;
}
.fw-tabs-minimal .tab-content {
  padding: 20px 0;
}
.fw-tabs-minimal .tab-content .tab-content-title {
  display: block;
}
.fw-tabs-minimal .tab-content p:last-child {
  margin-bottom: 0;
}

/*----> Responsive <---- */
@media (min-width: 768px) {
  .fw-tabs-left .nav-tabs {
    border-bottom: 0;
    float: left;
    border-right: 2px solid #ddd;
  }
  .fw-tabs-left .nav-tabs > li {
    float: none;
    padding-top: 0;
    position: relative;
    width: 150px;
  }
  .fw-tabs-left .nav-tabs > li > a {
    margin-bottom: 3px;
    border-radius: 4px 0 0 4px;
    padding: 8px 10px;
    border-right-color: transparent;
    margin-right: 0;
    white-space: normal;
    border-right: none;
  }
  .fw-tabs-left .nav-tabs > li > a:before {
    display: none;
  }
  .fw-tabs-left .nav-tabs > li.active a,
  .fw-tabs-left .nav-tabs > li.active a:hover,
  .fw-tabs-left .nav-tabs > li.active a:focus {
    padding: 8px 10px;
    margin-right: -2px;
    border-right: transparent;
    border-color: #ddd transparent #ddd #ddd;
    *border-right-color: #fff;
    border: 2px solid #ddd;
    border-right: transparent;
  }
  .fw-tabs-left .tab-content {
    margin-left: 150px;
  }
  .fw-tabs-left.fw-tabs-framed .tab-content {
    border-top: 2px solid #ddd;
    border-radius: 0 4px 4px 0;
  }
  /* Tabs Left in Minimal tabs */
  .fw-tabs-left.fw-tabs-minimal .nav-tabs > li.active > a,
  .fw-tabs-left.fw-tabs-minimal .nav-tabs > li.active > a:hover,
  .fw-tabs-left.fw-tabs-minimal .nav-tabs > li.active > a:focus {
    border: none;
    border-right: 6px solid <?php echo esc_js($the_core_less_variables['theme-color-1']); ?>;
    margin-right: -6px;
  }
  .fw-tabs-left.fw-tabs-minimal .tab-content {
    padding: 0 0 0 20px;
    border-left: 6px solid #ddd;
  }
}

/* Screen 320px */
@media(max-width:479px){
  .nav-tabs > li {
    float: none;
  }
}
