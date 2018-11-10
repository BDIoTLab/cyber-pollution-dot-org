<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

global $the_core_colors, $the_core_typography;
$the_core_admin_url           = admin_url();
$the_core_template_directory  = get_template_directory_uri();
$the_core_color_settings      = fw_get_db_settings_option('color_settings', $the_core_colors);

$options = array(
	'unique_id'        => array(
		'type' => 'unique'
	),
	'slides_interval'     => array(
		'label' => __( 'Slides Interval', 'the-core' ),
		'desc'  => __( 'Enter the slides interval in milliseconds', 'the-core' ),
		'type'  => 'text',
		'value' => '5000',
	),
	'slider_before_title' => array(
		'label' => __( 'Slider Before Title', 'the-core' ),
		'desc'  => __( 'Enter the slider before title text', 'the-core' ),
		'type'  => 'text',
		'value' => '',
	),
	'description'         => array(
		'label' => __( 'Description', 'the-core' ),
		'desc'  => __( 'Enter some description', 'the-core' ),
		'type'  => 'textarea',
	),
	'slider_link_more'    => array(
		'label' => __( 'Link More', 'the-core' ),
		'desc'  => __( 'Enter the link to all projects', 'the-core' ),
		'type'  => 'text',
		'value' => '',
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
					'subtitle'       => array(
						'label' => __( 'Subtitle', 'the-core' ),
						'type'  => 'tf-typography',
						'value' => array(
							'family'         => 'Montserrat',
							'size'           => '23',
							'line-height'    => '23',
							'letter-spacing' => '0',
						)
					),
					'title_subtitle_bg' => array(
						'label'   => __( 'Title & Subtitle Bg', 'the-core' ),
						'help'    => __( 'The default color palette can be changed from the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __( 'Colors section', 'the-core' ) . '</a> ' . __( 'found in the Theme Settings page', 'the-core' ),
						'desc'    => __( 'Select the title and subtitle background color', 'the-core' ),
						'value'   => '',
						'choices' => $the_core_color_settings,
						'type'    => 'color-palette'
					),
					'description'       => array(
						'label' => __( 'Description', 'the-core' ),
						'type'  => 'tf-typography',
						'value' => array(
							'family'         => 'Montserrat',
							'size'           => '15',
							'line-height'    => '15',
							'letter-spacing' => '0',
						)
					),
					'category_title'       => array(
						'label' => __( 'Category Title', 'the-core' ),
						'type'  => 'tf-typography',
						'value' => array(
							'family'         => 'Playfair Display',
							'size'           => '36',
							'line-height'    => '38',
							'letter-spacing' => '0',
						)
					),
					'projects_number'       => array(
						'label' => __( 'Projects Number', 'the-core' ),
						'type'  => 'tf-typography',
						'value' => array(
							'family'         => 'Montserrat',
							'size'           => '21',
							'line-height'    => '21',
							'letter-spacing' => '0',
						)
					),
				)
			)
		),
	),
);