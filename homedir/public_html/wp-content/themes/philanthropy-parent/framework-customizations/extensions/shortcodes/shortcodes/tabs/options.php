<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

global $the_core_colors, $the_core_typography;
$the_core_admin_url           = admin_url();
$the_core_template_directory  = get_template_directory_uri();
$the_core_color_settings      = fw_get_db_settings_option('color_settings', $the_core_colors);
$the_core_typography_settings = fw_get_db_settings_option('typography_settings', $the_core_typography);

$options = array(
	'unique_id'            => array(
		'type' => 'unique'
	),
	'shortcode_name'       => array(
		'label' => __( 'Shortcode Name', 'the-core' ),
		'desc'  => __( 'Enter a name (it is for internal use and will not appear on the front end)', 'the-core' ),
		'help'  => __( 'Use this option to name your shortcode. It will help you go through the structure a lot easier.', 'the-core' ),
		'type'  => 'text',
	),
	'tabs_position_picker' => array(
		'type'    => 'multi-picker',
		'label'   => false,
		'desc'    => false,
		'picker'  => array(
			'tabs_type' => array(
				'label'   => __( 'Type', 'the-core' ),
				'type'    => 'image-picker',
				'value'   => '',
				'desc'    => __( 'Choose the tabs type', 'the-core' ),
				'choices' => array(
					'one'   => array(
						'small' => array(
							'data-tabs-type' => 'type-1',
							'height' => 75,
							'src'    => $the_core_template_directory . '/images/image-picker/framed-top.jpg',
						),
						'large' => array(
							'data-tabs-type' => 'type-1',
							'height' => 208,
							'src'    => $the_core_template_directory . '/images/image-picker/framed-top.jpg'
						),
					),
					'two'   => array(
						'small' => array(
							'data-tabs-type' => 'type-2',
							'height' => 75,
							'src'    => $the_core_template_directory . '/images/image-picker/framed-side.jpg',
						),
						'large' => array(
							'data-tabs-type' => 'type-2',
							'height' => 208,
							'src'    => $the_core_template_directory . '/images/image-picker/framed-side.jpg'
						),
					),
					'three' => array(
						'small' => array(
							'data-tabs-type' => 'type-3',
							'height' => 75,
							'src'    => $the_core_template_directory . '/images/image-picker/minimal-top.jpg',
						),
						'large' => array(
							'data-tabs-type' => 'type-3',
							'height' => 208,
							'src'    => $the_core_template_directory . '/images/image-picker/minimal-top.jpg'
						),
					),
					'four'  => array(
						'small' => array(
							'data-tabs-type' => 'type-4',
							'height' => 75,
							'src'    => $the_core_template_directory . '/images/image-picker/minimal-side.jpg',
						),
						'large' => array(
							'data-tabs-type' => 'type-4',
							'height' => 208,
							'src'    => $the_core_template_directory . '/images/image-picker/minimal-side.jpg'
						),
					),
				),
			),
		),
		'choices' => array(
			'one'   => array(
				'tabs_justified' => array(
					'type'         => 'switch',
					'value'        => '',
					'label'        => __( '', 'the-core' ),
					'desc'         => __( 'Make tabs justified', 'the-core' ),
					'left-choice'  => array(
						'value' => '',
						'label' => __( 'No', 'the-core' ),
					),
					'right-choice' => array(
						'value' => 'nav-justified',
						'label' => __( 'Yes', 'the-core' ),
					)
				),
			),
			'three' => array(
				'tabs_justified'             => array(
					'type'         => 'switch',
					'value'        => '',
					'label'        => __( '', 'the-core' ),
					'desc'         => __( 'Make tabs justified', 'the-core' ),
					'left-choice'  => array(
						'value' => '',
						'label' => __( 'No', 'the-core' ),
					),
					'right-choice' => array(
						'value' => 'nav-justified',
						'label' => __( 'Yes', 'the-core' ),
					)
				),
				'separator_advanced_styling' => array(
					'attr'          => array(
						'data-advanced-for' => 'separator_advanced_styling',
						'class'             => 'fw-advanced-button'
					),
					'type'          => 'popup',
					'label'         => __( 'Custom Style', 'the-core' ),
					'desc'          => __( 'Change the style / typography of this shortcode', 'the-core' ),
					'button'        => __( 'Styling', 'the-core' ),
					'size'          => 'medium',
					'popup-options' => array(
						'separator_size'  => array(
							'label' => __( 'Size', 'the-core' ),
							'type'  => 'short-text',
							'desc'  => __( 'Enter the separator size in pixels', 'the-core' ),
							'value' => ''
						),
						'separator_color' => array(
							'label'   => __( 'Color', 'the-core' ),
							'help'    => __( 'The default color palette can be changed from the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __( 'Colors section', 'the-core' ) . '</a> ' . __( 'found in the Theme Settings page', 'the-core' ),
							'desc'    => __( 'Select the separator color', 'the-core' ),
							'value'   => '',
							'choices' => $the_core_color_settings,
							'type'    => 'color-palette'
						),
					),
				),
				'separator'                  => array(
					'attr'         => array( 'class' => 'separator_advanced_styling' ),
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
			'four'  => array(
				'separator_advanced_styling' => array(
					'attr'          => array(
						'data-advanced-for' => 'separator_advanced_styling',
						'class'             => 'fw-advanced-button'
					),
					'type'          => 'popup',
					'label'         => __( 'Custom Style', 'the-core' ),
					'desc'          => __( 'Change the style / typography of this shortcode', 'the-core' ),
					'button'        => __( 'Styling', 'the-core' ),
					'size'          => 'medium',
					'popup-options' => array(
						'separator_size'  => array(
							'label' => __( 'Size', 'the-core' ),
							'type'  => 'short-text',
							'desc'  => __( 'Enter the separator size in pixels', 'the-core' ),
							'value' => ''
						),
						'separator_color' => array(
							'label'   => __( 'Color', 'the-core' ),
							'help'    => __( 'The default color palette can be changed from the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __( 'Colors section', 'the-core' ) . '</a> ' . __( 'found in the Theme Settings page', 'the-core' ),
							'desc'    => __( 'Select the separator color', 'the-core' ),
							'value'   => '',
							'choices' => $the_core_color_settings,
							'type'    => 'color-palette'
						),
					),
				),
				'separator'                  => array(
					'attr'         => array( 'class' => 'separator_advanced_styling' ),
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
			)
		)
	),
	'tabs_group'           => array(
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
					'tab_title_group'   => array(
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
					'tab_content_title' => array(
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
					'tab_text'          => array(
						'label' => __( 'Text Content', 'the-core' ),
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
					'icon_size'         => array(
						'label' => __( 'Icon size', 'the-core' ),
						'type'  => 'short-text',
						'desc'  => __( 'Enter the icon size in pixels', 'the-core' ),
						'value' => ''
					),
					'tabs_bg_group'     => array(
						'type'    => 'group',
						'options' => array(
							'active_tab_bg'   => array(
								'type'         => 'multi-picker',
								'label'        => false,
								'desc'         => false,
								'picker'       => array(
									'background' => array(
										'label'   => __( 'Tab Bg Color', 'the-core' ),
										'desc'    => __( 'Active tab background color', 'the-core' ),
										'attr'    => array( 'class' => 'fw-checkbox-float-left' ),
										'type'    => 'radio',
										'choices' => array(
											'none'  => __( 'None', 'the-core' ),
											'color' => __( 'Color', 'the-core' ),
										),
										'value'   => 'none'
									),
								),
								'choices'      => array(
									'none'  => array(),
									'color' => array(
										'background_color' => array(
											'label'   => __( '', 'the-core' ),
											'help'    => __( 'The default color palette can be changed from the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __( 'Colors section', 'the-core' ) . '</a> ' . __( 'found in the Theme Settings page', 'the-core' ),
											'value'   => '',
											'choices' => $the_core_color_settings,
											'type'    => 'color-palette'
										),
									),
								),
								'show_borders' => false,
							),
							'inactive_tab_bg' => array(
								'type'         => 'multi-picker',
								'label'        => false,
								'desc'         => false,
								'picker'       => array(
									'background' => array(
										'label'   => __( '', 'the-core' ),
										'desc'    => __( 'Inactive tab background color', 'the-core' ),
										'attr'    => array( 'class' => 'fw-checkbox-float-left' ),
										'type'    => 'radio',
										'choices' => array(
											'none'  => __( 'None', 'the-core' ),
											'color' => __( 'Color', 'the-core' ),
										),
										'value'   => 'none'
									),
								),
								'choices'      => array(
									'none'  => array(),
									'color' => array(
										'background_color' => array(
											'label'   => __( '', 'the-core' ),
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
					'border_group'      => array(
						'type'    => 'multi-picker',
						'label'   => false,
						'desc'    => false,
						'picker'  => array(
							'image_boxed' => array(
								'type'         => 'switch',
								'value'        => '',
								'label'        => __( 'Border', 'the-core' ),
								'desc'         => __( 'Add a border to your tab?', 'the-core' ),
								'left-choice'  => array(
									'value' => '',
									'label' => __( 'No', 'the-core' ),
								),
								'right-choice' => array(
									'value' => 'imagebox-boxed',
									'label' => __( 'Yes', 'the-core' ),
								)
							),
						),
						'choices' => array(
							'imagebox-boxed' => array(
								'border_size'   => array(
									'label' => __( '', 'the-core' ),
									'desc'  => __( 'Border size in pixels', 'the-core' ),
									'type'  => 'short-text',
									'value' => '',
								),
								'border_radius' => array(
									'label' => __( '', 'the-core' ),
									'desc'  => __( 'Corner radius in pixels', 'the-core' ),
									'type'  => 'short-text',
									'value' => '',
								),
								'border_color'  => array(
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
					'tab_title' => array(
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
						)
					),
					'content'   => array(
						'type'    => 'group',
						'options' => array(
							'tab_content_title' => array(
								'type'  => 'text',
								'label' => __( 'Content Title', 'the-core' ),
								'desc'  => __( 'Enter content title', 'the-core' )
							),
							'tab_content'       => array(
								'type'    => 'wp-editor',
								'tinymce' => true,
								'wpautop' => true,
								'shortcodes' => true,
								'value'   => '',
								'label'   => __( 'Text Content', 'the-core' ),
								'desc'    => __( 'Enter tab content', 'the-core' )
							)
						)
					)

				)
			),
		)
	),
	'padding_group'        => array(
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
	'animation_group'      => array(
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
	'class'                => array(
		'attr'  => array( 'class' => 'border-bottom-none' ),
		'label' => __( 'Custom Class', 'the-core' ),
		'desc'  => __( 'Enter custom CSS class', 'the-core' ),
		'type'  => 'text',
		'help'  => __( 'You can use this class to further style this shortcode by adding your custom CSS in the <strong>style.css</strong> file. This file is located on your server in the <strong>child-theme</strong> folder.', 'the-core' ),
		'value' => '',
	),
);