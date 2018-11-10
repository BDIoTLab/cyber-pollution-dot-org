<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$cfg = array(
	'page_builder' => array(
		'title'       => __( 'Flip Box', 'the-core' ),
		'description' => __( 'Add a Flip Box', 'the-core' ),
		'tab'         => __( 'Content Elements', 'the-core' ),
		'popup_size'  => 'medium',
		'title_template' => '{{ if (!o.front.title) { }} {{- title}} {{ } }} {{ if (o.front.title) { }} {{- o.front.title.trim().replace(/(<([^>]+)>)/ig,"").replace(/&nbsp;/gi, "")}} {{ } }}',
		'popup_header_elements' => '<a class="fw-docs-link" target="_blank" href="http://docs.themefuse.com/the-core/your-theme/shortcodes/image-box-1"><span class="fw-docs-info dashicons dashicons-editor-help"></span>'.__('Go to Docs', 'the-core').'</a>',
	)
);