<?php
$the_core_header_settings       = defined( 'FW' ) ? fw_get_db_settings_option( 'header_settings' ) : array();
$the_core_enable_header_top_bar = isset( $the_core_header_settings['enable_header_top_bar']['selected_value'] ) ? $the_core_header_settings['enable_header_top_bar']['selected_value'] : 'no';
$the_core_top_bar_text          = isset( $the_core_header_settings['enable_header_top_bar']['yes']['header_text'] ) ? $the_core_header_settings['enable_header_top_bar']['yes']['header_text'] : '';
$the_core_enable_header_socials = isset( $the_core_header_settings['enable_header_top_bar']['yes']['enable_header_socials']['selected_value'] ) ? $the_core_header_settings['enable_header_top_bar']['yes']['enable_header_socials']['selected_value'] : 'no';
$the_core_enable_search         = isset( $the_core_header_settings['enable_search']['selected_value'] ) ? $the_core_header_settings['enable_search']['selected_value'] : 'no';
$the_core_search_type           = isset( $the_core_header_settings['enable_search']['yes']['search_type']['selected'] ) ? $the_core_header_settings['enable_search']['yes']['search_type']['selected'] : '';
$the_core_search_position       = isset( $the_core_header_settings['enable_search']['yes']['search_position'] ) ? $the_core_header_settings['enable_search']['yes']['search_position'] : 'top_bar';
$the_core_placeholder_text      = isset( $the_core_header_settings['enable_search']['yes']['search_type'][$the_core_search_type]['search_advanced_styling']['placeholder_text'] ) ? $the_core_header_settings['enable_search']['yes']['search_type'][$the_core_search_type]['search_advanced_styling']['placeholder_text'] : '';

$the_core_placeholder_text = the_core_filter_search_header_text( $the_core_placeholder_text, $the_core_search_type );

// video background
$bg_video_data_attr = '';
if( $the_core_header_settings['header_type_picker']['header-5']['header_5_popup']['background_options']['background'] == 'video' ) {
	if( $the_core_header_settings['header_type_picker']['header-5']['header_5_popup']['background_options']['video']['video_type']['selected'] == 'uploaded') {
		$video_url = $the_core_header_settings['header_type_picker']['header-5']['header_5_popup']['background_options']['video']['video_type']['uploaded']['video']['url'];
	} else {
		$video_url = $the_core_header_settings['header_type_picker']['header-5']['header_5_popup']['background_options']['video']['video_type']['youtube']['video'];
	}

	if( isset($the_core_header_settings['header_type_picker']['header-5']['header_5_popup']['background_options']['video']['loop_video']) && $the_core_header_settings['header_type_picker']['header-5']['header_5_popup']['background_options']['video']['loop_video'] == 'no' ) {
		$loop = false;
	}
	else {
		$loop = true;
	}

	$poster = '';
	if( isset($the_core_header_settings['header_type_picker']['header-5']['header_5_popup']['background_options']['video']['poster']['data']['icon']) ) {
		$poster = $the_core_header_settings['header_type_picker']['header-5']['header_5_popup']['background_options']['video']['poster']['data']['icon'];
	}

	$filetype = wp_check_filetype($video_url);
	$filetypes = array('mp4' => 'mp4', 'ogv' => 'ogg', 'webm' => 'webm', 'jpg' => 'poster');
	$filetype = array_key_exists((string)$filetype['ext'], $filetypes) ? $filetypes[$filetype['ext']] : 'video';

	$bg_video_data_attr = 'data-background-options="' . fw_htmlspecialchars( json_encode( array( 'loop' => $loop, 'source' => array( $filetype => $video_url, 'poster' => $poster ) ) ) ) . '"';

	// enqueue scripts and styles for video header
	$shortcodes_extension = fw_ext( 'shortcodes' );
	wp_enqueue_style(
		'fw-shortcode-section-background-video',
		$shortcodes_extension->get_uri( '/shortcodes/section/static/css/background.css' )
	);

	wp_enqueue_script(
		'fw-shortcode-section-formstone-core',
		$shortcodes_extension->get_uri( '/shortcodes/section/static/js/core.js' ),
		array( 'jquery' ),
		false,
		true
	);
	wp_enqueue_script(
		'fw-shortcode-section-formstone-transition',
		$shortcodes_extension->get_uri( '/shortcodes/section/static/js/transition.js' ),
		array( 'jquery' ),
		false,
		true
	);
	wp_enqueue_script(
		'fw-shortcode-section-formstone-background',
		$shortcodes_extension->get_uri( '/shortcodes/section/static/js/background.js' ),
		array( 'jquery' ),
		false,
		true
	);
}
// end video background
?>
<header class="fw-header" itemscope="itemscope" itemtype="https://schema.org/WPHeader">
	<?php if ( $the_core_enable_header_top_bar == 'yes' ) {
		the_core_top_bar( array('top_bar_text' => $the_core_top_bar_text, 'enable_header_socials' => $the_core_enable_header_socials, 'enable_search' => $the_core_enable_search, 'search_type' => $the_core_search_type, 'placeholder_text' => $the_core_placeholder_text, 'search_position' => $the_core_search_position) );
	} ?>
	<div class="fw-header-main">
		<div class="fw-container">
			<?php the_core_logo(); ?>
			<?php if ( $the_core_enable_search == 'yes' && $the_core_search_position == 'menu_bar' ) {
				the_core_header_search( array('search_type' => $the_core_search_type, 'placeholder_text' => $the_core_placeholder_text) );
			} ?>
			<div class="fw-nav-wrap" itemscope="itemscope" itemtype="https://schema.org/SiteNavigationElement" role="navigation">
				<a href="#header-menu" class="fw-menu-open"><i class="fa fa-navicon"></i></a>
				<nav id="header-menu" class="fw-site-navigation primary-navigation" <?php echo ($bg_video_data_attr); ?>><?php echo the_core_nav_menu_without_mega_menu( 'primary' ); ?></nav>
			</div>
		</div>
	</div>
	<?php if($the_core_enable_search == 'yes' && $the_core_search_type == 'fw-mini-search') {
		the_core_header_mini_search($the_core_placeholder_text);
	} ?>
</header>