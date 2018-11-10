<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$cfg = array();

$cfg['page_builder'] = array(
	'title'       => __( 'Map', 'the-core' ),
	'description' => __( 'Add a Map', 'the-core' ),
	'tab'         => __( 'Content Elements', 'the-core' ),
	'popup_size'  => 'medium',
	'popup_header_elements' => '<a class="fw-docs-link" target="_blank" href="http://docs.themefuse.com/the-core/your-theme/shortcodes/map-1"><span class="fw-docs-info dashicons dashicons-editor-help"></span>'.__('Go to Docs', 'the-core').'</a>',
);