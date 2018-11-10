<?php

N2Loader::import('libraries.slider.generator.abstract', 'smartslider');

class N2Generator500pxCollection extends N2GeneratorAbstract {

    protected $layout = 'image_extended';

    public function renderFields($form) {
        parent::renderFields($form);

        $filter = new N2Tab($form, 'filter', n2_('Filter'));

        new N2Element500pxCollections($filter, 'collection', n2_x('Collection', "500px"), '', array(
            'api' => $this->group->getConfiguration()
                                 ->getApi()
        ));
    }

    protected function _getData($count, $startIndex) {
        $data = array();
        $api  = $this->group->getConfiguration()
                            ->getApi();

        $collectionID = $this->data->get('collection');
        $responseCode = $api->request('GET', $api->url('collections/' . $collectionID), array(
            'image_size' => array(
                1,
                2,
                3,
                4,
                5,
                6
            )
        ));
        if ($responseCode == 200) {
            $r      = json_decode($api->response['response'], true);
            $photos = $r['photos'];

            $photos = array_slice($photos, $startIndex, $count);

            foreach ($photos AS $photo) {
                $p      = array(
                    'image'       => $photo['images'][3]['url'],
                    'thumbnail'   => $photo['images'][2]['url'],
                    'image5'      => $photo['images'][5]['url'],
                    'image6'      => $photo['images'][6]['url'],
                    'title'       => $photo['name'],
                    'description' => $photo['description'],
                    'url'         => 'https://500px.com' . $photo['url'],
                    'url_label'   => n2_('View')
                );
                $data[] = $p;
            }
        }

        return $data;
    }
}