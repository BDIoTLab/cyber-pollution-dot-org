<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

global $the_core_colors;
$the_core_admin_url          = admin_url();
$the_core_color_settings     = fw_get_db_settings_option( 'color_settings', $the_core_colors );
$the_core_template_directory = get_template_directory_uri();
$options            = array(
	'unique_id'     => array(
		'type' => 'unique'
	),
	'gallery_style'   => array(
		'label'   => __( 'Style', 'the-core' ),
		'type'    => 'image-picker',
		'value'   => 'style1',
		'desc'    => __( 'Select the prefered gallery display style', 'the-core' ),
		'choices' => array(
			'fw-gallery-type1' => array(
				'small' => array(
					'height' => 75,
					'src'    => $the_core_template_directory . '/images/image-picker/fw-gallery-1.jpg'
				),
				'large' => array(
					'height' => 214,
					'src'    => $the_core_template_directory . '/images/image-picker/fw-gallery-1.jpg'
				),
			),
			'fw-gallery-type2' => array(
				'small' => array(
					'height' => 75,
					'src'    => $the_core_template_directory . '/images/image-picker/fw-gallery-2.jpg'
				),
				'large' => array(
					'height' => 214,
					'src'    => $the_core_template_directory . '/images/image-picker/fw-gallery-2.jpg'
				),
			),
			'fw-gallery-type3' => array(
				'small' => array(
					'height' => 75,
					'src'    => $the_core_template_directory . '/images/image-picker/fw-gallery-3.jpg'
				),
				'large' => array(
					'height' => 214,
					'src'    => $the_core_template_directory . '/images/image-picker/fw-gallery-3.jpg'
				),
			),
			'fw-gallery-type4' => array(
				'small' => array(
					'height' => 75,
					'src'    => $the_core_template_directory . '/images/image-picker/fw-gallery-4.jpg'
				),
				'large' => array(
					'height' => 214,
					'src'    => $the_core_template_directory . '/images/image-picker/fw-gallery-4.jpg'
				),
			),
			'fw-gallery-type5' => array(
				'small' => array(
					'height' => 75,
					'src'    => $the_core_template_directory . '/images/image-picker/fw-gallery-5.jpg'
				),
				'large' => array(
					'height' => 214,
					'src'    => $the_core_template_directory . '/images/image-picker/fw-gallery-5.jpg'
				),
			),
		),
	),
	'gallery_group'   => array(
		'type'    => 'group',
		'options' => array(
			'gallery_advanced_styling' => array(
				'attr'          => array(
					'data-advanced-for' => 'gallery_advanced_styling',
					'class'             => 'fw-advanced-button'
				),
				'type'          => 'popup',
				'label'         => __( 'Custom Style', 'the-core' ),
				'desc'          => __( 'Change the style / typography of this shortcode', 'the-core' ),
				'button'        => __( 'Styling', 'the-core' ),
				'size'          => 'medium',
				'popup-options' => array(
					'tab_title_group' => array(
						'type'    => 'group',
						'options' => array(
							'title_typography'    => array(
								'label' => __( 'Title', 'the-core' ),
								'type'  => 'tf-typography',
								'value' => array(
									'family'         => 'Crimson Text',
									'size'           => 19,
									'line-height'    => 19,
									'letter-spacing' => 0,
								)
							),
							'subtitle_typography' => array(
								'label' => __( 'Subtitle', 'the-core' ),
								'type'  => 'tf-typography',
								'value' => array(
									'family'         => 'Crimson Text',
									'size'           => 19,
									'line-height'    => 19,
									'letter-spacing' => 0,
								)
							),
							'border_group'      => array(
								'type'    => 'multi-picker',
								'label'   => false,
								'desc'    => false,
								'picker'  => array(
									'selected' => array(
										'type'         => 'switch',
										'value'        => '',
										'label'        => __( 'Image Border', 'the-core' ),
										'desc'         => __( 'Add a border to your gallery images?', 'the-core' ),
										'left-choice'  => array(
											'value' => 'no',
											'label' => __( 'No', 'the-core' ),
										),
										'right-choice' => array(
											'value' => 'yes',
											'label' => __( 'Yes', 'the-core' ),
										)
									),
								),
								'choices' => array(
									'yes' => array(
										'border_size' => array(
											'label'        => __( '', 'the-core' ),
											'desc'         => __( 'Border size in pixels', 'the-core' ),
											'type'         => 'short-text',
											'value'        => '1',
										),
										'border_color' => array(
											'label'   => __( '', 'the-core' ),
											'help'    => __( 'The default color palette can be changed from the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __( 'Colors section', 'the-core' ) . '</a> ' . __( 'found in the Theme Settings page', 'the-core' ),
											'desc'    => __( 'Select border color', 'the-core' ),
											'value'   => '',
											'choices' => $the_core_color_settings,
											'type'    => 'color-palette'
										),
									)
								)
							),
						)
					),
				),
			),
			'images'                   => array(
				'attr'          => array( 'class' => 'gallery_advanced_styling' ),
				'type'          => 'addable-popup',
				'size'          => 'medium',
				'label'         => __( 'Images', 'the-core' ),
				'popup-title'   => __( 'Add/Edit Image', 'the-core' ),
				'desc'          => __( 'Add images', 'the-core' ),
				'template'      => '{{=image_title}}',
				'popup-options' => array(
					'image_title' => array(
						'type'    => 'group',
						'options' => array(
							'image'          => array(
								'type'  => 'upload',
								'label' => __( 'Image', 'the-core' ),
								'desc'  => __( 'Upload a image', 'the-core' )
							),
							'fw_gallery_img_type' => array(
								'label'   => __( '', 'the-core' ),
								'desc'    => __( 'Select the image size', 'the-core' ),
								'attr'    => array( 'class' => 'fw-gallery-image-type' ),
								'value'   => 'fw-gallery-default-item',
								'type'    => 'image-picker',
								'choices' => array(
									'fw-gallery-default-item' => array(
										'small' => array(
											'height' => 75,
											'src'    => $the_core_template_directory . '/images/image-picker/fw-gallery-small-square.jpg'
										),
										'large' => array(
											'height' => 214,
											'src'    => $the_core_template_directory . '/images/image-picker/fw-gallery-small-square.jpg'
										),
									),
									'fw-gallery-square-item' => array(
										'small' => array(
											'height' => 75,
											'src'    => $the_core_template_directory . '/images/image-picker/fw-gallery-large-square.jpg'
										),
										'large' => array(
											'height' => 214,
											'src'    => $the_core_template_directory . '/images/image-picker/fw-gallery-large-square.jpg'
										),
									),
									'fw-gallery-rectangle-item' => array(
										'small' => array(
											'height' => 75,
											'src'    => $the_core_template_directory . '/images/image-picker/fw-gallery-rectangle.jpg'
										),
										'large' => array(
											'height' => 214,
											'src'    => $the_core_template_directory . '/images/image-picker/fw-gallery-rectangle.jpg'
										),
									),
								),
							),
							'image_title'    => array(
								'type'  => 'text',
								'label' => __( 'Title', 'the-core' ),
								'desc'  => __( 'Enter the title', 'the-core' )
							),
							'image_subtitle' => array(
								'type'  => 'text',
								'label' => __( 'Subtitle', 'the-core' ),
								'desc'  => __( 'Enter the subtitle', 'the-core' )
							),
							'link'           => array(
								'type'  => 'text',
								'label' => __( 'Link', 'the-core' ),
								'desc'  => __( 'Enter the link', 'the-core' ),
								'value' => '#'
							),
							'overlay_color'  => array(
								'label'   => __( 'Overlay Color', 'the-core' ),
								'help'    => __( 'The default color palette can be changed from the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-styling">' . __( 'Styling section', 'the-core' ) . '</a> ' . __( 'found in the Theme Settings page', 'the-core' ),
								'desc'    => __( 'Select the overlay color', 'the-core' ),
								'value'   => '',
								'choices' => $the_core_color_settings,
								'type'    => 'color-palette'
							),
						)
					),
				)
			),
			'prettyphoto'     => array(
				'type'         => 'switch',
				'label'        => __( '', 'the-core' ),
				'desc'         => __( 'Open images with prettyPhoto?', 'the-core' ),
				'value'        => 'yes',
				'right-choice' => array(
					'value' => 'yes',
					'label' => __( 'Yes', 'the-core' ),
				),
				'left-choice'  => array(
					'value' => 'no',
					'label' => __( 'No', 'the-core' ),
				),
			),
		)
	),
	'titles_on_hover' => array(
		'type'    => 'multi-picker',
		'label'   => false,
		'desc'    => false,
		'picker'  => array(
			'selected' => array(
				'type'         => 'switch',
				'label'        => __( 'Title Display', 'the-core' ),
				'desc'         => __( 'When do you want the title to be displayed?', 'the-core' ),
				'value'        => 'yes',
				'right-choice' => array(
					'value' => 'yes',
					'label' => __( 'On hover', 'the-core' ),
				),
				'left-choice'  => array(
					'value' => 'no',
					'label' => __( 'Always', 'the-core' ),
				),
			),
		)
	),
	'subtitles_on_hover' => array(
		'type'    => 'multi-picker',
		'label'   => false,
		'desc'    => false,
		'picker'  => array(
			'selected' => array(
				'type'         => 'switch',
				'label'        => __( 'Description Display', 'the-core' ),
				'desc'         => __( 'When do you want the description to be displayed?', 'the-core' ),
				'value'        => 'yes',
				'right-choice' => array(
					'value' => 'yes',
					'label' => __( 'On hover', 'the-core' ),
				),
				'left-choice'  => array(
					'value' => 'no',
					'label' => __( 'Always', 'the-core' ),
				),
			),
		)
	),
	'fw_gallery_gap' => array(
		'type' => 'short-slider',
		'value' => 0,
		'properties' => array(
			'min' => 0,
			'max' => 50,
			'sep' => 1,
		),
		'label' => __('Gap Between Images', 'the-core'),
		'desc' => __('Select the gap between images in pixels', 'the-core'),
	),
	'animation_group' => array(
		'type'    => 'multi-picker',
		'label'   => false,
		'desc'    => false,
		'picker'  => array(
			'selected' => array(
				'type'         => 'switch',
				'label'        => __( 'Animation', 'the-core' ),
				'help'         => __( 'Enables you to create an animation entrance or exit for this shortcode. Demo previews for the animations can be found <a target="_blank" href="https://daneden.github.io/animate.css/">here</a>.', 'the-core' ),
				'value'        => 'no',
				'right-choice' => array(
					'value' => 'yes',
					'label' => __( 'Yes', 'the-core' ),
				),
				'left-choice'  => array(
					'value' => 'no',
					'label' => __( 'No', 'the-core' ),
				),
			),
		),
		'choices' => array(
			'yes' => array(
				'animation' => array(
					'label' => __( 'Type & Delay', 'the-core' ),
					'desc'  => __( 'The type and delay in milliseconds (previews on <a target="_blank" href="https://daneden.github.io/animate.css/">https://daneden.github.io/animate.css/</a>)', 'the-core' ),
					'type'  => 'tf-animation',
					'value' => array(
						'animation' => 'fadeInUp',
						'delay'     => '200'
					)
				),
			),
		),
	),
	'responsive'         => array(
		'attr'          => array( 'class' => 'fw-advanced-button' ),
		'type'          => 'popup',
		'label'         => __( 'Responsive Behavior', 'the-core' ),
		'button'        => __( 'Settings', 'the-core' ),
		'size'          => 'medium',
		'popup-options' => array(
            'desktop_display'     => array(
                'type'    => 'multi-picker',
                'label'   => false,
                'desc'    => false,
                'picker'  => array(
                    'selected' => array(
                        'type'         => 'switch',
                        'value'        => 'yes',
                        'label'        => __( 'Desktop', 'the-core' ),
                        'desc'         => __( 'Display this shortcode on desktop?', 'the-core' ),
                        'help'         => __( 'Applies to devices with the resolution higher then 1200px (desktops and laptops)', 'the-core' ),
                        'left-choice'  => array(
                            'value' => 'no',
                            'label' => __( 'No', 'the-core' ),
                        ),
                        'right-choice' => array(
                            'value' => 'yes',
                            'label' => __( 'Yes', 'the-core' ),
                        )
                    ),
                ),
            ),
            'tablet_landscape_display'     => array(
                'type'    => 'multi-picker',
                'label'   => false,
                'desc'    => false,
                'picker'  => array(
                    'selected' => array(
                        'type'         => 'switch',
                        'value'        => 'yes',
                        'label'        => __( 'Tablet Landscape', 'the-core' ),
                        'desc'         => __( 'Display this shortcode on tablet landscape?', 'the-core' ),
                        'help'         => __( 'Applies to devices with the resolution between 992px - 1199px (tablet landscape)', 'the-core' ),
                        'left-choice'  => array(
                            'value' => 'no',
                            'label' => __( 'No', 'the-core' ),
                        ),
                        'right-choice' => array(
                            'value' => 'yes',
                            'label' => __( 'Yes', 'the-core' ),
                        )
                    ),
                ),
            ),
            'tablet_display'     => array(
                'type'    => 'multi-picker',
                'label'   => false,
                'desc'    => false,
                'picker'  => array(
                    'selected' => array(
                        'type'         => 'switch',
                        'value'        => 'yes',
                        'label'        => __( 'Tablet Portrait', 'the-core' ),
                        'desc'         => __( 'Display this shortcode on tablet portrait?', 'the-core' ),
                        'help'         => __( 'Applies to devices with the resolution between 768px - 991px (tablet portrait)', 'the-core' ),
                        'left-choice'  => array(
                            'value' => 'no',
                            'label' => __( 'No', 'the-core' ),
                        ),
                        'right-choice' => array(
                            'value' => 'yes',
                            'label' => __( 'Yes', 'the-core' ),
                        )
                    ),
                ),
                'choices' => array(),
            ),
            'smartphone_display' => array(
                'type'    => 'multi-picker',
                'label'   => false,
                'desc'    => false,
                'picker'  => array(
                    'selected' => array(
                        'type'         => 'switch',
                        'value'        => 'yes',
                        'label'        => __( 'Smartphone', 'the-core' ),
                        'desc'         => __( 'Display this shortcode on smartphone?', 'the-core' ),
                        'help'         => __( 'Applies to devices with the resolution up to 767px (smartphones both portrait and landscape as well as some low-resolution tablets)', 'the-core' ),
                        'left-choice'  => array(
                            'value' => 'no',
                            'label' => __( 'No', 'the-core' ),
                        ),
                        'right-choice' => array(
                            'value' => 'yes',
                            'label' => __( 'Yes', 'the-core' ),
                        )
                    ),
                ),
                'choices' => array(),
            ),
		),
	),
	'class'           => array(
		'attr'  => array( 'class' => 'border-bottom-none' ),
		'label' => __( 'Custom Class', 'the-core' ),
		'desc'  => __( 'Enter custom CSS class', 'the-core' ),
		'type'  => 'text',
		'help'  => __( 'You can use this class to further style this shortcode by adding your custom CSS in the <strong>style.css</strong> file. This file is located on your server in the <strong>child-theme</strong> folder.', 'the-core' ),
		'value' => '',
	),
);