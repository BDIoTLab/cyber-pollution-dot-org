<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * @var  string $picker_id
 * @var  array $picker
 * @var  array $options
 * @var  array $values
 * @var  array $data
 * @var  array $attr
 */

?>
<div <?php echo fw_attr_to_html( $attr ); ?>>
	<div class="picker">
		<?php echo fw()->backend->render_options( array( $picker_id => $picker ), $values, $data ) ?>
	</div>
	<div class="options">
		<?php echo fw()->backend->render_options( $options, $values, $data ) ?>
	</div>
</div>
