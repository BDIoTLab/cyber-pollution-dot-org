<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

global $the_core_colors, $the_core_typography;
$the_core_admin_url           = admin_url();
$the_core_template_directory  = get_template_directory_uri();
$the_core_color_settings      = fw_get_db_settings_option( 'color_settings', $the_core_colors );
$the_core_typography_settings = fw_get_db_settings_option( 'typography_settings', $the_core_typography );

$options = array(
	'unique_id'               => array(
		'type' => 'unique'
	),
	'blog_type'               => array(
		'type'    => 'image-picker',
		'label'   => __( 'Blog Style', 'the-core' ),
		'desc'    => __( 'Select the blog display style', 'the-core' ),
		'value'   => 'blog-1',
		'choices' => array(
			'blog-1' => array(
				'small' => array(
					'data-latest-posts-type' => 'type-1',
					'height'                 => 70,
					'src'                    => $the_core_template_directory . '/images/image-picker/blog-style1.jpg'
				),
				'large' => array(
					'data-latest-posts-type' => 'type-1',
					'height'                 => 214,
					'src'                    => $the_core_template_directory . '/images/image-picker/blog-style1.jpg'
				),
			),
			'blog-2' => array(
				'small' => array(
					'data-latest-posts-type' => 'type-2',
					'height'                 => 70,
					'src'                    => $the_core_template_directory . '/images/image-picker/blog-style2.jpg'
				),
				'large' => array(
					'data-latest-posts-type' => 'type-2',
					'height'                 => 214,
					'src'                    => $the_core_template_directory . '/images/image-picker/blog-style2.jpg'
				),
			),
			'blog-3' => array(
				'small' => array(
					'data-latest-posts-type' => 'type-3',
					'height'                 => 70,
					'src'                    => $the_core_template_directory . '/images/image-picker/blog-style3.jpg'
				),
				'large' => array(
					'data-latest-posts-type' => 'type-3',
					'height'                 => 214,
					'src'                    => $the_core_template_directory . '/images/image-picker/blog-style3.jpg'
				),
			),
		),
	),
	'blog_view'               => array(
		'type'    => 'multi-picker',
		'label'   => false,
		'desc'    => false,
		'picker'  => array(
			'selected' => array(
				'type'         => 'switch',
				'value'        => 'default',
				'label'        => __( 'Grid View', 'the-core' ),
				'desc'         => __( 'Display blog posts on a grid', 'the-core' ),
				'left-choice'  => array(
					'value' => 'default',
					'label' => __( 'No', 'the-core' ),
				),
				'right-choice' => array(
					'value' => 'grid',
					'label' => __( 'Yes', 'the-core' ),
				)
			),
		),
		'choices' => array(
			'grid' => array(
				'columns'       => array(
					'attr'    => array( 'class' => 'fw-checkbox-float-left' ),
					'label'   => __( '', 'the-core' ),
					'desc'    => __( 'Choose the number of columns', 'the-core' ),
					'type'    => 'radio',
					'value'   => 'fw-portfolio-cols-3',
					'choices' => array(
						'fw-portfolio-cols-2' => __( '2 columns', 'the-core' ),
						'fw-portfolio-cols-3' => __( '3 columns', 'the-core' ),
						'fw-portfolio-cols-4' => __( '4 columns', 'the-core' ),
					)
				),
				'grid_bg_color' => array(
					'label'   => __( '', 'the-core' ),
					'help'    => __( 'The default color palette can be changed from the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __( 'Colors section', 'the-core' ) . '</a> ' . __( 'found in the Theme Settings page', 'the-core' ),
					'desc'    => __( 'Select the grid background color', 'the-core' ),
					'value'   => '',
					'choices' => $the_core_color_settings,
					'type'    => 'color-palette'
				),
				'masonry' => array(
					'type'         => 'switch',
					'value'        => 'on',
					'label'        => __( '', 'the-core' ),
					'desc'         => __( 'Enable masonry?', 'the-core' ),
					'left-choice'  => array(
						'value' => 'off',
						'label' => __( 'No', 'the-core' ),
					),
					'right-choice' => array(
						'value' => 'on',
						'label' => __( 'Yes', 'the-core' ),
					)
				),
			)
		)
	),
	'blog_title'              => array(
		'type'    => 'multi-picker',
		'label'   => false,
		'desc'    => false,
		'picker'  => array(
			'selected' => array(
				'type'    => 'short-select',
				'label'   => __( 'Blog Titles', 'the-core' ),
				'desc'    => __( 'Choose the blog titles size, H1 being the largest', 'the-core' ),
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
						'h1_group' => array(
							'type'    => 'group',
							'options' => array(
								'h1'          => array(
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
								'hover_color' => array(
									'label'   => __( '', 'the-core' ),
									'help'    => __( 'The default color palette can be changed from the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __( 'Colors section', 'the-core' ) . '</a> ' . __( 'found in the Theme Settings page', 'the-core' ),
									'desc'    => __( 'Select the hover color', 'the-core' ),
									'value'   => '',
									'choices' => $the_core_color_settings,
									'type'    => 'color-palette'
								),
							)
						)
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
						'h2_group' => array(
							'type'    => 'group',
							'options' => array(
								'h2'          => array(
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
								'hover_color' => array(
									'label'   => __( '', 'the-core' ),
									'help'    => __( 'The default color palette can be changed from the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __( 'Colors section', 'the-core' ) . '</a> ' . __( 'found in the Theme Settings page', 'the-core' ),
									'desc'    => __( 'Select the hover color', 'the-core' ),
									'value'   => '',
									'choices' => $the_core_color_settings,
									'type'    => 'color-palette'
								),
							)
						)
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
						'h3_group' => array(
							'type'    => 'group',
							'options' => array(
								'h3'          => array(
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
								'hover_color' => array(
									'label'   => __( '', 'the-core' ),
									'help'    => __( 'The default color palette can be changed from the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __( 'Colors section', 'the-core' ) . '</a> ' . __( 'found in the Theme Settings page', 'the-core' ),
									'desc'    => __( 'Select the hover color', 'the-core' ),
									'value'   => '',
									'choices' => $the_core_color_settings,
									'type'    => 'color-palette'
								),
							)
						)
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
						'h4_group' => array(
							'type'    => 'group',
							'options' => array(
								'h4'          => array(
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
								'hover_color' => array(
									'label'   => __( '', 'the-core' ),
									'help'    => __( 'The default color palette can be changed from the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __( 'Colors section', 'the-core' ) . '</a> ' . __( 'found in the Theme Settings page', 'the-core' ),
									'desc'    => __( 'Select the hover color', 'the-core' ),
									'value'   => '',
									'choices' => $the_core_color_settings,
									'type'    => 'color-palette'
								),
							)
						)
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
						'h5_group' => array(
							'type'    => 'group',
							'options' => array(
								'h5'          => array(
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
								'hover_color' => array(
									'label'   => __( '', 'the-core' ),
									'help'    => __( 'The default color palette can be changed from the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __( 'Colors section', 'the-core' ) . '</a> ' . __( 'found in the Theme Settings page', 'the-core' ),
									'desc'    => __( 'Select the hover color', 'the-core' ),
									'value'   => '',
									'choices' => $the_core_color_settings,
									'type'    => 'color-palette'
								),
							)
						)
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
						'h6_group' => array(
							'type'    => 'group',
							'options' => array(
								'h6'          => array(
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
								'hover_color' => array(
									'label'   => __( '', 'the-core' ),
									'help'    => __( 'The default color palette can be changed from the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __( 'Colors section', 'the-core' ) . '</a> ' . __( 'found in the Theme Settings page', 'the-core' ),
									'desc'    => __( 'Select the hover color', 'the-core' ),
									'value'   => '',
									'choices' => $the_core_color_settings,
									'type'    => 'color-palette'
								),
							)
						)
					),
				),
			),
		),
	),
	'first_letter_caps'       => array(
		'type'         => 'switch',
		'value'        => 'fw-letter-no-caps',
		'label'        => __( 'First Letter Caps', 'the-core' ),
		'desc'         => __( 'Display first letter caps', 'the-core' ),
		'left-choice'  => array(
			'value' => 'fw-letter-no-caps',
			'label' => __( 'No', 'the-core' ),
		),
		'right-choice' => array(
			'value' => 'fw-letter-caps',
			'label' => __( 'Yes', 'the-core' ),
		)
	),
	'display_comments_number' => array(
		'type'    => 'multi-picker',
		'label'   => false,
		'desc'    => false,
		'picker'  => array(
			'selected' => array(
				'type'         => 'switch',
				'value'        => 'yes',
				'label'        => __( 'Comments Number', 'the-core' ),
				'desc'         => __( 'Display the no. of comments?', 'the-core' ),
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
				'comments_number_type' => array(
					'label'   => __( '', 'the-core' ),
					'type'    => 'image-picker',
					'value'   => 'fw-comment-link-type-1',
					'desc'    => __( 'Select the comments number type', 'the-core' ),
					'choices' => array(
						'fw-comment-link-type-1' => array(
							'small' => array(
								'height' => 50,
								'src'    => $the_core_template_directory . '/images/image-picker/comment-type1.jpg',
							)
						),
						'fw-comment-link-type-2' => array(
							'small' => array(
								'height' => 50,
								'src'    => $the_core_template_directory . '/images/image-picker/comment-type2.jpg',
							)
						),
						'fw-comment-link-type-3' => array(
							'small' => array(
								'height' => 50,
								'src'    => $the_core_template_directory . '/images/image-picker/comment-type3.jpg',
							)
						),
						'fw-comment-link-type-4' => array(
							'small' => array(
								'height' => 50,
								'src'    => $the_core_template_directory . '/images/image-picker/comment-type4.jpg',
							)
						),
						'fw-comment-link-type-5' => array(
							'small' => array(
								'height' => 50,
								'src'    => $the_core_template_directory . '/images/image-picker/comment-type5.jpg',
							)
						),
						'fw-comment-link-type-6' => array(
							'small' => array(
								'height' => 50,
								'src'    => $the_core_template_directory . '/images/image-picker/comment-type6.jpg',
							)
						),
					)
				)
			)
		)
	),
	'blog_btn'                => array(
		'type'    => 'group',
		'options' => array(
			'button_options' => array(
				'attr'          => array( 'class' => 'fw-advanced-button' ),
				'type'          => 'popup',
				'label'         => __( 'Blog Button', 'the-core' ),
				'desc'          => __( 'Change the style / typography of the blog button', 'the-core' ),
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
								'value' => 'Read More'
							),
						)
					),
					'btn_size_group'  => array(
						'type'    => 'group',
						'options' => array(
							'size' => array(
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
		),
	),
	'post_date'               => array(
		'label'        => __( 'Post Date', 'the-core' ),
		'desc'         => __( 'Show post date?', 'the-core' ),
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
	),
	'post_author'             => array(
		'label'        => __( 'Post Author', 'the-core' ),
		'desc'         => __( 'Show post author?', 'the-core' ),
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
	),
	'post_categories'         => array(
		'label'        => __( 'Post Categories', 'the-core' ),
		'desc'         => __( 'Show post categories?', 'the-core' ),
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
	),
	'category'                => array(
		'label'   => __( 'Display From', 'the-core' ),
		'desc'    => __( 'Select a blog category', 'the-core' ),
		'type'    => 'select',
		'value'   => '',
		'choices' => the_core_get_category_term_list(),
	),
	'load_more_button_group'  => array(
		'type'    => 'group',
		'options' => array(
			'posts_number' => array(
				'label' => __( 'No of Posts', 'the-core' ),
				'desc'  => __( 'Enter the number of posts to display. Ex: 3, 6, maximum of 50', 'the-core' ),
				'type'  => 'short-text',
				'value' => get_option( 'posts_per_page' )
			),
			'load_more_button' => array(
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
								'value' => 'Load More'
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
			'show_load_more'   => array(
				'attr'         => array( 'class' => 'button-options' ),
				'type'         => 'switch',
				'value'        => 'no',
				'label'        => __( 'Load More', 'the-core' ),
				'desc'         => __( 'Show load more button?', 'the-core' ),
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
	'animation_group'         => array(
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
	'responsive'              => array(
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
	'class'                   => array(
		'attr'  => array( 'class' => 'border-bottom-none' ),
		'label' => __( 'Custom Class', 'the-core' ),
		'desc'  => __( 'Enter custom CSS class', 'the-core' ),
		'type'  => 'text',
		'help'  => __( 'You can use this class to further style this shortcode by adding your custom CSS in the <strong>style.css</strong> file. This file is located on your server in the <strong>child-theme</strong> folder.', 'the-core' ),
		'value' => '',
	),
);