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

if ( ! $image ) {
	$the_core_template_directory = get_template_directory_uri();
	$image              = '<img src="' . $the_core_template_directory . '/images/no-photo-max-size.jpg' . '" alt="' . get_the_title() . '">';
	$image_url          = $the_core_template_directory . '/images/no-photo-max-size.jpg';
}
?>
<li data-category="<?php fw_theme_portfolio_post_taxonomies( $post->ID ); ?>" class="fw-portfolio-list-item">
	<div class="fw-block-image-parent fw-portfolio-image fw-portfolio-fixed-height fw-overlay-1">
		<a class="fw-block-image-child fw-ratio-container <?php echo esc_attr($ratio); ?>" href="<?php echo esc_url($image_url); ?>"
		   data-rel="prettyPhoto">
			<?php if ( isset( $image['img'] ) ) {
				echo ($image['img']);
			} ?>
			<div class="fw-block-image-overlay">
				<div class="fw-itable">
					<div class="fw-icell">
						<i class="fw-icon-zoom"></i>
					</div>
				</div>
			</div>
		</a>

		<div class="fw-portfolio-description">
			<h2 class="fw-portfolio-title"><a href="<?php echo esc_url($the_core_permalink); ?>"><?php echo get_the_title(); ?></a></h2>

			<div class="fw-portfolio-content">
				<?php the_excerpt(); ?>
			</div>
			<?php if ( isset( $loop_data['advanced_options'] ) && ! empty( $loop_data['advanced_options'] ) ): ?>
				<?php if ( isset( $loop_data['advanced_options']['style2_advanced_styling'] ) && ( $loop_data['advanced_options']['style2_advanced_styling']['show_bnt'] == 'yes' ) ): ?>
					<?php
					//btn settings array
					$btn_styles = $loop_data['advanced_options']['style2_advanced_styling']['button_options'];
					$before_btn = $after_btn = $icon = '';

					//btn size
					$button_size = $btn_styles['size'];
					if ( $button_size['selected'] == 'custom' ) {
						$btn_size_style = 'width:' . (int) esc_attr( $button_size['custom']['width'] ) . 'px;height:' . (int) esc_attr( $button_size['custom']['height'] ) . 'px; line-height:' . (int) esc_attr( $button_size['custom']['height'] ) . 'px;';
						$btn_size_class = '';
					} else {
						$btn_size_class = $button_size['selected'];
						$btn_size_style = '';
					}

					$style = 'fw-btn-1';
					if ( isset( $btn_styles['style']['selected'] ) ) {
						$style = $btn_styles['style']['selected'];
					}

					//get icon type
					$icon_type = $btn_styles['icon_type'];
					$icon      = '';

					if ( $icon_type['tab_icon'] == 'icon-class' ) {
						if ( ! empty( $icon_type['icon-class']['icon_class'] ) ) {
							//get icon size
							$icon_size = ! empty( $btn_styles['icon_size'] ) ? 'style="font-size:' . esc_attr( (int) $btn_styles['icon_size'] ) . 'px;"' : '';
							$icon      = '<i class="' . $btn_styles['icon_position'] . ' ' . $icon_type['icon-class']['icon_class'] . '" ' . $icon_size . '></i>';
						}
					} else {
						if ( ! empty( $icon_type['upload-icon']['upload-custom-img']['url'] ) ) {
							//get image size
							$icon_size = ! empty( $btn_styles['icon_size'] ) ? 'style="width:' . esc_attr( (int) $btn_styles['icon_size'] ) . 'px;"' : '';
							$icon      = '<img class="' . $btn_styles['icon_position'] . '" src="' . esc_url( the_core_change_original_link_with_cdn( $icon_type['upload-icon']['upload-custom-img']['url'] ) ) . '" ' . $icon_size . ' />';
						}
					}
					?>
					<div class="<?php echo ( $btn_styles['full_width']['selected_type'] != 'full_width' ) ? esc_attr( $btn_styles['full_width']['default']['btn_alignment'] ) : ''; ?>">
						<a href="<?php echo esc_url($the_core_permalink); ?>" class="fw-btn <?php echo ( $btn_styles['full_width']['selected_type'] != 'default' ) ? esc_attr( $btn_styles['full_width']['selected_type'] ) : ''; ?> <?php echo esc_attr( $btn_size_class ); ?> <?php the_core_button_class( $style ); ?>" style="<?php echo ($btn_size_style); ?>">
							<span>
								<?php if ( $btn_styles['icon_position'] == 'pull-right-icon' ) : ?>
									<?php echo the_core_translate( esc_attr( $btn_styles['label'] ) ); echo ($icon); ?>
								<?php else : ?>
									<?php echo ($icon); echo the_core_translate( esc_attr( $btn_styles['label'] ) ); ?>
								<?php endif; ?>
							</span>
						</a>
					</div>

				<?php endif; ?>
			<?php else: ?>
				<a href="<?php echo esc_url($the_core_permalink); ?>" class="fw-btn fw-btn-1 fw-btn-md fw-btn-portfolio-read-more"><span><?php esc_html_e( 'Read More', 'the-core' ); ?></span></a>
			<?php endif; ?>
		</div>
	</div>
</li>