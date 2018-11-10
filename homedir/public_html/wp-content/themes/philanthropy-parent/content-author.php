<?php
/**
 * The template for displaying content-author in the single.php template.
 * To override this template in a child theme, copy this file
 * to your child theme's folder.
 *
 */

$the_core_enable_author_box  = defined( 'FW' ) ? fw_get_db_settings_option( 'posts_settings/post_author_box', '' ) : '';

if ( $the_core_enable_author_box == 'yes' ) : ?>
	<section class="author-description">
		<div class="author-image">
			<?php echo get_avatar( get_the_author_meta( 'ID' ), '164' ); ?>
		</div>
		<div class="author-text">
			<h2 class="author-name"><?php esc_html_e( 'Article by', 'the-core' ); ?> <span itemprop="name"><?php the_author(); ?></span></h2>

			<p><?php echo get_the_author_meta( 'description' ); ?></p>
		</div>
	</section>
	<div class="clearfix"></div>
<?php endif; ?>