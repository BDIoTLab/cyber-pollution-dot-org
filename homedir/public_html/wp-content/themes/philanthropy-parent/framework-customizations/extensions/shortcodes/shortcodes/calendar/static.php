<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$shortcodes_extension = fw_ext( 'shortcodes' );
$the_core_template_directory   = get_template_directory_uri();

wp_enqueue_style(
	'calendar',
	$the_core_template_directory . '/css/calendar.css'
);

wp_enqueue_script(
	'fw-shortcode-calendar-bootstrap3',
	$shortcodes_extension->get_declared_URI( '/shortcodes/calendar/static/libs/bootstrap3/js/bootstrap.min.js' ),
	array( 'jquery', 'underscore' ),
	fw()->manifest->get_version(),
	true
);
wp_enqueue_script(
	'fw-shortcode-calendar-timezone',
	$shortcodes_extension->get_declared_URI( '/shortcodes/calendar/static/libs/jstimezonedetect/jstz.min.js' ),
	array( 'jquery', 'underscore' ),
	fw()->manifest->get_version(),
	true
);
wp_enqueue_script(
	'fw-shortcode-calendar-calendar',
	$shortcodes_extension->get_declared_URI( '/shortcodes/calendar/static/js/calendar.js' ),
	array( 'jquery', 'underscore', 'fw-shortcode-calendar-bootstrap3', 'fw-shortcode-calendar-timezone' ),
	fw()->manifest->get_version(),
	true
);
wp_enqueue_script(
	'fw-shortcode-calendar',
	$shortcodes_extension->get_declared_URI( '/shortcodes/calendar/static/js/scripts.js' ),
	array( 'jquery', 'underscore', 'fw-shortcode-calendar-calendar' ),
	fw()->manifest->get_version(),
	true
);

$locale = get_locale();
wp_localize_script(
	'fw-shortcode-calendar',
	'fwShortcodeCalendarLocalize',
	array(
		'event'  => __( 'Event', 'the-core' ),
		'events' => __( 'Events', 'the-core' ),
		'today'  => __( 'Today', 'the-core' ),
		'locale' => $locale
	)
);
wp_localize_script(
	'fw-shortcode-calendar',
	'calendar_languages',
	array(
		$locale => array(
			'error_noview'     => sprintf( __( 'Calendar: View %s not found', 'the-core' ), '{0}' ),
			'error_dateformat' => sprintf( __( 'Calendar: Wrong date format %s. Should be either "now" or "yyyy-mm-dd"',
				'the-core' ), '{0}' ),
			'error_loadurl'    => __( 'Calendar: Event URL is not set', 'the-core' ),
			'error_where'      => sprintf( __( 'Calendar: Wrong navigation direction %s. Can be only "next" or "prev" or "today"',
				'the-core' ), '{0}' ),
			'error_timedevide' => __( 'Calendar: Time split parameter should divide 60 without decimals. Something like 10, 15, 30',
				'the-core' ),
			'no_events_in_day' => __( 'No events in this day.', 'the-core' ),
			'title_year'       => '{0}',
			'title_month'      => '{0} {1}',
			'title_week'       => sprintf( __( 'week %s of %s', 'the-core' ), '{0}', '{1}' ),
			'title_day'        => '{0} {1} {2}, {3}',
			'week'             => __( 'Week ', 'the-core' ) . '{0}',
			'all_day'          => __( 'All day', 'the-core' ),
			'time'             => __( 'Time', 'the-core' ),
			'events'           => __( 'Events', 'the-core' ),
			'before_time'      => __( 'Ends before timeline', 'the-core' ),
			'after_time'       => __( 'Starts after timeline', 'the-core' ),
			'm0'               => __( 'January', 'the-core' ),
			'm1'               => __( 'February', 'the-core' ),
			'm2'               => __( 'March', 'the-core' ),
			'm3'               => __( 'April', 'the-core' ),
			'm4'               => __( 'May', 'the-core' ),
			'm5'               => __( 'June', 'the-core' ),
			'm6'               => __( 'July', 'the-core' ),
			'm7'               => __( 'August', 'the-core' ),
			'm8'               => __( 'September', 'the-core' ),
			'm9'               => __( 'October', 'the-core' ),
			'm10'              => __( 'November', 'the-core' ),
			'm11'              => __( 'December', 'the-core' ),
			'ms0'              => __( 'Jan', 'the-core' ),
			'ms1'              => __( 'Feb', 'the-core' ),
			'ms2'              => __( 'Mar', 'the-core' ),
			'ms3'              => __( 'Apr', 'the-core' ),
			'ms4'              => __( 'May', 'the-core' ),
			'ms5'              => __( 'Jun', 'the-core' ),
			'ms6'              => __( 'Jul', 'the-core' ),
			'ms7'              => __( 'Aug', 'the-core' ),
			'ms8'              => __( 'Sep', 'the-core' ),
			'ms9'              => __( 'Oct', 'the-core' ),
			'ms10'             => __( 'Nov', 'the-core' ),
			'ms11'             => __( 'Dec', 'the-core' ),
			'd0'               => __( 'Sun', 'the-core' ),
			'd1'               => __( 'Mon', 'the-core' ),
			'd2'               => __( 'Tue', 'the-core' ),
			'd3'               => __( 'Wed', 'the-core' ),
			'd4'               => __( 'Thu', 'the-core' ),
			'd5'               => __( 'Fri', 'the-core' ),
			'd6'               => __( 'Sat', 'the-core' ),
		)
	)
);
