<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * @var string $form_html
 */

$responsive    = fw_ext_contact_forms_get_option( $form_id, 'responsive' );
$redirect_page = fw_ext_contact_forms_get_option( $form_id, 'redirect_page' );
$class         = '';

// for desktop
if( isset($responsive['desktop_display']['selected']) && $responsive['desktop_display']['selected'] == 'no' ) {
    $class .= ' fw-desktop-hide-element';
}

// for tablet landscape
if( isset($responsive['tablet_landscape_display']['selected']) && $responsive['tablet_landscape_display']['selected'] == 'no' ) {
    $class .= ' fw-tablet-landscape-hide-element';
}

// for tablet portrait
if( isset($responsive['tablet_display']['selected']) && $responsive['tablet_display']['selected'] == 'no' ) {
	$class .= ' fw-tablet-hide-element';
}

// for display on smartphone
if( isset($responsive['smartphone_display']['selected']) && $responsive['smartphone_display']['selected'] == 'no' ) {
	$class .= ' fw-mobile-hide-element';
}
?>
<div class="fw-contact-form tf-sh-<?php echo esc_attr($form_id); ?> <?php echo esc_attr($class); ?>" data-redirect-page="<?php echo esc_url($redirect_page); ?>">
	<div class="fw-row wrap-forms wrap-contact-forms">
		<?php echo $form_html; ?>
	</div>
</div>