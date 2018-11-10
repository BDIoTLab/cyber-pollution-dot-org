<?php
/**
 * The template for displaying posts in the Link post format
 */

global $post;
if( !isset( $extra_options ) ) $extra_options = array();
$the_core_permalink    = get_permalink();
$the_core_blog_title   = the_core_get_blog_title( array( 'extra_options' => $extra_options ) );
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( "post clearfix post-list-type-2" ); ?> itemscope="itemscope" itemtype="https://schema.org/BlogPosting" itemprop="blogPost">
	<header class="entry-header">
		<span class="post-format"><a class="entry-format" href="<?php echo esc_url( get_post_format_link( 'link' ) ); ?>"><?php echo get_post_format_string( 'link' ); ?></a></span>
		<<?php echo ($the_core_blog_title); ?> class="entry-title" itemprop="headline"><a href="<?php echo esc_url($the_core_permalink); ?>"><?php the_title(); ?></a></<?php echo ($the_core_blog_title); ?>>
	</header>

	<div class="entry-content clearfix" itemprop="text">
		<?php the_content( '' ); ?>
	</div>

    <?php the_core_post_meta_blog_2( $post->ID, 'post', array( 'extra_options' => $extra_options ) ); ?>
</article>