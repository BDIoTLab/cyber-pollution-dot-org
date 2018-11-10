<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$h_title = (isset( $atts['heading']['selected'] ) && !empty($atts['heading']['selected']) ) ? $atts['heading']['selected'] : 'h3';

// image width
if ( isset( $atts['image_size']['select_size'] ) && $atts['image_size']['select_size'] == 'custom' ) {
	$img_attr = array( 'width' => (int) $atts['image_size']['custom']['width'] );
	$style    = 'width: ' . (int) $atts['image_size']['custom']['width'] . 'px;';
} else {
	$img_attr = array();
	$style    = 'width: 100%;';
}

$ratio_class = $ratio = '';
if( isset($atts['ratio']) ){
	$ratio = $atts['ratio'];
}
if ( $atts['round_image'] == 'fw-block-image-circle' ) {
	$ratio_class = 'fw-ratio-1';
	$ratio       = 'fw-ratio-1';
}

$image = '';
if ( !empty( $atts['image'] ) ) {
	$args  = array(
		'img_attr' => array( 'class' => 'attachment-post-thumbnail' ),
		'size'     => 'full',
		'return'   => true,
		'img_attr' => $img_attr,
		'ratio'    => $ratio
	);
	$image = the_core_image( $atts['image'], $args );
	$ratio_class = $image['ratio'];
}

$atts['class'] .= isset( $atts['content_alignment'] ) ? ' ' . $atts['content_alignment'] : '';

$parent_class = '';
if ( isset( $atts['frame']['selected'] ) && $atts['frame']['selected'] == 'fw-block-image-frame' ) {
	$parent_class .= ' ' . $atts['frame']['selected'];
	// image border width
	if ( ! empty( $atts['frame']['fw-block-image-frame']['border_size'] ) ) {
		$style .= ' border-width: ' . (int) $atts['frame']['fw-block-image-frame']['border_size'] . 'px;';
	}

	// border color
	if ( isset( $atts['frame']['fw-block-image-frame']['border_color']['id'] ) && $atts['frame']['fw-block-image-frame']['border_color']['id'] == 'fw-custom' ) {
		if ( ! empty( $atts['frame']['fw-block-image-frame']['border_color']['color'] ) ) {
			$style .= ' border-color: ' . $atts['frame']['fw-block-image-frame']['border_color']['color'] . ';';
		}
	} elseif ( isset( $atts['frame']['fw-block-image-frame']['border_color']['id'] ) ) {
		$parent_class .= ' fw_theme_border_only_' . $atts['frame']['fw-block-image-frame']['border_color']['id'];
	}
}

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

$social_style = $social_class = '';
$member_type = isset( $atts['member_type_picker']['member_type'] ) ? $atts['member_type_picker']['member_type'] : 'fw-team-member-type-1';

if( $member_type == 'fw-team-member-type-2' ) : ?>
	<div class="fw-team tf-sh-<?php echo esc_attr( $atts['unique_id'] ); ?> <?php echo esc_attr( $atts['class'] ); ?> <?php echo esc_attr($member_type); ?> fw-overlay-1" <?php echo ($data_animation); ?>>
		<div style="<?php echo ($style); ?>" class="fw-team-image fw-block-image-parent <?php echo esc_attr( $atts['round_image'] ); echo esc_attr($parent_class); ?>">
			<?php if( empty($image) ) {
				$image['img'] = '<img src="' . get_template_directory_uri() . '/images/no-photo-max-size.jpg' . '" alt="' . get_the_title() . '">';
			} ?>
			<div class="fw-block-image-child <?php echo esc_attr($ratio_class); ?>"><?php if( !empty($image) ) echo ($image['img']); ?>
				<div class="fw-block-image-overlay">
					<div class="fw-itable">
						<div class="fw-icell">
							<div class="fw-team-inner" style="<?php echo ($padding_top . $padding_bottom . $padding_left . $padding_right); ?>">
								<div class="fw-team-name">
									<?php if ( $atts['name'] != '' ) : ?>
										<<?php echo ($h_title); ?>><?php echo the_core_translate( esc_attr( $atts['name'] ) ); ?></<?php echo ($h_title); ?>>
									<?php endif; ?>
									<?php if ( $atts['job'] != '' ) : ?>
										<span><?php echo the_core_translate( esc_attr( $atts['job'] ) ); ?></span>
									<?php endif; ?>
								</div>

								<?php if ( $atts['desc'] != '' && $atts['desc'] != '<p></p>' ) : ?>
									<div class="fw-team-text"><?php echo do_shortcode( the_core_translate( esc_textarea( $atts['desc'] ) ) ); ?></div>
								<?php endif; ?>

								<?php if ( ! empty( $atts['socials'] ) ) : ?>
									<div class="fw-team-socials clearfix">
										<?php foreach ( $atts['socials'] as $item ) : ?>
											<a target="_blank" href="<?php echo esc_url( $item['social-link'] ); ?>">
												<?php
												if ( $item['social_type']['social-type'] == 'icon-social' ) {
													// icon size
													if ( ! empty( $item['social_type']['icon-social']['social_size'] ) ) {
														$social_style .= ' font-size: ' . (int) $item['social_type']['icon-social']['social_size'] . 'px;';
													}

													$social_class = '';
													// icon color
													if ( $item['social_type']['icon-social']['normal_color']['id'] == 'fw-custom' ) {
														if ( ! empty( $item['social_type']['icon-social']['normal_color']['color'] ) ) {
															$social_style .= ' color:' . $item['social_type']['icon-social']['normal_color']['color'] . ';';
														}
													} else {
														$social_class = 'fw_theme_text_' . $item['social_type']['icon-social']['normal_color']['id'];
													}

													if ( ! empty( $item['social_type']['icon-social']['icon_class'] ) ) {
														$icon = '<i style="' . $social_style . '" class="' . $item['social_type']['icon-social']['icon_class'] . ' ' . $social_class . '"></i>';
													}

												} else {
													// custom upload
													if ( ! empty( $item['social_type']['upload-icon']['social_size'] ) ) {
														// icon size
														$social_style .= ' width: ' . (int) $item['social_type']['upload-icon']['social_size'] . 'px;';
													}

													if ( ! empty( $item['social_type']['upload-icon']['upload-social-icon'] ) ) {
														$icon = '<img style="' . $social_style . '" src="' . esc_url( the_core_change_original_link_with_cdn($item['social_type']['upload-icon']['upload-social-icon']['url']) ) . '" alt="' . the_core_translate( esc_attr( $item['social_name'] ) ) . '" />';
													}
												}
												echo ($icon);
												?>
											</a>
										<?php endforeach; ?>
									</div>
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php else: ?>
	<div class="fw-team tf-sh-<?php echo esc_attr( $atts['unique_id'] ); ?> <?php echo esc_attr( $atts['class'] ); ?> <?php echo esc_attr($member_type); ?>" <?php echo ($data_animation); ?>>
		<?php if( !empty($image) ) : ?>
			<div style="<?php echo ($style); ?>" class="fw-team-image fw-block-image-parent <?php echo esc_attr( $atts['round_image'] ); echo esc_attr($parent_class); ?>">
				<div class="fw-block-image-child <?php echo esc_attr($ratio_class); ?>"><?php echo ($image['img']); ?></div>
			</div>
		<?php endif; ?>

		<div class="fw-team-inner" style="<?php echo ($padding_top . $padding_bottom . $padding_left . $padding_right); ?>">
			<div class="fw-team-name">
				<?php if ( $atts['name'] != '' ) : ?>
					<<?php echo ($h_title); ?>><?php echo the_core_translate( esc_attr( $atts['name'] ) ); ?></<?php echo ($h_title); ?>>
				<?php endif; ?>
				<?php if ( $atts['job'] != '' ) : ?>
					<span><?php echo the_core_translate( esc_attr( $atts['job'] ) ); ?></span>
				<?php endif; ?>
			</div>

			<?php if ( $atts['desc'] != '' && $atts['desc'] != '<p></p>' ) : ?>
				<div class="fw-team-text"><?php echo do_shortcode( the_core_translate( esc_textarea( $atts['desc'] ) ) ); ?></div>
			<?php endif; ?>

			<?php if ( ! empty( $atts['socials'] ) ) : ?>
				<div class="fw-team-socials clearfix">
					<?php foreach ( $atts['socials'] as $item ) : ?>
						<a target="_blank" href="<?php echo esc_url( $item['social-link'] ); ?>">
							<?php
							if ( $item['social_type']['social-type'] == 'icon-social' ) {
								// icon size
								if ( ! empty( $item['social_type']['icon-social']['social_size'] ) ) {
									$social_style .= ' font-size: ' . (int) $item['social_type']['icon-social']['social_size'] . 'px;';
								}

								$social_class = '';
								// icon color
								if ( $item['social_type']['icon-social']['normal_color']['id'] == 'fw-custom' ) {
									if ( ! empty( $item['social_type']['icon-social']['normal_color']['color'] ) ) {
										$social_style .= ' color:' . $item['social_type']['icon-social']['normal_color']['color'] . ';';
									}
								} else {
									$social_class = 'fw_theme_text_' . $item['social_type']['icon-social']['normal_color']['id'];
								}

								if ( ! empty( $item['social_type']['icon-social']['icon_class'] ) ) {
									$icon = '<i style="' . $social_style . '" class="' . $item['social_type']['icon-social']['icon_class'] . ' ' . $social_class . '"></i>';
								}

							} else {
								// custom upload
								if ( ! empty( $item['social_type']['upload-icon']['social_size'] ) ) {
									// icon size
									$social_style .= ' width: ' . (int) $item['social_type']['upload-icon']['social_size'] . 'px;';
								}

								if ( ! empty( $item['social_type']['upload-icon']['upload-social-icon'] ) ) {
									$icon = '<img style="' . $social_style . '" src="' . esc_url( the_core_change_original_link_with_cdn($item['social_type']['upload-icon']['upload-social-icon']['url']) ) . '" alt="' . the_core_translate( esc_attr( $item['social_name'] ) ) . '" />';
								}
							}
							echo ($icon);
							?>
						</a>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
<?php endif; ?>