<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

/**
 * TF_Option_Picker
 */
class FW_Container_Type_TF_Option_Picker extends FW_Container_Type {
	public function get_type() {
		return 'tf-option-picker';
	}

	public function _enqueue_static( $id, $option, $values, $data ) {
		$static_url = get_template_directory_uri() . '/theme-includes/includes/container-types/'
		              . $this->get_type() .
		              '/static';
		wp_enqueue_style( 'fw-container-type-fw-option-picker-css', $static_url . '/css/style.css' );
		wp_enqueue_script(
			'fw-container-type-fw-option-picker-js',
			$static_url . '/js/script.js',
			array( 'jquery', 'fw-events', 'fw' ),
			fw()->theme->manifest->get_version()
		);
	}

	public function _get_defaults() {
		return array(
			'picker'  => '',
			'choices' => array(),
			'options' => array(),
		);
	}

	public function _render( $containers, $values, $data ) {
		return implode(
			'',
			array_map( array( $this, 'render_item' ), $containers, array( $values ), array( $data ) )
		);
	}

	public function render_item( $container, $values, $data ) {
		$picker_id = $this->get_picker_id( $container );
		$picker    = $this->get_picker( $container );
		$options   = $this->exclude(
			$picker_id,
			fw_akg( 'options', $container, array() )
		);

		$current = fw_akg( $picker_id, fw_get_options_values_from_input( array( $picker_id => $picker ), $values ) );
		fw_aks( 'attr/data-value', $current, $picker );

		return the_core_render_view(
			get_template_directory() . '/theme-includes/includes/container-types/' . $this->get_type() . '/view.php',
			array(
				'picker_id' => $picker_id,
				'picker'    => $picker,
				'options'   => $options,
				'values'    => $values,
				'data'      => $data,
				'attr'      => fw_akg( 'attr', $container )
			)
		);
	}

	protected function get_picker_id( $container ) {
		return fw_akg( 'picker', $container );
	}

	protected function get_picker( $container ) {
		$id = $this->get_picker_id( $container );

		$picker = empty( $id ) ? null : fw_akg( "options/$id", $container );

		if ( empty( $picker ) ) {
			return null;
		}

		fw_aks( 'attr/data-type', 'picker', $picker );

		return $picker;
	}

	protected function exclude( $id, $options ) {
		fw_aku( $id, $options );

		return $options;
	}
}

FW_Container_Type::register( 'FW_Container_Type_TF_Option_Picker' );
