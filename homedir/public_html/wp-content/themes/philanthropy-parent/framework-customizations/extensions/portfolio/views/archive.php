<?php
get_header();
global $wp_query;
$ext_portfolio_instance = fw()->extensions->get( 'portfolio' );
$ext_portfolio_settings = $ext_portfolio_instance->get_settings();

$taxonomy   = $ext_portfolio_settings['taxonomy_name'];
$term       = get_term_by( 'slug', get_query_var( 'term' ), $taxonomy );
$term_id    = ( ! empty( $term->term_id ) ) ? $term->term_id : 0;
$categories = fw_ext_portfolio_get_listing_categories( $term_id, $taxonomy );

$uniqid           = uniqid();
$listing_classes  = 'fw-portfolio-item';
$the_core_settings_option  = fw_get_db_settings_option();
$filter_enabled   = isset($the_core_settings_option['enable_portfolio_filter']) ? $the_core_settings_option['enable_portfolio_filter'] : 'yes';
$portfolio_style  = isset($the_core_settings_option['portfolio_style']['selected']) ?  $the_core_settings_option['portfolio_style']['selected'] : 'style1';
$portfolio_type   = fw_get_db_term_option( $term_id, $taxonomy, 'portfolio_type', 'fw-portfolio-landscape' );
$columns          = fw_get_db_term_option( $term_id, $taxonomy, 'portfolio_columns', 'fw-portfolio-cols-3' );
$the_core_sidebar_position = function_exists( 'fw_ext_sidebars_get_current_position' ) ? fw_ext_sidebars_get_current_position() : 'right';
$portfolio_class  = '';
$advanced_options = array();

if ( $portfolio_style == 'style1' ) {
	$portfolio_class .= 'fw-portfolio-1 '.$columns;
	// portfolio alignment
	if ( isset( $the_core_settings_option['portfolio_style']['style1']['style1_advanced_styling'] ) ) {
		$portfolio_class .= ' '.$the_core_settings_option['portfolio_style']['style1']['style1_advanced_styling']['content_position'];
		$portfolio_class .= ' '.$the_core_settings_option['portfolio_style']['style1']['style1_advanced_styling']['content_alignment'];
	}
} elseif ( $portfolio_style == 'style2' ) {
	$portfolio_class = 'fw-portfolio-2 '.$columns.' bordered';
	// advanced options
	$advanced_options = $the_core_settings_option['portfolio_style']['style2'];
	// portfolio alignment
	if ( isset( $the_core_settings_option['portfolio_style']['style2']['style2_advanced_styling'] ) ) {
		$portfolio_class .= ' '.$the_core_settings_option['portfolio_style']['style2']['style2_advanced_styling']['content_alignment'];
	}
} elseif ( $portfolio_style == 'style3' ) {
	$portfolio_class = 'fw-portfolio-3 '.$columns;
	// advanced options
	$advanced_options = $the_core_settings_option['portfolio_style']['style3'];
	// portfolio alignment
	if ( isset( $the_core_settings_option['portfolio_style']['style3']['style1_advanced_styling'] ) ) {
		$portfolio_class .= ' '.$the_core_settings_option['portfolio_style']['style3']['style1_advanced_styling']['content_position'];
		$portfolio_class .= ' '.$the_core_settings_option['portfolio_style']['style3']['style1_advanced_styling']['content_alignment'];
	}
}

$loop_data = array(
	'settings'         => $ext_portfolio_settings,
	'categories'       => $categories,
	'image_sizes'      => $ext_portfolio_instance->get_image_sizes(),
	'listing_classes'  => $listing_classes,
	'portfolio_type'   => $portfolio_type, // only for portraits/landscape
	'advanced_options' => $advanced_options,
);
set_query_var( 'fw_portfolio_loop_data', $loop_data );

the_core_header_image();
?>
<section class="fw-main-row <?php the_core_get_content_class( 'main', $the_core_sidebar_position ); ?>">
	<div class="fw-container">
		<div class="fw-row">
			<div class="fw-content-area <?php the_core_get_content_class( 'content', $the_core_sidebar_position ); ?>">
				<div class="fw-col-inner">
					<?php if( function_exists('fw_ext_breadcrumbs') ) fw_ext_breadcrumbs(); ?>
					<div class="fw-portfolio <?php echo esc_attr($portfolio_class); ?> <?php echo esc_attr($portfolio_type); ?>">
						<?php fw_theme_portfolio_filter( $filter_enabled, $uniqid ); ?>
						<?php if ( have_posts() ) : ?>
							<div class="fw-row fw-portfolio-wrapper">
								<ul id="fw-portfolio-list-<?php echo esc_attr($uniqid); ?>" class="fw-portfolio-list clearfix">
									<?php
									while ( have_posts() ) : the_post();
										get_template_part( 'framework-customizations/extensions' . $ext_portfolio_instance->get_rel_path() . '/views/loop', $portfolio_style );
									endwhile;
									?>
								</ul>
							</div><!-- /.fw-portfolio-wrapper-->
						<?php else :
							// If no content, include the "No posts found" template.
							get_template_part( 'content', 'none' );
						endif;
						?>
					</div><!-- /.fw-portfolio -->
					<div class="fw-portfolio-navigation">
						<?php the_core_paging_navigation(); // for number pagination ?>
					</div>
				</div><!-- /.fw-container -->
			</div><!-- /.fw-col-sm-12 -->

			<?php get_sidebar(); ?>
		</div><!-- /.fw-row -->
	</div><!-- /.fw-container -->
</section>
<input id="current_portfolio_category" type="hidden" value="<?php echo esc_attr($term_id); ?>" name="current_category"/>
<?php
// free memory
unset( $ext_portfolio_instance );
unset( $ext_portfolio_settings );
set_query_var( 'fw_portfolio_loop_data', '' );
get_footer();