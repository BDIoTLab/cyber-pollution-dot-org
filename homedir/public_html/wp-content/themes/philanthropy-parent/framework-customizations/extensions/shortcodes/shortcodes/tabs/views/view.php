<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

if ( empty( $atts['tabs'] ) ) {
	return;
}

if( isset($atts['unique_id']) ){
	$id = 'tab-cont-'.$atts['unique_id'];
}
else{
	$id = uniqid( 'tab-cont-' );
}

// tabs picker
$tabs_picker = $atts['tabs_position_picker'];

switch ( $tabs_picker['tabs_type'] ) {
	case 'two' :
		$type = 'fw-tabs-framed fw-tabs-left';
		break;
	case 'three' :
		$type = 'fw-tabs-minimal fw-tabs-top';
		break;
	case 'four' :
		$type = 'fw-tabs-minimal fw-tabs-left';
		break;
	default :
		$type = 'fw-tabs-framed fw-tabs-top';
		break;
}
$justified_tabs = ( $tabs_picker['tabs_type'] == 'one' || $tabs_picker['tabs_type'] == 'three' ) ? $tabs_picker[ $tabs_picker['tabs_type'] ]['tabs_justified'] : '';

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
<div class="tf-sh-<?php echo esc_attr( $atts['unique_id'] ); ?> fw-tabs <?php echo esc_attr( $type ) . ' ' . esc_attr( $atts['class'] ); ?>" <?php echo ($data_animation); ?>>
	<ul class="nav nav-tabs <?php echo esc_attr($justified_tabs); ?>">
		<?php $the_core_counter_li = 1;
		foreach ( $atts['tabs'] as $tab ) : ?>
			<li <?php echo ( $the_core_counter_li == 1 ) ? 'class="active"' : ''; ?>>
				<a href="#<?php echo esc_attr($id) . '-' . esc_attr($the_core_counter_li); ?>" data-toggle="tab">
					<?php
					if ( $tab['icon_type']['tab_icon'] == 'icon-class' ) {
						$icon = ! empty( $tab['icon_type']['icon-class']['icon_class'] ) ? '<i class="' . $tab['icon_type']['icon-class']['icon_class'] . '"></i>' : '';
					} elseif ( $tab['icon_type']['tab_icon'] == 'upload-icon' ) {
						$icon = ! empty( $tab['icon_type']['upload-icon']['upload-custom-img']['url'] ) ? '<img src="' . esc_url( the_core_change_original_link_with_cdn($tab['icon_type']['upload-icon']['upload-custom-img']['url']) ) . '">' : '';
					} else {
						$icon = '';
					}
					?>

					<?php echo ($icon); ?>
					<span><?php echo the_core_translate( esc_attr( $tab['tab_title'] ) ); ?></span>
				</a>
			</li>
			<?php $the_core_counter_li ++; ?>
		<?php endforeach; ?>
	</ul>

	<div class="tab-content clearfix">
		<?php $the_core_counter_tab = 1;
		foreach ( $atts['tabs'] as $tab ) : ?>
			<div id="<?php echo esc_attr($id) . '-' . esc_attr($the_core_counter_tab); ?>"
			     class="tab-pane fade <?php echo ( $the_core_counter_tab == 1 ) ? 'in active' : ''; ?>">
				<?php if ( ! empty( $tab['tab_content_title'] ) ): ?>
					<h5 class="tab-content-title"><?php echo the_core_translate( esc_attr( $tab['tab_content_title'] ) ); ?></h5>
				<?php endif; ?>

				<?php if ( ! empty( $tab['tab_content'] ) ): ?>
					<?php echo the_core_translate( esc_textarea( do_shortcode( $tab['tab_content'] ) ) ); ?>
				<?php endif; ?>
			</div>
			<?php $the_core_counter_tab ++; endforeach; ?>
	</div>
</div>