<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
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

/*----------------Advanced Styling-------------*/
$quote_sign_position = '';
if ( $atts['quote_simbol'] == 'yes' ) {
	if ( isset( $atts['quote_advanced_styling'] ) ) {
		//quote sign position
		$quote_top  = $atts['quote_advanced_styling']['quote_top'] != '' ? 'top:' . (int) esc_attr( $atts['quote_advanced_styling']['quote_top'] ) . 'px;' : '';
		$quote_left = $atts['quote_advanced_styling']['quote_left'] != '' ? 'left:' . (int) esc_attr( $atts['quote_advanced_styling']['quote_left'] ) . 'px;' : '';

		if ( ! empty( $quote_top ) || ! empty( $quote_left ) ) {
			$quote_sign_position = 'position:relative;' . $quote_top . $quote_left;
			$atts['class'] .= ' fw-quote-position';
		}
	}
}
/*---------------End Styling--------------*/
?>
<blockquote class="fw-quote tf-sh-<?php echo esc_attr( $atts['unique_id'] ); ?> <?php echo esc_attr( $atts['text_align'] ); ?> <?php echo esc_attr( $atts['class'] ); ?>"<?php echo ($data_animation); ?>>
	<?php if ( $atts['quote_simbol'] == 'yes' ): ?>
		<span class="fw-symbols-quote" style="<?php echo ($quote_sign_position); ?>">&ldquo;</span>
	<?php endif; ?>

	<div class="fw-quote-text">
		<?php echo do_shortcode( wpautop( $atts['text'] ) ); ?>
	</div>
	<?php if ( $atts['author'] != '' ) : ?>
		<small class="fw-quote-author">
			<?php if ( $atts['separator'] == 'yes' ) :
				$separator_color_class = $separator_styles = '';

				if ( isset( $atts['separator_advanced_styling'] ) ) {
					$separator_color = '';

					if ( isset( $atts['separator_advanced_styling']['separator_color'] ) ) {
						if ( isset( $atts['separator_advanced_styling']['separator_color']['id'] ) && $atts['separator_advanced_styling']['separator_color']['id'] !== 'fw-custom' ) {
							$separator_color_class = 'fw_theme_bg_' . $atts['separator_advanced_styling']['separator_color']['id'];
						} elseif ( isset( $atts['separator_advanced_styling']['separator_color']['color'] ) && ! empty( $atts['separator_advanced_styling']['separator_color']['color'] ) ) {
							$separator_color = 'background-color:' . $atts['separator_advanced_styling']['separator_color']['color'] . ';';
						}
					}

					//get separator width
					$separator_width = ! empty( $atts['separator_advanced_styling']['separator_width'] ) ? 'width:' . (int) esc_attr( $atts['separator_advanced_styling']['separator_width'] ) . 'px;' : '';
					//get separator height
					$separator_height = ! empty( $atts['separator_advanced_styling']['separator_height'] ) ? 'height:' . (int) esc_attr( $atts['separator_advanced_styling']['separator_height'] ) . 'px;' : '';

					$separator_styles = $separator_color . $separator_width . $separator_height;
				}
				?>
				<span class="fw-quote-author-line <?php echo esc_attr( $separator_color_class );?>" style="<?php echo ($separator_styles); ?>"></span>
			<?php endif; ?>
			<span>
				<?php if ( $atts['author_link'] != '' ) :
					$a_class = '';
					if (strpos($atts['author_link'], "#") !== false && strlen($atts['author_link']) > 1) {
						$a_class = 'anchor';
					}
					?>
					<a class="scroll-to <?php echo esc_attr($a_class); ?>" href="<?php echo esc_url( $atts['author_link'] ); ?>"><?php echo the_core_translate( esc_attr( $atts['author'] ) ); ?></a>
				<?php else : ?>
					<span><?php echo the_core_translate( esc_attr( $atts['author'] ) ); ?></span>
				<?php endif; ?>
			</span>
		</small>
	<?php endif; ?>

</blockquote>