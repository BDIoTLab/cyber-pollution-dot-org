<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$the_core_slides_interval = $data['settings']['extra']['slides_interval'];
$ratio                    = $data['settings']['extra']['ratio'];
$play                     = 'true';
if ( $the_core_slides_interval == '0' || $the_core_slides_interval == '' ) {
	$play                     = 'false';
	$the_core_slides_interval = '0';
}

$args = array(
	'img_attr' => array( 'class' => 'attachment-post-thumbnail' ),
	'size'     => 'fw-theme-blog-full',
	'return'   => true,
	'ratio'    => $ratio
);

if ( isset( $data['settings']['extra']['unique_id'] ) ){
	$unique_class = 'tf-sh-'.$data['settings']['extra']['unique_id'];
	$unique_id = $unique_class . rand(1, 1000);
}
else{
	$unique_class = uniqid( 'tf-sh-' );
	$unique_id = $unique_class . rand(1, 1000);
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
	<div class="fw-easy-carousel <?php echo esc_attr($unique_class); ?>">
		<ul class="fw-easy-carousel-items" id="<?php echo esc_attr($unique_id); ?>" data-play="<?php echo esc_attr($play); ?>" data-slides-interval="<?php echo esc_attr($the_core_slides_interval); ?>">
			<?php foreach ( $data['slides'] as $id => $slide ): ?>
				<li data-easy-carousel="1">
					<div class="fw-block-image-parent">
						<?php if ( $data['settings']['population_method'] == 'posts' || $data['settings']['population_method'] == 'categories' || $data['settings']['population_method'] == 'tags' ) { ?>
							<?php $post_id = $slide['extra']['post_id']; ?>
							<div class="fw-easy-carousel-view-details">
								<div class="fw-itable">
									<div class="fw-icell">
										<a href="<?php echo esc_url( get_permalink( $post_id ) ); ?>" class="fw-btn <?php echo esc_attr( $btn_size_class ); ?> <?php the_core_button_class( $style ); ?>" style="<?php echo ($btn_size_style); ?>">
										<span>
											<?php if ( $icon_position == 'pull-right-icon' ) : ?>
												<?php esc_html_e( 'View Details', 'the-core' ); echo ($icon); ?>
											<?php else: ?>
												<?php echo ($icon); esc_html_e( 'View Details', 'the-core' ); ?>
											<?php endif; ?>
										</span>
										</a>
									</div>
								</div>
							</div>
							<?php
							$image = the_core_image( get_post_thumbnail_id( $post_id ), $args );
							$ratio_class = $image['ratio'];
							echo '<div class="fw-block-image-child '.$ratio_class.'">' . $image['img'] . '</div>';
						} else {
							$image = the_core_image( $slide['attachment_id'], $args );
							$ratio_class = $image['ratio'];

							if(isset($data['settings']['extra']['advanced_styling']['show_bnt']) && $data['settings']['extra']['advanced_styling']['show_bnt'] == 'yes' ) : ?>
								<?php if (strpos($slide['extra']['link'], "#") !== false && strlen($slide['extra']['link']) > 1) {
									$btn_size_class .= ' anchor';
								} ?>
								<div class="fw-easy-carousel-view-details">
									<div class="fw-itable">
										<div class="fw-icell">
											<a href="<?php echo esc_url($slide['extra']['link']); ?>" class="fw-btn <?php echo esc_attr( $btn_size_class ); ?> <?php the_core_button_class( $style ); ?>" style="<?php echo ($btn_size_style); ?>">
										<span>
											<?php if ( $icon_position == 'pull-right-icon' ) : ?>
												<?php esc_html_e( 'View Details', 'the-core' ); echo ($icon); ?>
											<?php else: ?>
												<?php echo ($icon); esc_html_e( 'View Details', 'the-core' ); ?>
											<?php endif; ?>
										</span>
											</a>
										</div>
									</div>
								</div>
							<?php endif;
							echo '<div class="fw-block-image-child '.$ratio_class.'">' . $image['img'] . '</div>';
						} ?>
					</div>
				</li>
			<?php endforeach; ?>
		</ul>
		<a id="<?php echo esc_attr($unique_id); ?>-prev" class="prev" href="#"><i class="fw-easy-carousel-icon-left"></i></a>
		<a id="<?php echo esc_attr($unique_id); ?>-next" class="next" href="#"><i class="fw-easy-carousel-icon-right"></i></a>
	</div>
<?php endif; ?>