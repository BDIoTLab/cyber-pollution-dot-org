<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'unique_id'          => array(
		'type' => 'unique'
	),
	'title-group'        => array(
		'type'    => 'group',
		'options' => array(
			'title_advanced_styling' => array(
				'attr'          => array(
					'data-advanced-for' => 'title_advanced_styling',
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
							'title' => array(
								'label' => __( 'Title', 'the-core' ),
								'type'  => 'tf-typography',
								'value' => array(
									'family'         => 'Montserrat',
									'size'           => '16',
									'line-height'    => '16',
									'letter-spacing' => '0',
								)
							),
						)
					)
				),
			),
			'slides'                 => array(
				'attr'          => array( 'class' => 'title_advanced_styling' ),
				'type'          => 'addable-popup',
				'size'          => 'medium',
				'label'         => __( 'Image Slider', 'the-core' ),
				'desc'          => __( 'Add a slide.', 'the-core' ),
				'template'      => '{{=slide_name}}',
				'popup-options' => array(
					'slide_name'  => array(
						'label' => __( 'Name', 'the-core' ),
						'desc'  => __( 'Enter a name (it is for internal use and will not appear on the front end)', 'the-core' ),
						'type'  => 'text',
					),
					'slide_title' => array(
						'label' => __( 'Title', 'the-core' ),
						'desc'  => __( 'Caption title', 'the-core' ),
						'type'  => 'text',
					),
					'slide_img'   => array(
						'label' => __( 'Slide', 'the-core' ),
						'desc'  => __( 'Uplaod slide img', 'the-core' ),
						'type'  => 'upload',
					)
				),
			),
		)
	),
	'auto_slide'         => array(
		'type'    => 'multi-picker',
		'label'   => false,
		'desc'    => false,
		'picker'  => array(
			'scroll' => array(
				'type'         => 'switch',
				'value'        => 'true',
				'label'        => __( 'Auto Slide', 'the-core' ),
				'desc'         => __( 'Enable auto slide?', 'the-core' ),
				'left-choice'  => array(
					'value' => 'false',
					'label' => __( 'No', 'the-core' ),
				),
				'right-choice' => array(
					'value' => 'true',
					'label' => __( 'Yes', 'the-core' ),
				)
			),
		),
		'choices' => array(
			'true' => array(
				'time'  => array(
					'value' => '5000',
					'label' => __( '', 'the-core' ),
					'desc'  => __( 'Time between slides in milliseconds (Ex: 2000)', 'the-core' ),
					'type'  => 'short-text',
				),
				'pause' => array(
					'type'         => 'switch',
					'value'        => '',
					'label'        => __( '', 'the-core' ),
					'desc'         => __( 'Enable pause when hovering the slideshow?', 'the-core' ),
					'left-choice'  => array(
						'value' => 'false',
						'label' => __( 'No', 'the-core' ),
					),
					'right-choice' => array(
						'value' => 'true',
						'label' => __( 'Yes', 'the-core' ),
					)
				),
			),

		)
	),
	'animation_settings' => array(
		'type'    => 'group',
		'options' => array(
			'animation' => array(
				'type'    => 'short-select',
				'value'   => 'none',
				'label'   => __( 'Animation', 'the-core' ),
				'desc'    => __( 'Choose slider animation on scroll', 'the-core' ),
				'choices' => array(
					'none'         => __( 'none', 'the-core' ),
					'crossfade'    => __( 'crossfade', 'the-core' ),
					'uncover'      => __( 'uncover', 'the-core' ),
					'uncover-fade' => __( 'uncover-fade', 'the-core' ),
				)
			),
			'duration'  => array(
				'type'  => 'short-text',
				'value' => '300',
				'label' => __( '', 'the-core' ),
				'desc'  => __( 'The animation time in milliseconds (Ex: 200)', 'the-core' ),
			),
		)
	),
	'ratio'              => array(
		'type'    => 'short-select',
		'label'   => __( 'Format', 'the-core' ),
		'value'   => 'fw-ratio-16-9',
		'choices' => array(
			'fw-ratio-3-4'  => __( '3-4', 'the-core' ),
			'fw-ratio-4-3'  => __( '4-3', 'the-core' ),
			'fw-ratio-16-9' => __( '16-9', 'the-core' ),
			'fw-ratio-9-16' => __( '9-16', 'the-core' ),
			'fw-ratio-1'    => __( '1-1', 'the-core' ),
		),
		'desc'    => __( 'Choose the slideshow format', 'the-core' )
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
		'attr'  => array( 'class' => 'border-bottom-none' ),
		'label' => __( 'Custom Class', 'the-core' ),
		'desc'  => __( 'Enter custom CSS class', 'the-core' ),
		'type'  => 'text',
		'help'  => __( 'You can use this class to further style this shortcode by adding your custom CSS in the <strong>style.css</strong> file. This file is located on your server in the <strong>child-theme</strong> folder.', 'the-core' ),
		'value' => '',
	),

);