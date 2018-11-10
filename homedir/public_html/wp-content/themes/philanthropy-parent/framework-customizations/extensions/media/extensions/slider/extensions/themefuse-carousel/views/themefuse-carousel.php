<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
} ?>

<?php
if ( isset( $data['slides'] ) ) :
	$the_core_count                 = 0;
	$themefuse_carousel_id = uniqid( 'themefuse-carousel-' );
	$bg_style              = '';
	if ( ! empty( $data['settings']['extra']['carousel_bg'] ) ) {
		$bg_style = 'style="background: url(' . the_core_change_original_link_with_cdn( $data['settings']['extra']['carousel_bg']['url'] ) . ') no-repeat;"';
	}
	$interval = $data['settings']['extra']['slides_interval'];
	$play     = 'true';
	if ( $interval == '0' || $interval == '' ) {
		$play     = 'false';
		$interval = '0';
	}

	$unique_class = '';
	if ( isset( $data['settings']['extra']['unique_id'] ) ){
		$unique_class = 'tf-sh-'.$data['settings']['extra']['unique_id'];
	}

	if( !empty($extra_data) ){
        // for desktop
        if( isset($extra_data['responsive']['desktop_display']['selected']) && $extra_data['responsive']['desktop_display']['selected'] == 'no' ) {
            $unique_class .= ' fw-desktop-hide-element';
        }

        // for tablet landscape
        if( isset($extra_data['responsive']['tablet_landscape_display']['selected']) && $extra_data['responsive']['tablet_landscape_display']['selected'] == 'no' ) {
            $unique_class .= ' fw-tablet-landscape-hide-element';
        }

        // for tablet portrait
		if( isset($extra_data['responsive']['tablet_display']['selected']) && $extra_data['responsive']['tablet_display']['selected'] == 'no' ) {
			$unique_class .= ' fw-tablet-hide-element';
		}

		// for display on smartphone
		if( isset($extra_data['responsive']['smartphone_display']['selected']) && $extra_data['responsive']['smartphone_display']['selected'] == 'no' ) {
			$unique_class .= ' fw-mobile-hide-element';
		}
	}

	$taxomies_ids = $final_taxonomies = array();
	// collect the ids of taxonomy
	foreach ( $data['slides'] as $slide ) :
		$taxomies_ids[] = $slide['extra']['taxonomy'];
	endforeach;

	// get the taxonomies
	$args  = array(
		'orderby' => 'name',
		'order'   => 'ASC',
		'include' => $taxomies_ids,
	);
	$terms = get_terms( 'fw-portfolio-category', $args );

	if( isset($terms->errors) ) {
		return;
	}

	// create the final array of terms
	foreach ( $terms as $term ) :
		$final_taxonomies[ $term->term_id ] = array(
			'name'  => $term->name,
			'count' => $term->count,
		);
	endforeach;

	$image_args    = array(
		'img_attr' => array( 'class' => 'attachment-post-thumbnail' ),
		'size'     => 'fw-theme-blog-full',
		'return'   => true,
		'isbg'     => true,
		'ratio'    => ''
	);
	?>
	<div class="fw-themefuse-carousel-wrapper <?php echo esc_attr($unique_class); ?>">
		<div class="fw-themefuse-carousel">
			<ul class="themefuse-slider-items" id="<?php echo esc_attr($themefuse_carousel_id); ?>" data-play="<?php echo esc_attr($play); ?>" data-slides-interval="<?php echo esc_attr($interval); ?>">
				<?php foreach ( $data['slides'] as $id => $slide ): $the_core_count ++; ?>
					<?php $image = the_core_image( $slide, $image_args ); ?>
					<?php $tax_id = $slide['extra']['taxonomy']; ?>
					<?php $tax_id = isset($slide['extra']['taxonomy']) ? $slide['extra']['taxonomy'] : 0; ?>
					<li class="lazyload fw-ratio-container fw-ratio-9-16" data-about-slider="<?php echo esc_attr($the_core_count); ?>" <?php echo ($image['img']); ?> >
						<a href="<?php if($tax_id != 0){echo get_term_link( (int) $tax_id, 'fw-portfolio-category' );}else{echo '#';} ?>" class="fw-themefuse-carousel-content-wrap">
							<div class="fw-themefuse-carousel-content">
								<div class="fw-itable">
									<div class="fw-icell">
										<div class="item-title"><?php if ( isset( $final_taxonomies[ $tax_id ]['name'] ) ) { echo ($final_taxonomies[ $tax_id ]['name']); } ?></div>
										<hr class="item-divider" />
										<span class="number-project"><?php if ( isset( $final_taxonomies[ $tax_id ]['count'] ) ) {
												echo ($final_taxonomies[ $tax_id ]['count']);
											}else{echo '0';} ?> <?php if ( isset( $final_taxonomies[ $tax_id ]['count'] ) && $final_taxonomies[ $tax_id ]['count'] == '1' ) {
												esc_html_e( 'PROJECT', 'the-core' );
											} else {
												esc_html_e( 'PROJECTS', 'the-core' );
											} ?></span>
									</div>
								</div>
							</div>
						</a>
					</li>
				<?php endforeach; ?>
			</ul>
			<!--Themefuse Carousel-->
			<div class="fw-themefuse-carousel-control">
				<div class="fw-control-title-wrap">
					<div class="fw-itable">
						<div class="fw-icell">
							<div class="fw-control-title-before"><?php echo ($data['settings']['extra']['slider_before_title']); ?></div>

							<div class="fw-control-title-after"><?php echo ($data['settings']['title']); ?></div>
						</div>
					</div>
				</div>
				<div class="fw-control-description">
					<?php echo ($data['settings']['extra']['description']); ?>
				</div>
				<div class="fw-control-nav">
					<a id="<?php echo esc_attr($themefuse_carousel_id); ?>-prev" class="prev" href="#"><i class="fw-nav-icon"></i></a>
					<a href="<?php echo esc_url($data['settings']['extra']['slider_link_more']); ?>" class="view-more"><?php esc_html_e( 'View All', 'the-core' ); ?></a>
					<a id="<?php echo esc_attr($themefuse_carousel_id); ?>-next" class="next" href="#"><i class="fw-nav-icon"></i></a>
				</div>
			</div>
		</div>
	</div>
<?php endif; ?>