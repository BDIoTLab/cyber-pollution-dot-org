<?php if( is_active_sidebar('footer-1') || is_active_sidebar('footer-2') || is_active_sidebar('footer-3') || is_active_sidebar('footer-4') ) :
	$the_core_footer_settings   = defined( 'FW' ) ? fw_get_db_settings_option( 'footer_settings' ) : array();
	$the_core_number_of_columns = isset( $the_core_footer_settings['show_footer_widgets']['yes']['number_of_columns'] ) ? $the_core_footer_settings['show_footer_widgets']['yes']['number_of_columns'] : 'footer-cols-4';

	// footer widgets overlay
	$the_core_overlay_style_footer_widgets = '';
	if ( isset( $the_core_footer_settings['show_footer_widgets']['yes']['footer_widgets_bg']['image']['overlay_options']['overlay'] ) && $the_core_footer_settings['show_footer_widgets']['yes']['footer_widgets_bg']['image']['overlay_options']['overlay'] == 'yes' && $the_core_footer_settings['show_footer_widgets']['yes']['footer_widgets_bg']['background'] == 'image' ) {
		$the_core_overlay_bg = $the_core_footer_settings['show_footer_widgets']['yes']['footer_widgets_bg']['image']['overlay_options']['yes']['background']['id'];
		$the_core_opacity    = ( $the_core_footer_settings['show_footer_widgets']['yes']['footer_widgets_bg']['image']['overlay_options']['yes']['overlay_opacity_image'] ) / 100;
		if ( $the_core_overlay_bg == 'fw-custom' && ! empty( $the_core_footer_settings['show_footer_widgets']['yes']['footer_widgets_bg']['image']['overlay_options']['yes']['background']['color'] ) ) {
			$the_core_overlay_style_footer_widgets = '<div class="fw-main-row-overlay" style="background-color: ' . $the_core_footer_settings['show_footer_widgets']['yes']['footer_widgets_bg']['image']['overlay_options']['yes']['background']['color'] . '; opacity: ' . $the_core_opacity . ';"></div>';
		} else {
			$the_core_overlay_style_footer_widgets = '<div class="fw-main-row-overlay fw_theme_bg_' . $the_core_overlay_bg . '" style="opacity: ' . $the_core_opacity . ';"></div>';
		}
	}

	if ( $the_core_number_of_columns == 'footer-cols-6' ) {
		$the_core_column_class = 'fw-col-md-2 fw-col-sm-4';
		$the_core_col_number   = 6;
	} elseif ( $the_core_number_of_columns == 'footer-cols-5' ) {
		$the_core_column_class = 'fw-col-md-1-5 fw-col-sm-4';
		$the_core_col_number   = 5;
	} elseif ( $the_core_number_of_columns == 'footer-cols-4' ) {
		$the_core_column_class = 'fw-col-md-3 fw-col-sm-6';
		$the_core_col_number   = 4;
	} elseif ( $the_core_number_of_columns == 'footer-cols-2' ) {
		$the_core_column_class = 'fw-col-sm-6';
		$the_core_col_number   = 2;
	} elseif ( $the_core_number_of_columns == 'footer-cols-1' ) {
		$the_core_column_class = 'fw-col-md-12';
		$the_core_col_number   = 1;
	} else {
		$the_core_column_class = 'fw-col-md-4 fw-col-sm-4';
		$the_core_col_number   = 3;
	}
	?>
	<div class="fw-footer-widgets <?php echo esc_attr($the_core_number_of_columns); ?>">
		<?php echo ($the_core_overlay_style_footer_widgets); ?>
		<div class="fw-inner">
			<div class="fw-container">
				<div class="fw-row">
					<?php for ( $i = 1; $i <= $the_core_col_number; $i ++ ): $the_core_footer_sidebar = 'footer-' . $i; ?>
						<div class="<?php echo esc_attr($the_core_column_class); ?>">
							<?php dynamic_sidebar( $the_core_footer_sidebar ); ?>
						</div>
					<?php endfor; ?>
				</div>
			</div>
		</div>
	</div>
<?php endif;