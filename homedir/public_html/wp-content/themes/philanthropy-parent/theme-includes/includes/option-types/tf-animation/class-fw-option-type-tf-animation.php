<?php if (!defined('FW')) {
	die('Forbidden');
}

/**
 * Animation
 */
class FW_Option_Type_TF_Animation extends FW_Option_Type
{

	/**
	 * @internal
	 * {@inheritdoc}
	 */
	protected function _enqueue_static($id, $option, $data)
	{
        $uri = get_template_directory_uri() . '/theme-includes/includes/option-types/' . $this->get_type() . '/static';

		wp_enqueue_style(
			'fw-option-' . $this->get_type(),
            $uri . '/css/styles.css',
            array('fw-selectize'),
			fw()->manifest->get_version()
		);

        wp_enqueue_script('fw-selectize');

        wp_enqueue_script(
            'fw-option-' . $this->get_type(),
            $uri . '/js/scripts.js',
            array('jquery', 'underscore', 'fw', 'fw-selectize'),
            fw()->manifest->get_version()
        );

	}

	/**
	 * @internal
	 */
	protected function _render($id, $option, $data)
    {
		return the_core_render_view(get_template_directory() . '/theme-includes/includes/option-types/' . $this->get_type() . '/view.php', array(
			'id' => $id . $this->get_type(),
			'option' => $option,
			'data' => $data
		));
	}

	public function get_type()
	{
		return 'tf-animation';
	}

	/**
	 * @internal
	 */
	protected function _get_value_from_input($option, $input_value)
	{
		if (!is_array($input_value)) {
			return $option['value'];
		}

		$values = array(
			'animation' => (isset($input_value['animation']) && !empty($input_value['animation'])) ?  $input_value['animation'] : '',
			'delay' => (isset($input_value['delay']) && !empty($input_value['delay'])) ?  $input_value['delay'] : '',
		);


		return $values;
	}

	/**
	 * @internal
	 */
	protected function _get_defaults()
	{
        /**
            * These are default parameters that will be merged with option array.
		    * They makes possible that any option has
            * only one required parameter array('type' => 'new').
		 */

		return array(
            'value' => array(
                'animation' => '',
                'delay' => ''
            )
        );
	}

	public function _get_backend_width_type()
	{
		return 'auto';
	}
}

FW_Option_Type::register('FW_Option_Type_TF_Animation');
