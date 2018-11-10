<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$slides     = $atts['slides'];
$auto_slide = $atts['auto_slide'];

$time  = ( $auto_slide['scroll'] == 'true' ) ? (int) $auto_slide['true']['time'] : 'false';
$pause = ( $auto_slide['scroll'] == 'true' ) ? $auto_slide['true']['pause'] : 'false';

$animation = $atts['animation'];
$duration  = (int) $atts['duration'];
$ratio     = isset( $atts['ratio'] ) ? $atts['ratio'] : 'fw-ratio-16-9';
$uniq_id   = isset($atts['unique_id']) ? $atts['unique_id'] : rand( 1, 100 );

// for desktop
if( isset($atts['responsive']['desktop_display']['selected']) && $atts['responsive']['desktop_display']['selected'] == 'no' ) {
    $atts['class'] .= ' fw-desktop-hide-element';
}

// for tablet landscape
if( isset($atts['responsive']['tablet_landscape_display']['selected']) && $atts['responsive']['tablet_landscape_display']['selected'] == 'no' ) {
    $atts['class'] .= ' fw-tablet-landscape-hide-element';
}

// for tablet portrait
if( isset($atts['responsive']['tablet_display']['selected']) && $atts['responsive']['tablet_display']['selected'] == 'no' ) {
	$atts['class'] .= ' fw-tablet-hide-element';
}

// for display on smartphone
if( isset($atts['responsive']['smartphone_display']['selected']) && $atts['responsive']['smartphone_display']['selected'] == 'no' ) {
	$atts['class'] .= ' fw-mobile-hide-element';
}

/*----------------Animation option--------------*/
$data_animation = '';
if ( isset( $atts['animation_group'] ) ) {
	// get animation class and delay
	if ( $atts['animation_group']['selected'] == 'yes' ) {
		$atts['class'] .= ' fw-animated-element';
		// get animation
		if ( ! empty( $atts['animation_group']['yes']['animation']['animation'] ) ) {
			$data_animation .= ' data-animation-type="' . $atts['animation_group']['yes']['animation']['animation'] . '"';
		}

		// get delay
		if ( ! empty( $atts['animation_group']['yes']['animation']['delay'] ) ) {
			$data_animation .= ' data-animation-delay="' . (int) esc_attr( $atts['animation_group']['yes']['animation']['delay'] ) . '"';
		}
	}
}
/*----------------End Animation----------------*/
?>
<?php if ( ! empty( $slides ) ): ?>
	<div class="fw-slider hide-elements tf-sh-<?php echo esc_attr( $atts['unique_id'] ); ?> <?php echo esc_attr($atts['class']); ?>" <?php echo ($data_animation); ?>>
		<div class="fw-slider-container clearfix" id="slider-<?php echo esc_attr($uniq_id); ?>" data-play="<?php echo ($auto_slide['scroll'] == 'true') ? esc_attr($auto_slide['scroll']) : 'false'; ?>" data-timeoutDuration="<?php echo !empty($time) ? $time : 2000; ?>" data-pause="<?php echo esc_attr($pause); ?>" data-animation="<?php echo esc_attr($animation); ?>" data-duration="<?php echo !empty($duration) ? esc_attr($duration) : 200; ?>">
			<?php foreach ( $slides as $slide ): ?>
				<?php if ( ! empty( $slide['slide_img'] ) ): ?>
					<?php
					$args        = array(
						'img_attr' => array( 'class' => 'attachment-post-thumbnail' ),
						'size'     => 'fw-theme-blog-full',
						'return'   => true,
						'ratio'    => $ratio
					);
					$image       = the_core_image( $slide['slide_img'], $args );
					$ratio_class = $ratio;
					?>
					<div class="fw-ratio-container <?php echo esc_attr($ratio_class); ?>">
						<div class="fw-slider-item">
							<?php echo ($image['img']); ?>
							<?php if ( ! empty( $slide['slide_title'] ) ): ?>
								<span class="fw-slider-caption"><?php echo the_core_translate( esc_attr( $slide['slide_title'] ) ); ?></span>
							<?php endif; ?>
						</div>
					</div>
				<?php endif; ?>
			<?php endforeach; ?>
		</div>
		<a class="fw-slider-prev" href="#"><span></span></a>
		<a class="fw-slider-next" href="#"><span></span></a>
		<div class="fw-slider-pagination"></div>
	</div>
<?php endif; ?>