<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * The template for displaying Archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 */

get_header();
the_core_header_image();
$the_core_sidebar_position = function_exists( 'fw_ext_sidebars_get_current_position' ) ? fw_ext_sidebars_get_current_position() : 'right';
$the_core_blog_view        = defined( 'FW' ) ? fw_get_db_settings_option( 'posts_settings/blog_view', '' ) : '';
?>
<section class="fw-main-row <?php the_core_get_content_class( 'main', $the_core_sidebar_position ); ?>">
	<div class="fw-container">
		<div class="fw-row">
			<div class="fw-content-area <?php the_core_get_content_class( 'content', $the_core_sidebar_position ); ?>">
				<div class="fw-col-inner">
					<?php if( function_exists('fw_ext_breadcrumbs') ) fw_ext_breadcrumbs(); ?>
					<div class="postlist <?php echo the_core_get_blog_view( $the_core_blog_view, 'class', $the_core_sidebar_position ); ?>" <?php echo the_core_get_blog_view( $the_core_blog_view, 'id', $the_core_sidebar_position ); ?>>
						<?php if ( have_posts() ) :
							$the_core_count = 0;
							$the_core_wrap_div = the_core_get_blog_wrap( $the_core_blog_view, $the_core_sidebar_position );
							// Start the Loop.
							while ( have_posts() ) : the_post();
								$the_core_count ++;
								/*
								* Include the post format-specific template for the content. If you want to
								* use this in a child theme, then include a file called called content-___.php
								* (where ___ is the post format) and that will be used instead.
								*/
								echo $the_core_wrap_div['start'];
								get_template_part( 'content', 'events' );
								echo $the_core_wrap_div['end'];
							endwhile;
						else :
							// If no content, include the "No posts found" template.
							get_template_part( 'content', 'none' );
						endif; ?>
					</div><!-- /.postlist-->
					<?php the_core_paging_navigation(); // archive pagination ?>
				</div><!-- /.col-inner-->
			</div><!-- /.content-area-->

			<?php get_sidebar(); ?>
		</div><!-- /.row-->
	</div><!-- /.container-->
</section>
<?php get_footer(); ?>