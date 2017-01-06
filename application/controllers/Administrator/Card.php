<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Card extends MY_Controller {

    protected $viewFolder;
    protected $className;

    protected $imageUpPath = CARD_UP_PATH;
    protected $imageShowPath = CARD_SHOW_PATH;

    public function __construct() {

        parent::__construct();
        $this->viewFolder = ADMIN_VIEWS . '/card';
        $this->data['menuActive'] = 'card';
        $this->data['ctrlUrl'] = HOST_URL . "/" . ADMIN_URL . "/Card";
        $this->load->model( ADMIN_VIEWS . '/model_clubs', 'modelNameAlias');

        $this->className = 'Card';

    }

    public function create() {

        $this->data['content'] = $this->viewFolder . '/create';

        $post['first_name'] = '';
        $post['last_name'] = '';
        $post['father_name'] = '';
        $post['email'] = '';
        $post['code'] = '';
        $post['dob'] = '';
        $post['club_name'] = '';
        $post['type'] = '';

        $this->data['post'] = $post;
        $this->data['card_image'] = NULL;
        $this->data['imageShowPath'] = $this->imageShowPath;

        $error = false;
        $fileName = NULL;
        $uploadstatus = '';

        if($this->input->post()) {

            $this->data['post'] = $this->input->post();

            $this->load->library('form_validation');

            $this->form_validation->set_rules('first_name', 'First name', 'trim|required|xss_clean');
            $this->form_validation->set_rules('last_name', 'Last name', 'trim|required|xss_clean');
            $this->form_validation->set_rules('father_name', 'Father name', 'trim|required|xss_clean');
            $this->form_validation->set_rules('email', 'Email address', 'trim|valid_email|required|xss_clean');
            $this->form_validation->set_rules('code', 'Member code', 'trim|required|xss_clean');
            $this->form_validation->set_rules('dob', 'Date of birth', 'trim|required|xss_clean');
            $this->form_validation->set_rules('club_name', 'Club name', 'trim|required|xss_clean');
            $this->form_validation->set_rules('type', 'Member type', 'trim|required|xss_clean');

            $image_name        = $_FILES["userfile"]["name"];
            $image_tmp_name    = $_FILES["userfile"]["tmp_name"];

            if(empty($image_name)) {

                $this->data['Error'] = 'Y';
                $this->data['MSG'] = 'Upload an image for the ID Card';
                $error = true;
            }

            $this->form_validation->set_error_delimiters('', '');

            if($this->form_validation->run() == TRUE && !$error) {

                  if (!empty($image_name))
                  {
                      $fileAttrs = array(
                          'imgPath' => $this->imageUpPath,
                          'maxSize' => '800',
                          'maxWidth' => '320',
                          'maxHeight' => '320',
                          'createThumb' => false
                      );

                      $upload_array   =  $this->upload_image('userfile', $image_name, NULL, $fileAttrs);
                      $ImageName     =   (isset($upload_array["ImageName"])) ? $upload_array["ImageName"] : '';
                      $this->data["MSG"]    =   (isset($upload_array["msg"])) ? $upload_array["msg"] : '';
                      $this->data["Error"]  =   (isset($upload_array["err"])) ? $upload_array["err"] : '';
                      $uploadstatus   =   (isset($upload_array["ups"])) ? $upload_array["ups"] : '';
                  }

                  if($uploadstatus != "Error") {

                      include_once(APPPATH . "/libraries/Image.php");

                      $image = new Image(false, CARD_UP_PATH);
                      $this->data['card_image'] = $image->drawIDCard( $this->input->post(), $ImageName);
 
                      $this->data['Error'] = 'N';
                      $this->data['MSG'] = 'Successfully generated the id card';
                  }

            }

        }

        $this->load->view($this->layout, $this->data);

    }

}
