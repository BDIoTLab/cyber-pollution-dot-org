<?php
global $the_core_less_variables;
$upload_dir                     = wp_upload_dir();
$style_dir                      = $upload_dir['basedir'];
$the_core_dynamic_css_directory = get_template_directory() . '/dynamic-css/fw-theme';
$the_core_settings_option       = function_exists( 'fw_get_db_settings_option' ) ? fw_get_db_settings_option() : array();
$the_core_header_type           = isset( $the_core_settings_option['header_settings']['header_type_picker']['header_type'] ) ? $the_core_settings_option['header_settings']['header_type_picker']['header_type'] : 'header-1';

// set global colors variables
global $the_core_color_settings;
$the_core_colors = array(
	'color_1' => '#d12a5c',
	'color_2' => '#49ca9f',
	'color_3' => '#1f1f1f',
	'color_4' => '#808080',
	'color_5' => '#ebebeb'
);
$the_core_color_settings = function_exists('fw_get_db_settings_option') ? fw_get_db_settings_option('color_settings', $the_core_colors) : $the_core_colors;

// init $wp_filesystem
{
	if ( ! function_exists( 'request_filesystem_credentials' ) ) {
		load_template( ABSPATH . '/wp-admin/includes/file.php' );
	}

	if ( ! defined( 'FS_METHOD' ) ) {
		define( 'FS_METHOD', 'direct' );
	}

	if ( false === request_filesystem_credentials( '', 'direct' ) ) {
		return false;
	}

	if ( ! WP_Filesystem() ) {
		// our credentials were no good, ask the user for them again
		request_filesystem_credentials( '', 'direct', true );

		return false;
	}

	global $wp_filesystem;
}

$css = '';
// Utilities
$css .= the_core_render_view( $the_core_dynamic_css_directory . '/utilities.php', array( 'the_core_less_variables' => $the_core_less_variables ) );
// Grid
$css .= the_core_render_view( $the_core_dynamic_css_directory . '/grid.php', array( 'the_core_less_variables' => $the_core_less_variables ) );
// Forms Styles
$css .= the_core_render_view( $the_core_dynamic_css_directory . '/shortcodes/forms.php', array( 'the_core_less_variables' => $the_core_less_variables ) );

// Header
$css .= the_core_render_view( $the_core_dynamic_css_directory.'/headers/header.php', array( 'the_core_less_variables' => $the_core_less_variables) );
if( $the_core_header_type == 'header-1' ) {
	$css .= the_core_render_view( $the_core_dynamic_css_directory . '/headers/header-1.php', array( 'the_core_less_variables' => $the_core_less_variables ) );
}
elseif( $the_core_header_type == 'header-2' ) {
	$css .= the_core_render_view( $the_core_dynamic_css_directory.'/headers/header-2.php', array( 'the_core_less_variables' => $the_core_less_variables) );
}
elseif( $the_core_header_type == 'header-3' ) {
	$css .= the_core_render_view( $the_core_dynamic_css_directory.'/headers/header-3.php', array( 'the_core_less_variables' => $the_core_less_variables) );
}
elseif( $the_core_header_type == 'header-4' ) {
	$css .= the_core_render_view( $the_core_dynamic_css_directory.'/headers/header-4.php', array( 'the_core_less_variables' => $the_core_less_variables) );
}
elseif( $the_core_header_type == 'header-5' ) {
	$css .= the_core_render_view( $the_core_dynamic_css_directory.'/headers/header-5.php', array( 'the_core_less_variables' => $the_core_less_variables) );
}
elseif( $the_core_header_type == 'header-6' ) {
	$css .= the_core_render_view( $the_core_dynamic_css_directory.'/headers/header-6.php', array( 'the_core_less_variables' => $the_core_less_variables) );
}

$css .= the_core_render_view( $the_core_dynamic_css_directory.'/headers/header-logo.php', array( 'the_core_less_variables' => $the_core_less_variables) );
$css .= the_core_render_view( $the_core_dynamic_css_directory.'/headers/header-top-bar.php', array( 'the_core_less_variables' => $the_core_less_variables) );
$css .= the_core_render_view( $the_core_dynamic_css_directory.'/headers/header-search.php', array( 'the_core_less_variables' => $the_core_less_variables) );
$css .= the_core_render_view( $the_core_dynamic_css_directory.'/headers/top-nav-menu.php', array( 'the_core_less_variables' => $the_core_less_variables) );
$css .= the_core_render_view( $the_core_dynamic_css_directory.'/headers/mega-menu.php', array( 'the_core_less_variables' => $the_core_less_variables) );
$css .= the_core_render_view( $the_core_dynamic_css_directory.'/headers/mobile-menu.php', array( 'the_core_less_variables' => $the_core_less_variables) );
$css .= the_core_render_view( $the_core_dynamic_css_directory.'/headers/header-height-calc.php', array( 'the_core_less_variables' => $the_core_less_variables) );

// Layout
$css .= the_core_render_view( $the_core_dynamic_css_directory . '/general.php', array( 'the_core_less_variables' => $the_core_less_variables ) );
$css .= the_core_render_view( $the_core_dynamic_css_directory . '/content.php', array( 'the_core_less_variables' => $the_core_less_variables ) );
$css .= the_core_render_view( $the_core_dynamic_css_directory . '/typography.php', array( 'the_core_less_variables' => $the_core_less_variables ) );
$css .= the_core_render_view( $the_core_dynamic_css_directory . '/sidebar.php', array( 'the_core_less_variables' => $the_core_less_variables ) );

// Widgets
$css .= the_core_render_view( $the_core_dynamic_css_directory . '/widgets/widgets.php', array( 'the_core_less_variables' => $the_core_less_variables ) );
$css .= the_core_render_view( $the_core_dynamic_css_directory . '/widgets/widget-archive.php', array( 'the_core_less_variables' => $the_core_less_variables ) );
$css .= the_core_render_view( $the_core_dynamic_css_directory . '/widgets/widget-select.php', array( 'the_core_less_variables' => $the_core_less_variables ) );
$css .= the_core_render_view( $the_core_dynamic_css_directory . '/widgets/widget-calendar.php', array( 'the_core_less_variables' => $the_core_less_variables ) );
$css .= the_core_render_view( $the_core_dynamic_css_directory . '/widgets/widget-categories.php', array( 'the_core_less_variables' => $the_core_less_variables ) );
$css .= the_core_render_view( $the_core_dynamic_css_directory . '/widgets/widget-recent-comments.php', array( 'the_core_less_variables' => $the_core_less_variables ) );
$css .= the_core_render_view( $the_core_dynamic_css_directory . '/widgets/widget-recent-entries.php', array( 'the_core_less_variables' => $the_core_less_variables ) );
$css .= the_core_render_view( $the_core_dynamic_css_directory . '/widgets/widget-rss.php', array( 'the_core_less_variables' => $the_core_less_variables ) );
$css .= the_core_render_view( $the_core_dynamic_css_directory . '/widgets/widget-search.php', array( 'the_core_less_variables' => $the_core_less_variables ) );
$css .= the_core_render_view( $the_core_dynamic_css_directory . '/widgets/widget-tagcloud.php', array( 'the_core_less_variables' => $the_core_less_variables ) );
$css .= the_core_render_view( $the_core_dynamic_css_directory . '/widgets/widget-text.php', array( 'the_core_less_variables' => $the_core_less_variables ) );
$css .= the_core_render_view( $the_core_dynamic_css_directory . '/widgets/widget-flickr-instagram.php', array( 'the_core_less_variables' => $the_core_less_variables ) );
$css .= the_core_render_view( $the_core_dynamic_css_directory . '/widgets/widget-login.php', array( 'the_core_less_variables' => $the_core_less_variables ) );
$css .= the_core_render_view( $the_core_dynamic_css_directory . '/widgets/widget-posts-list.php', array( 'the_core_less_variables' => $the_core_less_variables ) );
$css .= the_core_render_view( $the_core_dynamic_css_directory . '/widgets/widget-twitter-feed.php', array( 'the_core_less_variables' => $the_core_less_variables ) );
$css .= the_core_render_view( $the_core_dynamic_css_directory . '/widgets/widget-facebook.php', array( 'the_core_less_variables' => $the_core_less_variables ) );
$css .= the_core_render_view( $the_core_dynamic_css_directory . '/widgets/widget-language.php', array( 'the_core_less_variables' => $the_core_less_variables ) );

// Libraries
// Selectize
$css .= the_core_render_view( $the_core_dynamic_css_directory . '/lib/selectize/selectize.php', array( 'the_core_less_variables' => $the_core_less_variables ) );
$css .= the_core_render_view( $the_core_dynamic_css_directory . '/lib/selectize/selectize.theme.php', array( 'the_core_less_variables' => $the_core_less_variables ) );

// Checkbox-Radio
$css .= the_core_render_view( $the_core_dynamic_css_directory . '/lib/custom-checkbox-radio/custom-checkbox-radio.php', array( 'the_core_less_variables' => $the_core_less_variables ) );

// Pretty Photto
$css .= the_core_render_view( $the_core_dynamic_css_directory . '/lib/pretty-photo/pretty-photo.php', array( 'the_core_less_variables' => $the_core_less_variables ) );

// Posts
$css .= the_core_render_view( $the_core_dynamic_css_directory . '/posts/posts-type-1.php', array( 'the_core_less_variables' => $the_core_less_variables ) );
$css .= the_core_render_view( $the_core_dynamic_css_directory . '/posts/posts-type-2.php', array( 'the_core_less_variables' => $the_core_less_variables ) );
$css .= the_core_render_view( $the_core_dynamic_css_directory . '/posts/posts-type-3.php', array( 'the_core_less_variables' => $the_core_less_variables ) );
$css .= the_core_render_view( $the_core_dynamic_css_directory . '/posts/posts-format.php', array( 'the_core_less_variables' => $the_core_less_variables ) );
$css .= the_core_render_view( $the_core_dynamic_css_directory . '/posts/posts-details.php', array( 'the_core_less_variables' => $the_core_less_variables ) );
$css .= the_core_render_view( $the_core_dynamic_css_directory . '/posts/posts-comments.php', array( 'the_core_less_variables' => $the_core_less_variables ) );
$css .= the_core_render_view( $the_core_dynamic_css_directory . '/posts/posts-comments-type-2.php', array( 'the_core_less_variables' => $the_core_less_variables ) );
$css .= the_core_render_view( $the_core_dynamic_css_directory . '/posts/posts-comments-link.php', array( 'the_core_less_variables' => $the_core_less_variables ) );
$css .= the_core_render_view( $the_core_dynamic_css_directory . '/posts/posts-related-article.php', array( 'the_core_less_variables' => $the_core_less_variables ) );
$css .= the_core_render_view( $the_core_dynamic_css_directory . '/posts/posts-related-article-type-2.php', array( 'the_core_less_variables' => $the_core_less_variables ) );
$css .= the_core_render_view( $the_core_dynamic_css_directory . '/posts/posts.php', array( 'the_core_less_variables' => $the_core_less_variables ) );

// Pagination
$css .= the_core_render_view( $the_core_dynamic_css_directory . '/pagination.php', array( 'the_core_less_variables' => $the_core_less_variables ) );

$css .= the_core_render_view( $the_core_dynamic_css_directory . '/image-styling/image.php', array( 'the_core_less_variables' => $the_core_less_variables ) );
$css .= the_core_render_view( $the_core_dynamic_css_directory . '/image-styling/image-overlay.php', array( 'the_core_less_variables' => $the_core_less_variables ) );

// Portfolio
$css .= the_core_render_view( $the_core_dynamic_css_directory . '/portfolio/portfolio.php', array( 'the_core_less_variables' => $the_core_less_variables ) );
$css .= the_core_render_view( $the_core_dynamic_css_directory . '/portfolio/portfolio-details.php', array( 'the_core_less_variables' => $the_core_less_variables ) );
$css .= the_core_render_view( $the_core_dynamic_css_directory . '/portfolio/portfolio-type-1.php', array( 'the_core_less_variables' => $the_core_less_variables ) );
$css .= the_core_render_view( $the_core_dynamic_css_directory . '/portfolio/portfolio-type-2.php', array( 'the_core_less_variables' => $the_core_less_variables ) );
$css .= the_core_render_view( $the_core_dynamic_css_directory . '/portfolio/portfolio-type-3.php', array( 'the_core_less_variables' => $the_core_less_variables ) );

// Shortcodes
$css .= the_core_render_view( $the_core_dynamic_css_directory . '/buttons/buttons.php', array( 'the_core_less_variables' => $the_core_less_variables ) );
$css .= the_core_render_view( $the_core_dynamic_css_directory . '/buttons/buttons-size.php', array( 'the_core_less_variables' => $the_core_less_variables ) );
$css .= the_core_render_view( $the_core_dynamic_css_directory . '/buttons/buttons-style-1.php', array( 'the_core_less_variables' => $the_core_less_variables ) );
$css .= the_core_render_view( $the_core_dynamic_css_directory . '/buttons/buttons-style-2.php', array( 'the_core_less_variables' => $the_core_less_variables ) );
$css .= the_core_render_view( $the_core_dynamic_css_directory . '/buttons/buttons-style-3.php', array( 'the_core_less_variables' => $the_core_less_variables ) );
$css .= the_core_render_view( $the_core_dynamic_css_directory . '/buttons/buttons-style-4.php', array( 'the_core_less_variables' => $the_core_less_variables ) );

$css .= the_core_render_view( $the_core_dynamic_css_directory . '/sliders/sliders.php', array( 'the_core_less_variables' => $the_core_less_variables ) );
$css .= the_core_render_view( $the_core_dynamic_css_directory . '/sliders/fade-slider.php', array( 'the_core_less_variables' => $the_core_less_variables ) );
$css .= the_core_render_view( $the_core_dynamic_css_directory . '/sliders/image-video-slider.php', array( 'the_core_less_variables' => $the_core_less_variables ) );
$css .= the_core_render_view( $the_core_dynamic_css_directory . '/sliders/easy-slider.php', array( 'the_core_less_variables' => $the_core_less_variables ) );
$css .= the_core_render_view( $the_core_dynamic_css_directory . '/sliders/reload-slider.php', array( 'the_core_less_variables' => $the_core_less_variables ) );
$css .= the_core_render_view( $the_core_dynamic_css_directory . '/sliders/easy-carousel.php', array( 'the_core_less_variables' => $the_core_less_variables ) );
$css .= the_core_render_view( $the_core_dynamic_css_directory . '/sliders/themefuse-carousel.php', array( 'the_core_less_variables' => $the_core_less_variables ) );

$css .= the_core_render_view( $the_core_dynamic_css_directory . '/shortcodes/special-heading.php', array( 'the_core_less_variables' => $the_core_less_variables ) );
$css .= the_core_render_view( $the_core_dynamic_css_directory . '/shortcodes/accordion.php', array( 'the_core_less_variables' => $the_core_less_variables ) );
$css .= the_core_render_view( $the_core_dynamic_css_directory . '/shortcodes/countdown.php', array( 'the_core_less_variables' => $the_core_less_variables ) );
$css .= the_core_render_view( $the_core_dynamic_css_directory . '/shortcodes/dividers.php', array( 'the_core_less_variables' => $the_core_less_variables ) );
$css .= the_core_render_view( $the_core_dynamic_css_directory . '/shortcodes/icon-title.php', array( 'the_core_less_variables' => $the_core_less_variables ) );
$css .= the_core_render_view( $the_core_dynamic_css_directory . '/shortcodes/icon-box.php', array( 'the_core_less_variables' => $the_core_less_variables ) );
$css .= the_core_render_view( $the_core_dynamic_css_directory . '/shortcodes/image.php', array( 'the_core_less_variables' => $the_core_less_variables ) );
$css .= the_core_render_view( $the_core_dynamic_css_directory . '/shortcodes/image-box.php', array( 'the_core_less_variables' => $the_core_less_variables ) );
$css .= the_core_render_view( $the_core_dynamic_css_directory . '/shortcodes/list.php', array( 'the_core_less_variables' => $the_core_less_variables ) );
$css .= the_core_render_view( $the_core_dynamic_css_directory . '/shortcodes/quote.php', array( 'the_core_less_variables' => $the_core_less_variables ) );
$css .= the_core_render_view( $the_core_dynamic_css_directory . '/shortcodes/table.php', array( 'the_core_less_variables' => $the_core_less_variables ) );
$css .= the_core_render_view( $the_core_dynamic_css_directory . '/shortcodes/pricing.php', array( 'the_core_less_variables' => $the_core_less_variables ) );
$css .= the_core_render_view( $the_core_dynamic_css_directory . '/shortcodes/tabs.php', array( 'the_core_less_variables' => $the_core_less_variables ) );
$css .= the_core_render_view( $the_core_dynamic_css_directory . '/shortcodes/tabs-slider.php', array( 'the_core_less_variables' => $the_core_less_variables ) );
$css .= the_core_render_view( $the_core_dynamic_css_directory . '/shortcodes/team-member.php', array( 'the_core_less_variables' => $the_core_less_variables ) );
$css .= the_core_render_view( $the_core_dynamic_css_directory . '/shortcodes/slideshow.php', array( 'the_core_less_variables' => $the_core_less_variables ) );
$css .= the_core_render_view( $the_core_dynamic_css_directory . '/shortcodes/testimonials.php', array( 'the_core_less_variables' => $the_core_less_variables ) );
$css .= the_core_render_view( $the_core_dynamic_css_directory . '/shortcodes/events-calendar.php', array( 'the_core_less_variables' => $the_core_less_variables ) );
$css .= the_core_render_view( $the_core_dynamic_css_directory . '/shortcodes/gallery.php', array( 'the_core_less_variables' => $the_core_less_variables ) );
$css .= the_core_render_view( $the_core_dynamic_css_directory . '/shortcodes/map.php', array( 'the_core_less_variables' => $the_core_less_variables ) );
$css .= the_core_render_view( $the_core_dynamic_css_directory . '/shortcodes/flip-box.php', array( 'the_core_less_variables' => $the_core_less_variables ) );
$css .= the_core_render_view( $the_core_dynamic_css_directory . '/shortcodes/external-booking.php', array( 'the_core_less_variables' => $the_core_less_variables ) );

// Breadcrumbs
$css .= the_core_render_view( $the_core_dynamic_css_directory . '/breadcrumbs.php', array( 'the_core_less_variables' => $the_core_less_variables ) );

// Page Transition
$css .= the_core_render_view( $the_core_dynamic_css_directory . '/page-transition.php', array( 'the_core_less_variables' => $the_core_less_variables ) );

// Lessons
$css .= the_core_render_view( $the_core_dynamic_css_directory . '/lessons.php', array( 'the_core_less_variables' => $the_core_less_variables ) );

// todo: include plugin css only if plugin is active (this can make problems, because user can save without plugin, then activate a plugin and the styles for this plugin are not parsed, because user not save theme settings after plugin activation)
// WooCommerce
$css .= the_core_render_view( $the_core_dynamic_css_directory . '/woocommerce/woocommerce.php', array( 'the_core_less_variables' => $the_core_less_variables ) );
$css .= the_core_render_view( $the_core_dynamic_css_directory . '/woocommerce/woo-cart.php', array( 'the_core_less_variables' => $the_core_less_variables ) );
$css .= the_core_render_view( $the_core_dynamic_css_directory . '/woocommerce/woo-checkout.php', array( 'the_core_less_variables' => $the_core_less_variables ) );
$css .= the_core_render_view( $the_core_dynamic_css_directory . '/woocommerce/woo-widgets/woo-widget.php', array( 'the_core_less_variables' => $the_core_less_variables ) );
$css .= the_core_render_view( $the_core_dynamic_css_directory . '/woocommerce/woo-widgets/woo-widget-cart.php', array( 'the_core_less_variables' => $the_core_less_variables ) );
$css .= the_core_render_view( $the_core_dynamic_css_directory . '/woocommerce/woo-widgets/woo-widget-layered-nav.php', array( 'the_core_less_variables' => $the_core_less_variables ) );
$css .= the_core_render_view( $the_core_dynamic_css_directory . '/woocommerce/woo-widgets/woo-widget-price-filter.php', array( 'the_core_less_variables' => $the_core_less_variables ) );
$css .= the_core_render_view( $the_core_dynamic_css_directory . '/woocommerce/woo-widgets/woo-widget-search.php', array( 'the_core_less_variables' => $the_core_less_variables ) );
$css .= the_core_render_view( $the_core_dynamic_css_directory . '/woocommerce/woo-widgets/woo-widget-top-rated-products.php', array( 'the_core_less_variables' => $the_core_less_variables ) );
$css .= the_core_render_view( $the_core_dynamic_css_directory . '/woocommerce/woo-widgets/woo-widget-products.php', array( 'the_core_less_variables' => $the_core_less_variables ) );
$css .= the_core_render_view( $the_core_dynamic_css_directory . '/woocommerce/woo-products.php', array( 'the_core_less_variables' => $the_core_less_variables ) );
$css .= the_core_render_view( $the_core_dynamic_css_directory . '/woocommerce/woo-product-details.php', array( 'the_core_less_variables' => $the_core_less_variables ) );
$css .= the_core_render_view( $the_core_dynamic_css_directory . '/woocommerce/woo-my-account.php', array( 'the_core_less_variables' => $the_core_less_variables ) );

// bbPress
$css .= the_core_render_view( $the_core_dynamic_css_directory . '/bbpress/bbpress.php', array( 'the_core_less_variables' => $the_core_less_variables ) );
$css .= the_core_render_view( $the_core_dynamic_css_directory . '/bbpress/bbpress-widget/bbpress-widget-forum-list.php', array( 'the_core_less_variables' => $the_core_less_variables ) );
$css .= the_core_render_view( $the_core_dynamic_css_directory . '/bbpress/bbpress-widget/bbpress-widget-search.php', array( 'the_core_less_variables' => $the_core_less_variables ) );
$css .= the_core_render_view( $the_core_dynamic_css_directory . '/bbpress/bbpress-widget/bbpress-widget-recent-topics.php', array( 'the_core_less_variables' => $the_core_less_variables ) );
$css .= the_core_render_view( $the_core_dynamic_css_directory . '/bbpress/bbpress-widget/bbpress-widget-topic-list.php', array( 'the_core_less_variables' => $the_core_less_variables ) );
$css .= the_core_render_view( $the_core_dynamic_css_directory . '/bbpress/bbpress-widget/bbpress-widget-recent-replies.php', array( 'the_core_less_variables' => $the_core_less_variables ) );
$css .= the_core_render_view( $the_core_dynamic_css_directory . '/bbpress/bbpress-widget/bbpress-widget-statistics.php', array( 'the_core_less_variables' => $the_core_less_variables ) );
$css .= the_core_render_view( $the_core_dynamic_css_directory . '/bbpress/bbpress-widget/bbpress-widget-login.php', array( 'the_core_less_variables' => $the_core_less_variables ) );
$css .= the_core_render_view( $the_core_dynamic_css_directory . '/bbpress/bbpress-search.php', array( 'the_core_less_variables' => $the_core_less_variables ) );
$css .= the_core_render_view( $the_core_dynamic_css_directory . '/bbpress/bbpress-reply-form.php', array( 'the_core_less_variables' => $the_core_less_variables ) );
$css .= the_core_render_view( $the_core_dynamic_css_directory . '/bbpress/bbpress-user-edit.php', array( 'the_core_less_variables' => $the_core_less_variables ) );

// buddyPress
$css .= the_core_render_view( $the_core_dynamic_css_directory . '/buddypress/buddypress.php', array( 'the_core_less_variables' => $the_core_less_variables ) );
$css .= the_core_render_view( $the_core_dynamic_css_directory . '/buddypress/buddypress-widget/buddypress-widget-login.php', array( 'the_core_less_variables' => $the_core_less_variables ) );
$css .= the_core_render_view( $the_core_dynamic_css_directory . '/buddypress/buddypress-widget/buddypress-widget-members.php', array( 'the_core_less_variables' => $the_core_less_variables ) );
$css .= the_core_render_view( $the_core_dynamic_css_directory . '/buddypress/buddypress-search.php', array( 'the_core_less_variables' => $the_core_less_variables ) );
$css .= the_core_render_view( $the_core_dynamic_css_directory . '/buddypress/buddypress-members.php', array( 'the_core_less_variables' => $the_core_less_variables ) );
$css .= the_core_render_view( $the_core_dynamic_css_directory . '/buddypress/buddypress-profile.php', array( 'the_core_less_variables' => $the_core_less_variables ) );
$css .= the_core_render_view( $the_core_dynamic_css_directory . '/buddypress/buddypress-settings.php', array( 'the_core_less_variables' => $the_core_less_variables ) );
$css .= the_core_render_view( $the_core_dynamic_css_directory . '/buddypress/buddypress-registered-group.php', array( 'the_core_less_variables' => $the_core_less_variables ) );

// Give
$css .= the_core_render_view( $the_core_dynamic_css_directory . '/give/give.php', array( 'the_core_less_variables' => $the_core_less_variables ) );
$css .= the_core_render_view( $the_core_dynamic_css_directory . '/give/give-widget.php', array( 'the_core_less_variables' => $the_core_less_variables ) );

// Gravity Form
$css .= the_core_render_view( $the_core_dynamic_css_directory . '/gravityForm/gravityForm.php', array( 'the_core_less_variables' => $the_core_less_variables ) );

// Contact Form 7
$css .= the_core_render_view( $the_core_dynamic_css_directory . '/contactForm7/contactForm7.php', array( 'the_core_less_variables' => $the_core_less_variables ) );

// LifterLMS
$css .= the_core_render_view( $the_core_dynamic_css_directory . '/lifter-lms/lifter-lms.php', array( 'the_core_less_variables' => $the_core_less_variables ) );
$css .= the_core_render_view( $the_core_dynamic_css_directory . '/lifter-lms/lifter-lms-widgets/widget-course-syllabus.php', array( 'the_core_less_variables' => $the_core_less_variables ) );

// MailChimp
$css .= the_core_render_view( $the_core_dynamic_css_directory . '/mailchimp/mailchimp.php', array( 'the_core_less_variables' => $the_core_less_variables ) );

// Jetpack
$css .= the_core_render_view( $the_core_dynamic_css_directory . '/jetpack/jetpack.php', array( 'the_core_less_variables' => $the_core_less_variables ) );

// Footer
$css .= the_core_render_view( $the_core_dynamic_css_directory . '/footer/footer.php', array( 'the_core_less_variables' => $the_core_less_variables ) );
$css .= the_core_render_view( $the_core_dynamic_css_directory . '/footer/footer-widget.php', array( 'the_core_less_variables' => $the_core_less_variables ) );
$css .= the_core_render_view( $the_core_dynamic_css_directory . '/footer/footer-copyright.php', array( 'the_core_less_variables' => $the_core_less_variables ) );
$css .= the_core_render_view( $the_core_dynamic_css_directory . '/footer/footer-menu.php', array( 'the_core_less_variables' => $the_core_less_variables ) );
$css .= the_core_render_view( $the_core_dynamic_css_directory . '/footer/footer-logo.php', array( 'the_core_less_variables' => $the_core_less_variables ) );

// RTL styles
{
	$the_core_less_variables['ltr-direction'] = 'ltr';
	$css .= the_core_render_view( $the_core_dynamic_css_directory . '/rtl/grid.php', array( 'the_core_less_variables' => $the_core_less_variables ) );

	$css .= the_core_render_view( $the_core_dynamic_css_directory . '/rtl/headers/header.php', array( 'the_core_less_variables' => $the_core_less_variables ) );
	$css .= the_core_render_view( $the_core_dynamic_css_directory . '/rtl/headers/header-1.php', array( 'the_core_less_variables' => $the_core_less_variables ) );
	$css .= the_core_render_view( $the_core_dynamic_css_directory . '/rtl/headers/header-2.php', array( 'the_core_less_variables' => $the_core_less_variables ) );
	$css .= the_core_render_view( $the_core_dynamic_css_directory . '/rtl/headers/header-3.php', array( 'the_core_less_variables' => $the_core_less_variables ) );
	$css .= the_core_render_view( $the_core_dynamic_css_directory . '/rtl/headers/header-4.php', array( 'the_core_less_variables' => $the_core_less_variables ) );
	$css .= the_core_render_view( $the_core_dynamic_css_directory . '/rtl/headers/header-5.php', array( 'the_core_less_variables' => $the_core_less_variables ) );
	$css .= the_core_render_view( $the_core_dynamic_css_directory . '/rtl/headers/header-6.php', array( 'the_core_less_variables' => $the_core_less_variables ) );
	$css .= the_core_render_view( $the_core_dynamic_css_directory . '/rtl/headers/header-search.php', array( 'the_core_less_variables' => $the_core_less_variables ) );

	$css .= the_core_render_view( $the_core_dynamic_css_directory . '/rtl/portfolio/portfolio.php', array( 'the_core_less_variables' => $the_core_less_variables ) );

	$css .= the_core_render_view( $the_core_dynamic_css_directory . '/rtl/posts/posts-type-1.php', array( 'the_core_less_variables' => $the_core_less_variables ) );
	$css .= the_core_render_view( $the_core_dynamic_css_directory . '/rtl/posts/posts-type-2.php', array( 'the_core_less_variables' => $the_core_less_variables ) );
	$css .= the_core_render_view( $the_core_dynamic_css_directory . '/rtl/posts/posts-type-3.php', array( 'the_core_less_variables' => $the_core_less_variables ) );
	$css .= the_core_render_view( $the_core_dynamic_css_directory . '/rtl/posts/posts-comments.php', array( 'the_core_less_variables' => $the_core_less_variables ) );
	$css .= the_core_render_view( $the_core_dynamic_css_directory . '/rtl/posts/posts-related-article.php', array( 'the_core_less_variables' => $the_core_less_variables ) );
	$css .= the_core_render_view( $the_core_dynamic_css_directory . '/rtl/posts/posts-details.php', array( 'the_core_less_variables' => $the_core_less_variables ) );

	$css .= the_core_render_view( $the_core_dynamic_css_directory . '/rtl/buttons/buttons.php', array( 'the_core_less_variables' => $the_core_less_variables ) );

	$css .= the_core_render_view( $the_core_dynamic_css_directory . '/rtl/sliders/reload-slider.php', array( 'the_core_less_variables' => $the_core_less_variables ) );
	$css .= the_core_render_view( $the_core_dynamic_css_directory . '/rtl/sliders/easy-slider.php', array( 'the_core_less_variables' => $the_core_less_variables ) );

	$css .= the_core_render_view( $the_core_dynamic_css_directory . '/rtl/lib/custom-checkbox-radio/custom-checkbox-radio.php', array( 'the_core_less_variables' => $the_core_less_variables ) );
	$css .= the_core_render_view( $the_core_dynamic_css_directory . '/rtl/lib/pretty-photo/pretty-photo.php', array( 'the_core_less_variables' => $the_core_less_variables ) );

	$css .= the_core_render_view( $the_core_dynamic_css_directory . '/rtl/image-styling/image.php', array( 'the_core_less_variables' => $the_core_less_variables ) );

	$css .= the_core_render_view( $the_core_dynamic_css_directory . '/rtl/pagination.php', array( 'the_core_less_variables' => $the_core_less_variables ) );

	$css .= the_core_render_view( $the_core_dynamic_css_directory . '/rtl/shortcodes/events-calendar.php', array( 'the_core_less_variables' => $the_core_less_variables ) );
	$css .= the_core_render_view( $the_core_dynamic_css_directory . '/rtl/shortcodes/quote.php', array( 'the_core_less_variables' => $the_core_less_variables ) );
	$css .= the_core_render_view( $the_core_dynamic_css_directory . '/rtl/shortcodes/slideshow.php', array( 'the_core_less_variables' => $the_core_less_variables ) );
	$css .= the_core_render_view( $the_core_dynamic_css_directory . '/rtl/shortcodes/tabs.php', array( 'the_core_less_variables' => $the_core_less_variables ) );
	$css .= the_core_render_view( $the_core_dynamic_css_directory . '/rtl/shortcodes/testimonial.php', array( 'the_core_less_variables' => $the_core_less_variables ) );
	$css .= the_core_render_view( $the_core_dynamic_css_directory . '/rtl/shortcodes/accordion.php', array( 'the_core_less_variables' => $the_core_less_variables ) );
	$css .= the_core_render_view( $the_core_dynamic_css_directory . '/rtl/shortcodes/gallery.php', array( 'the_core_less_variables' => $the_core_less_variables ) );
	$css .= the_core_render_view( $the_core_dynamic_css_directory . '/rtl/shortcodes/icon-box.php', array( 'the_core_less_variables' => $the_core_less_variables ) );
	$css .= the_core_render_view( $the_core_dynamic_css_directory . '/rtl/shortcodes/flip-box.php', array( 'the_core_less_variables' => $the_core_less_variables ) );
	$css .= the_core_render_view( $the_core_dynamic_css_directory . '/rtl/shortcodes/list.php', array( 'the_core_less_variables' => $the_core_less_variables ) );
	$css .= the_core_render_view( $the_core_dynamic_css_directory . '/rtl/shortcodes/table.php', array( 'the_core_less_variables' => $the_core_less_variables ) );

	$css .= the_core_render_view( $the_core_dynamic_css_directory . '/rtl/widgets/widgets.php', array( 'the_core_less_variables' => $the_core_less_variables ) );
	$css .= the_core_render_view( $the_core_dynamic_css_directory . '/rtl/widgets/widget-categories.php', array( 'the_core_less_variables' => $the_core_less_variables ) );
	$css .= the_core_render_view( $the_core_dynamic_css_directory . '/rtl/widgets/widget-search.php', array( 'the_core_less_variables' => $the_core_less_variables ) );
	$css .= the_core_render_view( $the_core_dynamic_css_directory . '/rtl/widgets/widget-posts-list.php', array( 'the_core_less_variables' => $the_core_less_variables ) );
	$css .= the_core_render_view( $the_core_dynamic_css_directory . '/rtl/widgets/widget-twitter-feed.php', array( 'the_core_less_variables' => $the_core_less_variables ) );
	$css .= the_core_render_view( $the_core_dynamic_css_directory . '/rtl/widgets/widget-login.php', array( 'the_core_less_variables' => $the_core_less_variables ) );
	$css .= the_core_render_view( $the_core_dynamic_css_directory . '/rtl/widgets/widget-flickr-instagram.php', array( 'the_core_less_variables' => $the_core_less_variables ) );
	$css .= the_core_render_view( $the_core_dynamic_css_directory . '/rtl/widgets/widget-facebook.php', array( 'the_core_less_variables' => $the_core_less_variables ) );

	$css .= the_core_render_view( $the_core_dynamic_css_directory . '/rtl/footer/footer-menu.php', array( 'the_core_less_variables' => $the_core_less_variables ) );
}

// general settings advanced styling
$general_styles             = function_exists( 'the_core_general_styles' ) ? the_core_general_styles() : '';
$blog_button_styles         = the_core_posts_advanced_styles();
$the_core_blog_title_styles = the_core_blog_title_styles();
$responsive_styles          = the_core_responsive_styles();
$portfolio_styles           = the_core_portfolio_styles();
$quick_css                  = function_exists('fw_get_db_settings_option') ? fw_get_db_settings_option('quick_css') : '';
$css .= "\n" . $general_styles . "\n" . $blog_button_styles . "\n" . $the_core_blog_title_styles . "\n" . $responsive_styles . "\n" . $portfolio_styles. "\n" . $quick_css;

// first group of css (example after shortcodes, then you can put this code after widgets, after general options)
if ( ! $wp_filesystem->put_contents( $style_dir . '/'.the_core_style_file_name().'.css', $css ) ) {
	if ( class_exists('FW_Flash_Messages') && is_user_logged_in() ) {
		FW_Flash_Messages::add( 'error-writing-css', __( "Could not generate dynamic CSS file.", "the-core" ), 'error' );
	}
}
