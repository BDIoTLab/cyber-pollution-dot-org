<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$the_core_server_requirements = fw()->theme->manifest->get('server_requirements');

// wp version
global $wp_version;
$the_core_wp_required_version = fw()->theme->manifest->get('requirements/wordpress/min_version');
if( version_compare($wp_version, $the_core_wp_required_version , '<=') ){
	$the_core_wp_version_text = '<i class="fw-no-icon dashicons dashicons-info"></i>'.'<strong>'.$wp_version.'</strong>';
	$the_core_wp_version_description_text = '<span class="fw-error-message">' .__( "The version of WordPress installed on your site.", "the-core" ). ' '. esc_html__( 'We recommend you update WordPress to the latest version. The minimum required version for this theme is:', 'the-core' ) .' <strong>'.$the_core_wp_required_version. '</strong>. <a target="_blank" href="'.esc_url( admin_url('update-core.php') ).'">'.__('Do that right now', 'the-core').'</a></span>';
}
else{
	$the_core_wp_version_text = '<i class="fw-yes-icon dashicons dashicons-yes"></i>'.'<strong>'.$wp_version.'</strong>';
	$the_core_wp_version_description_text = __( "The version of WordPress installed on your site", "the-core" );
}

// wp multisite
if ( is_multisite() ){
	$the_core_multisite_text = '<i class="fw-yes-icon dashicons dashicons-yes"></i>'.'<strong>'.__('Yes', 'the-core').'</strong>';
}
else{
	$the_core_multisite_text = '<i class="fw-yes-icon dashicons dashicons-yes"></i>'.'<strong>'.__('No', 'the-core').'</strong>';
}

// wp debug mode
if ( defined('WP_DEBUG') && WP_DEBUG ){
	$the_core_debug_url = 'https://codex.wordpress.org/WP_DEBUG';
	$the_core_wp_debug_mode_text = '<i class="fw-no-icon dashicons dashicons-info"></i>'.'<strong>'.__('Yes', 'the-core').'</strong>';
	$the_core_wp_debug_mode_description_text = '<span class="fw-error-message">' .__( 'Displays whether or not WordPress is in Debug Mode. This mode is used by developers to test the theme. We recommend you turn it off for an optimal user experience on your website.', 'the-core' ).' <a href="'.$the_core_debug_url.'" target="_blank">'.__('Learn how to do it', 'the-core').'</a></span>';
}
else{
	$the_core_wp_debug_mode_text = '<i class="fw-yes-icon dashicons dashicons-yes"></i>'.'<strong>'.__('No', 'the-core').'</strong>';
	$the_core_wp_debug_mode_description_text = __( 'Displays whether or not WordPress is in Debug Mode', 'the-core' );
}

// wp memory limit
$the_core_memory = the_core_return_memory_size( WP_MEMORY_LIMIT );
$the_core_requirements_wp_memory_limit = the_core_return_memory_size($the_core_server_requirements['server']['wp_memory_limit']);
if ( $the_core_memory < $the_core_requirements_wp_memory_limit ) {
	$the_core_wp_memory_limit_text = '<i class="fw-no-icon dashicons dashicons-info"></i>'.'<strong>'.size_format( $the_core_memory ).'</strong>';
	$the_core_wp_memory_limit_description_text = '<span class="fw-error-message">' . __('The maximum amount of memory (RAM) that your site can use at one time.', 'the-core') . ' '.__( 'We recommend setting memory to at least <strong>256MB</strong>. Please define memory limit in <strong>wp-config.php</strong> file.', 'the-core').' <a href="https://codex.wordpress.org/Editing_wp-config.php#Increasing_memory_allocated_to_PHP" target="_blank">'.__('Learn how to do it', 'the-core' ).'</a></span>';
} else {
	$the_core_wp_memory_limit_text = '<i class="fw-yes-icon dashicons dashicons-yes"></i>'.'<strong>'.size_format( $the_core_memory ).'</strong>';
	$the_core_wp_memory_limit_description_text = __('The maximum amount of memory (RAM) that your site can use at one time', 'the-core');
}

// php version
if ( function_exists( 'phpversion' ) ) {
	if( version_compare(phpversion(), $the_core_server_requirements['server']['php_version'], '<=') ){
		$the_core_php_version_text = '<i class="fw-no-icon dashicons dashicons-info"></i><strong>'.esc_html( phpversion() ).'</strong>';
		$the_core_php_version_description_text = '<span class="fw-error-message">' .esc_html__( 'The version of PHP installed on your hosting server.', 'the-core' ).' '.esc_html__( 'We recommend you update PHP to the latest version. The minimum required version for this theme is:', 'the-core' ) .' <strong>'.$the_core_server_requirements['server']['php_version']. '</strong>. '.__('Contact your hosting provider, they can install it for you.', 'the-core').'</span>';
	}
	else{
		$the_core_php_version_text = '<i class="fw-yes-icon dashicons dashicons-yes"></i><strong>'.esc_html( phpversion() ).'</strong>';
		$the_core_php_version_description_text =  esc_html__( 'The version of PHP installed on your hosting server', 'the-core' );
	}
}
else{
	$the_core_php_version_text = __('No PHP Installed', 'the-core');
}

// php post max size
$the_core_requirements_post_max_size = the_core_return_memory_size($the_core_server_requirements['server']['post_max_size']);
if ( the_core_return_memory_size( ini_get('post_max_size') ) < $the_core_requirements_post_max_size ) {
	$the_core_max_upload_size = 'http://docs.themefuse.com/the-core/your-theme/theme-settings/how-to-set-a-maximum-file-upload-size';
	$the_core_php_post_max_size_text = '<i class="fw-no-icon dashicons dashicons-info"></i><strong>'.size_format(the_core_return_memory_size( ini_get('post_max_size') ) ).'</strong>';
	$the_core_php_post_max_size_description_text = '<span class="fw-error-message">' .esc_html__( 'The largest file size that can be contained in one post.', 'the-core'  ).' '. esc_html__( 'We recommend setting the post maximum size to at least:', 'the-core' ) .' <strong>'.size_format($the_core_requirements_post_max_size). '</strong>'.'. <a href="'.$the_core_max_upload_size.'" target="_blank">'.__('Learn how to do it','the-core').'</a></span>';
}
else{
	$the_core_php_post_max_size_text = '<i class="fw-yes-icon dashicons dashicons-yes"></i><strong>'.size_format(the_core_return_memory_size( ini_get('post_max_size') ) ).'</strong>';
	$the_core_php_post_max_size_description_text = esc_html__( 'The largest file size that can be contained in one post', 'the-core'  );
}

// php time limit
$the_core_time_limit = ini_get('max_execution_time');
$the_core_required_php_time_limit = (int)$the_core_server_requirements['server']['php_time_limit'];
if ( $the_core_time_limit < $the_core_required_php_time_limit && $the_core_time_limit != 0 ) {
	$the_core_php_time_limit_text = '<i class="fw-no-icon dashicons dashicons-info"></i>'.'<strong>'.$the_core_time_limit.'</strong>';
	$the_core_php_time_limit_description_text = '<span class="fw-error-message">'.esc_html__( 'The amount of time (in seconds) that your site will spend on a single operation before timing out (to avoid server lockups).', 'the-core'  ).' '.__( 'We recommend setting the maximum execution time to at least', 'the-core').' <strong>'.$the_core_required_php_time_limit.'</strong>'.'. <a href="https://codex.wordpress.org/Common_WordPress_Errors#Maximum_execution_time_exceeded" target="_blank">'.__('Learn how to do it','the-core').'</a></span>';
} else {
	$the_core_php_time_limit_description_text = esc_html__( 'The amount of time (in seconds) that your site will spend on a single operation before timing out (to avoid server lockups)', 'the-core'  );
	$the_core_php_time_limit_text = '<i class="fw-yes-icon dashicons dashicons-yes"></i>'.'<strong>'.$the_core_time_limit.'</strong>';
}

// php max input vars
$the_core_max_input_vars = ini_get('max_input_vars');
$the_core_required_input_vars = $the_core_server_requirements['server']['php_max_input_vars'];
if ( $the_core_max_input_vars < $the_core_required_input_vars ) {
	$the_core_maximum_input_vars_url = 'http://docs.themefuse.com/the-core/your-theme/theme-settings/how-to-increase-the-maximum-input-variables-limit';
	$the_core_php_max_input_vars_description_text = '<span class="fw-error-message">'.esc_html__( 'The maximum number of variables your server can use for a single function to avoid overloads.', 'the-core'  ). ' '.__( 'Please increase the maximum input variables limit to:','the-core').' <strong>' . $the_core_required_input_vars . '</strong>'.'. <a href="'.$the_core_maximum_input_vars_url.'" target="_blank">'.__('Learn how to do it','the-core').'</a></span>';
	$the_core_php_max_input_vars_text = '<i class="fw-no-icon dashicons dashicons-info"></i><strong>'.$the_core_max_input_vars.'</strong>';
} else {
	$the_core_php_max_input_vars_description_text = esc_html__( 'The maximum number of variables your server can use for a single function to avoid overloads.', 'the-core'  );
	$the_core_php_max_input_vars_text = '<i class="fw-yes-icon dashicons dashicons-yes"></i><strong>'.$the_core_max_input_vars.'</strong>';
}

// suhosin
if( extension_loaded( 'suhosin' ) ) {
	$the_core_suhosin_text = '<i class="fw-no-icon dashicons dashicons-info"></i><strong>'.__('Yes', 'the-core').'</strong>';
	$the_core_suhosin_description_text = '<span class="fw-error-message">'. esc_html__( 'Suhosin is an advanced protection system for PHP installations and may need to be configured to increase its data submission limits', 'the-core'  ).'</span>';
	$the_core_max_input_vars      = ini_get( 'suhosin.post.max_vars' );
	$the_core_required_input_vars = $the_core_server_requirements['server']['suhosin_post_max_vars'];
	if ( $the_core_max_input_vars < $the_core_required_input_vars ) {
		$the_core_suhosin_description_text .= '<span class="fw-error-message">' . sprintf( __( '%s - Recommended Value is: %s. <a href="%s" target="_blank">Increasing max input vars limit.</a>', 'the-core' ), $the_core_max_input_vars, '<strong>' . ( $the_core_required_input_vars ) . '</strong>', 'http://docs.themefuse.com/the-core/your-theme/theme-settings/how-to-increase-the-maximum-input-variables-limit' ) . '</span>';
	}
}
else {
	$the_core_suhosin_text = '<i class="fw-yes-icon dashicons dashicons-yes"></i><strong>'.__('No', 'the-core').'</strong>';
	$the_core_suhosin_description_text = esc_html__( 'Suhosin is an advanced protection system for PHP installations.', 'the-core'  );
}

// mysql version
global $wpdb;
if( version_compare($wpdb->db_version(), $the_core_server_requirements['server']['mysql_version'], '<=') ){
	$the_core_mysql_version_text = '<i class="fw-no-icon dashicons dashicons-info"></i><strong>'.$wpdb->db_version().'</strong>';
	$the_core_mysql_version_description_text = '<span class="fw-error-message">' . esc_html__( 'The version of MySQL installed on your hosting server.', 'the-core'  ).' '. esc_html__( 'We recommend you update MySQL to the latest version. The minimum required version for this theme is:', 'the-core' ) .' <strong>'.$the_core_server_requirements['server']['mysql_version']. '</strong> '.__('Contact your hosting provider, they can install it for you.', 'the-core').'</span>';
}
else{
	$the_core_mysql_version_text = '<i class="fw-yes-icon dashicons dashicons-yes"></i><strong>'.$wpdb->db_version().'</strong>';
	$the_core_mysql_version_description_text = esc_html__( 'The version of MySQL installed on your hosting server', 'the-core'  );
}

// max upload size
$the_core_requirements_max_upload_size = the_core_return_memory_size($the_core_server_requirements['server']['max_upload_size']);
if ( wp_max_upload_size() < $the_core_requirements_max_upload_size ) {
	$the_core_fie_max_size_url = 'http://docs.themefuse.com/the-core/your-theme/theme-settings/how-to-set-a-maximum-file-upload-size';
	$the_core_max_upload_size_text = '<i class="fw-no-icon dashicons dashicons-info"></i><strong>'.size_format(wp_max_upload_size()).'</strong>';
	$the_core_max_upload_size_description_text = '<span class="fw-error-message">' . esc_attr__( 'The largest file size that can be uploaded to your WordPress installation.', 'the-core'  ). ' '.esc_html__( 'We recommend setting the maximum upload file size to at least:', 'the-core' ) .' <strong>'.size_format($the_core_requirements_max_upload_size). '</strong>. <a href="'.$the_core_fie_max_size_url.'" target="_blank">'.__('Learn how to do it', 'the-core').'</a></span>';
}
else{
	$the_core_max_upload_size_text = '<i class="fw-yes-icon dashicons dashicons-yes"></i><strong>'.size_format(wp_max_upload_size()).'</strong>';
	$the_core_max_upload_size_description_text = esc_attr__( 'The largest file size that can be uploaded to your WordPress installation', 'the-core'  );
}

// fsockopen
if( function_exists( 'fsockopen' ) || function_exists( 'curl_init' ) ) {
	$the_core_fsockopen_text = '<i class="fw-yes-icon dashicons dashicons-yes"></i><strong>'.esc_html__('Yes', 'the-core').'</strong>';
	$the_core_fsockopen_description_text = __( 'Payment gateways can use cURL to communicate with remote servers to authorize payments, other plugins may also use it when communicating with remote services', 'the-core' );
}
else{
	$the_core_fsockopen_text = '<i class="fw-no-icon dashicons dashicons-info"></i><strong>'.esc_html__('No', 'the-core').'</strong>';
	$the_core_fsockopen_description_text = '<span class="fw-error-message">'.__( 'Payment gateways can use cURL to communicate with remote servers to authorize payments, other plugins may also use it when communicating with remote services. Your server does not have <strong>fsockopen</strong> or <strong>cURL</strong> enabled thus PayPal IPN and other scripts which communicate with other servers will not work. Contact your hosting provider, they can install it for you.', 'the-core' ).'</span>';
}

$options = array(
	'requirements_tab' => array(
		'title'   => __( 'Requirements', 'the-core' ),
		'type'    => 'tab',
		'options' => array(
			'wordpress-environment-box' => array(
				'title'   => __( 'WordPress Environment', 'the-core' ),
				'type'    => 'box',
				'options' => array(
					'home_url' => array(
						'attr'  => array( 'class' => 'fw-theme-requirements-option', ),
						'label' => __( 'Home URL', 'the-core' ),
						'desc'  => __( "The URL of your site's homepage", "the-core" ),
						'type'  => 'html',
						'html'  => '<i class="fw-yes-icon dashicons dashicons-yes"></i>'.'<strong>'.esc_url( home_url('/') ).'</strong>',
					),
					'site_url' => array(
						'attr'  => array( 'class' => 'fw-theme-requirements-option', ),
						'label' => __( 'Site URL', 'the-core' ),
						'desc'  => __( "The root URL of your site", "the-core" ),
						'type'  => 'html',
						'html'  => '<i class="fw-yes-icon dashicons dashicons-yes"></i>'.'<strong>'.esc_url(site_url()).'</strong>',
					),
					'wp_version' => array(
						'attr'  => array( 'class' => 'fw-theme-requirements-option', ),
						'label' => __( 'WP Version', 'the-core' ),
						'desc'  => $the_core_wp_version_description_text,
						'type'  => 'html',
						'html'  => $the_core_wp_version_text,
					),
					'wp_multisite' => array(
						'attr'  => array( 'class' => 'fw-theme-requirements-option', ),
						'label' => __( 'WP Multisite', 'the-core' ),
						'type'  => 'html',
						'desc'  => __( 'Whether or not you have WordPress Multisite enabled', 'the-core' ),
						'html'  => $the_core_multisite_text,
					),
					'wp_debug_mode' => array(
						'attr'  => array( 'class' => 'fw-theme-requirements-option', ),
						'label' => __( 'WP Debug Mode', 'the-core' ),
						'type'  => 'html',
						'desc'  => $the_core_wp_debug_mode_description_text,
						'html'  => $the_core_wp_debug_mode_text,
					),
					'wp_memory_limit' => array(
						'attr'  => array( 'class' => 'fw-theme-requirements-option', ),
						'label' => __( 'WP Memory Limit', 'the-core' ),
						'desc'  => $the_core_wp_memory_limit_description_text,
						'type'  => 'html',
						'html'  => $the_core_wp_memory_limit_text,
					),
				)
			),
			'server-environment-box' => array(
				'title'   => __( 'Server Environment', 'the-core' ),
				'attr'    => array('class' => 'prevent-auto-close'),
				'type'    => 'box',
				'options' => array(
					'server_info' => array(
						'attr'  => array( 'class' => 'fw-theme-requirements-option', ),
						'label' => __( 'Server Info', 'the-core' ),
						'desc'  => __( "Information about the web server that is currently hosting your site", "the-core" ),
						'type'  => 'html',
						'html'  => '<i class="fw-yes-icon dashicons dashicons-yes"></i><strong>'.esc_html( $_SERVER['SERVER_SOFTWARE'] ).'</strong>',
					),
					'php_version' => array(
						'attr'  => array( 'class' => 'fw-theme-requirements-option', ),
						'label' => __( 'PHP Version', 'the-core' ),
						'desc'  => $the_core_php_version_description_text,
						'type'  => 'html',
						'html'  => $the_core_php_version_text,
					),
					'php_post_max_size' => array(
						'attr'  => array( 'class' => 'fw-theme-requirements-option', ),
						'label' => __( 'PHP Post Max Size', 'the-core' ),
						'desc'  => $the_core_php_post_max_size_description_text,
						'type'  => 'html',
						'html'  => $the_core_php_post_max_size_text,
					),
					'php_time_limit' => array(
						'attr'  => array( 'class' => 'fw-theme-requirements-option', ),
						'label' => __( 'PHP Time Limit', 'the-core' ),
						'desc'  => $the_core_php_time_limit_description_text,
						'type'  => 'html',
						'html'  => $the_core_php_time_limit_text,
					),
					'php_max_input_vars' => array(
						'attr'  => array( 'class' => 'fw-theme-requirements-option', ),
						'label' => __( 'PHP Max Input Vars', 'the-core' ),
						'desc'  => $the_core_php_max_input_vars_description_text,
						'type'  => 'html',
						'html'  => $the_core_php_max_input_vars_text,
					),
					'suhosin_installed' => array(
						'attr'  => array( 'class' => 'fw-theme-requirements-option', ),
						'label' => __( 'SUHOSIN Installed', 'the-core' ),
						'desc'  => $the_core_suhosin_description_text,
						'type'  => 'html',
						'html'  => $the_core_suhosin_text,
					),
					'zip_archive' => array(
						'attr'  => array( 'class' => 'fw-theme-requirements-option', ),
						'label' => __( 'ZipArchive', 'the-core' ),
						'desc'  => class_exists( 'ZipArchive' ) ? esc_html__('ZipArchive is required for importing demos. They are used to import and export zip files specifically for sliders', 'the-core') : '<span class="fw-error-message">'.esc_html__('ZipArchive is required for importing demos. They are used to import and export zip files specifically for sliders.', 'the-core').' '.__('Contact your hosting provider, they can install it for you.', 'the-core').'</span>',
						'type'  => 'html',
						'html'  => class_exists( 'ZipArchive' ) ? '<i class="fw-yes-icon dashicons dashicons-yes"></i><strong>'.esc_html__('Yes', 'the-core').'</strong>' : '<i class="fw-no-icon dashicons dashicons-info"></i><strong>'.esc_html__('No', 'the-core').'</strong>',
					),
					'mysql_version' => array(
						'attr'  => array( 'class' => 'fw-theme-requirements-option', ),
						'label' => __( 'MySQL Version', 'the-core' ),
						'desc'  => $the_core_mysql_version_description_text,
						'type'  => 'html',
						'html'  => $the_core_mysql_version_text,
					),
					'max_upload_size' => array(
						'attr'  => array( 'class' => 'fw-theme-requirements-option', ),
						'label' => __( 'Max Upload Size', 'the-core' ),
						'desc'  => $the_core_max_upload_size_description_text,
						'type'  => 'html',
						'html'  => $the_core_max_upload_size_text,
					),
					'fsockopen' => array(
						'attr'  => array( 'class' => 'fw-theme-requirements-option', ),
						'label' => __( 'fsockopen/cURL', 'the-core' ),
						'desc'  => $the_core_fsockopen_description_text,
						'type'  => 'html',
						'html'  => $the_core_fsockopen_text,
					),
					'legend' => array(
						'label' => false,
						'type'  => 'html',
						'html'  => '',
						'desc'  => '<i class="fw-yes-icon dashicons dashicons-yes"></i><span class="fw-success-message">'.esc_html__('Meets minimum requirements', 'the-core').'</span><br><i class="fw-no-icon dashicons dashicons-info"></i><span class="fw-error-message">'.esc_html__("We have some improvements to suggest", "the-core").'</span>',
					),
				)
			),
		)
	),
);
