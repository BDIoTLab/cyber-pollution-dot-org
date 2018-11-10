<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$the_core_template_directory = get_template_directory_uri();
$the_core_admin_url          = admin_url();
$options            = array(
	'main' => array(
		'title'   => false,
		'type'    => 'box',
		'options' => array(
			'media' => array(
				'title'   => __( 'Post Settings', 'the-core' ),
				'type'    => 'tab',
				'options' => array(
					'post_settings' => array(
						'type'          => 'multi',
						'label'         => false,
						'inner-options' => array(
							'image_alignment' => array(
								'label'   => __( 'Image Alignment', 'the-core' ),
								'type'    => 'image-picker',
								'value'   => fw_get_db_settings_option( 'posts_settings/image_alignment', '' ),
								'desc'    => __( 'Select the featured image alignment', 'the-core' ),
								'help'    => __( 'This option applies on post listing pages and not on the post detail page.', 'the-core' ),
								'choices' => array(
									'fw-block-image-left'  => array(
										'small' => array(
											'height' => 50,
											'src'    => $the_core_template_directory . '/images/image-picker/left.jpg',
											'title'  => __( 'Left', 'the-core' )
										)
									),
									''                     => array(
										'small' => array(
											'height' => 50,
											'src'    => $the_core_template_directory . '/images/image-picker/full-width.jpg',
											'title'  => __( 'Full', 'the-core' )
										)
									),
									'fw-block-image-right' => array(
										'small' => array(
											'height' => 50,
											'src'    => $the_core_template_directory . '/images/image-picker/right.jpg',
											'title'  => __( 'Right', 'the-core' )
										)
									),
								),
							),
							'ratio'             => array(
								'type'    => 'short-select',
								'label'   => __( 'Image Ratio', 'the-core' ),
								'value'   => fw_get_db_settings_option( 'posts_settings/ratio', 'fw-ratio-16-9' ),
								'choices' => array(
									array( // optgroup
										'attr'    => array('label' => __('Original', 'the-core')),
										'choices' => array(
											'fw-original-ratio' => __( 'Original Ratio', 'the-core' ),
										),
									),
									array( // optgroup
										'attr'    => array('label' => __('Landscape', 'the-core')),
										'choices' => array(
											'fw-ratio-16-9' => __( '16-9', 'the-core' ),
											'fw-ratio-4-3'  => __( '4-3', 'the-core' ),
											'fw-ratio-2-1'  => __( '2-1', 'the-core' ),
										),
									),
									array( // optgroup
										'attr'    => array('label' => __('Portrait', 'the-core')),
										'choices' => array(
											'fw-ratio-9-16' => __( '9-16', 'the-core' ),
											'fw-ratio-3-4'  => __( '3-4', 'the-core' ),
											'fw-ratio-1-2'  => __( '1-2', 'the-core' ),
										),
									),
									array( // optgroup
										'attr'    => array('label' => __('Square', 'the-core')),
										'choices' => array(
											'fw-ratio-1'    => __( '1-1', 'the-core' ),
										),
									),
								),
								'desc'    => __( 'Choose the featured image format', 'the-core' )
							),
							'rounded'          => array(
								'type'         => 'switch',
								'value'        => fw_get_db_settings_option( 'posts_settings/rounded', '' ),
								'label'        => __( 'Use Round Image', 'the-core' ),
								'desc'         => __( 'Make the featured image round', 'the-core' ),
								'left-choice'  => array(
									'value' => '',
									'label' => __( 'No', 'the-core' ),
								),
								'right-choice' => array(
									'value' => 'fw-block-image-circle',
									'label' => __( 'Yes', 'the-core' ),
								),
								'help'         => __( 'This option applies on post listing pages and not on the post detail page. Keep in mind that you can modify the default settings for this option from the', 'the-core' ) . ' <a href="' . $the_core_admin_url . 'themes.php?page=fw-settings#fw-options-tab-posts" target="_blank">' . __( 'Posts Tab', 'the-core' ) . '</a> ' . __( 'on the Theme Settings page.', 'the-core' )
							),
							'featured_image'  => array(
								'type'         => 'switch',
								'value'        => fw_get_db_settings_option( 'posts_settings/featured_image', 'yes' ),
								'label'        => __( 'Featured Image', 'the-core' ),
								'desc'         => __( 'Use featured image in single post?', 'the-core' ),
								'left-choice'  => array(
									'value' => 'no',
									'label' => __( 'No', 'the-core' ),
								),
								'right-choice' => array(
									'value' => 'yes',
									'label' => __( 'Yes', 'the-core' ),
								),
								'help'         => __( 'Keep in mind that you can modify the default settings for this option from the', 'the-core' ) . ' <a href="' . $the_core_admin_url . 'themes.php?page=fw-settings#fw-options-tab-posts" target="_blank">' . __( 'Posts Tab', 'the-core' ) . '</a> ' . __( 'on the Theme Settings page.', 'the-core' )
							),
						)
					)
				),
			),
		),
	),
	'side' => array(
		'title'    => __( 'Header Image', 'the-core' ),
		'type'     => 'box',
		'context'  => 'side',
		'priority' => 'low',
		'options'  => array(
			'header_image' => array(
				'label' => __( 'Add Image', 'the-core' ),
				'desc'  => __( 'Upload header image', 'the-core' ),
				'help'  => __( 'You can set a general header image for all your posts and blog categories from the Theme Settings page under the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings#fw-options-tab-posts">.' . __( 'Posts tab', 'the-core' ) . '</a>',
				'type'  => 'upload',
			),
		),
	),
);