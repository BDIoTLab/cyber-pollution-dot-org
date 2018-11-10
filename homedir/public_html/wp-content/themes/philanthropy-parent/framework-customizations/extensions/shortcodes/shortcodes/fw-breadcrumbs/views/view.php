<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

if( ! function_exists('fw_ext_breadcrumbs') ) {
	return;
}

$class = '';
// for desktop
if ( isset( $atts['responsive']['desktop_display']['selected'] ) && $atts['responsive']['desktop_display']['selected'] == 'no' ) {
	$class .= ' fw-desktop-hide-element';
}

// for tablet landscape
if ( isset( $atts['responsive']['tablet_landscape_display']['selected'] ) && $atts['responsive']['tablet_landscape_display']['selected'] == 'no' ) {
	$class .= ' fw-tablet-landscape-hide-element';
}

// for tablet portrait
if ( isset( $atts['responsive']['tablet_display']['selected'] ) && $atts['responsive']['tablet_display']['selected'] == 'no' ) {
	$class .= ' fw-tablet-hide-element';
}

// for display on smartphone
if ( isset( $atts['responsive']['smartphone_display']['selected'] ) && $atts['responsive']['smartphone_display']['selected'] == 'no' ) {
	$class .= ' fw-mobile-hide-element';
}

if ( !empty($atts['class']) ) {
	$class .= ' '.$atts['class'];
}
?>
<div class="fw-breadcrumbs-shortcode <?php echo esc_attr( $class ); ?>">
	<?php fw_ext_breadcrumbs(); ?>
</div>