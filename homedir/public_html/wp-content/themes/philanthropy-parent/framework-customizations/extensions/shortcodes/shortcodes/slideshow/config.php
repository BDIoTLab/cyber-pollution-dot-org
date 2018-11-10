<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$cfg = array(
	'page_builder' => array(
		'title'       => __( 'Slideshow', 'the-core' ),
		'description' => __( 'Add a Slideshow', 'the-core' ),
		'tab'         => __( 'Media Elements', 'the-core' ),
		'popup_size'  => 'medium',
		'popup_header_elements' => '<a class="fw-docs-link" target="_blank" href="http://docs.themefuse.com/the-core/your-theme/shortcodes/slideshow-1"><span class="fw-docs-info dashicons dashicons-editor-help"></span>'.__('Go to Docs', 'the-core').'</a>',
	)
);