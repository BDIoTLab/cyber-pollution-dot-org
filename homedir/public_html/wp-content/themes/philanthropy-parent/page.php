<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other 'pages' on your WordPress site will use a different template.
 */

get_header();
the_core_header_image();
$the_core_sidebar_position = function_exists( 'fw_ext_sidebars_get_current_position' ) ? fw_ext_sidebars_get_current_position() : 'right';
?>
<section class="fw-default-page fw-main-row <?php the_core_get_content_class( 'main', $the_core_sidebar_position ); ?>">
	<div class="fw-container">
		<div class="fw-row">
			<div class="fw-content-area <?php the_core_get_content_class( 'content', $the_core_sidebar_position ); ?>">
				<div class="fw-inner">
					<?php if( function_exists('fw_ext_breadcrumbs') ) fw_ext_breadcrumbs(); ?>
					<?php while ( have_posts() ) : the_post(); ?>
						<article id="page-<?php the_ID(); ?>" class="post post-details">
							<div class="inner">
								<header class="entry-header">
									<?php the_core_single_post_title( $post->ID, 'page' ); ?>
								</header>

								<div class="entry-content" itemprop="text">
									<?php
									the_content();
									wp_link_pages( array(
										'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'the-core' ) . '</span>',
										'after'       => '</div>',
										'link_before' => '<span>',
										'link_after'  => '</span>',
									) );
									?>
								</div><!-- /.entry-content -->
							</div><!-- /.inner -->
						</article><!-- /#page-## -->
						<?php if ( comments_open() ) comments_template(); ?>
					<?php break; ?>
					<?php endwhile; ?>
				</div><!-- /.inner -->
			</div><!-- /.content-area -->

			<?php get_sidebar(); ?>
		</div><!-- /.row -->
	</div><!-- /.container -->
</section>
<?php get_footer(); ?>