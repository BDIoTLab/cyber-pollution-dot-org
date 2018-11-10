<?php if (!defined('FW')) die('Forbidden');

global $the_core_colors;
$the_core_admin_url           = admin_url();
$the_core_template_directory  = get_template_directory_uri();
$the_core_color_settings      = fw_get_db_settings_option('color_settings', $the_core_colors);

$options = array(
	'unique_id'        => array(
		'type' => 'unique'
	),
	'slides_interval' => array(
		'label' => __('Slides Interval', 'the-core'),
		'desc'  => __('Enter the slides interval in milliseconds', 'the-core'),
		'type'  => 'text',
		'value' => '5000',
	),
	'advanced_styling' => array(
		'attr'          => array(
			'class' => 'fw-advanced-button'
		),
		'type'          => 'popup',
		'label'         => __( 'Custom Style', 'the-core' ),
		'desc'          => __( 'Change the style / typography', 'the-core' ),
		'button'        => __( 'Styling', 'the-core' ),
		'size'          => 'small',
		'popup-options' => array(
			'advanced-group' => array(
				'type'    => 'group',
				'options' => array(
					'title'       => array(
						'label' => __( 'Title', 'the-core' ),
						'type'  => 'tf-typography',
						'value' => array(
							'family'         => 'Playfair Display',
							'size'           => '46',
							'line-height'    => '48',
							'letter-spacing' => '0',
						)
					),
					'bg_color'        => array(
						'label'   => __( 'Caption Bg Color', 'the-core' ),
						'desc'    => __( 'Select caption background color', 'the-core' ),
						'help'    => __( 'The default color palette can be changed from the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __( 'Colors section', 'the-core' ) . '</a> ' . __( 'found in the Theme Settings page', 'the-core' ),
						'value'   => '',
						'choices' => $the_core_color_settings,
						'type'    => 'color-palette'
					),
				)
			)
		),
	),
);