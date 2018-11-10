<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$cfg = array(
	'page_builder' => array(
		'title'       => __( 'Gallery', 'the-core' ),
		'popup_size'  => 'medium',
		'description' => __( 'Add a Gallery', 'the-core' ),
		'tab'         => __( 'Media Elements', 'the-core' ),
		'popup_header_elements' => '<a class="fw-docs-link" target="_blank" href="http://docs.themefuse.com/the-core/your-theme/shortcodes/gallery"><span class="fw-docs-info dashicons dashicons-editor-help"></span>'.__('Go to Docs', 'the-core').'</a>',
	)
);