<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

echo ( isset( $atts['slider'] ) && ! empty( $atts['slider'] ) ) ? do_shortcode( $atts['slider'] ) : '';
