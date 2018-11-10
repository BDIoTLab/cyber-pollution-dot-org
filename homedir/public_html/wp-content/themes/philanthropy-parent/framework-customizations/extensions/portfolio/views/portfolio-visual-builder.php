<?php
get_header();
the_core_header_image();
global $post;
$thumbnails      = fw_theme_ext_portfolio_get_gallery_images();
$gallery_type    = fw_get_db_post_option( $post->ID, 'gallery_type', 'fw-ratio-16-9' );
$gallery_columns = fw_get_db_post_option( $post->ID, 'gallery_columns', 'fw-project-column-3' );
?>
<section class="fw-main-row fw-section-no-padding <?php the_core_get_content_class( 'main', '' ); ?>">
	<div class="fw-container-fluid">
		<div class="fw-row">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php the_content(); ?>
			<?php endwhile; ?>
		</div><!-- /.fw-row -->
	</div><!-- /.fw-container-fluid -->
	<?php if ( ! post_password_required() ) : ?>
		<div class="fw-container">
			<div class="fw-row">
				<?php if ( ! empty( $thumbnails ) ) : ?>
					<div class="fw-col-inner fw-project-inner">
						<div class="fw-project-details <?php echo esc_attr( $gallery_columns ); ?>"
							 id="fw-project-details">
							<ul class="fw-project-list">
								<?php foreach ( $thumbnails as $thumbnail ): ?>
									<?php
									$args  = array(
										'img_attr' => array( 'class' => 'attachment-post-thumbnail' ),
										'size'     => 'fw-theme-portfolio-landscape-x2',
										'return'   => true,
										'ratio'    => $gallery_type
									);
									$image = the_core_image( $thumbnail, $args );
									?>
									<li class="fw-project-list-item">
										<div class="fw-block-image-parent fw-overlay-1">
											<a class="fw-block-image-child fw-ratio-container <?php echo esc_attr( $gallery_type ); ?>"
											   href="<?php echo esc_url( $thumbnail['url'] ); ?>"
											   data-rel="prettyPhoto[<?php echo esc_attr( $post->ID ); ?>]">
												<?php echo( $image['img'] ); ?>
												<div class="fw-block-image-overlay">
													<div class="fw-itable">
														<div class="fw-icell">
															<i class="fw-icon-zoom"></i>
														</div>
													</div>
												</div>
											</a>
										</div>
									</li>
								<?php endforeach; ?>
							</ul>
						</div><!--project-details-->
					</div><!--fw-col-inner-->
				<?php endif; ?>

				<?php if ( comments_open() ) {
					comments_template();
				} ?>
			</div>
		</div>
	<?php endif; ?>
</section>
<?php get_footer();