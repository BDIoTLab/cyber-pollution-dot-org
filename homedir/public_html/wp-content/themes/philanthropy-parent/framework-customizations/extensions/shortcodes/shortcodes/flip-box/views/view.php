<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

// for desktop
if( isset($atts['responsive']['desktop_display']['selected']) && $atts['responsive']['desktop_display']['selected'] == 'no' ) {
	$atts['class'] .= ' fw-desktop-hide-element';
}

// for tablet landscape
if( isset($atts['responsive']['tablet_landscape_display']['selected']) && $atts['responsive']['tablet_landscape_display']['selected'] == 'no' ) {
	$atts['class'] .= ' fw-tablet-landscape-hide-element';
}

// for tablet portrait
if( isset($atts['responsive']['tablet_display']['selected']) && $atts['responsive']['tablet_display']['selected'] == 'no' ) {
	$atts['class'] .= ' fw-tablet-hide-element';
}

// for display on smartphone
if( isset($atts['responsive']['smartphone_display']['selected']) && $atts['responsive']['smartphone_display']['selected'] == 'no' ) {
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

// front icon
$front_icon = '';
if( $atts['front']['icon_type']['selected'] == 'icon_class' ) {
	if( !empty($atts['front']['icon_type']['icon_class']['class']) ) {
		$front_icon = '<i class="' . $atts['front']['icon_type']['icon_class']['class'] . '"></i>';
	}
}
elseif( $atts['front']['icon_type']['selected'] == 'icon_upload' ) {
	if( !empty($atts['front']['icon_type']['icon_upload']['img']) ) {
		$front_icon = '<img src="'.the_core_change_original_link_with_cdn( $atts['front']['icon_type']['icon_upload']['img']['url'] ).'" alt="" />';
	}
}

// back icon
$back_icon = '';
if( $atts['back']['icon_type']['selected'] == 'icon_class' ) {
	if( !empty($atts['back']['icon_type']['icon_class']['class']) ) {
		$back_icon = '<i class="' . $atts['back']['icon_type']['icon_class']['class'] . '"></i>';
	}
}
elseif( $atts['back']['icon_type']['selected'] == 'icon_upload' ) {
	if( !empty($atts['back']['icon_type']['icon_upload']['img']) ) {
		$back_icon = '<img src="'.the_core_change_original_link_with_cdn( $atts['back']['icon_type']['icon_upload']['img']['url'] ).'" alt="" />';
	}
}

// front overlay
$the_core_front_overlay_style = '';
if ( $atts['front']['background']['background'] == 'image' && $atts['front']['background']['image']['overlay_options']['overlay'] == 'yes' ) {
	$bg_color = the_core_get_color_palette_color_and_class($atts['front']['background']['image']['overlay_options']['yes']['background'] , array('return_color' => true));
	if( !empty($bg_color['color']) ) {
		$the_core_front_opacity        = $atts['front']['background']['image']['overlay_options']['yes']['overlay_opacity_image'] / 100;
		$the_core_front_overlay_style .= '<div class="fw-main-row-overlay" style="background-color: ' . $bg_color['color'] . '; opacity: ' . $the_core_front_opacity . ';"></div>';
	}
}

// back overlay
$the_core_back_overlay_style = '';
if ( $atts['back']['background']['background'] == 'image' && $atts['back']['background']['image']['overlay_options']['overlay'] == 'yes' ) {
	$back_bg_color = the_core_get_color_palette_color_and_class($atts['back']['background']['image']['overlay_options']['yes']['background'] , array('return_color' => true));
	if( !empty($back_bg_color['color']) ) {
		$the_core_back_opacity        = $atts['back']['background']['image']['overlay_options']['yes']['overlay_opacity_image'] / 100;
		$the_core_back_overlay_style .= '<div class="fw-main-row-overlay" style="background-color: ' . $back_bg_color['color'] . '; opacity: ' . $the_core_back_opacity . ';"></div>';
	}
}
?>
<div class="fw-flip-box <?php echo esc_attr($atts['animation_type']['selected']); ?> <?php echo esc_attr($atts['alignment']); ?> clearfix <?php echo esc_attr( $atts['class'] ); ?> tf-sh-<?php echo esc_attr( $atts['unique_id'] ); ?>" <?php echo ($data_animation); ?>>
	<div class="fw-flip-box-wrap">
		<!-- Front  -->
		<div class="fw-flip-box-front">
			<?php echo ($the_core_front_overlay_style); ?>
			<div class="fw-flip-box-content">
				<?php if( !empty($front_icon) ) : ?>
					<div class="fw-flip-box-icon">
						<?php echo ($front_icon); ?>
					</div>
				<?php endif; ?>

				<?php
				$args = array(
					'return' => true,
					'ratio'  => $atts['front']['ratio']
				);
				$image = the_core_image( $atts['front']['img'], $args );
				?>
				<?php if( !empty($atts['front']['img']) && !empty($image['img']) ) : ?>
					<div class="fw-flip-box-image fw-block-image-parent">
						<div class="fw-block-image-child <?php echo esc_attr($image['ratio']); ?>">
							<?php echo ($image['img']); ?>
						</div>
					</div>
				<?php endif; ?>

				<?php if ( !empty($atts['front']['title']) ) : ?>
					<h4 class="fw-flip-box-title"><?php echo ($atts['front']['title']); ?></h4>
				<?php endif; ?>

				<?php if ( !empty($atts['front']['desc']) ) : ?>
					<div class="fw-flip-description">
						<?php echo do_shortcode($atts['front']['desc']); ?>
					</div>
				<?php endif; ?>

				<?php if ( $atts['front']['show_bnt'] == 'yes' ) :
					$before_btn = $after_btn = $icon = '';
					// btn settings array
					$btn = $atts['front']['front_button'];

					// btn alignment
					$alignment = ( isset( $btn['full_width'] ) && $btn['full_width']['selected_type'] == 'default' ) ? $btn['full_width']['default'] : '';
					if ( isset( $alignment['btn_alignment'] ) && $alignment['btn_alignment'] != '' ) {
						if ( $alignment['btn_alignment'] != '' ) {
							$before_btn = '<div class="' . $alignment['btn_alignment'] . '">';
							$after_btn  = '</div>';
						}
					}

					// btn size
					$button_size = $btn['size'];
					if ( $button_size['selected'] == 'custom' ) {
						$btn_size_style = 'width:' . (int) esc_attr( $button_size['custom']['width'] ) . 'px;height:' . (int) esc_attr( $button_size['custom']['height'] ) . 'px; line-height:' . (int) esc_attr( $button_size['custom']['height'] ) . 'px;';
						$btn_size_class = '';
					} else {
						$btn_size_class = $button_size['selected'];
						$btn_size_style = '';
					}

					$style = 'fw-btn-1';
					if(isset($btn['style']['selected'])){
						$style = $btn['style']['selected'];
					}

					// get icon type
					$icon_type = $btn['icon_type'];
					$icon      = '';

					if ( $icon_type['tab_icon'] == 'icon-class' ) {
						if(!empty($icon_type['icon-class']['icon_class'])) {
							// get icon size
							$icon_size = ! empty( $btn['icon_size'] ) ? 'style="font-size:' . esc_attr( (int) $btn['icon_size'] ) . 'px;"' : '';
							$icon = '<i class="' . $btn['icon_position'] . ' ' . $icon_type['icon-class']['icon_class'] . '" ' . $icon_size . '></i>';
						}
					} else {
						if ( ! empty( $icon_type['upload-icon']['upload-custom-img']['url'] ) ) {
							// get image size
							$icon_size = ! empty( $btn['icon_size'] ) ? 'style="width:' . esc_attr( (int) $btn['icon_size'] ) . 'px;"' : '';
							$icon      = '<img class="' . $btn['icon_position'] . '" src="' . esc_url( the_core_change_original_link_with_cdn($icon_type['upload-icon']['upload-custom-img']['url']) ) . '" ' . $icon_size . ' />';
						}
					}

					$a_class = '';
					if (strpos($btn['link'], "#") !== false && strlen($btn['link']) > 1) {
						$a_class = 'anchor';
					}

					$data_attr_btn = '';
					if( isset($btn['open_in_popup']['selected']) && $btn['open_in_popup']['selected'] == 'yes' ) {
						$data_attr_btn .= ' data-rel="prettyPhoto"';
					}

					if( isset($btn['nofollow']) && 'yes' == $btn['nofollow'] ) {
						$data_attr_btn .= ' rel="nofollow"';
					}
					?>
					<?php echo ($before_btn); ?>
					<a href="<?php echo esc_url( $btn['link'] ); ?>" target="<?php echo esc_attr( $btn['target'] ); ?>" class="fw-btn <?php echo ( $btn['full_width']['selected_type'] != 'default' ) ? esc_attr( $btn['full_width']['selected_type'] ) : ''; ?> <?php echo esc_attr( $btn_size_class );?> <?php the_core_button_class($style ); ?> <?php echo esc_attr($a_class); ?>" style="<?php echo ($btn_size_style); ?>" <?php echo ($data_attr_btn); ?>>
						<span>
							<?php if ( $btn['icon_position'] == 'pull-right-icon' ) : ?>
								<?php echo the_core_translate( esc_attr( $btn['label'] ) ); echo ($icon); ?>
							<?php else : ?>
								<?php echo ($icon); echo the_core_translate( esc_attr( $btn['label'] ) ); ?>
							<?php endif; ?>
						</span>
					</a>
					<?php echo ($after_btn); ?>
				<?php endif; ?>
			</div>
		</div>

		<!-- Back -->
		<div class="fw-flip-box-back">
			<?php echo ($the_core_back_overlay_style); ?>
			<div class="fw-flip-box-content">
				<?php if( !empty($back_icon) ) : ?>
					<div class="fw-flip-box-icon">
						<?php echo ($back_icon); ?>
					</div>
				<?php endif; ?>

				<?php
				$args = array(
					'return' => true,
					'ratio'  => $atts['back']['ratio']
				);
				$image = the_core_image( $atts['back']['img'], $args );
				?>
				<?php if( !empty($atts['back']['img']) && !empty($image['img']) ) : ?>
					<div class="fw-flip-box-image fw-block-image-parent">
						<div class="fw-block-image-child <?php echo esc_attr($image['ratio']); ?>">
							<?php echo ($image['img']); ?>
						</div>
					</div>
				<?php endif; ?>

				<?php if ( !empty($atts['back']['title']) ) : ?>
					<h4 class="fw-flip-box-title"><?php echo ($atts['back']['title']); ?></h4>
				<?php endif; ?>

				<?php if ( !empty($atts['back']['desc']) ) : ?>
					<div class="fw-flip-description">
						<?php echo do_shortcode($atts['back']['desc']); ?>
					</div>
				<?php endif; ?>

				<?php if ( $atts['back']['show_bnt'] == 'yes' ) :
					$before_btn = $after_btn = $icon = '';
					// btn settings array
					$btn = $atts['back']['back_button'];

					// btn alignment
					$alignment = ( isset( $btn['full_width'] ) && $btn['full_width']['selected_type'] == 'default' ) ? $btn['full_width']['default'] : '';
					if ( isset( $alignment['btn_alignment'] ) && $alignment['btn_alignment'] != '' ) {
						if ( $alignment['btn_alignment'] != '' ) {
							$before_btn = '<div class="' . $alignment['btn_alignment'] . '">';
							$after_btn  = '</div>';
						}
					}

					// btn size
					$button_size = $btn['size'];
					if ( $button_size['selected'] == 'custom' ) {
						$btn_size_style = 'width:' . (int) esc_attr( $button_size['custom']['width'] ) . 'px;height:' . (int) esc_attr( $button_size['custom']['height'] ) . 'px; line-height:' . (int) esc_attr( $button_size['custom']['height'] ) . 'px;';
						$btn_size_class = '';
					} else {
						$btn_size_class = $button_size['selected'];
						$btn_size_style = '';
					}

					$style = 'fw-btn-1';
					if(isset($btn['style']['selected'])){
						$style = $btn['style']['selected'];
					}

					// get icon type
					$icon_type = $btn['icon_type'];
					$icon      = '';

					if ( $icon_type['tab_icon'] == 'icon-class' ) {
						if(!empty($icon_type['icon-class']['icon_class'])) {
							// get icon size
							$icon_size = ! empty( $btn['icon_size'] ) ? 'style="font-size:' . esc_attr( (int) $btn['icon_size'] ) . 'px;"' : '';
							$icon = '<i class="' . $btn['icon_position'] . ' ' . $icon_type['icon-class']['icon_class'] . '" ' . $icon_size . '></i>';
						}
					} else {
						if ( ! empty( $icon_type['upload-icon']['upload-custom-img']['url'] ) ) {
							// get image size
							$icon_size = ! empty( $btn['icon_size'] ) ? 'style="width:' . esc_attr( (int) $btn['icon_size'] ) . 'px;"' : '';
							$icon      = '<img class="' . $btn['icon_position'] . '" src="' . esc_url( the_core_change_original_link_with_cdn($icon_type['upload-icon']['upload-custom-img']['url']) ) . '" ' . $icon_size . ' />';
						}
					}

					$a_class = '';
					if (strpos($btn['link'], "#") !== false && strlen($btn['link']) > 1) {
						$a_class = 'anchor';
					}

					$data_attr_btn = '';
					if( isset($btn['open_in_popup']['selected']) && $btn['open_in_popup']['selected'] == 'yes' ) {
						$data_attr_btn .= ' data-rel="prettyPhoto"';
					}

					if( isset($btn['nofollow']) && 'yes' == $btn['nofollow'] ) {
						$data_attr_btn .= ' rel="nofollow"';
					}
					?>
					<?php echo ($before_btn); ?>
					<a href="<?php echo esc_url( $btn['link'] ); ?>" target="<?php echo esc_attr( $btn['target'] ); ?>" class="fw-btn <?php echo ( $btn['full_width']['selected_type'] != 'default' ) ? esc_attr( $btn['full_width']['selected_type'] ) : ''; ?> <?php echo esc_attr( $btn_size_class );?> <?php the_core_button_class($style ); ?> <?php echo esc_attr($a_class); ?>" style="<?php echo ($btn_size_style); ?>" <?php echo ($data_attr_btn); ?>>
						<span>
							<?php if ( $btn['icon_position'] == 'pull-right-icon' ) : ?>
								<?php echo the_core_translate( esc_attr( $btn['label'] ) ); echo ($icon); ?>
							<?php else : ?>
								<?php echo ($icon); echo the_core_translate( esc_attr( $btn['label'] ) ); ?>
							<?php endif; ?>
						</span>
					</a>
					<?php echo ($after_btn); ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>