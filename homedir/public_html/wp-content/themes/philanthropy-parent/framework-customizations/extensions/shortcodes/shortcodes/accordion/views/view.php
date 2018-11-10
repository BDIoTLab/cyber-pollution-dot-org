<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

if ( empty( $atts['tabs'] ) ) {
	return;
}

$id         = 'accordion-'.$atts['unique_id'];
$the_core_count      = 0;
$active_tab = false;

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
<div class="panel-group fw-accordion <?php echo esc_attr( $atts['class'] ); ?> tf-sh-<?php echo esc_attr( $atts['unique_id'] ); ?>" <?php echo ($data_animation); ?> id="<?php echo esc_attr($id); ?>" role="tablist" aria-multiselectable="true">
	<?php foreach ( $atts['tabs'] as $tab ) :
		$the_core_count ++;
		$panel_class   = $icon = '';
		$collapsed     = 'collapsed';
		$aria_expanded = 'false';
		if ( $tab['opened'] == 'opened' && ! $active_tab ) {
			$panel_class   = 'in';
			$collapsed     = '';
			$aria_expanded = 'true';
			$active_tab    = true;
		}

		if ( $tab['icon_type']['tab_icon'] == 'icon-class' && ! empty( $tab['icon_type']['icon-class']['icon_class'] ) ) {
			$icon_size = ! empty( $atts['advanced_styling']['icon_size'] ) ? 'style="font-size:' . esc_attr( (int) $atts['advanced_styling']['icon_size'] ) . 'px;"' : '';
			$icon      = '<i class="fa-fw ' . $tab['icon_type']['icon-class']['icon_class'] . '" ' . $icon_size . '></i>';
		} elseif ( $tab['icon_type']['tab_icon'] == 'upload-icon' && ! empty( $tab['icon_type']['upload-icon']['upload-custom-img'] ) ) {
			$icon_size = ! empty( $atts['advanced_styling']['icon_size'] ) ? 'style="width:' . esc_attr( (int) $atts['advanced_styling']['icon_size'] ) . 'px;"' : '';
			$icon      = '<img src="' . the_core_change_original_link_with_cdn($tab['icon_type']['upload-icon']['upload-custom-img']['url']) . '" alt="" ' . $icon_size . '/>';
		}
		?>
		<div class="panel">
			<div class="panel-heading" role="tab" id="acc-heading-<?php echo esc_attr($id) . '-' . esc_attr($the_core_count); ?>">
				<h5 class="panel-title">
					<a class="<?php echo esc_attr($collapsed); ?>" data-toggle="collapse" data-parent="#<?php echo esc_attr($id); ?>" href="#acc-tab-<?php echo esc_attr($id) . '-' . esc_attr($the_core_count); ?>" aria-expanded="<?php echo esc_attr($aria_expanded); ?>" aria-controls="acc-tab-<?php echo esc_attr($id) . '-' . esc_attr($the_core_count); ?>">
						<?php echo ($icon); ?> <?php echo the_core_translate( esc_attr( $tab['title'] ) ); ?>
					</a>
				</h5>
			</div>
			<div id="acc-tab-<?php echo esc_attr($id) . '-' . esc_attr($the_core_count); ?>" class="panel-collapse collapse <?php echo esc_attr($panel_class); ?>" role="tabpanel" aria-labelledby="acc-heading-<?php echo esc_attr($id) . '-' . esc_attr($the_core_count); ?>">
				<div class="panel-body">
					<?php echo do_shortcode( the_core_translate( esc_textarea( $tab['content'] ) ) ); ?>
				</div>
			</div>
		</div>
	<?php endforeach; ?>
</div>