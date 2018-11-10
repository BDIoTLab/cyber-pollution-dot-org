<?php if (!defined('FW')) die('Forbidden');

class _TF_Theme_Predefined_Templates {
	public function __construct() {
		if (!function_exists('fw_get_path_url')) {
			return;
		}

		add_action(
			'fw_ext_builder:option_type:builder:enqueue',
			array($this, '_action_enqueue')
		);
		add_action(
			'wp_ajax_tf-theme-predefined-templates-render',
			array($this, '_ajax_render')
		);
		add_action(
			'wp_ajax_tf-theme-predefined-templates-load',
			array($this, '_ajax_load')
		);
	}

	/**
	 * @return bool
	 */
	public function current_user_allowed() {
		return current_user_can('edit_posts');
	}

	/**
	 * Current dir url
	 * @param string
	 * @return string
	 */
	private function get_url($append = '') {
		try {
			$url = FW_Cache::get($cache_key = 'tf-theme:pred-tpl:url');
		} catch (FW_Cache_Not_Found_Exception $e) {
			FW_Cache::set(
				$cache_key,
				$url = fw_get_path_url(get_template_directory().'/theme-includes/includes/predefined-templates/')
			);
		}

		return $url . $append;
	}

	/**
	 * @param array $data
	 * @return void
	 * @internal
	 */
	public function _action_enqueue($data) {
		if ($data['option']['type'] !== 'page-builder') {
			return;
		}

		$list = $this->get_list();

		if (empty($list['sections'])) {
			return;
		}

		$prefix = 'tf-theme-';
		$url = $this->get_url();

		wp_enqueue_style(
			$prefix .'pb-pred-tpl',
			$url .'/static/styles.css',
			array(),
			fw()->theme->manifest->get_version()
		);

		wp_enqueue_script(
			$prefix .'pb-pred-tpl',
			$url .'/static/scripts.js',
			array('jquery', 'fw-events'),
			fw()->theme->manifest->get_version(),
			true
		);

		wp_localize_script(
			$prefix .'pb-pred-tpl',
			'_theme_pb_pred_tpl',
			array(
				'l10n' => array(
					'add_button' => __('Add Premade Sections', 'the-core'),
				),
			)
		);
	}

	public function _ajax_render() {
		$r = array(
			'error' => '',
			'data' => array(),
		);

		do {
			if (!$this->current_user_allowed()) {
				$r['error'] = 'Forbidden';
				break;
			}

			$list = $this->get_list();
			$r['data']['html'] = fw_render_view(
				get_template_directory() .'/theme-includes/includes/predefined-templates/views/sections.php',
				array(
					'sections' => $list['sections'],
					'sections_categories' => $list['sections_categories'],
				)
			);
		} while(false);

		if ($r['error']) {
			wp_send_json_error(
				is_wp_error($r['error'])
					? $r['error']
					: new WP_Error('error', $r['error'])
			);
		} else {
			wp_send_json_success($r['data']);
		}
	}

	public function _ajax_load() {
		$r = array(
			'error' => '',
			'data' => array(),
		);

		do {
			if (!$this->current_user_allowed()) {
				$r['error'] = 'Forbidden';
				break;
			}

			if (empty($_POST['id'])) {
				$r['error'] = 'Id not specified';
				break;
			}

			$id = $_POST['id'];

			$list = $this->get_list();

			if (!isset($list['sections'][ $id ])) {
				$r['error'] = 'Invalid id';
				break;
			}

			$r['data']['json'] = fw_render_view(get_template_directory().'/theme-includes/includes/predefined-templates/sections/'. $id .'/json.php');
		} while(false);

		if ($r['error']) {
			wp_send_json_error(
				is_wp_error($r['error'])
					? $r['error']
					: new WP_Error('error', $r['error'])
			);
		} else {
			wp_send_json_success($r['data']);
		}
	}

	private function get_list() {
		$r = array(
			'sections_categories' => array(),
			'sections' => array(),
		);

		if ($paths = glob(get_template_directory().'/theme-includes/includes/predefined-templates' . ($rel_path = '/sections') .'/*', GLOB_ONLYDIR)) {
			foreach ($paths as $path) {
				$id = basename($path);

				$cfg = array_merge(
					array(
						'desc' => '',
						'categories' => array(),
					),
					include_once $path .'/config.php'
				);

				$r['sections'][$id] = array(
					'thumbnail' => $this->get_url($rel_path .'/'. $id .'/thumbnail.jpg'),
					'desc' => $cfg['desc'],
					'categories' => $cfg['categories'],
				);

				$r['sections_categories'] = array_merge($r['sections_categories'], $cfg['categories']);
			}
		}

		return $r;
	}
}