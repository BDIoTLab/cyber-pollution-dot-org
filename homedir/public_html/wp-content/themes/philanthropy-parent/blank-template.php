<?php
/**
 * Template Name: Blank Template
 */
esc_html__( 'Blank Template', 'the-core' );
?>
<!doctype html>
<html <?php language_attributes(); ?> >
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> itemscope="itemscope" itemtype="https://schema.org/WebPage">
	<div id="page" class="hfeed site">
		<div id="main" class="site-main">
			<?php
			while ( have_posts() ) :
				the_post();
				the_content();
			endwhile;
			?>
		</div><!-- /.site-main -->
	</div><!-- /#page -->
<?php wp_footer(); ?>
<?php the_core_go_to_top_button(); ?>
</body>
</html>