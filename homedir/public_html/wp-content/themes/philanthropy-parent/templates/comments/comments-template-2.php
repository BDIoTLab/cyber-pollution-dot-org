<?php
if ( ! function_exists( 'fw_theme_comment' ) ) :
	/**
	 * Template for comments and pingbacks.
	 *
	 * To override this walker in a child theme without modifying the comments template
	 * simply create your own fw_theme_comment(), and that function will be used instead.
	 *
	 * Used as a callback by wp_list_comments() for displaying the comments.
	 *
	 */

	function fw_theme_comment( $comment, $args, $depth ) {
		$GLOBALS['comment'] = $comment;

		switch ( $comment->comment_type ) :
			case 'pingback' :
			case 'trackback' :
				?>
				<li class="post pingback">

					<article id="li-comment-<?php comment_ID() ?>" class="comment-body">
						<p><?php esc_html_e( 'Pingback:', 'the-core' ); ?> <?php comment_author_link(); ?></p>
						<div class="comment-entry">
							<?php comment_text(); ?>
							<?php comment_reply_link( array_merge( $args, array(
								'depth'     => $depth,
								'max_depth' => $args['max_depth']
							) ) ); ?>
						</div>
					</article>

				<?php
				break;
			default : ?>
			<li <?php comment_class('comment'); ?> id="li-comment-<?php comment_ID(); ?>">
				<a name="comment-<?php comment_ID() ?>"></a>
				<article id="li-comment-<?php comment_ID() ?>" class="comment-body">
					<div class="comment-avatar">
						<div class="avatar"><?php echo get_avatar( get_comment_author_email(), 55 ); ?></div>
					</div>

					<div class="comment-aside">
						<div class="comment-meta">
							<span class="comment-author">
								<a href="#" class="link-author"><?php comment_author_link(); ?></a>
							</span>
							<span class="comment-date"><?php comment_date(); ?></span>
						</div>
						<?php comment_reply_link( array_merge( $args, array(
							'depth'     => $depth,
							'max_depth' => $args['max_depth'],
							'reply_text' => esc_html__( 'Reply', 'the-core' ).'<i class="reply-icon">&larr;</i>'
						) ) ); ?>
						<div class="comment-content">
							<p><?php comment_text() ?></p>
						</div>
						<?php if ( $comment->comment_approved == '0' ) : ?>
							<em class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'the-core' ); ?></em>
							<br/>
						<?php endif; ?>
					</div><!-- /.comment-aside -->

					<div class="clearfix"></div>
					<div id="comment-<?php comment_ID(); ?>"></div>
					<div class="clearfix"></div>
				</article><!-- /.comment-container -->
				<?php
				break;
		endswitch;
	}
endif; // ends check for fw_theme_comment()