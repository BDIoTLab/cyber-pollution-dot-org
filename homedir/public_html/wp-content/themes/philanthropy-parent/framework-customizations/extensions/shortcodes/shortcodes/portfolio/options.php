<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

global $the_core_colors, $the_core_typography;
$the_core_admin_url           = admin_url();
$the_core_template_directory  = get_template_directory_uri();
$the_core_color_settings      = fw_get_db_settings_option( 'color_settings', $the_core_colors );
$the_core_typography_settings = fw_get_db_settings_option( 'typography_settings', $the_core_typography );

$options = array(
	'unique_id'              => array(
		'type' => 'unique'
	),
	'shortcode_name'         => array(
		'label' => __( 'Shortcode Name', 'the-core' ),
		'desc'  => __( 'Enter a name (it is for internal use and will not appear on the front end)', 'the-core' ),
		'help'  => __( 'Use this option to name your shortcode. It will help you go through the structure a lot easier.', 'the-core' ),
		'type'  => 'text',
	),
	'category'               => array(
		'label'   => __( 'Display From', 'the-core' ),
		'desc'    => __( 'Select a Portfolio Category', 'the-core' ),
		'type'    => 'select',
		'value'   => '',
		'choices' => the_core_get_all_portfolio_taxonomy_list(),
		'help'    => sprintf( "%s \n\n<br/><br/>\n\n %s",
			__( 'You need to have a least one', 'the-core' ) . ' <a target="_blank" href="' . admin_url() . 'edit-tags.php?taxonomy=fw-portfolio-category&post_type=fw-portfolio' . '">' . __( 'Portfolio Category', 'the-core' ) . '</a> ' . __( 'in order to be able to use this shortcode.', 'the-core' ),
			__( 'If the selected Category has sub categories then a filter will appear on the front end letting users filter the projects.', 'the-core' )
		),
	),
	'portfolio_type_group'   => array(
		'type'    => 'group',
		'options' => array(
			'portfolio_type'    => array(
				'label'   => __( 'Display Type', 'the-core' ),
				'type'    => 'image-picker',
				'value'   => '',
				'desc'    => __( 'Select the prefered portfolio display type', 'the-core' ),
				'choices' => array(
					'fw-portfolio-portrait'  => array(
						'small' => array(
							'height' => 75,
							'src'    => $the_core_template_directory . '/images/image-picker/portfolio_portrait.jpg'
						),
						'large' => array(
							'height' => 214,
							'src'    => $the_core_template_directory . '/images/image-picker/portfolio_portrait.jpg'
						),
					),
					'fw-portfolio-landscape' => array(
						'small' => array(
							'height' => 75,
							'src'    => $the_core_template_directory . '/images/image-picker/portfolio_landscape.jpg'
						),
						'large' => array(
							'height' => 214,
							'src'    => $the_core_template_directory . '/images/image-picker/portfolio_landscape.jpg'
						),
					),
					'fw-portfolio-square'    => array(
						'small' => array(
							'height' => 75,
							'src'    => $the_core_template_directory . '/images/image-picker/portfolio_square.jpg'
						),
						'large' => array(
							'height' => 214,
							'src'    => $the_core_template_directory . '/images/image-picker/portfolio_square.jpg'
						),
					),
				),
			),
			'portfolio_columns' => array(
				'attr'    => array( 'class' => 'fw-checkbox-float-left' ),
				'label'   => __( '', 'the-core' ),
				'desc'    => __( 'Choose the number of columns', 'the-core' ),
				'type'    => 'radio',
				'value'   => 'fw-portfolio-cols-3',
				'choices' => array(
					'fw-portfolio-cols-2' => __( '2 columns', 'the-core' ),
					'fw-portfolio-cols-3' => __( '3 columns', 'the-core' ),
					'fw-portfolio-cols-4' => __( '4 columns', 'the-core' ),
				)
			),
		)
	),
	'portfolio_style'        => array(
		'type'    => 'multi-picker',
		'label'   => false,
		'desc'    => false,
		'picker'  => array(
			'selected' => array(
				'label'   => __( 'Project Style', 'the-core' ),
				'type'    => 'image-picker',
				'value'   => 'style1',
				'desc'    => __( 'Select the prefered project display style', 'the-core' ),
				'choices' => array(
					'style1' => array(
						'small' => array(
							'height' => 75,
							'src'    => $the_core_template_directory . '/images/image-picker/portfolio-style1.jpg'
						),
						'large' => array(
							'height' => 214,
							'src'    => $the_core_template_directory . '/images/image-picker/portfolio-style1.jpg'
						),
					),
					'style2' => array(
						'small' => array(
							'height' => 75,
							'src'    => $the_core_template_directory . '/images/image-picker/portfolio-style2.jpg'
						),
						'large' => array(
							'height' => 214,
							'src'    => $the_core_template_directory . '/images/image-picker/portfolio-style2.jpg'
						),
					),
					'style3' => array(
						'small' => array(
							'height' => 75,
							'src'    => $the_core_template_directory . '/images/image-picker/portfolio-style3.jpg'
						),
						'large' => array(
							'height' => 214,
							'src'    => $the_core_template_directory . '/images/image-picker/portfolio-style3.jpg'
						),
					),
				),
			),
		),
		'choices' => array(
			'style1' => array(
				'style1_advanced_styling' => array(
					'attr'          => array(
						'class' => 'fw-advanced-button'
					),
					'type'          => 'popup',
					'label'         => __( '', 'the-core' ),
					'desc'          => __( 'Change the style / typography of this shortcode', 'the-core' ),
					'button'        => __( 'Styling', 'the-core' ),
					'size'          => 'medium',
					'popup-options' => array(
						'title'             => array(
							'label' => __( 'Title', 'the-core' ),
							'type'  => 'tf-typography',
							'value' => array(
								'google_font'    => $the_core_typography_settings['h3']['google_font'],
								'subset'         => $the_core_typography_settings['h3']['subset'],
								'variation'      => $the_core_typography_settings['h3']['variation'],
								'family'         => $the_core_typography_settings['h3']['family'],
								'style'          => $the_core_typography_settings['h3']['style'],
								'weight'         => $the_core_typography_settings['h3']['weight'],
								'size'           => $the_core_typography_settings['h3']['size'],
								'line-height'    => $the_core_typography_settings['h3']['line-height'],
								'letter-spacing' => $the_core_typography_settings['h3']['letter-spacing'],
								'color-palette'  => '',
							)
						),
						'subtitle'          => array(
							'label' => __( 'Subtitle', 'the-core' ),
							'type'  => 'tf-typography',
							'value' => array(
								'google_font'    => $the_core_typography_settings['subtitles']['google_font'],
								'subset'         => $the_core_typography_settings['subtitles']['subset'],
								'variation'      => $the_core_typography_settings['subtitles']['variation'],
								'family'         => $the_core_typography_settings['subtitles']['family'],
								'style'          => $the_core_typography_settings['subtitles']['style'],
								'weight'         => $the_core_typography_settings['subtitles']['weight'],
								'size'           => $the_core_typography_settings['subtitles']['size'],
								'line-height'    => $the_core_typography_settings['subtitles']['line-height'],
								'letter-spacing' => $the_core_typography_settings['subtitles']['letter-spacing'],
								'color-palette'  => '',
							)
						),
						'separator_group'   => array(
							'type'    => 'multi-picker',
							'label'   => false,
							'desc'    => false,
							'picker'  => array(
								'selected' => array(
									'type'         => 'switch',
									'label'        => __( 'Separator', 'the-core' ),
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
									'separator_width' => array(
										'label' => __( '', 'the-core' ),
										'desc'  => __( 'Enter the separator width in pixels', 'the-core' ),
										'value' => '',
										'type'  => 'short-text'
									),
									'separator_color' => array(
										'label'   => __( '', 'the-core' ),
										'desc'    => __( 'Select the separator color', 'the-core' ),
										'help'    => __( 'The default color palette can be changed from the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __( 'Colors section', 'the-core' ) . '</a> ' . __( 'found in the Theme Settings page', 'the-core' ),
										'value'   => '',
										'choices' => $the_core_color_settings,
										'type'    => 'color-palette'
									),
								),
							),
						),
						'content_position'  => array(
							'label'   => __( 'Content Position', 'the-core' ),
							'desc'    => __( 'Select the vertical content position', 'the-core' ),
							'type'    => 'image-picker',
							'value'   => '',
							'choices' => array(
								'fw-portfolio-content-position-top'    => array(
									'small' => array(
										'height' => 50,
										'src'    => $the_core_template_directory . '/images/image-picker/top-position.jpg'
									),
								),
								'fw-portfolio-content-position-middle' => array(
									'small' => array(
										'height' => 50,
										'src'    => $the_core_template_directory . '/images/image-picker/middle-position.jpg'
									),
								),
								'fw-portfolio-content-position-bottom' => array(
									'small' => array(
										'height' => 50,
										'src'    => $the_core_template_directory . '/images/image-picker/bottom-position.jpg'
									),
								),
							),
						),
						'content_alignment' => array(
							'label'   => __( 'Content Alignment', 'the-core' ),
							'desc'    => __( 'Select the content alignment', 'the-core' ),
							'type'    => 'image-picker',
							'value'   => is_rtl() ? 'fw-portfolio-content-align-right' : 'fw-portfolio-content-align-left',
							'choices' => array(
								'fw-portfolio-content-align-left'   => array(
									'small' => array(
										'height' => 50,
										'src'    => $the_core_template_directory . '/images/image-picker/left-position.jpg',
										'title'  => __( 'Left', 'the-core' )
									),
								),
								'fw-portfolio-content-align-center' => array(
									'small' => array(
										'height' => 50,
										'src'    => $the_core_template_directory . '/images/image-picker/center-position.jpg',
										'title'  => __( 'Center', 'the-core' )
									),
								),
								'fw-portfolio-content-align-right'  => array(
									'small' => array(
										'height' => 50,
										'src'    => $the_core_template_directory . '/images/image-picker/right-position.jpg',
										'title'  => __( 'Right', 'the-core' )
									),
								),
							),
						),
						'hover_bg_group'    => array(
							'type'    => 'group',
							'options' => array(
								'hover_bg_color'   => array(
									'label'   => __( 'Hover Bg Color', 'the-core' ),
									'help'    => __( 'The default color palette can be changed from the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __( 'Colors section', 'the-core' ) . '</a> ' . __( 'found in the Theme Settings page', 'the-core' ),
									'desc'    => __( 'Select hover background color', 'the-core' ),
									'value'   => '',
									'choices' => $the_core_color_settings,
									'type'    => 'color-palette'
								),
								'opacity_bg_color' => array(
									'type'       => 'slider',
									'value'      => 80,
									'properties' => array(
										'min' => 0,
										'max' => 100,
										'sep' => 1,
									),
									'label'      => __( '', 'the-core' ),
									'desc'       => __( 'Select the overlay color opacity in %', 'the-core' ),
								),
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
						'frame_group'       => array(
							'type'    => 'multi-picker',
							'label'   => false,
							'desc'    => false,
							'picker'  => array(
								'selected' => array(
									'type'         => 'switch',
									'value'        => '',
									'label'        => __( 'Frame', 'the-core' ),
									'desc'         => __( 'Add a frame?', 'the-core' ),
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
									'frame_size'  => array(
										'label' => __( '', 'the-core' ),
										'desc'  => __( 'Frame size in pixels', 'the-core' ),
										'type'  => 'short-text',
										'value' => '10',
									),
									'frame_color' => array(
										'label'   => __( '', 'the-core' ),
										'help'    => __( 'The default color palette can be changed from the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __( 'Colors section', 'the-core' ) . '</a> ' . __( 'found in the Theme Settings page', 'the-core' ),
										'desc'    => __( 'Select frame color', 'the-core' ),
										'value'   => '',
										'choices' => $the_core_color_settings,
										'type'    => 'color-palette'
									),
								)
							)
						),
						'shadow_group'      => array(
							'type'    => 'multi-picker',
							'label'   => false,
							'desc'    => false,
							'picker'  => array(
								'selected' => array(
									'type'         => 'switch',
									'value'        => '',
									'label'        => __( 'Shadow', 'the-core' ),
									'desc'         => __( 'Add a shadow?', 'the-core' ),
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
									'shadow_horiontal' => array(
										'label' => __( '', 'the-core' ),
										'desc'  => __( 'Horizontal shadow position in pixels (Ex: 10, -15)', 'the-core' ),
										'type'  => 'short-text',
										'value' => '',
									),
									'shadow_vertical'  => array(
										'label' => __( '', 'the-core' ),
										'desc'  => __( 'Vertical shadow position in pixels (Ex: 12, -10)', 'the-core' ),
										'type'  => 'short-text',
										'value' => '',
									),
									'shadow_blur'      => array(
										'label' => __( '', 'the-core' ),
										'desc'  => __( 'The blur distance in pixels', 'the-core' ),
										'type'  => 'short-text',
										'value' => '',
									),
									'shadow_size'      => array(
										'label' => __( '', 'the-core' ),
										'desc'  => __( 'The size of shadow in pixels (Ex: 5, -7)', 'the-core' ),
										'type'  => 'short-text',
										'value' => '',
									),
									'shadow_color'     => array(
										'label' => __( '', 'the-core' ),
										'desc'  => __( 'Select the shadow color', 'the-core' ),
										'value' => '',
										'type'  => 'rgba-color-picker'
									),
								)
							)
						),
					),
				),
			),
			'style2' => array(
				'style2_advanced_styling' => array(
					'attr'          => array(
						'class' => 'fw-advanced-button'
					),
					'type'          => 'popup',
					'label'         => __( '', 'the-core' ),
					'desc'          => __( 'Change the style / typography of this shortcode', 'the-core' ),
					'button'        => __( 'Styling', 'the-core' ),
					'size'          => 'medium',
					'popup-options' => array(
						'title'             => array(
							'label' => __( 'Title', 'the-core' ),
							'type'  => 'tf-typography',
							'value' => array(
								'google_font'    => $the_core_typography_settings['h3']['google_font'],
								'subset'         => $the_core_typography_settings['h3']['subset'],
								'variation'      => $the_core_typography_settings['h3']['variation'],
								'family'         => $the_core_typography_settings['h3']['family'],
								'style'          => $the_core_typography_settings['h3']['style'],
								'weight'         => $the_core_typography_settings['h3']['weight'],
								'size'           => $the_core_typography_settings['h3']['size'],
								'line-height'    => $the_core_typography_settings['h3']['line-height'],
								'letter-spacing' => $the_core_typography_settings['h3']['letter-spacing'],
								'color-palette'  => '',
							)
						),
						'description'       => array(
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
						'bg_color'          => array(
							'label'   => __( 'Bg Color', 'the-core' ),
							'help'    => __( 'The default color palette can be changed from the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __( 'Colors section', 'the-core' ) . '</a> ' . __( 'found in the Theme Settings page', 'the-core' ),
							'desc'    => __( 'Select background color', 'the-core' ),
							'value'   => '',
							'choices' => $the_core_color_settings,
							'type'    => 'color-palette'
						),
						'padding_group'     => array(
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
						'content_alignment' => array(
							'label'   => __( 'Content Alignment', 'the-core' ),
							'desc'    => __( 'Select the content alignment', 'the-core' ),
							'type'    => 'image-picker',
							'value'   => is_rtl() ? 'fw-portfolio-content-align-right' : 'fw-portfolio-content-align-left',
							'choices' => array(
								'fw-portfolio-content-align-left'   => array(
									'small' => array(
										'height' => 50,
										'src'    => $the_core_template_directory . '/images/image-picker/left-position.jpg',
										'title'  => __( 'Left', 'the-core' )
									),
								),
								'fw-portfolio-content-align-center' => array(
									'small' => array(
										'height' => 50,
										'src'    => $the_core_template_directory . '/images/image-picker/center-position.jpg',
										'title'  => __( 'Center', 'the-core' )
									),
								),
								'fw-portfolio-content-align-right'  => array(
									'small' => array(
										'height' => 50,
										'src'    => $the_core_template_directory . '/images/image-picker/right-position.jpg',
										'title'  => __( 'Right', 'the-core' )
									),
								),
							),
						),
						'icon_btn_group'    => array(
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
								'show_bnt'       => array(
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
			),
			'style3' => array(
				'style1_advanced_styling' => array(
					'attr'          => array(
						'class' => 'fw-advanced-button'
					),
					'type'          => 'popup',
					'label'         => __( '', 'the-core' ),
					'desc'          => __( 'Change the style / typography of this shortcode', 'the-core' ),
					'button'        => __( 'Styling', 'the-core' ),
					'size'          => 'medium',
					'popup-options' => array(
						'title'                  => array(
							'label' => __( 'Title', 'the-core' ),
							'type'  => 'tf-typography',
							'value' => array(
								'google_font'    => $the_core_typography_settings['h3']['google_font'],
								'subset'         => $the_core_typography_settings['h3']['subset'],
								'variation'      => $the_core_typography_settings['h3']['variation'],
								'family'         => $the_core_typography_settings['h3']['family'],
								'style'          => $the_core_typography_settings['h3']['style'],
								'weight'         => $the_core_typography_settings['h3']['weight'],
								'size'           => $the_core_typography_settings['h3']['size'],
								'line-height'    => $the_core_typography_settings['h3']['line-height'],
								'letter-spacing' => $the_core_typography_settings['h3']['letter-spacing'],
								'color-palette'  => '',
							)
						),
						'subtitle'               => array(
							'label' => __( 'Subtitle', 'the-core' ),
							'type'  => 'tf-typography',
							'value' => array(
								'google_font'    => $the_core_typography_settings['subtitles']['google_font'],
								'subset'         => $the_core_typography_settings['subtitles']['subset'],
								'variation'      => $the_core_typography_settings['subtitles']['variation'],
								'family'         => $the_core_typography_settings['subtitles']['family'],
								'style'          => $the_core_typography_settings['subtitles']['style'],
								'weight'         => $the_core_typography_settings['subtitles']['weight'],
								'size'           => $the_core_typography_settings['subtitles']['size'],
								'line-height'    => $the_core_typography_settings['subtitles']['line-height'],
								'letter-spacing' => $the_core_typography_settings['subtitles']['letter-spacing'],
								'color-palette'  => '',
							)
						),
						'content_position'       => array(
							'label'   => __( 'Content Position', 'the-core' ),
							'desc'    => __( 'Select the vertical content position', 'the-core' ),
							'type'    => 'image-picker',
							'value'   => '',
							'choices' => array(
								'fw-portfolio-content-position-top'    => array(
									'small' => array(
										'height' => 50,
										'src'    => $the_core_template_directory . '/images/image-picker/top-position.jpg'
									),
								),
								'fw-portfolio-content-position-middle' => array(
									'small' => array(
										'height' => 50,
										'src'    => $the_core_template_directory . '/images/image-picker/middle-position.jpg'
									),
								),
								'fw-portfolio-content-position-bottom' => array(
									'small' => array(
										'height' => 50,
										'src'    => $the_core_template_directory . '/images/image-picker/bottom-position.jpg'
									),
								),
							),
						),
						'content_alignment'      => array(
							'label'   => __( 'Content Alignment', 'the-core' ),
							'desc'    => __( 'Select the content alignment', 'the-core' ),
							'type'    => 'image-picker',
							'value'   => is_rtl() ? 'fw-portfolio-content-align-right' : 'fw-portfolio-content-align-left',
							'choices' => array(
								'fw-portfolio-content-align-left'   => array(
									'small' => array(
										'height' => 50,
										'src'    => $the_core_template_directory . '/images/image-picker/left-position.jpg',
										'title'  => __( 'Left', 'the-core' )
									),
								),
								'fw-portfolio-content-align-center' => array(
									'small' => array(
										'height' => 50,
										'src'    => $the_core_template_directory . '/images/image-picker/center-position.jpg',
										'title'  => __( 'Center', 'the-core' )
									),
								),
								'fw-portfolio-content-align-right'  => array(
									'small' => array(
										'height' => 50,
										'src'    => $the_core_template_directory . '/images/image-picker/right-position.jpg',
										'title'  => __( 'Right', 'the-core' )
									),
								),
							),
						),
						'hover_bg_group'         => array(
							'type'    => 'group',
							'options' => array(
								'hover_bg_color'   => array(
									'label'   => __( 'Hover Bg Color', 'the-core' ),
									'help'    => __( 'The default color palette can be changed from the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __( 'Colors section', 'the-core' ) . '</a> ' . __( 'found in the Theme Settings page', 'the-core' ),
									'desc'    => __( 'Select hover background color', 'the-core' ),
									'value'   => '',
									'choices' => $the_core_color_settings,
									'type'    => 'color-palette'
								),
								'opacity_bg_color' => array(
									'type'       => 'slider',
									'value'      => 80,
									'properties' => array(
										'min' => 0,
										'max' => 100,
										'sep' => 1,
									),
									'label'      => __( '', 'the-core' ),
									'desc'       => __( 'Select the overlay color opacity in %', 'the-core' ),
								),
							)
						),
						'prettyphoto_icon_group' => array(
							'type'    => 'group',
							'options' => array(
								'prettyphoto_icon_type' => array(
									'type'    => 'multi-picker',
									'label'   => false,
									'desc'    => false,
									'picker'  => array(
										'tab_icon' => array(
											'label'   => __( 'Enlarge Image Icon', 'the-core' ),
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
											'icon_class'        => array(
												'type'  => 'icon',
												'value' => '',
												'label' => '',
											),
											'pretty_icon_color' => array(
												'label'   => __( 'Icon Color', 'the-core' ),
												'desc'    => __( 'Select icon color', 'the-core' ),
												'value'   => '',
												'choices' => $the_core_color_settings,
												'type'    => 'color-palette'
											),
											'icon_color_hover'  => array(
												'label'   => __( 'Icon Hover Color', 'the-core' ),
												'desc'    => __( 'Select icon hover color', 'the-core' ),
												'value'   => '',
												'choices' => $the_core_color_settings,
												'type'    => 'color-palette'
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
								'icon_size'             => array(
									'label' => __( 'Icon Size', 'the-core' ),
									'desc'  => __( 'Enter the icon size in pixels', 'the-core' ),
									'value' => '12',
									'type'  => 'short-text'
								),
							)
						),
						'link_icon_group'        => array(
							'type'    => 'group',
							'options' => array(
								'link_icon_type' => array(
									'type'    => 'multi-picker',
									'label'   => false,
									'desc'    => false,
									'picker'  => array(
										'tab_icon' => array(
											'label'   => __( 'More Details Icon', 'the-core' ),
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
											'icon_class'            => array(
												'type'  => 'icon',
												'value' => '',
												'label' => '',
											),
											'link_icon_color'       => array(
												'label'   => __( 'Icon Color', 'the-core' ),
												'desc'    => __( 'Select icon color', 'the-core' ),
												'value'   => '',
												'choices' => $the_core_color_settings,
												'type'    => 'color-palette'
											),
											'link_icon_color_hover' => array(
												'label'   => __( 'Icon Hover Color', 'the-core' ),
												'desc'    => __( 'Select icon hover color', 'the-core' ),
												'value'   => '',
												'choices' => $the_core_color_settings,
												'type'    => 'color-palette'
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
								'icon_size2'     => array(
									'label' => __( 'Icon Size', 'the-core' ),
									'desc'  => __( 'Enter the icon size in pixels', 'the-core' ),
									'value' => '12',
									'type'  => 'short-text'
								),
							)
						),
					),
				),
			),
		)
	),
	'load_more_button_group' => array(
		'type'    => 'group',
		'options' => array(
			'posts_per_page' => array(
				'label' => __( 'No. of Projects', 'the-core' ),
				'desc'  => __( 'Enter the number of project to display. Ex: 3, 6, maximum of 50', 'the-core' ),
				'type'  => 'short-text',
				'value' => '6',
				'help'  => sprintf( "%s", __( 'We advise you to use this short code as a Latest Works widget displaying only a small no of projects (6, 9). For a full fledge portfolio page please use the built in', 'the-core' ) . ' <a target="_blank" href="' . admin_url() . 'edit.php?post_type=fw-portfolio' . '">' . __( 'Portfolio Module', 'the-core' ) . '</a>.' ),
			),
			'load_more_button' => array(
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
								'value' => 'Load More'
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
											'value'   => 'text-center',
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
			'show_load_more'   => array(
				'attr'         => array( 'class' => 'button-options' ),
				'type'         => 'switch',
				'value'        => 'no',
				'label'        => __( 'Load More', 'the-core' ),
				'desc'         => __( 'Show load more button?', 'the-core' ),
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
	'animation_group'        => array(
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
	'responsive'             => array(
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
	'class'                  => array(
		'label' => __( 'Custom Class', 'the-core' ),
		'desc'  => __( 'Enter custom CSS class', 'the-core' ),
		'type'  => 'text',
		'value' => '',
		'help'  => sprintf( __( 'You can use this class to further style this shortcode by adding your custom CSS in the %sCustom CSS%s area.', 'the-core' ), '<a target="_blank" href="' . $the_core_admin_url . 'admin.php?page=fw-settings#fw-options-tab-custom_css_tab' . '">', '</a>' ),
	),
);