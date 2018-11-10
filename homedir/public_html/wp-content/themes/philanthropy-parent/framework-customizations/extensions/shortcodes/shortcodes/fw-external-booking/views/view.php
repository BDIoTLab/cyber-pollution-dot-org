<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$class = '';
// for desktop
if ( isset( $atts['responsive']['desktop_display']['selected'] ) && $atts['responsive']['desktop_display']['selected'] == 'no' ) {
	$class .= ' fw-desktop-hide-element';
}

// for tablet landscape
if ( isset( $atts['responsive']['tablet_landscape_display']['selected'] ) && $atts['responsive']['tablet_landscape_display']['selected'] == 'no' ) {
	$class .= ' fw-tablet-landscape-hide-element';
}

// for tablet portrait
if ( isset( $atts['responsive']['tablet_display']['selected'] ) && $atts['responsive']['tablet_display']['selected'] == 'no' ) {
	$class .= ' fw-tablet-hide-element';
}

// for display on smartphone
if ( isset( $atts['responsive']['smartphone_display']['selected'] ) && $atts['responsive']['smartphone_display']['selected'] == 'no' ) {
	$class .= ' fw-mobile-hide-element';
}

/*----------------Animation option--------------*/
$data_animation = '';
if ( isset( $atts['animation_group']['selected'] ) ) {
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
$platform  = $atts['platform']['selected'];
$final_url = the_core_check_external_booking_url( $atts['platform'][$platform]['url'], $platform );

// horizontal or vertical style
$class .= $atts['style'];

// separator
$separator = '';
if( $atts['separator_group']['selected'] == 'yes' ) {
	$separator = '<span class="fw-external-booking-separator"></span>';
	$class .= ' fw-external-booking-separator-enable';
}
?>
<div class="fw-external-booking <?php echo esc_attr($atts['class']); ?> tf-sh-<?php echo esc_attr( $atts['unique_id'] ); ?> <?php echo esc_attr($class); ?>" <?php echo ($data_animation); ?>>
	<div class="fw-external-booking-form">
		<div class="fw-external-booking-form-wrap">
			<div class="fw-external-booking-form-item">
				<label for="fw-external-booking-in"><?php esc_html_e('Check In', 'the-core'); ?></label>
				<div class="fw-external-booking-insert-data">
					<span class="external-booking-data"></span>
					<span class="external-booking-month"></span>
					<span class="external-booking-year"></span>
					<input name="fw-external-booking-in" type="text" class="fw-external-booking-input fw-external-booking-in">
				</div>
				<?php echo ($separator); ?>
			</div>

			<div class="fw-external-booking-form-item">
				<label for="fw-external-booking-out"><?php esc_html_e('Check Out', 'the-core'); ?></label>
				<div class="fw-external-booking-insert-data">
					<span class="external-booking-data"></span>
					<span class="external-booking-month"></span>
					<span class="external-booking-year"></span>
					<input name="fw-external-booking-out" type="text" class="fw-external-booking-input fw-external-booking-out ">
				</div>
				<?php echo ($separator); ?>
			</div>

			<?php if( $atts['rooms']['selected'] == 'yes' ) : ?>
				<div class="fw-external-booking-form-item">
					<label for="fw-external-booking-rooms"><?php esc_html_e('Rooms', 'the-core'); ?></label>
					<select name="fw-external-booking-rooms" class="fw-external-booking-rooms fw-nr-family-members-booking">
						<?php for($i=1; $i<=9; $i++) : ?>
							<option value="<?php echo esc_attr($i); ?>"><?php echo esc_attr($i); ?></option>
						<?php endfor; ?>
					</select>
					<?php echo ($separator); ?>
				</div>
			<?php endif; ?>

			<?php if( $atts['adults']['selected'] == 'yes' ) : ?>
				<div class="fw-external-booking-form-item">
					<label for="fw-external-booking-adults"><?php esc_html_e('Adults', 'the-core'); ?></label>
					<select name="fw-external-booking-adults" class="fw-external-booking-adults fw-nr-family-members-booking">
						<?php for($i=1; $i<=9; $i++) : ?>
							<option value="<?php echo esc_attr($i); ?>"><?php echo esc_attr($i); ?></option>
						<?php endfor; ?>
					</select>
					<?php echo ($separator); ?>
				</div>
			<?php endif; ?>

			<?php if( $atts['children']['selected'] == 'yes' ) : ?>
				<div class="fw-external-booking-form-item">
					<label for="fw-external-booking-children"><?php esc_html_e('Children', 'the-core'); ?></label>
					<select name="fw-external-booking-children" class="fw-external-booking-children fw-nr-family-members-booking">
						<?php for($i=0; $i<=9; $i++) : ?>
							<option value="<?php echo esc_attr($i); ?>"><?php echo esc_attr($i); ?></option>
						<?php endfor; ?>
					</select>
					<?php echo ($separator); ?>
				</div>
			<?php endif; ?>
			<?php
			$before_btn = $after_btn = $icon = '';
			// btn settings array
			$btn = $atts['button_options'];

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
			?>
			<?php echo ($before_btn); ?>
			<a href="<?php echo esc_url($final_url); ?>" target="_blank" data-url="<?php echo esc_url($final_url); ?>" data-source="<?php echo esc_attr( $platform ); ?>" class="fw-external-booking-url fw-btn <?php echo ( $btn['full_width']['selected_type'] != 'default' ) ? esc_attr( $btn['full_width']['selected_type'] ) : ''; ?> <?php echo esc_attr( $btn_size_class );?> <?php the_core_button_class($style ); ?>" style="<?php echo ($btn_size_style); ?>">
			<span>
				<?php if ( $btn['icon_position'] == 'pull-right-icon' ) : ?>
					<?php echo the_core_translate( esc_attr( $btn['label'] ) ); echo ($icon); ?>
				<?php else : ?>
					<?php echo ($icon); echo the_core_translate( esc_attr( $btn['label'] ) ); ?>
				<?php endif; ?>
			</span>
			</a>
			<?php echo ($after_btn); ?>
		</div>
	</div>
</div>