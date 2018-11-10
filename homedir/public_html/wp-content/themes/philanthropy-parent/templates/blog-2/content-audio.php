<?php
/**
 * The template for displaying posts in the Audio post format
 */

global $post;
if( !isset( $extra_options ) ) $extra_options = array();
$the_core_permalink    = get_permalink();
$the_core_blog_title   = the_core_get_blog_title( array( 'extra_options' => $extra_options ) );
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( "post clearfix post-list-type-2" ); ?> itemscope="itemscope" itemtype="https://schema.org/BlogPosting" itemprop="blogPost">
	<header class="entry-header">
		<span class="post-format"><a class="entry-format" href="<?php echo esc_url( get_post_format_link( 'audio' ) ); ?>"><?php echo get_post_format_string( 'audio' ); ?></a></span>
		<<?php echo ($the_core_blog_title); ?> class="entry-title" itemprop="headline"><a href="<?php echo esc_url($the_core_permalink); ?>"><?php the_title(); ?></a></<?php echo ($the_core_blog_title); ?>>
	</header>

	<div class="entry-content clearfix" itemprop="text">
		<?php
		$content = apply_filters( 'the_content', get_the_content() );
		$audio = false;

		// Only get audio from the content if a playlist isn't present.
		if ( false === strpos( $content, 'wp-playlist-script' ) ) {
			$audio = get_media_embedded_in_content( $content, array( 'audio' ) );
		}

		if ( ! empty( $audio ) ) :
			foreach ( $audio as $audio_html ) {
				echo '<div class="fw-wrap-boxed-media fw-wp-audio-shortcode">';
				echo $audio_html;
				echo '</div><!-- .entry-audio -->';
				break;
			}
		endif;

		the_excerpt();
		?>
	</div>

	<?php the_core_post_meta_blog_2( $post->ID, 'post', array( 'extra_options' => $extra_options ) ); ?>
</article>