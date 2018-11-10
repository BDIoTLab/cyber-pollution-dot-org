<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

global $the_core_colors, $the_core_typography;
$the_core_admin_url           = admin_url();
$the_core_template_directory  = get_template_directory_uri();
$the_core_color_settings      = fw_get_db_settings_option('color_settings', $the_core_colors);
$the_core_typography_settings = fw_get_db_settings_option('typography_settings', $the_core_typography);

$options = array(
	'unique_id'         => array(
		'type' => 'unique'
	),
	'member_type_picker' => array(
		'type' => 'multi-picker',
		'label' => false,
		'desc' => false,
		'picker' => array(
			'member_type' => array(
				'label' => __('Member Type', 'the-core'),
				'type' => 'image-picker',
				'value' => 'fw-team-member-type-1',
				'desc' => __('Select the prefered type', 'the-core'),
				'choices' => array(
					'fw-team-member-type-1' => array(
						'small' => array(
							'height' => 75,
							'src' => $the_core_template_directory . '/images/image-picker/team-member-type-1.jpg'
						),
						'large' => array(
							'height' => 214,
							'src' => $the_core_template_directory . '/images/image-picker/team-member-type-1.jpg'
						),
					),
					'fw-team-member-type-2' => array(
						'small' => array(
							'height' => 75,
							'src' => $the_core_template_directory . '/images/image-picker/team-member-type-2.jpg'
						),
						'large' => array(
							'height' => 214,
							'src' => $the_core_template_directory . '/images/image-picker/team-member-type-2.jpg'
						),
					),
				),
			),
		),
		'choices' => array(),
	),
	'image_group'       => array(
		'type'    => 'group',
		'options' => array(
			'image'       => array(
				'label' => __( 'Image', 'the-core' ),
				'desc'  => __( 'Upload an image', 'the-core' ),
				'type'  => 'upload'
			),
			'round_image' => array(
				'type'         => 'switch',
				'label'        => __( '', 'the-core' ),
				'desc'         => __( 'Make image round?', 'the-core' ),
				'value'        => '',
				'right-choice' => array(
					'value' => 'fw-block-image-circle',
					'label' => __( 'Yes', 'the-core' ),
				),
				'left-choice'  => array(
					'value' => '',
					'label' => __( 'No', 'the-core' ),
				),
			),
			'frame'       => array(
				'type'    => 'multi-picker',
				'label'   => false,
				'desc'    => false,
				'picker'  => array(
					'selected' => array(
						'type'         => 'switch',
						'value'        => '',
						'label'        => '',
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
			'ratio'             => array(
				'type'    => 'short-select',
				'label'   => __( 'Image Format', 'the-core' ),
				'value'   => 'fw-ratio-16-9',
				'choices' => array(
					array( // optgroup
						'attr'    => array('label' => __('Original', 'the-core')),
						'choices' => array(
							'fw-original-ratio' => __( 'Original Ratio', 'the-core' ),
						),
					),
					array( // optgroup
						'attr'    => array('label' => __('Landscape', 'the-core')),
						'choices' => array(
							'fw-ratio-16-9' => __( '16-9', 'the-core' ),
							'fw-ratio-4-3'  => __( '4-3', 'the-core' ),
							'fw-ratio-2-1'  => __( '2-1', 'the-core' ),
						),
					),
					array( // optgroup
						'attr'    => array('label' => __('Portrait', 'the-core')),
						'choices' => array(
							'fw-ratio-9-16' => __( '9-16', 'the-core' ),
							'fw-ratio-3-4'  => __( '3-4', 'the-core' ),
							'fw-ratio-1-2'  => __( '1-2', 'the-core' ),
						),
					),
					array( // optgroup
						'attr'    => array('label' => __('Square', 'the-core')),
						'choices' => array(
							'fw-ratio-1'    => __( '1-1', 'the-core' ),
						),
					),
				),
				'desc'    => __( 'Choose the image format', 'the-core' )
			),
			'image_size'  => array(
				'type'    => 'multi-picker',
				'label'   => false,
				'desc'    => false,
				'picker'  => array(
					'select_size' => array(
						'label'   => __( 'Size', 'the-core' ),
						'desc'    => __( 'Select the image size', 'the-core' ),
						'help'    => __( "<strong>Container size</strong> - the image will take the width of the container. Ex: in a 1/3 column the image will ocuppy the column's full width.", "the-core" ),
						'attr'    => array( 'class' => 'fw-checkbox-float-left' ),
						'type'    => 'radio',
						'value'   => 'auto',
						'choices' => array(
							'auto'   => __( 'Container size', 'the-core' ),
							'custom' => __( 'Custom', 'the-core' )
						),
					),
				),
				'choices' => array(
					'custom' => array(
						'width' => array(
							'label' => '',
							'desc'  => __( 'Image width in pixels', 'the-core' ),
							'type'  => 'short-text',
							'value' => '',
						),
					),
				)
			),
		)
	),
	'name_group'        => array(
		'type'    => 'group',
		'options' => array(
			'name'    => array(
				'label' => __( 'Name', 'the-core' ),
				'desc'  => __( 'Enter the team member name', 'the-core' ),
				'type'  => 'text',
				'value' => ''
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
	'job_group'         => array(
		'type'    => 'group',
		'options' => array(
			'job_advanced_styling' => array(
				'attr'          => array(
					'data-advanced-for' => 'job-advanced',
					'class'             => 'fw-advanced-button'
				),
				'type'          => 'popup',
				'label'         => __( 'Custom Style', 'the-core' ),
				'button'        => __( 'Styling', 'the-core' ),
				'size'          => 'medium',
				'popup-options' => array(
					'text' => array(
						'label' => __( 'Job Title', 'the-core' ),
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
			'job'                  => array(
				'attr'  => array( 'class' => 'job-advanced' ),
				'label' => __( 'Job Title', 'the-core' ),
				'desc'  => __( 'Enter the job title', 'the-core' ),
				'type'  => 'text',
				'value' => ''
			),
		)
	),
	'description_group' => array(
		'type'    => 'group',
		'options' => array(
			'description_advanced_styling' => array(
				'attr'          => array(
					'data-advanced-for' => 'description-advanced',
					'class'             => 'fw-advanced-button'
				),
				'type'          => 'popup',
				'label'         => __( 'Custom Style', 'the-core' ),
				'button'        => __( 'Styling', 'the-core' ),
				'size'          => 'medium',
				'popup-options' => array(
					'text' => array(
						'label' => __( 'Description', 'the-core' ),
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
			'desc'                         => array(
				'attr'    => array( 'class' => 'description-advanced' ),
				'label'   => __( 'Description', 'the-core' ),
				'desc'    => __( 'Enter team member description', 'the-core' ),
				'value'   => '',
				'type'    => 'wp-editor',
				'tinymce' => true,
				'wpautop' => true,
				'shortcodes' => true,
				'value'   => '',
			),
		)
	),
	'bg_group' => array(
		'type'    => 'group',
		'options' => array(
			'content_bg_color'  => array(
				'label'   => __( 'Bg Color', 'the-core' ),
				'desc'    => __( 'Select the background color', 'the-core' ),
				'help'    => __( 'The default color palette can be changed from the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __( 'Colors section', 'the-core' ) . '</a> ' . __( 'found in the Theme Settings page', 'the-core' ),
				'value'   => '',
				'choices' => $the_core_color_settings,
				'type'    => 'color-palette'
			),
			'content_bg_opacity' => array(
				'type'       => 'short-slider',
				'value'      => 100,
				'properties' => array(
					'min' => 0,
					'max' => 100,
					'sep' => 1,
				),
				'label'      => __( '', 'the-core' ),
				'desc'       => __( 'Select the bg color opacity in %', 'the-core' ),
			),
		)
	),
	'content_alignment' => array(
		'label'   => __( 'Content Alignment', 'the-core' ),
		'desc'    => __( 'Select the content alignment', 'the-core' ),
		'type'    => 'image-picker',
		'value'   => 'fw-content-align-center',
		'choices' => array(
			'fw-content-align-left'   => array(
				'small' => array(
					'height' => 50,
					'src'    => $the_core_template_directory . '/images/image-picker/left-position.jpg',
					'title'  => __( 'Left', 'the-core' )
				),
			),
			'fw-content-align-center' => array(
				'small' => array(
					'height' => 50,
					'src'    => $the_core_template_directory . '/images/image-picker/center-position.jpg',
					'title'  => __( 'Center', 'the-core' )
				),
			),
			'fw-content-align-right'  => array(
				'small' => array(
					'height' => 50,
					'src'    => $the_core_template_directory . '/images/image-picker/right-position.jpg',
					'title'  => __( 'Right', 'the-core' )
				),
			),
		)
	),
	'padding_group'     => array(
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
				'value' => '',
			),
			'padding_right'  => array(
				'label' => false,
				'desc'  => __( 'right', 'the-core' ),
				'type'  => 'short-text',
				'value' => '',
			),
			'padding_bottom' => array(
				'label' => false,
				'desc'  => __( 'bottom', 'the-core' ),
				'type'  => 'short-text',
				'value' => '',
			),
			'padding_left'   => array(
				'label' => false,
				'desc'  => __( 'left', 'the-core' ),
				'type'  => 'short-text',
				'value' => '',
			),
		)
	),
	'social_group'      => array(
		'type'    => 'group',
		'options' => array(
			'socials' => array(
				'type'          => 'addable-popup',
				'size'          => 'medium',
				'label'         => __( 'Social Links', 'the-core' ),
				'desc'          => __( 'Add social links', 'the-core' ),
				'template'      => '{{=social_name}}',
				'popup-options' => array(
					'social_name' => array(
						'label' => __( 'Name', 'the-core' ),
						'desc'  => __( 'Enter a name (it is for internal use and will not appear on the front end)', 'the-core' ),
						'type'  => 'text',
					),
					'social_type' => array(
						'type'    => 'multi-picker',
						'label'   => false,
						'desc'    => false,
						'picker'  => array(
							'social-type' => array(
								'label'   => __( 'Icon', 'the-core' ),
								'desc'    => __( 'Select social icon type', 'the-core' ),
								'attr'    => array( 'class' => 'fw-checkbox-float-left' ),
								'type'    => 'radio',
								'value'   => 'icon-social',
								'choices' => array(
									'icon-social' => __( 'Font Awesome', 'the-core' ),
									'upload-icon' => __( 'Custom Upload', 'the-core' ),
								),
							),
						),
						'choices' => array(
							'icon-social' => array(
								'icon_class'   => array(
									'type'  => 'icon',
									'value' => 'fa fa-adn',
									'label' => '',
								),
								'social_size'  => array(
									'label' => __( 'Size', 'the-core' ),
									'desc'  => __( 'Enter the icon size in pixels', 'the-core' ),
									'type'  => 'short-text',
									'value' => '20',
								),
								'normal_color' => array(
									'label'   => __( 'Color', 'the-core' ),
									'desc'    => __( 'Select the icon color', 'the-core' ),
									'help'    => __( 'The default color palette can be changed from the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __( 'Colors section', 'the-core' ) . '</a> ' . __( 'found in the Theme Settings page', 'the-core' ),
									'value'   => '',
									'choices' => $the_core_color_settings,
									'type'    => 'color-palette'
								),
							),
							'upload-icon' => array(
								'upload-social-icon' => array(
									'label' => '',
									'type'  => 'upload',
								),
								'social_size'        => array(
									'label' => __( 'Size', 'the-core' ),
									'desc'  => __( 'Enter the icon size in pixels', 'the-core' ),
									'type'  => 'short-text',
									'value' => '20',
								),
							),
						)
					),
					'social-link' => array(
						'label' => __( 'Link', 'the-core' ),
						'desc'  => __( 'Enter your social URL link', 'the-core' ),
						'type'  => 'text',
					)
				),
			),
		)
	),
	'animation_group'   => array(
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
	'class'             => array(
		'label' => __( 'Custom Class', 'the-core' ),
		'desc'  => __( 'Enter custom CSS class', 'the-core' ),
		'type'  => 'text',
		'value' => '',
		'help'  => sprintf( __('You can use this class to further style this shortcode by adding your custom CSS in the %sCustom CSS%s area.', 'the-core' ), '<a target="_blank" href="'.$the_core_admin_url.'admin.php?page=fw-settings#fw-options-tab-custom_css_tab'.'">', '</a>' ),
	),
);