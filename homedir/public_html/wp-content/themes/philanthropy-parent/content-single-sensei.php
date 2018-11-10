<?php $the_core_post_options = the_core_single_post_options( $post->ID ); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class( "post post-details" ); ?> itemscope="itemscope" itemtype="https://schema.org/BlogPosting" itemprop="blogPost">
	<div class="fw-col-inner">
		<header class="entry-header">
			<?php the_core_post_meta( $post->ID, 'course' ); ?>
			<?php the_core_single_post_title( $post->ID, 'course' ); ?>
		</header>

		<?php if ( $the_core_post_options['image'] && $the_core_post_options['featured_image'] != 'no') : ?>
			<div class="fw-post-image fw-block-image-parent <?php echo esc_attr($the_core_post_options['frame']); ?>">
				<a href="<?php echo esc_url($the_core_post_options['image']['original_image_url']); ?>" data-rel="prettyPhoto" class="post-thumbnail fw-block-image-child <?php echo esc_attr($the_core_post_options['ratio_class']); ?>">
					<?php echo ($the_core_post_options['image']['img']); ?>
				</a>
				<?php if ( !empty($the_core_post_options['image']['caption']) ) : ?>
					<div class="fw-block-image-caption"><?php echo ($the_core_post_options['image']['caption']); ?></div>
				<?php endif; ?>
			</div>
		<?php endif; ?>

		<div class="entry-content clearfix" itemprop="text">
			<?php the_content();
			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'the-core' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
			) ); ?>
		</div>
	</div>
</article>
<?php get_template_part( 'content', 'author' ); ?>
<?php get_template_part( 'course', 'navigation' ); ?>