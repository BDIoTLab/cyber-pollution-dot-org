<?php if ( ! defined( 'ABSPATH' ) ) {
    die( 'Direct access forbidden.' );
}
/**
 * Register menus
 */

$the_core_header_type = defined( 'FW' ) ? fw_get_db_settings_option( 'header_settings/header_type_picker/header_type' ) : '';

$the_core_menu_locations = array(
	'primary' => esc_html__( 'Top Primary Menu', 'the-core' ),
	'footer'  => esc_html__( 'Footer Menu', 'the-core' ),
);
if ( $the_core_header_type == 'header-2' ) {
	$the_core_menu_locations = array(
		'primary'   => esc_html__( 'Top Primary Menu', 'the-core' ),
		'secondary' => esc_html__( 'Top Secondary Menu', 'the-core' ),
		'footer'    => esc_html__( 'Footer Menu', 'the-core' ),
	);
}

/**
 * This theme uses wp_nav_menu() in 3 locations.
 */
register_nav_menus( $the_core_menu_locations );

global $the_core_menus;
$the_core_menus = array(
	'primary'   => array(
		'depth'           => apply_filters('fw_main_menu_depth', 4),
		'container'       => 'nav',
		'container_id'    => 'fw-menu-primary',
		'container_class' => 'fw-site-navigation primary-navigation',
		'menu_class'      => 'fw-nav-menu',
		'theme_location'  => 'primary',
		'fallback_cb'     => 'fw_theme_select_menu_message',
		'link_before'     => '<span>',
		'link_after'      => '</span>'
	),
	'secondary' => array(
		'depth'           => apply_filters('fw_main_menu_depth', 4),
		'container'       => 'nav',
		'container_id'    => 'fw-menu-secondary',
		'container_class' => 'fw-site-navigation secondary-navigation',
		'menu_class'      => 'fw-nav-menu',
		'theme_location'  => 'secondary',
		'fallback_cb'     => 'fw_theme_select_menu_message_secondary',
		'link_before'     => '<span>',
		'link_after'      => '</span>'
	),
	'footer'    => array(
		'depth'           => 1,
		'container'       => 'nav',
		'container_id'    => 'fw-footer-menu',
		'container_class' => 'fw-footer-menu',
		'menu_class'      => '',
		'theme_location'  => 'footer',
		'fallback_cb'     => '',
		'link_before'     => '<span>',
		'link_after'      => '</span>'
	)
);


if ( ! function_exists( 'fw_theme_nav_menu' ) ) :
	/**
	 * Display the nav menu
	 */
	function fw_theme_nav_menu( $menu_type ) {
		global $the_core_menus;

		if ( ! isset( $the_core_menus[ $menu_type ] ) ) {
			return;
		}
		/**
		 * if w3 total cache is active, add google_ad_ comment after li's, to fix problem with li justify
		 * add this 'google_ad_' in w3 admin confing -> minify -> HTML & XML -> Ignored comment stems:
		 */
		if ( defined( 'W3TC' ) ) {
			$the_core_menus[ $menu_type ]['echo'] = false;
			$the_core_html_menu                   = wp_nav_menu( $the_core_menus[ $menu_type ] );
			echo str_ireplace( '</li>', '</li> <!-- google_ad_ -->', $the_core_html_menu );
		} else {
			wp_nav_menu( $the_core_menus[ $menu_type ] );
		}

	}
endif;


if ( ! function_exists( 'fw_theme_select_menu_message' ) ) :
	/**
	 * Display the select menu message
	 */
	function fw_theme_select_menu_message() {
		echo '<div class="topmenu"><p class="fw-primary-menu-message">' . esc_html__( 'Please go to the', 'the-core' ) . ' <a href="' . admin_url( 'nav-menus.php' ) . '" target="_blanck">' . esc_html__( 'Menu', 'the-core' ) . '</a> ' . esc_html__( 'section, create a  menu and then select the newly created menu from the Theme Locations box from the left.', 'the-core' ) . '</p></div>';
	}
endif;


if ( ! function_exists( 'fw_theme_select_menu_message_secondary' ) ) :
	/**
	 * Display the select menu message for secondary menu
	 */
	function fw_theme_select_menu_message_secondary() {
		echo '<div class="topmenu"><p class="fw-secondary-menu-message">' . esc_html__( 'Please select a Top Secondary Menu from the', 'the-core' ) . ' ' . ' <a href="' . admin_url( 'nav-menus.php?action=locations' ) . '" target="_blanck">' . esc_html__( 'Menu Locations', 'the-core' ) . '</a>' . ' ' . esc_html__( 'tab in order to make your header display as intended.', 'the-core' ) . '</p></div>';
	}
endif;



class The_Core_Mobile_Menu_Walker extends Walker_Nav_Menu {
	public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		$class_names = $value = '';
		$indent  = ( $depth ) ? str_repeat( "\t", $depth ) : '';
		$classes = empty( $item->classes ) ? array() : (array) $item->classes;

		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
		$class_names = ' class="'. esc_attr( $class_names ) . '"';

		$output .= $indent . '<li ' . $value . $class_names .'>';

		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

		//$description = ! empty( $item->description ) ? '<span>'.esc_attr( $item->description ).'</span>' : '';
		$description = '';

		if( $depth != 0 ) {
			$description = $append = $prepend = "";
		}

		$item_output  = '';
		$item_output .= isset( $args->before ) ? $args->before : '';
		$item_output .= '<a'. $attributes .'>';
		$item_output .= isset( $args->link_before ) ? $args->link_before .apply_filters( 'the_title', $item->title, $item->ID ) : '';
		$item_output .= isset( $args->link_after ) ? $description.$args->link_after : '';
		$item_output .= '</a>';
		$item_output .= isset( $args->after ) ? $args->after : '';

		$output .= apply_filters( 'the_core_walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
}


if ( ! function_exists( '_the_core_filter_fw_ext_mega_menu_wp_nav_menu_args' ) ) :
	/**
	 * Filter for mobile menu walker
	 */
	function _the_core_filter_fw_ext_mega_menu_wp_nav_menu_args($args) {
		if ( 'mobile-menu' == $args['container'] ) {
			$args['walker'] = new The_Core_Mobile_Menu_Walker();
		}

		return $args;
	}
endif;
add_filter('wp_nav_menu_args', '_the_core_filter_fw_ext_mega_menu_wp_nav_menu_args', 9999);


