<?php if ( ! defined( 'ABSPATH' ) ) {
    die( 'Direct access forbidden.' );
}

/**
 * @var $number
 * @var $before_widget
 * @var $after_widget
 * @var $title
 * @var $posts
 * @var $display_date
 * @var $follow_button
 * @var $page_id
 */
echo $before_widget;
echo $title;
?>
<div class="fw-wrap-facebook-stream">
	<ul>
		<?php
		$date_format = get_option( 'date_format', 'd m y' );
		$return_html = '';
		foreach ( $posts as $post ) {
			if ( isset( $post->message ) ) {
				$return_html .= '<li>';
				$return_html .= the_core_twitter_formating( $post->message, '' );

				if ( isset( $display_date ) ) {
					if ( $display_date == 'on' ) {
						$return_html .= '<div class="facebook-post-date">' . date_i18n( $date_format, strtotime( $post->created_time ) ) . '</div>';
					}
				}
				$return_html .= '</li>';
			}
		}
		echo $return_html;
		?>
	</ul>
	<?php if ( isset( $follow_button ) && ! empty( $follow_button ) ) : ?>
		<div class="fw-btn-facebook">
			<a target="_blank" href="<?php echo esc_url($page_id); ?>"><span><?php echo function_exists('pll__') ? pll__( $follow_button ) : the_core_translate( $follow_button ); ?></span></a>
		</div>
	<?php endif; ?>
</div>
<?php echo $after_widget; ?>