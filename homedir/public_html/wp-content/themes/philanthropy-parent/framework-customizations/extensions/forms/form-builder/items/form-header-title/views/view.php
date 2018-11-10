<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * @var string $title
 * @var string $subtitle
 */

if ( empty( $title ) ) {
	return;
}
?>
<div class="header title">
	<h2 class="fw-contact-form-title"><?php echo ($title); ?></h2>
	<?php if ( ! empty( $subtitle ) ) : ?>
		<span class="fw-contact-form-description"><?php echo ($subtitle); ?></span>
	<?php endif ?>
</div>