<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$img         = $atts['upload_img'];
$rounded     = $atts['rounded'];
$image_size  = $atts['image_size'];
$open_img    = $atts['open_img'];
$class       = esc_attr( $atts['class'] );
$ratio_class = '';

if ( $image_size['select_size'] == 'custom' ) {
	$style    = 'width: ' . (int) $image_size['custom']['width'] . 'px;';
	$img_attr = array( 'width' => (int) $image_size['custom']['width'] );
	$position = $image_size['custom']['position'];

} else {
	$style    = 'width: 100%;';
	$img_attr = array();
	$position = '';
}

$ratio = '';
if( isset($atts['ratio']) ){
	$ratio = $atts['ratio'];
}
if ( $rounded == 'fw-block-image-circle' ) {
	$class .= ' fw-block-image-circle';
	$ratio_class = 'fw-ratio-1';
	$ratio       = 'fw-ratio-1';
}

$args        = array(
	'img_attr' => array( 'class' => 'attachment-post-thumbnail' ),
	'size'     => 'full',
	'return'   => true,
	'img_attr' => $img_attr,
	'ratio'    => $ratio
);
$image       = the_core_image( $img, $args );
$ratio_class = $image['ratio'];

$frame_styles = '';
if( isset($atts['frame']['selected']) && $atts['frame']['selected'] == 'yes' ){
	$frame_styles .= 'border-style: solid;';
	if( !empty($atts['frame']['yes']['border_size']) ) $frame_styles .= ' border-width: '.(int)$atts['frame']['yes']['border_size'].'px;';
	$border_color = the_core_get_color_palette_color_and_class( $atts['frame']['yes']['border_color'], array( 'return_color' => true ) );
	if ( ! empty( $border_color['color'] ) ) $frame_styles .= ' border-color: '.$border_color['color'].';';
}

// for desktop
if( isset($atts['responsive']['desktop_display']['selected']) && $atts['responsive']['desktop_display']['selected'] == 'no' ) {
    $class .= ' fw-desktop-hide-element';
}

// for tablet landscape
if( isset($atts['responsive']['tablet_landscape_display']['selected']) && $atts['responsive']['tablet_landscape_display']['selected'] == 'no' ) {
    $class .= ' fw-tablet-landscape-hide-element';
}

// for tablet portrait
if( isset($atts['responsive']['tablet_display']['selected']) && $atts['responsive']['tablet_display']['selected'] == 'no' ) {
	$class .= ' fw-tablet-hide-element';
}

// for display on smartphone
if( isset($atts['responsive']['smartphone_display']['selected']) && $atts['responsive']['smartphone_display']['selected'] == 'no' ) {
	$class .= ' fw-mobile-hide-element';
}

/*----------------Animation option--------------*/
$data_animation = '';
if ( isset( $atts['animation_group'] ) ) {
	// get animation class and delay
	if ( $atts['animation_group']['selected'] == 'yes' ) {
		$class .= ' fw-animated-element';
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

/* switch image */
$switch_image = '';
if( isset( $atts['image_switch']['selected'] ) && $atts['image_switch']['selected'] == 'yes' ) {
	$args2 = $args;
	$args2['img_attr'] = array( 'class' => 'fw-switch-image-hover' );
	$switch_image = the_core_image( $atts['image_switch']['yes']['switch_img'], $args2 );
	if( !empty($switch_image['img']) ) {
		$switch_image_arr = explode( '<span', $switch_image['img']);
		$switch_image = $switch_image_arr['0'];
		$class .= ' fw-switch-image';
	}
	else {
		$switch_image = '';
	}
}

/* image moving */
if( isset( $atts['image_moving']['selected'] ) && $atts['image_moving']['selected'] == 'yes' ) {
	$class .= ' fw-image-moving '.$atts['image_moving']['yes']['animation'];

	if( isset($atts['image_moving']['yes']['hover_only']) && $atts['image_moving']['yes']['hover_only'] == 'yes' ) {
		$class .= ' fw-image-moving-on-hover';
	}
	else {
		$class .= ' fw-image-moving-on-default';
	}
}
?>
<?php if ( ! empty( $img ) ): ?>

	<?php if ( $open_img['icon-box-img'] == 'nothing' ): ?>

		<div class="fw-block-image-parent <?php echo esc_attr( $class ) . ' ' . esc_attr( $position ); ?>" <?php echo ($data_animation); ?> style="<?php echo ($style.' '.$frame_styles); ?>">
			<span class="fw-block-image-child <?php echo esc_attr($ratio_class); ?>">
				<?php echo ($image['img']); ?>
				<?php echo ($switch_image); ?>
			</span>
		</div>

	<?php elseif ( $open_img['icon-box-img'] == 'popup' ): ?>
		<?php $popup_video = ( $open_img['popup']['image_popup']['icon-box-img'] == 'fw-block-image-icon' ) ? $open_img['popup']['image_popup']['fw-block-image-icon']['upload_video'] : ''; ?>
        <?php $display_overlay = ( isset($open_img['popup']['display_overlay']) &&  $open_img['popup']['display_overlay'] == 'no' ) ? '' : 'fw-overlay-1'; ?>
		<div class="fw-block-image-parent <?php echo esc_attr($display_overlay); ?> fw-block-image-icon <?php echo ( ! empty( $popup_video ) ) ? 'fw-block-image-video' : ''; ?> <?php echo esc_attr( $class ) . ' ' . esc_attr( $position ); ?>" <?php echo ($data_animation); ?> style="<?php echo ($style.' '.$frame_styles); ?>">
            <?php
            $gallery_images = '';
            $data_rel = 'prettyPhoto';
            if( $open_img['popup']['image_popup']['icon-box-img'] == 'image_gallery' && isset($open_img['popup']['image_popup']['image_gallery']['images']) && !empty($open_img['popup']['image_popup']['image_gallery']['images']) ) :
                $data_rel = isset($atts['unique_id']) ? 'prettyPhoto['.$atts['unique_id'].']' : 'prettyPhoto['.rand(1, 900).']';
                foreach($open_img['popup']['image_popup']['image_gallery']['images'] as $item_image) :
                    $gallery_images .= '<a class="fw-display-none" href="'.the_core_change_original_link_with_cdn($item_image['url']).'" data-rel="'.$data_rel.'" rel="'.$data_rel.'"></a>';
                endforeach;
            endif;
            ?>
			<a class="fw-block-image-child <?php echo esc_attr($ratio_class); ?>" href="<?php echo ! ( empty( $popup_video ) ) ? esc_url( $popup_video ) : esc_url( the_core_change_original_link_with_cdn($img['url']) ); ?>" data-rel="<?php echo esc_attr($data_rel); ?>" rel="<?php echo esc_attr($data_rel); ?>">
				<?php echo ($image['img']); ?>
				<?php echo ($switch_image); ?>
                <?php if( !empty($display_overlay) ) : ?>
                    <div class="fw-block-image-overlay">
                        <div class="fw-itable">
                            <div class="fw-icell">
                                <i class="<?php echo ( empty( $popup_video ) ) ? 'fw-icon-zoom' : 'fw-icon-video'; ?>"></i>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
			</a>
            <?php echo ($gallery_images); ?>
		</div>

	<?php else:
		$a_class = '';
		if (strpos($open_img['link']['custom_link'], "#") !== false && strlen($open_img['link']['custom_link']) > 1) {
			$a_class = 'anchor';
		}

		$open_link = ( $open_img['link']['open'] == 'yes' ) ? "target='_blank'" : '';
        $display_overlay = ( isset($open_img['link']['display_overlay']) &&  $open_img['link']['display_overlay'] == 'no' ) ? '' : 'fw-overlay-1';
		?>
		<div class="fw-block-image-parent <?php echo esc_attr($display_overlay); ?> fw-block-image-icon <?php echo esc_attr( $class ) . ' ' . esc_attr( $position ); ?>" <?php echo ($data_animation); ?> style="<?php echo ($style.' '.$frame_styles); ?>">
			<a class="fw-block-image-child <?php echo esc_attr($ratio_class); ?> <?php echo esc_attr($a_class); ?>" href="<?php echo esc_url( $open_img['link']['custom_link'] ); ?>" <?php echo esc_attr( $open_link ); ?>>
				<?php echo ($image['img']); ?>
				<?php echo ($switch_image); ?>
                <?php if( !empty($display_overlay) ) : ?>
                    <div class="fw-block-image-overlay">
                        <div class="fw-itable">
                            <div class="fw-icell">
                                <i class="fw-icon-link"></i>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
			</a>
		</div>
	<?php endif; ?>

<?php endif; ?>