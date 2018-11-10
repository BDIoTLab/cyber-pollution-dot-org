<?php if (!defined('FW')) die('Forbidden');

$the_core_count = 0;
$reload_slider_id = uniqid( 'reload-slider-' );
$bg_style = '';
if(!empty($data['settings']['extra']['slider_bg'])) {
	$bg_style = 'style="background-image: url(' . the_core_change_original_link_with_cdn( $data['settings']['extra']['slider_bg']['url'] ) . ');"';
}
$interval = $data['settings']['extra']['slides_interval'];
$play = 'true';
if($interval == '0' || $interval == '') {
	$play = 'false';
	$interval = '0';
}

$args = array(
	'img_attr' => array( 'class' => 'attachment-post-thumbnail' ),
	'size'     => 'fw-theme-category-square-800',
	'return'   => true,
	'ratio'    => 'fw-ratio-1'
);

$unique_class = '';
if ( isset( $data['settings']['extra']['unique_id'] ) ){
	$unique_class = 'tf-sh-'.$data['settings']['extra']['unique_id'];
}

if( !empty($extra_data) ){
    // for desktop
    if( isset($extra_data['responsive']['desktop_display']['selected']) && $extra_data['responsive']['desktop_display']['selected'] == 'no' ) {
        $unique_class .= ' fw-desktop-hide-element';
    }

    // for tablet landscape
    if( isset($extra_data['responsive']['tablet_landscape_display']['selected']) && $extra_data['responsive']['tablet_landscape_display']['selected'] == 'no' ) {
        $unique_class .= ' fw-tablet-landscape-hide-element';
    }

    // for tablet portrait
	if( isset($extra_data['responsive']['tablet_display']['selected']) && $extra_data['responsive']['tablet_display']['selected'] == 'no' ) {
		$unique_class .= ' fw-tablet-hide-element';
	}

	// for display on smartphone
	if( isset($extra_data['responsive']['smartphone_display']['selected']) && $extra_data['responsive']['smartphone_display']['selected'] == 'no' ) {
		$unique_class .= ' fw-mobile-hide-element';
	}
}

// button options
$btn_size_style = $icon = '';
if ( $data['settings']['extra']['advanced_styling']['button_options']['icon_type']['tab_icon'] == 'icon-class' && ! empty( $data['settings']['extra']['advanced_styling']['button_options']['icon_type']['icon-class']['icon_class'] ) ) {
	$icon_size = ! empty( $data['settings']['extra']['advanced_styling']['button_options']['icon_size'] ) ? 'style="font-size:' . esc_attr( (int) $data['settings']['extra']['advanced_styling']['button_options']['icon_size'] ) . 'px;"' : '';
	$icon      = '<i class="' . $data['settings']['extra']['advanced_styling']['button_options']['icon_position'] . ' ' . $data['settings']['extra']['advanced_styling']['button_options']['icon_type']['icon-class']['icon_class'] . '" ' . $icon_size . '></i>';
} elseif ( $data['settings']['extra']['advanced_styling']['button_options']['icon_type']['tab_icon'] == 'upload-icon' && ! empty( $data['settings']['extra']['advanced_styling']['button_options']['icon_type']['upload-icon']['upload-custom-img'] ) ) {
	$icon_size = ! empty( $data['settings']['extra']['advanced_styling']['button_options']['icon_size'] ) ? 'style="width:' . esc_attr( (int) $data['settings']['extra']['advanced_styling']['button_options']['icon_size'] ) . 'px;"' : '';
	$icon      = '<img class="' . $data['settings']['extra']['advanced_styling']['button_options']['icon_position'] . '" src="' . the_core_change_original_link_with_cdn( $data['settings']['extra']['advanced_styling']['button_options']['icon_type']['upload-icon']['upload-custom-img']['url'] ) . '" ' . $icon_size . ' alt="" />';
}

$icon_position  = $data['settings']['extra']['advanced_styling']['button_options']['icon_position'];
$btn_size_class = $data['settings']['extra']['advanced_styling']['button_options']['size']['selected'];
if( $btn_size_class == 'custom' ){
	$btn_size_style = 'width: '.(int)$data['settings']['extra']['advanced_styling']['button_options']['size']['custom']['width'].'px; height: '.(int)$data['settings']['extra']['advanced_styling']['button_options']['size']['custom']['height'].'px; line-height: '.(int)$data['settings']['extra']['advanced_styling']['button_options']['size']['custom']['height'].'px';
}
$style = $data['settings']['extra']['advanced_styling']['button_options']['style']['selected'];

if (isset($data['slides'])) : ?>
	<div class="fw-reload-slider <?php echo esc_attr($unique_class); ?>">
		<ul class="slider-items" id="<?php echo esc_attr($reload_slider_id); ?>" data-play="<?php echo esc_attr($play); ?>" data-slides-interval="<?php echo esc_attr($interval); ?>">
			<?php foreach ($data['slides'] as $id => $slide): $the_core_count++; ?>
				<?php $image = the_core_image( $slide, $args ); ?>
				<li data-reload-slider="<?php echo esc_attr($the_core_count); ?>">
					<div class="fw-reload-slider-image-wrap" <?php echo ($bg_style); ?>>
						<div class="fw-reload-slider-image fw-block-image-parent">
							<div class="fw-block-image-child fw-ratio-container fw-ratio-1">
								<?php echo ($image['img']); ?>
							</div>
						</div>
					</div>
					<div class="fw-reload-slider-content">
						<div class="fw-reload-slider-title"><?php echo ($slide['title']); ?></div>
						<div class="fw-reload-slider-subtitle"><?php echo ($slide['extra']['subtitle']); ?></div>
						<div class="fw-reload-slider-description">
							<?php echo ($slide['desc']); ?>
						</div>
						<?php if(isset($data['settings']['extra']['advanced_styling']['show_bnt']) && $data['settings']['extra']['advanced_styling']['show_bnt'] == 'yes' ) : ?>
							<?php if ( isset( $slide['extra']['button_text'] ) && ! empty( $slide['extra']['button_text'] ) ) : ?>
								<?php if (strpos($slide['extra']['button_url'], "#") !== false && strlen($slide['extra']['button_url']) > 1) {
									$btn_size_class .= ' anchor';
								} ?>
								<a href="<?php echo esc_url($slide['extra']['button_url']); ?>" class="fw-btn <?php echo esc_attr( $btn_size_class ); ?> <?php the_core_button_class( $style ); ?>" style="<?php echo ($btn_size_style); ?>">
									<span>
										<?php if ( $icon_position == 'pull-right-icon' ) : ?>
											<?php echo the_core_translate( $slide['extra']['button_text'] ); echo ($icon); ?>
										<?php else: ?>
											<?php echo ($icon); echo the_core_translate( $slide['extra']['button_text'] ); ?>
										<?php endif; ?>
									</span>
								</a>
							<?php endif; ?>
						<?php endif; ?>
					</div>
				</li>
			<?php endforeach; ?>
		</ul>
		<!--Reload Slider Control-->
		<div id="<?php echo esc_attr($reload_slider_id); ?>-controls" class="fw-reload-slider-controls"></div>
		<a id="<?php echo esc_attr($reload_slider_id); ?>-prev" class="prev" href="#"><i class="fw-reload-slider-icon-left"></i></a>
		<a id="<?php echo esc_attr($reload_slider_id); ?>-next" class="next" href="#"><i class="fw-reload-slider-icon-right"></i></a>
	</div>
<?php endif; ?>