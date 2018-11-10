/* copyright and social area background & space */
.fw-footer-bar {
  position: relative;
  background-size: cover;
  background-repeat: no-repeat;
  background-color: <?php echo esc_js($the_core_less_variables['fw-footer-bar-bg']); ?>;
  padding-top: <?php echo esc_js($the_core_less_variables['fw-footer-bar-padding-top']); ?>;
  padding-bottom: <?php echo esc_js($the_core_less_variables['fw-footer-bar-padding-bot']); ?>;
  color: <?php echo esc_js($the_core_less_variables['fw-footer-bar-text']); ?>;
}

/* footer copyright */
.fw-copyright {
  font-size: <?php echo esc_js($the_core_less_variables['fw-copyright-font-size']); ?>;
  font-style: <?php echo esc_js($the_core_less_variables['fw-copyright-font-style']); ?>;
  font-weight: <?php echo esc_js($the_core_less_variables['fw-copyright-font-weight']); ?>;
  font-family: <?php echo ($the_core_less_variables['fw-copyright-font-family']); ?>;
  line-height: <?php echo esc_js($the_core_less_variables['fw-copyright-line-height']); ?>;
  letter-spacing: <?php echo esc_js($the_core_less_variables['fw-copyright-letter-spacing']); ?>;
  color: <?php echo esc_js($the_core_less_variables['fw-copyright-text-color']); ?>;
  position: relative;
}
.fw-copyright a {
  color: <?php echo esc_js($the_core_less_variables['fw-copyright-text-color']); ?>;
  text-decoration: underline;
}
.fw-copyright a:hover {
  color: <?php echo esc_js($the_core_less_variables['fw-copyright-text-color']); ?>;
  text-decoration: none;
}
.fw-footer-bar.fw-copyright-left > .fw-container,
.fw-footer-bar.fw-copyright-right > .fw-container {
  display: flex;
  justify-content: flex-end;
  align-items: center;
}
.fw-copyright-left .fw-copyright,
.fw-copyright-left .fw-footer-social,
.fw-copyright-right .fw-copyright,
.fw-copyright-right .fw-footer-social {
  max-width: 50%;
}
.fw-copyright-left .fw-copyright {
  order: 1;
  margin-right: auto;
}
.fw-copyright-left .fw-footer-social {
  order: 2;
}
.fw-copyright-right .fw-copyright {
  order: 2;
}
.fw-copyright-right .fw-footer-social {
  order: 1;
  margin-right: auto;
}
.fw-copyright-center {
  text-align: center;
}

/* footer social */
.fw-footer-social {
  position: relative;
  line-height: <?php echo (floatval($the_core_less_variables['fw-footer-social-size'])*0.8); ?>px;
}
.fw-footer-social a {
  font-size: <?php echo esc_js($the_core_less_variables['fw-footer-social-size']); ?>;
  width: <?php echo esc_js($the_core_less_variables['fw-footer-social-size']); ?>;
  height: <?php echo floatval($the_core_less_variables['fw-footer-social-size'])-1; ?>px;
  color: <?php echo esc_js($the_core_less_variables['fw-footer-social-color']); ?>;
  display: inline-block;
  margin: 0 2px;
}
.fw-footer-social a:hover {
  color: <?php echo esc_js($the_core_less_variables['fw-footer-social-hover-color']); ?>;
}

/*----> Responsive <---- */
/* Screen 568px */
@media(max-width:767px) {
  .fw-copyright-left .fw-copyright,
  .fw-copyright-left .fw-footer-social,
  .fw-copyright-right .fw-copyright,
  .fw-copyright-right .fw-footer-social {
    max-width: 100%;
    width: 100%;
    text-align: center;
  }
  .fw-footer-bar.fw-copyright-left > .fw-container,
  .fw-footer-bar.fw-copyright-right > .fw-container {
    flex-wrap: wrap;
    justify-content: center;
  }
  .fw-footer-social {
    margin-bottom: 10px;
  }
  .fw-copyright-left .fw-footer-social {
    margin-top: 10px;
    margin-bottom: 0;
  }
  .fw-footer-social a {
    margin: 0 5px;
  }
}
/* Screen 320px */
@media(max-width:479px) {
  .fw-footer-social {
    margin-bottom: 20px;
  }
  .fw-copyright-left .fw-footer-social {
    margin-top: 20px;
  }
}
