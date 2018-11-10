<?php if (!defined('FW')) {
	die('Forbidden');
}
/**
 * @var  FW_Option_Type_TF_Typography $tf_typography
 * @var  string $id
 * @var  array $option
 * @var  array $data
 * @var  array $fonts
 * @var array $defaults
 */
{
	$wrapper_attr = $option['attr'];

	unset(
		$wrapper_attr['value'],
		$wrapper_attr['name']
	);
}

{
	$option['value'] = array_merge($defaults['value'], (array)$option['value']);
	$data['value'] = array_merge($option['value'], is_array($data['value']) ? $data['value'] : array());
	$google_font = $tf_typography->get_google_font($data['value']['family']);
}

$components = (isset($option['components']) && is_array($option['components'])) ? array_merge($defaults['components'], $option['components']) : $defaults['components'];
?>
<div <?php echo fw_attr_to_html($wrapper_attr) ?>>

	<?php if ( $components['family'] ) : ?>
		<div class="fw-option-tf-typography-option fw-option-tf-typography-option-family fw-border-box-sizing fw-col-sm-5">
			<select data-type="family" data-value="<?php echo esc_attr($data['value']['family']); ?>"
			        name="<?php echo esc_attr( $option['attr']['name'] ) ?>[family]"
			        class="fw-option-tf-typography-option-family-input">
			</select>
			<div class="fw-inner"><?php esc_html_e('Font face', 'the-core'); ?></div>
		</div>

		<div class="fw-option-tf-typography-option fw-option-tf-typography-option-style fw-border-box-sizing fw-col-sm-3" style="display: <?php echo ($google_font) ? 'none' : 'inline-block'; ?>;">
			<select data-type="style" name="<?php echo esc_attr($option['attr']['name']) ?>[style]" class="fw-option-tf-typography-option-style-input">
					<?php foreach (
						array(
							'normal'  => esc_html__('Normal', 'the-core'),
							'italic'  => esc_html__('Italic', 'the-core'),
							'oblique' => esc_html__('Oblique', 'the-core')
						)
						as $key => $style): ?>
						<option value="<?php echo esc_attr($key) ?>" <?php if ($data['value']['style'] === $key): ?>selected="selected"<?php endif; ?>><?php echo fw_htmlspecialchars($style) ?></option>
					<?php endforeach; ?>
			</select>
			<div class="fw-inner"><?php esc_html_e('Style', 'the-core'); ?></div>
		</div>

		<div class="fw-option-tf-typography-option fw-option-tf-typography-option-weight fw-border-box-sizing fw-col-sm-3" style="display: <?php echo ($google_font) ? 'none' : 'inline-block'; ?>;">
			<select data-type="weight" name="<?php echo esc_attr($option['attr']['name']) ?>[weight]" class="fw-option-tf-typography-option-weight-input">
				<?php
				$variation = apply_filters( 'the_core_tf_typography_default_variation', array(
					100 => 100,
					200 => 200,
					300 => 300,
					400 => 400,
					500 => 500,
					600 => 600,
					700 => 700,
					800 => 800,
					900 => 900
				) );
				foreach (
					$variation
					as $key => $style): ?>
					<option value="<?php echo esc_attr($key) ?>" <?php if ($data['value']['weight'] == $key): ?>selected="selected"<?php endif; ?>><?php echo fw_htmlspecialchars($style) ?></option>
				<?php endforeach; ?>
			</select>
			<div class="fw-inner"><?php esc_html_e('Weight', 'the-core'); ?></div>
		</div>

		<div class="fw-option-tf-typography-option fw-option-tf-typography-option-subset fw-border-box-sizing fw-col-sm-2" style="display: <?php echo ($google_font) ? 'inline-block' : 'none'; ?>;">
			<select data-type="subset" name="<?php echo esc_attr($option['attr']['name']) ?>[subset]" class="fw-option-tf-typography-option-subset">
				<?php if($google_font) {
					foreach($google_font->subsets as $subset){ ?>
						<option value="<?php echo esc_attr($subset) ?>" <?php if ($data['value']['subset'] === $subset): ?>selected="selected"<?php endif; ?>><?php echo fw_htmlspecialchars($subset); ?></option>
					<?php }
				}
				?>
			</select>
			<div class="fw-inner"><?php esc_html_e('Script', 'the-core'); ?></div>
		</div>

		<div class="fw-option-tf-typography-option fw-option-tf-typography-option-variation fw-border-box-sizing fw-col-sm-2" style="display: <?php echo ($google_font) ? 'inline-block' : 'none'; ?>;">
			<select data-type="variation" name="<?php echo esc_attr($option['attr']['name']) ?>[variation]" class="fw-option-tf-typography-option-variation">
				<?php if($google_font) {
						foreach($google_font->variants as $variant){ ?>
							<option value="<?php echo esc_attr($variant) ?>" <?php if ($data['value']['variation'] === $variant): ?>selected="selected"<?php endif; ?>><?php echo fw_htmlspecialchars($variant); ?></option>
						<?php }
					}
				?>
			</select>
			<div class="fw-inner"><?php esc_html_e('Style', 'the-core'); ?></div>
		</div>
	<?php endif; ?>

	<?php if ( $components['size'] ) : ?>
		<div class="fw-option-tf-typography-option fw-option-tf-typography-option-size fw-border-box-sizing fw-col-sm-2">
			<input data-type="size" name="<?php echo esc_attr($option['attr']['name']) ?>[size]" class="fw-option-tf-typography-option-size-input" type="text" value="<?php echo esc_attr($data['value']['size']); ?>">
			<div class="fw-inner"><?php esc_html_e('Size', 'the-core'); ?></div>
		</div>
	<?php endif; ?>

	<?php if ( $components['line-height'] ) : ?>
		<div class="fw-option-tf-typography-option fw-option-tf-typography-option-line-height fw-border-box-sizing fw-col-sm-2">
			<input data-type="line-height" name="<?php echo esc_attr($option['attr']['name']) ?>[line-height]" value="<?php echo esc_attr($data['value']['line-height']); ?>" class="fw-option-tf-typography-option-line-height-input" type="text">
			<div class="fw-inner"><?php esc_html_e('Line height', 'the-core'); ?></div>
		</div>
	<?php endif; ?>

	<?php if ( $components['letter-spacing'] ) : ?>
		<div class="fw-option-tf-typography-option fw-option-tf-typography-option-letter-spacing fw-border-box-sizing fw-col-sm-2">
			<input data-type="letter-spacing" name="<?php echo esc_attr($option['attr']['name']) ?>[letter-spacing]" value="<?php echo esc_attr($data['value']['letter-spacing']); ?>" class="fw-option-tf-typography-option-letter-spacing-input" type="text">
			<div class="fw-inner"><?php esc_html_e('Letter spacing', 'the-core'); ?></div>
		</div>
	<?php endif; ?>

	<?php if ( $components['color-palette'] ) : ?>
		<div class="fw-option-tf-typography-option fw-option-tf-typography-option-color-palette fw-border-box-sizing fw-col-sm-2" data-type="color-palette">
			<?php

			echo fw()->backend->option_type('color-palette')->render(
				'color-palette',
				array(
					'label' => false,
					'desc'  => false,
					'type'  => 'color-palette',
					'choices'   =>  apply_filters('fw_tf_typography_color_palette_choices', fw_get_db_settings_option( 'color_settings')),
					'value' => $option['value']['color-palette']
				),
				array(
					'value' => $data['value']['color-palette'],
					'id_prefix' => 'fw-option-' . $id . '-tf-typography-option-',
					'name_prefix' => $data['name_prefix'] . '[' . $id . ']',
				)
			)
			?>
			<div class="fw-inner"><?php esc_html_e('Color', 'the-core'); ?></div>
		</div>
	<?php endif; ?>
</div>
