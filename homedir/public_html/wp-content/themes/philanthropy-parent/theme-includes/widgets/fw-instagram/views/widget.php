<?php
/**
 * @var $instance
 * @var $before_widget
 * @var $after_widget
 * @var $title
 */

if ( ! empty( $instance ) ) :
	$instagram_photos = the_core_get_instagram_photos( $instance['user'], $instance['number'] );
	echo $before_widget;
	echo $title;

	if ( ! empty( $instagram_photos ) && ! isset($instagram_photos->errors ) ) : ?>
		<div class="fw-instagram-wrap">
			<ul>
				<?php foreach ( $instagram_photos as $image ) : ?>
					<li><a target="_blank" href="https://www.instagram.com/p/<?php echo $image['code']; ?>/"><img data-src="<?php echo esc_url($image['link']); ?>" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" class="lazyload" alt="" /></a></li>
				<?php endforeach; ?>
			</ul>
			<?php if ( $instance['follow_button'] != '' ) : ?>
				<div class="fw-btn-instagram">
					<a target="_blank" href="https://instagram.com/<?php echo esc_attr($instance['user']); ?>"><span><?php echo function_exists('pll__') ? pll__( $instance['follow_button'] ) : the_core_translate( $instance['follow_button'] ); ?></span></a>
				</div>
			<?php endif; ?>
		</div>
		<div class="clearfix"></div>
	<?php else :
		esc_html_e('Please check the widget data', 'the-core');
	endif;

	echo $after_widget;
endif;
?>