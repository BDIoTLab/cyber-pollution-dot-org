<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * @var string $submit_button_text
 * @var string $form_id
 */

$btn = fw_ext_contact_forms_get_option( $form_id, 'button_options' );
?>
<div class="fw-row">
	<?php if( !empty($btn) ) :
		$button_alignment = $icon = '';

		if( isset($btn['full_width']['default']['btn_alignment']) ){
			$button_alignment = $btn['full_width']['default']['btn_alignment'];
		}

		$style = 'fw-btn-1';
		if(isset($btn['style']['selected'])){
			$style = $btn['style']['selected'];
		}

		//btn size
		$button_size = $btn['size'];
		if ( $button_size['selected'] == 'custom' ) {
			$btn_size_style = 'width:' . (int) esc_attr( $button_size['custom']['width'] ) . 'px;height:' . (int) esc_attr( $button_size['custom']['height'] ) . 'px;';
			$btn_size_class = '';
		} else {
			$btn_size_class = $button_size['selected'];
			$btn_size_style = '';
		}

		//get icon type
		$icon_type = $btn['icon_type'];
        $icon      = '';

		if ( $icon_type['tab_icon'] == 'icon-class' ) {
			//get icon size
			$icon_size = ! empty( $btn['icon_size'] ) ? 'style="font-size:' . esc_attr( (int) $btn['icon_size'] ) . 'px;"' : '';
			if( !empty($icon_type['icon-class']['icon_class']) ) $icon = '<i class="' . $btn['icon_position'] . ' ' . $icon_type['icon-class']['icon_class'] . '" ' . $icon_size . '></i>';
		} else {
			if ( ! empty( $icon_type['upload-icon']['upload-custom-img']['url'] ) ) {
				//get image size
				$icon_size = ! empty( $btn['icon_size'] ) ? 'style="width:' . esc_attr( (int) $btn['icon_size'] ) . 'px;"' : '';
				if( !empty($icon_type['upload-icon']['upload-custom-img']['url']) ) $icon      = '<img class="' . $btn['icon_position'] . '" src="' . esc_url( the_core_change_original_link_with_cdn( $icon_type['upload-icon']['upload-custom-img']['url'] ) ) . '" ' . $icon_size . ' />';
			}
		}
		?>
		<div class="fw-col-sm-12 field-submit <?php echo esc_attr($button_alignment); ?>">
			<button type="submit" class="fw-btn <?php echo ( $btn['full_width']['selected_type'] != 'default' ) ? esc_attr( $btn['full_width']['selected_type'] ) : ''; ?> <?php echo esc_attr($btn_size_class); ?> <?php the_core_button_class( $style ); ?>" style="<?php echo esc_attr($btn_size_style); ?>">
				<span>
					<?php if ( $btn['icon_position'] == 'pull-right-icon' ) : ?>
						<?php echo the_core_translate( esc_attr( $btn['label'] ) ); echo ($icon); ?>
					<?php else: ?>
						<?php echo ($icon); echo the_core_translate( esc_attr( $btn['label'] ) ); ?>
					<?php endif; ?>
				</span>
			</button>
		</div>
	<?php else: ?>
		<div class="fw-col-sm-12 field-submit">
			<button type="submit" class="<?php the_core_button_class( 'send_contact' ); ?>"><?php echo esc_attr( $submit_button_text ) ?></button>
		</div>
	<?php endif; ?>
</div>