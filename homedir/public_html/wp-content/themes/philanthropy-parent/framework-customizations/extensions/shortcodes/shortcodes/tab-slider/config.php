<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$cfg = array(
	'page_builder' => array(
		'title'       => __( 'Tab Slider', 'the-core' ),
		'description' => __( 'Add a Tab Slider', 'the-core' ),
		'popup_size'  => 'medium',
		'tab'         => __( 'Media Elements', 'the-core' ),
		'popup_header_elements' => '<a class="fw-docs-link" target="_blank" href="http://docs.themefuse.com/the-core/your-theme/shortcodes/tabs-1"><span class="fw-docs-info dashicons dashicons-editor-help"></span>'.__('Go to Docs', 'the-core').'</a>',
	)
);