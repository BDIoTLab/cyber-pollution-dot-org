<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$cfg = array(
	'page_builder' => array(
		'title'          => __( 'Special Heading', 'the-core' ),
		'description'    => __( 'Add a Special Heading', 'the-core' ),
		'tab'            => __( 'Content Elements', 'the-core' ),
		'popup_size'     => 'medium',
		'title_template' => '{{ if (!o.title && o.subtitle) { }} {{- o.subtitle.trim().replace(/(<([^>]+)>)/ig,"").replace(/&nbsp;/gi, "") }} {{ } }} {{ if (o.title) { }} {{- o.title.trim().replace(/(<([^>]+)>)/ig,"").replace(/&nbsp;/gi, "")}} {{ } }} {{ if (!o.title && !o.subtitle) { }} {{- title}} {{ } }}',
		'popup_header_elements' => '<a class="fw-docs-link" target="_blank" href="http://docs.themefuse.com/the-core/your-theme/shortcodes/special-heading-1"><span class="fw-docs-info dashicons dashicons-editor-help"></span>'.__('Go to Docs', 'the-core').'</a>',
	)
);