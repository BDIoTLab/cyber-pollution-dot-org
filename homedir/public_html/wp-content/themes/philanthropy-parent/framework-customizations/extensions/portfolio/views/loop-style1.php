<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

global $post;

if ( ! isset( $loop_data ) ) {
	$loop_data = get_query_var( 'fw_portfolio_loop_data' );
}

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

$args  = array(
	'img_attr' => array( 'class' => 'attachment-post-thumbnail' ),
	'size'     => $size,
	'return'   => true,
	'ratio'    => $ratio
);
$image = the_core_image( get_post_thumbnail_id(), $args );
?>
<li data-category="<?php fw_theme_portfolio_post_taxonomies( $post->ID ); ?>" class="fw-portfolio-list-item">
	<div class="fw-block-image-parent fw-portfolio-image fw-overlay-3">
		<div class="fw-block-image-child fw-ratio-container <?php echo esc_attr($ratio); ?>" data-portfolio-href="<?php echo esc_url( get_permalink() ); ?>">
			<?php if( isset($image['img']) ) echo ($image['img']); ?>
			<div class="fw-block-image-overlay">
				<div class="fw-itable">
					<div class="fw-icell">
						<div class="fw-overlay-title">
							<?php the_title(); ?>
						</div>
						<div class="fw-overlay-description">
							<?php the_excerpt(); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</li>