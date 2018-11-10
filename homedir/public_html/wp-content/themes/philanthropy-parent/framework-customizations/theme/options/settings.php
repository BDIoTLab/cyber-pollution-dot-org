<?php if (!defined('FW')) {
	die('Forbidden');
}
/**
 * Framework options
 *
 * @var array $options Fill this array with options to generate framework settings form in backend
 */

global $the_core_colors, $the_core_typography;
$the_core_colors     = array(
	'color_1' => '#d12a5c',
	'color_2' => '#49ca9f',
	'color_3' => '#1f1f1f',
	'color_4' => '#808080',
	'color_5' => '#ebebeb'
);
$the_core_typography = array(
	'h1' => array(
		'google_font' => true,
		'subset' => 'latin',
		'variation' => 'regular',
		'family' => 'Montserrat',
		'style' => '',
		'weight' => '',
		'size' => '55',
		'line-height' => '65',
		'letter-spacing' => '-2',
	),
	'h2' => array(
		'google_font' => true,
		'subset' => 'latin',
		'variation' => '700',
		'family' => 'Montserrat',
		'style' => '',
		'weight' => '',
		'size' => '40',
		'line-height' => '56',
		'letter-spacing' => '-2',
	),
	'h3' => array(
		'google_font' => true,
		'subset' => 'latin',
		'variation' => '700',
		'family' => 'Montserrat',
		'style' => '',
		'weight' => '',
		'size' => '32',
		'line-height' => '38',
		'letter-spacing' => '-2',
	),
	'h4' => array(
		'google_font' => true,
		'subset' => 'latin',
		'variation' => '700',
		'family' => 'Montserrat',
		'style' => '',
		'weight' => '',
		'size' => '26',
		'line-height' => '32',
		'letter-spacing' => '-2',
	),
	'h5' => array(
		'google_font' => true,
		'subset' => 'latin',
		'variation' => '700',
		'family' => 'Montserrat',
		'style' => '',
		'weight' => '',
		'size' => '19',
		'line-height' => '28',
		'letter-spacing' => '-1',
	),
	'h6' => array(
		'google_font' => true,
		'subset' => 'latin',
		'variation' => '700',
		'family' => 'Montserrat',
		'style' => '',
		'weight' => '',
		'size' => '14',
		'line-height' => '26',
		'letter-spacing' => '-1',
	),
	'buttons' => array(
		'google_font' => true,
		'subset' => 'latin',
		'variation' => 'regular',
		'family' => 'Montserrat',
		'style' => '',
		'weight' => '',
		'size' => '12',
		'line-height' => '30',
		'letter-spacing' => '0',
	),
	'subtitles' => array(
		'google_font' => true,
		'subset' => 'latin',
		'variation' => '300',
		'family' => 'Merriweather',
		'style' => '',
		'weight' => '',
		'size' => '22',
		'line-height' => '39',
		'letter-spacing' => '0.5',
	),
	'body_text' => array(
		'google_font' => true,
		'subset' => 'latin',
		'variation' => 'regular',
		'family' => 'Quattrocento Sans',
		'style' => '',
		'weight' => '',
		'size' => '16.5',
		'line-height' => '28',
		'letter-spacing' => '0',
	),
);

$the_core_portfolio_tab = $the_core_events_tab = $the_core_products_tab = $the_core_learning_tab = $the_core_bbpress_tab = $the_core_buddypress_tab = $the_core_homepage_header_tab = $the_core_llms_tab = array();
if (fw_ext('portfolio')) {
	$the_core_portfolio_tab = fw()->theme->get_options('portfolio-tab');
}
if (fw_ext('events')) {
	$the_core_events_tab = fw()->theme->get_options('events-tab');
}
if (fw_ext('learning')) {
	$the_core_learning_tab = fw()->theme->get_options('learning-tab');
}
if (class_exists('WooCommerce')) {
	$the_core_products_tab = fw()->theme->get_options('products-tab');
}
if (class_exists('bbPress')) {
	$the_core_bbpress_tab = fw()->theme->get_options('bbpress-tab');
}
if (class_exists('BuddyPress')) {
	$the_core_buddypress_tab = fw()->theme->get_options('buddypress-tab');
}
if ( get_option('show_on_front', 'posts') == 'posts' ) {
	$the_core_homepage_header_tab = fw()->theme->get_options('homepage-tab');
}
if ( class_exists('LifterLMS') || class_exists('Sensei_Main') || class_exists( 'LearnPress' ) ) {
	$the_core_llms_tab = fw()->theme->get_options('llms-tab');
}

$the_core_requirements_tab = fw()->theme->get_options('theme-requirements');

$the_core_admin_url = admin_url();
$the_core_template_directory = get_template_directory_uri();
$the_core_color_settings = fw_get_db_settings_option('color_settings', $the_core_colors);
$the_core_typography_settings = fw_get_db_settings_option('typography_settings', $the_core_typography);
$the_core_first_letter_caps = fw_get_db_settings_option( 'posts_settings/blog_type', 'blog-1' ) == 'blog-3' ? 'fw-letter-caps' : 'fw-letter-no-caps';

$options = array(
	'general' => array(
		'title' => __('General', 'the-core'),
		'type' => 'tab',
		'options' => array(
			'general-options' => array(
				'title' => __('General', 'the-core'),
				'type' => 'tab',
				'options' => array(
					'general-box' => array(
						'title' => __('Global Settings', 'the-core'),
						'type' => 'box',
						'options' => array(
							'container_site_type' => array(
								'type' => 'multi-picker',
								'label' => false,
								'desc' => false,
								'picker' => array(
									'selected' => array(
										'label' => __('Website Width', 'the-core'),
										'desc' => __("Select your website's width", "the-core"),
										'value' => 'fw-side-boxed',
										'type' => 'image-picker',
										'choices' => array(
											'fw-full' => array(
												'small' => array(
													'height' => 70,
													'src'    => is_rtl() ? $the_core_template_directory . '/images/image-picker/full-rtl.jpg' : $the_core_template_directory . '/images/image-picker/full.jpg'
												),
												'large' => array(
													'height' => 214,
													'src'    => is_rtl() ? $the_core_template_directory . '/images/image-picker/full-rtl.jpg' : $the_core_template_directory . '/images/image-picker/full.jpg'
												),
											),
											'fw-side-boxed' => array(
												'small' => array(
													'height' => 70,
													'src'    => is_rtl() ? $the_core_template_directory . '/images/image-picker/side-boxed-rtl.jpg' : $the_core_template_directory . '/images/image-picker/side-boxed.jpg'
												),
												'large' => array(
													'height' => 214,
													'src'    => is_rtl() ? $the_core_template_directory . '/images/image-picker/side-boxed-rtl.jpg' : $the_core_template_directory . '/images/image-picker/side-boxed.jpg'
												),
											),
										),
									),
								),
								'choices' => array(
									'fw-side-boxed' => array(
										'site_width' => array(
											'type' => 'slider',
											'value' => 1560,
											'properties' => array(
												'min' => 1170,
												'max' => 1920,
												'sep' => 1,
											),
											'label' => '',
											'desc' => __('Select the website width', 'the-core'),
										),
										'site_margin' => array(
											'label' => '',
											'desc' => __('Enter the top and bottom margin', 'the-core'),
											'value' => '',
											'type' => 'short-text',
										),
										'boxed_container_bg' => array(
											'label' => __('Container Background', 'the-core'),
											'desc' => __('Select the website container background', 'the-core'),
											'value' => '#ffffff',
											'type' => 'color-picker',
										),
										'site_alignment' => array(
											'label' => __('Website Alignment', 'the-core'),
											'desc' => __('Choose the website alignment', 'the-core'),
											'type' => 'image-picker',
											'value' => 'fw-website-align-center',
											'choices' => array(
												'fw-website-align-left' => array(
													'small' => array(
														'height' => 50,
														'src' => $the_core_template_directory . '/images/image-picker/left-position.jpg',
														'title' => __('Left', 'the-core')
													),
												),
												'fw-website-align-center' => array(
													'small' => array(
														'height' => 50,
														'src' => $the_core_template_directory . '/images/image-picker/center-position.jpg',
														'title' => __('Center', 'the-core')
													),
												),
												'fw-website-align-right' => array(
													'small' => array(
														'height' => 50,
														'src' => $the_core_template_directory . '/images/image-picker/right-position.jpg',
														'title' => __('Right', 'the-core')
													),
												),
											),
										),
									)
								)
							),
							'website_background' => array(
								'type' => 'multi',
								'label' => false,
								'inner-options' => array(
									'website_bg_color' => array(
										'label' => __('Website Background', 'the-core'),
										'desc' => __('Select the website background color', 'the-core'),
										'value' => '#f1eee9',
										'type' => 'color-picker',
									),
									'website_bg' => array(
										'type' => 'background-image',
										'value' => 'none',
										'label' => '',
										'desc' => __('Select the patern overlay', 'the-core'),
										'choices' => array(
											'none' => array(
												'icon' => $the_core_template_directory . '/images/patterns/no_pattern.jpg',
												'css' => array(
													'background-image' => 'none'
												),
											),
											'bg-1' => array(
												'icon' => $the_core_template_directory . '/images/patterns/diagonal_bottom_to_top_pattern_preview.jpg',
												'css' => array(
													'background-image' => $the_core_template_directory . '/images/patterns/diagonal_bottom_to_top_pattern.png',
													'background-repeat' => 'repeat',
												)
											),
											'bg-2' => array(
												'icon' => $the_core_template_directory . '/images/patterns/diagonal_top_to_bottom_pattern_preview.jpg',
												'css' => array(
													'background-image' => $the_core_template_directory . '/images/patterns/diagonal_top_to_bottom_pattern.png',
													'background-repeat' => 'repeat',
												)
											),
											'bg-3' => array(
												'icon' => $the_core_template_directory . '/images/patterns/dots_pattern_preview.jpg',
												'css' => array(
													'background-image' => $the_core_template_directory . '/images/patterns/dots_pattern.png',
													'background-repeat' => 'repeat',
												)
											),
											'bg-4' => array(
												'icon' => $the_core_template_directory . '/images/patterns/noise_pattern_preview.jpg',
												'css' => array(
													'background-image' => $the_core_template_directory . '/images/patterns/noise_pattern.png',
													'background-repeat' => 'repeat',
												)
											),
											'bg-5' => array(
												'icon' => $the_core_template_directory . '/images/patterns/romb_pattern_preview.jpg',
												'css' => array(
													'background-image' => $the_core_template_directory . '/images/patterns/romb_pattern.png',
													'background-repeat' => 'repeat',
												)
											),
											'bg-6' => array(
												'icon' => $the_core_template_directory . '/images/patterns/square_pattern_preview.jpg',
												'css' => array(
													'background-image' => $the_core_template_directory . '/images/patterns/square_pattern.png',
													'background-repeat' => 'repeat',
												)
											),
											'bg-7' => array(
												'icon' => $the_core_template_directory . '/images/patterns/vertical_lines_pattern_preview.jpg',
												'css' => array(
													'background-image' => $the_core_template_directory . '/images/patterns/vertical_lines_pattern.png',
													'background-repeat' => 'repeat',
												)
											),
											'bg-8' => array(
												'icon' => $the_core_template_directory . '/images/patterns/waves_pattern_preview.jpg',
												'css' => array(
													'background-image' => $the_core_template_directory . '/images/patterns/waves_pattern.png',
													'background-repeat' => 'repeat',
												)
											),
										)
									)
								)
							),
							'section_spacing' => array(
								'label' => __('Content Density', 'the-core'),
								'desc' => __('Select the spacing between content sections', 'the-core'),
								'help' => __("The content spacing applies only for the Section shortcode. You can disable this spacing for an individual shortcode from the section's options pop-up in the visual page builder.", "the-core"),
								'value' => 'fw-section-space-md',
								'type'    => 'radio-text',
								'choices' => array(
									'fw-section-space-sm' => __('Compact', 'the-core'),
									'fw-section-space-md' => __('Cozy', 'the-core'),
									'fw-section-space-lg' => __('Comfortable', 'the-core'),
								),
								'custom'  => 'density_spacing',
							),
							'page_404' => array(
								'label' => __('404 Error Page', 'the-core'),
								'desc' => __('Select the 404 error page', 'the-core'),
								'help' => __('The users will be redirected to this page when the page they are looking for is not found', 'the-core'),
								'value' => '',
								'type' => 'select',
								'choices' => the_core_list_pages(),
							),
							'enable_coming_soon' => array(
								'type' => 'multi-picker',
								'label' => false,
								'desc' => false,
								'picker' => array(
									'selected' => array(
										'type' => 'switch',
										'value' => 'no',
										'label' => __('Coming soon / Maintenance Page', 'the-core'),
										'desc' => __('Enable coming soon/maintenance page?', 'the-core'),
										'help' => __('The users will be redirected to this page when they are not logged in. Note that you need to disable it manually in order to make your website accessible again.', 'the-core'),
										'left-choice' => array(
											'value' => 'no',
											'label' => __('No', 'the-core'),
										),
										'right-choice' => array(
											'value' => 'yes',
											'label' => __('Yes', 'the-core'),
										)
									),
								),
								'choices' => array(
									'yes' => array(
										'coming_soon_page' => array(
											'label' => '',
											'desc' => __('Select the coming soon page', 'the-core'),
											'value' => '',
											'type' => 'select',
											'choices' => the_core_list_pages(),
										),
									)
								)
							),
							'scroll_to_top_group' => array(
								'type' => 'group',
								'options' => array(
									'scroll_to_top_styling' => array(
										'attr' => array(
											'data-advanced-for' => 'scroll-to-top-styling',
											'class' => 'fw-advanced-button'
										),
										'type' => 'popup',
										'label' => __('Custom Style', 'the-core'),
										'desc' => __('Change the style / typography of this shortcode', 'the-core'),
										'button' => __('Styling', 'the-core'),
										'size' => 'medium',
										'popup-options' => array(
											'icon-type' => array(
												'type' => 'multi-picker',
												'label' => false,
												'desc' => false,
												'picker' => array(
													'icon-box-img' => array(
														'label' => __('Icon', 'the-core'),
														'desc' => __('Select icon type', 'the-core'),
														'attr' => array('class' => 'fw-checkbox-float-left'),
														'type' => 'radio',
														'value' => 'icon-class',
														'choices' => array(
															'icon-class' => __('Font Awesome', 'the-core'),
															'upload-icon' => __('Custom Upload', 'the-core'),
														),
													),
												),
												'choices' => array(
													'icon-class' => array(
														'icon_class' => array(
															'type' => 'icon',
															'value' => '',
															'label' => ''
														),
													),
													'upload-icon' => array(
														'upload-custom-img' => array(
															'label' => '',
															'type' => 'upload',
															'help' => __('For best results upload a square image, larger then 30px x 30px.', 'the-core'),
														),
													),
												)
											),
											'color' => array(
												'label' => __('Color', 'the-core'),
												'help' => __('The default color palette can be changed from the', 'the-core') . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __('Colors section', 'the-core') . '</a> ' . __('found in the Theme Settings page', 'the-core'),
												'desc' => __('Select the color', 'the-core'),
												'value' => '',
												'choices' => $the_core_color_settings,
												'type' => 'color-palette'
											),
										)
									),
									'enable_scroll_to' => array(
										'attr' => array('class' => 'scroll-to-top-styling'),
										'type' => 'switch',
										'value' => 'no',
										'label' => __('Scroll to Top Button', 'the-core'),
										'desc' => __('Enable scroll to top?', 'the-core'),
										'left-choice' => array(
											'value' => 'no',
											'label' => __('No', 'the-core'),
										),
										'right-choice' => array(
											'value' => 'yes',
											'label' => __('Yes', 'the-core'),
										)
									),
								)
							),
							'spinner_group' => array(
								'type' => 'group',
								'options' => array(
									'spinner_styling' => array(
										'attr' => array(
											'data-advanced-for' => 'spinner-styling',
											'class' => 'fw-advanced-button'
										),
										'type' => 'popup',
										'label' => __('Custom Style', 'the-core'),
										'desc' => __('Change the style / typography of this shortcode', 'the-core'),
										'button' => __('Styling', 'the-core'),
										'size' => 'medium',
										'popup-options' => array(
											'loading_type_group' => array(
												'type' => 'group',
												'options' => array(
													'spinner_type' => array(
														'type'    => 'multi-picker',
														'label'   => false,
														'desc'    => false,
														'picker'  => array(
															'selected' => array(
																'label'   => __( 'Loading Type', 'the-core' ),
																'desc'    => __( 'Choose the loading type', 'the-core' ),
																'type'    => 'image-picker',
																'value'   => 'fw-spinner-rotate-plane',
																'choices' => array(
																	'fw-spinner-rotate-plane' => array(
																		'small' => array(
																			'height' => 70,
																			'src'    => $the_core_template_directory . '/images/image-picker/spinner-1.jpg'
																		),
																		'large' => array(
																			'height' => 208,
																			'src'    => $the_core_template_directory . '/images/image-picker/spinner-1.gif'
																		),
																	),
																	'fw-spinner-double-bounce' => array(
																		'small' => array(
																			'height' => 70,
																			'src'    => $the_core_template_directory . '/images/image-picker/spinner-2.jpg'
																		),
																		'large' => array(
																			'height' => 208,
																			'src'    => $the_core_template_directory . '/images/image-picker/spinner-2.gif'
																		),
																	),
																	'fw-spinner-rect' => array(
																		'small' => array(
																			'height' => 70,
																			'src'    => $the_core_template_directory . '/images/image-picker/spinner-3.jpg'
																		),
																		'large' => array(
																			'height' => 208,
																			'src'    => $the_core_template_directory . '/images/image-picker/spinner-3.gif'
																		),
																	),
																	'fw-spinner-cube-move' => array(
																		'small' => array(
																			'height' => 70,
																			'src'    => $the_core_template_directory . '/images/image-picker/spinner-4.jpg'
																		),
																		'large' => array(
																			'height' => 208,
																			'src'    => $the_core_template_directory . '/images/image-picker/spinner-4.gif'
																		),
																	),
																	'fw-spinner-scale-out' => array(
																		'small' => array(
																			'height' => 70,
																			'src'    => $the_core_template_directory . '/images/image-picker/spinner-5.jpg'
																		),
																		'large' => array(
																			'height' => 208,
																			'src'    => $the_core_template_directory . '/images/image-picker/spinner-5.gif'
																		),
																	),
																	'fw-spinner-dot-rotate' => array(
																		'small' => array(
																			'height' => 70,
																			'src'    => $the_core_template_directory . '/images/image-picker/spinner-6.jpg'
																		),
																		'large' => array(
																			'height' => 208,
																			'src'    => $the_core_template_directory . '/images/image-picker/spinner-6.gif'
																		),
																	),
																	'fw-spinner-bounce-delay' => array(
																		'small' => array(
																			'height' => 70,
																			'src'    => $the_core_template_directory . '/images/image-picker/spinner-7.jpg'
																		),
																		'large' => array(
																			'height' => 208,
																			'src'    => $the_core_template_directory . '/images/image-picker/spinner-7.gif'
																		),
																	),
																	'fw-spinner-circle' => array(
																		'small' => array(
																			'height' => 70,
																			'src'    => $the_core_template_directory . '/images/image-picker/spinner-8.jpg'
																		),
																		'large' => array(
																			'height' => 208,
																			'src'    => $the_core_template_directory . '/images/image-picker/spinner-8.gif'
																		),
																	),
																	'fw-spinner-cube-grid' => array(
																		'small' => array(
																			'height' => 70,
																			'src'    => $the_core_template_directory . '/images/image-picker/spinner-9.jpg'
																		),
																		'large' => array(
																			'height' => 208,
																			'src'    => $the_core_template_directory . '/images/image-picker/spinner-9.gif'
																		),
																	),
																	'fw-spinner-cube' => array(
																		'small' => array(
																			'height' => 70,
																			'src'    => $the_core_template_directory . '/images/image-picker/spinner-10.jpg'
																		),
																		'large' => array(
																			'height' => 208,
																			'src'    => $the_core_template_directory . '/images/image-picker/spinner-10.gif'
																		),
																	),
																),
															),
														),
														'choices' => array(),
													),
													'color' => array(
														'label' => '',
														'help' => __('The default color palette can be changed from the', 'the-core') . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __('Colors section', 'the-core') . '</a> ' . __('found in the Theme Settings page', 'the-core'),
														'desc' => __('Select the loading color', 'the-core'),
														'value' => '',
														'choices' => $the_core_color_settings,
														'type' => 'color-palette'
													),
												)
											),
											'transition_in_group' => array(
												'type' => 'group',
												'options' => array(
													'transition_in' => array(
														'label' => __('Transition In', 'the-core'),
														'desc' => __('Select the in page transition', 'the-core'),
														'value' => '',
														'choices' => the_core_transition_in(),
														'type' => 'select'
													),
													'duration_in' => array(
														'label' => __('Duration', 'the-core'),
														'desc' => __('Enter the duration transition in milliseconds', 'the-core'),
														'value' => '',
														'type' => 'short-text'
													),
												)
											),
											'transition_out_group' => array(
												'type' => 'group',
												'options' => array(
													'transition_out' => array(
														'label' => __('Transition Out', 'the-core'),
														'desc' => __('Select the out page transition', 'the-core'),
														'value' => '',
														'choices' => the_core_transition_out(),
														'type' => 'select'
													),
													'duration_out' => array(
														'label' => __('Duration', 'the-core'),
														'desc' => __('Enter the duration in milliseconds', 'the-core'),
														'value' => '',
														'type' => 'short-text'
													),
												)
											),
										)
									),
									'page_transition' => array(
										'attr' => array('class' => 'spinner-styling'),
										'type' => 'switch',
										'value' => 'no',
										'label' => __('Page Transition', 'the-core'),
										'desc' => __('Enable page transition?', 'the-core'),
										'left-choice' => array(
											'value' => 'no',
											'label' => __('No', 'the-core'),
										),
										'right-choice' => array(
											'value' => 'yes',
											'label' => __('Yes', 'the-core'),
										)
									),
								)
							),
							'smooth_scroll' => array(
								'type'  => 'switch',
								'value' => 'no',
								'label' => __('Smooth Scroll', 'the-core'),
								'desc'  => __('Enable smooth scroll?', 'the-core'),
								'left-choice' => array(
									'value' => 'no',
									'label' => __('No', 'the-core'),
								),
								'right-choice' => array(
									'value' => 'yes',
									'label' => __('Yes', 'the-core'),
								)
							),
							'custom_login_page_group' => array(
								'type' => 'group',
								'options' => array(
									'custom_login_page_styling' => array(
										'attr' => array(
											'data-advanced-for' => 'custom_login_page_styling',
											'class' => 'fw-advanced-button'
										),
										'type' => 'popup',
										'label' => __('Custom Login Page Styling', 'the-core'),
										'desc' => __('Change the style / typography of this shortcode', 'the-core'),
										'button' => __('Styling', 'the-core'),
										'size' => 'medium',
										'popup-options' => array(
											'login_logo' => array(
												'label' => __('Logo', 'the-core'),
												'type' => 'upload',
												'desc' => __('Upload custom logo for login page', 'the-core'),
											),
											'custom_login_background' => array(
												'type' => 'group',
												'options' => array(
													'background_image' => array(
														'label' => __('Background', 'the-core'),
														'type' => 'background-image',
														'choices' => array(//	in future may will set predefined images
														)
													),
													'background_color' => array(
														'label' => '',
														'help' => __('The default color palette can be changed from the', 'the-core') . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __('Colors section', 'the-core') . '</a> ' . __('found in the Theme Settings page', 'the-core'),
														'desc' => __('Select the background color', 'the-core'),
														'value' => '',
														'choices' => $the_core_color_settings,
														'type' => 'color-palette'
													),
													'repeat' => array(
														'label' => '',
														'desc' => __('Select how will the background repeat', 'the-core'),
														'type' => 'short-select',
														'attr' => array('class' => 'fw-checkbox-float-left'),
														'value' => 'no-repeat',
														'choices' => array(
															'no-repeat' => __('No-Repeat', 'the-core'),
															'repeat' => __('Repeat', 'the-core'),
															'repeat-x' => __('Repeat-X', 'the-core'),
															'repeat-y' => __('Repeat-Y', 'the-core'),
														)
													),
													'bg_position_x' => array(
														'label' => __('Position', 'the-core'),
														'desc' => __('Select the horizontal background position', 'the-core'),
														'type' => 'short-select',
														'attr' => array('class' => 'fw-checkbox-float-left'),
														'value' => '',
														'choices' => array(
															'left' => __('Left', 'the-core'),
															'center' => __('Center', 'the-core'),
															'right' => __('Right', 'the-core'),
														)
													),
													'bg_position_y' => array(
														'label' => '',
														'desc' => __('Select the vertical background position', 'the-core'),
														'type' => 'short-select',
														'attr' => array('class' => 'fw-checkbox-float-left'),
														'value' => '',
														'choices' => array(
															'top' => __('Top', 'the-core'),
															'center' => __('Center', 'the-core'),
															'bottom' => __('Bottom', 'the-core'),
														)
													),
													'bg_size' => array(
														'label' => __('Size', 'the-core'),
														'desc' => __('Select the background size', 'the-core'),
														'help' => __('<strong>Auto</strong> - Default value, the background image has the original width and height.<br><br><strong>Cover</strong> - Scale the background image so that the background area is completely covered by the image.<br><br><strong>Contain</strong> - Scale the image to the largest size such that both its width and height can fit inside the content area.', 'the-core'),
														'type' => 'short-select',
														'attr' => array('class' => 'fw-checkbox-float-left'),
														'value' => '',
														'choices' => array(
															'auto' => __('Auto', 'the-core'),
															'cover' => __('Cover', 'the-core'),
															'contain' => __('Contain', 'the-core'),
														)
													),
												)
											),
											'login_forms_typography_group' => array(
												'type' => 'group',
												'options' => array(
													'custom_login_form_labels' => array(
														'label' => __('Form Labels', 'the-core'),
														'type' => 'tf-typography',
														'value' => array(
															'google_font' => true,
															'subset' => 'latin',
															'variation' => 'regular',
															'family' => 'Open Sans',
															'style' => '',
															'weight' => '',
															'size' => '14',
															'line-height' => '21',
															'letter-spacing' => '0',
															'color-palette' => array(
																'id' => 'fw-custom',
																'color' => '#777',
															),
														),
													),
													'custom_login_form_labels_uppercase' => array(
														'type' => 'switch',
														'value' => 'uppercase',
														'label' => '',
														'desc' => __('Uppercase form labels?', 'the-core'),
														'left-choice' => array(
															'value' => 'none',
															'label' => __('No', 'the-core'),
														),
														'right-choice' => array(
															'value' => 'uppercase',
															'label' => __('Yes', 'the-core'),
														)
													),
													'custom_login_form_inputs' => array(
														'label' => __('Form Inputs', 'the-core'),
														'type' => 'tf-typography',
														'value' => array(
															'google_font' => true,
															'subset' => 'latin',
															'variation' => '400',
															'family' => 'Open Sans',
															'style' => '',
															'weight' => '',
															'size' => '24',
															'line-height' => '24',
															'letter-spacing' => '0',
															'color-palette' => array(
																'id' => 'fw-custom',
																'color' => '#32373c',
															),
														),
													),
													'login_form_bg_options_group' => array(
														'type' => 'group',
														'options' => array(
															'login_form_bg_options' => array(
																'type' => 'multi-picker',
																'label' => false,
																'desc' => false,
																'picker' => array(
																	'background' => array(
																		'label' => __('Form Bg Color', 'the-core'),
																		'desc' => __('Select form background', 'the-core'),
																		'attr' => array('class' => 'fw-checkbox-float-left'),
																		'type' => 'radio',
																		'choices' => array(
																			'none' => __('None', 'the-core'),
																			'custom' => __('Custom', 'the-core'),
																		),
																		'value' => 'custom'
																	),
																),
																'choices' => array(
																	'custom' => array(
																		'login_form_bg_color' => array(
																			'label' => '',
																			'desc' => __('Select form background color', 'the-core'),
																			'help' => __('The default color palette can be changed from the', 'the-core') . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __('Colors section', 'the-core') . '</a> ' . __('found in the Theme Settings page', 'the-core'),
																			'value' => array(
																				'id' => 'fw-custom',
																				'color' => '#fff'
																			),
																			'choices' => $the_core_color_settings,
																			'type' => 'color-palette'
																		),
																	),
																),
																'show_borders' => false,
															),
														)
													),
													'login_input_border' => array(
														'type' => 'multi-picker',
														'label' => false,
														'desc' => false,
														'picker' => array(
															'selected' => array(
																'type' => 'switch',
																'value' => 'yes',
																'label' => __('Fields Border', 'the-core'),
																'desc' => __('Add a border to the fields?', 'the-core'),
																'left-choice' => array(
																	'value' => 'no',
																	'label' => __('No', 'the-core'),
																),
																'right-choice' => array(
																	'value' => 'yes',
																	'label' => __('Yes', 'the-core'),
																)
															),
														),
														'choices' => array(
															'yes' => array(
																'border_size' => array(
																	'label' => '',
																	'desc' => __('Border size in pixels', 'the-core'),
																	'type' => 'short-text',
																	'value' => '1',
																),
																'border_color' => array(
																	'label' => '',
																	'help' => __('The default color palette can be changed from the', 'the-core') . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __('Colors section', 'the-core') . '</a> ' . __('found in the Theme Settings page', 'the-core'),
																	'desc' => __('Select border color', 'the-core'),
																	'value' => array(
																		'id' => 'fw-custom',
																		'color' => '#ddd'
																	),
																	'choices' => $the_core_color_settings,
																	'type' => 'color-palette'
																),
															)
														)
													),
													'login_fields_bg_options' => array(
														'type' => 'multi-picker',
														'label' => false,
														'desc' => false,
														'picker' => array(
															'background' => array(
																'label' => __('Fields Bg Color', 'the-core'),
																'desc' => __('Select fields background', 'the-core'),
																'attr' => array('class' => 'fw-checkbox-float-left'),
																'type' => 'radio',
																'choices' => array(
																	'none' => __('None', 'the-core'),
																	'custom' => __('Custom', 'the-core'),
																),
																'value' => 'custom'
															),
														),
														'choices' => array(
															'custom' => array(
																'fields_bg_color' => array(
																	'label' => '',
																	'desc' => __('Select fields background color', 'the-core'),
																	'help' => __('The default color palette can be changed from the', 'the-core') . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __('Colors section', 'the-core') . '</a> ' . __('found in the Theme Settings page', 'the-core'),
																	'value' => array(
																		'id' => 'fw-custom',
																		'color' => '#fbfbfb'
																	),
																	'choices' => $the_core_color_settings,
																	'type' => 'color-palette'
																),
															),
														),
														'show_borders' => false,
													),
												)
											),
											'login_button_options_group' => array(
												'type' => 'group',
												'options' => array(
													'login_button_label' => array(
														'label' => __('Button Label', 'the-core'),
														'type' => 'tf-typography',
														'value' => array(
															'google_font' => true,
															'subset' => 'latin',
															'variation' => '400',
															'family' => 'Open Sans',
															'style' => '',
															'weight' => '',
															'size' => '13',
															'line-height' => '28',
															'letter-spacing' => '0',
															'color-palette' => array(
																'id' => 'fw-custom',
																'color' => '#fff',
															),
														),
													),
													'login_button_bg_color' => array(
														'label' => __('Button Bg Color', 'the-core'),
														'desc' => __('Select the button background color', 'the-core'),
														'help' => __('The default color palette can be changed from the', 'the-core') . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __('Colors section', 'the-core') . '</a> ' . __('found in the Theme Settings page', 'the-core'),
														'value' => array(
															'id' => 'fw-custom',
															'color' => '#0085ba'
														),
														'choices' => $the_core_color_settings,
														'type' => 'color-palette'
													),
												)
											),
											'custom_login_form_links_group' => array(
												'type' => 'group',
												'options' => array(
													'custom_login_form_links' => array(
														'label' => __('Links', 'the-core'),
														'type' => 'tf-typography',
														'value' => array(
															'google_font' => true,
															'subset' => 'latin',
															'variation' => '400',
															'family' => 'Open Sans',
															'style' => '',
															'weight' => '',
															'size' => '13',
															'line-height' => '19.5',
															'letter-spacing' => '0',
															'color-palette' => array(
																'id' => 'fw-custom',
																'color' => '#999',
															),
														),
													),
													'custom_login_form_links_hover' => array(
														'label' => '',
														'help' => __('The default color palette can be changed from the', 'the-core') . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __('Colors section', 'the-core') . '</a> ' . __('found in the Theme Settings page', 'the-core'),
														'desc' => __('Select the hover color', 'the-core'),
														'value' => '',
														'choices' => $the_core_color_settings,
														'type' => 'color-palette'
													),
												)
											),
											'custom_login_css' => array(
												'label'   => 'Custom CSS',
												'desc'    => __( 'Enter the custom CSS for Login Page', 'the-core' ),
												'value'   => '',
												'type'    => 'textarea'
											),
										)
									),
									'enable_custom_login_page' => array(
										'attr' => array('class' => 'custom_login_page_styling'),
										'type' => 'switch',
										'value' => 'no',
										'label' => __('Custom Login Page', 'the-core'),
										'desc' => __('Enable custom login page?', 'the-core'),
										'left-choice' => array(
											'value' => 'no',
											'label' => __('No', 'the-core'),
										),
										'right-choice' => array(
											'value' => 'yes',
											'label' => __('Yes', 'the-core'),
										)
									),
								)
							),
							'enable_smartphone_animations' => array(
								'type' => 'switch',
								'value' => 'no',
								'label' => __('Smartphone Animations', 'the-core'),
								'desc' => __('Enable the page elements animations on smartphones?', 'the-core'),
								'help' => __('This is linked to the Animation options found in the visual page builder. It lets you turn ON / OFF animations for smartphones. Having them ON might have a negative performance impact for your website on smartphones.', 'the-core'),
								'left-choice' => array(
									'value' => 'no',
									'label' => __('No', 'the-core'),
								),
								'right-choice' => array(
									'value' => 'yes',
									'label' => __('Yes', 'the-core'),
								)
							),
							'comments_gdpr' => array(
								'type'    => 'multi-picker',
								'label'   => false,
								'desc'    => false,
								'picker'  => array(
									'selected' => array(
										'type'         => 'switch',
										'value'        => 'no',
										'label'        => __( 'GDPR Comments', 'the-core' ),
										'desc'         => __( 'Enable the GDPR for WP comments?', 'the-core' ),
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
										'comments_gdpr_text' => array(
											'label' => '',
											'desc'  => __( 'Enter the comments GDPR text', 'the-core' ),
											'value' => '',
											'type'  => 'wp-editor',
											'media_buttons' => false,
										),
									)
								)
							),
							// todo: temporary is disabled the licence key
							/*'theme_licence_key' => array(
								'label'   => __( 'Theme Licence Key', 'the-core' ),
								'desc'    => __( 'Enter the theme licence key', 'the-core' ),
								'type'    => 'text',
								'value'   => ''
							),*/
						)
					),
				)
			),
			'social-options' => array(
				'title' => __('Social Profiles', 'the-core'),
				'type' => 'tab',
				'options' => array(
					'social-box' => array(
						'title' => __('Social', 'the-core'),
						'type' => 'box',
						'options' => array(
							'socials' => array(
								'type' => 'addable-popup',
								'size'          => 'medium',
								'label' => __('Social Links', 'the-core'),
								'desc' => __('Add your social profiles', 'the-core'),
								'template' => '{{=social_name}}',
								'popup-options' => array(
									'social_name' => array(
										'label' => __('Name', 'the-core'),
										'desc' => __('Enter a name (it is for internal use and will not appear on the front end)', 'the-core'),
										'type' => 'text',
									),
									'social_type' => array(
										'type' => 'multi-picker',
										'label' => false,
										'desc' => false,
										'picker' => array(
											'social-type' => array(
												'label' => __('Icon', 'the-core'),
												'desc' => __('Select social icon type', 'the-core'),
												'attr' => array('class' => 'fw-checkbox-float-left'),
												'type' => 'radio',
												'value' => 'icon-social',
												'choices' => array(
													'icon-social' => __('Font Awesome', 'the-core'),
													'upload-icon' => __('Custom Upload', 'the-core'),
												),
											),
										),
										'choices' => array(
											'icon-social' => array(
												'icon_class' => array(
													'type' => 'icon',
													'value' => 'fa fa-adn',
													'label' => '',
												),
											),
											'upload-icon' => array(
												'upload-social-icon' => array(
													'label' => '',
													'type' => 'upload',
												)
											),
										)
									),
									'social-link' => array(
										'label' => __('Link', 'the-core'),
										'desc' => __('Enter your social URL link', 'the-core'),
										'type' => 'text',
									)
								),
							),
						)
					),
				)
			),
			'tracking-scripts' => array(
				'title' => __('Tracking Scripts', 'the-core'),
				'type' => 'tab',
				'options' => array(
					'tracking-box' => array(
						'title' => __('Tracking Scripts', 'the-core'),
						'type' => 'box',
						'options' => array(
							'tracking_scripts' => array(
								'type' => 'addable-popup',
								'size' => 'medium',
								'label' => __('Tracking Scripts', 'the-core'),
								'desc' => __('Add your tracking scripts (Hotjar, Google Analytics, etc)', 'the-core'),
								'template' => '{{=name}}',
								'popup-options' => array(
									'name' => array(
										'label' => __('Name', 'the-core'),
										'desc' => __('Enter a name (it is for internal use and will not appear on the front end)', 'the-core'),
										'type' => 'text',
									),
									'script_group' => array(
										'type' => 'group',
										'options' => array(
											'position' => array(
												'label'   => __( 'Position', 'the-core' ),
												'desc'    => __( 'Choose the tracking script position', 'the-core' ),
												'attr'    => array( 'class' => 'fw-checkbox-float-left' ),
												'type'    => 'radio',
												'value'   => 'footer',
												'choices' => array(
													'footer' => __( 'Footer', 'the-core' ),
													'header' => __( 'Header', 'the-core' ),
												)
											),
											'script' => array(
												'label' => __('Script', 'the-core'),
												'desc' => __('Copy/Paste the tracking script here', 'the-core'),
												'type' => 'textarea',
											)
										)
									),
								),
							),
						)
					),
				)
			),
			'api-keys' => array(
				'title' => __('API Keys', 'the-core'),
				'type' => 'tab',
				'options' => array(
					'api-keys-box' => array(
						'title' => __('Google Maps', 'the-core'),
						'type' => 'box',
						'options' => array(
							'gmap-key' => array(
								'label' => __( 'Google Maps', 'the-core' ),
								'type'  => 'gmap-key',
								'desc' => sprintf( __( 'Create an application in %sGoogle Console%s and add the API Key here.', 'the-core' ), '<a target="_blank" href="https://console.developers.google.com/flows/enableapi?apiid=places_backend,maps_backend,geocoding_backend,directions_backend,distance_matrix_backend,elevation_backend&keyType=CLIENT_SIDE&reusekey=true">', '</a>' )
							),
						)
					),
				)
			),
		),
	),
	'posts' => array(
		'title' => __('Posts', 'the-core'),
		'type' => 'tab',
		'options' => array(
			'blog-posts' => array(
				'title' => __('Blog', 'the-core'),
				'type' => 'tab',
				'options' => array(
					'posts-box' => array(
						'title' => __('Posts', 'the-core'),
						'type' => 'box',
						'options' => array(
							'posts_settings' => array(
								'type' => 'multi',
								'label' => false,
								'attr' => array(
									'class' => 'fw-option-type-multi-show-borders',
								),
								'inner-options' => array(
									'blog_type' => array(
										'type' => 'image-picker',
										'label' => __('Blog Style', 'the-core'),
										'desc' => __('Select the blog display style', 'the-core'),
										'value' => 'blog-1',
										'choices' => array(
											'blog-1' => array(
												'small' => array(
													'data-ts-post' => 'type-1',
													'height' => 70,
													'src' => $the_core_template_directory . '/images/image-picker/blog-style1.jpg'
												),
												'large' => array(
													'data-ts-post' => 'type-1',
													'height' => 214,
													'src' => $the_core_template_directory . '/images/image-picker/blog-style1.jpg'
												),
											),
											'blog-2' => array(
												'small' => array(
													'data-ts-post' => 'type-2',
													'height' => 70,
													'src' => $the_core_template_directory . '/images/image-picker/blog-style2.jpg'
												),
												'large' => array(
													'data-ts-post' => 'type-2',
													'height' => 214,
													'src' => $the_core_template_directory . '/images/image-picker/blog-style2.jpg'
												),
											),
											'blog-3' => array(
												'data-ts-post' => 'type-3',
												'small' => array(
													'height' => 70,
													'src' => $the_core_template_directory . '/images/image-picker/blog-style3.jpg'
												),
												'large' => array(
													'data-ts-post' => 'type-3',
													'height' => 214,
													'src' => $the_core_template_directory . '/images/image-picker/blog-style3.jpg'
												),
											),
										),
									),
									'grid_post_group' => array(
										'type' => 'group',
										'options' => array(
											'blog_view' => array(
												'type' => 'switch',
												'value' => 'default',
												'label' => __('Grid View', 'the-core'),
												'desc' => __('Display blog posts on a grid', 'the-core'),
												'help' => sprintf("%s", __('The posts will be displayed on a 2 columns grid if the page has a sidebar and on a 3 columns grid if it doesn\'t.', 'the-core')),
												'left-choice' => array(
													'value' => 'default',
													'label' => __('No', 'the-core'),
												),
												'right-choice' => array(
													'value' => 'grid',
													'label' => __('Yes', 'the-core'),
												)
											),
											'grid_bg_color' => array(
												'label' => '',
												'help' => __('The default color palette can be changed from the', 'the-core') . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __('Colors section', 'the-core') . '</a> ' . __('found in the Theme Settings page', 'the-core'),
												'desc' => __('Select the grid background color', 'the-core'),
												'value' => '',
												'choices' => $the_core_color_settings,
												'type' => 'color-palette'
											),
										)
									),
									'blog_title' => array(
										'type' => 'multi-picker',
										'label' => false,
										'desc' => false,
										'picker' => array(
											'selected' => array(
												'type' => 'short-select',
												'label' => __('Blog Titles', 'the-core'),
												'desc' => __('Choose the blog titles size, H1 being the largest', 'the-core'),
												'value' => 'h2',
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
													'attr' => array('class' => 'fw-advanced-button'),
													'type' => 'popup',
													'label' => '',
													'desc' => __('Change the style / typography of this title', 'the-core'),
													'button' => __('Styling', 'the-core'),
													'size' => 'small',
													'popup-options' => array(
														'h1_group' => array(
															'type' => 'group',
															'options' => array(
																'h1' => array(
																	'label' => __('H1', 'the-core'),
																	'type' => 'tf-typography',
																	'value' => array(
																		'google_font' => $the_core_typography_settings['h1']['google_font'],
																		'subset' => $the_core_typography_settings['h1']['subset'],
																		'variation' => $the_core_typography_settings['h1']['variation'],
																		'family' => $the_core_typography_settings['h1']['family'],
																		'style' => $the_core_typography_settings['h1']['style'],
																		'weight' => $the_core_typography_settings['h1']['weight'],
																		'size' => $the_core_typography_settings['h1']['size'],
																		'line-height' => $the_core_typography_settings['h1']['line-height'],
																		'letter-spacing' => $the_core_typography_settings['h1']['letter-spacing'],
																		'color-palette' => '',
																	)
																),
																'hover_color' => array(
																	'label' => '',
																	'help' => __('The default color palette can be changed from the', 'the-core') . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __('Colors section', 'the-core') . '</a> ' . __('found in the Theme Settings page', 'the-core'),
																	'desc' => __('Select the hover color', 'the-core'),
																	'value' => '',
																	'choices' => $the_core_color_settings,
																	'type' => 'color-palette'
																),
															)
														)
													),
												),
											),
											'h2' => array(
												'advanced_styling' => array(
													'attr' => array('class' => 'fw-advanced-button'),
													'type' => 'popup',
													'label' => '',
													'desc' => __('Change the style / typography of this title', 'the-core'),
													'button' => __('Styling', 'the-core'),
													'size' => 'small',
													'popup-options' => array(
														'h2_group' => array(
															'type' => 'group',
															'options' => array(
																'h2' => array(
																	'label' => __('H2', 'the-core'),
																	'type' => 'tf-typography',
																	'value' => array(
																		'google_font' => $the_core_typography_settings['h2']['google_font'],
																		'subset' => $the_core_typography_settings['h2']['subset'],
																		'variation' => $the_core_typography_settings['h2']['variation'],
																		'family' => $the_core_typography_settings['h2']['family'],
																		'style' => $the_core_typography_settings['h2']['style'],
																		'weight' => $the_core_typography_settings['h2']['weight'],
																		'size' => $the_core_typography_settings['h2']['size'],
																		'line-height' => $the_core_typography_settings['h2']['line-height'],
																		'letter-spacing' => $the_core_typography_settings['h2']['letter-spacing'],
																		'color-palette' => '',
																	)
																),
																'hover_color' => array(
																	'label' => '',
																	'help' => __('The default color palette can be changed from the', 'the-core') . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __('Colors section', 'the-core') . '</a> ' . __('found in the Theme Settings page', 'the-core'),
																	'desc' => __('Select the hover color', 'the-core'),
																	'value' => '',
																	'choices' => $the_core_color_settings,
																	'type' => 'color-palette'
																),
															)
														)
													),
												),
											),
											'h3' => array(
												'advanced_styling' => array(
													'attr' => array('class' => 'fw-advanced-button'),
													'type' => 'popup',
													'label' => '',
													'desc' => __('Change the style / typography of this title', 'the-core'),
													'button' => __('Styling', 'the-core'),
													'size' => 'small',
													'popup-options' => array(
														'h3_group' => array(
															'type' => 'group',
															'options' => array(
																'h3' => array(
																	'label' => __('H3', 'the-core'),
																	'type' => 'tf-typography',
																	'value' => array(
																		'google_font' => $the_core_typography_settings['h3']['google_font'],
																		'subset' => $the_core_typography_settings['h3']['subset'],
																		'variation' => $the_core_typography_settings['h3']['variation'],
																		'family' => $the_core_typography_settings['h3']['family'],
																		'style' => $the_core_typography_settings['h3']['style'],
																		'weight' => $the_core_typography_settings['h3']['weight'],
																		'size' => $the_core_typography_settings['h3']['size'],
																		'line-height' => $the_core_typography_settings['h3']['line-height'],
																		'letter-spacing' => $the_core_typography_settings['h3']['letter-spacing'],
																		'color-palette' => '',
																	)
																),
																'hover_color' => array(
																	'label' => '',
																	'help' => __('The default color palette can be changed from the', 'the-core') . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __('Colors section', 'the-core') . '</a> ' . __('found in the Theme Settings page', 'the-core'),
																	'desc' => __('Select the hover color', 'the-core'),
																	'value' => '',
																	'choices' => $the_core_color_settings,
																	'type' => 'color-palette'
																),
															)
														)
													),
												),
											),
											'h4' => array(
												'advanced_styling' => array(
													'attr' => array('class' => 'fw-advanced-button'),
													'type' => 'popup',
													'label' => '',
													'desc' => __('Change the style / typography of this title', 'the-core'),
													'button' => __('Styling', 'the-core'),
													'size' => 'small',
													'popup-options' => array(
														'h4_group' => array(
															'type' => 'group',
															'options' => array(
																'h4' => array(
																	'label' => __('H4', 'the-core'),
																	'type' => 'tf-typography',
																	'value' => array(
																		'google_font' => $the_core_typography_settings['h4']['google_font'],
																		'subset' => $the_core_typography_settings['h4']['subset'],
																		'variation' => $the_core_typography_settings['h4']['variation'],
																		'family' => $the_core_typography_settings['h4']['family'],
																		'style' => $the_core_typography_settings['h4']['style'],
																		'weight' => $the_core_typography_settings['h4']['weight'],
																		'size' => $the_core_typography_settings['h4']['size'],
																		'line-height' => $the_core_typography_settings['h4']['line-height'],
																		'letter-spacing' => $the_core_typography_settings['h4']['letter-spacing'],
																		'color-palette' => '',
																	)
																),
																'hover_color' => array(
																	'label' => '',
																	'help' => __('The default color palette can be changed from the', 'the-core') . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __('Colors section', 'the-core') . '</a> ' . __('found in the Theme Settings page', 'the-core'),
																	'desc' => __('Select the hover color', 'the-core'),
																	'value' => '',
																	'choices' => $the_core_color_settings,
																	'type' => 'color-palette'
																),
															)
														)
													),
												),
											),
											'h5' => array(
												'advanced_styling' => array(
													'attr' => array('class' => 'fw-advanced-button'),
													'type' => 'popup',
													'label' => '',
													'desc' => __('Change the style / typography of this title', 'the-core'),
													'button' => __('Styling', 'the-core'),
													'size' => 'small',
													'popup-options' => array(
														'h5_group' => array(
															'type' => 'group',
															'options' => array(
																'h5' => array(
																	'label' => __('H5', 'the-core'),
																	'type' => 'tf-typography',
																	'value' => array(
																		'google_font' => $the_core_typography_settings['h5']['google_font'],
																		'subset' => $the_core_typography_settings['h5']['subset'],
																		'variation' => $the_core_typography_settings['h5']['variation'],
																		'family' => $the_core_typography_settings['h5']['family'],
																		'style' => $the_core_typography_settings['h5']['style'],
																		'weight' => $the_core_typography_settings['h5']['weight'],
																		'size' => $the_core_typography_settings['h5']['size'],
																		'line-height' => $the_core_typography_settings['h5']['line-height'],
																		'letter-spacing' => $the_core_typography_settings['h5']['letter-spacing'],
																		'color-palette' => '',
																	)
																),
																'hover_color' => array(
																	'label' => '',
																	'help' => __('The default color palette can be changed from the', 'the-core') . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __('Colors section', 'the-core') . '</a> ' . __('found in the Theme Settings page', 'the-core'),
																	'desc' => __('Select the hover color', 'the-core'),
																	'value' => '',
																	'choices' => $the_core_color_settings,
																	'type' => 'color-palette'
																),
															)
														)
													),
												),
											),
											'h6' => array(
												'advanced_styling' => array(
													'attr' => array('class' => 'fw-advanced-button'),
													'type' => 'popup',
													'label' => '',
													'desc' => __('Change the style / typography of this title', 'the-core'),
													'button' => __('Styling', 'the-core'),
													'size' => 'small',
													'popup-options' => array(
														'h6_group' => array(
															'type' => 'group',
															'options' => array(
																'h6' => array(
																	'label' => __('H6', 'the-core'),
																	'type' => 'tf-typography',
																	'value' => array(
																		'google_font' => $the_core_typography_settings['h6']['google_font'],
																		'subset' => $the_core_typography_settings['h6']['subset'],
																		'variation' => $the_core_typography_settings['h6']['variation'],
																		'family' => $the_core_typography_settings['h6']['family'],
																		'style' => $the_core_typography_settings['h6']['style'],
																		'weight' => $the_core_typography_settings['h6']['weight'],
																		'size' => $the_core_typography_settings['h6']['size'],
																		'line-height' => $the_core_typography_settings['h6']['line-height'],
																		'letter-spacing' => $the_core_typography_settings['h6']['letter-spacing'],
																		'color-palette' => '',
																	)
																),
																'hover_color' => array(
																	'label' => '',
																	'help' => __('The default color palette can be changed from the', 'the-core') . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __('Colors section', 'the-core') . '</a> ' . __('found in the Theme Settings page', 'the-core'),
																	'desc' => __('Select the hover color', 'the-core'),
																	'value' => '',
																	'choices' => $the_core_color_settings,
																	'type' => 'color-palette'
																),
															)
														)
													),
												),
											),
										),
									),
									'first_letter_caps' => array(
										'type'         => 'switch',
										'value'        => $the_core_first_letter_caps,
										'label'        => __( 'Listing Excerpt Drop Cap', 'the-core' ),
										'desc'         => __( 'Make a drop cap in the article excerpt', 'the-core' ),
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
										'type' => 'multi-picker',
										'label' => false,
										'desc' => false,
										'picker' => array(
											'selected' => array(
												'type' => 'switch',
												'value' => 'yes',
												'label' => __('Comments Number', 'the-core'),
												'desc' => __('Display the no. of comments?', 'the-core'),
												'left-choice' => array(
													'value' => 'no',
													'label' => __('No', 'the-core'),
												),
												'right-choice' => array(
													'value' => 'yes',
													'label' => __('Yes', 'the-core'),
												)
											),
										),
										'choices' => array(
											'yes' => array(
												'comments_number_type' => array(
													'label' => '',
													'type' => 'image-picker',
													'value' => 'fw-comment-link-type-1',
													'desc' => __('Select the comments number type', 'the-core'),
													'choices' => array(
														'fw-comment-link-type-1' => array(
															'small' => array(
																'height' => 50,
																'src' => $the_core_template_directory . '/images/image-picker/comment-type1.jpg',
															)
														),
														'fw-comment-link-type-2' => array(
															'small' => array(
																'height' => 50,
																'src' => $the_core_template_directory . '/images/image-picker/comment-type2.jpg',
															)
														),
														'fw-comment-link-type-3' => array(
															'small' => array(
																'height' => 50,
																'src' => $the_core_template_directory . '/images/image-picker/comment-type3.jpg',
															)
														),
														'fw-comment-link-type-4' => array(
															'small' => array(
																'height' => 50,
																'src' => $the_core_template_directory . '/images/image-picker/comment-type4.jpg',
															)
														),
														'fw-comment-link-type-5' => array(
															'small' => array(
																'height' => 50,
																'src' => $the_core_template_directory . '/images/image-picker/comment-type5.jpg',
															)
														),
														'fw-comment-link-type-6' => array(
															'small' => array(
																'height' => 50,
																'src' => $the_core_template_directory . '/images/image-picker/comment-type6.jpg',
															)
														),
													)
												)
											)
										)
									),
									'comments_type' => array(
										'type' => 'image-picker',
										'label' => __('Comments Type', 'the-core'),
										'desc' => __('Select the comments type', 'the-core'),
										'value' => 'comments-template-1',
										'choices' => array(
											'comments-template-1' => array(
												'small' => array(
													'height' => 70,
													'src' => $the_core_template_directory . '/images/image-picker/comments-type-1.jpg'
												),
												'large' => array(
													'height' => 214,
													'src' => $the_core_template_directory . '/images/image-picker/comments-type-1.jpg'
												),
											),
											'comments-template-2' => array(
												'small' => array(
													'height' => 70,
													'src' => $the_core_template_directory . '/images/image-picker/comments-type-2.jpg'
												),
												'large' => array(
													'height' => 214,
													'src' => $the_core_template_directory . '/images/image-picker/comments-type-2.jpg'
												),
											),
										),
									),
									'blog_btn' => array(
										'type' => 'group',
										'options' => array(
											'button_options' => array(
												'attr' => array('class' => 'fw-advanced-button'),
												'type' => 'popup',
												'label' => __('Blog Button', 'the-core'),
												'desc' => __('Change the style / typography of the blog button', 'the-core'),
												'button' => __('Styling', 'the-core'),
												'size' => 'medium',
												'popup-options' => array(
													'style_group' => array(
														'type' => 'group',
														'options' => array(
															'style' => array(
																'type' => 'multi-picker',
																'label' => false,
																'desc' => false,
																'picker' => array(
																	'selected' => array(
																		'label' => __('Style', 'the-core'),
																		'desc' => __('Choose button style', 'the-core'),
																		'type' => 'image-picker',
																		'attr' => array('class' => 'fw-button-style-type'),
																		'value' => 'fw-btn-1',
																		'choices' => array(
																			'fw-btn-1' => array(
																				'small' => array(
																					'height' => 70,
																					'src' => $the_core_template_directory . '/images/image-picker/button-style1.jpg'
																				),
																				'large' => array(
																					'height' => 208,
																					'src' => $the_core_template_directory . '/images/image-picker/button-style1.jpg'
																				),
																			),
																			'fw-btn-2' => array(
																				'small' => array(
																					'height' => 70,
																					'src' => $the_core_template_directory . '/images/image-picker/button-style2.jpg'
																				),
																				'large' => array(
																					'height' => 208,
																					'src' => $the_core_template_directory . '/images/image-picker/button-style2.jpg'
																				),
																			),
																			'fw-btn-3' => array(
																				'small' => array(
																					'height' => 70,
																					'src' => $the_core_template_directory . '/images/image-picker/button-style3.jpg'
																				),
																				'large' => array(
																					'height' => 208,
																					'src' => $the_core_template_directory . '/images/image-picker/button-style3.jpg'
																				),
																			),
																			'fw-btn-4' => array(
																				'small' => array(
																					'height' => 70,
																					'src' => $the_core_template_directory . '/images/image-picker/button-style4.jpg'
																				),
																				'large' => array(
																					'height' => 208,
																					'src' => $the_core_template_directory . '/images/image-picker/button-style4.jpg'
																				),
																			),
																		),
																	),
																),
																'choices' => array(
																	'fw-btn-1' => array(
																		'border_radius' => array(
																			'label' => __('Corner Radius', 'the-core'),
																			'desc' => __('Enter the corner radius in pixels', 'the-core'),
																			'value' => '0',
																			'type' => 'short-text'
																		),
																	),
																	'fw-btn-2' => array(
																		'border_radius' => array(
																			'label' => __('Corner Radius', 'the-core'),
																			'desc' => __('Enter the corner radius in pixels', 'the-core'),
																			'value' => '0',
																			'type' => 'short-text'
																		),
																		'border_size' => array(
																			'label' => '',
																			'desc' => __('Border size in pixels', 'the-core'),
																			'type' => 'short-text',
																			'value' => '1',
																		),
																	),
																	'fw-btn-3' => array(
																		'border_size' => array(
																			'label' => '',
																			'desc' => __('Border size in pixels', 'the-core'),
																			'type' => 'short-text',
																			'value' => '1',
																		),
																	),
																),
															)
														)
													),
													'btn_color_group' => array(
														'type' => 'group',
														'attr' => array('class' => 'fw-button-color-group'),
														'options' => array(
															'normal_color' => array(
																'label' => __('Normal Color', 'the-core'),
																'desc' => __('Select normal color', 'the-core'),
																'help' => __('The default color palette can be changed from the', 'the-core') . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __('Colors section', 'the-core') . '</a> ' . __('found in the Theme Settings page', 'the-core'),
																'value' => '',
																'choices' => $the_core_color_settings,
																'type' => 'color-palette'
															),
															'hover_color' => array(
																'label' => __('Hover Color', 'the-core'),
																'desc' => __('Select hover color', 'the-core'),
																'help' => __('The default color palette can be changed from the', 'the-core') . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __('Colors section', 'the-core') . '</a> ' . __('found in the Theme Settings page', 'the-core'),
																'value' => '',
																'choices' => $the_core_color_settings,
																'type' => 'color-palette'
															),
														)
													),
													'label-group' => array(
														'type' => 'group',
														'options' => array(
															'label_advanced_styling' => array(
																'attr' => array(
																	'data-advanced-for' => 'button-advanced',
																	'class' => 'fw-advanced-button'
																),
																'type' => 'popup',
																'label' => __('Custom Style', 'the-core'),
																'desc' => __('Change the style / typography of this shortcode', 'the-core'),
																'button' => __('Styling', 'the-core'),
																'size' => 'small',
																'popup-options' => array(
																	'advanced-group' => array(
																		'type' => 'group',
																		'options' => array(
																			'text' => array(
																				'label' => __('Label', 'the-core'),
																				'type' => 'tf-typography',
																				'value' => array(
																					'google_font' => $the_core_typography_settings['buttons']['google_font'],
																					'subset' => $the_core_typography_settings['buttons']['subset'],
																					'variation' => $the_core_typography_settings['buttons']['variation'],
																					'family' => $the_core_typography_settings['buttons']['family'],
																					'style' => $the_core_typography_settings['buttons']['style'],
																					'weight' => $the_core_typography_settings['buttons']['weight'],
																					'size' => $the_core_typography_settings['buttons']['size'],
																					'line-height' => $the_core_typography_settings['buttons']['line-height'],
																					'letter-spacing' => $the_core_typography_settings['buttons']['letter-spacing'],
																					'color-palette' => '',
																				)
																			),
																			'hover_text_color' => array(
																				'label' => '',
																				'desc' => __('Select text hover color', 'the-core'),
																				'help' => __('The default color palette can be changed from the', 'the-core') . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __('Colors section', 'the-core') . '</a> ' . __('found in the Theme Settings page', 'the-core'),
																				'value' => '',
																				'choices' => $the_core_color_settings,
																				'type' => 'color-palette'
																			),
																		)
																	)
																),
															),
															'label' => array(
																'label' => __('Label', 'the-core'),
																'attr' => array('class' => 'button-advanced'),
																'desc' => __('This is the text that appears on your button', 'the-core'),
																'type' => 'text',
																'value' => 'Read More'
															),
														)
													),
													'btn_size_group' => array(
														'type' => 'group',
														'options' => array(
															'size' => array(
																'type' => 'multi-picker',
																'label' => false,
																'desc' => false,
																'picker' => array(
																	'selected' => array(
																		'label' => __('Button Size', 'the-core'),
																		'desc' => __('Choose button size', 'the-core'),
																		'attr' => array('class' => 'fw-checkbox-float-left'),
																		'type' => 'radio',
																		'value' => 'fw-btn-md',
																		'choices' => array(
																			'fw-btn-sm' => __('Small', 'the-core'),
																			'fw-btn-md' => __('Normal', 'the-core'),
																			'fw-btn-lg' => __('Large', 'the-core'),
																			'custom' => __('Custom', 'the-core'),
																		)
																	),
																),
																'choices' => array(
																	'custom' => array(
																		'width' => array(
																			'label' => __('Width', 'the-core'),
																			'desc' => __('Enter button width in pixels', 'the-core'),
																			'type' => 'short-text',
																			'value' => '',
																		),
																		'height' => array(
																			'label' => __('Height', 'the-core'),
																			'desc' => __('Enter button height in pixels', 'the-core'),
																			'type' => 'short-text',
																			'value' => '',
																		),
																	),
																),
															),
														)
													),
													'icon_group' => array(
														'type' => 'group',
														'options' => array(
															'icon_type' => array(
																'type' => 'multi-picker',
																'label' => false,
																'desc' => false,
																'picker' => array(
																	'tab_icon' => array(
																		'label' => __('Icon', 'the-core'),
																		'desc' => __('Select icon type', 'the-core'),
																		'attr' => array('class' => 'fw-checkbox-float-left'),
																		'type' => 'radio',
																		'value' => 'icon-class',
																		'choices' => array(
																			'icon-class' => __('Font Awesome', 'the-core'),
																			'upload-icon' => __('Custom Upload', 'the-core'),
																		),
																	),
																),
																'choices' => array(
																	'icon-class' => array(
																		'icon_class' => array(
																			'type' => 'icon',
																			'value' => '',
																			'label' => '',
																		),
																	),
																	'upload-icon' => array(
																		'upload-custom-img' => array(
																			'label' => '',
																			'type' => 'upload',
																		),
																	),
																)
															),
															'icon_position' => array(
																'type' => 'switch',
																'label' => '',
																'desc' => __('Choose the icon position', 'the-core'),
																'value' => 'pull-left-icon',
																'right-choice' => array(
																	'value' => 'pull-right-icon',
																	'label' => __('Right', 'the-core'),
																),
																'left-choice' => array(
																	'value' => 'pull-left-icon',
																	'label' => __('Left', 'the-core'),
																),
															),
															'icon_size' => array(
																'label' => __('Icon Size', 'the-core'),
																'desc' => __('Enter the icon size in pixels', 'the-core'),
																'value' => '12',
																'type' => 'short-text'
															),
														)
													),
												),
											),
										),
									),
									'image_alignment' => array(
										'label' => __('Image Alignment', 'the-core'),
										'type' => 'image-picker',
										'value' => '',
										'desc' => __('Select the default image alignment for new post', 'the-core'),
										'help' => __('Your choice will not apply to posts that are already published, but it will set the default value for image alignment when you create new posts.', 'the-core'),
										'choices' => array(
											'fw-block-image-left' => array(
												'small' => array(
													'height' => 50,
													'src' => $the_core_template_directory . '/images/image-picker/left.jpg',
													'title' => __('Left', 'the-core')
												)
											),
											'' => array(
												'small' => array(
													'height' => 50,
													'src' => $the_core_template_directory . '/images/image-picker/full-width.jpg',
													'title' => __('Full', 'the-core')
												)
											),
											'fw-block-image-right' => array(
												'small' => array(
													'height' => 50,
													'src' => $the_core_template_directory . '/images/image-picker/right.jpg',
													'title' => __('Right', 'the-core')
												)
											),
										),
									),
									'ratio' => array(
										'type'    => 'short-select',
										'label'   => __( 'Image Ratio', 'the-core' ),
										'value'   => 'fw-ratio-16-9',
										'choices' => array(
											array( // optgroup
												'attr'    => array( 'label' => __( 'Original', 'the-core' ) ),
												'choices' => array(
													'fw-original-ratio' => __( 'Original Ratio', 'the-core' ),
												),
											),
											array( // optgroup
												'attr'    => array( 'label' => __( 'Landscape', 'the-core' ) ),
												'choices' => array(
													'fw-ratio-16-9' => __( '16-9', 'the-core' ),
													'fw-ratio-4-3'  => __( '4-3', 'the-core' ),
													'fw-ratio-2-1'  => __( '2-1', 'the-core' ),
												),
											),
											array( // optgroup
												'attr'    => array( 'label' => __( 'Portrait', 'the-core' ) ),
												'choices' => array(
													'fw-ratio-9-16' => __( '9-16', 'the-core' ),
													'fw-ratio-3-4'  => __( '3-4', 'the-core' ),
													'fw-ratio-1-2'  => __( '1-2', 'the-core' ),
												),
											),
											array( // optgroup
												'attr'    => array( 'label' => __( 'Square', 'the-core' ) ),
												'choices' => array(
													'fw-ratio-1' => __( '1-1', 'the-core' ),
												),
											),
										),
										'desc'    => __( 'Choose the featured image format', 'the-core' )
									),
									'rounded' => array(
										'type' => 'switch',
										'value' => '',
										'label' => __('Use Round Image', 'the-core'),
										'desc' => __('Set the default image roundness for new posts', 'the-core'),
										'help' => __('Your choice will not apply to posts that are already published, but it will set the default value for image roundness when you create new posts.', 'the-core'),
										'left-choice' => array(
											'value' => '',
											'label' => __('No', 'the-core'),
										),
										'right-choice' => array(
											'value' => 'fw-block-image-circle',
											'label' => __('Yes', 'the-core'),
										)
									),
									'featured_image' => array(
										'type' => 'switch',
										'value' => 'yes',
										'label' => __('Featured Image', 'the-core'),
										'desc' => __('Use featured image in single post?', 'the-core'),
										'left-choice' => array(
											'value' => 'no',
											'label' => __('No', 'the-core'),
										),
										'right-choice' => array(
											'value' => 'yes',
											'label' => __('Yes', 'the-core'),
										),
										'help' => __('Your choice will not apply to posts that are already published, but it will set the default value for featured image when you create new posts.', 'the-core'),
									),
									'add_image_border' => array(
										'type' => 'multi-picker',
										'label' => false,
										'desc' => false,
										'picker' => array(
											'selected' => array(
												'label' => __('Image Border', 'the-core'),
												'desc' => __('Add a border to your image', 'the-core'),
												'type' => 'switch',
												'right-choice' => array(
													'value' => 'fw-block-image-frame',
													'label' => __('Yes', 'the-core')
												),
												'left-choice' => array(
													'value' => '',
													'label' => __('No', 'the-core')
												),
												'value' => '',
											),
										),
										'choices' => array(
											'fw-block-image-frame' => array(
												'border_size' => array(
													'label' => '',
													'desc' => __('Size in pixels', 'the-core'),
													'type' => 'short-text',
													'value' => '',
												),
												'border_color' => array(
													'label' => '',
													'desc' => __('Select the border color', 'the-core'),
													'help' => __('The default color palette can be changed from the', 'the-core') . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __('Colors section', 'the-core') . '</a> ' . __('found in the Theme Settings page', 'the-core'),
													'value' => '',
													'choices' => $the_core_color_settings,
													'type' => 'color-palette'
												),
											),
										),
									),
									'post_date' => array(
										'label' => __('Post Date', 'the-core'),
										'desc' => __('Show post date?', 'the-core'),
										'type' => 'switch',
										'right-choice' => array(
											'value' => 'yes',
											'label' => __('Yes', 'the-core')
										),
										'left-choice' => array(
											'value' => 'no',
											'label' => __('No', 'the-core')
										),
										'value' => 'yes',
									),
									'post_author' => array(
										'label' => __('Post Author', 'the-core'),
										'desc' => __('Show post author?', 'the-core'),
										'type' => 'switch',
										'right-choice' => array(
											'value' => 'yes',
											'label' => __('Yes', 'the-core')
										),
										'left-choice' => array(
											'value' => 'no',
											'label' => __('No', 'the-core')
										),
										'value' => 'yes',
									),
									'post_categories' => array(
										'label' => __('Post Categories', 'the-core'),
										'desc' => __('Show post categories?', 'the-core'),
										'type' => 'switch',
										'right-choice' => array(
											'value' => 'yes',
											'label' => __('Yes', 'the-core')
										),
										'left-choice' => array(
											'value' => 'no',
											'label' => __('No', 'the-core')
										),
										'value' => 'yes',
									),
									'post_author_box' => array(
										'label' => __('Author Box', 'the-core'),
										'desc' => __('Show author box?', 'the-core'),
										'type' => 'switch',
										'right-choice' => array(
											'value' => 'yes',
											'label' => __('Yes', 'the-core')
										),
										'left-choice' => array(
											'value' => 'no',
											'label' => __('No', 'the-core')
										),
										'value' => 'no',
									),
									'post_navigation' => array(
										'label' => __('Post Navigation', 'the-core'),
										'desc' => __('Show post navigation?', 'the-core'),
										'type' => 'switch',
										'right-choice' => array(
											'value' => 'yes',
											'label' => __('Yes', 'the-core')
										),
										'left-choice' => array(
											'value' => 'no',
											'label' => __('No', 'the-core')
										),
										'value' => 'yes',
									),
									'related_articles' => array(
										'type' => 'multi-picker',
										'label' => false,
										'desc' => false,
										'picker' => array(
											'selected' => array(
												'label' => __('Related Articles', 'the-core'),
												'desc' => __('Show related articles?', 'the-core'),
												'type' => 'switch',
												'right-choice' => array(
													'value' => 'yes',
													'label' => __('Yes', 'the-core')
												),
												'left-choice' => array(
													'value' => 'no',
													'label' => __('No', 'the-core')
												),
												'value' => 'yes',
											),
										),
										'choices' => array(
											'yes' => array(
												'related_type' => array(
													'label' => '',
													'type' => 'image-picker',
													'value' => 'related-articles-1',
													'desc' => __('Select the related articles type', 'the-core'),
													'choices' => array(
														'related-articles-1' => array(
															'small' => array(
																'height' => 70,
																'src' => $the_core_template_directory . '/images/image-picker/related-articles-type-1.jpg',
															),
															'large' => array(
																'height' => 214,
																'src' => $the_core_template_directory . '/images/image-picker/related-articles-type-1.jpg',
															),
														),
														'related-articles-2' => array(
															'small' => array(
																'height' => 70,
																'src' => $the_core_template_directory . '/images/image-picker/related-articles-type-2.jpg',
															),
															'large' => array(
																'height' => 214,
																'src' => $the_core_template_directory . '/images/image-picker/related-articles-type-2.jpg',
															),
														),
													),
												),
											),
										),
									),
								)
							),
							'blog_pagination' => array(
								'label' => __('Pagination Type', 'the-core'),
								'type' => 'image-picker',
								'value' => 'paging-navigation-type-1',
								'desc' => __('Select the blog pagination type', 'the-core'),
								'choices' => array(
									'paging-navigation-type-1' => array(
										'small' => array(
											'height' => 61,
											'src'    => is_rtl() ? $the_core_template_directory . '/images/image-picker/blog-pagination-type-1-rtl.jpg' : $the_core_template_directory . '/images/image-picker/blog-pagination-type-1.jpg',
										),
										'large' => array(
											'height' => 122,
											'src'    => is_rtl() ? $the_core_template_directory . '/images/image-picker/blog-pagination-type-1-rtl.jpg' : $the_core_template_directory . '/images/image-picker/blog-pagination-type-1.jpg',
										),
									),
									'paging-navigation-type-2' => array(
										'small' => array(
											'height' => 61,
											'src'    => is_rtl() ? $the_core_template_directory . '/images/image-picker/blog-pagination-type-2-rtl.jpg' : $the_core_template_directory . '/images/image-picker/blog-pagination-type-2.jpg',
										),
										'large' => array(
											'height' => 122,
											'src'    => is_rtl() ? $the_core_template_directory . '/images/image-picker/blog-pagination-type-2-rtl.jpg' : $the_core_template_directory . '/images/image-picker/blog-pagination-type-2.jpg',
										),
									),
								),
							),
							'default_avatar' => array(
								'label' => __('Default Blog Avatar', 'the-core'),
								'desc' => __('Upload a default avatar', 'the-core'),
								'type' => 'upload'
							),
						)
					),
					'header-posts-box' => array(
						'title' => __('Single Posts Header', 'the-core'),
						'attr'  => array('class' => 'prevent-auto-close'),
						'type'  => 'box',
						'options' => array(
							'general_posts_header' => array(
								'type' => 'multi',
								'label' => false,
								'attr' => array(
									'class' => 'fw-option-type-multi-show-borders',
								),
								'inner-options' => array(
									'posts_header_height' => array(
										'label' => __('Header Height', 'the-core'),
										'desc' => __("Select the header height in pixels (Ex: 300)", "the-core"),
										'type' => 'radio-text',
										'value' => 'fw-section-height-md',
										'choices' => array(
											'auto' => __('auto', 'the-core'),
											'fw-section-height-sm' => __('small', 'the-core'),
											'fw-section-height-md' => __('medium', 'the-core'),
											'fw-section-height-lg' => __('large', 'the-core'),
										),
										'custom' => 'custom_width',
									),
									'posts_header_image' => array(
										'label' => __('Header Image', 'the-core'),
										'desc' => __('Upload a header image', 'the-core'),
										'help' => __("This default header image will be used for all your posts if you didn't set one for a specific post.", "the-core"),
										'type' => 'upload'
									),
									'posts_header_overlay_options' => array(
										'type' => 'multi-picker',
										'label' => false,
										'desc' => false,
										'picker' => array(
											'posts_header_overlay' => array(
												'type' => 'switch',
												'label' => __('Overlay Color', 'the-core'),
												'desc' => __('Enable image overlay color?', 'the-core'),
												'value' => 'no',
												'right-choice' => array(
													'value' => 'yes',
													'label' => __('Yes', 'the-core'),
												),
												'left-choice' => array(
													'value' => 'no',
													'label' => __('No', 'the-core'),
												),
											),
										),
										'choices' => array(
											'no' => array(),
											'yes' => array(
												'posts_header_overlay_color' => array(
													'label' => '',
													'desc' => __('Select the image overlay color', 'the-core'),
													'help' => __('The default color palette can be changed from the', 'the-core') . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __('Colors section', 'the-core') . '</a> ' . __('found in the Theme Settings page', 'the-core'),
													'value' => '',
													'choices' => $the_core_color_settings,
													'type' => 'color-palette'
												),
												'posts_header_overlay_opacity_image' => array(
													'type' => 'slider',
													'value' => 80,
													'properties' => array(
														'min' => 0,
														'max' => 100,
														'sep' => 1,
													),
													'label' => '',
													'desc' => __('Select the overlay color opacity in %', 'the-core'),
												)
											),
										),
									),
									'header_image_overlap' => array(
										'label' => __('Header Image Overlap', 'the-core'),
										'desc' => __('Select the header image overlap value in pixels (Ex: 100)', 'the-core'),
										'help' => __('The content that follows will overlap the header with the specified pixel amount.', 'the-core'),
										'type' => 'radio-text',
										'choices' => array(
											'' => __('none', 'the-core'),
											'fw-content-overlay-sm' => __('small', 'the-core'),
											'fw-content-overlay-md' => __('medium', 'the-core'),
											'fw-content-overlay-lg' => __('large', 'the-core'),
										),
										'custom' => 'custom_width',
										'value' => ''
									),
									'posts_header_title_group' => array(
										'type'    => 'group',
										'options' => array(
											'posts_header_title' => array(
												'type' => 'multi-picker',
												'label' => false,
												'desc' => false,
												'picker' => array(
													'posts_title' => array(
														'label' => __('Title', 'the-core'),
														'desc' => __('Select what title will be displayed in the posts header', 'the-core'),
														'help' => __('This title appears only on the post details pages and will be displayed if you have a header image set (in the post or here)', 'the-core'),
														'attr' => array('class' => 'fw-checkbox-float-left'),
														'type' => 'radio',
														'value' => 'category_title',
														'choices' => array(
															'post_title' => __('Post Title', 'the-core'),
															'category_title' => __('Category Title', 'the-core'),
															'custom_title' => __('Custom Title', 'the-core'),
														),
													),
												),
												'choices' => array(
													'post_title' => array(
														'header_title_typography' => array(
															'attr' => array('class' => 'fw-advanced-button'),
															'type' => 'popup',
															'label' => '',
															'desc' => __('Change the style / typography of the title', 'the-core'),
															'button' => __('Styling', 'the-core'),
															'size' => 'small',
															'popup-options' => array(
																'title' => array(
																	'label' => __('Title', 'the-core'),
																	'type' => 'tf-typography',
																	'value' => array(
																		'google_font' => $the_core_typography_settings['h1']['google_font'],
																		'subset' => $the_core_typography_settings['h1']['subset'],
																		'variation' => $the_core_typography_settings['h1']['variation'],
																		'family' => $the_core_typography_settings['h1']['family'],
																		'style' => $the_core_typography_settings['h1']['style'],
																		'weight' => $the_core_typography_settings['h1']['weight'],
																		'size' => $the_core_typography_settings['h1']['size'],
																		'line-height' => $the_core_typography_settings['h1']['line-height'],
																		'letter-spacing' => $the_core_typography_settings['h1']['letter-spacing'],
																		'color-palette' => '',
																	)
																),
															),
														),
													),
													'category_title' => array(
														'header_title_typography' => array(
															'attr' => array('class' => 'fw-advanced-button'),
															'type' => 'popup',
															'label' => '',
															'desc' => __('Change the style / typography of the title', 'the-core'),
															'button' => __('Styling', 'the-core'),
															'size' => 'small',
															'popup-options' => array(
																'title' => array(
																	'label' => __('Title', 'the-core'),
																	'type' => 'tf-typography',
																	'value' => array(
																		'google_font' => $the_core_typography_settings['h1']['google_font'],
																		'subset' => $the_core_typography_settings['h1']['subset'],
																		'variation' => $the_core_typography_settings['h1']['variation'],
																		'family' => $the_core_typography_settings['h1']['family'],
																		'style' => $the_core_typography_settings['h1']['style'],
																		'weight' => $the_core_typography_settings['h1']['weight'],
																		'size' => $the_core_typography_settings['h1']['size'],
																		'line-height' => $the_core_typography_settings['h1']['line-height'],
																		'letter-spacing' => $the_core_typography_settings['h1']['letter-spacing'],
																		'color-palette' => '',
																	)
																),
															),
														),
														'header_subtitle_typography' => array(
															'attr' => array('class' => 'fw-advanced-button'),
															'type' => 'popup',
															'label' => __('Description', 'the-core'),
															'desc' => __('Change the style / typography of the description', 'the-core'),
															'button' => __('Styling', 'the-core'),
															'size' => 'small',
															'popup-options' => array(
																'subtitle' => array(
																	'label' => __('Description', 'the-core'),
																	'type' => 'tf-typography',
																	'value' => array(
																		'google_font' => $the_core_typography_settings['subtitles']['google_font'],
																		'subset' => $the_core_typography_settings['subtitles']['subset'],
																		'variation' => $the_core_typography_settings['subtitles']['variation'],
																		'family' => $the_core_typography_settings['subtitles']['family'],
																		'style' => $the_core_typography_settings['subtitles']['style'],
																		'weight' => $the_core_typography_settings['subtitles']['weight'],
																		'size' => $the_core_typography_settings['subtitles']['size'],
																		'line-height' => $the_core_typography_settings['subtitles']['line-height'],
																		'letter-spacing' => $the_core_typography_settings['subtitles']['letter-spacing'],
																		'color-palette' => '',
																	)
																),
															),
														),
													),
													'custom_title' => array(
														'header_title_typography' => array(
															'attr' => array(
																'data-advanced-for' => 'header_title_advanced_styling',
																'class' => 'fw-advanced-button'
															),
															'type' => 'popup',
															'label' => __('Custom Style', 'the-core'),
															'button' => __('Styling', 'the-core'),
															'size' => 'small',
															'popup-options' => array(
																'title' => array(
																	'label' => __('Title', 'the-core'),
																	'type' => 'tf-typography',
																	'value' => array(
																		'google_font' => $the_core_typography_settings['h1']['google_font'],
																		'subset' => $the_core_typography_settings['h1']['subset'],
																		'variation' => $the_core_typography_settings['h1']['variation'],
																		'family' => $the_core_typography_settings['h1']['family'],
																		'style' => $the_core_typography_settings['h1']['style'],
																		'weight' => $the_core_typography_settings['h1']['weight'],
																		'size' => $the_core_typography_settings['h1']['size'],
																		'line-height' => $the_core_typography_settings['h1']['line-height'],
																		'letter-spacing' => $the_core_typography_settings['h1']['letter-spacing'],
																		'color-palette' => '',
																	)
																),
															),
														),
														'custom_title_text' => array(
															'attr' => array('class' => 'header_title_advanced_styling'),
															'label' => __('Custom Title', 'the-core'),
															'desc' => __('Enter a custom title', 'the-core'),
															'help' => __('This title appears on the post detail pages only and will be displayed in all the headers. Choose something general that will fit all the posts. (Ex: Blog)', 'the-core'),
															'type' => 'text',
														),
														'header_subtitle_typography' => array(
															'attr' => array(
																'data-advanced-for' => 'header_subtitle_advanced_styling',
																'class' => 'fw-advanced-button'
															),
															'type' => 'popup',
															'label' => __('Custom Style', 'the-core'),
															'button' => __('Styling', 'the-core'),
															'size' => 'small',
															'popup-options' => array(
																'subtitle' => array(
																	'label' => __('Description', 'the-core'),
																	'type' => 'tf-typography',
																	'value' => array(
																		'google_font' => $the_core_typography_settings['subtitles']['google_font'],
																		'subset' => $the_core_typography_settings['subtitles']['subset'],
																		'variation' => $the_core_typography_settings['subtitles']['variation'],
																		'family' => $the_core_typography_settings['subtitles']['family'],
																		'style' => $the_core_typography_settings['subtitles']['style'],
																		'weight' => $the_core_typography_settings['subtitles']['weight'],
																		'size' => $the_core_typography_settings['subtitles']['size'],
																		'line-height' => $the_core_typography_settings['subtitles']['line-height'],
																		'letter-spacing' => $the_core_typography_settings['subtitles']['letter-spacing'],
																		'color-palette' => '',
																	)
																),
															),
														),
														'custom_subtitle_text' => array(
															'attr' => array('class' => 'header_subtitle_advanced_styling'),
															'label' => __('Custom Description', 'the-core'),
															'desc' => __('Enter a custom description', 'the-core'),
															'help' => __('The description is displayed as a subtitle', 'the-core'),
															'type' => 'text',
														),
													),
												),
											),
											'post_title_alignment' => array(
												'label' => __('Alignment', 'the-core'),
												'desc' => __('Choose the title and description alignment', 'the-core'),
												'type' => 'image-picker',
												'value' => 'fw-heading-center',
												'choices' => array(
													'fw-heading-left' => array(
														'small' => array(
															'height' => 50,
															'src' => $the_core_template_directory . '/images/image-picker/left-position.jpg',
															'title' => __('Left', 'the-core')
														),
													),
													'fw-heading-center' => array(
														'small' => array(
															'height' => 50,
															'src' => $the_core_template_directory . '/images/image-picker/center-position.jpg',
															'title' => __('Center', 'the-core')
														),
													),
													'fw-heading-right' => array(
														'small' => array(
															'height' => 50,
															'src' => $the_core_template_directory . '/images/image-picker/right-position.jpg',
															'title' => __('Right', 'the-core')
														),
													),
												),
											),
										)
									),
									'posts_header_content_position' => array(
										'label' => __('Content Position', 'the-core'),
										'desc' => __("Adjust the content vertical position in pixels (Ex: -20 or 20)", "the-core"),
										'help' => __("Let's you fine tune the header content position on the vertical axis. Input a negative value if you want your content to go up or a positive value if you want your content to go down.", "the-core"),
										'type' => 'short-text',
										'value' => '',
									),
								)
							)
						)
					),
					$the_core_homepage_header_tab,
				)
			),
			$the_core_portfolio_tab,
			$the_core_events_tab,
			$the_core_learning_tab,
			$the_core_products_tab,
			$the_core_bbpress_tab,
			$the_core_buddypress_tab,
			$the_core_llms_tab,
		)
	),
	'pages' => array(
		'title' => __('Pages', 'the-core'),
		'type' => 'tab',
		'options' => array(
			'header-page-box' => array(
				'title' => __('Pages Header', 'the-core'),
				'type' => 'box',
				'options' => array(
					'general_page_header' => array(
						'type' => 'multi',
						'label' => false,
						'attr' => array(
							'class' => 'fw-option-type-multi-show-borders',
						),
						'inner-options' => array(
							'posts_header_height' => array(
								'label' => __('Header Height', 'the-core'),
								'desc' => __("Select the header height in pixels (Ex: 300)", "the-core"),
								'type' => 'radio-text',
								'value' => 'fw-section-height-md',
								'choices' => array(
									'auto' => __('auto', 'the-core'),
									'fw-section-height-sm' => __('small', 'the-core'),
									'fw-section-height-md' => __('medium', 'the-core'),
									'fw-section-height-lg' => __('large', 'the-core'),
								),
								'custom' => 'custom_width',
							),
							'posts_header_image' => array(
								'label' => __('Header Image', 'the-core'),
								'desc' => __('Upload a header image', 'the-core'),
								'help' => __("This default header image will be used for all your pages if you didn't set one for a specific page (works only for pages that use Default Template and not the ones created with the Visual Builder).", "the-core"),
								'type' => 'upload'
							),
							'posts_header_overlay_options' => array(
								'type' => 'multi-picker',
								'label' => false,
								'desc' => false,
								'picker' => array(
									'posts_header_overlay' => array(
										'type' => 'switch',
										'label' => __('Overlay Color', 'the-core'),
										'desc' => __('Enable image overlay color?', 'the-core'),
										'value' => 'no',
										'right-choice' => array(
											'value' => 'yes',
											'label' => __('Yes', 'the-core'),
										),
										'left-choice' => array(
											'value' => 'no',
											'label' => __('No', 'the-core'),
										),
									),
								),
								'choices' => array(
									'no' => array(),
									'yes' => array(
										'posts_header_overlay_color' => array(
											'label' => '',
											'desc' => __('Select the image overlay color', 'the-core'),
											'help' => __('The default color palette can be changed from the', 'the-core') . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __('Colors section', 'the-core') . '</a> ' . __('found in the Theme Settings page', 'the-core'),
											'value' => '',
											'choices' => $the_core_color_settings,
											'type' => 'color-palette'
										),
										'posts_header_overlay_opacity_image' => array(
											'type' => 'slider',
											'value' => 80,
											'properties' => array(
												'min' => 0,
												'max' => 100,
												'sep' => 1,
											),
											'label' => '',
											'desc' => __('Select the overlay color opacity in %', 'the-core'),
										)
									),
								),
							),
							'header_image_overlap' => array(
								'label' => __('Header Image Overlap', 'the-core'),
								'desc' => __('Select the header image overlap value in pixels (Ex: 100)', 'the-core'),
								'help' => __('The content that follows will overlap the header with the specified pixel amount.', 'the-core'),
								'type' => 'radio-text',
								'choices' => array(
									'' => __('none', 'the-core'),
									'fw-content-overlay-sm' => __('small', 'the-core'),
									'fw-content-overlay-md' => __('medium', 'the-core'),
									'fw-content-overlay-lg' => __('large', 'the-core'),
								),
								'custom' => 'custom_width',
								'value' => ''
							),
							'header_title_typography' => array(
								'attr' => array('class' => 'fw-advanced-button'),
								'type' => 'popup',
								'label' => __('Title', 'the-core'),
								'desc' => __('Change the style / typography of the title', 'the-core'),
								'button' => __('Styling', 'the-core'),
								'size' => 'small',
								'popup-options' => array(
									'title' => array(
										'label' => __('Title', 'the-core'),
										'type' => 'tf-typography',
										'value' => array(
											'google_font' => $the_core_typography_settings['h1']['google_font'],
											'subset' => $the_core_typography_settings['h1']['subset'],
											'variation' => $the_core_typography_settings['h1']['variation'],
											'family' => $the_core_typography_settings['h1']['family'],
											'style' => $the_core_typography_settings['h1']['style'],
											'weight' => $the_core_typography_settings['h1']['weight'],
											'size' => $the_core_typography_settings['h1']['size'],
											'line-height' => $the_core_typography_settings['h1']['line-height'],
											'letter-spacing' => $the_core_typography_settings['h1']['letter-spacing'],
											'color-palette' => '',
										)
									),
								),
							),
							'post_title_alignment' => array(
								'label' => __('Alignment', 'the-core'),
								'desc' => __('Choose the title and description alignment', 'the-core'),
								'type' => 'image-picker',
								'value' => 'fw-heading-center',
								'choices' => array(
									'fw-heading-left' => array(
										'small' => array(
											'height' => 50,
											'src' => $the_core_template_directory . '/images/image-picker/left-position.jpg',
											'title' => __('Left', 'the-core')
										),
									),
									'fw-heading-center' => array(
										'small' => array(
											'height' => 50,
											'src' => $the_core_template_directory . '/images/image-picker/center-position.jpg',
											'title' => __('Center', 'the-core')
										),
									),
									'fw-heading-right' => array(
										'small' => array(
											'height' => 50,
											'src' => $the_core_template_directory . '/images/image-picker/right-position.jpg',
											'title' => __('Right', 'the-core')
										),
									),
								),
							),
							'posts_header_content_position' => array(
								'label' => __('Content Position', 'the-core'),
								'desc' => __("Adjust the content vertical position in pixels (Ex: -20 or 20)", "the-core"),
								'help' => __("Let's you fine tune the header content position on the vertical axis. Input a negative value if you want your content to go up or a positive value if you want your content to go down.", "the-core"),
								'type' => 'short-text',
								'value' => '',
							),
							'default_pages_info' => array(
								'label' => false,
								'desc' => '<i class="fw-info-symbol dashicons dashicons-info"></i>' . esc_html__('These options apply only to pages created with the default template (default WordPress pages) and not with the Visual Builder', 'the-core'),
								'type' => 'html',
								'html' => '',
							),
						)
					)
				)
			),
		)
	),
	'header' => array(
		'title' => __('Header', 'the-core'),
		'type' => 'tab',
		'options' => array(
			'header-box' => array(
				'title' => __('Header', 'the-core'),
				'type' => 'box',
				'options' => array(
					'logo_settings' => array(
						'type' => 'multi',
						'label' => false,
						'attr' => array(
							'class' => 'fw-option-type-multi-show-borders',
						),
						'inner-options' => array(
							'logo' => array(
								'type' => 'multi-picker',
								'label' => false,
								'desc' => false,
								'picker' => array(
									'selected_value' => array(
										'label' => __('Logo Type', 'the-core'),
										'desc' => __('Select the logo type', 'the-core'),
										'attr' => array('class' => 'fw-checkbox-float-left'),
										'value' => 'text',
										'type' => 'radio',
										'choices' => array(
											'text' => __('Text', 'the-core'),
											'image' => __('Image', 'the-core'),
										),
									)
								),
								'choices' => array(
									'text' => array(
										'title' => array(
											'label' => __('Title', 'the-core'),
											'desc' => __('Enter the title', 'the-core'),
											'type' => 'short-text',
											'value' => get_bloginfo('name')
										),
										'logo_title_font' => array(
											'label' => '',
											'desc' => __('Choose the title font', 'the-core'),
											'type' => 'tf-typography',
											'value' => array(
												'family' => 'Playfair Display',
												'size' => 20,
												'line-height' => 30,
												'style' => '400',
												'letter-spacing' => 1,
											)
										),
										'subtitle' => array(
											'label' => __('Subtitle', 'the-core'),
											'desc' => __('Enter the subtitle', 'the-core'),
											'type' => 'short-text',
											'value' => '',
										),
										'logo_subtitle_font' => array(
											'label' => '',
											'desc' => __('Choose the subtitle font', 'the-core'),
											'type' => 'tf-typography',
											'value' => array(
												'family' => 'Playfair Display',
												'size' => 10,
												'line-height' => 10,
												'style' => '400',
												'letter-spacing' => 1,
											)
										),
									),
									'image' => array(
										'image_logo' => array(
											'label' => '',
											'desc' => __('Upload logo image', 'the-core'),
											'type' => 'upload'
										),
										'retina_logo' => array(
											'type' => 'switch',
											'label' => '',
											'desc' => __('Use logo as retina?', 'the-core'),
											'left-choice' => array(
												'value' => 'fw-logo-no-retina',
												'label' => __('No', 'the-core'),
											),
											'right-choice' => array(
												'value' => 'fw-logo-retina',
												'label' => __('Yes', 'the-core'),
											),
											'value' => 'fw-logo-no-retina'
										),
									),
								),
								'show_borders' => false,
							),
						),
					),
					'header_settings' => array(
						'type' => 'multi',
						'label' => false,
						'attr' => array(
							'class' => 'fw-option-type-multi-show-borders',
						),
						'inner-options' => array(
							'header_group' => array(
								'type' => 'group',
								'options' => array(
									'header_type_picker' => array(
										'type' => 'multi-picker',
										'label' => false,
										'desc' => false,
										'picker' => array(
											'header_type' => array(
												'label' => __('Header Type', 'the-core'),
												'type' => 'image-picker',
												'value' => 'header-1',
												'desc' => __('Select the prefered header type', 'the-core'),
												'choices' => array(
													'header-1' => array(
														'small' => array(
															'height' => 75,
															'src'    => is_rtl() ? $the_core_template_directory . '/images/image-picker/header-type1-rtl.jpg' : $the_core_template_directory . '/images/image-picker/header-type1.jpg'
														),
														'large' => array(
															'height' => 214,
															'src'    => is_rtl() ? $the_core_template_directory . '/images/image-picker/header-type1-rtl.jpg' : $the_core_template_directory . '/images/image-picker/header-type1.jpg'
														),
													),
													'header-2' => array(
														'small' => array(
															'height' => 75,
															'src'    => is_rtl() ? $the_core_template_directory . '/images/image-picker/header-type2-rtl.jpg' : $the_core_template_directory . '/images/image-picker/header-type2.jpg'
														),
														'large' => array(
															'height' => 214,
															'src'    => is_rtl() ? $the_core_template_directory . '/images/image-picker/header-type2-rtl.jpg' : $the_core_template_directory . '/images/image-picker/header-type2.jpg'
														),
													),
													'header-3' => array(
														'small' => array(
															'height' => 75,
															'src'    => is_rtl() ? $the_core_template_directory . '/images/image-picker/header-type3-rtl.jpg' : $the_core_template_directory . '/images/image-picker/header-type3.jpg'
														),
														'large' => array(
															'height' => 214,
															'src'    => is_rtl() ? $the_core_template_directory . '/images/image-picker/header-type3-rtl.jpg' : $the_core_template_directory . '/images/image-picker/header-type3.jpg'
														),
													),
													'header-4' => array(
														'small' => array(
															'height' => 75,
															'src'    => is_rtl() ? $the_core_template_directory . '/images/image-picker/header-type4-rtl.jpg' : $the_core_template_directory . '/images/image-picker/header-type4.jpg'
														),
														'large' => array(
															'height' => 214,
															'src'    => is_rtl() ? $the_core_template_directory . '/images/image-picker/header-type4-rtl.jpg' : $the_core_template_directory . '/images/image-picker/header-type4.jpg'
														),
													),
													'header-5' => array(
														'small' => array(
															'height' => 75,
															'src'    => is_rtl() ? $the_core_template_directory . '/images/image-picker/header-type5-rtl.jpg' : $the_core_template_directory . '/images/image-picker/header-type5.jpg'
														),
														'large' => array(
															'height' => 214,
															'src'    => is_rtl() ? $the_core_template_directory . '/images/image-picker/header-type5-rtl.jpg' : $the_core_template_directory . '/images/image-picker/header-type5.jpg'
														),
													),
													'header-6' => array(
														'small' => array(
															'height' => 75,
															'src'    => is_rtl() ? $the_core_template_directory . '/images/image-picker/header-type6-rtl.jpg' : $the_core_template_directory . '/images/image-picker/header-type6.jpg'
														),
														'large' => array(
															'height' => 214,
															'src'    => is_rtl() ? $the_core_template_directory . '/images/image-picker/header-type6-rtl.jpg' : $the_core_template_directory . '/images/image-picker/header-type6.jpg'
														),
													),
												),
											),
										),
										'choices' => array(
											'header-1' => array(
												'logo_align' => array(
													'label' => __('Logo Position', 'the-core'),
													'desc' => __('Select your prefered logo position', 'the-core'),
													'type' => 'switch',
													'right-choice' => array(
														'value' => 'fw-top-logo-right',
														'label' => __('Right', 'the-core')
													),
													'left-choice' => array(
														'value' => 'fw-top-logo-left',
														'label' => __('Left', 'the-core')
													),
													'value' => 'fw-top-logo-left',
												)
											),
											'header-4' => array(
												'header_text' => array(
													'type' => 'text',
													'value' => '',
													'label' => __('Header Text', 'the-core'),
													'desc' => __('Is located above the search and usually used for an email or phone no', 'the-core'),
												)
											),
											'header-5' => array(
												'header_5_popup' => array(
													'attr' => array('class' => 'fw-advanced-button'),
													'type' => 'popup',
													'label' => '',
													'desc' => __('Change the overlay menu styling', 'the-core'),
													'button' => __('Overlay Menu Styling', 'the-core'),
													'size' => 'small',
													'popup-options' => array(
														'menu_alignment' => array(
															'label' => __('Overlay Menu Alignment', 'the-core'),
															'desc' => __('Choose the menu alignment', 'the-core'),
															'type' => 'image-picker',
															'value' => is_rtl() ? 'header-align-right' : 'header-align-left',
															'choices' => array(
																'header-align-left' => array(
																	'small' => array(
																		'height' => 50,
																		'src' => $the_core_template_directory . '/images/image-picker/left-position.jpg',
																		'title' => __('Left', 'the-core')
																	),
																),
																'header-align-center' => array(
																	'small' => array(
																		'height' => 50,
																		'src' => $the_core_template_directory . '/images/image-picker/center-position.jpg',
																		'title' => __('Center', 'the-core')
																	),
																),
																'header-align-right' => array(
																	'small' => array(
																		'height' => 50,
																		'src' => $the_core_template_directory . '/images/image-picker/right-position.jpg',
																		'title' => __('Right', 'the-core')
																	),
																),
															),
														),
														'menu_appear_position' => array(
															'label' => __('Overlay Menu Entrance', 'the-core'),
															'desc' => __('Select the overlay menu entrance', 'the-core'),
															'type' => 'select',
															'value' => 'left',
															'choices' => array(
																'left' => __('Slide from Left', 'the-core'),
																'right' => __('Slide from Right', 'the-core'),
																'top' => __('Slide from Top', 'the-core'),
																'bottom' => __('Slide from Bottom', 'the-core'),
																'fadeIn' => __('Fade in', 'the-core'),
															),
														),
														'effect_panels' => array(
															'label' => __('Menu Panels Animation', 'the-core'),
															'desc' => __('Select the menu panels animation', 'the-core'),
															'help' => __('This option applies only to menus that contain secondary level items (aka dropdown items)', 'the-core'),
															'type' => 'short-select',
															'value' => 'mm-effect-panels-left-right',
															'choices' => array(
																'mm-effect-panels-left-right' => __('Slide', 'the-core'),
																'effect-panels-zoom' => __('Zoom', 'the-core'),
																'effect-panels-fadeIn' => __('Fade In', 'the-core'),
															),
														),
														'background_options' => array(
															'type' => 'multi-picker',
															'label' => false,
															'desc' => false,
															'picker' => array(
																'background' => array(
																	'label' => __('Background', 'the-core'),
																	'attr' => array('class' => 'fw-checkbox-float-left'),
																	'type' => 'radio',
																	'choices' => array(
																		'color' => __('Color', 'the-core'),
																		'image' => __('Image', 'the-core'),
																		'video' => __('Video', 'the-core'),
																	),
																	'value' => 'color'
																),
															),
															'choices' => array(
																'color' => array(
																	'background_color' => array(
																		'label' => '',
																		'help' => __('The default color palette can be changed from the', 'the-core') . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __('Colors section', 'the-core') . '</a> ' . __('found in the Theme Settings page', 'the-core'),
																		'desc' => __('Select the background color', 'the-core'),
																		'value' => '',
																		'choices' => $the_core_color_settings,
																		'type' => 'color-palette'
																	),
																),
																'image' => array(
																	'background_image' => array(
																		'label' => '',
																		'type' => 'background-image',
																		'choices' => array(//	in future may will set predefined images
																		)
																	),
																	'background_color' => array(
																		'label' => '',
																		'help' => __('The default color palette can be changed from the', 'the-core') . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __('Colors section', 'the-core') . '</a> ' . __('found in the Theme Settings page', 'the-core'),
																		'desc' => __('Select the background color', 'the-core'),
																		'value' => '',
																		'choices' => $the_core_color_settings,
																		'type' => 'color-palette'
																	),
																	'repeat' => array(
																		'label' => '',
																		'desc' => __('Select how will the background repeat', 'the-core'),
																		'type' => 'short-select',
																		'attr' => array('class' => 'fw-checkbox-float-left'),
																		'value' => 'no-repeat',
																		'choices' => array(
																			'no-repeat' => __('No-Repeat', 'the-core'),
																			'repeat' => __('Repeat', 'the-core'),
																			'repeat-x' => __('Repeat-X', 'the-core'),
																			'repeat-y' => __('Repeat-Y', 'the-core'),
																		)
																	),
																	'bg_position_x' => array(
																		'label' => __('Position', 'the-core'),
																		'desc' => __('Select the horizontal background position', 'the-core'),
																		'type' => 'short-select',
																		'attr' => array('class' => 'fw-checkbox-float-left'),
																		'value' => '',
																		'choices' => array(
																			'left' => __('Left', 'the-core'),
																			'center' => __('Center', 'the-core'),
																			'right' => __('Right', 'the-core'),
																		)
																	),
																	'bg_position_y' => array(
																		'label' => '',
																		'desc' => __('Select the vertical background position', 'the-core'),
																		'type' => 'short-select',
																		'attr' => array('class' => 'fw-checkbox-float-left'),
																		'value' => '',
																		'choices' => array(
																			'top' => __('Top', 'the-core'),
																			'center' => __('Center', 'the-core'),
																			'bottom' => __('Bottom', 'the-core'),
																		)
																	),
																	'bg_size' => array(
																		'label' => __('Size', 'the-core'),
																		'desc' => __('Select the background size', 'the-core'),
																		'help' => __('<strong>Auto</strong> - Default value, the background image has the original width and height.<br><br><strong>Cover</strong> - Scale the background image so that the background area is completely covered by the image.<br><br><strong>Contain</strong> - Scale the image to the largest size such that both its width and height can fit inside the content area.', 'the-core'),
																		'type' => 'short-select',
																		'attr' => array('class' => 'fw-checkbox-float-left'),
																		'value' => '',
																		'choices' => array(
																			'auto' => __('Auto', 'the-core'),
																			'cover' => __('Cover', 'the-core'),
																			'contain' => __('Contain', 'the-core'),
																		)
																	),
																	'overlay_options' => array(
																		'type' => 'multi-picker',
																		'label' => false,
																		'desc' => false,
																		'picker' => array(
																			'overlay' => array(
																				'type' => 'switch',
																				'label' => __('Overlay Color', 'the-core'),
																				'desc' => __('Enable image overlay color?', 'the-core'),
																				'value' => 'no',
																				'right-choice' => array(
																					'value' => 'yes',
																					'label' => __('Yes', 'the-core'),
																				),
																				'left-choice' => array(
																					'value' => 'no',
																					'label' => __('No', 'the-core'),
																				),
																			),
																		),
																		'choices' => array(
																			'no' => array(),
																			'yes' => array(
																				'background' => array(
																					'label' => '',
																					'help' => __('The default color palette can be changed from the', 'the-core') . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __('Colors section', 'the-core') . '</a> ' . __('found in the Theme Settings page', 'the-core'),
																					'desc' => __('Select the overlay color', 'the-core'),
																					'value' => '',
																					'choices' => $the_core_color_settings,
																					'type' => 'color-palette'
																				),
																				'overlay_opacity_image' => array(
																					'type' => 'short-slider',
																					'value' => 80,
																					'properties' => array(
																						'min' => 0,
																						'max' => 100,
																						'sep' => 1,
																					),
																					'label' => '',
																					'desc' => __('Select the overlay color opacity in %', 'the-core'),
																				)
																			),
																		),
																	),
																),
																'video' => array(
																	'video_type'      => array(
																		'type'         => 'multi-picker',
																		'label'        => false,
																		'desc'         => false,
																		'attr'         => array( 'class' => 'fw-video-background-image' ),
																		'picker'       => array(
																			'selected' => array(
																				'label'   => __( 'Video Type', 'the-core' ),
																				'desc'    => __( 'Select the video type', 'the-core' ),
																				'attr'    => array( 'class' => 'fw-checkbox-float-left' ),
																				'type'    => 'radio',
																				'choices' => array(
																					'youtube'  => __( 'Youtube', 'the-core' ),
																					'uploaded' => __( 'Upload', 'the-core' ),
																				),
																				'value'   => 'youtube'
																			),
																		),
																		'choices'      => array(
																			'youtube'  => array(
																				'video' => array(
																					'label' => __( '', 'the-core' ),
																					'desc'  => __( 'Insert a YouTube video URL', 'the-core' ),
																					'type'  => 'text',
																				),
																			),
																			'uploaded' => array(
																				'video' => array(
																					'label'       => __( '', 'the-core' ),
																					'desc'        => __( 'Upload a video', 'the-core' ),
																					'images_only' => false,
																					'type'        => 'upload',
																				),
																			),
																		),
																		'show_borders' => false,
																	),
																	'poster' => array(
																		'label'   => __( 'Replacement Image', 'the-core' ),
																		'type'    => 'background-image',
																		'help'    => __('This image will replace the video on mobile devices that disable background videos', 'the-core'),
																		'choices' => array(//	in future may will set predefined images
																		)
																	),
																	'loop_video' => array(
																		'label' => __('Loop Video', 'the-core'),
																		'desc' => __('Enable video loop?', 'the-core'),
																		'type' => 'switch',
																		'right-choice' => array(
																			'value' => 'yes',
																			'label' => __('Yes', 'the-core')
																		),
																		'left-choice' => array(
																			'value' => 'no',
																			'label' => __('No', 'the-core')
																		),
																		'value' => 'yes',
																	),
																	'overlay_options' => array(
																		'type'    => 'multi-picker',
																		'label'   => false,
																		'desc'    => false,
																		'picker'  => array(
																			'overlay' => array(
																				'type'         => 'switch',
																				'label'        => __( 'Overlay Color', 'the-core' ),
																				'desc'         => __( 'Enable video overlay color?', 'the-core' ),
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
																				'overlay_opacity_video' => array(
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
															)
														)
													)
												),
												'logo_align' => array(
													'label' => __('Logo Position', 'the-core'),
													'desc' => __('Select your prefered logo position', 'the-core'),
													'type' => 'switch',
													'right-choice' => array(
														'value' => 'fw-top-logo-right',
														'label' => __('Right', 'the-core')
													),
													'left-choice' => array(
														'value' => 'fw-top-logo-left',
														'label' => __('Left', 'the-core')
													),
													'value' => 'fw-top-logo-left',
												),
												'menu_icon_size' => array(
													'label' => __('Menu Icon Size', 'the-core'),
													'desc' => __('Select the menu icon size', 'the-core'),
													'value' => '20',
													'type' => 'short-text'
												),
												'menu_icon_color' => array(
													'label' => '',
													'desc' => __('Select the menu icon color', 'the-core'),
													'value' => '',
													'choices' => $the_core_color_settings,
													'type' => 'color-palette'
												),
												'menu_icon_hover_color' => array(
													'label' => '',
													'desc' => __('Select the menu icon hover color', 'the-core'),
													'value' => '',
													'choices' => $the_core_color_settings,
													'type' => 'color-palette'
												),
											),
											'header-6' => array(
												'header_6_popup' => array(
													'attr' => array('class' => 'fw-advanced-button'),
													'type' => 'popup',
													'label' => '',
													'desc' => __('Change the menu tray styling', 'the-core'),
													'button' => __('Menu Tray Styling', 'the-core'),
													'size' => 'small',
													'popup-options' => array(
														'menu_items_alignment' => array(
															'label' => __('Menu Items Alignment', 'the-core'),
															'desc' => __('Choose the menu items alignment', 'the-core'),
															'type' => 'image-picker',
															'value' => is_rtl() ? 'header-item-align-right' : 'header-item-align-left',
															'choices' => array(
																'header-item-align-left' => array(
																	'small' => array(
																		'height' => 50,
																		'src' => $the_core_template_directory . '/images/image-picker/left-position.jpg',
																		'title' => __('Left', 'the-core')
																	),
																),
																'header-item-align-center' => array(
																	'small' => array(
																		'height' => 50,
																		'src' => $the_core_template_directory . '/images/image-picker/center-position.jpg',
																		'title' => __('Center', 'the-core')
																	),
																),
																'header-item-align-right' => array(
																	'small' => array(
																		'height' => 50,
																		'src' => $the_core_template_directory . '/images/image-picker/right-position.jpg',
																		'title' => __('Right', 'the-core')
																	),
																),
															),
														),
														'effect_panels' => array(
															'label' => __('Menu Panels Animation', 'the-core'),
															'desc' => __('Select the menu panels animation', 'the-core'),
															'help' => __('This option applies only to menus that contain secondary level items (aka dropdown items)', 'the-core'),
															'type' => 'short-select',
															'value' => 'mm-effect-panels-left-right',
															'choices' => array(
																'mm-effect-panels-left-right' => __('Slide', 'the-core'),
																'effect-panels-zoom' => __('Zoom', 'the-core'),
																'effect-panels-fadeIn' => __('Fade In', 'the-core'),
															),
														),
														'background_options' => array(
															'type' => 'multi-picker',
															'label' => false,
															'desc' => false,
															'picker' => array(
																'background' => array(
																	'label' => __('Background', 'the-core'),
																	'attr' => array('class' => 'fw-checkbox-float-left'),
																	'type' => 'radio',
																	'choices' => array(
																		'color' => __('Color', 'the-core'),
																		'image' => __('Image', 'the-core'),
																	),
																	'value' => 'color'
																),
															),
															'choices' => array(
																'color' => array(
																	'background_color' => array(
																		'label' => '',
																		'help' => __('The default color palette can be changed from the', 'the-core') . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __('Colors section', 'the-core') . '</a> ' . __('found in the Theme Settings page', 'the-core'),
																		'desc' => __('Select the background color', 'the-core'),
																		'value' => '',
																		'choices' => $the_core_color_settings,
																		'type' => 'color-palette'
																	),
																),
																'image' => array(
																	'background_image' => array(
																		'label' => '',
																		'type' => 'background-image',
																		'choices' => array(//	in future may will set predefined images
																		)
																	),
																	'background_color' => array(
																		'label' => '',
																		'help' => __('The default color palette can be changed from the', 'the-core') . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __('Colors section', 'the-core') . '</a> ' . __('found in the Theme Settings page', 'the-core'),
																		'desc' => __('Select the background color', 'the-core'),
																		'value' => '',
																		'choices' => $the_core_color_settings,
																		'type' => 'color-palette'
																	),
																	'repeat' => array(
																		'label' => '',
																		'desc' => __('Select how will the background repeat', 'the-core'),
																		'type' => 'short-select',
																		'attr' => array('class' => 'fw-checkbox-float-left'),
																		'value' => 'no-repeat',
																		'choices' => array(
																			'no-repeat' => __('No-Repeat', 'the-core'),
																			'repeat' => __('Repeat', 'the-core'),
																			'repeat-x' => __('Repeat-X', 'the-core'),
																			'repeat-y' => __('Repeat-Y', 'the-core'),
																		)
																	),
																	'bg_position_x' => array(
																		'label' => __('Position', 'the-core'),
																		'desc' => __('Select the horizontal background position', 'the-core'),
																		'type' => 'short-select',
																		'attr' => array('class' => 'fw-checkbox-float-left'),
																		'value' => '',
																		'choices' => array(
																			'left' => __('Left', 'the-core'),
																			'center' => __('Center', 'the-core'),
																			'right' => __('Right', 'the-core'),
																		)
																	),
																	'bg_position_y' => array(
																		'label' => '',
																		'desc' => __('Select the vertical background position', 'the-core'),
																		'type' => 'short-select',
																		'attr' => array('class' => 'fw-checkbox-float-left'),
																		'value' => '',
																		'choices' => array(
																			'top' => __('Top', 'the-core'),
																			'center' => __('Center', 'the-core'),
																			'bottom' => __('Bottom', 'the-core'),
																		)
																	),
																	'bg_size' => array(
																		'label' => __('Size', 'the-core'),
																		'desc' => __('Select the background size', 'the-core'),
																		'help' => __('<strong>Auto</strong> - Default value, the background image has the original width and height.<br><br><strong>Cover</strong> - Scale the background image so that the background area is completely covered by the image.<br><br><strong>Contain</strong> - Scale the image to the largest size such that both its width and height can fit inside the content area.', 'the-core'),
																		'type' => 'short-select',
																		'attr' => array('class' => 'fw-checkbox-float-left'),
																		'value' => '',
																		'choices' => array(
																			'auto' => __('Auto', 'the-core'),
																			'cover' => __('Cover', 'the-core'),
																			'contain' => __('Contain', 'the-core'),
																		)
																	),
																	'overlay_options' => array(
																		'type' => 'multi-picker',
																		'label' => false,
																		'desc' => false,
																		'picker' => array(
																			'overlay' => array(
																				'type' => 'switch',
																				'label' => __('Overlay Color', 'the-core'),
																				'desc' => __('Enable image overlay color?', 'the-core'),
																				'value' => 'no',
																				'right-choice' => array(
																					'value' => 'yes',
																					'label' => __('Yes', 'the-core'),
																				),
																				'left-choice' => array(
																					'value' => 'no',
																					'label' => __('No', 'the-core'),
																				),
																			),
																		),
																		'choices' => array(
																			'no' => array(),
																			'yes' => array(
																				'background' => array(
																					'label' => '',
																					'help' => __('The default color palette can be changed from the', 'the-core') . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __('Colors section', 'the-core') . '</a> ' . __('found in the Theme Settings page', 'the-core'),
																					'desc' => __('Select the overlay color', 'the-core'),
																					'value' => '',
																					'choices' => $the_core_color_settings,
																					'type' => 'color-palette'
																				),
																				'overlay_opacity_image' => array(
																					'type' => 'short-slider',
																					'value' => 80,
																					'properties' => array(
																						'min' => 0,
																						'max' => 100,
																						'sep' => 1,
																					),
																					'label' => '',
																					'desc' => __('Select the overlay color opacity in %', 'the-core'),
																				)
																			),
																		),
																	),
																)
															)
														)
													)
												),
												'menu_align' => array(
													'label' => __('Menu Tray Position', 'the-core'),
													'desc' => __('Select your prefered menu tray position', 'the-core'),
													'type' => 'switch',
													'right-choice' => array(
														'value' => 'right',
														'label' => __('Right', 'the-core')
													),
													'left-choice' => array(
														'value' => 'left',
														'label' => __('Left', 'the-core')
													),
													'value' => 'left',
												),
												'enable_header_socials' => array(
													'type' => 'multi-picker',
													'label' => false,
													'desc' => false,
													'picker' => array(
														'selected_value' => array(
															'label' => __('Social Icons', 'the-core'),
															'desc' => __('Enable social icons?', 'the-core'),
															'help' => sprintf("%s", __('Your social links can be set from the', 'the-core') . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings#fw-options-tab-social-options">' . __('Social Profiles', 'the-core') . '</a> ' . __('section under the General tab.', 'the-core')),
															'type' => 'switch',
															'right-choice' => array(
																'value' => 'yes',
																'label' => __('Yes', 'the-core')
															),
															'left-choice' => array(
																'value' => 'no',
																'label' => __('No', 'the-core')
															),
															'value' => 'yes',
														)
													),
													'choices' => array(
														'yes' => array(
															'header_socials_color' => array(
																'label' => '',
																'desc' => __('Select the social icons color', 'the-core'),
																'help' => __('The default color palette can be changed from the', 'the-core') . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __('Colors section', 'the-core') . '</a> ' . __('found in the Theme Settings page', 'the-core'),
																'value' => $the_core_color_settings['color_3'],
																'choices' => $the_core_color_settings,
																'type' => 'color-palette'
															),
															'header_socials_hover_color' => array(
																'label' => '',
																'desc' => __('Select the social icons hover color', 'the-core'),
																'help' => __('The default color palette can be changed from the', 'the-core') . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __('Colors section', 'the-core') . '</a> ' . __('found in the Theme Settings page', 'the-core'),
																'value' => '',
																'choices' => $the_core_color_settings,
																'type' => 'color-palette'
															),
															'header_icon_size' => array(
																'type' => 'short-text',
																'label' => __('Icon Size', 'the-core'),
																'desc' => __('Enter icon size in pixels. Ex: 16', 'the-core'),
																'value' => '16',
															),
														),
														'no' => array(),
													),
													'show_borders' => false,
												),
											),
										),
										'show_borders' => false,
									),
									'header_bg_color' => array(
										'label' => __('Background Color', 'the-core'),
										'desc' => __('Select header background color', 'the-core'),
										'help' => __('The default color palette can be changed from the', 'the-core') . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __('Colors section', 'the-core') . '</a> ' . __('found in the Theme Settings page', 'the-core'),
										'value' => '#ffffff',
										'choices' => $the_core_color_settings,
										'type' => 'color-palette'
									),
									'dropdown_bg_color' => array(
										'label' => __('Dropdown Bg Color', 'the-core'),
										'desc' => __('Select the dropdown background color', 'the-core'),
										'help' => __('The default color palette can be changed from the', 'the-core') . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __('Colors section', 'the-core') . '</a> ' . __('found in the Theme Settings page', 'the-core'),
										'value' => $the_core_color_settings['color_5'],
										'choices' => $the_core_color_settings,
										'type' => 'color-palette'
									),
									'dropdown_links_color' => array(
										'label' => __('Dropdown Links Color', 'the-core'),
										'desc' => __('Select the dropdown links color', 'the-core'),
										'help' => __('The default color palette can be changed from the', 'the-core') . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __('Colors section', 'the-core') . '</a> ' . __('found in the Theme Settings page', 'the-core'),
										'value' => $the_core_color_settings['color_4'],
										'choices' => $the_core_color_settings,
										'type' => 'color-palette'
									),
								)
							),
							'mobile_menu_options' => array(
								'type'   => 'popup',
								'label'  => __('Mobile Menu', 'the-core'),
								'desc'   => __('Change the mobile menu options', 'the-core'),
								'button' => __('Mobile Menu Options', 'the-core'),
								'size'   => 'small',
								'popup-options' => array(
									'm_burger_group' => array(
										'type'    => 'group',
										'options' => array(
											'mobile_screen' => array(
												'label'      => __( 'Burger Menu', 'the-core' ),
												'desc'       => __( 'Select the resolution for when the burger menu to appear', 'the-core' ),
												'type'       => 'slider',
												'value'      => 1199,
												'properties' => array(
													'min'  => 480,
													'max'  => 1400,
													'step' => 1,
												),
											),
											'm_menu_position' => array(
												'label' => '',
												'desc' => __('Choose the burger menu position', 'the-core'),
												'type' => 'image-picker',
												'value' => 'fw-mobile-menu-position-center',
												'choices' => array(
													'fw-mobile-menu-position-left' => array(
														'small' => array(
															'height' => 50,
															'src' => $the_core_template_directory . '/images/image-picker/left-position.jpg',
															'title' => __('Left', 'the-core')
														),
													),
													'fw-mobile-menu-position-center' => array(
														'small' => array(
															'height' => 50,
															'src' => $the_core_template_directory . '/images/image-picker/center-position.jpg',
															'title' => __('Center', 'the-core')
														),
													),
													'fw-mobile-menu-position-right' => array(
														'small' => array(
															'height' => 50,
															'src' => $the_core_template_directory . '/images/image-picker/right-position.jpg',
															'title' => __('Right', 'the-core')
														),
													),
												),
											),
										)
									),
									'm_typography_group' => array(
										'type'    => 'group',
										'options' => array(
											'menu_typography' => array(
												'label' => __( 'Items Typography', 'the-core' ),
												'type'  => 'tf-typography',
												'value' => array(
													'family'         => 'Helvetica',
													'size'           => 14,
													'line-height'    => 22,
													'letter-spacing' => 0,
												)
											),
											'menu_text_transform' => array(
												'type' => 'switch',
												'value' => 'uppercase',
												'label' => '',
												'desc' => __('Select the lettercase for the burger menu', 'the-core'),
												'left-choice' => array(
													'value' => 'none',
													'label' => __('NORMAL', 'the-core'),
												),
												'right-choice' => array(
													'value' => 'uppercase',
													'label' => __('UPPERCASE', 'the-core'),
												)
											),
										)
									),
									'menu_items_alignment' => array(
										'label' => __('Items Alignment', 'the-core'),
										'desc' => __('Choose the menu items alignment', 'the-core'),
										'type' => 'image-picker',
										'value' => is_rtl() ? 'mobile-menu-item-align-right' : 'mobile-menu-item-align-left',
										'choices' => array(
											'mobile-menu-item-align-left' => array(
												'small' => array(
													'height' => 50,
													'src' => $the_core_template_directory . '/images/image-picker/left-position.jpg',
													'title' => __('Left', 'the-core')
												),
											),
											'mobile-menu-item-align-center' => array(
												'small' => array(
													'height' => 50,
													'src' => $the_core_template_directory . '/images/image-picker/center-position.jpg',
													'title' => __('Center', 'the-core')
												),
											),
											'mobile-menu-item-align-right' => array(
												'small' => array(
													'height' => 50,
													'src' => $the_core_template_directory . '/images/image-picker/right-position.jpg',
													'title' => __('Right', 'the-core')
												),
											),
										),
									),
									'effect_panels' => array(
										'label' => __('Panel Animation', 'the-core'),
										'desc' => __('Select the menu panel animation', 'the-core'),
										'help' => __('This option applies only to menus that contain secondary level items (aka dropdown items)', 'the-core'),
										'type' => 'short-select',
										'value' => 'mm-effect-panels-left-right',
										'choices' => array(
											'mm-effect-panels-left-right' => __('Slide', 'the-core'),
											'effect-panels-zoom' => __('Zoom', 'the-core'),
											'effect-panels-fadeIn' => __('Fade In', 'the-core'),
										),
									),
									'page_dim' => array(
										'label' => __('Page Dim', 'the-core'),
										'desc' => __('Select the menu page dim', 'the-core'),
										'help' => __('When the Menu panel is opened the page will dim to the selected color', 'the-core'),
										'type' => 'short-select',
										'value' => 'page-dim-none',
										'choices' => array(
											'page-dim-none' => __('None', 'the-core'),
											'pagedim-white' => __('White', 'the-core'),
											'pagedim-black' => __('Black', 'the-core'),
										),
									),
									'menu_align' => array(
										'label' => __('Tray Position', 'the-core'),
										'desc'  => __('Select your prefered menu tray position', 'the-core'),
										'type'  => 'short-select',
										'value' => 'left',
										'choices' => array(
											'top'    => __('Top', 'the-core'),
											'bottom' => __('Bottom', 'the-core'),
											'left'   => __('Left', 'the-core'),
											'right'  => __('Right', 'the-core'),
										),
									),
									'border' => array(
										'type' => 'multi-picker',
										'label' => false,
										'desc' => false,
										'picker' => array(
											'selected' => array(
												'type' => 'switch',
												'value' => 'yes',
												'label' => __('Border', 'the-core'),
												'desc' => __('Add a border?', 'the-core'),
												'left-choice' => array(
													'value' => 'no',
													'label' => __('No', 'the-core'),
												),
												'right-choice' => array(
													'value' => 'yes',
													'label' => __('Yes', 'the-core'),
												)
											),
										),
										'choices' => array(
											'yes' => array(
												'border_style' => array(
													'label' => '',
													'desc'  => __('Select the border style', 'the-core'),
													'type'  => 'short-select',
													'choices' => array(
														'indent' => __('Indent', 'the-core'),
														'border-full' => __('Full', 'the-core'),
														'border-offset' => __('Offset', 'the-core'),
													),
													'value' => 'indent'
												),
												'border_size' => array(
													'label' => __('', 'the-core'),
													'desc' => __('Border size in pixels', 'the-core'),
													'type' => 'short-text',
													'value' => '',
												),
												'border_color' => array(
													'label' => __('', 'the-core'),
													'desc' => __('Select the border color', 'the-core'),
													'help' => __('The default color palette can be changed from the', 'the-core') . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __('Colors section', 'the-core') . '</a> ' . __('found in the Theme Settings page', 'the-core'),
													'value' => '',
													'choices' => $the_core_color_settings,
													'type' => 'color-palette'
												),
											),
										),
									),
									'mobile_menu_socials' => array(
										'type' => 'multi-picker',
										'label' => false,
										'desc' => false,
										'picker' => array(
											'selected_value' => array(
												'label' => __('Social Icons', 'the-core'),
												'desc' => __('Enable social icons?', 'the-core'),
												'help' => sprintf("%s", __('Your social links can be set from the', 'the-core') . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings#fw-options-tab-social-options">' . __('Social Profiles', 'the-core') . '</a> ' . __('section under the General tab.', 'the-core')),
												'type' => 'switch',
												'right-choice' => array(
													'value' => 'yes',
													'label' => __('Yes', 'the-core')
												),
												'left-choice' => array(
													'value' => 'no',
													'label' => __('No', 'the-core')
												),
												'value' => 'yes',
											)
										),
										'choices' => array(
											'yes' => array(
												'mobile_menu_socials_color' => array(
													'label' => '',
													'desc' => __('Select the social icons color', 'the-core'),
													'help' => __('The default color palette can be changed from the', 'the-core') . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __('Colors section', 'the-core') . '</a> ' . __('found in the Theme Settings page', 'the-core'),
													'value' => $the_core_color_settings['color_3'],
													'choices' => $the_core_color_settings,
													'type' => 'color-palette'
												),
												'mobile_menu_icon_size' => array(
													'type' => 'short-text',
													'label' => __('Icon Size', 'the-core'),
													'desc' => __('Enter icon size in pixels. Ex: 16', 'the-core'),
													'value' => '16',
												),
											),
											'no' => array(),
										),
										'show_borders' => false,
									),
									'background_options' => array(
										'type' => 'multi-picker',
										'label' => false,
										'desc' => false,
										'picker' => array(
											'background' => array(
												'label' => __('Background', 'the-core'),
												'attr' => array('class' => 'fw-checkbox-float-left'),
												'type' => 'radio',
												'choices' => array(
													'color' => __('Color', 'the-core'),
													'image' => __('Image', 'the-core'),
												),
												'value' => 'color'
											),
										),
										'choices' => array(
											'color' => array(
												'background_color' => array(
													'label' => '',
													'help' => __('The default color palette can be changed from the', 'the-core') . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __('Colors section', 'the-core') . '</a> ' . __('found in the Theme Settings page', 'the-core'),
													'desc' => __('Select the background color', 'the-core'),
													'value' => '',
													'choices' => $the_core_color_settings,
													'type' => 'color-palette'
												),
											),
											'image' => array(
												'background_image' => array(
													'label' => '',
													'type' => 'background-image',
													'choices' => array(//	in future may will set predefined images
													)
												),
												'background_color' => array(
													'label' => '',
													'help' => __('The default color palette can be changed from the', 'the-core') . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __('Colors section', 'the-core') . '</a> ' . __('found in the Theme Settings page', 'the-core'),
													'desc' => __('Select the background color', 'the-core'),
													'value' => '',
													'choices' => $the_core_color_settings,
													'type' => 'color-palette'
												),
												'repeat' => array(
													'label' => '',
													'desc' => __('Select how will the background repeat', 'the-core'),
													'type' => 'short-select',
													'attr' => array('class' => 'fw-checkbox-float-left'),
													'value' => 'no-repeat',
													'choices' => array(
														'no-repeat' => __('No-Repeat', 'the-core'),
														'repeat' => __('Repeat', 'the-core'),
														'repeat-x' => __('Repeat-X', 'the-core'),
														'repeat-y' => __('Repeat-Y', 'the-core'),
													)
												),
												'bg_position_x' => array(
													'label' => __('Position', 'the-core'),
													'desc' => __('Select the horizontal background position', 'the-core'),
													'type' => 'short-select',
													'attr' => array('class' => 'fw-checkbox-float-left'),
													'value' => '',
													'choices' => array(
														'left' => __('Left', 'the-core'),
														'center' => __('Center', 'the-core'),
														'right' => __('Right', 'the-core'),
													)
												),
												'bg_position_y' => array(
													'label' => '',
													'desc' => __('Select the vertical background position', 'the-core'),
													'type' => 'short-select',
													'attr' => array('class' => 'fw-checkbox-float-left'),
													'value' => '',
													'choices' => array(
														'top' => __('Top', 'the-core'),
														'center' => __('Center', 'the-core'),
														'bottom' => __('Bottom', 'the-core'),
													)
												),
												'bg_size' => array(
													'label' => __('Size', 'the-core'),
													'desc' => __('Select the background size', 'the-core'),
													'help' => __('<strong>Auto</strong> - Default value, the background image has the original width and height.<br><br><strong>Cover</strong> - Scale the background image so that the background area is completely covered by the image.<br><br><strong>Contain</strong> - Scale the image to the largest size such that both its width and height can fit inside the content area.', 'the-core'),
													'type' => 'short-select',
													'attr' => array('class' => 'fw-checkbox-float-left'),
													'value' => '',
													'choices' => array(
														'auto' => __('Auto', 'the-core'),
														'cover' => __('Cover', 'the-core'),
														'contain' => __('Contain', 'the-core'),
													)
												),
												'overlay_options' => array(
													'type' => 'multi-picker',
													'label' => false,
													'desc' => false,
													'picker' => array(
														'overlay' => array(
															'type' => 'switch',
															'label' => __('Overlay Color', 'the-core'),
															'desc' => __('Enable image overlay color?', 'the-core'),
															'value' => 'no',
															'right-choice' => array(
																'value' => 'yes',
																'label' => __('Yes', 'the-core'),
															),
															'left-choice' => array(
																'value' => 'no',
																'label' => __('No', 'the-core'),
															),
														),
													),
													'choices' => array(
														'no' => array(),
														'yes' => array(
															'background' => array(
																'label' => '',
																'help' => __('The default color palette can be changed from the', 'the-core') . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __('Colors section', 'the-core') . '</a> ' . __('found in the Theme Settings page', 'the-core'),
																'desc' => __('Select the overlay color', 'the-core'),
																'value' => '',
																'choices' => $the_core_color_settings,
																'type' => 'color-palette'
															),
															'overlay_opacity_image' => array(
																'type' => 'short-slider',
																'value' => 80,
																'properties' => array(
																	'min' => 0,
																	'max' => 100,
																	'sep' => 1,
																),
																'label' => '',
																'desc' => __('Select the overlay color opacity in %', 'the-core'),
															)
														),
													),
												),
											)
										)
									)
								)
							),
							'boxed_header' => array(
								'type'    => 'multi-picker',
								'label'   => false,
								'desc'    => false,
								'picker'  => array(
									'selected_value' => array(
										'type'         => 'switch',
										'label'        => __( 'Boxed Header', 'the-core' ),
										'desc'         => __( 'Make the header boxed?', 'the-core' ),
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
										'header_boxed_top' => array(
											'label'   => __( '', 'the-core' ),
											'desc'    => __( 'Set the top margin in px', 'the-core' ),
											'type'    => 'short-text',
											'value'   => '50',
										),
									),
								),
							),
							'enable_absolute_header' => array(
								'type' => 'multi-picker',
								'label' => false,
								'desc' => false,
								'picker' => array(
									'selected_value' => array(
										'type' => 'switch',
										'value' => 'fw-no-absolute-header',
										'attr' => array(),
										'label' => __('Absolute Header', 'the-core'),
										'desc' => __('Make the header position absolute?', 'the-core'),
										'help' => sprintf("%s", __('This absolute positioning will put the header on top of the header image.', 'the-core')),
										'left-choice' => array(
											'value' => 'fw-no-absolute-header',
											'label' => __('No', 'the-core'),
										),
										'right-choice' => array(
											'value' => 'fw-absolute-header',
											'label' => __('Yes', 'the-core'),
										),
									)
								),
								'choices' => array(
									'fw-absolute-header' => array(
										'absolute_opacity' => array(
											'type' => 'slider',
											'value' => 65,
											'properties' => array(
												'min' => 0,
												'max' => 100,
												'sep' => 1,
											),
											'label' => '',
											'desc' => __('Select the header background opacity', 'the-core'),
										),
									),
								),
								'show_borders' => false,
							),
							'sticky_header_group' => array(
								'type'    => 'group',
								'options' => array(
									'sticky_header_styling' => array(
										'attr'          => array(
											'data-advanced-for' => 'advanced-sticky-header',
											'class'             => 'fw-advanced-button'
										),
										'type'          => 'popup',
										'label'         => __( 'Sticky Header', 'the-core' ),
										'button'        => __( 'Styling', 'the-core' ),
										'size'          => 'medium',
										'popup-options' => array(
											'sticky_logo_group' => array(
												'type'    => 'group',
												'options' => array(
													'sticky_bg_group'    => array(
														'type'    => 'group',
														'options' => array(
															'bg_color'   => array(
																'label'   => __( 'Background', 'the-core' ),
																'desc'    => __( "Select the background color", "the-core" ),
																'help'    => __( 'The default color palette can be changed from the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __( 'Colors section', 'the-core' ) . '</a> ' . __( 'found in the Theme Settings page', 'the-core' ),
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
																'desc'       => __( 'Select the overlay color opacity in %', 'the-core' ),
															)
														)
													),
													'logo'               => array(
														'label' => __( 'Logo', 'the-core' ),
														'desc'  => __( "Select a logo for sticky header", "the-core" ),
														'help'  => __( "The logo is not working for header type 3 & 4", "the-core" ),
														'type'  => 'upload'
													),
													'sticky_logo_retina' => array(
														'type' => 'switch',
														'label' => '',
														'desc' => __('Use logo as retina?', 'the-core'),
														'left-choice' => array(
															'value' => 'fw-sticky-logo-no-retina',
															'label' => __('No', 'the-core'),
														),
														'right-choice' => array(
															'value' => 'fw-sticky-logo-retina',
															'label' => __('Yes', 'the-core'),
														),
														'value' => 'fw-sticky-logo-no-retina'
													),
												)
											),
											'sticky_color_group' => array(
												'type'    => 'group',
												'options' => array(
													'menu_color'       => array(
														'label'   => __( 'Menu Color', 'the-core' ),
														'desc'    => __( "Select the menu color", "the-core" ),
														'help'    => __( 'The default color palette can be changed from the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __( 'Colors section', 'the-core' ) . '</a> ' . __( 'found in the Theme Settings page', 'the-core' ),
														'value'   => '',
														'choices' => $the_core_color_settings,
														'type'    => 'color-palette'
													),
													'menu_hover_color' => array(
														'label'   => __( '', 'the-core' ),
														'desc'    => __( "Select the menu hover color", "the-core" ),
														'help'    => __( 'The default color palette can be changed from the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __( 'Colors section', 'the-core' ) . '</a> ' . __( 'found in the Theme Settings page', 'the-core' ),
														'value'   => '',
														'choices' => $the_core_color_settings,
														'type'    => 'color-palette'
													),
												)
											),
											'padding'            => array(
												'label' => __( 'Spacing', 'the-core' ),
												'desc'  => __( "Select the top & bottom spacing in pixels", "the-core" ),
												'value' => '',
												'type'  => 'short-text'
											),
											'sticky_screen' => array(
												'label'      => __( 'Mobile Display', 'the-core' ),
												'desc'       => __( 'Display the sticky header on mobile?', 'the-core' ),
												'type' => 'switch',
												'left-choice' => array(
													'value' => '767',
													'label' => __('No', 'the-core'),
												),
												'right-choice' => array(
													'value' => '300',
													'label' => __('Yes', 'the-core'),
												),
												'value' => '767'
											),
										)
									),
									'enable_sticky_header'  => array(
										'attr'         => array( 'class' => 'advanced-sticky-header' ),
										'type'         => 'switch',
										'value'        => '',
										'label'        => __( 'Sticky Header', 'the-core' ),
										'desc'         => __( 'Make the header stick with the scroll?', 'the-core' ),
										'left-choice'  => array(
											'value' => '',
											'label' => __( 'No', 'the-core' ),
										),
										'right-choice' => array(
											'value' => 'fw-header-sticky',
											'label' => __( 'Yes', 'the-core' ),
										),
									),
								)
							),
							'enable_header_top_bar' => array(
								'type' => 'multi-picker',
								'label' => false,
								'desc' => false,
								'picker' => array(
									'selected_value' => array(
										'label' => __('Header Top Bar', 'the-core'),
										'desc' => __('Enable the header top bar?', 'the-core'),
										'type' => 'switch',
										'right-choice' => array(
											'value' => 'yes',
											'label' => __('Yes', 'the-core')
										),
										'left-choice' => array(
											'value' => 'no',
											'label' => __('No', 'the-core')
										),
										'value' => 'no',
									)
								),
								'choices' => array(
									'yes' => array(
										'header_top_bar_bg' => array(
											'label' => __('Background Color', 'the-core'),
											'desc' => __("Select the header's top bar background color", "the-core"),
											'help' => __('The default color palette can be changed from the', 'the-core') . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __('Colors section', 'the-core') . '</a> ' . __('found in the Theme Settings page', 'the-core'),
											'value' => $the_core_color_settings['color_5'],
											'choices' => $the_core_color_settings,
											'type' => 'color-palette'
										),
										'header_text' => array(
											'type' => 'wp-editor',
											'tinymce' => true,
											'wpautop' => true,
											'editor_height' => 200,
											'media_buttons' => false,
											'value' => '<a href="#">Subscribe to RSS</a>&nbsp;|&nbsp;<a href="#">Advertise with us</a>',
											'label' => __('Text', 'the-core'),
											'desc' => __('This top bar text is usually used for an email address or phone no', 'the-core'),
										),
										'enable_header_socials' => array(
											'type' => 'multi-picker',
											'label' => false,
											'desc' => false,
											'picker' => array(
												'selected_value' => array(
													'label' => __('Social Icons', 'the-core'),
													'desc' => __('Enable social icons?', 'the-core'),
													'help' => sprintf("%s", __('Your social links can be set from the', 'the-core') . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings#fw-options-tab-social-options">' . __('Social Profiles', 'the-core') . '</a> ' . __('section under the General tab.', 'the-core')),
													'type' => 'switch',
													'right-choice' => array(
														'value' => 'yes',
														'label' => __('Yes', 'the-core')
													),
													'left-choice' => array(
														'value' => 'no',
														'label' => __('No', 'the-core')
													),
													'value' => 'yes',
												)
											),
											'choices' => array(
												'yes' => array(
													'header_socials_color' => array(
														'label' => '',
														'desc' => __('Select the social icons color', 'the-core'),
														'help' => __('The default color palette can be changed from the', 'the-core') . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __('Colors section', 'the-core') . '</a> ' . __('found in the Theme Settings page', 'the-core'),
														'value' => $the_core_color_settings['color_3'],
														'choices' => $the_core_color_settings,
														'type' => 'color-palette'
													),
													'header_socials_hover_color' => array(
														'label' => '',
														'desc' => __('Select the social icons hover color', 'the-core'),
														'help' => __('The default color palette can be changed from the', 'the-core') . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __('Colors section', 'the-core') . '</a> ' . __('found in the Theme Settings page', 'the-core'),
														'value' => '',
														'choices' => $the_core_color_settings,
														'type' => 'color-palette'
													),
													'header_icon_size' => array(
														'type' => 'short-text',
														'label' => __('Icon Size', 'the-core'),
														'desc' => __('Enter icon size in pixels. Ex: 16', 'the-core'),
														'value' => '16',
													),
													'header_social_position' => array(
														'type' => 'switch',
														'label' => __('Socials Position', 'the-core'),
														'desc' => __('Select the socials position', 'the-core'),
														'right-choice' => array(
															'value' => 'fw-top-social-right',
															'label' => __('Right', 'the-core')
														),
														'left-choice' => array(
															'value' => 'fw-top-social-left',
															'label' => __('Left', 'the-core')
														),
														'value' => 'fw-top-social-right',
													),
												),
												'no' => array(),
											),
											'show_borders' => false,
										),
									),
									'no' => array(),
								),
								'show_borders' => false,
							),
							'search_group_typography' => array(
								'attr' => array('class' => 'border-bottom-none'),
								'type' => 'group',
								'options' => array(
									'enable_search' => array(
										'type' => 'multi-picker',
										'label' => false,
										'desc' => false,
										'picker' => array(
											'selected_value' => array(
												'label' => __('Search', 'the-core'),
												'desc' => __('Enable search?', 'the-core'),
												'type' => 'switch',
												'right-choice' => array(
													'value' => 'yes',
													'label' => __('Yes', 'the-core')
												),
												'left-choice' => array(
													'value' => 'no',
													'label' => __('No', 'the-core')
												),
												'value' => 'yes',
											)
										),
										'choices' => array(
											'yes' => array(
												'search_type' => array(
													'type' => 'multi-picker',
													'label' => false,
													'desc' => false,
													'picker' => array(
														'selected' => array(
															'label' => __('Type', 'the-core'),
															'desc' => __('Select your prefered search type', 'the-core'),
															'type' => 'select',
															'value' => 'fw-mini-search',
															'choices' => array(
																'fw-input-search' => __('Input Search', 'the-core'),
																'fw-mini-search' => __('Icon Search', 'the-core'),
															),
														)
													),
													'choices' => array(
														'fw-input-search' => array(
															'search_advanced_styling' => array(
																'attr' => array('class' => 'fw-advanced-button'),
																'type' => 'popup',
																'label' => '',
																'desc' => __('Change the style / typography of the search', 'the-core'),
																'button' => __('Styling', 'the-core'),
																'size' => 'small',
																'popup-options' => array(
																	'search_group' => array(
																		'type' => 'group',
																		'options' => array(
																			'input_typography' => array(
																				'label' => __('Input Text', 'the-core'),
																				'type' => 'tf-typography',
																				'value' => array(
																					'family' => 'Crimson Text',
																					'size' => 19,
																					'line-height' => 26,
																					'letter-spacing' => 0,
																				)
																			),
																			'search_background_options' => array(
																				'type' => 'multi-picker',
																				'label' => false,
																				'desc' => false,
																				'picker' => array(
																					'background' => array(
																						'label' => __('Bg Color', 'the-core'),
																						'desc' => __("Select the background color", "the-core"),
																						'attr' => array('class' => 'fw-checkbox-float-left'),
																						'type' => 'radio',
																						'choices' => array(
																							'none' => __('None', 'the-core'),
																							'custom' => __('Custom', 'the-core'),
																						),
																						'value' => 'none'
																					),
																				),
																				'choices' => array(
																					'custom' => array(
																						'background_color' => array(
																							'label' => '',
																							'help' => __('The default color palette can be changed from the', 'the-core') . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __('Colors section', 'the-core') . '</a> ' . __('found in the Theme Settings page', 'the-core'),
																							'desc' => __('Select the background color', 'the-core'),
																							'value' => '',
																							'choices' => $the_core_color_settings,
																							'type' => 'color-palette'
																						),
																					),
																				),
																				'show_borders' => false,
																			),
																		)
																	),
																	'placeholder_search_group' => array(
																		'type' => 'group',
																		'options' => array(
																			'placeholder_text' => array(
																				'label' => __('Placeholder Text', 'the-core'),
																				'desc' => __('Enter the placeholder text', 'the-core'),
																				'value' => '',
																				'type' => 'text'
																			),
																			'placeholder_color' => array(
																				'label' => '',
																				'help' => __('The default color palette can be changed from the', 'the-core') . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __('Colors section', 'the-core') . '</a> ' . __('found in the Theme Settings page', 'the-core'),
																				'desc' => __('Select the placeholder color', 'the-core'),
																				'value' => '',
																				'choices' => $the_core_color_settings,
																				'type' => 'color-palette'
																			),
																		)
																	),
																	'border_group' => array(
																		'type' => 'multi-picker',
																		'label' => false,
																		'desc' => false,
																		'picker' => array(
																			'selected' => array(
																				'type' => 'switch',
																				'value' => '',
																				'label' => __('Border', 'the-core'),
																				'desc' => __('Add a border to input search?', 'the-core'),
																				'left-choice' => array(
																					'value' => 'no',
																					'label' => __('No', 'the-core'),
																				),
																				'right-choice' => array(
																					'value' => 'yes',
																					'label' => __('Yes', 'the-core'),
																				)
																			),
																		),
																		'choices' => array(
																			'yes' => array(
																				'border_size' => array(
																					'label' => '',
																					'desc' => __('Border size in pixels', 'the-core'),
																					'type' => 'short-text',
																					'value' => '1',
																				),
																				'border_color' => array(
																					'label' => '',
																					'help' => __('The default color palette can be changed from the', 'the-core') . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __('Colors section', 'the-core') . '</a> ' . __('found in the Theme Settings page', 'the-core'),
																					'desc' => __('Select border color', 'the-core'),
																					'value' => '',
																					'choices' => $the_core_color_settings,
																					'type' => 'color-palette'
																				),
																			)
																		)
																	),
																	'icon_search_group' => array(
																		'type' => 'group',
																		'options' => array(
																			'icon_size' => array(
																				'label' => __('Icon', 'the-core'),
																				'desc' => __('Icon size in pixels', 'the-core'),
																				'type' => 'short-text',
																				'value' => '16',
																			),
																			'icon_color' => array(
																				'label' => '',
																				'help' => __('The default color palette can be changed from the', 'the-core') . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __('Colors section', 'the-core') . '</a> ' . __('found in the Theme Settings page', 'the-core'),
																				'desc' => __('Select icon color', 'the-core'),
																				'value' => '',
																				'choices' => $the_core_color_settings,
																				'type' => 'color-palette'
																			),
																		)
																	),
																),
															),
														),
														'fw-mini-search' => array(
															'search_advanced_styling' => array(
																'attr' => array('class' => 'fw-advanced-button'),
																'type' => 'popup',
																'label' => '',
																'desc' => __('Change the style / typography of the search', 'the-core'),
																'button' => __('Styling', 'the-core'),
																'size' => 'small',
																'popup-options' => array(
																	'search_group' => array(
																		'type' => 'group',
																		'options' => array(
																			'input_typography' => array(
																				'label' => __('Input Text', 'the-core'),
																				'type' => 'tf-typography',
																				'value' => array(
																					'family' => 'Crimson Text',
																					'size' => 40,
																					'line-height' => 40,
																					'letter-spacing' => 0,
																					'color-palette' => $the_core_color_settings['color_4'],
																				)
																			),
																			'search_background_options' => array(
																				'type' => 'multi-picker',
																				'label' => false,
																				'desc' => false,
																				'picker' => array(
																					'background' => array(
																						'label' => __('Bg Color', 'the-core'),
																						'desc' => __("Select the background color", "the-core"),
																						'attr' => array('class' => 'fw-checkbox-float-left'),
																						'type' => 'radio',
																						'choices' => array(
																							'none' => __('None', 'the-core'),
																							'custom' => __('Custom', 'the-core'),
																						),
																						'value' => 'custom'
																					),
																				),
																				'choices' => array(
																					'custom' => array(
																						'background_color' => array(
																							'label' => '',
																							'help' => __('The default color palette can be changed from the', 'the-core') . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __('Colors section', 'the-core') . '</a> ' . __('found in the Theme Settings page', 'the-core'),
																							'desc' => __('Select the background color', 'the-core'),
																							'value' => $the_core_color_settings['color_3'],
																							'choices' => $the_core_color_settings,
																							'type' => 'color-palette'
																						),
																					),
																				),
																				'show_borders' => false,
																			),
																		)
																	),
																	'placeholder_search_group' => array(
																		'type' => 'group',
																		'options' => array(
																			'placeholder_text' => array(
																				'label' => __('Placeholder Text', 'the-core'),
																				'desc' => __('Enter the placeholder text', 'the-core'),
																				'value' => 'Search',
																				'type' => 'text'
																			),
																			'placeholder_color' => array(
																				'label' => '',
																				'help' => __('The default color palette can be changed from the', 'the-core') . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __('Colors section', 'the-core') . '</a> ' . __('found in the Theme Settings page', 'the-core'),
																				'desc' => __('Select the placeholder color', 'the-core'),
																				'value' => $the_core_color_settings['color_4'],
																				'choices' => $the_core_color_settings,
																				'type' => 'color-palette'
																			),
																		)
																	),
																	'full_background_color' => array(
																		'label' => __('Container Bg Color', 'the-core'),
																		'help' => __('The default color palette can be changed from the', 'the-core') . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __('Colors section', 'the-core') . '</a> ' . __('found in the Theme Settings page', 'the-core'),
																		'desc' => __('Select the container background color', 'the-core'),
																		'value' => '',
																		'choices' => $the_core_color_settings,
																		'type' => 'color-palette'
																	),
																	'border_group' => array(
																		'type' => 'multi-picker',
																		'label' => false,
																		'desc' => false,
																		'picker' => array(
																			'selected' => array(
																				'type' => 'switch',
																				'value' => 'no',
																				'label' => __('Border', 'the-core'),
																				'desc' => __('Add a border to input search?', 'the-core'),
																				'left-choice' => array(
																					'value' => 'no',
																					'label' => __('No', 'the-core'),
																				),
																				'right-choice' => array(
																					'value' => 'yes',
																					'label' => __('Yes', 'the-core'),
																				)
																			),
																		),
																		'choices' => array(
																			'yes' => array(
																				'border_size' => array(
																					'label' => '',
																					'desc' => __('Border size in pixels', 'the-core'),
																					'type' => 'short-text',
																					'value' => '1',
																				),
																				'border_color' => array(
																					'label' => '',
																					'help' => __('The default color palette can be changed from the', 'the-core') . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __('Colors section', 'the-core') . '</a> ' . __('found in the Theme Settings page', 'the-core'),
																					'desc' => __('Select border color', 'the-core'),
																					'value' => '',
																					'choices' => $the_core_color_settings,
																					'type' => 'color-palette'
																				),
																			)
																		)
																	),
																	'icon_search_group' => array(
																		'type' => 'group',
																		'options' => array(
																			'icon_size' => array(
																				'label' => __('Icon', 'the-core'),
																				'desc' => __('Icon size in pixels', 'the-core'),
																				'type' => 'short-text',
																				'value' => '16',
																			),
																			'icon_color' => array(
																				'label' => '',
																				'help' => __('The default color palette can be changed from the', 'the-core') . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __('Colors section', 'the-core') . '</a> ' . __('found in the Theme Settings page', 'the-core'),
																				'desc' => __('Select icon color', 'the-core'),
																				'value' => $the_core_color_settings['color_1'],
																				'choices' => $the_core_color_settings,
																				'type' => 'color-palette'
																			),
																		)
																	),
																),
															),
														),
													)
												),
												'search_position' => array(
													'label' => __('Position', 'the-core'),
													'desc' => __('Select the search position', 'the-core'),
													'type' => 'select',
													'value' => 'top_bar',
													'choices' => array(
														'top_bar' => __('Top Bar', 'the-core'),
														'menu_bar' => __('Menu Bar', 'the-core'),
													),
												),
											),
											'no' => array(),
										),
										'show_borders' => false,
									),
								)
							),
						)
					)
				)
			)
		)
	),
	'footer' => array(
		'title' => __('Footer', 'the-core'),
		'type' => 'tab',
		'options' => array(
			'footer-box' => array(
				'title' => __('Footer', 'the-core'),
				'type' => 'box',
				'options' => array(
					'footer_settings' => array(
						'type' => 'multi',
						'label' => false,
						'attr' => array(
							'class' => 'fw-option-type-multi-show-borders',
						),
						'inner-options' => array(
							'show_footer_widgets' => array(
								'type' => 'multi-picker',
								'label' => false,
								'desc' => false,
								'picker' => array(
									'selected_value' => array(
										'label' => __('Footer Widgets', 'the-core'),
										'desc' => __('Show footer widgets?', 'the-core'),
										'type' => 'switch',
										'right-choice' => array(
											'value' => 'yes',
											'label' => __('Yes', 'the-core')
										),
										'left-choice' => array(
											'value' => 'no',
											'label' => __('No', 'the-core')
										),
										'value' => 'yes',
									)
								),
								'choices' => array(
									'yes' => array(
										'number_of_columns' => array(
											'label' => __('Number of Columns', 'the-core'),
											'desc' => __('Select the number of columns', 'the-core'),
											'help' => sprintf("%s", __('You can set the widgets displayed in the footer from the', 'the-core') . ' <a target="_blank" href="' . $the_core_admin_url . 'widgets.php">' . __('Widgets section', 'the-core') . '</a> ' . __('under Appearance.', 'the-core')),
											'type' => 'short-select',
											'value' => 'footer-cols-4',
											'choices' => array(
												'footer-cols-1' => __('1', 'the-core'),
												'footer-cols-2' => __('2', 'the-core'),
												'footer-cols-3' => __('3', 'the-core'),
												'footer-cols-4' => __('4', 'the-core'),
												'footer-cols-5' => __('5', 'the-core'),
												'footer-cols-6' => __('6', 'the-core'),
											),
										),
										'footer_widgets_bg' => array(
											'type' => 'multi-picker',
											'label' => false,
											'desc' => false,
											'picker' => array(
												'background' => array(
													'label' => __('Background', 'the-core'),
													'desc' => __('Select the background for your widget area', 'the-core'),
													'attr' => array('class' => 'fw-checkbox-float-left'),
													'type' => 'radio',
													'choices' => array(
														'none' => __('None', 'the-core'),
														'image' => __('Image', 'the-core'),
														'color' => __('Color', 'the-core'),
													),
													'value' => 'color'
												),
											),
											'choices' => array(
												'none' => array(),
												'color' => array(
													'background_color' => array(
														'label' => '',
														'desc' => __('Select the background color', 'the-core'),
														'help' => __('The default color palette can be changed from the', 'the-core') . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __('Colors section', 'the-core') . '</a> ' . __('found in the Theme Settings page', 'the-core'),
														'value' => '#2a2e31',
														'choices' => $the_core_color_settings,
														'type' => 'color-palette'
													),
												),
												'image' => array(
													'background_image' => array(
														'label' => '',
														'type' => 'background-image',
														'choices' => array(//	in future may will set predefined images
														)
													),
													'background_color' => array(
														'label' => '',
														'desc' => __('Select the background color', 'the-core'),
														'help' => __('The default color palette can be changed from the', 'the-core') . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __('Colors section', 'the-core') . '</a> ' . __('found in the Theme Settings page', 'the-core'),
														'value' => '',
														'choices' => $the_core_color_settings,
														'type' => 'color-palette'
													),
													'repeat' => array(
														'label' => '',
														'desc' => __('Select how will the background repeat', 'the-core'),
														'type' => 'short-select',
														'attr' => array('class' => 'fw-checkbox-float-left'),
														'value' => 'no-repeat',
														'choices' => array(
															'no-repeat' => __('No-Repeat', 'the-core'),
															'repeat' => __('Repeat', 'the-core'),
															'repeat-x' => __('Repeat-X', 'the-core'),
															'repeat-y' => __('Repeat-Y', 'the-core'),
														)
													),
													'bg_position_x' => array(
														'label' => __('Position', 'the-core'),
														'desc' => __('Select the horizontal background position', 'the-core'),
														'type' => 'short-select',
														'attr' => array('class' => 'fw-checkbox-float-left'),
														'value' => 'left',
														'choices' => array(
															'left' => __('Left', 'the-core'),
															'center' => __('Center', 'the-core'),
															'right' => __('Right', 'the-core'),
														)
													),
													'bg_position_y' => array(
														'label' => '',
														'desc' => __('Select the vertical background position', 'the-core'),
														'type' => 'short-select',
														'attr' => array('class' => 'fw-checkbox-float-left'),
														'value' => 'top',
														'choices' => array(
															'top' => __('Top', 'the-core'),
															'center' => __('Center', 'the-core'),
															'bottom' => __('Bottom', 'the-core'),
														)
													),
													'bg_size' => array(
														'label' => __('Size', 'the-core'),
														'desc' => __('Select the background size', 'the-core'),
														'help' => __('<strong>Auto</strong> - Default value, the background image has the original width and height.<br><br><strong>Cover</strong> - Scale the background image so that the background area is completely covered by the image.<br><br><strong>Contain</strong> - Scale the image to the largest size such that both its width and height can fit inside the content area.', 'the-core'),
														'type' => 'short-select',
														'attr' => array('class' => 'fw-checkbox-float-left'),
														'value' => 'auto',
														'choices' => array(
															'auto' => __('Auto', 'the-core'),
															'cover' => __('Cover', 'the-core'),
															'contain' => __('Contain', 'the-core'),
														)
													),
													'overlay_options' => array(
														'type' => 'multi-picker',
														'label' => false,
														'desc' => false,
														'picker' => array(
															'overlay' => array(
																'type' => 'switch',
																'label' => __('Overlay Color', 'the-core'),
																'desc' => __('Enable image overlay color?', 'the-core'),
																'value' => 'no',
																'right-choice' => array(
																	'value' => 'yes',
																	'label' => __('Yes', 'the-core'),
																),
																'left-choice' => array(
																	'value' => 'no',
																	'label' => __('No', 'the-core'),
																),
															),
														),
														'choices' => array(
															'no' => array(),
															'yes' => array(
																'background' => array(
																	'label' => '',
																	'desc' => __('Select the overlay color', 'the-core'),
																	'help' => __('The default color palette can be changed from the', 'the-core') . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __('Colors section', 'the-core') . '</a> ' . __('found in the Theme Settings page', 'the-core'),
																	'value' => $the_core_color_settings['color_1'],
																	'choices' => $the_core_color_settings,
																	'type' => 'color-palette'
																),
																'overlay_opacity_image' => array(
																	'type' => 'slider',
																	'value' => 80,
																	'properties' => array(
																		'min' => 0,
																		'max' => 100,
																		'sep' => 1,
																	),
																	'label' => '',
																	'desc' => __('Select the overlay color opacity in %', 'the-core'),
																)
															),
														),
													),
												),
											),
											'show_borders' => false,
										),
										'footer_widgets_titles_color' => array(
											'label' => __('Titles Color', 'the-core'),
											'desc' => __('Select the footer widgets titles color', 'the-core'),
											'help' => __('The default color palette can be changed from the', 'the-core') . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __('Colors section', 'the-core') . '</a> ' . __('found in the Theme Settings page', 'the-core'),
											'value' => '#ffffff',
											'choices' => $the_core_color_settings,
											'type' => 'color-palette'
										),
										'footer_widgets_link_color' => array(
											'label'   => __( 'Links Color', 'the-core' ),
											'desc'    => __( 'Select the footer widgets links color', 'the-core' ),
											'help'    => __( 'The default color palette can be changed from the', 'the-core' ) . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __( 'Colors section', 'the-core' ) . '</a> ' . __( 'found in the Theme Settings page', 'the-core' ),
											'value'   => '',
											'choices' => $the_core_color_settings,
											'type'    => 'color-palette'
										),
										'body_widgets_text_color' => array(
											'label' => __('Body Text Color', 'the-core'),
											'desc' => __('Select the footer widgets body text color', 'the-core'),
											'help' => __('The default color palette can be changed from the', 'the-core') . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __('Colors section', 'the-core') . '</a> ' . __('found in the Theme Settings page', 'the-core'),
											'value' => '#898d8e',
											'choices' => $the_core_color_settings,
											'type' => 'color-palette'
										),
									),
								),
								'show_borders' => false,
							),
							'show_menu_bar' => array(
								'type' => 'multi-picker',
								'label' => false,
								'desc' => false,
								'picker' => array(
									'selected_value' => array(
										'label' => __('Menu Bar', 'the-core'),
										'desc' => __('Show menu bar?', 'the-core'),
										'type' => 'switch',
										'right-choice' => array(
											'value' => 'yes',
											'label' => __('Yes', 'the-core')
										),
										'left-choice' => array(
											'value' => 'no',
											'label' => __('No', 'the-core')
										),
										'value' => 'yes',
									)
								),
								'choices' => array(
									'yes' => array(
										'show_footer_menu' => array(
											'label' => __('Footer Menu', 'the-core'),
											'desc' => __('Show footer navigation menu?', 'the-core'),
											'help' => sprintf("%s \n\n<br/><br/>\n\n %s",
												__('You can set this navigation menu from', 'the-core') . ' <a target="_blank" href="' . $the_core_admin_url . 'nav-menus.php?action=locations">' . __('Menu section', 'the-core') . '</a> ' . __('under Appearance.', 'the-core'),
												__('Note that only the top level items will be displayed.', 'the-core')),
											'type' => 'switch',
											'right-choice' => array(
												'value' => 'yes',
												'label' => __('Yes', 'the-core')
											),
											'left-choice' => array(
												'value' => 'no',
												'label' => __('No', 'the-core')
											),
											'value' => 'yes',
										),
										'show_footer_logo' => array(
											'type' => 'multi-picker',
											'label' => false,
											'desc' => false,
											'picker' => array(
												'selected_value' => array(
													'label' => __('Footer Logo', 'the-core'),
													'desc' => __('Show footer logo?', 'the-core'),
													'type' => 'switch',
													'right-choice' => array(
														'value' => 'yes',
														'label' => __('Yes', 'the-core')
													),
													'left-choice' => array(
														'value' => 'no',
														'label' => __('No', 'the-core')
													),
													'value' => 'no',
												)
											),
											'choices' => array(
												'yes' => array(
													'footer_logo' => array(
														'label' => '',
														'desc' => __('Upload a logo for the footer', 'the-core'),
														'type' => 'upload',
														'value' => '',
													),
													'footer_logo_retina' => array(
														'type' => 'switch',
														'label' => '',
														'desc' => __('Use logo as retina?', 'the-core'),
														'left-choice' => array(
															'value' => 'fw-footer-logo-no-retina',
															'label' => __('No', 'the-core'),
														),
														'right-choice' => array(
															'value' => 'fw-footer-logo-retina',
															'label' => __('Yes', 'the-core'),
														),
														'value' => 'fw-footer-logo-no-retina'
													),
													'footer_logo_position' => array(
														'label' => __('Logo Position', 'the-core'),
														'desc' => __('Select your prefered logo position', 'the-core'),
														'type' => 'switch',
														'right-choice' => array(
															'value' => 'fw-footer-menu-left',
															'label' => __('Right', 'the-core')
														),
														'left-choice' => array(
															'value' => 'fw-footer-menu-right',
															'label' => __('Left', 'the-core')
														),
														'value' => 'fw-footer-menu-right',
														// for left logo footer
													),
												),
											),
											'show_borders' => false,
										),
										'menu_bar_bg' => array(
											'type' => 'multi-picker',
											'label' => false,
											'desc' => false,
											'picker' => array(
												'background' => array(
													'label' => __('Background', 'the-core'),
													'desc' => __('Select the background for your menu bar', 'the-core'),
													'attr' => array('class' => 'fw-checkbox-float-left'),
													'type' => 'radio',
													'choices' => array(
														'none' => __('None', 'the-core'),
														'image' => __('Image', 'the-core'),
														'color' => __('Color', 'the-core'),
													),
													'value' => 'color'
												),
											),
											'choices' => array(
												'none' => array(),
												'color' => array(
													'background_color' => array(
														'label' => '',
														'desc' => __('Select the background color', 'the-core'),
														'help' => __('The default color palette can be changed from the', 'the-core') . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __('Colors section', 'the-core') . '</a> ' . __('found in the Theme Settings page', 'the-core'),
														'value' => '#000000',
														'choices' => $the_core_color_settings,
														'type' => 'color-palette'
													),
												),
												'image' => array(
													'background_image' => array(
														'label' => '',
														'type' => 'background-image',
														'choices' => array(//	in future may will set predefined images
														)
													),
													'background_color' => array(
														'label' => '',
														'desc' => __('Select the background color', 'the-core'),
														'help' => __('The default color palette can be changed from the', 'the-core') . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __('Colors section', 'the-core') . '</a> ' . __('found in the Theme Settings page', 'the-core'),
														'value' => '',
														'choices' => $the_core_color_settings,
														'type' => 'color-palette'
													),
													'repeat' => array(
														'label' => '',
														'desc' => __('Select how will the background repeat', 'the-core'),
														'type' => 'short-select',
														'attr' => array('class' => 'fw-checkbox-float-left'),
														'value' => 'no-repeat',
														'choices' => array(
															'no-repeat' => __('No-Repeat', 'the-core'),
															'repeat' => __('Repeat', 'the-core'),
															'repeat-x' => __('Repeat-X', 'the-core'),
															'repeat-y' => __('Repeat-Y', 'the-core'),
														)
													),
													'bg_position_x' => array(
														'label' => __('Position', 'the-core'),
														'desc' => __('Select the horizontal background position', 'the-core'),
														'type' => 'short-select',
														'attr' => array('class' => 'fw-checkbox-float-left'),
														'value' => 'left',
														'choices' => array(
															'left' => __('Left', 'the-core'),
															'center' => __('Center', 'the-core'),
															'right' => __('Right', 'the-core'),
														)
													),
													'bg_position_y' => array(
														'label' => '',
														'desc' => __('Select the vertical background position', 'the-core'),
														'type' => 'short-select',
														'attr' => array('class' => 'fw-checkbox-float-left'),
														'value' => 'top',
														'choices' => array(
															'top' => __('Top', 'the-core'),
															'center' => __('Center', 'the-core'),
															'bottom' => __('Bottom', 'the-core'),
														)
													),
													'bg_size' => array(
														'label' => __('Size', 'the-core'),
														'desc' => __('Select the background size', 'the-core'),
														'help' => __('<strong>Auto</strong> - Default value, the background image has the original width and height.<br><br><strong>Cover</strong> - Scale the background image so that the background area is completely covered by the image.<br><br><strong>Contain</strong> - Scale the image to the largest size such that both its width and height can fit inside the content area.', 'the-core'),
														'type' => 'short-select',
														'attr' => array('class' => 'fw-checkbox-float-left'),
														'value' => 'auto',
														'choices' => array(
															'auto' => __('Auto', 'the-core'),
															'cover' => __('Cover', 'the-core'),
															'contain' => __('Contain', 'the-core'),
														)
													),
													'overlay_options' => array(
														'type' => 'multi-picker',
														'label' => false,
														'desc' => false,
														'picker' => array(
															'overlay' => array(
																'type' => 'switch',
																'label' => __('Overlay Color', 'the-core'),
																'desc' => __('Enable image overlay color?', 'the-core'),
																'value' => 'no',
																'right-choice' => array(
																	'value' => 'yes',
																	'label' => __('Yes', 'the-core'),
																),
																'left-choice' => array(
																	'value' => 'no',
																	'label' => __('No', 'the-core'),
																),
															),
														),
														'choices' => array(
															'no' => array(),
															'yes' => array(
																'background' => array(
																	'label' => '',
																	'desc' => __('Select the overlay color', 'the-core'),
																	'help' => __('The default color palette can be changed from the', 'the-core') . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __('Colors section', 'the-core') . '</a> ' . __('found in the Theme Settings page', 'the-core'),
																	'value' => '',
																	'choices' => $the_core_color_settings,
																	'type' => 'color-palette'
																),
																'overlay_opacity_image' => array(
																	'type' => 'slider',
																	'value' => 80,
																	'properties' => array(
																		'min' => 0,
																		'max' => 100,
																		'sep' => 1,
																	),
																	'label' => '',
																	'desc' => __('Select the overlay color opacity in %', 'the-core'),
																)
															),
														),
													),
												),
											),
											'show_borders' => false,
										),
									),
								),
								'show_borders' => false,
							),
							'footer_socials' => array(
								'type' => 'multi-picker',
								'label' => false,
								'desc' => false,
								'picker' => array(
									'selected_value' => array(
										'type' => 'switch',
										'value' => 'yes',
										'label' => __('Footer Socials', 'the-core'),
										'desc' => __('Display footer social icons?', 'the-core'),
										'help' => sprintf("%s", __('Your social links can be set from the', 'the-core') . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings#fw-options-tab-social-options">' . __('Social Profiles', 'the-core') . '</a> ' . __('section under the General tab.', 'the-core')),
										'left-choice' => array(
											'value' => 'no',
											'label' => __('No', 'the-core'),
										),
										'right-choice' => array(
											'value' => 'yes',
											'label' => __('Yes', 'the-core'),
										)
									)
								),
								'choices' => array(
									'yes' => array(
										'footer_social_color' => array(
											'label' => __('Social Icons Color', 'the-core'),
											'desc' => __('Select the social icons color', 'the-core'),
											'help' => __('The default color palette can be changed from the', 'the-core') . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-styling">' . __('Styling section', 'the-core') . '</a> ' . __('found in the Theme Settings page', 'the-core'),
											'value' => $the_core_color_settings['color_3'],
											'choices' => $the_core_color_settings,
											'type' => 'color-palette'
										),
										'footer_social_hover_color' => array(
											'label' => __('Social Icons Hover Color', 'the-core'),
											'desc' => __('Select the social icons hover color', 'the-core'),
											'help' => __('The default color palette can be changed from the', 'the-core') . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-styling">' . __('Styling section', 'the-core') . '</a> ' . __('found in the Theme Settings page', 'the-core'),
											'value' => '',
											'choices' => $the_core_color_settings,
											'type' => 'color-palette'
										),
										'footer_icon_size' => array(
											'type' => 'short-text',
											'label' => __('Icon Size', 'the-core'),
											'desc' => __('Enter icon size in pixels. Ex: 16', 'the-core'),
											'value' => '16',
										),
									)
								)
							),
							'copyright_group' => array(
								'type' => 'group',
								'attr' => array('class' => 'border-bottom-none'),
								'options' => array(
									'copyright' => array(
										'label'         => __('Copyright', 'the-core'),
										'desc'          => __('Please enter the copyright text', 'the-core'),
										'type'          => 'wp-editor',
										'tinymce'       => true,
										'wpautop'       => true,
										'editor_height' => 200,
										'media_buttons' => false,
										'value'         => 'Copyright &copy;2018 <a rel="nofollow" href="https://themefuse.com">ThemeFuse</a>. All Rights Reserved',
									),
									'copyright_position' => array(
										'label' => __('Position', 'the-core'),
										'desc' => __('Select the copyright position', 'the-core'),
										'type' => 'image-picker',
										'value' => 'fw-copyright-center',
										'choices' => array(
											'fw-copyright-left' => array(
												'small' => array(
													'height' => 50,
													'src' => $the_core_template_directory . '/images/image-picker/left-position.jpg',
													'title' => __('Left', 'the-core')
												),
											),
											'fw-copyright-center' => array(
												'small' => array(
													'height' => 50,
													'src' => $the_core_template_directory . '/images/image-picker/center-position.jpg',
													'title' => __('Center', 'the-core')
												),
											),
											'fw-copyright-right' => array(
												'small' => array(
													'height' => 50,
													'src' => $the_core_template_directory . '/images/image-picker/right-position.jpg',
													'title' => __('Right', 'the-core')
												),
											),
										),
									),
									'html_label' => array(
										'type' => 'html',
										'html' => '',
										'value' => '',
										'label' => __('Spacing', 'the-core'),
									),
									'copyright_top' => array(
										'label' => false,
										'desc' => __('top', 'the-core'),
										'type' => 'short-text',
										'value' => '40',
									),
									'copyright_bottom' => array(
										'label' => false,
										'desc' => __('bottom ', 'the-core'),
										'type' => 'short-text',
										'value' => '30',
									),
									'footer_bg_color' => array(
										'label' => __('Background Color', 'the-core'),
										'desc' => __('Select the copyright background color', 'the-core'),
										'help' => __('The default color palette can be changed from the', 'the-core') . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __('Colors section', 'the-core') . '</a> ' . __('found in the Theme Settings page', 'the-core'),
										'value' => '',
										'choices' => $the_core_color_settings,
										'type' => 'color-palette'
									),
								)
							)
						)
					)
				)
			),
		)
	),
	'colors_tab' => array(
		'title' => __('Colors', 'the-core'),
		'type' => 'tab',
		'options' => array(
			'colors-box' => array(
				'title' => __('Colors', 'the-core'),
				'type' => 'box',
				'attr' => array('class' => 'fw-color-picker-palette'),
				'options' => array(
					'color_settings' => array(
						'type' => 'multi',
						'label' => false,
						'inner-options' => array(
							'color_1' => array(
								'label' => __('Color Palette', 'the-core'),
								'desc' => __('Color 1', 'the-core'),
								'help' => __('This color affects different elements across the website. Note that changing this color will also change the default color in all the options across the admin.', 'the-core'),
								'type' => 'color-picker',
								'value' => '#d12a5c',
							),
							'color_2' => array(
								'label' => '',
								'desc' => __('Color 2', 'the-core'),
								'help' => __('This color affects different elements across the website. Note that changing this color will also change the default color in all the options across the admin.', 'the-core'),
								'type' => 'color-picker',
								'value' => '#49ca9f',
							),
							'color_3' => array(
								'label' => '',
								'desc' => __('Color 3', 'the-core'),
								'help' => __('This color affects different elements across the website. Note that changing this color will also change the default color in all the options across the admin.', 'the-core'),
								'type' => 'color-picker',
								'value' => '#1f1f1f',
							),
							'color_4' => array(
								'label' => '',
								'desc' => __('Color 4', 'the-core'),
								'help' => __('This color affects different elements across the website. Note that changing this color will also change the default color in all the options across the admin.', 'the-core'),
								'type' => 'color-picker',
								'value' => '#808080',
							),
							'color_5' => array(
								'label' => '',
								'desc' => __('Color 5', 'the-core'),
								'help' => __('This color affects different elements across the website. Note that changing this color will also change the default color in all the options across the admin.', 'the-core'),
								'type' => 'color-picker',
								'value' => '#ebebeb',
							),
						)
					),
					'buttons_settings' => array(
						'type' => 'multi',
						'label' => false,
						'inner-options' => array(
							'links_color_group' => array(
								'type' => 'group',
								'options' => array(
									'links_normal_state' => array(
										'label' => __('Links Color', 'the-core'),
										'desc' => __('normal state', 'the-core'),
										'help' => __('The default color palette can be changed from the', 'the-core') . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __('Colors section', 'the-core') . '</a> ' . __('found in the Theme Settings page', 'the-core'),
										'value' => $the_core_color_settings['color_1'],
										'choices' => $the_core_color_settings,
										'type' => 'color-palette'
									),
									'links_hover_state' => array(
										'label' => '',
										'desc' => __('hover state', 'the-core'),
										'help' => __('The default color palette can be changed from the', 'the-core') . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __('Colors section', 'the-core') . '</a> ' . __('found in the Theme Settings page', 'the-core'),
										'value' => '',
										'choices' => $the_core_color_settings,
										'type' => 'color-palette'
									),
								)
							),
							'buttons_color_group' => array(
								'type' => 'group',
								'attr' => array('class' => 'border-bottom-none'),
								'options' => array(
									'buttons_normal_state' => array(
										'label' => __('Buttons Color', 'the-core'),
										'desc' => __('normal state', 'the-core'),
										'help' => __('The default color palette can be changed from the', 'the-core') . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __('Colors section', 'the-core') . '</a> ' . __('found in the Theme Settings page', 'the-core'),
										'value' => $the_core_color_settings['color_4'],
										'choices' => $the_core_color_settings,
										'type' => 'color-palette'
									),
									'buttons_hover_state' => array(
										'label' => '',
										'desc' => __('hover state', 'the-core'),
										'help' => __('The default color palette can be changed from the', 'the-core') . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __('Colors section', 'the-core') . '</a> ' . __('found in the Theme Settings page', 'the-core'),
										'value' => $the_core_color_settings['color_1'],
										'choices' => $the_core_color_settings,
										'type' => 'color-palette'
									),
								)
							),
						)
					),
				)
			),
		)
	),
	'typography_tab' => array(
		'title' => __('Typography', 'the-core'),
		'type' => 'tab',
		'options' => array(
			'typography-tab' => array(
				'title' => __('Typography', 'the-core'),
				'type' => 'tab',
				'options' => array(
					'typography-box' => array(
						'title' => __('Typography', 'the-core'),
						'type' => 'box',
						'options' => array(
							'typography_settings' => array(
								'type' => 'multi',
								'label' => false,
								'attr' => array(
									'class' => 'fw-option-type-multi-show-borders',
								),
								'inner-options' => array(
									'h1' => array(
										'label' => __('H1', 'the-core'),
										'type' => 'tf-typography',
										'value' => array(
											'google_font' => true,
											'subset' => 'latin',
											'variation' => 'regular',
											'family' => 'Montserrat',
											'style' => '',
											'weight' => '',
											'size' => '55',
											'line-height' => '65',
											'letter-spacing' => '-2',
											'color-palette' => $the_core_color_settings['color_3'],
										)
									),
									'h2' => array(
										'label' => __('H2', 'the-core'),
										'type' => 'tf-typography',
										'value' => array(
											'google_font' => true,
											'subset' => 'latin',
											'variation' => '700',
											'family' => 'Montserrat',
											'style' => '',
											'weight' => '',
											'size' => '40',
											'line-height' => '56',
											'letter-spacing' => '-2',
											'color-palette' => $the_core_color_settings['color_3'],
										)
									),
									'h3' => array(
										'label' => __('H3', 'the-core'),
										'type' => 'tf-typography',
										'value' => array(
											'google_font' => true,
											'subset' => 'latin',
											'variation' => '700',
											'family' => 'Montserrat',
											'style' => '',
											'weight' => '',
											'size' => '32',
											'line-height' => '38',
											'letter-spacing' => '-2',
											'color-palette' => $the_core_color_settings['color_3'],
										)
									),
									'h4' => array(
										'label' => __('H4', 'the-core'),
										'type' => 'tf-typography',
										'value' => array(
											'google_font' => true,
											'subset' => 'latin',
											'variation' => '700',
											'family' => 'Montserrat',
											'style' => '',
											'weight' => '',
											'size' => '26',
											'line-height' => '32',
											'letter-spacing' => '-2',
											'color-palette' => $the_core_color_settings['color_3'],
										)
									),
									'h5' => array(
										'label' => __('H5', 'the-core'),
										'type' => 'tf-typography',
										'value' => array(
											'google_font' => true,
											'subset' => 'latin',
											'variation' => '700',
											'family' => 'Montserrat',
											'style' => '',
											'weight' => '',
											'size' => '19',
											'line-height' => '28',
											'letter-spacing' => '-1',
											'color-palette' => $the_core_color_settings['color_3'],
										)
									),
									'h6' => array(
										'label' => __('H6', 'the-core'),
										'type' => 'tf-typography',
										'value' => array(
											'google_font' => true,
											'subset' => 'latin',
											'variation' => '700',
											'family' => 'Montserrat',
											'style' => '',
											'weight' => '',
											'size' => '14',
											'line-height' => '26',
											'color-palette' => $the_core_color_settings['color_3'],
										)
									),
									'body_text' => array(
										'label' => __('Body Text', 'the-core'),
										'type' => 'tf-typography',
										'value' => array(
											'subset' => 'latin',
											'variation' => 'regular',
											'family' => 'Quattrocento Sans',
											'style' => '',
											'weight' => '',
											'size' => '16.5',
											'line-height' => '28',
											'letter-spacing' => '0',
											'color-palette' => '#a8a8a8',
										),
									),
									'subtitles' => array(
										'label' => __('Subtitles', 'the-core'),
										'type' => 'tf-typography',
										'value' => array(
											'google_font' => true,
											'subset' => 'latin',
											'variation' => '300',
											'family' => 'Merriweather',
											'style' => '',
											'weight' => '',
											'size' => '22',
											'line-height' => '39',
											'letter-spacing' => '0.5',
										),
									),
									'buttons_typography_group' => array(
										'type' => 'group',
										'attr' => array('class' => 'border-bottom-none'),
										'options' => array(
											'buttons' => array(
												'label' => __('Buttons', 'the-core'),
												'type' => 'tf-typography',
												'value' => array(
													'google_font' => true,
													'subset' => 'latin',
													'variation' => 'regular',
													'family' => 'Montserrat',
													'style' => '',
													'weight' => '',
													'size' => '12',
													'line-height' => '30',
													'letter-spacing' => '0',
													'color-palette' => '#ffffff',
												),
											),
											'buttons_hover' => array(
												'label' => '',
												'desc' => __('Select buttons hover color', 'the-core'),
												'help' => __('The default color palette can be changed from the', 'the-core') . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __('Colors section', 'the-core') . '</a> ' . __('found in the Theme Settings page', 'the-core'),
												'value' => '#ffffff',
												'choices' => $the_core_color_settings,
												'type' => 'color-palette'
											),
										)
									),
									'blog-typography-box' => array(
										'title' => __('Blog', 'the-core'),
										'attr'  => array('class' => 'prevent-auto-close'),
										'type'  => 'box',
										'options' => array(
											'widgets_title_typography_group' => array(
												'type' => 'group',
												'options' => array(
													'widgets_title' => array(
														'label' => __('Blog Widgets Title Links', 'the-core'),
														'type' => 'tf-typography',
														'value' => array(
															'subset' => 'latin',
															'variation' => '700',
															'family' => 'Merriweather',
															'style' => '',
															'weight' => '',
															'size' => '14',
															'line-height' => '26',
															'letter-spacing' => '1',
														),
													),
													'widgets_title_hover' => array(
														'label' => '',
														'desc' => __('Select blog widgets title hover color', 'the-core'),
														'help' => __('The default color palette can be changed from the', 'the-core') . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __('Colors section', 'the-core') . '</a> ' . __('found in the Theme Settings page', 'the-core'),
														'value' => $the_core_color_settings['color_1'],
														'choices' => $the_core_color_settings,
														'type' => 'color-palette'
													),
													'widgets_spacing' => array(
														'type' => 'short-text',
														'value' => '80',
														'label' => __('Blog Widgets Spacing', 'the-core'),
														'desc' => __('Select the blog widgets spacing in pixels', 'the-core'),
													),
												)
											),
											'blog_meta_typography_group' => array(
												'type' => 'group',
												'options' => array(
													'blog_meta_title' => array(
														'label' => __('Blog Meta', 'the-core'),
														'type' => 'tf-typography',
														'value' => array(
															'google_font' => true,
															'subset' => 'latin',
															'variation' => 'regular',
															'family' => 'Montserrat',
															'style' => '',
															'weight' => '',
															'size' => '16',
															'line-height' => '16',
															'letter-spacing' => '0',
														),
													),
													'blog_meta_title_hover' => array(
														'label' => '',
														'desc' => __('Select blog meta hover color', 'the-core'),
														'help' => __('The default color palette can be changed from the', 'the-core') . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __('Colors section', 'the-core') . '</a> ' . __('found in the Theme Settings page', 'the-core'),
														'value' => $the_core_color_settings['color_1'],
														'choices' => $the_core_color_settings,
														'type' => 'color-palette'
													),
													'blog_meta_text_transform' => array(
														'type' => 'switch',
														'value' => 'none',
														'label' => '',
														'desc' => __('Select the lettercase for the blog meta', 'the-core'),
														'left-choice' => array(
															'value' => 'none',
															'label' => __('NORMAL', 'the-core'),
														),
														'right-choice' => array(
															'value' => 'uppercase',
															'label' => __('UPPERCASE', 'the-core'),
														)
													),
												)
											),
										)
									),
									'header-typography-box' => array(
										'title' => __('Header', 'the-core'),
										'attr'  => array('class' => 'prevent-auto-close'),
										'type'  => 'box',
										'options' => array(
											'header_top_bar_text' => array(
												'label' => __('Header Top Bar', 'the-core'),
												'type' => 'tf-typography',
												'value' => array(
													'subset' => 'latin',
													'variation' => 'regular',
													'family' => 'NTR',
													'style' => '',
													'weight' => '',
													'size' => '16',
													'line-height' => '35',
													'letter-spacing' => '0.3',
													'color-palette' => '#ffffff',
												),
											),
											'header_menu_group' => array(
												'type' => 'group',
												'attr' => array('class' => 'border-bottom-none'),
												'options' => array(
													'header_menu' => array(
														'label' => __('Header Menu', 'the-core'),
														'type' => 'tf-typography',
														'value' => array(
															'google_font' => true,
															'subset' => 'latin',
															'variation' => 'regular',
															'family' => 'Montserrat',
															'style' => '',
															'weight' => '',
															'size' => '13',
															'line-height' => '30',
															'letter-spacing' => '0',
															'color-palette' => $the_core_color_settings['color_3'],
														),
													),
													'header_menu_hover' => array(
														'label' => '',
														'desc' => __('Select the menu items hover color', 'the-core'),
														'help' => __('The default color palette can be changed from the', 'the-core') . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __('Colors section', 'the-core') . '</a> ' . __('found in the Theme Settings page', 'the-core'),
														'value' => $the_core_color_settings['color_2'],
														'choices' => $the_core_color_settings,
														'type' => 'color-palette'
													),
													'header_menu_items_spacing' => array(
														'type' => 'short-text',
														'value' => '40',
														'label' => __('Menu Items Spacing', 'the-core'),
														'desc' => __('Select the menu items spacing in pixels', 'the-core'),
													)
												)
											),
										)
									),
									'footer-typography-box' => array(
										'title' => __('Footer', 'the-core'),
										'attr'  => array('class' => 'prevent-auto-close'),
										'type'  => 'box',
										'options' => array(
											'footer_menu_group' => array(
												'type' => 'group',
												'options' => array(
													'footer_menu' => array(
														'label' => __('Footer Menu', 'the-core'),
														'type' => 'typography',
														'type' => 'tf-typography',
														'value' => array(
															'google_font' => true,
															'subset' => 'latin',
															'variation' => 'regular',
															'family' => 'Montserrat',
															'style' => '',
															'weight' => '',
															'size' => '13',
															'line-height' => '84',
															'letter-spacing' => '1',
														),
													),
													'footer_menu_hover' => array(
														'label' => '',
														'desc' => __('Select the menu items hover color', 'the-core'),
														'help' => __('The default color palette can be changed from the', 'the-core') . ' <a target="_blank" href="' . $the_core_admin_url . 'themes.php?page=fw-settings&_focus_tab=fw-options-tab-colors_tab">' . __('Colors section', 'the-core') . '</a> ' . __('found in the Theme Settings page', 'the-core'),
														'value' => '',
														'choices' => $the_core_color_settings,
														'type' => 'color-palette'
													),
													'footer_menu_items_spacing' => array(
														'type' => 'short-text',
														'value' => '35',
														'label' => __('Menu Items Spacing', 'the-core'),
														'desc' => __('Select the menu items spacing in pixels', 'the-core'),
													)
												)
											),
											'footer_copyright_typography' => array(
												'label' => __('Footer Copyright', 'the-core'),
												'type' => 'tf-typography',
												'value' => array(
													'google_font' => true,
													'subset' => 'latin',
													'variation' => 'regular',
													'family' => 'Quattrocento Sans',
													'style' => '',
													'weight' => '',
													'size' => '15',
													'line-height' => '45',
													'letter-spacing' => '0',
													'color-palette' => '#686869',
												),
											),
										)
									),
									'forms-typography-box' => array(
										'title' => __('Forms', 'the-core'),
										'attr'  => array('class' => 'prevent-auto-close'),
										'type'  => 'box',
										'options' => array(
											'forms_typography_group' => array(
												'type' => 'group',
												'options' => array(
													'form_labels' => array(
														'label' => __('Form Labels', 'the-core'),
														'type' => 'tf-typography',
														'value' => array(
															'google_font' => true,
															'subset' => 'latin',
															'variation' => 'regular',
															'family' => 'Montserrat',
															'style' => '',
															'weight' => '',
															'size' => '12',
															'line-height' => '30',
															'letter-spacing' => '0',
															'color-palette' => '#b2b2b2',
														),
													),
													'form_labels_uppercase' => array(
														'type' => 'switch',
														'value' => 'uppercase',
														'label' => '',
														'desc' => __('Uppercase form labels?', 'the-core'),
														'left-choice' => array(
															'value' => 'none',
															'label' => __('No', 'the-core'),
														),
														'right-choice' => array(
															'value' => 'uppercase',
															'label' => __('Yes', 'the-core'),
														)
													),
													'form_inputs' => array(
														'label' => __('Form Inputs', 'the-core'),
														'type' => 'tf-typography',
														'value' => array(
															'google_font' => true,
															'subset' => 'latin',
															'variation' => '700',
															'family' => 'Quattrocento Sans',
															'style' => '',
															'weight' => '',
															'size' => '16.5',
															'line-height' => '28',
															'letter-spacing' => '0',
															'color-palette' => $the_core_color_settings['color_3'],
														),
													),
												)
											),
										)
									),
								)
							)
						)
					),
				)
			),
		)
	),
	'custom_css_tab' => array(
		'title' => __('Custom CSS', 'the-core'),
		'type' => 'tab',
		'options' => array(
			'css-box' => array(
				'title' => __('CSS', 'the-core'),
				'type' => 'box',
				'options' => array(
					'quick_css' => array(
						'label' => __('Quick CSS', 'the-core'),
						'desc' => __('Quick Css changes that will be applied to the theme', 'the-core'),
						'help' => __('If you need to change major portions of the theme please add your custom CSS in the <strong>style.css</strong> file. This file is located on your server in the <strong>/child-theme/</strong> style.css', 'the-core'),
						'type' => 'textarea',
						'value' => '',
					),
				)
			),
		)
	),
	$the_core_requirements_tab,
);