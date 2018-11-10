<?php if (!defined('FW')) die('Forbidden');
/**
 * @var array $sections
 * @var array $sections_categories
 */

$prefix = 'tf-theme-';
?>
<?php if ($sections_categories): ?>
	<div class="<?php echo esc_attr($prefix); ?>pred-tpl-cat">
		<label for="<?php echo esc_attr($select_id = $prefix . fw_rand_md5()) ?>"><?php
			esc_html_e('Filter by Category', 'the-core') ?>:</label>
		<select id="<?php echo esc_attr($select_id) ?>" class="<?php echo esc_attr($prefix); ?>pred-tpl-cat-select">
			<option value=""><?php esc_html_e('All Categories', 'the-core') ?></option>
			<?php foreach ($sections_categories as $cat_id => $cat_title): ?>
				<option value="<?php echo esc_attr($cat_id) ?>"><?php echo esc_html($cat_title) ?></option>
			<?php endforeach; ?>
		</select>
	</div>
<?php endif; ?>
<?php if ($sections): ?>
	<div class="fw-row-spaced <?php echo esc_attr($prefix); ?>pred-tpl-thumb-list">
		<?php foreach ($sections as $section_id => $section): ?>
			<div class="fw-col-sm-4 fw-col-sm-15 <?php echo esc_attr($prefix); ?>pred-tpl-thumb"
				data-categs="<?php echo fw_htmlspecialchars(json_encode(array_fill_keys(array_keys($section['categories']), true))) ?>"
				data-id="<?php echo esc_attr($section_id) ?>" >
				<img src="<?php echo esc_attr($section['thumbnail']) ?>"
				     alt="<?php echo esc_attr($section['desc']) ?>"
				     title="<?php echo esc_attr($section['desc']) ?>" />
			</div>
		<?php endforeach; ?>
	</div>
<?php endif; ?>
