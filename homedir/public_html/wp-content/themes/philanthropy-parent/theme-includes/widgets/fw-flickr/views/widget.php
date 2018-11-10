<?php
/**
 * @var $instance
 * @var $before_widget
 * @var $after_widget
 * @var $title
 * @var $params
 */

if ( ! empty( $instance ) ) :
	echo $before_widget;
	echo $title;
	$the_core_count = 0;
	$API_KEY  = isset($instance['api_key']) ? $instance['api_key'] : '';
	$Album_ID = isset($instance['album_id']) ? $instance['album_id'] : '';
	$saved_images = get_transient( 'fw_theme_flickr_images_'.$Album_ID.'_'.$instance['number'], array() );
	if( !empty($saved_images) ) : ?>
		<div class="flickr-gallery">
			<div class="fw-wrap-flickr">
				<?php foreach($saved_images as $image_data){
					if($the_core_count == $instance['number']) {
						break;
					} ?>
					<div class="flickr_badge_image">
						<a target="_blank" href="<?php echo esc_url($image_data->href); ?>">
							<img data-src="<?php echo esc_url($image_data->thumbnail); ?>"  src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" class="lazyload"  alt="<?php echo esc_attr($image_data->title); ?>"/>
						</a>
					</div>
				<?php $the_core_count++; } ?>
			</div>
		</div>
	<?php else: ?>
		<div class="flickr-gallery flickr-gallery-js" data-api-key="<?php echo esc_attr($API_KEY); ?>" data-album-id="<?php echo esc_attr($Album_ID); ?>" data-photo-number="<?php echo esc_attr($instance['number']); ?>">
			<div class="fw-wrap-flickr">
				<div class="gallery-container"></div>
			</div>
		</div>
	<?php endif; ?>
	<div class="clearfix"></div>
	<?php echo $after_widget;
endif;