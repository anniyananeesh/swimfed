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
    }

    public function index() {

        $post['username'] = '';

        $this->data['post'] = $post;

        if($this->input->post()) {

            $this->data['post'] = $this->input->post();

            $authResult = $this->modelUserAlias->resetUsrPassword($this->input->post('username'));

            if($authResult['code'] == 200) {

              $this->data['Error'] = "N";
              $this->data['MSG'] = 'Your password has been reset and send to your email';

            } else {

                $this->data['Error'] = "Y";
                $this->data['MSG'] = $authResult['message'];

            }

        }

        $this->load->view($this->layout, $this->data);
    }

}
