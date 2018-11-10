<?php
/**
 * Template Name: Visual Builder Template
 */
esc_html__( 'Visual Builder Template', 'the-core' );

get_header();

while ( have_posts() ) :
	the_post(); ?>

	<?php if ( post_password_required() ) : ?>
		<section class="fw-main-row password-protected-section" role="main" itemprop="mainContentOfPage" itemscope="itemscope" itemtype="https://schema.org/Blog">
			<div class="fw-container">
				<div class="fw-row">
					<div class="fw-content-area">
						<div class="fw-inner">
							<article id="page-<?php the_ID(); ?>" class="post post-details" itemscope="itemscope" itemtype="https://schema.org/BlogPosting" itemprop="blogPost">
								<div class="inner">
									<header class="entry-header">
										<?php the_core_single_post_title( $post->ID, 'page' ); ?>
									</header>
									<div class="entry-content" itemprop="text">
										<?php the_content(); ?>
									</div>
								</div><!-- /.inner-->
							</article>
						</div><!-- /.fw-inner-->
					</div><!-- /.fw-content-area-->
				</div><!-- /.fw-row-->
			</div><!-- /.fw-container-->
		</section>
	<?php else: ?>
		<?php the_content(); ?>
	<?php endif; ?>

	<?php if ( comments_open() ) : ?>
		<section class="fw-main-row">
			<div class="fw-container">
				<div class="fw-row">
					<div class="fw-content-area col-md-12">
						<div class="fw-inner">
							<?php comments_template(); ?>
						</div>
					</div>
				</div>
			</div>
		</section>
	<?php endif; ?>

<?php endwhile;

get_footer();