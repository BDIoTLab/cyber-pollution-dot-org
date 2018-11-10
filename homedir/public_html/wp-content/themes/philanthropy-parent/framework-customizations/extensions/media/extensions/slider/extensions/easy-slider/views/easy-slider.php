<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$the_core_count          = 0;
$easy_slider_id = uniqid( 'easy-slider-' );
$interval       = $data['settings']['extra']['slides_interval'];
$play           = 'true';
if ( $interval == '0' || $interval == '' ) {
	$play     = 'false';
	$interval = '0';
}

$args        = array(
	'img_attr' => array( 'class' => 'attachment-post-thumbnail' ),
	'size'     => 'fw-theme-blog-full',
	'return'   => true,
	'ratio'    => ''
);

$unique_class = '';
if ( isset( $data['settings']['extra']['unique_id'] ) ){
	$unique_class = 'tf-sh-'.$data['settings']['extra']['unique_id'];
}

if( !empty($extra_data) ){
    // for desktop
    if( isset($extra_data['responsive']['desktop_display']['selected']) && $extra_data['responsive']['desktop_display']['selected'] == 'no' ) {
        $unique_class .= ' fw-desktop-hide-element';
    }

    // for tablet landscape
    if( isset($extra_data['responsive']['tablet_landscape_display']['selected']) && $extra_data['responsive']['tablet_landscape_display']['selected'] == 'no' ) {
        $unique_class .= ' fw-tablet-landscape-hide-element';
    }

    // for tablet portrait
	if( isset($extra_data['responsive']['tablet_display']['selected']) && $extra_data['responsive']['tablet_display']['selected'] == 'no' ) {
		$unique_class .= ' fw-tablet-hide-element';
	}

	// for display on smartphone
	if( isset($extra_data['responsive']['smartphone_display']['selected']) && $extra_data['responsive']['smartphone_display']['selected'] == 'no' ) {
		$unique_class .= ' fw-mobile-hide-element';
	}
}
?>
<?php if ( isset( $data['slides'] ) ) : ?>
	<div class="fw-easy-slider <?php echo esc_attr($unique_class); ?>">
		<ul class="fw-easy-slider-container clearfix" id="<?php echo esc_attr($easy_slider_id); ?>" data-play="<?php echo esc_attr($play); ?>" data-slides-interval="<?php echo esc_attr($interval); ?>">
			<?php foreach ( $data['slides'] as $id => $slide ): $the_core_count ++; ?>
				<?php
				$image = the_core_image( $slide['attachment_id'], $args );
				$link  = '#';
				$extra_class = '';
				if( isset($slide['extra']['link']) ) {
					$link = $slide['extra']['link'];
					if( strpos($slide['extra']['link'], "#") !== false && strlen($slide['extra']['link']) > 1  ) {
						$extra_class = 'anchor';
					}
				}
				?>
				<li data-easy-slider="<?php echo esc_attr($the_core_count); ?>" class="fw-easy-slider-item">
					<div class="fw-block-image-parent">
						<a href="<?php echo esc_url($link); ?>" class="fw-block-image-child fw-ratio-container fw-ratio-16-9 <?php echo esc_attr($extra_class); ?>"><?php echo ($image['img']); ?></a>
					</div>
					<?php if( !empty($slide['title']) ) : ?>
						<a href="<?php echo esc_url($link); ?>" class="fw-easy-slider-title <?php echo esc_attr($extra_class); ?>"><?php echo ($slide['title']); ?></a>
					<?php endif; ?>
				</li>
			<?php endforeach; ?>
		</ul>

		<!-- Easy Slider Caption -->
		<div class="fw-easy-slider-caption">
			<div class="fw-easy-slider-caption-inner">
				<div class="fw-easy-slider-title-clone" id="<?php echo esc_attr($easy_slider_id); ?>-title"></div>

				<a class="fw-easy-slider-prev" id="<?php echo esc_attr($easy_slider_id); ?>-prev" href="#"><i class="fw-easy-slider-icon-left"></i></a>
				<a class="fw-easy-slider-next" id="<?php echo esc_attr($easy_slider_id); ?>-next" href="#"><i class="fw-easy-slider-icon-right"></i></a>
			</div>
		</div>

		<!-- Easy Slider Control -->
		<div class="fw-easy-slider-pagination" id="<?php echo esc_attr($easy_slider_id); ?>-controls"></div>

		<!-- Easy Slider Progressbar -->
		<div class="fw-easy-slider-progress">
			<div class="fw-easy-slider-timer" id="<?php echo esc_attr($easy_slider_id); ?>-timer"></div>
		</div>
	</div>
<?php endif; ?>