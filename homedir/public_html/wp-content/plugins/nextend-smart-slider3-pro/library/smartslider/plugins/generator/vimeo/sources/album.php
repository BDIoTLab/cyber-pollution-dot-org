<?php

N2Loader::import('libraries.slider.generator.abstract', 'smartslider');

class N2GeneratorVimeoAlbum extends N2GeneratorAbstract {

    protected $layout = 'vimeo';

    public function renderFields($form) {
        parent::renderFields($form);

        $filter = new N2Tab($form, 'filter', n2_('Filter'));

        new N2ElementVimeoAlbums($filter, 'album', 'Album', '', array(
            'api' => $this->group->getConfiguration()
                                 ->getApi()
        ));
    }

    protected function _getData($count, $startIndex) {
        $data = array();
        /** @var \Vimeo\Vimeo $api */
        $api = $this->group->getConfiguration()
                              ->getApi();

        $album = $this->data->get('album', '');
        if (!empty($album)) {
            $response = $api->request($album . '/videos', array(
                'per_page' => $startIndex + $count
            ));

            if ($response['status'] == 200) {
                $videos = array_slice($response['body']['data'], $startIndex, $count);

                foreach ($videos AS $video) {
                    $record = array();

                    $record['title']       = $video['name'];
                    $record['description'] = $video['description'];
                    $record['id']          = str_replace('/videos/', '', $video['uri']);
                    $record['url']         = 'https://vimeo.com/' . $record['id'];
                    $record['link']        = $video['link'];

                    foreach ($video['pictures']['sizes'] AS $picture) {
                        $record['image' . $picture['width'] . 'x' . $picture['height']]     = $picture['link'];
                        $record['imageplay' . $picture['width'] . 'x' . $picture['height']] = $picture['link_with_play_button'];
                    }

                    $data[] = &$record;
                    unset($record);
                }
            }
        }

        return $data;
    }
}