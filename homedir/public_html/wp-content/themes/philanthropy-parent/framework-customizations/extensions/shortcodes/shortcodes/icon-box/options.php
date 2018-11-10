<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

global $the_core_colors, $the_core_typography;
$the_core_admin_url           = admin_url();
$the_core_template_directory  = get_template_directory_uri();
$the_core_color_settings      = fw_get_db_settings_option('color_settings', $the_core_colors);
$the_core_typography_settings = fw_get_db_settings_option('typography_settings', $the_core_typography);

$options = array(
	'unique_id'        => array(
		'type' => 'unique'
	),
	'icon-type-picker' => array(
		'type'    => 'multi-picker',
		'label'   => false,
		'desc'    => false,
		'picker'  => array(
			'icon-box-type' => array(
				'label'   => __( 'Style', 'the-core' ),
				'type'    => 'image-picker',
				'value'   => '',
				'desc'    => __( 'Choose the icon box style', 'the-core' ),
				'choices' => array(
					'fw-iconbox-1' => array(
						'small' => array(
							'data-icon-box-type' => 'type-1',
							'height' => 75,
							'src'    => $the_core_template_directory . '/images/image-picker/icon-box-type1.jpg',
						),
						'large' => array(
							'data-icon-box-type' => 'type-1',
							'height' => 208,
							'src'    => $the_core_template_directory . '/images/image-picker/icon-box-type1.jpg'
						),
					),
					'fw-iconbox-2' => array(
						'small' => array(
							'data-icon-box-type' => 'type-2',
							'height' => 75,
							'src'    => $the_core_template_directory . '/images/image-picker/icon-box-type2.jpg',
						),
						'large' => array(
							'data-icon-box-type' => 'type-2',
							'height' => 208,
							'src'    => $the_core_template_directory . '/images/image-picker/icon-box-type2.jpg'
						),
					),
					'fw-iconbox-3' => array(
						'small' => array(
							'data-icon-box-type' => 'type-3',
							'height' => 75,
							'src'    => $the_core_template_directory . '/images/image-picker/icon-box-type3.jpg',
						),
						'large' => array(
							'data-icon-box-type' => 'type-3',
							'height' => 208,
							'src'    => $the_core_template_directory . '/images/image-picker/icon-box-type3.jpg'
						),
					),
					'fw-iconbox-4' => array(
						'small' => array(
							'data-icon-box-type' => 'type-4',
							'height' => 75,
							'src'    => $the_core_template_directory . '/images/image-picker/icon-box-type4.jpg',
						),
						'large' => array(
							'data-icon-box-type' => 'type-4',
							'height' => 208,
							'src'    => $the_core_template_directory . '/images/image-picker/icon-box-type4.jpg'
						),
					),
				),
			),
		),
		'choices' => array(
			'fw-iconbox-3' => array(
				'icon-position' => array(
					'type'         => 'switch',
					'value'        => '',
					'label'        => __( 'Icon Position', 'the-core' ),
					'desc'         => __( 'Select your prefered icon position', 'the-core' ),
					'left-choice'  => array(
						'value' => '',
						'label' => __( 'Left', 'the-core' ),
					),
					'right-choice' => array(
						'value' => 'fw-icon-right',
						'label' => __( 'Right', 'the-core' ),
					)
				),
			),
			'fw-iconbox-4' => array(
				'bg_color'   => array(
					'label'   => __( 'Bg Color', 'the-core' ),
					'desc'    => __( 'Select the background color', 'the-core' ),
					'help'    => __( 'The default color palette can be changed from the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __( 'Colors section', 'the-core' ) . '</a> ' . __( 'found in the Theme Settings page', 'the-core' ),
					'value'   => '',
					'choices' => $the_core_color_settings,
					'type'    => 'color-palette'
				),
				'icon_position' => array(
					'label'   => __( 'Icon Position', 'the-core' ),
					'desc'    => __( 'Select the icon position', 'the-core' ),
					'type'    => 'image-picker',
					'value'   => 'fw-icon-left',
					'choices' => array(
						'fw-icon-left'   => array(
							'small' => array(
								'height' => 50,
								'src'    => $the_core_template_directory . '/images/image-picker/icon-left.jpg',
								'title'  => __( 'Left', 'the-core' )
							),
						),
						'fw-icon-right'  => array(
							'small' => array(
								'height' => 50,
								'src'    => $the_core_template_directory . '/images/image-picker/icon-right.jpg',
								'title'  => __( 'Right', 'the-core' )
							),
						),
						'fw-icon-top'    => array(
							'small' => array(
								'height' => 50,
								'src'    => $the_core_template_directory . '/images/image-picker/icon-top.jpg',
								'title'  => __( 'Top', 'the-core' )
							),
						),
						'fw-icon-bottom' => array(
							'small' => array(
								'height' => 50,
								'src'    => $the_core_template_directory . '/images/image-picker/icon-bottom.jpg',
								'title'  => __( 'Bottom', 'the-core' )
							),
						),
					),
				),
				'border_group'           => array(
					'type'    => 'multi-picker',
					'label'   => false,
					'desc'    => false,
					'picker'  => array(
						'selected' => array(
							'type'         => 'switch',
							'value'        => '',
							'label'        => __( 'Border', 'the-core' ),
							'desc'         => __( 'Add a border?', 'the-core' ),
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
					'choices' => array(
						'yes' => array(
							'border_size'  => array(
								'label' => __( '', 'the-core' ),
								'desc'  => __( 'Border size in pixels', 'the-core' ),
								'type'  => 'short-text',
								'value' => '1',
							),
							'border_color' => array(
								'label'   => __( '', 'the-core' ),
								'help'    => __( 'The default color palette can be changed from the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __( 'Colors section', 'the-core' ) . '</a> ' . __( 'found in the Theme Settings page', 'the-core' ),
								'desc'    => __( 'Select border color', 'the-core' ),
								'value'   => '',
								'choices' => $the_core_color_settings,
								'type'    => 'color-palette'
							),
						)
					)
				),
				'border_radius' => array(
					'label' => __( 'Corner Radius', 'the-core' ),
					'desc'  => __( 'Enter the corner radius in pixels', 'the-core' ),
					'value' => '0',
					'type'  => 'short-text'
				),
				'padding_group'      => array(
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
			),
		)
	),
	'title-group'      => array(
		'type'    => 'group',
		'options' => array(
			'box-title' => array(
				'attr'  => array( 'class' => 'title-advanced' ),
				'label' => __( 'Title', 'the-core' ),
				'desc'  => __( 'Enter the icon box title', 'the-core' ),
				'type'  => 'text',
			),
			'heading'   => array(
				'type'    => 'multi-picker',
				'label'   => false,
				'desc'    => false,
				'picker'  => array(
					'selected' => array(
						'type'    => 'short-select',
						'label'   => __( 'Size', 'the-core' ),
						'desc'    => __( 'Choose the heading size, H1 being the largest', 'the-core' ),
						'value'   => 'h4',
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
	'text-group'       => array(
		'type'    => 'group',
		'options' => array(
			'description_advanced_styling' => array(
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
			'box-desc'                     => array(
				'label'   => __( 'Description', 'the-core' ),
				'desc'    => __( 'Enter the icon box description', 'the-core' ),
				'attr'    => array( 'class' => 'text-advanced' ),
				'type'    => 'wp-editor',
				'tinymce' => true,
				'wpautop' => true,
				'shortcodes' => true,
				'value'   => '',
			),
		)
	),
	'icon-type'        => array(
		'type'    => 'multi-picker',
		'label'   => false,
		'desc'    => false,
		'picker'  => array(
			'icon-box-img' => array(
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
				'icon_class'   => array(
					'type'  => 'icon',
					'value' => '',
					'label' => '',
				),
				'icon_size'    => array(
					'label' => __( 'Icon Size', 'the-core' ),
					'desc'  => __( 'Enter the icon size in pixels', 'the-core' ),
					'value' => '40',
					'type'  => 'short-text'
				),
				'icon-color'   => array(
					'label'   => __( 'Icon Color', 'the-core' ),
					'desc'    => __( 'Select icon color', 'the-core' ),
					'help'    => __( 'The default color palette can be changed from the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __( 'Colors section', 'the-core' ) . '</a> ' . __( 'found in the Theme Settings page', 'the-core' ),
					'value'   => '',
					'choices' => $the_core_color_settings,
					'type'    => 'color-palette'
				),
				'icon-bg-type' => array(
					'type'    => 'multi-picker',
					'label'   => false,
					'desc'    => false,
					'picker'  => array(
						'icon-box-img' => array(
							'label'   => __( 'Background', 'the-core' ),
							'desc'    => __( 'Select the background type', 'the-core' ),
							'attr'    => array( 'class' => 'fw-checkbox-float-left' ),
							'type'    => 'radio',
							'value'   => 'bg-none',
							'choices' => array(
								'bg-none'     => __( 'None', 'the-core' ),
								'icon-square' => __( 'Square', 'the-core' ),
								'icon-circle' => __( 'Circle', 'the-core' )
							),
						),
					),
					'choices' => array(
						'icon-square' => array(
							'bg-color' => array(
								'label'   => __( '', 'the-core' ),
								'help'    => __( 'The default color palette can be changed from the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __( 'Colors section', 'the-core' ) . '</a> ' . __( 'found in the Theme Settings page', 'the-core' ),
								'desc'    => __( 'Select icon background color', 'the-core' ),
								'value'   => '',
								'choices' => $the_core_color_settings,
								'type'    => 'color-palette'
							)
						),
						'icon-circle' => array(
							'bg-color' => array(
								'label'   => __( '', 'the-core' ),
								'help'    => __( 'The default color palette can be changed from the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __( 'Colors section', 'the-core' ) . '</a> ' . __( 'found in the Theme Settings page', 'the-core' ),
								'desc'    => __( 'Select icon background color', 'the-core' ),
								'value'   => '',
								'choices' => $the_core_color_settings,
								'type'    => 'color-palette'
							)
						)
					)
				)
			),
			'upload-icon' => array(
				'upload-custom-img' => array(
					'label' => '',
					'type'  => 'upload',
				),
				'icon_size'         => array(
					'label' => __( 'Size', 'the-core' ),
					'desc'  => __( 'Enter the icon width in pixels', 'the-core' ),
					'value' => '40',
					'type'  => 'short-text'
				),
				'rounded'           => array(
					'type'         => 'switch',
					'value'        => '',
					'label'        => '',
					'desc'         => __( 'Make the image circle?', 'the-core' ),
					'left-choice'  => array(
						'value' => '',
						'label' => __( 'No', 'the-core' ),
					),
					'right-choice' => array(
						'value' => 'icon-circle',
						'label' => __( 'Yes', 'the-core' ),
					)
				),
			),
		)
	),
	'icon-box-btn'     => array(
		'type'    => 'group',
		'options' => array(
			'button_options' => array(
				'attr'          => array(
					'data-advanced-for' => 'button-options',
					'class'             => 'fw-advanced-button'
				),
				'type'          => 'popup',
				'label'         => __( 'Custom Style', 'the-core' ),
				'desc'          => __( 'Change the style / typography of this shortcode', 'the-core' ),
				'button'        => __( 'Styling', 'the-core' ),
				'size'          => 'medium',
				'popup-options' => array(
					'style_group'     => array(
						'type'    => 'group',
						'options' => array(
							'style' => array(
								'type'    => 'multi-picker',
								'label'   => false,
								'desc'    => false,
								'picker'  => array(
									'selected' => array(
										'label'   => __( 'Style', 'the-core' ),
										'desc'    => __( 'Choose button style', 'the-core' ),
										'type'    => 'image-picker',
                                        'attr'    => array( 'class' => 'fw-button-style-type' ),
										'value'   => 'fw-btn-1',
										'choices' => array(
											'fw-btn-1' => array(
												'small' => array(
													'height' => 70,
													'src'    => $the_core_template_directory . '/images/image-picker/button-style1.jpg'
												),
												'large' => array(
													'height' => 208,
													'src'    => $the_core_template_directory . '/images/image-picker/button-style1.jpg'
												),
											),
											'fw-btn-2' => array(
												'small' => array(
													'height' => 70,
													'src'    => $the_core_template_directory . '/images/image-picker/button-style2.jpg'
												),
												'large' => array(
													'height' => 208,
													'src'    => $the_core_template_directory . '/images/image-picker/button-style2.jpg'
												),
											),
											'fw-btn-3' => array(
												'small' => array(
													'height' => 70,
													'src'    => $the_core_template_directory . '/images/image-picker/button-style3.jpg'
												),
												'large' => array(
													'height' => 208,
													'src'    => $the_core_template_directory . '/images/image-picker/button-style3.jpg'
												),
											),
                                            'fw-btn-4' => array(
                                                'small' => array(
                                                    'height' => 70,
                                                    'src'    => $the_core_template_directory . '/images/image-picker/button-style4.jpg'
                                                ),
                                                'large' => array(
                                                    'height' => 208,
                                                    'src'    => $the_core_template_directory . '/images/image-picker/button-style4.jpg'
                                                ),
                                            ),
										),
									),
								),
								'choices' => array(
									'fw-btn-1' => array(
										'border_radius' => array(
											'label' => __( 'Corner Radius', 'the-core' ),
											'desc'  => __( 'Enter the corner radius in pixels', 'the-core' ),
											'value' => '0',
											'type'  => 'short-text'
										),
									),
									'fw-btn-2' => array(
										'border_radius' => array(
											'label' => __( 'Corner Radius', 'the-core' ),
											'desc'  => __( 'Enter the corner radius in pixels', 'the-core' ),
											'value' => '0',
											'type'  => 'short-text'
										),
										'border_size'   => array(
											'label' => __( '', 'the-core' ),
											'desc'  => __( 'Border size in pixels', 'the-core' ),
											'type'  => 'short-text',
											'value' => '1',
										),
									),
									'fw-btn-3' => array(
										'border_size' => array(
											'label' => __( '', 'the-core' ),
											'desc'  => __( 'Border size in pixels', 'the-core' ),
											'type'  => 'short-text',
											'value' => '1',
										),
									),
								),
							)
						)
					),
					'btn_color_group' => array(
						'type'    => 'group',
                        'attr'    => array( 'class' => 'fw-button-color-group' ),
						'options' => array(
							'normal_color' => array(
								'label'   => __( 'Normal Color', 'the-core' ),
								'desc'    => __( 'Select normal color', 'the-core' ),
								'help'    => __( 'The default color palette can be changed from the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __( 'Colors section', 'the-core' ) . '</a> ' . __( 'found in the Theme Settings page', 'the-core' ),
								'value'   => '',
								'choices' => $the_core_color_settings,
								'type'    => 'color-palette'
							),
							'hover_color'  => array(
								'label'   => __( 'Hover Color', 'the-core' ),
								'desc'    => __( 'Select hover color', 'the-core' ),
								'help'    => __( 'The default color palette can be changed from the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __( 'Colors section', 'the-core' ) . '</a> ' . __( 'found in the Theme Settings page', 'the-core' ),
								'value'   => '',
								'choices' => $the_core_color_settings,
								'type'    => 'color-palette'
							),
						)
					),
					'label-group'     => array(
						'type'    => 'group',
						'options' => array(
							'label_advanced_styling' => array(
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
									'advanced-group' => array(
										'type'    => 'group',
										'options' => array(
											'text'             => array(
												'label' => __( 'Label', 'the-core' ),
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
											'hover_text_color' => array(
												'label'   => __( '', 'the-core' ),
												'desc'    => __( 'Select text hover color', 'the-core' ),
												'help'    => __( 'The default color palette can be changed from the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __( 'Colors section', 'the-core' ) . '</a> ' . __( 'found in the Theme Settings page', 'the-core' ),
												'value'   => '',
												'choices' => $the_core_color_settings,
												'type'    => 'color-palette'
											),
										)
									)
								),
							),
							'label'                  => array(
								'label' => __( 'Label', 'the-core' ),
								'attr'  => array( 'class' => 'button-advanced' ),
								'desc'  => __( 'This is the text that appears on your button', 'the-core' ),
								'type'  => 'text',
								'value' => 'Submit'
							),
						)
					),
					'btn_link_group'  => array(
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
                            'open_in_popup' => array(
                                'type'    => 'multi-picker',
                                'label'   => false,
                                'desc'    => false,
                                'picker'  => array(
                                    'selected' => array(
                                        'type'         => 'switch',
                                        'value'        => 'no',
                                        'label'        => __( '', 'the-core' ),
                                        'desc'         => __( 'Open in popup?', 'the-core' ),
                                        'help'         => __( 'This option will overwrite the Open in new window setting and will work only for images and Vimeo / YouTube videos.', 'the-core' ),
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
						)
					),
					'btn_size_group'  => array(
						'type'    => 'group',
						'options' => array(
							'size'       => array(
								'type'    => 'multi-picker',
								'label'   => false,
								'desc'    => false,
								'picker'  => array(
									'selected' => array(
										'label'   => __( 'Button Size', 'the-core' ),
										'desc'    => __( 'Choose button size', 'the-core' ),
										'attr'    => array( 'class' => 'fw-checkbox-float-left' ),
										'type'    => 'radio',
										'value'   => 'fw-btn-md',
										'choices' => array(
											'fw-btn-sm' => __( 'Small', 'the-core' ),
											'fw-btn-md' => __( 'Normal', 'the-core' ),
											'fw-btn-lg' => __( 'Large', 'the-core' ),
											'custom'    => __( 'Custom', 'the-core' ),
										)
									),
								),
								'choices' => array(
									'custom' => array(
										'width'  => array(
											'label' => __( 'Width', 'the-core' ),
											'desc'  => __( 'Enter button width in pixels', 'the-core' ),
											'type'  => 'short-text',
											'value' => '',
										),
										'height' => array(
											'label' => __( 'Height', 'the-core' ),
											'desc'  => __( 'Enter button height in pixels', 'the-core' ),
											'type'  => 'short-text',
											'value' => '',
										),
									),
								),
							),
							'full_width' => array(
								'type'    => 'multi-picker',
								'label'   => false,
								'desc'    => false,
								'picker'  => array(
									'selected_type' => array(
										'type'         => 'switch',
										'label'        => __( '', 'the-core' ),
										'desc'         => __( 'Make this button full width?', 'the-core' ),
										'value'        => '',
										'right-choice' => array(
											'value' => 'fw-btn-full',
											'label' => __( 'Yes', 'the-core' ),
										),
										'left-choice'  => array(
											'value' => 'default',
											'label' => __( 'No', 'the-core' ),
										),
									),
								),
								'choices' => array(
									'default' => array(
										'btn_alignment' => array(
											'label'   => __( 'Alignment', 'the-core' ),
											'desc'    => __( 'Choose button alignment', 'the-core' ),
											'type'    => 'image-picker',
											'value'   => 'text-center',
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
									),
								),
							),
						)
					),
					'icon_group'      => array(
						'type'    => 'group',
						'options' => array(
							'icon_type'     => array(
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
							'icon_position' => array(
								'type'         => 'switch',
								'label'        => __( '', 'the-core' ),
								'desc'         => __( 'Choose the icon position', 'the-core' ),
								'value'        => 'pull-left-icon',
								'right-choice' => array(
									'value' => 'pull-right-icon',
									'label' => __( 'Right', 'the-core' ),
								),
								'left-choice'  => array(
									'value' => 'pull-left-icon',
									'label' => __( 'Left', 'the-core' ),
								),
							),
							'icon_size'     => array(
								'label' => __( 'Icon Size', 'the-core' ),
								'desc'  => __( 'Enter the icon size in pixels', 'the-core' ),
								'value' => '12',
								'type'  => 'short-text'
							),
						)
					),
				),
			),
			'show_bnt'       => array(
				'attr'         => array( 'class' => 'button-options' ),
				'type'         => 'switch',
				'value'        => 'no',
				'label'        => __( 'Button', 'the-core' ),
				'desc'         => __( 'Show button?', 'the-core' ),
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
	'animation_group'  => array(
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
	'class'            => array(
		'attr'  => array( 'class' => 'border-bottom-none' ),
		'label' => __( 'Custom Class', 'the-core' ),
		'desc'  => __( 'Enter custom CSS class', 'the-core' ),
		'type'  => 'text',
		'help'  => __( 'You can use this class to further style this shortcode by adding your custom CSS in the <strong>style.css</strong> file. This file is located on your server in the <strong>child-theme</strong> folder.', 'the-core' ),
		'value' => '',
	),

);