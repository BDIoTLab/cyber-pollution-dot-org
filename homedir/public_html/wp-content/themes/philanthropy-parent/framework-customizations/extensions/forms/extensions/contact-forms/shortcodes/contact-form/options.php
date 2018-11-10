<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

global $the_core_colors, $the_core_typography;
$the_core_admin_url           = admin_url();
$the_core_template_directory  = get_template_directory_uri();
$the_core_color_settings      = fw_get_db_settings_option('color_settings', $the_core_colors);
$the_core_typography_settings = fw_get_db_settings_option('typography_settings', $the_core_typography);

$options = array(
	'main' => array(
		'type'    => 'box',
		'title'   => '',
		'options' => array(
			'id'       => array(
				'type' => 'unique'
			),
			'builder'  => array(
				'type'    => 'tab',
				'title'   => __( 'Form Fields', 'the-core' ),
				'options' => array(
					'form' => array(
						'label' => false,
						'type'  => 'form-builder',
						'value' => array(
							'json' => json_encode( array(
								array(
									'type'      => 'form-header-title',
									'shortcode' => 'form_header_title',
									'width'     => '',
									'options'   => array(
										'title'    => '',
										'subtitle' => '',
									)
								)
							) )
						)
					),
				),
			),
			'settings' => array(
				'type'    => 'tab',
				'title'   => __( 'Settings', 'the-core' ),
				'options' => array(
					'settings-options' => array(
						'title'   => __( 'Options', 'the-core' ),
						'type'    => 'tab',
						'options' => array(
							'form_text_settings' => array(
								'type'    => 'group',
								'options' => array(
									'form_email_settings' => array(
										'type'    => 'group',
										'options' => array(
											'email_to' => array(
												'type'  => 'text',
												'label' => __( 'Email To', 'the-core' ),
												'help'  => __( 'We recommend you to use an email that you verify often', 'the-core' ),
												'desc'  => __( 'The form will be sent to this email address.', 'the-core' ),
											),
										),
									),
									'subject-group'       => array(
										'type'    => 'group',
										'options' => array(
											'subject_message' => array(
												'type'  => 'text',
												'label' => __( 'Subject Message', 'the-core' ),
												'desc'  => __( 'This text will be used as subject message for the email', 'the-core' ),
												'value' => __( 'Contact Form', 'the-core' ),
											),
										)
									),
									'submit-button-group' => array(
										'type'    => 'group',
										'attr'    => array( 'class' => 'fw-form-button-dashboard' ),
										'options' => array(
											'button_options'     => array(
												'attr'          => array(
													'data-advanced-for' => 'button-options',
													'class'             => 'fw-advanced-button'
												),
												'type'          => 'popup',
												'label'         => __( 'Custom Style', 'the-core' ),
												'desc'          => __( 'Change the style / typography of this button', 'the-core' ),
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
																'size'          => 'small',
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
											'submit_button_text' => array(
												'attr'  => array( 'class' => 'button-options' ),
												'type'  => 'html',
												'label' => __( 'Submit Button', 'the-core' ),
												'desc'  => __( 'Change the style / typography of this button', 'the-core' ),
												'value' => __( '', 'the-core' ),
												'html'  => __( '', 'the-core' ),
											),
										)
									),
									'redirect_page_group'       => array(
										'type'    => 'group',
										'options' => array(
											'redirect_page' => array(
												'type'  => 'text',
												'label' => __( 'Redirect Page', 'the-core' ),
												'desc'  => __( 'Enter a custom page URL', 'the-core' ),
												'help'  => __( 'After the form is successful submitted the user will be redirected to this page. This is usually a thank you page.', 'the-core' ),
												'value' => '',
											),
										)
									),
									'success-group'       => array(
										'type'    => 'group',
										'options' => array(
											'success_message' => array(
												'type'  => 'text',
												'label' => __( 'Success Message', 'the-core' ),
												'desc'  => __( 'This text will be displayed when the form will successfully send', 'the-core' ),
												'value' => __( 'Message sent!', 'the-core' ),
											),
										)
									),
									'failure_message'     => array(
										'type'  => 'text',
										'label' => __( 'Failure Message', 'the-core' ),
										'desc'  => __( 'This text will be displayed when the form will fail to be sent', 'the-core' ),
										'value' => __( 'Oops something went wrong.', 'the-core' ),
									),
								),
							),
						)
					),
					'mailer-options'   => array(
						'title'   => __( 'Mailer', 'the-core' ),
						'type'    => 'tab',
						'options' => array(
							'mailer' => array(
								'label' => false,
								'type'  => 'mailer'
							)
						)
					),
					'styling-options'  => array(
						'title'   => __( 'Styling', 'the-core' ),
						'type'    => 'tab',
						'options' => array(
							'form_title_typography'             => array(
								'label' => __( 'Form Title', 'the-core' ),
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
							'form_subtitle_typography'          => array(
								'label' => __( 'Form Subtitle', 'the-core' ),
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
							'label_typography'                  => array(
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
							'placeholder_typography'            => array(
								'label' => __( 'Placeholder Text', 'the-core' ),
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
							'default_text_typography'           => array(
								'label' => __( 'Default Text', 'the-core' ),
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
							'instructions_for_users_typography' => array(
								'label' => __( 'Instructions for Users', 'the-core' ),
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
							'success_message_typography'        => array(
								'label' => __( 'Success Message', 'the-core' ),
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
							'failure_message_typography'        => array(
								'label' => __( 'Failure Message', 'the-core' ),
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
							'form_bg_wrap'                      => array(
								'type'    => 'group',
								'options' => array(
									'form_bg_options' => array(
										'type'         => 'multi-picker',
										'label'        => false,
										'desc'         => false,
										'picker'       => array(
											'background' => array(
												'label'   => __( 'Form Bg Color', 'the-core' ),
												'desc'    => __( 'Select form background', 'the-core' ),
												'attr'    => array( 'class' => 'fw-checkbox-float-left' ),
												'type'    => 'radio',
												'choices' => array(
													'none'   => __( 'None', 'the-core' ),
													'custom' => __( 'Custom', 'the-core' ),
												),
												'value'   => 'none'
											),
										),
										'choices'      => array(
											'custom' => array(
												'form_bg_color' => array(
													'label'   => __( '', 'the-core' ),
													'desc'    => __( 'Select form background color', 'the-core' ),
													'help'    => __( 'The default color palette can be changed from the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __( 'Colors section', 'the-core' ) . '</a> ' . __( 'found in the Theme Settings page', 'the-core' ),
													'value'   => '',
													'choices' => $the_core_color_settings,
													'type'    => 'color-palette'
												),
											),
										),
										'show_borders' => false,
									),
								)
							),
							'padding_group'                     => array(
								'type'    => 'group',
								'options' => array(
									'html_label'     => array(
										'type'  => 'html',
										'value' => '',
										'label' => __( 'Form Padding', 'the-core' ),
										'html'  => '',
									),
									'padding_top'    => array(
										'label' => false,
										'desc'  => __( 'top', 'the-core' ),
										'type'  => 'short-text',
										'value' => '30',
									),
									'padding_right'  => array(
										'label' => false,
										'desc'  => __( 'right', 'the-core' ),
										'type'  => 'short-text',
										'value' => '30',
									),
									'padding_bottom' => array(
										'label' => false,
										'desc'  => __( 'bottom', 'the-core' ),
										'type'  => 'short-text',
										'value' => '30',
									),
									'padding_left'   => array(
										'label' => false,
										'desc'  => __( 'left', 'the-core' ),
										'type'  => 'short-text',
										'value' => '30',
									),
								)
							),
							'border_group'                      => array(
								'type'    => 'multi-picker',
								'label'   => false,
								'desc'    => false,
								'picker'  => array(
									'selected' => array(
										'type'         => 'switch',
										'value'        => 'no',
										'label'        => __( 'Fields Border', 'the-core' ),
										'desc'         => __( 'Add a border to the fields?', 'the-core' ),
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
							'fields_bg_options'                 => array(
								'type'         => 'multi-picker',
								'label'        => false,
								'desc'         => false,
								'picker'       => array(
									'background' => array(
										'label'   => __( 'Fields Bg Color', 'the-core' ),
										'desc'    => __( 'Select fields background', 'the-core' ),
										'attr'    => array( 'class' => 'fw-checkbox-float-left' ),
										'type'    => 'radio',
										'choices' => array(
											'none'   => __( 'None', 'the-core' ),
											'custom' => __( 'Custom', 'the-core' ),
										),
										'value'   => 'none'
									),
								),
								'choices'      => array(
									'custom' => array(
										'fields_bg_color' => array(
											'label'   => __( '', 'the-core' ),
											'desc'    => __( 'Select fields background color', 'the-core' ),
											'help'    => __( 'The default color palette can be changed from the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __( 'Colors section', 'the-core' ) . '</a> ' . __( 'found in the Theme Settings page', 'the-core' ),
											'value'   => '',
											'choices' => $the_core_color_settings,
											'type'    => 'color-palette'
										),
									),
								),
								'show_borders' => false,
							),
							'responsive'                        => array(
								'attr'          => array( 'class' => 'fw-advanced-button' ),
								'type'          => 'popup',
								'label'         => __( 'Responsive Behavior', 'the-core' ),
								'button'        => __( 'Settings', 'the-core' ),
								'size'          => 'small',
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
						)
					)
				),
			)
		)
	)
);