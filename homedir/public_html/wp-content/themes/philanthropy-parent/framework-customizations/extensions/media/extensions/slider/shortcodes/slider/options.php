<?php if (!defined('FW')) die('Forbidden');

$choices = fw()->extensions->get('slider')->get_populated_sliders_choices();

if (!empty($choices)) {
	$options = array(
		'slider_id' => array(
			'type' => 'select',
			'label' => __('Select Slider', 'the-core'),
			'choices' => fw()->extensions->get('slider')->get_populated_sliders_choices()
		),
		'responsive'         => array(
			'attr'          => array( 'class' => 'fw-advanced-button' ),
			'type'          => 'popup',
			'label'         => __( 'Responsive Behavior', 'the-core' ),
			'button'        => __( 'Settings', 'the-core' ),
			'size'          => 'small',
			'popup-options' => array(
                'desktop_display'     => array(
                    'type'    => 'multi-picker',
                    'label'   => false,
                    'desc'    => false,
                    'picker'  => array(
                        'selected' => array(
                            'type'         => 'switch',
                            'value'        => 'yes',
                            'label'        => __( 'Desktop', 'the-core' ),
                            'desc'         => __( 'Display this shortcode on desktop?', 'the-core' ),
                            'help'         => __( 'Applies to devices with the resolution higher then 1200px (desktops and laptops)', 'the-core' ),
                            'left-choice'  => array(
                                'value' => 'no',
                                'label' => __( 'No', 'the-core' ),
                            ),
                            'right-choice' => array(
                                'value' => 'yes',
                                'label' => __( 'Yes', 'the-core' ),
                            )
                        ),
                    ),
                ),
                'tablet_landscape_display'     => array(
                    'type'    => 'multi-picker',
                    'label'   => false,
                    'desc'    => false,
                    'picker'  => array(
                        'selected' => array(
                            'type'         => 'switch',
                            'value'        => 'yes',
                            'label'        => __( 'Tablet Landscape', 'the-core' ),
                            'desc'         => __( 'Display this shortcode on tablet landscape?', 'the-core' ),
                            'help'         => __( 'Applies to devices with the resolution between 992px - 1199px (tablet landscape)', 'the-core' ),
                            'left-choice'  => array(
                                'value' => 'no',
                                'label' => __( 'No', 'the-core' ),
                            ),
                            'right-choice' => array(
                                'value' => 'yes',
                                'label' => __( 'Yes', 'the-core' ),
                            )
                        ),
                    ),
                ),
                'tablet_display'     => array(
                    'type'    => 'multi-picker',
                    'label'   => false,
                    'desc'    => false,
                    'picker'  => array(
                        'selected' => array(
                            'type'         => 'switch',
                            'value'        => 'yes',
                            'label'        => __( 'Tablet Portrait', 'the-core' ),
                            'desc'         => __( 'Display this shortcode on tablet portrait?', 'the-core' ),
                            'help'         => __( 'Applies to devices with the resolution between 768px - 991px (tablet portrait)', 'the-core' ),
                            'left-choice'  => array(
                                'value' => 'no',
                                'label' => __( 'No', 'the-core' ),
                            ),
                            'right-choice' => array(
                                'value' => 'yes',
                                'label' => __( 'Yes', 'the-core' ),
                            )
                        ),
                    ),
                    'choices' => array(),
                ),
                'smartphone_display' => array(
                    'type'    => 'multi-picker',
                    'label'   => false,
                    'desc'    => false,
                    'picker'  => array(
                        'selected' => array(
                            'type'         => 'switch',
                            'value'        => 'yes',
                            'label'        => __( 'Smartphone', 'the-core' ),
                            'desc'         => __( 'Display this shortcode on smartphone?', 'the-core' ),
                            'help'         => __( 'Applies to devices with the resolution up to 767px (smartphones both portrait and landscape as well as some low-resolution tablets)', 'the-core' ),
                            'left-choice'  => array(
                                'value' => 'no',
                                'label' => __( 'No', 'the-core' ),
                            ),
                            'right-choice' => array(
                                'value' => 'yes',
                                'label' => __( 'Yes', 'the-core' ),
                            )
                        ),
                    ),
                    'choices' => array(),
                ),
			),
		),
	);
} else {
	$options = array(
		'no_sliders' => array(
			'type' => 'html-full',
			'label' => false,
			'desc' => false,
			'html' => '<div style=""><h1 style="font-weight:100; text-align:center; margin-top:80px">'. __('No Sliders Available', 'the-core') .'</h1>'. '<p style="text-align:center"><i>'. __('No Sliders created yet. Please go to the', 'the-core').' <br/>'.__('Sliders page and', 'the-core').' <a href="'.admin_url('post-new.php?post_type='.fw()->extensions->get('slider')->get_post_type()).'">'.__('create a new Slider', 'the-core').'</a> </i></p></div>'
		)
	);
}