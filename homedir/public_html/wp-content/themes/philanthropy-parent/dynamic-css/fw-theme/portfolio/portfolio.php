/* Portfolio */
/* -------------------------------------------------- */
.fw-portfolio {
  position: relative;
}
.fw-portfolio.fw-portfolio-content-position-top .fw-icell {
  vertical-align: top;
}
.fw-portfolio.fw-portfolio-content-position-middle .fw-icell {
  vertical-align: middle;
}
.fw-portfolio.fw-portfolio-content-position-bottom .fw-icell {
  vertical-align: bottom;
}
.fw-portfolio .fw-portfolio-filter,
.fw-portfolio .fw-portfolio-wrapper,
.fw-portfolio .fw-portfolio-image {
  position: relative;
}
.fw-portfolio .fw-portfolio-wrapper ul {
  margin: 0;
  padding: 0;
  list-style: none;
}
.fw-portfolio .fw-portfolio-wrapper li {
  float: left;
}
.fw-portfolio img {
  max-width: 100%;
  display: block;
  position: relative;
  -webkit-backface-visibility: hidden;
}
.fw-portfolio a:hover {
  text-decoration: none;
}
.fw-portfolio .fw-btn-portfolio-read-more {
  line-height: normal !important;
}
.fw-portfolio .fw-btn-portfolio-read-more:after {
  content: "\f101";
  font-family: 'FontAwesome';
  margin-left: 10px;
}
/* Portfolio Filter */
.fw-portfolio-filter {
  overflow: hidden;
  position: relative;
  border: 1px solid #dee0e1;
  padding: 20px;
  margin-bottom: <?php echo floatval($the_core_less_variables['fw-content-density'])*8; ?>px;
}
.fw-portfolio-filter .caroufredsel_wrapper {
  margin: 0 auto !important;
}
.fw-portfolio-filter ul {
  padding: 0;
  text-align: center;
}
.fw-portfolio-filter li {
  display: inline-block;
  margin: 0 35px;
  float: left;
  line-height: 1.2em;
}
.fw-portfolio-filter li a {
  font-family: <?php echo ($the_core_less_variables['fw-menu-font-family']); ?>;
  font-style: <?php echo esc_js($the_core_less_variables['fw-menu-font-style']); ?>;
  color: <?php echo esc_js($the_core_less_variables['theme-color-2']); ?>;
  font-weight: normal;
  font-size: 14px;
}
.fw-portfolio-filter li.active a,
.fw-portfolio-filter li a:hover {
  color: <?php echo esc_js($the_core_less_variables['theme-color-1']); ?>;
}
.fw-portfolio-filter .next,
.fw-portfolio-filter .prev {
  color: <?php echo esc_js($the_core_less_variables['theme-color-2']); ?>;
  position: absolute;
  top: 0.5em;
  font-size: 30px;
  line-height: 1em;
  text-align: center;
  font-weight: normal;
}
.fw-portfolio-filter .next:hover,
.fw-portfolio-filter .prev:hover {
  color: <?php echo esc_js($the_core_less_variables['theme-color-1']); ?>;
}
.fw-portfolio-filter .prev {
  left: 20px;
}
.fw-portfolio-filter .prev i:before {
  content: "\f104";
}
.fw-portfolio-filter .next {
  right: 20px;
}
.fw-portfolio-filter .next i:before {
  content: "\f105";
}
.fw-portfolio .fw-js-load-more-projects {
  margin-top: 25px;
}
.fw-portfolio .fw-btn img {
  display: inline;
}

/* Responsive */
@media (max-width: 991px) {
  .site .fw-portfolio-1 .fw-portfolio-wrapper li,
  .site .fw-portfolio-2 .fw-portfolio-wrapper li,
  .site .fw-portfolio-3 .fw-portfolio-wrapper li {
    width: 47% !important;
  }
  .site .fw-project-details.fw-project-column-4 .fw-project-list .fw-project-list-item {
    width: 32% !important;
  }
}
/* Screen 568px */
@media (max-width: 767px) {
  .site .fw-portfolio-1 .fw-portfolio-wrapper li,
  .site .fw-portfolio-2 .fw-portfolio-wrapper li,
  .site .fw-portfolio-3 .fw-portfolio-wrapper li {
    width: 47% !important;
  }
  .site .fw-project-details.fw-project-column-4 .fw-project-list .fw-project-list-item,
  .site .fw-project-details .fw-project-list .fw-project-list-item {
    width: 48% !important;
  }
}
/* Screen 320px */
@media (max-width: 479px) {
  .site .fw-project-details.fw-project-column-4 .fw-project-list .fw-project-list-item,
  .site .fw-project-details .fw-project-list .fw-project-list-item {
    width: 100% !important;
  }
  .site .fw-portfolio-filter .caroufredsel_wrapper {
    margin: 0 auto !important;
  }
  .site .fw-portfolio-1 .fw-portfolio-wrapper li,
  .site .fw-portfolio-2 .fw-portfolio-wrapper li,
  .site .fw-portfolio-3 .fw-portfolio-wrapper li {
    width: 97% !important;
    float: none;
    margin: 0 auto;
  }
}
