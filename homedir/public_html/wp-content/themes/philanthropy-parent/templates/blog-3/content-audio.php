<?php
/**
 * The template for displaying posts in the Audio post format
 */

global $post;
if( !isset( $extra_options ) ) $extra_options = array();
$the_core_permalink    = get_permalink();
$the_core_blog_title   = the_core_get_blog_title( array( 'extra_options' => $extra_options ) );
$image_alignment       = !empty($the_core_post_options['image_alignment']) ? $image_alignment = $the_core_post_options['image_alignment'].'-align' : '';
$post_author           = the_core_post_type_3_author( array('extra_options' => $extra_options) );
$comments_number       = the_core_post_type_3_comments_number( array('extra_options' => $extra_options) );
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( "post clearfix post-list-type-3" ); ?> itemscope="itemscope" itemtype="https://schema.org/BlogPosting" itemprop="blogPost">
	<header class="entry-header">
		<?php the_core_post_type_3_date($the_core_permalink, array('extra_options' => $extra_options) ); ?>

		<<?php echo ($the_core_blog_title); ?> class="entry-title" itemprop="headline">
			<a href="<?php echo esc_url($the_core_permalink); ?>"><?php the_title(); ?></a>
		</<?php echo ($the_core_blog_title); ?>>
	</header>

	<div class="entry-content clearfix" itemprop="text">
		<?php the_core_post_type_3_categories($post->ID, array('extra_options' => $extra_options)); ?>
		<div class="post-content">
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