<?php

class N2SliderGenerator500pxConfiguration {

    private $data;

    /** @var N2SliderGeneratorPluginAbstract */
    protected $group;

    /**
     * @param N2SliderGeneratorPluginAbstract $group
     */
    public function __construct($group) {
        $this->group = $group;
        $this->data  = new N2Data(array(
            'consumer_key'    => '',
            'consumer_secret' => '',
            'user_token'      => '',
            'user_secret'     => ''
        ));

        $this->data->loadJSON(N2Base::getApplication('smartslider')->storage->get('500px'));

    }

    public function wellConfigured() {
        if (!$this->data->get('consumer_key') || !$this->data->get('consumer_secret') || !$this->data->get('user_token') || !$this->data->get('user_secret')) {
            return false;
        }
        $client       = $this->getApi();
        $responseCode = $client->request('GET', $client->url('users'));
        if ($responseCode == 200) {
            return true;
        }

        return false;
    }

    public function getApi($hasUser = true) {

        require_once(dirname(__FILE__) . "/api/tmhOAuth.php");
        $config = array(
            'consumer_key'    => $this->data->get('consumer_key'),
            'consumer_secret' => $this->data->get('consumer_secret')
        );
        if ($hasUser) {
            $config['token']  = $this->data->get('user_token');
            $config['secret'] = $this->data->get('user_secret');
        }

        return new NTmhOAuth500px($config);
    }

    public function getData() {
        return $this->data->toArray();
    }

    public function addData($data, $store = true) {
        $this->data->loadArray($data);
        if ($store) {
            N2Base::getApplication('smartslider')->storage->set('500px', null, json_encode($this->data->toArray()));
        }
    }

    public function render() {
        $this->group->loadElements();

        $form = new N2Form();
        $form->loadArray($this->getData());


        $settings = new N2Tab($form, 'facebook-generator', 'Facebook api');
        new N2ElementText($settings, 'consumer_key', 'Consumer key', '', array(
            'style' => 'width:400px;'
        ));
        new N2ElementText($settings, 'consumer_secret', 'Consumer secret', '', array(
            'style' => 'width:400px;'
        ));
        new N2Element500pxToken($settings, 'user_token', n2_('Token'), '', array(
            'style' => 'width:400px;'
        ));
        new N2ElementText($settings, 'user_secret', '', '', array(
            'rowClass' => 'n2-hidden'
        ));
        new N2ElementContainer($settings, 'callback', n2_('Callback url'));
        new N2ElementToken($settings);

        echo $form->render('generator');

        try {
            $client       = $this->getApi();
            $responseCode = $client->request('GET', $client->url('account/verify_credentials'));

            if ($responseCode != 200) {
                $response = json_decode($client->response['response'], true);
                if (!empty($response['errors'])) {
                    foreach ($response['errors'] AS $error) {
                        N2Message::error($error['message']);
                    }
                }
            }
        } catch (Exception $e) {
            N2Message::error($e->getMessage());
        }
    }

    public function startAuth() {
        if (session_id() == "") {
            session_start();
        }
        $this->addData(N2Request::getVar('generator'), false);

        $_SESSION['data'] = $this->getData();

        $client = $this->getApi(false);
        $code   = $client->request('POST', $client->url('oauth/request_token', ''), array(
            'oauth_callback' => N2Base::getApplication('smartslider')->router->createUrl(array(
                "generator/finishauth",
                array(
                    'group' => '500px'
                )
            ))
        ));
        if ($code == 200) {
            $oauth                    = $client->extract_params($client->response['response']);
            $_SESSION['t500px_oauth'] = $oauth;

            return $client->url("oauth/authorize", '') . "?oauth_token=" . $oauth['oauth_token'] . "&force_login=1";
        } else {

            throw new Exception($client->response['response']);

            return false;
        }
    }

    public function finishAuth() {
        if (session_id() == "") {
            session_start();
        }
        $this->addData($_SESSION['data'], false);
        unset($_SESSION['data']);
        try {
            $this->data->set('user_token', $_SESSION['t500px_oauth']['oauth_token']);
            $this->data->set('user_secret', $_SESSION['t500px_oauth']['oauth_token_secret']);
            $client = $this->getApi();
            $code   = $client->request('POST', $client->url('oauth/access_token', ''), array(
                'oauth_verifier' => $_REQUEST['oauth_verifier']
            ));

            if ($code == 200) {
                $access_token = $client->extract_params($client->response['response']);
                unset($_SESSION['data']);
                unset($_SESSION['t500px_oauth']);
                $this->data->set('user_token', $access_token['oauth_token']);
                $this->data->set('user_secret', $access_token['oauth_token_secret']);
                $this->addData($this->getData());

                return true;
            } else {
                return $client->response['response'];
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

}