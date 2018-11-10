<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$cfg = array(
	'page_builder' => array(
		'title'       => __( 'Quote', 'the-core' ),
		'description' => __( 'Add a Quote', 'the-core' ),
		'tab'         => __( 'Content Elements', 'the-core' ),
		'popup_size'  => 'medium',
		'title_template' => '{{ if (!o.text) { }} {{- title}} {{ } }} {{ if (o.text) { }} {{- o.text.trim().replace(/(<([^>]+)>)/ig,"").replace(/&nbsp;/gi, "").substring(0,50)}} {{ } }}',
		'popup_header_elements' => '<a class="fw-docs-link" target="_blank" href="http://docs.themefuse.com/the-core/your-theme/shortcodes/quote-1"><span class="fw-docs-info dashicons dashicons-editor-help"></span>'.__('Go to Docs', 'the-core').'</a>',
	)
);