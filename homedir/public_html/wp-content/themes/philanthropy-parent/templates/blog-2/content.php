<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 */

global $post;
if( !isset( $extra_options ) ) $extra_options = array();
$the_core_permalink    = get_permalink();
$the_core_post_options = the_core_listing_post_options($post->ID);
$the_core_blog_title   = the_core_get_blog_title( array( 'extra_options' => $extra_options ) );
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( "post clearfix post-list-type-2" ); ?> itemscope="itemscope" itemtype="https://schema.org/BlogPosting" itemprop="blogPost">
	<header class="entry-header">
		<<?php echo ($the_core_blog_title); ?> class="entry-title" itemprop="headline">
			<?php if ( is_sticky() ) : ?>
				<i class="sticky-icon"></i>
			<?php endif; ?>
			<a href="<?php echo esc_url($the_core_permalink); ?>"><?php the_title(); ?></a>
		</<?php echo ($the_core_blog_title); ?>>
	</header>

	<div class="fw-post-image fw-block-image-parent <?php echo esc_attr($the_core_post_options['image_alignment']) . ' ' . esc_attr($the_core_post_options['rounded']) . ' ' . esc_attr($the_core_post_options['frame']); ?> fw-overlay-1">
		<?php the_core_get_blog_comments_number(array('permalink' => $the_core_permalink, 'extra_options' => $extra_options ) ); ?>
		<?php if ( $the_core_post_options['image'] ) : ?>
			<a href="<?php echo esc_url($the_core_permalink); ?>" class="post-thumbnail fw-block-image-child <?php echo esc_attr($the_core_post_options['ratio_class']); ?>">
				<?php echo ($the_core_post_options['image']['img']); ?>
				<div class="fw-block-image-overlay">
					<div class="fw-itable">
						<div class="fw-icell">
							<i class="fw-icon-link"></i>
						</div>
					</div>
				</div>
			</a>
		<?php endif; ?>
	</div>

	<div class="entry-content clearfix" itemprop="text">
		<?php the_excerpt(); ?>
	</div>

    <?php the_core_post_meta_blog_2( $post->ID, 'post', array( 'extra_options' => $extra_options ) ); ?>
</article>