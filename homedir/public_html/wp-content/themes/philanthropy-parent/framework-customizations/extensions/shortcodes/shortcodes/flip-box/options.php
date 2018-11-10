<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

global $the_core_colors, $the_core_typography;
$the_core_admin_url           = admin_url();
$the_core_template_directory  = get_template_directory_uri();
$the_core_color_settings      = fw_get_db_settings_option( 'color_settings', $the_core_colors );
$the_core_typography_settings = fw_get_db_settings_option( 'typography_settings', $the_core_typography );

$options = array(
	'unique_id'       => array(
		'type' => 'unique'
	),
	'animation_type'  => array(
		'type'    => 'multi-picker',
		'label'   => false,
		'desc'    => false,
		'picker'  => array(
			'selected' => array(
				'label'   => __( 'Animation Type', 'the-core' ),
				'type'    => 'image-picker',
				'value'   => 'fw-flip-box-slide-down-flip',
				'desc'    => __( 'Choose the animation type', 'the-core' ),
				'choices' => array(
					'fw-flip-box-horizontal-flip'  => array(
						'small' => array(
							'height' => 75,
							'src'    => $the_core_template_directory . '/images/image-picker/flip-box1.jpg',
						),
						'large' => array(
							'height' => 208,
							'src'    => $the_core_template_directory . '/images/image-picker/flip-box1.gif'
						),
					),
					'fw-flip-box-vertical-flip'    => array(
						'small' => array(
							'height' => 75,
							'src'    => $the_core_template_directory . '/images/image-picker/flip-box2.jpg',
						),
						'large' => array(
							'height' => 208,
							'src'    => $the_core_template_directory . '/images/image-picker/flip-box2.gif'
						),
					),
					'fw-flip-box-slide-down-flip'  => array(
						'small' => array(
							'height' => 75,
							'src'    => $the_core_template_directory . '/images/image-picker/flip-box3.jpg',
						),
						'large' => array(
							'height' => 208,
							'src'    => $the_core_template_directory . '/images/image-picker/flip-box3.gif'
						),
					),
					'fw-flip-box-slide-up-flip'    => array(
						'small' => array(
							'height' => 75,
							'src'    => $the_core_template_directory . '/images/image-picker/flip-box4.jpg',
						),
						'large' => array(
							'height' => 208,
							'src'    => $the_core_template_directory . '/images/image-picker/flip-box4.gif'
						),
					),
					'fw-flip-box-slide-left-flip'  => array(
						'small' => array(
							'height' => 75,
							'src'    => $the_core_template_directory . '/images/image-picker/flip-box5.jpg',
						),
						'large' => array(
							'height' => 208,
							'src'    => $the_core_template_directory . '/images/image-picker/flip-box5.gif'
						),
					),
					'fw-flip-box-slide-right-flip' => array(
						'small' => array(
							'height' => 75,
							'src'    => $the_core_template_directory . '/images/image-picker/flip-box6.jpg',
						),
						'large' => array(
							'height' => 208,
							'src'    => $the_core_template_directory . '/images/image-picker/flip-box6.gif'
						),
					),
					'fw-flip-box-fade-flip'        => array(
						'small' => array(
							'height' => 75,
							'src'    => $the_core_template_directory . '/images/image-picker/flip-box7.jpg',
						),
						'large' => array(
							'height' => 208,
							'src'    => $the_core_template_directory . '/images/image-picker/flip-box7.gif'
						),
					),
				),
			),
		),
		'choices' => array()
	),
	'front'           => array(
		'attr'          => array(
			'class' => 'fw-advanced-button'
		),
		'type'          => 'popup',
		'label'         => __( 'Front', 'the-core' ),
		'desc'          => __( 'Change the style / typography of this shortcode', 'the-core' ),
		'button'        => __( 'Styling', 'the-core' ),
		'size'          => 'medium',
		'popup-options' => array(
			'title_group'       => array(
				'type'    => 'group',
				'options' => array(
					'title_styling' => array(
						'attr'          => array(
							'data-advanced-for' => 'title-advanced',
							'class'             => 'fw-advanced-button'
						),
						'type'          => 'popup',
						'label'         => __( 'Custom Style', 'the-core' ),
						'desc'          => __( 'Change the style / typography of this shortcode', 'the-core' ),
						'button'        => __( 'Styling', 'the-core' ),
						'size'          => 'medium',
						'popup-options' => array(
							'title' => array(
								'label' => __( 'Title', 'the-core' ),
								'type'  => 'tf-typography',
								'value' => array(
									'google_font'    => $the_core_typography_settings['h4']['google_font'],
									'subset'         => $the_core_typography_settings['h4']['subset'],
									'variation'      => $the_core_typography_settings['h4']['variation'],
									'family'         => $the_core_typography_settings['h4']['family'],
									'style'          => $the_core_typography_settings['h4']['style'],
									'weight'         => $the_core_typography_settings['h4']['weight'],
									'size'           => $the_core_typography_settings['h4']['size'],
									'line-height'    => $the_core_typography_settings['h4']['line-height'],
									'letter-spacing' => $the_core_typography_settings['h4']['letter-spacing'],
									'color-palette'  => '',
								)
							),
						),
					),
					'title'         => array(
						'label' => __( 'Title', 'the-core' ),
						'desc'  => __( 'Enter the title', 'the-core' ),
						'type'  => 'text',
						'attr'  => array( 'class' => 'title-advanced' ),
					),
				),
			),
			'icon_type'         => array(
				'type'    => 'multi-picker',
				'label'   => false,
				'desc'    => false,
				'picker'  => array(
					'selected' => array(
						'label'   => __( 'Icon', 'the-core' ),
						'desc'    => __( 'Select icon type', 'the-core' ),
						'attr'    => array( 'class' => 'fw-checkbox-float-left' ),
						'type'    => 'radio',
						'value'   => 'icon_class',
						'choices' => array(
							'icon_class'  => __( 'Font Awesome', 'the-core' ),
							'icon_upload' => __( 'Custom Upload', 'the-core' ),
						),
					),
				),
				'choices' => array(
					'icon_class'  => array(
						'class' => array(
							'type'  => 'icon',
							'value' => '',
							'label' => '',
						),
						'size'  => array(
							'label' => __( 'Icon Size', 'the-core' ),
							'desc'  => __( 'Enter the icon size in pixels', 'the-core' ),
							'value' => '40',
							'type'  => 'short-text'
						),
						'color' => array(
							'label'   => __( 'Icon Color', 'the-core' ),
							'desc'    => __( 'Select icon color', 'the-core' ),
							'help'    => __( 'The default color palette can be changed from the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __( 'Colors section', 'the-core' ) . '</a> ' . __( 'found in the Theme Settings page', 'the-core' ),
							'value'   => '',
							'choices' => $the_core_color_settings,
							'type'    => 'color-palette'
						),
					),
					'icon_upload' => array(
						'img'  => array(
							'label' => '',
							'type'  => 'upload',
						),
						'size' => array(
							'label' => __( 'Size', 'the-core' ),
							'desc'  => __( 'Enter the icon width in pixels', 'the-core' ),
							'value' => '40',
							'type'  => 'short-text'
						),
					),
				)
			),
			'img_group'         => array(
				'type'    => 'group',
				'options' => array(
					'img'   => array(
						'label' => __( 'Image', 'the-core' ),
						'type'  => 'upload',
					),
					'ratio' => array(
						'type'    => 'short-select',
						'label'   => __( 'Image Format', 'the-core' ),
						'value'   => '',
						'choices' => array(
							array( // optgroup
								'attr'    => array( 'label' => __( 'Original', 'the-core' ) ),
								'choices' => array(
									'fw-original-ratio' => __( 'Original Ratio', 'the-core' ),
								),
							),
							array( // optgroup
								'attr'    => array( 'label' => __( 'Landscape', 'the-core' ) ),
								'choices' => array(
									'fw-ratio-16-9' => __( '16-9', 'the-core' ),
									'fw-ratio-4-3'  => __( '4-3', 'the-core' ),
									'fw-ratio-2-1'  => __( '2-1', 'the-core' ),
								),
							),
							array( // optgroup
								'attr'    => array( 'label' => __( 'Portrait', 'the-core' ) ),
								'choices' => array(
									'fw-ratio-9-16' => __( '9-16', 'the-core' ),
									'fw-ratio-3-4'  => __( '3-4', 'the-core' ),
									'fw-ratio-1-2'  => __( '1-2', 'the-core' ),
								),
							),
							array( // optgroup
								'attr'    => array( 'label' => __( 'Square', 'the-core' ) ),
								'choices' => array(
									'fw-ratio-1' => __( '1-1', 'the-core' ),
								),
							),
						),
						'desc'    => __( 'Choose the image format', 'the-core' )
					),
				)
			),
			'description_group' => array(
				'type'    => 'group',
				'options' => array(
					'description_styling' => array(
						'attr'          => array(
							'data-advanced-for' => 'description-advanced',
							'class'             => 'fw-advanced-button'
						),
						'type'          => 'popup',
						'label'         => __( 'Custom Style', 'the-core' ),
						'desc'          => __( 'Change the style / typography of this shortcode', 'the-core' ),
						'button'        => __( 'Styling', 'the-core' ),
						'size'          => 'medium',
						'popup-options' => array(
							'description' => array(
								'label' => __( 'Description', 'the-core' ),
								'type'  => 'tf-typography',
								'value' => array(
									'google_font'    => $the_core_typography_settings['body_text']['google_font'],
									'subset'         => $the_core_typography_settings['body_text']['subset'],
									'variation'      => $the_core_typography_settings['body_text']['variation'],
									'family'         => $the_core_typography_settings['body_text']['family'],
									'style'          => $the_core_typography_settings['body_text']['style'],
									'weight'         => $the_core_typography_settings['body_text']['weight'],
									'size'           => $the_core_typography_settings['body_text']['size'],
									'line-height'    => $the_core_typography_settings['body_text']['line-height'],
									'letter-spacing' => $the_core_typography_settings['body_text']['letter-spacing'],
									'color-palette'  => '',
								)
							),
						),
					),
					'desc'                => array(
						'attr'       => array( 'class' => 'description-advanced' ),
						'label'      => __( 'Description', 'the-core' ),
						'desc'       => __( 'Enter the description', 'the-core' ),
						'type'       => 'wp-editor',
						'tinymce'    => true,
						'wpautop'    => true,
						'shortcodes' => true,
						'value'      => '',
					),
				)
			),
			'border'            => array(
				'type'    => 'multi-picker',
				'label'   => false,
				'desc'    => false,
				'picker'  => array(
					'selected' => array(
						'type'         => 'switch',
						'value'        => 'no',
						'label'        => __( 'Border', 'the-core' ),
						'desc'         => __( 'Add a border?', 'the-core' ),
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
						'border_size'  => array(
							'label' => __( '', 'the-core' ),
							'desc'  => __( 'Border size in pixels', 'the-core' ),
							'type'  => 'short-text',
							'value' => '1',
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
			'background'        => array(
				'type'         => 'multi-picker',
				'label'        => false,
				'desc'         => false,
				'picker'       => array(
					'background' => array(
						'label'   => __( 'Background', 'the-core' ),
						'desc'    => __( 'Select the background for your column', 'the-core' ),
						'attr'    => array( 'class' => 'fw-checkbox-float-left' ),
						'type'    => 'radio',
						'choices' => array(
							'none'           => __( 'None', 'the-core' ),
							'image'          => __( 'Image', 'the-core' ),
							'color'          => __( 'Color', 'the-core' ),
							'gradient_color' => __( 'Gradient Color', 'the-core' ),
						),
						'value'   => 'none'
					),
				),
				'choices'      => array(
					'none'           => array(),
					'color'          => array(
						'background_color' => array(
							'label'   => __( '', 'the-core' ),
							'help'    => __( 'The default color palette can be changed from the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __( 'Colors section', 'the-core' ) . '</a> ' . __( 'found in the Theme Settings page', 'the-core' ),
							'desc'    => __( 'Select the background color', 'the-core' ),
							'value'   => '',
							'choices' => $the_core_color_settings,
							'type'    => 'color-palette'
						),
					),
					'image'          => array(
						'background_image' => array(
							'label'   => __( '', 'the-core' ),
							'type'    => 'background-image',
							'choices' => array(//	in future may will set predefined images
							)
						),
						'background_color' => array(
							'label'   => __( '', 'the-core' ),
							'help'    => __( 'The default color palette can be changed from the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __( 'Colors section', 'the-core' ) . '</a> ' . __( 'found in the Theme Settings page', 'the-core' ),
							'desc'    => __( 'Select the background color', 'the-core' ),
							'value'   => '',
							'choices' => $the_core_color_settings,
							'type'    => 'color-palette'
						),
						'repeat'           => array(
							'label'   => __( '', 'the-core' ),
							'desc'    => __( 'Select how will the background repeat', 'the-core' ),
							'type'    => 'short-select',
							'attr'    => array( 'class' => 'fw-checkbox-float-left' ),
							'value'   => 'no-repeat',
							'choices' => array(
								'no-repeat' => __( 'No-Repeat', 'the-core' ),
								'repeat'    => __( 'Repeat', 'the-core' ),
								'repeat-x'  => __( 'Repeat-X', 'the-core' ),
								'repeat-y'  => __( 'Repeat-Y', 'the-core' ),
							)
						),
						'bg_position_x'    => array(
							'label'   => __( 'Position', 'the-core' ),
							'desc'    => __( 'Select the horizontal background position', 'the-core' ),
							'type'    => 'short-select',
							'attr'    => array( 'class' => 'fw-checkbox-float-left' ),
							'value'   => '',
							'choices' => array(
								'left'   => __( 'Left', 'the-core' ),
								'center' => __( 'Center', 'the-core' ),
								'right'  => __( 'Right', 'the-core' ),
							)
						),
						'bg_position_y'    => array(
							'label'   => __( '', 'the-core' ),
							'desc'    => __( 'Select the vertical background position', 'the-core' ),
							'type'    => 'short-select',
							'attr'    => array( 'class' => 'fw-checkbox-float-left' ),
							'value'   => '',
							'choices' => array(
								'top'    => __( 'Top', 'the-core' ),
								'center' => __( 'Center', 'the-core' ),
								'bottom' => __( 'Bottom', 'the-core' ),
							)
						),
						'bg_size'          => array(
							'label'   => __( 'Size', 'the-core' ),
							'desc'    => __( 'Select the background size', 'the-core' ),
							'help'    => __( '<strong>Auto</strong> - Default value, the background image has the original width and height.<br><br><strong>Cover</strong> - Scale the background image so that the background area is completely covered by the image.<br><br><strong>Contain</strong> - Scale the image to the largest size such that both its width and height can fit inside the content area.', 'the-core' ),
							'type'    => 'short-select',
							'attr'    => array( 'class' => 'fw-checkbox-float-left' ),
							'value'   => '',
							'choices' => array(
								'auto'    => __( 'Auto', 'the-core' ),
								'cover'   => __( 'Cover', 'the-core' ),
								'contain' => __( 'Contain', 'the-core' ),
							)
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
									'background'            => array(
										'label'   => __( '', 'the-core' ),
										'help'    => __( 'The default color palette can be changed from the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __( 'Colors section', 'the-core' ) . '</a> ' . __( 'found in the Theme Settings page', 'the-core' ),
										'desc'    => __( 'Select the overlay color', 'the-core' ),
										'value'   => '',
										'choices' => $the_core_color_settings,
										'type'    => 'color-palette'
									),
									'overlay_opacity_image' => array(
										'type'       => 'short-slider',
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
					),
					'gradient_color' => array(
						'gradient_orientation' => array(
							'label'   => __( '', 'the-core' ),
							'desc'    => __( 'Select the gradient orientation', 'the-core' ),
							'type'    => 'short-select',
							'choices' => array(
								'horizontal'      => __( 'Horizontal', 'the-core' ) . ' →',
								'vertical'        => __( 'Vertical', 'the-core' ) . ' ↓',
								'diagonal'        => __( 'Diagonal', 'the-core' ) . ' ↘',
								'diagonal_bottom' => __( 'Diagonal', 'the-core' ) . ' ↗',
								'radial'          => __( 'Radial', 'the-core' ) . ' ○',
							),
							'value'   => 'vertical'
						),
						'gradient_bg_color'    => array(
							'type'  => 'gradient',
							'label' => __( '', 'the-core' ),
							'desc'  => __( 'Select the gradient color', 'the-core' ),
							'value' => array(
								'primary'   => '#dddddd',
								'secondary' => '#cccccc',
							),
						),
					),
				),
				'show_borders' => false,
			),
			'front-box-btn'     => array(
				'type'    => 'group',
				'options' => array(
					'front_button' => array(
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
							'style_group'     => array(
								'type'    => 'group',
								'options' => array(
									'style' => array(
										'type'    => 'multi-picker',
										'label'   => false,
										'desc'    => false,
										'picker'  => array(
											'selected' => array(
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
												'border_radius' => array(
													'label' => __( 'Corner Radius', 'the-core' ),
													'desc'  => __( 'Enter the corner radius in pixels', 'the-core' ),
													'value' => '0',
													'type'  => 'short-text'
												),
											),
											'fw-btn-2' => array(
												'border_radius' => array(
													'label' => __( 'Corner Radius', 'the-core' ),
													'desc'  => __( 'Enter the corner radius in pixels', 'the-core' ),
													'value' => '0',
													'type'  => 'short-text'
												),
												'border_size'   => array(
													'label' => __( '', 'the-core' ),
													'desc'  => __( 'Border size in pixels', 'the-core' ),
													'type'  => 'short-text',
													'value' => '1',
												),
											),
											'fw-btn-3' => array(
												'border_size' => array(
													'label' => __( '', 'the-core' ),
													'desc'  => __( 'Border size in pixels', 'the-core' ),
													'type'  => 'short-text',
													'value' => '1',
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
							'label-group'     => array(
								'type'    => 'group',
								'options' => array(
									'label_advanced_styling' => array(
										'attr'          => array(
											'data-advanced-for' => 'button-advanced',
											'class'             => 'fw-advanced-button'
										),
										'type'          => 'popup',
										'label'         => __( 'Custom Style', 'the-core' ),
										'desc'          => __( 'Change the style / typography of this shortcode', 'the-core' ),
										'button'        => __( 'Styling', 'the-core' ),
										'size'          => 'medium',
										'popup-options' => array(
											'advanced-group' => array(
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
											)
										),
									),
									'label'                  => array(
										'label' => __( 'Label', 'the-core' ),
										'attr'  => array( 'class' => 'button-advanced' ),
										'desc'  => __( 'This is the text that appears on your button', 'the-core' ),
										'type'  => 'text',
										'value' => 'Submit'
									),
								)
							),
							'btn_link_group'  => array(
								'type'    => 'group',
								'options' => array(
									'link'          => array(
										'label' => __( 'Link', 'the-core' ),
										'desc'  => __( 'Where should your button link to?', 'the-core' ),
										'type'  => 'text',
										'value' => '#'
									),
									'target'        => array(
										'type'         => 'switch',
										'label'        => __( '', 'the-core' ),
										'desc'         => __( 'Open link in new window?', 'the-core' ),
										'value'        => '_self',
										'right-choice' => array(
											'value' => '_blank',
											'label' => __( 'Yes', 'the-core' ),
										),
										'left-choice'  => array(
											'value' => '_self',
											'label' => __( 'No', 'the-core' ),
										),
									),
									'nofollow' => array(
										'type'         => 'switch',
										'label'        => __( '', 'the-core' ),
										'desc'         => __( 'Add nofollow?', 'the-core' ),
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
									'open_in_popup' => array(
										'type'    => 'multi-picker',
										'label'   => false,
										'desc'    => false,
										'picker'  => array(
											'selected' => array(
												'type'         => 'switch',
												'value'        => 'no',
												'label'        => __( '', 'the-core' ),
												'desc'         => __( 'Open in popup?', 'the-core' ),
												'help'         => __( 'This option will overwrite the Open in new window setting and will work only for images and Vimeo / YouTube videos.', 'the-core' ),
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
									'full_width' => array(
										'type'    => 'multi-picker',
										'label'   => false,
										'desc'    => false,
										'picker'  => array(
											'selected_type' => array(
												'type'         => 'switch',
												'label'        => __( '', 'the-core' ),
												'desc'         => __( 'Make this button full width?', 'the-core' ),
												'value'        => '',
												'right-choice' => array(
													'value' => 'fw-btn-full',
													'label' => __( 'Yes', 'the-core' ),
												),
												'left-choice'  => array(
													'value' => 'default',
													'label' => __( 'No', 'the-core' ),
												),
											),
										),
										'choices' => array(
											'default' => array(
												'btn_alignment' => array(
													'label'   => __( 'Alignment', 'the-core' ),
													'desc'    => __( 'Choose button alignment', 'the-core' ),
													'type'    => 'image-picker',
													'value'   => is_rtl() ? 'text-right' : 'text-left',
													'choices' => array(
														'text-left'   => array(
															'small' => array(
																'height' => 50,
																'src'    => $the_core_template_directory . '/images/image-picker/left-position.jpg',
																'title'  => __( 'Left', 'the-core' )
															),
														),
														'text-center' => array(
															'small' => array(
																'height' => 50,
																'src'    => $the_core_template_directory . '/images/image-picker/center-position.jpg',
																'title'  => __( 'Center', 'the-core' )
															),
														),
														'text-right'  => array(
															'small' => array(
																'height' => 50,
																'src'    => $the_core_template_directory . '/images/image-picker/right-position.jpg',
																'title'  => __( 'Right', 'the-core' )
															),
														),
													),
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
					'show_bnt'     => array(
						'attr'         => array( 'class' => 'button-options' ),
						'type'         => 'switch',
						'value'        => '',
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
		),
	),
	'back'            => array(
		'attr'          => array(
			'class' => 'fw-advanced-button'
		),
		'type'          => 'popup',
		'label'         => __( 'Back', 'the-core' ),
		'desc'          => __( 'Change the style / typography of this shortcode', 'the-core' ),
		'button'        => __( 'Styling', 'the-core' ),
		'size'          => 'medium',
		'popup-options' => array(
			'title_group'       => array(
				'type'    => 'group',
				'options' => array(
					'title_styling' => array(
						'attr'          => array(
							'data-advanced-for' => 'title-advanced',
							'class'             => 'fw-advanced-button'
						),
						'type'          => 'popup',
						'label'         => __( 'Custom Style', 'the-core' ),
						'desc'          => __( 'Change the style / typography of this shortcode', 'the-core' ),
						'button'        => __( 'Styling', 'the-core' ),
						'size'          => 'medium',
						'popup-options' => array(
							'title' => array(
								'label' => __( 'Title', 'the-core' ),
								'type'  => 'tf-typography',
								'value' => array(
									'google_font'    => $the_core_typography_settings['h4']['google_font'],
									'subset'         => $the_core_typography_settings['h4']['subset'],
									'variation'      => $the_core_typography_settings['h4']['variation'],
									'family'         => $the_core_typography_settings['h4']['family'],
									'style'          => $the_core_typography_settings['h4']['style'],
									'weight'         => $the_core_typography_settings['h4']['weight'],
									'size'           => $the_core_typography_settings['h4']['size'],
									'line-height'    => $the_core_typography_settings['h4']['line-height'],
									'letter-spacing' => $the_core_typography_settings['h4']['letter-spacing'],
									'color-palette'  => '',
								)
							),
						),
					),
					'title'         => array(
						'label' => __( 'Title', 'the-core' ),
						'desc'  => __( 'Enter the title', 'the-core' ),
						'type'  => 'text',
						'attr'  => array( 'class' => 'title-advanced' ),
					),
				),
			),
			'icon_type'         => array(
				'type'    => 'multi-picker',
				'label'   => false,
				'desc'    => false,
				'picker'  => array(
					'selected' => array(
						'label'   => __( 'Icon', 'the-core' ),
						'desc'    => __( 'Select icon type', 'the-core' ),
						'attr'    => array( 'class' => 'fw-checkbox-float-left' ),
						'type'    => 'radio',
						'value'   => 'icon_class',
						'choices' => array(
							'icon_class'  => __( 'Font Awesome', 'the-core' ),
							'icon_upload' => __( 'Custom Upload', 'the-core' ),
						),
					),
				),
				'choices' => array(
					'icon_class'  => array(
						'class' => array(
							'type'  => 'icon',
							'value' => '',
							'label' => '',
						),
						'size'  => array(
							'label' => __( 'Icon Size', 'the-core' ),
							'desc'  => __( 'Enter the icon size in pixels', 'the-core' ),
							'value' => '40',
							'type'  => 'short-text'
						),
						'color' => array(
							'label'   => __( 'Icon Color', 'the-core' ),
							'desc'    => __( 'Select icon color', 'the-core' ),
							'help'    => __( 'The default color palette can be changed from the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __( 'Colors section', 'the-core' ) . '</a> ' . __( 'found in the Theme Settings page', 'the-core' ),
							'value'   => '',
							'choices' => $the_core_color_settings,
							'type'    => 'color-palette'
						),
					),
					'icon_upload' => array(
						'img'  => array(
							'label' => '',
							'type'  => 'upload',
						),
						'size' => array(
							'label' => __( 'Size', 'the-core' ),
							'desc'  => __( 'Enter the icon width in pixels', 'the-core' ),
							'value' => '40',
							'type'  => 'short-text'
						),
					),
				)
			),
			'img_group'         => array(
				'type'    => 'group',
				'options' => array(
					'img'   => array(
						'label' => __( 'Image', 'the-core' ),
						'type'  => 'upload',
					),
					'ratio' => array(
						'type'    => 'short-select',
						'label'   => __( 'Image Format', 'the-core' ),
						'value'   => '',
						'choices' => array(
							array( // optgroup
								'attr'    => array( 'label' => __( 'Original', 'the-core' ) ),
								'choices' => array(
									'fw-original-ratio' => __( 'Original Ratio', 'the-core' ),
								),
							),
							array( // optgroup
								'attr'    => array( 'label' => __( 'Landscape', 'the-core' ) ),
								'choices' => array(
									'fw-ratio-16-9' => __( '16-9', 'the-core' ),
									'fw-ratio-4-3'  => __( '4-3', 'the-core' ),
									'fw-ratio-2-1'  => __( '2-1', 'the-core' ),
								),
							),
							array( // optgroup
								'attr'    => array( 'label' => __( 'Portrait', 'the-core' ) ),
								'choices' => array(
									'fw-ratio-9-16' => __( '9-16', 'the-core' ),
									'fw-ratio-3-4'  => __( '3-4', 'the-core' ),
									'fw-ratio-1-2'  => __( '1-2', 'the-core' ),
								),
							),
							array( // optgroup
								'attr'    => array( 'label' => __( 'Square', 'the-core' ) ),
								'choices' => array(
									'fw-ratio-1' => __( '1-1', 'the-core' ),
								),
							),
						),
						'desc'    => __( 'Choose the image format', 'the-core' )
					),
				)
			),
			'description_group' => array(
				'type'    => 'group',
				'options' => array(
					'description_styling' => array(
						'attr'          => array(
							'data-advanced-for' => 'description-advanced',
							'class'             => 'fw-advanced-button'
						),
						'type'          => 'popup',
						'label'         => __( 'Custom Style', 'the-core' ),
						'desc'          => __( 'Change the style / typography of this shortcode', 'the-core' ),
						'button'        => __( 'Styling', 'the-core' ),
						'size'          => 'medium',
						'popup-options' => array(
							'description' => array(
								'label' => __( 'Description', 'the-core' ),
								'type'  => 'tf-typography',
								'value' => array(
									'google_font'    => $the_core_typography_settings['body_text']['google_font'],
									'subset'         => $the_core_typography_settings['body_text']['subset'],
									'variation'      => $the_core_typography_settings['body_text']['variation'],
									'family'         => $the_core_typography_settings['body_text']['family'],
									'style'          => $the_core_typography_settings['body_text']['style'],
									'weight'         => $the_core_typography_settings['body_text']['weight'],
									'size'           => $the_core_typography_settings['body_text']['size'],
									'line-height'    => $the_core_typography_settings['body_text']['line-height'],
									'letter-spacing' => $the_core_typography_settings['body_text']['letter-spacing'],
									'color-palette'  => '',
								)
							),
						),
					),
					'desc'                => array(
						'attr'       => array( 'class' => 'description-advanced' ),
						'label'      => __( 'Description', 'the-core' ),
						'desc'       => __( 'Enter the description', 'the-core' ),
						'type'       => 'wp-editor',
						'tinymce'    => true,
						'wpautop'    => true,
						'shortcodes' => true,
						'value'      => '',
					),
				)
			),
			'border'            => array(
				'type'    => 'multi-picker',
				'label'   => false,
				'desc'    => false,
				'picker'  => array(
					'selected' => array(
						'type'         => 'switch',
						'value'        => 'no',
						'label'        => __( 'Border', 'the-core' ),
						'desc'         => __( 'Add a border?', 'the-core' ),
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
						'border_size'  => array(
							'label' => __( '', 'the-core' ),
							'desc'  => __( 'Border size in pixels', 'the-core' ),
							'type'  => 'short-text',
							'value' => '1',
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
			'background'        => array(
				'type'         => 'multi-picker',
				'label'        => false,
				'desc'         => false,
				'picker'       => array(
					'background' => array(
						'label'   => __( 'Background', 'the-core' ),
						'desc'    => __( 'Select the background for your column', 'the-core' ),
						'attr'    => array( 'class' => 'fw-checkbox-float-left' ),
						'type'    => 'radio',
						'choices' => array(
							'none'           => __( 'None', 'the-core' ),
							'image'          => __( 'Image', 'the-core' ),
							'color'          => __( 'Color', 'the-core' ),
							'gradient_color' => __( 'Gradient Color', 'the-core' ),
						),
						'value'   => 'none'
					),
				),
				'choices'      => array(
					'none'           => array(),
					'color'          => array(
						'background_color' => array(
							'label'   => __( '', 'the-core' ),
							'help'    => __( 'The default color palette can be changed from the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __( 'Colors section', 'the-core' ) . '</a> ' . __( 'found in the Theme Settings page', 'the-core' ),
							'desc'    => __( 'Select the background color', 'the-core' ),
							'value'   => '',
							'choices' => $the_core_color_settings,
							'type'    => 'color-palette'
						),
					),
					'image'          => array(
						'background_image' => array(
							'label'   => __( '', 'the-core' ),
							'type'    => 'background-image',
							'choices' => array(//	in future may will set predefined images
							)
						),
						'background_color' => array(
							'label'   => __( '', 'the-core' ),
							'help'    => __( 'The default color palette can be changed from the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __( 'Colors section', 'the-core' ) . '</a> ' . __( 'found in the Theme Settings page', 'the-core' ),
							'desc'    => __( 'Select the background color', 'the-core' ),
							'value'   => '',
							'choices' => $the_core_color_settings,
							'type'    => 'color-palette'
						),
						'repeat'           => array(
							'label'   => __( '', 'the-core' ),
							'desc'    => __( 'Select how will the background repeat', 'the-core' ),
							'type'    => 'short-select',
							'attr'    => array( 'class' => 'fw-checkbox-float-left' ),
							'value'   => 'no-repeat',
							'choices' => array(
								'no-repeat' => __( 'No-Repeat', 'the-core' ),
								'repeat'    => __( 'Repeat', 'the-core' ),
								'repeat-x'  => __( 'Repeat-X', 'the-core' ),
								'repeat-y'  => __( 'Repeat-Y', 'the-core' ),
							)
						),
						'bg_position_x'    => array(
							'label'   => __( 'Position', 'the-core' ),
							'desc'    => __( 'Select the horizontal background position', 'the-core' ),
							'type'    => 'short-select',
							'attr'    => array( 'class' => 'fw-checkbox-float-left' ),
							'value'   => '',
							'choices' => array(
								'left'   => __( 'Left', 'the-core' ),
								'center' => __( 'Center', 'the-core' ),
								'right'  => __( 'Right', 'the-core' ),
							)
						),
						'bg_position_y'    => array(
							'label'   => __( '', 'the-core' ),
							'desc'    => __( 'Select the vertical background position', 'the-core' ),
							'type'    => 'short-select',
							'attr'    => array( 'class' => 'fw-checkbox-float-left' ),
							'value'   => '',
							'choices' => array(
								'top'    => __( 'Top', 'the-core' ),
								'center' => __( 'Center', 'the-core' ),
								'bottom' => __( 'Bottom', 'the-core' ),
							)
						),
						'bg_size'          => array(
							'label'   => __( 'Size', 'the-core' ),
							'desc'    => __( 'Select the background size', 'the-core' ),
							'help'    => __( '<strong>Auto</strong> - Default value, the background image has the original width and height.<br><br><strong>Cover</strong> - Scale the background image so that the background area is completely covered by the image.<br><br><strong>Contain</strong> - Scale the image to the largest size such that both its width and height can fit inside the content area.', 'the-core' ),
							'type'    => 'short-select',
							'attr'    => array( 'class' => 'fw-checkbox-float-left' ),
							'value'   => '',
							'choices' => array(
								'auto'    => __( 'Auto', 'the-core' ),
								'cover'   => __( 'Cover', 'the-core' ),
								'contain' => __( 'Contain', 'the-core' ),
							)
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
									'background'            => array(
										'label'   => __( '', 'the-core' ),
										'help'    => __( 'The default color palette can be changed from the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __( 'Colors section', 'the-core' ) . '</a> ' . __( 'found in the Theme Settings page', 'the-core' ),
										'desc'    => __( 'Select the overlay color', 'the-core' ),
										'value'   => '',
										'choices' => $the_core_color_settings,
										'type'    => 'color-palette'
									),
									'overlay_opacity_image' => array(
										'type'       => 'short-slider',
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
					),
					'gradient_color' => array(
						'gradient_orientation' => array(
							'label'   => __( '', 'the-core' ),
							'desc'    => __( 'Select the gradient orientation', 'the-core' ),
							'type'    => 'short-select',
							'choices' => array(
								'horizontal'      => __( 'Horizontal', 'the-core' ) . ' →',
								'vertical'        => __( 'Vertical', 'the-core' ) . ' ↓',
								'diagonal'        => __( 'Diagonal', 'the-core' ) . ' ↘',
								'diagonal_bottom' => __( 'Diagonal', 'the-core' ) . ' ↗',
								'radial'          => __( 'Radial', 'the-core' ) . ' ○',
							),
							'value'   => 'vertical'
						),
						'gradient_bg_color'    => array(
							'type'  => 'gradient',
							'label' => __( '', 'the-core' ),
							'desc'  => __( 'Select the gradient color', 'the-core' ),
							'value' => array(
								'primary'   => '#dddddd',
								'secondary' => '#cccccc',
							),
						),
					),
				),
				'show_borders' => false,
			),
			'back-box-btn'      => array(
				'type'    => 'group',
				'options' => array(
					'back_button' => array(
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
							'style_group'     => array(
								'type'    => 'group',
								'options' => array(
									'style' => array(
										'type'    => 'multi-picker',
										'label'   => false,
										'desc'    => false,
										'picker'  => array(
											'selected' => array(
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
												'border_radius' => array(
													'label' => __( 'Corner Radius', 'the-core' ),
													'desc'  => __( 'Enter the corner radius in pixels', 'the-core' ),
													'value' => '0',
													'type'  => 'short-text'
												),
											),
											'fw-btn-2' => array(
												'border_radius' => array(
													'label' => __( 'Corner Radius', 'the-core' ),
													'desc'  => __( 'Enter the corner radius in pixels', 'the-core' ),
													'value' => '0',
													'type'  => 'short-text'
												),
												'border_size'   => array(
													'label' => __( '', 'the-core' ),
													'desc'  => __( 'Border size in pixels', 'the-core' ),
													'type'  => 'short-text',
													'value' => '1',
												),
											),
											'fw-btn-3' => array(
												'border_size' => array(
													'label' => __( '', 'the-core' ),
													'desc'  => __( 'Border size in pixels', 'the-core' ),
													'type'  => 'short-text',
													'value' => '1',
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
							'label-group'     => array(
								'type'    => 'group',
								'options' => array(
									'label_advanced_styling' => array(
										'attr'          => array(
											'data-advanced-for' => 'button-advanced',
											'class'             => 'fw-advanced-button'
										),
										'type'          => 'popup',
										'label'         => __( 'Custom Style', 'the-core' ),
										'desc'          => __( 'Change the style / typography of this shortcode', 'the-core' ),
										'button'        => __( 'Styling', 'the-core' ),
										'size'          => 'medium',
										'popup-options' => array(
											'advanced-group' => array(
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
											)
										),
									),
									'label'                  => array(
										'label' => __( 'Label', 'the-core' ),
										'attr'  => array( 'class' => 'button-advanced' ),
										'desc'  => __( 'This is the text that appears on your button', 'the-core' ),
										'type'  => 'text',
										'value' => 'Submit'
									),
								)
							),
							'btn_link_group'  => array(
								'type'    => 'group',
								'options' => array(
									'link'          => array(
										'label' => __( 'Link', 'the-core' ),
										'desc'  => __( 'Where should your button link to?', 'the-core' ),
										'type'  => 'text',
										'value' => '#'
									),
									'target'        => array(
										'type'         => 'switch',
										'label'        => __( '', 'the-core' ),
										'desc'         => __( 'Open link in new window?', 'the-core' ),
										'value'        => '_self',
										'right-choice' => array(
											'value' => '_blank',
											'label' => __( 'Yes', 'the-core' ),
										),
										'left-choice'  => array(
											'value' => '_self',
											'label' => __( 'No', 'the-core' ),
										),
									),
									'nofollow' => array(
										'type'         => 'switch',
										'label'        => __( '', 'the-core' ),
										'desc'         => __( 'Add nofollow?', 'the-core' ),
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
									'open_in_popup' => array(
										'type'    => 'multi-picker',
										'label'   => false,
										'desc'    => false,
										'picker'  => array(
											'selected' => array(
												'type'         => 'switch',
												'value'        => 'no',
												'label'        => __( '', 'the-core' ),
												'desc'         => __( 'Open in popup?', 'the-core' ),
												'help'         => __( 'This option will overwrite the Open in new window setting and will work only for images and Vimeo / YouTube videos.', 'the-core' ),
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
									'full_width' => array(
										'type'    => 'multi-picker',
										'label'   => false,
										'desc'    => false,
										'picker'  => array(
											'selected_type' => array(
												'type'         => 'switch',
												'label'        => __( '', 'the-core' ),
												'desc'         => __( 'Make this button full width?', 'the-core' ),
												'value'        => '',
												'right-choice' => array(
													'value' => 'fw-btn-full',
													'label' => __( 'Yes', 'the-core' ),
												),
												'left-choice'  => array(
													'value' => 'default',
													'label' => __( 'No', 'the-core' ),
												),
											),
										),
										'choices' => array(
											'default' => array(
												'btn_alignment' => array(
													'label'   => __( 'Alignment', 'the-core' ),
													'desc'    => __( 'Choose button alignment', 'the-core' ),
													'type'    => 'image-picker',
													'value'   => is_rtl() ? 'text-right' : 'text-left',
													'choices' => array(
														'text-left'   => array(
															'small' => array(
																'height' => 50,
																'src'    => $the_core_template_directory . '/images/image-picker/left-position.jpg',
																'title'  => __( 'Left', 'the-core' )
															),
														),
														'text-center' => array(
															'small' => array(
																'height' => 50,
																'src'    => $the_core_template_directory . '/images/image-picker/center-position.jpg',
																'title'  => __( 'Center', 'the-core' )
															),
														),
														'text-right'  => array(
															'small' => array(
																'height' => 50,
																'src'    => $the_core_template_directory . '/images/image-picker/right-position.jpg',
																'title'  => __( 'Right', 'the-core' )
															),
														),
													),
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
					'show_bnt'    => array(
						'attr'         => array( 'class' => 'button-options' ),
						'type'         => 'switch',
						'value'        => '',
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
		),
	),
	'alignment'       => array(
		'label'   => __( 'Content Alignment', 'the-core' ),
		'desc'    => __( 'Select the text alignment', 'the-core' ),
		'type'    => 'image-picker',
		'value'   => is_rtl() ? 'fw-flip-box-content-align-right' : 'fw-flip-box-content-align-left',
		'choices' => array(
			'fw-flip-box-content-align-left'   => array(
				'small' => array(
					'height' => 50,
					'src'    => $the_core_template_directory . '/images/image-picker/left-position.jpg',
					'title'  => __( 'Left', 'the-core' )
				),
			),
			'fw-flip-box-content-align-center' => array(
				'small' => array(
					'height' => 50,
					'src'    => $the_core_template_directory . '/images/image-picker/center-position.jpg',
					'title'  => __( 'Center', 'the-core' )
				),
			),
			'fw-flip-box-content-align-right'  => array(
				'small' => array(
					'height' => 50,
					'src'    => $the_core_template_directory . '/images/image-picker/right-position.jpg',
					'title'  => __( 'Right', 'the-core' )
				),
			),
		),
	),
	'border_radius'   => array(
		'label' => __( 'Corner Radius', 'the-core' ),
		'desc'  => __( 'Enter the corner radius in pixels', 'the-core' ),
		'value' => '0',
		'type'  => 'short-text'
	),
	'padding_group'   => array(
		'attr'    => array( 'class' => 'fw-testimonials-padding-group' ),
		'type'    => 'group',
		'options' => array(
			'html_label'     => array(
				'type'  => 'html',
				'value' => '',
				'label' => __( 'Content Padding', 'the-core' ),
				'html'  => '',
			),
			'padding_top'    => array(
				'label' => false,
				'desc'  => __( 'top', 'the-core' ),
				'type'  => 'short-text',
				'value' => '0',
			),
			'padding_right'  => array(
				'label' => false,
				'desc'  => __( 'right', 'the-core' ),
				'type'  => 'short-text',
				'value' => '0',
			),
			'padding_bottom' => array(
				'label' => false,
				'desc'  => __( 'bottom', 'the-core' ),
				'type'  => 'short-text',
				'value' => '0',
			),
			'padding_left'   => array(
				'label' => false,
				'desc'  => __( 'left', 'the-core' ),
				'type'  => 'short-text',
				'value' => '0',
			),
		)
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
	'responsive'      => array(
		'attr'          => array( 'class' => 'fw-advanced-button' ),
		'type'          => 'popup',
		'label'         => __( 'Responsive Behavior', 'the-core' ),
		'button'        => __( 'Settings', 'the-core' ),
		'size'          => 'medium',
		'popup-options' => array(
			'desktop_display'          => array(
				'type'   => 'multi-picker',
				'label'  => false,
				'desc'   => false,
				'picker' => array(
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
			'tablet_landscape_display' => array(
				'type'   => 'multi-picker',
				'label'  => false,
				'desc'   => false,
				'picker' => array(
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
			'tablet_display'           => array(
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
			'smartphone_display'       => array(
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