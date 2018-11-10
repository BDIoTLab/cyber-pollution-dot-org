<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

/**
 * @var array $atts
 */

if ( empty( $atts['title'] ) && empty( $atts['subtitle'] ) ) {
	return;
}

if( $atts['subtitle'] != '' ) {
	$atts['class'] .= ' fw-heading-with-subtitle';
}

$heading = isset( $atts['heading']['selected'] ) ? $atts['heading']['selected'] : 'h2';

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
if( isset($atts['animation_group']) ) {
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
<div class="fw-heading <?php echo esc_attr( $atts['centered'] ); ?> <?php echo esc_attr( $atts['class'] ); ?> tf-sh-<?php echo esc_attr( $atts['unique_id'] ); ?>" <?php echo ($data_animation); ?>>
	<?php if ($atts['title'] != '') : ?>
		<<?php echo ($heading); ?> class="fw-special-title"><?php echo the_core_translate( esc_attr( $atts['title'] ) ); ?></<?php echo ($heading); ?>>
	<?php endif; ?>

	<?php apply_filters( 'filter_theme_special_heading_separator', $atts ); ?>

	<?php if ( $atts['subtitle'] != '' ) : ?>
		<div class="fw-special-subtitle"><?php echo the_core_translate( esc_attr( $atts['subtitle'] ) ); ?></div>
	<?php endif; ?>
</div>