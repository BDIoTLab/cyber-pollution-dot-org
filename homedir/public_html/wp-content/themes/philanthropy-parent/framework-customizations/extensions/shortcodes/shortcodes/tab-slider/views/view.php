<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

if ( empty( $atts['tabs'] ) ) {
	return;
}

// for desktop
if ( isset( $atts['responsive']['desktop_display']['selected'] ) && $atts['responsive']['desktop_display']['selected'] == 'no' ) {
	$atts['class'] .= ' fw-desktop-hide-element';
}

// for tablet landscape
if ( isset( $atts['responsive']['tablet_landscape_display']['selected'] ) && $atts['responsive']['tablet_landscape_display']['selected'] == 'no' ) {
	$atts['class'] .= ' fw-tablet-landscape-hide-element';
}

// for tablet portrait
if ( isset( $atts['responsive']['tablet_display']['selected'] ) && $atts['responsive']['tablet_display']['selected'] == 'no' ) {
	$atts['class'] .= ' fw-tablet-hide-element';
}

// for display on smartphone
if ( isset( $atts['responsive']['smartphone_display']['selected'] ) && $atts['responsive']['smartphone_display']['selected'] == 'no' ) {
	$atts['class'] .= ' fw-mobile-hide-element';
}

/*----------------Animation option--------------*/
$data_animation = '';
if ( isset( $atts['animation_group'] ) ) {
	// get animation class and delay
	if ( $atts['animation_group']['selected'] == 'yes' ) {
		$atts['class'] .= ' fw-animated-element';
		// get animation
		if ( ! empty( $atts['animation_group']['yes']['animation']['animation'] ) ) {
			$data_animation .= ' data-animation-type="' . $atts['animation_group']['yes']['animation']['animation'] . '"';
		}

		// get delay
		if ( ! empty( $atts['animation_group']['yes']['animation']['delay'] ) ) {
			$data_animation .= ' data-animation-delay="' . (int) esc_attr( $atts['animation_group']['yes']['animation']['delay'] ) . '"';
		}
	}
}
/*----------------End Animation----------------*/

$shortcodes = fw_ext( 'shortcodes' );
$button     = $shortcodes->get_shortcode( 'button' );

$tab_content_align      = 'fw-tabs-slider-content-align';
$atts['padding_top']    = (int) $atts['padding_top'];
$atts['padding_bottom'] = (int) $atts['padding_bottom'];
if ( $atts['padding_top'] != 0 || $atts['padding_bottom'] != 0 ) {
	$tab_content_align = '';
}
?>
<div class="tf-sh-<?php echo esc_attr( $atts['unique_id'] ); ?> fw-tabs-slider owl-loaded owl-carousel owl-theme <?php echo esc_attr( $atts['class'] ); ?>" <?php echo ($data_animation); ?> data-id="tf-sh-<?php echo esc_attr( $atts['unique_id'] ); ?>">
	<?php
	$tab_navigation = $items = '';
	$count_navigation = 0;
	foreach ( $atts['tabs'] as $tab_key => $tab ) :
		$item_class = '';
		if ( $tab_key == 0 ) {
			$item_class = 'active';
		}

		// title separator
		$title_separator = '';
		if( $tab['separator'] == 'yes' ) {
			$separator_class = '';
			// type
			if ( $tab['separator_styling']['type'] == 'fw-divider-space' ) {
				$separator_class .= ' clearfix';
			} else {
				$separator_class .= ' fw-divider-line';
			}

			// width
			if ( $tab['separator_styling']['width']['selected'] == '100' ) {
				if ( $tab['separator_styling']['type'] != 'fw-divider-space' ) {
					$separator_class .= ' fw-divider-full-width';
				}
			}

			// size
			if ( $tab['separator_styling']['divider_size']['size'] != 'custom' ) {
				$separator_class .= ' '.$tab['separator_styling']['divider_size']['size'];
			}

			$title_separator = '<div class="fw-divider '.$tab['separator_styling']['type'].' '.$separator_class.'"></div>';
		}

		$item_class .= ' tf-sh-'.esc_attr( $atts['unique_id'] ).'-'.$tab_key;

		// tab navigation html
		$tab_navigation .= '<li class="owl-dot '.$item_class.'">';
			if ( $tab['icon_type']['tab_icon'] == 'icon-class' && ! empty( $tab['icon_type']['icon-class']['icon_class'] ) ) :
				$count_navigation++;
				$tab_navigation .= '<i class="'.$tab['icon_type']['icon-class']['icon_class'].'"></i>';
			elseif ( $tab['icon_type']['tab_icon'] == 'upload-icon' && ! empty( $tab['icon_type']['upload-icon']['upload-custom-img'] ) ) :
				$count_navigation++;
				$tab_navigation .= '<img src="'.the_core_change_original_link_with_cdn( $tab['icon_type']['upload-icon']['upload-custom-img']['url'] ).'" alt="'.$tab['tab_title'].'" />';
			endif;

			if ( ! empty( $tab['tab_title'] ) ) :
				$count_navigation++;
				$tab_navigation .= '<span class="fw-tabs-slider-nav-title">'.$tab['tab_title'].'</span>';
			endif;
		$tab_navigation .= '</li>';


		// slide items html
		$tab_bg_color_p = the_core_get_color_palette_color_and_class( $tab['tab_bg_color'], array( 'return_color' => true ) );
		$tab_bg_color   = '';
		if ( ! empty( $tab_bg_color_p['color'] ) ) {
			$tab_bg_color = 'style="background-color: ' . $tab_bg_color_p['color'] . '"';
		}

		$items .= '<div class="item clearfix ' . $tab['image_position'] . ' ' . $item_class . '" ' . $tab_bg_color . '>';

			if ( ! empty( $tab['image'] ) ) :
				$items .= '<div class="fw-tabs-slider-media fw-block-image-parent">';
					$image = the_core_image( $tab['image'], array( 'ratio' => $atts['ratio'], 'return' => true ) );
					$items .= '<div class="fw-block-image-child '.$image['ratio'].'">';
						$items .= $image['img'];
					$items .= '</div>';
				$items .= '</div>';
			endif;

			$items .= '<div class="fw-tabs-slider-content ' . $tab_content_align . ' '.$tab['tab_alignment'].'">';
				$items .= '<div class="fw-tabs-slider-content-inner-wrap">';
					$items .= '<div class="fw-tabs-slider-content-inner">';
						$items .= '<h3 class="fw-tabs-slider-title">' . $tab['tab_content_title'] . '</h3>';
						$items .= $title_separator;
						$items .= '<div class="fw-tabs-slider-description">'.do_shortcode( $tab['tab_content'] ).'</div>';

						if ( $tab['show_bnt'] == 'yes' ) :
							$items .= do_shortcode( $button->render( $tab['button_options'] ) );
						endif;

					$items .= '</div>';
				$items .= '</div>';
			$items .= '</div>';

		$items .= '</div>'; // .item

	endforeach; ?>

	<!-- Tabs Slider Nav -->
	<?php if( $count_navigation > 0 ) : ?>
		<ul class="fw-tabs-slider-nav owl-dots <?php echo esc_attr($atts['tabs_position']); ?>">
			<?php echo ($tab_navigation); ?>
		</ul>
	<?php endif; ?>

	<!-- Items Content -->
	<div id="tf-sh-<?php echo esc_attr( $atts['unique_id'] ); ?>" class="fw-tabs-slider-content-wrap">
		<?php echo ($items); ?>
	</div><!-- /.fw-tabs-slider-content-wrap -->
</div><!-- /.fw-tabs-slider -->