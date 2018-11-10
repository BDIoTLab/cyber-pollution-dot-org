<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

/**
 * @var WP_Post $item
 * @var string $title
 * @var array $attributes
 * @var object $args
 * @var int $depth
 * @var FW_Extension_Megamenu $megamenu
 */

$megamenu = fw()->extensions->get( 'megamenu' );

$icon_class = '';
if ( $megamenu->show_icon() ) {
	if ( $icon = fw_mega_menu_get_meta( $item, 'icon' ) ) {
		$class = isset( $attributes['class'] ) ? $attributes['class'] : '';
		$icon_class = '<i class="' . trim( $class . " $icon" ) . '"></i>';
	}
}

// Make a menu WordPress way
echo ($args->before);
echo '<a ' . fw_attr_to_html( $attributes ) . '>' . $icon_class . $title . '</a>';
echo ($args->after);