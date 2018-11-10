<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$image_box  = $atts['image_type_picker'];
$title      = $atts['box_title'];
$desc       = $atts['box_desc'];
$subtitle   = $atts['box_subtitle'];
$text_align = $atts['desc_align'];
$h_title    = (isset( $atts['heading']['selected'] ) && !empty($atts['heading']['selected']) ) ? $atts['heading']['selected'] : 'h3';
$h_subtitle = isset( $atts['heading_subtitle'] ) ? $atts['heading_subtitle'] : 'h4';

//content padding
$padding_top = $padding_bottom = $padding_right = $padding_left = '';
if ( ! empty( $atts['padding_top'] ) || ! empty( $atts['padding_right'] ) || ! empty( $atts['padding_bottom'] ) || ! empty( $atts['padding_left'] ) ) {
	$padding_top    = ! empty( $atts['padding_top'] ) ? 'padding-top:' . (int) $atts['padding_top'] . 'px;' : '';
	$padding_bottom = ! empty( $atts['padding_bottom'] ) ? 'padding-bottom:' . (int) $atts['padding_bottom'] . 'px;' : '';
	$padding_right  = ! empty( $atts['padding_right'] ) ? 'padding-right:' . (int) $atts['padding_right'] . 'px;' : '';
	$padding_left   = ! empty( $atts['padding_left'] ) ? 'padding-left:' . (int) $atts['padding_left'] . 'px;' : '';
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

if ( $image_box['icon-box-type'] == 'fw-imagebox-1' ) :
	$bg_color = $border_color = $the_core_overlay_style = '';

	// bg class
	$bg_on = $image_box['fw-imagebox-1']['image-box-bg']['bg-color-box'];
	// boxed class
	$boxed = $image_box['fw-imagebox-1']['image-in-box']['image_boxed'];

	if ( $bg_on == 'bg-on' ) {
		$the_core_opacity = isset( $image_box['fw-imagebox-1']['image-box-bg']['bg-on']['bg-opacity'] ) ? (int) $image_box['fw-imagebox-1']['image-box-bg']['bg-on']['bg-opacity'] / 100 : '100';
		if ( ! empty( $bg_on ) && isset( $image_box['fw-imagebox-1']['image-box-bg']['bg-on']['bg-color']['color'] ) && $image_box['fw-imagebox-1']['image-box-bg']['bg-on']['bg-color']['id'] == 'fw-custom' ) {
			if ( ! empty( $image_box['fw-imagebox-1']['image-box-bg']['bg-on']['bg-color']['color'] ) ) {
				$the_core_overlay_style = '<div class="fw-main-row-overlay" style="background-color: ' . $image_box['fw-imagebox-1']['image-box-bg']['bg-on']['bg-color']['color'] . '; opacity: ' . $the_core_opacity . ';"></div>';
			}
		} elseif ( isset( $image_box['fw-imagebox-1']['image-box-bg']['bg-on']['bg-color']['id'] ) ) {
			$the_core_overlay_style = '<div class="fw-main-row-overlay fw_theme_bg_' . $image_box['fw-imagebox-1']['image-box-bg']['bg-on']['bg-color']['id'] . '" style="opacity: ' . $the_core_opacity . ';"></div>';
		}
	}

	// get border color
	if ( ! empty( $boxed ) ) {
		$border_size = ! empty( $image_box['fw-imagebox-1']['image-in-box']['imagebox-boxed']['border_size'] ) ? $image_box['fw-imagebox-1']['image-in-box']['imagebox-boxed']['border_size'] . 'px' : '1px';

		if ( isset( $image_box['fw-imagebox-1']['image-in-box']['imagebox-boxed']['boxed-color']['id'] ) && $image_box['fw-imagebox-1']['image-in-box']['imagebox-boxed']['boxed-color']['id'] == 'fw-custom' ) {
			if ( $image_box['fw-imagebox-1']['image-in-box']['imagebox-boxed']['boxed-color']['color'] != '' ) {
				if ( ! empty( $image_box['fw-imagebox-1']['image-in-box']['imagebox-boxed']['boxed-color']['color'] ) ) {
					$border_color = 'border: ' . $border_size . ' solid ' . $image_box['fw-imagebox-1']['image-in-box']['imagebox-boxed']['boxed-color']['color'];
				}
			}
		} elseif ( isset( $image_box['fw-imagebox-1']['image-in-box']['imagebox-boxed']['boxed-color']['id'] ) ) {
			$atts['class'] .= ' fw_theme_border_only_' . $image_box['fw-imagebox-1']['image-in-box']['imagebox-boxed']['boxed-color']['id'];
			$border_color = 'border-width:' . $border_size . '; border-style:solid;';
		}
	}

	$style = '';
	if ( ! empty( $border_color ) && ! empty( $bg_color ) ) {
		$style = $bg_color . '; ' . $border_color.';';
	} elseif ( ! empty( $border_color ) && empty( $bg_color ) ) {
		$style = $border_color;
	} elseif ( empty( $border_color ) && ! empty( $bg_color ) ) {
		$style = $bg_color.';';
	}

	$image_size  = $atts['image_type_picker']['fw-imagebox-1']['image_size'];
	if ( $image_size['select_size'] == 'custom' ) {
		$image_style    = 'width: ' . (int) $image_size['custom']['width'] . 'px;';
		$img_attr = array( 'width' => (int) $image_size['custom']['width'] );
		$position = $image_size['custom']['position'];
	} else {
		$image_style    = 'width: 100%;';
		$img_attr = array();
		$position = '';
	}

	$ratio = 'fw-ratio-16-9';
	if( isset($image_box['fw-imagebox-1']['ratio']) ){
		$ratio = $image_box['fw-imagebox-1']['ratio'];
	}

	$args  = array(
		'img_attr' => array( 'class' => 'attachment-post-thumbnail' ),
		'size'     => 'full',
		'return'   => true,
		'img_attr' => $img_attr,
		'ratio'    => $ratio
	);
	$image = the_core_image( $image_box['fw-imagebox-1']['upload-custom-img'], $args );
	$ratio = $image['ratio'];
	?>
	<div class="fw-imagebox clearfix fw-imagebox-1 tf-sh-<?php echo esc_attr( $atts['unique_id'] ); ?> <?php echo esc_attr( $text_align ) . ' ' . esc_attr( $bg_on ) . ' ' . esc_attr( $boxed ) . ' ' . esc_attr( $atts['class'] ); ?>" <?php echo ($data_animation); ?> style="<?php echo ($style); ?>">
		<?php echo ($the_core_overlay_style); ?>
		<?php if ( ! empty( $image_box['fw-imagebox-1']['upload-custom-img'] ) ): ?>
			<?php $overlay_class = ($image_box['fw-imagebox-1']['image_popup'] == 'yes') ? 'fw-imagebox-overlay-yes fw-overlay-1' : ''; ?>
			<div class="fw-block-image-parent <?php echo esc_attr( $position ); ?> <?php echo esc_attr($overlay_class); ?>" style="<?php echo ($image_style); ?>">
				<?php if ( $image_box['fw-imagebox-1']['image_popup'] == 'no' ): ?>
					<div class="fw-block-image-child <?php echo esc_attr($ratio); ?>">
						<?php echo ($image['img']); ?>
					</div>
				<?php else: ?>
					<a class="fw-imagebox-image fw-block-image-child <?php echo esc_attr($ratio); ?>" href="<?php echo esc_url( the_core_change_original_link_with_cdn($image_box['fw-imagebox-1']['upload-custom-img']['url']) ); ?>" data-rel="prettyPhoto" title="" rel="prettyPhoto">
						<?php echo ($image['img']); ?>
						<div class="fw-block-image-overlay">
							<div class="fw-itable">
								<div class="fw-icell">
									<i class="fw-icon-zoom"></i>
								</div>
							</div>
						</div>
					</a>
				<?php endif; ?>
			</div>
		<?php endif; ?>

	<div class="fw-imagebox-aside" style="<?php echo ($padding_top . $padding_bottom . $padding_left . $padding_right); ?>">
		<?php if ( !empty( $title ) || !empty( $subtitle ) ) : ?>
			<div class="fw-imagebox-title-wrap">
				<?php if ( ! empty( $title ) ): ?>
					<<?php echo ($h_title); ?> class="fw-imagebox-title"><?php echo the_core_translate( esc_attr( $title ) ); ?></<?php echo ($h_title); ?>>
				<?php endif; ?>

				<?php if ( ! empty( $subtitle ) ): ?>
					<<?php echo ($h_subtitle); ?> class="fw-imagebox-subtitle"><?php echo the_core_translate( esc_attr( $subtitle ) ); ?></<?php echo ($h_subtitle); ?>>
				<?php endif; ?>
			</div>
		<?php endif; ?>

		<?php if ( ! empty( $desc ) && $desc != '<p></p>' ) : ?>
			<div class="fw-imagebox-text">
				<?php echo do_shortcode( the_core_translate( esc_textarea( $desc ) ) ); ?>
			</div>
		<?php endif; ?>

	<?php if ( $atts['show_bnt'] == 'yes' ) :
	$before_btn = $after_btn = $icon = '';
	// btn settings array
	$btn = $atts['button_options'];

	//btn size
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

	//get icon type
	$icon_type = $btn['icon_type'];
	$icon      = '';

	if ( $icon_type['tab_icon'] == 'icon-class' ) {
		if(!empty($icon_type['icon-class']['icon_class'])) {
			//get icon size
			$icon_size = ! empty( $btn['icon_size'] ) ? 'style="font-size:' . esc_attr( (int) $btn['icon_size'] ) . 'px;"' : '';
			$icon      = '<i class="' . $btn['icon_position'] . ' ' . $icon_type['icon-class']['icon_class'] . '" ' . $icon_size . '></i>';
		}
	} else {
		if ( ! empty( $icon_type['upload-icon']['upload-custom-img']['url'] ) ) {
			//get image size
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

	if ( isset( $btn['nofollow'] ) && 'yes' == $btn['nofollow'] ) {
		$data_attr_btn .= ' rel="nofollow"';
	}
	?>
	<div class="fw-imagebox-btn <?php echo ( $btn['full_width']['selected_type'] != 'full_width' ) ? esc_attr( $btn['full_width']['default']['btn_alignment'] ) : ''; ?>">
		<a href="<?php echo esc_url( $btn['link'] ); ?>" target="<?php echo esc_attr( $btn['target'] ); ?>" class="fw-btn <?php echo ( $btn['full_width']['selected_type'] != 'default' ) ? esc_attr( $btn['full_width']['selected_type'] ) : ''; ?> <?php echo esc_attr( $btn_size_class );?> <?php the_core_button_class( $style ); ?> <?php echo esc_attr($a_class); ?>" style="<?php echo ($btn_size_style); ?>" <?php echo ($data_attr_btn); ?>>
			<span>
				<?php if ( $btn['icon_position'] == 'pull-right-icon' ) : ?>
					<?php echo the_core_translate( esc_attr( $btn['label'] ) ); echo ($icon); ?>
				<?php else : ?>
					<?php echo ($icon); echo the_core_translate( esc_attr( $btn['label'] ) ); ?>
				<?php endif; ?>
			</span>
		</a>
	</div>
<?php endif; ?>
		</div>
	</div>
<?php else:
	$image = ( ! empty( $image_box['fw-imagebox-2']['upload-custom-img'] ) ) ? 'style="background-image: url(' . esc_url( the_core_change_original_link_with_cdn($image_box['fw-imagebox-2']['upload-custom-img']['url']) ) . ');"' : '';
	//image opacity color
	$the_core_overlay_style = '';
	$the_core_opacity = ! empty( $image_box['fw-imagebox-2']['opacity'] ) ? ( (int) $image_box['fw-imagebox-2']['opacity'] / 100 )  : '100';
	if ( isset( $image_box['fw-imagebox-2']['text-bg-color'] ) ) {
		if ( isset( $image_box['fw-imagebox-2']['text-bg-color']['id'] ) && $image_box['fw-imagebox-2']['text-bg-color']['id'] !== 'fw-custom' ) {
			$the_core_overlay_style = '<div class="fw-main-row-overlay fw_theme_bg_' . $image_box['fw-imagebox-2']['text-bg-color']['id'] . '" style="opacity: ' . $the_core_opacity . ';"></div>';
		} elseif ( isset( $image_box['fw-imagebox-2']['text-bg-color']['color'] ) && ! empty( $image_box['fw-imagebox-2']['text-bg-color']['color'] ) ) {
			if( !empty($image_box['fw-imagebox-2']['text-bg-color']['color']) ) {
				$the_core_overlay_style = '<div class="fw-main-row-overlay" style="background-color: ' . $image_box['fw-imagebox-2']['text-bg-color']['color'] . '; opacity: ' . $the_core_opacity . ';"></div>';
			}
		}
	}
	?>
	<div class="fw-imagebox clearfix fw-imagebox-2 tf-sh-<?php echo esc_attr( $atts['unique_id'] ); ?> <?php echo esc_attr( $text_align ); ?> <?php echo esc_attr( $atts['class'] ); ?>" <?php echo ($data_animation); ?> <?php echo ($image); ?>>
		<?php echo ($the_core_overlay_style); ?>
		<div class="fw-imagebox-aside" style="<?php echo ($padding_top . $padding_bottom . $padding_left . $padding_right); ?>">
		<?php if ( !empty( $title ) || !empty( $subtitle ) ) : ?>
			<div class="fw-imagebox-title-wrap">
				<?php if ( ! empty( $title ) ): ?>
					<<?php echo ($h_title); ?> class="fw-imagebox-title"><?php echo the_core_translate( esc_attr( $title ) ); ?></<?php echo ($h_title); ?>>
				<?php endif; ?>

				<?php if ( ! empty( $subtitle ) ): ?>
					<<?php echo ($h_subtitle); ?> class="fw-imagebox-subtitle"><?php echo the_core_translate( esc_attr( $subtitle ) ); ?></<?php echo ($h_subtitle); ?>>
				<?php endif; ?>
			</div>
		<?php endif; ?>

		<?php if ( ! empty( $desc ) ): ?>
			<div class="fw-imagebox-text">
				<?php echo the_core_translate( esc_textarea( $desc ) ); ?>
			</div>
		<?php endif; ?>

	<?php if ( $atts['show_bnt'] == 'yes' ) :
		$before_btn = $after_btn = $icon = '';
		//btn settings array
		$btn = $atts['button_options'];

		//btn size
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

		//get icon type
		$icon_type  = $btn['icon_type'];

		if ( $icon_type['tab_icon'] == 'icon-class' && !empty( $icon_type['icon-class']['icon_class'] ) ) {
			//get icon size
			$icon_size = ! empty( $btn['icon_size'] ) ? 'style="font-size:' . esc_attr( (int) $btn['icon_size'] ) . 'px;"' : '';
			$icon      = '<i class="' . $btn['icon_position'] . ' ' . $icon_type['icon-class']['icon_class'] . '" ' . $icon_size . '></i>';
		} else {
			if ( ! empty( $icon_type['upload-icon']['upload-custom-img']['url'] ) ) {
				//get image size
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
		?>
		<div class="fw-imagebox-btn <?php echo ( $btn['full_width']['selected_type'] != 'full_width' ) ? esc_attr( $btn['full_width']['default']['btn_alignment'] ) : ''; ?>">
			<a href="<?php echo esc_url( $btn['link'] ); ?>" target="<?php echo esc_attr( $btn['target'] ); ?>" class="fw-btn <?php echo ( $btn['full_width']['selected_type'] != 'default' ) ? esc_attr( $btn['full_width']['selected_type'] ) : ''; ?> <?php echo esc_attr( $btn_size_class );?> <?php the_core_button_class( $style ); ?> <?php echo esc_attr($a_class); ?>" style="<?php echo ($btn_size_style); ?>" <?php echo ($data_attr_btn); ?>>
				<span>
					<?php if ( $btn['icon_position'] == 'pull-right-icon' ) : ?>
						<?php echo the_core_translate( esc_attr( $btn['label'] ) ); echo ($icon); ?>
					<?php else : ?>
						<?php echo ($icon); echo the_core_translate( esc_attr( $btn['label'] ) ); ?>
					<?php endif; ?>
				</span>
			</a>
		</div>
	<?php endif; ?>
		</div>
	</div>
<?php endif; ?>