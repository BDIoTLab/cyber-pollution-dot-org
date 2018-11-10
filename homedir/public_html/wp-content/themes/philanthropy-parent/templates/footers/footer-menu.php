<?php
	$the_core_footer_logo_position = $the_core_footer_logo = '';
	$the_core_footer_settings      = defined( 'FW' ) ? fw_get_db_settings_option( 'footer_settings' ) : array();
	$the_core_show_footer_logo     = isset( $the_core_footer_settings['show_menu_bar']['yes']['show_footer_logo']['selected_value'] ) ? $the_core_footer_settings['show_menu_bar']['yes']['show_footer_logo']['selected_value'] : 'no';
	$the_core_show_footer_menu     = isset( $the_core_footer_settings['show_menu_bar']['yes']['show_footer_menu'] ) ? $the_core_footer_settings['show_menu_bar']['yes']['show_footer_menu'] : 'yes';
	if($the_core_show_footer_logo == 'yes'){
		$the_core_footer_logo          = isset( $the_core_footer_settings['show_menu_bar']['yes']['show_footer_logo']['yes']['footer_logo'] ) ? $the_core_footer_settings['show_menu_bar']['yes']['show_footer_logo']['yes']['footer_logo'] : 'no';
		$the_core_footer_logo_position = isset( $the_core_footer_settings['show_menu_bar']['yes']['show_footer_logo']['yes']['footer_logo_position'] ) ? $the_core_footer_settings['show_menu_bar']['yes']['show_footer_logo']['yes']['footer_logo_position'] : 'fw-footer-menu-left';
	}

	// menu bar overlay
	$the_core_overlay_style_menu_bar = '';
	if ( isset( $the_core_footer_settings['show_menu_bar']['yes']['menu_bar_bg']['image']['overlay_options']['overlay'] ) && $the_core_footer_settings['show_menu_bar']['yes']['menu_bar_bg']['image']['overlay_options']['overlay'] == 'yes' && isset($the_core_footer_settings['show_menu_bar']['yes']['menu_bar_bg']['background']) &&  $the_core_footer_settings['show_menu_bar']['yes']['menu_bar_bg']['background'] == 'image') {
		$the_core_overlay_bg = $the_core_footer_settings['show_menu_bar']['yes']['menu_bar_bg']['image']['overlay_options']['yes']['background']['id'];
		$the_core_opacity    = ( $the_core_footer_settings['show_menu_bar']['yes']['menu_bar_bg']['image']['overlay_options']['yes']['overlay_opacity_image'] ) / 100;
		if ( $the_core_overlay_bg == 'fw-custom' ) {
			$the_core_overlay_style_menu_bar = '<div class="fw-main-row-overlay" style="background-color: ' . $the_core_footer_settings['show_menu_bar']['yes']['menu_bar_bg']['image']['overlay_options']['yes']['background']['color'] . '; opacity: ' . $the_core_opacity . ';"></div>';
		} else {
			$the_core_overlay_style_menu_bar = '<div class="fw-main-row-overlay fw_theme_bg_' . $the_core_footer_settings['show_menu_bar']['yes']['menu_bar_bg']['image']['overlay_options']['yes']['background']['id'] . '" style="opacity: ' . $the_core_opacity . ';"></div>';
		}
	}
	?>
	<div class="fw-footer-middle <?php echo esc_attr($the_core_footer_logo_position); ?> <?php if( $the_core_show_footer_menu == 'no' ) echo 'fw-footer-menu-disable'; ?>">
		<?php echo ($the_core_overlay_style_menu_bar); ?>
		<div class="fw-container">
			<?php if ( $the_core_show_footer_logo == 'yes' && ! empty( $the_core_footer_logo ) ) : ?>
				<div class="fw-footer-logo">
					<a href="<?php echo esc_url( home_url('/') ); ?>"><img data-src="<?php echo esc_url( the_core_change_original_link_with_cdn( $the_core_footer_logo['url'] ) ); ?>" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" class="lazyload" alt="<?php echo esc_url( bloginfo('name') ) ?>" /></a>
				</div>
			<?php endif; ?>
			<?php if ( $the_core_show_footer_menu == 'yes' && has_nav_menu('footer') ) {
				fw_theme_nav_menu( 'footer' );
			} ?>
		</div>
	</div>
