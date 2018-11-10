<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
$options = array(
	'text_position' => array(
		'type'    => 'short-select',
		'label'   => __( 'Text Position', 'the-core' ),
		'value'   => 'fw-home-slider-text-align-left',
		'choices' => array(
			'fw-fade-slider-content-align-left'   => __( 'Left', 'the-core' ),
			'fw-fade-slider-content-align-center' => __( 'Center', 'the-core' ),
			'fw-fade-slider-content-align-right'  => __( 'Right', 'the-core' ),
		),
		'desc'    => __( 'Choose the text position for your slide.', 'the-core' )
	),
	'button_text'   => array(
		'type'  => 'text',
		'label' => __( 'Button Text', 'the-core' ),
		'value' => '',
		'desc'  => __( 'Enter the button text for the button', 'the-core' )
	),
	'button_url'    => array(
		'type'  => 'text',
		'label' => __( 'Button URL', 'the-core' ),
		'value' => '#',
		'desc'  => __( 'Enter the button URL', 'the-core' )
	),
);