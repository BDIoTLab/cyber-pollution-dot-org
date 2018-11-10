<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

/**
 * @var array $atts
 */
$h     = (isset( $atts['heading']['selected'] ) && !empty($atts['heading']['selected']) ) ? $atts['heading']['selected'] : 'h4';
$class = isset( $atts['class'] ) ? $atts['class'] : '';
$class .= isset( $atts['content_alignment'] ) ? ' '.$atts['content_alignment'] : '';
$class .= ( isset($atts['frame_group']['selected']) && $atts['frame_group']['selected'] == 'fw-block-image-frame' ) ? ' fw-icon-title-border-on' : '';

$icon_type = $atts['icon_type'];
$image_icon_class = '';
if ( $icon_type['icon-box-img'] == 'icon-class' ) {
	// if icon type class
	$icon      = $icon_type['icon-class']['icon_class'];
	$icon_view = '<i class="' . $icon . '"></i>';
}
else {
	// if icon type image
	$image_icon_class = 'fw-custom-icon-image';
	$icon             = $icon_type['upload-icon']['upload-custom-img'];
	if(isset($icon['url'])) $icon_view = '<img src="' . esc_url( the_core_change_original_link_with_cdn($icon['url']) ) . '" alt="" />';
}

// link target
$target = '';
if( isset( $atts['target'] ) && !empty( $atts['target'] ) ) {
    $target .= ' target="'.$atts['target'].'"';
}

if ( isset( $atts['nofollow'] ) && 'yes' == $atts['nofollow'] ) {
	$target .= ' rel="nofollow"';
}

$a_class = '';
if (strpos($atts['link'], "#") !== false && strlen($atts['link']) > 1) {
	$a_class = 'anchor';
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
?>
<div class="fw-icon-title <?php echo esc_attr($atts['icon_position']); ?> clearfix tf-sh-<?php echo esc_attr( $atts['unique_id'] ); ?> <?php echo esc_attr($class); ?>" <?php echo ($data_animation); ?>>
	<?php if ( $atts['icon_position'] == 'fw-icon-title-bottom' ) : ?>
		<div class="fw-icon-title-name">
			<div class="fw-icon-title-name-inner">
				<?php if ( ! empty( $atts['text'] ) ) : ?>
					<?php if ( $atts['link'] != '' ) : ?>
						<<?php echo ($h); ?> class="fw-icon-title-text">
							<a class="<?php echo esc_attr($a_class); ?>" href="<?php echo esc_url( $atts['link'] ); ?>" <?php echo ($target); ?>><?php echo the_core_translate( esc_attr( $atts['text'] ) ); ?></a>
						</<?php echo ($h); ?>>
					<?php else: ?>
						<<?php echo ($h); ?> class="fw-icon-title-text">
							<?php echo the_core_translate( esc_attr( $atts['text'] ) ); ?>
						</<?php echo ($h); ?>>
					<?php endif; ?>
				<?php endif; ?>

				<?php if( !empty($icon) ) : ?>
				<span class="fw-icon-title-icon <?php echo esc_attr($image_icon_class); ?>">
					<?php if ( $atts['link'] != '' ) : ?>
						<a class="<?php echo esc_attr($a_class); ?>" href="<?php echo esc_url( $atts['link'] ); ?>" <?php echo ($target); ?>>
							<?php echo ($icon_view); ?>
						</a>
					<?php else: ?>
						<?php echo ($icon_view); ?>
					<?php endif; ?>
				</span>
			<?php endif; ?>
			</div>
		</div>
	<?php else : ?>
		<div class="fw-icon-title-name">
			<div class="fw-icon-title-name-inner">
				<?php if( !empty($icon) ) : ?>
					<span class="fw-icon-title-icon <?php echo esc_attr($image_icon_class); ?>">
						<?php if ( $atts['link'] != '' ) : ?>
							<a class="<?php echo esc_attr($a_class); ?>" href="<?php echo esc_url( $atts['link'] ); ?>" <?php echo ($target); ?>>
								<?php echo ($icon_view); ?>
							</a>
						<?php else: ?>
							<?php echo ($icon_view); ?>
						<?php endif; ?>
					</span>
				<?php endif; ?>

				<?php if ( ! empty( $atts['text'] ) ) : ?>
				<?php if ( $atts['link'] != '' ) : ?>
					<<?php echo ($h); ?> class="fw-icon-title-text">
						<a class="<?php echo esc_attr($a_class); ?>" href="<?php echo esc_url( $atts['link'] ); ?>" <?php echo ($target); ?>><?php echo the_core_translate( esc_attr( $atts['text'] ) ); ?></a>
					</<?php echo ($h); ?>>
				<?php else: ?>
					<<?php echo ($h); ?> class="fw-icon-title-text">
						<?php echo the_core_translate( esc_attr( $atts['text'] ) ); ?>
					</<?php echo ($h); ?>>
				<?php endif; ?>
			<?php endif; ?>
			</div>
		</div>
	<?php endif; ?>
</div>