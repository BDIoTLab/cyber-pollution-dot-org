<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
$options = array(
	'subtitle' => array(
		'type'  => 'text',
		'label' => __( 'Subtitle', 'the-core' ),
		'value' => '',
		'desc'  => __( 'Choose a subtitle for your slide.', 'the-core' )
	),
	'button_text' => array(
		'type'  => 'text',
		'label' => __( 'Button Text', 'the-core' ),
		'value' => '',
		'desc'  => __( 'Enter the button text for the button', 'the-core' )
	),
	'button_url' => array(
		'type'  => 'text',
		'label' => __( 'Button URL', 'the-core' ),
		'value' => '#',
		'desc'  => __( 'Enter the button URL', 'the-core' )
	),
);