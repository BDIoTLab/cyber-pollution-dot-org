<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 */

$the_core_permalink    = get_permalink();
$the_core_post_options = the_core_single_post_options( $post->ID );
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( "post clearfix" ); ?>>
	<header class="entry-header">
		<h2 class="entry-title"><a href="<?php echo esc_url($the_core_permalink); ?>"><?php the_title(); ?></a></h2>
	</header>

	<?php if ( $the_core_post_options['image'] ) : ?>
		<div class="fw-post-image fw-block-image-parent <?php echo esc_attr($the_core_post_options['frame']); ?>">
			<a href="<?php echo esc_url($the_core_permalink); ?>" class="post-thumbnail fw-block-image-child <?php echo esc_attr($the_core_post_options['ratio_class']); ?>">
				<?php echo ($the_core_post_options['image']['img']); ?>
			</a>
		</div>
	<?php endif; ?>

	<div class="entry-content clearfix" itemprop="text">
		<?php the_excerpt(); ?>
		<footer class="entry-meta clearfix">
			<?php the_core_get_blog_button(array('permalink' => $the_core_permalink)); ?>
		</footer>
	</div>
</article>