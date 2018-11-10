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
	'shortcode_name' => array(
		'label' => __( 'Shortcode Name', 'the-core' ),
		'desc'  => __( 'Enter a name (it is for internal use and will not appear on the front end)', 'the-core' ),
		'help'  => __( 'Use this option to name your shortcode. It will help you go through the structure a lot easier.', 'the-core' ),
		'type'  => 'text',
	),
	'list_group'      => array(
		'type'    => 'group',
		'options' => array(
			'titles_advanced_styling' => array(
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
					'text' => array(
						'label' => __( 'Titles', 'the-core' ),
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
			'list_items'              => array(
				'attr'          => array( 'class' => 'button-advanced' ),
				'type'          => 'addable-popup',
				'size'          => 'medium',
				'label'         => __( 'List Items', 'the-core' ),
				'desc'          => __( 'Add list items', 'the-core' ),
				'template'      => '{{=item}}',
				'popup-options' => array(
					'sublist_group'  => array(
						'type'    => 'group',
						'options' => array(
							'item'          => array(
								'label' => __( 'Item', 'the-core' ),
								'desc'  => __( 'Enter an item in list', 'the-core' ),
								'type'  => 'text',
							),
							'sublist_items' => array(
								'type'          => 'addable-popup',
								'size'          => 'medium',
								'label'         => __( 'Sublist Items', 'the-core' ),
								'desc'          => __( 'Add sublist items', 'the-core' ),
								'template'      => '{{=subitem}}',
								'popup-options' => array(
									'subitem'        => array(
										'label' => __( 'Sublist Item', 'the-core' ),
										'desc'  => __( 'Enter a sublist item', 'the-core' ),
										'type'  => 'text',
									),
									'btn_link_group' => array(
										'type'    => 'group',
										'options' => array(
											'link'           => array(
												'label' => __( 'Link', 'the-core' ),
												'desc'  => __( 'Where should your button link to?', 'the-core' ),
												'type'  => 'text',
												'value' => '#'
											),
											'target_subitem' => array(
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
											'nofollow_subitem' => array(
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
										)
									),
								),
							),
						)
					),
					'btn_link_group' => array(
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
						)
					),
				),
			),
			'separator_group'         => array(
				'type'    => 'multi-picker',
				'label'   => false,
				'desc'    => false,
				'picker'  => array(
					'selected' => array(
						'type'         => 'switch',
						'label'        => __( '', 'the-core' ),
						'desc'         => __( 'Separate each list item by a line?', 'the-core' ),
						'value'        => '_self',
						'right-choice' => array(
							'value' => 'list-bordered',
							'label' => __( 'Yes', 'the-core' ),
						),
						'left-choice'  => array(
							'value' => '',
							'label' => __( 'No', 'the-core' ),
						),
					),
				),
				'choices' => array(
					'list-bordered' => array(
						'separator_color' => array(
							'label'   => __( '', 'the-core' ),
							'desc'    => __( "Select the separator's color", "the-core" ),
							'help'    => __( 'The default color palette can be changed from the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __( 'Colors section', 'the-core' ) . '</a> ' . __( 'found in the Theme Settings page', 'the-core' ),
							'value'   => '',
							'choices' => $the_core_color_settings,
							'type'    => 'color-palette'
						),
					),
				),
			),
		)
	),
	'list_type'       => array(
		'type'         => 'multi-picker',
		'label'        => false,
		'desc'         => false,
		'picker'       => array(
			'selected_value' => array(
				'label'   => __( 'Add Element', 'the-core' ),
				'desc'    => __( 'Make a numbered list or add an icon to list items', 'the-core' ),
				'attr'    => array( 'class' => 'fw-checkbox-float-left' ),
				'value'   => 'list-default',
				'type'    => 'radio',
				'choices' => array(
					'list-default' => __( 'None', 'the-core' ),
					'list-numbers' => __( 'Number', 'the-core' ),
					'list-icon'    => __( 'Icon', 'the-core' ),
					'upload-icon'  => __( 'Custom Upload', 'the-core' ),
				),
			)
		),
		'choices'      => array(
			'list-default' => array(),
			'list-numbers' => array(),
			'list-icon'    => array(
				'icon'      => array(
					'type'  => 'icon',
					'label' => __( '', 'the-core' )
				),
				'icon_size' => array(
					'label' => __( 'Icon Size', 'the-core' ),
					'desc'  => __( 'Enter the icon size in pixels', 'the-core' ),
					'value' => '14',
					'type'  => 'short-text'
				),
			),
			'upload-icon'  => array(
				'upload-custom-img' => array(
					'label' => '',
					'type'  => 'upload',
				),
				'icon_size'         => array(
					'label' => __( 'Icon Size', 'the-core' ),
					'desc'  => __( 'Enter the icon width in pixels', 'the-core' ),
					'value' => '14',
					'type'  => 'short-text'
				),
			),
		),
		'show_borders' => false,
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
		'type'  => 'text',
		'value' => '',
		'help'  => sprintf( __('You can use this class to further style this shortcode by adding your custom CSS in the %sCustom CSS%s area.', 'the-core' ), '<a target="_blank" href="'.$the_core_admin_url.'admin.php?page=fw-settings#fw-options-tab-custom_css_tab'.'">', '</a>' ),
	),
);