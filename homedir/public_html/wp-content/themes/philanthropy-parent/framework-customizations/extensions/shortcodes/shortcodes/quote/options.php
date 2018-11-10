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
	'sign_group'      => array(
		'type'    => 'group',
		'options' => array(
			'quote_advanced_styling' => array(
				'attr'          => array(
					'data-advanced-for' => 'quote_advanced_styling',
					'class'             => 'fw-advanced-button'
				),
				'type'          => 'popup',
				'label'         => __( 'Custom Style', 'the-core' ),
				'desc'          => __( 'Change the style / typography of this shortcode', 'the-core' ),
				'button'        => __( 'Styling', 'the-core' ),
				'size'          => 'medium',
				'popup-options' => array(
					'quote_sign_font' => array(
						'label' => __( 'Quote Sign', 'the-core' ),
						'type'  => 'tf-typography',
						'value' => array(
							'google_font'    => true,
							'subset'         => 'latin-ext',
							'variation'      => 'regular',
							'family'         => 'News Cycle',
							'style'          => '',
							'weight'         => '',
							'size'           => 180,
							'line-height'    => 10,
							'letter-spacing' => 0,
							'color-palette'  => '',
						)

					),
					'sign_group'      => array(
						'type'    => 'group',
						'options' => array(
							'quote_top'  => array(
								'label' => __( 'Position', 'the-core' ),
								'desc'  => __( 'The top position in pixels', 'the-core' ),
								'value' => '',
								'type'  => 'short-text',
							),
							'quote_left' => array(
								'label' => __( '', 'the-core' ),
								'desc'  => __( 'The left position in pixels', 'the-core' ),
								'value' => '',
								'type'  => 'short-text',
							),
						)
					),
				),
			),
			'quote_simbol'           => array(
				'attr'         => array( 'class' => 'quote_advanced_styling' ),
				'type'         => 'switch',
				'label'        => __( 'Quote Sign', 'the-core' ),
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
	'text_group'      => array(
		'type'    => 'group',
		'options' => array(
			'text_advanced_styling' => array(
				'attr'          => array(
					'data-advanced-for' => 'text-advanced',
					'class'             => 'fw-advanced-button'
				),
				'type'          => 'popup',
				'label'         => __( 'Custom Style', 'the-core' ),
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
			'text'                  => array(
				'attr'    => array( 'class' => 'text-advanced' ),
				'label'   => __( 'Text', 'the-core' ),
				'desc'    => __( 'Enter quote text', 'the-core' ),
				'value'   => '',
				'type'    => 'wp-editor',
				'tinymce' => true,
				'wpautop' => true,
				'shortcodes' => true,
				'value'   => '',
			),
		)
	),
	'text_align'      => array(
		'label'   => __( 'Text Alignment', 'the-core' ),
		'desc'    => __( 'Select the prefered text alignment', 'the-core' ),
		'type'    => 'image-picker',
		'value'   => is_rtl() ? 'fw-quote-right' : 'fw-quote-left',
		'choices' => array(
			'fw-quote-left'   => array(
				'small' => array(
					'height' => 50,
					'src'    => $the_core_template_directory . '/images/image-picker/left-position.jpg',
					'title'  => __( 'Left', 'the-core' )
				),
			),
			'fw-quote-center' => array(
				'small' => array(
					'height' => 50,
					'src'    => $the_core_template_directory . '/images/image-picker/center-position.jpg',
					'title'  => __( 'Center', 'the-core' )
				),
			),
			'fw-quote-right'  => array(
				'small' => array(
					'height' => 50,
					'src'    => $the_core_template_directory . '/images/image-picker/right-position.jpg',
					'title'  => __( 'Right', 'the-core' )
				),
			),
		),
	),
	'separator_group' => array(
		'type'    => 'group',
		'options' => array(
			'separator_advanced_styling' => array(
				'attr'          => array(
					'data-advanced-for' => 'separator_advanced_styling',
					'class'             => 'fw-advanced-button'
				),
				'type'          => 'popup',
				'label'         => __( 'Custom Style', 'the-core' ),
				'button'        => __( 'Styling', 'the-core' ),
				'size'          => 'medium',
				'popup-options' => array(
					'separator_color' => array(
						'label'   => __( 'Color', 'the-core' ),
						'desc'    => __( 'Select the separator color', 'the-core' ),
						'help'    => __( 'The default color palette can be changed from the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __( 'Colors section', 'the-core' ) . '</a> ' . __( 'found in the Theme Settings page', 'the-core' ),
						'value'   => '',
						'choices' => $the_core_color_settings,
						'type'    => 'color-palette'
					),
					'separator_group' => array(
						'type'    => 'group',
						'options' => array(
							'separator_width'  => array(
								'label' => __( 'Size', 'the-core' ),
								'desc'  => __( 'Enter the separator width in pixels', 'the-core' ),
								'type'  => 'short-text',
								'value' => ''
							),
							'separator_height' => array(
								'label' => __( '', 'the-core' ),
								'desc'  => __( 'Enter the separator height in pixels', 'the-core' ),
								'type'  => 'short-text',
								'value' => ''
							),
						)
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
	),
	'author_group'    => array(
		'type'    => 'group',
		'options' => array(
			'author_advanced_styling' => array(
				'attr'          => array(
					'data-advanced-for' => 'author-advanced',
					'class'             => 'fw-advanced-button'
				),
				'type'          => 'popup',
				'label'         => __( 'Custom Style', 'the-core' ),
				'button'        => __( 'Styling', 'the-core' ),
				'size'          => 'medium',
				'popup-options' => array(
					'author' => array(
						'label' => __( 'Author', 'the-core' ),
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
				),
			),
			'author'                  => array(
				'attr'  => array( 'class' => 'author-advanced' ),
				'label' => __( 'Author', 'the-core' ),
				'desc'  => __( 'Enter the quote author', 'the-core' ),
				'type'  => 'text',
				'value' => ''
			),
			'author_link'             => array(
				'label' => __( 'Link', 'the-core' ),
				'desc'  => __( 'Enter the author link', 'the-core' ),
				'type'  => 'text',
				'value' => ''
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
		'type'  => 'text',
		'value' => '',
		'help'  => sprintf( __('You can use this class to further style this shortcode by adding your custom CSS in the %sCustom CSS%s area.', 'the-core' ), '<a target="_blank" href="'.$the_core_admin_url.'admin.php?page=fw-settings#fw-options-tab-custom_css_tab'.'">', '</a>' ),
	),
);