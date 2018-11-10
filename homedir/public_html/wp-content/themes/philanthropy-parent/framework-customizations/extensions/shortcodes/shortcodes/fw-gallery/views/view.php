<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );

	/**
	 * @var array $atts
	 */
}

$the_core_count   = 0;
$column1 = $column2 = $column3 = $output = '';
if( isset($atts['unique_id']) ){
	$gallery_id = 'fw-gallery-'.$atts['unique_id'];
}
else {
	$gallery_id = uniqid( 'fw-gallery-' );
}

$item_extra_class = '';
$item_extra_class .= isset( $atts['titles_on_hover']['selected']) && 'no' == $atts['titles_on_hover']['selected'] ? ' fw-gallery-display-title-visible' : '';
$item_extra_class .= isset( $atts['subtitles_on_hover']['selected']) && 'no' == $atts['subtitles_on_hover']['selected'] ? ' fw-gallery-display-description-visible' : '';

if( $atts['gallery_style'] == 'fw-gallery-type1') {
	$a_class = '';
	$ratios   = array(
		'0' => 'fw-ratio-16-9',
		'1' => 'fw-ratio-1',
		'2' => 'fw-ratio-4-3',
		'3' => 'fw-ratio-16-9',
		'4' => 'fw-ratio-1',
		'5' => 'fw-ratio-16-9',
		'6' => 'fw-ratio-4-3',
	);
	$column1 .= '<div class="fw-gallery-col fw-col-width1">';
	$column2 .= '<div class="fw-gallery-col fw-col-width2">';
	$column3 .= '<div class="fw-gallery-col fw-col-width1">';
	foreach ( $atts['images'] as $item ) :
		if($item['overlay_color']['id'] == 'fw-custom'){
			$the_core_overlay_style = '';
			if(!empty($item['overlay_color']['color'])) {
				$the_core_overlay_style = 'style="background-color: ' . $item['overlay_color']['color'] . '"';
			}
			$overlay_class = '';
		}else{
			$the_core_overlay_style = '';
			$overlay_class = 'overlay_'.$item['overlay_color']['id'];
		}
		$the_core_count ++;
		$current = $the_core_count % 7;
		$args  = array(
			'img_attr' => array( 'class' => 'attachment-post-thumbnail' ),
			'size'     => 'fw-theme-blog-full',
			'return'   => true,
			'ratio'    => $ratios[$current]
		);
		$image = the_core_image( $item['image'], $args );
		if ( $atts['prettyphoto'] == 'yes' ) {
			$link     = $image['original_image_url'];
			$data_rel = 'data-rel="prettyPhoto[' . $gallery_id . ']"';
			$data_rel .= ' rel="prettyPhoto[' . $gallery_id . ']"';
			$i_class  = 'fw-icon-zoom';
		} else {
			$link     = $item['link'];
			$data_rel = '';
			$i_class  = 'fw-icon-link';
			if (strpos($link, "#") !== false && strlen($link) > 1) {
				$a_class = 'anchor';
			}
			else{
				$a_class = '';
			}
		}

		if ( $current == 1 ) :
			$column1 .= '<div class="fw-gallery-image fw-height-lg fw-block-image-parent fw-overlay-7 '.$item_extra_class.' '.$overlay_class.'" '.$the_core_overlay_style.'>
					<a href="' . $link . '" ' . $data_rel . ' class="fw-block-image-child fw-ratio-container '.$ratios[$current].' '.$a_class.'">
						' . $image["img"] . '
						<div class="fw-block-image-overlay">
							<div class="fw-itable">
								<div class="fw-icell">
									<i class="'.$i_class.'"></i>
									<h5 class="fw-overlay-title">' . $item['image_title'] . '</h5>
									<p class="fw-overlay-description">' . $item['image_subtitle'] . '</p>
								</div>
							</div>
						</div>
					</a>
				</div>';
		elseif ( $current == 5 ) :
			$column1 .= ' <div class="fw-gallery-image fw-height-md fw-block-image-parent fw-overlay-7 '.$item_extra_class.' '.$overlay_class.'" '.$the_core_overlay_style.'>
					<a href="' . $link . '" ' . $data_rel . ' class="fw-block-image-child fw-ratio-container '.$ratios[$current].' '.$a_class.'">
						' . $image["img"] . '
						<div class="fw-block-image-overlay">
							<div class="fw-itable">
								<div class="fw-icell">
									<i class="'.$i_class.'"></i>
									<h5 class="fw-overlay-title">' . $item['image_title'] . '</h5>
									<p class="fw-overlay-description">' . $item['image_subtitle'] . '</p>
								</div>
							</div>
						</div>
					</a>
				</div>';
		elseif ( $current == 2 ) :
			$column2 .= '<div class="fw-gallery-image fw-height-md fw-block-image-parent fw-overlay-7 '.$item_extra_class.' '.$overlay_class.'" '.$the_core_overlay_style.'>
					<a href="' . $link . '" ' . $data_rel . ' class="fw-block-image-child fw-ratio-container '.$ratios[$current].' '.$a_class.'">
						' . $image["img"] . '
						<div class="fw-block-image-overlay">
							<div class="fw-itable">
								<div class="fw-icell">
									<i class="'.$i_class.'"></i>
									<h5 class="fw-overlay-title">' . $item['image_title'] . '</h5>
									<p class="fw-overlay-description">' . $item['image_subtitle'] . '</p>
								</div>
							</div>
						</div>
					</a>
				</div>';
		elseif ( $current == 3 ) :
			$column2 .= '<div class="fw-gallery-image fw-height-sm fw-block-image-parent fw-overlay-7 '.$item_extra_class.' '.$overlay_class.'" '.$the_core_overlay_style.'>
					<a href="' . $link . '" ' . $data_rel . ' class="fw-block-image-child fw-ratio-container '.$ratios[$current].' '.$a_class.'">
						' . $image["img"] . '
						<div class="fw-block-image-overlay">
							<div class="fw-itable">
								<div class="fw-icell">
									<i class="'.$i_class.'"></i>
									<h5 class="fw-overlay-title">' . $item['image_title'] . '</h5>
									<p class="fw-overlay-description">' . $item['image_subtitle'] . '</p>
								</div>
							</div>
						</div>
					</a>
				</div>';
		elseif ( $current == 6 ) :
			$column2 .= '<div class="fw-gallery-image fw-height-md fw-block-image-parent fw-overlay-7 '.$item_extra_class.' '.$overlay_class.'" '.$the_core_overlay_style.'>
					<a href="' . $link . '" ' . $data_rel . ' class="fw-block-image-child fw-ratio-container '.$ratios[$current].' '.$a_class.'">
						' . $image["img"] . '
						<div class="fw-block-image-overlay">
							<div class="fw-itable">
								<div class="fw-icell">
									<i class="'.$i_class.'"></i>
									<h5 class="fw-overlay-title">' . $item['image_title'] . '</h5>
									<p class="fw-overlay-description">' . $item['image_subtitle'] . '</p>
								</div>
							</div>
						</div>
					</a>
				</div>';
		elseif ( $current == 0 ) :
			$column3 .= '<div class="fw-gallery-image fw-height-md fw-block-image-parent fw-overlay-7 '.$item_extra_class.' '.$overlay_class.'" '.$the_core_overlay_style.'>
					<a href="' . $link . '" ' . $data_rel . ' class="fw-block-image-child fw-ratio-container '.$ratios[$current].' '.$a_class.'">
						' . $image["img"] . '
						<div class="fw-block-image-overlay">
							<div class="fw-itable">
								<div class="fw-icell">
									<i class="'.$i_class.'"></i>
									<h5 class="fw-overlay-title">' . $item['image_title'] . '</h5>
									<p class="fw-overlay-description">' . $item['image_subtitle'] . '</p>
								</div>
							</div>
						</div>
					</a>
				</div>';
		elseif ( $current == 4 ) :
			$column3 .= '<div class="fw-gallery-image fw-height-lg fw-block-image-parent fw-overlay-7 '.$item_extra_class.' '.$overlay_class.'" '.$the_core_overlay_style.'>
					<a href="' . $link . '" ' . $data_rel . ' class="fw-block-image-child fw-ratio-container '.$ratios[$current].' '.$a_class.'">
						' . $image["img"] . '
						<div class="fw-block-image-overlay">
							<div class="fw-itable">
								<div class="fw-icell">
									<i class="'.$i_class.'"></i>
									<h5 class="fw-overlay-title">' . $item['image_title'] . '</h5>
									<p class="fw-overlay-description">' . $item['image_subtitle'] . '</p>
								</div>
							</div>
						</div>
					</a>
				</div>';
		endif;
	endforeach;
	$column1 .= '</div>';
	$column2 .= '</div>';
	$column3 .= '</div>';
	$output  .= $column1.$column2.$column3;
}
elseif( $atts['gallery_style'] == 'fw-gallery-type2') {
	$a_class = '';
	$ratios   = array(
		'0' => 'fw-ratio-3-2',
		'1' => 'fw-ratio-3-2',
		'2' => 'fw-ratio-1',
		'3' => 'fw-ratio-1',
		'4' => 'fw-ratio-16-9',
	);
	$column1 .= '<div class="fw-gallery-col fw-col-width1">';
	$column2 .= '<div class="fw-gallery-col fw-col-width1">';
	foreach ( $atts['images'] as $item ) :
		if($item['overlay_color']['id'] == 'fw-custom'){
			$the_core_overlay_style = '';
			if(!empty($item['overlay_color']['color'])) {
				$the_core_overlay_style = 'style="background-color: ' . $item['overlay_color']['color'] . '"';
			}
			$overlay_class = '';
		}else{
			$the_core_overlay_style = '';
			$overlay_class = 'overlay_'.$item['overlay_color']['id'];
		}
		$the_core_count ++;
		$current = $the_core_count % 5;
		$args  = array(
			'img_attr' => array( 'class' => 'attachment-post-thumbnail' ),
			'size'     => 'fw-theme-blog-full',
			'return'   => true,
			'ratio'    => $ratios[$current]
		);
		$image = the_core_image( $item['image'], $args );
		if ( $atts['prettyphoto'] == 'yes' ) {
			$link     = $image['original_image_url'];
			$data_rel = 'data-rel="prettyPhoto[' . $gallery_id . ']"';
			$data_rel .= ' rel="prettyPhoto[' . $gallery_id . ']"';
			$i_class  = 'fw-icon-zoom';
		} else {
			$link     = $item['link'];
			$data_rel = '';
			$i_class  = 'fw-icon-link';
			if (strpos($link, "#") !== false && strlen($link) > 1) {
				$a_class = 'anchor';
			}
			else{
				$a_class = '';
			}
		}

		if ( $current == 1 ) :
			$column1 .= '<div class="fw-gallery-image fw-height-md fw-block-image-parent fw-overlay-4 '.$item_extra_class.' '.$overlay_class.'" '.$the_core_overlay_style.'>
					<a href="' . $link . '" ' . $data_rel . ' class="fw-block-image-child fw-ratio-container '.$ratios[$current].' '.$a_class.'">
						' . $image["img"] . '
						<div class="fw-block-image-overlay">
							<div class="fw-itable">
								<div class="fw-icell">
									<i class="'.$i_class.'"></i>
									<h5 class="fw-overlay-title">' . $item['image_title'] . '</h5>
									<p class="fw-overlay-description">' . $item['image_subtitle'] . '</p>
								</div>
							</div>
						</div>
					</a>
				</div>';
		elseif ( $current == 4 ) :
			$column1 .= '<div class="fw-gallery-image fw-height-sm fw-block-image-parent fw-overlay-4 '.$item_extra_class.' '.$overlay_class.'" '.$the_core_overlay_style.'>
				<a href="' . $link . '" ' . $data_rel . ' class="fw-block-image-child fw-ratio-container '.$ratios[$current].' '.$a_class.'">
					' . $image["img"] . '
					<div class="fw-block-image-overlay">
						<div class="fw-itable">
							<div class="fw-icell">
								<i class="'.$i_class.'"></i>
								<h5 class="fw-overlay-title">' . $item['image_title'] . '</h5>
								<p class="fw-overlay-description">' . $item['image_subtitle'] . '</p>
							</div>
						</div>
					</div>
				</a>
			</div>';
		elseif ( $current == 2 ) :
			$column2 .= '<div class="fw-gallery-col fw-col-width2">
				<div class="fw-gallery-image fw-height-sm fw-block-image-parent fw-overlay-4 '.$item_extra_class.' '.$overlay_class.'" '.$the_core_overlay_style.'>
					<a href="' . $link . '" ' . $data_rel . ' class="fw-block-image-child fw-ratio-container '.$ratios[$current].' '.$a_class.'">
						' . $image["img"] . '
						<div class="fw-block-image-overlay">
							<div class="fw-itable">
								<div class="fw-icell">
									<i class="'.$i_class.'"></i>
									<h5 class="fw-overlay-title">' . $item['image_title'] . '</h5>
									<p class="fw-overlay-description">' . $item['image_subtitle'] . '</p>
								</div>
							</div>
						</div>
					</a>
				</div>
			</div>';
		elseif ( $current == 3 ) :
			$column2 .= '<div class="fw-gallery-col fw-col-width2">
				<div class="fw-gallery-image fw-height-sm fw-block-image-parent fw-overlay-4 '.$item_extra_class.' '.$overlay_class.'" '.$the_core_overlay_style.'>
					<a href="' . $link . '" ' . $data_rel . ' class="fw-block-image-child fw-ratio-container '.$ratios[$current].' '.$a_class.'">
						' . $image["img"] . '
						<div class="fw-block-image-overlay">
							<div class="fw-itable">
								<div class="fw-icell">
									<i class="'.$i_class.'"></i>
									<h5 class="fw-overlay-title">' . $item['image_title'] . '</h5>
									<p class="fw-overlay-description">' . $item['image_subtitle'] . '</p>
								</div>
							</div>
						</div>
					</a>
				</div>
			</div>';
		elseif ( $current == 0 ) :
			$column2 .= '<div class="fw-gallery-image fw-height-md fw-block-image-parent fw-overlay-4 '.$item_extra_class.' '.$overlay_class.'" '.$the_core_overlay_style.'>
				<a href="' . $link . '" ' . $data_rel . ' class="fw-block-image-child fw-ratio-container '.$ratios[$current].' '.$a_class.'">
					' . $image["img"] . '
					<div class="fw-block-image-overlay">
						<div class="fw-itable">
							<div class="fw-icell">
								<i class="'.$i_class.'"></i>
								<h5 class="fw-overlay-title">' . $item['image_title'] . '</h5>
								<p class="fw-overlay-description">' . $item['image_subtitle'] . '</p>
							</div>
						</div>
					</div>
				</a>
			</div>';
		endif;
	endforeach;
	$column1 .= '</div>';
	$column2 .= '</div>';
	$output  .= $column1.$column2;
}
elseif( $atts['gallery_style'] == 'fw-gallery-type3') {
	$a_class = '';
	$ratios   = array(
		'0' => 'fw-ratio-1-2',
		'1' => 'fw-ratio-1',
		'2' => 'fw-ratio-2-1',
		'3' => 'fw-ratio-2-1',
		'4' => 'fw-ratio-1',
	);
	$column1 .= '<div class="fw-gallery-col fw-col-width1">';
	$column2 .= '<div class="fw-gallery-col fw-col-width2">';
	foreach ( $atts['images'] as $item ) :
		if($item['overlay_color']['id'] == 'fw-custom'){
			$the_core_overlay_style = '';
			if(!empty($item['overlay_color']['color'])) {
				$the_core_overlay_style = 'style="background-color: ' . $item['overlay_color']['color'] . '"';
			}
			$overlay_class = '';
		}else{
			$the_core_overlay_style = '';
			$overlay_class = 'overlay_'.$item['overlay_color']['id'];
		}
		$the_core_count ++;
		$current = $the_core_count % 5;
		$args  = array(
			'img_attr' => array( 'class' => 'attachment-post-thumbnail' ),
			'size'     => 'fw-theme-blog-full',
			'return'   => true,
			'ratio'    => $ratios[$current]
		);
		$image = the_core_image( $item['image'], $args );
		if ( $atts['prettyphoto'] == 'yes' ) {
			$link     = $image['original_image_url'];
			$data_rel = 'data-rel="prettyPhoto[' . $gallery_id . ']"';
			$data_rel .= ' rel="prettyPhoto[' . $gallery_id . ']"';
			$i_class  = 'fw-icon-zoom';
		} else {
			$link     = $item['link'];
			$data_rel = '';
			$i_class  = 'fw-icon-link';
			if (strpos($link, "#") !== false && strlen($link) > 1) {
				$a_class = 'anchor';
			}
			else{
				$a_class = '';
			}
		}

		if ( $current == 1 ) :
			$column1 .= '<div class="fw-gallery-col fw-inner-col-width1">
				<div class="fw-gallery-image fw-height-sm fw-block-image-parent fw-overlay-5 '.$item_extra_class.' '.$overlay_class.'" '.$the_core_overlay_style.'>
					<a href="' . $link . '" ' . $data_rel . ' class="fw-block-image-child fw-ratio-container '.$ratios[$current].' '.$a_class.'">
						' . $image["img"] . '
						<div class="fw-block-image-overlay">
							<div class="fw-itable">
								<div class="fw-icell">
									<i class="'.$i_class.'"></i>
									<h5 class="fw-overlay-title">' . $item['image_title'] . '</h5>
									<p class="fw-overlay-description">' . $item['image_subtitle'] . '</p>
								</div>
							</div>
						</div>
					</a>
				</div>
			</div>';
		elseif ( $current == 2 ) :
			$column1 .= '<div class="fw-gallery-col fw-inner-col-width2">
				<div class="fw-gallery-image fw-height-sm fw-block-image-parent fw-overlay-5 '.$item_extra_class.' '.$overlay_class.'" '.$the_core_overlay_style.'>
					<a href="' . $link . '" ' . $data_rel . ' class="fw-block-image-child fw-ratio-container '.$ratios[$current].' '.$a_class.'">
						' . $image["img"] . '
						<div class="fw-block-image-overlay">
							<div class="fw-itable">
								<div class="fw-icell">
									<i class="'.$i_class.'"></i>
									<h5 class="fw-overlay-title">' . $item['image_title'] . '</h5>
									<p class="fw-overlay-description">' . $item['image_subtitle'] . '</p>
								</div>
							</div>
						</div>
					</a>
				</div>
			</div>';
		elseif ( $current == 3 ) :
			$column1 .= '<div class="fw-gallery-col fw-inner-col-width2">
				<div class="fw-gallery-image fw-height-sm fw-block-image-parent fw-overlay-5 '.$item_extra_class.' '.$overlay_class.'" '.$the_core_overlay_style.'>
					<a href="' . $link . '" ' . $data_rel . ' class="fw-block-image-child fw-ratio-container '.$ratios[$current].' '.$a_class.'">
						' . $image["img"] . '
						<div class="fw-block-image-overlay">
							<div class="fw-itable">
								<div class="fw-icell">
									<i class="'.$i_class.'"></i>
									<h5 class="fw-overlay-title">' . $item['image_title'] . '</h5>
									<p class="fw-overlay-description">' . $item['image_subtitle'] . '</p>
								</div>
							</div>
						</div>
					</a>
				</div>
			</div>';
		elseif ( $current == 4 ) :
			$column1 .= '<div class="fw-gallery-col fw-inner-col-width1">
				<div class="fw-gallery-image fw-height-sm fw-block-image-parent fw-overlay-5 '.$item_extra_class.' '.$overlay_class.'" '.$the_core_overlay_style.'>
					<a href="' . $link . '" ' . $data_rel . ' class="fw-block-image-child fw-ratio-container '.$ratios[$current].' '.$a_class.'">
						' . $image["img"] . '
						<div class="fw-block-image-overlay">
							<div class="fw-itable">
								<div class="fw-icell">
									<i class="'.$i_class.'"></i>
									<h5 class="fw-overlay-title">' . $item['image_title'] . '</h5>
									<p class="fw-overlay-description">' . $item['image_subtitle'] . '</p>
								</div>
							</div>
						</div>
					</a>
				</div>
			</div>';
		elseif ( $current == 0 ) :
			$column2 .= '<div class="fw-gallery-image fw-height-md fw-block-image-parent fw-overlay-5 '.$item_extra_class.' '.$overlay_class.'" '.$the_core_overlay_style.'>
				<a href="' . $link . '" ' . $data_rel . ' class="fw-block-image-child fw-ratio-container '.$ratios[$current].' '.$a_class.'">
					' . $image["img"] . '
					<div class="fw-block-image-overlay">
						<div class="fw-itable">
							<div class="fw-icell">
								<i class="'.$i_class.'"></i>
								<h5 class="fw-overlay-title">' . $item['image_title'] . '</h5>
								<p class="fw-overlay-description">' . $item['image_subtitle'] . '</p>
							</div>
						</div>
					</div>
				</a>
			</div>';
		endif;
	endforeach;
	$column1 .= '</div>';
	$column2 .= '</div>';
	$output  .= $column1.$column2;
}
elseif( $atts['gallery_style'] == 'fw-gallery-type5') {
	// type 5
	$a_class = '';
	$output .= '<div class="grid-sizer"></div>';

	foreach ( $atts['images'] as $item ) :
		if ( $item['overlay_color']['id'] == 'fw-custom' ) {
			$the_core_overlay_style = '';
			if ( ! empty( $item['overlay_color']['color'] ) ) {
				$the_core_overlay_style = 'style="background-color: ' . $item['overlay_color']['color'] . '"';
			}
			$overlay_class = '';
		} else {
			$the_core_overlay_style = '';
			$overlay_class          = 'overlay_' . $item['overlay_color']['id'];
		}
		$the_core_count ++;
		if ( $atts['prettyphoto'] == 'yes' ) {
			$link     = $item['image']['url'];
			$data_rel = 'data-rel="prettyPhoto[' . $gallery_id . ']"';
			$data_rel .= ' rel="prettyPhoto[' . $gallery_id . ']"';
		} else {
			$link     = $item['link'];
			$data_rel = '';
			if ( strpos( $link, "#" ) !== false && strlen( $link ) > 1 ) {
				$a_class = 'anchor';
			}
		}

		$output .= '<div class="fw-gallery-item-wrap ' . $item_extra_class . ' ' .$item['fw_gallery_img_type'].' clearfix">
			<div class="fw-block-image-parent fw-gallery-image fw-overlay-4 '.$overlay_class.'" '.$the_core_overlay_style.'>
				<a href="' . $link . '" ' . $data_rel . ' class="fw-gallery-item fw-block-image-child fw-ratio-container fw-no-ratio '.$a_class.'">
					<div class="fw-gallery-item-image-div" style="background-image: url(\''.$item['image']['url'].'\');"></div>
					<div class="fw-block-image-overlay">
						<div class="fw-itable">
							<div class="fw-icell">
								<h5 class="fw-overlay-title">' . $item['image_title'] . '</h5>
								<p class="fw-overlay-description">' . $item['image_subtitle'] . '</p>
							</div>
						</div>
					</div>
				</a>
			</div>
		</div>';
	endforeach;
}
else{
	$a_class = '';
	// type 4
	$ratios   = array(
		'0' => 'fw-ratio-5-3',
		'1' => 'fw-ratio-5-3',
		'2' => 'fw-ratio-3-4',
		'3' => 'fw-ratio-2-1',
		'4' => 'fw-ratio-2-1',
	);
	$before_item3 = '<div class="fw-gallery-col fw-col-width2">';
	$after_item4  = '</div>';
	$total_items = count($atts['images']);
	foreach ( $atts['images'] as $item ) :
		if($item['overlay_color']['id'] == 'fw-custom'){
			$the_core_overlay_style = '';
			if(!empty($item['overlay_color']['color'])) {
				$the_core_overlay_style = 'style="background-color: ' . $item['overlay_color']['color'] . '"';
			}
			$overlay_class = '';
		}else{
			$the_core_overlay_style = '';
			$overlay_class = 'overlay_'.$item['overlay_color']['id'];
		}
		$the_core_count++;
		$current = $the_core_count % 5;
		$args  = array(
			'img_attr' => array( 'class' => 'attachment-post-thumbnail' ),
			'size'     => 'fw-theme-blog-full',
			'return'   => true,
			'ratio'    => $ratios[$current]
		);
		$image = the_core_image( $item['image'], $args );
		if ( $atts['prettyphoto'] == 'yes' ) {
			$link     = $image['original_image_url'];
			$data_rel = 'data-rel="prettyPhoto[' . $gallery_id . ']"';
			$data_rel .= ' rel="prettyPhoto[' . $gallery_id . ']"';
			$i_class  = 'fw-icon-zoom';
		} else {
			$link     = $item['link'];
			$data_rel = '';
			$i_class  = 'fw-icon-link';
			if (strpos($link, "#") !== false && strlen($link) > 1) {
				$a_class = 'anchor';
			}
			else{
				$a_class = '';
			}
		}

		if ( $current == 1 ) :
			$output .= '<div class="fw-gallery-col fw-col-width1">
				<div class="fw-gallery-image fw-height-md fw-block-image-parent fw-overlay-6 '.$item_extra_class.' '.$overlay_class.'" '.$the_core_overlay_style.'>
					<a href="' . $link . '" ' . $data_rel . ' class="fw-block-image-child fw-ratio-container '.$ratios[$current].' '.$a_class.'">
						' . $image["img"] . '
						<div class="fw-block-image-overlay">
							<div class="fw-itable">
								<div class="fw-icell">
									<i class="'.$i_class.'"></i>
									<h5 class="fw-overlay-title">' . $item['image_title'] . '</h5>
									<p class="fw-overlay-description">' . $item['image_subtitle'] . '</p>
								</div>
							</div>
						</div>
					</a>
				</div>
			</div>';
		elseif ( $current == 2 ) :
			$output .= '<div class="fw-gallery-col fw-col-width2">
				<div class="fw-gallery-image fw-height-md fw-block-image-parent fw-overlay-6 '.$item_extra_class.' '.$overlay_class.'" '.$the_core_overlay_style.'>
					<a href="' . $link . '" ' . $data_rel . ' class="fw-block-image-child fw-ratio-container '.$ratios[$current].' '.$a_class.'">
						' . $image["img"] . '
						<div class="fw-block-image-overlay">
							<div class="fw-itable">
								<div class="fw-icell">
									<i class="'.$i_class.'"></i>
									<h5 class="fw-overlay-title">' . $item['image_title'] . '</h5>
									<p class="fw-overlay-description">' . $item['image_subtitle'] . '</p>
								</div>
							</div>
						</div>
					</a>
				</div>
			</div>';
		elseif ( $current == 3 ) :
			$output .= $before_item3.'<div class="fw-gallery-col fw-inner-col">
				<div class="fw-gallery-image fw-height-sm fw-block-image-parent fw-overlay-6 '.$item_extra_class.' '.$overlay_class.'" '.$the_core_overlay_style.'>
					<a href="' . $link . '" ' . $data_rel . ' class="fw-block-image-child fw-ratio-container '.$ratios[$current].' '.$a_class.'">
						' . $image["img"] . '
						<div class="fw-block-image-overlay">
							<div class="fw-itable">
								<div class="fw-icell">
									<i class="'.$i_class.'"></i>
									<h5 class="fw-overlay-title">' . $item['image_title'] . '</h5>
									<p class="fw-overlay-description">' . $item['image_subtitle'] . '</p>
								</div>
							</div>
						</div>
					</a>
				</div>
			</div>';
			if($total_items == $the_core_count):
				$output .= $after_item4;
			endif;
		elseif ( $current == 4 ) :
			$output .= '<div class="fw-gallery-col fw-inner-col">
				<div class="fw-gallery-image fw-height-sm fw-block-image-parent fw-overlay-6 '.$item_extra_class.' '.$overlay_class.'" '.$the_core_overlay_style.'>
					<a href="' . $link . '" ' . $data_rel . ' class="fw-block-image-child fw-ratio-container '.$ratios[$current].' '.$a_class.'">
						' . $image["img"] . '
						<div class="fw-block-image-overlay">
							<div class="fw-itable">
								<div class="fw-icell">
									<i class="'.$i_class.'"></i>
									<h5 class="fw-overlay-title">' . $item['image_title'] . '</h5>
									<p class="fw-overlay-description">' . $item['image_subtitle'] . '</p>
								</div>
							</div>
						</div>
					</a>
				</div>
			</div>';
			$output .= $after_item4;
		elseif ( $current == 0 ) :
			$output .= '<div class="fw-gallery-col fw-col-width1">
				<div class="fw-gallery-image fw-height-md fw-block-image-parent fw-overlay-6 '.$item_extra_class.' '.$overlay_class.'" '.$the_core_overlay_style.'>
					<a href="' . $link . '" ' . $data_rel . ' class="fw-block-image-child fw-ratio-container '.$ratios[$current].' '.$a_class.'">
						' . $image["img"] . '
						<div class="fw-block-image-overlay">
							<div class="fw-itable">
								<div class="fw-icell">
									<i class="'.$i_class.'"></i>
									<h5 class="fw-overlay-title">' . $item['image_title'] . '</h5>
									<p class="fw-overlay-description">' . $item['image_subtitle'] . '</p>
								</div>
							</div>
						</div>
					</a>
				</div>
			</div>';
		endif;
	endforeach;
}

// for desktop
if( isset($atts['responsive']['desktop_display']['selected']) && $atts['responsive']['desktop_display']['selected'] == 'no' ) {
    $atts['class'] .= ' fw-desktop-hide-element';
}

// for tablet landscape
if( isset($atts['responsive']['tablet_landscape_display']['selected']) && $atts['responsive']['tablet_landscape_display']['selected'] == 'no' ) {
    $atts['class'] .= ' fw-tablet-landscape-hide-element';
}

// for tablet portrait
if( isset($atts['responsive']['tablet_display']['selected']) && $atts['responsive']['tablet_display']['selected'] == 'no' ) {
	$atts['class'] .= ' fw-tablet-hide-element';
}

// for display on smartphone
if( isset($atts['responsive']['smartphone_display']['selected']) && $atts['responsive']['smartphone_display']['selected'] == 'no' ) {
	$atts['class'] .= ' fw-mobile-hide-element';
}

/*----------------Animation option--------------*/
$data_animation = '';
if ( isset( $atts['animation_group'] ) ) {
	// get animation class and delay
	if ( $atts['animation_group']['selected'] == 'yes' ) {
		$atts['class'] .= ' fw-animated-element';
		// get animation
		if ( ! empty( $atts['animation_group']['yes']['animation']['animation'] ) ) {
			$data_animation .= ' data-animation-type="' . $atts['animation_group']['yes']['animation']['animation'] . '"';
		}

		// get delay
		if ( ! empty( $atts['animation_group']['yes']['animation']['delay'] ) ) {
			$data_animation .= ' data-animation-delay="' . (int) esc_attr( $atts['animation_group']['yes']['animation']['delay'] ) . '"';
		}
	}
}
/*----------------End Animation----------------*/
?>
<div class="fw-gallery clearfix tf-sh-<?php echo esc_attr( $atts['unique_id'] ); ?> <?php echo esc_attr($atts['gallery_style']); ?> <?php echo esc_attr($atts['class']); ?>" <?php echo ($data_animation); ?>>
	<?php echo ($output); ?>
</div>