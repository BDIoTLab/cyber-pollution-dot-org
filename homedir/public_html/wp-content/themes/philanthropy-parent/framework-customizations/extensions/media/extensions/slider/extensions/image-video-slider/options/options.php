<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

global $the_core_colors, $the_core_typography;
$the_core_admin_url           = admin_url();
$the_core_template_directory  = get_template_directory_uri();
$the_core_color_settings      = fw_get_db_settings_option('color_settings', $the_core_colors);
$the_core_typography_settings = fw_get_db_settings_option('typography_settings', $the_core_typography);

$options = array(
	'unique_id'        => array(
		'type' => 'unique'
	),
	'slider_height' => array(
		'label' => __( 'Slider Height', 'the-core' ),
		'desc'  => __( 'Enter the slider height in pixels', 'the-core' ),
		'type'  => 'short-text',
		'value' => '700',
	),
	'slider_bg'        => array(
		'label' => __( 'Slider Background', 'the-core' ),
		'desc'  => __( 'Upload an image (1920x997)', 'the-core' ),
		'type'  => 'upload',
		'value' => '',
	),
	'slides_interval'  => array(
		'label' => __( 'Slides Interval', 'the-core' ),
		'desc'  => __( 'Enter the slides interval in milliseconds', 'the-core' ),
		'type'  => 'text',
		'value' => '5000',
	),
	'overlay_options'  => array(
		'type'    => 'multi-picker',
		'label'   => false,
		'desc'    => false,
		'picker'  => array(
			'overlay' => array(
				'type'         => 'switch',
				'label'        => __( 'Overlay Color', 'the-core' ),
				'desc'         => __( 'Enable image overlay color?', 'the-core' ),
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
			'no'  => array(),
			'yes' => array(
				'background'      => array(
					'label'   => __( '', 'the-core' ),
					'desc'    => __( 'Select the overlay color', 'the-core' ),
					'value'   => '',
					'choices' => $the_core_color_settings,
					'type'    => 'color-palette'
				),
				'overlay_opacity' => array(
					'type'       => 'slider',
					'value'      => 80,
					'properties' => array(
						'min' => 0,
						'max' => 100,
						'sep' => 1,
					),
					'label'      => __( '', 'the-core' ),
					'desc'       => __( 'Select the overlay color opacity in %', 'the-core' ),
				)
			),
		),
	),
	'advanced_styling' => array(
		'attr'          => array(
			'class' => 'fw-advanced-button'
		),
		'type'          => 'popup',
		'label'         => __( 'Custom Style', 'the-core' ),
		'desc'          => __( 'Change the style / typography', 'the-core' ),
		'button'        => __( 'Styling', 'the-core' ),
		'size'          => 'medium',
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
					'subtitle'    => array(
						'label' => __( 'Subtitle', 'the-core' ),
						'type'  => 'tf-typography',
						'value' => array(
							'family'         => 'Montserrat',
							'size'           => '23',
							'line-height'    => '23',
							'letter-spacing' => '0',
						)
					),
					'description' => array(
						'label' => __( 'Description', 'the-core' ),
						'type'  => 'tf-typography',
						'value' => array(
							'family'         => 'Montserrat',
							'size'           => '16',
							'line-height'    => '16',
							'letter-spacing' => '0',
						)
					),
					'slider_btn'      => array(
						'attr'    => array( 'class' => 'border-bottom-none' ),
						'type'    => 'group',
						'options' => array(
							'button_options' => array(
								'attr'          => array(
									'data-advanced-for' => 'button-options',
									'class'             => 'fw-advanced-button'
								),
								'type'          => 'popup',
								'label'         => __( 'Custom Style', 'the-core' ),
								'desc'          => __( 'Change the style / typography of this shortcode', 'the-core' ),
								'button'        => __( 'Styling', 'the-core' ),
								'size'          => 'medium',
								'popup-options' => array(
									'style_group'  => array(
										'type'    => 'group',
										'options' => array(
											'style'       => array(
												'type'    => 'multi-picker',
												'label'   => false,
												'desc'    => false,
												'picker'  => array(
													'selected'           => array(
														'label'   => __( 'Style', 'the-core' ),
														'desc'    => __( 'Choose button style', 'the-core' ),
														'type'    => 'image-picker',
                                                        'attr'    => array( 'class' => 'fw-button-style-type' ),
														'value'   => 'fw-btn-1',
														'choices' => array(
															'fw-btn-1' => array(
																'small' => array(
																	'height' => 70,
																	'src'    => $the_core_template_directory . '/images/image-picker/button-style1.jpg'
																),
																'large' => array(
																	'height' => 208,
																	'src'    => $the_core_template_directory . '/images/image-picker/button-style1.jpg'
																),
															),
															'fw-btn-2' => array(
																'small' => array(
																	'height' => 70,
																	'src'    => $the_core_template_directory . '/images/image-picker/button-style2.jpg'
																),
																'large' => array(
																	'height' => 208,
																	'src'    => $the_core_template_directory . '/images/image-picker/button-style2.jpg'
																),
															),
															'fw-btn-3' => array(
																'small' => array(
																	'height' => 70,
																	'src'    => $the_core_template_directory . '/images/image-picker/button-style3.jpg'
																),
																'large' => array(
																	'height' => 208,
																	'src'    => $the_core_template_directory . '/images/image-picker/button-style3.jpg'
																),
															),
                                                            'fw-btn-4' => array(
                                                                'small' => array(
                                                                    'height' => 70,
                                                                    'src'    => $the_core_template_directory . '/images/image-picker/button-style4.jpg'
                                                                ),
                                                                'large' => array(
                                                                    'height' => 208,
                                                                    'src'    => $the_core_template_directory . '/images/image-picker/button-style4.jpg'
                                                                ),
                                                            ),
														),
													),
												),
												'choices' => array(
													'fw-btn-1' => array(
														'border_radius'   => array(
															'label' => __( 'Corner Radius', 'the-core' ),
															'desc'  => __( 'Enter the corner radius in pixels', 'the-core' ),
															'value' => '0',
															'type'  => 'short-text'
														),
													),
													'fw-btn-2' => array(
														'border_radius'   => array(
															'label' => __( 'Corner Radius', 'the-core' ),
															'desc'  => __( 'Enter the corner radius in pixels', 'the-core' ),
															'value' => '0',
															'type'  => 'short-text'
														),
														'border_size' => array(
															'label'        => __( '', 'the-core' ),
															'desc'         => __( 'Border size in pixels', 'the-core' ),
															'type'         => 'short-text',
															'value'        => '1',
														),
													),
													'fw-btn-3' => array(
														'border_size' => array(
															'label'        => __( '', 'the-core' ),
															'desc'         => __( 'Border size in pixels', 'the-core' ),
															'type'         => 'short-text',
															'value'        => '1',
														),
													),
												),
											)
										)
									),
									'btn_color_group' => array(
										'type'    => 'group',
                                        'attr'    => array( 'class' => 'fw-button-color-group' ),
										'options' => array(
											'normal_color' => array(
												'label'   => __( 'Normal Color', 'the-core' ),
												'desc'    => __( 'Select normal color', 'the-core' ),
												'help'    => __( 'The default color palette can be changed from the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __( 'Colors section', 'the-core' ) . '</a> ' . __( 'found in the Theme Settings page', 'the-core' ),
												'value'   => '',
												'choices' => $the_core_color_settings,
												'type'    => 'color-palette'
											),
											'hover_color'  => array(
												'label'   => __( 'Hover Color', 'the-core' ),
												'desc'    => __( 'Select hover color', 'the-core' ),
												'help'    => __( 'The default color palette can be changed from the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __( 'Colors section', 'the-core' ) . '</a> ' . __( 'found in the Theme Settings page', 'the-core' ),
												'value'   => '',
												'choices' => $the_core_color_settings,
												'type'    => 'color-palette'
											),
										)
									),
									'label_group' => array(
										'type'    => 'group',
										'options' => array(
											'text'             => array(
												'label' => __( 'Label', 'the-core' ),
												'type'  => 'tf-typography',
												'value' => array(
													'google_font'    => $the_core_typography_settings['buttons']['google_font'],
													'subset'         => $the_core_typography_settings['buttons']['subset'],
													'variation'      => $the_core_typography_settings['buttons']['variation'],
													'family'         => $the_core_typography_settings['buttons']['family'],
													'style'          => $the_core_typography_settings['buttons']['style'],
													'weight'         => $the_core_typography_settings['buttons']['weight'],
													'size'           => $the_core_typography_settings['buttons']['size'],
													'line-height'    => $the_core_typography_settings['buttons']['line-height'],
													'letter-spacing' => $the_core_typography_settings['buttons']['letter-spacing'],
													'color-palette'  => '',
												)
											),
											'hover_text_color' => array(
												'label'   => __( '', 'the-core' ),
												'desc'    => __( 'Select text hover color', 'the-core' ),
												'help'    => __( 'The default color palette can be changed from the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __( 'Colors section', 'the-core' ) . '</a> ' . __( 'found in the Theme Settings page', 'the-core' ),
												'value'   => '',
												'choices' => $the_core_color_settings,
												'type'    => 'color-palette'
											),
										)
									),
									'btn_size_group'  => array(
										'type'    => 'group',
										'options' => array(
											'size'       => array(
												'type'    => 'multi-picker',
												'label'   => false,
												'desc'    => false,
												'picker'  => array(
													'selected' => array(
														'label'   => __( 'Button Size', 'the-core' ),
														'desc'    => __( 'Choose button size', 'the-core' ),
														'attr'    => array( 'class' => 'fw-checkbox-float-left' ),
														'type'    => 'radio',
														'value'   => 'fw-btn-md',
														'choices' => array(
															'fw-btn-sm' => __( 'Small', 'the-core' ),
															'fw-btn-md' => __( 'Normal', 'the-core' ),
															'fw-btn-lg' => __( 'Large', 'the-core' ),
															'custom'    => __( 'Custom', 'the-core' ),
														)
													),
												),
												'choices' => array(
													'custom' => array(
														'width'  => array(
															'label' => __( 'Width', 'the-core' ),
															'desc'  => __( 'Enter button width in pixels', 'the-core' ),
															'type'  => 'short-text',
															'value' => '',
														),
														'height' => array(
															'label' => __( 'Height', 'the-core' ),
															'desc'  => __( 'Enter button height in pixels', 'the-core' ),
															'type'  => 'short-text',
															'value' => '',
														),
													),
												),
											),
										)
									),
									'icon_group'      => array(
										'type'    => 'group',
										'options' => array(
											'icon_type'     => array(
												'type'    => 'multi-picker',
												'label'   => false,
												'desc'    => false,
												'picker'  => array(
													'tab_icon' => array(
														'label'   => __( 'Icon', 'the-core' ),
														'desc'    => __( 'Select icon type', 'the-core' ),
														'attr'    => array( 'class' => 'fw-checkbox-float-left' ),
														'type'    => 'radio',
														'value'   => 'icon-class',
														'choices' => array(
															'icon-class'  => __( 'Font Awesome', 'the-core' ),
															'upload-icon' => __( 'Custom Upload', 'the-core' ),
														),
													),
												),
												'choices' => array(
													'icon-class'  => array(
														'icon_class' => array(
															'type'  => 'icon',
															'value' => '',
															'label' => '',
														),
													),
													'upload-icon' => array(
														'upload-custom-img' => array(
															'label' => '',
															'type'  => 'upload',
														),
													),
												)
											),
											'icon_position' => array(
												'type'         => 'switch',
												'label'        => __( '', 'the-core' ),
												'desc'         => __( 'Choose the icon position', 'the-core' ),
												'value'        => 'pull-left-icon',
												'right-choice' => array(
													'value' => 'pull-right-icon',
													'label' => __( 'Right', 'the-core' ),
												),
												'left-choice'  => array(
													'value' => 'pull-left-icon',
													'label' => __( 'Left', 'the-core' ),
												),
											),
											'icon_size'     => array(
												'label' => __( 'Icon Size', 'the-core' ),
												'desc'  => __( 'Enter the icon size in pixels', 'the-core' ),
												'value' => '12',
												'type'  => 'short-text'
											),
										)
									),
								),
							),
							'show_bnt'       => array(
								'attr'         => array( 'class' => 'button-options' ),
								'type'         => 'switch',
								'value'        => 'yes',
								'label'        => __( 'Button', 'the-core' ),
								'desc'         => __( 'Show button?', 'the-core' ),
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
				)
			)
		),
	),
);