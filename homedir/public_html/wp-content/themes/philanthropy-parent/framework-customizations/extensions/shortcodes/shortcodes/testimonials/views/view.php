<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$id      = isset( $atts['unique_id'] ) ? 'testimonials-' . $atts['unique_id'] : uniqid( 'testimonials-' );
$play    = ( $atts['show_in_slider']['yes']['interval'] != '' && $atts['show_in_slider']['yes']['interval'] != '0' ) ? 'true' : 'false';
$h_title = ( isset( $atts['heading']['selected'] ) && ! empty( $atts['heading']['selected'] ) ) ? $atts['heading']['selected'] : 'h3';

// image size
$image_size = $frame_class = '';
if ( ! empty( $atts['image_size'] ) ) {
	$image_size .= ' width: ' . (int) $atts['image_size'] . 'px; height: ' . (int) $atts['image_size'] . 'px;';
}

if ( isset( $atts['frame']['selected'] ) && $atts['frame']['selected'] == 'fw-block-image-frame' ) {
	$frame_class = $atts['frame']['selected'];
}

// for desktop
if ( isset( $atts['responsive']['desktop_display']['selected'] ) && $atts['responsive']['desktop_display']['selected'] == 'no' ) {
	$atts['class'] .= ' fw-desktop-hide-element';
}

// for tablet landscape
if ( isset( $atts['responsive']['tablet_landscape_display']['selected'] ) && $atts['responsive']['tablet_landscape_display']['selected'] == 'no' ) {
	$atts['class'] .= ' fw-tablet-landscape-hide-element';
}

// for tablet portrait
if ( isset( $atts['responsive']['tablet_display']['selected'] ) && $atts['responsive']['tablet_display']['selected'] == 'no' ) {
	$atts['class'] .= ' fw-tablet-hide-element';
}

// for display on smartphone
if ( isset( $atts['responsive']['smartphone_display']['selected'] ) && $atts['responsive']['smartphone_display']['selected'] == 'no' ) {
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

if ( $atts['show_in_slider']['selected_value'] == 'yes' ) {
	$atts['class'] .= ' hide-slider';
}
?>
<div class="fw-testimonials <?php echo esc_attr( $atts['style'] ); ?> tf-sh-<?php echo esc_attr( $atts['unique_id'] ); ?> <?php echo esc_attr( $atts['class'] ); ?>" <?php echo ($data_animation); ?>>
	<?php if ($atts['title'] != '') : ?>
		<<?php echo ($h_title); ?> class="fw-testimonials-title"><?php echo the_core_translate( esc_attr( $atts['title'] ) ); ?></<?php echo ($h_title); ?>>
	<?php endif; ?>

<div class="fw-testimonials-list" id="<?php echo esc_attr( $id ); ?>"
     data-show-in-slider="<?php echo esc_attr( $atts['show_in_slider']['selected_value'] ); ?>"
     data-timeoutDuration="<?php echo esc_attr( $atts['show_in_slider']['yes']['interval'] ); ?>"
     data-animation="<?php echo esc_attr( $atts['show_in_slider']['yes']['effect'] ); ?>"
     data-play="<?php echo esc_attr( $play ); ?>">
	<?php $the_core_counter = 1;
	if ( ! empty( $atts['testimonials'] ) ) :
		foreach ( $atts['testimonials'] as $testimonial ) : $the_core_counter ++; ?>
			<div class="fw-testimonials-item clearfix">
				<?php if ( ! empty( $testimonial['content'] ) && $testimonial['content'] != '<p></p>' ) : ?>
					<div class="fw-testimonials-text">
						<?php echo do_shortcode( the_core_translate( esc_textarea( $testimonial['content'] ) ) ); ?>
					</div>
				<?php endif; ?>
				<div class="fw-testimonials-meta">
					<?php if ( ! empty( $testimonial['author_avatar'] ) ) : ?>
						<div class="fw-testimonials-avatar">
							<div class="fw-testimonials-avatar-img fw-ratio-container fw-ratio-1 <?php echo esc_attr($frame_class); ?>" style="<?php echo ($image_size); ?>">
								<?php echo the_core_image( $testimonial['author_avatar'], array( 'ratio' => 'fw-ratio-1' ) ); ?>
							</div>
						</div>
					<?php endif; ?>

					<div class="fw-testimonials-author">
						<span class="author-name"><?php echo the_core_translate( esc_attr( $testimonial['author_name'] ) ); ?></span>
						<?php if ( $testimonial['author_job'] != '' ) : ?>
							<em class="author-job"><?php echo the_core_translate( esc_attr( $testimonial['author_job'] ) ); ?></em>
						<?php endif; ?>
						<?php if ( $testimonial['site_name'] != '' ) : ?>
							<span class="fw-testimonials-url">
								<a target="_blank" href="<?php echo esc_url( $testimonial['site_url'] ); ?>"><?php echo esc_attr( $testimonial['site_name'] ); ?></a>
							</span>
						<?php endif; ?>

						<?php if( isset($testimonial['rating_enabled']['selected']) && 'yes' == $testimonial['rating_enabled']['selected'] ) : ?>
							<div class="fw-testimonials-rating">
								<?php $rating = (int)$testimonial['rating_enabled']['yes']['rating']; ?>
								<?php for ( $i = 1; $i <= $rating; $i ++ ) : ?>
									<i class="fa fa-star"></i>
								<?php endfor; ?>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		<?php endforeach ?>
	<?php endif; ?>
</div>

<?php if ( $atts['show_in_slider']['selected_value'] == 'yes' ) : ?>
	<div class="fw-testimonials-arrows">
		<a class="prev" id="<?php echo esc_attr( $id ); ?>-prev" href="#"><i class="fa"></i></a>
		<a class="next" id="<?php echo esc_attr( $id ); ?>-next" href="#"><i class="fa"></i></a>
	</div>
<?php endif; ?>

<div class="fw-testimonials-pagination" id="<?php echo esc_attr( $id ); ?>-controls"></div>
</div>