<?php
$the_core_enable_related_articles = defined( 'FW' ) ? fw_get_db_settings_option( 'posts_settings/related_articles/selected', '' ) : '';
if( $the_core_enable_related_articles != 'yes') return;

$the_core_related_articles = the_core_related_articles();
if ( ! empty( $the_core_related_articles ) ) : ?>
	<div class="fw-row">
		<div class="fw-wrap-related-article fw-related-article-type-2">
			<h3 class="fw-title-related"><strong><?php esc_html_e( 'Related Articles', 'the-core' ); ?></strong></h3>
			<ul class="fw-related-article">
				<?php $args = array(
					'img_attr' => array( 'class' => 'attachment-post-thumbnail' ),
					'size'     => 'fw-theme-category-square-800',
					'return'   => true,
					'ratio'    => 'fw-ratio-1'
				); ?>
				<?php foreach ( $the_core_related_articles as $item ) :
					$post_thumbnail_id = get_post_thumbnail_id( $item->ID );
					if ($post_thumbnail_id) {
						$image = the_core_image( $post_thumbnail_id, $args );
						$ratio_class = $image['ratio'];
					}
					else{
						$image = '';
						$ratio_class = 'fw-ratio-container fw-ratio-1';
					}
					?>
					<li>
						<div class="fw-related-article-image fw-block-image-parent fw-overlay-2">
							<a href="<?php echo esc_url( get_permalink( $item->ID ) ); ?>" class="fw-block-image-child <?php echo esc_attr($ratio_class); ?>" title="<?php echo esc_html($item->post_title); ?>">
								<?php if ( $image ) {
									echo ($image['img']);
								} else { ?>
									<img data-src="<?php echo get_template_directory_uri().'/images/no-photo-max-size.jpg'?>" class="lazyload" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" alt"" />
								<?php } ?>
                                <div class="fw-block-image-overlay">
									<div class="fw-itable">
										<div class="fw-icell">
											<div class="fw-related-article-text-wrap">
												<div class="fw-overlay-title"><?php echo ($item->post_title); ?></div>
												<div class="fw-related-article-details"><span><?php esc_html_e('View Details', 'the-core' ); ?></span></div>
											</div>
										</div>
									</div>
								</div>
							</a>
						</div>
					</li>
				<?php endforeach; ?>
				<?php wp_reset_postdata(); ?>
			</ul>
		</div>
	</div>
<?php endif; ?>