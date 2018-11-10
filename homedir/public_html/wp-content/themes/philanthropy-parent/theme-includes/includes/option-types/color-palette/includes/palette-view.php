<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

/**
 * @var string $id
 * @var  array $option
 * @var  array $data
 * @var  array $data_palette
 * @var  array $custom_choice_key
 */

$html = '<div id="fw-option-color-palette-predefined" class="fw-option fw-option-type-radio">';

$the_core_count = 0;
foreach ( $option['choices'] as $id => $color ) {
	++$the_core_count;
	$choice_id = $option['attr']['id'] . '-' . $id;

	if ( ! empty( $color ) && ( $id != $custom_choice_key ) ) {
		//add border class for white color
		$border = ( $color == '#ffffff' || $color == '#fff' ) ? 'fw-palette-border-white' : '';

		$html .= '<div class="fw-palette-color-'.$the_core_count.'">' . '<label for="' . esc_attr( $choice_id ) . '">
			<span class="fw-palette"><span class="fw-palette-inner ' . $border . '" style="background-color: ' . $color . ';"></span></span>
			<input type="radio" ' . 'name="' . esc_attr( $option['attr']['name'] ) . '[id]" ' . 'value="' . esc_attr( $id ) . '" ' . 'id="' . esc_attr( $choice_id ) . '" ' . ( $option['value'] == $id ? 'checked="checked" ' : '' ) . '></label></div>';
	} elseif ( $id == $custom_choice_key ) {
		$html .= '<div>' .
			'<label for="' . esc_attr( $choice_id ) . '">
				<input type="radio" ' . 'name="' . esc_attr( $option['attr']['name'] ) . '[id]" ' . 'value="' . esc_attr( $id ) . '" ' . 'id="' . esc_attr( $choice_id ) . '" ' . ( $option['value'] == $id ? 'checked="checked" ' : '' ) . '>' .
			'</label>' .
		'</div>';
	}
}

$html .= '</div>';

echo $html;