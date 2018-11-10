<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

class FW_Shortcode_Testimonials extends FW_Shortcode {
	protected function handle_shortcode( $atts, $content, $tag ) {
		wp_enqueue_script(
			'carouFredSel',
			get_template_directory_uri() . '/js/jquery.carouFredSel-6.2.1-packed.js',
			array( 'jquery' ),
			fw()->theme->manifest->get_version(),
			true
		);

		return the_core_render_view( $this->get_path() . '/views/view.php', array(
			'atts'    => $atts,
			'content' => $content,
			'tag'     => $tag
		) );
	}
}