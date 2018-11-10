<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

/**
 * @var array $atts
 */

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
<div class="tf-sh-<?php echo esc_attr($atts['unique_id']); ?> fw-table fw-table-bordered fw-table-hover fw-table-striped <?php echo esc_attr($extra_class); ?>" <?php echo ($data_animation); ?>>
	<table>
		<?php foreach ( $atts['table']['rows'] as $row_key => $row ) : ?>
			<?php if ( $row['name'] == 'heading-row' ) : ?>
				<thead>
				<tr class="<?php echo esc_attr($row['name']); ?>">
					<?php foreach ( $atts['table']['cols'] as $col_key => $col ) : ?>
						<th class="<?php echo ( $col['name'] == 'desc-col' ) ? 'table-col-desc' : 'table-col-default'; ?>">
							<?php echo the_core_translate( esc_textarea( $atts['table']['content'][ $row_key ][ $col_key ]['textarea'] ) ); ?>
						</th>
					<?php endforeach; ?>
				</tr>
				</thead>
			<?php elseif ( $row['name'] == 'default-row' ) : ?>
				<tr class="<?php echo esc_attr($row['name']); ?>">
					<?php foreach ( $atts['table']['cols'] as $col_key => $col ) :?>
						<?php if ( $col['name'] == 'desc-col' ): ?>
							<th class="table-col-desc">
								<?php echo the_core_translate( esc_textarea( $atts['table']['content'][ $row_key ][ $col_key ]['textarea'] ) ); ?>
							</th>
						<?php else: ?>
							<td>
								<?php echo the_core_translate( esc_textarea( $atts['table']['content'][ $row_key ][ $col_key ]['textarea'] ) ); ?>
							</td>
						<?php endif; ?>
					<?php endforeach; ?>
				</tr>
			<?php endif; ?>
		<?php endforeach; ?>
	</table>
</div>