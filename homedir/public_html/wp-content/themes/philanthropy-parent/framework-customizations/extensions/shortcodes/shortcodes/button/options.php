<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

global $the_core_colors, $the_core_typography;
$the_core_admin_url           = admin_url();
$the_core_template_directory  = get_template_directory_uri();
$the_core_color_settings      = fw_get_db_settings_option('color_settings', $the_core_colors);
$the_core_typography_settings = fw_get_db_settings_option('typography_settings', $the_core_typography);

$options = array(
	'unique_id'       => array(
		'type' => 'unique'
	),
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
			'link'   => array(
				'label' => __( 'Link', 'the-core' ),
				'desc'  => __( 'Where should your button link to?', 'the-core' ),
				'type'  => 'text',
				'value' => '#'
			),
			'target' => array(
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
							'help'    => __( 'The Side by Side alignment option works only if you have 2 or more button shortcodes added.', 'the-core' ),
							'type'    => 'image-picker',
							'value'   => 'fw-btn-side-by-side',
							'choices' => array(
								'fw-btn-side-by-side' => array(
									'small' => array(
										'data-btn-alignment' => 'side-by-side',
										'height' => 50,
										'src'    => $the_core_template_directory . '/images/image-picker/side-by-side-position.jpg',
										'title'  => __( 'Side by Side', 'the-core' )
									),
								),
								'text-left'           => array(
									'small' => array(
										'height' => 50,
										'src'    => $the_core_template_directory . '/images/image-picker/left-position.jpg',
										'title'  => __( 'Left', 'the-core' )
									),
								),
								'text-center'         => array(
									'small' => array(
										'height' => 50,
										'src'    => $the_core_template_directory . '/images/image-picker/center-position.jpg',
										'title'  => __( 'Center', 'the-core' )
									),
								),
								'text-right'          => array(
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
		'label' => __( 'Custom Class', 'the-core' ),
		'desc'  => __( 'Enter custom CSS class', 'the-core' ),
		'help'  => sprintf( __('You can use this class to further style this shortcode by adding your custom CSS in the %sCustom CSS%s area.', 'the-core' ), '<a target="_blank" href="'.$the_core_admin_url.'admin.php?page=fw-settings#fw-options-tab-custom_css_tab'.'">', '</a>' ),
		'type'  => 'text',
		'value' => '',
	),
);