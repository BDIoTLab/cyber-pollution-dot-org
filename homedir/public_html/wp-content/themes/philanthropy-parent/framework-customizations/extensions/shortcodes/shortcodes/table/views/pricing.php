<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

/**
 * @var array $atts
 */
$class_width = 'fw-col-sm-' . ceil( 12 / count( $atts['table']['cols'] ) );

$extra_class = '';
if( isset($atts['class']) ) {
	$extra_class .= $atts['class'];
}

// for desktop
if( isset($atts['responsive']['desktop_display']['selected']) && $atts['responsive']['desktop_display']['selected'] == 'no' ) {
    $extra_class .= ' fw-desktop-hide-element';
}

// for tablet landscape
if( isset($atts['responsive']['tablet_landscape_display']['selected']) && $atts['responsive']['tablet_landscape_display']['selected'] == 'no' ) {
    $extra_class .= ' fw-tablet-landscape-hide-element';
}

// for tablet portrait
if( isset($atts['responsive']['tablet_display']['selected']) && $atts['responsive']['tablet_display']['selected'] == 'no' ) {
	$extra_class .= ' fw-tablet-hide-element';
}

// for display on smartphone
if( isset($atts['responsive']['smartphone_display']['selected']) && $atts['responsive']['smartphone_display']['selected'] == 'no' ) {
	$extra_class .= ' fw-mobile-hide-element';
}

/*----------------Animation option--------------*/
$data_animation = '';
if( isset($atts['animation_group']) ) {
	// get animation class and delay
	if ( $atts['animation_group']['selected'] == 'yes' ) {
		$extra_class .= ' fw-animated-element';
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
<div class="tf-sh-<?php echo esc_attr($atts['unique_id']); ?> fw-price-table  clearfix fw-price-1 <?php echo esc_attr($extra_class); ?>" <?php echo ($data_animation); ?>>
	<?php foreach ( $atts['table']['cols'] as $col_key => $col ): ?>
		<div class="fw-price-col <?php echo ( $col['name'] == 'desc-col' ) ? 'fw-price-caption' : 'fw-price-package'; ?> <?php echo ( $col['name'] == 'highlight-col' ) ? 'fw-price-active' : ''; ?> ">
			<div class="fw-price-inner">
				<?php foreach ( $atts['table']['rows'] as $row_key => $row ): ?>
					<!--heading row type-->
					<?php if ( $row['name'] === 'heading-row' ): ?>
						<?php if ( $col['name'] == 'desc-col' ): ?>
							<?php $value = $atts['table']['content'][ $row_key ][ $col_key ]['textarea']; ?>
							<div class="fw-price-amount fw-heading-description">
								<div class="fw-price-middle">
									<span class="fw-itable">
										<span class="fw-icell desc-col">
											<h2 class="fw-price-caption-title">
												<?php echo ( empty( $value ) && $col['name'] === 'desc-col' ) ? '&nbsp;' : the_core_translate( esc_textarea( $value ) ); ?>
											</h2>
										</span>
									</span>
								</div>
							</div>
						<?php else: ?>
							<div class="fw-price-head <?php echo ($col['name'] == 'highlight-col') ? 'highlight-col' : 'default-col';?>">
								<?php $value = $atts['table']['content'][ $row_key ][ $col_key ]['textarea']; ?>
								<h3 class="fw-price-title <?php echo ($col['name'] == 'highlight-col') ? 'highlight-col' : 'default-col';?>"">
								<?php echo ( empty( $value ) && $col['name'] === 'desc-col' ) ? '&nbsp;' : the_core_translate( esc_textarea( $value ) ); ?>
								</h3>
							</div>
						<?php endif; ?>
						<!--pricing row type-->
					<?php elseif ( $row['name'] === 'pricing-row' ): ?>

						<?php if ( $col['name'] != 'desc-col' ): ?>
							<?php $amount = $atts['table']['content'][ $row_key ][ $col_key ]['amount'] ?>
							<?php $desc = $atts['table']['content'][ $row_key ][ $col_key ]['description']; ?>
							<div class="fw-price-amount">
								<div class="fw-price-middle">
									<span class="fw-itable">
										<span class="fw-icell desc-col">
											<strong class="fw-price-value <?php echo ($col['name'] == 'highlight-col') ? 'highlight-col' : 'default-col'; ?>" ><?php echo ( empty( $value ) && $col['name'] === 'desc-col' ) ? '&nbsp;' : the_core_translate( esc_textarea( $amount ) ); ?></strong>
											<?php if ( $desc != '' ) : ?>
												<span class="fw-price-desc <?php echo ($col['name'] == 'highlight-col') ? 'highlight-col' : 'default-col'; ?>" ><?php echo ( empty( $value ) && $col['name'] === 'desc-col' ) ? '&nbsp;' : the_core_translate( esc_textarea( $desc ) ); ?></span>
											<?php endif; ?>
										</span>
									</span>
								</div>
							</div>
						<?php else: // for pricing title in description row ?>
							<?php $desc = $atts['table']['content'][ $row_key ][ $col_key ]['textarea']; ?>
							<div class="fw-price-amount">
								<div class="fw-price-middle">
									<?php if ( $desc != '' ) : ?>
										<span class="fw-itable">
											<span class="fw-icell desc-col">
												<span class="fw-price-desc fw-price-title-desc <?php echo ($col['name'] == 'highlight-col') ? 'highlight-col' : 'default-col'; ?>" ><?php echo ( empty( $desc ) ) ? '&nbsp;' : the_core_translate( esc_textarea( $desc ) ); ?></span>
											</span>
										</span>
									<?php endif; ?>
								</div>
							</div>
						<?php endif; ?>
					<!--button row type-->
					<?php elseif ( $row['name'] == 'button-row' ) : ?>
						<?php $button = fw_ext( 'shortcodes' )->get_shortcode( 'button' ); ?>
						<div class="fw-price-foot <?php if($col['name'] == 'highlight-col')  echo 'highlight-col'; elseif($col['name'] == 'desc-col') echo 'desc-col'; else echo 'default-col';?>">
							<?php if ( $col['name'] != 'desc-col' && (false === empty( $atts['table']['content'][ $row_key ][ $col_key ]['button'] ) and false === empty( $button )) ) : ?>
								<?php echo the_core_translate( esc_attr( $button->render( $atts['table']['content'][ $row_key ][ $col_key ]['button'] ) ) ); ?>
							<?php else : ?>
								<span>&nbsp;</span>
							<?php endif; ?>
						</div>
					<!--switch row type    -->
					<?php elseif ( $row['name'] === 'switch-row' ) : ?>

						<?php if ( isset( $atts['table']['content'][ $row_key ][ $col_key ]['switch'] ) ) : ?>
							<?php $value = $atts['table']['content'][ $row_key ][ $col_key ]['switch']; ?>
							<div class="fw-switch-row <?php echo ($col['name'] == 'highlight-col') ? 'highlight-col' : 'default-col';?>">
								<span class="fw-itable">
									<span class="fw-icell">
										<i class="fa fw-price-icon-<?php echo esc_attr($value); ?>"></i>
									</span>
								</span>
							</div>
						<?php else : ?>
							<?php $value = $atts['table']['content'][ $row_key ][ $col_key ]['textarea']; ?>
							<div class="fw-switch-row <?php echo ($col['name'] == 'desc-col') ? 'desc-col' : '';?>">
								<span class="fw-itable">
									<span class="fw-icell <?php if($col['name'] == 'highlight-col')  echo 'highlight-col'; elseif($col['name'] == 'desc-col') echo 'desc-col'; else echo 'default-col';?>">
										<?php echo the_core_translate( esc_textarea( $value ) ); ?>
									</span>
								</span>
							</div>
						<?php endif; ?>
					<!-- default row type-->
					<?php elseif ( $row['name'] === 'default-row' ) : ?>
						<div class="fw-price-row <?php if($col['name'] == 'highlight-col')  echo 'highlight-col'; elseif($col['name'] == 'desc-col') echo 'desc-col'; else echo 'default-col';?>">
							<span class="fw-itable">
								<span class="fw-icell <?php if($col['name'] == 'highlight-col')  echo 'highlight-col'; elseif($col['name'] == 'desc-col') echo 'desc-col'; else echo 'default-col';?>">
									<?php $value = $atts['table']['content'][ $row_key ][ $col_key ]['textarea']; ?>
									<?php echo the_core_translate( esc_textarea( $value ) ); ?>
								</span>
							</span>
						</div>
					<?php endif; ?>

				<?php endforeach; ?>
			</div>
		</div>
	<?php endforeach; ?>
</div>