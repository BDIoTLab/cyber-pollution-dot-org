<?php
N2Loader::import('libraries.settings.settings', 'smartslider');

class N2SSPluginGenerator500px extends N2SliderGeneratorPluginAbstract {

    protected $name = '500px';

    protected $needConfiguration = true;

    public function getLabel() {
        return '500px';
    }

    protected function loadSources() {
        new N2Generator500pxCollection($this, 'collection', 'Collection');
    }

    public function getPath() {
        return dirname(__FILE__) . DIRECTORY_SEPARATOR;
    }

    protected function initConfiguration() {
        static $loaded = false;
        if (!$loaded) {
            require_once dirname(__FILE__) . '/configuration.php';
            $this->configuration = new N2SliderGenerator500pxConfiguration($this);

            $loaded = true;
        }
    }
}

N2SSGeneratorFactory::addGenerator(new N2SSPluginGenerator500px);
