<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

global $the_core_colors, $the_core_typography;
$the_core_admin_url           = admin_url();
$the_core_template_directory  = get_template_directory_uri();
$the_core_color_settings      = fw_get_db_settings_option( 'color_settings', $the_core_colors );
$the_core_typography_settings = fw_get_db_settings_option( 'typography_settings', $the_core_typography );

$options = array(
	'unique_id'          => array(
		'type' => 'unique'
	),
	'style'              => array(
		'label'   => __( 'Style', 'the-core' ),
		'attr'    => array( 'class' => 'fw-testimonials-type' ),
		'type'    => 'image-picker',
		'value'   => 'fw-testimonials-1',
		'desc'    => __( 'Choose testimonials style', 'the-core' ),
		'choices' => array(
			'fw-testimonials-1' => array(
				'small' => array(
					'data-testimonials-type' => 'type-1',
					'height'                 => 75,
					'src'                    => $the_core_template_directory . '/images/image-picker/testimonials-style1.jpg'
				),
				'large' => array(
					'data-testimonials-type' => 'type-1',
					'height'                 => 208,
					'src'                    => $the_core_template_directory . '/images/image-picker/testimonials-style1.jpg'
				),
			),
			'fw-testimonials-2' => array(
				'small' => array(
					'data-testimonials-type' => 'type-2',
					'height'                 => 75,
					'src'                    => $the_core_template_directory . '/images/image-picker/testimonials-style2.jpg'
				),
				'large' => array(
					'data-testimonials-type' => 'type-2',
					'height'                 => 208,
					'src'                    => $the_core_template_directory . '/images/image-picker/testimonials-style2.jpg'
				),
			),
		),
	),
	'title-group'        => array(
		'type'    => 'group',
		'options' => array(
			'title'   => array(
				'label' => __( 'Title', 'the-core' ),
				'desc'  => __( 'Please enter the title', 'the-core' ),
				'type'  => 'text',
				'value' => '',
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
						'value'   => 'h3',
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
	'testimonials-group' => array(
		'type'    => 'group',
		'options' => array(
			'advanced_testimonials' => array(
				'attr'          => array(
					'data-advanced-for' => 'advanced-testimonials',
					'class'             => 'fw-advanced-button'
				),
				'type'          => 'popup',
				'label'         => __( 'Custom Style', 'the-core' ),
				'button'        => __( 'Styling', 'the-core' ),
				'size'          => 'medium',
				'popup-options' => array(
					'testimonial'  => array(
						'label' => __( 'Testimonial', 'the-core' ),
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
					'name'         => array(
						'label' => __( 'Name', 'the-core' ),
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
					'job_title'    => array(
						'label' => __( 'Job Title', 'the-core' ),
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
					'company'      => array(
						'label' => __( 'Company', 'the-core' ),
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
					'rating_color' => array(
						'label'   => __( 'Rating', 'the-core' ),
						'desc'    => __( 'Select the rating color', 'the-core' ),
						'help'    => __( 'The default color palette can be changed from the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __( 'Colors section', 'the-core' ) . '</a> ' . __( 'found in the Theme Settings page', 'the-core' ),
						'value'   => '',
						'choices' => $the_core_color_settings,
						'type'    => 'color-palette'
					),
				),
			),
			'testimonials'          => array(
				'attr'          => array( 'class' => 'advanced-testimonials' ),
				'label'         => __( 'Testimonials', 'the-core' ),
				'popup-title'   => __( 'Add/Edit Testimonial', 'the-core' ),
				'desc'          => __( 'Here you can add, remove and edit your Testimonials.', 'the-core' ),
				'type'          => 'addable-popup',
				'size'          => 'medium',
				'template'      => '{{=author_name}}',
				'popup-options' => array(
					'content'        => array(
						'label'      => __( 'Testimonial', 'the-core' ),
						'desc'       => __( 'Enter the testimonial here', 'the-core' ),
						'type'       => 'wp-editor',
						'tinymce'    => true,
						'wpautop'    => true,
						'shortcodes' => true,
						'value'      => '',
					),
					'rating_enabled' => array(
						'type'    => 'multi-picker',
						'label'   => false,
						'desc'    => false,
						'picker'  => array(
							'selected' => array(
								'type'         => 'switch',
								'label'        => __( 'Rating', 'the-core' ),
								'desc'         => __( 'Enable the testimonial rating?', 'the-core' ),
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
								'rating' => array(
									'label'      => __( '', 'the-core' ),
									'desc'       => __( 'Select the testimonial rating', 'the-core' ),
									'type'       => 'short-slider',
									'value'      => 1,
									'properties' => array(
										'min' => 1,
										'max' => 5,
										'sep' => 1,
									),
								),
							)
						)
					),
					'author_avatar'  => array(
						'label' => __( 'Image', 'the-core' ),
						'desc'  => __( 'Add an image to this testimonial', 'the-core' ),
						'type'  => 'upload',
					),
					'author_name'    => array(
						'label' => __( 'Name', 'the-core' ),
						'desc'  => __( 'Enter the name of the person that gave the testimonial', 'the-core' ),
						'type'  => 'text'
					),
					'author_job'     => array(
						'label' => __( 'Job Title', 'the-core' ),
						'desc'  => __( 'Enter the job title', 'the-core' ),
						'type'  => 'text'
					),
					'site_name'      => array(
						'label' => __( 'Company', 'the-core' ),
						'desc'  => __( 'Name of the company', 'the-core' ),
						'type'  => 'text'
					),
					'site_url'       => array(
						'label' => __( 'Website Link', 'the-core' ),
						'desc'  => __( "The company\'s website link", "the-core" ),
						'type'  => 'text'
					)
				)
			),
		)
	),
	'frame_group'        => array(
		'type'    => 'group',
		'options' => array(
			'image_size' => array(
				'type'  => 'short-text',
				'value' => '90',
				'label' => __( 'Image Size', 'the-core' ),
				'desc'  => __( 'Enter image size in pixels. Ex: 90', 'the-core' ),
			),
			'frame'      => array(
				'type'    => 'multi-picker',
				'label'   => false,
				'desc'    => false,
				'picker'  => array(
					'selected' => array(
						'type'         => 'switch',
						'value'        => '',
						'label'        => __( 'Border', 'the-core' ),
						'desc'         => __( 'Add a border to your image?', 'the-core' ),
						'left-choice'  => array(
							'value' => '',
							'label' => __( 'No', 'the-core' ),
						),
						'right-choice' => array(
							'value' => 'fw-block-image-frame',
							'label' => __( 'Yes', 'the-core' ),
						)
					),
				),
				'choices' => array(
					'fw-block-image-frame' => array(
						'border_size'  => array(
							'label' => __( '', 'the-core' ),
							'desc'  => __( 'Border size in pixels', 'the-core' ),
							'type'  => 'short-text',
							'value' => '',
						),
						'border_color' => array(
							'label'   => __( '', 'the-core' ),
							'desc'    => __( 'Select the border color', 'the-core' ),
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
	'show_in_slider'     => array(
		'type'         => 'multi-picker',
		'label'        => false,
		'desc'         => false,
		'picker'       => array(
			'selected_value' => array(
				'label'        => __( 'Display in Slider', 'the-core' ),
				'type'         => 'switch',
				'right-choice' => array(
					'value' => 'yes',
					'label' => __( 'Yes', 'the-core' )
				),
				'left-choice'  => array(
					'value' => 'no',
					'label' => __( 'No', 'the-core' )
				),
				'value'        => 'yes',
				'desc'         => __( 'Display testimonials in slider?', 'the-core' ),
				'help'         => __( 'If you choose NO the testimonials will be displayed one under the other based on the order list below.', 'the-core' ),
			)
		),
		'choices'      => array(
			'yes' => array(
				'interval' => array(
					'label' => __( 'Slide Duration', 'the-core' ),
					'desc'  => __( 'Enter the time interval between the slides in milliseconds. Ex: 5000', 'the-core' ),
					'type'  => 'short-text',
					'value' => '5000',
				),
				'effect'   => array(
					'label'   => __( 'Transition Effect', 'the-core' ),
					'desc'    => __( 'Select transition effect between slides', 'the-core' ),
					'type'    => 'short-select',
					'value'   => 'none',
					'choices' => array(
						'none'      => __( 'None', 'the-core' ),
						'fade'      => __( 'Fade', 'the-core' ),
						'crossfade' => __( 'Crossfade', 'the-core' ),
					)
				),
			),
			'no'  => array(),
		),
		'show_borders' => false,
	),
	'bg_group'           => array(
		'attr'    => array( 'class' => 'fw-testimonials-bg-group' ),
		'type'    => 'group',
		'options' => array(
			'bg_color'   => array(
				'label'   => __( 'Testimonial Bg Color', 'the-core' ),
				'help'    => __( 'The default color palette can be changed from the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __( 'Colors section', 'the-core' ) . '</a> ' . __( 'found in the Theme Settings page', 'the-core' ),
				'desc'    => __( 'Select the testimonial bg color', 'the-core' ),
				'value'   => '',
				'choices' => $the_core_color_settings,
				'type'    => 'color-palette'
			),
			'bg_opacity' => array(
				'type'       => 'slider',
				'value'      => 100,
				'properties' => array(
					'min' => 0,
					'max' => 100,
					'sep' => 1,
				),
				'label'      => __( '', 'the-core' ),
				'desc'       => __( 'Select the opacity in %', 'the-core' ),
			),
		)
	),
	'padding_group'      => array(
		'attr'    => array( 'class' => 'fw-testimonials-padding-group' ),
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
			'desktop_display'          => array(
				'type'   => 'multi-picker',
				'label'  => false,
				'desc'   => false,
				'picker' => array(
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
			'tablet_landscape_display' => array(
				'type'   => 'multi-picker',
				'label'  => false,
				'desc'   => false,
				'picker' => array(
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
			'tablet_display'           => array(
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
			'smartphone_display'       => array(
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
		'help'  => sprintf( __( 'You can use this class to further style this shortcode by adding your custom CSS in the %sCustom CSS%s area.', 'the-core' ), '<a target="_blank" href="' . $the_core_admin_url . 'admin.php?page=fw-settings#fw-options-tab-custom_css_tab' . '">', '</a>' ),
	),
);