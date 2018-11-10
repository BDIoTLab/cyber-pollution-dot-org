<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$id_to_class = array(
	'1_6' => 'fw-col-sm-2',
	'1_5' => 'fw-col-sm-1-5',
	'1_4' => 'fw-col-sm-3',
	'1_3' => 'fw-col-sm-4',
	'1_2' => 'fw-col-sm-6',
	'2_3' => 'fw-col-sm-8',
	'3_4' => 'fw-col-sm-9',
	'1_1' => 'fw-col-sm-12'
);

// height
$column_height = $wrap_col_inner_class = '';
if( isset($atts['column_height']['selected']) && $atts['column_height']['selected'] == 'custom'){
	$column_height = 'height: '.(int)$atts['column_height']['custom']['height'].'px;';
	$wrap_col_inner_class .= ' fw-column-height-custom';
}

// border
$border_style = $border_class = '';
if ( isset( $atts['border_group'] ) && $atts['border_group']['selected'] == 'yes' ) {
	if ( ! empty( $atts['border_group']['yes']['border_size'] ) ) {
		$border_style .= 'border-width: ' . $atts['border_group']['yes']['border_size'] . 'px;';
	}

	if ( $atts['border_group']['yes']['border_color']['id'] == 'fw-custom' ) {
		if ( ! empty( $atts['border_group']['yes']['border_color']['color'] ) ) {
			$border_style .= ' border-color: ' . $atts['border_group']['yes']['border_color']['color'] . ';';
		}
	} else {
		$border_class = 'fw_theme_border_only_' . $atts['border_group']['yes']['border_color']['id'];
	}

	$border_style .= ' border-style: solid;';
}

/*----------------Animation option--------------*/
$data_animation = '';
if ( isset( $atts['animation_group']['selected'] ) ) {
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

$data_parallax = '';
if ( isset( $atts['background_options']['background'] ) && $atts['background_options']['background'] == 'image' && isset($atts['background_options']['image']['parallax']['selected']) && $atts['background_options']['image']['parallax']['selected'] == 'yes' ) :
	$wrap_col_inner_class .= ' parallax-section';
	$data_parallax .= 'data-parallax-background-speed="'.( (int)$atts['background_options']['image']['parallax']['yes']['parallax_speed']).'"';
endif;

$class = '';
// for column class on smartphone
if( isset($atts['responsive']['smartphone_display']['selected']) && $atts['responsive']['smartphone_display']['selected'] == 'yes' && !empty( $atts['responsive']['smartphone_display']['yes']['smartphone_column'] ) ) {
	$class .= ' '.esc_attr($atts['responsive']['smartphone_display']['yes']['smartphone_column']);
}

// for column class on tablet portrait
if( isset($atts['responsive']['tablet_display']['selected']) && $atts['responsive']['tablet_display']['selected'] == 'yes' ) {
	$class .= ' '.esc_attr($atts['responsive']['tablet_display']['yes']['tablet']);
	if( $atts['responsive']['tablet_display']['yes']['tablet'] != '' ) {
		$id_to_class = array(
			'1_6' => 'fw-col-md-2',
			'1_5' => 'fw-col-md-1-5',
			'1_4' => 'fw-col-md-3',
			'1_3' => 'fw-col-md-4',
			'1_2' => 'fw-col-md-6',
			'2_3' => 'fw-col-md-8',
			'3_4' => 'fw-col-md-9',
			'1_1' => 'fw-col-md-12'
		);
	}
}
elseif( isset($atts['responsive']['tablet_display']['selected']) && $atts['responsive']['tablet_display']['selected'] == 'no' ) {
	$class .= ' fw-tablet-hide-element';
}

// for column class on tablet landscape
if( isset($atts['responsive']['tablet_landscape_display']['selected']) && $atts['responsive']['tablet_landscape_display']['selected'] == 'yes' && isset($atts['responsive']['tablet_landscape_display']['yes']['tablet_landscape']) ) {
	$class .= ' '.esc_attr($atts['responsive']['tablet_landscape_display']['yes']['tablet_landscape']);
	if( $atts['responsive']['tablet_landscape_display']['yes']['tablet_landscape'] != '' ) {
		$id_to_class = array(
			'1_6' => 'fw-col-lg-2',
			'1_5' => 'fw-col-lg-1-5',
			'1_4' => 'fw-col-lg-3',
			'1_3' => 'fw-col-lg-4',
			'1_2' => 'fw-col-lg-6',
			'2_3' => 'fw-col-lg-8',
			'3_4' => 'fw-col-lg-9',
			'1_1' => 'fw-col-lg-12'
		);
	}
}

// original column width
$class .= ' '.$id_to_class[ $atts['width'] ];

// for desktop
if( isset($atts['responsive']['desktop_display']['selected']) && $atts['responsive']['desktop_display']['selected'] == 'no' ) {
    $class .= ' fw-desktop-hide-element';
}

// for tablet landscape
if( isset($atts['responsive']['tablet_landscape_display']['selected']) && $atts['responsive']['tablet_landscape_display']['selected'] == 'no' ) {
    $class .= ' fw-tablet-landscape-hide-element';
}

// for display on smartphone
if( isset($atts['responsive']['smartphone_display']['selected']) && $atts['responsive']['smartphone_display']['selected'] == 'no' ) {
	$class .= ' fw-mobile-hide-element';
}

// for unique id
if (isset($atts['unique_id'])) {
	$class .= ' tf-sh-' . esc_attr( $atts['unique_id'] );
}

$class .= ' ' . esc_attr( $atts['class'] ) . ' ' . esc_attr( $atts['default_padding'] );

$column_style = trim($border_style . ' ' . $column_height);
if( !empty($column_style) ) {
	$column_style = 'style="' . $column_style . '"';
}
?>
<div id="<?php echo esc_attr( uniqid( 'column-' ) ); ?>" class="<?php echo trim($class); ?>" <?php echo trim($data_animation); ?>>
	<div class="fw-wrap-col-inner clearfix <?php echo $border_class; ?> <?php echo $wrap_col_inner_class; ?>" <?php echo $column_style;?> <?php echo ($data_parallax); ?> >
		<?php if( $atts['background_options']['background'] == 'image' && $atts['background_options']['image']['overlay_options']['overlay'] == 'yes' ) : ?>
			<div class="fw-main-row-overlay"></div>
		<?php endif; ?>
		<div class="fw-col-inner">
			<?php echo the_core_translate( esc_textarea( do_shortcode( $content ) ) ); ?>
		</div>
	</div>
</div>