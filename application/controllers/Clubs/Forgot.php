<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forgot extends CI_Controller
{

    protected $layout;
    protected $data;

    public function __construct() {

       parent::__construct();

       $this->data = array();
       $this->layout = CLUB_VIEWS . "/forgot";
       $this->load->model(CLUB_VIEWS . "/model_users", "modelUserAlias");
       $this->load->model(CLUB_VIEWS . "/model_messages", "modelMessageAlias");
    }

    public function index() {

        $post['username'] = '';

        $this->data['post'] = $post;

        if($this->input->post()) {

            $this->data['post'] = $this->input->post();

            $authResult = $this->modelUserAlias->resetUsrPassword($this->input->post('username'));

            if($authResult['code'] == 200) {

                $urlClickForgotPassword = HOST_URL . '/' . ADMIN_URL . '/Clubs/settings/' . $this->mencrypt->encode($authResult['data']['id']);
                $urlClickForgotPassword = "'" . $urlClickForgotPassword . "'";

                $data_array = array(
                    'from_fk' => $authResult['data']['id'],
                    'to_fk' => 0,
                    'message' => $authResult['data']['code'] . ' ' . $authResult['data']['name'] . ': Please reset my account password &nbsp;&nbsp;&nbsp;<button target="_blank" onclick="window.location.href=' . $urlClickForgotPassword . '">Reset club password</button>',
                    'label' => 'Inbox',
                    'attachment_url' => NULL,
                    'created_on' => date('Y-m-d h:i:s a')
                );

                $this->modelMessageAlias->save($data_array);

                $this->data['Error'] = "N";
                $this->data['MSG'] = 'Your password reset request has been send to administrator';

            } else {

                $this->data['Error'] = "Y";
                $this->data['MSG'] = $authResult['message'];

            }

        }

        $this->load->view($this->layout, $this->data);
    }

}
