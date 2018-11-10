<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

global $the_core_colors, $the_core_typography;
$the_core_admin_url           = admin_url();
$the_core_template_directory  = get_template_directory_uri();
$the_core_color_settings      = fw_get_db_settings_option('color_settings', $the_core_colors);
$the_core_typography_settings = fw_get_db_settings_option('typography_settings', $the_core_typography);

$map_shortcode                = fw_ext( 'shortcodes' )->get_shortcode( 'map' );

$options = array(
	'unique_id'       => array(
		'type' => 'unique'
	),
	'location_group'  => array(
		'type'    => 'group',
		'options' => array(
			'data_provider'             => array(
				'type'         => 'multi-picker',
				'label'        => false,
				'desc'         => false,
				'picker'       => array(
					'population_method' => array(
						'label'   => __( 'Population Method', 'the-core' ),
						'desc'    => __( 'Select map population method (Ex: events, custom)', 'the-core' ),
						'help'    => sprintf( esc_html__('All Google Maps applications require authentication. Please insert your API Key in the %sGeneral Settings%s > API Keys tab. More about how Google Maps API Key work can be found %shere%s.', 'the-core' ), '<a href="' . $the_core_admin_url . 'themes.php?page=fw-settings" target="_blank">', '</a>', '<a target="_blank" href="https://developers.google.com/maps/documentation/javascript/get-api-key">', '</a>'),
						'type'    => 'select',
						'choices' => $map_shortcode->_get_picker_dropdown_choices(),
					)
				),
				'choices'      => $map_shortcode->_get_picker_choices(),
				'show_borders' => false,
			),
			'location_advanced_styling' => array(
				'attr'          => array(
					'class' => 'fw-advanced-button'
				),
				'type'          => 'popup',
				'label'         => __( '', 'the-core' ),
				'desc'          => __( 'Change the style / typography of the location', 'the-core' ),
				'button'        => __( 'Styling', 'the-core' ),
				'size'          => 'medium',
				'popup-options' => array(
					'advanced-group' => array(
						'type'    => 'group',
						'options' => array(
							'title'       => array(
								'label' => __( 'Location Title', 'the-core' ),
								'type'  => 'tf-typography',
								'value' => array(
									'google_font'    => $the_core_typography_settings['h6']['google_font'],
									'subset'         => $the_core_typography_settings['h6']['subset'],
									'variation'      => $the_core_typography_settings['h6']['variation'],
									'family'         => $the_core_typography_settings['h6']['family'],
									'style'          => $the_core_typography_settings['h6']['style'],
									'weight'         => $the_core_typography_settings['h6']['weight'],
									'size'           => $the_core_typography_settings['h6']['size'],
									'line-height'    => $the_core_typography_settings['h6']['line-height'],
									'letter-spacing' => $the_core_typography_settings['h6']['letter-spacing'],
									'color-palette'  => '',
								)
							),
							'description' => array(
								'label' => __( 'Location Description', 'the-core' ),
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
					)
				),
			),
		)
	),
	'map_type'        => array(
		'label'   => __( 'Map Type', 'the-core' ),
		'desc'    => __( 'Select map type', 'the-core' ),
		'type'    => 'image-picker',
		'value'   => '',
		'choices' => array(
			'roadmap'   => array(
				'small' => array(
					'height' => 75,
					'src'    => $the_core_template_directory . '/images/image-picker/map-roadmap.jpg',
				),
				'large' => array(
					'height' => 208,
					'src'    => $the_core_template_directory . '/images/image-picker/map-roadmap.jpg'
				),
			),
			'terrain'   => array(
				'small' => array(
					'height' => 75,
					'src'    => $the_core_template_directory . '/images/image-picker/map-terrain.jpg',
				),
				'large' => array(
					'height' => 208,
					'src'    => $the_core_template_directory . '/images/image-picker/map-terrain.jpg'
				),
			),
			'satellite' => array(
				'small' => array(
					'height' => 75,
					'src'    => $the_core_template_directory . '/images/image-picker/map-satellite.jpg',
				),
				'large' => array(
					'height' => 208,
					'src'    => $the_core_template_directory . '/images/image-picker/map-satellite.jpg'
				),
			),
			'hybrid'    => array(
				'small' => array(
					'height' => 75,
					'src'    => $the_core_template_directory . '/images/image-picker/map-hybrid.jpg',
				),
				'large' => array(
					'height' => 208,
					'src'    => $the_core_template_directory . '/images/image-picker/map-hybrid.jpg'
				),
			),
		),
	),
	'map_pin'         => array(
		'label' => __( 'Map Pin', 'the-core' ),
		'desc'  => __( 'Upload a pin for your location(s) (64x64)', 'the-core' ),
		'type'  => 'upload',
	),
	'map_height'      => array(
		'label' => __( 'Map Height', 'the-core' ),
		'desc'  => __( 'Enter the map height in pixels (Ex: 300)', 'the-core' ),
		'type'  => 'short-text',
		'value' => '400',
	),
	'map_zoom'        => array(
		'type'       => 'slider',
		'value'      => 15,
		'properties' => array(
			'min' => 0,
			'max' => 21,
			'sep' => 1,
		),
		'label'      => __( 'Map Zoom', 'the-core' ),
		'desc'       => __( 'Select map zoom', 'the-core' ),
	),
	'map_style'       => array(
		'label' => __( 'Map Style', 'the-core' ),
		'desc'  => __( 'Copy/Paste map styles from <a target="_blank" href="https://snazzymaps.com/explore">https://snazzymaps.com/</a>', 'the-core' ),
		'type'  => 'textarea',
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