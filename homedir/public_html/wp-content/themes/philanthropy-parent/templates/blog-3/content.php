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
$image_alignment       = !empty($the_core_post_options['image_alignment']) ? $image_alignment = $the_core_post_options['image_alignment'].'-align' : '';
$post_author           = the_core_post_type_3_author( array('extra_options' => $extra_options) );
$comments_number       = the_core_post_type_3_comments_number( array('extra_options' => $extra_options) );
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( "post clearfix post-list-type-3 $image_alignment" ); ?> itemscope="itemscope" itemtype="https://schema.org/BlogPosting" itemprop="blogPost">
	<header class="entry-header">
		<?php the_core_post_type_3_date($the_core_permalink, array('extra_options' => $extra_options) ); ?>

		<<?php echo ($the_core_blog_title); ?> class="entry-title" itemprop="headline">
			<?php if ( is_sticky() ) : ?>
				<i class="sticky-icon"></i>
			<?php endif; ?>
			<a href="<?php echo esc_url($the_core_permalink); ?>"><?php the_title(); ?></a>
		</<?php echo ($the_core_blog_title); ?>>
	</header>

	<?php if ( $the_core_post_options['image'] ) : ?>
		<div class="fw-post-image fw-block-image-parent <?php echo esc_attr($the_core_post_options['image_alignment']) . ' ' . esc_attr($the_core_post_options['rounded']) . ' ' . esc_attr($the_core_post_options['frame']); ?> fw-overlay-1">
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
		</div>
	<?php endif; ?>

	<div class="entry-content clearfix" itemprop="text">
		<?php the_core_post_type_3_categories($post->ID, array('extra_options' => $extra_options)); ?>
		<div class="post-content">
			<?php the_excerpt(); ?>
		</div>

		<footer class="entry-meta clearfix <?php echo ($post_author == 'no') ?  'post-author-no' : ''; ?> <?php echo (isset($comments_number['selected']) && $comments_number['selected'] == 'no') ?  'comments-link-no' : ''; ?>">
			<?php if ( $post_author != 'no' ) : ?>
				<span itemscope="itemscope" itemtype="https://schema.org/Person" itemprop="author" class="author"> <?php esc_html_e( 'By', 'the-core' ); ?> <a rel="author" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><span itemprop="name"><?php the_author(); ?></span></a></span>
				<span class="publisher" itemprop="publisher" itemtype="https://schema.org/Organization" itemscope="">
					<span itemprop="name" content="<?php echo esc_attr( bloginfo('name') ); ?>"></span>
					<span itemprop="logo" itemscope itemtype="https://schema.org/ImageObject">
						<meta itemprop="url" content="<?php the_core_logo_url(); ?>">
					</span>
				</span>
			<?php endif; ?>
			<div class="wrap-blog-button">
				<?php the_core_get_blog_button( array( 'permalink' => $the_core_permalink, 'extra_options' => $extra_options ) ); ?>
			</div>
			<div class="wrap-comments-link">
				<?php the_core_get_blog_comments_number( array( 'permalink' => $the_core_permalink, 'extra_options' => $extra_options ) ); ?>
			</div>
		</footer>
	</div>
</article>