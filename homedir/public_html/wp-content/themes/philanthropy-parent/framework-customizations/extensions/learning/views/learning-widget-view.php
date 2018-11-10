<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

/**
 * @var string $before_widget
 * @var string $after_widget
 * @var string $before_title
 * @var string $after_title
 * @var string $title
 * @var array $courses
 */

echo $before_widget;
echo $before_title . $title . $after_title;
?>
<?php if ( ! empty( $courses ) ) : ?>
	<ul class="fw-course-list">
		<?php foreach($courses as $course): ?>
			<li>
				<div class="course-item">
					<a href="<?php echo esc_url( get_permalink($course->ID) ); ?>"><?php echo ($course->post_title); ?></a>
				</div>
			</li>
		<?php endforeach; ?>
	</ul>
	<?php endif; ?>
<?php echo $after_widget; ?>