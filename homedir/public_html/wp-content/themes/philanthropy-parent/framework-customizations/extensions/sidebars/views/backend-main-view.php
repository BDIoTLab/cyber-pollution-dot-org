<?php if (!defined('FW')) die('Forbidden'); ?>
<?php $cnt_created_sidebars = count($created_sidebars); ?>
<?php if ( fw()->extensions->get( 'sidebars' )->is_missing_config() or (false === fw()->extensions->get( 'sidebars' )->is_missing_config() and !empty($data_positions_options['choices'])) or $cnt_created_sidebars)  : ?>
	<div class="fw-ext-sidebars-wrap-container">
		<div class="fw-ext-sidebars-wrap">

			<h3 class="hndle">
				<span><?php esc_html_e('Manage Sidebars', 'the-core');?></span>
                <a class="fw-sidebar-docs fw-docs-link" target="_blank" href="http://docs.themefuse.com/the-core/your-theme/widgets/how-to-add-a-sidebar-to-a-page-or-blog-post-the-core"><span class="fw-docs-info dashicons dashicons-editor-help"></span><?php esc_html_e('Go to Docs', 'the-core'); ?></a>
			</h3>
			<div class="fw-ext-sidebars-desc"><?php esc_html_e('Use this section to create or set sidebars for different pages','the-core')?></div>

			<div class="fw-sidebars-tabs-wrapper" style="opacity: 0;" >
				<div class="fw-sidebars-tabs-list">
					<ul>
						<?php if (fw()->extensions->get( 'sidebars' )->is_missing_config() or (false === fw()->extensions->get( 'sidebars' )->is_missing_config() and  !empty($data_positions_options['choices']) )  ) : ?>
							<li><a href="#fw-sidebars-tab-1" class="nav-tab" ><span class="spinner"></span><?php echo esc_html__('For Grouped Pages','the-core'); ?></a></li>
							<li><a href="#fw-sidebars-tab-2" class="nav-tab" ><span class="spinner"></span><?php echo esc_html__('For Specific Pages','the-core'); ?></a></li>
						<?php endif ?>
						<li <?php echo ($cnt_created_sidebars) ? '' : 'class="empty"'; ?> ><a href="#fw-sidebars-tab-3" class="nav-tab" ><?php echo  $cnt_created_sidebars . ' ' . esc_html__('Created','the-core'); ?></a></li>
					</ul>
					<div class="fw-clear"></div>
				</div>

				<div class="fw-sidebars-tabs">
					<div class="fw-inner">

						<?php if (fw()->extensions->get( 'sidebars' )->is_missing_config() or (false === fw()->extensions->get( 'sidebars' )->is_missing_config() and  !empty($data_positions_options['choices']) )  ) : ?>
							<div id="fw-sidebars-tab-1" role="tabpanel" >
								<?php the_core_render_view(fw()->extensions->get('sidebars')->get_declared_path('/views/backend-tab-grouped.php'), array(
									'grouped_options' => $grouped_options,
									'data_positions_options' => $data_positions_options,
									'id' => 'grouped',
									'sidebars' => $sidebars,
								), false); ?>
							</div>

							<div id="fw-sidebars-tab-2" role="tabpanel" >
								<?php the_core_render_view(fw()->extensions->get('sidebars')->get_declared_path('/views/backend-tab-specific.php'), array(
									'specific_options' => $specific_options,
									'data_positions_options' => $data_positions_options,
									'id' => 'specific',
									'sidebars' => $sidebars,
								), false); ?>
							</div>
						<?php endif ?>

						<div id="fw-sidebars-tab-3" role="tabpanel" <?php echo ($cnt_created_sidebars ? '' : 'class="empty"') ?> >
							<?php the_core_render_view(fw()->extensions->get('sidebars')->get_declared_path('/views/backend-tab-created-sidebars.php'), compact('created_sidebars'), false ); ?>
						</div>

					</div>
				</div>
				<div class="fw-clear"></div>
			</div>

		</div>
	</div>
<?php endif; ?>
