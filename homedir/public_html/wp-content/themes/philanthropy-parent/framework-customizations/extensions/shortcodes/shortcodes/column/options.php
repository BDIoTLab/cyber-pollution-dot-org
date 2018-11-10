<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

global $the_core_colors;
$the_core_admin_url      = admin_url();
$the_core_color_settings = fw_get_db_settings_option( 'color_settings', $the_core_colors );

$options = array(
	'unique_id'          => array(
		'type' => 'unique'
	),
	'default_padding'    => array(
		'type'         => 'switch',
		'label'        => __( 'Default Spacing', 'the-core' ),
		'desc'         => __( 'Use default left and right spacing?', 'the-core' ),
		'help'         => __( "Default left and right spacings are set to 15px", "the-core" ),
		'value'        => '',
		'right-choice' => array(
			'value' => '',
			'label' => __( 'Yes', 'the-core' ),
		),
		'left-choice'  => array(
			'value' => 'fw-col-no-padding',
			'label' => __( 'No', 'the-core' ),
		),
	),
	'padding_group'      => array(
		'type'    => 'group',
		'options' => array(
			'html_label'     => array(
				'type'  => 'html',
				'value' => '',
				'label' => __( 'Padding', 'the-core' ),
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
			'padding_unit' => array(
				'label'   => false,
				'desc'    => __( '', 'the-core' ),
				'type'    => 'radio',
				'choices' => array(
					'px' => __( 'px', 'the-core' ),
					'%'  => __( '%', 'the-core' ),
				),
				'value' => 'px'
			),
		)
	),
	'position_group' => array(
		'type'    => 'group',
		'attr'    => array( 'class' => 'fw-padding-boxes' ),
		'options' => array(
			'html_label'     => array(
				'type'  => 'html',
				'value' => '',
				'label' => __( 'Margin', 'the-core' ),
				'html'  => '',
			),
			'position_top'    => array(
				'label' => false,
				'desc'  => __( 'top', 'the-core' ),
				'type'  => 'short-text',
				'value' => '0',
			),
			'position_right'  => array(
				'label' => false,
				'desc'  => __( 'right', 'the-core' ),
				'type'  => 'short-text',
				'value' => '0',
			),
			'position_bottom' => array(
				'label' => false,
				'desc'  => __( 'bottom', 'the-core' ),
				'type'  => 'short-text',
				'value' => '0',
			),
			'position_left'   => array(
				'label' => false,
				'desc'  => __( 'left', 'the-core' ),
				'type'  => 'short-text',
				'value' => '0',
			),
			'position_unit' => array(
				'label'   => false,
				'desc'    => __( '', 'the-core' ),
				'type'    => 'radio',
				'choices' => array(
					'px' => __( 'px', 'the-core' ),
					'%'  => __( '%', 'the-core' ),
				),
				'value' => 'px'
			),
		)
	),
	'column_height'      => array(
		'type'         => 'multi-picker',
		'label'        => false,
		'desc'         => false,
		'picker'       => array(
			'selected' => array(
				'label'   => __( 'Height', 'the-core' ),
				'desc'    => __( 'Select the column height in pixels', 'the-core' ),
				'help'    => __( 'Using fixed heights on columns might impact the responsive behaviour of your website in a negative way. Read', 'the-core' ) . ' <a href="http://docs.themefuse.com/the-core/your-theme/responsive/best-practices#2" target="_blank">this article</a> ' . __( 'for more information and best practices', 'the-core' ),
				'attr'    => array( 'class' => 'fw-checkbox-float-left' ),
				'type'    => 'radio',
				'choices' => array(
					'auto'   => __( 'Auto', 'the-core' ),
					'custom' => __( 'Custom', 'the-core' ),
				),
				'value'   => 'auto'
			),
		),
		'choices'      => array(
			'custom' => array(
				'height' => array(
					'label' => __( '', 'the-core' ),
					'desc'  => __( 'Enter the column height in pixels', 'the-core' ),
					'type'  => 'short-text',
					'value' => ''
				),
			),
		),
		'show_borders' => false,
	),
	'background_options' => array(
		'type'         => 'multi-picker',
		'label'        => false,
		'desc'         => false,
		'picker'       => array(
			'background' => array(
				'label'   => __( 'Background', 'the-core' ),
				'desc'    => __( 'Select the background for your column', 'the-core' ),
				'attr'    => array( 'class' => 'fw-checkbox-float-left' ),
				'type'    => 'radio',
				'choices' => array(
					'none'           => __( 'None', 'the-core' ),
					'image'          => __( 'Image', 'the-core' ),
					'color'          => __( 'Color', 'the-core' ),
					'gradient_color' => __( 'Gradient Color', 'the-core' ),
				),
				'value'   => 'none'
			),
		),
		'choices'      => array(
			'none'           => array(),
			'color'          => array(
				'background_color' => array(
					'label'   => __( '', 'the-core' ),
					'help'    => __( 'The default color palette can be changed from the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __( 'Colors section', 'the-core' ) . '</a> ' . __( 'found in the Theme Settings page', 'the-core' ),
					'desc'    => __( 'Select the background color', 'the-core' ),
					'value'   => '',
					'choices' => $the_core_color_settings,
					'type'    => 'color-palette'
				),
			),
			'image'          => array(
				'background_image' => array(
					'label'   => __( '', 'the-core' ),
					'type'    => 'background-image',
					'choices' => array(//	in future may will set predefined images
					)
				),
				'background_color' => array(
					'label'   => __( '', 'the-core' ),
					'help'    => __( 'The default color palette can be changed from the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __( 'Colors section', 'the-core' ) . '</a> ' . __( 'found in the Theme Settings page', 'the-core' ),
					'desc'    => __( 'Select the background color', 'the-core' ),
					'value'   => '',
					'choices' => $the_core_color_settings,
					'type'    => 'color-palette'
				),
				'repeat'           => array(
					'label'   => __( '', 'the-core' ),
					'desc'    => __( 'Select how will the background repeat', 'the-core' ),
					'type'    => 'short-select',
					'attr'    => array( 'class' => 'fw-checkbox-float-left' ),
					'value'   => 'no-repeat',
					'choices' => array(
						'no-repeat' => __( 'No-Repeat', 'the-core' ),
						'repeat'    => __( 'Repeat', 'the-core' ),
						'repeat-x'  => __( 'Repeat-X', 'the-core' ),
						'repeat-y'  => __( 'Repeat-Y', 'the-core' ),
					)
				),
				'bg_position_x'    => array(
					'label'   => __( 'Margin', 'the-core' ),
					'desc'    => __( 'Select the horizontal background position', 'the-core' ),
					'type'    => 'short-select',
					'attr'    => array( 'class' => 'fw-checkbox-float-left' ),
					'value'   => '',
					'choices' => array(
						'left'   => __( 'Left', 'the-core' ),
						'center' => __( 'Center', 'the-core' ),
						'right'  => __( 'Right', 'the-core' ),
					)
				),
				'bg_position_y'    => array(
					'label'   => __( '', 'the-core' ),
					'desc'    => __( 'Select the vertical background position', 'the-core' ),
					'type'    => 'short-select',
					'attr'    => array( 'class' => 'fw-checkbox-float-left' ),
					'value'   => '',
					'choices' => array(
						'top'    => __( 'Top', 'the-core' ),
						'center' => __( 'Center', 'the-core' ),
						'bottom' => __( 'Bottom', 'the-core' ),
					)
				),
				'bg_size'          => array(
					'label'   => __( 'Size', 'the-core' ),
					'desc'    => __( 'Select the background size', 'the-core' ),
					'help'    => __( '<strong>Auto</strong> - Default value, the background image has the original width and height.<br><br><strong>Cover</strong> - Scale the background image so that the background area is completely covered by the image.<br><br><strong>Contain</strong> - Scale the image to the largest size such that both its width and height can fit inside the content area.', 'the-core' ),
					'type'    => 'short-select',
					'attr'    => array( 'class' => 'fw-checkbox-float-left' ),
					'value'   => '',
					'choices' => array(
						'auto'    => __( 'Auto', 'the-core' ),
						'cover'   => __( 'Cover', 'the-core' ),
						'contain' => __( 'Contain', 'the-core' ),
					)
				),
				'parallax'         => array(
					'type'    => 'multi-picker',
					'label'   => false,
					'desc'    => false,
					'picker'  => array(
						'selected' => array(
							'type'         => 'switch',
							'label'        => __( 'Parallax Effect', 'the-core' ),
							'desc'         => __( 'Create a parallax effect on scroll?', 'the-core' ),
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
							'parallax_speed' => array(
								'label'      => __( '', 'the-core' ),
								'desc'       => __( 'Select the parallax speed', 'the-core' ),
								'type'       => 'slider',
								'value'      => 5,
								'properties' => array(
									'min' => 1,
									'max' => 10,
									'sep' => 1,
								),
							),
						)
					)
				),
				'overlay_options'  => array(
					'type'    => 'multi-picker',
					'label'   => false,
					'desc'    => false,
					'picker'  => array(
						'overlay' => array(
							'type'         => 'switch',
							'label'        => __( 'Overlay Color', 'the-core' ),
							'desc'         => __( 'Enable image overlay color?', 'the-core' ),
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
						'no'  => array(),
						'yes' => array(
							'background'            => array(
								'label'   => __( '', 'the-core' ),
								'help'    => __( 'The default color palette can be changed from the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __( 'Colors section', 'the-core' ) . '</a> ' . __( 'found in the Theme Settings page', 'the-core' ),
								'desc'    => __( 'Select the overlay color', 'the-core' ),
								'value'   => '',
								'choices' => $the_core_color_settings,
								'type'    => 'color-palette'
							),
							'overlay_opacity_image' => array(
								'type'       => 'slider',
								'value'      => 80,
								'properties' => array(
									'min' => 0,
									'max' => 100,
									'sep' => 1,
								),
								'label'      => __( '', 'the-core' ),
								'desc'       => __( 'Select the overlay color opacity in %', 'the-core' ),
							)
						),
					),
				),
			),
			'gradient_color' => array(
				'gradient_orientation' => array(
					'label'   => __( '', 'the-core' ),
					'desc'    => __( 'Select the gradient orientation', 'the-core' ),
					'type'    => 'short-select',
					'choices' => array(
						'horizontal'      => __( 'Horizontal', 'the-core' ) . ' →',
						'vertical'        => __( 'Vertical', 'the-core' ) . ' ↓',
						'diagonal'        => __( 'Diagonal', 'the-core' ) . ' ↘',
						'diagonal_bottom' => __( 'Diagonal', 'the-core' ) . ' ↗',
						'radial'          => __( 'Radial', 'the-core' ) . ' ○',
					),
					'value'   => 'vertical'
				),
				'gradient_bg_color'    => array(
					'type'  => 'gradient',
					'label' => __( '', 'the-core' ),
					'desc'  => __( 'Select the gradient color', 'the-core' ),
					'value' => array(
						'primary'   => '#dddddd',
						'secondary' => '#cccccc',
					),
				),
			),
		),
		'show_borders' => false,
	),
	'border_group'       => array(
		'type'    => 'multi-picker',
		'label'   => false,
		'desc'    => false,
		'picker'  => array(
			'selected' => array(
				'type'         => 'switch',
				'value'        => 'no',
				'label'        => __( 'Border', 'the-core' ),
				'desc'         => __( 'Add a border to this column?', 'the-core' ),
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
	'shadow_group'       => array(
		'type'    => 'multi-picker',
		'label'   => false,
		'desc'    => false,
		'picker'  => array(
			'selected' => array(
				'type'         => 'switch',
				'value'        => 'no',
				'label'        => __( 'Shadow', 'the-core' ),
				'desc'         => __( 'Add a shadow?', 'the-core' ),
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
				'shadow_horiontal' => array(
					'label' => __( '', 'the-core' ),
					'desc'  => __( 'Horizontal shadow position in pixels (Ex: 10, -15)', 'the-core' ),
					'type'  => 'short-text',
					'value' => '',
				),
				'shadow_vertical'  => array(
					'label' => __( '', 'the-core' ),
					'desc'  => __( 'Vertical shadow position in pixels (Ex: 12, -10)', 'the-core' ),
					'type'  => 'short-text',
					'value' => '',
				),
				'shadow_blur'      => array(
					'label' => __( '', 'the-core' ),
					'desc'  => __( 'The blur distance in pixels', 'the-core' ),
					'type'  => 'short-text',
					'value' => '',
				),
				'shadow_size'      => array(
					'label' => __( '', 'the-core' ),
					'desc'  => __( 'The size of shadow in pixels (Ex: 5, -7)', 'the-core' ),
					'type'  => 'short-text',
					'value' => '',
				),
				'shadow_color'     => array(
					'label' => __( '', 'the-core' ),
					'desc'  => __( 'Select the shadow color', 'the-core' ),
					'value' => '',
					'type'  => 'rgba-color-picker'
				),
			)
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
	'zindex' => array(
		'label' => __( 'Z-index', 'the-core' ),
		'desc'  => __( "Enter a number for the column's z-index", "the-core" ),
		'help'  => sprintf( __( 'Specifies the stack order of an element for overlapping elements. An element with greater stack order is always in front of an element with a lower stack order. Find out more %shere%s', 'the-core' ), '<a href="https://developer.mozilla.org/en-US/docs/Web/CSS/z-index" target="_blank">', '</a>'),
		'type'  => 'short-text',
		'value' => ''
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
						'desc'         => __( 'Display this column on desktop?', 'the-core' ),
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
				'type'    => 'multi-picker',
				'label'   => false,
				'desc'    => false,
				'picker'  => array(
					'selected' => array(
						'type'         => 'switch',
						'value'        => 'yes',
						'label'        => __( 'Tablet Landscape', 'the-core' ),
						'desc'         => __( 'Display this column on tablet landscape?', 'the-core' ),
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
				'choices' => array(
					'yes' => array(
						'tablet_landscape' => array(
							'label'   => __( '', 'the-core' ),
							'desc'    => __( 'Choose the responsive tablet display for this column', 'the-core' ),
							'help'    => __( 'Applies to devices with the resolution between 992px - 1199px (tablet landscape)', 'the-core' ),
							'type'    => 'select',
							'value'   => '',
							'choices' => array(
								''              => __( 'Automatically inherit default layout', 'the-core' ),
								'fw-col-md-2'   => __( 'Make it a 1/6 column', 'the-core' ),
								'fw-col-md-1-5' => __( 'Make it a 1/5 column', 'the-core' ),
								'fw-col-md-3'   => __( 'Make it a 1/4 column', 'the-core' ),
								'fw-col-md-4'   => __( 'Make it a 1/3 column', 'the-core' ),
								'fw-col-md-6'   => __( 'Make it a 1/2 column', 'the-core' ),
								'fw-col-md-8'   => __( 'Make it a 2/3 column', 'the-core' ),
								'fw-col-md-9'   => __( 'Make it a 3/4 column', 'the-core' ),
								'fw-col-md-12'  => __( 'Make it a 1/1 column', 'the-core' ),
							)
						),
						'padding_group' => array(
							'attr'    => array( 'class' => 'border-bottom-none' ),
							'type'    => 'group',
							'options' => array(
								'html_label'     => array(
									'type'  => 'html',
									'value' => '',
									'label' => __( 'Padding', 'the-core' ),
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
									'help'  => __( 'This padding will overwrite the padding set for the column and will be used for devices with the resolution between 992px - 1199px (tablet landscape). Leave blank for default column values.', 'the-core' ),
									'type'  => 'short-text',
									'value' => '',
								),
								'padding_unit' => array(
									'label'   => false,
									'desc'    => __( '', 'the-core' ),
									'type'    => 'radio',
									'choices' => array(
										'px' => __( 'px', 'the-core' ),
										'%'  => __( '%', 'the-core' ),
									),
									'value' => 'px'
								),
							)
						),
						'position_group' => array(
							'type'    => 'group',
							'attr'    => array( 'class' => 'border-bottom-none fw-padding-boxes' ),
							'options' => array(
								'html_label'     => array(
									'type'  => 'html',
									'value' => '',
									'label' => __( 'Margin', 'the-core' ),
									'html'  => '',
								),
								'position_top'    => array(
									'label' => false,
									'desc'  => __( 'top', 'the-core' ),
									'type'  => 'short-text',
									'value' => '',
								),
								'position_right'  => array(
									'label' => false,
									'desc'  => __( 'right', 'the-core' ),
									'type'  => 'short-text',
									'value' => '',
								),
								'position_bottom' => array(
									'label' => false,
									'desc'  => __( 'bottom', 'the-core' ),
									'type'  => 'short-text',
									'value' => '',
								),
								'position_left'   => array(
									'label' => false,
									'desc'  => __( 'left', 'the-core' ),
									'help'  => __( 'This margin will overwrite the margin set for the column and will be used for devices with the resolution between 992px - 1199px (tablet landscape). Leave blank for default column values.', 'the-core' ),
									'type'  => 'short-text',
									'value' => '',
								),
								'position_unit' => array(
									'label'   => false,
									'desc'    => __( '', 'the-core' ),
									'type'    => 'radio',
									'choices' => array(
										'px' => __( 'px', 'the-core' ),
										'%'  => __( '%', 'the-core' ),
									),
									'value' => 'px'
								),
							)
						),
					),
				)
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
						'desc'         => __( 'Display this column on tablet portrait?', 'the-core' ),
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
				'choices' => array(
					'yes' => array(
						'tablet'        => array(
							'label'   => __( '', 'the-core' ),
							'desc'    => __( 'Choose the responsive tablet display for this column', 'the-core' ),
							'help'    => __( 'Use this option in order to control how this column behaves on devices with the resolution between 768px - 991px (tablet portrait). Note that on phones all the columns are 1/1 by default.', 'the-core' ),
							'type'    => 'select',
							'value'   => '',
							'choices' => array(
								''              => __( 'Automatically inherit default layout', 'the-core' ),
								'fw-col-sm-2'   => __( 'Make it a 1/6 column', 'the-core' ),
								'fw-col-sm-1-5' => __( 'Make it a 1/5 column', 'the-core' ),
								'fw-col-sm-3'   => __( 'Make it a 1/4 column', 'the-core' ),
								'fw-col-sm-4'   => __( 'Make it a 1/3 column', 'the-core' ),
								'fw-col-sm-6'   => __( 'Make it a 1/2 column', 'the-core' ),
								'fw-col-sm-8'   => __( 'Make it a 2/3 column', 'the-core' ),
								'fw-col-sm-9'   => __( 'Make it a 3/4 column', 'the-core' ),
								'fw-col-sm-12'  => __( 'Make it a 1/1 column', 'the-core' ),
							)
						),
						'padding_group' => array(
							'attr'    => array( 'class' => 'border-bottom-none' ),
							'type'    => 'group',
							'options' => array(
								'html_label'     => array(
									'type'  => 'html',
									'value' => '',
									'label' => __( 'Padding', 'the-core' ),
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
									'help'  => __( 'This padding will overwrite the padding set for the column and will be used for devices with the resolution between 768px - 991px (tablet portrait). Leave blank for default column values.', 'the-core' ),
									'type'  => 'short-text',
									'value' => '',
								),
								'padding_unit' => array(
									'label'   => false,
									'desc'    => __( '', 'the-core' ),
									'type'    => 'radio',
									'choices' => array(
										'px' => __( 'px', 'the-core' ),
										'%'  => __( '%', 'the-core' ),
									),
									'value' => 'px'
								),
							)
						),
						'position_group' => array(
							'type'    => 'group',
							'attr'    => array( 'class' => ' border-bottom-none fw-padding-boxes' ),
							'options' => array(
								'html_label'     => array(
									'type'  => 'html',
									'value' => '',
									'label' => __( 'Margin', 'the-core' ),
									'html'  => '',
								),
								'position_top'    => array(
									'label' => false,
									'desc'  => __( 'top', 'the-core' ),
									'type'  => 'short-text',
									'value' => '',
								),
								'position_right'  => array(
									'label' => false,
									'desc'  => __( 'right', 'the-core' ),
									'type'  => 'short-text',
									'value' => '',
								),
								'position_bottom' => array(
									'label' => false,
									'desc'  => __( 'bottom', 'the-core' ),
									'type'  => 'short-text',
									'value' => '',
								),
								'position_left'   => array(
									'label' => false,
									'desc'  => __( 'left', 'the-core' ),
									'help'  => __( 'This margin will overwrite the margin set for the column and will be used for devices with the resolution between 768px - 991px (tablet portrait). Leave blank for default column values.', 'the-core' ),
									'type'  => 'short-text',
									'value' => '',
								),
								'position_unit' => array(
									'label'   => false,
									'desc'    => __( '', 'the-core' ),
									'type'    => 'radio',
									'choices' => array(
										'px' => __( 'px', 'the-core' ),
										'%'  => __( '%', 'the-core' ),
									),
									'value' => 'px'
								),
							)
						),
					),
				)
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
						'desc'         => __( 'Display this column on smartphone?', 'the-core' ),
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
				'choices' => array(
					'yes' => array(
						'smartphone_column' => array(
							'label'   => __( '', 'the-core' ),
							'desc'    => __( 'Choose the responsive smartphone display for this column', 'the-core' ),
							'help'    => __( 'Applies to devices with the resolution between 300px - 767px (smartphone)', 'the-core' ),
							'type'    => 'select',
							'value'   => '',
							'choices' => array(
								''         => __( 'Default 1/1 column', 'the-core' ),
								'col-xs-6' => __( 'Make it a 1/2 column', 'the-core' ),
							)
						),
						'padding_group' => array(
							'attr'    => array( 'class' => 'border-bottom-none' ),
							'type'    => 'group',
							'options' => array(
								'html_label'     => array(
									'type'  => 'html',
									'value' => '',
									'label' => __( 'Padding', 'the-core' ),
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
									'help'  => __( 'This padding will overwrite the padding set for the column and will be used for devices with the resolution up to 767px (smartphones both portrait and landscape as well as some low-resolution tablets). Leave blank for default column values.', 'the-core' ),
									'type'  => 'short-text',
									'value' => '0',
								),
								'padding_unit' => array(
									'label'   => false,
									'desc'    => __( '', 'the-core' ),
									'type'    => 'radio',
									'choices' => array(
										'px' => __( 'px', 'the-core' ),
										'%'  => __( '%', 'the-core' ),
									),
									'value' => 'px'
								),
							)
						),
						'position_group' => array(
							'type'    => 'group',
							'attr'    => array( 'class' => 'border-bottom-none fw-padding-boxes' ),
							'options' => array(
								'html_label'     => array(
									'type'  => 'html',
									'value' => '',
									'label' => __( 'Margin', 'the-core' ),
									'html'  => '',
								),
								'position_top'    => array(
									'label' => false,
									'desc'  => __( 'top', 'the-core' ),
									'type'  => 'short-text',
									'value' => '0',
								),
								'position_right'  => array(
									'label' => false,
									'desc'  => __( 'right', 'the-core' ),
									'type'  => 'short-text',
									'value' => '0',
								),
								'position_bottom' => array(
									'label' => false,
									'desc'  => __( 'bottom', 'the-core' ),
									'type'  => 'short-text',
									'value' => '0',
								),
								'position_left'   => array(
									'label' => false,
									'desc'  => __( 'left', 'the-core' ),
									'help'  => __( 'This margin will overwrite the margin set for the column and will be used for devices with the resolution up to 767px (smartphones both portrait and landscape as well as some low-resolution tablets). Leave blank for default column values.', 'the-core' ),
									'type'  => 'short-text',
									'value' => '0',
								),
								'position_unit' => array(
									'label'   => false,
									'desc'    => __( '', 'the-core' ),
									'type'    => 'radio',
									'choices' => array(
										'px' => __( 'px', 'the-core' ),
										'%'  => __( '%', 'the-core' ),
									),
									'value' => 'px'
								),
							)
						),
					),
				)
			),
		),
	),
	'class'              => array(
		'label' => __( 'Custom Class', 'the-core' ),
		'desc'  => __( 'Enter custom CSS class', 'the-core' ),
		'help'  => sprintf( __('You can use this class to further style this shortcode by adding your custom CSS in the %sCustom CSS%s area.', 'the-core' ), '<a target="_blank" href="'.$the_core_admin_url.'admin.php?page=fw-settings#fw-options-tab-custom_css_tab'.'">', '</a>' ),
		'type'  => 'text',
		'value' => '',
	),
);