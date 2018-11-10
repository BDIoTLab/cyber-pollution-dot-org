<?php
/**
 * The Sidebar containing the main widget area
 */

$the_core_sidebar_position = null;
if ( function_exists( 'fw_ext_sidebars_get_current_position' ) ) :
	$the_core_sidebar_position = fw_ext_sidebars_get_current_position();
	if ( $the_core_sidebar_position !== 'full' && $the_core_sidebar_position !== null ) : ?>
		<div class="col-md-4 col-sm-12 fw-sidebar" role="complementary" itemscope="itemscope" itemtype="https://schema.org/WPSideBar">
			<div class="fw-col-inner">
				<?php if ( $the_core_sidebar_position === 'left' || $the_core_sidebar_position === 'right' ) : ?>
					<?php echo fw_ext_sidebars_show( 'blue' ); ?>
				<?php endif; ?>
			</div><!-- /.inner -->
		</div><!-- /.sidebar -->
	<?php endif; ?>
<?php else : ?>
	<div class="col-md-4 col-sm-12 fw-sidebar" role="complementary" itemscope="itemscope" itemtype="https://schema.org/WPSideBar">
		<div class="fw-col-inner">
			<?php dynamic_sidebar( 'sidebar-1' ); ?>
		</div><!-- /.inner -->
	</div><!-- /.sidebar -->
<?php endif; ?>