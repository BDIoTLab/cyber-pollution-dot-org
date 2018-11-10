<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
$options = array(
	'taxonomy' => array(
		'label'   => __( 'Portfolio Category', 'the-core' ),
		'desc'    => __( 'Select the portfolio category', 'the-core' ),
		'type'    => 'select',
		'value'   => '',
		'choices' => the_core_get_all_portfolio_taxonomy_list( __( 'None', 'the-core' ) ),
	),
);