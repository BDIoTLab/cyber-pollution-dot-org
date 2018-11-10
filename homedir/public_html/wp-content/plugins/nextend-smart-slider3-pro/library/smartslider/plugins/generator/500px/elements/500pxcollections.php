<?php

N2Loader::import('libraries.form.elements.list');

class N2Element500pxCollections extends N2ElementList {

    /**
     * @var NTmhOAuth500px
     */
    protected $api;

    public function __construct($parent, $name = '', $label = '', $default = '', $parameters = array()) {
        parent::__construct($parent, $name, $label, $default, $parameters);

        $responseCode = $this->api->request('GET', $this->api->url('collections'));
        if ($responseCode == 200) {
            $r           = json_decode($this->api->response['response'], true);
            $collections = $r['collections'];

            if (count($collections)) {
                foreach ($collections AS $collection) {
                    $this->options[$collection['id']] = $collection['title'];
                }
                if ($this->getValue() == '') {
                    $this->setValue($collections[0]['id']);
                }
            }
        }
    }

    public function setApi($api) {
        $this->api = $api;
    }
}
