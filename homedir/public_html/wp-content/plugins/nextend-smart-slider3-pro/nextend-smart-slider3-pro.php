<?php
/*
Plugin Name: Smart Slider 3 Pro
Plugin URI: https://smartslider3.com/
Description: The perfect all-in-one responsive slider solution for WordPress.
Version: 3.3.3
Author: Nextend
Author URI: http://nextendweb.com
License: GPLv3 or later
License URI: http://www.gnu.org/licenses/gpl-3.0.html
 */

if (!class_exists('SmartSlider3', true)) {

    add_action('plugins_loaded', 'smart_slider_3_pro_plugins_loaded', 20);

    function smart_slider_3_pro_plugins_loaded() {

        //Do not load the free version when pro is available
        remove_action('plugins_loaded', 'smart_slider_3_plugins_loaded', 30);

        define('N2PRO', 1);
        define('N2SSPRO', 1);

        define('NEXTEND_SMARTSLIDER_3__FILE__', __FILE__);
        define('NEXTEND_SMARTSLIDER_3', dirname(__FILE__) . DIRECTORY_SEPARATOR);
        define('NEXTEND_SMARTSLIDER_3_URL_PATH', 'nextend-smart-slider3-pro');
        define('NEXTEND_SMARTSLIDER_3_BASENAME', plugin_basename(__FILE__));

        require_once dirname(NEXTEND_SMARTSLIDER_3__FILE__) . DIRECTORY_SEPARATOR . 'includes/smartslider3.php';
    }
}