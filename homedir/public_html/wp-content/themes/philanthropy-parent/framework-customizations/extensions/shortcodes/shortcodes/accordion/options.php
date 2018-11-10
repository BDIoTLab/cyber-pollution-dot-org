<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

global $the_core_colors, $the_core_typography;
$the_core_admin_url           = admin_url();
$the_core_template_directory  = get_template_directory_uri();
$the_core_color_settings      = fw_get_db_settings_option('color_settings', $the_core_colors);
$the_core_typography_settings = fw_get_db_settings_option('typography_settings', $the_core_typography);

$options = array(
	'unique_id'          => array(
		'type' => 'unique'
	),
	'shortcode_name'     => array(
		'label' => __( 'Shortcode Name', 'the-core' ),
		'desc'  => __( 'Enter a name (it is for internal use and will not appear on the front end)', 'the-core' ),
		'help'  => __( 'Use this option to name your shortcode. It will help you go through the structure a lot easier.', 'the-core' ),
		'type'  => 'text',
	),
	'bg_color'           => array(
		'label'   => __( 'Tabs Color', 'the-core' ),
		'desc'    => __( 'Select accordion tabs color', 'the-core' ),
		'help'    => __( 'The default color palette can be changed from the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __( 'Colors section', 'the-core' ) . '</a> ' . __( 'found in the Theme Settings page', 'the-core' ),
		'value'   => '',
		'choices' => $the_core_color_settings,
		'type'    => 'color-palette'
	),
	'background_options' => array(
		'type'         => 'multi-picker',
		'label'        => false,
		'desc'         => false,
		'picker'       => array(
			'background' => array(
				'label'   => __( 'Content Bg', 'the-core' ),
				'desc'    => __( "Select the content's background color", "the-core" ),
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
				'background_color' => array(
					'label'   => __( '', 'the-core' ),
					'help'    => __( 'The default color palette can be changed from the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __( 'Colors section', 'the-core' ) . '</a> ' . __( 'found in the Theme Settings page', 'the-core' ),
					'desc'    => __( 'Select the background color', 'the-core' ),
					'value'   => '',
					'choices' => $the_core_color_settings,
					'type'    => 'color-palette'
				),
			),
		),
		'show_borders' => false,
	),
	'tabs-group'         => array(
		'type'    => 'group',
		'options' => array(
			'advanced-styling' => array(
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
					'titles'    => array(
						'label'          => __( 'Titles', 'the-core' ),
						'type'           => 'tf-typography',
						'value' => array(
							'google_font'    => $the_core_typography_settings['h5']['google_font'],
							'subset'         => $the_core_typography_settings['h5']['subset'],
							'variation'      => $the_core_typography_settings['h5']['variation'],
							'family'         => $the_core_typography_settings['h5']['family'],
							'style'          => $the_core_typography_settings['h5']['style'],
							'weight'         => $the_core_typography_settings['h5']['weight'],
							'size'           => $the_core_typography_settings['h5']['size'],
							'line-height'    => $the_core_typography_settings['h5']['line-height'],
							'letter-spacing' => $the_core_typography_settings['h5']['letter-spacing'],
							'color-palette'  => '',
						)
					),
					'body_text' => array(
						'label'          => __( 'Body Text', 'the-core' ),
						'type'           => 'tf-typography',
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
					'icon_size' => array(
						'label' => __( 'Icon Size', 'the-core' ),
						'desc'  => __( 'Enter the icon size in pixels', 'the-core' ),
						'value' => '16',
						'type'  => 'short-text'
					),
				),
			),
			'tabs'             => array(
				'type'          => 'addable-popup',
				'size'          => 'medium',
				'attr'          => array( 'class' => 'button-advanced' ),
				'label'         => __( 'Tabs', 'the-core' ),
				'popup-title'   => __( 'Add/Edit Tabs', 'the-core' ),
				'desc'          => __( 'Add tabs', 'the-core' ),
				'template'      => '{{=title}}',
				'popup-options' => array(
					'title'      => array(
						'label' => __( 'Title', 'the-core' ),
						'desc'  => __( 'Enter the tab title', 'the-core' ),
						'type'  => 'text',
						'value' => __( '', 'the-core' ),
					),
					'content'    => array(
						'label'   => __( 'Content', 'the-core' ),
						'desc'    => __( 'Enter the accordion content', 'the-core' ),
						'type'    => 'wp-editor',
						'tinymce' => true,
						'wpautop' => true,
						'shortcodes' => true,
						'value'   => '',
					),
					'opened'     => array(
						'type'         => 'switch',
						'label'        => __( 'Default State', 'the-core' ),
						'desc'         => __( 'Set the default state for the tab', 'the-core' ),
						'help'         => __( 'Only one tab can be opened. If you choose two opened tabs the first one will be set as opened based on the position in the tab list.', 'the-core' ),
						'value'        => '',
						'right-choice' => array(
							'value' => 'opened',
							'label' => __( 'Opened', 'the-core' ),
						),
						'left-choice'  => array(
							'value' => '',
							'label' => __( 'Closed', 'the-core' ),
						),
					),
					'icon_group' => array(
						'type'    => 'group',
						'options' => array(
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
	'animation_group'    => array(
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
	'class'              => array(
		'label' => __( 'Custom Class', 'the-core' ),
		'desc'  => __( 'Enter custom CSS class', 'the-core' ),
		'type'  => 'text',
		'value' => '',
		'help'  => sprintf( __('You can use this class to further style this shortcode by adding your custom CSS in the %sCustom CSS%s area.', 'the-core' ), '<a target="_blank" href="'.$the_core_admin_url.'admin.php?page=fw-settings#fw-options-tab-custom_css_tab'.'">', '</a>' ),
	),
);