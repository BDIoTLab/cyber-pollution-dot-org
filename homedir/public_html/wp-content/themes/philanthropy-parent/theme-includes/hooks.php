<?php if (!defined('ABSPATH')) {
	die('Direct access forbidden.');
}

/**
 * Filters and Actions
 */

// TODO: separate functions in specific files

if (!function_exists('_the_core_action_theme_setup')) :
	/**
	 * Theme setup.
	 *
	 * Set up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support post thumbnails.
	 * @internal
	 */
	function _the_core_action_theme_setup() {
		// Make Theme available for translation.
		load_theme_textdomain('the-core', get_template_directory() . '/languages');

		// Add RSS feed links to <head> for posts and comments.
		add_theme_support('automatic-feed-links');

		// title tag
		add_theme_support('title-tag');

		// register image sizes
		add_image_size('fw-theme-full-hd', 1920, 1080, true); // 16:9

		add_image_size('fw-theme-blog-full', 1228, 691, true); // 16:9
		add_image_size('fw-theme-blog-sidebar', 614, 346, true); // 16:9
		add_image_size('fw-theme-portfolio-landscape', 295, 166, true); // 16:9
		add_image_size('fw-theme-portfolio-landscape-x2', 590, 332, true); // 16:9

		add_image_size('fw-theme-category-slider', 295, 524, true); // 9:16
		add_image_size('fw-theme-category-slider-2x', 590, 1048, true); // 9:16

		add_image_size('fw-theme-gallery-2-1', 600, 300, true); // 2:1
		add_image_size('fw-theme-gallery-2-1-x2', 1200, 600, true); // 2:1

		add_image_size('fw-theme-gallery-1-2', 300, 600, true); // 1:2
		add_image_size('fw-theme-gallery-1-2-x2', 600, 1200, true); // 1:2

		add_image_size('fw-theme-portfolio-portrait', 295, 393, true); // 3:4
		add_image_size('fw-theme-portfolio-portrait-x2', 590, 786, true); // 3:4
		add_image_size('fw-theme-three-quarters', 393, 295, true); // 3:4
		add_image_size('fw-theme-three-quarters-x2', 786, 590, true); // 3:4

		add_image_size('fw-theme-gallery-five-three', 760, 460, true); // 5:3
		add_image_size('fw-theme-gallery-five-three-x2', 1520, 920, true); // 5:3

		add_image_size('fw-theme-gallery-five-three', 760, 460, true); // 3:5
		add_image_size('fw-theme-gallery-five-three-x2', 1520, 920, true); // 3:5

		add_image_size('fw-theme-gallery-three-two', 600, 400, true); // 3:2
		add_image_size('fw-theme-gallery-three-two-x2', 1200, 800, true); // 3:2

		add_image_size('fw-theme-category-square-800', 800, 800, true); // 1:1
		add_image_size('fw-theme-category-square-300', 300, 300, true); // 1:1

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support('html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption'
		));

		/*
		 * Enable support for Post Formats.
		 * See http://codex.wordpress.org/Post_Formats
		 */
		add_theme_support('post-formats', array(
			'aside',
			'image',
			'video',
			'audio',
			'quote',
			'link',
			'gallery',
		));

		// Add support for featured content.
		add_theme_support('featured-content', array(
			'featured_content_filter' => 'the_core_get_featured_posts',
			'max_posts' => 6,
		));

		// This theme uses its own gallery styles.
		add_filter('use_default_gallery_style', '__return_false');

		// Theme support woocommerce plugin
		add_theme_support('woocommerce');
		// Support product gallery & lightbox
		if ( function_exists( 'fw_get_db_settings_option' ) ) {
			$general_products_options = fw_get_db_settings_option( 'general_products_options', '' );
			if ( fw_akg('product_gallery', $general_products_options) == 'slider' ) {
				add_theme_support( 'wc-product-gallery-slider' );
			}

			// gallery lightobox need to be included every time, because when is disable gallery zoom it's open the gallery lightbox on click first image in slider
			add_theme_support( 'wc-product-gallery-lightbox' );

			if ( fw_akg('product_zoom', $general_products_options) == 'yes' ) {
				add_theme_support( 'wc-product-gallery-zoom' );
			}
		}
		else {
			add_theme_support( 'wc-product-gallery-lightbox' );
			add_theme_support( 'wc-product-gallery-zoom' );
		}

		// Add excerpt support to portfolio
		add_post_type_support('fw-portfolio', 'excerpt');
		add_post_type_support('fw-portfolio', 'comments');

		// Support Page Attributes - Portfolio
		add_post_type_support('fw-portfolio', 'page-attributes');

		// Add excerpt support to event post
		add_post_type_support('fw-event', 'excerpt');

		// Add favicon
		add_theme_support('favicon');

		// Add support lifterlms
		add_theme_support( 'lifterlms-sidebars' );
	}
endif;
add_action('after_setup_theme', '_the_core_action_theme_setup');


function the_core_filter_smartslider3_skip_license_modal($option) {
	return true;
}
add_filter('smartslider3_skip_license_modal', 'the_core_filter_smartslider3_skip_license_modal');


function _the_core_init() {
	// Enable support for Post Thumbnails
	add_theme_support( 'post-thumbnails' );

	// Excerpt support for pages (it's used for open graph)
	add_post_type_support( 'page', 'excerpt' );

	// Set translatepress id
	if ( class_exists('TRP_Translate_Press') ) {
		update_option( 'translatepress_affiliate_id', 1 );
	}
}
add_action( 'init', '_the_core_init' );


if ( ! function_exists( 'the_core_action_open_graph' ) ) :
	function the_core_action_open_graph() {
		$the_core_action_open_graph = apply_filters( 'the_core_filter_open_graph', true );

		if( function_exists( 'wpseo_auto_load' ) || function_exists( 'wpsso_schema_attributes' ) ) {
			$the_core_action_open_graph = false;
		}

		if( ! $the_core_action_open_graph ) {
			return;
		}

		if ( ( is_single() || is_page() ) || ( is_front_page() && is_home() ) ) {
			$title       = strip_tags( get_the_title() );
			$description = has_excerpt() ? strip_tags( get_the_excerpt() ) : '';
			$permalink   = esc_url( get_the_permalink() );
			if ( is_front_page() && is_home() && get_option('show_on_front', 'posts') == 'posts' ) {
				$title       = get_bloginfo('name');
				$description = get_bloginfo( 'description' );
				$permalink   = home_url("/");
				$the_core_homepage_thumbnail = function_exists('fw_get_db_settings_option') ? fw_get_db_settings_option('general_homepage_header/homepage_thumbnail', '' ) : '';
				if ( isset( $the_core_homepage_thumbnail['url'] ) ) {
					echo '<meta property="og:image" content="' . the_core_server_protocol().$the_core_homepage_thumbnail['url'] . '" />';
				}
			}
			elseif ( has_post_thumbnail() ) {
				global $post;
				$post_thumbnail_id = get_post_thumbnail_id( $post->ID );
				$post_thumbnail    = wp_get_attachment_image_src( $post_thumbnail_id, '' );
				if ( isset( $post_thumbnail['0'] ) ) {
					echo '<meta property="og:image" content="' . $post_thumbnail['0'] . '" />';
				}
			}

			echo '<meta property="og:title" content="' . $title . '" />';
			echo '<meta property="og:url" content="' . $permalink . '" />';
			echo '<meta property="og:type" content="website" />';
			echo '<meta property="og:description" content="' . $description . '" />';
			echo apply_filters( 'the_core_filter_open_graph_extra_meta', '' );
		}
	}
endif;
add_action( 'wp_head', 'the_core_action_open_graph' );


if ( ! function_exists('_the_core_polylang_string_translations') ) :
	function _the_core_polylang_string_translations() {

		if( ! function_exists( 'pll_register_string' ) ) {
			/* if not installed polylang return */
			return;
		}

		// widgets titles
		global $wp_registered_widgets;
		$sidebars = wp_get_sidebars_widgets();
		foreach ( $sidebars as $sidebar => $widgets ) {
			if ( 'wp_inactive_widgets' == $sidebar || empty( $widgets ) ) {
				continue;
			}

			foreach ( $widgets as $widget ) {
				// nothing can be done if the widget is created using pre WP2.8 API :(
				// there is no object, so we can't access it to get the widget options
				if ( ! isset( $wp_registered_widgets[ $widget ]['callback'][0] ) || ! is_object( $wp_registered_widgets[ $widget ]['callback'][0] ) || ! method_exists( $wp_registered_widgets[ $widget ]['callback'][0], 'get_settings' ) ) {
					continue;
				}

				$widget_settings = $wp_registered_widgets[ $widget ]['callback'][0]->get_settings();
				$number = $wp_registered_widgets[ $widget ]['params'][0]['number'];

				// don't enable widget translation if the widget is visible in only one language or if there is no title
				if ( empty( $widget_settings[ $number ]['pll_lang'] ) ) {
					if ( isset( $widget_settings[ $number ]['follow_button'] ) ) {
						pll_register_string( 'follow_button', $widget_settings[ $number ]['follow_button'] );
					}
				}
			}
		}
	}
endif;
add_action( 'admin_init', '_the_core_polylang_string_translations' );


/**
 * Filters for WPML String Translation to translate logo
 */
function _filter_the_core_logo_title( $title ) {
	return icl_t( 'The Core', 'the-core-logo-title', $title );
}

function _filter_the_core_logo_subtitle( $subtitle ) {
	return icl_t( 'The Core', 'the-core-logo-subtitle', $subtitle );
}

function _filter_the_core_socials_wpml( $social, $i ) {
	if( ! function_exists( 'icl_t' ) ) {
		return $social;
	}

	return icl_t( 'The Core', 'the-core-social-link-'.$i, $social );
}

if( ! function_exists( 'the_core_filter_search_header_text' ) ) :
	function the_core_filter_search_header_text( $search_text, $search_type ) {
		if ( ! function_exists( 'icl_t' ) ) {
			return $search_text;
		}

		return icl_t( 'The Core', 'the-core-header-search-' . $search_type, $search_text );
	}
endif;

function _action_add_wpml_support() {
	if ( ! defined( 'FW' )
		|| ! function_exists( 'icl_register_string' )
		|| ! function_exists( 'icl_t' )
	) {
		return;
	}

	// wpml register social URL's
	$socials = fw_get_db_settings_option( 'socials' );
	if ( ! empty( $socials ) ) {
		$i = 0;
		foreach ( $socials as $item ) {
			$i++;
			if ( !empty( $item['social-link'] ) ) {
				do_action( 'wpml_register_single_string', 'The Core', 'the-core-social-link-'.$i, $item['social-link'] );
			}
		}
	}

	// Translate the Header Search placeholder text
	$the_core_header_settings  = fw_get_db_settings_option( 'header_settings' );
	$the_core_search_type      = isset( $the_core_header_settings['enable_search']['yes']['search_type']['selected'] ) ? $the_core_header_settings['enable_search']['yes']['search_type']['selected'] : '';
	$the_core_placeholder_text = isset( $the_core_header_settings['enable_search']['yes']['search_type'][ $the_core_search_type ]['search_advanced_styling']['placeholder_text'] ) ? $the_core_header_settings['enable_search']['yes']['search_type'][ $the_core_search_type ]['search_advanced_styling']['placeholder_text'] : '';

	if ( !empty($the_core_search_type) && !empty($the_core_placeholder_text) ) {
		do_action( 'wpml_register_single_string', 'The Core', 'the-core-header-search-' . $the_core_search_type, $the_core_placeholder_text );
	}


	// wpml register logo title & subtitle
	$logo_settings = fw_get_db_settings_option( 'logo_settings' );

	if ( fw_akg( 'logo/selected_value', $logo_settings ) != 'text' ) {
		return;
	}

	/**
	 * Register the string for the String Translation so you can translate from dashboard
	 */
	do_action( 'wpml_register_single_string', 'The Core', 'the-core-logo-title', fw_akg( 'logo/text/title', $logo_settings ) );
	do_action( 'wpml_register_single_string', 'The Core', 'the-core-logo-subtitle', fw_akg( 'logo/text/subtitle', $logo_settings  ) );

	/**
	 * Add filters to translate the logo in frontend
	 */
	add_filter( 'the_core_logo_title', '_filter_the_core_logo_title' );
	add_filter( 'the_core_logo_subtitle', '_filter_the_core_logo_subtitle' );
}
add_action( 'after_setup_theme', '_action_add_wpml_support' );


if (!function_exists('_the_core_action_theme_support')) :
	/**
	 * Theme support
	 */
	function _the_core_action_theme_support()
	{
		the_post_thumbnail(); // the_post_thumbnail
		add_theme_support("title-tag"); // support the title tag
		add_theme_support("custom-header", array());
		add_theme_support("custom-background", array());
		add_editor_style();
	}
endif;


if (!function_exists('_the_core_action_content_width')) :
	/**
	 * Adjust content_width value for image attachment template.
	 * @internal
	 */
	function _the_core_action_content_width()
	{
		if (is_attachment() && wp_attachment_is_image()) {
			$GLOBALS['content_width'] = 1920;
		}
	}
endif;
add_action('template_redirect', '_the_core_action_content_width');


if (!function_exists('_wp_render_title_tag')) :
	function _the_core_theme_slug_render_title()
	{ ?>
		<title><?php wp_title('|', true, 'right'); ?></title>
	<?php
	}

	add_action('wp_head', '_the_core_theme_slug_render_title');
endif;


if (!function_exists('_the_core_action_widgets_init')) :
	/**
	 * Register widget areas
	 * @internal
	 */
	function _the_core_action_widgets_init()
	{
		$beforeWidget = apply_filters('_filter_the_core_before_widget_container', '<aside id="%1$s" class="widget %2$s">');
		$afterWidget = apply_filters('_filter_the_core_after_widget_container', '</aside>');
		$beforeTitle = apply_filters('_filter_the_core_before_widget_title', '<h2 class="widget-title"><span>');
		$afterTitle = apply_filters('_filter_the_core_after_widget_title', '</span></h2>');
		register_sidebar(array(
			'name' => esc_html__('General Widget Area', 'the-core'),
			'id' => 'sidebar-1',
			'before_widget' => $beforeWidget,
			'after_widget' => $afterWidget,
			'before_title' => $beforeTitle,
			'after_title' => $afterTitle,
		));
		register_sidebar(array(
			'name' => esc_html__('Footer Column 1', 'the-core'),
			'id' => 'footer-1',
			'before_widget' => $beforeWidget,
			'after_widget' => $afterWidget,
			'before_title' => $beforeTitle,
			'after_title' => $afterTitle,
		));
		register_sidebar(array(
			'name' => esc_html__('Footer Column 2', 'the-core'),
			'id' => 'footer-2',
			'before_widget' => $beforeWidget,
			'after_widget' => $afterWidget,
			'before_title' => $beforeTitle,
			'after_title' => $afterTitle,
		));
		register_sidebar(array(
			'name' => esc_html__('Footer Column 3', 'the-core'),
			'id' => 'footer-3',
			'before_widget' => $beforeWidget,
			'after_widget' => $afterWidget,
			'before_title' => $beforeTitle,
			'after_title' => $afterTitle,
		));
		register_sidebar(array(
			'name' => esc_html__('Footer Column 4', 'the-core'),
			'id' => 'footer-4',
			'before_widget' => $beforeWidget,
			'after_widget' => $afterWidget,
			'before_title' => $beforeTitle,
			'after_title' => $afterTitle,
		));
		register_sidebar(array(
			'name' => esc_html__('Footer Column 5', 'the-core'),
			'id' => 'footer-5',
			'before_widget' => $beforeWidget,
			'after_widget' => $afterWidget,
			'before_title' => $beforeTitle,
			'after_title' => $afterTitle,
		));
		register_sidebar(array(
			'name' => esc_html__('Footer Column 6', 'the-core'),
			'id' => 'footer-6',
			'before_widget' => $beforeWidget,
			'after_widget' => $afterWidget,
			'before_title' => $beforeTitle,
			'after_title' => $afterTitle,
		));
	}
endif;
add_action('widgets_init', '_the_core_action_widgets_init');


if (!function_exists('_the_core_filter_admin_memory_limit')) :
	/**
	 * Increase memory limit
	 */
	function _the_core_filter_admin_memory_limit()
	{
		return '256M';
	}

	add_filter('admin_memory_limit', '_the_core_filter_admin_memory_limit');
endif;


if( !function_exists('_the_core_action_settings_form_saved') ) :
	/**
	 * Generate CSS with PHP
	 */
	function _the_core_action_settings_form_saved() {
		the_core_render_view( get_template_directory().'/dynamic-css/fw-variables.php', array(), false );
		the_core_render_view( get_template_directory().'/dynamic-css/fw-theme.php', array(), false );
	}
endif;
add_action('fw_settings_form_saved', '_the_core_action_settings_form_saved', 999, 2);


if (!function_exists('_the_core_action_print_google_fonts_link')) :
	/**
	 * Print google fonts link
	 */
	function _the_core_action_print_google_fonts_link() {
		$the_core_disable_google_fonts_including = apply_filters('the_core_disable_google_fonts_including', false);
		if( $the_core_disable_google_fonts_including ) {
			return;
		}

		global $post, $google_fonts_list, $post_google_fonts_list;
		$google_fonts_list = $post_google_fonts_list = array();
		// get general font list
		$fw_theme_google_fonts_list = get_option('fw_theme_google_fonts_list', array());

		// get font for specific post or term
		if ( !is_singular() && function_exists('get_term_meta') ) {
			if ( is_category() ) {
				$term = get_category(get_query_var('cat'), false);
			} else {
				$term = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy'));
			}
			if ( isset($term->term_id) ) {
				$term_id = $term->term_id;
				$fw_theme_post_google_fonts = get_term_meta($term_id, 'fw_theme_post_google_fonts', true);
				if (!empty($fw_theme_post_google_fonts)) {
					$fw_theme_google_fonts_list = the_core_array_merge_recursive($fw_theme_google_fonts_list, $fw_theme_post_google_fonts);
				}
			}
		} else {
			if ( isset($post->ID) ) {
				$fw_theme_post_google_fonts = get_post_meta($post->ID, 'fw_theme_post_google_fonts', true);
				if ( !empty($fw_theme_post_google_fonts) ) {
					$fw_theme_google_fonts_list = the_core_array_merge_recursive($fw_theme_google_fonts_list, $fw_theme_post_google_fonts);
				}
			}
		}

		if ( !empty($fw_theme_google_fonts_list) ) {
			wp_register_style('fw-googleFonts', the_core_get_remote_fonts($fw_theme_google_fonts_list));
			wp_enqueue_style('fw-googleFonts');
		}
	}
endif;


if ( ! function_exists( '_the_core_action_print_google_fonts_async' ) ) :
	function _the_core_action_print_google_fonts_async() {
		$the_core_disable_google_fonts_including = apply_filters('the_core_disable_google_fonts_including', false);
		if( $the_core_disable_google_fonts_including ) {
			return;
		}

		global $post, $google_fonts_list, $post_google_fonts_list;
		$google_fonts_list = $post_google_fonts_list = array();
		// get general font list
		$fw_theme_google_fonts_list = get_option('fw_theme_google_fonts_list', array());

		// get font for specific post or term
		if ( !is_singular() && function_exists('get_term_meta') ) {
			if ( is_category() ) {
				$term = get_category(get_query_var('cat'), false);
			} else {
				$term = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy'));
			}
			if ( isset($term->term_id) ) {
				$term_id = $term->term_id;
				$fw_theme_post_google_fonts = get_term_meta($term_id, 'fw_theme_post_google_fonts', true);
				if (!empty($fw_theme_post_google_fonts)) {
					$fw_theme_google_fonts_list = the_core_array_merge_recursive($fw_theme_google_fonts_list, $fw_theme_post_google_fonts);
				}
			}
		} else {
			if ( isset($post->ID) ) {
				$fw_theme_post_google_fonts = get_post_meta($post->ID, 'fw_theme_post_google_fonts', true);
				if ( !empty($fw_theme_post_google_fonts) ) {
					$fw_theme_google_fonts_list = the_core_array_merge_recursive($fw_theme_google_fonts_list, $fw_theme_post_google_fonts);
				}
			}
		}

		if ( !empty($fw_theme_google_fonts_list) ) {
			echo the_core_get_remote_fonts_async( $fw_theme_google_fonts_list );
		}
	}
endif;

$the_core_filter_google_fonts_async = apply_filters('the_core_filter_google_fonts_async', false);
if ( $the_core_filter_google_fonts_async ) {
	add_action('wp_footer', '_the_core_action_print_google_fonts_async', 999);
}
else {
	add_action('wp_enqueue_scripts', '_the_core_action_print_google_fonts_link', 999);
}


if (!function_exists('_the_core_action_login_enqueue_scripts')) :
	/**
	 * Print google fonts in admin
	 */
	function _the_core_action_login_enqueue_scripts()
	{
		// get general admin font list
		$fw_custom_login_page_fonts = get_option('fw_custom_login_page_fonts', array());

		if (!empty($fw_custom_login_page_fonts)) {
			wp_register_style('fw-googleFonts-admin', the_core_get_remote_fonts($fw_custom_login_page_fonts));
			wp_enqueue_style('fw-googleFonts-admin');
		}
	}
endif;
add_action('login_enqueue_scripts', '_the_core_action_login_enqueue_scripts');


if (!function_exists('_the_core_action_set_global_colors')) :
	/**
	 * Set global colors
	 */
	function _the_core_action_set_global_colors()
	{
		global $the_core_color_settings;
		$the_core_colors = array(
			'color_1' => '#d12a5c',
			'color_2' => '#49ca9f',
			'color_3' => '#1f1f1f',
			'color_4' => '#808080',
			'color_5' => '#ebebeb'
		);
		$the_core_color_settings = function_exists('fw_get_db_settings_option') ? fw_get_db_settings_option('color_settings', $the_core_colors) : $the_core_colors;
	}
endif;
add_action('init', '_the_core_action_set_global_colors');


if (!function_exists('_the_core_action_dashboard_palette_colors')) :
	/**
	 * Dashboard color palette styles
	 */
	function _the_core_action_dashboard_palette_colors()
	{
		global $the_core_color_settings;
		echo '<style>
			.fw_theme_bg_color_1{ background-color: ' . $the_core_color_settings['color_1'] . '; }
			.fw_theme_bg_color_2{ background-color: ' . $the_core_color_settings['color_2'] . '; }
			.fw_theme_bg_color_3{ background-color: ' . $the_core_color_settings['color_3'] . '; }
			.fw_theme_bg_color_4{ background-color: ' . $the_core_color_settings['color_4'] . '; }
			.fw_theme_bg_color_5{ background-color: ' . $the_core_color_settings['color_5'] . '; }
		</style>';
	}
endif;
add_action('admin_head', '_the_core_action_dashboard_palette_colors');


if (!function_exists('_the_core_action_count_post_visits')) :
	/**
	 * Count post visits
	 */
	function _the_core_action_count_post_visits()
	{
		if (!is_single()) {
			return;
		}
		global $post;
		$views = get_post_meta($post->ID, 'fw_post_views', true);
		$views = intval($views);
		update_post_meta($post->ID, 'fw_post_views', ++$views);
	}
endif;
add_action('wp_head', '_the_core_action_count_post_visits');


if (!function_exists('_the_core_filter_get_avatar')) :
	/**
	 * Get default user avatar
	 *
	 * @param string $avatar
	 * @param string|integer $id_or_email
	 * @param integer $size
	 */
	function _the_core_filter_get_avatar($avatar, $id_or_email, $size, $default, $alt)
	{
		$avatar_src = '';
		if (defined('FW')) {
			$avatar_src = fw_get_db_settings_option('default_avatar');
		}

		if (empty($avatar_src) || is_admin()) {
			return $avatar;
		}

		$email = '';
		if (is_numeric($id_or_email)) {
			$id = (int)$id_or_email;
			$user = get_userdata($id);
			if ($user) {
				$email = $user->user_email;
			}
		} elseif (is_object($id_or_email)) {
			// No avatar for pingbacks or trackbacks
			$allowed_comment_types = apply_filters('get_avatar_comment_types', array('comment'));
			if (!empty($id_or_email->comment_type) && !in_array($id_or_email->comment_type, (array)$allowed_comment_types)) {
				return false;
			}

			if (!empty($id_or_email->user_id)) {
				$id = (int)$id_or_email->user_id;
				$user = get_userdata($id);
				if ($user) {
					$email = $user->user_email;
				}
			} elseif (!empty($id_or_email->comment_author_email)) {
				$email = $id_or_email->comment_author_email;
			}
		} else {
			$email = $id_or_email;
		}

		if (!the_core_user_has_gravatar($email)) {
			$avatar = "<img alt='' src='" . fw_resize($avatar_src['url'], $size, $size) . "' class='avatar avatar-" . $size . " photo avatar-default' height='" . $size . "' width='" . $size . "' />";
		}

		return $avatar;
	}
endif;
add_filter('get_avatar', '_the_core_filter_get_avatar', 10, 5);


if (!function_exists('_the_core_action_save_fw_portfolio_post')) :
	/**
	 * Set post terms to portfolio on save
	 */
	function _the_core_action_save_fw_portfolio_post()
	{
		$post_id = isset( $_POST['post_ID'] ) ? $_POST['post_ID'] : '';
		if (!the_core_is_real_post_save($post_id)) {
			return;
			die();
		}
		$taxonomy = 'fw-portfolio-category';
		$terms = wp_get_post_terms($post_id, $taxonomy);

		$parrents_ids = array();
		foreach ($terms as $term) {
			if ($term->parent != 0) {
				if (!in_array($term->parent, $parrents_ids)) {
					$parrents_ids[] = $term->parent;
				}
			}
		}

		foreach ($parrents_ids as $term_id) {
			wp_set_post_terms($post_id, $term_id, $taxonomy, true);
		}
	}
endif;
add_action('save_post_fw-portfolio', '_the_core_action_save_fw_portfolio_post');


if (!function_exists('_the_core_action_ajax_save_flickr_photos')) :
	/**
	 * Save flickr photos
	 */
	function _the_core_action_ajax_save_flickr_photos()
	{
		$photos = ($_POST['photos']);
		$photos = str_replace('\"', '"', $photos);
		if ( is_ssl() ) {
			$photos = str_replace('http://', 'https://', $photos );
		}
		$photos = json_decode($photos);
		$success = 'false';
		if (isset($photos->photos) && !empty($photos->photos)) {
			// set a 30 minutes transient
			$success = set_transient('fw_theme_flickr_images_' . $_POST['photosetId'] . '_' . $_POST['numberPhotos'], $photos->photos, 60 * 30);
		}
		$response = array('success' => $success);
		echo json_encode($response);
		die();
	}

	add_action('wp_ajax__the_core_action_ajax_save_flickr_photos', '_the_core_action_ajax_save_flickr_photos');
	add_action('wp_ajax_nopriv__the_core_action_ajax_save_flickr_photos', '_the_core_action_ajax_save_flickr_photos');
endif;


if (!function_exists('_the_core_filter_themefuse_carousel_population_method_custom_options')) :
	/**
	 * Filter for disable standard slider fields for project slider
	 *
	 * @param array $arr
	 */
	function _the_core_filter_themefuse_carousel_population_method_custom_options($arr)
	{
		unset(
			$arr['wrapper-population-method-custom']['options']['custom-slides']['slides_options']['title'],
			$arr['wrapper-population-method-custom']['options']['custom-slides']['slides_options']['desc']
		);

		return $arr;
	}

	add_filter('fw_ext_themefuse_carousel_population_method_custom_options', '_the_core_filter_themefuse_carousel_population_method_custom_options');
endif;


if (!function_exists('_the_core_filter_easy_carousel_population_method_custom_options')) :
	/**
	 * Filter for disable standard slider fields for carousel slider
	 *
	 * @param array $arr
	 */
	function _the_core_filter_easy_carousel_population_method_custom_options($arr)
	{
		unset(
			$arr['wrapper-population-method-custom']['options']['custom-slides']['slides_options']['title'],
			$arr['wrapper-population-method-custom']['options']['custom-slides']['slides_options']['desc']
		);

		return $arr;
	}

	add_filter('fw_ext_easy_carousel_population_method_custom_options', '_the_core_filter_easy_carousel_population_method_custom_options');
endif;


if (!function_exists('_the_core_filter_easy_slider_population_method_custom_options')) :
	/**
	 * Filter for disable standard slider fields for easy slider
	 *
	 * @param array $arr
	 */
	function _the_core_filter_easy_slider_population_method_custom_options($arr)
	{
		unset(
			$arr['wrapper-population-method-custom']['options']['custom-slides']['slides_options']['desc']
		);

		return $arr;
	}

	add_filter('fw_ext_easy_slider_population_method_custom_options', '_the_core_filter_easy_slider_population_method_custom_options');
endif;


if (!function_exists('_the_core_filter_body_class')) :
	/**
	 * Filter for add space/top-bar/absolute-header class
	 *
	 * @param array $classes
	 */
	function _the_core_filter_body_class($classes)
	{
		global $coming_soon;
		if (function_exists('fw_get_db_settings_option')) {
			$the_core_general_settings = defined('FW') ? fw_get_db_settings_option() : array();
			$the_core_header_type = 'header-1';

			// for empty logo
			if( isset($the_core_general_settings['logo_settings']['logo']['selected_value']) ) {
				if( $the_core_general_settings['logo_settings']['logo']['selected_value'] == 'image' ) {
					if( empty($the_core_general_settings['logo_settings']['logo']['image']['image_logo']) ) {
						$classes[] = 'fw-logo-no-set';
					}
				}
				else {
					if( empty($the_core_general_settings['logo_settings']['logo']['text']['title']) && empty($the_core_general_settings['logo_settings']['logo']['text']['subtitle']) ) {
						$classes[] = 'fw-logo-no-set';
					}
				}
			}

			if (isset($the_core_general_settings['container_site_type']['selected'])) {
				if (!$coming_soon) {
					$classes[] = $the_core_general_settings['container_site_type']['selected'];
				}
			}

			if ( $coming_soon ) {
				$classes[] = 'fw-coming-soon';
			}

			if (isset($the_core_general_settings['container_site_type']['fw-side-boxed']['site_alignment'])) {
				$classes[] = $the_core_general_settings['container_site_type']['fw-side-boxed']['site_alignment'];
			}

			if ( isset($the_core_general_settings['section_spacing']) ) {
				if ( $the_core_general_settings['section_spacing'] == 'fw-section-space-sm' || $the_core_general_settings['section_spacing'] == 'fw-section-space-md' || $the_core_general_settings['section_spacing'] == 'fw-section-space-lg' ) {
					$classes[] = $the_core_general_settings['section_spacing'];
				}
				else {
					$classes[] = 'fw-custom-section-density';
				}
			}

			if (isset($the_core_general_settings['header_settings']['header_type_picker']['header_type'])) {
				$the_core_header_type = $the_core_general_settings['header_settings']['header_type_picker']['header_type'];
			}
			$classes[] = $the_core_header_type;

			if (isset($the_core_general_settings['header_settings']['enable_header_top_bar']['selected_value'])) {
				if ($the_core_general_settings['header_settings']['enable_header_top_bar']['selected_value'] == 'yes') {
					$classes[] = 'fw-top-bar-on';
				} else {
					$classes[] = 'fw-top-bar-off';
				}
			}

			if( isset($the_core_general_settings['header_settings']['boxed_header']['selected_value']) && $the_core_general_settings['header_settings']['boxed_header']['selected_value'] == 'yes' ) {
				$classes[] = 'fw-header-boxed';
			}
			
			if ( isset($the_core_general_settings['header_settings']['enable_absolute_header']['selected_value']) && $the_core_header_type != 'header-6' ) {
				$classes[] = $the_core_general_settings['header_settings']['enable_absolute_header']['selected_value'];
			}

			if (isset($the_core_general_settings['header_settings']['enable_header_top_bar']['yes']['enable_header_socials']['yes']['header_social_position'])) {
				$classes[] = $the_core_general_settings['header_settings']['enable_header_top_bar']['yes']['enable_header_socials']['yes']['header_social_position'];
			}

			if (isset($the_core_general_settings['header_settings']['enable_sticky_header']) && $the_core_header_type != 'header-6' ) {
				$classes[] = $the_core_general_settings['header_settings']['enable_sticky_header'];
			}

			$the_core_enable_search = isset($the_core_general_settings['header_settings']['enable_search']['selected_value']) ? $the_core_general_settings['header_settings']['enable_search']['selected_value'] : '';
			$the_core_search_position = isset($the_core_general_settings['header_settings']['enable_search']['yes']['search_position']) ? $the_core_general_settings['header_settings']['enable_search']['yes']['search_position'] : '';
			if ($the_core_enable_search == 'yes' && $the_core_search_position == 'top_bar' && $the_core_header_type != 'header-2') {
				$classes[] = 'search-in-top-bar';
			} elseif ($the_core_enable_search == 'yes' && $the_core_search_position == 'menu_bar' && $the_core_header_type != 'header-2') {
				$classes[] = 'search-in-menu';
			}

			if ($the_core_header_type == 'header-2') {
				$classes[] = 'search-in-top-bar';
			}

			// mobile menu options
			if( isset( $the_core_general_settings['header_settings']['mobile_menu_options'] ) ) {
				// menu items alignment
				if( $the_core_header_type == 'header-1' || $the_core_header_type == 'header-2' || $the_core_header_type == 'header-3' || $the_core_header_type == 'header-4' ) {
					$classes[] = $the_core_general_settings['header_settings']['mobile_menu_options']['menu_items_alignment'];

					// for burger menu position
					if( isset( $the_core_general_settings['header_settings']['mobile_menu_options']['m_menu_position'] ) ) {
						$classes[] = $the_core_general_settings['header_settings']['mobile_menu_options']['m_menu_position'];
					}
				}

				if( 'image' == $the_core_general_settings['header_settings']['mobile_menu_options']['background_options']['background'] && 'yes' == $the_core_general_settings['header_settings']['mobile_menu_options']['background_options']['image']['overlay_options']['overlay'] ) {
					$classes[] = 'fw-mobile-menu-overlay';
				}
			}

			// header 1
			if (isset($the_core_general_settings['header_settings']['header_type_picker']['header-1']['logo_align']) && $the_core_header_type == 'header-1') {
				$classes[] = $the_core_general_settings['header_settings']['header_type_picker']['header-1']['logo_align'];
			}

			// header 5
			if (isset($the_core_general_settings['header_settings']['header_type_picker']['header-5']['logo_align']) && $the_core_header_type == 'header-5') {
				$classes[] = $the_core_general_settings['header_settings']['header_type_picker']['header-5']['logo_align'];
			}
			if (isset($the_core_general_settings['header_settings']['header_type_picker']['header-5']['header_5_popup']['menu_alignment']) && $the_core_header_type == 'header-5') {
				$classes[] = $the_core_general_settings['header_settings']['header_type_picker']['header-5']['header_5_popup']['menu_alignment'];
			}

			// header 6
			if (isset($the_core_general_settings['header_settings']['header_type_picker']['header-6']['header_6_popup']['menu_items_alignment']) && $the_core_header_type == 'header-6') {
				$classes[] = $the_core_general_settings['header_settings']['header_type_picker']['header-6']['header_6_popup']['menu_items_alignment'];
			}
			if (isset($the_core_general_settings['header_settings']['header_type_picker']['header-6']['menu_align']) && $the_core_header_type == 'header-6') {
				$classes[] = 'header-align-'.$the_core_general_settings['header_settings']['header_type_picker']['header-6']['menu_align'];
			}
			
			// retina logo
			if( isset($the_core_general_settings['logo_settings']['logo']['selected_value']) && $the_core_general_settings['logo_settings']['logo']['selected_value'] == 'image') {
				$classes[] = 'fw-logo-image';
				if (isset($the_core_general_settings['logo_settings']['logo']['image']['retina_logo'])) {
					$classes[] = $the_core_general_settings['logo_settings']['logo']['image']['retina_logo'];
				} else {
					$classes[] = 'fw-logo-no-retina';
				}
			} elseif( isset($the_core_general_settings['logo_settings']['logo']['selected_value']) && $the_core_general_settings['logo_settings']['logo']['selected_value'] == 'text') {
				$classes[] = 'fw-logo-text';
				if (empty($the_core_general_settings['logo_settings']['logo']['text']['subtitle'])) {
					$classes[] = 'fw-no-subtitle';
				}
			}

			// for sticky header logo
			if( isset($the_core_general_settings['header_settings']['sticky_header_styling']['sticky_logo_retina']) && isset($the_core_general_settings['header_settings']['sticky_header_styling']['logo']) && !empty($the_core_general_settings['header_settings']['sticky_header_styling']['logo']) && 'fw-header-sticky' == $the_core_general_settings['header_settings']['enable_sticky_header']) {
				$classes[] = $the_core_general_settings['header_settings']['sticky_header_styling']['sticky_logo_retina'];
			}

			if (isset($the_core_general_settings['enable_smartphone_animations']) && $the_core_general_settings['enable_smartphone_animations'] != 'yes') {
				$classes[] = 'fw-animation-mobile-off';
			}

			if (function_exists('fw_ext_sidebars_get_current_position')) {
				$the_core_sidebar_position = fw_ext_sidebars_get_current_position();
				if ($the_core_sidebar_position == 'left' || $the_core_sidebar_position == 'right') {
					$classes[] = 'has-sidebar';
				}
			}

			if ( wp_is_mobile() ) {
				$classes[] = 'fw-touchDevice';
			}
		} else {
			$classes[] = 'fw-unyson-disabled';
			$classes[] = 'header-1';
			$classes[] = 'fw-top-logo-left';
			$classes[] = 'fw-section-space-md';
			$classes[] = 'fw-animation-mobile-off';
		}

		return $classes;
	}

	add_filter('body_class', '_the_core_filter_body_class');
endif;


if (!function_exists('_the_core_filter_active_slider')) :
	/**
	 * Filter for disable framework sliders
	 *
	 * @param array $sliders
	 */
	function _the_core_filter_active_slider($sliders)
	{
		$sliders = array_diff($sliders, array('bx-slider', 'nivo-slider', 'owl-carousel'));

		return $sliders;
	}

	add_filter('fw_ext_slider_activated', '_the_core_filter_active_slider');
endif;


if (!function_exists('_the_core_action_theme_includes_additional_option_types')) :
	/**
	 * Include addition option types
	 */
	function _the_core_action_theme_includes_additional_option_types()
	{
		$the_core_template_directory = get_template_directory();

		load_template($the_core_template_directory . '/theme-includes/includes/option-types/color-palette/class-fw-color-palette-new.php');
		load_template($the_core_template_directory . '/theme-includes/includes/option-types/tf-animation/class-fw-option-type-tf-animation.php');
		load_template($the_core_template_directory . '/theme-includes/includes/option-types/tf-typography/class-fw-option-type-tf-typography.php');
	}

	add_action('fw_option_types_init', '_the_core_action_theme_includes_additional_option_types');
endif;

if ( ! function_exists( '_the_core_action_theme_includes_additional_container_types' ) ) :
	/**
	 * Include addition option types
	 */
	function _the_core_action_theme_includes_additional_container_types() {
		load_template(
			get_template_directory()
			. '/theme-includes/includes/container-types/tf-option-picker/class-fw-container-type-tf-option-picker.php'
		);
	}

	add_action( 'fw_container_types_init', '_the_core_action_theme_includes_additional_container_types' );
endif;


if( !function_exists('_the_core_action_theme_includes_tgm') ) :
	/**
	 * Include TGM
	 */
	function _the_core_action_theme_includes_tgm() {
		$theme_id          = the_core_get_the_theme_id();
		$option_auto_setup = get_option('tfuse' . '_' . $theme_id . '_auto_install_state', array() );

		// if option auto setup have the "auto-setup-step-choosed" set to "skip"
		if( isset( $option_auto_setup['steps']['auto-setup-step-choosed'] ) && $option_auto_setup['steps']['auto-setup-step-choosed'] == 'skip' ) {
			// load tgm if user skip the auto-setup
			load_template( get_template_directory() . '/theme-includes/register-required-plugins.php' );
		}
	}
	add_action('after_setup_theme', '_the_core_action_theme_includes_tgm');
endif;


// filters for woocommerce
if ( ! function_exists( '_the_core_loop_shop_per_page' ) ) {
	function _the_core_loop_shop_per_page( $cols ) {
		return 8;
	}
}
add_filter( 'loop_shop_per_page', '_the_core_loop_shop_per_page', 20 );

if (!function_exists('_the_core_filter_woocommerce_related_products_filter')) :
	/**
	 * Woocomerce related products filter
	 */
	function _the_core_filter_woocommerce_related_products_filter($args)
	{
		$args['posts_per_page'] = 4; // 4 related products
		$args['columns'] = 4; // arranged in 4 columns
		return $args;
	}

	add_filter('woocommerce_output_related_products_args', '_the_core_filter_woocommerce_related_products_filter');
endif;


if (!function_exists('_the_core_action_woocommerce_output_upsells')) {
	/**
	 * Woocomerce upsell output action
	 */
	function _the_core_action_woocommerce_output_upsells()
	{
		woocommerce_upsell_display(4, 4); // Display 4 products in rows of 4
	}
}
remove_action('woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15);
add_action('woocommerce_after_single_product_summary', '_the_core_action_woocommerce_output_upsells', 15);


if (!function_exists('_the_core_action_woocommerce_output_content_wrapper')) :
	/**
	 * Woocomerce output content wrapper before
	 */
	function _the_core_action_woocommerce_output_content_wrapper()
	{
		$the_core_sidebar_position = function_exists('fw_ext_sidebars_get_current_position') ? esc_attr(fw_ext_sidebars_get_current_position()) : 'full';
		// for products header image
		the_core_header_image();
		ob_start();
		?>
		<section class="fw-main-row <?php the_core_get_content_class('main', $the_core_sidebar_position); ?>">
		<div class="fw-container">
		<div class="fw-row">
		<div class="fw-content-area <?php the_core_get_content_class('content', $the_core_sidebar_position); ?>">
		<div class="fw-col-inner">

		<?php
		echo ob_get_clean();
	}
endif;


if (!function_exists('_the_core_action_woocommerce_output_content_wrapper_end')):
	/**
	 * Woocomerce output content wrapper after
	 */
	function _the_core_action_woocommerce_output_content_wrapper_end()
	{
		ob_start(); ?>
		</div>
		</div><!-- /.content-area-->
		<?php get_sidebar(); ?>
		</div><!-- /.row-->
		</div><!-- /.container-->
		</section>
		<?php
		echo ob_get_clean();
	}

endif;


remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

add_action('woocommerce_before_main_content', '_the_core_action_woocommerce_output_content_wrapper', 10);
add_action('woocommerce_after_main_content', '_the_core_action_woocommerce_output_content_wrapper_end', 10);


if ( !function_exists('_the_core_support_sensei') ) :
	function _the_core_support_sensei () {
		if ( ! class_exists('Sensei_Main') ) {
			return;
		}
		global $woothemes_sensei;
		remove_action( 'sensei_before_main_content', array( $woothemes_sensei->frontend, 'sensei_output_content_wrapper' ), 10 );
		remove_action( 'sensei_after_main_content', array( $woothemes_sensei->frontend, 'sensei_output_content_wrapper_end' ), 10 );

		// actions for sensei course categories
		add_action( 'sensei_before_main_content', '_the_core_action_woocommerce_output_content_wrapper', 10 );
		add_action( 'sensei_after_main_content', '_the_core_action_woocommerce_output_content_wrapper_end', 10 );
	}
	_the_core_support_sensei();
endif;


if (!function_exists('_the_core_action_woocommerce_pagination_args')) :
	/**
	 * Change woocommerce pagination args
	 */
	function _the_core_action_woocommerce_pagination_args()
	{
		return array(
			'prev_next' => true,
			'prev_text' => '<i class="fa fa-angle-left"></i><strong>' . esc_html__('Newer', 'the-core') . '</strong>',
			'next_text' => '<strong>' . esc_html__('Older', 'the-core') . '</strong><i class="fa fa-angle-right"></i>',
		);
	}
endif;
add_action('woocommerce_pagination_args', '_the_core_action_woocommerce_pagination_args', 10);


if (!function_exists('_the_core_action_woocommerce_comment_pagination_args')) :
	/**
	 * Change woocommerce comments pagination args
	 */
	function _the_core_action_woocommerce_comment_pagination_args()
	{
		return array(
			'prev_next' => true,
			'prev_text' => '<i class="fa fa-angle-left"></i><strong>' . esc_html__('Newer', 'the-core') . '</strong>',
			'next_text' => '<strong>' . esc_html__('Older', 'the-core') . '</strong><i class="fa fa-angle-right"></i>',
		);
	}
endif;
add_action('woocommerce_comment_pagination_args', '_the_core_action_woocommerce_comment_pagination_args', 10);


if (!function_exists('_the_core_action_wp_audio_shortcode')) :
	/**
	 * Wordpress audio shortcode
	 */
	function _the_core_action_wp_audio_shortcode($html)
	{
		return sprintf('<div class="fw-wrap-boxed-media fw-wp-audio-shortcode">%s</div>', $html);
	}
endif;
add_action('wp_audio_shortcode', '_the_core_action_wp_audio_shortcode');


if (!function_exists('_the_core_action_wp_video_shortcode')) :
	/**
	 * Wordpress embed shortcode
	 */
	function _the_core_action_wp_video_shortcode($output)
	{
		return sprintf('<div class="fw-wrap-boxed-media fw-wp-video-shortcode">%s</div>', $output);
	}
endif;
add_action('wp_video_shortcode', '_the_core_action_wp_video_shortcode');


if (!function_exists('_the_core_action_wp_embed_shortcode')) :
	/**
	 * Wordpress embed shortcode
	 */
	function _the_core_action_wp_embed_shortcode($output)
	{
		return sprintf('<div class="fw-wrap-boxed-media fw-wp-embed-shortcode">%s</div>', $output);
	}
endif;
add_action('embed_oembed_html', '_the_core_action_wp_embed_shortcode');


if (!function_exists('_the_core_action_shortcode_section_enqueue_dynamic_css')):
	/**
	 * @internal
	 *
	 * @param array $data
	 */
	function _the_core_action_shortcode_section_enqueue_dynamic_css($data) {
		$shortcode = 'section';
		$atts = shortcode_parse_atts($data['atts_string']);

		/**
		 * Decode attributes
		 * ( The below weird code is because of this https://github.com/ThemeFuse/Unyson/issues/469 )
		 */
		$atts = fw_ext_shortcodes_decode_attr($atts, $shortcode, $data['post']->ID);
		if ( isset( $atts['auto_generated'] ) && $atts['auto_generated'] == '1' ) {
			// section is auto-generated
			return;
		}

		$final_styles = '';
		if( isset($atts['background_options']['background']) && $atts['background_options']['background'] == 'gradient_color' ) {
			// gradient styling
			if( !empty($atts['background_options']['gradient_color']['gradient_bg_color']['primary']) ) {
				$gradient_orientation = $filter = '';
				$gradient = 'linear-gradient';
				$gradient_type = '1';
				if( $atts['background_options']['gradient_color']['gradient_orientation'] == 'horizontal' ) {
					$gradient_orientation = 'left';
					$filter = 'to right';
				}
				elseif( $atts['background_options']['gradient_color']['gradient_orientation'] == 'vertical' ) {
					$gradient_orientation = 'top';
					$filter = 'to bottom';
					$gradient_type = '0';
				}
				elseif( $atts['background_options']['gradient_color']['gradient_orientation'] == 'diagonal' ) {
					$gradient_orientation = '-45deg';
					$filter = '135de';
				}
				elseif( $atts['background_options']['gradient_color']['gradient_orientation'] == 'diagonal_bottom' ) {
					$gradient_orientation = '45deg';
					$filter = '45deg';
				}
				elseif( $atts['background_options']['gradient_color']['gradient_orientation'] == 'radial' ) {
					$gradient = 'radial-gradient';
					$gradient_orientation = 'center, ellipse cover';
					$filter = 'ellipse at center';
				}

				$final_styles .= '.tf-sh-' . $atts['unique_id'] . ' {
					background: '.$atts['background_options']['gradient_color']['gradient_bg_color']['primary'].';
					background: -moz-'.$gradient.'('.$gradient_orientation.', '.$atts['background_options']['gradient_color']['gradient_bg_color']['primary'].' 0%, '.$atts['background_options']['gradient_color']['gradient_bg_color']['secondary'].' 100%);
					background: -webkit-'.$gradient.'('.$gradient_orientation.', '.$atts['background_options']['gradient_color']['gradient_bg_color']['primary'].' 0%,'.$atts['background_options']['gradient_color']['gradient_bg_color']['secondary'].' 100%);
					background: '.$gradient.'('.$filter.', '.$atts['background_options']['gradient_color']['gradient_bg_color']['primary'].' 0%,'.$atts['background_options']['gradient_color']['gradient_bg_color']['secondary'].' 100%);
					filter: progid:DXImageTransform.Microsoft.gradient( startColorstr="'.$atts['background_options']['gradient_color']['gradient_bg_color']['primary'].'", endColorstr="'.$atts['background_options']['gradient_color']['gradient_bg_color']['secondary'].'",GradientType='.$gradient_type.' );
				}';
			}
		}

		if (empty($final_styles)) {
			return;
		}

		wp_add_inline_style( 'fw-theme-style', $final_styles );
	}
	add_action( 'fw_ext_shortcodes_enqueue_static:section', '_the_core_action_shortcode_section_enqueue_dynamic_css' );
endif;


if (!function_exists('_the_core_action_shortcode_latest_posts_enqueue_dynamic_css')) :
	/**
	 * @internal
	 *
	 * @param array $data
	 */
	function _the_core_action_shortcode_latest_posts_enqueue_dynamic_css($data)
	{
		$shortcode = 'latest_posts';
		$atts = shortcode_parse_atts($data['atts_string']);

		/**
		 * Decode attributes
		 * ( The below weird code is because of this https://github.com/ThemeFuse/Unyson/issues/469 )
		 */
		$atts = fw_ext_shortcodes_decode_attr($atts, $shortcode, $data['post']->ID);

		$final_styles = '';
		if (isset($atts['blog_title']['selected']) && !empty($atts['blog_title']['selected'])) {
			// blog title advanced styling
			$h = $atts['blog_title']['selected'];
			$title_advanced_styling = the_core_get_shortcode_advanced_styles($atts['blog_title'][$h]['advanced_styling'][$h], array('return_color' => true));
			if (!empty($title_advanced_styling['styles'])) $final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .post ' . $h . '.entry-title a {' . $title_advanced_styling['styles'] . '}';
			// responsive blog title styling
			$title_responsive_styles = the_core_responsive_heading_styles(array('styles' => $atts['blog_title'][$h]['advanced_styling'][$h], 'selector' => '.tf-sh-' . $atts['unique_id'] . ' .post ' . $h . '.entry-title a'));
			if (!empty($title_responsive_styles)) $final_styles .= '@media(max-width:767px){' . $title_responsive_styles . '}';
		}

		if (isset($atts['button_options'])) {
			if (isset($atts['button_options']['style']['selected'])) {
				if (isset($atts['button_options']['label_advanced_styling'])) {
					// button label advanced styling
					$label_advanced_styling = the_core_get_shortcode_advanced_styles($atts['button_options']['label_advanced_styling']['text'], array('return_color' => true));
					if (!empty($label_advanced_styling['styles'])) {
						$final_styles .= '.tf-sh-' . $atts['unique_id'] . '.postlist .fw-btn-post-read-more-blog span {' . $label_advanced_styling['styles'] . '}';
						// responsive label styling
						$label_responsive_styles = the_core_responsive_heading_styles(array('styles' => $atts['button_options']['label_advanced_styling']['text'], 'selector' => '.tf-sh-' . $atts['unique_id'] . '.postlist .fw-btn-post-read-more-blog span'));
						if (!empty($label_responsive_styles)) $final_styles .= '@media(max-width:767px){' . $label_responsive_styles . '}';
					}

					// label text hover
					$hover_text_color = the_core_get_color_palette_color_and_class($atts['button_options']['label_advanced_styling']['hover_text_color'], array('return_color' => true));
					if (!empty($hover_text_color['color'])) $final_styles .= '.tf-sh-' . $atts['unique_id'] . '.postlist .fw-btn-post-read-more-blog:hover span' . '{ color: ' . $hover_text_color['color'] . ' !important }';
				}

				// button color options
				if ($atts['button_options']['style']['selected'] == 'fw-btn-3') {
					if (isset($atts['button_options']['style']['fw-btn-3']['border_size']) && !empty($atts['button_options']['style']['fw-btn-3']['border_size'])) {
						$final_styles .= '.tf-sh-' . $atts['unique_id'] . '.postlist .fw-btn-post-read-more-blog{ border-top-width: ' . (int)$atts['button_options']['style']['fw-btn-3']['border_size'] . 'px; border-bottom-width: ' . (int)$atts['button_options']['style']['fw-btn-3']['border_size'] . 'px; }';
					}
					// btn color
					if (isset($atts['button_options']['normal_color'])) {
						$normal_color = the_core_get_color_palette_color_and_class($atts['button_options']['normal_color'], array('return_color' => true));
						if (!empty($normal_color['color'])) $final_styles .= '.tf-sh-' . $atts['unique_id'] . '.postlist .fw-btn-post-read-more-blog{ border-bottom-color: ' . $normal_color['color'] . '; border-top-color: ' . $normal_color['color'] . ' }';
					}
					// hover color
					if (isset($atts['button_options']['hover_color'])) {
						$hover_color = the_core_get_color_palette_color_and_class($atts['button_options']['hover_color'], array('return_color' => true));
						if (!empty($hover_color['color'])) $final_styles .= '.tf-sh-' . $atts['unique_id'] . '.postlist .fw-btn-post-read-more-blog:hover, .postlist .fw-btn-post-read-more-blog:focus { background-color: ' . $hover_color['color'] . '; border-bottom-color: ' . $hover_color['color'] . '; border-top-color: ' . $hover_color['color'] . ' }';
					}
				} elseif ($atts['button_options']['style']['selected'] == 'fw-btn-2') {
					if (isset($atts['button_options']['style']['fw-btn-2']['border_size']) && !empty($atts['button_options']['style']['fw-btn-2']['border_size'])) {
						$final_styles .= '.tf-sh-' . $atts['unique_id'] . '.postlist .fw-btn-post-read-more-blog{ border-width: ' . (int)$atts['button_options']['style']['fw-btn-2']['border_size'] . 'px; }';
					}
					if (isset($atts['button_options']['style']['fw-btn-2']['border_radius']) && !empty($atts['button_options']['style']['fw-btn-2']['border_radius'])) {
						$final_styles .= '.tf-sh-' . $atts['unique_id'] . '.postlist .fw-btn-post-read-more-blog{ border-radius: ' . (int)$atts['button_options']['style']['fw-btn-2']['border_radius'] . 'px; }';
					}

					// btn color
					if (isset($atts['button_options']['normal_color'])) {
						$normal_color = the_core_get_color_palette_color_and_class($atts['button_options']['normal_color'], array('return_color' => true));
						if (!empty($normal_color['color'])) $final_styles .= '.tf-sh-' . $atts['unique_id'] . '.postlist .fw-btn-post-read-more-blog{ border-color: ' . $normal_color['color'] . ' }';
					}
					// hover color
					if (isset($atts['button_options']['hover_color'])) {
						$hover_color = the_core_get_color_palette_color_and_class($atts['button_options']['hover_color'], array('return_color' => true));
						if (!empty($hover_color['color'])) $final_styles .= '.tf-sh-' . $atts['unique_id'] . '.postlist .fw-btn-post-read-more-blog:hover { background-color: ' . $hover_color['color'] . '; border-color: ' . $hover_color['color'] . ' }';
					}
				} elseif ($atts['button_options']['style']['selected'] == 'fw-btn-1') {
					if (isset($atts['button_options']['style']['fw-btn-1']['border_radius']) && !empty($atts['button_options']['style']['fw-btn-1']['border_radius'])) {
						$final_styles .= '.tf-sh-' . $atts['unique_id'] . '.postlist .fw-btn-post-read-more-blog{ border-radius: ' . (int)$atts['button_options']['style']['fw-btn-1']['border_radius'] . 'px; }';
					}

					// btn color
					if (isset($atts['button_options']['normal_color'])) {
						$normal_color = the_core_get_color_palette_color_and_class($atts['button_options']['normal_color'], array('return_color' => true));
						if (!empty($normal_color['color'])) $final_styles .= '.tf-sh-' . $atts['unique_id'] . '.postlist .fw-btn-post-read-more-blog{ background-color: ' . $normal_color['color'] . ' }';
					}
					// hover color
					if (isset($atts['button_options']['hover_color'])) {
						$hover_color = the_core_get_color_palette_color_and_class($atts['button_options']['hover_color'], array('return_color' => true));
						if (!empty($hover_color['color'])) $final_styles .= '.tf-sh-' . $atts['unique_id'] . '.postlist .fw-btn-post-read-more-blog:hover { background-color: ' . $hover_color['color'] . ' }';
					}
				}
			}
		}

		if ($atts['blog_view']['selected'] == 'grid' && isset($atts['blog_view']['grid']['grid_bg_color'])) {
			$grid_bg_color = the_core_get_color_palette_color_and_class($atts['blog_view']['grid']['grid_bg_color'], array('return_color' => true));
			if (!empty($grid_bg_color['color'])) {
				if ($atts['blog_type'] == 'blog-3') {
					$final_styles .= '.tf-sh-' . $atts['unique_id'] . '.postlist-grid .post.post-list-type-3 .entry-content, .tf-sh-' . $atts['unique_id'] . '.postlist-grid .post.post-list-type-3.fw-block-image-left-align .entry-content, .tf-sh-' . $atts['unique_id'] . '.postlist-grid .post.post-list-type-3.fw-block-image-right-align .entry-content { background-color: ' . $grid_bg_color['color'] . '; padding: 40px; }';
					$final_styles .= '.tf-sh-' . $atts['unique_id'] . '.postlist-grid .post.post-list-type-3{ margin-bottom: 30px; }';
				} elseif ($atts['blog_type'] == 'blog-2') {
					$final_styles .= '.tf-sh-' . $atts['unique_id'] . '.postlist-grid .post-list-type-2 .entry-content, .tf-sh-' . $atts['unique_id'] . '.postlist-grid .post-list-type-2 footer.entry-meta{ background-color: ' . $grid_bg_color['color'] . '; padding-left: 40px; padding-right: 40px; }';
					$final_styles .= '.tf-sh-' . $atts['unique_id'] . '.postlist-grid .post-list-type-2 .fw-post-empty-div{ background-color: ' . $grid_bg_color['color'] . '; }';
					$final_styles .= '.tf-sh-' . $atts['unique_id'] . '.postlist-grid .post-list-type-2 footer.entry-meta{padding-bottom: 40px; padding-top: 30px; margin: 0;}';
					$final_styles .= '.tf-sh-' . $atts['unique_id'] . '.postlist-grid .post.post-list-type-2{ margin-bottom: 30px; }';
				} elseif ($atts['blog_type'] == 'blog-1') {
					$final_styles .= '.tf-sh-' . $atts['unique_id'] . '.postlist-grid .post.post-list-type-1 .entry-header, .tf-sh-' . $atts['unique_id'] . '.postlist-grid .post.post-list-type-1{ background-color: ' . $grid_bg_color['color'] . '; }';

					$final_styles .= '.tf-sh-' . $atts['unique_id'] . '.postlist-grid .post.post-list-type-1 .entry-header, .tf-sh-' . $atts['unique_id'] . '.postlist-grid .post.post-list-type-1 .entry-content{ padding-left: 40px; padding-right: 40px; }';

					$final_styles .= '.tf-sh-' . $atts['unique_id'] . '.postlist-grid .post.post-list-type-1 .entry-content{padding-bottom: 40px; padding-top: 10px;}';
					$final_styles .= '.tf-sh-' . $atts['unique_id'] . '.postlist-grid .post.post-list-type-1{ margin-bottom: 30px; }';
				}
			}
		}

		// load more button
		if( isset( $atts['show_load_more'] ) && 'yes' == $atts['show_load_more'] ) {
			if (isset($atts['load_more_button']['label_advanced_styling'])) {
				// button label advanced styling
				$label_advanced_styling = the_core_get_shortcode_advanced_styles($atts['load_more_button']['label_advanced_styling']['text'], array('return_color' => true));
				if (!empty($label_advanced_styling['styles'])) {
					$final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .fw-load-more-btn .fw-btn span {' . $label_advanced_styling['styles'] . '}';
				}
				// responsive label styling
				$label_responsive_styles = the_core_responsive_heading_styles(array('styles' => $atts['load_more_button']['label_advanced_styling']['text'], 'selector' => '.tf-sh-' . $atts['unique_id'] . ' .fw-load-more-btn .fw-btn span'));
				if (!empty($label_responsive_styles)) $final_styles .= '@media(max-width:767px){' . $label_responsive_styles . '}';

				// label text hover
				$hover_text_color = the_core_get_color_palette_color_and_class($atts['load_more_button']['label_advanced_styling']['hover_text_color'], array('return_color' => true));
				if (!empty($hover_text_color['color'])) $final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .fw-load-more-btn .fw-btn:hover span' . '{ color: ' . $hover_text_color['color'] . ' !important }';
			}

			// button color options
			if (isset($atts['load_more_button']['style']['selected'])) {
				if ($atts['load_more_button']['style']['selected'] == 'fw-btn-3') {
					if (isset($atts['load_more_button']['style']['fw-btn-3']['border_size']) && !empty($atts['load_more_button']['style']['fw-btn-3']['border_size'])) {
						$final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .fw-load-more-btn .fw-btn{ border-top-width: ' . (int)$atts['load_more_button']['style']['fw-btn-3']['border_size'] . 'px; border-bottom-width: ' . (int)$atts['load_more_button']['style']['fw-btn-3']['border_size'] . 'px; }';
					}
					// btn color
					if (isset($atts['load_more_button']['normal_color'])) {
						$normal_color = the_core_get_color_palette_color_and_class($atts['load_more_button']['normal_color'], array('return_color' => true));
						if (!empty($normal_color['color'])) $final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .fw-load-more-btn .fw-btn{ border-bottom-color: ' . $normal_color['color'] . '; border-top-color: ' . $normal_color['color'] . ' }';
					}
					// hover color
					if (isset($atts['load_more_button']['hover_color'])) {
						$hover_color = the_core_get_color_palette_color_and_class($atts['load_more_button']['hover_color'], array('return_color' => true));
						if (!empty($hover_color['color'])) $final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .fw-load-more-btn .fw-btn:hover, .tf-sh-' . $atts['unique_id'] . ' .fw-load-more-btn .fw-btn:focus { background-color: ' . $hover_color['color'] . '; border-bottom-color: ' . $hover_color['color'] . '; border-top-color: ' . $hover_color['color'] . ' }';
					}
				} elseif ($atts['load_more_button']['style']['selected'] == 'fw-btn-2') {
					if (isset($atts['load_more_button']['style']['fw-btn-2']['border_size']) && !empty($atts['load_more_button']['style']['fw-btn-2']['border_size'])) {
						$final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .fw-load-more-btn .fw-btn{ border-width: ' . (int)$atts['load_more_button']['style']['fw-btn-2']['border_size'] . 'px; }';
					}
					if (isset($atts['load_more_button']['style']['fw-btn-2']['border_radius']) && !empty($atts['load_more_button']['style']['fw-btn-2']['border_radius'])) {
						$final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .fw-load-more-btn .fw-btn{ border-radius: ' . (int)$atts['load_more_button']['style']['fw-btn-2']['border_radius'] . 'px; }';
					}

					// btn color
					if (isset($atts['load_more_button']['normal_color'])) {
						$normal_color = the_core_get_color_palette_color_and_class($atts['load_more_button']['normal_color'], array('return_color' => true));
						if (!empty($normal_color['color'])) $final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .fw-load-more-btn .fw-btn{ border-color: ' . $normal_color['color'] . ' }';
					}
					// hover color
					if (isset($atts['load_more_button']['hover_color'])) {
						$hover_color = the_core_get_color_palette_color_and_class($atts['load_more_button']['hover_color'], array('return_color' => true));
						if (!empty($hover_color['color'])) $final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .fw-load-more-btn .fw-btn:hover { background-color: ' . $hover_color['color'] . '; border-color: ' . $hover_color['color'] . ' }';
					}
				} elseif ($atts['load_more_button']['style']['selected'] == 'fw-btn-1') {
					if (isset($atts['load_more_button']['style']['fw-btn-1']['border_radius']) && !empty($atts['load_more_button']['style']['fw-btn-1']['border_radius'])) {
						$final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .fw-load-more-btn .fw-btn{ border-radius: ' . (int)$atts['load_more_button']['style']['fw-btn-1']['border_radius'] . 'px; }';
					}

					// btn color
					if (isset($atts['load_more_button']['normal_color'])) {
						$normal_color = the_core_get_color_palette_color_and_class($atts['load_more_button']['normal_color'], array('return_color' => true));
						if (!empty($normal_color['color'])) $final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .fw-load-more-btn .fw-btn{ background-color: ' . $normal_color['color'] . ' }';
					}
					// hover color
					if (isset($atts['load_more_button']['hover_color'])) {
						$hover_color = the_core_get_color_palette_color_and_class($atts['load_more_button']['hover_color'], array('return_color' => true));
						if (!empty($hover_color['color'])) $final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .fw-load-more-btn .fw-btn:hover { background-color: ' . $hover_color['color'] . ' }';
					}

				}
			}
		}

		if (empty($final_styles)) {
			return;
		}

		wp_add_inline_style('fw-theme-style', $final_styles);
	}

	add_action('fw_ext_shortcodes_enqueue_static:latest_posts', '_the_core_action_shortcode_latest_posts_enqueue_dynamic_css');
endif;


if (!function_exists('_the_core_action_shortcode_icon_box_enqueue_dynamic_css')) :
	/**
	 * @internal
	 *
	 * @param array $data
	 */
	function _the_core_action_shortcode_icon_box_enqueue_dynamic_css($data)
	{
		$shortcode = 'icon_box';
		$atts = shortcode_parse_atts($data['atts_string']);

		/**
		 * Decode attributes
		 * ( The below weird code is because of this https://github.com/ThemeFuse/Unyson/issues/469 )
		 */
		$atts = fw_ext_shortcodes_decode_attr($atts, $shortcode, $data['post']->ID);

		$final_styles = '';
		if (isset($atts['heading']['selected']) && !empty($atts['heading']['selected'])) {
			// title advanced styling
			$h = $atts['heading']['selected'];
			$title_advanced_styling = the_core_get_shortcode_advanced_styles($atts['heading'][$h]['advanced_styling'][$h], array('return_color' => true));
			if (!empty($title_advanced_styling['styles'])) $final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .fw-iconbox-title ' . $h . ' {' . $title_advanced_styling['styles'] . '}';
			// responsive title styling
			$title_responsive_styles = the_core_responsive_heading_styles(array('styles' => $atts['heading'][$h]['advanced_styling'][$h], 'selector' => '.tf-sh-' . $atts['unique_id'] . ' .fw-iconbox-title ' . $h));
			if (!empty($title_responsive_styles)) $final_styles .= '@media(max-width:767px){' . $title_responsive_styles . '}';
		}

		if (isset($atts['description_advanced_styling'])) {
			// description advanced styling
			$description_advanced_styling = the_core_get_shortcode_advanced_styles($atts['description_advanced_styling']['text'], array('return_color' => true));
			if (!empty($description_advanced_styling['styles'])) {
				$final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .fw-iconbox-text {' . $description_advanced_styling['styles'] . '}';
			}
			// responsive description styling
			$description_responsive_styles = the_core_responsive_heading_styles(array('styles' => $atts['description_advanced_styling']['text'], 'selector' => '.tf-sh-' . $atts['unique_id'] . ' .fw-iconbox-text'));
			if (!empty($description_responsive_styles)) $final_styles .= '@media(max-width:767px){' . $description_responsive_styles . '}';
		}

		if ($atts['show_bnt'] == 'yes') {
			if (isset($atts['button_options']['label_advanced_styling'])) {
				// button label advanced styling
				$label_advanced_styling = the_core_get_shortcode_advanced_styles($atts['button_options']['label_advanced_styling']['text'], array('return_color' => true));
				if (!empty($label_advanced_styling['styles'])) {
					$final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .fw-btn span {' . $label_advanced_styling['styles'] . '}';
				}
				// responsive label styling
				$label_responsive_styles = the_core_responsive_heading_styles(array('styles' => $atts['button_options']['label_advanced_styling']['text'], 'selector' => '.tf-sh-' . $atts['unique_id'] . ' .fw-btn span'));
				if (!empty($label_responsive_styles)) $final_styles .= '@media(max-width:767px){' . $label_responsive_styles . '}';

				// label text hover
				$hover_text_color = the_core_get_color_palette_color_and_class($atts['button_options']['label_advanced_styling']['hover_text_color'], array('return_color' => true));
				if (!empty($hover_text_color['color'])) $final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .fw-btn:hover span' . '{ color: ' . $hover_text_color['color'] . ' !important }';
			}

			// button color options
			if (isset($atts['button_options']['style']['selected'])) {
				if ($atts['button_options']['style']['selected'] == 'fw-btn-3') {
					if (isset($atts['button_options']['style']['fw-btn-3']['border_size']) && !empty($atts['button_options']['style']['fw-btn-3']['border_size'])) {
						$final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .fw-btn{ border-top-width: ' . (int)$atts['button_options']['style']['fw-btn-3']['border_size'] . 'px; border-bottom-width: ' . (int)$atts['button_options']['style']['fw-btn-3']['border_size'] . 'px; }';
					}
					// btn color
					if (isset($atts['button_options']['normal_color'])) {
						$normal_color = the_core_get_color_palette_color_and_class($atts['button_options']['normal_color'], array('return_color' => true));
						if (!empty($normal_color['color'])) $final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .fw-btn{ border-bottom-color: ' . $normal_color['color'] . '; border-top-color: ' . $normal_color['color'] . ' }';
					}
					// hover color
					if (isset($atts['button_options']['hover_color'])) {
						$hover_color = the_core_get_color_palette_color_and_class($atts['button_options']['hover_color'], array('return_color' => true));
						if (!empty($hover_color['color'])) $final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .fw-btn:hover, .tf-sh-' . $atts['unique_id'] . ' .fw-btn:focus { background-color: ' . $hover_color['color'] . '; border-bottom-color: ' . $hover_color['color'] . '; border-top-color: ' . $hover_color['color'] . ' }';
					}
				} elseif ($atts['button_options']['style']['selected'] == 'fw-btn-2') {
					if (isset($atts['button_options']['style']['fw-btn-2']['border_size']) && !empty($atts['button_options']['style']['fw-btn-2']['border_size'])) {
						$final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .fw-btn{ border-width: ' . (int)$atts['button_options']['style']['fw-btn-2']['border_size'] . 'px; }';
					}
					if (isset($atts['button_options']['style']['fw-btn-2']['border_radius']) && !empty($atts['button_options']['style']['fw-btn-2']['border_radius'])) {
						$final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .fw-btn{ border-radius: ' . (int)$atts['button_options']['style']['fw-btn-2']['border_radius'] . 'px; }';
					}

					// btn color
					if (isset($atts['button_options']['normal_color'])) {
						$normal_color = the_core_get_color_palette_color_and_class($atts['button_options']['normal_color'], array('return_color' => true));
						if (!empty($normal_color['color'])) $final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .fw-btn{ border-color: ' . $normal_color['color'] . ' }';
					}
					// hover color
					if (isset($atts['button_options']['hover_color'])) {
						$hover_color = the_core_get_color_palette_color_and_class($atts['button_options']['hover_color'], array('return_color' => true));
						if (!empty($hover_color['color'])) $final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .fw-btn:hover { background-color: ' . $hover_color['color'] . '; border-color: ' . $hover_color['color'] . ' }';
					}
				} elseif ($atts['button_options']['style']['selected'] == 'fw-btn-1') {
					if (isset($atts['button_options']['style']['fw-btn-1']['border_radius']) && !empty($atts['button_options']['style']['fw-btn-1']['border_radius'])) {
						$final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .fw-btn{ border-radius: ' . (int)$atts['button_options']['style']['fw-btn-1']['border_radius'] . 'px; }';
					}

					// btn color
					if (isset($atts['button_options']['normal_color'])) {
						$normal_color = the_core_get_color_palette_color_and_class($atts['button_options']['normal_color'], array('return_color' => true));
						if (!empty($normal_color['color'])) $final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .fw-btn{ background-color: ' . $normal_color['color'] . ' }';
					}
					// hover color
					if (isset($atts['button_options']['hover_color'])) {
						$hover_color = the_core_get_color_palette_color_and_class($atts['button_options']['hover_color'], array('return_color' => true));
						if (!empty($hover_color['color'])) $final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .fw-btn:hover { background-color: ' . $hover_color['color'] . ' }';
					}

				}
			}
		}

		$icon_img_class = $atts['icon_type']['icon-box-img'] == 'icon-class' ? '' : 'fw-iconbox-image-type';
		if( $icon_img_class == 'fw-iconbox-image-type' ) {
			$size = ((int)$atts['icon_type']['upload-icon']['icon_size']);
		}
		else {
			if (isset($atts['icon_type']['icon-class']['icon_class']) && !empty($atts['icon_type']['icon-class']['icon_class'])) {
				$size = (int)$atts['icon_type']['icon-class']['icon_size'];
			}
		}

		$icon_bg = $atts['icon_type']['icon-class']['icon-bg-type']['icon-box-img'];
		// icon size & spacing
		$icon_box_type = $atts['icon_type_picker']['icon-box-type'];
		// box with custom image (uploaded)
		if( $icon_img_class == 'fw-iconbox-image-type'){
			// icon container size
			if( isset($atts['icon_type']['upload-icon']['icon_size']) && !empty($atts['icon_type']['upload-icon']['icon_size']) ){
				$final_styles .= '.tf-sh-' . $atts['unique_id'] . '.'.$icon_box_type.'.fw-iconbox-image-type .fw-iconbox-image {width: '.$size.'px; height:'.$size.'px;}';
			}

			// text margin
			if( $atts['icon_type_picker']['icon-box-type'] == 'fw-iconbox-2'){
				$margin = 'margin-left';
				if( is_rtl() ){
					$margin = 'margin-right';
				}

				$final_styles .= '.tf-sh-' . $atts['unique_id'] . '.'.$icon_box_type.' .fw-iconbox-aside {'.$margin.': '.($size+20).'px;}';
			}
		}
		else{
			// with icon
			if( isset($atts['icon_type']['icon-class']['icon_class']) && !empty($atts['icon_type']['icon-class']['icon_class']) ){
				// icon container size
				if( $icon_bg == 'bg-none' ) {
					$icon_size = $size + 20;
				}
				else {
					$icon_size = $size + 40;
				}
				$final_styles .= '.tf-sh-' . $atts['unique_id'] . '.'.$icon_box_type.' .fw-iconbox-image {width: '.$icon_size.'px; height:'.$icon_size.'px; line-height: '.( (int)$icon_size+3 ).'px; font-size:' . $size . 'px;}';

				// text margin for box type 2
				if( $atts['icon_type_picker']['icon-box-type'] == 'fw-iconbox-2' ) {
					$margin = 'margin-left';
					if( is_rtl() ){
						$margin = 'margin-right';
					}
					$icon_bg_class = ( empty( $icon_bg ) || $icon_bg == 'bg-none' ) ? '' : 'bg-on';
					if( $icon_bg_class != 'bg-on' ) {
						$final_styles .= '.tf-sh-' . $atts['unique_id'] . '.'.$icon_box_type.' .fw-iconbox-aside {'.$margin.': '.($icon_size+10).'px;}';
					}
					else {
						$final_styles .= '.tf-sh-' . $atts['unique_id'] . '.'.$icon_box_type.' .fw-iconbox-aside {'.$margin.': '.($icon_size+20).'px;}';
					}
				}
			}
		}

		if( $atts['icon_type_picker']['icon-box-type'] == 'fw-iconbox-4' ) {
			if( $icon_img_class == 'fw-iconbox-image-type') {
				$iconbox_4_size = $size;
			}
			elseif( $icon_bg == 'bg-none' ) {
				$iconbox_4_size = $size + 20;
			}
			else {
				$iconbox_4_size = $size + 40;
			}

			// icon box type 4 (icon position)
			$icon_position = $atts['icon_type_picker']['fw-iconbox-4']['icon_position'];
			if( $icon_position == 'fw-icon-top' ) {
				$final_styles .= '.tf-sh-' . $atts['unique_id'] . '.fw-iconbox-4 .fw-iconbox-image {margin-top: -'.( ($iconbox_4_size)/2 ) .'px; margin-left: -'.( ($iconbox_4_size)/2 ) .'px;}';
				$final_styles .= '.tf-sh-' . $atts['unique_id'] . '.fw-iconbox-4 .fw-iconbox-aside {padding-top: '.($iconbox_4_size).'px;}';
			}
			elseif( $icon_position == 'fw-icon-left' ) {
				$final_styles .= '.tf-sh-' . $atts['unique_id'] . '.fw-iconbox-4 .fw-iconbox-image {margin-top: -'.( ($iconbox_4_size)/2 ) .'px; margin-left: -'.( ($iconbox_4_size)/2 ) .'px;}';
				$final_styles .= '.tf-sh-' . $atts['unique_id'] . '.fw-iconbox-4 .fw-iconbox-aside {padding-left: '.($iconbox_4_size).'px;}';
			}
			elseif( $icon_position == 'fw-icon-right' ) {
				$final_styles .= '.tf-sh-' . $atts['unique_id'] . '.fw-iconbox-4 .fw-iconbox-image {margin-top: -'.( ($iconbox_4_size)/2 ) .'px; margin-right: -'.( ($iconbox_4_size)/2 ) .'px;}';
				$final_styles .= '.tf-sh-' . $atts['unique_id'] . '.fw-iconbox-4 .fw-iconbox-aside {padding-right: '.($iconbox_4_size).'px;}';
			}
			elseif( $icon_position == 'fw-icon-bottom' ) {
				$final_styles .= '.tf-sh-' . $atts['unique_id'] . '.fw-iconbox-4 .fw-iconbox-image {margin-bottom: -'.( ($iconbox_4_size)/2 ) .'px; margin-left: -'.( ($iconbox_4_size)/2 ) .'px;}';
				$final_styles .= '.tf-sh-' . $atts['unique_id'] . '.fw-iconbox-4 .fw-iconbox-aside {padding-bottom: '.($iconbox_4_size).'px;}';
			}

			// bg color
			if( isset($atts['icon_type_picker']['fw-iconbox-4']['bg_color']) ) {
				$bg_color = the_core_get_color_palette_color_and_class($atts['icon_type_picker']['fw-iconbox-4']['bg_color'], array('return_color' => true));
				if (!empty($bg_color['color'])) $final_styles .= '.tf-sh-' . $atts['unique_id'] . ' { background-color: ' . $bg_color['color'] . ' }';
			}

			// border
			if( isset($atts['icon_type_picker']['fw-iconbox-4']['border_group']['selected']) && $atts['icon_type_picker']['fw-iconbox-4']['border_group']['selected'] == 'yes' ) {
				$border_color = the_core_get_color_palette_color_and_class($atts['icon_type_picker']['fw-iconbox-4']['border_group']['yes']['border_color'], array('return_color' => true));
				if( !empty($border_color['color']) ) {
					$final_styles .= '.tf-sh-' . $atts['unique_id'] . ' { border: '.(int)$atts['icon_type_picker']['fw-iconbox-4']['border_group']['yes']['border_size'].'px solid ' . $border_color['color'] . ' }';
				}
			}

			// border radius
			if( isset($atts['icon_type_picker']['fw-iconbox-4']['border_radius']) && $atts['icon_type_picker']['fw-iconbox-4']['border_radius'] != '' ) {
				$border_radius = (int)$atts['icon_type_picker']['fw-iconbox-4']['border_radius'];
				$final_styles .= '.tf-sh-' . $atts['unique_id'] . ' { border-radius: ' . $border_radius . 'px; }';
			}

			// content padding
			$padding_top = (isset($atts['icon_type_picker']['fw-iconbox-4']['padding_top']) && $atts['icon_type_picker']['fw-iconbox-4']['padding_top'] != '' ) ? 'padding-top:' . (int)esc_attr($atts['icon_type_picker']['fw-iconbox-4']['padding_top']) . 'px;' : '';
			$padding_right = (isset($atts['icon_type_picker']['fw-iconbox-4']['padding_right']) && $atts['icon_type_picker']['fw-iconbox-4']['padding_right'] != '' ) ? 'padding-right:' . (int)esc_attr($atts['icon_type_picker']['fw-iconbox-4']['padding_right']) . 'px;' : '';
			$padding_bottom = (isset($atts['icon_type_picker']['fw-iconbox-4']['padding_bottom']) && $atts['icon_type_picker']['fw-iconbox-4']['padding_bottom'] != '' ) ? 'padding-bottom:' . (int)esc_attr($atts['icon_type_picker']['fw-iconbox-4']['padding_bottom']) . 'px;' : '';
			$padding_left = (isset($atts['icon_type_picker']['fw-iconbox-4']['padding_left']) && $atts['icon_type_picker']['fw-iconbox-4']['padding_left'] != '' ) ? 'padding-left:' . (int)esc_attr($atts['icon_type_picker']['fw-iconbox-4']['padding_left']) . 'px;' : '';

			if (!empty($padding_right) || !empty($padding_left) || !empty($padding_top) || !empty($padding_bottom)) {
				$final_styles .= '.tf-sh-' . $atts['unique_id'] . '.fw-iconbox-4 .fw-iconbox-aside{' . $padding_right . $padding_left . $padding_bottom . $padding_top . '}';
			}
		}

		if (empty($final_styles)) {
			return;
		}

		wp_add_inline_style(
			'fw-theme-style',
			$final_styles
		);
	}

	add_action(
		'fw_ext_shortcodes_enqueue_static:icon_box',
		'_the_core_action_shortcode_icon_box_enqueue_dynamic_css'
	);
endif;


if (!function_exists('_the_core_action_shortcode_button_enqueue_dynamic_css')) :
	/**
	 * @internal
	 *
	 * @param array $data
	 */
	function _the_core_action_shortcode_button_enqueue_dynamic_css($data)
	{
		$shortcode = 'button';
		$atts = shortcode_parse_atts($data['atts_string']);

		/**
		 * Decode attributes
		 * ( The below weird code is because of this https://github.com/ThemeFuse/Unyson/issues/469 )
		 */
		$atts = fw_ext_shortcodes_decode_attr($atts, $shortcode, $data['post']->ID);

		$final_styles = '';
		if (isset($atts['style']['selected'])) {
			if ($atts['style']['selected'] == 'fw-btn-3') {
				if (isset($atts['style']['fw-btn-3']['border_size']) && !empty($atts['style']['fw-btn-3']['border_size'])) {
					$final_styles .= '.tf-sh-' . $atts['unique_id'] . ',.tf-sh-' . $atts['unique_id'] . ':focus{ border-top-width: ' . (int)$atts['style']['fw-btn-3']['border_size'] . 'px; border-bottom-width: ' . (int)$atts['style']['fw-btn-3']['border_size'] . 'px; }';
				}
				// btn color
				if (isset($atts['normal_color'])) {
					$normal_color = the_core_get_color_palette_color_and_class($atts['normal_color'], array('return_color' => true));
					if (!empty($normal_color['color'])) $final_styles .= '.tf-sh-' . $atts['unique_id'] . ',.tf-sh-' . $atts['unique_id'] . ':focus{ border-bottom-color: ' . $normal_color['color'] . '; border-top-color: ' . $normal_color['color'] . ' }';
				}
				// hover color
				if (isset($atts['hover_color'])) {
					$hover_color = the_core_get_color_palette_color_and_class($atts['hover_color'], array('return_color' => true));
					if (!empty($hover_color['color'])) $final_styles .= '.tf-sh-' . $atts['unique_id'] . ':hover { background-color: ' . $hover_color['color'] . '; border-bottom-color: ' . $hover_color['color'] . '; border-top-color: ' . $hover_color['color'] . ' }';
				}
			} elseif ($atts['style']['selected'] == 'fw-btn-2') {
				if (isset($atts['style']['fw-btn-2']['border_size']) && !empty($atts['style']['fw-btn-2']['border_size'])) {
					$final_styles .= '.tf-sh-' . $atts['unique_id'] . '{ border-width: ' . (int)$atts['style']['fw-btn-2']['border_size'] . 'px; }';
				}
				if (isset($atts['style']['fw-btn-2']['border_radius']) && !empty($atts['style']['fw-btn-2']['border_radius'])) {
					$final_styles .= '.tf-sh-' . $atts['unique_id'] . '{ border-radius: ' . (int)$atts['style']['fw-btn-2']['border_radius'] . 'px; }';
				}

				// btn color
				if (isset($atts['normal_color'])) {
					$normal_color = the_core_get_color_palette_color_and_class($atts['normal_color'], array('return_color' => true));
					if (!empty($normal_color['color'])) $final_styles .= '.tf-sh-' . $atts['unique_id'] . ',.tf-sh-' . $atts['unique_id'] . ':focus{ border-color: ' . $normal_color['color'] . ' }';
				}
				// hover color
				if (isset($atts['hover_color'])) {
					$hover_color = the_core_get_color_palette_color_and_class($atts['hover_color'], array('return_color' => true));
					if (!empty($hover_color['color'])) $final_styles .= '.tf-sh-' . $atts['unique_id'] . ':hover { background-color: ' . $hover_color['color'] . '; border-color: ' . $hover_color['color'] . ' }';
				}
			} elseif ($atts['style']['selected'] == 'fw-btn-1') {
				if (isset($atts['style']['fw-btn-1']['border_radius']) && !empty($atts['style']['fw-btn-1']['border_radius'])) {
					$final_styles .= '.tf-sh-' . $atts['unique_id'] . '{ border-radius: ' . (int)$atts['style']['fw-btn-1']['border_radius'] . 'px; }';
				}

				// btn color
				if (isset($atts['normal_color'])) {
					$normal_color = the_core_get_color_palette_color_and_class($atts['normal_color'], array('return_color' => true));
					if (!empty($normal_color['color'])) $final_styles .= '.tf-sh-' . $atts['unique_id'] . ', .tf-sh-' . $atts['unique_id'] . ':focus{ background-color: ' . $normal_color['color'] . ' }';
				}
				// hover color
				if (isset($atts['hover_color'])) {
					$hover_color = the_core_get_color_palette_color_and_class($atts['hover_color'], array('return_color' => true));
					if (!empty($hover_color['color'])) $final_styles .= '.tf-sh-' . $atts['unique_id'] . ':hover { background-color: ' . $hover_color['color'] . ' }';
				}

			}
		}

		// advanced styling
		if (isset($atts['label_advanced_styling'])) {
			// title advanced styling
			$text_advanced_styling = the_core_get_shortcode_advanced_styles($atts['label_advanced_styling']['text'], array('return_color' => true));
			if (!empty($text_advanced_styling['styles'])) $final_styles .= '.tf-sh-' . $atts['unique_id'] . ', .tf-sh-' . $atts['unique_id'] . ':focus {' . $text_advanced_styling['styles'] . '}';
			// responsive title styling
			$title_responsive_styles = the_core_responsive_heading_styles(array('styles' => $atts['label_advanced_styling']['text'], 'selector' => '.tf-sh-' . $atts['unique_id']));
			if (!empty($title_responsive_styles)) $final_styles .= '@media(max-width:767px){' . $title_responsive_styles . '}';

			// hover text color
			if (isset($atts['label_advanced_styling']['hover_text_color'])) {
				$hover_text_color = the_core_get_color_palette_color_and_class($atts['label_advanced_styling']['hover_text_color'], array('return_color' => true));
				if (!empty($hover_text_color['color'])) $final_styles .= '.tf-sh-' . $atts['unique_id'] . ':hover { color: ' . $hover_text_color['color'] . ' }';
			}
		}

		if (empty($final_styles)) {
			return;
		}

		wp_add_inline_style(
			'fw-theme-style',
			$final_styles
		);
	}

	add_action(
		'fw_ext_shortcodes_enqueue_static:button',
		'_the_core_action_shortcode_button_enqueue_dynamic_css'
	);

endif;


if (!function_exists('_the_core_action_shortcode_image_box_enqueue_dynamic_css')):
	/**
	 * @internal
	 *
	 * @param array $data
	 */
	function _the_core_action_shortcode_image_box_enqueue_dynamic_css($data)
	{
		$shortcode = 'image_box';
		$atts = shortcode_parse_atts($data['atts_string']);

		/**
		 * Decode attributes
		 * ( The below weird code is because of this https://github.com/ThemeFuse/Unyson/issues/469 )
		 */
		$atts = fw_ext_shortcodes_decode_attr($atts, $shortcode, $data['post']->ID);

		$final_styles = '';
		if (isset($atts['heading']['selected']) && !empty($atts['heading']['selected'])) {
			// title advanced styling
			$h = $atts['heading']['selected'];
			$title_advanced_styling = the_core_get_shortcode_advanced_styles($atts['heading'][$h]['advanced_styling'][$h], array('return_color' => true));
			if (!empty($title_advanced_styling['styles'])) $final_styles .= '.tf-sh-' . $atts['unique_id'] . ' ' . $h . '.fw-imagebox-title {' . $title_advanced_styling['styles'] . '}';
			// responsive title styling
			$title_responsive_styles = the_core_responsive_heading_styles(array('styles' => $atts['heading'][$h]['advanced_styling'][$h], 'selector' => '.tf-sh-' . $atts['unique_id'] . ' ' . $h . '.fw-imagebox-title'));
			if (!empty($title_responsive_styles)) $final_styles .= '@media(max-width:767px){' . $title_responsive_styles . '}';
		}

		if (isset($atts['subtitle_advanced_styling'])) {
			// subtitle advanced styling
			$subtitle_advanced_styles = the_core_get_shortcode_advanced_styles($atts['subtitle_advanced_styling']['title'], array('return_color' => true));
			if (!empty($subtitle_advanced_styles['styles'])) $final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .fw-imagebox-subtitle {' . $subtitle_advanced_styles['styles'] . '}';
			// responsive subtitle styling
			$subtitle_responsive_styles = the_core_responsive_heading_styles(array('styles' => $atts['subtitle_advanced_styling']['title'], 'selector' => '.tf-sh-' . $atts['unique_id'] . ' .fw-imagebox-subtitle'));
			if (!empty($subtitle_responsive_styles)) $final_styles .= '@media(max-width:767px){' . $subtitle_responsive_styles . '}';
		}

		if (isset($atts['description_advanced_styling'])) {
			// description advanced styling
			$description_advanced_styling = the_core_get_shortcode_advanced_styles($atts['description_advanced_styling']['title'], array('return_color' => true));
			if (!empty($description_advanced_styling['styles'])) $final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .fw-imagebox-text {' . $description_advanced_styling['styles'] . '}';
			// responsive description styling
			$description_responsive_styles = the_core_responsive_heading_styles(array('styles' => $atts['description_advanced_styling']['title'], 'selector' => '.tf-sh-' . $atts['unique_id'] . ' .fw-imagebox-text'));
			if (!empty($description_responsive_styles)) $final_styles .= '@media(max-width:767px){' . $description_responsive_styles . '}';
		}

		if ($atts['show_bnt'] == 'yes') {
			if (isset($atts['button_options']['label_advanced_styling'])) {
				// button label advanced styling
				$label_advanced_styling = the_core_get_shortcode_advanced_styles($atts['button_options']['label_advanced_styling']['text'], array('return_color' => true));
				if (!empty($label_advanced_styling['styles'])) {
					$final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .fw-btn span {' . $label_advanced_styling['styles'] . '}';
				}
				// responsive label styling
				$label_responsive_styles = the_core_responsive_heading_styles(array('styles' => $atts['description_advanced_styling']['title'], 'selector' => '.tf-sh-' . $atts['unique_id'] . ' .fw-btn span'));
				if (!empty($label_responsive_styles)) $final_styles .= '@media(max-width:767px){' . $label_responsive_styles . '}';

				// label text hover
				$hover_text_color = the_core_get_color_palette_color_and_class($atts['button_options']['label_advanced_styling']['hover_text_color'], array('return_color' => true));
				if (!empty($hover_text_color['color'])) $final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .fw-btn:hover span' . '{ color: ' . $hover_text_color['color'] . ' !important }';
			}

			// button color options
			if (isset($atts['button_options']['style']['selected'])) {
				if ($atts['button_options']['style']['selected'] == 'fw-btn-3') {
					if (isset($atts['button_options']['style']['fw-btn-3']['border_size']) && !empty($atts['button_options']['style']['fw-btn-3']['border_size'])) {
						$final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .fw-btn{ border-top-width: ' . (int)$atts['button_options']['style']['fw-btn-3']['border_size'] . 'px; border-bottom-width: ' . (int)$atts['button_options']['style']['fw-btn-3']['border_size'] . 'px; }';
					}
					// btn color
					if (isset($atts['button_options']['normal_color'])) {
						$normal_color = the_core_get_color_palette_color_and_class($atts['button_options']['normal_color'], array('return_color' => true));
						if (!empty($normal_color['color'])) $final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .fw-btn{ border-bottom-color: ' . $normal_color['color'] . '; border-top-color: ' . $normal_color['color'] . ' }';
					}
					// hover color
					if (isset($atts['button_options']['hover_color'])) {
						$hover_color = the_core_get_color_palette_color_and_class($atts['button_options']['hover_color'], array('return_color' => true));
						if (!empty($hover_color['color'])) $final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .fw-btn:hover, .tf-sh-' . $atts['unique_id'] . ' .fw-btn:focus { background-color: ' . $hover_color['color'] . '; border-bottom-color: ' . $hover_color['color'] . '; border-top-color: ' . $hover_color['color'] . ' }';
					}
				} elseif ($atts['button_options']['style']['selected'] == 'fw-btn-2') {
					if (isset($atts['button_options']['style']['fw-btn-2']['border_size']) && !empty($atts['button_options']['style']['fw-btn-2']['border_size'])) {
						$final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .fw-btn{ border-width: ' . (int)$atts['button_options']['style']['fw-btn-2']['border_size'] . 'px; }';
					}
					if (isset($atts['button_options']['style']['fw-btn-2']['border_radius']) && !empty($atts['button_options']['style']['fw-btn-2']['border_radius'])) {
						$final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .fw-btn{ border-radius: ' . (int)$atts['button_options']['style']['fw-btn-2']['border_radius'] . 'px; }';
					}

					// btn color
					if (isset($atts['button_options']['normal_color'])) {
						$normal_color = the_core_get_color_palette_color_and_class($atts['button_options']['normal_color'], array('return_color' => true));
						if (!empty($normal_color['color'])) $final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .fw-btn{ border-color: ' . $normal_color['color'] . ' }';
					}
					// hover color
					if (isset($atts['button_options']['hover_color'])) {
						$hover_color = the_core_get_color_palette_color_and_class($atts['button_options']['hover_color'], array('return_color' => true));
						if (!empty($hover_color['color'])) $final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .fw-btn:hover { background-color: ' . $hover_color['color'] . '; border-color: ' . $hover_color['color'] . ' }';
					}
				} elseif ($atts['button_options']['style']['selected'] == 'fw-btn-1') {
					if (isset($atts['button_options']['style']['fw-btn-1']['border_radius']) && !empty($atts['button_options']['style']['fw-btn-1']['border_radius'])) {
						$final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .fw-btn{ border-radius: ' . (int)$atts['button_options']['style']['fw-btn-1']['border_radius'] . 'px; }';
					}

					// btn color
					if (isset($atts['button_options']['normal_color'])) {
						$normal_color = the_core_get_color_palette_color_and_class($atts['button_options']['normal_color'], array('return_color' => true));
						if (!empty($normal_color['color'])) $final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .fw-btn{ background-color: ' . $normal_color['color'] . ' }';
					}
					// hover color
					if (isset($atts['button_options']['hover_color'])) {
						$hover_color = the_core_get_color_palette_color_and_class($atts['button_options']['hover_color'], array('return_color' => true));
						if (!empty($hover_color['color'])) $final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .fw-btn:hover { background-color: ' . $hover_color['color'] . ' }';
					}

				}
			}
		}

		if (empty($final_styles)) {
			return;
		}

		wp_add_inline_style(
			'fw-theme-style',
			$final_styles
		);
	}

	add_action(
		'fw_ext_shortcodes_enqueue_static:image_box',
		'_the_core_action_shortcode_image_box_enqueue_dynamic_css'
	);
endif;


if (!function_exists('_the_core_action_shortcode_fw_gallery_enqueue_dynamic_css')):
	/**
	 * @internal
	 *
	 * @param array $data
	 */
	function _the_core_action_shortcode_fw_gallery_enqueue_dynamic_css($data)
	{
		$shortcode = 'fw_gallery';
		$atts = shortcode_parse_atts($data['atts_string']);

		/**
		 * Decode attributes
		 * ( The below weird code is because of this https://github.com/ThemeFuse/Unyson/issues/469 )
		 */
		$atts = fw_ext_shortcodes_decode_attr($atts, $shortcode, $data['post']->ID);

		// advanced gallery styling
		$final_styles = '';
		if (isset($atts['gallery_advanced_styling'])) {
			// title advanced styling
			$title_advanced_styling = the_core_get_shortcode_advanced_styles($atts['gallery_advanced_styling']['title_typography'], array('return_color' => true));
			if (!empty($title_advanced_styling['styles'])) {
				$final_styles .= '.fw-gallery.tf-sh-' . $atts['unique_id'] . ' .fw-block-image-parent .fw-block-image-overlay .fw-overlay-title {' . $title_advanced_styling['styles'] . '}';
				if ($atts['gallery_style'] == 'fw-gallery-type4') {
					$title_after_color = the_core_get_color_palette_color_and_class($atts['gallery_advanced_styling']['title_typography']['color-palette'], array('return_color' => true));
					if (!empty($title_after_color['color'])) $final_styles .= '.fw-gallery.tf-sh-' . $atts['unique_id'] . ' .fw-block-image-parent .fw-block-image-overlay .fw-overlay-title:after { background-color: ' . $title_after_color['color'] . ' }';
				}
			}
			// responsive title styling
			$title_responsive_styles = the_core_responsive_heading_styles(array('styles' => $atts['gallery_advanced_styling']['title_typography'], 'selector' => '.fw-gallery.tf-sh-' . $atts['unique_id'] . ' .fw-block-image-parent .fw-block-image-overlay .fw-overlay-title'));
			if (!empty($title_responsive_styles)) $final_styles .= '@media(max-width:767px){' . $title_responsive_styles . '}';

			// subtitle advanced styling
			$subtitle_advanced_styling = the_core_get_shortcode_advanced_styles($atts['gallery_advanced_styling']['subtitle_typography'], array('return_color' => true));
			if (!empty($subtitle_advanced_styling['styles'])) $final_styles .= '.fw-gallery.tf-sh-' . $atts['unique_id'] . ' .fw-block-image-parent .fw-block-image-overlay .fw-overlay-description { ' . $subtitle_advanced_styling['styles'] . ' }';
			// responsive subtitle styling
			$subtitle_responsive_styles = the_core_responsive_heading_styles(array('styles' => $atts['gallery_advanced_styling']['subtitle_typography'], 'selector' => '.fw-gallery.tf-sh-' . $atts['unique_id'] . ' .fw-block-image-parent .fw-block-image-overlay .fw-overlay-description'));
			if (!empty($subtitle_responsive_styles)) $final_styles .= '@media(max-width:767px){' . $subtitle_responsive_styles . '}';

			// border
			$border_style = '';
			if (isset($atts['gallery_advanced_styling']['border_group']['selected']) && $atts['gallery_advanced_styling']['border_group']['selected'] == 'yes') {
				// border size
				if (!empty($atts['gallery_advanced_styling']['border_group']['yes']['border_size'])) {
					$border_style .= 'border-style: solid; border-width: ' . (int)$atts['gallery_advanced_styling']['border_group']['yes']['border_size'] . 'px;';
				}

				// border color
				$border_color = the_core_get_color_palette_color_and_class($atts['gallery_advanced_styling']['border_group']['yes']['border_color'], array('return_color' => true));
				if (!empty($border_color['color'])) {
					$border_style .= ' border-color: ' . $border_color['color'] . ';';
				}

				if ( 'fw-gallery-type5' == $atts['gallery_style'] ) {
					$final_styles .= '.fw-gallery.tf-sh-' . $atts['unique_id'] . ' .fw-gallery-image .fw-block-image-overlay { ' . $border_style . ' }';
				}
				else {
					$final_styles .= '.fw-gallery.tf-sh-' . $atts['unique_id'] . ' .fw-gallery-image.fw-block-image-parent { ' . $border_style . ' }';
				}
			}
		}

		if( isset($atts['fw_gallery_gap']) && '0' != $atts['fw_gallery_gap'] && 'fw-gallery-type5' == $atts['gallery_style'] ) {
			$final_styles .= '.fw-gallery.tf-sh-' . $atts['unique_id'] . ' .fw-gallery-item-wrap { margin-bottom: ' . (int)$atts['fw_gallery_gap'] . 'px; padding-right: ' . (int)$atts['fw_gallery_gap']/2 . 'px; padding-left: ' . (int)$atts['fw_gallery_gap']/2 . 'px; }';
			$final_styles .= '.fw-gallery-type5.tf-sh-' . $atts['unique_id'] . ' .fw-gallery-item-wrap.fw-gallery-rectangle-item .fw-gallery-item { padding-bottom: calc(50% - ' . (int)$atts['fw_gallery_gap']/2 . 'px); }';
			$final_styles .= '.fw-gallery-type5.tf-sh-' . $atts['unique_id'] . ' { margin-left: -' . (int)$atts['fw_gallery_gap']/2 . 'px; width: calc(100% + ' . (int)$atts['fw_gallery_gap'] . 'px) }';
		}

		if (empty($final_styles)) {
			return;
		}

		wp_add_inline_style(
			'fw-theme-style',
			$final_styles
		);
	}

	add_action(
		'fw_ext_shortcodes_enqueue_static:fw_gallery',
		'_the_core_action_shortcode_fw_gallery_enqueue_dynamic_css'
	);
endif;


if (!function_exists('_the_core_action_shortcode_calendar_enqueue_dynamic_css')):
	/**
	 * @internal
	 *
	 * @param array $data
	 */
	function _the_core_action_shortcode_calendar_enqueue_dynamic_css($data)
	{
		$shortcode = 'calendar';
		$atts = shortcode_parse_atts($data['atts_string']);

		/**
		 * Decode attributes
		 * ( The below weird code is because of this https://github.com/ThemeFuse/Unyson/issues/469 )
		 */
		$atts = fw_ext_shortcodes_decode_attr($atts, $shortcode, $data['post']->ID);

		// advanced gallery styling
		$final_styles = '';
		if ($atts['template'] == 'month') {
			if (isset($atts['advanced_styling'])) {
				// month title
				$month_title_advanced_styling = the_core_get_shortcode_advanced_styles($atts['advanced_styling']['month_title_typography'], array('return_color' => true));
				$final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .fw-shortcode-calendar .cal-row-head .cal-cell1 {' . $month_title_advanced_styling['styles'] . '}';
				// responsive month title styling
				$month_title_responsive_styles = the_core_responsive_heading_styles(array('styles' => $atts['advanced_styling']['month_title_typography'], 'selector' => '.tf-sh-' . $atts['unique_id'] . ' .fw-shortcode-calendar .cal-row-head .cal-cell1'));
				if (!empty($month_title_responsive_styles)) $final_styles .= '@media(max-width:767px){' . $month_title_responsive_styles . '}';

				$bottom_month_title_advanced_styling = the_core_get_shortcode_advanced_styles($atts['advanced_styling']['bottom_month_title_typography'], array('return_color' => true));
				if (!empty($bottom_month_title_advanced_styling['styles'])) $final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .calendar-navigation h3 {' . $bottom_month_title_advanced_styling['styles'] . '}';
				// responsive bottom month title styling
				$bottom_month_title_responsive_styles = the_core_responsive_heading_styles(array('styles' => $atts['advanced_styling']['bottom_month_title_typography'], 'selector' => '.tf-sh-' . $atts['unique_id'] . ' .calendar-navigation h3'));
				if (!empty($bottom_month_title_responsive_styles)) $final_styles .= '@media(max-width:767px){' . $bottom_month_title_responsive_styles . '}';

				// day number
				$day_number_advanced_styling = the_core_get_shortcode_advanced_styles($atts['advanced_styling']['day_number_typography'], array('return_color' => true));
				if (!empty($day_number_advanced_styling['styles'])) $final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .fw-shortcode-calendar .cal-month-day span.pull-left {' . $day_number_advanced_styling['styles'] . '}';
				// responsive day number styling
				$day_number_responsive_styles = the_core_responsive_heading_styles(array('styles' => $atts['advanced_styling']['day_number_typography'], 'selector' => '.tf-sh-' . $atts['unique_id'] . ' .fw-shortcode-calendar .cal-month-day span.pull-left'));
				if (!empty($day_number_responsive_styles)) $final_styles .= '@media(max-width:767px){' . $day_number_responsive_styles . '}';

				// event title
				$event_title_number_advanced_styling = the_core_get_shortcode_advanced_styles($atts['advanced_styling']['event_title_typography'], array('return_color' => true));
				if (!empty($event_title_number_advanced_styling['styles'])) {
					$final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .fw-shortcode-calendar #cal-slide-content a.event-item {' . $event_title_number_advanced_styling['styles'] . '}';
					$final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .fw-shortcode-calendar a.cal-event-week {' . $event_title_number_advanced_styling['styles'] . '}';
					$final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .fw-shortcode-calendar #cal-slide-content a.event-item:hover, .tf-sh-' . $atts['unique_id'] . ' .fw-shortcode-calendar a.cal-event-week {opacity:0.8;}';
				}
				// responsive event title styling
				$event_title_responsive_styles = the_core_responsive_heading_styles(array('styles' => $atts['advanced_styling']['event_title_typography'], 'selector' => '.tf-sh-' . $atts['unique_id'] . ' .fw-shortcode-calendar #cal-slide-content a.event-item, .tf-sh-' . $atts['unique_id'] . ' .fw-shortcode-calendar a.cal-event-week'));
				if (!empty($event_title_responsive_styles)) $final_styles .= '@media(max-width:767px){' . $event_title_responsive_styles . '}';

				// for icon size
				if (is_rtl()) {
					$final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .fw-shortcode-calendar #cal-slide-content a.event-item:after { font-size: ' . $atts['advanced_styling']['event_title_typography']['size'] . 'px;}';
				} else {
					$final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .fw-shortcode-calendar #cal-slide-content a.event-item:before { font-size: ' . $atts['advanced_styling']['event_title_typography']['size'] . 'px;}';
				}

				// Days (Current Month)
				$bg_current_days = the_core_get_color_palette_color_and_class($atts['advanced_styling']['current_month_bg_color'], array('return_color' => true));
				if (!empty($bg_current_days['color'])) {
					$final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .cal-day-inmonth { background-color: ' . $bg_current_days['color'] . ';}';
				}

				// Bg Days (Previous Month)
				$bg_previous_days = the_core_get_color_palette_color_and_class($atts['advanced_styling']['prev_cell_bg_color'], array('return_color' => true));
				if (!empty($bg_previous_days['color'])) {
					$final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .cal-day-outmonth { background-color: ' . $bg_previous_days['color'] . ';}';
				}

				// Days With Events
				$bg_days_with_events_bg_color = the_core_get_color_palette_color_and_class($atts['advanced_styling']['days_with_events_bg_color'], array('return_color' => true));
				if (!empty($bg_days_with_events_bg_color['color'])) {
					$final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .cal-month-box .event-day { background-color: ' . $bg_days_with_events_bg_color['color'] . ';}';
				}

				// Today
				$bg_today = the_core_get_color_palette_color_and_class($atts['advanced_styling']['today_bg_color'], array('return_color' => true));
				if (!empty($bg_today['color'])) {
					$final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .cal-month-box .cal-day-today { background-color: ' . $bg_today['color'] . ';}';
				}

				// Hover
				$hover_bg_color = the_core_get_color_palette_color_and_class($atts['advanced_styling']['hover_bg_color'], array('return_color' => true));
				if (!empty($hover_bg_color['color'])) {
					$final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .cal-month-day:hover, .tf-sh-' . $atts['unique_id'] . ' .cal-month-day.cal-day-outmonth.event-day:hover { background-color: ' . $hover_bg_color['color'] . ';}';
				}

				// Calendar Bg
				if (isset($atts['advanced_styling']['calendar_bg_color'])) {
					$calendar_bg_color = the_core_get_color_palette_color_and_class($atts['advanced_styling']['calendar_bg_color'], array('return_color' => true));
					if (!empty($calendar_bg_color['color'])) {
						$final_styles .= '.tf-sh-' . $atts['unique_id'] . ' #cal-slide-content, .tf-sh-' . $atts['unique_id'] . ' .fw-shortcode-calendar .cal-month-box #cal-slide-content:hover { background-color: ' . $calendar_bg_color['color'] . ';}';
						$final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .cal-month-box [class*="cal-cell"] { border-right: 3px solid ' . $calendar_bg_color['color'] . '; }';
						$final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .cal-month-box .cal-row-fluid {border-bottom: 3px solid ' . $calendar_bg_color['color'] . '; }';

					}
				}
			}
		} elseif ($atts['template'] == 'week') {
			// advanced_week_styling
			if (isset($atts['advanced_week_styling'])) {
				$month_title_advanced_styling = the_core_get_shortcode_advanced_styles($atts['advanced_week_styling']['month_title_typography'], array('return_color' => true));
				if (!empty($month_title_advanced_styling['styles'])) $final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .calendar-navigation h3 {' . $month_title_advanced_styling['styles'] . '}';
				// responsive month title styling
				$month_title_responsive_styles = the_core_responsive_heading_styles(array('styles' => $atts['advanced_week_styling']['month_title_typography'], 'selector' => '.tf-sh-' . $atts['unique_id'] . ' .calendar-navigation h3'));
				if (!empty($month_title_responsive_styles)) $final_styles .= '@media(max-width:767px){' . $month_title_responsive_styles . '}';

				$days_title_typography = the_core_get_shortcode_advanced_styles($atts['advanced_week_styling']['days_title_typography'], array('return_color' => true));
				if (!empty($days_title_typography['styles'])) $final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .fw-shortcode-calendar .cal-cell1, .tf-sh-' . $atts['unique_id'] . ' .fw-shortcode-calendar .cal-cell1 span {' . $days_title_typography['styles'] . '; opacity: 1;}';
				// responsive days title styling
				$days_title_responsive_styles = the_core_responsive_heading_styles(array('styles' => $atts['advanced_week_styling']['days_title_typography'], 'selector' => '.tf-sh-' . $atts['unique_id'] . ' .fw-shortcode-calendar .cal-cell1, .tf-sh-' . $atts['unique_id'] . ' .fw-shortcode-calendar .cal-cell1 span'));
				if (!empty($days_title_responsive_styles)) $final_styles .= '@media(max-width:767px){' . $days_title_responsive_styles . '}';

				$event_title_typography = the_core_get_shortcode_advanced_styles($atts['advanced_week_styling']['event_title_typography'], array('return_color' => true));
				if (!empty($event_title_typography['styles'])) {
					$final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .fw-shortcode-calendar a.cal-event-week {' . $event_title_typography['styles'] . '}';
					$final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .fw-shortcode-calendar a.cal-event-week:hover {opacity: 0.8;}';
				}
				// responsive event title styling
				$event_title_responsive_styles = the_core_responsive_heading_styles(array('styles' => $atts['advanced_week_styling']['event_title_typography'], 'selector' => '.tf-sh-' . $atts['unique_id'] . ' .fw-shortcode-calendar a.cal-event-week'));
				if (!empty($event_title_responsive_styles)) $final_styles .= '@media(max-width:767px){' . $event_title_responsive_styles . '}';

				// Heading Bg Color
				$heading_bg_color = the_core_get_color_palette_color_and_class($atts['advanced_week_styling']['heading_bg_color'], array('return_color' => true));
				if (!empty($heading_bg_color['color'])) {
					$final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .cal-cell1  { background-color: ' . $heading_bg_color['color'] . ';} .tf-sh-' . $atts['unique_id'] . ' .cal-cell1:hover { background-color: ' . $heading_bg_color['color'] . ' !important;}';
				}

				// Event Bg Color
				$bg_color = the_core_get_color_palette_color_and_class($atts['advanced_week_styling']['bg_color'], array('return_color' => true));
				if (!empty($bg_color['color'])) {
					$final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .day-highlight { background-color: ' . $bg_color['color'] . ';}';
				}

				// Heading Bg Color
				$today_bg_color = the_core_get_color_palette_color_and_class($atts['advanced_week_styling']['today_bg_color'], array('return_color' => true));
				if (!empty($today_bg_color['color'])) {
					$final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .cal-cell1.cal-day-today  { background-color: ' . $today_bg_color['color'] . ';}';
				}

				if (isset($atts['advanced_week_styling']['border_group']['selected']) && $atts['advanced_week_styling']['border_group']['selected'] == 'yes') {
					$intermediar_styles = '.tf-sh-' . $atts['unique_id'] . ' .cal-column { z-index:999 !important; border-left: ' . (int)$atts['advanced_week_styling']['border_group']['yes']['border_size'] . 'px solid ';
					$final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .cal-week-box { border-style: solid;';
					if (!empty($atts['advanced_week_styling']['border_group']['yes']['border_size'])) {
						$final_styles .= 'border-width: ' . (int)$atts['advanced_week_styling']['border_group']['yes']['border_size'] . 'px;';
					}

					$border_color = the_core_get_color_palette_color_and_class($atts['advanced_week_styling']['border_group']['yes']['border_color'], array('return_color' => true));
					if (!empty($border_color['color'])) {
						$final_styles .= 'border-color: ' . $border_color['color'] . ';';
						$intermediar_styles .= $border_color['color'];
					}
					$final_styles .= '}';
					$intermediar_styles .= '}';
					$final_styles .= $intermediar_styles;
				} else {
					// border none
					$final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .cal-column { border-left: none;}';
					$final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .cal-week-box { border: none;}';
				}
			}
		} else {
			// advanced_day_styling
			if (isset($atts['advanced_day_styling'])) {
				// month title
				$month_title_advanced_styling = the_core_get_shortcode_advanced_styles($atts['advanced_day_styling']['month_title_typography'], array('return_color' => true));
				if (!empty($month_title_advanced_styling['styles'])) {
					$final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .fw-shortcode-calendar .time-col.cal-cell {' . $month_title_advanced_styling['styles'] . '}';
					$final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .calendar-navigation h3 {' . $month_title_advanced_styling['styles'] . '}';
				}
				// responsive month title styling
				$month_title_responsive_styles = the_core_responsive_heading_styles(array('styles' => $atts['advanced_day_styling']['month_title_typography'], 'selector' => '.tf-sh-' . $atts['unique_id'] . ' .fw-shortcode-calendar .time-col.cal-cell, .tf-sh-' . $atts['unique_id'] . ' .calendar-navigation h3'));
				if (!empty($month_title_responsive_styles)) $final_styles .= '@media(max-width:767px){' . $month_title_responsive_styles . '}';

				$day_number_typography = the_core_get_shortcode_advanced_styles($atts['advanced_day_styling']['day_number_typography'], array('return_color' => true));
				if (!empty($day_number_typography['styles'])) $final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .fw-shortcode-calendar .time-col {' . $day_number_typography['styles'] . '}';
				// responsive day number styling
				$day_number_responsive_styles = the_core_responsive_heading_styles(array('styles' => $atts['advanced_day_styling']['day_number_typography'], 'selector' => '.tf-sh-' . $atts['unique_id'] . ' .fw-shortcode-calendar .time-col'));
				if (!empty($day_number_responsive_styles)) $final_styles .= '@media(max-width:767px){' . $day_number_responsive_styles . '}';

				$event_title_typography = the_core_get_shortcode_advanced_styles($atts['advanced_day_styling']['event_title_typography'], array('return_color' => true));
				if (!empty($event_title_typography['styles'])) {
					$final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .fw-shortcode-calendar .event-item {' . $event_title_typography['styles'] . '}';
					$final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .fw-shortcode-calendar .event-item:hover {opacity: 0.8;}';
				}
				// responsive event title styling
				$event_title_responsive_styles = the_core_responsive_heading_styles(array('styles' => $atts['advanced_day_styling']['event_title_typography'], 'selector' => '.tf-sh-' . $atts['unique_id'] . ' .fw-shortcode-calendar .event-item'));
				if (!empty($event_title_responsive_styles)) $final_styles .= '@media(max-width:767px){' . $event_title_responsive_styles . '}';

				$date_typography = the_core_get_shortcode_advanced_styles($atts['advanced_day_styling']['date_typography'], array('return_color' => true));
				if (!empty($date_typography['styles'])) $final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .fw-shortcode-calendar .cal-hours {' . $date_typography['styles'] . '}';
				// responsive date styling
				$date_responsive_styles = the_core_responsive_heading_styles(array('styles' => $atts['advanced_day_styling']['date_typography'], 'selector' => '.tf-sh-' . $atts['unique_id'] . ' .fw-shortcode-calendar .cal-hours'));
				if (!empty($date_responsive_styles)) $final_styles .= '@media(max-width:767px){' . $date_responsive_styles . '}';

				$bg_color = the_core_get_color_palette_color_and_class($atts['advanced_day_styling']['bg_color'], array('return_color' => true));
				if (!empty($bg_color['color'])) {
					$the_core_opacity = (int)$atts['advanced_day_styling']['bg_opacity'] / 100;
					$rgba = the_core_hex2rgba($bg_color['color'], $the_core_opacity);
					$final_styles .= '.tf-sh-' . $atts['unique_id'] . ' #cal-day-box .day-highlight { background-color: ' . $rgba . ';}';
				}
			}
		}

		if (empty($final_styles)) {
			return;
		}

		wp_add_inline_style(
			'fw-theme-style',
			$final_styles
		);
	}

	add_action(
		'fw_ext_shortcodes_enqueue_static:calendar',
		'_the_core_action_shortcode_calendar_enqueue_dynamic_css'
	);
endif;


if (!function_exists('_the_core_action_shortcode_special_heading_enqueue_dynamic_css')):
	/**
	 * @internal
	 *
	 * @param array $data
	 */
	function _the_core_action_shortcode_special_heading_enqueue_dynamic_css($data)
	{
		$shortcode = 'special_heading';
		$atts = shortcode_parse_atts($data['atts_string']);

		/**
		 * Decode attributes
		 * ( The below weird code is because of this https://github.com/ThemeFuse/Unyson/issues/469 )
		 */
		$atts = fw_ext_shortcodes_decode_attr($atts, $shortcode, $data['post']->ID);

		// advanced styling
		$final_styles = '';
		if (isset($atts['heading']['selected']) && !empty($atts['heading']['selected'])) {
			// title advanced styling
			$h = $atts['heading']['selected'];
			$title_advanced_styling = the_core_get_shortcode_advanced_styles($atts['heading'][$h]['advanced_styling'][$h], array('return_color' => true));
			if (!empty($title_advanced_styling['styles'])) $final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .fw-special-title {' . $title_advanced_styling['styles'] . '}';
			// responsive title styling
			$title_responsive_styles = the_core_responsive_heading_styles(array('styles' => $atts['heading'][$h]['advanced_styling'][$h], 'selector' => '.tf-sh-' . $atts['unique_id'] . ' .fw-special-title'));
			if (!empty($title_responsive_styles)) $final_styles .= '@media(max-width:767px){' . $title_responsive_styles . '}';
		}

		if (isset($atts['subtitle_advanced_styling'])) {
			// subtitle advanced styling
			$subtitle_advanced_styles = the_core_get_shortcode_advanced_styles($atts['subtitle_advanced_styling']['subtitle_typography'], array('return_color' => true));
			if (!empty($subtitle_advanced_styles['styles'])) $final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .fw-special-subtitle {' . $subtitle_advanced_styles['styles'] . '}';
			// responsive subtitle styling
			$subtitle_responsive_styles = the_core_responsive_heading_styles(array('styles' => $atts['subtitle_advanced_styling']['subtitle_typography'], 'selector' => '.tf-sh-' . $atts['unique_id'] . ' .fw-special-subtitle'));
			if (!empty($subtitle_responsive_styles)) $final_styles .= '@media(max-width:767px){' . $subtitle_responsive_styles . '}';
		}

		if (empty($final_styles)) {
			return;
		}

		wp_add_inline_style(
			'fw-theme-style',
			$final_styles
		);
	}

	add_action(
		'fw_ext_shortcodes_enqueue_static:special_heading',
		'_the_core_action_shortcode_special_heading_enqueue_dynamic_css'
	);
endif;


if (!function_exists('_the_core_action_shortcode_accordion_enqueue_dynamic_css')):
	/**
	 * @internal
	 *
	 * @param array $data
	 */
	function _the_core_action_shortcode_accordion_enqueue_dynamic_css($data)
	{
		$shortcode = 'accordion';
		$atts = shortcode_parse_atts($data['atts_string']);

		/**
		 * Decode attributes
		 * ( The below weird code is because of this https://github.com/ThemeFuse/Unyson/issues/469 )
		 */
		$atts = fw_ext_shortcodes_decode_attr($atts, $shortcode, $data['post']->ID);

		// bg color accordion tab
		$final_styles = '';
		if (isset($atts['bg_color'])) {
			$bg_color = the_core_get_color_palette_color_and_class($atts['bg_color'], array('return_color' => true));
			if (!empty($bg_color['color'])) {
				$final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .panel-heading { background-color: ' . $bg_color['color'] . ' }';
				$final_styles .= '.tf-sh-' . $atts['unique_id'] . '.panel-group .panel { border-color: ' . $bg_color['color'] . ' }';
			}
		}

		// content bg
		if (isset($atts['background_options']['background']) && $atts['background_options']['background'] == 'custom') {
			$content_bg = the_core_get_color_palette_color_and_class($atts['background_options']['custom']['background_color'], array('return_color' => true));
			if (!empty($content_bg['color'])) $final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .panel-body { background-color: ' . $content_bg['color'] . ' }';
		}

		// advanced styling
		if (isset($atts['advanced_styling'])) {
			// title advanced styling
			$titles_advanced_styling = the_core_get_shortcode_advanced_styles($atts['advanced_styling']['titles'], array('return_color' => true));
			if (!empty($titles_advanced_styling['styles'])) {
				$final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .panel-title a {' . $titles_advanced_styling['styles'] . '}';
				$final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .panel-title a:hover {opacity: 0.8;}';
			}
			// responsive title styling
			$title_responsive_styles = the_core_responsive_heading_styles(array('styles' => $atts['advanced_styling']['titles'], 'selector' => '.tf-sh-' . $atts['unique_id'] . ' .panel-title a'));
			if (!empty($title_responsive_styles)) $final_styles .= '@media(max-width:767px){' . $title_responsive_styles . '}';

			// body text advanced styling
			$text_advanced_styling = the_core_get_shortcode_advanced_styles($atts['advanced_styling']['body_text'], array('return_color' => true));
			if ( !empty($text_advanced_styling['styles']) ) {
				$final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .panel-body {' . $text_advanced_styling['styles'] . '}';
				$text_color    = the_core_get_color_palette_color_and_class($atts['advanced_styling']['body_text']['color-palette']);
				if ( !empty($text_color['color']) ) {
					$final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .panel-body * {color: ' . $text_color['color'] . '}';
				}
			}
			// responsive body text styling
			$body_text_responsive_styles = the_core_responsive_heading_styles(array('styles' => $atts['advanced_styling']['body_text'], 'selector' => '.tf-sh-' . $atts['unique_id'] . ' .panel-body'));
			if (!empty($body_text_responsive_styles)) $final_styles .= '@media(max-width:767px){' . $body_text_responsive_styles . '}';
		}

		// content padding
		$padding_top = (isset($atts['padding_top']) && !empty($atts['padding_top'])) ? 'padding-top:' . (int)esc_attr($atts['padding_top']) . 'px;' : '';
		$padding_right = (isset($atts['padding_right']) && !empty($atts['padding_right'])) ? 'padding-right:' . (int)esc_attr($atts['padding_right']) . 'px;' : '';
		$padding_bottom = (isset($atts['padding_bottom']) && !empty($atts['padding_bottom'])) ? 'padding-bottom:' . (int)esc_attr($atts['padding_bottom']) . 'px;' : '';
		$padding_left = (isset($atts['padding_left']) && !empty($atts['padding_left'])) ? 'padding-left:' . (int)esc_attr($atts['padding_left']) . 'px;' : '';

		if (!empty($padding_right) || !empty($padding_left) || !empty($padding_top) || !empty($padding_bottom)) {
			$final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .panel-body{' . $padding_right . $padding_left . $padding_bottom . $padding_top . '}';
		}

		if (empty($final_styles)) {
			return;
		}

		wp_add_inline_style(
			'fw-theme-style',
			$final_styles
		);
	}

	add_action(
		'fw_ext_shortcodes_enqueue_static:accordion',
		'_the_core_action_shortcode_accordion_enqueue_dynamic_css'
	);
endif;


if (!function_exists('_the_core_action_shortcode_divider_enqueue_dynamic_css')):
	/**
	 * @internal
	 *
	 * @param array $data
	 */
	function _the_core_action_shortcode_divider_enqueue_dynamic_css($data)
	{
		$shortcode = 'divider';
		$atts = shortcode_parse_atts($data['atts_string']);

		/**
		 * Decode attributes
		 * ( The below weird code is because of this https://github.com/ThemeFuse/Unyson/issues/469 )
		 */
		$atts = fw_ext_shortcodes_decode_attr($atts, $shortcode, $data['post']->ID);

		$final_styles = '';
		// advanced styling
		if (isset($atts['special_divider']['selected_value']) && $atts['special_divider']['selected_value'] == 'text') {
			// title advanced styling
			$text_advanced_styling = the_core_get_shortcode_advanced_styles($atts['special_divider']['text']['title_advanced_styling']['text'], array('return_color' => true));
			if (!empty($text_advanced_styling['styles'])) $final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .fw-divider-title {' . $text_advanced_styling['styles'] . '}';
			// responsive text styling
			$text_responsive_styles = the_core_responsive_heading_styles(array('styles' => $atts['special_divider']['text']['title_advanced_styling']['text'], 'selector' => '.tf-sh-' . $atts['unique_id'] . ' .fw-divider-title'));
			if (!empty($text_responsive_styles)) $final_styles .= '@media(max-width:767px){' . $text_responsive_styles . '}';
		}

		// padding for
		if ($atts['special_divider']['selected_value'] == 'icon') {
			$icon_size = (!empty($atts['special_divider']['icon']['icon_size'])) ? (int)$atts['special_divider']['icon']['icon_size'] : 12;
			$final_styles .= '.tf-sh-' . $atts['unique_id'] . '.fw-divider-special.fw-divider-icon .fw-divider-inner { font-size: ' . $icon_size . 'px; width: ' . ($icon_size + 22) . 'px; height: ' . ($icon_size + 22) . 'px; line-height: ' . ($icon_size + 22) . 'px;}';
		} elseif ($atts['special_divider']['selected_value'] == 'custom') {
			$icon_size = !empty($atts['special_divider']['custom']['icon_size']) ? (int)$atts['special_divider']['custom']['icon_size'] : 12;
			$final_styles .= '.tf-sh-' . $atts['unique_id'] . '.fw-divider-special.fw-divider-icon-upload .fw-divider-inner {font-size: ' . $icon_size . 'px; width: ' . ($icon_size + 22) . 'px; height: ' . ($icon_size + 22) . 'px; line-height: ' . ($icon_size + 12) . 'px;}';
		}

		if (isset($atts['line_thickness']) && !empty($atts['line_thickness'])) {
			$line_thickness = (int)$atts['line_thickness'];
			if ($atts['type'] == 'fw-line-double') {
				$line_thickness = (int)$atts['line_thickness'] * 3;
			}
			$final_styles .= '.tf-sh-' . $atts['unique_id'] . '.fw-divider-line {border-bottom-width: ' . $line_thickness . 'px; margin-top:-' . ($line_thickness / 2) . 'px;}';
			$final_styles .= '.tf-sh-' . $atts['unique_id'] . '.fw-divider-special .fw-divider-holder {border-top-width: ' . $line_thickness . 'px; margin-top:-' . ($line_thickness / 2) . 'px;}';
		}

		if (empty($final_styles)) {
			return;
		}

		wp_add_inline_style(
			'fw-theme-style',
			$final_styles
		);
	}

	add_action(
		'fw_ext_shortcodes_enqueue_static:divider',
		'_the_core_action_shortcode_divider_enqueue_dynamic_css'
	);
endif;


if (!function_exists('_the_core_action_shortcode_text_block_enqueue_dynamic_css')):
	/**
	 * @internal
	 *
	 * @param array $data
	 */
	function _the_core_action_shortcode_text_block_enqueue_dynamic_css($data)
	{
		$shortcode = 'text_block';
		$atts = shortcode_parse_atts($data['atts_string']);

		/**
		 * Decode attributes
		 * ( The below weird code is because of this https://github.com/ThemeFuse/Unyson/issues/469 )
		 */
		$atts = fw_ext_shortcodes_decode_attr($atts, $shortcode, $data['post']->ID);

		$final_styles = '';
		// advanced styling
		if (isset($atts['text_advanced_styling'])) {
			// text advanced styling
			$text_advanced_styling = the_core_get_shortcode_advanced_styles($atts['text_advanced_styling']['text'], array('return_color' => true));
			if (!empty($text_advanced_styling['styles'])) $final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .fw-text-inner {' . $text_advanced_styling['styles'] . '}';
			// responsive text styling
			$responsive_styles = the_core_responsive_heading_styles(array('styles' => $atts['text_advanced_styling']['text'], 'selector' => '.tf-sh-' . $atts['unique_id'] . ' .fw-text-inner'));
			if (!empty($responsive_styles)) $final_styles .= '@media(max-width:767px){' . $responsive_styles . '}';
		}

		if (empty($final_styles)) {
			return;
		}

		wp_add_inline_style(
			'fw-theme-style',
			$final_styles
		);
	}

	add_action(
		'fw_ext_shortcodes_enqueue_static:text_block',
		'_the_core_action_shortcode_text_block_enqueue_dynamic_css'
	);
endif;


if (!function_exists('_the_core_action_shortcode_icon_enqueue_dynamic_css')):
	/**
	 * @internal
	 *
	 * @param array $data
	 */
	function _the_core_action_shortcode_icon_enqueue_dynamic_css($data)
	{
		$shortcode = 'icon';
		$atts = shortcode_parse_atts($data['atts_string']);

		/**
		 * Decode attributes
		 * ( The below weird code is because of this https://github.com/ThemeFuse/Unyson/issues/469 )
		 */
		$atts = fw_ext_shortcodes_decode_attr($atts, $shortcode, $data['post']->ID);

		$final_styles = '';
		$text_height = 0;
		if (!empty($atts['text'])) {
			if (isset($atts['heading']['selected']) && !empty($atts['heading']['selected'])) {
				// title advanced styling
				$h = $atts['heading']['selected'];
				$title_advanced_styling = the_core_get_shortcode_advanced_styles($atts['heading'][$h]['advanced_styling'][$h], array('return_color' => true));
				if (!empty($title_advanced_styling['styles'])) {
					$final_styles .= '.tf-sh-' . $atts['unique_id'] . ' ' . $h . '.fw-icon-title-text, .tf-sh-' . $atts['unique_id'] . ' ' . $h . '.fw-icon-title-text a {' . $title_advanced_styling['styles'] . '}';
					$final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .fw-icon-title-name:hover a{opacity: 0.8;}';
				}
				// responsive title styling
				$title_responsive_styles = the_core_responsive_heading_styles(array('styles' => $atts['heading'][$h]['advanced_styling'][$h], 'selector' => '.tf-sh-' . $atts['unique_id'] . ' ' . $h . '.fw-icon-title-text, .tf-sh-' . $atts['unique_id'] . ' ' . $h . '.fw-icon-title-text a'));
				if (!empty($title_responsive_styles)) $final_styles .= '@media(max-width:767px){' . $title_responsive_styles . '}';

				if ($atts['heading'][$h]['advanced_styling'][$h]['is_saved'] === true || $atts['heading'][$h]['advanced_styling'][$h]['is_saved'] === 'true') {
					$text_height = (int)$atts['heading'][$h]['advanced_styling'][$h]['line-height'];
				} else {
					$the_core_general_settings = fw_get_db_settings_option();
					$the_core_typography_settings = isset($the_core_general_settings['typography_settings']) ? $the_core_general_settings['typography_settings'] : array();
					$text_height = (int)$the_core_typography_settings[$h]['line-height'];
				}
			}
		}

		// icon size
		$icon_type = $atts['icon_type'];
		$icon_container_size = '';
		if ($icon_type['icon-box-img'] == 'icon-class') {
			// if icon type class
			$icon_height = (int)$icon_type['icon-class']['icon_size'];
			$icon_size = !empty($icon_type['icon-class']['icon_size']) ? 'font-size:' . esc_attr((int)$icon_type['icon-class']['icon_size']) . 'px;' : '';

			$icon_color = '';
			$icon_color_array = the_core_get_color_palette_color_and_class($icon_type['icon-class']['icon_color'], array('return_color' => true));
			if (!empty($icon_color_array['color'])) {
				$icon_color = 'color:' . $icon_color_array['color'] . ';';
			}

			// container size
			$icon_line_height = '';
			if ($atts['frame_group']['selected'] == 'fw-block-image-frame') {
				$icon_container_size = !empty($icon_size) ? 'width:' . ((int)$icon_type['icon-class']['icon_size'] + 22) . 'px;height:' . ((int)$icon_type['icon-class']['icon_size'] + 22) . 'px;' : '';
				$boder_style_size = !empty($atts['frame_group']['fw-block-image-frame']['border_size']) ? (int)$atts['frame_group']['fw-block-image-frame']['border_size'] : '1';
				$icon_line_height = 'line-height: ' . (((int)$icon_type['icon-class']['icon_size'] + 22) - (int)$boder_style_size) . 'px;';
				$icon_height = (int)$icon_type['icon-class']['icon_size'] + 22;
			}

			$final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .fw-icon-title-icon i{' . $icon_color . $icon_size . $icon_line_height . '}';
			$final_styles .= '.tf-sh-' . $atts['unique_id'] . '.fw-icon-title .fw-icon-title-icon {' . $icon_container_size . $icon_size . '}';
		} else {
			// if icon type image
			$icon_height = (int)$atts['icon_type']['upload-icon']['icon_size'];
			$icon_image_size = !empty($icon_type['upload-icon']['icon_size']) ? 'width:' . (int)$icon_type['upload-icon']['icon_size'] . 'px;height:' . (int)$icon_type['upload-icon']['icon_size'] . 'px;' : '';
			if (!empty($icon_image_size)) {
				$final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .fw-icon-title-icon img{' . $icon_image_size . '}';
			}

			// image with frame
			if ($atts['frame_group']['selected'] == 'fw-block-image-frame') {
				$icon_container_size = !empty($icon_type['upload-icon']['icon_size']) ? 'width:' . ((int)$icon_type['upload-icon']['icon_size'] + 20) . 'px; height:' . ((int)$icon_type['upload-icon']['icon_size'] + 20) . 'px; line-height: ' . ((int)$icon_type['upload-icon']['icon_size'] + 16) . 'px;' : 'line-height: normal;';
				$final_styles .= '.tf-sh-' . $atts['unique_id'] . '.fw-icon-title .fw-icon-title-icon {' . $icon_container_size . '}';
				$icon_height = (int)$atts['icon_type']['upload-icon']['icon_size'] + 20;
			}
		}

		// border
		$boder_style_size = 0;
		if ($atts['frame_group']['selected'] == 'fw-block-image-frame') {
			$boder_style_size = !empty($atts['frame_group']['fw-block-image-frame']['border_size']) ? (int)$atts['frame_group']['fw-block-image-frame']['border_size'] : '1';
			$border_color = the_core_get_color_palette_color_and_class($atts['frame_group']['fw-block-image-frame']['border_color'], array('return_color' => true));

			if (!empty($border_color['color'])) {
				$border_style = 'border:' . $boder_style_size . 'px solid ' . $border_color['color'] . ';';
			} else {
				$border_style = 'border-width:' . $boder_style_size . 'px; border-style:solid;';
			}
			$final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .fw-icon-title-icon {' . $border_style . '}';
		}

		if ( $atts['icon_type']['icon-box-img'] == 'icon-class' ) {
			$final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .fw-icon-title-icon{ line-height: ' . $icon_height . 'px;}';
		}

		if (empty($final_styles)) {
			return;
		}

		wp_add_inline_style(
			'fw-theme-style',
			$final_styles
		);
	}
	add_action( 'fw_ext_shortcodes_enqueue_static:icon', '_the_core_action_shortcode_icon_enqueue_dynamic_css' );
endif;


if (!function_exists('_the_core_action_shortcode_list_enqueue_dynamic_css')):
	/**
	 * @internal
	 *
	 * @param array $data
	 */
	function _the_core_action_shortcode_list_enqueue_dynamic_css($data)
	{
		$shortcode = 'list';
		$atts = shortcode_parse_atts($data['atts_string']);

		/**
		 * Decode attributes
		 * ( The below weird code is because of this https://github.com/ThemeFuse/Unyson/issues/469 )
		 */
		$atts = fw_ext_shortcodes_decode_attr($atts, $shortcode, $data['post']->ID);

		$final_styles = '';
		if (isset($atts['separator_group']['selected']) && $atts['separator_group']['selected'] == 'list-bordered') {
			// separator color
			$separator_color = the_core_get_color_palette_color_and_class($atts['separator_group']['list-bordered']['separator_color'], array('return_color' => true));
			if (!empty($separator_color['color'])) {
				$final_styles .= '.tf-sh-' . $atts['unique_id'] . '.list-bordered ul, ' . '.tf-sh-' . $atts['unique_id'] . '.list-bordered ol { border-bottom: 1px solid ' . $separator_color['color'] . ' }';
				$final_styles .= '.tf-sh-' . $atts['unique_id'] . '.fw-list.list-bordered li { border-top: 1px solid ' . $separator_color['color'] . ' }';
			}
		}
		if (isset($atts['titles_advanced_styling'])) {
			// titles advanced styling
			$titles_advanced_styling = the_core_get_shortcode_advanced_styles($atts['titles_advanced_styling']['text'], array('return_color' => true));
			if (!empty($titles_advanced_styling['styles'])) {
				$final_styles .= '.tf-sh-' . $atts['unique_id'] . ' li {' . $titles_advanced_styling['styles'] . '}';
				$final_styles .= '.tf-sh-' . $atts['unique_id'] . ' li a {' . $titles_advanced_styling['styles'] . '}';
				$final_styles .= '.tf-sh-' . $atts['unique_id'] . ' li:hover {opacity: 0.8;}';
			}
			// responsive titles styling
			$titles_responsive_styles = the_core_responsive_heading_styles(array('styles' => $atts['titles_advanced_styling']['text'], 'selector' => '.tf-sh-' . $atts['unique_id'] . ' li, .tf-sh-' . $atts['unique_id'] . ' li a'));
			if (!empty($titles_responsive_styles)) $final_styles .= '@media(max-width:767px){' . $titles_responsive_styles . '}';
		}

		if (empty($final_styles)) {
			return;
		}

		wp_add_inline_style(
			'fw-theme-style',
			$final_styles
		);
	}

	add_action(
		'fw_ext_shortcodes_enqueue_static:list',
		'_the_core_action_shortcode_list_enqueue_dynamic_css'
	);
endif;


if (!function_exists('_the_core_action_shortcode_quote_enqueue_dynamic_css')):
	/**
	 * @internal
	 *
	 * @param array $data
	 */
	function _the_core_action_shortcode_quote_enqueue_dynamic_css($data)
	{
		$shortcode = 'quote';
		$atts = shortcode_parse_atts($data['atts_string']);

		/**
		 * Decode attributes
		 * ( The below weird code is because of this https://github.com/ThemeFuse/Unyson/issues/469 )
		 */
		$atts = fw_ext_shortcodes_decode_attr($atts, $shortcode, $data['post']->ID);

		$final_styles = '';
		if (isset($atts['text_advanced_styling'])) {
			// text advanced styling
			$text_advanced_styling = the_core_get_shortcode_advanced_styles($atts['text_advanced_styling']['text'], array('return_color' => true));
			if (!empty($text_advanced_styling['styles'])) $final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .fw-quote-text {' . $text_advanced_styling['styles'] . '}';
			// responsive text styling
			$text_responsive_styles = the_core_responsive_heading_styles(array('styles' => $atts['text_advanced_styling']['text'], 'selector' => '.tf-sh-' . $atts['unique_id'] . ' .fw-quote-text'));
			if (!empty($text_responsive_styles)) $final_styles .= '@media(max-width:767px){' . $text_responsive_styles . '}';
		}

		if (isset($atts['author_advanced_styling'])) {
			// author advanced styling
			$author_advanced_styling = the_core_get_shortcode_advanced_styles($atts['author_advanced_styling']['author'], array('return_color' => true));
			if (!empty($author_advanced_styling['styles'])) {
				$final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .fw-quote-author a, .tf-sh-' . $atts['unique_id'] . ' .fw-quote-author span {' . $author_advanced_styling['styles'] . '}';
				$final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .fw-quote-author a:hover{opacity: 0.8;}';
			}
			// responsive author styling
			$author_responsive_styles = the_core_responsive_heading_styles(array('styles' => $atts['author_advanced_styling']['author'], 'selector' => '.tf-sh-' . $atts['unique_id'] . ' .fw-quote-author a, .tf-sh-' . $atts['unique_id'] . ' .fw-quote-author span'));
			if (!empty($author_responsive_styles)) $final_styles .= '@media(max-width:767px){' . $author_responsive_styles . '}';
		}

		if (isset($atts['quote_advanced_styling'])) {
			// quote sign advanced styling
			$quote_advanced_styling = the_core_get_shortcode_advanced_styles($atts['quote_advanced_styling']['quote_sign_font'], array('return_color' => true));
			if (!empty($quote_advanced_styling['styles'])) $final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .fw-symbols-quote {' . $quote_advanced_styling['styles'] . '}';
		}

		if (empty($final_styles)) {
			return;
		}

		wp_add_inline_style(
			'fw-theme-style',
			$final_styles
		);
	}

	add_action(
		'fw_ext_shortcodes_enqueue_static:quote',
		'_the_core_action_shortcode_quote_enqueue_dynamic_css'
	);
endif;


if (!function_exists('_the_core_action_shortcode_team_member_enqueue_dynamic_css')):
	/**
	 * @internal
	 *
	 * @param array $data
	 */
	function _the_core_action_shortcode_team_member_enqueue_dynamic_css($data)
	{
		$shortcode = 'team_member';
		$atts = shortcode_parse_atts($data['atts_string']);

		/**
		 * Decode attributes
		 * ( The below weird code is because of this https://github.com/ThemeFuse/Unyson/issues/469 )
		 */
		$atts = fw_ext_shortcodes_decode_attr($atts, $shortcode, $data['post']->ID);

		$final_styles = '';
		if (isset($atts['heading']['selected']) && !empty($atts['heading']['selected'])) {
			// title advanced styling
			$h = $atts['heading']['selected'];
			$title_advanced_styling = the_core_get_shortcode_advanced_styles($atts['heading'][$h]['advanced_styling'][$h], array('return_color' => true));
			if (!empty($title_advanced_styling['styles'])) $final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .fw-team-name ' . $h . ' {' . $title_advanced_styling['styles'] . '}';
			// responsive title styling
			$title_responsive_styles = the_core_responsive_heading_styles(array('styles' => $atts['heading'][$h]['advanced_styling'][$h], 'selector' => '.tf-sh-' . $atts['unique_id'] . ' .fw-team-name ' . $h));
			if (!empty($title_responsive_styles)) $final_styles .= '@media(max-width:767px){' . $title_responsive_styles . '}';
		}

		if (isset($atts['job_advanced_styling'])) {
			// job advanced styling
			$job_advanced_styling = the_core_get_shortcode_advanced_styles($atts['job_advanced_styling']['text'], array('return_color' => true));
			if (!empty($job_advanced_styling['styles'])) $final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .fw-team-name span {' . $job_advanced_styling['styles'] . '}';
			// responsive job styling
			$job_responsive_styles = the_core_responsive_heading_styles(array('styles' => $atts['job_advanced_styling']['text'], 'selector' => '.tf-sh-' . $atts['unique_id'] . ' .fw-team-name span'));
			if (!empty($job_responsive_styles)) $final_styles .= '@media(max-width:767px){' . $job_responsive_styles . '}';
		}

		if (isset($atts['description_advanced_styling'])) {
			// description advanced styling
			$description_advanced_styling = the_core_get_shortcode_advanced_styles($atts['description_advanced_styling']['text'], array('return_color' => true));
			if (!empty($description_advanced_styling['styles'])) $final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .fw-team-text {' . $description_advanced_styling['styles'] . '}';
			// responsive description styling
			$description_responsive_styles = the_core_responsive_heading_styles(array('styles' => $atts['description_advanced_styling']['text'], 'selector' => '.tf-sh-' . $atts['unique_id'] . ' .fw-team-text'));
			if (!empty($description_responsive_styles)) $final_styles .= '@media(max-width:767px){' . $description_responsive_styles . '}';
		}

		if (isset($atts['content_bg_color'])) {
			// content bg color
			$content_bg_color = the_core_get_color_palette_color_and_class($atts['content_bg_color'], array('return_color' => true));
			if ( !empty( $content_bg_color['color'] ) ) {
				// content bg opacity
				if( isset( $atts['content_bg_opacity'] ) ) {
					$opacity = (int)$atts['content_bg_opacity'] / 100;
					$bg = the_core_hex2rgba($content_bg_color['color'], $opacity);
				}
				else {
					$bg = $content_bg_color['color'];
				}

				if( isset( $atts['member_type_picker']['member_type'] ) && $atts['member_type_picker']['member_type'] == 'fw-team-member-type-2' ) {
					// type 2
					$final_styles .= '.tf-sh-' . $atts['unique_id'] . '.fw-team.fw-team-member-type-2 .fw-block-image-overlay { background-color: ' . $bg . ' }';
				}
				else {
					// type 1 (if not isset type 2, because some user have this saved)
					$final_styles .= '.tf-sh-' . $atts['unique_id'] . ' { background-color: ' . $bg . ' }';
				}
			}
		}

		if( isset( $atts['member_type_picker']['member_type'] ) && $atts['member_type_picker']['member_type'] == 'fw-team-member-type-2' ) {
			if( $atts['round_image'] == 'fw-block-image-circle' && $atts['frame']['selected'] == 'fw-block-image-frame' && $atts['frame']['fw-block-image-frame']['border_size'] > 0 ) {
				$border_color = the_core_get_color_palette_color_and_class( $atts['frame']['fw-block-image-frame']['border_color'], array('return_color' => true));
				if ( !empty( $border_color['color'] ) ) {
					$final_styles .= '.tf-sh-' . $atts['unique_id'] . '.fw-team.fw-team-member-type-2 .fw-block-image-child { box-shadow: inset 0 0 0 1px '.$border_color['color'].'; }';
				}
			}
		}

		if (empty($final_styles)) {
			return;
		}

		wp_add_inline_style(
			'fw-theme-style',
			$final_styles
		);
	}

	add_action(
		'fw_ext_shortcodes_enqueue_static:team_member',
		'_the_core_action_shortcode_team_member_enqueue_dynamic_css'
	);
endif;


if (!function_exists('_the_core_action_shortcode_testimonials_enqueue_dynamic_css')):
	/**
	 * @internal
	 *
	 * @param array $data
	 */
	function _the_core_action_shortcode_testimonials_enqueue_dynamic_css($data)
	{
		$shortcode = 'testimonials';
		$atts = shortcode_parse_atts($data['atts_string']);

		/**
		 * Decode attributes
		 * ( The below weird code is because of this https://github.com/ThemeFuse/Unyson/issues/469 )
		 */
		$atts = fw_ext_shortcodes_decode_attr($atts, $shortcode, $data['post']->ID);

		$final_styles = '';
		// border to image
		if ( isset( $atts['frame']['selected'] ) && $atts['frame']['selected'] == 'fw-block-image-frame' ) {
			$frame_style = '';
			if ( ! empty( $atts['frame']['fw-block-image-frame']['border_size'] ) ) {
				$frame_style .= 'border-style: solid;';
				$frame_style .= ' border-width: '.$atts['frame']['fw-block-image-frame']['border_size'].'px;';
			}

			$frame_color = the_core_get_color_palette_color_and_class( $atts['frame']['fw-block-image-frame']['border_color'], array('return_color' => true) );
			if( !empty($frame_color['color']) ) {
				$frame_style .= ' border-color: ' . $frame_color['color'] . ';';
			}

			$final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .fw-testimonials-avatar .fw-testimonials-avatar-img {' . $frame_style . '}';
		}

		if (isset($atts['heading']['selected']) && !empty($atts['heading']['selected'])) {
			// title advanced styling
			$h = $atts['heading']['selected'];
			$title_advanced_styling = the_core_get_shortcode_advanced_styles($atts['heading'][$h]['advanced_styling'][$h], array('return_color' => true));
			if (!empty($title_advanced_styling['styles'])) $final_styles .= '.tf-sh-' . $atts['unique_id'] . ' ' . $h . '.fw-testimonials-title {' . $title_advanced_styling['styles'] . '}';
			// responsive title styling
			$title_responsive_styles = the_core_responsive_heading_styles(array('styles' => $atts['heading'][$h]['advanced_styling'][$h], 'selector' => '.tf-sh-' . $atts['unique_id'] . ' ' . $h . '.fw-testimonials-title'));
			if (!empty($title_responsive_styles)) $final_styles .= '@media(max-width:767px){' . $title_responsive_styles . '}';
		}

		if (isset($atts['advanced_testimonials'])) {
			// testimonial advanced styling
			$testimonial_advanced_styling = the_core_get_shortcode_advanced_styles($atts['advanced_testimonials']['testimonial'], array('return_color' => true));
			if (!empty($testimonial_advanced_styling['styles'])) $final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .fw-testimonials-text {' . $testimonial_advanced_styling['styles'] . '}';
			// responsive testimonial styling
			$testimonial_responsive_styles = the_core_responsive_heading_styles(array('styles' => $atts['advanced_testimonials']['testimonial'], 'selector' => '.tf-sh-' . $atts['unique_id'] . ' .fw-testimonials-text'));
			if (!empty($testimonial_responsive_styles)) $final_styles .= '@media(max-width:767px){' . $testimonial_responsive_styles . '}';

			$testimonials_color = the_core_get_color_palette_color_and_class($atts['advanced_testimonials']['testimonial']['color-palette'], array('return_color' => true));
			if (!empty($testimonials_color['color'])) {
				if ($atts['style'] == 'fw-testimonials-1') {
					$final_styles .= '.tf-sh-' . $atts['unique_id'] . '.fw-testimonials .prev, .tf-sh-' . $atts['unique_id'] . '.fw-testimonials .next {color: ' . $testimonials_color['color'] . '}';
					$final_styles .= '.tf-sh-' . $atts['unique_id'] . '.fw-testimonials .fw-testimonials-pagination a {background: ' . $testimonials_color['color'] . '}';
				}
			}

			// name advanced styling
			$name_advanced_styling = the_core_get_shortcode_advanced_styles($atts['advanced_testimonials']['name'], array('return_color' => true));
			if (!empty($name_advanced_styling['styles'])) {
				$final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .fw-testimonials-author .author-name {' . $name_advanced_styling['styles'] . '}';
				if ($atts['style'] == 'fw-testimonials-2') {
					$name_color = the_core_get_color_palette_color_and_class($atts['advanced_testimonials']['name']['color-palette'], array('return_color' => true));
					if (!empty($name_color['color'])) {
						$final_styles .= '.tf-sh-' . $atts['unique_id'] . '.fw-testimonials .prev, .tf-sh-' . $atts['unique_id'] . '.fw-testimonials .next {color: ' . $name_color['color'] . '}';
						$final_styles .= '.tf-sh-' . $atts['unique_id'] . '.fw-testimonials .fw-testimonials-pagination a {background: ' . $name_color['color'] . '}';
					}
				}
			}
			// responsive name styling
			$name_responsive_styles = the_core_responsive_heading_styles(array('styles' => $atts['advanced_testimonials']['name'], 'selector' => '.tf-sh-' . $atts['unique_id'] . ' .fw-testimonials-author .author-name'));
			if (!empty($name_responsive_styles)) $final_styles .= '@media(max-width:767px){' . $name_responsive_styles . '}';

			// job_title advanced styling
			$job_title_advanced_styling = the_core_get_shortcode_advanced_styles($atts['advanced_testimonials']['job_title'], array('return_color' => true));
			if (!empty($job_title_advanced_styling['styles'])) $final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .fw-testimonials-author .author-job {' . $job_title_advanced_styling['styles'] . '}';
			// responsive job_title styling
			$job_title_responsive_styles = the_core_responsive_heading_styles(array('styles' => $atts['advanced_testimonials']['job_title'], 'selector' => '.tf-sh-' . $atts['unique_id'] . ' .fw-testimonials-author .author-job'));
			if (!empty($job_title_responsive_styles)) $final_styles .= '@media(max-width:767px){' . $job_title_responsive_styles . '}';

			// company advanced styling
			$company_advanced_styling = the_core_get_shortcode_advanced_styles($atts['advanced_testimonials']['company'], array('return_color' => true));
			if (!empty($company_advanced_styling['styles'])) {
				$final_styles .= '.tf-sh-' . $atts['unique_id'] . '.fw-testimonials .fw-testimonials-url, .tf-sh-' . $atts['unique_id'] . ' .fw-testimonials-url a {' . $company_advanced_styling['styles'] . '}';
				$final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .fw-testimonials-url a:hover {opacity: 0.8}';
			}
			// responsive company styling
			$company_responsive_styles = the_core_responsive_heading_styles(array('styles' => $atts['advanced_testimonials']['company'], 'selector' => '.tf-sh-' . $atts['unique_id'] . '.fw-testimonials .fw-testimonials-url, .tf-sh-' . $atts['unique_id'] . ' .fw-testimonials-url a'));
			if (!empty($company_responsive_styles)) $final_styles .= '@media(max-width:767px){' . $company_responsive_styles . '}';
		}

		// rating color
		if ( isset( $atts['advanced_testimonials']['rating_color'] ) ) {
			$rating_color = the_core_get_color_palette_color_and_class( $atts['advanced_testimonials']['rating_color'], array( 'return_color' => true ) );
			if ( ! empty( $rating_color['color'] ) ) {
				$final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .fw-testimonials-item .fw-testimonials-rating {color: ' . $rating_color['color'] . ';}';
			}
		}

		// styling only for testimonials type 2
		if ($atts['style'] == 'fw-testimonials-2') {
			if (isset($atts['bg_color'])) {

				$bg_color = the_core_get_color_palette_color_and_class($atts['bg_color'], array('return_color' => true));
				if (!empty($bg_color['color'])) {
					// bg opacity
					$the_core_opacity = (int)$atts['bg_opacity'] / 100;
					$rgba_color = the_core_hex2rgba($bg_color['color'], $the_core_opacity);

					$final_styles .= '.tf-sh-' . $atts['unique_id'] . '.fw-testimonials-2 .fw-testimonials-text {background-color: ' . $rgba_color . ';}';
					$final_styles .= '.tf-sh-' . $atts['unique_id'] . '.fw-testimonials-2 .fw-testimonials-text:before{border-color: ' . $rgba_color . ' transparent transparent transparent;}';
				}

				// paddings
				$padding_top = (isset($atts['padding_top']) && !empty($atts['padding_top'])) ? 'padding-top:' . (int)esc_attr($atts['padding_top']) . 'px;' : '';
				$padding_right = (isset($atts['padding_right']) && !empty($atts['padding_right'])) ? 'padding-right:' . (int)esc_attr($atts['padding_right']) . 'px;' : '';
				$padding_bottom = (isset($atts['padding_bottom']) && !empty($atts['padding_bottom'])) ? 'padding-bottom:' . (int)esc_attr($atts['padding_bottom']) . 'px;' : '';
				$padding_left = (isset($atts['padding_left']) && !empty($atts['padding_left'])) ? 'padding-left:' . (int)esc_attr($atts['padding_left']) . 'px;' : '';
				if (!empty($padding_right) || !empty($padding_left) || !empty($padding_top) || !empty($padding_bottom)) {
					$final_styles .= '.tf-sh-' . $atts['unique_id'] . '.fw-testimonials-2 .fw-testimonials-text {' . $padding_right . $padding_left . $padding_bottom . $padding_top . '}';
				}
			}
		}

		if (empty($final_styles)) {
			return;
		}

		wp_add_inline_style(
			'fw-theme-style',
			$final_styles
		);
	}

	add_action(
		'fw_ext_shortcodes_enqueue_static:testimonials',
		'_the_core_action_shortcode_testimonials_enqueue_dynamic_css'
	);
endif;


if (!function_exists('_the_core_action_shortcode_contact_form_enqueue_dynamic_css')):
	/**
	 * @internal
	 *
	 * @param array $data
	 */
	function _the_core_action_shortcode_contact_form_enqueue_dynamic_css($data)
	{
		$shortcode = 'contact_form';
		$atts = shortcode_parse_atts($data['atts_string']);

		/**
		 * Decode attributes
		 * ( The below weird code is because of this https://github.com/ThemeFuse/Unyson/issues/469 )
		 */
		$atts = fw_ext_shortcodes_decode_attr($atts, $shortcode, $data['post']->ID);

		$final_styles = '';
		if (isset($atts['form_title_typography'])) {
			// form title advanced styling
			$form_title_typography = the_core_get_shortcode_advanced_styles($atts['form_title_typography'], array('return_color' => true));
			if (!empty($form_title_typography['styles'])) $final_styles .= '.tf-sh-' . $atts['id'] . ' .fw-contact-form-title {' . $form_title_typography['styles'] . '}';
		}

		if (isset($atts['form_subtitle_typography'])) {
			// form subtitle advanced styling
			$form_subtitle_typography = the_core_get_shortcode_advanced_styles($atts['form_subtitle_typography'], array('return_color' => true));
			if (!empty($form_subtitle_typography['styles'])) $final_styles .= '.tf-sh-' . $atts['id'] . ' .wrap-forms .header.title .fw-contact-form-description {' . $form_subtitle_typography['styles'] . '}';
		}

		if (isset($atts['label_typography'])) {
			// label advanced styling
			$label_typography = the_core_get_shortcode_advanced_styles($atts['label_typography'], array('return_color' => true));
			if (!empty($label_typography['styles'])) $final_styles .= '.tf-sh-' . $atts['id'] . ' .wrap-forms .form-builder-item > div > label {' . $label_typography['styles'] . '}';
		}

		if (isset($atts['placeholder_typography'])) {
			// placeholder advanced styling
			$placeholder_typography = the_core_get_shortcode_advanced_styles($atts['placeholder_typography'], array('return_color' => true));
			if (!empty($placeholder_typography['styles'])) {
				$final_styles .= '.tf-sh-' . $atts['id'] . ' ::-webkit-input-placeholder {' . $placeholder_typography['styles'] . '}';
				$final_styles .= '.tf-sh-' . $atts['id'] . ' ::-moz-placeholder {' . $placeholder_typography['styles'] . '}';
				$final_styles .= '.tf-sh-' . $atts['id'] . ' :-moz-placeholder {' . $placeholder_typography['styles'] . '}';
				$final_styles .= '.tf-sh-' . $atts['id'] . ' :-ms-input-placeholder {' . $placeholder_typography['styles'] . '}';
			}
		}

		if (isset($atts['default_text_typography'])) {
			// defaut text advanced styling
			$default_text_typography = the_core_get_shortcode_advanced_styles($atts['default_text_typography'], array('return_color' => true));
			if (!empty($default_text_typography['styles'])) $final_styles .= '.tf-sh-' . $atts['id'] . ' .field-text > input[type="text"], .tf-sh-' . $atts['id'] . ' input[type="password"], .tf-sh-' . $atts['id'] . ' input[type="search"], .tf-sh-' . $atts['id'] . ' input[type="url"], .tf-sh-' . $atts['id'] . ' input[type="email"], .tf-sh-' . $atts['id'] . ' textarea, .tf-sh-' . $atts['id'] . ' .select-field, .tf-sh-' . $atts['id'] . ' .select-field .item, .tf-sh-' . $atts['id'] . ' .selectize-dropdown-content div, .tf-sh-' . $atts['id'] . ' .custom-checkbox label, .tf-sh-' . $atts['id'] . ' .custom-radio label, .tf-sh-' . $atts['id'] . ' .selectize-input{' . $default_text_typography['styles'] . '}';
		}

		if (isset($atts['instructions_for_users_typography'])) {
			// instructions for users advanced styling
			$instructions_for_users_typography = the_core_get_shortcode_advanced_styles($atts['instructions_for_users_typography'], array('return_color' => true));
			if (!empty($instructions_for_users_typography['styles'])) $final_styles .= '.tf-sh-' . $atts['id'] . ' .wrap-forms .form-builder-item p {' . $instructions_for_users_typography['styles'] . '}';
		}

		if (isset($atts['success_message_typography'])) {
			// success message advanced styling
			$success_message_typography = the_core_get_shortcode_advanced_styles($atts['success_message_typography'], array('return_color' => true));
			if (!empty($success_message_typography['styles'])) $final_styles .= '.tf-sh-' . $atts['id'] . ' .flash-messages-info, .tf-sh-' . $atts['id'] . ' .flash-messages-success {' . $success_message_typography['styles'] . '}';
		}

		if (isset($atts['failure_message_typography'])) {
			// failure message advanced styling
			$failure_message_typography = the_core_get_shortcode_advanced_styles($atts['failure_message_typography'], array('return_color' => true));
			if (!empty($failure_message_typography['styles'])) $final_styles .= '.tf-sh-' . $atts['id'] . ' .flash-messages-error {' . $failure_message_typography['styles'] . '}';
		}

		if (isset($atts['form_bg_options']['background'])) {
			if ($atts['form_bg_options']['background'] == 'custom') {
				$form_bg_color = the_core_get_color_palette_color_and_class($atts['form_bg_options']['custom']['form_bg_color'], array('return_color' => true));
				if (!empty($form_bg_color['color'])) {
					$final_styles .= '.tf-sh-' . $atts['id'] . ' .wrap-forms {background: ' . $form_bg_color['color'] . '}';
				}
			} else {
				// none
				$final_styles .= '.tf-sh-' . $atts['id'] . ' .wrap-forms {background: none; }';
			}
		}

		// fields border
		$border_style = '';
		if (isset($atts['border_group']['selected']) && $atts['border_group']['selected'] == 'yes') {
			// border size
			if (!empty($atts['border_group']['yes']['border_size'])) {
				$border_style .= 'border-style: solid; border-width: ' . (int)$atts['border_group']['yes']['border_size'] . 'px;';
			}

			// border color
			$border_color = the_core_get_color_palette_color_and_class($atts['border_group']['yes']['border_color'], array('return_color' => true));
			if (!empty($border_color['color'])) {
				$border_style .= ' border-color: ' . $border_color['color'] . ';';
			}

			$final_styles .= '.tf-sh-' . $atts['id'] . ' input[type="text"], .tf-sh-' . $atts['id'] . ' input[type="password"], .tf-sh-' . $atts['id'] . ' input[type="search"], .tf-sh-' . $atts['id'] . ' input[type="url"], .tf-sh-' . $atts['id'] . ' input[type="email"], .tf-sh-' . $atts['id'] . ' textarea, .tf-sh-' . $atts['id'] . ' .selectize-input {' . $border_style . '}';
		} else {
			$final_styles .= '.tf-sh-' . $atts['id'] . ' input[type="text"], .tf-sh-' . $atts['id'] . ' input[type="password"], .tf-sh-' . $atts['id'] . ' input[type="search"], .tf-sh-' . $atts['id'] . ' input[type="url"], .tf-sh-' . $atts['id'] . ' input[type="email"], .tf-sh-' . $atts['id'] . ' textarea, .tf-sh-' . $atts['id'] . ' .selectize-input {border: none;}';
		}

		// fields bg color
		if (isset($atts['fields_bg_options']['background'])) {
			if ($atts['fields_bg_options']['background'] == 'custom') {
				$fields_bg_color = the_core_get_color_palette_color_and_class($atts['fields_bg_options']['custom']['fields_bg_color'], array('return_color' => true));
				if (!empty($fields_bg_color['color'])) {
					if (!empty($fields_bg_color['color'])) $final_styles .= '.tf-sh-' . $atts['id'] . ' input[type="text"], .tf-sh-' . $atts['id'] . ' input[type="password"], .tf-sh-' . $atts['id'] . ' input[type="search"], .tf-sh-' . $atts['id'] . ' input[type="url"], .tf-sh-' . $atts['id'] . ' input[type="email"], .tf-sh-' . $atts['id'] . ' textarea, .tf-sh-' . $atts['id'] . ' .wrap-forms .selectize-input {background: ' . $fields_bg_color['color'] . '}';
				}
			} else {
				// none
				$final_styles .= '.tf-sh-' . $atts['id'] . ' input[type="text"], .tf-sh-' . $atts['id'] . ' input[type="password"], .tf-sh-' . $atts['id'] . ' input[type="search"], .tf-sh-' . $atts['id'] . ' input[type="url"], .tf-sh-' . $atts['id'] . ' input[type="email"], .tf-sh-' . $atts['id'] . ' textarea, .tf-sh-' . $atts['id'] . ' .wrap-forms .selectize-input {background: none;}';
			}
		}

		// button settings
		if (isset($atts['button_options']['style']['selected'])) {
			if ($atts['button_options']['style']['selected'] == 'fw-btn-3') {
				if (isset($atts['button_options']['style']['fw-btn-3']['border_size']) && !empty($atts['button_options']['style']['fw-btn-3']['border_size'])) {
					$final_styles .= '.tf-sh-' . $atts['id'] . ' .fw-btn{ border-top-width: ' . (int)$atts['button_options']['style']['fw-btn-3']['border_size'] . 'px; border-bottom-width: ' . (int)$atts['button_options']['style']['fw-btn-3']['border_size'] . 'px; }';
				}
				// btn color
				if (isset($atts['button_options']['normal_color'])) {
					$normal_color = the_core_get_color_palette_color_and_class($atts['button_options']['normal_color'], array('return_color' => true));
					if (!empty($normal_color['color'])) $final_styles .= '.tf-sh-' . $atts['id'] . ' .fw-btn{ border-bottom-color: ' . $normal_color['color'] . '; border-top-color: ' . $normal_color['color'] . ' }';
				}
				// hover color
				if (isset($atts['button_options']['hover_color'])) {
					$hover_color = the_core_get_color_palette_color_and_class($atts['button_options']['hover_color'], array('return_color' => true));
					if (!empty($hover_color['color'])) $final_styles .= '.tf-sh-' . $atts['id'] . ' .fw-btn:hover, .tf-sh-' . $atts['id'] . ' .fw-btn:focus { background-color: ' . $hover_color['color'] . '; border-bottom-color: ' . $hover_color['color'] . '; border-top-color: ' . $hover_color['color'] . ' }';
				}
			} elseif ($atts['button_options']['style']['selected'] == 'fw-btn-2') {
				if (isset($atts['button_options']['style']['fw-btn-2']['border_size']) && !empty($atts['button_options']['style']['fw-btn-2']['border_size'])) {
					$final_styles .= '.tf-sh-' . $atts['id'] . ' .fw-btn{ border-width: ' . (int)$atts['button_options']['style']['fw-btn-2']['border_size'] . 'px; }';
				}
				if (isset($atts['button_options']['style']['fw-btn-2']['border_radius']) && !empty($atts['button_options']['style']['fw-btn-2']['border_radius'])) {
					$final_styles .= '.tf-sh-' . $atts['id'] . ' .fw-btn{ border-radius: ' . (int)$atts['button_options']['style']['fw-btn-2']['border_radius'] . 'px; }';
				}

				// btn color
				if (isset($atts['button_options']['normal_color'])) {
					$normal_color = the_core_get_color_palette_color_and_class($atts['button_options']['normal_color'], array('return_color' => true));
					if (!empty($normal_color['color'])) $final_styles .= '.tf-sh-' . $atts['id'] . ' .fw-btn{ border-color: ' . $normal_color['color'] . ' }';
				}
				// hover color
				if (isset($atts['button_options']['hover_color'])) {
					$hover_color = the_core_get_color_palette_color_and_class($atts['button_options']['hover_color'], array('return_color' => true));
					if (!empty($hover_color['color'])) $final_styles .= '.tf-sh-' . $atts['id'] . ' .fw-btn:hover { background-color: ' . $hover_color['color'] . '; border-color: ' . $hover_color['color'] . ' }';
				}
			} elseif ($atts['button_options']['style']['selected'] == 'fw-btn-1') {
				if (isset($atts['button_options']['style']['fw-btn-1']['border_radius']) && !empty($atts['button_options']['style']['fw-btn-1']['border_radius'])) {
					$final_styles .= '.tf-sh-' . $atts['id'] . ' .fw-btn{ border-radius: ' . (int)$atts['button_options']['style']['fw-btn-1']['border_radius'] . 'px; }';
				}

				// btn color
				if (isset($atts['button_options']['normal_color'])) {
					$normal_color = the_core_get_color_palette_color_and_class($atts['button_options']['normal_color'], array('return_color' => true));
					if (!empty($normal_color['color'])) $final_styles .= '.tf-sh-' . $atts['id'] . ' .fw-btn{ background-color: ' . $normal_color['color'] . ' }';
				}
				// hover color
				if (isset($atts['button_options']['hover_color'])) {
					$hover_color = the_core_get_color_palette_color_and_class($atts['button_options']['hover_color'], array('return_color' => true));
					if (!empty($hover_color['color'])) $final_styles .= '.tf-sh-' . $atts['id'] . ' .fw-btn:hover { background-color: ' . $hover_color['color'] . ' }';
				}

			}
		}

		if (isset($atts['button_options']['label_advanced_styling'])) {
			// button label advanced styling
			$label_advanced_styling = the_core_get_shortcode_advanced_styles($atts['button_options']['label_advanced_styling']['text'], array('return_color' => true));
			if (!empty($label_advanced_styling['styles'])) $final_styles .= '.tf-sh-' . $atts['id'] . ' .fw-btn span {' . $label_advanced_styling['styles'] . '}';

			// button label hover text color
			$hover_text_color = the_core_get_color_palette_color_and_class($atts['button_options']['label_advanced_styling']['hover_text_color'], array('return_color' => true));
			if (!empty($hover_text_color['color'])) $final_styles .= '.tf-sh-' . $atts['id'] . ' .fw-btn:hover span {color: ' . $hover_text_color['color'] . '}';
		}

		$atts['padding_top'] = (int)$atts['padding_top'];
		$atts['padding_right'] = (int)$atts['padding_right'];
		$atts['padding_bottom'] = (int)$atts['padding_bottom'];
		$atts['padding_left'] = (int)$atts['padding_left'];
		if ($atts['padding_top'] != 0 || $atts['padding_right'] != 0 || $atts['padding_bottom'] != 0 || $atts['padding_left'] != 0) {
			$style = 'padding: ' . $atts['padding_top'] . 'px ' . $atts['padding_right'] . 'px ' . $atts['padding_bottom'] . 'px ' . $atts['padding_left'] . 'px;';
			$final_styles .= '.tf-sh-' . $atts['id'] . ' .wrap-contact-forms {' . $style . '}';
		}

		if (empty($final_styles)) {
			return;
		}

		wp_add_inline_style(
			'fw-theme-style',
			$final_styles
		);
	}

	add_action(
		'fw_ext_shortcodes_enqueue_static:contact_form',
		'_the_core_action_shortcode_contact_form_enqueue_dynamic_css'
	);
endif;


if (!function_exists('_the_core_action_shortcode_table_enqueue_dynamic_css')):
	/**
	 * @internal
	 *
	 * @param array $data
	 */
	function _the_core_action_shortcode_table_enqueue_dynamic_css($data)
	{
		$shortcode = 'table';
		$atts = shortcode_parse_atts($data['atts_string']);

		/**
		 * Decode attributes
		 * ( The below weird code is because of this https://github.com/ThemeFuse/Unyson/issues/469 )
		 */
		$atts = fw_ext_shortcodes_decode_attr($atts, $shortcode, $data['post']->ID);

		$id      = '.tf-sh-' . $atts['unique_id'];
		$styling = '';
		if ($atts['table']['header_options']['table_purpose'] == 'pricing') {
			if (isset($atts['table_advanced_styling'])) {
				$table_advanced = $atts['table_advanced_styling'];

				/*-------------heading advanced styling--------------------*/
				if (isset($table_advanced['heading_typography'])) {
					$heading_typography = $table_advanced['heading_typography'];
					$heading_advanced_styles = the_core_get_shortcode_advanced_styles($heading_typography, array('return_color' => true));

					$heading_styles = $heading_advanced_styles['styles'];
					if (!empty($heading_styles)) $styling .= $id . '.fw-price-1 .fw-price-title.default-col{' . $heading_styles . '}';
					// responsive text styling
					$text_responsive_styles = the_core_responsive_heading_styles(array('styles' => $heading_typography, 'selector' => $id . '.fw-price-1 .fw-price-title.default-col'));
					if (!empty($text_responsive_styles)) $styling .= '@media(max-width:767px){' . $text_responsive_styles . '}';
				}
				/*-------------heading highlight advanced styling--------------------*/
				if (isset($table_advanced['highlight_heading_typography'])) {
					$heading_highlight_typography = $table_advanced['highlight_heading_typography'];
					$heading_highlight_advanced_styles = the_core_get_shortcode_advanced_styles($heading_highlight_typography, array('return_color' => true));

					$heading_highlight_styles = $heading_highlight_advanced_styles['styles'];
					if (!empty($heading_highlight_styles)) $styling .= $id . '.fw-price-1 .fw-price-title.highlight-col{' . $heading_highlight_styles . '}';
					// responsive highlight heading styling
					$highlight_heading_responsive_styles = the_core_responsive_heading_styles(array('styles' => $heading_highlight_typography, 'selector' => $id . '.fw-price-1 .fw-price-title.highlight-col'));
					if (!empty($highlight_heading_responsive_styles)) $styling .= '@media(max-width:767px){' . $highlight_heading_responsive_styles . '}';
				}
				/*-------------heading description advanced styling--------------------*/
				if (isset($table_advanced['description_heading_typography'])) {
					$heading_description_typography = $table_advanced['description_heading_typography'];
					$heading_description_advanced_styles = the_core_get_shortcode_advanced_styles($heading_description_typography, array('return_color' => true));

					$heading_description_styles = $heading_description_advanced_styles['styles'];
					if (!empty($heading_description_styles)) $styling .= $id . '.fw-price-1 .fw-price-caption .fw-price-caption-title{' . $heading_description_styles . '}';
					// responsive description heading styling
					$description_heading_responsive_styles = the_core_responsive_heading_styles(array('styles' => $heading_description_typography, 'selector' => $id . '.fw-price-1 .fw-price-caption .fw-price-caption-title'));
					if (!empty($description_heading_responsive_styles)) $styling .= '@media(max-width:767px){' . $description_heading_responsive_styles . '}';
				}
				/*-------------pricing advanced styling--------------------*/
				if (isset($table_advanced['price_typography'])) {
					$pricing_typography = $table_advanced['price_typography'];
					$pricing_advanced_styles = the_core_get_shortcode_advanced_styles($pricing_typography, array('return_color' => true));

					$pricing_styles = $pricing_advanced_styles['styles'];
					if (!empty($pricing_styles)) $styling .= $id . '.fw-price-1 .fw-price-value.default-col,' . $id . '.fw-price-1 .fw-price-desc.default-col{' . $pricing_styles . '}';
					// responsive price styling
					$price_responsive_styles = the_core_responsive_heading_styles(array('styles' => $pricing_typography, 'selector' => $id . '.fw-price-1 .fw-price-value.default-col,' . $id . '.fw-price-1 .fw-price-desc.default-col'));
					if (!empty($price_responsive_styles)) $styling .= '@media(max-width:767px){' . $price_responsive_styles . '}';
				}
				/*-------------pricing highlight advanced styling--------------------*/
				if (isset($table_advanced['highlight_price_typography'])) {
					$highlight_price_typography = $table_advanced['highlight_price_typography'];
					$highlight_price_advanced_styles = the_core_get_shortcode_advanced_styles($highlight_price_typography, array('return_color' => true));

					$highlight_price_styles = $highlight_price_advanced_styles['styles'];
					if (!empty($highlight_price_styles)) $styling .= $id . '.fw-price-1 .fw-price-value.highlight-col,' . $id . '.fw-price-1 .fw-price-desc.highlight-col{' . $highlight_price_styles . '}';
					// responsive highlight price styling
					$highlight_price_responsive_styles = the_core_responsive_heading_styles(array('styles' => $highlight_price_typography, 'selector' => $id . '.fw-price-1 .fw-price-value.highlight-col,' . $id . '.fw-price-1 .fw-price-desc.highlight-col'));
					if (!empty($highlight_price_responsive_styles)) $styling .= '@media(max-width:767px){' . $highlight_price_responsive_styles . '}';
				}
				/*-------------default text advanced styling--------------------*/
				if (isset($table_advanced['default_typography'])) {
					$default_text_typography = $table_advanced['default_typography'];
					$default_text_advanced_styles = the_core_get_shortcode_advanced_styles($default_text_typography, array('return_color' => true));

					$default_text_styles = $default_text_advanced_styles['styles'];
					if (!empty($default_text_styles)) $styling .= $id . ' .fw-icell.default-col{' . $default_text_styles . '}';
					// responsive default styling
					$default_responsive_styles = the_core_responsive_heading_styles(array('styles' => $default_text_typography, 'selector' => $id . ' .fw-icell.default-col'));
					if (!empty($default_responsive_styles)) $styling .= '@media(max-width:767px){' . $default_responsive_styles . '}';
				}
				/*-------------default highlight text advanced styling--------------------*/
				if (isset($table_advanced['highlight_default_typography'])) {
					$highlight_default_typography = $table_advanced['highlight_default_typography'];
					$highlight_default_advanced_styles = the_core_get_shortcode_advanced_styles($highlight_default_typography, array('return_color' => true));

					$highlight_default_styles = $highlight_default_advanced_styles['styles'];
					if (!empty($highlight_default_styles)) $styling .= $id . ' .fw-icell.highlight-col{' . $highlight_default_styles . '}';
					// responsive highlight default styling
					$highlight_default_responsive_styles = the_core_responsive_heading_styles(array('styles' => $highlight_default_typography, 'selector' => $id . ' .fw-icell.highlight-col'));
					if (!empty($highlight_default_responsive_styles)) $styling .= '@media(max-width:767px){' . $highlight_default_responsive_styles . '}';
				}
				/*-------------default description text advanced styling--------------------*/
				if (isset($table_advanced['description_typography'])) {
					$default_description_typography = $table_advanced['description_typography'];
					$default_description_advanced_styles = the_core_get_shortcode_advanced_styles($default_description_typography, array('return_color' => true));

					$default_description_styles = $default_description_advanced_styles['styles'];
					if (!empty($default_description_styles)) $styling .= $id . ' .fw-icell.desc-col, ' . $id . ' .fw-price-caption .fw-price-amount .fw-price-desc{' . $default_description_styles . '}';
					// responsive default description styling
					$default_description_responsive_styles = the_core_responsive_heading_styles(array('styles' => $default_description_typography, 'selector' => $id . ' .fw-icell.desc-col, ' . $id . ' .fw-price-caption .fw-price-amount .fw-price-desc'));
					if (!empty($default_description_responsive_styles)) $styling .= '@media(max-width:767px){' . $default_description_responsive_styles . '}';
				}
				//heading background
				if (isset($table_advanced['heading_bg'])) {
					$heading_bg_style = the_core_get_color_palette_color_and_class($table_advanced['heading_bg'], array('return_color' => true));
					if (!empty($heading_bg_style['color'])) {
						$styling .= $id . '.fw-price-1 .fw-price-head.default-col{background-color:' . $heading_bg_style['color'] . '}';
					}
				}
				//highlight heading background
				if (isset($table_advanced['highlight_heading_bg'])) {
					$highlight_heading_bg_style = the_core_get_color_palette_color_and_class($table_advanced['highlight_heading_bg'], array('return_color' => true));
					if (!empty($highlight_heading_bg_style['color'])) {
						if ($atts['table']['header_options']['table_purpose'] == 'pricing') {
							$styling .= $id . '.fw-price-1 .fw-price-head.highlight-col{background-color:' . $highlight_heading_bg_style['color'] . '}';
						}
					}
				}
				//description heading background
				if (isset($table_advanced['description_heading_bg'])) {
					$description_heading_bg_style = the_core_get_color_palette_color_and_class($table_advanced['description_heading_bg'], array('return_color' => true));
					if (!empty($description_heading_bg_style['color'])) {
						$styling .= $id . '.fw-price-1 .fw-price-caption .fw-price-amount.fw-heading-description{background-color:' . $description_heading_bg_style['color'] . '}';
					}
				}
				//default background
				if (isset($table_advanced['default_bg'])) {
					$default_bg_style = the_core_get_color_palette_color_and_class($table_advanced['default_bg'], array('return_color' => true));
					if (!empty($default_bg_style['color'])) {
						$styling .= $id . '.fw-price-1 .fw-price-row.default-col{background-color:' . $default_bg_style['color'] . ';}';
					}
				}
				//highlight default background
				if (isset($table_advanced['highlight_default_bg'])) {
					$highlight_default_bg_style = the_core_get_color_palette_color_and_class($table_advanced['highlight_default_bg'], array('return_color' => true));

					if (!empty($highlight_default_bg_style['color'])) {
						$styling .= $id . '.fw-price-1 .fw-price-row.highlight-col{background-color:' . $highlight_default_bg_style['color'] . ';}';
					}
				}
				//description default background
				if (isset($table_advanced['description_bg'])) {
					$description_bg_style = the_core_get_color_palette_color_and_class($table_advanced['description_bg'], array('return_color' => true));
					if (!empty($description_bg_style['color'])) {
						$styling .= $id . '.fw-price-1 .fw-price-row.desc-col,' . $id . '.fw-price-1 .fw-switch-row.desc-col,' . $id . '.fw-price-1 .fw-price-caption .fw-price-amount{background-color:' . $description_bg_style['color'] . ';}';
					}
				}
				//pricing background
				if (isset($table_advanced['pricing_bg'])) {
					$pricing_bg_style = the_core_get_color_palette_color_and_class($table_advanced['pricing_bg'], array('return_color' => true));
					if (!empty($pricing_bg_style['color'])) {
						$styling .= $id . '.fw-price-1 .fw-price-amount {background-color:' . $pricing_bg_style['color'] . ';}';
					}
				}
				//highlight pricing background
				if (isset($table_advanced['highlight_pricing_bg'])) {
					$highlight_pricing_bg_style = the_core_get_color_palette_color_and_class($table_advanced['highlight_pricing_bg'], array('return_color' => true));
					if (!empty($highlight_pricing_bg_style['color'])) {
						$styling .= $id . '.fw-price-1 .fw-price-active .fw-price-amount {background-color:' . $highlight_pricing_bg_style['color'] . ';}';
					}
				}
				//switch background
				if (isset($table_advanced['switch_bg'])) {
					$switch_bg_style = the_core_get_color_palette_color_and_class($table_advanced['switch_bg'], array('return_color' => true));
					if (!empty($switch_bg_style['color'])) {
						$styling .= $id . ' .fw-switch-row.default-col{background-color:' . $switch_bg_style['color'] . ';}';
					}
				}
				//highlight switch background
				if (isset($table_advanced['highlight_switch_bg'])) {
					$highlight_switch_bg_style = the_core_get_color_palette_color_and_class($table_advanced['highlight_switch_bg'], array('return_color' => true));
					if (!empty($highlight_switch_bg_style['color'])) {
						$styling .= $id . ' .fw-switch-row.highlight-col{background-color:' . $highlight_switch_bg_style['color'] . ';}';
					}
				}
				//button background
				if (isset($table_advanced['button_bg'])) {
					$button_bg_style = the_core_get_color_palette_color_and_class($table_advanced['button_bg'], array('return_color' => true));
					if (!empty($button_bg_style['color'])) {
						$styling .= $id . '.fw-price-1 .fw-price-foot.default-col{background-color:' . $button_bg_style['color'] . ';}';
					}
				}
				//highlight button background
				if (isset($table_advanced['highlight_button_bg'])) {
					$highlight_button_bg_style = the_core_get_color_palette_color_and_class($table_advanced['highlight_button_bg'], array('return_color' => true));

					if (!empty($highlight_button_bg_style['color'])) {
						$styling .= $id . '.fw-price-1 .fw-price-foot.highlight-col{background-color:' . $highlight_button_bg_style['color'] . ';}';
					}
				}
				//table border
				if ($table_advanced['border_group']['selected'] == 'yes') {
					$border_table_size = (!empty($table_advanced['border_group']['yes']['border_size'])) ? (int)esc_attr($table_advanced['border_group']['yes']['border_size']) : 1;
					$border_table_color = the_core_get_color_palette_color_and_class($table_advanced['border_group']['yes']['border_color'], array('return_color' => true));
					if (!empty($border_table_color['color'])) {
						$border_table_right = 'border-right:' . $border_table_size . 'px solid ' . $border_table_color['color'] . ';';
						$border_table_top = 'border-top:' . $border_table_size . 'px solid ' . $border_table_color['color'] . ';';
						$border_table_left = 'border-left:' . $border_table_size . 'px solid ' . $border_table_color['color'] . ';';
						$border_table_bottom = 'border-bottom:' . $border_table_size . 'px solid ' . $border_table_color['color'] . ';';
					} else {
						$border_table_right = 'border-right:' . $border_table_size . 'px solid;';
						$border_table_top = 'border-top:' . $border_table_size . 'px solid;';
						$border_table_left = 'border-left:' . $border_table_size . 'px solid;';
						$border_table_bottom = 'border-bottom:' . $border_table_size . 'px solid;';
					}

					$styling .= $id . '.fw-price-1 .fw-price-col:first-child .fw-price-row, ' . $id . '.fw-price-1 .fw-price-col:first-child .fw-switch-row, ' . $id . '.fw-price-1 .fw-price-col:first-child .fw-price-foot, ' . $id . '.fw-price-1 .fw-price-col:first-child .fw-price-amount{' . $border_table_left . '}';
					$styling .= $id . '.fw-price-1 .fw-price-caption .fw-price-head{' . $border_table_top . $border_table_left . '}
						' . $id . '.fw-price-1 .fw-price-caption .fw-price-head,' . $id . '.fw-price-1 .fw-price-caption .fw-price-amount,
						' . $id . '.fw-price-1 .fw-price-col:first-child .fw-price-row, ' . $id . '.fw-price-1 .fw-price-caption .fw-switch-row{' . $border_table_left . '}
						' . $id . '.fw-price-1 .fw-price-caption .fw-price-amount, ' . $id . '.fw-price-1 .fw-price-foot{' . $border_table_bottom . '}
						' . $id . ' .fw-price-amount, ' . $id . '.fw-price-1 .fw-price-row, ' . $id . '.fw-price-1 .fw-switch-row, ' . $id . '.fw-price-1 .fw-price-head{' . $border_table_bottom . '}
						' . $id . '.fw-price-1 .fw-price-col .fw-price-inner{' . $border_table_right . '}
						' . $id . '.fw-price-1 .fw-price-head,' . $id . '.fw-price-1 .fw-price-caption .fw-heading-description{' . $border_table_top . '}';

					$styling .= $id . '.fw-price-1 .fw-price-package div:last-child{ border-left: ' . $border_table_size . 'px solid ' . $border_table_color['color'] . '; margin-left: -' . $border_table_size . 'px;}';
				} else {
					$styling .= $id . '.fw-price-1 .fw-price-caption .fw-price-head,
						' . $id . '.fw-price-1 .fw-price-caption .fw-price-head,' . $id . '.fw-price-1 .fw-price-caption .fw-price-amount,
						' . $id . '.fw-price-1 .fw-price-col:first-child .fw-price-row, ' . $id . '.fw-price-1 .fw-price-caption .fw-switch-row,
						' . $id . '.fw-price-1 .fw-price-caption .fw-price-amount, ' . $id . '.fw-price-1 .fw-price-foot,
						' . $id . ' .fw-price-amount, ' . $id . '.fw-price-1 .fw-price-row, ' . $id . '.fw-price-1 .fw-switch-row,
						' . $id . '.fw-price-1 .fw-price-col .fw-price-inner{border:none;}';

					$styling .= $id . '.fw-price-1 .fw-price-col:first-child .fw-price-row, ' . $id . '.fw-price-1 .fw-price-col:first-child.fw-switch-row, ' . $id . '.fw-price-1 .fw-price-col:first-child .fw-price-foot{border-left: none;}';
				}
			}
		} else {
			if (isset($atts['tabular_table_advanced_styling'])) {
				$table_advanced = $atts['tabular_table_advanced_styling'];
				// heading styling
				if (isset($table_advanced['heading_typography'])) {
					$heading_advanced_styles = the_core_get_shortcode_advanced_styles($table_advanced['heading_typography'], array('return_color' => true));
					if (!empty($heading_advanced_styles['styles'])) {
						$styling .= $id . '.fw-table .heading-row th.table-col-default{' . $heading_advanced_styles['styles'] . '}';
					}
					// responsive heading styling
					$heading_responsive_styles = the_core_responsive_heading_styles(array('styles' => $table_advanced['heading_typography'], 'selector' => $id . '.fw-table .heading-row th.table-col-default'));
					if (!empty($heading_responsive_styles)) $styling .= '@media(max-width:767px){' . $heading_responsive_styles . '}';
				}

				// heading description
				if (isset($table_advanced['description_heading_typography'])) {
					$heading_description_advanced_styles = the_core_get_shortcode_advanced_styles($table_advanced['description_heading_typography'], array('return_color' => true));
					if (!empty($heading_description_advanced_styles['styles'])) {
						$styling .= $id . '.fw-table .heading-row th.table-col-desc{' . $heading_description_advanced_styles['styles'] . '}';
					}
					// responsive heading description styling
					$heading_description_responsive_styles = the_core_responsive_heading_styles(array('styles' => $table_advanced['description_heading_typography'], 'selector' => $id . '.fw-table .heading-row th.table-col-desc'));
					if (!empty($heading_description_responsive_styles)) $styling .= '@media(max-width:767px){' . $heading_description_responsive_styles . '}';
				}

				// default_typography
				if (isset($table_advanced['default_typography'])) {
					$default_text_advanced_styles = the_core_get_shortcode_advanced_styles($table_advanced['default_typography'], array('return_color' => true));
					if (!empty($default_text_advanced_styles['styles'])) {
						$styling .= $id . '.fw-table table > tbody > tr > td{' . $default_text_advanced_styles['styles'] . '}';
					}
					// responsive default text styling
					$default_text_responsive_styles = the_core_responsive_heading_styles(array('styles' => $table_advanced['default_typography'], 'selector' => $id . '.fw-table table > tbody > tr > td'));
					if (!empty($default_text_responsive_styles)) $styling .= '@media(max-width:767px){' . $default_text_responsive_styles . '}';
				}

				// default description text advanced styling
				if (isset($table_advanced['description_typography'])) {
					$default_description_advanced_styles = the_core_get_shortcode_advanced_styles($table_advanced['description_typography'], array('return_color' => true));
					if (!empty($default_description_advanced_styles['styles'])) {
						$styling .= $id . '.fw-table th.table-col-desc{' . $default_description_advanced_styles['styles'] . '}';
					}
					// responsive description text styling
					$description_text_responsive_styles = the_core_responsive_heading_styles(array('styles' => $table_advanced['description_typography'], 'selector' => $id . '.fw-table th.table-col-desc'));
					if (!empty($description_text_responsive_styles)) $styling .= '@media(max-width:767px){' . $description_text_responsive_styles . '}';
				}

				// heading background
				if (isset($table_advanced['heading_bg'])) {
					$heading_bg_style = the_core_get_color_palette_color_and_class($table_advanced['heading_bg'], array('return_color' => true));
					if (!empty($heading_bg_style['color'])) {
						$styling .= $id . '.fw-table .heading-row th.table-col-default{background-color:' . $heading_bg_style['color'] . '}';
					}
				}

				// description heading background
				if (isset($table_advanced['description_heading_bg'])) {
					$description_heading_bg_style = the_core_get_color_palette_color_and_class($table_advanced['description_heading_bg'], array('return_color' => true));
					if (!empty($description_heading_bg_style['color'])) {
						$styling .= $id . '.fw-table .heading-row th.table-col-desc{background-color:' . $description_heading_bg_style['color'] . ';}';
					}
				}

				// default background
				if (isset($table_advanced['default_bg'])) {
					$default_bg_style = the_core_get_color_palette_color_and_class($table_advanced['default_bg'], array('return_color' => true));
					if (!empty($default_bg_style['color'])) {
						$styling .= $id . '.fw-table table > tbody > tr > td{background-color:' . $default_bg_style['color'] . ';}';
					}
				}

				// description default background
				if (isset($table_advanced['description_bg'])) {
					$description_bg_style = the_core_get_color_palette_color_and_class($table_advanced['description_bg'], array('return_color' => true));
					if (!empty($description_bg_style['color'])) {
						$styling .= $id . '.fw-table th.table-col-desc{background-color:' . $description_bg_style['color'] . ';}';
					}
				}

				// table border
				if ($table_advanced['border_group']['selected'] == 'yes') {
					$border_table_size = (!empty($table_advanced['border_group']['yes']['border_size'])) ? (int)esc_attr($table_advanced['border_group']['yes']['border_size']) : 1;
					$border_table_color = the_core_get_color_palette_color_and_class($table_advanced['border_group']['yes']['border_color'], array('return_color' => true));
					if (!empty($border_table_color['color'])) {
						$border_table = 'border:' . $border_table_size . 'px solid ' . $border_table_color['color'] . ';';
					} else {
						$border_table = 'border:' . $border_table_size . 'px solid;';
					}

					$styling .= $id . '.fw-table-bordered table > thead > tr > th,
						' . $id . '.fw-table-bordered table > tbody > tr > th,
						' . $id . '.fw-table-bordered table > tbody > tr > td{' . $border_table . '}';
				} else {
					$styling .= $id . '.fw-table-bordered table > thead > tr > th,
						' . $id . '.fw-table-bordered table > tbody > tr > th,
						' . $id . '.fw-table-bordered table > tbody > tr > td,
						' . $id . '.fw-table-bordered table{border:none;}';
				}
			}
		}

		if (empty($styling)) {
			return;
		}

		wp_add_inline_style(
			'fw-theme-style',
			$styling
		);
	}

	add_action(
		'fw_ext_shortcodes_enqueue_static:table',
		'_the_core_action_shortcode_table_enqueue_dynamic_css'
	);
endif;


if (!function_exists('_the_core_action_shortcode_slideshow_enqueue_dynamic_css')):
	/**
	 * @internal
	 *
	 * @param array $data
	 */
	function _the_core_action_shortcode_slideshow_enqueue_dynamic_css($data)
	{
		$shortcode = 'slideshow';
		$atts = shortcode_parse_atts($data['atts_string']);

		/**
		 * Decode attributes
		 * ( The below weird code is because of this https://github.com/ThemeFuse/Unyson/issues/469 )
		 */
		$atts = fw_ext_shortcodes_decode_attr($atts, $shortcode, $data['post']->ID);

		$final_styles = '';
		if (isset($atts['title_advanced_styling']['title'])) {
			// title advanced styling
			$title_advanced_styling = the_core_get_shortcode_advanced_styles($atts['title_advanced_styling']['title'], array('return_color' => true));
			if (!empty($title_advanced_styling['styles'])) $final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .fw-slider-caption {' . $title_advanced_styling['styles'] . '}';
			// responsive subtitle styling
			$title_responsive_styles = the_core_responsive_heading_styles(array('styles' => $atts['title_advanced_styling']['title'], 'selector' => '.tf-sh-' . $atts['unique_id'] . ' .fw-slider-caption'));
			if (!empty($title_responsive_styles)) $final_styles .= '@media(max-width:767px){' . $title_responsive_styles . '}';
		}

		if (empty($final_styles)) {
			return;
		}

		wp_add_inline_style(
			'fw-theme-style',
			$final_styles
		);
	}

	add_action(
		'fw_ext_shortcodes_enqueue_static:slideshow',
		'_the_core_action_shortcode_slideshow_enqueue_dynamic_css'
	);
endif;


if (!function_exists('_the_core_action_shortcode_media_video_enqueue_dynamic_css')):
	/**
	 * @internal
	 *
	 * @param array $data
	 */
	function _the_core_action_shortcode_media_video_enqueue_dynamic_css($data)
	{
		$shortcode = 'media_video';
		$atts = shortcode_parse_atts($data['atts_string']);

		/**
		 * Decode attributes
		 * ( The below weird code is because of this https://github.com/ThemeFuse/Unyson/issues/469 )
		 */
		$atts = fw_ext_shortcodes_decode_attr($atts, $shortcode, $data['post']->ID);

		$final_styles = '';
		if (isset($atts['frame']['selected']) && $atts['frame']['selected'] == 'yes') {
			$final_styles .= '.tf-sh-' . $atts['unique_id'] . ' iframe, .tf-sh-' . $atts['unique_id'] . ' .wp-video { border-style: solid;';
			if (!empty($atts['frame']['yes']['border_size'])) $final_styles .= ' border-width: ' . (int)$atts['frame']['yes']['border_size'] . 'px;';
			$border_color = the_core_get_color_palette_color_and_class($atts['frame']['yes']['border_color'], array('return_color' => true));
			if (!empty($border_color['color'])) $final_styles .= ' border-color: ' . $border_color['color'] . ';';
			$final_styles .= '}';
		}

		if (empty($final_styles)) {
			return;
		}

		wp_add_inline_style(
			'fw-theme-style',
			$final_styles
		);
	}

	add_action(
		'fw_ext_shortcodes_enqueue_static:media_video',
		'_the_core_action_shortcode_media_video_enqueue_dynamic_css'
	);
endif;


if (!function_exists('_the_core_action_shortcode_tabs_enqueue_dynamic_css')):
	/**
	 * @internal
	 * @param array $data
	 */
	function _the_core_action_shortcode_tabs_enqueue_dynamic_css($data)
	{
		$shortcode = 'tabs';
		$atts = shortcode_parse_atts($data['atts_string']);

		/**
		 * Decode attributes
		 * ( The below weird code is because of this https://github.com/ThemeFuse/Unyson/issues/469 )
		 */
		$atts = fw_ext_shortcodes_decode_attr($atts, $shortcode, $data['post']->ID);

		$tabs_picker = $atts['tabs_position_picker'];
		$id = '.tf-sh-' . $atts['unique_id'];
		$styling = '';

		//get paddings
		$padding_top = (isset($atts['padding_top']) && !empty($atts['padding_top'])) ? 'padding-top:' . (int)esc_attr($atts['padding_top']) . 'px;' : '';
		$padding_right = (isset($atts['padding_right']) && !empty($atts['padding_right'])) ? 'padding-right:' . (int)esc_attr($atts['padding_right']) . 'px;' : '';
		$padding_bottom = (isset($atts['padding_bottom']) && !empty($atts['padding_bottom'])) ? 'padding-bottom:' . (int)esc_attr($atts['padding_bottom']) . 'px;' : '';
		$padding_left = (isset($atts['padding_left']) && !empty($atts['padding_left'])) ? 'padding-left:' . (int)esc_attr($atts['padding_left']) . 'px;' : '';

		if (!empty($padding_right) || !empty($padding_left) || !empty($padding_top) || !empty($padding_bottom)) {
			$styling .= '.tab-content > .tab-pane{' . $padding_right . $padding_left . $padding_bottom . $padding_top . '}';
		}

		$tabs = $atts['tabs_advanced_styling'];

		//if is tab one or two
		if ($tabs_picker['tabs_type'] != 'three' && $tabs_picker['tabs_type'] != 'four') {
			//active_tab_bg
			if (isset($tabs['active_tab_bg'])) {
				if ($tabs['active_tab_bg']['background'] != 'none') {
					$active_tab_bg = the_core_get_color_palette_color_and_class($tabs['active_tab_bg']['color']['background_color'], array('return_color' => true));

					if (!empty($active_tab_bg['color'])) {
						$styling .= $id . '.fw-tabs-framed .nav-tabs > li.active > a{background-color:' . $active_tab_bg['color'] . '}';
						$styling .= $id . '.fw-tabs-framed .tab-content {background-color:' . $active_tab_bg['color'] . '}';
					}
				}
			}
			//inactive_tab_bg
			if (isset($tabs['inactive_tab_bg'])) {
				if ($tabs['inactive_tab_bg']['background'] != 'none') {
					$inactive_tab_bg = the_core_get_color_palette_color_and_class($tabs['inactive_tab_bg']['color']['background_color'], array('return_color' => true));

					if (!empty($inactive_tab_bg['color']))
						$styling .= $id . '.fw-tabs-framed .nav-tabs > li > a{background-color:' . $inactive_tab_bg['color'] . '}';
				}
			}

			//border
			if (isset($tabs['border_group']) && $tabs['border_group']['image_boxed'] == 'imagebox-boxed') {
				$border = $tabs['border_group']['imagebox-boxed'];

				//border size
				$border_size = (!empty($border['border_size'])) ? (int)esc_attr($border['border_size']) : '';
				if (!empty($border_size)) {
					$intermediar_border_size = $border_size;
					if ($border_size % 2 != 0) $intermediar_border_size = $border_size + 1;
					//$styling .= $id.'.fw-tabs-framed .nav-tabs > li{  margin-bottom: -'.$intermediar_border_size.'px;}';
				}

				//border radius
				if (!empty($border['border_radius'])) {
					if ($tabs_picker['tabs_type'] == 'two') {
						if (is_rtl()) {
							$border_radius_bottom = 'border-radius:' . (int)esc_attr($border['border_radius']) . 'px 0 ' . (int)esc_attr($border['border_radius']) . 'px ' . (int)esc_attr($border['border_radius']) . 'px;';
							$border_radius_top = 'border-radius: 0 ' . (int)esc_attr($border['border_radius']) . 'px ' . (int)esc_attr($border['border_radius']) . 'px 0;';
						} else {
							$border_radius_bottom = 'border-radius:0 ' . (int)esc_attr($border['border_radius']) . 'px ' . (int)esc_attr($border['border_radius']) . 'px ' . (int)esc_attr($border['border_radius']) . 'px;';
							$border_radius_top = 'border-radius:' . (int)esc_attr($border['border_radius']) . 'px 0 0 ' . (int)esc_attr($border['border_radius']) . 'px;';
						}
					} else {
						if (isset($atts['tabs_position_picker'][$tabs_picker['tabs_type']]['tabs_justified']) && $atts['tabs_position_picker'][$tabs_picker['tabs_type']]['tabs_justified'] == 'nav-justified') {
							// if tabs is justified
							$border_radius_bottom = 'border-radius:0 0 ' . (int)esc_attr($border['border_radius']) . 'px ' . (int)esc_attr($border['border_radius']) . 'px;';
							$border_radius_top = 'border-radius:' . (int)esc_attr($border['border_radius']) . 'px ' . (int)esc_attr($border['border_radius']) . 'px 0 0;';
						} else {
							if (is_rtl()) {
								$border_radius_bottom = 'border-radius: ' . (int)esc_attr($border['border_radius']) . 'px 0 ' . (int)esc_attr($border['border_radius']) . 'px ' . (int)esc_attr($border['border_radius']) . 'px;';
								$border_radius_top = 'border-radius:' . (int)esc_attr($border['border_radius']) . 'px ' . (int)esc_attr($border['border_radius']) . 'px 0 0;';
							} else {
								$border_radius_bottom = 'border-radius:0 ' . (int)esc_attr($border['border_radius']) . 'px ' . (int)esc_attr($border['border_radius']) . 'px ' . (int)esc_attr($border['border_radius']) . 'px;';
								$border_radius_top = 'border-radius:' . (int)esc_attr($border['border_radius']) . 'px ' . (int)esc_attr($border['border_radius']) . 'px 0 0;';
							}
						}
					}
				} else {
					$border_radius_bottom = $border_radius_top = 'border-radius:0';
				}

				//get border color
				$border_color = the_core_get_color_palette_color_and_class($border['border_color'], array('return_color' => true));

				//get tabs borders
				if (!empty($border_color['color']) && !empty($border_size)) {
					$border_right = 'border-right:' . $border_size . 'px solid ' . $border_color['color'] . ';';
					$border_top = 'border-top:' . $border_size . 'px solid ' . $border_color['color'] . ';';
					$border_left = 'border-left:' . $border_size . 'px solid ' . $border_color['color'] . ';';
					$border_bottom = 'border-bottom:' . $border_size . 'px solid ' . $border_color['color'] . ';';
				} elseif (!empty($border_size)) {
					$border_right = 'border-right:' . $border_size . 'px solid;';
					$border_top = 'border-top:' . $border_size . 'px solid;';
					$border_left = 'border-left:' . $border_size . 'px solid;';
					$border_bottom = 'border-bottom:' . $border_size . 'px solid;';
				} else
					$border_right = $border_top = $border_left = $border_bottom = '';

				// for border bottom on tabs
				if (!empty($active_tab_bg['color'])) {
					$bg_color_framed = $active_tab_bg['color'];
				} else {
					$bg_color_framed = '#fff';
				}

				if ($tabs_picker['tabs_type'] == 'two') {
					if (is_rtl()) {
						$styling .= $id . '.fw-tabs-framed .nav-tabs > li.active a{ margin-left: -' . $border_size . 'px; margin-right: 0;}';
					} else {
						$styling .= $id . '.fw-tabs-framed .nav-tabs > li.active a{ margin-right: -' . $border_size . 'px;}';
					}
				} else {
					$styling .= $id . '.fw-tabs-framed .nav-tabs > li a:before{ height: ' . $border_size . 'px; ' . $border_right . ' ' . $border_left . ' left: -' . $border_size . 'px; right: -' . $border_size . 'px; bottom: -' . $border_size . 'px; background:' . $border_color['color'] . '; }';
					$styling .= $id . '.fw-tabs-framed .nav-tabs > li.active a:before{' . $border_right . ' ' . $border_left . '  background:' . $bg_color_framed . ';}';
				}

				if (!empty($border_right) || !empty($border_top) || !empty($border_left) || !empty($border_bottom)) {
					if ($tabs_picker['tabs_type'] == 'two') {
						if (is_rtl()) {
							$styling .= $id . '.fw-tabs-framed .nav-tabs > li > a,
								' . $id . '.fw-tabs-framed .nav-tabs > li.active > a,
								' . $id . '.fw-tabs-framed .nav-tabs > li.active > a:hover,
								' . $id . '.fw-tabs-framed .nav-tabs > li.active > a:focus{' . $border_bottom . $border_top . $border_right . $border_radius_top . '}
								' . $id . '.fw-tabs-framed .tab-content{' . $border_right . $border_bottom . $border_left . $border_top . $border_radius_bottom . '}
								' . $id . '.fw-tabs-framed .nav-tabs{border:none;}';
						} else {
							$styling .= $id . '.fw-tabs-framed .nav-tabs > li > a,
								' . $id . '.fw-tabs-framed .nav-tabs > li.active > a,
								' . $id . '.fw-tabs-framed .nav-tabs > li.active > a:hover,
								' . $id . '.fw-tabs-framed .nav-tabs > li.active > a:focus{' . $border_bottom . $border_top . $border_left . $border_radius_top . '}
								' . $id . '.fw-tabs-framed .tab-content{' . $border_right . $border_bottom . $border_left . $border_top . $border_radius_bottom . '}
								' . $id . '.fw-tabs-framed .nav-tabs{border:none;}';
						}
					} else {
						$styling .= $id . '.fw-tabs-framed .nav-tabs > li > a,
						' . $id . '.fw-tabs-framed .nav-tabs > li.active > a,
						' . $id . '.fw-tabs-framed .nav-tabs > li.active > a:hover,
						' . $id . '.fw-tabs-framed .nav-tabs > li.active > a:focus{' . $border_right . $border_top . $border_left . $border_radius_top . '}
						' . $id . '.fw-tabs-framed .tab-content{' . $border_right . $border_bottom . $border_left . $border_top . $border_radius_bottom . '}
						' . $id . '.fw-tabs-framed .nav-tabs{border:none;}';
					}
				}
			}
		} else {
			//separator settings
			$separator_color_style = '';

			//if is tabs type 3
			if ($tabs_picker['tabs_type'] == 'three') {
				$separator = $tabs_picker['three']['separator_advanced_styling'];

				if ($tabs_picker['three']['separator'] == 'no') {
					$styling .= $id . '.fw-tabs-minimal .nav-tabs > li.active > a,
						' . $id . '.fw-tabs-minimal .nav-tabs > li.active > a:hover,
						' . $id . '.fw-tabs-minimal .nav-tabs > li.active > a:focus,
						' . $id . '.fw-tabs-minimal .nav-tabs,
						' . $id . '.fw-tabs-minimal .tab-content{border:none;}';
				} else {
					$separator_size = !empty($separator['separator_size']) ? (int)esc_attr($separator['separator_size']) : '';
					$separator_color = the_core_get_color_palette_color_and_class($separator['separator_color'], array('return_color' => true));

					if (!empty($separator_color['color']))
						$separator_color_style = 'border-color:' . $separator_color['color'] . ';';

					//if exists color and size
					if (!empty($separator_size) && !empty($separator_color_style))
						$styling .= $id . '.fw-tabs-minimal .nav-tabs{border-width:' . $separator_size . 'px;' . $separator_color_style . '}';
					//if exist color
					elseif (empty($separator_size) && !empty($separator_color_style))
						$styling .= $id . '.fw-tabs-minimal .nav-tabs{' . $separator_color_style . '}';


					//if exist size
					if (!empty($separator_size))
						$styling .= $id . '.fw-tabs-minimal .nav-tabs > li.active > a,
							' . $id . '.fw-tabs-minimal .nav-tabs > li.active > a:hover,
							' . $id . '.fw-tabs-minimal .nav-tabs > li.active > a:focus{border-width:' . $separator_size . 'px;}
							' . $id . '.fw-tabs-minimal .nav-tabs > li > a,
							' . $id . '.fw-tabs-minimal .nav-tabs > li > a:hover,
							' . $id . '.fw-tabs-minimal .nav-tabs > li > a:focus{margin-bottom:-' . $separator_size . 'px;}
							' . $id . '.fw-tabs-minimal .nav-tabs{border-width:' . $separator_size . 'px;}';
				}

			} else {
				//if is tabs type 4
				$separator = $tabs_picker['four']['separator_advanced_styling'];

				if ($tabs_picker['four']['separator'] == 'no') {
					$styling .= $id . '.fw-tabs-left.fw-tabs-minimal .nav-tabs > li.active > a,
							' . $id . '.fw-tabs-left.fw-tabs-minimal .nav-tabs > li.active > a:hover,
							' . $id . '.fw-tabs-left.fw-tabs-minimal .nav-tabs > li.active > a:focus,
							' . $id . '.fw-tabs-left.fw-tabs-minimal .nav-tabs,
							' . $id . '.fw-tabs-left.fw-tabs-minimal .tab-content{border:none;}';
				} else {
					$separator_size = !empty($separator['separator_size']) ? (int)esc_attr($separator['separator_size']) : '';
					$separator_color = the_core_get_color_palette_color_and_class($separator['separator_color'], array('return_color' => true));

					if (!empty($separator_color['color']))
						$separator_color_style = 'border-color:' . $separator_color['color'] . ';';

					//if exists color and size
					if (!empty($separator_size) && !empty($separator_color_style)) {
						if (is_rtl()) {
							$styling .= $id . '.fw-tabs-left.fw-tabs-minimal .nav-tabs{border-width:' . $separator_size . 'px;' . $separator_color_style . '}
								' . $id . '.fw-tabs-left.fw-tabs-minimal .tab-content{border-right:none;}';
						} else {
							$styling .= $id . '.fw-tabs-left.fw-tabs-minimal .nav-tabs{border-width:' . $separator_size . 'px;' . $separator_color_style . '}
								' . $id . '.fw-tabs-left.fw-tabs-minimal .tab-content{border-left:none;}';
						}
					} //if exist color
					elseif (empty($separator_size) && !empty($separator_color_style))
						$styling .= $id . '.fw-tabs-left.fw-tabs-minimal .nav-tabs{' . $separator_color_style . '}';


					//if exist size
					if (!empty($separator_size)) {
						if (is_rtl()) {
							$styling .= $id . '.fw-tabs-left.fw-tabs-minimal .nav-tabs > li.active > a,
								' . $id . '.fw-tabs-left.fw-tabs-minimal .nav-tabs > li.active > a:hover,
								' . $id . '.fw-tabs-left.fw-tabs-minimal .nav-tabs > li.active > a:focus{border-width:' . $separator_size . 'px;}
								' . $id . '.fw-tabs-left.fw-tabs-minimal .nav-tabs > li > a,
								' . $id . '.fw-tabs-left.fw-tabs-minimal .nav-tabs > li > a:hover,
								' . $id . '.fw-tabs-left.fw-tabs-minimal .nav-tabs > li > a:focus{margin-left:-' . $separator_size . 'px;}
								@media(max-width: 767px) {' . $id . '.fw-tabs-left.fw-tabs-minimal .nav-tabs > li > a {margin-bottom:-' . $separator_size . 'px;} }
								' . $id . '.fw-tabs-left.fw-tabs-minimal .nav-tabs{border-right:' . $separator_size . 'px; }
								' . $id . '.fw-tabs-left.fw-tabs-minimal .tab-content{border-left: none;}';
						} else {
							$styling .= $id . '.fw-tabs-left.fw-tabs-minimal .nav-tabs > li.active > a,
								' . $id . '.fw-tabs-left.fw-tabs-minimal .nav-tabs > li.active > a:hover,
								' . $id . '.fw-tabs-left.fw-tabs-minimal .nav-tabs > li.active > a:focus{border-width:' . $separator_size . 'px;}
								' . $id . '.fw-tabs-left.fw-tabs-minimal .nav-tabs > li > a,
								' . $id . '.fw-tabs-left.fw-tabs-minimal .nav-tabs > li > a:hover,
								' . $id . '.fw-tabs-left.fw-tabs-minimal .nav-tabs > li > a:focus{margin-right:-' . $separator_size . 'px;}
								@media(max-width: 767px) {' . $id . '.fw-tabs-left.fw-tabs-minimal .nav-tabs > li > a {margin-bottom:-' . $separator_size . 'px;} }
								' . $id . '.fw-tabs-left.fw-tabs-minimal .nav-tabs{border-width:' . $separator_size . 'px;}
								' . $id . '.fw-tabs-left.fw-tabs-minimal .tab-content{border-left:none;}';
						}
					}
				}
			}
		}

		//advanced settings
		if (isset($atts['tabs_advanced_styling'])) {
			$tabs = $atts['tabs_advanced_styling'];

			//tab title
			if (isset($tabs['tab_title'])) {
				$tab_title_advanced_styles = the_core_get_shortcode_advanced_styles($tabs['tab_title'], array('return_color' => true));
				$tab_title_styles = $tab_title_advanced_styles['styles'];

				if (!empty($tab_title_styles)) {
					if ($tabs_picker['tabs_type'] == 'three') {
						$styling .= $id . '.fw-tabs-minimal .nav-tabs > li > a {' . $tab_title_styles . '}';
						$selector = $id . '.fw-tabs-minimal .nav-tabs > li > a';
					} elseif ($tabs_picker['tabs_type'] == 'four') {
						$styling .= $id . '.fw-tabs-left.fw-tabs-minimal .nav-tabs > li > a {' . $tab_title_styles . '}';
						$selector = $id . '.fw-tabs-left.fw-tabs-minimal .nav-tabs > li > a';
					} else {
						$styling .= $id . '.fw-tabs-framed .nav-tabs > li > a{' . $tab_title_styles . '}';
						$selector = $id . '.fw-tabs-framed .nav-tabs > li > a';
					}
					// responsive tab title styling
					$tab_title_responsive_styles = the_core_responsive_heading_styles(array('styles' => $tabs['tab_title'], 'selector' => $selector));
					if (!empty($tab_title_responsive_styles)) $styling .= '@media(max-width:767px){' . $tab_title_responsive_styles . '}';
				}
			}
			//tab active title color
			if (isset($tabs['active_tab_title_color'])) {
				$active_tab_title_color = the_core_get_color_palette_color_and_class($tabs['active_tab_title_color'], array('return_color' => true));

				if (!empty($active_tab_title_color['color'])) {
					if ($tabs_picker['tabs_type'] == 'three') {
						$styling .= $id . '.fw-tabs-minimal .nav-tabs > li.active > a,
							' . $id . '.fw-tabs-minimal .nav-tabs > li.active > a:hover,
							' . $id . '.fw-tabs-minimal .nav-tabs > li.active > a:focus{color:' . $active_tab_title_color['color'] . ';  border-bottom: ' . $separator_size . 'px solid ' . $active_tab_title_color['color'] . ';}
							' . $id . '.fw-tabs-minimal .nav-tabs > li > a:hover,
							' . $id . '.fw-tabs-minimal .nav-tabs > li > a:focus{color:' . $active_tab_title_color['color'] . ';}';
					} elseif ($tabs_picker['tabs_type'] == 'four') {
						if (is_rtl()) {
							$styling .= $id . '.fw-tabs-left.fw-tabs-minimal .nav-tabs > li.active > a,
							' . $id . '.fw-tabs-left.fw-tabs-minimal .nav-tabs > li.active > a:hover,
							' . $id . '.fw-tabs-left.fw-tabs-minimal .nav-tabs > li.active > a:focus{color:' . $active_tab_title_color['color'] . ';  border-left: ' . $separator_size . 'px solid ' . $active_tab_title_color['color'] . '; margin-right: 0; margin-left: -' . $separator_size . 'px; border-right: none;}
							' . $id . '.fw-tabs-left.fw-tabs-minimal .nav-tabs > li > a:hover,
							' . $id . '.fw-tabs-left.fw-tabs-minimal .nav-tabs > li > a:focus{color:' . $active_tab_title_color['color'] . ';}';
						} else {
							if ( !empty($separator_size) ) {
								$styling .= $id . '.fw-tabs-left.fw-tabs-minimal .nav-tabs > li.active > a,
							' . $id . '.fw-tabs-left.fw-tabs-minimal .nav-tabs > li.active > a:hover,
							' . $id . '.fw-tabs-left.fw-tabs-minimal .nav-tabs > li.active > a:focus{color:' . $active_tab_title_color['color'] . '; border-right: ' . $separator_size . 'px solid ' . $active_tab_title_color['color'] . ';}
							' . $id . '.fw-tabs-left.fw-tabs-minimal .nav-tabs > li > a:hover,
							' . $id . '.fw-tabs-left.fw-tabs-minimal .nav-tabs > li > a:focus{color:' . $active_tab_title_color['color'] . ';}';
							}
						}
					} else {
						$styling .= $id . '.fw-tabs-framed .nav-tabs > li.active > a,
							' . $id . '.fw-tabs-framed .nav-tabs > li.active > a:hover,
							' . $id . '.fw-tabs-framed .nav-tabs > li.active > a:focus,
							' . $id . '.fw-tabs-framed .nav-tabs > li > a:hover,
							' . $id . '.fw-tabs-framed .nav-tabs > li > a:focus{color:' . $active_tab_title_color['color'] . '}';
					}

				}

			}
			//tab_content_title
			if (isset($tabs['tab_content_title'])) {
				$tab_content_title_advanced_styles = the_core_get_shortcode_advanced_styles($tabs['tab_content_title'], array('return_color' => true));
				$tab_content_title_styles = $tab_content_title_advanced_styles['styles'];
				if (!empty($tab_content_title_styles)) $styling .= $id . ' .tab-content-title{' . $tab_content_title_styles . '}';
				// responsive tab content title styling
				$tab_content_title_responsive_styles = the_core_responsive_heading_styles(array('styles' => $tabs['tab_content_title'], 'selector' => $id . ' .tab-content-title'));
				if (!empty($tab_content_title_responsive_styles)) $styling .= '@media(max-width:767px){' . $tab_content_title_responsive_styles . '}';
			}
			//tab text
			if (isset($tabs['tab_text'])) {
				$tab_text_advanced_styles = the_core_get_shortcode_advanced_styles($tabs['tab_text'], array('return_color' => true));
				$tab_text_styles = $tab_text_advanced_styles['styles'];
				if (!empty($tab_text_styles)) $styling .= $id . ' .tab-content > .tab-pane{' . $tab_text_styles . '}';
				// responsive tab text styling
				$tab_text_responsive_styles = the_core_responsive_heading_styles(array('styles' => $tabs['tab_text'], 'selector' => $id . ' .tab-content > .tab-pane'));
				if (!empty($tab_text_responsive_styles)) $styling .= '@media(max-width:767px){' . $tab_text_responsive_styles . '}';
			}
			//icon size
			if (isset($tabs['icon_size']) && !empty($tabs['icon_size'])) {
				$styling .= $id . '.fw-tabs .nav-tabs li i{font-size:' . (int)esc_attr($tabs['icon_size']) . 'px;}
					' . $id . '.fw-tabs .nav-tabs li img{width:' . (int)esc_attr($tabs['icon_size']) . 'px; height:' . (int)esc_attr($tabs['icon_size']) . 'px;}';
			}


		}

		wp_add_inline_style(
			'fw-theme-style',
			$styling
		);
	}

	add_action(
		'fw_ext_shortcodes_enqueue_static:tabs',
		'_the_core_action_shortcode_tabs_enqueue_dynamic_css'
	);
endif;


if (!function_exists('_the_core_action_shortcode_slider_enqueue_dynamic_css')):
	/**
	 * @internal
	 *
	 * @param array $data
	 */
	function _the_core_action_shortcode_slider_enqueue_dynamic_css($data)
	{
		$shortcode = 'slider';
		$atts = shortcode_parse_atts($data['atts_string']);

		/**
		 * Decode attributes
		 * ( The below weird code is because of this https://github.com/ThemeFuse/Unyson/issues/469 )
		 */
		$atts = fw_ext_shortcodes_decode_attr($atts, $shortcode, $data['post']->ID);

		if (empty($atts['slider_id'])) return;
		$final_styles = '';
		$slider_options = fw_get_db_post_option($atts['slider_id']);

		if (isset($slider_options['slider']['selected']) && $slider_options['slider']['selected'] == 'image-video-slider') {
			// for slider height
			if (isset($slider_options['custom-settings']['slider_height'])) {
				$final_styles .= '@media(min-width:768px){.tf-sh-' . $slider_options['custom-settings']['unique_id'] . '.fw-image-video-slider .item {height:' . (int)$slider_options['custom-settings']['slider_height'] . 'px;}}';
			}
			// styling for image video slider
			if (isset($slider_options['custom-settings']['advanced_styling']['title'])) {
				// title advanced styling
				$title_advanced_styling = the_core_get_shortcode_advanced_styles($slider_options['custom-settings']['advanced_styling']['title'], array('return_color' => true));
				if (!empty($title_advanced_styling['styles'])) $final_styles .= '.tf-sh-' . $slider_options['custom-settings']['unique_id'] . ' .fw-image-video-slider-title {' . $title_advanced_styling['styles'] . '}';
				// responsive title styling
				$title_responsive_styles = the_core_responsive_heading_styles(array('styles' => $slider_options['custom-settings']['advanced_styling']['title'], 'selector' => '.tf-sh-' . $slider_options['custom-settings']['unique_id'] . ' .fw-image-video-slider-title'));
				if (!empty($title_responsive_styles)) $final_styles .= '@media(max-width:767px){' . $title_responsive_styles . '}';
			}

			if (isset($slider_options['custom-settings']['advanced_styling']['subtitle'])) {
				// subtitle advanced styling
				$subtitle_advanced_styling = the_core_get_shortcode_advanced_styles($slider_options['custom-settings']['advanced_styling']['subtitle'], array('return_color' => true));
				if (!empty($subtitle_advanced_styling['styles'])) $final_styles .= '.tf-sh-' . $slider_options['custom-settings']['unique_id'] . '.fw-image-video-slider .item .fw-text-wrap .fw-image-video-slider-title-after {' . $subtitle_advanced_styling['styles'] . '}';
				// responsive subtitle styling
				$subtitle_responsive_styles = the_core_responsive_heading_styles(array('styles' => $slider_options['custom-settings']['advanced_styling']['subtitle'], 'selector' => '.tf-sh-' . $slider_options['custom-settings']['unique_id'] . '.fw-image-video-slider .item .fw-text-wrap .fw-image-video-slider-title-after'));
				if (!empty($subtitle_responsive_styles)) $final_styles .= '@media(max-width:767px){' . $subtitle_responsive_styles . '}';
			}

			if (isset($slider_options['custom-settings']['advanced_styling']['description'])) {
				// description advanced styling
				$description_advanced_styling = the_core_get_shortcode_advanced_styles($slider_options['custom-settings']['advanced_styling']['description'], array('return_color' => true));
				if (!empty($description_advanced_styling['styles'])) $final_styles .= '.tf-sh-' . $slider_options['custom-settings']['unique_id'] . '.fw-image-video-slider .item .fw-text-wrap .fw-image-video-slider-text {' . $description_advanced_styling['styles'] . '}';
				// responsive description styling
				$description_responsive_styles = the_core_responsive_heading_styles(array('styles' => $slider_options['custom-settings']['advanced_styling']['description'], 'selector' => '.tf-sh-' . $slider_options['custom-settings']['unique_id'] . '.fw-image-video-slider .item .fw-text-wrap .fw-image-video-slider-text'));
				if (!empty($description_responsive_styles)) $final_styles .= '@media(max-width:767px){' . $description_responsive_styles . '}';
			}

			// button options
			$label_advanced_styling = the_core_get_shortcode_advanced_styles($slider_options['custom-settings']['advanced_styling']['button_options']['text'], array('return_color' => true));
			if (!empty($label_advanced_styling['styles'])) $final_styles .= '.tf-sh-' . $slider_options['custom-settings']['unique_id'] . ' .fw-btn span {' . $label_advanced_styling['styles'] . '}';
			// responsive label styling
			$label_responsive_styles = the_core_responsive_heading_styles(array('styles' => $slider_options['custom-settings']['advanced_styling']['button_options']['text'], 'selector' => '.tf-sh-' . $slider_options['custom-settings']['unique_id'] . ' .fw-btn span'));
			if (!empty($label_responsive_styles)) $final_styles .= '@media(max-width:767px){' . $label_responsive_styles . '}';

			// label text hover
			$hover_text_color = the_core_get_color_palette_color_and_class($slider_options['custom-settings']['advanced_styling']['button_options']['hover_text_color'], array('return_color' => true));
			if (!empty($hover_text_color['color'])) $final_styles .= '.tf-sh-' . $slider_options['custom-settings']['unique_id'] . ' .fw-btn:hover span' . '{ color: ' . $hover_text_color['color'] . ' !important }';
			if (isset($slider_options['custom-settings']['advanced_styling']['button_options']['style']['selected'])) {
				if ($slider_options['custom-settings']['advanced_styling']['button_options']['style']['selected'] == 'fw-btn-3') {
					if (isset($slider_options['custom-settings']['advanced_styling']['button_options']['style']['fw-btn-3']['border_size']) && !empty($slider_options['custom-settings']['advanced_styling']['button_options']['style']['fw-btn-3']['border_size'])) {
						$final_styles .= '.tf-sh-' . $slider_options['custom-settings']['unique_id'] . ' .fw-btn{ border-top-width: ' . (int)$slider_options['custom-settings']['advanced_styling']['button_options']['style']['fw-btn-3']['border_size'] . 'px; border-bottom-width: ' . (int)$slider_options['custom-settings']['advanced_styling']['button_options']['style']['fw-btn-3']['border_size'] . 'px; }';
					}
					// btn color
					if (isset($slider_options['custom-settings']['advanced_styling']['button_options']['normal_color'])) {
						$normal_color = the_core_get_color_palette_color_and_class($slider_options['custom-settings']['advanced_styling']['button_options']['normal_color'], array('return_color' => true));
						if (!empty($normal_color['color'])) {
							$final_styles .= '.tf-sh-' . $slider_options['custom-settings']['unique_id'] . ' .fw-btn{ border-bottom-color: ' . $normal_color['color'] . '; border-top-color: ' . $normal_color['color'] . ' }';
						}
					}
					// hover color
					if (isset($slider_options['custom-settings']['advanced_styling']['button_options']['hover_color'])) {
						$hover_color = the_core_get_color_palette_color_and_class($slider_options['custom-settings']['advanced_styling']['button_options']['hover_color'], array('return_color' => true));
						if (!empty($hover_color['color'])) {
							$final_styles .= '.tf-sh-' . $slider_options['custom-settings']['unique_id'] . ' .fw-btn:hover, .tf-sh-' . $slider_options['custom-settings']['unique_id'] . ' .fw-btn:focus { background-color: ' . $hover_color['color'] . '; border-bottom-color: ' . $hover_color['color'] . '; border-top-color: ' . $hover_color['color'] . ' }';
						}
					}
				} elseif ($slider_options['custom-settings']['advanced_styling']['button_options']['style']['selected'] == 'fw-btn-2') {
					if (isset($slider_options['custom-settings']['advanced_styling']['button_options']['style']['fw-btn-2']['border_size']) && !empty($slider_options['custom-settings']['advanced_styling']['button_options']['style']['fw-btn-2']['border_size'])) {
						$final_styles .= '.tf-sh-' . $slider_options['custom-settings']['unique_id'] . ' .fw-btn{ border-width: ' . (int)$slider_options['custom-settings']['advanced_styling']['button_options']['style']['fw-btn-2']['border_size'] . 'px; }';
					}
					if (isset($slider_options['custom-settings']['advanced_styling']['button_options']['style']['fw-btn-2']['border_radius']) && !empty($slider_options['custom-settings']['advanced_styling']['button_options']['style']['fw-btn-2']['border_radius'])) {
						$final_styles .= '.tf-sh-' . $slider_options['custom-settings']['unique_id'] . ' .fw-btn{ border-radius: ' . (int)$slider_options['custom-settings']['advanced_styling']['button_options']['style']['fw-btn-2']['border_radius'] . 'px; }';
					}

					// btn color
					if (isset($slider_options['custom-settings']['advanced_styling']['button_options']['normal_color'])) {
						$normal_color = the_core_get_color_palette_color_and_class($slider_options['custom-settings']['advanced_styling']['button_options']['normal_color'], array('return_color' => true));
						if (!empty($normal_color['color'])) {
							$final_styles .= '.tf-sh-' . $slider_options['custom-settings']['unique_id'] . ' .fw-btn{ border-color: ' . $normal_color['color'] . ' }';
						}
					}
					// hover color
					if (isset($slider_options['custom-settings']['advanced_styling']['button_options']['hover_color'])) {
						$hover_color = the_core_get_color_palette_color_and_class($slider_options['custom-settings']['advanced_styling']['button_options']['hover_color'], array('return_color' => true));
						if (!empty($hover_color['color'])) {
							$final_styles .= '.tf-sh-' . $slider_options['custom-settings']['unique_id'] . ' .fw-btn:hover { background-color: ' . $hover_color['color'] . '; border-color: ' . $hover_color['color'] . ' }';
						}
					}
				} elseif ($slider_options['custom-settings']['advanced_styling']['button_options']['style']['selected'] == 'fw-btn-1') {
					if (isset($slider_options['custom-settings']['advanced_styling']['button_options']['style']['fw-btn-1']['border_radius']) && !empty($slider_options['custom-settings']['advanced_styling']['button_options']['style']['fw-btn-1']['border_radius'])) {
						$final_styles .= '.tf-sh-' . $slider_options['custom-settings']['unique_id'] . ' .fw-btn{ border-radius: ' . (int)$slider_options['custom-settings']['advanced_styling']['button_options']['style']['fw-btn-1']['border_radius'] . 'px; }';
					}

					// btn color
					if (isset($slider_options['custom-settings']['advanced_styling']['button_options']['normal_color'])) {
						$normal_color = the_core_get_color_palette_color_and_class($slider_options['custom-settings']['advanced_styling']['button_options']['normal_color'], array('return_color' => true));
						if (!empty($normal_color['color'])) {
							$final_styles .= '.tf-sh-' . $slider_options['custom-settings']['unique_id'] . ' .fw-btn{ background-color: ' . $normal_color['color'] . ' }';
						}
					}
					// hover color
					if (isset($slider_options['custom-settings']['advanced_styling']['button_options']['hover_color'])) {
						$hover_color = the_core_get_color_palette_color_and_class($slider_options['custom-settings']['advanced_styling']['button_options']['hover_color'], array('return_color' => true));
						if (!empty($hover_color['color'])) {
							$final_styles .= '.tf-sh-' . $slider_options['custom-settings']['unique_id'] . ' .fw-btn:hover { background-color: ' . $hover_color['color'] . ' }';
						}
					}

				}
			}
		} elseif (isset($slider_options['slider']['selected']) && $slider_options['slider']['selected'] == 'fade-slider') {
			// for slider height
			if (isset($slider_options['custom-settings']['slider_height'])) {
				$final_styles .= '@media(min-width:768px){.tf-sh-' . $slider_options['custom-settings']['unique_id'] . ' .fw-fade-slider .item {height:' . (int)$slider_options['custom-settings']['slider_height'] . 'px;}}';
			}

			// styling for fade slider
			if (isset($slider_options['custom-settings']['advanced_styling']['title'])) {
				// title advanced styling
				$title_advanced_styling = the_core_get_shortcode_advanced_styles($slider_options['custom-settings']['advanced_styling']['title'], array('return_color' => true));
				if (!empty($title_advanced_styling['styles'])) $final_styles .= '.tf-sh-' . $slider_options['custom-settings']['unique_id'] . ' .fw-fade-slider-title {' . $title_advanced_styling['styles'] . '}';
				// responsive title styling
				$title_responsive_styles = the_core_responsive_heading_styles(array('styles' => $slider_options['custom-settings']['advanced_styling']['title'], 'selector' => '.tf-sh-' . $slider_options['custom-settings']['unique_id'] . ' .fw-fade-slider-title'));
				if (!empty($title_responsive_styles)) $final_styles .= '@media(max-width:767px){' . $title_responsive_styles . '}';
			}

			if (isset($slider_options['custom-settings']['advanced_styling']['description'])) {
				// description advanced styling
				$description_advanced_styling = the_core_get_shortcode_advanced_styles($slider_options['custom-settings']['advanced_styling']['description'], array('return_color' => true));
				if (!empty($description_advanced_styling['styles'])) $final_styles .= '.tf-sh-' . $slider_options['custom-settings']['unique_id'] . ' .fw-fade-slider .item .fw-fade-slide-text-wrap .fw-fade-slider-title-after {' . $description_advanced_styling['styles'] . '}';
				// responsive description styling
				$description_responsive_styles = the_core_responsive_heading_styles(array('styles' => $slider_options['custom-settings']['advanced_styling']['description'], 'selector' => '.tf-sh-' . $slider_options['custom-settings']['unique_id'] . ' .fw-fade-slider .item .fw-fade-slide-text-wrap .fw-fade-slider-title-after'));
				if (!empty($description_responsive_styles)) $final_styles .= '@media(max-width:767px){' . $description_responsive_styles . '}';
			}

			// button options
			$label_advanced_styling = the_core_get_shortcode_advanced_styles($slider_options['custom-settings']['advanced_styling']['button_options']['text'], array('return_color' => true));
			if (!empty($label_advanced_styling['styles'])) $final_styles .= '.tf-sh-' . $slider_options['custom-settings']['unique_id'] . ' .fw-btn span {' . $label_advanced_styling['styles'] . '}';
			// responsive label styling
			$label_responsive_styles = the_core_responsive_heading_styles(array('styles' => $slider_options['custom-settings']['advanced_styling']['button_options']['text'], 'selector' => '.tf-sh-' . $slider_options['custom-settings']['unique_id'] . ' .fw-btn span'));
			if (!empty($label_responsive_styles)) $final_styles .= '@media(max-width:767px){' . $label_responsive_styles . '}';

			// label text hover
			$hover_text_color = the_core_get_color_palette_color_and_class($slider_options['custom-settings']['advanced_styling']['button_options']['hover_text_color'], array('return_color' => true));
			if (!empty($hover_text_color['color'])) $final_styles .= '.tf-sh-' . $slider_options['custom-settings']['unique_id'] . ' .fw-btn:hover span' . '{ color: ' . $hover_text_color['color'] . ' !important }';
			if (isset($slider_options['custom-settings']['advanced_styling']['button_options']['style']['selected'])) {
				if ($slider_options['custom-settings']['advanced_styling']['button_options']['style']['selected'] == 'fw-btn-3') {
					if (isset($slider_options['custom-settings']['advanced_styling']['button_options']['style']['fw-btn-3']['border_size']) && !empty($slider_options['custom-settings']['advanced_styling']['button_options']['style']['fw-btn-3']['border_size'])) {
						$final_styles .= '.tf-sh-' . $slider_options['custom-settings']['unique_id'] . ' .fw-btn{ border-top-width: ' . (int)$slider_options['custom-settings']['advanced_styling']['button_options']['style']['fw-btn-3']['border_size'] . 'px; border-bottom-width: ' . (int)$slider_options['custom-settings']['advanced_styling']['button_options']['style']['fw-btn-3']['border_size'] . 'px; }';
					}
					// btn color
					if (isset($slider_options['custom-settings']['advanced_styling']['button_options']['normal_color'])) {
						$normal_color = the_core_get_color_palette_color_and_class($slider_options['custom-settings']['advanced_styling']['button_options']['normal_color'], array('return_color' => true));
						if (!empty($normal_color['color'])) {
							$final_styles .= '.tf-sh-' . $slider_options['custom-settings']['unique_id'] . ' .fw-btn{ border-bottom-color: ' . $normal_color['color'] . '; border-top-color: ' . $normal_color['color'] . ' }';
						}
					}
					// hover color
					if (isset($slider_options['custom-settings']['advanced_styling']['button_options']['hover_color'])) {
						$hover_color = the_core_get_color_palette_color_and_class($slider_options['custom-settings']['advanced_styling']['button_options']['hover_color'], array('return_color' => true));
						if (!empty($hover_color['color'])) {
							$final_styles .= '.tf-sh-' . $slider_options['custom-settings']['unique_id'] . ' .fw-btn:hover, .tf-sh-' . $slider_options['custom-settings']['unique_id'] . ' .fw-btn:focus { background-color: ' . $hover_color['color'] . '; border-bottom-color: ' . $hover_color['color'] . '; border-top-color: ' . $hover_color['color'] . ' }';
						}
					}
				} elseif ($slider_options['custom-settings']['advanced_styling']['button_options']['style']['selected'] == 'fw-btn-2') {
					if (isset($slider_options['custom-settings']['advanced_styling']['button_options']['style']['fw-btn-2']['border_size']) && !empty($slider_options['custom-settings']['advanced_styling']['button_options']['style']['fw-btn-2']['border_size'])) {
						$final_styles .= '.tf-sh-' . $slider_options['custom-settings']['unique_id'] . ' .fw-btn{ border-width: ' . (int)$slider_options['custom-settings']['advanced_styling']['button_options']['style']['fw-btn-2']['border_size'] . 'px; }';
					}
					if (isset($slider_options['custom-settings']['advanced_styling']['button_options']['style']['fw-btn-2']['border_radius']) && !empty($slider_options['custom-settings']['advanced_styling']['button_options']['style']['fw-btn-2']['border_radius'])) {
						$final_styles .= '.tf-sh-' . $slider_options['custom-settings']['unique_id'] . ' .fw-btn{ border-radius: ' . (int)$slider_options['custom-settings']['advanced_styling']['button_options']['style']['fw-btn-2']['border_radius'] . 'px; }';
					}

					// btn color
					if (isset($slider_options['custom-settings']['advanced_styling']['button_options']['normal_color'])) {
						$normal_color = the_core_get_color_palette_color_and_class($slider_options['custom-settings']['advanced_styling']['button_options']['normal_color'], array('return_color' => true));
						if (!empty($normal_color['color'])) {
							$final_styles .= '.tf-sh-' . $slider_options['custom-settings']['unique_id'] . ' .fw-btn{ border-color: ' . $normal_color['color'] . ' }';
						}
					}
					// hover color
					if (isset($slider_options['custom-settings']['advanced_styling']['button_options']['hover_color'])) {
						$hover_color = the_core_get_color_palette_color_and_class($slider_options['custom-settings']['advanced_styling']['button_options']['hover_color'], array('return_color' => true));
						if (!empty($hover_color['color'])) {
							$final_styles .= '.tf-sh-' . $slider_options['custom-settings']['unique_id'] . ' .fw-btn:hover { background-color: ' . $hover_color['color'] . '; border-color: ' . $hover_color['color'] . ' }';
						}
					}
				} elseif ($slider_options['custom-settings']['advanced_styling']['button_options']['style']['selected'] == 'fw-btn-1') {
					if (isset($slider_options['custom-settings']['advanced_styling']['button_options']['style']['fw-btn-1']['border_radius']) && !empty($slider_options['custom-settings']['advanced_styling']['button_options']['style']['fw-btn-1']['border_radius'])) {
						$final_styles .= '.tf-sh-' . $slider_options['custom-settings']['unique_id'] . ' .fw-btn{ border-radius: ' . (int)$slider_options['custom-settings']['advanced_styling']['button_options']['style']['fw-btn-1']['border_radius'] . 'px; }';
					}

					// btn color
					if (isset($slider_options['custom-settings']['advanced_styling']['button_options']['normal_color'])) {
						$normal_color = the_core_get_color_palette_color_and_class($slider_options['custom-settings']['advanced_styling']['button_options']['normal_color'], array('return_color' => true));
						if (!empty($normal_color['color'])) {
							$final_styles .= '.tf-sh-' . $slider_options['custom-settings']['unique_id'] . ' .fw-btn{ background-color: ' . $normal_color['color'] . ' }';
						}
					}
					// hover color
					if (isset($slider_options['custom-settings']['advanced_styling']['button_options']['hover_color'])) {
						$hover_color = the_core_get_color_palette_color_and_class($slider_options['custom-settings']['advanced_styling']['button_options']['hover_color'], array('return_color' => true));
						if (!empty($hover_color['color'])) {
							$final_styles .= '.tf-sh-' . $slider_options['custom-settings']['unique_id'] . ' .fw-btn:hover { background-color: ' . $hover_color['color'] . ' }';
						}
					}

				}
			}
		} elseif (isset($slider_options['slider']['selected']) && $slider_options['slider']['selected'] == 'easy-slider') {
			// styling for easy slider
			if (isset($slider_options['custom-settings']['advanced_styling']['title'])) {
				// title advanced styling
				$title_advanced_styling = the_core_get_shortcode_advanced_styles($slider_options['custom-settings']['advanced_styling']['title'], array('return_color' => true));
				if (!empty($title_advanced_styling['styles'])) {
					$final_styles .= '.tf-sh-' . $slider_options['custom-settings']['unique_id'] . '.fw-easy-slider .fw-easy-slider-caption .fw-easy-slider-title-clone a {' . $title_advanced_styling['styles'] . '}';
					$final_styles .= '.tf-sh-' . $slider_options['custom-settings']['unique_id'] . '.fw-easy-slider .fw-easy-slider-caption .fw-easy-slider-title-clone a:hover {opacity: 0.8}';
				}
				// responsive title styling
				$title_responsive_styles = the_core_responsive_heading_styles(array('styles' => $slider_options['custom-settings']['advanced_styling']['title'], 'selector' => '.tf-sh-' . $slider_options['custom-settings']['unique_id'] . '.fw-easy-slider .fw-easy-slider-caption .fw-easy-slider-title-clone a'));
				if (!empty($title_responsive_styles)) $final_styles .= '@media(max-width:767px){' . $title_responsive_styles . '}';
			}

			if (isset($slider_options['custom-settings']['advanced_styling']['bg_color'])) {
				$bg_color = the_core_get_color_palette_color_and_class($slider_options['custom-settings']['advanced_styling']['bg_color'], array('return_color' => true));
				if (!empty($bg_color['color'])) $final_styles .= '.tf-sh-' . $slider_options['custom-settings']['unique_id'] . '.fw-easy-slider .fw-easy-slider-caption .fw-easy-slider-caption-inner { background-color: ' . $bg_color['color'] . ' }';
			}
		} elseif (isset($slider_options['slider']['selected']) && $slider_options['slider']['selected'] == 'themefuse-carousel') {
			// styling for themefuse carousel
			if (isset($slider_options['custom-settings']['advanced_styling']['title'])) {
				// title advanced styling
				$title_advanced_styling = the_core_get_shortcode_advanced_styles($slider_options['custom-settings']['advanced_styling']['title'], array('return_color' => true));
				if (!empty($title_advanced_styling['styles'])) $final_styles .= '.tf-sh-' . $slider_options['custom-settings']['unique_id'] . ' .fw-control-title-after {' . $title_advanced_styling['styles'] . '}';
				// responsive title styling
				$title_responsive_styles = the_core_responsive_heading_styles(array('styles' => $slider_options['custom-settings']['advanced_styling']['title'], 'selector' => '.tf-sh-' . $slider_options['custom-settings']['unique_id'] . ' .fw-control-title-after'));
				if (!empty($title_responsive_styles)) $final_styles .= '@media(max-width:767px){' . $title_responsive_styles . '}';
			}

			if (isset($slider_options['custom-settings']['advanced_styling']['subtitle'])) {
				// subtitle advanced styling
				$subtitle_advanced_styling = the_core_get_shortcode_advanced_styles($slider_options['custom-settings']['advanced_styling']['subtitle'], array('return_color' => true));
				if (!empty($subtitle_advanced_styling['styles'])) $final_styles .= '.tf-sh-' . $slider_options['custom-settings']['unique_id'] . '.fw-themefuse-carousel-wrapper .fw-themefuse-carousel .fw-themefuse-carousel-control .fw-control-title-wrap .fw-control-title-before {' . $subtitle_advanced_styling['styles'] . '}';
				// responsive subtitle styling
				$subtitle_responsive_styles = the_core_responsive_heading_styles(array('styles' => $slider_options['custom-settings']['advanced_styling']['subtitle'], 'selector' => '.tf-sh-' . $slider_options['custom-settings']['unique_id'] . '.fw-themefuse-carousel-wrapper .fw-themefuse-carousel .fw-themefuse-carousel-control .fw-control-title-wrap .fw-control-title-before'));
				if (!empty($subtitle_responsive_styles)) $final_styles .= '@media(max-width:767px){' . $subtitle_responsive_styles . '}';
			}

			if (isset($slider_options['custom-settings']['advanced_styling']['title_subtitle_bg'])) {
				// title and subtitle background
				$title_subtitle_bg = the_core_get_color_palette_color_and_class($slider_options['custom-settings']['advanced_styling']['title_subtitle_bg'], array('return_color' => true));
				if (!empty($title_subtitle_bg['color'])) $final_styles .= '.tf-sh-' . $slider_options['custom-settings']['unique_id'] . '.fw-themefuse-carousel-wrapper .fw-themefuse-carousel .fw-themefuse-carousel-control .fw-control-title-wrap { background-color: ' . $title_subtitle_bg['color'] . ' }';
			}

			if (isset($slider_options['custom-settings']['advanced_styling']['description'])) {
				// description advanced styling
				$description_advanced_styling = the_core_get_shortcode_advanced_styles($slider_options['custom-settings']['advanced_styling']['description'], array('return_color' => true));
				if (!empty($description_advanced_styling['styles'])) $final_styles .= '.tf-sh-' . $slider_options['custom-settings']['unique_id'] . '.fw-themefuse-carousel-wrapper .fw-themefuse-carousel .fw-themefuse-carousel-control .fw-control-description {' . $description_advanced_styling['styles'] . '}';
				// responsive description styling
				$description_responsive_styles = the_core_responsive_heading_styles(array('styles' => $slider_options['custom-settings']['advanced_styling']['description'], 'selector' => '.tf-sh-' . $slider_options['custom-settings']['unique_id'] . '.fw-themefuse-carousel-wrapper .fw-themefuse-carousel .fw-themefuse-carousel-control .fw-control-description'));
				if (!empty($description_responsive_styles)) $final_styles .= '@media(max-width:767px){' . $description_responsive_styles . '}';
			}

			if (isset($slider_options['custom-settings']['advanced_styling']['category_title'])) {
				// category title advanced styling
				$category_title_advanced_styling = the_core_get_shortcode_advanced_styles($slider_options['custom-settings']['advanced_styling']['category_title'], array('return_color' => true));
				if (!empty($category_title_advanced_styling['styles'])) {
					$final_styles .= '.tf-sh-' . $slider_options['custom-settings']['unique_id'] . ' .item-title {' . $category_title_advanced_styling['styles'] . '}';
					$final_styles .= '.tf-sh-' . $slider_options['custom-settings']['unique_id'] . ' .item-title:hover {opacity: 0.8}';
				}
				// responsive category title styling
				$category_title_responsive_styles = the_core_responsive_heading_styles(array('styles' => $slider_options['custom-settings']['advanced_styling']['category_title'], 'selector' => '.tf-sh-' . $slider_options['custom-settings']['unique_id'] . ' .item-title'));
				if (!empty($category_title_responsive_styles)) $final_styles .= '@media(max-width:767px){' . $category_title_responsive_styles . '}';
			}

			if (isset($slider_options['custom-settings']['advanced_styling']['projects_number'])) {
				// projects number title advanced styling
				$projects_number_advanced_styling = the_core_get_shortcode_advanced_styles($slider_options['custom-settings']['advanced_styling']['projects_number'], array('return_color' => true));
				if (!empty($projects_number_advanced_styling['styles'])) {
					$final_styles .= '.tf-sh-' . $slider_options['custom-settings']['unique_id'] . '.fw-themefuse-carousel-wrapper .number-project, .tf-sh-' . $slider_options['custom-settings']['unique_id'] . '.fw-themefuse-carousel-wrapper .fw-themefuse-carousel .fw-themefuse-carousel-control .fw-control-nav a{' . $projects_number_advanced_styling['styles'] . '}';
					$final_styles .= '.tf-sh-' . $slider_options['custom-settings']['unique_id'] . '.fw-themefuse-carousel-wrapper .number-project:hover, .tf-sh-' . $slider_options['custom-settings']['unique_id'] . '.fw-themefuse-carousel-wrapper .fw-themefuse-carousel .fw-themefuse-carousel-control .fw-control-nav a:hover{opacity: 0.8;}';
				}
				// responsive projects number styling
				$projects_number_responsive_styles = the_core_responsive_heading_styles(array('styles' => $slider_options['custom-settings']['advanced_styling']['projects_number'], 'selector' => '.tf-sh-' . $slider_options['custom-settings']['unique_id'] . '.fw-themefuse-carousel-wrapper .number-project, .tf-sh-' . $slider_options['custom-settings']['unique_id'] . '.fw-themefuse-carousel-wrapper .fw-themefuse-carousel .fw-themefuse-carousel-control .fw-control-nav a'));
				if (!empty($projects_number_responsive_styles)) $final_styles .= '@media(max-width:767px){' . $projects_number_responsive_styles . '}';
			}
		} elseif (isset($slider_options['slider']['selected']) && $slider_options['slider']['selected'] == 'reload-slider') {
			// slider bg color
			if (isset($slider_options['custom-settings']['background_options']['background']) && $slider_options['custom-settings']['background_options']['background'] != 'none') {
				$slider_bg_color = the_core_get_color_palette_color_and_class($slider_options['custom-settings']['background_options']['color']['background_color'], array('return_color' => true));
				if (!empty($slider_bg_color['color'])) $final_styles .= '.tf-sh-' . $slider_options['custom-settings']['unique_id'] . '.fw-reload-slider{background-color: ' . $slider_bg_color['color'] . ';}';
			}

			// styling for reload slider
			if (isset($slider_options['custom-settings']['advanced_styling']['title'])) {
				// title advanced styling
				$title_advanced_styling = the_core_get_shortcode_advanced_styles($slider_options['custom-settings']['advanced_styling']['title'], array('return_color' => true));
				if (!empty($title_advanced_styling['styles'])) $final_styles .= '.tf-sh-' . $slider_options['custom-settings']['unique_id'] . '.fw-reload-slider ul li .fw-reload-slider-content .fw-reload-slider-title {' . $title_advanced_styling['styles'] . '}';
				// responsive title styling
				$title_responsive_styles = the_core_responsive_heading_styles(array('styles' => $slider_options['custom-settings']['advanced_styling']['title'], 'selector' => '.tf-sh-' . $slider_options['custom-settings']['unique_id'] . '.fw-reload-slider ul li .fw-reload-slider-content .fw-reload-slider-title'));
				if (!empty($title_responsive_styles)) $final_styles .= '@media(max-width:767px){' . $title_responsive_styles . '}';
			}

			if (isset($slider_options['custom-settings']['advanced_styling']['subtitle'])) {
				// subtitle advanced styling
				$subtitle_advanced_styling = the_core_get_shortcode_advanced_styles($slider_options['custom-settings']['advanced_styling']['subtitle'], array('return_color' => true));
				if (!empty($subtitle_advanced_styling['styles'])) $final_styles .= '.tf-sh-' . $slider_options['custom-settings']['unique_id'] . '.fw-reload-slider ul li .fw-reload-slider-content .fw-reload-slider-subtitle {' . $subtitle_advanced_styling['styles'] . '}';
				// responsive subtitle styling
				$subtitle_responsive_styles = the_core_responsive_heading_styles(array('styles' => $slider_options['custom-settings']['advanced_styling']['subtitle'], 'selector' => '.tf-sh-' . $slider_options['custom-settings']['unique_id'] . '.fw-reload-slider ul li .fw-reload-slider-content .fw-reload-slider-subtitle'));
				if (!empty($subtitle_responsive_styles)) $final_styles .= '@media(max-width:767px){' . $subtitle_responsive_styles . '}';
			}

			if (isset($slider_options['custom-settings']['advanced_styling']['description'])) {
				// description advanced styling
				$description_advanced_styling = the_core_get_shortcode_advanced_styles($slider_options['custom-settings']['advanced_styling']['description'], array('return_color' => true));
				if (!empty($description_advanced_styling['styles'])) $final_styles .= '.tf-sh-' . $slider_options['custom-settings']['unique_id'] . ' .fw-reload-slider-description {' . $description_advanced_styling['styles'] . '}';
				// responsive description styling
				$description_responsive_styles = the_core_responsive_heading_styles(array('styles' => $slider_options['custom-settings']['advanced_styling']['description'], 'selector' => '.tf-sh-' . $slider_options['custom-settings']['unique_id'] . ' .fw-reload-slider-description'));
				if (!empty($description_responsive_styles)) $final_styles .= '@media(max-width:767px){' . $description_responsive_styles . '}';

				$description_color = the_core_get_color_palette_color_and_class($slider_options['custom-settings']['advanced_styling']['description']['color-palette'], array('return_color' => true));
				if (!empty($description_color['color'])) {
					$final_styles .= '.tf-sh-' . $slider_options['custom-settings']['unique_id'] . '.fw-reload-slider .fw-reload-slider-controls a{background: ' . $description_color['color'] . '}';
				}
			}

			// button options
			$label_advanced_styling = the_core_get_shortcode_advanced_styles($slider_options['custom-settings']['advanced_styling']['button_options']['text'], array('return_color' => true));
			if (!empty($label_advanced_styling['styles'])) $final_styles .= '.tf-sh-' . $slider_options['custom-settings']['unique_id'] . ' .fw-btn span {' . $label_advanced_styling['styles'] . '}';
			// responsive label styling
			$label_responsive_styles = the_core_responsive_heading_styles(array('styles' => $slider_options['custom-settings']['advanced_styling']['button_options']['text'], 'selector' => '.tf-sh-' . $slider_options['custom-settings']['unique_id'] . ' .fw-btn span'));
			if (!empty($label_responsive_styles)) $final_styles .= '@media(max-width:767px){' . $label_responsive_styles . '}';

			// label text hover
			$hover_text_color = the_core_get_color_palette_color_and_class($slider_options['custom-settings']['advanced_styling']['button_options']['hover_text_color'], array('return_color' => true));
			if (!empty($hover_text_color['color'])) $final_styles .= '.tf-sh-' . $slider_options['custom-settings']['unique_id'] . ' .fw-btn:hover span' . '{ color: ' . $hover_text_color['color'] . ' !important }';

			if (isset($slider_options['custom-settings']['advanced_styling']['button_options']['style']['selected'])) {
				if ($slider_options['custom-settings']['advanced_styling']['button_options']['style']['selected'] == 'fw-btn-3') {
					if (isset($slider_options['custom-settings']['advanced_styling']['button_options']['style']['fw-btn-3']['border_size']) && !empty($slider_options['custom-settings']['advanced_styling']['button_options']['style']['fw-btn-3']['border_size'])) {
						$final_styles .= '.tf-sh-' . $slider_options['custom-settings']['unique_id'] . ' .fw-btn{ border-top-width: ' . (int)$slider_options['custom-settings']['advanced_styling']['button_options']['style']['fw-btn-3']['border_size'] . 'px; border-bottom-width: ' . (int)$slider_options['custom-settings']['advanced_styling']['button_options']['style']['fw-btn-3']['border_size'] . 'px; }';
					}
					// btn color
					if (isset($slider_options['custom-settings']['advanced_styling']['button_options']['normal_color'])) {
						$normal_color = the_core_get_color_palette_color_and_class($slider_options['custom-settings']['advanced_styling']['button_options']['normal_color'], array('return_color' => true));
						if (!empty($normal_color['color'])) {
							$final_styles .= '.tf-sh-' . $slider_options['custom-settings']['unique_id'] . ' .fw-btn{ border-bottom-color: ' . $normal_color['color'] . '; border-top-color: ' . $normal_color['color'] . ' }';
						}
					}
					// hover color
					if (isset($slider_options['custom-settings']['advanced_styling']['button_options']['hover_color'])) {
						$hover_color = the_core_get_color_palette_color_and_class($slider_options['custom-settings']['advanced_styling']['button_options']['hover_color'], array('return_color' => true));
						if (!empty($hover_color['color'])) {
							$final_styles .= '.tf-sh-' . $slider_options['custom-settings']['unique_id'] . ' .fw-btn:hover, .tf-sh-' . $slider_options['custom-settings']['unique_id'] . ' .fw-btn:focus { background-color: ' . $hover_color['color'] . '; border-bottom-color: ' . $hover_color['color'] . '; border-top-color: ' . $hover_color['color'] . ' }';
						}
					}
				} elseif ($slider_options['custom-settings']['advanced_styling']['button_options']['style']['selected'] == 'fw-btn-2') {
					if (isset($slider_options['custom-settings']['advanced_styling']['button_options']['style']['fw-btn-2']['border_size']) && !empty($slider_options['custom-settings']['advanced_styling']['button_options']['style']['fw-btn-2']['border_size'])) {
						$final_styles .= '.tf-sh-' . $slider_options['custom-settings']['unique_id'] . ' .fw-btn{ border-width: ' . (int)$slider_options['custom-settings']['advanced_styling']['button_options']['style']['fw-btn-2']['border_size'] . 'px; }';
					}
					if (isset($slider_options['custom-settings']['advanced_styling']['button_options']['style']['fw-btn-2']['border_radius']) && !empty($slider_options['custom-settings']['advanced_styling']['button_options']['style']['fw-btn-2']['border_radius'])) {
						$final_styles .= '.tf-sh-' . $slider_options['custom-settings']['unique_id'] . ' .fw-btn{ border-radius: ' . (int)$slider_options['custom-settings']['advanced_styling']['button_options']['style']['fw-btn-2']['border_radius'] . 'px; }';
					}

					// btn color
					if (isset($slider_options['custom-settings']['advanced_styling']['button_options']['normal_color'])) {
						$normal_color = the_core_get_color_palette_color_and_class($slider_options['custom-settings']['advanced_styling']['button_options']['normal_color'], array('return_color' => true));
						if (!empty($normal_color['color'])) {
							$final_styles .= '.tf-sh-' . $slider_options['custom-settings']['unique_id'] . ' .fw-btn{ border-color: ' . $normal_color['color'] . ' }';
						}
					}
					// hover color
					if (isset($slider_options['custom-settings']['advanced_styling']['button_options']['hover_color'])) {
						$hover_color = the_core_get_color_palette_color_and_class($slider_options['custom-settings']['advanced_styling']['button_options']['hover_color'], array('return_color' => true));
						if (!empty($hover_color['color'])) {
							$final_styles .= '.tf-sh-' . $slider_options['custom-settings']['unique_id'] . ' .fw-btn:hover { background-color: ' . $hover_color['color'] . '; border-color: ' . $hover_color['color'] . ' }';
						}
					}
				} elseif ($slider_options['custom-settings']['advanced_styling']['button_options']['style']['selected'] == 'fw-btn-1') {
					if (isset($slider_options['custom-settings']['advanced_styling']['button_options']['style']['fw-btn-1']['border_radius']) && !empty($slider_options['custom-settings']['advanced_styling']['button_options']['style']['fw-btn-1']['border_radius'])) {
						$final_styles .= '.tf-sh-' . $slider_options['custom-settings']['unique_id'] . ' .fw-btn{ border-radius: ' . (int)$slider_options['custom-settings']['advanced_styling']['button_options']['style']['fw-btn-1']['border_radius'] . 'px; }';
					}

					// btn color
					if (isset($slider_options['custom-settings']['advanced_styling']['button_options']['normal_color'])) {
						$normal_color = the_core_get_color_palette_color_and_class($slider_options['custom-settings']['advanced_styling']['button_options']['normal_color'], array('return_color' => true));
						if (!empty($normal_color['color'])) {
							$final_styles .= '.tf-sh-' . $slider_options['custom-settings']['unique_id'] . ' .fw-btn{ background-color: ' . $normal_color['color'] . ' }';
						}
					}
					// hover color
					if (isset($slider_options['custom-settings']['advanced_styling']['button_options']['hover_color'])) {
						$hover_color = the_core_get_color_palette_color_and_class($slider_options['custom-settings']['advanced_styling']['button_options']['hover_color'], array('return_color' => true));
						if (!empty($hover_color['color'])) {
							$final_styles .= '.tf-sh-' . $slider_options['custom-settings']['unique_id'] . ' .fw-btn:hover { background-color: ' . $hover_color['color'] . ' }';
						}
					}

				}
			}
		} elseif (isset($slider_options['slider']['selected']) && $slider_options['slider']['selected'] == 'easy-carousel') {
			// easy carousel slider
			// overlay opacity & color
			if (isset($slider_options['custom-settings']['advanced_styling']['overlay_color'])) {
				$the_core_opacity = (int)$slider_options['custom-settings']['advanced_styling']['overlay_opacity'] / 100;
				$overlay_color = the_core_get_color_palette_color_and_class($slider_options['custom-settings']['advanced_styling']['overlay_color'], array('return_color' => true));
				if (!empty($overlay_color['color'])) {
					$final_styles .= '.tf-sh-' . $slider_options['custom-settings']['unique_id'] . '.fw-easy-carousel .fw-easy-carousel-view-details { background: ' . the_core_hex2rgba($overlay_color['color'], $the_core_opacity) . ' }';
				}
			}

			// button options
			$label_advanced_styling = the_core_get_shortcode_advanced_styles($slider_options['custom-settings']['advanced_styling']['button_options']['text'], array('return_color' => true));
			if (!empty($label_advanced_styling['styles'])) $final_styles .= '.tf-sh-' . $slider_options['custom-settings']['unique_id'] . ' .fw-btn span {' . $label_advanced_styling['styles'] . '}';
			// responsive label styling
			$label_responsive_styles = the_core_responsive_heading_styles(array('styles' => $slider_options['custom-settings']['advanced_styling']['button_options']['text'], 'selector' => '.tf-sh-' . $slider_options['custom-settings']['unique_id'] . ' .fw-btn span'));
			if (!empty($label_responsive_styles)) $final_styles .= '@media(max-width:767px){' . $label_responsive_styles . '}';

			// label text hover
			$hover_text_color = the_core_get_color_palette_color_and_class($slider_options['custom-settings']['advanced_styling']['button_options']['hover_text_color'], array('return_color' => true));
			if (!empty($hover_text_color['color'])) $final_styles .= '.tf-sh-' . $slider_options['custom-settings']['unique_id'] . ' .fw-btn:hover span' . '{ color: ' . $hover_text_color['color'] . ' !important }';

			if (isset($slider_options['custom-settings']['advanced_styling']['button_options']['style']['selected'])) {
				if ($slider_options['custom-settings']['advanced_styling']['button_options']['style']['selected'] == 'fw-btn-3') {
					if (isset($slider_options['custom-settings']['advanced_styling']['button_options']['style']['fw-btn-3']['border_size']) && !empty($slider_options['custom-settings']['advanced_styling']['button_options']['style']['fw-btn-3']['border_size'])) {
						$final_styles .= '.tf-sh-' . $slider_options['custom-settings']['unique_id'] . ' .fw-btn{ border-top-width: ' . (int)$slider_options['custom-settings']['advanced_styling']['button_options']['style']['fw-btn-3']['border_size'] . 'px; border-bottom-width: ' . (int)$slider_options['custom-settings']['advanced_styling']['button_options']['style']['fw-btn-3']['border_size'] . 'px; }';
					}
					// btn color
					if (isset($slider_options['custom-settings']['advanced_styling']['button_options']['normal_color'])) {
						$normal_color = the_core_get_color_palette_color_and_class($slider_options['custom-settings']['advanced_styling']['button_options']['normal_color'], array('return_color' => true));
						if (!empty($normal_color['color'])) {
							$final_styles .= '.tf-sh-' . $slider_options['custom-settings']['unique_id'] . ' .fw-btn{ border-bottom-color: ' . $normal_color['color'] . '; border-top-color: ' . $normal_color['color'] . ' }';
						}
					}
					// hover color
					if (isset($slider_options['custom-settings']['advanced_styling']['button_options']['hover_color'])) {
						$hover_color = the_core_get_color_palette_color_and_class($slider_options['custom-settings']['advanced_styling']['button_options']['hover_color'], array('return_color' => true));
						if (!empty($hover_color['color'])) {
							$final_styles .= '.tf-sh-' . $slider_options['custom-settings']['unique_id'] . ' .fw-btn:hover, .tf-sh-' . $slider_options['custom-settings']['unique_id'] . ' .fw-btn:focus { background-color: ' . $hover_color['color'] . '; border-bottom-color: ' . $hover_color['color'] . '; border-top-color: ' . $hover_color['color'] . ' }';
						}
					}
				} elseif ($slider_options['custom-settings']['advanced_styling']['button_options']['style']['selected'] == 'fw-btn-2') {
					if (isset($slider_options['custom-settings']['advanced_styling']['button_options']['style']['fw-btn-2']['border_size']) && !empty($slider_options['custom-settings']['advanced_styling']['button_options']['style']['fw-btn-2']['border_size'])) {
						$final_styles .= '.tf-sh-' . $slider_options['custom-settings']['unique_id'] . ' .fw-btn{ border-width: ' . (int)$slider_options['custom-settings']['advanced_styling']['button_options']['style']['fw-btn-2']['border_size'] . 'px; }';
					}
					if (isset($slider_options['custom-settings']['advanced_styling']['button_options']['style']['fw-btn-2']['border_radius']) && !empty($slider_options['custom-settings']['advanced_styling']['button_options']['style']['fw-btn-2']['border_radius'])) {
						$final_styles .= '.tf-sh-' . $slider_options['custom-settings']['unique_id'] . ' .fw-btn{ border-radius: ' . (int)$slider_options['custom-settings']['advanced_styling']['button_options']['style']['fw-btn-2']['border_radius'] . 'px; }';
					}

					// btn color
					if (isset($slider_options['custom-settings']['advanced_styling']['button_options']['normal_color'])) {
						$normal_color = the_core_get_color_palette_color_and_class($slider_options['custom-settings']['advanced_styling']['button_options']['normal_color'], array('return_color' => true));
						if (!empty($normal_color['color'])) {
							$final_styles .= '.tf-sh-' . $slider_options['custom-settings']['unique_id'] . ' .fw-btn{ border-color: ' . $normal_color['color'] . ' }';
						}
					}
					// hover color
					if (isset($slider_options['custom-settings']['advanced_styling']['button_options']['hover_color'])) {
						$hover_color = the_core_get_color_palette_color_and_class($slider_options['custom-settings']['advanced_styling']['button_options']['hover_color'], array('return_color' => true));
						if (!empty($hover_color['color'])) {
							$final_styles .= '.tf-sh-' . $slider_options['custom-settings']['unique_id'] . ' .fw-btn:hover { background-color: ' . $hover_color['color'] . '; border-color: ' . $hover_color['color'] . ' }';
						}
					}
				} elseif ($slider_options['custom-settings']['advanced_styling']['button_options']['style']['selected'] == 'fw-btn-1') {
					if (isset($slider_options['custom-settings']['advanced_styling']['button_options']['style']['fw-btn-1']['border_radius']) && !empty($slider_options['custom-settings']['advanced_styling']['button_options']['style']['fw-btn-1']['border_radius'])) {
						$final_styles .= '.tf-sh-' . $slider_options['custom-settings']['unique_id'] . ' .fw-btn{ border-radius: ' . (int)$slider_options['custom-settings']['advanced_styling']['button_options']['style']['fw-btn-1']['border_radius'] . 'px; }';
					}

					// btn color
					if (isset($slider_options['custom-settings']['advanced_styling']['button_options']['normal_color'])) {
						$normal_color = the_core_get_color_palette_color_and_class($slider_options['custom-settings']['advanced_styling']['button_options']['normal_color'], array('return_color' => true));
						if (!empty($normal_color['color'])) {
							$final_styles .= '.tf-sh-' . $slider_options['custom-settings']['unique_id'] . ' .fw-btn{ background-color: ' . $normal_color['color'] . ' }';
						}
					}
					// hover color
					if (isset($slider_options['custom-settings']['advanced_styling']['button_options']['hover_color'])) {
						$hover_color = the_core_get_color_palette_color_and_class($slider_options['custom-settings']['advanced_styling']['button_options']['hover_color'], array('return_color' => true));
						if (!empty($hover_color['color'])) {
							$final_styles .= '.tf-sh-' . $slider_options['custom-settings']['unique_id'] . ' .fw-btn:hover { background-color: ' . $hover_color['color'] . ' }';
						}
					}

				}
			}
		}

		if (empty($final_styles)) {
			return;
		}

		wp_add_inline_style(
			'fw-theme-style',
			$final_styles
		);
	}

	add_action(
		'fw_ext_shortcodes_enqueue_static:slider',
		'_the_core_action_shortcode_slider_enqueue_dynamic_css'
	);
endif;


if (!function_exists('_the_core_action_shortcode_portfolio_enqueue_dynamic_css')):
	/**
	 * @internal
	 *
	 * @param array $data
	 */
	function _the_core_action_shortcode_portfolio_enqueue_dynamic_css($data)
	{
		$shortcode = 'portfolio';
		$atts = shortcode_parse_atts($data['atts_string']);

		/**
		 * Decode attributes
		 * ( The below weird code is because of this https://github.com/ThemeFuse/Unyson/issues/469 )
		 */
		$atts = fw_ext_shortcodes_decode_attr($atts, $shortcode, $data['post']->ID);

		$id = '.tf-sh-' . $atts['unique_id'];
		$styling = '';

		//styles for portfolio type 1
		if ($atts['portfolio_style']['selected'] == 'style1') {
			$portfolio = $atts['portfolio_style']['style1'];

			if (isset($portfolio['style1_advanced_styling'])) {
				$portfolio_settings = $portfolio['style1_advanced_styling'];

				//title stiling
				if (isset($portfolio_settings['title'])) {
					$title = the_core_get_shortcode_advanced_styles($portfolio_settings['title'], array('return_color' => true));
					if (!empty($title['styles'])) $styling .= $id . '.fw-portfolio-1 .fw-portfolio-image .fw-block-image-overlay .fw-overlay-title{' . $title['styles'] . '}';
					// responsive title styling
					$title_responsive_styles = the_core_responsive_heading_styles(array('styles' => $portfolio_settings['title'], 'selector' => $id . '.fw-portfolio-1 .fw-portfolio-image .fw-block-image-overlay .fw-overlay-title'));
					if (!empty($title_responsive_styles)) $styling .= '@media(max-width:767px){' . $title_responsive_styles . '}';
				}
				//subtitle stiling
				if (isset($portfolio_settings['subtitle'])) {
					$subtitle = the_core_get_shortcode_advanced_styles($portfolio_settings['subtitle'], array('return_color' => true));
					if (!empty($subtitle['styles'])) $styling .= $id . '.fw-portfolio-1 .fw-portfolio-image .fw-block-image-overlay .fw-overlay-description{' . $subtitle['styles'] . '}';
					// responsive subtitle styling
					$subtitle_responsive_styles = the_core_responsive_heading_styles(array('styles' => $portfolio_settings['subtitle'], 'selector' => $id . '.fw-portfolio-1 .fw-portfolio-image .fw-block-image-overlay .fw-overlay-description'));
					if (!empty($subtitle_responsive_styles)) $styling .= '@media(max-width:767px){' . $subtitle_responsive_styles . '}';
				}

				//separator settings
				if ($portfolio_settings['separator_group']['selected'] == 'no') {
					$styling .= $id . '.fw-portfolio-1 .fw-portfolio-image .fw-block-image-overlay .fw-overlay-title:before {display:none; }';
					$styling .= $id . '.fw-portfolio-1 .fw-portfolio-image .fw-block-image-overlay .fw-overlay-title{ margin-bottom: 15px; }';
				} else {
					$separator_color_style = '';
					$separator_width = !empty($portfolio_settings['separator_group']['yes']['separator_width']) ? 'width:' . (int)esc_attr($portfolio_settings['separator_group']['yes']['separator_width']) . 'px; max-width:100%;' : '';

					$separator_color = the_core_get_color_palette_color_and_class($portfolio_settings['separator_group']['yes']['separator_color'], array('return_color' => true));

					if (!empty($separator_color['color']))
						$separator_color_style = 'background-color:' . $separator_color['color'] . ';';

					if (!empty($separator_width) || !empty($separator_color_style))
						$styling .= $id . '.fw-portfolio-1 .fw-portfolio-image .fw-block-image-overlay .fw-overlay-title:before{' . $separator_width . $separator_color_style . '}';
				}

				//hover background color
				if (isset($portfolio_settings['hover_bg_color'])) {
					$hover_bg_color = the_core_get_color_palette_color_and_class($portfolio_settings['hover_bg_color'], array('return_color' => true));

					if ( ! empty( $hover_bg_color['color'] ) ) {
						if ( wp_is_mobile() ) {
							$styling .= $id . '.fw-portfolio-1 .fw-portfolio-image .fw-block-image-overlay{background-color:' . the_core_hex2rgba($hover_bg_color['color'], 0.7) . '}';
						}
						else {
							$hover_bg_opacity = isset($portfolio_settings['opacity_bg_color']) && !empty($portfolio_settings['opacity_bg_color']) ? ($portfolio_settings['opacity_bg_color'] / 100) : false;
							$styling .= $id . '.fw-portfolio-1 .fw-portfolio-image .fw-block-image-overlay{background-color:' . the_core_hex2rgba($hover_bg_color['color'], $hover_bg_opacity) . '}';
						}
					}
				}


				//border settings
				if ($portfolio_settings['border_group']['selected'] == 'no')
					$styling .= $id . '.fw-portfolio-1 .fw-portfolio-list li{border: none}';
				else {
					$border_color_style = '';
					$border_width = !empty($portfolio_settings['border_group']['yes']['border_size']) ? 'border-width:' . (int)esc_attr($portfolio_settings['border_group']['yes']['border_size']) . 'px;' : '';

					$border_color = the_core_get_color_palette_color_and_class($portfolio_settings['border_group']['yes']['border_color'], array('return_color' => true));

					if (!empty($border_color['color']))
						$border_color_style = 'border-color:' . $border_color['color'] . ';';

					if (!empty($border_width) || !empty($border_color_style))
						$styling .= $id . '.fw-portfolio-1 .fw-portfolio-list li{' . $border_width . $border_color_style . '}';
				}

				//frame settings
				if ($portfolio_settings['frame_group']['selected'] == 'no')
					$styling .= $id . '.fw-portfolio-1 .fw-portfolio-list li{padding: 0px;}';
				else {
					$frame_color_style = '';
					$frame_width = !empty($portfolio_settings['frame_group']['yes']['frame_size']) ? 'padding:' . (int)esc_attr($portfolio_settings['frame_group']['yes']['frame_size']) . 'px;' : '';

					$frame_color = the_core_get_color_palette_color_and_class($portfolio_settings['frame_group']['yes']['frame_color'], array('return_color' => true));

					if (!empty($frame_color['color']))
						$frame_color_style = 'background-color:' . $frame_color['color'] . ';';

					if (!empty($frame_width) || !empty($frame_color_style))
						$styling .= $id . '.fw-portfolio-1 .fw-portfolio-list li{' . $frame_width . $frame_color_style . '}';
				}

				//shadow settings
				if ($portfolio_settings['shadow_group']['selected'] != 'no') {
					$shadow_horizontal = (int)esc_attr($portfolio_settings['shadow_group']['yes']['shadow_horiontal']) . 'px';
					$shadow_vertical = (int)esc_attr($portfolio_settings['shadow_group']['yes']['shadow_vertical']) . 'px';
					$shadow_blur = (int)esc_attr($portfolio_settings['shadow_group']['yes']['shadow_blur']) . 'px';
					$shadow_size = (int)esc_attr($portfolio_settings['shadow_group']['yes']['shadow_size']) . 'px';
					$shadow_color = $portfolio_settings['shadow_group']['yes']['shadow_color'];

					$styling .= $id . '.fw-portfolio-1 .fw-portfolio-list li{
						-webkit-box-shadow: ' . $shadow_horizontal . ' ' . $shadow_vertical . ' ' . $shadow_blur . ' ' . $shadow_size . ' ' . $shadow_color . ';
						-moz-box-shadow: ' . $shadow_horizontal . ' ' . $shadow_vertical . ' ' . $shadow_blur . ' ' . $shadow_size . ' ' . $shadow_color . ';
						box-shadow: ' . $shadow_horizontal . ' ' . $shadow_vertical . ' ' . $shadow_blur . ' ' . $shadow_size . ' ' . $shadow_color . ';
					}';

				}
			}
		} //portfolio for style 2
		elseif ($atts['portfolio_style']['selected'] == 'style2') {
			$portfolio = $atts['portfolio_style']['style2'];

			if (isset($portfolio['style2_advanced_styling'])) {
				$portfolio_settings = $portfolio['style2_advanced_styling'];

				//title stiling
				if (isset($portfolio_settings['title'])) {
					$title = the_core_get_shortcode_advanced_styles($portfolio_settings['title'], array('return_color' => true));
					if (!empty($title['styles'])) $styling .= $id . '.fw-portfolio-2 .fw-portfolio-title a, ' . $id . '.fw-portfolio-2 .fw-portfolio-wrapper .fw-portfolio-title{' . $title['styles'] . '}';
					// responsive title styling
					$title_responsive_styles = the_core_responsive_heading_styles(array('styles' => $portfolio_settings['title'], 'selector' => $id . '.fw-portfolio-2 .fw-portfolio-title a, ' . $id . '.fw-portfolio-2 .fw-portfolio-wrapper .fw-portfolio-title'));
					if (!empty($title_responsive_styles)) $styling .= '@media(max-width:767px){' . $title_responsive_styles . '}';
				}
				//subtitle stiling
				if (isset($portfolio_settings['description'])) {
					$desc = the_core_get_shortcode_advanced_styles($portfolio_settings['description'], array('return_color' => true));
					if (!empty($desc['styles'])) $styling .= $id . '.fw-portfolio-2 .fw-portfolio-description .fw-portfolio-content{' . $desc['styles'] . '}';
					// responsive description styling
					$description_responsive_styles = the_core_responsive_heading_styles(array('styles' => $portfolio_settings['description'], 'selector' => $id . '.fw-portfolio-2 .fw-portfolio-description .fw-portfolio-content'));
					if (!empty($description_responsive_styles)) $styling .= '@media(max-width:767px){' . $description_responsive_styles . '}';
				}
				//background color
				if (isset($portfolio_settings['bg_color'])) {
					$bg_color = the_core_get_color_palette_color_and_class($portfolio_settings['bg_color'], array('return_color' => true));
					if (!empty($bg_color['color'])) $styling .= $id . '.fw-portfolio-2 .fw-portfolio-description{background-color:' . $bg_color['color'] . '}';
				}

				//get paddings
				$padding_top = (isset($portfolio_settings['padding_top']) && $portfolio_settings['padding_top'] != '' ) ? 'padding-top:' . (int)esc_attr($portfolio_settings['padding_top']) . 'px;' : '';
				$padding_right = (isset($portfolio_settings['padding_right']) && $portfolio_settings['padding_right'] != '' ) ? 'padding-right:' . (int)esc_attr($portfolio_settings['padding_right']) . 'px;' : '';
				$padding_bottom = (isset($portfolio_settings['padding_bottom']) && $portfolio_settings['padding_bottom'] != '' ) ? 'padding-bottom:' . (int)esc_attr($portfolio_settings['padding_bottom']) . 'px;' : '';
				$padding_left = (isset($portfolio_settings['padding_left']) && $portfolio_settings['padding_left'] != '' ) ? 'padding-left:' . (int)esc_attr($portfolio_settings['padding_left']) . 'px;' : '';

				if (!empty($padding_top) || !empty($padding_right) || !empty($padding_bottom) || !empty($padding_left))
					$styling .= $id . '.fw-portfolio-2 .fw-portfolio-description{' . $padding_top . $padding_right . $padding_bottom . $padding_left . '}';

				//show btn
				if (isset($portfolio_settings['show_bnt'])) {
					if ($portfolio_settings['show_bnt'] == 'yes') {
						$btn = $portfolio_settings['button_options'];

						if (isset($btn['style']['selected'])) {
							if ($btn['style']['selected'] == 'fw-btn-3') {
								if (isset($btn['style']['fw-btn-3']['border_size']) && !empty($btn['style']['fw-btn-3']['border_size'])) {
									$styling .= $id . ' .fw-btn{ border-top-width: ' . (int)$btn['style']['fw-btn-3']['border_size'] . 'px; border-bottom-width: ' . (int)$btn['style']['fw-btn-3']['border_size'] . 'px; }';
								}
								// btn color
								if (isset($btn['normal_color'])) {
									$normal_color = the_core_get_color_palette_color_and_class($btn['normal_color'], array('return_color' => true));
									if (!empty($normal_color['color'])) $styling .= $id . ' .fw-btn{ border-bottom-color: ' . $normal_color['color'] . '; border-top-color: ' . $normal_color['color'] . ' }';
								}
								// hover color
								if (isset($btn['hover_color'])) {
									$hover_color = the_core_get_color_palette_color_and_class($btn['hover_color'], array('return_color' => true));
									if (!empty($hover_color['color'])) $styling .= $id . ' .fw-btn:hover { background-color: ' . $hover_color['color'] . '; border-bottom-color: ' . $hover_color['color'] . '; border-top-color: ' . $hover_color['color'] . ' }';
								}
							} elseif ($btn['style']['selected'] == 'fw-btn-2') {
								if (isset($btn['style']['fw-btn-2']['border_size']) && !empty($btn['style']['fw-btn-2']['border_size'])) {
									$styling .= $id . ' .fw-btn{ border-width: ' . (int)$btn['style']['fw-btn-2']['border_size'] . 'px; }';
								}
								if (isset($btn['style']['fw-btn-2']['border_radius']) && !empty($btn['style']['fw-btn-2']['border_radius'])) {
									$styling .= $id . ' .fw-btn{ border-radius: ' . (int)$btn['style']['fw-btn-2']['border_radius'] . 'px; }';
								}

								// btn color
								if (isset($btn['normal_color'])) {
									$normal_color = the_core_get_color_palette_color_and_class($btn['normal_color'], array('return_color' => true));
									if (!empty($normal_color['color'])) $styling .= $id . ' .fw-btn{ border-color: ' . $normal_color['color'] . ' }';
								}
								// hover color
								if (isset($btn['hover_color'])) {
									$hover_color = the_core_get_color_palette_color_and_class($btn['hover_color'], array('return_color' => true));
									if (!empty($hover_color['color'])) $styling .= $id . ' .fw-btn:hover { background-color: ' . $hover_color['color'] . '; border-color: ' . $hover_color['color'] . ' }';
								}
							} elseif ($btn['style']['selected'] == 'fw-btn-1') {
								if (isset($btn['style']['fw-btn-1']['border_radius']) && !empty($btn['style']['fw-btn-1']['border_radius'])) {
									$styling .= $id . ' .fw-btn{ border-radius: ' . (int)$btn['style']['fw-btn-1']['border_radius'] . 'px; }';
								}

								// btn color
								if (isset($btn['normal_color'])) {
									$normal_color = the_core_get_color_palette_color_and_class($btn['normal_color'], array('return_color' => true));
									if (!empty($normal_color['color'])) $styling .= $id . ' .fw-btn{ background-color: ' . $normal_color['color'] . ' }';
								}
								// hover color
								if (isset($btn['hover_color'])) {
									$hover_color = the_core_get_color_palette_color_and_class($btn['hover_color'], array('return_color' => true));
									if (!empty($hover_color['color'])) $styling .= $id . ' .fw-btn:hover { background-color: ' . $hover_color['color'] . ' }';
								}

							}
						}

						// advanced styling
						if (isset($btn['label_advanced_styling'])) {
							// text advanced styling
							$text_advanced_styling = the_core_get_shortcode_advanced_styles($btn['label_advanced_styling']['text'], array('return_color' => true));
							if (!empty($text_advanced_styling['styles'])) $styling .= $id . ' .fw-btn span {' . $text_advanced_styling['styles'] . '}';
							// responsive text styling
							$text_responsive_styles = the_core_responsive_heading_styles(array('styles' => $btn['label_advanced_styling']['text'], 'selector' => $id . ' .fw-btn span'));
							if (!empty($text_responsive_styles)) $styling .= '@media(max-width:767px){' . $text_responsive_styles . '}';

							// hover text color
							if (isset($btn['label_advanced_styling']['hover_text_color'])) {
								$hover_text_color = the_core_get_color_palette_color_and_class($btn['label_advanced_styling']['hover_text_color'], array('return_color' => true));
								if (!empty($hover_text_color['color'])) $styling .= $id . ' .fw-btn:hover span' . '{ color: ' . $hover_text_color['color'] . ' }';
							}
						}
					}
				}
			}
		} //portfolio for style 3
		elseif ($atts['portfolio_style']['selected'] == 'style3') {
			$portfolio = $atts['portfolio_style']['style3'];

			if (isset($portfolio['style1_advanced_styling'])) {
				$portfolio_settings = $portfolio['style1_advanced_styling'];

				//title stiling
				if (isset($portfolio_settings['title'])) {
					$title = the_core_get_shortcode_advanced_styles($portfolio_settings['title'], array('return_color' => true));
					if (!empty($title['styles'])) $styling .= $id . '.fw-portfolio-3 .fw-portfolio-image .fw-block-image-overlay .fw-portfolio-title{' . $title['styles'] . '}';
					// responsive title styling
					$title_responsive_styles = the_core_responsive_heading_styles(array('styles' => $portfolio_settings['title'], 'selector' => $id . '.fw-portfolio-3 .fw-portfolio-image .fw-block-image-overlay .fw-portfolio-title'));
					if (!empty($title_responsive_styles)) $styling .= '@media(max-width:767px){' . $title_responsive_styles . '}';
				}
				//subtitle stiling
				if (isset($portfolio_settings['subtitle'])) {
					$subtitle = the_core_get_shortcode_advanced_styles($portfolio_settings['subtitle'], array('return_color' => true));
					if (!empty($subtitle['styles'])) $styling .= $id . '.fw-portfolio-3 .fw-block-image-parent .fw-block-image-overlay .fw-overlay-description{' . $subtitle['styles'] . '}';
					// responsive subtitle styling
					$subtitle_responsive_styles = the_core_responsive_heading_styles(array('styles' => $portfolio_settings['subtitle'], 'selector' => $id . '.fw-portfolio-3 .fw-block-image-parent .fw-block-image-overlay .fw-overlay-description'));
					if (!empty($subtitle_responsive_styles)) $styling .= '@media(max-width:767px){' . $subtitle_responsive_styles . '}';
				}

				//hover background color
				if (isset($portfolio_settings['hover_bg_color'])) {
					$hover_bg_color = the_core_get_color_palette_color_and_class($portfolio_settings['hover_bg_color'], array('return_color' => true));
					if (!empty($hover_bg_color['color'])) {
						if ( wp_is_mobile() ) {
							$styling .= $id . '.fw-portfolio-3 .fw-block-image-child .fw-block-image-overlay {background-color:' . the_core_hex2rgba($hover_bg_color['color'], 0.7) . '}';
						} else {
							$hover_bg_opacity = isset($portfolio_settings['opacity_bg_color']) && !empty($portfolio_settings['opacity_bg_color']) ? ($portfolio_settings['opacity_bg_color'] / 100) : false;
							$styling .= $id . '.fw-portfolio-3 .fw-block-image-child .fw-block-image-overlay {background-color:' . the_core_hex2rgba($hover_bg_color['color'], $hover_bg_opacity) . '}';
						}
					}
				}

				//icon prettyphoto color
				if (isset($portfolio_settings['prettyphoto_icon_type'])) {
					$icon_type = $portfolio_settings['prettyphoto_icon_type'];

					if ($icon_type['tab_icon'] == 'icon-class') {
						//icon color
						$pretty_icon_color = the_core_get_color_palette_color_and_class($icon_type['icon-class']['pretty_icon_color'], array('return_color' => true));

						if (!empty($pretty_icon_color['color']))
							$styling .= $id . '.fw-portfolio-3 .fw-block-image-icons a{color:' . $pretty_icon_color['color'] . ';border-color:' . $pretty_icon_color['color'] . ';}
								' . $id . '.fw-portfolio-3 .fw-block-image-icons a:hover{color: #edf1f2;background: ' . $pretty_icon_color['color'] . ';}';

						//icon hover color
						$pretty_icon_color_hover = the_core_get_color_palette_color_and_class($icon_type['icon-class']['icon_color_hover'], array('return_color' => true));

						if (!empty($pretty_icon_color_hover['color']))
							$styling .= $id . '.fw-portfolio-3 .fw-block-image-icons a:hover{color: ' . $pretty_icon_color_hover['color'] . ';}';

						$styling .= !empty($portfolio_settings['icon_size']) ? $id . '.fw-portfolio-3 .fw-block-image-icons a
						{
							font-size:' . esc_attr((int)$portfolio_settings['icon_size']) . 'px;
							width:' . esc_attr(((int)$portfolio_settings['icon_size'] + 30)) . 'px;
							height:' . esc_attr(((int)$portfolio_settings['icon_size'] + 30)) . 'px;
							line-height:' . esc_attr(((int)$portfolio_settings['icon_size'] + 30)) . 'px;
						}' : '';
					} else {
						if (!empty($icon_type['upload-icon']['upload-custom-img']['url'])) {
							//get image size
							$styling .= !empty($portfolio_settings['icon_size']) ? $id . '.fw-portfolio-3 .fw-block-image-icons a.fw-icon-img-class{width:' . esc_attr((int)$portfolio_settings['icon_size']) . 'px; height:' . esc_attr((int)$portfolio_settings['icon_size']) . 'px;}' : '';
							$styling .= $id . '.fw-portfolio-3 .fw-block-image-icons a.fw-icon-img-class{border:none;}
								' . $id . '.fw-portfolio-3 .fw-block-image-icons a.fw-icon-img-class:hover{background:none;border:none;}';
						}
					}
				}

				//icon link color
				if (isset($portfolio_settings['link_icon_type'])) {
					$icon_type = $portfolio_settings['link_icon_type'];

					if ($icon_type['tab_icon'] == 'icon-class') {
						//icon color
						$link_icon_color = the_core_get_color_palette_color_and_class($icon_type['icon-class']['link_icon_color'], array('return_color' => true));

						if (!empty($link_icon_color['color'])) {
							$styling .= $id . '.fw-portfolio-3 .fw-block-image-icons a.fw-link-icon{color:' . $link_icon_color['color'] . ';border-color:' . $link_icon_color['color'] . ';}
								' . $id . '.fw-portfolio-3 .fw-block-image-icons a.fw-link-icon:hover{color: #edf1f2;background: ' . $link_icon_color['color'] . ';}';
						}

						//icon hover color
						$link_icon_color_hover = the_core_get_color_palette_color_and_class($icon_type['icon-class']['link_icon_color_hover'], array('return_color' => true));

						if (!empty($link_icon_color_hover['color'])) {
							$styling .= $id . '.fw-portfolio-3 .fw-block-image-icons a.fw-link-icon:hover{color: ' . $link_icon_color_hover['color'] . ';}';
						}

						//icon size
						$styling .= !empty($portfolio_settings['icon_size2']) ? $id . '.fw-portfolio-3 .fw-block-image-icons a.fw-link-icon{
							font-size:' . esc_attr((int)$portfolio_settings['icon_size2']) . 'px;
							width:' . esc_attr(((int)$portfolio_settings['icon_size2'] + 30)) . 'px;
							height:' . esc_attr(((int)$portfolio_settings['icon_size2'] + 30)) . 'px;
							line-height:' . esc_attr(((int)$portfolio_settings['icon_size2'] + 30)) . 'px;
						}' : '';
					} else {
						if (!empty($icon_type['upload-icon']['upload-custom-img']['url'])) {
							//get image size
							$styling .= !empty($portfolio_settings['icon_size2']) ? $id . '.fw-portfolio-3 .fw-block-image-icons a.fw-icon-img-class{width:' . esc_attr((int)$portfolio_settings['icon_size2']) . 'px; height:' . esc_attr((int)$portfolio_settings['icon_size2']) . 'px;}' : '';
							$styling .= $id . '.fw-portfolio-3 .fw-block-image-icons a.fw-icon-img-class{border:none;}
								' . $id . '.fw-portfolio-3 .fw-block-image-icons a.fw-icon-img-class:hover{background:none;border:none;}';
						}
					}
				}
			}
		}

		// load more button
		if( isset( $atts['show_load_more'] ) && 'yes' == $atts['show_load_more'] ) {
			if (isset($atts['load_more_button']['label_advanced_styling'])) {
				// button label advanced styling
				$label_advanced_styling = the_core_get_shortcode_advanced_styles($atts['load_more_button']['label_advanced_styling']['text'], array('return_color' => true));
				if (!empty($label_advanced_styling['styles'])) {
					$styling .= '.tf-sh-' . $atts['unique_id'] . ' .fw-projects-load-more-btn .fw-btn span {' . $label_advanced_styling['styles'] . '}';
				}
				// responsive label styling
				$label_responsive_styles = the_core_responsive_heading_styles(array('styles' => $atts['load_more_button']['label_advanced_styling']['text'], 'selector' => '.tf-sh-' . $atts['unique_id'] . ' .fw-projects-load-more-btn .fw-btn span'));
				if (!empty($label_responsive_styles)) $styling .= '@media(max-width:767px){' . $label_responsive_styles . '}';

				// label text hover
				$hover_text_color = the_core_get_color_palette_color_and_class($atts['load_more_button']['label_advanced_styling']['hover_text_color'], array('return_color' => true));
				if (!empty($hover_text_color['color'])) $styling .= '.tf-sh-' . $atts['unique_id'] . ' .fw-projects-load-more-btn .fw-btn:hover span' . '{ color: ' . $hover_text_color['color'] . ' !important }';
			}

			// button color options
			if (isset($atts['load_more_button']['style']['selected'])) {
				if ($atts['load_more_button']['style']['selected'] == 'fw-btn-3') {
					if (isset($atts['load_more_button']['style']['fw-btn-3']['border_size']) && !empty($atts['load_more_button']['style']['fw-btn-3']['border_size'])) {
						$styling .= '.tf-sh-' . $atts['unique_id'] . ' .fw-projects-load-more-btn .fw-btn{ border-top-width: ' . (int)$atts['load_more_button']['style']['fw-btn-3']['border_size'] . 'px; border-bottom-width: ' . (int)$atts['load_more_button']['style']['fw-btn-3']['border_size'] . 'px; }';
					}
					// btn color
					if (isset($atts['load_more_button']['normal_color'])) {
						$normal_color = the_core_get_color_palette_color_and_class($atts['load_more_button']['normal_color'], array('return_color' => true));
						if (!empty($normal_color['color'])) $styling .= '.tf-sh-' . $atts['unique_id'] . ' .fw-projects-load-more-btn .fw-btn{ border-bottom-color: ' . $normal_color['color'] . '; border-top-color: ' . $normal_color['color'] . ' }';
					}
					// hover color
					if (isset($atts['load_more_button']['hover_color'])) {
						$hover_color = the_core_get_color_palette_color_and_class($atts['load_more_button']['hover_color'], array('return_color' => true));
						if (!empty($hover_color['color'])) $styling .= '.tf-sh-' . $atts['unique_id'] . ' .fw-projects-load-more-btn .fw-btn:hover, .tf-sh-' . $atts['unique_id'] . ' .fw-projects-load-more-btn .fw-btn:focus { background-color: ' . $hover_color['color'] . '; border-bottom-color: ' . $hover_color['color'] . '; border-top-color: ' . $hover_color['color'] . ' }';
					}
				} elseif ($atts['load_more_button']['style']['selected'] == 'fw-btn-2') {
					if (isset($atts['load_more_button']['style']['fw-btn-2']['border_size']) && !empty($atts['load_more_button']['style']['fw-btn-2']['border_size'])) {
						$styling .= '.tf-sh-' . $atts['unique_id'] . ' .fw-projects-load-more-btn .fw-btn{ border-width: ' . (int)$atts['load_more_button']['style']['fw-btn-2']['border_size'] . 'px; }';
					}
					if (isset($atts['load_more_button']['style']['fw-btn-2']['border_radius']) && !empty($atts['load_more_button']['style']['fw-btn-2']['border_radius'])) {
						$styling .= '.tf-sh-' . $atts['unique_id'] . ' .fw-projects-load-more-btn .fw-btn{ border-radius: ' . (int)$atts['load_more_button']['style']['fw-btn-2']['border_radius'] . 'px; }';
					}

					// btn color
					if (isset($atts['load_more_button']['normal_color'])) {
						$normal_color = the_core_get_color_palette_color_and_class($atts['load_more_button']['normal_color'], array('return_color' => true));
						if (!empty($normal_color['color'])) $styling .= '.tf-sh-' . $atts['unique_id'] . ' .fw-projects-load-more-btn .fw-btn{ border-color: ' . $normal_color['color'] . ' }';
					}
					// hover color
					if (isset($atts['load_more_button']['hover_color'])) {
						$hover_color = the_core_get_color_palette_color_and_class($atts['load_more_button']['hover_color'], array('return_color' => true));
						if (!empty($hover_color['color'])) $styling .= '.tf-sh-' . $atts['unique_id'] . ' .fw-projects-load-more-btn .fw-btn:hover { background-color: ' . $hover_color['color'] . '; border-color: ' . $hover_color['color'] . ' }';
					}
				} elseif ($atts['load_more_button']['style']['selected'] == 'fw-btn-1') {
					if (isset($atts['load_more_button']['style']['fw-btn-1']['border_radius']) && !empty($atts['load_more_button']['style']['fw-btn-1']['border_radius'])) {
						$styling .= '.tf-sh-' . $atts['unique_id'] . ' .fw-projects-load-more-btn .fw-btn{ border-radius: ' . (int)$atts['load_more_button']['style']['fw-btn-1']['border_radius'] . 'px; }';
					}

					// btn color
					if (isset($atts['load_more_button']['normal_color'])) {
						$normal_color = the_core_get_color_palette_color_and_class($atts['load_more_button']['normal_color'], array('return_color' => true));
						if (!empty($normal_color['color'])) $styling .= '.tf-sh-' . $atts['unique_id'] . ' .fw-projects-load-more-btn .fw-btn{ background-color: ' . $normal_color['color'] . ' }';
					}
					// hover color
					if (isset($atts['load_more_button']['hover_color'])) {
						$hover_color = the_core_get_color_palette_color_and_class($atts['load_more_button']['hover_color'], array('return_color' => true));
						if (!empty($hover_color['color'])) $styling .= '.tf-sh-' . $atts['unique_id'] . ' .fw-projects-load-more-btn .fw-btn:hover { background-color: ' . $hover_color['color'] . ' }';
					}

				}
			}
		}

		wp_add_inline_style(
			'fw-theme-style',
			$styling
		);
	}

	add_action(
		'fw_ext_shortcodes_enqueue_static:portfolio',
		'_the_core_action_shortcode_portfolio_enqueue_dynamic_css'
	);
endif;


if (!function_exists('_the_core_action_shortcode_map_enqueue_dynamic_css')):
	/**
	 * @internal
	 *
	 * @param array $data
	 */
	function _the_core_action_shortcode_map_enqueue_dynamic_css($data)
	{
		$shortcode = 'map';
		$atts = shortcode_parse_atts($data['atts_string']);

		/**
		 * Decode attributes
		 * ( The below weird code is because of this https://github.com/ThemeFuse/Unyson/issues/469 )
		 */
		$atts = fw_ext_shortcodes_decode_attr($atts, $shortcode, $data['post']->ID);

		$final_styles = '';
		if (isset($atts['location_advanced_styling'])) {
			// title advanced styling
			$title_advanced_styling = the_core_get_shortcode_advanced_styles($atts['location_advanced_styling']['title'], array('return_color' => true));
			if (!empty($title_advanced_styling['styles'])) {
				$final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .fw-map-canvas .infowindow-title a, .tf-sh-' . $atts['unique_id'] . ' .fw-map-canvas .infowindow-title a:hover {' . $title_advanced_styling['styles'] . '}';
				$final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .fw-map-canvas .infowindow-title a:hover {opacity: 0.8;}';
			}
			// responsive title styling
			$title_responsive_styles = the_core_responsive_heading_styles(array('styles' => $atts['location_advanced_styling']['title'], 'selector' => '.tf-sh-' . $atts['unique_id'] . ' .fw-map-canvas .infowindow-title a, .tf-sh-' . $atts['unique_id'] . ' .fw-map-canvas .infowindow-title a:hover'));
			if (!empty($title_responsive_styles)) $final_styles .= '@media(max-width:767px){' . $title_responsive_styles . '}';

			// description advanced styling
			$description_advanced_styling = the_core_get_shortcode_advanced_styles($atts['location_advanced_styling']['description'], array('return_color' => true));
			if (!empty($description_advanced_styling['styles'])) $final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .fw-map-canvas .infowindow-description {' . $description_advanced_styling['styles'] . '}';
			// responsive description styling
			$description_responsive_styles = the_core_responsive_heading_styles(array('styles' => $atts['location_advanced_styling']['description'], 'selector' => '.tf-sh-' . $atts['unique_id'] . ' .fw-map-canvas .infowindow-description'));
			if (!empty($description_responsive_styles)) $final_styles .= '@media(max-width:767px){' . $description_responsive_styles . '}';
		}

		if (empty($final_styles)) {
			return;
		}

		wp_add_inline_style(
			'fw-theme-style',
			$final_styles
		);
	}

	add_action(
		'fw_ext_shortcodes_enqueue_static:map',
		'_the_core_action_shortcode_map_enqueue_dynamic_css'
	);
endif;


if (!function_exists('_the_core_action_shortcode_column_enqueue_dynamic_css')):
	/**
	 * @internal
	 *
	 * @param array $data
	 */
	function _the_core_action_shortcode_column_enqueue_dynamic_css($data)
	{
		$shortcode = 'column';
		$atts = shortcode_parse_atts($data['atts_string']);

		/**
		 * Decode attributes
		 * ( The below weird code is because of this https://github.com/ThemeFuse/Unyson/issues/469 )
		 */
		$atts = fw_ext_shortcodes_decode_attr($atts, $shortcode, $data['post']->ID);

		$final_styles = $bg_image = $bg_color = '';
		// additional spacing
		$atts['padding_top'] = (int)$atts['padding_top'];
		$atts['padding_right'] = (int)$atts['padding_right'];
		$atts['padding_bottom'] = (int)$atts['padding_bottom'];
		$atts['padding_left'] = (int)$atts['padding_left'];
		if ($atts['padding_top'] != 0 || $atts['padding_right'] != 0 || $atts['padding_bottom'] != 0 || $atts['padding_left'] != 0) {
			$padding_unit = isset($atts['padding_unit']) ? $atts['padding_unit'] : 'px';
			$final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .fw-col-inner{padding: ' . $atts['padding_top'] . $padding_unit.' ' . $atts['padding_right'] . $padding_unit. ' ' . $atts['padding_bottom'] . $padding_unit.' ' . $atts['padding_left'] . $padding_unit.';}';
		}

		// margin
		$atts['position_top'] = isset( $atts['position_top'] ) ? (int)$atts['position_top'] : '';
		$atts['position_right'] = isset( $atts['position_right'] ) ? (int)$atts['position_right'] : '';
		$atts['position_bottom'] = isset( $atts['position_bottom'] ) ? (int)$atts['position_bottom'] : '';
		$atts['position_left'] = isset( $atts['position_left'] ) ? (int)$atts['position_left'] : '';
		if ($atts['position_top'] != 0 || $atts['position_right'] != 0 || $atts['position_bottom'] != 0 || $atts['position_left'] != 0) {
			$position_unit = isset($atts['position_unit']) ? $atts['position_unit'] : 'px';
			$final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .fw-wrap-col-inner {margin: ' . $atts['position_top'] . $position_unit . ' ' . $atts['position_right'] . $position_unit.' ' . $atts['position_bottom'] . $position_unit . ' ' . $atts['position_left'] . $position_unit . ';}';
		}

		// background
		if (isset($atts['background_options']['background']) && $atts['background_options']['background'] == 'image' && !empty($atts['background_options']['image']['background_image']['data'])) {
			$bg_image = 'background-image:url(' . the_core_url_without_protocol( $atts['background_options']['image']['background_image']['data']['icon'] ) . ');';
			$bg_image .= ' background-repeat: ' . $atts['background_options']['image']['repeat'] . ';';
			$bg_image .= ' background-position: ' . $atts['background_options']['image']['bg_position_x'] . ' ' . $atts['background_options']['image']['bg_position_y'] . ';';
			$bg_image .= ' background-size: ' . $atts['background_options']['image']['bg_size'] . ';';

			$bg = the_core_get_color_palette_color_and_class($atts['background_options']['image']['background_color'], array('return_color' => true));
			if (!empty($bg['color'])) {
				$bg_color = 'background-color:' . $bg['color'] . ';';
			}
			$final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .fw-wrap-col-inner {' . $bg_image . $bg_color . '}';

			// overlay and opacity
			$type = $atts['background_options']['background'];
			$overlay = $atts['background_options'][$type]['overlay_options']['overlay'];
			if ($overlay == 'yes') {
				$the_core_opacity_param = 'overlay_opacity_' . $atts['background_options']['background'];
				$the_core_opacity = $atts['background_options'][$type]['overlay_options']['yes'][$the_core_opacity_param] / 100;

				$overlay_color = the_core_get_color_palette_color_and_class($atts['background_options'][$type]['overlay_options']['yes']['background'], array('return_color' => true));
				if (!empty($overlay_color['color'])) {
					$final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .fw-main-row-overlay {background-color: ' . $overlay_color['color'] . '; opacity: ' . $the_core_opacity . ';}';
				}
			}
		} elseif (isset($atts['background_options']['background']) && $atts['background_options']['background'] == 'color') {
			$bg = the_core_get_color_palette_color_and_class($atts['background_options']['color']['background_color'], array('return_color' => true));
			if (!empty($bg['color'])) {
				$final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .fw-wrap-col-inner{background-color:' . $bg['color'] . ';}';
			}
		}
		elseif( isset($atts['background_options']['background']) && $atts['background_options']['background'] == 'gradient_color' ) {
			// gradient styling
			if( !empty($atts['background_options']['gradient_color']['gradient_bg_color']['primary']) ) {
				$gradient_orientation = $filter = '';
				$gradient = 'linear-gradient';
				$gradient_type = '1';
				if( $atts['background_options']['gradient_color']['gradient_orientation'] == 'horizontal' ) {
					$gradient_orientation = 'left';
					$filter = 'to right';
				}
				elseif( $atts['background_options']['gradient_color']['gradient_orientation'] == 'vertical' ) {
					$gradient_orientation = 'top';
					$filter = 'to bottom';
					$gradient_type = '0';
				}
				elseif( $atts['background_options']['gradient_color']['gradient_orientation'] == 'diagonal' ) {
					$gradient_orientation = '-45deg';
					$filter = '135de';
				}
				elseif( $atts['background_options']['gradient_color']['gradient_orientation'] == 'diagonal_bottom' ) {
					$gradient_orientation = '45deg';
					$filter = '45deg';
				}
				elseif( $atts['background_options']['gradient_color']['gradient_orientation'] == 'radial' ) {
					$gradient = 'radial-gradient';
					$gradient_orientation = 'center, ellipse cover';
					$filter = 'ellipse at center';
				}

				$final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .fw-wrap-col-inner{
					background: '.$atts['background_options']['gradient_color']['gradient_bg_color']['primary'].';
					background: -moz-'.$gradient.'('.$gradient_orientation.', '.$atts['background_options']['gradient_color']['gradient_bg_color']['primary'].' 0%, '.$atts['background_options']['gradient_color']['gradient_bg_color']['secondary'].' 100%);
					background: -webkit-'.$gradient.'('.$gradient_orientation.', '.$atts['background_options']['gradient_color']['gradient_bg_color']['primary'].' 0%,'.$atts['background_options']['gradient_color']['gradient_bg_color']['secondary'].' 100%);
					background: '.$gradient.'('.$filter.', '.$atts['background_options']['gradient_color']['gradient_bg_color']['primary'].' 0%,'.$atts['background_options']['gradient_color']['gradient_bg_color']['secondary'].' 100%);
					filter: progid:DXImageTransform.Microsoft.gradient( startColorstr="'.$atts['background_options']['gradient_color']['gradient_bg_color']['primary'].'", endColorstr="'.$atts['background_options']['gradient_color']['gradient_bg_color']['secondary'].'",GradientType='.$gradient_type.' );
				}';
			}
		}

		// shadow settings
		if (isset($atts['shadow_group'])) {
			if ($atts['shadow_group']['selected'] == 'yes') {
				$shadow_horizontal = (int)esc_attr($atts['shadow_group']['yes']['shadow_horiontal']) . 'px';
				$shadow_vertical = (int)esc_attr($atts['shadow_group']['yes']['shadow_vertical']) . 'px';
				$shadow_blur = (int)esc_attr($atts['shadow_group']['yes']['shadow_blur']) . 'px';
				$shadow_size = (int)esc_attr($atts['shadow_group']['yes']['shadow_size']) . 'px';
				$shadow_color = $atts['shadow_group']['yes']['shadow_color'];

				if ($atts['background_options']['background'] != 'none') {
					$final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .fw-wrap-col-inner{
						-webkit-box-shadow: ' . $shadow_horizontal . ' ' . $shadow_vertical . ' ' . $shadow_blur . ' ' . $shadow_size . ' ' . $shadow_color . ';
						-moz-box-shadow: ' . $shadow_horizontal . ' ' . $shadow_vertical . ' ' . $shadow_blur . ' ' . $shadow_size . ' ' . $shadow_color . ';
						box-shadow: ' . $shadow_horizontal . ' ' . $shadow_vertical . ' ' . $shadow_blur . ' ' . $shadow_size . ' ' . $shadow_color . ';
					}';
				} else {
					$final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .fw-col-inner{
						-webkit-box-shadow: ' . $shadow_horizontal . ' ' . $shadow_vertical . ' ' . $shadow_blur . ' ' . $shadow_size . ' ' . $shadow_color . ';
						-moz-box-shadow: ' . $shadow_horizontal . ' ' . $shadow_vertical . ' ' . $shadow_blur . ' ' . $shadow_size . ' ' . $shadow_color . ';
						box-shadow: ' . $shadow_horizontal . ' ' . $shadow_vertical . ' ' . $shadow_blur . ' ' . $shadow_size . ' ' . $shadow_color . ';
					}';
				}
			}
		}

		// for responsive settings
		if (isset($atts['responsive'])) {
			// tablet landscape
			if (isset($atts['responsive']['tablet_landscape_display']['selected']) && $atts['responsive']['tablet_landscape_display']['selected'] == 'yes') {
				$padding_top = $padding_right = $padding_bottom = $padding_left = '';
				$padding_unit = isset($atts['responsive']['tablet_landscape_display']['yes']['padding_unit']) ? $atts['responsive']['tablet_landscape_display']['yes']['padding_unit'] : 'px';
				// additional spacing
				if ($atts['responsive']['tablet_landscape_display']['yes']['padding_top'] != '') {
					$padding_top = 'padding-top:'.(int)$atts['responsive']['tablet_landscape_display']['yes']['padding_top'].$padding_unit.';';
				}

				if ($atts['responsive']['tablet_landscape_display']['yes']['padding_right'] != '') {
					$padding_right = 'padding-right:'.(int)$atts['responsive']['tablet_landscape_display']['yes']['padding_right'].$padding_unit.';';
				}

				if ($atts['responsive']['tablet_landscape_display']['yes']['padding_bottom'] != '') {
					$padding_bottom = 'padding-bottom:'.(int)$atts['responsive']['tablet_landscape_display']['yes']['padding_bottom'].$padding_unit.';';
				}

				if ($atts['responsive']['tablet_landscape_display']['yes']['padding_left'] != '') {
					$padding_left = 'padding-left:'.(int)$atts['responsive']['tablet_landscape_display']['yes']['padding_left'].$padding_unit.';';
				}

				if ($padding_top != '' || $padding_right != '' || $padding_bottom != '' || $padding_left != '') {
					$final_styles .= '@media only screen and (min-width: 992px) and (max-width: 1199px) { .tf-sh-' . $atts['unique_id'] . ' .fw-col-inner{'.$padding_top . $padding_right . $padding_bottom . $padding_left . ' } }';
				}

				// margin
				$margin_top = $margin_right = $margin_bottom = $margin_left = '';
				$margin_unit = isset($atts['responsive']['tablet_landscape_display']['yes']['position_unit']) ? $atts['responsive']['tablet_landscape_display']['yes']['position_unit'] : 'px';
				if ( isset($atts['responsive']['tablet_landscape_display']['yes']['position_top']) && $atts['responsive']['tablet_landscape_display']['yes']['position_top'] != '' ) {
					$margin_top = 'margin-top:'.(int)$atts['responsive']['tablet_landscape_display']['yes']['position_top'].$margin_unit.';';
				}

				if ( isset($atts['responsive']['tablet_landscape_display']['yes']['position_right']) && $atts['responsive']['tablet_landscape_display']['yes']['position_right'] != '' ) {
					$margin_right = 'margin-right:'.(int)$atts['responsive']['tablet_landscape_display']['yes']['position_right'].$margin_unit.';';
				}

				if ( isset($atts['responsive']['tablet_landscape_display']['yes']['position_bottom']) && $atts['responsive']['tablet_landscape_display']['yes']['position_bottom'] != '' ) {
					$margin_bottom = 'margin-bottom:'.(int)$atts['responsive']['tablet_landscape_display']['yes']['position_bottom'].$margin_unit.';';
				}

				if ( isset($atts['responsive']['tablet_landscape_display']['yes']['position_left']) && $atts['responsive']['tablet_landscape_display']['yes']['position_left'] != '' ) {
					$margin_left = 'margin-left:'.(int)$atts['responsive']['tablet_landscape_display']['yes']['position_left'].$margin_unit.';';
				}

				if ($margin_top != '' || $margin_right != '' || $margin_bottom != '' || $margin_left != '') {
					$final_styles .= '@media only screen and (min-width: 992px) and (max-width: 1199px) {.tf-sh-' . $atts['unique_id'] . ' .fw-wrap-col-inner {'.$margin_top . $margin_right . $margin_bottom . $margin_left.'} }';
				}
			}

			// tablet portrait
			if ($atts['responsive']['tablet_display']['selected'] == 'yes') {
				$padding_top = $padding_right = $padding_bottom = $padding_left = '';
				$padding_unit = isset($atts['responsive']['tablet_display']['yes']['padding_unit']) ? $atts['responsive']['tablet_display']['yes']['padding_unit'] : 'px';
				// additional spacing
				if ($atts['responsive']['tablet_display']['yes']['padding_top'] != '') {
					$padding_top = 'padding-top:'.(int)$atts['responsive']['tablet_display']['yes']['padding_top'].$padding_unit.';';
				}

				if ($atts['responsive']['tablet_display']['yes']['padding_right'] != '') {
					$padding_right = 'padding-right:'.(int)$atts['responsive']['tablet_display']['yes']['padding_right'].$padding_unit.';';
				}

				if ($atts['responsive']['tablet_display']['yes']['padding_bottom'] != '') {
					$padding_bottom = 'padding-bottom:'.(int)$atts['responsive']['tablet_display']['yes']['padding_bottom'].$padding_unit.';';
				}

				if ($atts['responsive']['tablet_display']['yes']['padding_left'] != '') {
					$padding_left = 'padding-left:'.$atts['responsive']['tablet_display']['yes']['padding_left'].$padding_unit.';';
				}

				if ($padding_top != '' || $padding_right != '' || $padding_bottom != '' || $padding_left != '') {
					$final_styles .= '@media only screen and (min-width: 768px) and (max-width: 991px) { .tf-sh-' . $atts['unique_id'] . ' .fw-col-inner{'.$padding_top . $padding_right . $padding_bottom . $padding_left . '} }';
				}

				// margin
				$margin_top = $margin_right = $margin_bottom = $margin_left = '';
				$margin_unit = isset($atts['responsive']['tablet_display']['yes']['position_unit']) ? $atts['responsive']['tablet_display']['yes']['position_unit'] : 'px';
				if ( isset($atts['responsive']['tablet_display']['yes']['position_top']) && $atts['responsive']['tablet_display']['yes']['position_top'] != '' ) {
					$margin_top = 'margin-top:'.(int)$atts['responsive']['tablet_display']['yes']['position_top'].$margin_unit.';';
				}

				if ( isset($atts['responsive']['tablet_display']['yes']['position_right']) && $atts['responsive']['tablet_display']['yes']['position_right'] != '' ) {
					$margin_right = 'margin-right:'.(int)$atts['responsive']['tablet_display']['yes']['position_right'].$margin_unit.';';
				}

				if ( isset($atts['responsive']['tablet_display']['yes']['position_bottom']) && $atts['responsive']['tablet_display']['yes']['position_bottom'] != '' ) {
					$margin_bottom = 'margin-bottom:'.(int)$atts['responsive']['tablet_display']['yes']['position_bottom'].$margin_unit.';';
				}

				if ( isset($atts['responsive']['tablet_display']['yes']['position_left']) && $atts['responsive']['tablet_display']['yes']['position_left'] != '' ) {
					$margin_left = 'margin-left:'.(int)$atts['responsive']['tablet_display']['yes']['position_left'].$margin_unit.';';
				}

				if ($margin_top != '' || $margin_right != '' || $margin_bottom != '' || $margin_left != '') {
						$final_styles .= '@media only screen and (min-width: 768px) and (max-width: 991px) {.tf-sh-' . $atts['unique_id'] . ' .fw-wrap-col-inner {'.$margin_top . $margin_right . $margin_bottom . $margin_left.'} }';
					}
				}

			// smartphone responsive
			if ($atts['responsive']['smartphone_display']['selected'] == 'yes') {
				$padding_top = $padding_right = $padding_bottom = $padding_left = '';
				$padding_unit = isset($atts['responsive']['smartphone_display']['yes']['padding_unit']) ? $atts['responsive']['smartphone_display']['yes']['padding_unit'] : 'px';
				// additional spacing
				if ($atts['responsive']['smartphone_display']['yes']['padding_top'] != '') {
					$padding_top = 'padding-top:'.(int)$atts['responsive']['smartphone_display']['yes']['padding_top'].$padding_unit.';';
				}

				if ($atts['responsive']['smartphone_display']['yes']['padding_right'] != '') {
					$padding_right = 'padding-right:'.(int)$atts['responsive']['smartphone_display']['yes']['padding_right'].$padding_unit.';';
				}

				if ($atts['responsive']['smartphone_display']['yes']['padding_bottom'] != '') {
					$padding_bottom = 'padding-bottom:'.(int)$atts['responsive']['smartphone_display']['yes']['padding_bottom'].$padding_unit.';';
				}

				if ($atts['responsive']['smartphone_display']['yes']['padding_left'] != '') {
					$padding_left = 'padding-left:'.(int)$atts['responsive']['smartphone_display']['yes']['padding_left'].$padding_unit.';';
				}

				if ($padding_top != '' || $padding_right != '' || $padding_bottom != '' || $padding_left != '') {
					$final_styles .= '@media only screen and (max-width: 767px) { .tf-sh-' . $atts['unique_id'] . ' .fw-col-inner{'.$padding_top . $padding_right . $padding_bottom . $padding_left . '} }';
				}

				// margin
				$margin_top = $margin_right = $margin_bottom = $margin_left = '';
				$margin_unit = isset($atts['responsive']['smartphone_display']['yes']['position_unit']) ? $atts['responsive']['smartphone_display']['yes']['position_unit'] : 'px';
				if ( isset($atts['responsive']['smartphone_display']['yes']['position_top']) && $atts['responsive']['smartphone_display']['yes']['position_top'] != '' ) {
					$margin_top = 'margin-top:'.(int)$atts['responsive']['smartphone_display']['yes']['position_top'].$margin_unit.';';
				}

				if ( isset($atts['responsive']['smartphone_display']['yes']['position_right']) && $atts['responsive']['smartphone_display']['yes']['position_right'] != '' ) {
					$margin_right = 'margin-right:'.(int)$atts['responsive']['smartphone_display']['yes']['position_right'].$margin_unit.';';
				}

				if ( isset($atts['responsive']['smartphone_display']['yes']['position_bottom']) && $atts['responsive']['smartphone_display']['yes']['position_bottom'] != '' ) {
					$margin_bottom = 'margin-bottom:'.(int)$atts['responsive']['smartphone_display']['yes']['position_bottom'].$margin_unit.';';
				}

				if ( isset($atts['responsive']['smartphone_display']['yes']['position_left']) && $atts['responsive']['smartphone_display']['yes']['position_left'] != '' ) {
					$margin_left = 'margin-left:'.(int)$atts['responsive']['smartphone_display']['yes']['position_left'].$margin_unit.';';
				}

				if ($margin_top != '' || $margin_right != '' || $margin_bottom != '' || $margin_left != '') {
					$final_styles .= '@media only screen and (max-width: 767px) { .tf-sh-' . $atts['unique_id'] . ' .fw-wrap-col-inner {'.$margin_top . $margin_right . $margin_bottom . $margin_left.'} }';
				}
			}
		}

		if ( isset($atts['zindex']) && $atts['zindex'] != '' ) {
			$final_styles .= '.tf-sh-' . $atts['unique_id'] . '{ z-index:'.$atts['zindex'].' }';
		}

		if (empty($final_styles)) {
			return;
		}

		wp_add_inline_style(
			'fw-theme-style',
			$final_styles
		);
	}

	add_action(
		'fw_ext_shortcodes_enqueue_static:column',
		'_the_core_action_shortcode_column_enqueue_dynamic_css'
	);
endif;


if (!function_exists('_the_core_action_shortcode_countdown_enqueue_dynamic_css')):
	/**
	 * @internal
	 *
	 * @param array $data
	 */
	function _the_core_action_shortcode_countdown_enqueue_dynamic_css($data)
	{
		$shortcode = 'countdown';
		$atts = shortcode_parse_atts($data['atts_string']);

		/**
		 * Decode attributes
		 * ( The below weird code is because of this https://github.com/ThemeFuse/Unyson/issues/469 )
		 */
		$atts = fw_ext_shortcodes_decode_attr($atts, $shortcode, $data['post']->ID);
		$final_styles = '';
		$selected = $atts['format']['selected'];
		if (isset($atts['format'][$selected]['advanced_styling'])) {
			$numbers_advanced_styling = the_core_get_shortcode_advanced_styles($atts['format'][$selected]['advanced_styling']['numbers'], array('return_color' => true));
			if (!empty($numbers_advanced_styling['styles'])) {
				$final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .fw-countdown .fw-countdown-child span.numbers{' . $numbers_advanced_styling['styles'] . '}';
			}
			// responsive numbers styling
			$numbers_responsive_styles = the_core_responsive_heading_styles(array('styles' => $atts['format'][$selected]['advanced_styling']['numbers'], 'selector' => '.tf-sh-' . $atts['unique_id'] . ' .fw-countdown .fw-countdown-child span.numbers'));
			if (!empty($numbers_responsive_styles)) $final_styles .= '@media(max-width:767px){' . $numbers_responsive_styles . '}';

			if ($selected == 'fw-countdown-style-1' || $selected == 'fw-countdown-style-2') {
				$letters_advanced_styling = the_core_get_shortcode_advanced_styles($atts['format'][$selected]['advanced_styling']['letters'], array('return_color' => true));
				if (!empty($letters_advanced_styling['styles'])) {
					$final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .fw-countdown .fw-countdown-child span.letters{' . $letters_advanced_styling['styles'] . '}';
				}
				// responsive letters styling
				$letters_responsive_styles = the_core_responsive_heading_styles(array('styles' => $atts['format'][$selected]['advanced_styling']['letters'], 'selector' => '.tf-sh-' . $atts['unique_id'] . ' .fw-countdown .fw-countdown-child span.letters'));
				if (!empty($letters_responsive_styles)) $final_styles .= '@media(max-width:767px){' . $letters_responsive_styles . '}';
			}

			if ($selected == 'fw-countdown-style-1' && isset($atts['format']['fw-countdown-style-1']['advanced_styling']['background'])) {
				// bg color
				$bg_color = the_core_get_color_palette_color_and_class($atts['format']['fw-countdown-style-1']['advanced_styling']['background'], array('return_color' => true));
				if (!empty($bg_color['color'])) {
					$the_core_opacity = (int)$atts['format']['fw-countdown-style-1']['advanced_styling']['opacity'] / 100;
					$rgba = the_core_hex2rgba($bg_color['color'], $the_core_opacity);
					$final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .fw-countdown.fw-countdown-style-1 .fw-countdown-child{ background-color: ' . $rgba . ';}';
				}
				// additional padding
				$padding_top = (isset($atts['format']['fw-countdown-style-1']['advanced_styling']['padding_top']) && !empty($atts['format']['fw-countdown-style-1']['advanced_styling']['padding_top'])) ? 'padding-top:' . (int)esc_attr($atts['format']['fw-countdown-style-1']['advanced_styling']['padding_top']) . 'px;' : '';
				$padding_right = (isset($atts['format']['fw-countdown-style-1']['advanced_styling']['padding_right']) && !empty($atts['format']['fw-countdown-style-1']['advanced_styling']['padding_right'])) ? 'padding-right:' . (int)esc_attr($atts['format']['fw-countdown-style-1']['advanced_styling']['padding_right']) . 'px;' : '';
				$padding_bottom = (isset($atts['format']['fw-countdown-style-1']['advanced_styling']['padding_bottom']) && !empty($atts['format']['fw-countdown-style-1']['advanced_styling']['padding_bottom'])) ? 'padding-bottom:' . (int)esc_attr($atts['format']['fw-countdown-style-1']['advanced_styling']['padding_bottom']) . 'px;' : '';
				$padding_left = (isset($atts['format']['fw-countdown-style-1']['advanced_styling']['padding_left']) && !empty($atts['format']['fw-countdown-style-1']['advanced_styling']['padding_left'])) ? 'padding-left:' . (int)esc_attr($atts['format']['fw-countdown-style-1']['advanced_styling']['padding_left']) . 'px;' : '';

				if (!empty($padding_right) || !empty($padding_left) || !empty($padding_top) || !empty($padding_bottom)) {
					$final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .fw-countdown.fw-countdown-style-1 .fw-countdown-child{' . $padding_right . $padding_left . $padding_bottom . $padding_top . '}';
				}
			}
		}

		if (isset($atts['text_advanced_styling']['text'])) {
			$text_advanced_styling = the_core_get_shortcode_advanced_styles($atts['text_advanced_styling']['text'], array('return_color' => true));
			if (!empty($text_advanced_styling['styles'])) {
				$final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .fw-countdown-expired {' . $text_advanced_styling['styles'] . '}';
			}
			// responsive letters styling
			$text_responsive_styles = the_core_responsive_heading_styles(array('styles' => $atts['text_advanced_styling']['text'], 'selector' => '.tf-sh-' . $atts['unique_id'] . ' .fw-countdown-expired'));
			if (!empty($text_responsive_styles)) $final_styles .= '@media(max-width:767px){' . $text_responsive_styles . '}';
		}

		if (empty($final_styles)) {
			return;
		}

		wp_add_inline_style(
			'fw-theme-style',
			$final_styles
		);
	}

	add_action(
		'fw_ext_shortcodes_enqueue_static:countdown',
		'_the_core_action_shortcode_countdown_enqueue_dynamic_css'
	);
endif;


if (!function_exists('_the_core_action_shortcode_tab_slider_enqueue_dynamic_css')):
	/**
	 * @internal
	 *
	 * @param array $data
	 */
	function _the_core_action_shortcode_tab_slider_enqueue_dynamic_css($data) {
		$shortcode = 'tab_slider';
		$atts      = shortcode_parse_atts( $data['atts_string'] );

		/**
		 * Decode attributes
		 * ( The below weird code is because of this https://github.com/ThemeFuse/Unyson/issues/469 )
		 */
		$atts         = fw_ext_shortcodes_decode_attr( $atts, $shortcode, $data['post']->ID );
		$final_styles = '';

		// Tab title
		if ( isset($atts['tabs_advanced_styling']) ) {
			$tab_title_advanced_styles = the_core_get_shortcode_advanced_styles($atts['tabs_advanced_styling']['tab_title'], array('return_color' => true));
			$tab_title_styles = $tab_title_advanced_styles['styles'];

			if ( !empty($tab_title_styles) ) {
				$final_styles .= '.tf-sh-'.$atts['unique_id'] . '.fw-tabs-slider .fw-tabs-slider-nav li .fw-tabs-slider-nav-title {' . $tab_title_styles . '}';
				// responsive tab slider title styling
				$tab_title_responsive_styles = the_core_responsive_heading_styles( array('styles' => $atts['tabs_advanced_styling']['tab_title'], 'selector' => '.tf-sh-'.$atts['unique_id'] . '.fw-tabs-slider .fw-tabs-slider-nav li .fw-tabs-slider-nav-title') );
				if (!empty($tab_title_responsive_styles)) $final_styles .= '@media(max-width:767px){' . $tab_title_responsive_styles . '}';

				// icon color
				$title_color = the_core_get_color_palette_color_and_class($atts['tabs_advanced_styling']['tab_title']['color-palette'], array('return_color' => true));
				if ( !empty($title_color['color']) ) {
					$final_styles .= '.tf-sh-' . $atts['unique_id'] . '.fw-tabs-slider .fw-tabs-slider-nav li i {color:' . $title_color['color'] . ';}';
				}
			}

			// active tab title color
			$active_title_color = the_core_get_color_palette_color_and_class($atts['tabs_advanced_styling']['active_tab_title_color'], array('return_color' => true));
			if ( !empty($active_title_color['color']) ) {
				$final_styles .= '.tf-sh-'.$atts['unique_id'] . '.fw-tabs-slider .fw-tabs-slider-nav li.active .fw-tabs-slider-nav-title, .tf-sh-'.$atts['unique_id'] . '.fw-tabs-slider .fw-tabs-slider-nav li.active i, .tf-sh-'.$atts['unique_id'] . '.fw-tabs-slider .fw-tabs-slider-nav li:hover .fw-tabs-slider-nav-title, .tf-sh-'.$atts['unique_id'] . '.fw-tabs-slider .fw-tabs-slider-nav li:hover i {color:'.$active_title_color['color'].';}';
			}
		}

		// styling for each tab
		foreach ( $atts['tabs'] as $tab_key => $tab ) {
			// tab content title
			$tab_content_title_advanced_styles = the_core_get_shortcode_advanced_styles($tab['tab_advanced_styling']['tab_content_title'], array('return_color' => true));
			$tab_content_title = $tab_content_title_advanced_styles['styles'];

			if ( !empty($tab_content_title) ) {
				$final_styles .= '.fw-tabs-slider .fw-tabs-slider-content-wrap .tf-sh-'.esc_attr( $atts['unique_id'] ).'-'.$tab_key.' .fw-tabs-slider-content .fw-tabs-slider-title {' . $tab_content_title . '}';
				// responsive tab slider title styling
				$tab_content_title_responsive_styles = the_core_responsive_heading_styles( array('styles' => $tab['tab_advanced_styling']['tab_content_title'], 'selector' => '.fw-tabs-slider .fw-tabs-slider-content-wrap .tf-sh-'.esc_attr( $atts['unique_id'] ).'-'.$tab_key.' .fw-tabs-slider-content .fw-tabs-slider-title') );
				if (!empty($tab_content_title_responsive_styles)) $final_styles .= '@media(max-width:767px){' . $tab_content_title_responsive_styles . '}';

				// divider color
				$divider_title_color = the_core_get_color_palette_color_and_class($tab['tab_advanced_styling']['tab_content_title']['color-palette'], array('return_color' => true));
				if ( !empty($divider_title_color['color']) ) {
					$final_styles .= '.tf-sh-'.$atts['unique_id'] . '.fw-tabs-slider .fw-tabs-slider-content-wrap .tf-sh-'.esc_attr( $atts['unique_id'] ).'-'.$tab_key.' .fw-tabs-slider-content .fw-divider {border-color:' . $divider_title_color['color'] . ';}';
				}
			}

			// tab content text
			$tab_content_text_advanced_styles = the_core_get_shortcode_advanced_styles($tab['tab_advanced_styling']['tab_text'], array('return_color' => true));
			$tab_content_text = $tab_content_text_advanced_styles['styles'];

			if ( !empty($tab_content_text) ) {
				$final_styles .= '.fw-tabs-slider .fw-tabs-slider-content-wrap .tf-sh-'.esc_attr( $atts['unique_id'] ).'-'.$tab_key.' .fw-tabs-slider-content .fw-tabs-slider-description, .fw-tabs-slider .fw-tabs-slider-content-wrap .tf-sh-'.esc_attr( $atts['unique_id'] ).'-'.$tab_key.' .fw-tabs-slider-content .fw-tabs-slider-description p {' . $tab_content_text . '}';
				// responsive tab slider title styling
				$tab_content_text_responsive_styles = the_core_responsive_heading_styles( array('styles' => $tab['tab_advanced_styling']['tab_text'], 'selector' => '.fw-tabs-slider .fw-tabs-slider-content-wrap .tf-sh-'.esc_attr( $atts['unique_id'] ).'-'.$tab_key.' .fw-tabs-slider-content .fw-tabs-slider-description') );
				if (!empty($tab_content_text_responsive_styles)) $final_styles .= '@media(max-width:767px){' . $tab_content_text_responsive_styles . '}';
			}

			// icon size
			if( !empty($tab['icon_size']) ) {
				$final_styles .= '.tf-sh-' . $atts['unique_id'] . '.fw-tabs-slider .fw-tabs-slider-nav li.tf-sh-'.esc_attr( $atts['unique_id'] ).'-'.$tab_key.' i {font-size: '.(int)$tab['icon_size'].'px;}';
				$final_styles .= '.tf-sh-' . $atts['unique_id'] . '.fw-tabs-slider .fw-tabs-slider-nav li.tf-sh-'.esc_attr( $atts['unique_id'] ).'-'.$tab_key.' img {width: '.(int)$tab['icon_size'].'px; height: '.(int)$tab['icon_size'].'px;}';
			}

			// tab separator
			if( $tab['separator'] == 'yes' ) {
				$divider_styling = '';
				// width
				if ( $tab['separator_styling']['width']['selected'] == 'custom' ) {
					$divider_styling .= ' width:' . esc_attr( $tab['separator_styling']['width']['custom']['custom_width'] ) . 'px;';
				} elseif ( $tab['separator_styling']['width']['selected'] == '100' ) {
					$divider_styling .= ' width: auto;';
				} else {
					$divider_styling .= ' width:' . esc_attr( $tab['separator_styling']['width']['selected'] ) . '%;';
				}

				// size
				if ( $tab['separator_styling']['divider_size']['size'] == 'custom' ) {
					$divider_styling .= ' padding-top:' . (int) $tab['separator_styling']['divider_size']['custom']['margin_top'] . 'px;' . ' margin-bottom:' . (int) $tab['separator_styling']['divider_size']['custom']['margin_bottom'] . 'px;';
				}

				// line thickness
				if ( !empty($tab['separator_styling']['line_thickness']) ) {
					$divider_styling .= ' border-width: '.(int)$tab['separator_styling']['line_thickness'].'px;';
				}

				// divider color
				$divider_title_color = the_core_get_color_palette_color_and_class($tab['separator_styling']['separator_color'], array('return_color' => true));
				if ( !empty($divider_title_color['color']) ) {
					$divider_styling .= ' border-color:' . $divider_title_color['color'] . ';';
				}

				if( !empty($divider_styling) ) {
					$final_styles .= '.tf-sh-'.$atts['unique_id'] . '.fw-tabs-slider .fw-tabs-slider-content-wrap .tf-sh-'.esc_attr( $atts['unique_id'] ).'-'.$tab_key.' .fw-tabs-slider-content .fw-divider {' . $divider_styling . '}';
				}
			}

			// button styling
			if ( $tab['show_bnt'] == 'yes' ) {
				if ( isset($tab['button_options']['style']['selected']) ) {
					if ($tab['button_options']['style']['selected'] == 'fw-btn-3') {
						if (isset($tab['button_options']['style']['fw-btn-3']['border_size']) && !empty($tab['button_options']['style']['fw-btn-3']['border_size'])) {
							$final_styles .= '.tf-sh-' . $tab['button_options']['unique_id'] . ',.tf-sh-' . $tab['button_options']['unique_id'] . ':focus{ border-top-width: ' . (int)$tab['button_options']['style']['fw-btn-3']['border_size'] . 'px; border-bottom-width: ' . (int)$tab['button_options']['style']['fw-btn-3']['border_size'] . 'px; }';
						}
						// btn color
						if (isset($tab['button_options']['normal_color'])) {
							$normal_color = the_core_get_color_palette_color_and_class($tab['button_options']['normal_color'], array('return_color' => true));
							if (!empty($normal_color['color'])) $final_styles .= '.tf-sh-' . $tab['button_options']['unique_id'] . ',.tf-sh-' . $tab['button_options']['unique_id'] . ':focus{ border-bottom-color: ' . $normal_color['color'] . '; border-top-color: ' . $normal_color['color'] . ' }';
						}
						// hover color
						if (isset($tab['button_options']['hover_color'])) {
							$hover_color = the_core_get_color_palette_color_and_class($tab['button_options']['hover_color'], array('return_color' => true));
							if (!empty($hover_color['color'])) $final_styles .= '.tf-sh-' . $tab['button_options']['unique_id'] . ':hover { background-color: ' . $hover_color['color'] . '; border-bottom-color: ' . $hover_color['color'] . '; border-top-color: ' . $hover_color['color'] . ' }';
						}
					} elseif ($tab['button_options']['style']['selected'] == 'fw-btn-2') {
						if (isset($tab['button_options']['style']['fw-btn-2']['border_size']) && !empty($tab['button_options']['style']['fw-btn-2']['border_size'])) {
							$final_styles .= '.tf-sh-' . $tab['button_options']['unique_id'] . '{ border-width: ' . (int)$tab['button_options']['style']['fw-btn-2']['border_size'] . 'px; }';
						}
						if (isset($tab['button_options']['style']['fw-btn-2']['border_radius']) && !empty($tab['button_options']['style']['fw-btn-2']['border_radius'])) {
							$final_styles .= '.tf-sh-' . $tab['button_options']['unique_id'] . '{ border-radius: ' . (int)$tab['button_options']['style']['fw-btn-2']['border_radius'] . 'px; }';
						}

						// btn color
						if (isset($tab['button_options']['normal_color'])) {
							$normal_color = the_core_get_color_palette_color_and_class($tab['button_options']['normal_color'], array('return_color' => true));
							if (!empty($normal_color['color'])) $final_styles .= '.tf-sh-' . $tab['button_options']['unique_id'] . ',.tf-sh-' . $tab['button_options']['unique_id'] . ':focus{ border-color: ' . $normal_color['color'] . ' }';
						}
						// hover color
						if (isset($tab['button_options']['hover_color'])) {
							$hover_color = the_core_get_color_palette_color_and_class($tab['button_options']['hover_color'], array('return_color' => true));
							if (!empty($hover_color['color'])) $final_styles .= '.tf-sh-' . $tab['button_options']['unique_id'] . ':hover { background-color: ' . $hover_color['color'] . '; border-color: ' . $hover_color['color'] . ' }';
						}
					} elseif ($tab['button_options']['style']['selected'] == 'fw-btn-1') {
						if (isset($tab['button_options']['style']['fw-btn-1']['border_radius']) && !empty($tab['button_options']['style']['fw-btn-1']['border_radius'])) {
							$final_styles .= '.tf-sh-' . $tab['button_options']['unique_id'] . '{ border-radius: ' . (int)$tab['button_options']['style']['fw-btn-1']['border_radius'] . 'px; }';
						}

						// btn color
						if (isset($tab['button_options']['normal_color'])) {
							$normal_color = the_core_get_color_palette_color_and_class($tab['button_options']['normal_color'], array('return_color' => true));
							if (!empty($normal_color['color'])) $final_styles .= '.tf-sh-' . $tab['button_options']['unique_id'] . ', .tf-sh-' . $tab['button_options']['unique_id'] . ':focus{ background-color: ' . $normal_color['color'] . ' }';
						}
						// hover color
						if (isset($tab['button_options']['hover_color'])) {
							$hover_color = the_core_get_color_palette_color_and_class($tab['button_options']['hover_color'], array('return_color' => true));
							if (!empty($hover_color['color'])) $final_styles .= '.tf-sh-' . $tab['button_options']['unique_id'] . ':hover { background-color: ' . $hover_color['color'] . ' }';
						}

					}
				}

				// advanced styling
				if (isset($tab['button_options']['label_advanced_styling'])) {
					// title advanced styling
					$text_advanced_styling = the_core_get_shortcode_advanced_styles($tab['button_options']['label_advanced_styling']['text'], array('return_color' => true));
					if (!empty($text_advanced_styling['styles'])) $final_styles .= '.tf-sh-' . $tab['button_options']['unique_id'] . ', .tf-sh-' . $tab['button_options']['unique_id'] . ':focus {' . $text_advanced_styling['styles'] . '}';
					// responsive title styling
					$title_responsive_styles = the_core_responsive_heading_styles(array('styles' => $tab['button_options']['label_advanced_styling']['text'], 'selector' => '.tf-sh-' . $tab['button_options']['unique_id']));
					if (!empty($title_responsive_styles)) $final_styles .= '@media(max-width:767px){' . $title_responsive_styles . '}';

					// hover text color
					if (isset($tab['button_options']['label_advanced_styling']['hover_text_color'])) {
						$hover_text_color = the_core_get_color_palette_color_and_class($tab['button_options']['label_advanced_styling']['hover_text_color'], array('return_color' => true));
						if (!empty($hover_text_color['color'])) $final_styles .= '.tf-sh-' . $tab['button_options']['unique_id'] . ':hover { color: ' . $hover_text_color['color'] . ' }';
					}
				}
			}
		}

		// content padding
		$atts['padding_top'] = (int)$atts['padding_top'];
		$atts['padding_right'] = (int)$atts['padding_right'];
		$atts['padding_bottom'] = (int)$atts['padding_bottom'];
		$atts['padding_left'] = (int)$atts['padding_left'];
		if ($atts['padding_top'] != 0 || $atts['padding_right'] != 0 || $atts['padding_bottom'] != 0 || $atts['padding_left'] != 0) {
			$final_styles .= '.tf-sh-' . $atts['unique_id'] . '.fw-tabs-slider .fw-tabs-slider-content-wrap .fw-tabs-slider-content { padding: ' . $atts['padding_top'] . 'px ' . $atts['padding_right'] . 'px ' . $atts['padding_bottom'] . 'px ' . $atts['padding_left'] . 'px;}';
		}

		if (empty($final_styles)) {
			return;
		}

		wp_add_inline_style(
			'fw-theme-style',
			$final_styles
		);
	}
	add_action( 'fw_ext_shortcodes_enqueue_static:tab_slider', '_the_core_action_shortcode_tab_slider_enqueue_dynamic_css' );
endif;


if (!function_exists('_the_core_action_shortcode_flip_box_enqueue_dynamic_css')):
	/**
	 * @internal
	 *
	 * @param array $data
	 */
	function _the_core_action_shortcode_flip_box_enqueue_dynamic_css($data) {
		$shortcode = 'flip_box';
		$atts      = shortcode_parse_atts( $data['atts_string'] );

		/**
		 * Decode attributes
		 * ( The below weird code is because of this https://github.com/ThemeFuse/Unyson/issues/469 )
		 */
		$atts         = fw_ext_shortcodes_decode_attr( $atts, $shortcode, $data['post']->ID );
		$final_styles = '';
		if( !empty($atts['border_radius']) ) {
			$final_styles .= '.tf-sh-'.$atts['unique_id'].' .fw-flip-box-front, .tf-sh-'.$atts['unique_id'].' .fw-flip-box-back, .tf-sh-'.$atts['unique_id'].' .fw-main-row-overlay {border-radius: '.(int)$atts['border_radius'].'px;}';
		}

		// front box
		if( $atts['front']['icon_type']['selected'] == 'icon_class' ) {
			// size
			$final_styles .= '.tf-sh-'.$atts['unique_id'].' .fw-flip-box-front .fw-flip-box-icon i {font-size: '.(int)$atts['front']['icon_type']['icon_class']['size'].'px;}';
			// color
			$icon_color = the_core_get_color_palette_color_and_class($atts['front']['icon_type']['icon_class']['color'], array('return_color' => true));
			if( !empty($icon_color['color']) ) {
				$final_styles .= '.tf-sh-'.$atts['unique_id'].' .fw-flip-box-front .fw-flip-box-icon i {color: ' . $icon_color['color'] . '}';
			}
		}
		elseif( $atts['front']['icon_type']['selected'] == 'icon_upload' ) {
			// size
			$final_styles .= '.tf-sh-'.$atts['unique_id'].' .fw-flip-box-front .fw-flip-box-icon {width: '.(int)$atts['front']['icon_type']['icon_upload']['size'].'px;}';
		}

		// front border
		if( $atts['front']['border']['selected'] == 'yes' && !empty( $atts['front']['border']['yes']['border_size'] ) ) {
			$final_styles .= '.tf-sh-'.$atts['unique_id'].' .fw-flip-box-front { border-style: solid; border-width: '.(int)$atts['front']['border']['yes']['border_size'].'px;}';
			$front_border_color = the_core_get_color_palette_color_and_class($atts['front']['border']['yes']['border_color'] , array('return_color' => true));
			if( !empty($front_border_color['color']) ) {
				$final_styles .= '.tf-sh-'.$atts['unique_id'].' .fw-flip-box-front {border-color: ' . $front_border_color['color'] . '}';
			}
		}

		// front background
		if( $atts['front']['background']['background'] == 'color' ) {
			$bg_color = the_core_get_color_palette_color_and_class($atts['front']['background']['color']['background_color'] , array('return_color' => true));
			if( !empty($bg_color['color']) ) {
				$final_styles .= '.tf-sh-'.$atts['unique_id'].' .fw-flip-box-front {background-color: ' . $bg_color['color'] . '}';
			}
		}
		elseif( $atts['front']['background']['background'] == 'gradient_color' ) {
			$gradient_orientation = $filter = '';
			$gradient = 'linear-gradient';
			$gradient_type = '1';
			if( $atts['front']['background']['gradient_color']['gradient_orientation'] == 'horizontal' ) {
				$gradient_orientation = 'left';
				$filter = 'to right';
			}
			elseif( $atts['front']['background']['gradient_color']['gradient_orientation'] == 'vertical' ) {
				$gradient_orientation = 'top';
				$filter = 'to bottom';
				$gradient_type = '0';
			}
			elseif( $atts['front']['background']['gradient_color']['gradient_orientation'] == 'diagonal' ) {
				$gradient_orientation = '-45deg';
				$filter = '135de';
			}
			elseif( $atts['front']['background']['gradient_color']['gradient_orientation'] == 'diagonal_bottom' ) {
				$gradient_orientation = '45deg';
				$filter = '45deg';
			}
			elseif( $atts['front']['background']['gradient_color']['gradient_orientation'] == 'radial' ) {
				$gradient = 'radial-gradient';
				$gradient_orientation = 'center, ellipse cover';
				$filter = 'ellipse at center';
			}

			$final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .fw-flip-box-front{
				background: '.$atts['front']['background']['gradient_color']['gradient_bg_color']['primary'].';
				background: -moz-'.$gradient.'('.$gradient_orientation.', '.$atts['front']['background']['gradient_color']['gradient_bg_color']['primary'].' 0%, '.$atts['front']['background']['gradient_color']['gradient_bg_color']['secondary'].' 100%);
				background: -webkit-'.$gradient.'('.$gradient_orientation.', '.$atts['front']['background']['gradient_color']['gradient_bg_color']['primary'].' 0%,'.$atts['front']['background']['gradient_color']['gradient_bg_color']['secondary'].' 100%);
				background: '.$gradient.'('.$filter.', '.$atts['front']['background']['gradient_color']['gradient_bg_color']['primary'].' 0%,'.$atts['front']['background']['gradient_color']['gradient_bg_color']['secondary'].' 100%);
				filter: progid:DXImageTransform.Microsoft.gradient( startColorstr="'.$atts['front']['background']['gradient_color']['gradient_bg_color']['primary'].'", endColorstr="'.$atts['front']['background']['gradient_color']['gradient_bg_color']['secondary'].'",GradientType='.$gradient_type.' );
			}';
		}
		elseif( $atts['front']['background']['background'] == 'image' ) {
			$final_styles .= '.tf-sh-'.$atts['unique_id'].' .fw-flip-box-front {';
				$bg_color = the_core_get_color_palette_color_and_class($atts['front']['background']['image']['background_color'] , array('return_color' => true));
				if( !empty($bg_color['color']) ) {
					$final_styles .= 'background-color: ' . $bg_color['color'].';';
				}
				$final_styles .= ' background-image:url(' . $atts['front']['background']['image']['background_image']['data']['icon'] . ');';
				$final_styles .= ' background-repeat: ' . $atts['front']['background']['image']['repeat'] . ';';
				$final_styles .= ' background-position: ' . $atts['front']['background']['image']['bg_position_x'] . ' ' . $atts['front']['background']['image']['bg_position_y'] . ';';
				$final_styles .= ' background-size: ' . $atts['front']['background']['image']['bg_size'] . ';';
			$final_styles .= '}';
		}

		// front button options
		if ( $atts['front']['show_bnt'] == 'yes' ) {
			if ( isset( $atts['front']['front_button']['label_advanced_styling'] ) ) {
				// button label advanced styling
				$label_advanced_styling = the_core_get_shortcode_advanced_styles( $atts['front']['front_button']['label_advanced_styling']['text'], array( 'return_color' => true ) );
				if ( ! empty( $label_advanced_styling['styles'] ) ) {
					$final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .fw-flip-box-front .fw-btn span {' . $label_advanced_styling['styles'] . '}';
				}
				// responsive label styling
				$label_responsive_styles = the_core_responsive_heading_styles( array(
					'styles'   => $atts['front']['front_button']['label_advanced_styling']['text'],
					'selector' => '.tf-sh-' . $atts['unique_id'] . ' .fw-flip-box-front .fw-btn span'
				) );
				if ( ! empty( $label_responsive_styles ) ) {
					$final_styles .= '@media(max-width:767px){' . $label_responsive_styles . '}';
				}

				// label text hover
				$hover_text_color = the_core_get_color_palette_color_and_class( $atts['front']['front_button']['label_advanced_styling']['hover_text_color'], array( 'return_color' => true ) );
				if ( ! empty( $hover_text_color['color'] ) ) {
					$final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .fw-flip-box-front .fw-btn:hover span' . '{ color: ' . $hover_text_color['color'] . ' !important }';
				}
			}

			if ( isset( $atts['front']['front_button']['style']['selected'] ) ) {
				if ( $atts['front']['front_button']['style']['selected'] == 'fw-btn-3' ) {
					if ( isset( $atts['front']['front_button']['style']['fw-btn-3']['border_size'] ) && ! empty( $atts['front']['front_button']['style']['fw-btn-3']['border_size'] ) ) {
						$final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .fw-flip-box-front .fw-btn{ border-top-width: ' . (int) $atts['front']['front_button']['style']['fw-btn-3']['border_size'] . 'px; border-bottom-width: ' . (int) $atts['front']['front_button']['style']['fw-btn-3']['border_size'] . 'px; }';
					}
					// btn color
					if ( isset( $atts['front']['front_button']['normal_color'] ) ) {
						$normal_color = the_core_get_color_palette_color_and_class( $atts['front']['front_button']['normal_color'], array( 'return_color' => true ) );
						if ( ! empty( $normal_color['color'] ) ) {
							$final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .fw-flip-box-front .fw-btn{ border-bottom-color: ' . $normal_color['color'] . '; border-top-color: ' . $normal_color['color'] . ' }';
						}
					}
					// hover color
					if ( isset( $atts['front']['front_button']['hover_color'] ) ) {
						$hover_color = the_core_get_color_palette_color_and_class( $atts['front']['front_button']['hover_color'], array( 'return_color' => true ) );
						if ( ! empty( $hover_color['color'] ) ) {
							$final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .fw-flip-box-front .fw-btn:hover, .tf-sh-' . $atts['unique_id'] . ' .fw-flip-box-front .fw-btn:focus { background-color: ' . $hover_color['color'] . '; border-bottom-color: ' . $hover_color['color'] . '; border-top-color: ' . $hover_color['color'] . ' }';
						}
					}
				} elseif ( $atts['front']['front_button']['style']['selected'] == 'fw-btn-2' ) {
					if ( isset( $atts['front']['front_button']['style']['fw-btn-2']['border_size'] ) && ! empty( $atts['front']['front_button']['style']['fw-btn-2']['border_size'] ) ) {
						$final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .fw-flip-box-front .fw-btn{ border-width: ' . (int) $atts['front']['front_button']['style']['fw-btn-2']['border_size'] . 'px; }';
					}
					if ( isset( $atts['front']['front_button']['style']['fw-btn-2']['border_radius'] ) && ! empty( $atts['front']['front_button']['style']['fw-btn-2']['border_radius'] ) ) {
						$final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .fw-flip-box-front .fw-btn{ border-radius: ' . (int) $atts['front']['front_button']['style']['fw-btn-2']['border_radius'] . 'px; }';
					}

					// btn color
					if ( isset( $atts['front']['front_button']['normal_color'] ) ) {
						$normal_color = the_core_get_color_palette_color_and_class( $atts['front']['front_button']['normal_color'], array( 'return_color' => true ) );
						if ( ! empty( $normal_color['color'] ) ) {
							$final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .fw-flip-box-front .fw-btn{ border-color: ' . $normal_color['color'] . ' }';
						}
					}
					// hover color
					if ( isset( $atts['front']['front_button']['hover_color'] ) ) {
						$hover_color = the_core_get_color_palette_color_and_class( $atts['front']['front_button']['hover_color'], array( 'return_color' => true ) );
						if ( ! empty( $hover_color['color'] ) ) {
							$final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .fw-flip-box-front .fw-btn:hover { background-color: ' . $hover_color['color'] . '; border-color: ' . $hover_color['color'] . ' }';
						}
					}
				} elseif ( $atts['front']['front_button']['style']['selected'] == 'fw-btn-1' ) {
					if ( isset( $atts['front']['front_button']['style']['fw-btn-1']['border_radius'] ) && ! empty( $atts['front']['front_button']['style']['fw-btn-1']['border_radius'] ) ) {
						$final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .fw-flip-box-front .fw-btn{ border-radius: ' . (int) $atts['front']['front_button']['style']['fw-btn-1']['border_radius'] . 'px; }';
					}

					// btn color
					if ( isset( $atts['front']['front_button']['normal_color'] ) ) {
						$normal_color = the_core_get_color_palette_color_and_class( $atts['front']['front_button']['normal_color'], array( 'return_color' => true ) );
						if ( ! empty( $normal_color['color'] ) ) {
							$final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .fw-flip-box-front .fw-btn{ background-color: ' . $normal_color['color'] . ' }';
						}
					}
					// hover color
					if ( isset( $atts['front']['front_button']['hover_color'] ) ) {
						$hover_color = the_core_get_color_palette_color_and_class( $atts['front']['front_button']['hover_color'], array( 'return_color' => true ) );
						if ( ! empty( $hover_color['color'] ) ) {
							$final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .fw-flip-box-front .fw-btn:hover { background-color: ' . $hover_color['color'] . ' }';
						}
					}

				}
			}
		}

		// front styling
		// title advanced styling
		$title_advanced_styling = the_core_get_shortcode_advanced_styles($atts['front']['title_styling']['title'], array('return_color' => true));
		if ( !empty($title_advanced_styling['styles']) ) $final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .fw-flip-box-front .fw-flip-box-title{' . $title_advanced_styling['styles'] . '}';
		// responsive title styling
		$title_responsive_styles = the_core_responsive_heading_styles(array('styles' => $atts['front']['title_styling']['title'], 'selector' => '.tf-sh-' . $atts['unique_id'] . ' .fw-flip-box-front .fw-flip-box-title' ) );
		if( !empty($title_responsive_styles) ) $final_styles .= '@media(max-width:767px){' . $title_responsive_styles . '}';

		// description advanced styling
		$description_advanced_styling = the_core_get_shortcode_advanced_styles($atts['front']['description_styling']['description'], array('return_color' => true));
		if ( !empty($description_advanced_styling['styles']) ) $final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .fw-flip-box-front .fw-flip-description, .tf-sh-' . $atts['unique_id'] . ' .fw-flip-box-front .fw-flip-description p{' . $description_advanced_styling['styles'] . '}';
		// responsive description styling
		$description_responsive_styles = the_core_responsive_heading_styles(array('styles' => $atts['front']['title_styling']['title'], 'selector' => '.tf-sh-' . $atts['unique_id'] . ' .fw-flip-box-front .fw-flip-description, .tf-sh-' . $atts['unique_id'] . ' .fw-flip-box-front .fw-flip-description p' ) );
		if( !empty($description_responsive_styles) ) $final_styles .= '@media(max-width:767px){' . $description_responsive_styles . '}';


		// back box
		if( $atts['back']['icon_type']['selected'] == 'icon_class' ) {
			// size
			$final_styles .= '.tf-sh-'.$atts['unique_id'].' .fw-flip-box-back .fw-flip-box-icon i {font-size: '.(int)$atts['back']['icon_type']['icon_class']['size'].'px;}';
			// color
			$back_icon_color = the_core_get_color_palette_color_and_class($atts['back']['icon_type']['icon_class']['color'], array('return_color' => true));
			if( !empty($back_icon_color['color']) ) {
				$final_styles .= '.tf-sh-'.$atts['unique_id'].' .fw-flip-box-back .fw-flip-box-icon i {color: ' . $back_icon_color['color'] . '}';
			}
		}
		elseif( $atts['back']['icon_type']['selected'] == 'icon_upload' ) {
			// size
			$final_styles .= '.tf-sh-'.$atts['unique_id'].' .fw-flip-box-back .fw-flip-box-icon {width: '.(int)$atts['back']['icon_type']['icon_upload']['size'].'px;}';
		}

		// back border
		if( $atts['back']['border']['selected'] == 'yes' && !empty( $atts['back']['border']['yes']['border_size'] ) ) {
			$final_styles .= '.tf-sh-'.$atts['unique_id'].' .fw-flip-box-back { border-style: solid; border-width: '.(int)$atts['back']['border']['yes']['border_size'].'px;}';
			$back_border_color = the_core_get_color_palette_color_and_class($atts['back']['border']['yes']['border_color'] , array('return_color' => true));
			if( !empty($back_border_color['color']) ) {
				$final_styles .= '.tf-sh-'.$atts['unique_id'].' .fw-flip-box-back {border-color: ' . $back_border_color['color'] . '}';
			}
		}

		// back background
		if( $atts['back']['background']['background'] == 'color' ) {
			$bg_color = the_core_get_color_palette_color_and_class($atts['back']['background']['color']['background_color'] , array('return_color' => true));
			if( !empty($bg_color['color']) ) {
				$final_styles .= '.tf-sh-'.$atts['unique_id'].' .fw-flip-box-back {background-color: ' . $bg_color['color'] . '}';
			}
		}
		elseif( $atts['back']['background']['background'] == 'gradient_color' ) {
			$gradient_orientation = $filter = '';
			$gradient = 'linear-gradient';
			$gradient_type = '1';
			if( $atts['back']['background']['gradient_color']['gradient_orientation'] == 'horizontal' ) {
				$gradient_orientation = 'left';
				$filter = 'to right';
			}
			elseif( $atts['back']['background']['gradient_color']['gradient_orientation'] == 'vertical' ) {
				$gradient_orientation = 'top';
				$filter = 'to bottom';
				$gradient_type = '0';
			}
			elseif( $atts['back']['background']['gradient_color']['gradient_orientation'] == 'diagonal' ) {
				$gradient_orientation = '-45deg';
				$filter = '135de';
			}
			elseif( $atts['back']['background']['gradient_color']['gradient_orientation'] == 'diagonal_bottom' ) {
				$gradient_orientation = '45deg';
				$filter = '45deg';
			}
			elseif( $atts['back']['background']['gradient_color']['gradient_orientation'] == 'radial' ) {
				$gradient = 'radial-gradient';
				$gradient_orientation = 'center, ellipse cover';
				$filter = 'ellipse at center';
			}

			$final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .fw-flip-box-back{
				background: '.$atts['back']['background']['gradient_color']['gradient_bg_color']['primary'].';
				background: -moz-'.$gradient.'('.$gradient_orientation.', '.$atts['back']['background']['gradient_color']['gradient_bg_color']['primary'].' 0%, '.$atts['back']['background']['gradient_color']['gradient_bg_color']['secondary'].' 100%);
				background: -webkit-'.$gradient.'('.$gradient_orientation.', '.$atts['back']['background']['gradient_color']['gradient_bg_color']['primary'].' 0%,'.$atts['back']['background']['gradient_color']['gradient_bg_color']['secondary'].' 100%);
				background: '.$gradient.'('.$filter.', '.$atts['back']['background']['gradient_color']['gradient_bg_color']['primary'].' 0%,'.$atts['back']['background']['gradient_color']['gradient_bg_color']['secondary'].' 100%);
				filter: progid:DXImageTransform.Microsoft.gradient( startColorstr="'.$atts['back']['background']['gradient_color']['gradient_bg_color']['primary'].'", endColorstr="'.$atts['back']['background']['gradient_color']['gradient_bg_color']['secondary'].'",GradientType='.$gradient_type.' );
			}';
		}
		elseif( $atts['back']['background']['background'] == 'image' ) {
			$final_styles .= '.tf-sh-'.$atts['unique_id'].' .fw-flip-box-back {';
			$bg_color = the_core_get_color_palette_color_and_class($atts['back']['background']['image']['background_color'] , array('return_color' => true));
			if( !empty($bg_color['color']) ) {
				$final_styles .= 'background-color: ' . $bg_color['color'].';';
			}
			$final_styles .= ' background-image:url(' . $atts['back']['background']['image']['background_image']['data']['icon'] . ');';
			$final_styles .= ' background-repeat: ' . $atts['back']['background']['image']['repeat'] . ';';
			$final_styles .= ' background-position: ' . $atts['back']['background']['image']['bg_position_x'] . ' ' . $atts['back']['background']['image']['bg_position_y'] . ';';
			$final_styles .= ' background-size: ' . $atts['back']['background']['image']['bg_size'] . ';';
			$final_styles .= '}';
		}

		// back styling
		// back title advanced styling
		$title_back_advanced_styling = the_core_get_shortcode_advanced_styles($atts['back']['title_styling']['title'], array('return_color' => true));
		if ( !empty($title_back_advanced_styling['styles']) ) $final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .fw-flip-box-back .fw-flip-box-title{' . $title_back_advanced_styling['styles'] . '}';
		// back responsive title styling
		$title_back_responsive_styles = the_core_responsive_heading_styles(array('styles' => $atts['back']['title_styling']['title'], 'selector' => '.tf-sh-' . $atts['unique_id'] . ' .fw-flip-box-back .fw-flip-box-title' ) );
		if( !empty($title_back_responsive_styles) ) $final_styles .= '@media(max-width:767px){' . $title_back_responsive_styles . '}';

		// back description advanced styling
		$description_back_advanced_styling = the_core_get_shortcode_advanced_styles($atts['back']['description_styling']['description'], array('return_color' => true));
		if ( !empty($description_back_advanced_styling['styles']) ) $final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .fw-flip-box-back .fw-flip-description, .tf-sh-' . $atts['unique_id'] . ' .fw-flip-box-back .fw-flip-description p{' . $description_back_advanced_styling['styles'] . '}';
		// back responsive description styling
		$description_back_responsive_styles = the_core_responsive_heading_styles(array('styles' => $atts['back']['title_styling']['title'], 'selector' => '.tf-sh-' . $atts['unique_id'] . ' .fw-flip-box-back .fw-flip-description, .tf-sh-' . $atts['unique_id'] . ' .fw-flip-box-back .fw-flip-description p' ) );
		if( !empty($description_back_responsive_styles) ) $final_styles .= '@media(max-width:767px){' . $description_back_responsive_styles . '}';

		// back button options
		if ( $atts['back']['show_bnt'] == 'yes' ) {
			if ( isset( $atts['back']['back_button']['label_advanced_styling'] ) ) {
				// button label advanced styling
				$label_advanced_styling = the_core_get_shortcode_advanced_styles( $atts['back']['back_button']['label_advanced_styling']['text'], array( 'return_color' => true ) );
				if ( ! empty( $label_advanced_styling['styles'] ) ) {
					$final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .fw-flip-box-back .fw-btn span {' . $label_advanced_styling['styles'] . '}';
				}
				// responsive label styling
				$label_responsive_styles = the_core_responsive_heading_styles( array(
					'styles'   => $atts['back']['back_button']['label_advanced_styling']['text'],
					'selector' => '.tf-sh-' . $atts['unique_id'] . ' .fw-flip-box-back .fw-btn span'
				) );
				if ( ! empty( $label_responsive_styles ) ) {
					$final_styles .= '@media(max-width:767px){' . $label_responsive_styles . '}';
				}

				// label text hover
				$hover_text_color = the_core_get_color_palette_color_and_class( $atts['back']['back_button']['label_advanced_styling']['hover_text_color'], array( 'return_color' => true ) );
				if ( ! empty( $hover_text_color['color'] ) ) {
					$final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .fw-flip-box-back .fw-btn:hover span' . '{ color: ' . $hover_text_color['color'] . ' !important }';
				}
			}

			if ( isset( $atts['back']['back_button']['style']['selected'] ) ) {
				if ( $atts['back']['back_button']['style']['selected'] == 'fw-btn-3' ) {
					if ( isset( $atts['back']['back_button']['style']['fw-btn-3']['border_size'] ) && ! empty( $atts['back']['back_button']['style']['fw-btn-3']['border_size'] ) ) {
						$final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .fw-flip-box-back .fw-btn{ border-top-width: ' . (int) $atts['back']['back_button']['style']['fw-btn-3']['border_size'] . 'px; border-bottom-width: ' . (int) $atts['back']['back_button']['style']['fw-btn-3']['border_size'] . 'px; }';
					}
					// btn color
					if ( isset( $atts['back']['back_button']['normal_color'] ) ) {
						$normal_color = the_core_get_color_palette_color_and_class( $atts['back']['back_button']['normal_color'], array( 'return_color' => true ) );
						if ( ! empty( $normal_color['color'] ) ) {
							$final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .fw-flip-box-back .fw-btn{ border-bottom-color: ' . $normal_color['color'] . '; border-top-color: ' . $normal_color['color'] . ' }';
						}
					}
					// hover color
					if ( isset( $atts['back']['back_button']['hover_color'] ) ) {
						$hover_color = the_core_get_color_palette_color_and_class( $atts['back']['back_button']['hover_color'], array( 'return_color' => true ) );
						if ( ! empty( $hover_color['color'] ) ) {
							$final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .fw-flip-box-back .fw-btn:hover, .tf-sh-' . $atts['unique_id'] . ' .fw-flip-box-back .fw-btn:focus { background-color: ' . $hover_color['color'] . '; border-bottom-color: ' . $hover_color['color'] . '; border-top-color: ' . $hover_color['color'] . ' }';
						}
					}
				} elseif ( $atts['back']['back_button']['style']['selected'] == 'fw-btn-2' ) {
					if ( isset( $atts['back']['back_button']['style']['fw-btn-2']['border_size'] ) && ! empty( $atts['back']['back_button']['style']['fw-btn-2']['border_size'] ) ) {
						$final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .fw-flip-box-back .fw-btn{ border-width: ' . (int) $atts['back']['back_button']['style']['fw-btn-2']['border_size'] . 'px; }';
					}
					if ( isset( $atts['back']['back_button']['style']['fw-btn-2']['border_radius'] ) && ! empty( $atts['back']['back_button']['style']['fw-btn-2']['border_radius'] ) ) {
						$final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .fw-flip-box-back .fw-btn{ border-radius: ' . (int) $atts['back']['back_button']['style']['fw-btn-2']['border_radius'] . 'px; }';
					}

					// btn color
					if ( isset( $atts['back']['back_button']['normal_color'] ) ) {
						$normal_color = the_core_get_color_palette_color_and_class( $atts['back']['back_button']['normal_color'], array( 'return_color' => true ) );
						if ( ! empty( $normal_color['color'] ) ) {
							$final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .fw-flip-box-back .fw-btn{ border-color: ' . $normal_color['color'] . ' }';
						}
					}
					// hover color
					if ( isset( $atts['back']['back_button']['hover_color'] ) ) {
						$hover_color = the_core_get_color_palette_color_and_class( $atts['back']['back_button']['hover_color'], array( 'return_color' => true ) );
						if ( ! empty( $hover_color['color'] ) ) {
							$final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .fw-flip-box-back .fw-btn:hover { background-color: ' . $hover_color['color'] . '; border-color: ' . $hover_color['color'] . ' }';
						}
					}
				} elseif ( $atts['back']['back_button']['style']['selected'] == 'fw-btn-1' ) {
					if ( isset( $atts['back']['back_button']['style']['fw-btn-1']['border_radius'] ) && ! empty( $atts['back']['back_button']['style']['fw-btn-1']['border_radius'] ) ) {
						$final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .fw-flip-box-back .fw-btn{ border-radius: ' . (int) $atts['back']['back_button']['style']['fw-btn-1']['border_radius'] . 'px; }';
					}

					// btn color
					if ( isset( $atts['back']['back_button']['normal_color'] ) ) {
						$normal_color = the_core_get_color_palette_color_and_class( $atts['back']['back_button']['normal_color'], array( 'return_color' => true ) );
						if ( ! empty( $normal_color['color'] ) ) {
							$final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .fw-flip-box-back .fw-btn{ background-color: ' . $normal_color['color'] . ' }';
						}
					}
					// hover color
					if ( isset( $atts['back']['back_button']['hover_color'] ) ) {
						$hover_color = the_core_get_color_palette_color_and_class( $atts['back']['back_button']['hover_color'], array( 'return_color' => true ) );
						if ( ! empty( $hover_color['color'] ) ) {
							$final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .fw-flip-box-back .fw-btn:hover { background-color: ' . $hover_color['color'] . ' }';
						}
					}

				}
			}
		}

		// content padding
		$padding_top = (isset($atts['padding_top']) && $atts['padding_top'] != '' ) ? 'padding-top:' . (int)esc_attr($atts['padding_top']) . 'px;' : '';
		$padding_right = (isset($atts['padding_right']) && $atts['padding_right'] != '' ) ? 'padding-right:' . (int)esc_attr($atts['padding_right']) . 'px;' : '';
		$padding_bottom = (isset($atts['padding_bottom']) && $atts['padding_bottom'] != '' ) ? 'padding-bottom:' . (int)esc_attr($atts['padding_bottom']) . 'px;' : '';
		$padding_left = (isset($atts['padding_left']) && $atts['padding_left'] != '' ) ? 'padding-left:' . (int)esc_attr($atts['padding_left']) . 'px;' : '';

		if (!empty($padding_right) || !empty($padding_left) || !empty($padding_top) || !empty($padding_bottom)) {
			$final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .fw-flip-box-content{' . $padding_right . $padding_left . $padding_bottom . $padding_top . '}';
		}

		if( empty($final_styles) ) {
			return;
		}

		wp_add_inline_style( 'fw-theme-style', $final_styles );
	}
	add_action( 'fw_ext_shortcodes_enqueue_static:flip_box', '_the_core_action_shortcode_flip_box_enqueue_dynamic_css' );
endif;



if (!function_exists('_the_core_action_shortcode_fw_external_booking_enqueue_dynamic_css')):
	/**
	 * @internal
	 *
	 * @param array $data
	 */
	function _the_core_action_shortcode_fw_external_booking_enqueue_dynamic_css($data)
	{
		$shortcode = 'fw_external_booking';
		$atts = shortcode_parse_atts($data['atts_string']);

		/**
		 * Decode attributes
		 * ( The below weird code is because of this https://github.com/ThemeFuse/Unyson/issues/469 )
		 */
		$atts = fw_ext_shortcodes_decode_attr($atts, $shortcode, $data['post']->ID);
		$final_styles = '';
		// separator styling
		if ( $atts['separator_group']['selected'] == 'yes' ) {
			$separator_color = the_core_get_color_palette_color_and_class( $atts['separator_group']['yes']['separator_color'], array( 'return_color' => true ) );
			if ( ! empty( $separator_color['color'] ) ) {
				$final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .fw-external-booking-separator { background-color: ' . $separator_color['color'] . ' }';
			}

			if ( !empty( $atts['separator_group']['yes']['separator_space'] ) ) {
				$half_space = (int) $atts['separator_group']['yes']['separator_space'];
				if ( $atts['style'] == 'vertical' ) {
					$final_styles .= '.tf-sh-' . $atts['unique_id'] . '.fw-external-booking.vertical.fw-external-booking-separator-enable .fw-external-booking-form-item { margin: ' . $half_space . 'px auto; }';
					$final_styles .= '.tf-sh-' . $atts['unique_id'] . '.fw-external-booking.vertical .fw-external-booking-separator { top: ' . $half_space . 'px; }';
				}
				else {
					$final_styles .= '.tf-sh-' . $atts['unique_id'] . '.fw-external-booking.horizontal.fw-external-booking-separator-enable .fw-external-booking-form-item { margin: 0 ' . $half_space . 'px;}';
					$final_styles .= '.tf-sh-' . $atts['unique_id'] . '.fw-external-booking.horizontal .fw-external-booking-separator{ right: -' . $half_space . 'px;}';
				}
			}
		}

		// separator styling
		if ( $atts['display_year_group']['selected'] == 'yes' ) {
			$final_styles .= '.tf-sh-' . $atts['unique_id'] . '.fw-external-booking .fw-external-booking-insert-data .external-booking-year { display: inline-block; }';
		}

		// button options
		if (isset($atts['button_options']['label_advanced_styling'])) {
			// button label advanced styling
			$label_advanced_styling = the_core_get_shortcode_advanced_styles($atts['button_options']['label_advanced_styling']['text'], array('return_color' => true));
			if (!empty($label_advanced_styling['styles'])) {
				$final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .fw-btn span {' . $label_advanced_styling['styles'] . '}';
			}
			// responsive label styling
			$label_responsive_styles = the_core_responsive_heading_styles(array('styles' => $atts['button_options']['label_advanced_styling']['text'], 'selector' => '.tf-sh-' . $atts['unique_id'] . ' .fw-btn span'));
			if (!empty($label_responsive_styles)) $final_styles .= '@media(max-width:767px){' . $label_responsive_styles . '}';

			// label text hover
			$hover_text_color = the_core_get_color_palette_color_and_class($atts['button_options']['label_advanced_styling']['hover_text_color'], array('return_color' => true));
			if (!empty($hover_text_color['color'])) $final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .fw-btn:hover span' . '{ color: ' . $hover_text_color['color'] . '; }';
		}

		// button color options
		if (isset($atts['button_options']['style']['selected'])) {
			if ($atts['button_options']['style']['selected'] == 'fw-btn-3') {
				if (isset($atts['button_options']['style']['fw-btn-3']['border_size']) && !empty($atts['button_options']['style']['fw-btn-3']['border_size'])) {
					$final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .fw-btn{ border-top-width: ' . (int)$atts['button_options']['style']['fw-btn-3']['border_size'] . 'px; border-bottom-width: ' . (int)$atts['button_options']['style']['fw-btn-3']['border_size'] . 'px; }';
				}
				// btn color
				if (isset($atts['button_options']['normal_color'])) {
					$normal_color = the_core_get_color_palette_color_and_class($atts['button_options']['normal_color'], array('return_color' => true));
					if (!empty($normal_color['color'])) $final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .fw-btn{ border-bottom-color: ' . $normal_color['color'] . '; border-top-color: ' . $normal_color['color'] . ' }';
				}
				// hover color
				if (isset($atts['button_options']['hover_color'])) {
					$hover_color = the_core_get_color_palette_color_and_class($atts['button_options']['hover_color'], array('return_color' => true));
					if (!empty($hover_color['color'])) $final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .fw-btn:hover, .tf-sh-' . $atts['unique_id'] . ' .fw-btn:focus { background-color: ' . $hover_color['color'] . '; border-bottom-color: ' . $hover_color['color'] . '; border-top-color: ' . $hover_color['color'] . ' }';
				}
			} elseif ($atts['button_options']['style']['selected'] == 'fw-btn-2') {
				if (isset($atts['button_options']['style']['fw-btn-2']['border_size']) && !empty($atts['button_options']['style']['fw-btn-2']['border_size'])) {
					$final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .fw-btn{ border-width: ' . (int)$atts['button_options']['style']['fw-btn-2']['border_size'] . 'px; }';
				}
				if (isset($atts['button_options']['style']['fw-btn-2']['border_radius']) && !empty($atts['button_options']['style']['fw-btn-2']['border_radius'])) {
					$final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .fw-btn{ border-radius: ' . (int)$atts['button_options']['style']['fw-btn-2']['border_radius'] . 'px; }';
				}

				// btn color
				if (isset($atts['button_options']['normal_color'])) {
					$normal_color = the_core_get_color_palette_color_and_class($atts['button_options']['normal_color'], array('return_color' => true));
					if (!empty($normal_color['color'])) $final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .fw-btn{ border-color: ' . $normal_color['color'] . ' }';
				}
				// hover color
				if (isset($atts['button_options']['hover_color'])) {
					$hover_color = the_core_get_color_palette_color_and_class($atts['button_options']['hover_color'], array('return_color' => true));
					if (!empty($hover_color['color'])) $final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .fw-btn:hover { background-color: ' . $hover_color['color'] . '; border-color: ' . $hover_color['color'] . ' }';
				}
			} elseif ($atts['button_options']['style']['selected'] == 'fw-btn-1') {
				if (isset($atts['button_options']['style']['fw-btn-1']['border_radius']) && !empty($atts['button_options']['style']['fw-btn-1']['border_radius'])) {
					$final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .fw-btn{ border-radius: ' . (int)$atts['button_options']['style']['fw-btn-1']['border_radius'] . 'px; }';
				}

				// btn color
				if (isset($atts['button_options']['normal_color'])) {
					$normal_color = the_core_get_color_palette_color_and_class($atts['button_options']['normal_color'], array('return_color' => true));
					if (!empty($normal_color['color'])) $final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .fw-btn{ background-color: ' . $normal_color['color'] . ' }';
				}
				// hover color
				if (isset($atts['button_options']['hover_color'])) {
					$hover_color = the_core_get_color_palette_color_and_class($atts['button_options']['hover_color'], array('return_color' => true));
					if (!empty($hover_color['color'])) $final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .fw-btn:hover { background-color: ' . $hover_color['color'] . ' }';
				}

			}
		}

		// form labels styling
		$form_labels_styling = the_core_get_shortcode_advanced_styles($atts['fonts_styling']['form_labels'], array('return_color' => true));
		if ( !empty($form_labels_styling['styles']) ) $final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .fw-external-booking-form label {' . $form_labels_styling['styles'] . '}';
		// arrow down color
		$arrow_down_color = the_core_get_color_palette_color_and_class($atts['fonts_styling']['form_labels']['color-palette'], array( 'return_color' => true ) );
		if( !empty( $arrow_down_color['color'] ) ) {
			$final_styles .= '.tf-sh-' . $atts['unique_id'].'.fw-external-booking .fw-external-booking-form-item:before{ border-color: '.$arrow_down_color['color'].'; }';
		}
		// responsive form labels styling
		$form_labels_responsive_styles = the_core_responsive_heading_styles(array('styles' => $atts['fonts_styling']['form_labels'], 'selector' => '.tf-sh-' . $atts['unique_id'] . ' .fw-external-booking-form label' ) );
		if( !empty($form_labels_responsive_styles) ) $final_styles .= '@media(max-width:767px){' . $form_labels_responsive_styles . '}';

		// month styling
		$month_styling = the_core_get_shortcode_advanced_styles($atts['fonts_styling']['month_style'], array('return_color' => true));
		if ( !empty($month_styling['styles']) ) $final_styles .= '.tf-sh-' . $atts['unique_id'] . ' .fw-external-booking-form .external-booking-month, .tf-sh-' . $atts['unique_id'] . ' .fw-external-booking-form .external-booking-year{' . $month_styling['styles'] . '}';
		// responsive month styling
		$month_responsive_styles = the_core_responsive_heading_styles(array('styles' => $atts['fonts_styling']['month_style'], 'selector' => '.tf-sh-' . $atts['unique_id'] . ' .fw-external-booking-form .external-booking-month, .tf-sh-' . $atts['unique_id'] . ' .fw-external-booking-form .external-booking-year' ) );
		if( !empty($month_responsive_styles) ) $final_styles .= '@media(max-width:767px){' . $month_responsive_styles . '}';

		// form inputs styling
		$form_inputs_styling = the_core_get_shortcode_advanced_styles($atts['fonts_styling']['form_inputs'], array('return_color' => true));
		if ( !empty($form_inputs_styling['styles']) ) $final_styles .= '.tf-sh-' . $atts['unique_id'] . '.fw-external-booking .fw-external-booking-insert-data .external-booking-data, .tf-sh-' . $atts['unique_id'] . '.fw-external-booking .fw-external-booking-form-item .selectize-input > div.item {' . $form_inputs_styling['styles'] . '}';

		// height to inputs
		if( ! empty( $atts['fonts_styling']['form_inputs']['line-height'] ) ) {
			$final_styles .= '.tf-sh-' . $atts['unique_id'].'.fw-external-booking .fw-external-booking-insert-data, .tf-sh-' . $atts['unique_id'].'.fw-external-booking .selectize-control.fw-nr-family-members-booking { height: '.(int)$atts['fonts_styling']['form_inputs']['line-height'].'px; }';
		}

		// responsive form inputs styling
		$form_inputs_responsive_styles = the_core_responsive_heading_styles(array('styles' => $atts['fonts_styling']['form_inputs'], 'selector' => '.tf-sh-' . $atts['unique_id'] . ' .fw-external-booking-form input, .tf-sh-' . $atts['unique_id'] . ' .fw-external-booking-form select' ) );
		if( !empty($form_inputs_responsive_styles) ) $final_styles .= '@media(max-width:767px){' . $form_inputs_responsive_styles . '}';

		if( empty($final_styles) ) {
			return;
		}

		wp_add_inline_style( 'fw-theme-style', $final_styles );
	}

	add_action( 'fw_ext_shortcodes_enqueue_static:fw_external_booking', '_the_core_action_shortcode_fw_external_booking_enqueue_dynamic_css' );
endif;


if (!function_exists('_the_core_filter_special_navigation_class')):
	/**
	 * $classes array of classes for special menu elements
	 *
	 * @param array $classes
	 * @param object $item
	 */
	function _the_core_filter_special_navigation_class($classes, $item)
	{
		if ($item->type == 'custom' && strpos($item->url, "#") !== false && strlen($item->url) > 1) {
			$classes[] = 'anchor';
		}
		return $classes;
	}

	add_filter('nav_menu_css_class', '_the_core_filter_special_navigation_class', 10, 2);
endif;


if ( ! function_exists( 'the_core_filter_show_404_page' ) ):
	/**
	 * Show custom 404 page
	 */
	function the_core_filter_show_404_page() {
		$page_404 = function_exists( 'fw_get_db_settings_option' ) ? fw_get_db_settings_option( 'page_404' ) : '';
		if ( ! empty( $page_404 ) ) {
			global $wp_query;

			if ( function_exists( 'icl_object_id' ) ) {
				$page_404 = wpml_object_id_filter( (int) $page_404, 'page', true );
			}

			$wp_query = new WP_Query();
			$wp_query->query( 'post_type=page&page_id=' . $page_404 );
			$wp_query->the_post();
			$template404 = get_page_template();
			rewind_posts();

			return $template404;
		}
	}
endif;
add_filter( '404_template', 'the_core_filter_show_404_page' );


if ( ! function_exists( 'the_core_action_before_close_main_theme' ) ) :
	function the_core_action_before_close_main_theme() {
		if ( is_404() && function_exists( 'wpml_object_id_filter' ) ) {
			global $post;
			echo do_shortcode( $post->post_content );
		}
	}
endif;
add_action( 'the_core_action_before_close_main', 'the_core_action_before_close_main_theme' );


if (!function_exists('_the_core_action_coming_soon_page')) :
	/**
	 * Coming soon page
	 */
	function _the_core_action_coming_soon_page()
	{
		global $coming_soon;
		$coming_soon = false;
		$enable_coming_soon = function_exists('fw_get_db_settings_option') ? fw_get_db_settings_option('enable_coming_soon') : array();
		if (isset($enable_coming_soon['selected']) && $enable_coming_soon['selected'] == 'yes') {
			// if is enabled coming soon
			if (!is_user_logged_in() && $enable_coming_soon['yes']['coming_soon_page'] != '0') {
				// if user is not logged in and coming soon page is selected
				if (the_core_is_page_url_excluded()) {
					return;
				}
				$coming_soon = true;
				global $wp_query;
				$wp_query = new WP_Query();
				$page_id  = function_exists( 'wpml_object_id_filter' ) ? wpml_object_id_filter( $enable_coming_soon['yes']['coming_soon_page'] ) : $enable_coming_soon['yes']['coming_soon_page'];
				$wp_query->query('page_id=' . $page_id);
				$wp_query->the_post();
				rewind_posts();
				nocache_headers();
				//header("HTTP/1.0 503 Service Unavailable");
				include_once get_template_directory() . '/coming-soon-template.php';
				exit();
			}
		}
	}
endif;
add_action('send_headers', '_the_core_action_coming_soon_page', 12);


if (!function_exists('_the_core_action_slider_shortcode_extra_data')) :
	/**
	 * Send extra data to shortcode slider
	 *
	 * @param array $data
	 * @param array $atts
	 */
	function _the_core_action_slider_shortcode_extra_data($data, $atts)
	{
		return array_merge($data, $atts);
	}
endif;
add_filter('fw_slider_add_short'.'code_extra_data', '_the_core_action_slider_shortcode_extra_data', 10, 2);


if (!function_exists('_the_core_action_print_category_special_styles')) :
	/**
	 * Print category special styles
	 */
	function _the_core_action_print_category_special_styles()
	{
		if (!is_single()) {
			if (is_category()) {
				$term = get_category(get_query_var('cat'), false);
			} else {
				$term = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy'));
			}

			$final_styles = '';
			if (!empty($term) && !is_wp_error($term) ) {
				$term_id = $term->term_id;
				$taxonomy = $term->taxonomy;
				$category_options = function_exists('fw_get_db_term_option') ? fw_get_db_term_option($term_id, $taxonomy, '', '') : array();

				if (isset($category_options['header_title_advanced_styling']['subtitle_typography'])) {
					// title styling
					$header_title_advanced_styling = the_core_get_shortcode_advanced_styles($category_options['header_title_advanced_styling']['subtitle_typography'], array('return_color' => true));
					if (!empty($header_title_advanced_styling['styles'])) {
						$final_styles .= '.archive .fw-section-image .fw-special-title, .topic-tag .fw-section-image .fw-special-title{' . $header_title_advanced_styling['styles'] . '}';
						// responsive category titles
						$titles_styles = the_core_responsive_heading_styles(array('styles' => $category_options['header_title_advanced_styling']['subtitle_typography'], 'selector' => '.archive .fw-section-image .fw-special-title'));
						if (!empty($titles_styles)) $final_styles .= "@media(max-width:767px){" . $titles_styles . "}\n";
					}

					// subtitle color
					$header_subtitle_advanced_styling = the_core_get_shortcode_advanced_styles($category_options['header_subtitle_advanced_styling']['subtitle_typography'], array('return_color' => true));
					if (!empty($header_subtitle_advanced_styling['styles'])) {
						$final_styles .= '.archive .fw-section-image .fw-special-subtitle, .topic-tag .fw-section-image .fw-special-subtitle{' . $header_subtitle_advanced_styling['styles'] . '}';
						// responsive category subtitles
						$subtitles_styles = the_core_responsive_heading_styles(array('styles' => $category_options['header_subtitle_advanced_styling']['subtitle_typography'], 'selector' => '.archive .fw-section-image .fw-special-subtitle'));
						if (!empty($subtitles_styles)) $final_styles .= "@media(max-width:767px){" . $subtitles_styles . "}\n";
					}
				}

				wp_add_inline_style('fw-theme-style', $final_styles);
			}
		}
	}
endif;
add_action('wp_enqueue_scripts', '_the_core_action_print_category_special_styles', 99);


if (!function_exists('_the_core_filter_fw_ext_events_post_options')) :
	/**
	 * Add extra options for post event
	 */
	function _the_core_filter_fw_ext_events_post_options($event_options = array())
	{
		$the_core_admin_url = admin_url();
		$event_options['events_tab']['options'] = array_merge($event_options['events_tab']['options'],
			array(
				'ticket_group' => array(
					'type' => 'group',
					'options' => array(
						'ticket_price' => array(
							'label' => esc_html__('Ticket Price', 'the-core'),
							'desc' => esc_html__('Enter the ticket price', 'the-core'),
							'help' => esc_html__('Event currency options can be found in Theme Settings', 'the-core'). ' > <a href="' . $the_core_admin_url . 'themes.php?page=fw-settings#fw-options-tab-posts" target="_blank">' . esc_html__( 'Posts', 'the-core' ) . '</a>, ' . esc_html__( 'on the Events tab.', 'the-core' ),
							'type' => 'text',
						),
						'ticket_link' => array(
							'label' => esc_html__('Ticket Link', 'the-core'),
							'desc' => esc_html__('Enter the ticket link', 'the-core'),
							'type' => 'text',
						),
						'ticket_number' => array(
							'label' => esc_html__('No. of Available Tickets', 'the-core'),
							'desc' => esc_html__('Enter the number of available tickets', 'the-core'),
							'type' => 'text',
						),
					)
				)
			)
		);

		return $event_options;
	}
endif;
add_filter('fw_ext_events_post_options', '_the_core_filter_fw_ext_events_post_options');


if (!function_exists('_the_core_filter_fw_settings_form_header_buttons')) :
	/**
	 * Add an extra options for post event
	 */
	function _the_core_filter_fw_settings_form_header_buttons($arr)
	{
		$arr2[] = '<a class="fw-theme-docs-link" target="_blank" href="http://docs.themefuse.com/the-core">' . esc_html__('Go to Docs', 'the-core') . '</a>';
		$arr = array_merge($arr2, $arr);

		return $arr;
	}
endif;
add_filter('fw_settings_form_header_buttons', '_the_core_filter_fw_settings_form_header_buttons');


if (!function_exists('_the_core_filter_fw_ext_backups_db_restore_keep_options')) :
	/**
	 * Add an extra options for post event
	 */
	function _the_core_filter_fw_ext_backups_db_restore_keep_options($options, $is_full)
	{
		if ( !$is_full ) {
			$options['tfuse_'.the_core_get_the_theme_id().'_auto_install_state'] = true;
		}

		return $options;
	}
endif;
add_filter('fw_ext_backups_db_restore_keep_options', '_the_core_filter_fw_ext_backups_db_restore_keep_options', 10, 2);


if (!function_exists('_the_core_filter_fix_give_plugin_assets')) :
	/**
	 * Fixes https://github.com/WordImpress/Give/issues/466
	 */
	function _the_core_filter_fix_give_plugin_assets()
	{
		if (function_exists('give_is_admin_page') && give_is_admin_page()) {
			wp_dequeue_style('jquery-ui-css');
		}
	}
endif;
add_action('admin_enqueue_scripts', '_the_core_filter_fix_give_plugin_assets', 101);


if (!function_exists('_the_core_filter_fw_option_type_event_datetime_pickers')) :
	/**
	 * Datetime picker step
	 */
	function _the_core_filter_fw_option_type_event_datetime_pickers($data)
	{
		$data['from']['step'] = 30;
		$data['to']['step'] = 30;

		return $data;
	}
endif;
add_filter('fw_option_type_event_datetime_pickers', '_the_core_filter_fw_option_type_event_datetime_pickers');


if (!function_exists('_the_core_filter_move_comment_field_to_bottom')):
	/**
	 * Comment form textarea move to bottom
	 */
	function _the_core_filter_move_comment_field_to_bottom($fields)
	{
		$comment_field = $fields['comment'];
		unset($fields['comment']);
		$fields['comment'] = $comment_field;

		return $fields;
	}
endif;
add_filter('comment_form_fields', '_the_core_filter_move_comment_field_to_bottom');


if (!function_exists('_the_core_filter_update_footer')):
	/**
	 * Theme changelog in footer admin
	 */
	function _the_core_filter_update_footer($html)
	{
		$the_core_version = ( defined('FW') && function_exists('fw') ) ? fw()->theme->manifest->get_version() : '1.0';
		$theme_id = ( defined('FW') && function_exists('fw') ) ? fw()->theme->manifest->get_id() : the_core_get_the_theme_id();

		$html .= ' | <a href="//themefuse.com/changelogs/?theme=' . $theme_id . '" target="_blank">' . esc_html__('Theme', 'the-core') . ' ' . $the_core_version . '</a>';
		return $html;
	}
endif;
add_filter('update_footer', '_the_core_filter_update_footer', 12);


if (!function_exists('_the_core_action_login_head_fonts')) :
	/**
	 * Login page save custom fonts in wp-option
	 */
	function _the_core_action_login_head_fonts()
	{
		global $pagenow;

		if ($pagenow == 'wp-login.php') {
			$enable_custom_login_page = function_exists('fw_get_db_settings_option') ? fw_get_db_settings_option('enable_custom_login_page') : '';

			if ($enable_custom_login_page == 'yes') {
				$custom_login_page_styling = fw_get_db_settings_option('custom_login_page_styling', array());

				// form label styling
				the_core_get_shortcode_advanced_styles($custom_login_page_styling['custom_login_form_labels'], array('return_color' => false, 'custom_meta' => 'fw_custom_login_page_fonts'));

				// input styling
				the_core_get_shortcode_advanced_styles($custom_login_page_styling['custom_login_form_inputs'], array('return_color' => false, 'custom_meta' => 'fw_custom_login_page_fonts'));

				// links styling
				the_core_get_shortcode_advanced_styles($custom_login_page_styling['custom_login_form_links'], array('return_color' => false, 'custom_meta' => 'fw_custom_login_page_fonts'));

				// button label
				the_core_get_shortcode_advanced_styles($custom_login_page_styling['login_button_label'], array('return_color' => true, 'custom_meta' => 'fw_custom_login_page_fonts'));
			}
		}
	}
endif;
add_action('init', '_the_core_action_login_head_fonts');


if (!function_exists('_the_core_action_login_head')) :
	/**
	 * Login page custom styling
	 */
	function _the_core_action_login_head()
	{
		$enable_custom_login_page = function_exists('fw_get_db_settings_option') ? fw_get_db_settings_option('enable_custom_login_page') : '';

		if ($enable_custom_login_page == 'yes') {
			$extra_styles = $bg_image = '';
			$login_logo = fw_get_db_settings_option('custom_login_page_styling/login_logo', array());
			if (!empty($login_logo)) {
				$logo_image = wp_get_attachment_image_src($login_logo['attachment_id'], 'full');
				$width = 320;
				$height = 140;
				if (isset($logo_image['1']) && isset($logo_image['2'])) {
					if ($logo_image['1'] <= 320) {
						$width = $logo_image['1'];
						$height = $logo_image['2'];
					}
				}

				$extra_styles .= '.login h1 a {
                    background-image:url("' . $login_logo['url'] . '");
                    height: auto;
                    width: auto;
                    -webkit-background-size: ' . $width . 'px auto;
                    background-size: ' . $width . 'px auto;
                    line-height: ' . $height . 'px;
                    outline: none;
                }';
			}

			$custom_login_page_styling = fw_get_db_settings_option('custom_login_page_styling', array());
			if (isset($custom_login_page_styling['background_image']['data']['icon']) && !empty($custom_login_page_styling['background_image']['data']['icon'])) {
				$bg_image .= 'background-image: url("' . $custom_login_page_styling['background_image']['data']['icon'] . '");';
				$bg_image .= ' background-repeat: ' . $custom_login_page_styling["repeat"] . ';';
				$bg_image .= ' background-position: ' . $custom_login_page_styling["bg_position_x"] . ' ' . $custom_login_page_styling["bg_position_y"] . ';';
				$bg_image .= ' background-size: ' . $custom_login_page_styling["bg_size"] . ';';
			}

			// bg color
			$bg_color = the_core_get_color_palette_color_and_class($custom_login_page_styling['background_color'], array('return_color' => true));
			if (!empty($bg_color['color'])) {
				$bg_image .= ' background-color: ' . $bg_color['color'] . ';';
			}

			// label styling
			$custom_login_form_labels = the_core_get_shortcode_advanced_styles($custom_login_page_styling['custom_login_form_labels'], array('return_color' => true, 'custom_meta' => 'fw_custom_login_page_fonts'));
			if (!empty($custom_login_form_labels['styles'])) {
				$extra_styles .= 'body.login #loginform label { ' . $custom_login_form_labels['styles'] . ' }';
			}

			// label uppercase
			if ($custom_login_page_styling['custom_login_form_labels_uppercase'] == 'uppercase') {
				$extra_styles .= 'body.login #loginform label { text-transform: uppercase; }';
			}

			// input styling
			$custom_login_form_inputs = the_core_get_shortcode_advanced_styles($custom_login_page_styling['custom_login_form_inputs'], array('return_color' => true, 'custom_meta' => 'fw_custom_login_page_fonts'));
			if (!empty($custom_login_form_inputs['styles'])) {
				$extra_styles .= 'body.login #loginform input[type=text], body.login #loginform input[type=password] { ' . $custom_login_form_inputs['styles'] . ' }';
			}

			// links styling
			$custom_login_form_links = the_core_get_shortcode_advanced_styles($custom_login_page_styling['custom_login_form_links'], array('return_color' => true, 'custom_meta' => 'fw_custom_login_page_fonts'));
			if (!empty($custom_login_form_links['styles'])) {
				$extra_styles .= '.login #backtoblog a, .login #nav a { ' . $custom_login_form_links['styles'] . ' }';
			}

			// links hover color
			$custom_login_form_links_hover = the_core_get_color_palette_color_and_class($custom_login_page_styling['custom_login_form_links_hover'], array('return_color' => true));
			if (!empty($custom_login_form_links_hover['color'])) $extra_styles .= '.login #backtoblog a:hover, .login #nav a:hover' . '{ color: ' . $custom_login_form_links_hover['color'] . '; }';

			// form bg color
			if ($custom_login_page_styling['login_form_bg_options']['background'] == 'custom') {
				$login_form_bg_color = the_core_get_color_palette_color_and_class($custom_login_page_styling['login_form_bg_options']['custom']['login_form_bg_color'], array('return_color' => true));
				if (!empty($login_form_bg_color['color'])) {
					$extra_styles .= '.login #loginform ' . '{ background-color: ' . $login_form_bg_color['color'] . '; }';
				}
			}

			// login inputs border
			if ($custom_login_page_styling['login_input_border']['selected'] == 'yes') {
				$border_color = the_core_get_color_palette_color_and_class($custom_login_page_styling['login_input_border']['yes']['border_color'], array('return_color' => true));
				if (!empty($border_color['color'])) {
					$extra_styles .= 'body.login #loginform input[type=text], body.login #loginform input[type=password], body.login #loginform input[type=checkbox] { border: ' . (int)$custom_login_page_styling['login_input_border']['yes']['border_size'] . 'px solid ' . $border_color['color'] . '; }';
				}
			}

			// login inputs bg color
			if ($custom_login_page_styling['login_fields_bg_options']['background'] == 'none') {
				$extra_styles .= 'body.login #loginform input[type=text], body.login #loginform input[type=password], body.login #loginform input[type=checkbox] { background: none }';
			} elseif ($custom_login_page_styling['login_fields_bg_options']['background'] == 'custom') {
				$fields_bg_color = the_core_get_color_palette_color_and_class($custom_login_page_styling['login_fields_bg_options']['custom']['fields_bg_color'], array('return_color' => true));
				if (!empty($fields_bg_color['color'])) {
					$extra_styles .= 'body.login #loginform input[type=text], body.login #loginform input[type=password], body.login #loginform input[type=checkbox] { background-color: ' . $fields_bg_color['color'] . '; }';
				}
			}

			// button bg color
			$login_button_bg_color = the_core_get_color_palette_color_and_class($custom_login_page_styling['login_button_bg_color'], array('return_color' => true));
			if (!empty($login_button_bg_color['color'])) {
				$extra_styles .= 'body.login #loginform input[type=submit] { background-color: ' . $login_button_bg_color['color'] . '; border: none; -webkit-box-shadow: none; box-shadow: none; text-shadow: none; }';
				$extra_styles .= 'body.login #loginform input[type=submit]:hover { opacity: 0.9; }';
			}

			// button label styling
			$login_button_label = the_core_get_shortcode_advanced_styles($custom_login_page_styling['login_button_label'], array('return_color' => true, 'custom_meta' => 'fw_custom_login_page_fonts'));
			if (!empty($login_button_label['styles'])) {
				$extra_styles .= 'body.login #loginform input[type=submit] { ' . $login_button_label['styles'] . ' }';
			}

			// background image
			if (!empty($bg_image)) {
				$bg_image = 'body.login { ' . $bg_image . ' }';
			}

			// custom CSS for Login Page
			$custom_login_css = fw_get_db_settings_option('custom_login_page_styling/custom_login_css', '');

			echo '<style>
                ' . $bg_image . '
                ' . $extra_styles . '
                ' . $custom_login_css . '
            </style>';
		}
	}
endif;
add_action('login_head', '_the_core_action_login_head');


if (!function_exists('_the_core_filter_login_headerurl')) :
	/**
	 * Admin logo url
	 */
	function _the_core_filter_login_headerurl($login_header_url)
	{
		$enable_custom_login_page = function_exists('fw_get_db_settings_option') ? fw_get_db_settings_option('enable_custom_login_page') : '';

		if ($enable_custom_login_page == 'yes') {
			return esc_url(home_url('/'));
		} else {
			return $login_header_url;
		}
	}
endif;
add_filter('login_headerurl', '_the_core_filter_login_headerurl');


if (!function_exists('_the_core_filter_login_headertitle')) :
	/**
	 * Admin logo hover title
	 */
	function _the_core_filter_login_headertitle($login_header_title)
	{
		$enable_custom_login_page = function_exists('fw_get_db_settings_option') ? fw_get_db_settings_option('enable_custom_login_page') : '';

		if ($enable_custom_login_page == 'yes') {
			return get_bloginfo('name');
		} else {
			return $login_header_title;
		}
	}
endif;
add_filter('login_headertitle', '_the_core_filter_login_headertitle');


if ( ! function_exists( '_the_core_action_tracking_scripts' ) ) :
	/**
	 * Display tracking scripts
	 */
	function _the_core_action_tracking_scripts() {
		if ( function_exists( 'fw_get_db_settings_option' ) ) {
			$tracking_scripts = fw_get_db_settings_option( 'tracking_scripts', '' );
			if ( ! empty( $tracking_scripts ) ) {
				foreach ( $tracking_scripts as $script ) {
					if ( isset( $script['script'] ) && ! empty( $script['script'] ) ) {
						if ( ( isset( $script['position'] ) && 'footer' == $script['position'] ) || ! isset( $script['position'] ) ) {
							echo( $script['script'] );
						}
					}
				}
			}
		};

	}
endif;
add_action( 'wp_footer', '_the_core_action_tracking_scripts' );


if ( ! function_exists( 'the_core_action_head_tracking_scripts' ) ) :
	/**
	 * Display tracking scripts in head
	 */
	function the_core_action_head_tracking_scripts() {
		if ( function_exists( 'fw_get_db_settings_option' ) ) {
			$tracking_scripts = fw_get_db_settings_option( 'tracking_scripts', '' );
			if ( ! empty( $tracking_scripts ) ) {
				foreach ( $tracking_scripts as $script ) {
					if ( isset( $script['script'] ) && ! empty( $script['script'] ) ) {
						if ( isset( $script['position'] ) && 'header' == $script['position'] ) {
							echo( $script['script'] );
						}
					}
				}
			}
		};
	}
endif;
add_action( 'wp_head', 'the_core_action_head_tracking_scripts' );


if (!function_exists('_the_core_wp_before_admin_bar_render')) :
	/**
	 * Before admin bar render
	 */
	function _the_core_wp_before_admin_bar_render(){
		echo '<div class="fw-wrap-wp-bar">';
	}
endif;
add_action( 'wp_before_admin_bar_render', '_the_core_wp_before_admin_bar_render' );


if (!function_exists('_the_core_wp_after_admin_bar_render')) :
	/**
	 * After admin bar render
	 */
	function _the_core_wp_after_admin_bar_render(){
		echo '</div>';
	}
endif;
add_action( 'wp_after_admin_bar_render', '_the_core_wp_after_admin_bar_render' );


if ( !function_exists('lifterlms_output_content_wrapper') ) :
	/**
	 * LifterLMS before main content
	 */
	function lifterlms_output_content_wrapper() {
		$the_core_sidebar_position = function_exists('fw_ext_sidebars_get_current_position') ? esc_attr(fw_ext_sidebars_get_current_position()) : 'full';
		// for courses header image
		the_core_header_image();
		ob_start();
		?>
		<section class="fw-main-row <?php the_core_get_content_class('main', $the_core_sidebar_position); ?>">
			<div class="fw-container">
				<div class="fw-row">
					<div class="fw-content-area <?php the_core_get_content_class('content', $the_core_sidebar_position); ?>">
						<div class="fw-col-inner">
		<?php
		echo ob_get_clean();
	}
endif;


if ( !function_exists('lifterlms_output_content_wrapper_end') ):
	/**
	 * LifterLMS after main content
	 */
	function lifterlms_output_content_wrapper_end() {
		ob_start(); ?>
						</div>
					</div><!-- /.content-area-->
				<?php get_sidebar(); ?>
				</div><!-- /.row-->
			</div><!-- /.container-->
		</section>
		<?php
		echo ob_get_clean();
	}
endif;


if ( !function_exists('_the_core_filter_llms_sidebar_settings') ):
	/**
	 * LifterLMS sidebars before & after widget
	 */
	function _the_core_filter_llms_sidebar_settings() {
		return array(
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h2 class="widget-title"><span>',
			'after_title'   => '</span></h2>',
		);
	}
endif;
add_filter('llms_sidebar_settings', '_the_core_filter_llms_sidebar_settings');


if ( !function_exists('_the_core_action_include_predefined_templates') ) :
	/**
	 * init Page Builder Predefined Templates
	 */
	function _the_core_action_include_predefined_templates() {
		require_once get_template_directory().'/theme-includes/includes/predefined-templates/init.php';
	}
endif;
add_action('fw_init', '_the_core_action_include_predefined_templates');


if ( !function_exists('the_core_theme_woocommerce_breadcrumb_home_url') ) :
	/**
	 * Home url with "/" on the final
	 */
	function the_core_theme_woocommerce_breadcrumb_home_url() {
		return esc_url( home_url('/') );
	}
endif;
add_filter('woocommerce_breadcrumb_home_url', 'the_core_theme_woocommerce_breadcrumb_home_url');


if ( !function_exists('_the_core_action_upgrader_process_complete') ) :
	/**
	 * Compile the styles after theme update
	 */
	function _the_core_action_upgrader_process_complete( $upgrader_object, $options ) {
		if ($options['action'] == 'update' && $options['type'] == 'theme' ){
			_the_core_action_settings_form_saved();
		}
	}
endif;
add_action( 'upgrader_process_complete', '_the_core_action_upgrader_process_complete',10, 2);


/* Enable shortcodes in text widgets */
add_filter( 'widget_text', 'do_shortcode' );


if ( ! function_exists( 'the_core_filter_embed_oembed_html' ) ) :
	/**
	 * Filter for disable Youtube Related Videos
	 */
	function the_core_filter_embed_oembed_html( $html, $url ) {
		if ( apply_filters( 'the_core_filter_youtube_related_video_stop', true ) && strpos( $url, 'youtube.com' ) !== false ) {
			$html = str_replace( '?feature=oembed', '?feature=oembed&rel=0', $html );
		}

		return $html;
	}
endif;
add_filter( 'embed_oembed_html', 'the_core_filter_embed_oembed_html', 10, 2 );


add_filter( 'comment_form_submit_field', 'the_core_filter_comment_form_submit_field', 999 );
if ( ! function_exists( 'the_core_filter_comment_form_submit_field' ) ) :
	function the_core_filter_comment_form_submit_field( $submit ) {
		$enable_comments_gdpr = function_exists('fw_get_db_settings_option') ? fw_get_db_settings_option('comments_gdpr/selected', 'no') : 'no';
		if ( 'no' == $enable_comments_gdpr ) {
			return $submit;
		}

		$the_core_comments_checkbox = apply_filters(
			'the_core_wordpress_comments_checkbox',
			'<div class="fw-comments-checkbox"><label><input type="checkbox" name="the_core_gdpr" id="the_core_gdpr" value="" />'.fw_get_db_settings_option('comments_gdpr/yes/comments_gdpr_text', '').'</label></div>'
		);

		return $the_core_comments_checkbox . $submit;
	}
endif;


add_action( 'pre_comment_on_post', 'the_core_action_pre_comment_on_post' );
if ( ! function_exists( 'the_core_action_pre_comment_on_post' ) ) :
	function the_core_action_pre_comment_on_post() {
		$enable_comments_gdpr = function_exists('fw_get_db_settings_option') ? fw_get_db_settings_option('comments_gdpr/selected', 'no') : 'no';
		if ( 'no' == $enable_comments_gdpr ) {
			return;
		}

		if ( ! isset( $_POST['the_core_gdpr'] ) ) {
			wp_die(
				'<p>' . sprintf(
					__( '<strong>ERROR</strong>: %s', 'the_core' ),
					__( 'Please check the privacy checkbox before submit', 'the_core' )
				) . '</p>',
				__( 'Comment Submission Failure' ),
				array( 'back_link' => true )
			);
		}
	}
endif;


if ( ! function_exists( 'the_core_give_load_admin_styles' ) ) :
	function the_core_give_load_admin_styles() {
		return false;
	}
endif;
add_filter( 'give_load_admin_styles', 'the_core_give_load_admin_styles' );


