<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );

	/**
	 * @var array $atts
	 */
}

$icon = $icon_sublist = '';
$list = 'ul';
if ( $atts['list_type']['selected_value'] == 'list-numbers' ) {
	$list = 'ol';
}

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
<div class="fw-list <?php echo esc_attr( $atts['list_type']['selected_value'] ); ?> <?php echo esc_attr( $atts['separator_group']['selected'] ); ?> tf-sh-<?php echo esc_attr( $atts['unique_id'] ); ?> <?php echo esc_attr( $atts['class'] ); ?>" <?php echo ($data_animation); ?>>
	<<?php echo ($list); ?>>
		<?php if ( ! empty( $atts['list_items'] )) : ?>

			<?php foreach ($atts['list_items'] as $list_item) :

				if ( $atts['list_type']['selected_value'] == 'list-icon' ) {
					$icon_size = ! empty( $atts['list_type']['list-icon']['icon_size'] ) ? 'font-size:' . esc_attr( (int) $atts['list_type']['list-icon']['icon_size'] ) . 'px;' : '';
					$icon      = '<i class="' . $atts['list_type']['list-icon']['icon'] . '" style="' . $icon_size . '"></i>';
				} elseif ( $atts['list_type']['selected_value'] == 'upload-icon' ) {
					if ( isset( $atts['list_type']['upload-icon']['upload-custom-img']['url'] ) && ! empty( $atts['list_type']['upload-icon']['upload-custom-img']['url'] ) ) {
						$icon_size = ! empty( $atts['list_type']['upload-icon']['icon_size'] ) ? 'width:' . esc_attr( (int) $atts['list_type']['upload-icon']['icon_size'] ) . 'px;' : '';
						$icon      = '<img src="' . esc_url( the_core_change_original_link_with_cdn($atts['list_type']['upload-icon']['upload-custom-img']['url']) ) . '"  style="' . $icon_size . '" />';
					}
				} ?>

				<li><?php echo ($icon); ?>

					<?php if ( $list_item['link'] != '' ) {
						$a_class = '';
						if (strpos($list_item['link'], "#") !== false && strlen($list_item['link']) > 1) {
							$a_class = 'class="anchor"';
						}

						if ( isset( $list_item['nofollow'] ) && 'yes' == $list_item['nofollow'] ) {
							$a_class .= ' rel="nofollow"';
						}
						echo '<a '.$a_class.' href="' . esc_url( $list_item['link'] ) . '" target="' . esc_attr( $list_item['target'] ) . '">' . the_core_translate( esc_attr( $list_item['item'] ) ) . '</a>';
					} else {
						echo the_core_translate( esc_attr( $list_item['item'] ) );
					} ?>

					<?php // begin sublist
						if (isset( $list_item['sublist_items'] ) && ! empty( $list_item['sublist_items'] )) : ?>
							<<?php echo ($list); ?>>

							<?php foreach ($list_item['sublist_items'] as $sublist_item) : ?>
								<li><?php echo ($icon); ?>
									<?php if ( $sublist_item['link'] != '' ) {
										$a_class = '';
										if ( strpos( $sublist_item['link'], "#" ) !== false && strlen( $sublist_item['link'] ) > 1 ) {
											$a_class = 'class="anchor"';
										}

										if ( isset( $sublist_item['nofollow_subitem'] ) && 'yes' == $sublist_item['nofollow_subitem'] ) {
											$a_class .= ' rel="nofollow"';
										}

										echo '<a '.$a_class.' href="' . esc_url( $sublist_item['link'] ) . '" target="' . esc_attr( $sublist_item['target_subitem'] ) . '">' . the_core_translate( esc_attr( $sublist_item['subitem'] ) ) . '</a>';
									} else {
										echo the_core_translate( esc_attr( $sublist_item['subitem'] ) );
									} ?>
								</li>
							<?php endforeach; ?>

						</<?php echo ($list); ?>>
					<?php endif; // end sublist ?>
				</li>

			<?php endforeach; ?>
		<?php endif; ?>
	</<?php echo ($list); ?>>
</div>