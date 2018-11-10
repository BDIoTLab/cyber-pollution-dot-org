<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

/**
 * @var $map_data_attr
 * @var $atts
 * @var $content
 * @var $tag
 */
$class = isset( $atts['class'] ) ? $atts['class'] : '';

if ( ! isset( $atts['map_pin'] ) || empty( $atts['map_pin'] ) ) {
	$map_data_attr['data-map-pin'] = json_encode( array( 'url' => the_core_include_file_from_child( '/images/map-pin.png' ) ) );
}
elseif ( isset( $atts['map_pin']['url']) ) {
    $map_data_attr['data-map-pin'] = json_encode( array( 'url' => the_core_change_original_link_with_cdn($atts['map_pin']['url']) ) );
}

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

if( isset($atts['unique_id']) ){
	$class .= ' tf-sh-'.esc_attr( $atts['unique_id'] );
}
?>
<div class="wrap-map fw-map <?php echo esc_attr($class); ?>" <?php echo ($data_animation); ?> <?php echo fw_attr_to_html( $map_data_attr ); ?>>
	<div class="fw-map-canvas map"></div>
</div>