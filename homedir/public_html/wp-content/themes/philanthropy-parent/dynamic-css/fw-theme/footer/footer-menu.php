<?php
$the_core_less_variables['fw-footer-logo-retina-elder']            = ( floatval($the_core_less_variables['fw-footer-logo-height'])/2).'px';
$the_core_less_variables['fw-footer-logo-retina-max-width']        = ( floatval($the_core_less_variables['fw-footer-logo-width'])/2).'px';
$the_core_less_variables['fw-calculate-height-footer-logo']        = ( floatval($the_core_less_variables['fw-footer-logo-height']) / ( floatval($the_core_less_variables['fw-footer-logo-width']) / floatval($the_core_less_variables['fw-menu-logo-max-width']) ) ).'px';
$the_core_less_variables['fw-calculate-height-footer-logo-retina'] = ( floatval($the_core_less_variables['fw-footer-logo-retina-elder']) / ( floatval($the_core_less_variables['fw-footer-logo-retina-max-width']) / floatval($the_core_less_variables['fw-menu-logo-max-width']) ) ).'px';
?>
/* Footer Menu */
.fw-footer-menu {
  text-align: center;
}
.fw-footer-menu ul {
  list-style: none;
  margin: 0 auto;
  padding: 0;
  font-size: 0;
  line-height: normal;
}
.fw-footer-menu ul li {
  font-family: <?php echo ($the_core_less_variables['fw-bottom-menu-font-family']); ?>;
  font-weight: <?php echo esc_js($the_core_less_variables['fw-bottom-menu-font-weight']); ?>;
  font-style: <?php echo esc_js($the_core_less_variables['fw-bottom-menu-font-style']); ?>;
  font-size: <?php echo esc_js($the_core_less_variables['fw-bottom-menu-font-size']); ?>;
  position: relative;
  display: inline-block;
}
.fw-footer-menu ul li a {
  display: inline-block;
  float: left;
  position: relative;
}
.fw-footer-menu ul li:first-child a {
  margin-left: <?php echo floatval($the_core_less_variables['fw-bottom-menu-item-margin'])/2; ?>px;
}
.fw-footer-menu ul li:last-child a {
  margin-right: <?php echo floatval($the_core_less_variables['fw-bottom-menu-item-margin'])/2; ?>px;
}
.fw-footer-menu ul li a i{
  margin-right: 10px;
  position: relative;
}
/* current menu item */
.fw-footer-menu ul li.current-menu-item > a:after,
.fw-footer-menu ul li.current-menu-ancestor > a:after {
  width: 100%;
  margin-left: -50%;
}
.fw-footer-menu ul li.current-menu-item a {
  color: <?php echo esc_js($the_core_less_variables['fw-footer-menu-item-color-hover']); ?>;
}
.fw-footer-menu ul li a {
  color: <?php echo esc_js($the_core_less_variables['fw-footer-middle-text']); ?>;
  margin: 0 0 0 <?php echo esc_js($the_core_less_variables['fw-bottom-menu-item-margin']); ?>;
  line-height: <?php echo esc_js($the_core_less_variables['fw-bottom-menu-item-height']); ?>;
  letter-spacing: <?php echo esc_js($the_core_less_variables['fw-bottom-menu-letter-spacing']); ?>;
  -webkit-transition: all 0.2s ease 0s;
  -o-transition: all 0.2s ease 0s;
  transition: all 0.2s ease 0s;
}
/* current menu line */
.fw-footer-menu ul li a:after {
  content: "";
  left: 50%;
  position: absolute;
  width: 0;
  background: <?php echo esc_js($the_core_less_variables['fw-footer-menu-item-color-hover']); ?>;
  top: <?php echo floor( ( ( floatval($the_core_less_variables['fw-bottom-menu-item-height']) - floatval($the_core_less_variables['fw-bottom-menu-font-size']) ) / 2 ) - floatval($the_core_less_variables['fw-bottom-menu-font-size']) ); ?>px;
  height: 1px;
  -webkit-transition: all 0.2s ease 0s;
  -o-transition: all 0.2s ease 0s;
  transition: all 0.2s ease 0s;
}
.fw-footer-menu ul li a:hover {
  color: <?php echo esc_js($the_core_less_variables['fw-footer-menu-item-color-hover']); ?>;
}
.fw-footer-menu ul li.menu-separator a:after {
  display: none;
}
.fw-footer-menu ul li.menu-separator a:hover {
  color: <?php echo esc_js($the_core_less_variables['fw-footer-middle-text']); ?>;
  cursor: default;
}
.fw-footer-menu ul li a:hover:after {
  width: 100%;
  margin-left: -50%;
}


/* ----------------------------------------------- */
/* Calculate positioning the menu & logo in footer */
/* ----------------------------------------------- */
/* logo retina */
<?php $the_core_footer_settings = function_exists('fw_get_db_settings_option') ? fw_get_db_settings_option('footer_settings') : array();
if ( isset($the_core_footer_settings['show_menu_bar']['selected_value']) && $the_core_footer_settings['show_menu_bar']['selected_value'] == 'yes' && $the_core_footer_settings['show_menu_bar']['yes']['show_footer_logo']['selected_value'] == 'yes') :
	if ( isset( $the_core_footer_settings['show_menu_bar']['yes']['show_footer_logo']['yes']['footer_logo_retina'] ) && $the_core_footer_settings['show_menu_bar']['yes']['show_footer_logo']['yes']['footer_logo_retina'] == 'fw-footer-logo-retina' ) : ?>
		<?php if( floatval($the_core_less_variables['fw-footer-logo-retina-max-width']) < floatval($the_core_less_variables['fw-menu-logo-max-width']) ) : ?>
			/* Footer height if is < fw-menu-logo-max-width (250) */
			<?php if( floatval($the_core_less_variables['fw-bottom-menu-item-height']) >= floatval($the_core_less_variables['fw-footer-logo-retina-elder']) ) : ?>
				/* fw-bottom-menu-item-height (menu item height) >= fw-footer-logo-retina-elder (logo height) */
				.fw-footer-logo-retina .fw-footer-logo {
					top: <?php echo ( floatval($the_core_less_variables['fw-bottom-menu-item-height']) - floatval($the_core_less_variables['fw-footer-logo-retina-elder']) ) / 2; ?>px;
				}
				.fw-footer-logo-retina .fw-footer-menu-right .fw-footer-menu,
				.fw-footer-logo-retina .fw-footer-menu-left .fw-footer-menu {
					top: 1px;
				}
			<?php elseif( floatval($the_core_less_variables['fw-bottom-menu-item-height']) < floatval($the_core_less_variables['fw-footer-logo-retina-elder']) ) : ?>
				/* fw-bottom-menu-item-height (menu item height) < fw-footer-logo-retina-elder (logo height) */
				.fw-footer-logo-retina .fw-footer-menu-right .fw-footer-menu,
				.fw-footer-logo-retina .fw-footer-menu-left .fw-footer-menu {
					top: <?php echo ( ( floatval($the_core_less_variables['fw-footer-logo-retina-elder']) - floatval($the_core_less_variables['fw-bottom-menu-item-height']) )/2) + 1; ?>px;
				}
			<?php endif; ?>

		<?php else: ?>
			/* Footer height if is > @fw-menu-logo-max-width (250) */
			<?php if( floatval($the_core_less_variables['fw-bottom-menu-item-height']) >= floatval($the_core_less_variables['fw-calculate-height-footer-logo-retina']) ) : ?>
				/* fw-bottom-menu-item-height (menu item height) >= fw-calculate-height-footer-logo-retina (logo height) */
				.fw-footer-logo-retina .fw-footer-logo {
					top: <?php echo ( floatval($the_core_less_variables['fw-bottom-menu-item-height']) - floatval($the_core_less_variables['fw-calculate-height-footer-logo-retina']) ) / 2; ?>px;
				}
				.fw-footer-logo-retina .fw-footer-menu-right .fw-footer-menu,
				.fw-footer-logo-retina .fw-footer-menu-left .fw-footer-menu {
					top: 1px;
				}
			<?php else: ?>
				/* fw-bottom-menu-item-height (menu item height) < fw-calculate-height-footer-logo-retina (logo height) */
				.fw-footer-logo-retina .fw-footer-menu-right .fw-footer-menu,
				.fw-footer-logo-retina .fw-footer-menu-left .fw-footer-menu {
					top: <?php echo ( ( floatval($the_core_less_variables['fw-calculate-height-footer-logo-retina']) - floatval($the_core_less_variables['fw-bottom-menu-item-height']) ) / 2 ) + 1; ?>px;
				}
			<?php endif; ?>
		<?php endif; ?>

	<?php else : ?>
		/* If logo is no retina */
		<?php if( floatval($the_core_less_variables['fw-footer-logo-width']) < floatval($the_core_less_variables['fw-menu-logo-max-width']) ) : ?>
			/* Footer height if is < fw-menu-logo-max-width (250) */
			<?php if( floatval($the_core_less_variables['fw-bottom-menu-item-height']) >= floatval($the_core_less_variables['fw-footer-logo-height']) ) : ?>
				/* fw-bottom-menu-item-height (menu item height) >= fw-footer-logo-retina-elder (logo height) */
				.fw-footer-logo-no-retina .fw-footer-logo {
					top: <?php echo ( floatval($the_core_less_variables['fw-bottom-menu-item-height']) - floatval($the_core_less_variables['fw-footer-logo-height']) ) / 2; ?>px;
				}
				.fw-footer-logo-no-retina .fw-footer-menu-right .fw-footer-menu,
				.fw-footer-logo-no-retina .fw-footer-menu-left .fw-footer-menu {
					top: 1px;
				}
			<?php else : ?>
				/* fw-bottom-menu-item-height (menu item height) < fw-footer-logo-retina-elder (logo height) */
				.fw-footer-logo-no-retina .fw-footer-menu-right .fw-footer-menu,
				.fw-footer-logo-no-retina .fw-footer-menu-left .fw-footer-menu {
					top: <?php echo ( ( floatval($the_core_less_variables['fw-footer-logo-height']) - floatval($the_core_less_variables['fw-bottom-menu-item-height'] ) ) / 2 ) + 1; ?>px;
				}
			<?php endif; ?>

		<?php else : ?>
			/* Footer height if is > fw-menu-logo-max-width (250) */
			<?php if( floatval($the_core_less_variables['fw-bottom-menu-item-height']) >= floatval($the_core_less_variables['fw-calculate-height-footer-logo']) ) : ?>
				.fw-footer-logo-no-retina .fw-footer-logo {
					top: <?php echo ( floatval($the_core_less_variables['fw-bottom-menu-item-height']) - floatval($the_core_less_variables['fw-calculate-height-footer-logo']) ) / 2; ?>px;
				}
				.fw-footer-logo-no-retina .fw-footer-menu-right .fw-footer-menu,
				.fw-footer-logo-no-retina .fw-footer-menu-left .fw-footer-menu {
					top: 1px;
				}
			<?php else : ?>
				/* fw-bottom-menu-item-height (menu item height) < fw-calculate-height-footer-logo-retina (logo height) */
				.fw-footer-logo-no-retina .fw-footer-menu-right .fw-footer-menu,
				.fw-footer-logo-no-retina .fw-footer-menu-left .fw-footer-menu {
					top: <?php echo ( ( floatval($the_core_less_variables['fw-calculate-height-footer-logo']) - floatval($the_core_less_variables['fw-bottom-menu-item-height']) ) / 2 ) + 1; ?>px;
				}
			<?php endif; ?>
		<?php endif; ?>

	<?php endif; ?>
<?php endif; ?>
/* --------------------------------------------------- */
/* End Calculate positioning the menu & logo in footer */
/* --------------------------------------------------- */

/* Footer menu positions */
.fw-footer-menu-right,
.fw-footer-menu-left {
  padding-top: <?php echo esc_js($the_core_less_variables['fw-footer-middle-padding-top']); ?>;
  padding-bottom: <?php echo esc_js($the_core_less_variables['fw-footer-middle-padding-bot']); ?>;
}
.fw-footer-menu-right .fw-footer-menu li a,
.fw-footer-menu-left .fw-footer-menu li a {
  line-height: <?php echo esc_js($the_core_less_variables['fw-bottom-menu-item-height']); ?>;
}
.fw-footer-menu-right .fw-footer-menu li:first-child a {
  margin-left: <?php echo esc_js($the_core_less_variables['fw-bottom-menu-item-margin']); ?>;
}
.fw-footer-menu-left .fw-footer-menu li:last-child a {
  margin-right: <?php echo esc_js($the_core_less_variables['fw-bottom-menu-item-margin']); ?>;
}
.fw-footer-menu-right .fw-container,
.fw-footer-menu-left .fw-container {
  -webkit-transform-style: preserve-3d;
  -moz-transform-style: preserve-3d;
  transform-style: preserve-3d;
}
.fw-footer-menu-right .fw-footer-menu,
.fw-footer-menu-left .fw-footer-menu {
  position: relative;
}
.fw-footer-menu-right .fw-footer-menu li,
.fw-footer-menu-left .fw-footer-menu li {
  border-top: none;
}
.fw-footer-menu-right .fw-footer-menu li a,
.fw-footer-menu-left .fw-footer-menu li a {
  padding: 0;
}
.fw-footer-menu-right .fw-footer-menu li:last-child a,
.fw-footer-menu-left .fw-footer-menu li:last-child a {
  margin-right: 0;
}
.fw-footer-menu-right .fw-footer-menu {
  text-align: right;
  float: right;
}
.fw-footer-menu-right .fw-footer-menu li:last-child a {
  margin-right: 0;
}
.fw-footer-menu-right .fw-footer-logo {
  float: left;
}
.fw-footer-menu-left .fw-footer-menu {
  text-align: left;
  float: left;
}
.fw-footer-menu-left .fw-footer-menu li:first-child a {
  margin-left: 0;
}
.fw-footer-menu-left .fw-footer-logo {
  float: right;
  margin-right: 0;
  margin-left: 20px;
}
.fw-footer-menu-disable .fw-footer-logo {
  top: 0 !important;
}


/* Responsive */
/* Screen 768px */
@media (max-width: 991px) {
  .fw-footer-menu ul li.menu-separator {
    display: none;
  }
  .fw-footer-menu-right .fw-footer-menu,
  .fw-footer-menu-left .fw-footer-menu {
    -webkit-transform: translateY(0);
    -moz-transform: translateY(0);
    -ms-transform: translateY(0);
    -o-transform: translateY(0);
    transform: translateY(0);
  }
  .fw-footer-menu-left .fw-footer-logo,
  .fw-footer-menu-right .fw-footer-logo {
    display: block;
    margin: 0 auto;
    text-align: center;
    float: none;
  }
  .fw-footer-menu-left .fw-footer-menu,
  .fw-footer-menu-right .fw-footer-menu{
    float: none;
    text-align: center;
    top: 0 !important;
    margin-top: 20px;
  }
}
/* Screen 320px */
@media(max-width:479px){
  .fw-footer-menu ul li{
    width: 100%;
  }
  .fw-footer-menu ul li a{
    float: none;
    margin: 0 !important;
  }
}
