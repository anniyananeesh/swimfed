<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Info extends Club_Controller {

    protected $viewFolder;
    protected $className;

    protected $imageUpPath = CLUBS_UP_PATH;
    protected $imageShowPath = CLUBS_SHOW_PATH;

    public function __construct() {

        parent::__construct();
        $this->viewFolder = CLUB_VIEWS . '/info';
        $this->data['menuActive'] = 'info';
        $this->data['ctrlUrl'] = HOST_URL . "/" . CLUB_URL . "/Info";
        $this->className = 'Info';

        $this->load->model(CLUB_VIEWS . '/model_users', 'modelNameAlias');
    }

    public function index() {

        $this->data['content'] = CLUB_VIEWS . '/info';
        $this->data['menuActive'] = 'info';
        $this->data['imageShowPath'] = $this->imageShowPath;
        $this->data['imageUpPath'] = $this->imageUpPath;

        $this->data['record'] = $this->modelNameAlias->fetchById($this->mencrypt->decode($this->data['user']['user_id']));

        $post['name'] = $this->data['record']->name;
        $post['address'] = $this->data['record']->address;
        $post['pincode'] = $this->data['record']->pincode;
        $post['emirate'] = $this->data['record']->emirate;
        $post['url'] = $this->data['record']->url;
        $post['email'] = $this->data['record']->email;
        $post['contact_person'] = $this->data['record']->contact_person;
        $post['contact_no'] = $this->data['record']->contact_no;
        $post['fax_no'] = $this->data['record']->fax_no;

        $this->data['post'] = $post;

        $error = false;
        $fileName = NULL;
        $uploadstatus = '';

        if($this->input->post()) {

              $this->data['post'] = $this->input->post();

              $this->load->library('form_validation');

              $this->form_validation->set_rules('name', 'Name', 'trim|required|xss_clean');
              $this->form_validation->set_rules('address', 'Address', 'trim|required|xss_clean');
              $this->form_validation->set_rules('pincode', 'Pincode', 'trim|required|xss_clean');
              $this->form_validation->set_rules('emirate', 'Emirate', 'trim|required|xss_clean');
              $this->form_validation->set_rules('url', 'URL', 'trim|required|xss_clean');
              $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|xss_clean');
              $this->form_validation->set_rules('contact_person', 'Contact person', 'trim|required|xss_clean');
              $this->form_validation->set_rules('contact_no', 'Contact no.', 'trim|required|xss_clean');
              $this->form_validation->set_rules('fax_no', 'Fax no.', 'trim|required|xss_clean');

              $this->form_validation->set_error_delimiters('', '');

              if($this->form_validation->run() == TRUE && !$error) {

                    $image_name        = $_FILES["userfile"]["name"];
                    $image_tmp_name    = $_FILES["userfile"]["tmp_name"];

                    if (!empty($image_name)) {

                        $fileAttrs = array(
                            'imgPath' => $this->imageUpPath,
                            'maxSize' => '800',
                            'maxWidth' => '640',
                            'maxHeight' => '640',
                            'createThumb' => false
                        );

                        $upload_array   =  $this->upload_image('userfile', $image_name, NULL, $fileAttrs);
                        $ImageName     =   (isset($upload_array["ImageName"])) ? $upload_array["ImageName"] : '';
                        $this->data["MSG"]    =   (isset($upload_array["msg"])) ? $upload_array["msg"] : '';
                        $this->data["Error"]  =   (isset($upload_array["err"])) ? $upload_array["err"] : '';
                        $uploadstatus   =   (isset($upload_array["ups"])) ? $upload_array["ups"] : '';
                    }

                    if($uploadstatus != "Error") {

                        $data_array = array(
                            'name' => $this->input->post('name', TRUE),
                            'address' => $this->input->post('address', TRUE),
                            'pincode' => $this->input->post('pincode', TRUE),
                            'emirate' => $this->input->post('emirate', TRUE),
                            'url' => $this->input->post('url', TRUE),
                            'image1' => (!empty($image_name)) ? $ImageName : NULL,
                            'email' => $this->input->post('email', TRUE),
                            'contact_person' => $this->input->post('contact_person', TRUE),
                            'contact_no' => $this->input->post('contact_no', TRUE),
                            'fax_no' => $this->input->post('fax_no', TRUE),
                            'updated_on' => date('Y-m-d h:i:s a')
                        );

                        $where = array(
                            'id' => $this->mencrypt->decode($this->data['user']['user_id'])
                        );

                        $this->modelNameAlias->save($data_array, $where);

                        $this->addLog($this->data['record']->name . ' : Club details has been updated by club admin');

                        $this->session->set_flashdata('success_message', 'Club details has been updated');
                        redirect($this->data['ctrlUrl']);

                    }

              }

        }

        $this->load->view($this->layout, $this->data);
    }

}
