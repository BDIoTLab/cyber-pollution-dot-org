<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
$the_core_template_directory = get_template_directory_uri();
$the_core_admin_url          = admin_url();

$options            = array(
	'side_gallery_type' => array(
		'title'    => __( 'Project Gallery Type', 'the-core' ),
		'type'     => 'box',
		'context'  => 'side',
		'priority' => 'low',
		'options'  => array(
			'gallery_type' => array(
				'label'   => false,
				'type'    => 'image-picker',
				'value'   => 'fw-ratio-16-9',
				'desc'    => __( 'Select the prefered gallery display type', 'the-core' ),
				'choices' => array(
					'fw-ratio-3-4'  => array(
						'small' => array(
							'height' => 45,
							'src'    => $the_core_template_directory . '/images/image-picker/portfolio_portrait.jpg'
						),
						'large' => array(
							'height' => 214,
							'src'    => $the_core_template_directory . '/images/image-picker/portfolio_portrait.jpg'
						),
					),
					'fw-ratio-16-9' => array(
						'small' => array(
							'height' => 45,
							'src'    => $the_core_template_directory . '/images/image-picker/portfolio_landscape.jpg'
						),
						'large' => array(
							'height' => 214,
							'src'    => $the_core_template_directory . '/images/image-picker/portfolio_landscape.jpg'
						),
					),
					'fw-ratio-1' => array(
						'small' => array(
							'height' => 45,
							'src'    => $the_core_template_directory . '/images/image-picker/portfolio_square.jpg'
						),
						'large' => array(
							'height' => 214,
							'src'    => $the_core_template_directory . '/images/image-picker/portfolio_square.jpg'
						),
					),
				),
			),
			'gallery_columns' => array(
				'label'   => __( '', 'the-core' ),
				'desc'    => __( 'Choose the number of columns', 'the-core' ),
				'type'    => 'radio',
				'value'   => 'fw-project-column-3',
				'choices' => array(
					'fw-project-column-2' => __( '2 columns', 'the-core' ),
					'fw-project-column-3' => __( '3 columns', 'the-core' ),
					'fw-project-column-4' => __( '4 columns', 'the-core' ),
				)
			),
		),
	),
	'side'              => array(
		'title'    => __( 'Header Image', 'the-core' ),
		'type'     => 'box',
		'context'  => 'side',
		'priority' => 'low',
		'options'  => array(
			'header_image' => array(
				'label' => __( 'Add Image', 'the-core' ),
				'desc'  => __( 'Upload header image', 'the-core' ),
				'help'  => __( 'You can set a general header image for all your portfolios and portfolio categories from the Theme Settings page under the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-portfolio-posts">' . __( 'Portfolio tab', 'the-core' ) . '</a>',
				'type'  => 'upload',
			),
		),
	),
);