<?php if (!defined('FW')) {
	die('Forbidden');
}

/**
 * Typography
 */
class FW_Option_Type_TF_Typography extends FW_Option_Type
{
	/*
	 * Allowed fonts
	 */
	private $fonts;

	/**
	 * Returns fonts
	 * @return array
	 */
	public function get_fonts()
	{
		if($this->fonts === null) {
			$this->fonts = array(
				'standard' => apply_filters('fw_option_type_tf_typography_standard_fonts', array(
					"Arial",
					"Verdana",
					"Trebuchet",
					"Georgia",
					"Times New Roman",
					"Tahoma",
					"Palatino",
					"Helvetica",
					"Lucida",
					"Impact",
				)),
				'google' => fw_get_google_fonts_v2()
			);
		}

		return $this->fonts;
	}

	/**
	 * @internal
	 * {@inheritdoc}
	 */
	protected function _enqueue_static($id, $option, $data)
	{
		$static_uri = get_template_directory_uri() .'/theme-includes/includes/option-types/'. $this->get_type() .'/static/';
		wp_enqueue_style(
			'fw-option-' . $this->get_type(),
			$static_uri . 'css/styles.css',
			array('fw-selectize'),
			fw()->manifest->get_version()
		);

		fw()->backend->option_type('color-palette')->enqueue_static();

		wp_enqueue_script(
			'fw-option-' . $this->get_type(),
			$static_uri . 'js/scripts.js',
			array('jquery', 'underscore', 'fw', 'fw-selectize'),
			fw()->manifest->get_version()
		);

		$fw_tf_typography_fonts = $this->get_fonts();
		wp_localize_script('fw-option-' . $this->get_type(), 'fw_tf_typography_fonts', $fw_tf_typography_fonts);
	}

	/**
	 * @internal
	 */
	protected function _render($id, $option, $data)
	{
		return the_core_render_view( get_template_directory() .'/theme-includes/includes/option-types/'. $this->get_type() .'/view.php', array(
			'tf_typography'  => $this,
			'id' => $id,
			'option' => $option,
			'data' => $data,
			'fonts' => $this->get_fonts(),
			'defaults'  => $this->get_defaults()
		));
	}

	public function get_type()
	{
		return 'tf-typography';
	}

	/**
	 * @internal
	 */
	protected function _get_value_from_input($option, $input_value)
	{
		$default = $this->get_defaults();
		$values  = array_merge( $default['value'], $option['value'], is_array($input_value) ? $input_value : array() );

		// for default value as string instead array
		if( empty($values['color-palette']) ) {
			$values['color-palette'] = $default['value']['color-palette'];
		}

		if(is_null($input_value)) {
			return $values;
		}

		$val = isset($option['value']['color-palette']) ? $option['value']['color-palette'] : $default['value']['color-palette'];

		$values['color-palette'] = fw()->backend->option_type('color-palette')->_get_value_from_input(array(
			'value' => (isset($option['value']['color-palette'])) ? $option['value']['color-palette'] : $default['value']['color-palette']
		), (isset($input_value['color-palette'])) ? $input_value['color-palette'] :  $val);

		$components = array_merge( $default['components'], $option['components'] );
		foreach ( $components as $component => $enabled ) {
			if ( ! $enabled ) {
				$values[ $component ] = false;
			}
		}

		if ( $values['family'] === false ) {
			$values = array_merge( $values, array(
				'google_font' => false,
				'style'       => false,
				'weight'      => false,
				'subset'      => false,
				'variation'   => false
			) );
		} elseif ( $this->get_google_font( $values['family'] ) ) {
			$values = array_merge( $values, array(
				'google_font' => true,
				'style'       => false,
				'weight'      => false
			) );
		} else {
			$values = array_merge( $values, array(
				'google_font' => false,
				'subset'      => false,
				'variation'   => false

			) );
		}
		//$values['is_saved'] = ($values['is_saved'] === false && is_null($input_value) ) ? false : true;
		$values['is_saved'] = ($values['is_saved'] === true || !is_null($input_value) ) ? true : false;


		return $values;

	}

	/**
	 * @internal
	 */
	protected function _get_defaults()
	{
		return array(
			'value' => array(
				'google_font' => false,
				'subset'    => false,
				'variation'    => false,
				'family'   => 'Arial',
				'style' => 'normal',
				'weight'  => '400',
				'size'    => 12,
				'line-height'   => 15,
				'letter-spacing' => -1,
				'color-palette'  => array(
					'id'    => 'fw-custom',
					'color' => '',
				),
				'is_saved' => false,
			),
			'components' => array(
				'family'         => true,
				'size'           => true,
				'line-height'    => true,
				'letter-spacing' => true,
				'color-palette'  => true
			)
		);
	}

	public function _get_backend_width_type()
	{
		return 'full';
	}

	public function get_google_font($font){
		$google_fonts = fw_get_google_fonts_v2();
		$google_fonts = (false === $google_fonts) ? array() : json_decode($google_fonts);
		foreach($google_fonts->items as $g_font){
			if($font === $g_font->family){
				return $g_font;
			}
		}
		return false;
	}

}

FW_Option_Type::register('FW_Option_Type_TF_Typography');
