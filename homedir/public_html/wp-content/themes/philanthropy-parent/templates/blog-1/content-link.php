<?php
/**
 * The template for displaying posts in the Link post format
 */

global $post;
if( !isset( $extra_options ) ) $extra_options = array();
$the_core_permalink    = get_permalink();
$the_core_blog_title   = the_core_get_blog_title( array( 'extra_options' => $extra_options ) );
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( "post clearfix post-list-type-1" ); ?> itemscope="itemscope" itemtype="https://schema.org/BlogPosting" itemprop="blogPost">
	<header class="entry-header">
		<span class="post-format"><a class="entry-format" href="<?php echo esc_url( get_post_format_link( 'link' ) ); ?>"><?php echo get_post_format_string( 'link' ); ?></a></span>
        <?php the_core_post_meta( $post->ID, 'post', array( 'extra_options' => $extra_options ) ); ?>
		<<?php echo ($the_core_blog_title); ?> class="entry-title" itemprop="headline"><a href="<?php echo esc_url($the_core_permalink); ?>"><?php the_title(); ?></a></<?php echo ($the_core_blog_title); ?>>
	</header>

	<div class="entry-content clearfix" itemprop="text">
		<?php the_content( '' ); ?>
		<footer class="entry-meta clearfix">
            <?php the_core_get_blog_button( array( 'permalink' => $the_core_permalink, 'extra_options' => $extra_options ) ); ?>
            <?php the_core_get_blog_comments_number( array( 'permalink' => $the_core_permalink, 'extra_options' => $extra_options ) ); ?>
		</footer>
	</div>
</article>