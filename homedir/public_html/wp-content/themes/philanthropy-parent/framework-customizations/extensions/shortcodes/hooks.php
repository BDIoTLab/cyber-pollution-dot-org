<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}


if ( ! function_exists( 'the_core_disable_default_shortcodes' ) ) :
	function the_core_disable_default_shortcodes( $to_disabled ) {
		$to_disabled[] = 'call_to_action';
		$to_disabled[] = 'notification';

		if ( ! class_exists( 'RevSlider' ) ) {
			$to_disabled[] = 'revolution_slider';
		}

		if ( ! function_exists( 'fw_ext_breadcrumbs' ) ) {
			$to_disabled[] = 'fw_breadcrumbs';
		}

		if ( ! fw_ext( 'portfolio' ) ) {
			$to_disabled[] = 'portfolio';
		}

		if ( ! class_exists( 'RGFormsModel' ) ) {
			$to_disabled[] = 'fw_gravityforms';
		}

		return $to_disabled;
	}
endif;
add_filter( 'fw_ext_shortcodes_disable_shortcodes', 'the_core_disable_default_shortcodes', 10, 2 );


if ( ! function_exists( 'the_core_ajax_get_shortcode_posts' ) ) :
	function the_core_ajax_get_shortcode_posts() {
		$blog_type      = isset( $_POST['blog_type'] ) ? $_POST['blog_type'] : 'blog-1';
		$blog_view      = isset( $_POST['blog_view'] ) ? $_POST['blog_view'] : '';
		$columns        = isset( $_POST['columns'] ) ? $_POST['columns'] : '';
		$posts_per_page = isset( $_POST['posts_per_page'] ) ? $_POST['posts_per_page'] : 5;
		$category       = isset( $_POST['category'] ) ? $_POST['category'] : 0;
		$page           = isset( $_POST['page'] ) ? $_POST['page'] : 2;
		$extra          = isset( $_POST['extra'] ) ? ( $_POST['extra'] ) : '';
		$extra_options  = ! empty( $extra ) ? unserialize( base64_decode( $extra ) ) : array();

		if ( $category == 0 ) {
			$args = array(
				'posts_per_page' => $posts_per_page,
				'post_type'      => 'post',
				'post_status'    => 'publish',
				'paged'          => $page,
				'orderby'        => 'date'
			);
		} else {
			$args = array(
				'posts_per_page' => $posts_per_page,
				'post_type'      => 'post',
				'post_status'    => 'publish',
				'paged'          => $page,
				'orderby'        => 'date',
				'tax_query'      => array(
					array(
						'taxonomy' => 'category',
						'field'    => 'id',
						'terms'    => $category
					)
				)
			);
		}
		$query = new WP_Query( $args );

		$sidebar_position  = ( $columns == 'fw-portfolio-cols-3' || $columns == 'fw-portfolio-cols-4' ) ? 'full' : 'right';
		$the_core_wrap_div = the_core_get_blog_wrap( $blog_view, $sidebar_position, $columns );

		$html_posts = '';
		if ( $query->have_posts() ) :
			while ( $query->have_posts() ) : $query->the_post();
				$html_posts .= $the_core_wrap_div['start'];
				if ( $post_format = get_post_format() ) {
					$html_posts .= the_core_render_view( fw_locate_theme_path( '/templates/' . $blog_type . '/content-' . $post_format . '.php' ), $extra_options );
				} else {
					$html_posts .= the_core_render_view( fw_locate_theme_path( '/templates/' . $blog_type . '/content.php' ), $extra_options );
				}
				$html_posts .= $the_core_wrap_div['end'];
			endwhile;
		endif;

		echo json_encode( array( 'html' => $html_posts ) );
		die();
	}
endif;
add_action( 'wp_ajax_the_core_ajax_get_shortcode_posts', 'the_core_ajax_get_shortcode_posts' );
add_action( 'wp_ajax_nopriv_the_core_ajax_get_shortcode_posts', 'the_core_ajax_get_shortcode_posts' );


if ( ! function_exists( 'the_core_ajax_get_shortcode_portfolio' ) ) :
	function the_core_ajax_get_shortcode_portfolio() {
		$type           = isset( $_POST['type'] ) ? $_POST['type'] : 'style1';
		$posts_per_page = isset( $_POST['posts_per_page'] ) ? $_POST['posts_per_page'] : 5;
		$category       = isset( $_POST['category'] ) ? $_POST['category'] : 0;
		$page           = isset( $_POST['page'] ) ? $_POST['page'] : 2;
		$extra          = isset( $_POST['extra'] ) ? ( $_POST['extra'] ) : '';
		$loop_data      = ! empty( $extra ) ? unserialize( base64_decode( $extra ) ) : array();

		$tax_query = array();
		if ( $category != '0' ) {
			$tax_query = array(
				array(
					'taxonomy' => 'fw-portfolio-category',
					'field'    => 'id',
					'terms'    => $category
				)
			);
		}
		$args  = array(
			'posts_per_page' => $posts_per_page,
			'post_type'      => 'fw-portfolio',
			'post_status'    => 'publish',
			'paged'          => $page,
			'orderby'        => 'date',
			'tax_query'      => $tax_query
		);
		$query = new WP_Query( $args );

		$html_posts = '';
		if ( $query->have_posts() ) :
			while ( $query->have_posts() ) : $query->the_post();
				$html_posts .= the_core_render_view( fw_locate_theme_path( '/framework-customizations/extensions/portfolio/views/loop-' . $type . '.php' ), array( 'loop_data' => $loop_data ) );
			endwhile;
		endif;

		echo json_encode( array( 'html' => $html_posts ) );
		die();
	}
endif;
add_action( 'wp_ajax_the_core_ajax_get_shortcode_portfolio', 'the_core_ajax_get_shortcode_portfolio' );
add_action( 'wp_ajax_nopriv_the_core_ajax_get_shortcode_portfolio', 'the_core_ajax_get_shortcode_portfolio' );


