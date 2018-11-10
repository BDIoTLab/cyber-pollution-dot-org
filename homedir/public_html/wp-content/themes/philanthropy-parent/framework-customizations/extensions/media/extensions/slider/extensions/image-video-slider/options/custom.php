<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
$options = array(
	'width-group'   => array(
		'type'    => 'group',
		'options' => array(
			'image_video_width' => array(
				'type'  => 'short-text',
				'label' => __( 'Image / Video Size', 'the-core' ),
				'value' => '',
				'desc'  => __( 'Select the image / video width in pixels', 'the-core' )
			),
		)
	),
	'subtitle'      => array(
		'type'  => 'text',
		'label' => __( 'Subtitle', 'the-core' ),
		'value' => '',
		'desc'  => __( 'Choose a subtitle for your slide.', 'the-core' )
	),
	'text_position' => array(
		'label'   => __( 'Text Position', 'the-core' ),
		'desc'    => __( 'Select the text position', 'the-core' ),
		'type'    => 'short-select',
		'value'   => 'pull-right',
		'choices' => array(
			'pull-right' => __( 'Left', 'the-core' ),
			'pull-left'  => __( 'Right', 'the-core' ),
		),
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