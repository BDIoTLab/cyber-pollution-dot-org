<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$cfg = array();

$cfg['page_builder'] = array(
	'title'       => __( 'Contact Form', 'the-core' ),
	'description' => __( 'Build a Contact Form', 'the-core' ),
	'tab'         => __( 'Content Elements', 'the-core' ),
	'popup_size'  => 'large',
	'type'        => 'special',
	'popup_header_elements' => '<a class="fw-docs-link" target="_blank" href="http://docs.themefuse.com/the-core/your-theme/shortcodes/contact-form-1"><span class="fw-docs-info dashicons dashicons-editor-help"></span>'.__('Go to Docs', 'the-core').'</a>',
);