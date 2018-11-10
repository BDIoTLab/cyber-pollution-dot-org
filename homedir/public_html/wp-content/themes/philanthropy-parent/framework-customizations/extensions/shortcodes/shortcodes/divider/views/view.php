<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

if ( $atts['divider_size']['size'] == 'custom' ) {
	$size           = '';
	$custom_spacing = 'padding-top:' . (int) $atts['divider_size']['custom']['margin_top'] . 'px;' . ' margin-bottom:' . (int) $atts['divider_size']['custom']['margin_bottom'] . 'px;';
} else {
	$size           = $atts['divider_size']['size'];
	$custom_spacing = '';
}

$bg_color = $link_id = $border_class = '';
if ( isset( $atts['bg_color']['id'] ) && $atts['bg_color']['id'] == 'fw-custom' && ! empty( $atts['bg_color']['color'] ) ) {
	$bg_color = 'border-color:' . $atts['bg_color']['color'] . ';';
} elseif ( isset( $atts['bg_color']['id'] ) ) {
	$border_class .= ' fw_theme_border_only_' . $atts['bg_color']['id'];
}

if ( $atts['link_id'] != '' ) {
	$link_id = 'id="' . esc_attr($atts['link_id']) . '"';
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

// divider alignment
if( isset($atts['alignment']) ){
	$atts['class'] .= ' '.esc_attr($atts['alignment']);
}

if ( $atts['special_divider']['selected_value'] == 'text' || $atts['special_divider']['selected_value'] == 'icon' || $atts['special_divider']['selected_value'] == 'custom' ) :
	if ( $atts['width']['selected'] == 'custom' ) {
		$width = 'width:' . esc_attr( $atts['width']['custom']['custom_width'] ) . 'px;';
	} elseif ( $atts['width']['selected'] == '100' ) {
		$width = 'width: auto;';
		if ( $atts['type'] != 'fw-divider-space' ) {
			$atts['class'] .= ' fw-divider-full-width';
		}
	} else {
		$width = 'width:' . esc_attr( $atts['width']['selected'] ) . '%;';
	}
	$divider_size = $special_bg_color = $divider_icon_class = $divider_bg_class = $text_icon_color = $divider_inner_class = $divider_title_class = '';
	$type         = $atts['special_divider']['selected_value'];
	$position     = $atts['special_divider'][ $type ]['position'];
	$show_bg      = $atts['special_divider'][ $type ]['show_bg'];

	if ( isset( $atts['bg_color']['id'] ) != '' && $atts['bg_color']['id'] == 'fw-custom' && $show_bg == 'yes' && ! empty( $atts['bg_color']['color'] ) ) {
		$special_bg_color = 'background-color:' . $atts['bg_color']['color'] . ';';
		$divider_bg_class = 'divider-bg-on';
	} elseif ( isset( $atts['bg_color']['id'] ) && $show_bg == 'yes' ) {
		$divider_inner_class .= ' fw_theme_bg_' . $atts['bg_color']['id'];
		$divider_bg_class = 'divider-bg-on';
	}

	if ( $type == 'icon' ) {
		$divider_icon_class = 'fw-divider-icon';
	}
	elseif($type == 'custom' ){
		$divider_icon_class = 'fw-divider-icon-upload';
	}

	if ( isset( $atts['special_divider'][ $type ]['color']['id'] ) && $atts['special_divider'][ $type ]['color']['id'] == 'fw-custom' && ! empty( $atts['special_divider'][ $type ]['color']['color'] ) ) {
		$text_icon_color = 'color:' . $atts['special_divider'][ $type ]['color']['color'] . ';';
	} elseif ( isset( $atts['special_divider'][ $type ]['color']['id'] ) ) {
		$divider_title_class = ' fw_theme_text_' . $atts['special_divider'][ $type ]['color']['id'];
	}
	?>
	<div <?php echo ($link_id); ?> class="fw-divider fw-divider-special tf-sh-<?php echo esc_attr( $atts['unique_id'] ); ?> <?php echo esc_attr( $atts['class'] ); ?> <?php echo esc_attr( $atts['type'] ); ?> <?php echo esc_attr( $size ); ?> <?php echo esc_attr( $position ); ?> <?php echo esc_attr( $divider_size ); ?> <?php echo esc_attr($divider_bg_class); ?> <?php echo esc_attr($divider_icon_class); ?>" <?php echo ($data_animation); ?> <?php echo 'style="' . $width . ' ' . $custom_spacing . '"'; ?> >
		<div class="fw-divider-inner <?php echo esc_attr( $divider_inner_class ); ?>" style="<?php echo ($special_bg_color); ?>">
			<span class="fw-divider-holder fw-divider-left <?php echo esc_attr( $border_class ); ?>" style="<?php echo ($bg_color); ?>"></span>
			<span class="fw-divider-title <?php echo esc_attr( $divider_title_class ); ?>" style="<?php echo ($text_icon_color); ?>">
				<?php if ( $type == 'icon' ) : ?>
					<?php $icon_size = ! empty( $atts['special_divider']['icon']['icon_size'] ) ? 'style="font-size:' . esc_attr( (int) $atts['special_divider']['icon']['icon_size'] ) . 'px;"' : ''; ?>
					<i class="<?php echo esc_attr($atts['special_divider']['icon']['icon_class']); ?>" <?php echo ($icon_size); ?>></i>
				<?php elseif ( $type == 'custom' ) : ?>
					<?php $icon_size = ! empty( $atts['special_divider']['custom']['icon_size'] ) ? 'style="width:' . esc_attr( (int) $atts['special_divider']['custom']['icon_size'] ) . 'px;"' : ''; ?>
					<?php if ( ! empty( $atts['special_divider']['custom']['upload_icon'] ) ) : ?>
						<img src="<?php echo esc_url( the_core_change_original_link_with_cdn($atts['special_divider']['custom']['upload_icon']['url']) ); ?>" alt="" <?php echo ($icon_size); ?> />
					<?php endif; ?>
				<?php else : ?>
					<?php echo the_core_translate( esc_attr( $atts['special_divider']['text']['title_text'] ) ); ?>
				<?php endif; ?>
			</span>
			<span class="fw-divider-holder fw-divider-right <?php echo esc_attr( $border_class ); ?>" style="<?php echo ($bg_color); ?>"></span>
		</div>
	</div>
<?php else:

	if ( $atts['width']['selected'] == 'custom' ) {
		$width = 'width:' . esc_attr( $atts['width']['custom']['custom_width'] ) . 'px;';
	} elseif ( $atts['width']['selected'] == '100' ) {
		$width = 'width: auto;';
		$atts['class'] .= ' fw-divider-full-width';
	} else {
		$width = 'width:' . esc_attr( $atts['width']['selected'] ) . '%;';
	}

	if ( $atts['type'] == 'fw-divider-space' ) {
		$line_class = 'clearfix';
	} else {
		$line_class = 'fw-divider-line';
	} ?>
	<div <?php echo ($link_id); ?> class="fw-divider tf-sh-<?php echo esc_attr( $atts['unique_id'] ); ?> <?php echo esc_attr( $atts['class'] ); ?> <?php echo esc_attr( $atts['type'] ); ?> <?php echo esc_attr( $line_class ); ?> <?php echo esc_attr( $size ); ?> <?php echo esc_attr( $border_class ); ?>" <?php echo ($data_animation); ?> <?php echo 'style="' . $width . ' ' . esc_attr( $custom_spacing ) . ' ' . $bg_color . '"'; ?> ></div>
<?php endif; ?>