<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

/**
 * Output a review in the HTML5 format.
 *
 * @var object $comment Comment to display.
 * @var int $depth Depth of comment.
 * @var array $args An array of arguments.
 * @var bool $has_children
 * @var int $stars_number
 * @var int $rate
 */
$tag = ( 'div' === $args['style'] ) ? 'div' : 'li';
?>
<<?php echo ($tag); ?> id="comment-<?php comment_ID(); ?>" <?php comment_class( $has_children ? 'comment parent' : 'comment' ); ?>>
<a name="comment-<?php comment_ID() ?>"></a>
<article id="li-comment-<?php comment_ID() ?>" class="comment-body">
	<div class="comment-avatar">
		<div class="avatar"><?php echo get_avatar( $comment, 63 ); ?></div>
	</div>

	<!--Rating-->
	<?php if(!empty($rate)) : ?>
		<div class="wrap-rating listing">
			<div class="rating">
				<?php
				for ( $i = 1; $i <= $stars_number; $i ++ ) {
					$voted = ( $i <= round( $rate ) ) ? ' voted' : '';
					echo '<span class="fa fa-star' . $voted . '" data-vote="' . $i . '"></span>';
				}
				?>
			</div>
		</div>
	<?php endif; ?>
	<!--/Rating-->

	<div class="comment-aside">
		<div class="comment-meta">
				<span class="comment-author">
					<a href="#" class="link-author"><?php comment_author_link(); ?></a>
				</span>
			<span class="comment-date"><?php comment_date(); ?></span>
		</div>
		<div class="comment-content">
			<p><?php echo ($comment->comment_content); ?></p>
		</div>
		<?php if ( $comment->comment_approved == '0' ) : ?>
			<em class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'the-core' ); ?></em>
			<br/>
		<?php endif; ?>
	</div><!-- /.comment-aside -->

	<div class="clearfix"></div>
	<div id="comment-<?php comment_ID(); ?>"></div>
	<div class="clearfix"></div>

</article><!-- #comment-## -->