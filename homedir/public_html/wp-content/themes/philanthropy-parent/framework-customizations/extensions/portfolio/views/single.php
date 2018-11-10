<?php
the_core_ext_portfolio_page_template();
get_header();
the_core_header_image();
$thumbnails      = fw_theme_ext_portfolio_get_gallery_images();
$gallery_type    = fw_get_db_post_option( $post->ID, 'gallery_type', 'fw-ratio-16-9' );
$gallery_columns = fw_get_db_post_option( $post->ID, 'gallery_columns', 'fw-project-column-3' );
$the_core_sidebar_position = function_exists( 'fw_ext_sidebars_get_current_position' ) ? fw_ext_sidebars_get_current_position() : 'right';
?>
	<section class="fw-main-row <?php the_core_get_content_class( 'main', $the_core_sidebar_position ); ?>">
		<div class="fw-container">
			<div class="fw-row">
				<!--Content Area-->
				<div class="fw-content-area <?php the_core_get_content_class( 'content', $the_core_sidebar_position ); ?>">
					<div class="fw-col-inner">
						<?php if ( function_exists( 'fw_ext_breadcrumbs' ) ) { fw_ext_breadcrumbs(); } ?>
						<?php while ( have_posts() ) : the_post(); ?>
							<div class="fw-portfolio-title">
								<?php the_core_single_post_title( $post->ID, 'fw-portfolio' ); ?>
							</div>
							<?php the_content(); ?>
						<?php endwhile; ?>
					</div>
					<?php if ( !post_password_required() ) : ?>
						<?php if( ! empty( $thumbnails ) ) : ?>
							<div class="fw-col-inner fw-project-inner">
								<div class="fw-project-details <?php echo esc_attr($gallery_columns); ?>" id="fw-project-details">
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
													<a class="fw-block-image-child fw-ratio-container <?php echo esc_attr($gallery_type); ?>" href="<?php echo esc_url($thumbnail['url']); ?>" rel="prettyPhoto[<?php echo esc_attr($post->ID); ?>]" data-rel="prettyPhoto[<?php echo esc_attr($post->ID); ?>]">
														<?php echo ($image['img']); ?>
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

						<?php if ( comments_open() ) comments_template(); ?>
					<?php endif; ?>
				</div><!-- /content area -->

				<?php get_sidebar(); ?>
			</div><!-- /.fw-row -->
		</div><!-- /.fw-container -->
	</section>
<?php get_footer();