<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

if( isset($atts['video_type_picker']) ) {
	$picker = $atts['video_type_picker'];
	if( $picker == 'upload' ) {
		// custom upload
		$video = the_core_server_protocol().$atts[ $picker ]['url'];
	}
	else {
		// youtube or vimeo
		$video = $atts[ $picker ];
	}
}
else {
	// old value
	$video = $atts['video'];
}
$width  = (int) $atts['width'];
$class  = $atts['class'];

// for desktop
if( isset($atts['responsive']['desktop_display']['selected']) && $atts['responsive']['desktop_display']['selected'] == 'no' ) {
    $class .= ' fw-desktop-hide-element';
}

// for tablet landscape
if( isset($atts['responsive']['tablet_landscape_display']['selected']) && $atts['responsive']['tablet_landscape_display']['selected'] == 'no' ) {
    $class .= ' fw-tablet-landscape-hide-element';
}

// for tablet portrait
if( isset($atts['responsive']['tablet_display']['selected']) && $atts['responsive']['tablet_display']['selected'] == 'no' ) {
	$class .= ' fw-tablet-hide-element';
}

// for display on smartphone
if( isset($atts['responsive']['smartphone_display']['selected']) && $atts['responsive']['smartphone_display']['selected'] == 'no' ) {
	$class .= ' fw-mobile-hide-element';
}

/*----------------Animation option--------------*/
$data_animation = '';
if ( isset( $atts['animation_group'] ) ) {
	// get animation class and delay
	if ( $atts['animation_group']['selected'] == 'yes' ) {
		$class .= ' fw-animated-element';
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
<?php if ( ! empty( $video ) ) :
	global $wp_embed;

	$width  = ( is_numeric( $width ) && ( $width > 0 ) ) ? $width : '1920';
	$height = '1080'; // proportional with width of video, but need a default value
	$iframe = $wp_embed->run_shortcode( '[embed width="' . $width . '" height="' . $height . '"]' . trim( $video ) . '[/embed]' );
	?>
	<div class="fw-video tf-sh-<?php echo esc_attr( $atts['unique_id'] ); ?> <?php echo esc_attr($class); ?>" <?php echo ($data_animation); ?>>
		<?php echo do_shortcode( $iframe ); ?>
	</div>
<?php endif; ?>
