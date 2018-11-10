<?php if (!defined('FW')) {
	die('Forbidden');

	/**
	 * @var array $atts
	 */
}

$term_id = (int)$atts['category'];
$the_core_blog_view = isset( $atts['blog_view']['selected'] ) ? $atts['blog_view']['selected'] : '';
$blog_type = !empty($atts['blog_type']) ? $atts['blog_type'] : 'blog-1';

$posts_per_page = (int)$atts['posts_number'];
if ($posts_per_page == 0) {
	$posts_per_page = get_option( 'posts_per_page' );
}

if ($term_id == 0) {
	$args = array(
		'posts_per_page' => $posts_per_page,
		'post_type' => 'post',
		'orderby' => 'date'
	);
} else {
	$args = array(
		'posts_per_page' => $posts_per_page,
		'post_type' => 'post',
		'orderby' => 'date',
		'tax_query' => array(
			array(
				'taxonomy' => 'category',
				'field' => 'id',
				'terms' => $term_id
			)
		)
	);
}

$query = new WP_Query($args);

// set sidebar position for 3 columns full, and function get the specific wrap
$the_core_sidebar_position = (isset($atts['blog_view']['grid']['columns']) && ($atts['blog_view']['grid']['columns'] == 'fw-portfolio-cols-3' || $atts['blog_view']['grid']['columns'] == 'fw-portfolio-cols-4' ) ) ? 'full' : 'right';
$the_core_wrap_div = the_core_get_blog_wrap($the_core_blog_view, $the_core_sidebar_position, $atts['blog_view']['grid']['columns'] );

$the_core_enable_masonry = isset( $atts['blog_view']['grid']['masonry'] ) ? $atts['blog_view']['grid']['masonry'] : 'on';

if ( $the_core_blog_view == 'grid' ) {
	$atts['class'] .= ' '.$atts['blog_view']['grid']['columns'];

	$the_core_template_directory_uri = get_template_directory_uri();
	$the_core_version = fw()->theme->manifest->get_version();
	if ( $the_core_enable_masonry == 'on' ) {
		wp_enqueue_script(
			'isotope',
			$the_core_template_directory_uri . '/js/isotope.pkgd.min.js',
			array('jquery'),
			$the_core_version,
			true
		);
		wp_enqueue_script(
			'start-masonry',
			$the_core_template_directory_uri . '/js/start-masonry.js',
			array('jquery', 'isotope'),
			$the_core_version,
			true
		);
	}
	else {
		wp_enqueue_script(
			'matchHeight',
			$the_core_template_directory_uri . '/js/lib/jquery.matchHeight-min.js',
			array( 'jquery' ),
			$the_core_version,
			true
		);
	}
}

// for portfolio masonry class
$atts['class'] .= ' fw-portfolio-masonry-'.$the_core_enable_masonry;

// for desktop
if (isset($atts['responsive']['desktop_display']['selected']) && $atts['responsive']['desktop_display']['selected'] == 'no') {
	$atts['class'] .= ' fw-desktop-hide-element';
}

// for tablet landscape
if (isset($atts['responsive']['tablet_landscape_display']['selected']) && $atts['responsive']['tablet_landscape_display']['selected'] == 'no') {
	$atts['class'] .= ' fw-tablet-landscape-hide-element';
}

// for tablet portrait
if (isset($atts['responsive']['tablet_display']['selected']) && $atts['responsive']['tablet_display']['selected'] == 'no') {
	$atts['class'] .= ' fw-tablet-hide-element';
}

// for display on smartphone
if (isset($atts['responsive']['smartphone_display']['selected']) && $atts['responsive']['smartphone_display']['selected'] == 'no') {
	$atts['class'] .= ' fw-mobile-hide-element';
}

// unique class
if (isset($atts['unique_id'])) {
	$atts['class'] .= ' tf-sh-' . $atts['unique_id'];
} else {
	$atts['class'] .= ' ' . uniqid('tf-sh-');
}

if ( isset( $atts['first_letter_caps'] ) ) {
	$atts['class'] .= ' '.$atts['first_letter_caps'];
}

// extra options for post meta
$extra_options = array();
if (isset($atts['post_date'])) $extra_options['extra_options']['post_date'] = $atts['post_date'];
if (isset($atts['post_author'])) $extra_options['extra_options']['post_author'] = $atts['post_author'];
if (isset($atts['post_categories'])) $extra_options['extra_options']['post_categories'] = $atts['post_categories'];
if (isset($atts['display_comments_number'])) $extra_options['extra_options']['display_comments_number'] = $atts['display_comments_number'];
if (isset($atts['blog_title'])) $extra_options['extra_options']['blog_title'] = $atts['blog_title'];
if (isset($atts['button_options'])) $extra_options['extra_options']['button_options'] = $atts['button_options'];

// send encoded data attributes with ajax in view that it's need to AJAX pagination
$encoded_extra_atts = '';
if( ! is_admin() && isset( $atts['show_load_more'] ) && 'yes' == $atts['show_load_more'] ) {
	$encoded_extra_atts = base64_encode( serialize($extra_options) );
}

/*----------------Animation option--------------*/
$data_animation = '';
if (isset($atts['animation_group'])) {
	// get animation class and delay
	if ($atts['animation_group']['selected'] == 'yes') {
		$atts['class'] .= ' fw-animated-element';
		// get animation
		if (!empty($atts['animation_group']['yes']['animation']['animation'])) {
			$data_animation .= ' data-animation-type="' . $atts['animation_group']['yes']['animation']['animation'] . '"';
		}

		// get delay
		if (!empty($atts['animation_group']['yes']['animation']['delay'])) {
			$data_animation .= ' data-animation-delay="' . (int)esc_attr($atts['animation_group']['yes']['animation']['delay']) . '"';
		}
	}
}
/*----------------End Animation----------------*/
?>
<div class="fw-shortcode-latest-posts postlist <?php echo the_core_get_blog_view($the_core_blog_view, 'class', $the_core_sidebar_position); ?> <?php echo esc_attr($atts['class']); ?>" <?php echo ($data_animation); ?> <?php echo the_core_get_blog_view($the_core_blog_view, 'id', $the_core_sidebar_position) ?> data-blog-type="<?php echo esc_attr($blog_type); ?>" data-posts-per-page="<?php echo esc_attr($posts_per_page); ?>" data-category="<?php echo esc_attr($atts['category']); ?>" data-page="2" data-max-pages="<?php echo esc_attr($query->max_num_pages); ?>" data-blog-view="<?php echo  esc_attr($the_core_blog_view); ?>" data-columns="<?php echo esc_attr($atts['blog_view']['grid']['columns']); ?>" data-extra='<?php echo $encoded_extra_atts; ?>'>
	<?php if ($query->have_posts()) :
		// Start the Loop.
		while ($query->have_posts()) : $query->the_post();
			echo $the_core_wrap_div['start'];
			if( $post_format = get_post_format() ) {
				echo the_core_render_view(fw_locate_theme_path('/templates/' . $blog_type . '/content-' . $post_format . '.php'), $extra_options);
			} else {
				echo the_core_render_view(fw_locate_theme_path('/templates/' . $blog_type . '/content.php'), $extra_options);
			}
			echo $the_core_wrap_div['end'];
		endwhile; ?>

		<?php if( isset( $atts['show_load_more'] ) && 'yes' == $atts['show_load_more'] ) : ?>
			<div class="fw-js-load-more-posts postlist-col">
			<?php
				// btn settings array
				$btn = $atts['load_more_button'];

				// btn size
				$button_size = $btn['size'];
				if ( $button_size['selected'] == 'custom' ) {
					$btn_size_style = 'width:' . (int) esc_attr( $button_size['custom']['width'] ) . 'px;height:' . (int) esc_attr( $button_size['custom']['height'] ) . 'px; line-height:' . (int) esc_attr( $button_size['custom']['height'] ) . 'px;';
					$btn_size_class = '';
				} else {
					$btn_size_class = $button_size['selected'];
					$btn_size_style = '';
				}

				$style = 'fw-btn-1';
				if(isset($btn['style']['selected'])){
					$style = $btn['style']['selected'];
				}

				// get icon type
				$icon_type = $btn['icon_type'];
				$icon      = '';

				if ( $icon_type['tab_icon'] == 'icon-class' ) {
					if( !empty( $icon_type['icon-class']['icon_class'] ) ) {
						// get icon size
						$icon_size = ! empty( $btn['icon_size'] ) ? 'style="font-size:' . esc_attr( (int) $btn['icon_size'] ) . 'px;"' : '';
						$icon      = '<i class="' . $btn['icon_position'] . ' ' . $icon_type['icon-class']['icon_class'] . '" ' . $icon_size . '></i>';
					}
				} else {
					if ( ! empty( $icon_type['upload-icon']['upload-custom-img']['url'] ) ) {
						// get image size
						$icon_size = ! empty( $btn['icon_size'] ) ? 'style="width:' . esc_attr( (int) $btn['icon_size'] ) . 'px;"' : '';
						$icon      = '<img class="' . $btn['icon_position'] . '" src="' . esc_url( the_core_change_original_link_with_cdn($icon_type['upload-icon']['upload-custom-img']['url']) ) . '" ' . $icon_size . ' />';
					}
				}
				?>
				<div class="fw-load-more-btn <?php echo ( $btn['full_width']['selected_type'] != 'full_width' ) ? esc_attr( $btn['full_width']['default']['btn_alignment'] ) : ''; ?>">
					<a href="#" class="fw-btn <?php echo ( $btn['full_width']['selected_type'] != 'default' ) ? esc_attr( $btn['full_width']['selected_type'] ) : ''; ?> <?php echo esc_attr( $btn_size_class ); ?> <?php the_core_button_class( $style ); ?>" style="<?php echo ($btn_size_style); ?>">
					<span>
						<?php if ( $btn['icon_position'] == 'pull-right-icon' ) : ?>
							<?php echo the_core_translate( esc_attr( $btn['label'] ) ); echo ($icon); ?>
						<?php else : ?>
							<?php echo ($icon); echo the_core_translate( esc_attr( $btn['label'] ) ); ?>
						<?php endif; ?>
					</span>
					</a>
				</div>
			</div>
		<?php endif; ?>
	<?php else :
		// If no content, include the "No posts found" template.
		get_template_part('content', 'none');
	endif; ?>
</div>
<?php wp_reset_postdata();