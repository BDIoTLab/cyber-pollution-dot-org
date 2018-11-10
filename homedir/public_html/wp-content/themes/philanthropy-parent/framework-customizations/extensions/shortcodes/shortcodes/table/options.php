<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

global $the_core_colors, $the_core_typography;
$the_core_admin_url           = admin_url();
$the_core_template_directory  = get_template_directory_uri();
$the_core_color_settings      = fw_get_db_settings_option('color_settings', $the_core_colors);
$the_core_typography_settings = fw_get_db_settings_option('typography_settings', $the_core_typography);

$options = array(
	'unique_id'                      => array(
		'type' => 'unique'
	),
	'table'                          => array(
		'type'  => 'table',
		'label' => false,
		'desc'  => false,
	),
	'table_advanced_styling'         => array(
		'attr'          => array( 'class' => 'fw-advanced-button' ),
		'type'          => 'popup',
		'label'         => __( 'Custom Style', 'the-core' ),
		'desc'          => __( 'Change the style / typography of this shortcode', 'the-core' ),
		'button'        => __( 'Styling', 'the-core' ),
		'size'          => 'medium',
		'popup-options' => array(
			'heading_group'                      => array(
				'type'    => 'group',
				'options' => array(
					'heading_typography' => array(
						'label' => __( 'Heading', 'the-core' ),
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
					'heading_bg'         => array(
						'label'   => __( 'Heading Bg', 'the-core' ),
						'desc'    => __( 'Select heading background', 'the-core' ),
						'help'    => __( 'The default color palette can be changed from the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __( 'Colors section', 'the-core' ) . '</a> ' . __( 'found in the Theme Settings page', 'the-core' ),
						'value'   => '',
						'choices' => $the_core_color_settings,
						'type'    => 'color-palette'
					),
				)
			),
			'highlight_heading_group'            => array(
				'type'    => 'group',
				'options' => array(
					'highlight_heading_typography' => array(
						'label' => __( 'Highlight Heading', 'the-core' ),
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
					'highlight_heading_bg'         => array(
						'label'   => __( 'Highlight Heading Bg', 'the-core' ),
						'desc'    => __( 'Select highlight heading background', 'the-core' ),
						'help'    => __( 'The default color palette can be changed from the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __( 'Colors section', 'the-core' ) . '</a> ' . __( 'found in the Theme Settings page', 'the-core' ),
						'value'   => '',
						'choices' => $the_core_color_settings,
						'type'    => 'color-palette'
					),
				)
			),
			'description_heading_group'          => array(
				'type'    => 'group',
				'options' => array(
					'description_heading_typography' => array(
						'label' => __( 'Description Heading', 'the-core' ),
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
					'description_heading_bg'         => array(
						'label'   => __( 'Description Heading Bg', 'the-core' ),
						'desc'    => __( 'Select description heading background', 'the-core' ),
						'help'    => __( 'The default color palette can be changed from the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __( 'Colors section', 'the-core' ) . '</a> ' . __( 'found in the Theme Settings page', 'the-core' ),
						'value'   => '',
						'choices' => $the_core_color_settings,
						'type'    => 'color-palette'
					),
				)
			),
			'price_group'                        => array(
				'type'    => 'group',
				'options' => array(
					'price_typography' => array(
						'label' => __( 'Price', 'the-core' ),
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
					'pricing_bg'       => array(
						'label'   => __( 'Pricing Bg', 'the-core' ),
						'desc'    => __( 'Select pricing background', 'the-core' ),
						'help'    => __( 'The default color palette can be changed from the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __( 'Colors section', 'the-core' ) . '</a> ' . __( 'found in the Theme Settings page', 'the-core' ),
						'value'   => '',
						'choices' => $the_core_color_settings,
						'type'    => 'color-palette'
					),
				)
			),
			'highlight_price_group'              => array(
				'type'    => 'group',
				'options' => array(
					'highlight_price_typography' => array(
						'label' => __( 'Highlight Price', 'the-core' ),
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
					'highlight_pricing_bg'       => array(
						'label'   => __( 'Highlight Pricing Bg', 'the-core' ),
						'desc'    => __( 'Select highlight pricing background', 'the-core' ),
						'help'    => __( 'The default color palette can be changed from the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __( 'Colors section', 'the-core' ) . '</a> ' . __( 'found in the Theme Settings page', 'the-core' ),
						'value'   => '',
						'choices' => $the_core_color_settings,
						'type'    => 'color-palette'
					),
				)
			),
			'default_typography_group'           => array(
				'type'    => 'group',
				'options' => array(
					'default_typography' => array(
						'label' => __( 'Default', 'the-core' ),
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
					'default_bg'         => array(
						'label'   => __( 'Default Bg', 'the-core' ),
						'desc'    => __( 'Select default background', 'the-core' ),
						'help'    => __( 'The default color palette can be changed from the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __( 'Colors section', 'the-core' ) . '</a> ' . __( 'found in the Theme Settings page', 'the-core' ),
						'value'   => '',
						'choices' => $the_core_color_settings,
						'type'    => 'color-palette'
					),
				)
			),
			'highlight_default_typography_group' => array(
				'type'    => 'group',
				'options' => array(
					'highlight_default_typography' => array(
						'label' => __( 'Highlight Default', 'the-core' ),
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
					'highlight_default_bg'         => array(
						'label'   => __( 'Highlight Default Bg', 'the-core' ),
						'desc'    => __( 'Select default background', 'the-core' ),
						'help'    => __( 'The default color palette can be changed from the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __( 'Colors section', 'the-core' ) . '</a> ' . __( 'found in the Theme Settings page', 'the-core' ),
						'value'   => '',
						'choices' => $the_core_color_settings,
						'type'    => 'color-palette'
					),
				)
			),
			'description_typography_group'       => array(
				'type'    => 'group',
				'options' => array(
					'description_typography' => array(
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
					'description_bg'         => array(
						'label'   => __( 'Description Bg', 'the-core' ),
						'desc'    => __( 'Select description background', 'the-core' ),
						'help'    => __( 'The default color palette can be changed from the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __( 'Colors section', 'the-core' ) . '</a> ' . __( 'found in the Theme Settings page', 'the-core' ),
						'value'   => '',
						'choices' => $the_core_color_settings,
						'type'    => 'color-palette'
					),
				)
			),
			'switch_bg'                          => array(
				'label'   => __( 'Switch Bg', 'the-core' ),
				'desc'    => __( 'Select switch background', 'the-core' ),
				'help'    => __( 'The default color palette can be changed from the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __( 'Colors section', 'the-core' ) . '</a> ' . __( 'found in the Theme Settings page', 'the-core' ),
				'value'   => '',
				'choices' => $the_core_color_settings,
				'type'    => 'color-palette'
			),
			'highlight_switch_bg'                => array(
				'label'   => __( 'Highlight Switch Bg', 'the-core' ),
				'desc'    => __( 'Select highlight switch background', 'the-core' ),
				'help'    => __( 'The default color palette can be changed from the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __( 'Colors section', 'the-core' ) . '</a> ' . __( 'found in the Theme Settings page', 'the-core' ),
				'value'   => '',
				'choices' => $the_core_color_settings,
				'type'    => 'color-palette'
			),
			'button_bg'                          => array(
				'label'   => __( 'Button Bg', 'the-core' ),
				'desc'    => __( 'Select button background', 'the-core' ),
				'help'    => __( 'The default color palette can be changed from the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __( 'Colors section', 'the-core' ) . '</a> ' . __( 'found in the Theme Settings page', 'the-core' ),
				'value'   => '',
				'choices' => $the_core_color_settings,
				'type'    => 'color-palette'
			),
			'highlight_button_bg'                => array(
				'label'   => __( 'Highlight Button Bg', 'the-core' ),
				'desc'    => __( 'Select highlight button background', 'the-core' ),
				'help'    => __( 'The default color palette can be changed from the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __( 'Colors section', 'the-core' ) . '</a> ' . __( 'found in the Theme Settings page', 'the-core' ),
				'value'   => '',
				'choices' => $the_core_color_settings,
				'type'    => 'color-palette'
			),
			'border_group'                       => array(
				'type'    => 'multi-picker',
				'label'   => false,
				'desc'    => false,
				'picker'  => array(
					'selected' => array(
						'type'         => 'switch',
						'value'        => '',
						'label'        => __( 'Border', 'the-core' ),
						'desc'         => __( 'Add a border to the table?', 'the-core' ),
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
		),
	),
	'tabular_table_advanced_styling' => array(
		'attr'          => array( 'class' => 'fw-advanced-button' ),
		'type'          => 'popup',
		'label'         => __( 'Custom Style', 'the-core' ),
		'desc'          => __( 'Change the style / typography of this shortcode', 'the-core' ),
		'button'        => __( 'Styling', 'the-core' ),
		'size'          => 'medium',
		'popup-options' => array(
			'tabular_heading_typography_group'             => array(
				'type'    => 'group',
				'options' => array(
					'heading_typography' => array(
						'label' => __( 'Heading', 'the-core' ),
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
					'heading_bg'         => array(
						'label'   => __( 'Heading Bg', 'the-core' ),
						'desc'    => __( 'Select heading background', 'the-core' ),
						'help'    => __( 'The default color palette can be changed from the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __( 'Colors section', 'the-core' ) . '</a> ' . __( 'found in the Theme Settings page', 'the-core' ),
						'value'   => '',
						'choices' => $the_core_color_settings,
						'type'    => 'color-palette'
					),
				)
			),
			'tabular_description_heading_typography_group' => array(
				'type'    => 'group',
				'options' => array(
					'description_heading_typography' => array(
						'label' => __( 'Description Heading', 'the-core' ),
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
					'description_heading_bg'         => array(
						'label'   => __( 'Description Heading Bg', 'the-core' ),
						'desc'    => __( 'Select description heading background', 'the-core' ),
						'help'    => __( 'The default color palette can be changed from the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __( 'Colors section', 'the-core' ) . '</a> ' . __( 'found in the Theme Settings page', 'the-core' ),
						'value'   => '',
						'choices' => $the_core_color_settings,
						'type'    => 'color-palette'
					),
				)
			),
			'tabular_default_typography_group'             => array(
				'type'    => 'group',
				'options' => array(
					'default_typography' => array(
						'label' => __( 'Default', 'the-core' ),
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
					'default_bg'         => array(
						'label'   => __( 'Default Bg', 'the-core' ),
						'desc'    => __( 'Select default background', 'the-core' ),
						'help'    => __( 'The default color palette can be changed from the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __( 'Colors section', 'the-core' ) . '</a> ' . __( 'found in the Theme Settings page', 'the-core' ),
						'value'   => '',
						'choices' => $the_core_color_settings,
						'type'    => 'color-palette'
					),
				)
			),
			'tabular_description_typography_group'         => array(
				'type'    => 'group',
				'options' => array(
					'description_typography' => array(
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
					'description_bg'         => array(
						'label'   => __( 'Description Bg', 'the-core' ),
						'desc'    => __( 'Select description background', 'the-core' ),
						'help'    => __( 'The default color palette can be changed from the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __( 'Colors section', 'the-core' ) . '</a> ' . __( 'found in the Theme Settings page', 'the-core' ),
						'value'   => '',
						'choices' => $the_core_color_settings,
						'type'    => 'color-palette'
					),
				)
			),
			'border_group'                                 => array(
				'type'    => 'multi-picker',
				'label'   => false,
				'desc'    => false,
				'picker'  => array(
					'selected' => array(
						'type'         => 'switch',
						'value'        => '',
						'label'        => __( 'Border', 'the-core' ),
						'desc'         => __( 'Add a border to the table?', 'the-core' ),
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
		),
	),
	'animation_group'                => array(
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
		'label' => __( 'Custom Class', 'the-core' ),
		'desc'  => __( 'Enter custom CSS class', 'the-core' ),
		'type'  => 'text',
		'value' => '',
		'help'  => sprintf( __('You can use this class to further style this shortcode by adding your custom CSS in the %sCustom CSS%s area.', 'the-core' ), '<a target="_blank" href="'.$the_core_admin_url.'admin.php?page=fw-settings#fw-options-tab-custom_css_tab'.'">', '</a>' ),
	),
);