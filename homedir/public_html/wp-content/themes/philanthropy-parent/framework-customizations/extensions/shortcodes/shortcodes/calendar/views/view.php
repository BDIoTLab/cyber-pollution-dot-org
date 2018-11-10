<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 *
 * @var $wrapper_atts
 * @var $default_template
 * @var $atts
 * @var $content
 * @var $tag
 */

if ( function_exists( 'qtrans_getLanguage' ) ) {
	$wrapper_atts['data-ajax-url'] .= '?lang=' . qtrans_getLanguage();
} elseif ( function_exists( 'ppqtrans_getLanguage' ) ) {
	// For those that use qTranslate Plus
	$wrapper_atts['data-ajax-url'] .= '?lang=' . ppqtrans_getLanguage();
}

$wrapper_atts['class'] = fw_akg( 'class', $wrapper_atts, '' ) . ' wrapp_calendar fw-shortcode-calendar-wrapper shortcode-container';
isset( $atts['class'] ) ? $wrapper_atts['class'] .= ' ' . $atts['class'] : '';
$wrapper_atts['class'] .= ' tf-sh-'.esc_attr( $atts['unique_id'] );

// for desktop
if( isset($atts['responsive']['desktop_display']['selected']) && $atts['responsive']['desktop_display']['selected'] == 'no' ) {
    $wrapper_atts['class'] .= ' fw-desktop-hide-element';
}

// for tablet landscape
if( isset($atts['responsive']['tablet_landscape_display']['selected']) && $atts['responsive']['tablet_landscape_display']['selected'] == 'no' ) {
    $wrapper_atts['class'] .= ' fw-tablet-landscape-hide-element';
}

// for tablet portrait
if( isset($atts['responsive']['tablet_display']['selected']) && $atts['responsive']['tablet_display']['selected'] == 'no' ) {
	$wrapper_atts['class'] .= ' fw-tablet-hide-element';
}

// for display on smartphone
if( isset($atts['responsive']['smartphone_display']['selected']) && $atts['responsive']['smartphone_display']['selected'] == 'no' ) {
	$wrapper_atts['class'] .= ' fw-mobile-hide-element';
}

/*----------------Animation option--------------*/
$data_animation = '';
if ( isset( $atts['animation_group'] ) ) {
	// get animation class and delay
	if ( $atts['animation_group']['selected'] == 'yes' ) {
		$wrapper_atts['class'] .= ' fw-animated-element';
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
<div id="calendar" <?php echo fw_attr_to_html( $wrapper_atts ); ?> <?php echo ($data_animation); ?>>

	<div class="fw-shortcode-calendar"></div>

	<div class="page-header hidden-header">
		<div class="calendar-navigation btn-group">
			<button data-calendar-nav="prev" class="prev"><i class="fa fa-angle-left"></i></button>
			<h3><!-- Here will be set the title --></h3>
			<button class="next" data-calendar-nav="next"><i class="fa fa-angle-right"></i></button>
		</div>
	</div>
</div>