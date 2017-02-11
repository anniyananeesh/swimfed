<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Compose extends Club_Controller {

    protected $viewFolder;
    protected $className;

    protected $fileUpPath = ATTACHMENTS_UP_PATH;
    protected $fileShowPath = ATTACHMENTS_SHOW_PATH;

    public function __construct() {

        parent::__construct();
        $this->viewFolder = CLUB_VIEWS . '/messages';
        $this->data['menuActive'] = 'compose';
        $this->data['ctrlUrl'] = HOST_URL . "/" . CLUB_URL . "/Compose";

        $this->load->model(CLUB_VIEWS . '/model_messages', 'modelNameAlias');
        $this->className = 'Compose';

    }

    public function index() {

        $this->data['content'] = $this->viewFolder . '/compose';

        $post['subject'] = '';
        $post['message'] = '';

        $this->data['post'] = $post;

        $error = false;
        $fileName = NULL;
        $uploadstatus = '';
        $attachmentsUrl = array();

        if($this->input->post()) {

            $this->data['post'] = $this->input->post();

            $this->load->library('form_validation');

            $this->form_validation->set_rules('subject', 'Subject', 'trim|required|xss_clean');
            $this->form_validation->set_rules('message', 'Email message body', 'trim|required|xss_clean');

            $this->form_validation->set_error_delimiters('', '');

            $file_name        = $_FILES["userfile"]["name"];
            $file_tmp_name    = $_FILES["userfile"]["tmp_name"];

            if(count($file_name) > 2) {

                $this->data['FileError'] = 'Y';
                $this->data['FileMSG'] = 'You can upload maximum 2 files only';
                $error = true;
            }

            if($this->form_validation->run() == TRUE && !$error) {

                  for ($i = 0; $i < count($file_name); $i++) {

                      if ($_FILES['userfile']['tmp_name'][$i] != "") {

                          $Image1Name = substr(md5(uniqid(rand())), 0, 15);
                          $Image1Name = "IMG-" . $Image1Name . strrchr($file_name[$i], ".");

                          $config                = array();
                          $config['upload_path'] = ATTACHMENTS_UP_PATH;

                          if (move_uploaded_file($_FILES['userfile']['tmp_name'][$i], ATTACHMENTS_UP_PATH . '/' . $Image1Name)) {
                              array_push($attachmentsUrl, $Image1Name);
                          }

                      }

                  }

                  if($uploadstatus != "Error") {

                        $data_array = array(
                            'from_fk' => $this->mencrypt->decode($this->data['user']['user_id']),
                            'to_fk' => 0,
                            'message' => $this->input->post('message'),
                            'label' => 'Inbox',
                            'attachment_url' => serialize($attachmentsUrl),
                            'created_on' => date('Y-m-d h:i:s a')
                        );

                        $this->modelNameAlias->save($data_array);
                        $this->session->set_flashdata('success_message', 'Message has been send to administrator');
                        redirect($this->data['ctrlUrl']);

                  }

            }

        }

        $this->load->view($this->layout, $this->data);

    }

}
