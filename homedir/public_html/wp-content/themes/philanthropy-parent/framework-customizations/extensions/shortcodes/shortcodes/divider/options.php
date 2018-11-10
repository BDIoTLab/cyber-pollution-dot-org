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
				'desc'    => __( 'Select the top and bottom space in px', 'the-core' ),
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
					'label' => __( 'Top Space', 'the-core' ),
					'desc'  => __( 'Enter top space in px', 'the-core' ),
					'attr'  => array( 'class' => 'fw-option-width-small' ),
					'type'  => 'short-text',
					'value' => ''
				),
				'margin_bottom' => array(
					'label' => __( 'Bottom Space', 'the-core' ),
					'attr'  => array( 'class' => 'fw-option-width-small' ),
					'desc'  => __( 'Enter bottom space in px', 'the-core' ),
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
	'alignment'       => array(
		'label'   => __( 'Alignment', 'the-core' ),
		'desc'    => __( 'Choose divider alignment', 'the-core' ),
		'type'    => 'image-picker',
		'value'   => is_rtl() ? 'fw-divider-align-right' : 'fw-divider-align-left',
		'choices' => array(
			'fw-divider-align-left'   => array(
				'small' => array(
					'height' => 50,
					'src'    => $the_core_template_directory . '/images/image-picker/left-position.jpg',
					'title'  => __( 'Left', 'the-core' )
				),
			),
			'fw-divider-align-center' => array(
				'small' => array(
					'height' => 50,
					'src'    => $the_core_template_directory . '/images/image-picker/center-position.jpg',
					'title'  => __( 'Center', 'the-core' )
				),
			),
			'fw-divider-align-right'  => array(
				'small' => array(
					'height' => 50,
					'src'    => $the_core_template_directory . '/images/image-picker/right-position.jpg',
					'title'  => __( 'Right', 'the-core' )
				),
			),
		),
	),
	'bg_color'        => array(
		'label'   => __( 'Color', 'the-core' ),
		'desc'    => __( 'Select divider color', 'the-core' ),
		'help'    => __( 'The default color palette can be changed from the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __( 'Colors section', 'the-core' ) . '</a> ' . __( 'found in the Theme Settings page', 'the-core' ),
		'value'   => '',
		'choices' => $the_core_color_settings,
		'type'    => 'color-palette'
	),
	'special_divider' => array(
		'type'         => 'multi-picker',
		'label'        => false,
		'desc'         => false,
		'picker'       => array(
			'selected_value' => array(
				'label'   => __( 'Add Element', 'the-core' ),
				'desc'    => __( 'Make a special divider by adding an icon or text to it', 'the-core' ),
				'attr'    => array( 'class' => 'fw-checkbox-float-left' ),
				'value'   => 'none',
				'type'    => 'radio',
				'choices' => array(
					'none'   => __( 'None', 'the-core' ),
					'text'   => __( 'Text', 'the-core' ),
					'icon'   => __( 'Icon', 'the-core' ),
					'custom' => __( 'Custom', 'the-core' ),
				),
			)
		),
		'choices'      => array(
			'text'   => array(
				'title_advanced_styling' => array(
					'attr'          => array(
						'data-advanced-for' => 'title-text-advanced',
						'class'             => 'fw-advanced-button'
					),
					'type'          => 'popup',
					'label'         => __( 'Custom Style', 'the-core' ),
					'desc'          => __( 'Change the style / typography of this shortcode', 'the-core' ),
					'button'        => __( 'Styling', 'the-core' ),
					'size'          => 'medium',
					'popup-options' => array(
						'text' => array(
							'label' => __( 'Text', 'the-core' ),
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
				'title_text'             => array(
					'attr'  => array( 'class' => 'title-text-advanced' ),
					'label' => __( '', 'the-core' ),
					'desc'  => __( 'This text will be displayed on the divider', 'the-core' ),
					'type'  => 'text',
					'value' => '',
				),
				'show_bg'                => array(
					'type'         => 'switch',
					'label'        => __( 'Background', 'the-core' ),
					'desc'         => __( 'Add a background to your text?', 'the-core' ),
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
				'position'               => array(
					'label'   => __( 'Position', 'the-core' ),
					'desc'    => __( 'Select text position', 'the-core' ),
					'type'    => 'image-picker',
					'value'   => '',
					'choices' => array(
						'title-left'  => array(
							'small' => array(
								'height' => 50,
								'src'    => $the_core_template_directory . '/images/image-picker/left-position.jpg',
								'title'  => __( 'Left', 'the-core' )
							),
						),
						''            => array(
							'small' => array(
								'height' => 50,
								'src'    => $the_core_template_directory . '/images/image-picker/center-position.jpg',
								'title'  => __( 'Center', 'the-core' )
							),
						),
						'title-right' => array(
							'small' => array(
								'height' => 50,
								'src'    => $the_core_template_directory . '/images/image-picker/right-position.jpg',
								'title'  => __( 'Right', 'the-core' )
							),
						),
					),
				),
			),
			'icon'   => array(
				'icon_class' => array(
					'type'  => 'icon',
					'label' => __( '', 'the-core' )
				),
				'icon_size'  => array(
					'label' => __( 'Icon Size', 'the-core' ),
					'desc'  => __( 'Enter the icon size in pixels', 'the-core' ),
					'value' => '12',
					'type'  => 'short-text'
				),
				'color'      => array(
					'label'   => __( 'Icon Color', 'the-core' ),
					'desc'    => __( 'Select the icon color', 'the-core' ),
					'help'    => __( 'The default color palette can be changed from the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __( 'Colors section', 'the-core' ) . '</a> ' . __( 'found in the Theme Settings page', 'the-core' ),
					'value'   => '',
					'choices' => $the_core_color_settings,
					'type'    => 'color-palette'
				),
				'show_bg'    => array(
					'type'         => 'switch',
					'label'        => __( 'Background', 'the-core' ),
					'desc'         => __( 'Add a background to your icon?', 'the-core' ),
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
				'position'   => array(
					'label'   => __( 'Position', 'the-core' ),
					'desc'    => __( 'Select icon position', 'the-core' ),
					'type'    => 'image-picker',
					'value'   => '',
					'choices' => array(
						'title-left'  => array(
							'small' => array(
								'height' => 50,
								'src'    => $the_core_template_directory . '/images/image-picker/left-position.jpg',
								'title'  => __( 'Left', 'the-core' )
							),
						),
						''            => array(
							'small' => array(
								'height' => 50,
								'src'    => $the_core_template_directory . '/images/image-picker/center-position.jpg',
								'title'  => __( 'Center', 'the-core' )
							),
						),
						'title-right' => array(
							'small' => array(
								'height' => 50,
								'src'    => $the_core_template_directory . '/images/image-picker/right-position.jpg',
								'title'  => __( 'Right', 'the-core' )
							),
						),
					),
				),
			),
			'none'   => array(),
			'custom' => array(
				'upload_icon' => array(
					'label' => '',
					'type'  => 'upload',
				),
				'icon_size'   => array(
					'label' => __( 'Icon Size', 'the-core' ),
					'desc'  => __( 'Enter the icon size in pixels', 'the-core' ),
					'value' => '12',
					'type'  => 'short-text'
				),
				'show_bg'     => array(
					'type'         => 'switch',
					'label'        => __( 'Background', 'the-core' ),
					'desc'         => __( 'Add a background to your icon?', 'the-core' ),
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
				'position'    => array(
					'label'   => __( 'Position', 'the-core' ),
					'desc'    => __( 'Select icon position', 'the-core' ),
					'type'    => 'image-picker',
					'value'   => '',
					'choices' => array(
						'title-left'  => array(
							'small' => array(
								'height' => 50,
								'src'    => $the_core_template_directory . '/images/image-picker/left-position.jpg',
								'title'  => __( 'Left', 'the-core' )
							),
						),
						''            => array(
							'small' => array(
								'height' => 50,
								'src'    => $the_core_template_directory . '/images/image-picker/center-position.jpg',
								'title'  => __( 'Center', 'the-core' )
							),
						),
						'title-right' => array(
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
		'show_borders' => false,
	),
	'link_id'         => array(
		'type'  => 'text',
		'label' => __( 'Link ID', 'the-core' ),
		'desc'  => __( 'Enter a custom CSS ID for this divider', 'the-core' ),
		'help'  => sprintf( "%s", __( 'Use this ID in any URL link in the page in order to anchor link to this divider: (Ex: http://www.your-domain.com/page-name#example-id)<br> Another way to anchor link to this divider is to copy/paste only the ID name in any link field on this page: (Ex: #example-id)', 'the-core' ) ),
		'value' => '',
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