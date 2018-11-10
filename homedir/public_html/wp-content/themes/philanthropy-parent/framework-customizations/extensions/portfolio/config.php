<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$cfg = array();

$cfg['image_sizes'] = array(
	'portrait'      => array(
		'width'  => 282,
		'height' => 385,
		'crop'   => true
	),
	'landscape'     => array(
		'width'  => 282,
		'height' => 182,
		'crop'   => true
	),
	'gallery-image' => array(
		'width'  => 280,
		'height' => 180,
		'crop'   => true
	)
);
