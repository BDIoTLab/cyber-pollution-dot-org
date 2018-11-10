<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 */
?>

		<?php do_action( 'the_core_action_before_close_main' ); ?>

		</div><!-- /.site-main -->

		<?php do_action( 'the_core_action_before_footer' ); ?>
		<!-- Footer -->
		<footer id="colophon" class="site-footer fw-footer <?php the_core_get_footer_class(); ?>" itemscope="itemscope" itemtype="https://schema.org/WPFooter">
			<?php the_core_footer(); ?>
		</footer>
		<?php do_action( 'the_core_action_after_footer' ); ?>

	</div><!-- /#page -->
<?php the_core_page_transition_end(); ?>
<?php the_core_go_to_top_button(); ?>
<?php wp_footer(); ?>
</body>
</html>