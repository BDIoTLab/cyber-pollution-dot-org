<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * @var  string $id
 * @var  array $option
 * @var  array $data
 */

{
	$wrapper_attr = $option['attr'];

	unset(
		$wrapper_attr['value'],
		$wrapper_attr['name']
	);
}

//animation type
$animations = array(
	'animation_seekers'  => array(
		'group'      => esc_html__( 'Attention Seekers', 'the-core' ),
		'animations' => array(
			'bounce'     => esc_html__( 'bounce', 'the-core' ),
			'flash'      => esc_html__( 'flash', 'the-core' ),
			'pulse'      => esc_html__( 'pulse', 'the-core' ),
			'rubberBand' => esc_html__( 'rubberBand', 'the-core' ),
			'shake'      => esc_html__( 'shake', 'the-core' ),
			'swing'      => esc_html__( 'swing', 'the-core' ),
			'tada'       => esc_html__( 'tada', 'the-core' ),
			'wobble'     => esc_html__( 'wobble', 'the-core' ),
			'jello'      => esc_html__( 'jello', 'the-core' ),
		)
	),
	'bouncing_entrances' => array(
		'group'      => esc_html__( 'Bouncing Entrances', 'the-core' ),
		'animations' => array(
			'bounceIn'      => esc_html__( 'bounceIn', 'the-core' ),
			'bounceInDown'  => esc_html__( 'bounceInDown', 'the-core' ),
			'bounceInLeft'  => esc_html__( 'bounceInLeft', 'the-core' ),
			'bounceInRight' => esc_html__( 'bounceInRight', 'the-core' ),
			'bounceInUp'    => esc_html__( 'bounceInUp', 'the-core' ),
		)
	),
	'bouncing_exists'    => array(
		'group'      => esc_html__( 'Bouncing Exits', 'the-core' ),
		'animations' => array(
			'bounceOut'      => esc_html__( 'bounceOut', 'the-core' ),
			'bounceOutDown'  => esc_html__( 'bounceOutDown', 'the-core' ),
			'bounceOutLeft'  => esc_html__( 'bounceOutLeft', 'the-core' ),
			'rubberBand'     => esc_html__( 'rubberBand', 'the-core' ),
			'bounceOutRight' => esc_html__( 'bounceOutRight', 'the-core' ),
			'bounceOutUp'    => esc_html__( 'bounceOutUp', 'the-core' ),
		)
	),
	'fading_entrances'   => array(
		'group'      => esc_html__( 'Fading Entrances', 'the-core' ),
		'animations' => array(
			'fadeIn'         => esc_html__( 'fadeIn', 'the-core' ),
			'fadeInDown'     => esc_html__( 'fadeInDown', 'the-core' ),
			'fadeInDownBig'  => esc_html__( 'fadeInDownBig', 'the-core' ),
			'fadeInLeft'     => esc_html__( 'fadeInLeft', 'the-core' ),
			'fadeInLeftBig'  => esc_html__( 'fadeInLeftBig', 'the-core' ),
			'fadeInRight'    => esc_html__( 'fadeInRight', 'the-core' ),
			'fadeInRightBig' => esc_html__( 'fadeInRightBig', 'the-core' ),
			'fadeInUp'       => esc_html__( 'fadeInUp', 'the-core' ),
			'fadeInUpBig'    => esc_html__( 'fadeInUpBig', 'the-core' )
		)
	),
	'fading_exists'      => array(
		'group'      => esc_html__( 'Fading Exits', 'the-core' ),
		'animations' => array(
			'fadeOut'         => esc_html__( 'fadeOut', 'the-core' ),
			'fadeOutDown'     => esc_html__( 'fadeOutDown', 'the-core' ),
			'fadeOutDownBig'  => esc_html__( 'fadeOutDownBig', 'the-core' ),
			'fadeOutLeft'     => esc_html__( 'fadeOutLeft', 'the-core' ),
			'fadeOutLeftBig'  => esc_html__( 'fadeOutLeftBig', 'the-core' ),
			'fadeOutRight'    => esc_html__( 'fadeOutRight', 'the-core' ),
			'fadeOutRightBig' => esc_html__( 'fadeOutRightBig', 'the-core' ),
			'fadeOutUp'       => esc_html__( 'fadeOutUp', 'the-core' ),
			'fadeOutUpBig'    => esc_html__( 'fadeOutUpBig', 'the-core' )
		)
	),
	'flippers'           => array(
		'group'      => esc_html__( 'Flippers', 'the-core' ),
		'animations' => array(
			'flip'           => esc_html__( 'flip', 'the-core' ),
			'flipInX'        => esc_html__( 'flipInX', 'the-core' ),
			'flipInY'        => esc_html__( 'flipInY', 'the-core' ),
			'flipOutX'       => esc_html__( 'flipOutX', 'the-core' ),
			'fadeOutLeftBig' => esc_html__( 'flipOutY', 'the-core' ),
			'flipOutY'       => esc_html__( 'fadeOutRight', 'the-core' )
		)
	),
	'lightspeed'         => array(
		'group'      => esc_html__( 'Lightspeed', 'the-core' ),
		'animations' => array(
			'lightSpeedIn'  => esc_html__( 'lightSpeedIn', 'the-core' ),
			'lightSpeedOut' => esc_html__( 'lightSpeedOut', 'the-core' )
		)
	),
	'rotating_entrances' => array(
		'group'      => esc_html__( 'Rotating Entrances', 'the-core' ),
		'animations' => array(
			'rotateIn'          => esc_html__( 'rotateIn', 'the-core' ),
			'rotateInDownLeft'  => esc_html__( 'rotateInDownLeft', 'the-core' ),
			'rotateInDownRight' => esc_html__( 'rotateInDownRight', 'the-core' ),
			'rotateInUpLeft'    => esc_html__( 'rotateInUpLeft', 'the-core' ),
			'rotateInUpRight'   => esc_html__( 'rotateInUpRight', 'the-core' )
		)
	),
	'rotating_exists'    => array(
		'group'      => esc_html__( 'Rotating Exits', 'the-core' ),
		'animations' => array(
			'rotateOut'          => esc_html__( 'rotateOut', 'the-core' ),
			'rotateOutDownLeft'  => esc_html__( 'rotateOutDownLeft', 'the-core' ),
			'rotateOutDownRight' => esc_html__( 'rotateOutDownRight', 'the-core' ),
			'rotateOutUpLeft'    => esc_html__( 'rotateOutUpLeft', 'the-core' ),
			'rotateOutUpRight'   => esc_html__( 'rotateOutUpRight', 'the-core' )
		)
	),
	'sliding_entrances'  => array(
		'group'      => esc_html__( 'Sliding Entrances', 'the-core' ),
		'animations' => array(
			'slideInUp'    => esc_html__( 'slideInUp', 'the-core' ),
			'slideInDown'  => esc_html__( 'slideInDown', 'the-core' ),
			'slideInLeft'  => esc_html__( 'slideInLeft', 'the-core' ),
			'slideInRight' => esc_html__( 'slideInRight', 'the-core' )
		)
	),
	'sliding_exists'     => array(
		'group'      => esc_html__( 'Sliding Exits', 'the-core' ),
		'animations' => array(
			'slideOutUp'    => esc_html__( 'slideOutUp', 'the-core' ),
			'slideOutDown'  => esc_html__( 'slideOutDown', 'the-core' ),
			'slideOutLeft'  => esc_html__( 'slideOutLeft', 'the-core' ),
			'slideOutRight' => esc_html__( 'slideOutRight', 'the-core' )
		)
	),
	'zoom_entrances'     => array(
		'group'      => esc_html__( 'Zoom Entrances', 'the-core' ),
		'animations' => array(
			'zoomIn'      => esc_html__( 'zoomIn', 'the-core' ),
			'zoomInDown'  => esc_html__( 'zoomInDown', 'the-core' ),
			'zoomInLeft'  => esc_html__( 'zoomInLeft', 'the-core' ),
			'zoomInRight' => esc_html__( 'zoomInRight', 'the-core' ),
			'zoomInUp'    => esc_html__( 'zoomInUp', 'the-core' )
		)
	),
	'zoom_exists'        => array(
		'group'      => esc_html__( 'Zoom Exits', 'the-core' ),
		'animations' => array(
			'zoomOut'      => esc_html__( 'zoomOut', 'the-core' ),
			'zoomOutDown'  => esc_html__( 'zoomOutDown', 'the-core' ),
			'zoomOutLeft'  => esc_html__( 'zoomOutLeft', 'the-core' ),
			'zoomOutRight' => esc_html__( 'zoomOutRight', 'the-core' ),
			'zoomOutUp'    => esc_html__( 'zoomOutUp', 'the-core' )
		)
	),
	'specials'           => array(
		'group'      => esc_html__( 'Specials', 'the-core' ),
		'animations' => array(
			'hinge'   => esc_html__( 'hinge', 'the-core' ),
			'rollIn'  => esc_html__( 'rollIn', 'the-core' ),
			'rollOut' => esc_html__( 'rollOut', 'the-core' )
		)
	),
);

$animations = apply_filters( 'tf-animate-css', $animations );

?>
<div <?php echo fw_attr_to_html( $wrapper_attr ); ?>>

	<div class="fw-option-tf-animation-option fw-option-tf-animation-option-type fw-border-box-sizing fw-col-sm-8">
		<select data-type="type" name="<?php echo esc_attr( $option['attr']['name'] ) ?>[animation]"
		        class="fw-option-tf-animation-option-type-input">
			<?php foreach ( $animations as $group ): ?>
				<optgroup label="<?php echo esc_attr( $group['group'] ); ?>">

					<?php foreach ( $group['animations'] as $key => $animation ): ?>
						<option
							value="<?php echo esc_attr( $key ); ?>" <?php echo ($data['value']['animation']) === $key ? ' selected="selected" ' : ''; ?>><?php echo esc_html( $animation ); ?></option>
					<?php endforeach; ?>

				</optgroup>
			<?php endforeach; ?>
		</select>
	</div>


	<div class="fw-option-tf-animation-option fw-option-tf-animation-option-delay fw-border-box-sizing fw-col-sm-2">
		<input type="text" name="<?php echo esc_attr( $option['attr']['name'] ) ?>[delay]" id=""
		       class="fw-option fw-option-tf-animation-option-delay-input"
		       value="<?php echo esc_attr($data['value']['delay']); ?>">
	</div>
</div>
