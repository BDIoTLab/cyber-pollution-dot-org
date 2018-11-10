<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$forms              = RGFormsModel::get_forms( 1, 'title' );
$forms_options      = array();
$forms_options['0'] = esc_html__( 'Select a Form', 'the-core' );
foreach ( $forms as $form ) {
	$forms_options[ absint( $form->id ) ] = $form->title;
}

$options = array(
	'id'          => array(
		'type'    => 'select',
		'value'   => '',
		'label'   => esc_html__( 'Select Form', 'the-core' ),
		'desc'    => esc_html__( 'Select Gravity Form from the list', 'the-core' ),
		'choices' => $forms_options
	),
	'title'       => array(
		'type'         => 'switch',
		'label'        => __( 'Title', 'the-core' ),
		'desc'         => __( 'Show the form title?', 'the-core' ),
		'value'        => 'true',
		'right-choice' => array(
			'value' => 'true',
			'label' => __( 'Yes', 'the-core' ),
		),
		'left-choice'  => array(
			'value' => 'false',
			'label' => __( 'No', 'the-core' ),
		),
	),
	'description' => array(
		'type'         => 'switch',
		'label'        => __( 'Description', 'the-core' ),
		'desc'         => __( 'Show the form description?', 'the-core' ),
		'value'        => 'true',
		'right-choice' => array(
			'value' => 'true',
			'label' => __( 'Yes', 'the-core' ),
		),
		'left-choice'  => array(
			'value' => 'false',
			'label' => __( 'No', 'the-core' ),
		),
	),
	'ajax'        => array(
		'type'         => 'switch',
		'label'        => __( 'AJAX', 'the-core' ),
		'desc'         => __( 'Use AJAX in form?', 'the-core' ),
		'value'        => 'false',
		'right-choice' => array(
			'value' => 'true',
			'label' => __( 'Yes', 'the-core' ),
		),
		'left-choice'  => array(
			'value' => 'false',
			'label' => __( 'No', 'the-core' ),
		),
	),
	'tabindex' => array(
		'type'  => 'short-text',
		'label' => __( 'Tab Index', 'the-core' ),
		'desc'  => __( 'Add a tab index', 'the-core' ),
		'value' => '',
	),
);