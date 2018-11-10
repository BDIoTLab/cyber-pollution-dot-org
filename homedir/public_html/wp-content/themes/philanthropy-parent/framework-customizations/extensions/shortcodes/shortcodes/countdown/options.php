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
	'format_group'    => array(
		'type'    => 'group',
		'options' => array(
			'format' => array(
				'type'    => 'multi-picker',
				'label'   => false,
				'desc'    => false,
				'picker'  => array(
					'selected' => array(
						'label'   => __( 'Format', 'the-core' ),
						'type'    => 'image-picker',
						'value'   => 'fw-countdown-style-1',
						'desc'    => __( 'Select the prefered format', 'the-core' ),
						'choices' => array(
							'fw-countdown-style-1' => array(
								'small' => array(
									'height' => 75,
									'src'    => $the_core_template_directory . '/images/image-picker/countdown-style1.jpg'
								),
								'large' => array(
									'height' => 214,
									'src'    => $the_core_template_directory . '/images/image-picker/countdown-style1.jpg'
								),
							),
							'fw-countdown-style-2' => array(
								'small' => array(
									'height' => 75,
									'src'    => $the_core_template_directory . '/images/image-picker/countdown-style2.jpg'
								),
								'large' => array(
									'height' => 214,
									'src'    => $the_core_template_directory . '/images/image-picker/countdown-style2.jpg'
								),
							),
							'fw-countdown-style-3' => array(
								'small' => array(
									'height' => 75,
									'src'    => $the_core_template_directory . '/images/image-picker/countdown-style3.jpg'
								),
								'large' => array(
									'height' => 214,
									'src'    => $the_core_template_directory . '/images/image-picker/countdown-style3.jpg'
								),
							),
						),
					),
				),
				'choices' => array(
					'fw-countdown-style-1' => array(
						'advanced_styling' => array(
							'attr'          => array(
								'class' => 'fw-advanced-button'
							),
							'type'          => 'popup',
							'label'         => __( '', 'the-core' ),
							'button'        => __( 'Styling', 'the-core' ),
							'size'          => 'medium',
							'popup-options' => array(
								'numbers'       => array(
									'label' => __( 'Numbers', 'the-core' ),
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
								'letters'       => array(
									'label' => __( 'Letters', 'the-core' ),
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
								'format_group'  => array(
									'type'    => 'group',
									'options' => array(
										'background' => array(
											'label'   => __( 'Bg Color', 'the-core' ),
											'help'    => __( 'The default color palette can be changed from the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __( 'Colors section', 'the-core' ) . '</a> ' . __( 'found in the Theme Settings page', 'the-core' ),
											'desc'    => __( 'Select the background color', 'the-core' ),
											'value'   => '',
											'choices' => $the_core_color_settings,
											'type'    => 'color-palette'
										),
										'opacity'    => array(
											'type'       => 'slider',
											'value'      => 80,
											'properties' => array(
												'min' => 0,
												'max' => 100,
												'sep' => 1,
											),
											'label'      => __( '', 'the-core' ),
											'desc'       => __( 'Select the opacity in %', 'the-core' ),
										)
									)
								),
								'padding_group' => array(
									'type'    => 'group',
									'options' => array(
										'html_label'     => array(
											'type'  => 'html',
											'value' => '',
											'label' => __( 'Additional Spacing', 'the-core' ),
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
							),
						),
					),
					'fw-countdown-style-2' => array(
						'advanced_styling' => array(
							'attr'          => array(
								'class' => 'fw-advanced-button'
							),
							'type'          => 'popup',
							'label'         => __( '', 'the-core' ),
							'button'        => __( 'Styling', 'the-core' ),
							'size'          => 'medium',
							'popup-options' => array(
								'numbers' => array(
									'label' => __( 'Numbers', 'the-core' ),
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
								'letters' => array(
									'label' => __( 'Letters', 'the-core' ),
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
					),
					'fw-countdown-style-3' => array(
						'advanced_styling' => array(
							'attr'          => array(
								'class' => 'fw-advanced-button'
							),
							'type'          => 'popup',
							'label'         => __( '', 'the-core' ),
							'button'        => __( 'Styling', 'the-core' ),
							'size'          => 'medium',
							'popup-options' => array(
								'numbers' => array(
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
					),
				),
			),
		)
	),
	'date'            => array(
		'type'            => 'datetime-picker',
		'label'           => __( 'Countdown Expire Date', 'the-core' ),
		'desc'            => __( 'Set the countdown expire date', 'the-core' ),
		'value'           => '',
		'datetime-picker' => array(
			'format'        => 'Y/m/d H:i',
			'extra-formats' => array(),
			'moment-format' => 'YYYY/MM/DD HH:mm',
			'maxDate'       => false,
			'minDate'       => false,
			'timepicker'    => true,
			'datepicker'    => true,
			'defaultTime'   => '12:00'
		),
	),
	'alignment'       => array(
		'label'   => __( 'Alignment', 'the-core' ),
		'desc'    => __( 'Choose the alignment', 'the-core' ),
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
	'text-group'      => array(
		'type'    => 'group',
		'options' => array(
			'text_advanced_styling' => array(
				'attr'          => array(
					'data-advanced-for' => 'text-advanced',
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
						)
					)
				),
			),
			'text'                  => array(
				'attr'  => array( 'class' => 'text-advanced' ),
				'type'  => 'textarea',
				'value' => '',
				'label' => __( 'Text', 'the-core' ),
				'desc'  => __( 'This text is displayed after the countdown expires', 'the-core' )
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