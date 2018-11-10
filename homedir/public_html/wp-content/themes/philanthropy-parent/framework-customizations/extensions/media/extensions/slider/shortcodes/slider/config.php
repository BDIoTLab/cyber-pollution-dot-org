<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$cfg = array();

$cfg['page_builder'] = array(
	'title'       => __( 'Slider', 'the-core' ),
	'description' => __( 'Add a Slider', 'the-core' ),
	'tab'         => __( 'Media Elements', 'the-core' ),
	'popup_size'  => 'medium',
	'popup_header_elements' => '<a class="fw-docs-link" target="_blank" href="http://docs.themefuse.com/the-core/your-theme/shortcodes/slider-1"><span class="fw-docs-info dashicons dashicons-editor-help"></span>'.__('Go to Docs', 'the-core').'</a>',
);
