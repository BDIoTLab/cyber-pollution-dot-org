<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$the_core_count = 0;
$navigation     = $bg_style = $first_image = '';
$dimensions     = array(
	'width'  => 435,
	'height' => 465,
);

if ( ! empty( $data['settings']['extra']['slider_bg'] ) ) {
	$bg_style = 'style="background-image:url(' . the_core_change_original_link_with_cdn( $data['settings']['extra']['slider_bg']['url'] ) . ');"';
}

$the_core_slides_interval = $data['settings']['extra']['slides_interval'];

$the_core_overlay_style = '';
if ( isset( $data['settings']['extra']['overlay_options']['overlay'] ) ) {
	if ( $data['settings']['extra']['overlay_options']['overlay'] == 'yes' ) {
		$the_core_overlay_bg = $data['settings']['extra']['overlay_options']['yes']['background']['id'];
		$the_core_opacity    = $data['settings']['extra']['overlay_options']['yes']['overlay_opacity'] / 100;
		if ( $the_core_overlay_bg == 'fw-custom' ) {
			$the_core_overlay_style = '<div class="fw-main-row-overlay" style="background-color: ' . $data['settings']['extra']['overlay_options']['yes']['background']['color'] . '; opacity: ' . $the_core_opacity . ';"></div>';
		} else {
			$the_core_overlay_style = '<div class="fw-main-row-overlay fw_theme_bg_' . $the_core_overlay_bg . '" style="opacity: ' . $the_core_opacity . ';"></div>';
		}
	}
}

$effects = the_core_image_video_slider_effects();
$args    = array(
	'img_attr' => array( 'class' => 'attachment-post-thumbnail' ),
	'size'     => 'fw-theme-category-square-800',
	'return'   => true,
	'ratio'    => 'fw-ratio-1'
);

$unique_class = '';
if ( isset( $data['settings']['extra']['unique_id'] ) ){
	$unique_class = 'tf-sh-'.$data['settings']['extra']['unique_id'];
	$carousel_id  = $unique_class . rand(1, 1000);
}
else{
	$unique_class = uniqid( 'carousel-' );
	$carousel_id  = $unique_class . rand(1, 1000);
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
?>
<?php if ( isset( $data['slides'] ) ) : ?>
	<div class="fw-wrap-image-slider <?php echo esc_attr($carousel_id); ?>">
		<!-- Loading Spinner -->
		<div class="spinner">
			<div class="wBall" id="wBall_1">
				<div class="wInnerBall">
				</div>
			</div>
			<div class="wBall" id="wBall_2">
				<div class="wInnerBall">
				</div>
			</div>
			<div class="wBall" id="wBall_3">
				<div class="wInnerBall">
				</div>
			</div>
			<div class="wBall" id="wBall_4">
				<div class="wInnerBall">
				</div>
			</div>
			<div class="wBall" id="wBall_5">
				<div class="wInnerBall">
				</div>
			</div>
		</div>
		<!--/ Loading Spinner -->

		<div class="main-carousel fade-effect invisible fw-image-video-slider <?php echo esc_attr($carousel_id); ?> <?php echo esc_attr($unique_class); ?>">
			<div id="<?php echo esc_attr($carousel_id); ?>" class="carousel slide" data-slides-interval="<?php echo esc_attr($the_core_slides_interval); ?>">
				<div class="carousel-inner">
					<?php foreach ( $data['slides'] as $id => $slide ): ?>
						<?php
						$image = the_core_image( $slide, $args );
						$class = '';
						if ( $the_core_count == 0 ) {
							$first_image = $slide['src'];
							$class       = 'active';
						}

						if( $slide['extra']['text_position'] == 'pull-right') {
							// for text left position
							$class .= ' fw-image-video-slider-text-left';
						}
						else {
							$class .= ' fw-image-video-slider-text-right';
						}

						// add anchor class to button
						if (strpos($slide['extra']['button_url'], "#") !== false && strlen($slide['extra']['button_url']) > 1) {
							$btn_size_class .= ' anchor';
						}
						?>
						<!-- Carousel items -->
						<div class="item <?php echo esc_attr($class); ?>" <?php echo ($bg_style); ?>>
							<?php echo ($the_core_overlay_style); ?>
							<div class="fw-container">
								<div class="fw-itable">
									<div class="fw-icell">
										<?php if( $slide['extra']['text_position'] == 'pull-right') : // for text left position ?>
											<div class="fw-text-wrap">
												<?php if ( ! empty( $slide['title'] ) ) : ?>
													<div data-animate-in="<?php echo esc_attr($effects[ $slide['extra']['text_position'] ]['title']['data-animate-in']); ?>" data-animate-out="<?php echo esc_attr($effects[ $slide['extra']['text_position'] ]['title']['data-animate-out']); ?>" class="invisible">
														<div class="fw-image-video-slider-title"><?php echo ($slide['title']); ?></div>
													</div>
												<?php endif; ?>
												<?php if ( ! empty( $slide['extra']['subtitle'] ) ) : ?>
													<div data-animate-in="<?php echo esc_attr($effects[ $slide['extra']['text_position'] ]['subtitle']['data-animate-in']); ?>" data-animate-out="<?php echo esc_attr($effects[ $slide['extra']['text_position'] ]['subtitle']['data-animate-out']); ?>" class="invisible">
														<div class="fw-image-video-slider-title-after"><?php echo ($slide['extra']['subtitle']); ?></div>
													</div>
												<?php endif; ?>
												<?php if ( ! empty( $slide['desc'] ) ) : ?>
													<div data-animate-in="<?php echo esc_attr($effects[ $slide['extra']['text_position'] ]['description']['data-animate-in']); ?>" data-animate-out="<?php echo esc_attr($effects[ $slide['extra']['text_position'] ]['description']['data-animate-out']); ?>" class="invisible">
														<div class="fw-image-video-slider-text"><?php echo ($slide['desc']); ?></div>
													</div>
												<?php endif; ?>
												<?php if(isset($data['settings']['extra']['advanced_styling']['show_bnt']) && $data['settings']['extra']['advanced_styling']['show_bnt'] == 'yes' ) : ?>
													<?php if ( isset( $slide['extra']['button_text'] ) && ! empty( $slide['extra']['button_text'] ) ) : ?>
														<div data-animate-in="<?php echo esc_attr($effects[ $slide['extra']['text_position'] ]['button']['data-animate-in']); ?>" data-animate-out="<?php echo esc_attr($effects[ $slide['extra']['text_position'] ]['button']['data-animate-out']); ?>" class="invisible">
															<a href="<?php echo esc_url($slide['extra']['button_url']); ?>" class="fw-btn <?php echo esc_attr( $btn_size_class ); ?> <?php the_core_button_class( $style ); ?>" style="<?php echo ($btn_size_style); ?>">
																<span>
																	<?php if ( $icon_position == 'pull-right-icon' ) : ?>
																		<?php echo the_core_translate( $slide['extra']['button_text'] ); echo ($icon); ?>
																	<?php else: ?>
																		<?php echo ($icon); echo the_core_translate( $slide['extra']['button_text'] ); ?>
																	<?php endif; ?>
																</span>
															</a>
														</div>
													<?php endif; ?>
												<?php endif; ?>
											</div>
											<div class="fw-media-wrap">
												<?php if( isset($slide['extra']['image_video_width']) && !empty($slide['extra']['image_video_width']) ) {
													$image_video_width = 'style="width: '.(int)$slide['extra']['image_video_width'].'px;"';
													$dimensions['width'] = $slide['extra']['image_video_width'];
													$dimensions['height'] = $slide['extra']['image_video_width'];
												} else{
													$image_video_width = '';
												} ?>
												<?php if ( $slide['multimedia_type'] === 'video' ) : ?>
													<div data-animate-in="<?php echo esc_attr($effects[ $slide['extra']['text_position'] ]['image-video']['data-animate-in']); ?>" data-animate-out="<?php echo esc_attr($effects[ $slide['extra']['text_position'] ]['image-video']['data-animate-out']); ?>" class="border-media video invisible" id="player" <?php echo ($image_video_width); ?>>
														<?php echo fw_oembed_get( $slide['src'], $dimensions ); ?>
													</div>
												<?php else: ?>
													<div data-animate-in="<?php echo esc_attr($effects[ $slide['extra']['text_position'] ]['image-video']['data-animate-in']); ?>" data-animate-out="<?php echo esc_attr($effects[ $slide['extra']['text_position'] ]['image-video']['data-animate-out']); ?>" class="border-media image invisible" <?php echo ($image_video_width); ?>>
														<div class="fw-ratio-container fw-ratio-1">
															<?php echo ($image['img']); ?>
														</div>
													</div>
												<?php endif; ?>
											</div>
										<?php else: ?>
											<div class="fw-media-wrap">
												<?php if( isset($slide['extra']['image_video_width']) && !empty($slide['extra']['image_video_width']) ) {
													$image_video_width = 'style="width: '.(int)$slide['extra']['image_video_width'].'px;"';
													$dimensions['width'] = $slide['extra']['image_video_width'];
													$dimensions['height'] = $slide['extra']['image_video_width'];
												} else{
													$image_video_width = '';
												} ?>
												<?php if ( $slide['multimedia_type'] === 'video' ) : ?>
													<div data-animate-in="<?php echo esc_attr($effects[ $slide['extra']['text_position'] ]['image-video']['data-animate-in']); ?>" data-animate-out="<?php echo esc_attr($effects[ $slide['extra']['text_position'] ]['image-video']['data-animate-out']); ?>" class="border-media video invisible" id="player" <?php echo ($image_video_width); ?>>
														<?php echo fw_oembed_get( $slide['src'], $dimensions ); ?>
													</div>
												<?php else: ?>
													<div data-animate-in="<?php echo esc_attr($effects[ $slide['extra']['text_position'] ]['image-video']['data-animate-in']); ?>" data-animate-out="<?php echo esc_attr($effects[ $slide['extra']['text_position'] ]['image-video']['data-animate-out']); ?>" class="border-media image invisible" <?php echo ($image_video_width); ?>>
														<div class="fw-ratio-container fw-ratio-1">
															<?php echo ($image['img']); ?>
														</div>
													</div>
												<?php endif; ?>
											</div>
											<div class="fw-text-wrap">
												<?php if ( ! empty( $slide['title'] ) ) : ?>
													<div data-animate-in="<?php echo esc_attr($effects[ $slide['extra']['text_position'] ]['title']['data-animate-in']); ?>" data-animate-out="<?php echo esc_attr($effects[ $slide['extra']['text_position'] ]['title']['data-animate-out']); ?>" class="invisible">
														<div class="fw-image-video-slider-title"><?php echo ($slide['title']); ?></div>
													</div>
												<?php endif; ?>
												<?php if ( ! empty( $slide['extra']['subtitle'] ) ) : ?>
													<div data-animate-in="<?php echo esc_attr($effects[ $slide['extra']['text_position'] ]['subtitle']['data-animate-in']); ?>" data-animate-out="<?php echo esc_attr($effects[ $slide['extra']['text_position'] ]['subtitle']['data-animate-out']); ?>" class="invisible">
														<div class="fw-image-video-slider-title-after"><?php echo ($slide['extra']['subtitle']); ?></div>
													</div>
												<?php endif; ?>
												<?php if ( ! empty( $slide['desc'] ) ) : ?>
													<div data-animate-in="<?php echo esc_attr($effects[ $slide['extra']['text_position'] ]['description']['data-animate-in']); ?>" data-animate-out="<?php echo esc_attr($effects[ $slide['extra']['text_position'] ]['description']['data-animate-out']); ?>" class="invisible">
														<div class="fw-image-video-slider-text"><?php echo ($slide['desc']); ?></div>
													</div>
												<?php endif; ?>
												<?php if(isset($data['settings']['extra']['advanced_styling']['show_bnt']) && $data['settings']['extra']['advanced_styling']['show_bnt'] == 'yes' ) : ?>
													<?php if ( isset( $slide['extra']['button_text'] ) && ! empty( $slide['extra']['button_text'] ) ) : ?>
														<div data-animate-in="<?php echo esc_attr($effects[ $slide['extra']['text_position'] ]['button']['data-animate-in']); ?>" data-animate-out="<?php echo esc_attr($effects[ $slide['extra']['text_position'] ]['button']['data-animate-out']); ?>" class="invisible">
															<a href="<?php echo esc_url($slide['extra']['button_url']); ?>" class="fw-btn <?php echo esc_attr( $btn_size_class ); ?> <?php the_core_button_class( $style ); ?>" style="<?php echo ($btn_size_style); ?>">
																<span>
																	<?php if ( $icon_position == 'pull-right-icon' ) : ?>
																		<?php echo the_core_translate( $slide['extra']['button_text'] ); echo ($icon); ?>
																	<?php else: ?>
																		<?php echo ($icon); echo the_core_translate( $slide['extra']['button_text'] ); ?>
																	<?php endif; ?>
																</span>
															</a>
														</div>
													<?php endif; ?>
												<?php endif; ?>
											</div>
										<?php endif; ?>
									</div>
								</div>
							</div>
						</div>
						<!-- /Carousel items -->
						<?php
						$navigation .= '<li data-target="#' . $carousel_id . '" data-slide-to="' . $the_core_count . '" class="' . $class . '"></li>' . "\n";
						$the_core_count ++;
						?>
					<?php endforeach; ?>
				</div>

				<!-- Carousel indicators -->
				<ol class="carousel-indicators">
					<?php echo ($navigation); ?>
				</ol>
				<div class="fw-first-slider-image" data-image="<?php echo esc_url($first_image); ?>"></div>
			</div>
		</div>
	</div>
<?php endif; ?>