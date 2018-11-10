<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

global $the_core_colors, $the_core_typography;
$the_core_admin_url           = admin_url();
$the_core_template_directory  = get_template_directory_uri();
$the_core_color_settings      = fw_get_db_settings_option( 'color_settings', $the_core_colors );
$the_core_typography_settings = fw_get_db_settings_option( 'typography_settings', $the_core_typography );

$shortcodes = fw_ext( 'shortcodes' );
$button     = $shortcodes->get_shortcode( 'button' );

$options = array(
	'unique_id'       => array(
		'type' => 'unique'
	),
	'tabs_group'      => array(
		'type'    => 'group',
		'options' => array(
			'tabs_advanced_styling' => array(
				'attr'          => array(
					'data-advanced-for' => 'tabs_advanced_styling',
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
							'tab_title'              => array(
								'label' => __( 'Tab Title', 'the-core' ),
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
							'active_tab_title_color' => array(
								'label'   => __( 'Active Tab Title', 'the-core' ),
								'help'    => __( 'The default color palette can be changed from the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __( 'Colors section', 'the-core' ) . '</a> ' . __( 'found in the Theme Settings page', 'the-core' ),
								'desc'    => __( 'Select the active tab title color', 'the-core' ),
								'value'   => '',
								'choices' => $the_core_color_settings,
								'type'    => 'color-palette'
							),
						)
					),
				),
			),
			'tabs'                  => array(
				'attr'          => array( 'class' => 'tabs_advanced_styling' ),
				'type'          => 'addable-popup',
				'size'          => 'medium',
				'label'         => __( 'Tabs', 'the-core' ),
				'size'          => 'medium',
				'popup-title'   => __( 'Add/Edit Tab', 'the-core' ),
				'desc'          => __( 'Add tabs', 'the-core' ),
				'template'      => '{{=tab_title}}',
				'popup-options' => array(
					'tab_title'       => array(
						'type'    => 'group',
						'options' => array(
							'tab_title' => array(
								'type'  => 'text',
								'label' => __( 'Tab Title', 'the-core' ),
								'desc'  => __( 'Enter tab title', 'the-core' )
							),
							'icon_type' => array(
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
							'icon_size' => array(
								'label' => __( 'Icon size', 'the-core' ),
								'type'  => 'short-text',
								'desc'  => __( 'Enter the icon size in pixels', 'the-core' ),
								'value' => ''
							),
						)
					),
					'image_group'     => array(
						'type'    => 'group',
						'options' => array(
							'image'          => array(
								'type'  => 'upload',
								'label' => __( 'Image', 'the-core' ),
								'desc'  => __( 'Upload an image', 'the-core' )
							),
							'image_position' => array(
								'label'   => __( 'Image Position', 'the-core' ),
								'desc'    => __( 'Select the image position', 'the-core' ),
								'type'    => 'image-picker',
								'value'   => is_rtl() ? 'fw-tabs-slider-media-right' : 'fw-tabs-slider-media-left',
								'choices' => array(
									'fw-tabs-slider-media-left'  => array(
										'small' => array(
											'height' => 50,
											'src'    => $the_core_template_directory . '/images/image-picker/left-position.jpg',
											'title'  => __( 'Left', 'the-core' )
										),
									),
									'fw-tabs-slider-media-right' => array(
										'small' => array(
											'height' => 50,
											'src'    => $the_core_template_directory . '/images/image-picker/right-position.jpg',
											'title'  => __( 'Right', 'the-core' )
										),
									),
								),
							),
						)
					),
					'content'         => array(
						'type'    => 'group',
						'options' => array(
							'tab_advanced_styling' => array(
								'attr'          => array(
									'data-advanced-for' => 'tab_advanced_styling',
									'class'             => 'fw-advanced-button'
								),
								'type'          => 'popup',
								'label'         => __( 'Custom Style', 'the-core' ),
								'desc'          => __( 'Change the style / typography of this shortcode', 'the-core' ),
								'button'        => __( 'Styling', 'the-core' ),
								'size'          => 'medium',
								'popup-options' => array(
									'tab_content_title'     => array(
										'label' => __( 'Content Title', 'the-core' ),
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
									'styling_content_group' => array(
										'type'    => 'group',
										'options' => array(
											'tab_text' => array(
												'label' => __( 'Content Text', 'the-core' ),
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
										)
									),
								)
							),
							'tab_content_title'    => array(
								'attr'  => array( 'class' => 'tab_advanced_styling' ),
								'type'  => 'text',
								'label' => __( 'Content Title', 'the-core' ),
								'desc'  => __( 'Enter content title', 'the-core' )
							),
							'tab_content'          => array(
								'type'       => 'wp-editor',
								'tinymce'    => true,
								'wpautop'    => true,
								'shortcodes' => true,
								'value'      => '',
								'label'      => __( 'Content Text', 'the-core' ),
								'desc'       => __( 'Enter tab content', 'the-core' )
							),
							'tab_alignment'        => array(
								'label'   => __( 'Content Alignment', 'the-core' ),
								'desc'    => __( 'Select the content alignment', 'the-core' ),
								'type'    => 'image-picker',
								'value'   => is_rtl() ? 'fw-tabs-slider-content-align-right' : 'fw-tabs-slider-content-align-left',
								'choices' => array(
									'fw-tabs-slider-content-align-left'   => array(
										'small' => array(
											'height' => 50,
											'src'    => $the_core_template_directory . '/images/image-picker/left-position.jpg',
											'title'  => __( 'Left', 'the-core' )
										),
									),
									'fw-tabs-slider-content-align-center' => array(
										'small' => array(
											'height' => 50,
											'src'    => $the_core_template_directory . '/images/image-picker/center-position.jpg',
											'title'  => __( 'Center', 'the-core' )
										),
									),
									'fw-tabs-slider-content-align-right'  => array(
										'small' => array(
											'height' => 50,
											'src'    => $the_core_template_directory . '/images/image-picker/right-position.jpg',
											'title'  => __( 'Right', 'the-core' )
										),
									),
								),
							),
							'tab_bg_color'         => array(
								'label'   => __( 'Bg Color', 'the-core' ),
								'desc'    => __( 'Select the content background color', 'the-core' ),
								'help'    => __( 'The default color palette can be changed from the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __( 'Colors section', 'the-core' ) . '</a> ' . __( 'found in the Theme Settings page', 'the-core' ),
								'value'   => '',
								'choices' => $the_core_color_settings,
								'type'    => 'color-palette'
							),
						)
					),
					'separator_group' => array(
						'type'    => 'group',
						'options' => array(
							'separator_styling' => array(
								'attr'          => array(
									'data-advanced-for' => 'separator-options',
									'class'             => 'fw-advanced-button'
								),
								'type'          => 'popup',
								'label'         => __( 'Custom Style', 'the-core' ),
								'desc'          => __( 'Change the style / typography of this shortcode', 'the-core' ),
								'button'        => __( 'Styling', 'the-core' ),
								'size'          => 'medium',
								'popup-options' => array(
									'type'            => array(
										'label'   => __( 'Type', 'the-core' ),
										'desc'    => __( 'Select divider type', 'the-core' ),
										'type'    => 'image-picker',
										'value'   => 'fw-line-solid',
										'choices' => array(
											'fw-line-solid'    => array(
												'small' => array(
													'height' => 50,
													'src'    => $the_core_template_directory . '/images/image-picker/solid.jpg',
													'title'  => __( 'Solid Line', 'the-core' )
												),
											),
											'fw-line-dashed'   => array(
												'small' => array(
													'height' => 50,
													'src'    => $the_core_template_directory . '/images/image-picker/dashed.jpg',
													'title'  => __( 'Dashed Line', 'the-core' )
												),
											),
											'fw-line-dotted'   => array(
												'small' => array(
													'height' => 50,
													'src'    => $the_core_template_directory . '/images/image-picker/dotted.jpg',
													'title'  => __( 'Dotted Line', 'the-core' )
												),
											),
											'fw-line-double'   => array(
												'small' => array(
													'height' => 50,
													'src'    => $the_core_template_directory . '/images/image-picker/double.jpg',
													'title'  => __( 'Double Line', 'the-core' )
												),
											),
											'fw-divider-space' => array(
												'small' => array(
													'height' => 50,
													'src'    => $the_core_template_directory . '/images/image-picker/space_gap.jpg',
													'title'  => __( 'Space', 'the-core' )
												),
											),
										),
									),
									'line_thickness'  => array(
										'label' => __( 'Line Thickness', 'the-core' ),
										'desc'  => __( 'Enter the line thickness in pixels', 'the-core' ),
										'value' => '',
										'type'  => 'short-text'
									),
									'divider_size'    => array(
										'type'         => 'multi-picker',
										'label'        => false,
										'desc'         => false,
										'picker'       => array(
											'size' => array(
												'label'   => __( 'Height', 'the-core' ),
												'desc'    => __( 'Select the top and bottom margin in px', 'the-core' ),
												'attr'    => array( 'class' => 'fw-checkbox-float-left' ),
												'type'    => 'radio',
												'choices' => array(
													'space-sm' => __( 'Small', 'the-core' ),
													'space-md' => __( 'Medium', 'the-core' ),
													'space-lg' => __( 'Large', 'the-core' ),
													'custom'   => __( 'Custom', 'the-core' ),
												),
												'value'   => 'space-md'
											),
										),
										'choices'      => array(
											'custom' => array(
												'margin_top'    => array(
													'label' => __( 'Margin Top', 'the-core' ),
													'desc'  => __( 'Enter margin-top in px', 'the-core' ),
													'attr'  => array( 'class' => 'fw-option-width-small' ),
													'type'  => 'short-text',
													'value' => ''
												),
												'margin_bottom' => array(
													'label' => __( 'Margin Bottom', 'the-core' ),
													'attr'  => array( 'class' => 'fw-option-width-small' ),
													'desc'  => __( 'Enter margin-bottom in px', 'the-core' ),
													'type'  => 'short-text',
													'value' => ''
												),
											),
											'no'     => array(),
										),
										'show_borders' => false,
									),
									'width'           => array(
										'type'    => 'multi-picker',
										'label'   => false,
										'desc'    => false,
										'picker'  => array(
											'selected' => array(
												'label'   => __( 'Width', 'the-core' ),
												'desc'    => __( 'Select the width size in %', 'the-core' ),
												'attr'    => array( 'class' => 'fw-checkbox-float-left' ),
												'type'    => 'radio',
												'choices' => array(
													'25'     => __( '25%', 'the-core' ),
													'50'     => __( '50%', 'the-core' ),
													'75'     => __( '75%', 'the-core' ),
													'100'    => __( '100%', 'the-core' ),
													'custom' => __( 'Custom', 'the-core' ),
												),
												'value'   => '100'
											),
										),
										'choices' => array(
											'custom' => array(
												'custom_width' => array(
													'label' => __( '', 'the-core' ),
													'desc'  => __( "Divider's width in pixels", "the-core" ),
													'type'  => 'short-text',
													'value' => ''
												)
											),
										),
									),
									'separator_color' => array(
										'label'   => __( 'Color', 'the-core' ),
										'desc'    => __( 'Select the separator color', 'the-core' ),
										'help'    => __( 'The default color palette can be changed from the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __( 'Colors section', 'the-core' ) . '</a> ' . __( 'found in the Theme Settings page', 'the-core' ),
										'value'   => '',
										'choices' => $the_core_color_settings,
										'type'    => 'color-palette'
									),
								),
							),
							'separator'         => array(
								'attr'         => array( 'class' => 'separator-options' ),
								'type'         => 'switch',
								'label'        => __( 'Separator', 'the-core' ),
								'desc'         => __( 'Enable the title separator?', 'the-core' ),
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
						)
					),
					'btn_group'       => array(
						'type'    => 'group',
						'options' => array(
							'box_btn' => array(
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
										'popup-options' => $button->get_options(),
									),
									'show_bnt'       => array(
										'attr'         => array( 'class' => 'button-options' ),
										'type'         => 'switch',
										'value'        => 'no',
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
					),

				)
			),
		)
	),
	'tabs_position'   => array(
		'label'   => __( 'Tabs Position', 'the-core' ),
		'desc'    => __( 'Select the tabs position', 'the-core' ),
		'type'    => 'image-picker',
		'value'   => 'fw-tabs-slider-nav-center',
		'choices' => array(
			'fw-tabs-slider-nav-left'   => array(
				'small' => array(
					'height' => 50,
					'src'    => $the_core_template_directory . '/images/image-picker/left-position.jpg',
					'title'  => __( 'Left', 'the-core' )
				),
			),
			'fw-tabs-slider-nav-center' => array(
				'small' => array(
					'height' => 50,
					'src'    => $the_core_template_directory . '/images/image-picker/center-position.jpg',
					'title'  => __( 'Center', 'the-core' )
				),
			),
			'fw-tabs-slider-nav-right'  => array(
				'small' => array(
					'height' => 50,
					'src'    => $the_core_template_directory . '/images/image-picker/right-position.jpg',
					'title'  => __( 'Right', 'the-core' )
				),
			),
		),
	),
	'ratio'           => array(
		'type'    => 'short-select',
		'label'   => __( 'Format', 'the-core' ),
		'value'   => 'fw-ratio-16-9',
		'choices' => array(
			'fw-original-ratio' => __( 'Original Ratio', 'the-core' ),
			'fw-ratio-3-4'      => __( '3-4', 'the-core' ),
			'fw-ratio-4-3'      => __( '4-3', 'the-core' ),
			'fw-ratio-16-9'     => __( '16-9', 'the-core' ),
			'fw-ratio-9-16'     => __( '9-16', 'the-core' ),
			'fw-ratio-1'        => __( '1-1', 'the-core' ),
		),
		'desc'    => __( 'Choose the format', 'the-core' )
	),
	'padding_group'   => array(
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
				'value' => '',
			),
			'padding_right'  => array(
				'label' => false,
				'desc'  => __( 'right', 'the-core' ),
				'type'  => 'short-text',
				'value' => '',
			),
			'padding_bottom' => array(
				'label' => false,
				'desc'  => __( 'bottom', 'the-core' ),
				'type'  => 'short-text',
				'value' => '',
			),
			'padding_left'   => array(
				'label' => false,
				'desc'  => __( 'left', 'the-core' ),
				'type'  => 'short-text',
				'value' => '',
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