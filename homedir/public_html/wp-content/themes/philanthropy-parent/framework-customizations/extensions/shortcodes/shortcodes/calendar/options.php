<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

global $the_core_colors, $the_core_typography;
$the_core_admin_url           = admin_url();
$the_core_template_directory  = get_template_directory_uri();
$the_core_color_settings      = fw_get_db_settings_option('color_settings', $the_core_colors);
$the_core_typography_settings = fw_get_db_settings_option('typography_settings', $the_core_typography);

$calendar_shortcode           = fw_ext( 'shortcodes' )->get_shortcode( 'calendar' );

$options = array(
	'unique_id'       => array(
		'type' => 'unique'
	),
	'data_provider'   => array(
		'type'         => 'multi-picker',
		'label'        => false,
		'desc'         => false,
		'picker'       => array(
			'population_method' => array(
				'label'   => __( 'Population Method', 'the-core' ),
				'desc'    => __( 'Select calendar population method (Ex: events, custom)', 'the-core' ),
				'type'    => 'short-select',
				'choices' => $calendar_shortcode->_get_picker_dropdown_choices(),
			)
		),
		'choices'      => $calendar_shortcode->_get_picker_choices(),
		'show_borders' => false,
	),
	'calendar_group'  => array(
		'type'    => 'group',
		'options' => array(
			'template'              => array(
				'label'   => __( 'Calendar Type', 'the-core' ),
				'attr'    => array( 'class' => 'calendar-styling' ),
				'desc'    => __( 'Select calendar type', 'the-core' ),
				'type'    => 'short-select',
				'choices' => array(
					'day'   => __( 'Daily', 'the-core' ),
					'week'  => __( 'Weekly', 'the-core' ),
					'month' => __( 'Monthly', 'the-core' )
				),
			),
			'advanced_styling'      => array(
				'attr'          => array(
					'class' => 'fw-advanced-button'
				),
				'type'          => 'popup',
				'label'         => __( 'Custom Style', 'the-core' ),
				'desc'          => __( 'Change the style / typography of this shortcode', 'the-core' ),
				'button'        => __( 'Styling', 'the-core' ),
				'size'          => 'medium',
				'popup-options' => array(
					'month_title_typography'    => array(
						'label' => __( 'Top Month Titles', 'the-core' ),
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
					'bottom_month_title_typography'    => array(
						'label' => __( 'Bottom Month Title', 'the-core' ),
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
					'day_number_typography'     => array(
						'label' => __( 'Day Number', 'the-core' ),
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
					'event_title_typography'    => array(
						'label' => __( 'Event Title', 'the-core' ),
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
					'prev_cell_bg_color'        => array(
						'label'   => __( 'Days (Previous Month)', 'the-core' ),
						'help'    => __( 'The default color palette can be changed from the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __( 'Colors section', 'the-core' ) . '</a> ' . __( 'found in the Theme Settings page', 'the-core' ),
						'desc'    => __( 'Select event cell background color', 'the-core' ),
						'value'   => '',
						'choices' => $the_core_color_settings,
						'type'    => 'color-palette'
					),
					'current_month_bg_color'    => array(
						'label'   => __( 'Days (Current Month)', 'the-core' ),
						'help'    => __( 'The default color palette can be changed from the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __( 'Colors section', 'the-core' ) . '</a> ' . __( 'found in the Theme Settings page', 'the-core' ),
						'desc'    => __( 'Select the cell background color', 'the-core' ),
						'value'   => '',
						'choices' => $the_core_color_settings,
						'type'    => 'color-palette'
					),
					'today_bg_color'            => array(
						'label'   => __( 'Today', 'the-core' ),
						'help'    => __( 'The default color palette can be changed from the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __( 'Colors section', 'the-core' ) . '</a> ' . __( 'found in the Theme Settings page', 'the-core' ),
						'desc'    => __( 'Select the cell background color', 'the-core' ),
						'value'   => '',
						'choices' => $the_core_color_settings,
						'type'    => 'color-palette'
					),
					'days_with_events_bg_color' => array(
						'label'   => __( 'Event Days', 'the-core' ),
						'help'    => __( 'The default color palette can be changed from the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __( 'Colors section', 'the-core' ) . '</a> ' . __( 'found in the Theme Settings page', 'the-core' ),
						'desc'    => __( 'Select the cell background color', 'the-core' ),
						'value'   => '',
						'choices' => $the_core_color_settings,
						'type'    => 'color-palette'
					),
					'hover_bg_color'            => array(
						'label'   => __( 'Hover', 'the-core' ),
						'help'    => __( 'The default color palette can be changed from the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __( 'Colors section', 'the-core' ) . '</a> ' . __( 'found in the Theme Settings page', 'the-core' ),
						'desc'    => __( 'Select hover background color', 'the-core' ),
						'value'   => '',
						'choices' => $the_core_color_settings,
						'type'    => 'color-palette'
					),
                    'calendar_bg_color'         => array(
                        'label'   => __( 'Bg Color', 'the-core' ),
                        'help'    => __( 'The default color palette can be changed from the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __( 'Colors section', 'the-core' ) . '</a> ' . __( 'found in the Theme Settings page', 'the-core' ),
                        'desc'    => __( 'Select the background color', 'the-core' ),
                        'value'   => '',
                        'choices' => $the_core_color_settings,
                        'type'    => 'color-palette'
                    ),
				),
			),
			'advanced_week_styling' => array(
				'attr'          => array(
					'class' => 'fw-advanced-button'
				),
				'type'          => 'popup',
				'label'         => __( 'Custom Style', 'the-core' ),
				'desc'          => __( 'Change the style / typography of this shortcode', 'the-core' ),
				'button'        => __( 'Styling', 'the-core' ),
				'size'          => 'medium',
				'popup-options' => array(
					'month_title_typography' => array(
						'label' => __( 'Month Title', 'the-core' ),
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
					'days_title_typography'  => array(
						'label' => __( 'Days Title', 'the-core' ),
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
					'event_title_typography' => array(
						'label' => __( 'Event Title', 'the-core' ),
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
					'bg_color'               => array(
						'label'   => __( 'Event Bg Color', 'the-core' ),
						'help'    => __( 'The default color palette can be changed from the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __( 'Colors section', 'the-core' ) . '</a> ' . __( 'found in the Theme Settings page', 'the-core' ),
						'desc'    => __( 'Select event background color', 'the-core' ),
						'value'   => '',
						'choices' => $the_core_color_settings,
						'type'    => 'color-palette'
					),
					'heading_bg_color'       => array(
						'label'   => __( 'Heading Bg Color', 'the-core' ),
						'help'    => __( 'The default color palette can be changed from the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __( 'Colors section', 'the-core' ) . '</a> ' . __( 'found in the Theme Settings page', 'the-core' ),
						'desc'    => __( 'Select heading background color', 'the-core' ),
						'value'   => '',
						'choices' => $the_core_color_settings,
						'type'    => 'color-palette'
					),
					'today_bg_color'         => array(
						'label'   => __( 'Today', 'the-core' ),
						'help'    => __( 'The default color palette can be changed from the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __( 'Colors section', 'the-core' ) . '</a> ' . __( 'found in the Theme Settings page', 'the-core' ),
						'desc'    => __( 'Select the cell background color', 'the-core' ),
						'value'   => '',
						'choices' => $the_core_color_settings,
						'type'    => 'color-palette'
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
				),
			),
			'advanced_day_styling'  => array(
				'attr'          => array(
					'class' => 'fw-advanced-button'
				),
				'type'          => 'popup',
				'label'         => __( 'Custom Style', 'the-core' ),
				'desc'          => __( 'Change the style / typography of this shortcode', 'the-core' ),
				'button'        => __( 'Styling', 'the-core' ),
				'size'          => 'medium',
				'popup-options' => array(
					'month_title_typography' => array(
						'label' => __( 'Month Title', 'the-core' ),
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
					'day_number_typography'  => array(
						'label' => __( 'Hour Number', 'the-core' ),
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
					'event_title_typography' => array(
						'label' => __( 'Event Title', 'the-core' ),
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
					'date_typography'        => array(
						'label' => __( 'Event Date & Hour', 'the-core' ),
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
					'bg_group'               => array(
						'type'    => 'group',
						'options' => array(
							'bg_color'   => array(
								'label'   => __( 'Event Bg Color', 'the-core' ),
								'help'    => __( 'The default color palette can be changed from the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __( 'Colors section', 'the-core' ) . '</a> ' . __( 'found in the Theme Settings page', 'the-core' ),
								'desc'    => __( 'Select event background color', 'the-core' ),
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
								'desc'       => __( 'Select the background opacity in %', 'the-core' ),
							)
						)
					),
				),
			),
		)
	),
	'first_week_day'  => array(
		'label'   => __( 'Start Week On', 'the-core' ),
		'desc'    => __( 'Select first day of week', 'the-core' ),
		'type'    => 'short-select',
		'choices' => array(
			'1' => __( 'Monday', 'the-core' ),
			'2' => __( 'Sunday', 'the-core' )
		),
		'value'   => 1
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