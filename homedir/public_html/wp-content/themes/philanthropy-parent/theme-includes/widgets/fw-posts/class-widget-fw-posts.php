<?php if ( ! defined( 'ABSPATH' ) ) {
    die( 'Direct access forbidden.' );
}

class Widget_FW_Posts extends WP_Widget {

	function __construct() {
		$widget_ops = array( 'description' => esc_html__( "Popular/Recent/Most Commented Posts.", "the-core" ) );

		parent::__construct( false, esc_html__( 'Posts - TF', 'the-core' ), $widget_ops );
	}

	function widget( $args, $instance ) {
		extract( $args );
		$params = array();

		foreach ( $instance as $key => $value ) {
			$params[ $key ] = $value;
		}

		$title = '';
		if ( ! empty( $instance['title'] ) ) {
			$title = $before_title . apply_filters( 'widget_title', $instance['title'] ) . $after_title;
		}

		unset( $params['title'] );

		$filepath = get_template_directory() . '/theme-includes/widgets/fw-posts/views/widget.php';

		$data = array(
			'instance'      => $params,
			'title'         => $title,
			'before_widget' => str_replace( 'class="widget ', 'class="widget fw-widget-posts ', $before_widget ),
			'after_widget'  => $after_widget,
		);

		echo the_core_render_view( $filepath, $data );
	}

	function update( $new_instance, $old_instance ) {
		$instance                 = wp_parse_args( (array) $new_instance, $old_instance );
		$instance['title']        = $new_instance['title'];
		$instance['posts_number'] = $new_instance['posts_number'];
		$instance['show_images']  = isset( $new_instance['show_images'] );
		$instance['display_date'] = isset( $new_instance['display_date'] );

		return $instance;
	}

	function form( $instance ) {
		$instance   = wp_parse_args( (array) $instance, array(
			'title'        => '',
			'posts_number' => 5,
			'type'         => 'recent',
			'days'         => 'all_time',
			'category'     => 'all_categories'
		) );
		$args       = array(
			'type'    => 'post',
			'orderby' => 'name',
			'order'   => 'ASC',
		);
		$categories = get_categories( $args );
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'the-core' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>"/>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'posts_number' ) ); ?>"><?php esc_html_e( 'Number of Posts to Show:', 'the-core' ); ?></label>
			<input size="3" style="width: 45px;" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'posts_number' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'posts_number' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['posts_number'] ); ?>"/>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'type' ) ); ?>"><?php esc_html_e( 'Select Type:', 'the-core' ); ?></label>
			<select name="<?php echo esc_attr( $this->get_field_name( 'type' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'type' ) ); ?>" class="widefat">
				<option value="recent" <?php selected( $instance['type'], 'recent' ); ?>><?php esc_html_e( 'Recent Posts', 'the-core' ); ?></option>
				<option value="popular" <?php selected( $instance['type'], 'popular' ); ?>><?php esc_html_e( 'Popular Posts', 'the-core' ); ?></option>
				<option value="commented" <?php selected( $instance['type'], 'commented' ); ?>><?php esc_html_e( 'Most Commented Posts', 'the-core' ); ?></option>
			</select>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'days' ) ); ?>"><?php esc_html_e( 'Select Days:', 'the-core' ); ?></label>
			<select name="<?php echo esc_attr( $this->get_field_name( 'days' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'days' ) ); ?>" class="widefat">
				<option value="" <?php selected( $instance['days'], '' ); ?>><?php esc_html_e( 'All time', 'the-core' ); ?></option>
				<option value="7" <?php selected( $instance['days'], '7' ); ?>><?php esc_html_e( '1 Week', 'the-core' ); ?></option>
				<option value="30" <?php selected( $instance['days'], '30' ); ?>><?php esc_html_e( '1 Month', 'the-core' ); ?></option>
				<option value="90" <?php selected( $instance['days'], '90' ); ?>><?php esc_html_e( '3 Month', 'the-core' ); ?></option>
				<option value="180" <?php selected( $instance['days'], '180' ); ?>><?php esc_html_e( '6 Month', 'the-core' ); ?></option>
				<option value="360" <?php selected( $instance['days'], '360' ); ?>><?php esc_html_e( '1 Year', 'the-core' ); ?></option>
			</select>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'category' ) ); ?>"><?php esc_html_e( 'Select Category:', 'the-core' ); ?></label>
			<select name="<?php echo esc_attr( $this->get_field_name( 'category' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'type' ) ); ?>" class="widefat">
				<option value="" <?php selected( $instance['category'], '' ); ?>><?php esc_html_e( 'All Categories', 'the-core' ); ?></option>
				<?php foreach ( $categories as $category ) { ?>
					<option value="<?php echo esc_attr($category->term_id); ?>" <?php selected( $instance['category'], $category->term_id ); ?>><?php echo ($category->name); ?></option>
				<?php } ?>
			</select>
		</p>
		<p>
			<input id="<?php echo esc_attr( $this->get_field_id( 'show_images' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'show_images' ) ); ?>" type="checkbox" <?php checked( isset( $instance['show_images'] ) ? $instance['show_images'] : 0 ); ?> />
			<label for="<?php echo esc_attr( $this->get_field_id( 'show_images' ) ); ?>"><?php esc_html_e( 'Display Images?', 'the-core' ); ?></label>
		</p>
		<p>
			<input id="<?php echo esc_attr( $this->get_field_id( 'display_date' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'display_date' ) ); ?>" type="checkbox" <?php checked( isset( $instance['display_date'] ) ? $instance['display_date'] : 0 ); ?> />
			<label for="<?php echo esc_attr( $this->get_field_id( 'display_date' ) ); ?>"><?php esc_html_e( 'Display Date?', 'the-core' ); ?></label>
		</p>
	<?php
	}
}