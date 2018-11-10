<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$title            = $atts['box_title'];
$desc             = $atts['box_desc'];
$icon_type_picker = $atts['icon_type_picker']['icon-box-type'];
$h                = (isset( $atts['heading']['selected'] ) && !empty($atts['heading']['selected']) ) ? $atts['heading']['selected'] : 'h4';
// get icon position
$icon_position    = '';
if( $icon_type_picker == 'fw-iconbox-3' ) {
	$icon_position = $atts['icon_type_picker']['fw-iconbox-3']['icon-position'];
}
elseif( $icon_type_picker == 'fw-iconbox-4' ) {
	$icon_position = $atts['icon_type_picker']['fw-iconbox-4']['icon_position'];
}
// check icon type array
$icon_type = $atts['icon_type'];
// get icon type image class
$icon_img_class = $icon_type['icon-box-img'] == 'icon-class' ? '' : 'fw-iconbox-image-type';

$i_color = $i_class = $extra_class = $icon_bg = $icon_bg_color = '';
if ( ( $icon_img_class == 'fw-iconbox-image-type' ) ) {
	$icon_bg_circle = $icon_type['upload-icon']['rounded'];
} else {
	$icon_bg        = $icon_type['icon-class']['icon-bg-type']['icon-box-img'];
	$icon_bg_circle = $icon_type['icon-class']['icon-bg-type']['icon-box-img'];
	$icon_bg_color  = isset( $icon_type['icon-class']['icon-bg-type'][ $icon_bg_circle ] ) ? $icon_type['icon-class']['icon-bg-type'][ $icon_bg_circle ]['bg-color']['id'] : '';
}

// get icon bg class
$icon_bg_class = ( empty( $icon_bg ) || $icon_bg == 'bg-none' ) ? '' : 'bg-on';

if ( $icon_bg_color == 'fw-custom' && ! empty( $icon_type['icon-class']['icon-bg-type'][ $icon_bg_circle ]['bg-color']['color'] ) ) {
	$icon_bg_color = 'background-color:' . $icon_type['icon-class']['icon-bg-type'][ $icon_bg_circle ]['bg-color']['color'].';';
} else {
	$icon_bg_color = '';
	if ( isset( $icon_type['icon-class']['icon-bg-type'][ $icon_bg_circle ]['bg-color']['id'] ) ) {
		$extra_class .= ' fw_theme_bg_' . $icon_type['icon-class']['icon-bg-type'][ $icon_bg_circle ]['bg-color']['id'];
	}
}

// only for font awesome icon
if ( $icon_img_class != 'fw-iconbox-image-type' ) {
	if ( $icon_type['icon-class']['icon-color']['id'] == 'fw-custom' ) {
		if ( ! empty( $icon_type['icon-class']['icon-color']['color'] ) ) {
			$i_color = 'color:' . $icon_type['icon-class']['icon-color']['color'] . ';';
		}
	} else {
		$i_class .= ' fw_theme_text_' . $icon_type['icon-class']['icon-color']['id'];
	}
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
?>
<div class="fw-iconbox clearfix tf-sh-<?php echo esc_attr( $atts['unique_id'] ); ?> <?php echo esc_attr( $icon_type_picker ) . ' ' . esc_attr( $icon_position ) . ' ' . esc_attr( $icon_img_class ) . ' ' . esc_attr( $icon_bg_class ) . ' ' . esc_attr( $icon_bg_circle ) . ' ' . esc_attr( $atts['class'] ); ?>" <?php echo ($data_animation); ?>>
	<div class="fw-iconbox-image <?php echo the_core_translate( esc_attr( $extra_class ) ); ?>" style="<?php echo ($icon_bg_color); ?>">
		<?php if ( $icon_img_class == 'fw-iconbox-image-type' ) : ?>
			<?php if ( ! empty( $icon_type['upload-icon']['upload-custom-img'] ) ): ?>
				<img src="<?php echo esc_url( the_core_change_original_link_with_cdn($icon_type['upload-icon']['upload-custom-img']['url']) ); ?>" alt="" />
			<?php endif; ?>
		<?php else: ?>
			<i class="<?php echo esc_attr($icon_type['icon-class']['icon_class']); echo esc_attr($i_class); ?>" style="<?php echo ($i_color); ?>"></i>
		<?php endif; ?>
	</div>

	<div class="fw-iconbox-aside">
		<?php if ( ! empty( $title ) ) : ?>
			<div class="fw-iconbox-title">
				<<?php echo ($h); ?>><?php echo the_core_translate( esc_attr( $title ) ); ?></<?php echo ($h); ?>>
			</div>
		<?php endif; ?>

		<?php if ( ! empty( $desc ) && $desc != '<p></p>' ) : ?>
			<div class="fw-iconbox-text">
				<?php echo do_shortcode( the_core_translate( esc_textarea( $desc ) ) ); ?>
			</div>
		<?php endif; ?>

		<?php if ( $atts['show_bnt'] == 'yes' ) :
			$before_btn = $after_btn = $icon = '';
			// btn settings array
			$btn = $atts['button_options'];

			//btn alignment
			$alignment = ( isset( $btn['full_width'] ) && $btn['full_width']['selected_type'] == 'default' ) ? $btn['full_width']['default'] : '';
			if ( isset( $alignment['btn_alignment'] ) && $alignment['btn_alignment'] != '' ) {
				if ( $alignment['btn_alignment'] != '' ) {
					$before_btn = '<div class="' . $alignment['btn_alignment'] . '">';
					$after_btn  = '</div>';
				}
			}

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
					$icon = '<i class="' . $btn['icon_position'] . ' ' . $icon_type['icon-class']['icon_class'] . '" ' . $icon_size . '></i>';
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