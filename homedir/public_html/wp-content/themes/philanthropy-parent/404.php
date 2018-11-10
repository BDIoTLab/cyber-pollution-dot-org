<?php
/**
 * The template for displaying 404 pages (Not Found)
 */
?>
<?php get_header(); ?>
<?php $the_core_sidebar_position = function_exists( 'fw_ext_sidebars_get_current_position' ) ? fw_ext_sidebars_get_current_position() : 'right'; ?>
<div class="no-header-image"></div>
<section class="fw-default-page fw-404-page fw-main-row <?php the_core_get_content_class( 'main', $the_core_sidebar_position ); ?>">
	<div class="fw-container">
		<div class="fw-row">

			<div class="content-area <?php the_core_get_content_class( 'content', $the_core_sidebar_position ); ?>">
				<h2 class="entry-title fw-title-404"><?php esc_html_e( '404 - Page Not Found', 'the-core' ); ?></h2>
				<div class="page-content">
					<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?', 'the-core' ); ?></p>
					<?php get_search_form(); ?>
				</div><!-- .page-content -->
			</div><!-- /.content-area-->

			<?php get_sidebar(); ?>
		</div><!-- /.row-->
	</div><!-- /.container-->
</section>
<?php get_footer(); ?>