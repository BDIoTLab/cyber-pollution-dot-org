<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * @var array $item
 * @var array $attr
 */

$options = $item['options'];

// set required attribute as class for parse errors only on 1 click on form send
if( isset($attr['required']) ) {
	isset($attr['class']) ? $attr['class'] .= $attr['required'] : $attr['class'] = $attr['required'];
	unset($attr['required']);
}
?>
<div class="<?php echo esc_attr( fw_ext_builder_get_item_width( 'form-builder', $item['width'] . '/frontend_class' ) ); ?>">
	<div class="field-text">
		<?php if ( fw_htmlspecialchars( $item['options']['label'] ) != '' ) : ?>
			<label for="<?php echo esc_attr( $attr['id'] ) ?>"><?php echo fw_htmlspecialchars( $item['options']['label'] ); ?>
				<?php if ( $options['required'] ): ?><sup>*</sup><?php endif; ?>
			</label>
		<?php endif; ?>
		<input <?php echo fw_attr_to_html( $attr ) ?>>
		<?php if ( $options['info'] ): ?>
			<p><em><?php echo ($options['info']); ?></em></p>
		<?php endif; ?>
	</div>
</div>