<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

if ( $atts['height'] != 'space-sm' && $atts['height'] != 'space-md' && $atts['height'] != 'space-lg' ) {
	$height         = ' fw-custom-space';
	$custom_spacing = 'style="height:' . (int) $atts['height'] . 'px;"';
} else {
	$height         = $atts['height'];
	$custom_spacing = '';
}

$class = '';
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
?>
<div class="fw-divider-space <?php echo esc_attr($height); ?> <?php echo esc_attr($class); ?> clearfix" <?php echo ($custom_spacing); ?> ></div>