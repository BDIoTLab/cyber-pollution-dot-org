<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

global $post;

if ( ! isset( $loop_data ) ) {
	$loop_data = get_query_var( 'fw_portfolio_loop_data' );
}

$the_core_permalink = get_permalink();
if ( $loop_data['portfolio_type'] == 'fw-portfolio-landscape' ) {
	$ratio = 'fw-ratio-16-9';
	$size  = 'fw-theme-portfolio-landscape-x2';
} elseif ( $loop_data['portfolio_type'] == 'fw-portfolio-square' ) {
	$ratio = 'fw-ratio-1';
	$size  = 'fw-theme-category-square-800';
} else {
	$ratio = 'fw-ratio-3-4';
	$size  = 'fw-theme-portfolio-portrait-x2';
}

$args      = array(
	'img_attr' => array( 'class' => 'attachment-post-thumbnail' ),
	'size'     => $size,
	'return'   => true,
	'ratio'    => $ratio
);
$image     = the_core_image( get_post_thumbnail_id(), $args );
$image_url = isset( $image['original_image_url'] ) ? $image['original_image_url'] : '';

// for original image
if ( ! $image ) {
	$the_core_template_directory = get_template_directory_uri();
	$image              = '<img src="' . $the_core_template_directory . '/images/no-photo-max-size.jpg' . '" alt="' . get_the_title() . '">';
	$image_url          = $the_core_template_directory . '/images/no-photo-max-size.jpg';
}
?>
<li data-category="<?php echo fw_theme_portfolio_post_taxonomies( $post->ID, true ); ?>" class="fw-portfolio-list-item">
	<div class="fw-block-image-parent fw-portfolio-image fw-image-frame fw-overlay-1">
		<div class="fw-block-image-child  fw-ratio-container <?php echo esc_attr($ratio); ?>">
			<?php if ( isset( $image['img'] ) ) {
				echo ($image['img']);
			} ?>
			<div class="fw-block-image-overlay">
				<div class="fw-itable">
					<div class="fw-icell">
						<div class="fw-block-image-icons">
							<?php if ( isset( $loop_data['advanced_options'] ) && ! empty( $loop_data['advanced_options'] ) ): ?>
								<?php if ( isset( $loop_data['advanced_options']['style1_advanced_styling'] ) ): ?>
									<?php
									//icon prettyphoto
									if ( isset( $loop_data['advanced_options']['style1_advanced_styling']['prettyphoto_icon_type'] ) ) {
										$icon      = '';
										$icon_type = $loop_data['advanced_options']['style1_advanced_styling']['prettyphoto_icon_type'];

										if ( $icon_type['tab_icon'] == 'icon-class' ) {
											if ( ! empty( $icon_type['icon-class']['icon_class'] ) ) {
												$icon = '<a href="' . $image_url . '" data-rel="prettyPhoto" class="fw-prettyphoto-icon ' . $icon_type['icon-class']['icon_class'] . '"></a>';
											}
										} else {
											if ( ! empty( $icon_type['upload-icon']['upload-custom-img']['url'] ) ) {
												$icon = '<a class="fw-icon-img-class" href="' . $image_url . '" data-rel="prettyPhoto"><img alt="" src="' . esc_url( the_core_change_original_link_with_cdn( $icon_type['upload-icon']['upload-custom-img']['url'] ) ) . '"/></a>';
											}
										}

										echo ($icon);
									}

									//icon link
									if ( isset( $loop_data['advanced_options']['style1_advanced_styling']['link_icon_type'] ) ) {
										$link_icon      = '';
										$link_icon_type = $loop_data['advanced_options']['style1_advanced_styling']['link_icon_type'];

										if ( $link_icon_type['tab_icon'] == 'icon-class' ) {
											if ( ! empty( $link_icon_type['icon-class']['icon_class'] ) ) {
												$link_icon = '<a href="' . $the_core_permalink . '" class="fw-link-icon ' . $link_icon_type['icon-class']['icon_class'] . '"></a>';
											}
										} else {
											if ( ! empty( $link_icon_type['upload-icon']['upload-custom-img']['url'] ) ) {
												$link_icon = '<a class="fw-icon-img-class" href="' . $the_core_permalink . '"><img alt="" src="' . esc_url( the_core_change_original_link_with_cdn( $link_icon_type['upload-icon']['upload-custom-img']['url'] ) ) . '"/></a>';
											}
										}

										echo ($link_icon);
									}
									?>
								<?php endif; ?>
							<?php else: ?>
								<a href="<?php echo esc_url($image_url); ?>" data-rel="prettyPhoto" class="fw-icon-zoom"></a>
								<a href="<?php echo esc_url($the_core_permalink); ?>" class="fw-icon-more"></a>
							<?php endif; ?>
						</div>
						<a class="fw-portfolio-title" href="<?php echo esc_url($the_core_permalink); ?>"><?php the_title(); ?></a>

						<div class="fw-overlay-description">
							<?php the_excerpt(); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</li>