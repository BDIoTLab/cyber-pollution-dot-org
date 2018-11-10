<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}

/**
 * Get values from admin styling and overwrite them when processing less files
 */

$the_core_settings_option = function_exists( 'fw_get_db_settings_option' ) ? fw_get_db_settings_option() : array();
if ( ! defined( 'FW' ) || empty( $the_core_settings_option ) ) {
	return;
}

global $the_core_less_variables;
$the_core_typography_settings = $the_core_settings_option['typography_settings'];
$the_core_color_settings      = $the_core_settings_option['color_settings'];
$the_core_website_background  = $the_core_settings_option['website_background'];
$the_core_header_settings     = $the_core_settings_option['header_settings'];
$the_core_footer_settings     = $the_core_settings_option['footer_settings'];
$the_core_logo_settings       = $the_core_settings_option['logo_settings'];

if ( isset( $the_core_color_settings['color_1'] ) && $the_core_color_settings['color_1'] != '' ) {
	$the_core_less_variables['theme-color-1'] = $the_core_color_settings['color_1'];
}
if ( isset( $the_core_color_settings['color_2'] ) && $the_core_color_settings['color_2'] != '' ) {
	$the_core_less_variables['theme-color-2'] = $the_core_color_settings['color_2'];
}
if ( isset( $the_core_color_settings['color_3'] ) && $the_core_color_settings['color_3'] != '' ) {
	$the_core_less_variables['theme-color-3'] = $the_core_color_settings['color_3'];
}
if ( isset( $the_core_color_settings['color_4'] ) && $the_core_color_settings['color_4'] != '' ) {
	$the_core_less_variables['theme-color-4'] = $the_core_color_settings['color_4'];
}
if ( isset( $the_core_color_settings['color_5'] ) && $the_core_color_settings['color_5'] != '' ) {
	$the_core_less_variables['theme-color-5'] = $the_core_color_settings['color_5'];
}

if ( isset( $the_core_website_background['website_bg_color'] ) && $the_core_website_background['website_bg_color'] != '' ) {
	$the_core_less_variables['body-bg'] = $the_core_website_background['website_bg_color'];
}

// boxed site width
if ( isset( $the_core_settings_option['container_site_type']['selected'] ) && $the_core_settings_option['container_site_type']['selected'] == 'fw-side-boxed' ) {
	$the_core_less_variables['fw-page-side-boxed'] = $the_core_settings_option['container_site_type']['fw-side-boxed']['site_width'] . 'px';
	if ( ! empty( $the_core_settings_option['container_site_type']['fw-side-boxed']['site_margin'] ) ) {
		$the_core_less_variables['fw-site-margin-bottom'] = $the_core_less_variables['fw-site-margin-top'] = $the_core_settings_option['container_site_type']['fw-side-boxed']['site_margin'] . 'px';
	}

	if ( isset( $the_core_settings_option['container_site_type']['fw-side-boxed']['boxed_container_bg'] ) && ! empty( $the_core_settings_option['container_site_type']['fw-side-boxed']['boxed_container_bg'] ) ) {
		$the_core_less_variables['container-bg'] = $the_core_settings_option['container_site_type']['fw-side-boxed']['boxed_container_bg'];
	}
}

// website background
if ( isset( $the_core_website_background['website_bg']['type'] ) && $the_core_website_background['website_bg']['type'] == 'custom' ) {
	// custom image
	if ( isset( $the_core_website_background['website_bg']['data']['icon'] ) && ! empty( $the_core_website_background['website_bg']['data']['icon'] ) ) {
		$the_core_less_variables['body-bg-image'] = '"' . the_core_change_original_link_with_cdn( $the_core_website_background['website_bg']['data']['icon'] ) . '"';
	}
	$the_core_less_variables['body-bg-repeat'] = 'repeat';
} elseif ( isset( $the_core_website_background['website_bg']['type'] ) && $the_core_website_background['website_bg']['type'] == 'predefined' ) {
	if ( isset( $the_core_website_background['website_bg']['predefined'] ) && $the_core_website_background['website_bg']['predefined'] != 'none' ) {
		// predefined image
		$the_core_less_variables['body-bg-image']  = '"' . the_core_change_original_link_with_cdn( $the_core_website_background['website_bg']['data']['css']['background-image'] ) . '"';
		$the_core_less_variables['body-bg-repeat'] = $the_core_website_background['website_bg']['data']['css']['background-repeat'];
	}
}

// posts border size & color
if ( isset( $the_core_settings_option['posts_settings']['add_image_border']['fw-block-image-frame']['border_size'] ) && ! empty( $the_core_settings_option['posts_settings']['add_image_border']['fw-block-image-frame']['border_size'] ) ) {
	$the_core_less_variables['fw-block-image-frame-size'] = $the_core_settings_option['posts_settings']['add_image_border']['fw-block-image-frame']['border_size'] . 'px';
}

if ( isset( $the_core_settings_option['posts_settings']['add_image_border']['fw-block-image-frame']['border_color']['id'] ) ) {
	if ( $the_core_settings_option['posts_settings']['add_image_border']['fw-block-image-frame']['border_color']['id'] == 'fw-custom' ) {
		if ( ! empty( $the_core_settings_option['posts_settings']['add_image_border']['fw-block-image-frame']['border_color']['color'] ) ) {
			$the_core_less_variables['fw-block-image-frame-color'] = $the_core_settings_option['posts_settings']['add_image_border']['fw-block-image-frame']['border_color']['color'];
		}
	} else {
		$the_core_less_variables['fw-block-image-frame-color'] = $the_core_color_settings[ $the_core_settings_option['posts_settings']['add_image_border']['fw-block-image-frame']['border_color']['id'] ];
	}
}

// post grid bg color
if ( isset( $the_core_settings_option['posts_settings']['grid_bg_color'] ) ) {
	$grid_bg_color = the_core_get_color_palette_color_and_class( $the_core_settings_option['posts_settings']['grid_bg_color'], array( 'return_color' => true ) );
	if ( ! empty( $grid_bg_color['color'] ) ) {
		$the_core_less_variables['fw-postlist-grid-content-bg'] = $grid_bg_color['color'];
	}
}

// links and buttons colors
if ( isset( $the_core_settings_option['buttons_settings']['links_normal_state'] ) && ! empty( $the_core_settings_option['buttons_settings']['links_normal_state'] ) ) {
	if ( isset( $the_core_settings_option['buttons_settings']['links_normal_state']['id'] ) && $the_core_settings_option['buttons_settings']['links_normal_state']['id'] == 'fw-custom' ) {
		if ( ! empty( $the_core_settings_option['buttons_settings']['links_normal_state']['color'] ) ) {
			$the_core_less_variables['link-color'] = $the_core_settings_option['buttons_settings']['links_normal_state']['color'];
		}
		else {
			$the_core_less_variables['link-color'] = $the_core_less_variables['theme-color-2'];
		}
	} elseif ( isset( $the_core_settings_option['buttons_settings']['links_normal_state']['id'] ) ) {
		$the_core_less_variables['link-color'] = $the_core_color_settings[ $the_core_settings_option['buttons_settings']['links_normal_state']['id'] ];
	}
}
if ( isset( $the_core_settings_option['buttons_settings']['links_hover_state'] ) && ! empty( $the_core_settings_option['buttons_settings']['links_hover_state'] ) ) {
	if ( isset( $the_core_settings_option['buttons_settings']['links_hover_state']['id'] ) && $the_core_settings_option['buttons_settings']['links_hover_state']['id'] == 'fw-custom' ) {
		if ( ! empty( $the_core_settings_option['buttons_settings']['links_hover_state']['color'] ) ) {
			$the_core_less_variables['link-hover-color'] = $the_core_settings_option['buttons_settings']['links_hover_state']['color'];
		}
	} elseif ( isset( $the_core_settings_option['buttons_settings']['links_hover_state']['id'] ) ) {
		$the_core_less_variables['link-hover-color'] = $the_core_color_settings[ $the_core_settings_option['buttons_settings']['links_hover_state']['id'] ];
	}
}

if ( isset( $the_core_settings_option['buttons_settings']['buttons_normal_state'] ) && ! empty( $the_core_settings_option['buttons_settings']['buttons_normal_state'] ) ) {
	if ( isset( $the_core_settings_option['buttons_settings']['buttons_normal_state']['id'] ) && $the_core_settings_option['buttons_settings']['buttons_normal_state']['id'] == 'fw-custom' ) {
		if ( ! empty( $the_core_settings_option['buttons_settings']['buttons_normal_state']['color'] ) ) {
			$the_core_less_variables['fw-btn-color'] = $the_core_settings_option['buttons_settings']['buttons_normal_state']['color'];
		} else {
			// for default value if is empty custom color
			$the_core_less_variables['fw-btn-color'] = $the_core_less_variables['theme-color-1'];
		}
	} elseif ( isset( $the_core_settings_option['buttons_settings']['buttons_normal_state']['id'] ) ) {
		$the_core_less_variables['fw-btn-color'] = $the_core_color_settings[ $the_core_settings_option['buttons_settings']['buttons_normal_state']['id'] ];
	}
}

if ( isset( $the_core_settings_option['buttons_settings']['buttons_hover_state'] ) && ! empty( $the_core_settings_option['buttons_settings']['buttons_hover_state'] ) ) {
	if ( isset( $the_core_settings_option['buttons_settings']['buttons_hover_state']['id'] ) && $the_core_settings_option['buttons_settings']['buttons_hover_state']['id'] == 'fw-custom' ) {
		if ( ! empty( $the_core_settings_option['buttons_settings']['buttons_hover_state']['color'] ) ) {
			$the_core_less_variables['fw-btn-hover-color'] = $the_core_settings_option['buttons_settings']['buttons_hover_state']['color'];
		} else {
			// for default value if is empty custom color
			$the_core_less_variables['fw-btn-hover-color'] = $the_core_less_variables['theme-color-2'];
		}
	} elseif ( isset( $the_core_settings_option['buttons_settings']['buttons_hover_state']['id'] ) ) {
		$the_core_less_variables['fw-btn-hover-color'] = $the_core_color_settings[ $the_core_settings_option['buttons_settings']['buttons_hover_state']['id'] ];
	}
}

// h1
if ( isset( $the_core_typography_settings['h1'] ) ) {
	$font_styles                                  = the_core_get_font_array( $the_core_typography_settings['h1'], $the_core_color_settings );
	$the_core_less_variables['fw-h1-font-family'] = $font_styles['font-family'];
	( $font_styles['font-size'] != 'px' ) ? $the_core_less_variables['fw-h1-font-size'] = $font_styles['font-size'] : '';
	( $font_styles['line-height'] != 'px' ) ? $the_core_less_variables['fw-h1-line-height'] = $font_styles['line-height'] : '';
	( $font_styles['letter-spacing'] != 'px' ) ? $the_core_less_variables['fw-h1-letter-spacing'] = $font_styles['letter-spacing'] : '';
	! empty( $font_styles['color'] ) ? $the_core_less_variables['fw-h1-color'] = $font_styles['color'] : '';
	$the_core_less_variables['fw-h1-font-style']  = $font_styles['font-style'];
	$the_core_less_variables['fw-h1-font-weight'] = $font_styles['font-weight'];
}

// h2
if ( isset( $the_core_typography_settings['h2'] ) ) {
	$font_styles                                  = the_core_get_font_array( $the_core_typography_settings['h2'], $the_core_color_settings );
	$the_core_less_variables['fw-h2-font-family'] = $font_styles['font-family'];
	( $font_styles['font-size'] != 'px' ) ? $the_core_less_variables['fw-h2-font-size'] = $font_styles['font-size'] : '';
	( $font_styles['line-height'] != 'px' ) ? $the_core_less_variables['fw-h2-line-height'] = $font_styles['line-height'] : '';
	( $font_styles['letter-spacing'] != 'px' ) ? $the_core_less_variables['fw-h2-letter-spacing'] = $font_styles['letter-spacing'] : '';
	! empty( $font_styles['color'] ) ? $the_core_less_variables['fw-h2-color'] = $font_styles['color'] : '';
	$the_core_less_variables['fw-h2-font-style']  = $font_styles['font-style'];
	$the_core_less_variables['fw-h2-font-weight'] = $font_styles['font-weight'];
}

// h3
if ( isset( $the_core_typography_settings['h3'] ) ) {
	$font_styles                                  = the_core_get_font_array( $the_core_typography_settings['h3'], $the_core_color_settings );
	$the_core_less_variables['fw-h3-font-family'] = $font_styles['font-family'];
	( $font_styles['font-size'] != 'px' ) ? $the_core_less_variables['fw-h3-font-size'] = $font_styles['font-size'] : '';
	( $font_styles['line-height'] != 'px' ) ? $the_core_less_variables['fw-h3-line-height'] = $font_styles['line-height'] : '';
	( $font_styles['letter-spacing'] != 'px' ) ? $the_core_less_variables['fw-h3-letter-spacing'] = $font_styles['letter-spacing'] : '';
	! empty( $font_styles['color'] ) ? $the_core_less_variables['fw-h3-color'] = $font_styles['color'] : '';
	$the_core_less_variables['fw-h3-font-style']  = $font_styles['font-style'];
	$the_core_less_variables['fw-h3-font-weight'] = $font_styles['font-weight'];
}

// h4
if ( isset( $the_core_typography_settings['h4'] ) ) {
	$font_styles                                  = the_core_get_font_array( $the_core_typography_settings['h4'], $the_core_color_settings );
	$the_core_less_variables['fw-h4-font-family'] = $font_styles['font-family'];
	( $font_styles['font-size'] != 'px' ) ? $the_core_less_variables['fw-h4-font-size'] = $font_styles['font-size'] : '';
	( $font_styles['line-height'] != 'px' ) ? $the_core_less_variables['fw-h4-line-height'] = $font_styles['line-height'] : '';
	( $font_styles['letter-spacing'] != 'px' ) ? $the_core_less_variables['fw-h4-letter-spacing'] = $font_styles['letter-spacing'] : '';
	! empty( $font_styles['color'] ) ? $the_core_less_variables['fw-h4-color'] = $font_styles['color'] : '';
	$the_core_less_variables['fw-h4-font-style']  = $font_styles['font-style'];
	$the_core_less_variables['fw-h4-font-weight'] = $font_styles['font-weight'];
}

// h5
if ( isset( $the_core_typography_settings['h5'] ) ) {
	$font_styles                                  = the_core_get_font_array( $the_core_typography_settings['h5'], $the_core_color_settings );
	$the_core_less_variables['fw-h5-font-family'] = $font_styles['font-family'];
	( $font_styles['font-size'] != 'px' ) ? $the_core_less_variables['fw-h5-font-size'] = $font_styles['font-size'] : '';
	( $font_styles['line-height'] != 'px' ) ? $the_core_less_variables['fw-h5-line-height'] = $font_styles['line-height'] : '';
	( $font_styles['letter-spacing'] != 'px' ) ? $the_core_less_variables['fw-h5-letter-spacing'] = $font_styles['letter-spacing'] : '';
	! empty( $font_styles['color'] ) ? $the_core_less_variables['fw-h5-color'] = $font_styles['color'] : '';
	$the_core_less_variables['fw-h5-font-style']  = $font_styles['font-style'];
	$the_core_less_variables['fw-h5-font-weight'] = $font_styles['font-weight'];
}

// h6
if ( isset( $the_core_typography_settings['h6'] ) ) {
	$font_styles                                  = the_core_get_font_array( $the_core_typography_settings['h6'], $the_core_color_settings );
	$the_core_less_variables['fw-h6-font-family'] = $font_styles['font-family'];
	( $font_styles['font-size'] != 'px' ) ? $the_core_less_variables['fw-h6-font-size'] = $font_styles['font-size'] : '';
	( $font_styles['line-height'] != 'px' ) ? $the_core_less_variables['fw-h6-line-height'] = $font_styles['line-height'] : '';
	( $font_styles['letter-spacing'] != 'px' ) ? $the_core_less_variables['fw-h6-letter-spacing'] = $font_styles['letter-spacing'] : '';
	! empty( $font_styles['color'] ) ? $the_core_less_variables['fw-h6-color'] = $font_styles['color'] : '';
	$the_core_less_variables['fw-h6-font-style']  = $font_styles['font-style'];
	$the_core_less_variables['fw-h6-font-weight'] = $font_styles['font-weight'];
}

// subtitles
if ( isset( $the_core_typography_settings['subtitles'] ) ) {
	$font_styles                                 = the_core_get_font_array( $the_core_typography_settings['subtitles'], $the_core_color_settings );
	$the_core_less_variables['subtitles-family'] = $font_styles['font-family'];
	( $font_styles['font-size'] != 'px' ) ? $the_core_less_variables['subtitles-size'] = $font_styles['font-size'] : '';
	( $font_styles['line-height'] != 'px' ) ? $the_core_less_variables['subtitles-line-height'] = $font_styles['line-height'] : '';
	( $font_styles['letter-spacing'] != 'px' ) ? $the_core_less_variables['subtitles-letter-spacing'] = $font_styles['letter-spacing'] : '';
	! empty( $font_styles['color'] ) ? $the_core_less_variables['subtitles-color'] = $font_styles['color'] : '';
	$the_core_less_variables['subtitles-style']  = $font_styles['font-style'];
	$the_core_less_variables['subtitles-weight'] = $font_styles['font-weight'];
}

// body
if ( isset( $the_core_typography_settings['body_text'] ) ) {
	$font_styles                                 = the_core_get_font_array( $the_core_typography_settings['body_text'], $the_core_color_settings );
	$the_core_less_variables['font-family-base'] = $font_styles['font-family'];
	( $font_styles['font-size'] != 'px' ) ? $the_core_less_variables['font-size-base'] = $font_styles['font-size'] : '';
	( $font_styles['line-height'] != 'px' ) ? $the_core_less_variables['line-height-base'] = $font_styles['line-height'] : '';
	( $font_styles['letter-spacing'] != 'px' ) ? $the_core_less_variables['font-letter-spacing-base'] = $font_styles['letter-spacing'] : '';
	! empty( $font_styles['color'] ) ? $the_core_less_variables['text-color'] = $font_styles['color'] : '';
	$the_core_less_variables['font-style-base']  = $font_styles['font-style'];
	$the_core_less_variables['font-weight-base'] = $font_styles['font-weight'];
}

// top-bar
if ( isset( $the_core_typography_settings['header_top_bar_text'] ) ) {
	$font_styles                                       = the_core_get_font_array( $the_core_typography_settings['header_top_bar_text'], $the_core_color_settings );
	$the_core_less_variables['fw-top-bar-font-family'] = $font_styles['font-family'];
	( $font_styles['font-size'] != 'px' ) ? $the_core_less_variables['fw-top-bar-font-size-text'] = $font_styles['font-size'] : '';
	( $font_styles['line-height'] != 'px' ) ? $the_core_less_variables['fw-top-bar-height'] = $font_styles['line-height'] : '';
	( $font_styles['letter-spacing'] != 'px' ) ? $the_core_less_variables['fw-top-bar-letter-spacing'] = $font_styles['letter-spacing'] : '';
	! empty( $font_styles['color'] ) ? $the_core_less_variables['fw-top-bar-text-color'] = $font_styles['color'] : '';
	$the_core_less_variables['fw-top-bar-font-style']  = $font_styles['font-style'];
	$the_core_less_variables['fw-top-bar-font-weight'] = $font_styles['font-weight'];
}

// header menu
if ( isset( $the_core_typography_settings['header_menu'] ) ) {
	$font_styles                                    = the_core_get_font_array( $the_core_typography_settings['header_menu'], $the_core_color_settings );
	$the_core_less_variables['fw-menu-font-family'] = $font_styles['font-family'];
	( $font_styles['font-size'] != 'px' ) ? $the_core_less_variables['fw-menu-item-font-size'] = $font_styles['font-size'] : '';
	( $font_styles['line-height'] != 'px' ) ? $the_core_less_variables['fw-menu-item-height'] = $font_styles['line-height'] : '';
	( $font_styles['letter-spacing'] != 'px' ) ? $the_core_less_variables['fw-menu-letter-spacing'] = $font_styles['letter-spacing'] : '';
	$the_core_less_variables['fw-top-menu-color']   = ! empty( $font_styles['color'] ) ? $font_styles['color'] : $the_core_less_variables['theme-color-3'];
	$the_core_less_variables['fw-menu-font-style']  = $font_styles['font-style'];
	$the_core_less_variables['fw-menu-font-weight'] = $font_styles['font-weight'];
}
if ( isset( $the_core_typography_settings['header_menu_items_spacing'] ) ) {
	$the_core_less_variables['fw-menu-item-margin-left'] = $the_core_typography_settings['header_menu_items_spacing'] . 'px';
}

// header menu hover color
if ( isset( $the_core_typography_settings['header_menu_hover']['id'] ) && $the_core_typography_settings['header_menu_hover']['id'] == 'fw-custom' ) {
	if ( ! empty( $the_core_typography_settings['header_menu_hover']['color'] ) ) {
		$the_core_less_variables['fw-top-menu-line-color'] = $the_core_less_variables['fw-top-menu-item-color-hover'] = $the_core_typography_settings['header_menu_hover']['color'];
	} else {
		$the_core_less_variables['fw-top-menu-line-color'] = $the_core_less_variables['fw-top-menu-item-color-hover'] = $the_core_less_variables['theme-color-2'];
	}
} elseif ( isset( $the_core_typography_settings['header_menu_hover']['id'] ) ) {
	$the_core_less_variables['fw-top-menu-line-color'] = $the_core_less_variables['fw-top-menu-item-color-hover'] = $the_core_color_settings[ $the_core_typography_settings['header_menu_hover']['id'] ];
}

// mobile menu
if ( isset( $the_core_header_settings['mobile_menu_options']['mobile_screen'] ) ) {
	$the_core_less_variables['fw-mobile-menu-screen-size'] = (int) $the_core_header_settings['mobile_menu_options']['mobile_screen'];
}

if ( isset( $the_core_header_settings['mobile_menu_options']['border']['selected'] ) && 'yes' == $the_core_header_settings['mobile_menu_options']['border']['selected'] ) {
	if( !empty($the_core_header_settings['mobile_menu_options']['border']['yes']['border_size']) ) {
		$the_core_less_variables['fw-mobile-menu-border-size'] = $the_core_header_settings['mobile_menu_options']['border']['yes']['border_size']. 'px';
	}

	$border_color = the_core_get_color_palette_color_and_class( $the_core_header_settings['mobile_menu_options']['border']['yes']['border_color'], array( 'return_color' => true ) );
	if ( ! empty( $border_color['color'] ) ) {
		$the_core_less_variables['fw-mobile-menu-border-color'] = $border_color['color'];
	}
}

// mobile menu socials
if ( isset( $the_core_header_settings['mobile_menu_options']['mobile_menu_socials']['selected_value'] ) && 'yes' == $the_core_header_settings['mobile_menu_options']['mobile_menu_socials']['selected_value'] ) {
	$the_core_less_variables['fw-mobile-menu-social-size']  = $the_core_header_settings['mobile_menu_options']['mobile_menu_socials']['yes']['mobile_menu_icon_size'];
	$socials_color = the_core_get_color_palette_color_and_class( $the_core_header_settings['mobile_menu_options']['mobile_menu_socials']['yes']['mobile_menu_socials_color'], array( 'return_color' => true ) );
	if ( ! empty( $socials_color['color'] ) ) {
		$the_core_less_variables['fw-mobile-menu-social-color'] = $socials_color['color'];
	}
}

// mobile menu typography
if ( isset( $the_core_header_settings['mobile_menu_options']['menu_typography'] ) ) {
	$font_styles                                           = the_core_get_font_array( $the_core_header_settings['mobile_menu_options']['menu_typography'], $the_core_color_settings );
	$the_core_less_variables['fw-mobile-menu-font-family'] = $font_styles['font-family'];
	( $font_styles['font-size'] != 'px' ) ? $the_core_less_variables['fw-mobile-menu-font-size'] = $font_styles['font-size'] : '';
	( $font_styles['line-height'] != 'px' ) ? $the_core_less_variables['fw-mobile-menu-line-height'] = $font_styles['line-height'] : '';
	( $font_styles['letter-spacing'] != 'px' ) ? $the_core_less_variables['fw-mobile-menu-letter-spacing'] = $font_styles['letter-spacing'] : '';
	! empty( $font_styles['color'] ) ? $the_core_less_variables['fw-mobile-menu-color'] = $font_styles['color'] : '';
	$the_core_less_variables['fw-mobile-menu-font-style']  = $font_styles['font-style'];
	$the_core_less_variables['fw-mobile-menu-font-weight'] = $font_styles['font-weight'];
}

if ( isset( $the_core_header_settings['mobile_menu_options']['menu_text_transform'] ) ) {
	$the_core_less_variables['fw-mobile-menu-text-transform'] = $the_core_header_settings['mobile_menu_options']['menu_text_transform'];
}

// mobile menu background
if ( isset( $the_core_header_settings['mobile_menu_options']['background_options'] ) ) {
	if ( 'color' == $the_core_header_settings['mobile_menu_options']['background_options']['background'] ) {
		$mobile_bg_color = the_core_get_color_palette_color_and_class( $the_core_header_settings['mobile_menu_options']['background_options']['color']['background_color'], array( 'return_color' => true ) );
		if ( ! empty( $mobile_bg_color['color'] ) ) {
			$the_core_less_variables['fw-mobile-menu-bg-color'] = $mobile_bg_color['color'];
		}
	} elseif ( 'image' == $the_core_header_settings['mobile_menu_options']['background_options']['background'] ) {
		// color
		$mobile_bg_color = the_core_get_color_palette_color_and_class( $the_core_header_settings['mobile_menu_options']['background_options']['image']['background_color'], array( 'return_color' => true ));
		if ( ! empty( $mobile_bg_color['color'] ) ) {
			$the_core_less_variables['fw-mobile-menu-bg-color'] = $mobile_bg_color['color'];
		}

		// image
		if ( !empty( $the_core_header_settings['mobile_menu_options']['background_options']['image']['background_image'] ) && isset( $the_core_header_settings['mobile_menu_options']['background_options']['image']['background_image']['data']['icon'] ) ) {
			$the_core_less_variables['fw-mobile-menu-bg-image'] = $the_core_header_settings['mobile_menu_options']['background_options']['image']['background_image']['data']['icon'];
		}

		// repeat options
		$the_core_less_variables['fw-mobile-menu-bg-repeat'] = $the_core_header_settings['mobile_menu_options']['background_options']['image']['repeat'];
		$the_core_less_variables['fw-mobile-menu-bg-position-x'] = $the_core_header_settings['mobile_menu_options']['background_options']['image']['bg_position_x'];
		$the_core_less_variables['fw-mobile-menu-bg-position-y'] = $the_core_header_settings['mobile_menu_options']['background_options']['image']['bg_position_y'];
		$the_core_less_variables['fw-mobile-menu-bg-size'] = $the_core_header_settings['mobile_menu_options']['background_options']['image']['bg_size'];

		// overlay options
		if ( 'yes' == $the_core_header_settings['mobile_menu_options']['background_options']['image']['overlay_options']['overlay'] ) {
			$mobile_opacity_color = the_core_get_color_palette_color_and_class( $the_core_header_settings['mobile_menu_options']['background_options']['image']['overlay_options']['yes']['background'], array( 'return_color' => true ));
			if ( ! empty( $mobile_opacity_color['color'] ) ) {
				$the_core_less_variables['fw-mobile-menu-overlay-color'] = $mobile_opacity_color['color'];
			}

			// opacity
			$the_core_less_variables['fw-mobile-menu-overlay-opacity'] = (int)$the_core_header_settings['mobile_menu_options']['background_options']['image']['overlay_options']['yes']['overlay_opacity_image'] / 100;
		}
	}
}

// footer menu
if ( isset( $the_core_typography_settings['footer_menu'] ) ) {
	$font_styles                                           = the_core_get_font_array( $the_core_typography_settings['footer_menu'], $the_core_color_settings );
	$the_core_less_variables['fw-bottom-menu-font-family'] = $font_styles['font-family'];
	( $font_styles['font-size'] != 'px' ) ? $the_core_less_variables['fw-bottom-menu-font-size'] = $font_styles['font-size'] : '';
	( $font_styles['line-height'] != 'px' ) ? $the_core_less_variables['fw-bottom-menu-item-height'] = $font_styles['line-height'] : '';
	( $font_styles['letter-spacing'] != 'px' ) ? $the_core_less_variables['fw-bottom-menu-letter-spacing'] = $font_styles['letter-spacing'] : '';
	! empty( $font_styles['color'] ) ? $the_core_less_variables['fw-footer-middle-text'] = $font_styles['color'] : '';
	$the_core_less_variables['fw-bottom-menu-font-style']  = $font_styles['font-style'];
	$the_core_less_variables['fw-bottom-menu-font-weight'] = $font_styles['font-weight'];
}
if ( isset( $the_core_typography_settings['footer_menu_items_spacing'] ) ) {
	$the_core_less_variables['fw-bottom-menu-item-margin'] = $the_core_typography_settings['footer_menu_items_spacing'] . 'px';
}
// footer menu hover color
if ( isset( $the_core_typography_settings['footer_menu_hover']['id'] ) && $the_core_typography_settings['footer_menu_hover']['id'] == 'fw-custom' ) {
	if ( ! empty( $the_core_typography_settings['footer_menu_hover']['color'] ) ) {
		$the_core_less_variables['fw-footer-menu-item-color-hover'] = $the_core_typography_settings['footer_menu_hover']['color'];
	} else {
		$the_core_less_variables['fw-footer-menu-item-color-hover'] = $the_core_less_variables['theme-color-1'];
	}
} elseif ( isset( $the_core_typography_settings['footer_menu_hover']['id'] ) ) {
	$the_core_less_variables['fw-footer-menu-item-color-hover'] = $the_core_color_settings[ $the_core_typography_settings['footer_menu_hover']['id'] ];
}

// buttons
if ( isset( $the_core_typography_settings['buttons'] ) ) {
	$font_styles                                       = the_core_get_font_array( $the_core_typography_settings['buttons'], $the_core_color_settings );
	$the_core_less_variables['fw-buttons-font-family'] = $font_styles['font-family'];
	( $font_styles['font-size'] != 'px' ) ? $the_core_less_variables['fw-buttons-font-size'] = $font_styles['font-size'] : '';
	( $font_styles['line-height'] != 'px' ) ? $the_core_less_variables['fw-buttons-line-height'] = $font_styles['line-height'] : '';
	( $font_styles['letter-spacing'] != 'px' ) ? $the_core_less_variables['fw-buttons-letter-spacing'] = $font_styles['letter-spacing'] : '';
	! empty( $font_styles['color'] ) ? $the_core_less_variables['fw-buttons-color'] = $font_styles['color'] : '';
	$the_core_less_variables['fw-buttons-font-style']  = $font_styles['font-style'];
	$the_core_less_variables['fw-buttons-font-weight'] = $font_styles['font-weight'];
}
if ( isset( $the_core_typography_settings['buttons_hover']['id'] ) && $the_core_typography_settings['buttons_hover']['id'] == 'fw-custom' ) {
	if ( ! empty( $the_core_typography_settings['buttons_hover']['color'] ) ) {
		$the_core_less_variables['fw-buttons-hover-color'] = $the_core_typography_settings['buttons_hover']['color'];
	}
} elseif ( isset( $the_core_typography_settings['buttons_hover']['id'] ) ) {
	$the_core_less_variables['fw-buttons-hover-color'] = $the_core_color_settings[ $the_core_typography_settings['buttons_hover']['id'] ];
}

// form labels
if ( isset( $the_core_typography_settings['form_labels'] ) ) {
	$font_styles                                       = the_core_get_font_array( $the_core_typography_settings['form_labels'], $the_core_color_settings );
	$the_core_less_variables['form-label-font-family'] = $font_styles['font-family'];
	( $font_styles['font-size'] != 'px' ) ? $the_core_less_variables['form-label-font-size'] = $font_styles['font-size'] : '';
	( $font_styles['line-height'] != 'px' ) ? $the_core_less_variables['form-label-line-height'] = $font_styles['line-height'] : '';
	( $font_styles['letter-spacing'] != 'px' ) ? $the_core_less_variables['form-label-letter-spacing'] = $font_styles['letter-spacing'] : '';
	! empty( $font_styles['color'] ) ? $the_core_less_variables['form-label-color'] = $font_styles['color'] : '';
	$the_core_less_variables['form-label-font-style']  = $font_styles['font-style'];
	$the_core_less_variables['form-label-font-weight'] = $font_styles['font-weight'];
}

// form labels uppercase
if ( isset( $the_core_typography_settings['form_labels_uppercase'] ) ) {
	$the_core_less_variables['form-label-text-transform'] = $the_core_typography_settings['form_labels_uppercase'];
}

// form inputs
if ( isset( $the_core_typography_settings['form_inputs'] ) ) {
	$font_styles                                  = the_core_get_font_array( $the_core_typography_settings['form_inputs'], $the_core_color_settings );
	$the_core_less_variables['input-font-family'] = $font_styles['font-family'];
	( $font_styles['font-size'] != 'px' ) ? $the_core_less_variables['input-font-size'] = $font_styles['font-size'] : '';
	( $font_styles['line-height'] != 'px' ) ? $the_core_less_variables['input-line-height'] = $font_styles['line-height'] : '';
	( $font_styles['letter-spacing'] != 'px' ) ? $the_core_less_variables['input-letter-spacing'] = $font_styles['letter-spacing'] : '';
	$the_core_less_variables['input-color']       = ! empty( $font_styles['color'] ) ? $font_styles['color'] : $the_core_less_variables['theme-color-3'];
	$the_core_less_variables['input-font-style']  = $font_styles['font-style'];
	$the_core_less_variables['input-font-weight'] = $font_styles['font-weight'];
}

// widgets title links
if ( isset( $the_core_typography_settings['widgets_title'] ) ) {
	$font_styles                                                  = the_core_get_font_array( $the_core_typography_settings['widgets_title'], $the_core_color_settings );
	$the_core_less_variables['fw-widget-inner-title-font-family'] = $font_styles['font-family'];
	( $font_styles['font-size'] != 'px' ) ? $the_core_less_variables['fw-widget-inner-title-font-size'] = $font_styles['font-size'] : '';
	( $font_styles['line-height'] != 'px' ) ? $the_core_less_variables['fw-widget-inner-title-line-height'] = $font_styles['line-height'] : '';
	( $font_styles['letter-spacing'] != 'px' ) ? $the_core_less_variables['fw-widget-inner-title-letter-spacing'] = $font_styles['letter-spacing'] : '';
	! empty( $font_styles['color'] ) ? $the_core_less_variables['fw-widget-inner-title-color'] = $font_styles['color'] : '';
	$the_core_less_variables['fw-widget-inner-title-font-style']  = $font_styles['font-style'];
	$the_core_less_variables['fw-widget-inner-title-font-weight'] = $font_styles['font-weight'];
}
if ( isset( $the_core_typography_settings['widgets_title_hover']['id'] ) && $the_core_typography_settings['widgets_title_hover']['id'] == 'fw-custom' ) {
	if ( ! empty( $the_core_typography_settings['widgets_title_hover']['color'] ) ) {
		$the_core_less_variables['fw-widget-inner-title-hover-color'] = $the_core_typography_settings['widgets_title_hover']['color'];
	}
	else {
		$the_core_less_variables['fw-widget-inner-title-hover-color'] = $the_core_less_variables['theme-color-1'];
	}
} elseif ( isset( $the_core_typography_settings['widgets_title_hover']['id'] ) ) {
	$the_core_less_variables['fw-widget-inner-title-hover-color'] = $the_core_color_settings[ $the_core_typography_settings['widgets_title_hover']['id'] ];
}
if ( isset( $the_core_typography_settings['widgets_spacing'] ) && ! empty( $the_core_typography_settings['widgets_spacing'] ) ) {
	$the_core_less_variables['fw-widget-margin-bot'] = $the_core_typography_settings['widgets_spacing'] . 'px';
}

// blog meta
if ( isset( $the_core_typography_settings['blog_meta_title'] ) ) {
	$font_styles                                         = the_core_get_font_array( $the_core_typography_settings['blog_meta_title'], $the_core_color_settings );
	$the_core_less_variables['fw-blog-meta-font-family'] = $font_styles['font-family'];
	( $font_styles['font-size'] != 'px' ) ? $the_core_less_variables['fw-blog-meta-font-size'] = $font_styles['font-size'] : '';
	( $font_styles['line-height'] != 'px' ) ? $the_core_less_variables['fw-blog-meta-line-height'] = $font_styles['line-height'] : '';
	( $font_styles['letter-spacing'] != 'px' ) ? $the_core_less_variables['fw-blog-meta-letter-spacing'] = $font_styles['letter-spacing'] : '';
	! empty( $font_styles['color'] ) ? $the_core_less_variables['fw-blog-meta-color'] = $font_styles['color'] : '';
	$the_core_less_variables['fw-blog-meta-font-style']  = $font_styles['font-style'];
	$the_core_less_variables['fw-blog-meta-font-weight'] = $font_styles['font-weight'];
}

if ( isset( $the_core_typography_settings['blog_meta_title_hover']['id'] ) && $the_core_typography_settings['blog_meta_title_hover']['id'] == 'fw-custom' ) {
	if ( ! empty( $the_core_typography_settings['blog_meta_title_hover']['color'] ) ) {
		$the_core_less_variables['fw-blog-meta-color-hover'] = $the_core_typography_settings['blog_meta_title_hover']['color'];
	}
} elseif ( isset( $the_core_typography_settings['blog_meta_title_hover']['id'] ) ) {
	$the_core_less_variables['fw-blog-meta-color-hover'] = $the_core_color_settings[ $the_core_typography_settings['blog_meta_title_hover']['id'] ];
}

if ( isset( $the_core_typography_settings['blog_meta_text_transform'] ) && ! empty( $the_core_typography_settings['blog_meta_text_transform'] ) ) {
	$the_core_less_variables['fw-blog-meta-lettercase'] = $the_core_typography_settings['blog_meta_text_transform'];
}

// footer copyright
if ( isset( $the_core_typography_settings['footer_copyright_typography'] ) ) {
	$font_styles                                         = the_core_get_font_array( $the_core_typography_settings['footer_copyright_typography'], $the_core_color_settings );
	$the_core_less_variables['fw-copyright-font-family'] = $font_styles['font-family'];
	( $font_styles['font-size'] != 'px' ) ? $the_core_less_variables['fw-copyright-font-size'] = $font_styles['font-size'] : '';
	( $font_styles['line-height'] != 'px' ) ? $the_core_less_variables['fw-copyright-line-height'] = $font_styles['line-height'] : '';
	( $font_styles['letter-spacing'] != 'px' ) ? $the_core_less_variables['fw-copyright-letter-spacing'] = $font_styles['letter-spacing'] : '';
	! empty( $font_styles['color'] ) ? $the_core_less_variables['fw-copyright-text-color'] = $font_styles['color'] : '';
	$the_core_less_variables['fw-copyright-font-style']  = $font_styles['font-style'];
	$the_core_less_variables['fw-copyright-font-weight'] = $font_styles['font-weight'];
}

// header bg color
if ( isset( $the_core_header_settings['header_bg_color']['id'] ) && $the_core_header_settings['header_bg_color']['id'] == 'fw-custom' ) {
	if ( ! empty( $the_core_header_settings['header_bg_color']['color'] ) ) {
		$the_core_less_variables['fw-top-menu-bg'] = $the_core_header_settings['header_bg_color']['color'];
	}
} elseif ( isset( $the_core_header_settings['header_bg_color']['id'] ) ) {
	$the_core_less_variables['fw-top-menu-bg'] = $the_core_color_settings[ $the_core_header_settings['header_bg_color']['id'] ];
}
else {
	$the_core_less_variables['fw-top-menu-bg'] = 'transparent';
}

// header menu color
if ( isset( $the_core_header_settings['menu_color']['id'] ) && $the_core_header_settings['menu_color']['id'] == 'fw-custom' ) {
	if ( ! empty( $the_core_header_settings['menu_color']['color'] ) ) {
		$the_core_less_variables['fw-top-menu-color'] = $the_core_header_settings['menu_color']['color'];
	}
} elseif ( isset( $the_core_header_settings['menu_color']['id'] ) ) {
	$the_core_less_variables['fw-top-menu-color'] = $the_core_color_settings[ $the_core_header_settings['menu_color']['id'] ];
}

// header dropdown bg color
if ( isset( $the_core_header_settings['dropdown_bg_color']['id'] ) && $the_core_header_settings['dropdown_bg_color']['id'] == 'fw-custom' ) {
	if ( ! empty( $the_core_header_settings['dropdown_bg_color']['color'] ) ) {
		$the_core_less_variables['fw-dropdown-bg-color'] = $the_core_header_settings['dropdown_bg_color']['color'];
	} else {
		$the_core_less_variables['fw-dropdown-bg-color'] = $the_core_less_variables['theme-color-3'];
	}
} elseif ( isset( $the_core_header_settings['dropdown_bg_color']['id'] ) ) {
	$the_core_less_variables['fw-dropdown-bg-color'] = $the_core_color_settings[ $the_core_header_settings['dropdown_bg_color']['id'] ];
}

// header dropdown links color
if ( isset( $the_core_header_settings['dropdown_links_color']['id'] ) && $the_core_header_settings['dropdown_links_color']['id'] == 'fw-custom' ) {
	if ( ! empty( $the_core_header_settings['dropdown_links_color']['color'] ) ) {
		$the_core_less_variables['fw-dropdown-text-color'] = $the_core_header_settings['dropdown_links_color']['color'];
	} else {
		$the_core_less_variables['fw-dropdown-text-color'] = $the_core_less_variables['theme-color-2'];
	}
} elseif ( isset( $the_core_header_settings['dropdown_links_color']['id'] ) ) {
	$the_core_less_variables['fw-dropdown-text-color'] = $the_core_color_settings[ $the_core_header_settings['dropdown_links_color']['id'] ];
}


// boxed header
if ( isset( $the_core_settings_option['header_settings']['boxed_header']['selected_value'] ) && $the_core_settings_option['header_settings']['boxed_header']['selected_value'] == 'yes' ) {
	if ( ! empty( $the_core_settings_option['header_settings']['boxed_header']['yes']['header_boxed_top'] ) ) {
		$the_core_less_variables['fw-header-boxed-position-top'] = $the_core_settings_option['header_settings']['boxed_header']['yes']['header_boxed_top'] . 'px';
	}
}

// header opacity
if ( isset( $the_core_header_settings['enable_absolute_header']['selected_value'] ) && $the_core_header_settings['enable_absolute_header']['selected_value'] != '' ) {
	$the_core_less_variables['fw-header-absolute-opacity'] = $the_core_header_settings['enable_absolute_header']['fw-absolute-header']['absolute_opacity'];
}

if ( $the_core_header_settings['enable_header_top_bar']['selected_value'] == 'yes' ) {
	// header top bar color
	if ( isset( $the_core_header_settings['enable_header_top_bar']['yes']['header_top_bar_bg']['id'] ) && $the_core_header_settings['enable_header_top_bar']['yes']['header_top_bar_bg']['id'] == 'fw-custom' ) {
		if ( ! empty( $the_core_header_settings['enable_header_top_bar']['yes']['header_top_bar_bg']['color'] ) ) {
			$the_core_less_variables['fw-top-bar-bg'] = $the_core_header_settings['enable_header_top_bar']['yes']['header_top_bar_bg']['color'];
		}
	} elseif ( isset( $the_core_header_settings['enable_header_top_bar']['yes']['header_top_bar_bg']['id'] ) ) {
		$the_core_less_variables['fw-top-bar-bg'] = $the_core_color_settings[ $the_core_header_settings['enable_header_top_bar']['yes']['header_top_bar_bg']['id'] ];
	}

	// header socials color
	if ( $the_core_header_settings['enable_header_top_bar']['yes']['enable_header_socials']['selected_value'] == 'yes' ) {
		if ( isset( $the_core_header_settings['enable_header_top_bar']['yes']['enable_header_socials']['yes']['header_socials_color']['id'] ) && $the_core_header_settings['enable_header_top_bar']['yes']['enable_header_socials']['yes']['header_socials_color']['id'] == 'fw-custom' ) {
			if ( ! empty( $the_core_header_settings['enable_header_top_bar']['yes']['enable_header_socials']['yes']['header_socials_color']['color'] ) ) {
				$the_core_less_variables['fw-header-social-color'] = $the_core_header_settings['enable_header_top_bar']['yes']['enable_header_socials']['yes']['header_socials_color']['color'];
			}
		} elseif ( isset( $the_core_header_settings['enable_header_top_bar']['yes']['enable_header_socials']['yes']['header_socials_color']['id'] ) ) {
			$the_core_less_variables['fw-header-social-color'] = $the_core_color_settings[ $the_core_header_settings['enable_header_top_bar']['yes']['enable_header_socials']['yes']['header_socials_color']['id'] ];
		}

		if ( isset( $the_core_header_settings['enable_header_top_bar']['yes']['enable_header_socials']['yes']['header_socials_hover_color']['id'] ) && $the_core_header_settings['enable_header_top_bar']['yes']['enable_header_socials']['yes']['header_socials_hover_color']['id'] == 'fw-custom' ) {
			if ( ! empty( $the_core_header_settings['enable_header_top_bar']['yes']['enable_header_socials']['yes']['header_socials_hover_color']['color'] ) ) {
				$the_core_less_variables['fw-header-social-hover-color'] = $the_core_header_settings['enable_header_top_bar']['yes']['enable_header_socials']['yes']['header_socials_hover_color']['color'];
			}
		} elseif ( isset( $the_core_header_settings['enable_header_top_bar']['yes']['enable_header_socials']['yes']['header_socials_hover_color']['id'] ) ) {
			$the_core_less_variables['fw-header-social-hover-color'] = $the_core_color_settings[ $the_core_header_settings['enable_header_top_bar']['yes']['enable_header_socials']['yes']['header_socials_hover_color']['id'] ];
		}

		if ( isset( $the_core_header_settings['enable_header_top_bar']['yes']['enable_header_socials']['yes']['header_icon_size'] ) && ! empty( $the_core_header_settings['enable_header_top_bar']['yes']['enable_header_socials']['yes']['header_icon_size'] ) ) {
			$the_core_less_variables['fw-top-bar-font-size-social'] = (int) $the_core_header_settings['enable_header_top_bar']['yes']['enable_header_socials']['yes']['header_icon_size'] . 'px';
		}
	}
}

// header search
if ( $the_core_header_settings['enable_search']['selected_value'] == 'yes' ) {
	$the_core_search_type = $the_core_header_settings['enable_search']['yes']['search_type']['selected'];
	if ( isset( $the_core_header_settings['enable_search']['yes']['search_type'][ $the_core_search_type ]['search_advanced_styling']['input_typography'] ) ) {
		$font_styles = the_core_get_font_array( $the_core_header_settings['enable_search']['yes']['search_type'][ $the_core_search_type ]['search_advanced_styling']['input_typography'], $the_core_color_settings );
		if ( $the_core_search_type == 'fw-input-search' ) {
			$the_core_less_variables['fw-header-search-input-font-family'] = $font_styles['font-family'];
			( $font_styles['font-size'] != 'px' ) ? $the_core_less_variables['fw-header-search-input-font-size'] = $font_styles['font-size'] : '';
			( $font_styles['line-height'] != 'px' ) ? $the_core_less_variables['fw-header-search-input-height'] = $font_styles['line-height'] : '';
			( $font_styles['letter-spacing'] != 'px' ) ? $the_core_less_variables['fw-header-search-input-letter-spacing'] = $font_styles['letter-spacing'] : '';
			! empty( $font_styles['color'] ) ? $the_core_less_variables['fw-header-search-input-color'] = $font_styles['color'] : '';
			$the_core_less_variables['fw-header-search-input-font-style']  = $font_styles['font-style'];
			$the_core_less_variables['fw-header-search-input-font-weight'] = $font_styles['font-weight'];
		} else {
			$the_core_less_variables['fw-header-search-input-font-family'] = $font_styles['font-family'];
			( $font_styles['font-size'] != 'px' ) ? $the_core_less_variables['fw-form-search-full-input-font-size'] = $font_styles['font-size'] : '';
			( $font_styles['line-height'] != 'px' ) ? $the_core_less_variables['fw-header-search-input-height'] = $font_styles['line-height'] : '';
			( $font_styles['letter-spacing'] != 'px' ) ? $the_core_less_variables['fw-header-search-input-letter-spacing'] = $font_styles['letter-spacing'] : '';
			! empty( $font_styles['color'] ) ? $the_core_less_variables['fw-form-search-full-font-color'] = $font_styles['color'] : '';
			$the_core_less_variables['fw-header-search-input-font-style']  = $font_styles['font-style'];
			$the_core_less_variables['fw-header-search-input-font-weight'] = $font_styles['font-weight'];
		}
	}

	// search bg color
	if ( isset( $the_core_header_settings['enable_search']['yes']['search_type'][ $the_core_search_type ]['search_advanced_styling']['search_background_options'] ) ) {
		if ( $the_core_header_settings['enable_search']['yes']['search_type'][ $the_core_search_type ]['search_advanced_styling']['search_background_options']['background'] == 'none' ) {
			$the_core_less_variables['fw-header-search-input-bg-color'] = 'transparent';
		} else {
			if ( $the_core_header_settings['enable_search']['yes']['search_type'][ $the_core_search_type ]['search_advanced_styling']['search_background_options']['custom']['background_color']['id'] == 'fw-custom' ) {
				if ( ! empty( $the_core_header_settings['enable_search']['yes']['search_type'][ $the_core_search_type ]['search_advanced_styling']['search_background_options']['custom']['background_color']['color'] ) ) {
					$the_core_less_variables['fw-header-search-input-bg-color'] = $the_core_header_settings['enable_search']['yes']['search_type'][ $the_core_search_type ]['search_advanced_styling']['search_background_options']['custom']['background_color']['color'];
				}
			} else {
				$the_core_less_variables['fw-header-search-input-bg-color'] = $the_core_color_settings[ $the_core_header_settings['enable_search']['yes']['search_type'][ $the_core_search_type ]['search_advanced_styling']['search_background_options']['custom']['background_color']['id'] ];
			}
		}
	}

	// search border
	if ( $the_core_header_settings['enable_search']['yes']['search_type'][ $the_core_search_type ]['search_advanced_styling']['border_group']['selected'] == 'yes' ) {
		if ( ! empty( $the_core_header_settings['enable_search']['yes']['search_type'][ $the_core_search_type ]['search_advanced_styling']['border_group']['yes']['border_size'] ) ) {
			$the_core_less_variables['fw-header-search-input-border-size'] = (int) $the_core_header_settings['enable_search']['yes']['search_type'][ $the_core_search_type ]['search_advanced_styling']['border_group']['yes']['border_size'] . 'px';
		}

		// border color
		if ( $the_core_header_settings['enable_search']['yes']['search_type'][ $the_core_search_type ]['search_advanced_styling']['border_group']['yes']['border_color']['id'] == 'fw-custom' ) {
			if ( ! empty( $the_core_header_settings['enable_search']['yes']['search_type'][ $the_core_search_type ]['search_advanced_styling']['border_group']['yes']['border_color']['color'] ) ) {
				$the_core_less_variables['fw-header-search-input-border-color'] = $the_core_header_settings['enable_search']['yes']['search_type'][ $the_core_search_type ]['search_advanced_styling']['border_group']['yes']['border_color']['color'];
			}
		} else {
			$the_core_less_variables['fw-header-search-input-border-color'] = $the_core_color_settings[ $the_core_header_settings['enable_search']['yes']['search_type'][ $the_core_search_type ]['search_advanced_styling']['border_group']['yes']['border_color']['id'] ];
		}
	}

	// search icon
	if ( ! empty( $the_core_header_settings['enable_search']['yes']['search_type'][ $the_core_search_type ]['search_advanced_styling']['icon_size'] ) ) {
		$the_core_less_variables['fw-header-search-input-icon-font-size'] = (int) $the_core_header_settings['enable_search']['yes']['search_type'][ $the_core_search_type ]['search_advanced_styling']['icon_size'] . 'px';
	}
	if ( $the_core_header_settings['enable_search']['yes']['search_type'][ $the_core_search_type ]['search_advanced_styling']['icon_color']['id'] == 'fw-custom' ) {
		if ( ! empty( $the_core_header_settings['enable_search']['yes']['search_type'][ $the_core_search_type ]['search_advanced_styling']['icon_color']['color'] ) ) {
			$the_core_less_variables['fw-header-search-input-icon-color'] = $the_core_header_settings['enable_search']['yes']['search_type'][ $the_core_search_type ]['search_advanced_styling']['icon_color']['color'];
		}
		else {
			$the_core_less_variables['fw-header-search-input-icon-color'] = $the_core_less_variables['theme-color-2'];
		}
	} else {
		$the_core_less_variables['fw-header-search-input-icon-color'] = $the_core_color_settings[ $the_core_header_settings['enable_search']['yes']['search_type'][ $the_core_search_type ]['search_advanced_styling']['icon_color']['id'] ];
	}

	// placeholder color
	if ( $the_core_header_settings['enable_search']['yes']['search_type'][ $the_core_search_type ]['search_advanced_styling']['placeholder_color']['id'] == 'fw-custom' ) {
		if ( ! empty( $the_core_header_settings['enable_search']['yes']['search_type'][ $the_core_search_type ]['search_advanced_styling']['placeholder_color']['color'] ) ) {
			$the_core_less_variables['fw-form-search-full-placeholder-font-color'] = $the_core_header_settings['enable_search']['yes']['search_type'][ $the_core_search_type ]['search_advanced_styling']['placeholder_color']['color'];
		}
		else {
			$the_core_less_variables['fw-form-search-full-placeholder-font-color'] = $the_core_less_variables['fw-form-search-full-font-color'];
		}
	} else {
		$the_core_less_variables['fw-form-search-full-placeholder-font-color'] = $the_core_color_settings[ $the_core_header_settings['enable_search']['yes']['search_type'][ $the_core_search_type ]['search_advanced_styling']['placeholder_color']['id'] ];
	}

	// only for icon search
	if ( $the_core_search_type == 'fw-mini-search' ) {
		// search wrap bg color
		if ( isset( $the_core_header_settings['enable_search']['yes']['search_type'][ $the_core_search_type ]['search_advanced_styling']['full_background_color'] ) ) {
			if ( $the_core_header_settings['enable_search']['yes']['search_type'][ $the_core_search_type ]['search_advanced_styling']['full_background_color']['id'] == 'fw-custom' ) {
				if ( ! empty( $the_core_header_settings['enable_search']['yes']['search_type'][ $the_core_search_type ]['search_advanced_styling']['full_background_color']['color'] ) ) {
					$the_core_less_variables['fw-form-search-full-bg'] = $the_core_header_settings['enable_search']['yes']['search_type'][ $the_core_search_type ]['search_advanced_styling']['full_background_color']['color'];
				}
				else {
					$the_core_less_variables['fw-form-search-full-bg'] = $the_core_less_variables['fw-form-search-full-font-color'];
				}
			} else {
				$the_core_less_variables['fw-form-search-full-bg'] = $the_core_color_settings[ $the_core_header_settings['enable_search']['yes']['search_type'][ $the_core_search_type ]['search_advanced_styling']['full_background_color']['id'] ];
			}
		}
	}
}

// header 5 styling
if ( $the_core_header_settings['header_type_picker']['header_type'] == 'header-5' ) {
	if ( isset( $the_core_header_settings['header_type_picker']['header-5']['header_5_popup']['background_options']['background'] ) && $the_core_header_settings['header_type_picker']['header-5']['header_5_popup']['background_options']['background'] == 'color' ) {
		$menu_bg_header_5 = the_core_get_color_palette_color_and_class( $the_core_header_settings['header_type_picker']['header-5']['header_5_popup']['background_options']['color']['background_color'], array( 'return_color' => true ) );
		if ( ! empty( $menu_bg_header_5['color'] ) ) {
			$the_core_less_variables['fw-header-5-bg-color'] = $menu_bg_header_5['color'];
		}
	} elseif ( isset( $the_core_header_settings['header_type_picker']['header-5']['header_5_popup']['background_options']['background'] ) && $the_core_header_settings['header_type_picker']['header-5']['header_5_popup']['background_options']['background'] == 'image' ) {
		if ( isset( $the_core_header_settings['header_type_picker']['header-5']['header_5_popup']['background_options']['image']['background_image']['data']['icon'] ) ) {
			$the_core_less_variables['fw-header-5-bg-image'] = '"' . the_core_change_original_link_with_cdn( $the_core_header_settings['header_type_picker']['header-5']['header_5_popup']['background_options']['image']['background_image']['data']['icon'] ) . '"';;
		}
		$menu_bg_header_5 = the_core_get_color_palette_color_and_class( $the_core_header_settings['header_type_picker']['header-5']['header_5_popup']['background_options']['image']['background_color'], array( 'return_color' => true ) );
		if ( ! empty( $menu_bg_header_5['color'] ) ) {
			$the_core_less_variables['fw-header-5-bg-color'] = $menu_bg_header_5['color'];
		}

		$the_core_less_variables['fw-header-5-bg-repeat']              = $the_core_header_settings['header_type_picker']['header-5']['header_5_popup']['background_options']['image']['repeat'];
		$the_core_less_variables['fw-header-5-bg-horizontal-position'] = $the_core_header_settings['header_type_picker']['header-5']['header_5_popup']['background_options']['image']['bg_position_x'];
		$the_core_less_variables['fw-header-5-bg-vertical-position']   = $the_core_header_settings['header_type_picker']['header-5']['header_5_popup']['background_options']['image']['bg_position_y'];
		$the_core_less_variables['fw-header-5-bg-size']                = $the_core_header_settings['header_type_picker']['header-5']['header_5_popup']['background_options']['image']['bg_size'];
		// overlay color
		if ( $the_core_header_settings['header_type_picker']['header-5']['header_5_popup']['background_options']['image']['overlay_options']['overlay'] == 'yes' ) {
			$overlay_header_5 = the_core_get_color_palette_color_and_class( $the_core_header_settings['header_type_picker']['header-5']['header_5_popup']['background_options']['image']['overlay_options']['yes']['background'], array( 'return_color' => true ) );
			if ( ! empty( $overlay_header_5['color'] ) ) {
				$the_core_less_variables['fw-header-5-overlay-color'] = $overlay_header_5['color'];
			}
			// opacity
			$the_core_less_variables['fw-header-5-overlay-transparent'] = $the_core_header_settings['header_type_picker']['header-5']['header_5_popup']['background_options']['image']['overlay_options']['yes']['overlay_opacity_image'];
		}
	} elseif ( isset( $the_core_header_settings['header_type_picker']['header-5']['header_5_popup']['background_options']['background'] ) && $the_core_header_settings['header_type_picker']['header-5']['header_5_popup']['background_options']['background'] == 'video' ) {
		// overlay color
		if ( $the_core_header_settings['header_type_picker']['header-5']['header_5_popup']['background_options']['video']['overlay_options']['overlay'] == 'yes' ) {
			$overlay_header_5 = the_core_get_color_palette_color_and_class( $the_core_header_settings['header_type_picker']['header-5']['header_5_popup']['background_options']['video']['overlay_options']['yes']['background'], array( 'return_color' => true ) );
			if ( ! empty( $overlay_header_5['color'] ) ) {
				$the_core_less_variables['fw-header-5-overlay-color'] = $overlay_header_5['color'];
			}
			// opacity
			$the_core_less_variables['fw-header-5-overlay-transparent'] = $the_core_header_settings['header_type_picker']['header-5']['header_5_popup']['background_options']['video']['overlay_options']['yes']['overlay_opacity_video'];
		}
	}

	// menu icon color and size
	if ( isset( $the_core_header_settings['header_type_picker']['header-5']['menu_icon_size'] ) && ! empty( $the_core_header_settings['header_type_picker']['header-5']['menu_icon_size'] ) ) {
		$the_core_less_variables['fw-header-5-menu-icon-size'] = $the_core_header_settings['header_type_picker']['header-5']['menu_icon_size'] . 'px';
	}

	if ( isset( $the_core_header_settings['header_type_picker']['header-5']['menu_icon_color'] ) && ! empty( $the_core_header_settings['header_type_picker']['header-5']['menu_icon_color'] ) ) {
		$menu_icon_color = the_core_get_color_palette_color_and_class( $the_core_header_settings['header_type_picker']['header-5']['menu_icon_color'], array( 'return_color' => true ) );
		if ( ! empty( $menu_icon_color['color'] ) ) {
			$the_core_less_variables['fw-header-5-menu-icon-color'] = $menu_icon_color['color'];
		} else {
			$the_core_less_variables['fw-header-5-menu-icon-color'] = $the_core_less_variables['theme-color-1'];
		}
	}

	if ( isset( $the_core_header_settings['header_type_picker']['header-5']['menu_icon_hover_color'] ) && ! empty( $the_core_header_settings['header_type_picker']['header-5']['menu_icon_hover_color'] ) ) {
		$menu_icon_hover_color = the_core_get_color_palette_color_and_class( $the_core_header_settings['header_type_picker']['header-5']['menu_icon_hover_color'], array( 'return_color' => true ) );
		if ( ! empty( $menu_icon_hover_color['color'] ) ) {
			$the_core_less_variables['fw-header-5-menu-icon-color-hover'] = $menu_icon_hover_color['color'];
		}
		else {
			$the_core_less_variables['fw-header-5-menu-icon-color-hover'] = $the_core_less_variables['theme-color-2'];
		}
	}
}

// header 6 styling
if ( $the_core_header_settings['header_type_picker']['header_type'] == 'header-6' ) {
	if ( isset( $the_core_header_settings['header_type_picker']['header-6']['header_6_popup']['background_options']['background'] ) && $the_core_header_settings['header_type_picker']['header-6']['header_6_popup']['background_options']['background'] == 'color' ) {
		$menu_bg_header_6 = the_core_get_color_palette_color_and_class( $the_core_header_settings['header_type_picker']['header-6']['header_6_popup']['background_options']['color']['background_color'], array( 'return_color' => true ) );
		if ( ! empty( $menu_bg_header_6['color'] ) ) {
			$the_core_less_variables['fw-header-6-bg-color'] = $menu_bg_header_6['color'];
		}
	} elseif ( isset( $the_core_header_settings['header_type_picker']['header-6']['header_6_popup']['background_options']['background'] ) && $the_core_header_settings['header_type_picker']['header-6']['header_6_popup']['background_options']['background'] == 'image' ) {
		if ( isset( $the_core_header_settings['header_type_picker']['header-6']['header_6_popup']['background_options']['image']['background_image']['data']['icon'] ) ) {
			$the_core_less_variables['fw-header-6-bg-image'] = '"' . the_core_change_original_link_with_cdn( $the_core_header_settings['header_type_picker']['header-6']['header_6_popup']['background_options']['image']['background_image']['data']['icon'] ) . '"';;
		}
		$menu_bg_header_6 = the_core_get_color_palette_color_and_class( $the_core_header_settings['header_type_picker']['header-6']['header_6_popup']['background_options']['image']['background_color'], array( 'return_color' => true ) );
		if ( ! empty( $menu_bg_header_6['color'] ) ) {
			$the_core_less_variables['fw-header-6-bg-color'] = $menu_bg_header_6['color'];
		}

		$the_core_less_variables['fw-header-6-bg-repeat']              = $the_core_header_settings['header_type_picker']['header-6']['header_6_popup']['background_options']['image']['repeat'];
		$the_core_less_variables['fw-header-6-bg-horizontal-position'] = $the_core_header_settings['header_type_picker']['header-6']['header_6_popup']['background_options']['image']['bg_position_x'];
		$the_core_less_variables['fw-header-6-bg-vertical-position']   = $the_core_header_settings['header_type_picker']['header-6']['header_6_popup']['background_options']['image']['bg_position_y'];
		$the_core_less_variables['fw-header-6-bg-size']                = $the_core_header_settings['header_type_picker']['header-6']['header_6_popup']['background_options']['image']['bg_size'];
		// overlay color
		if ( $the_core_header_settings['header_type_picker']['header-6']['header_6_popup']['background_options']['image']['overlay_options']['overlay'] == 'yes' ) {
			$overlay_header_6 = the_core_get_color_palette_color_and_class( $the_core_header_settings['header_type_picker']['header-6']['header_6_popup']['background_options']['image']['overlay_options']['yes']['background'], array( 'return_color' => true ) );
			if ( ! empty( $overlay_header_6['color'] ) ) {
				$the_core_less_variables['fw-header-6-overlay-color'] = $overlay_header_6['color'];
			}
			// opacity
			$the_core_less_variables['fw-header-6-overlay-transparent'] = $the_core_header_settings['header_type_picker']['header-6']['header_6_popup']['background_options']['image']['overlay_options']['yes']['overlay_opacity_image'];
		}
	}

	// socials
	if ( isset( $the_core_header_settings['header_type_picker']['header-6']['enable_header_socials']['selected_value'] ) && $the_core_header_settings['header_type_picker']['header-6']['enable_header_socials']['selected_value'] == 'yes' ) {
		$header_socials_color = the_core_get_color_palette_color_and_class( $the_core_header_settings['header_type_picker']['header-6']['enable_header_socials']['yes']['header_socials_color'], array( 'return_color' => true ) );
		if ( ! empty( $header_socials_color['color'] ) ) {
			$the_core_less_variables['fw-header-6-menu-social-color'] = $header_socials_color['color'];
		}
		else {
			$the_core_less_variables['fw-header-6-menu-social-color'] = $the_core_less_variables['theme-color-1'];
		}

		$header_socials_hover_color = the_core_get_color_palette_color_and_class( $the_core_header_settings['header_type_picker']['header-6']['enable_header_socials']['yes']['header_socials_hover_color'], array( 'return_color' => true ) );
		if ( ! empty( $header_socials_hover_color['color'] ) ) {
			$the_core_less_variables['fw-header-6-menu-social-color-hover'] = $header_socials_hover_color['color'];
		}
		else {
			$the_core_less_variables['fw-header-6-menu-social-color-hover'] = $the_core_less_variables['theme-color-2'];
		}

		if ( ! empty( $the_core_header_settings['header_type_picker']['header-6']['enable_header_socials']['yes']['header_icon_size'] ) ) {
			$the_core_less_variables['fw-header-6-menu-social-size'] = $the_core_header_settings['header_type_picker']['header-6']['enable_header_socials']['yes']['header_icon_size'] . 'px';
		}
	}
}

// sticky header
$the_core_less_variables['fw-sticky-menu-bg'] = $the_core_less_variables['fw-top-menu-bg'];
$the_core_less_variables['fw-sticky-menu-item-color-hover'] = $the_core_less_variables['fw-top-menu-item-color-hover'];
if ( isset( $the_core_header_settings['enable_sticky_header'] ) && $the_core_header_settings['enable_sticky_header'] != '' ) {
	// sticky logo image width
	if ( ! empty( $the_core_header_settings['sticky_header_styling']['logo'] ) && isset($the_core_header_settings['sticky_header_styling']['logo']['attachment_id']) ) {
		$sticky_logo_image = wp_get_attachment_image_src( $the_core_header_settings['sticky_header_styling']['logo']['attachment_id'], 'full' );
		if ( isset( $sticky_logo_image['1'] ) ) {
			$the_core_less_variables['fw-menu-sticky-logo-width'] = $sticky_logo_image['1'];
		}
	}

	if ( isset( $the_core_header_settings['sticky_header_styling'] ) ) {
		// padding
		if ( ! empty( $the_core_header_settings['sticky_header_styling']['padding'] ) ) {
			$the_core_less_variables['fw-sticky-menu-padding'] = $the_core_header_settings['sticky_header_styling']['padding'];
		}
		// menu color
		$menu_color = the_core_get_color_palette_color_and_class( $the_core_header_settings['sticky_header_styling']['menu_color'], array( 'return_color' => true ) );
		if ( ! empty( $menu_color['color'] ) ) {
			$the_core_less_variables['fw-sticky-menu-item-color'] = $menu_color['color'];
		}
		else {
			// only for header 5 if sticky color is empty
			if ( $the_core_header_settings['header_type_picker']['header_type'] == 'header-5' ) {
				$the_core_less_variables['fw-sticky-menu-item-color'] = $the_core_less_variables['fw-header-5-menu-icon-color'];
			}
		}

		// menu hover color
		$menu_hover_color = the_core_get_color_palette_color_and_class( $the_core_header_settings['sticky_header_styling']['menu_hover_color'], array( 'return_color' => true ) );
		if ( ! empty( $menu_hover_color['color'] ) ) {
			$the_core_less_variables['fw-sticky-menu-item-color-hover'] = $menu_hover_color['color'];
		}
		else {
			// only for header 5 if sticky color is empty
			if ( $the_core_header_settings['header_type_picker']['header_type'] == 'header-5' ) {
				$the_core_less_variables['fw-sticky-menu-item-color-hover'] = $the_core_less_variables['fw-header-5-menu-icon-color-hover'];
			}
		}
		// background sticky
		$menu_bg_color = the_core_get_color_palette_color_and_class( $the_core_header_settings['sticky_header_styling']['bg_color'], array( 'return_color' => true ) );
		if ( ! empty( $menu_bg_color['color'] ) ) {
			$the_core_less_variables['fw-sticky-menu-bg'] = $menu_bg_color['color'];
		}
		// background sticky opacity
		$the_core_less_variables['fw-sticky-menu-bg-opacity'] = (int) $the_core_header_settings['sticky_header_styling']['bg_opacity'];
	}
}

// footer widget area
if ( $the_core_footer_settings['show_footer_widgets']['selected_value'] == 'yes' ) {
	if ( isset( $the_core_footer_settings['show_footer_widgets']['yes']['footer_widgets_bg']['background'] ) && $the_core_footer_settings['show_footer_widgets']['yes']['footer_widgets_bg']['background'] != 'none' ) {
		if ( $the_core_footer_settings['show_footer_widgets']['yes']['footer_widgets_bg']['background'] == 'color' && isset( $the_core_footer_settings['show_footer_widgets']['yes']['footer_widgets_bg']['color']['background_color']['id'] ) && $the_core_footer_settings['show_footer_widgets']['yes']['footer_widgets_bg']['color']['background_color']['id'] == 'fw-custom' ) {
			if ( ! empty( $the_core_footer_settings['show_footer_widgets']['yes']['footer_widgets_bg']['color']['background_color']['color'] ) ) {
				$the_core_less_variables['fw-footer-widgets-bg'] = $the_core_footer_settings['show_footer_widgets']['yes']['footer_widgets_bg']['color']['background_color']['color'];
			} else {
				// for empty color
				$the_core_less_variables['fw-footer-widgets-bg'] = 'transparent';
			}
		} elseif ( $the_core_footer_settings['show_footer_widgets']['yes']['footer_widgets_bg']['background'] == 'color' && isset( $the_core_footer_settings['show_footer_widgets']['yes']['footer_widgets_bg']['color']['background_color']['id'] ) ) {
			$the_core_less_variables['fw-footer-widgets-bg'] = $the_core_color_settings[ $the_core_footer_settings['show_footer_widgets']['yes']['footer_widgets_bg']['color']['background_color']['id'] ];
		} elseif ( $the_core_footer_settings['show_footer_widgets']['yes']['footer_widgets_bg']['background'] == 'image' ) {
			if ( $the_core_footer_settings['show_footer_widgets']['yes']['footer_widgets_bg']['image']['background_color']['id'] == 'fw-custom' ) {
				if ( ! empty( $the_core_footer_settings['show_footer_widgets']['yes']['footer_widgets_bg']['image']['background_color']['color'] ) ) {
					$the_core_less_variables['fw-footer-widgets-bg'] = $the_core_footer_settings['show_footer_widgets']['yes']['footer_widgets_bg']['image']['background_color']['color'];
				} else {
					// for empty color
					$the_core_less_variables['fw-footer-widgets-bg'] = 'transparent';
				}
			} else {
				$the_core_less_variables['fw-footer-widgets-bg'] = $the_core_color_settings[ $the_core_footer_settings['show_footer_widgets']['yes']['footer_widgets_bg']['image']['background_color']['id'] ];
			}

			if ( ! empty( $the_core_footer_settings['show_footer_widgets']['yes']['footer_widgets_bg']['image']['background_image']['data'] ) ) {
				$temp_style = '';
				if ( isset( $the_core_footer_settings['show_footer_widgets']['yes']['footer_widgets_bg']['image']['background_image']['data']['icon'] ) && ! empty( $the_core_footer_settings['show_footer_widgets']['yes']['footer_widgets_bg']['image']['background_image']['data']['icon'] ) ) {
					$the_core_less_variables['fw-footer-widget-bg-image'] = '"' . the_core_change_original_link_with_cdn( $the_core_footer_settings['show_footer_widgets']['yes']['footer_widgets_bg']['image']['background_image']['data']['icon'] ) . '"';
				}
				$the_core_less_variables['fw-footer-widget-bg-repeat'] = $the_core_footer_settings['show_footer_widgets']['yes']['footer_widgets_bg']['image']['repeat'];
				$temp_style .= ' ' . $the_core_footer_settings['show_footer_widgets']['yes']['footer_widgets_bg']['image']['bg_position_x'];
				$temp_style .= ' ' . $the_core_footer_settings['show_footer_widgets']['yes']['footer_widgets_bg']['image']['bg_position_y'];
				$the_core_less_variables['fw-footer-widget-bg-position'] = $temp_style;
				$the_core_less_variables['fw-footer-widget-bg-size']     = $the_core_footer_settings['show_footer_widgets']['yes']['footer_widgets_bg']['image']['bg_size'];
			}
		}
	} else {
		// background none
		$the_core_less_variables['fw-footer-widgets-bg'] = 'transparent';
	}

	// titles color
	if ( isset( $the_core_footer_settings['show_footer_widgets']['yes']['footer_widgets_titles_color']['id'] ) && $the_core_footer_settings['show_footer_widgets']['yes']['footer_widgets_titles_color']['id'] == 'fw-custom' ) {
		if ( ! empty( $the_core_footer_settings['show_footer_widgets']['yes']['footer_widgets_titles_color']['color'] ) ) {
			$the_core_less_variables['fw-footer-widgets-title'] = $the_core_footer_settings['show_footer_widgets']['yes']['footer_widgets_titles_color']['color'];
		}
	} elseif ( isset( $the_core_footer_settings['show_footer_widgets']['yes']['footer_widgets_titles_color']['id'] ) ) {
		$the_core_less_variables['fw-footer-widgets-title'] = $the_core_color_settings[ $the_core_footer_settings['show_footer_widgets']['yes']['footer_widgets_titles_color']['id'] ];
	}

	// text color
	if ( isset( $the_core_footer_settings['show_footer_widgets']['yes']['body_widgets_text_color']['id'] ) && $the_core_footer_settings['show_footer_widgets']['yes']['body_widgets_text_color']['id'] == 'fw-custom' ) {
		if ( ! empty( $the_core_footer_settings['show_footer_widgets']['yes']['body_widgets_text_color']['color'] ) ) {
			$the_core_less_variables['fw-footer-widgets-text-color'] = $the_core_footer_settings['show_footer_widgets']['yes']['body_widgets_text_color']['color'];
		}
		else {
			$the_core_less_variables['fw-footer-widgets-text-color'] = $the_core_less_variables['theme-color-3'];
		}
	} elseif ( isset( $the_core_footer_settings['show_footer_widgets']['yes']['body_widgets_text_color']['id'] ) ) {
		$the_core_less_variables['fw-footer-widgets-text-color'] = $the_core_color_settings[ $the_core_footer_settings['show_footer_widgets']['yes']['body_widgets_text_color']['id'] ];
	}

	// footer widgets links color
	if ( isset( $the_core_footer_settings['show_footer_widgets']['yes']['footer_widgets_link_color']['id'] ) && $the_core_footer_settings['show_footer_widgets']['yes']['footer_widgets_link_color']['id'] == 'fw-custom' ) {
		if ( ! empty( $the_core_footer_settings['show_footer_widgets']['yes']['footer_widgets_link_color']['color'] ) ) {
			$the_core_less_variables['fw-footer-widgets-link-color'] = $the_core_footer_settings['show_footer_widgets']['yes']['footer_widgets_link_color']['color'];
		} else {
			$the_core_less_variables['fw-footer-widgets-link-color'] = $the_core_less_variables['fw-footer-widgets-text-color'];
		}
	} elseif ( isset( $the_core_footer_settings['show_footer_widgets']['yes']['footer_widgets_link_color']['id'] ) ) {
		$the_core_less_variables['fw-footer-widgets-link-color'] = $the_core_color_settings[ $the_core_footer_settings['show_footer_widgets']['yes']['footer_widgets_link_color']['id'] ];
	}
}

// footer menu area
if ( $the_core_footer_settings['show_menu_bar']['selected_value'] == 'yes' ) {
	if ( $the_core_footer_settings['show_menu_bar']['yes']['show_footer_logo']['selected_value'] == 'yes' ) {
		if ( ! empty( $the_core_footer_settings['show_menu_bar']['yes']['show_footer_logo']['yes']['footer_logo'] ) ) {
			$logo_image = wp_get_attachment_image_src( $the_core_footer_settings['show_menu_bar']['yes']['show_footer_logo']['yes']['footer_logo']['attachment_id'], 'full' );
			if ( isset( $logo_image['1'] ) && isset( $logo_image['2'] ) ) {
				$the_core_less_variables['fw-footer-logo-width']  = $logo_image['1'];
				$the_core_less_variables['fw-footer-logo-height'] = $logo_image['2'];
			}
		}
	}
	if ( isset( $the_core_footer_settings['show_menu_bar']['yes']['menu_bar_bg']['background'] ) && $the_core_footer_settings['show_menu_bar']['yes']['menu_bar_bg']['background'] != 'none' ) {
		if ( $the_core_footer_settings['show_menu_bar']['yes']['menu_bar_bg']['background'] == 'color' && isset( $the_core_footer_settings['show_menu_bar']['yes']['menu_bar_bg']['color']['background_color']['id'] ) && $the_core_footer_settings['show_menu_bar']['yes']['menu_bar_bg']['color']['background_color']['id'] == 'fw-custom' ) {
			if ( ! empty( $the_core_footer_settings['show_menu_bar']['yes']['menu_bar_bg']['color']['background_color']['color'] ) ) {
				$the_core_less_variables['fw-footer-middle-bg'] = $the_core_footer_settings['show_menu_bar']['yes']['menu_bar_bg']['color']['background_color']['color'];
			} else {
				// for empty color
				$the_core_less_variables['fw-footer-middle-bg'] = 'transparent';
			}
		} elseif ( $the_core_footer_settings['show_menu_bar']['yes']['menu_bar_bg']['background'] == 'color' && isset( $the_core_footer_settings['show_menu_bar']['yes']['menu_bar_bg']['color']['background_color']['id'] ) && $the_core_footer_settings['show_menu_bar']['yes']['menu_bar_bg']['color']['background_color']['id'] != 'fw-custom' ) {
			$the_core_less_variables['fw-footer-middle-bg'] = $the_core_color_settings[ $the_core_footer_settings['show_menu_bar']['yes']['menu_bar_bg']['color']['background_color']['id'] ];
		} elseif ( $the_core_footer_settings['show_menu_bar']['yes']['menu_bar_bg']['background'] == 'image' ) {
			if ( $the_core_footer_settings['show_menu_bar']['yes']['menu_bar_bg']['image']['background_color']['id'] == 'fw-custom' ) {
				if ( ! empty( $the_core_footer_settings['show_menu_bar']['yes']['menu_bar_bg']['image']['background_color']['color'] ) ) {
					$the_core_less_variables['fw-footer-middle-bg'] = $the_core_footer_settings['show_menu_bar']['yes']['menu_bar_bg']['image']['background_color']['color'];
				} else {
					// for empty color
					$the_core_less_variables['fw-footer-middle-bg'] = 'transparent';
				}
			} else {
				$the_core_less_variables['fw-footer-middle-bg'] = $the_core_color_settings[ $the_core_footer_settings['show_menu_bar']['yes']['menu_bar_bg']['image']['background_color']['id'] ];
			}

			if ( ! empty( $the_core_footer_settings['show_menu_bar']['yes']['menu_bar_bg']['image']['background_image']['data'] ) ) {
				$temp_style = '';
				if ( isset( $the_core_footer_settings['show_menu_bar']['yes']['menu_bar_bg']['image']['background_image']['data']['icon'] ) && ! empty( $the_core_footer_settings['show_menu_bar']['yes']['menu_bar_bg']['image']['background_image']['data']['icon'] ) ) {
					$the_core_less_variables['fw-menu-bar-bg-image'] = '"' . the_core_change_original_link_with_cdn( $the_core_footer_settings['show_menu_bar']['yes']['menu_bar_bg']['image']['background_image']['data']['icon'] ) . '"';
				}
				$the_core_less_variables['fw-menu-bar-bg-repeat'] = $the_core_footer_settings['show_menu_bar']['yes']['menu_bar_bg']['image']['repeat'];
				$temp_style .= ' ' . $the_core_footer_settings['show_menu_bar']['yes']['menu_bar_bg']['image']['bg_position_x'];
				$temp_style .= ' ' . $the_core_footer_settings['show_menu_bar']['yes']['menu_bar_bg']['image']['bg_position_y'];
				$the_core_less_variables['fw-menu-bar-bg-position']  = $temp_style;
				$the_core_less_variables['fw-footer-middle-bg-size'] = $the_core_footer_settings['show_menu_bar']['yes']['menu_bar_bg']['image']['bg_size'];
			}
		}
	} else {
		// background none
		$the_core_less_variables['fw-footer-middle-bg'] = 'transparent';
	}

	// menu color
	if ( isset( $the_core_footer_settings['show_menu_bar']['yes']['menu_bar_menu_color']['id'] ) && $the_core_footer_settings['show_menu_bar']['yes']['menu_bar_menu_color']['id'] == 'fw-custom' ) {
		if ( ! empty( $the_core_footer_settings['show_menu_bar']['yes']['menu_bar_menu_color']['color'] ) ) {
			$the_core_less_variables['fw-footer-middle-text'] = $the_core_footer_settings['show_menu_bar']['yes']['menu_bar_menu_color']['color'];
		}
	} elseif ( isset( $the_core_footer_settings['show_menu_bar']['yes']['menu_bar_menu_color']['id'] ) ) {
		$the_core_less_variables['fw-footer-middle-text'] = $the_core_color_settings[ $the_core_footer_settings['show_menu_bar']['yes']['menu_bar_menu_color']['id'] ];
	}
}

// footer
if ( isset( $the_core_footer_settings['footer_bg_color']['id'] ) && $the_core_footer_settings['footer_bg_color']['id'] == 'fw-custom' ) {
	if ( ! empty( $the_core_footer_settings['footer_bg_color']['color'] ) ) {
		$the_core_less_variables['fw-footer-bar-bg'] = $the_core_footer_settings['footer_bg_color']['color'];
	}
} elseif ( isset( $the_core_footer_settings['footer_bg_color']['id'] ) ) {
	$the_core_less_variables['fw-footer-bar-bg'] = $the_core_color_settings[ $the_core_footer_settings['footer_bg_color']['id'] ];
}

if ( isset( $the_core_footer_settings['footer_socials']['selected_value'] ) && $the_core_footer_settings['footer_socials']['selected_value'] == 'yes' ) {
	// social color
	if ( isset( $the_core_footer_settings['footer_socials']['yes']['footer_social_color']['id'] ) && $the_core_footer_settings['footer_socials']['yes']['footer_social_color']['id'] == 'fw-custom' ) {
		if ( ! empty( $the_core_footer_settings['footer_socials']['yes']['footer_social_color']['color'] ) ) {
			$the_core_less_variables['fw-footer-social-color'] = $the_core_footer_settings['footer_socials']['yes']['footer_social_color']['color'];
		}
		else {
			$the_core_less_variables['fw-footer-social-color'] = $the_core_less_variables['theme-color-3'];
		}
	} elseif ( isset( $the_core_footer_settings['footer_socials']['selected_value'] ) && $the_core_footer_settings['footer_socials']['selected_value'] == 'yes' && isset( $the_core_footer_settings['footer_socials']['yes']['footer_social_color']['id'] ) ) {
		$the_core_less_variables['fw-footer-social-color'] = $the_core_color_settings[ $the_core_footer_settings['footer_socials']['yes']['footer_social_color']['id'] ];
	}

	// social hover color
	if ( isset( $the_core_footer_settings['footer_socials']['yes']['footer_social_hover_color']['id'] ) && $the_core_footer_settings['footer_socials']['yes']['footer_social_hover_color']['id'] == 'fw-custom' ) {
		if ( ! empty( $the_core_footer_settings['footer_socials']['yes']['footer_social_hover_color']['color'] ) ) {
			$the_core_less_variables['fw-footer-social-hover-color'] = $the_core_footer_settings['footer_socials']['yes']['footer_social_hover_color']['color'];
		}
		else {
			$the_core_less_variables['fw-footer-social-hover-color'] = $the_core_less_variables['theme-color-1'];
		}
	} elseif ( isset( $the_core_footer_settings['footer_socials']['selected_value'] ) && $the_core_footer_settings['footer_socials']['selected_value'] == 'yes' && isset( $the_core_footer_settings['footer_socials']['yes']['footer_social_hover_color']['id'] ) ) {
		$the_core_less_variables['fw-footer-social-hover-color'] = $the_core_color_settings[ $the_core_footer_settings['footer_socials']['yes']['footer_social_hover_color']['id'] ];
	}

	if ( isset( $the_core_footer_settings['footer_socials']['yes']['footer_icon_size'] ) && ! empty( $the_core_footer_settings['footer_socials']['yes']['footer_icon_size'] ) ) {
		$the_core_less_variables['fw-footer-social-size'] = $the_core_footer_settings['footer_socials']['yes']['footer_icon_size'] . 'px';
	}
}
// footer padding top & bottom
if ( isset( $the_core_footer_settings['copyright_top'] ) && $the_core_footer_settings['copyright_top'] != '' ) {
	$the_core_less_variables['fw-footer-bar-padding-top'] = (int) $the_core_footer_settings['copyright_top'] . 'px';
}
if ( isset( $the_core_footer_settings['copyright_bottom'] ) && $the_core_footer_settings['copyright_bottom'] != '' ) {
	$the_core_less_variables['fw-footer-bar-padding-bot'] = (int) $the_core_footer_settings['copyright_bottom'] . 'px';
}

// logo width and height
if ( isset( $the_core_logo_settings['logo']['image']['image_logo']['attachment_id'] ) && $the_core_logo_settings['logo']['image']['image_logo']['attachment_id'] != '' ) {
	$logo_image = wp_get_attachment_image_src( $the_core_logo_settings['logo']['image']['image_logo']['attachment_id'], 'full' );
	if ( isset( $logo_image['1'] ) && isset( $logo_image['2'] ) ) {
		$the_core_less_variables['fw-menu-logo-width']  = $logo_image['1'];
		$the_core_less_variables['fw-menu-logo-height'] = $logo_image['2'];
	}
}

// text logo options
if ( $the_core_logo_settings['logo']['selected_value'] == 'text' ) {
	// logo title font
	if ( isset( $the_core_logo_settings['logo']['text']['logo_title_font'] ) ) {
		$font_styles                                          = the_core_get_font_array( $the_core_logo_settings['logo']['text']['logo_title_font'], $the_core_color_settings );
		$the_core_less_variables['fw-logo-title-font-family'] = $font_styles['font-family'];
		( $font_styles['font-size'] != 'px' ) ? $the_core_less_variables['fw-logo-title-font-size'] = $font_styles['font-size'] : '';
		( $font_styles['line-height'] != 'px' ) ? $the_core_less_variables['fw-logo-title-line-height'] = $font_styles['line-height'] : '';
		( $font_styles['letter-spacing'] != 'px' ) ? $the_core_less_variables['fw-logo-title-letter-spacing'] = $font_styles['letter-spacing'] : '';
		$the_core_less_variables['fw-logo-title-color'] = !empty( $font_styles['color'] ) ?  $font_styles['color'] : $the_core_less_variables['theme-color-2'];
		$the_core_less_variables['fw-logo-title-font-style']  = $font_styles['font-style'];
		$the_core_less_variables['fw-logo-title-font-weight'] = $font_styles['font-weight'];
	}

	// logo subtitle font
	if ( isset( $the_core_logo_settings['logo']['text']['logo_subtitle_font'] ) ) {
		$font_styles                                             = the_core_get_font_array( $the_core_logo_settings['logo']['text']['logo_subtitle_font'], $the_core_color_settings );
		$the_core_less_variables['fw-logo-subtitle-font-family'] = $font_styles['font-family'];
		( $font_styles['font-size'] != 'px' ) ? $the_core_less_variables['fw-logo-subtitle-font-size'] = $font_styles['font-size'] : '';
		( $font_styles['line-height'] != 'px' ) ? $the_core_less_variables['fw-logo-subtitle-line-height'] = $font_styles['line-height'] : '';
		( $font_styles['letter-spacing'] != 'px' ) ? $the_core_less_variables['fw-logo-subtitle-letter-spacing'] = $font_styles['letter-spacing'] : '';
		! empty( $font_styles['color'] ) ? $the_core_less_variables['fw-logo-subtitle-color'] = $font_styles['color'] : '';
		$the_core_less_variables['fw-logo-subtitle-font-style']  = $font_styles['font-style'];
		$the_core_less_variables['fw-logo-subtitle-font-weight'] = $font_styles['font-weight'];
	}
}

// scroll to top button
if ( isset( $the_core_settings_option['scroll_to_top_styling'] ) ) {
	$color = the_core_get_color_palette_color_and_class( $the_core_settings_option['scroll_to_top_styling']['color'], array( 'return_color' => true ) );
	if ( ! empty( $color['color'] ) ) {
		$the_core_less_variables['fw-scroll-to-top-color'] = $color['color'];
	}
}

// loader color
if ( isset( $the_core_settings_option['spinner_styling']['color'] ) ) {
	$color = the_core_get_color_palette_color_and_class( $the_core_settings_option['spinner_styling']['color'], array( 'return_color' => true ) );
	if ( ! empty( $color['color'] ) ) {
		$the_core_less_variables['fw-page-transition-spinner-color'] = $color['color'];
	}
}

