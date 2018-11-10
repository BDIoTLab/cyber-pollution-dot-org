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
	'title_group'     => array(
		'type'    => 'group',
		'options' => array(
			'title'   => array(
				'type'  => 'text',
				'label' => __( 'Title', 'the-core' ),
				'desc'  => __( 'Enter the heading title', 'the-core' ),
			),
			'heading' => array(
				'type'    => 'multi-picker',
				'label'   => false,
				'desc'    => false,
				'picker'  => array(
					'selected' => array(
						'type'    => 'short-select',
						'label'   => __( 'Size', 'the-core' ),
						'desc'    => __( 'Choose the heading size, H1 being the largest', 'the-core' ),
						'value'   => 'h2',
						'choices' => array(
							'h1' => 'H1',
							'h2' => 'H2',
							'h3' => 'H3',
							'h4' => 'H4',
							'h5' => 'H5',
							'h6' => 'H6',
						)
					),
				),
				'choices' => array(
					'h1' => array(
						'advanced_styling' => array(
							'attr'          => array( 'class' => 'fw-advanced-button' ),
							'type'          => 'popup',
							'label'         => __( '', 'the-core' ),
							'desc'          => __( 'Change the style / typography of this title', 'the-core' ),
							'button'        => __( 'Styling', 'the-core' ),
							'size'          => 'medium',
							'popup-options' => array(
								'h1' => array(
									'label' => __( 'H1', 'the-core' ),
									'type'  => 'tf-typography',
									'value' => array(
										'google_font'    => $the_core_typography_settings['h1']['google_font'],
										'subset'         => $the_core_typography_settings['h1']['subset'],
										'variation'      => $the_core_typography_settings['h1']['variation'],
										'family'         => $the_core_typography_settings['h1']['family'],
										'style'          => $the_core_typography_settings['h1']['style'],
										'weight'         => $the_core_typography_settings['h1']['weight'],
										'size'           => $the_core_typography_settings['h1']['size'],
										'line-height'    => $the_core_typography_settings['h1']['line-height'],
										'letter-spacing' => $the_core_typography_settings['h1']['letter-spacing'],
										'color-palette'  => '',
									)
								),
							),
						),
					),
					'h2' => array(
						'advanced_styling' => array(
							'attr'          => array( 'class' => 'fw-advanced-button' ),
							'type'          => 'popup',
							'label'         => __( '', 'the-core' ),
							'desc'          => __( 'Change the style / typography of this title', 'the-core' ),
							'button'        => __( 'Styling', 'the-core' ),
							'size'          => 'medium',
							'popup-options' => array(
								'h2' => array(
									'label' => __( 'H2', 'the-core' ),
									'type'  => 'tf-typography',
									'value' => array(
										'google_font'    => $the_core_typography_settings['h2']['google_font'],
										'subset'         => $the_core_typography_settings['h2']['subset'],
										'variation'      => $the_core_typography_settings['h2']['variation'],
										'family'         => $the_core_typography_settings['h2']['family'],
										'style'          => $the_core_typography_settings['h2']['style'],
										'weight'         => $the_core_typography_settings['h2']['weight'],
										'size'           => $the_core_typography_settings['h2']['size'],
										'line-height'    => $the_core_typography_settings['h2']['line-height'],
										'letter-spacing' => $the_core_typography_settings['h2']['letter-spacing'],
										'color-palette'  => '',
									)
								),
							),
						),
					),
					'h3' => array(
						'advanced_styling' => array(
							'attr'          => array( 'class' => 'fw-advanced-button' ),
							'type'          => 'popup',
							'label'         => __( '', 'the-core' ),
							'desc'          => __( 'Change the style / typography of this title', 'the-core' ),
							'button'        => __( 'Styling', 'the-core' ),
							'size'          => 'medium',
							'popup-options' => array(
								'h3' => array(
									'label' => __( 'H3', 'the-core' ),
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
							),
						),
					),
					'h4' => array(
						'advanced_styling' => array(
							'attr'          => array( 'class' => 'fw-advanced-button' ),
							'type'          => 'popup',
							'label'         => __( '', 'the-core' ),
							'desc'          => __( 'Change the style / typography of this title', 'the-core' ),
							'button'        => __( 'Styling', 'the-core' ),
							'size'          => 'medium',
							'popup-options' => array(
								'h4' => array(
									'label' => __( 'H4', 'the-core' ),
									'type'  => 'tf-typography',
									'value' => array(
										'google_font'    => $the_core_typography_settings['h4']['google_font'],
										'subset'         => $the_core_typography_settings['h4']['subset'],
										'variation'      => $the_core_typography_settings['h4']['variation'],
										'family'         => $the_core_typography_settings['h4']['family'],
										'style'          => $the_core_typography_settings['h4']['style'],
										'weight'         => $the_core_typography_settings['h4']['weight'],
										'size'           => $the_core_typography_settings['h4']['size'],
										'line-height'    => $the_core_typography_settings['h4']['line-height'],
										'letter-spacing' => $the_core_typography_settings['h4']['letter-spacing'],
										'color-palette'  => '',
									)
								),
							),
						),
					),
					'h5' => array(
						'advanced_styling' => array(
							'attr'          => array( 'class' => 'fw-advanced-button' ),
							'type'          => 'popup',
							'label'         => __( '', 'the-core' ),
							'desc'          => __( 'Change the style / typography of this title', 'the-core' ),
							'button'        => __( 'Styling', 'the-core' ),
							'size'          => 'medium',
							'popup-options' => array(
								'h5' => array(
									'label' => __( 'H5', 'the-core' ),
									'type'  => 'tf-typography',
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
							),
						),
					),
					'h6' => array(
						'advanced_styling' => array(
							'attr'          => array( 'class' => 'fw-advanced-button' ),
							'type'          => 'popup',
							'label'         => __( '', 'the-core' ),
							'desc'          => __( 'Change the style / typography of this title', 'the-core' ),
							'button'        => __( 'Styling', 'the-core' ),
							'size'          => 'medium',
							'popup-options' => array(
								'h6' => array(
									'label' => __( 'H6', 'the-core' ),
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
							),
						),
					),
				),
			),
		)
	),
	'subtitle_group'  => array(
		'type'    => 'group',
		'options' => array(
			'subtitle_advanced_styling' => array(
				'attr'          => array(
					'data-advanced-for' => 'subtitle-advanced',
					'class'             => 'fw-advanced-button'
				),
				'type'          => 'popup',
				'label'         => __( 'Custom Style', 'the-core' ),
				'desc'          => __( 'Change the style / typography of this shortcode', 'the-core' ),
				'button'        => __( 'Styling', 'the-core' ),
				'size'          => 'medium',
				'popup-options' => array(
					'subtitle_typography' => array(
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
				),
			),
			'subtitle'                  => array(
				'type'  => 'text',
				'label' => __( 'Subtitle', 'the-core' ),
				'desc'  => __( 'Enter the heading subtitle', 'the-core' ),
				'attr'  => array( 'class' => 'subtitle-advanced' ),
			),
		)
	),
	'centered'        => array(
		'label'   => __( 'Alignment', 'the-core' ),
		'desc'    => __( 'Select the title and subtitle alignment', 'the-core' ),
		'type'    => 'image-picker',
		'value'   => is_rtl() ? 'fw-heading-right' : 'fw-heading-left',
		'choices' => array(
			'fw-heading-left'   => array(
				'small' => array(
					'height' => 50,
					'src'    => $the_core_template_directory . '/images/image-picker/left-position.jpg',
					'title'  => __( 'Left', 'the-core' )
				),
			),
			'fw-heading-center' => array(
				'small' => array(
					'height' => 50,
					'src'    => $the_core_template_directory . '/images/image-picker/center-position.jpg',
					'title'  => __( 'Center', 'the-core' )
				),
			),
			'fw-heading-right'  => array(
				'small' => array(
					'height' => 50,
					'src'    => $the_core_template_directory . '/images/image-picker/right-position.jpg',
					'title'  => __( 'Right', 'the-core' )
				),
			),
		),
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
		'type'  => 'text',
		'label' => __( 'Custom Class', 'the-core' ),
		'desc'  => __( 'Enter a custom CSS class', 'the-core' ),
		'help'  => sprintf( __('You can use this class to further style this shortcode by adding your custom CSS in the %sCustom CSS%s area.', 'the-core' ), '<a target="_blank" href="'.$the_core_admin_url.'admin.php?page=fw-settings#fw-options-tab-custom_css_tab'.'">', '</a>' ),
	),
);