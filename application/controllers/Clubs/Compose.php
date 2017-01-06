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

        if($this->input->post()) {

            $this->data['post'] = $this->input->post();

            $this->load->library('form_validation');

            $this->form_validation->set_rules('subject', 'Subject', 'trim|required|xss_clean');
            $this->form_validation->set_rules('message', 'Email message body', 'trim|required|xss_clean');

            $this->form_validation->set_error_delimiters('', '');

            if($this->form_validation->run() == TRUE && !$error) {

                  $file_name        = $_FILES["userfile"]["name"];
                  $file_tmp_name    = $_FILES["userfile"]["tmp_name"];

                  if (!empty($file_name)) {

                      $upload_array  = $this->upload_file('userfile', $file_name, "", null);
                      $fileName        = $upload_array["FileName"];
                      $this->data["MSG"]   = $upload_array["msg"];
                      $this->data["Error"] = $upload_array["err"];
                      $uploadstatus  = $upload_array["ups"];
                  }

                  if($uploadstatus != "Error") {

                        $data_array = array(
                            'from_fk' => $this->mencrypt->decode($this->data['user']['user_id']),
                            'to_fk' => 0,
                            'message' => $this->input->post('message'),
                            'label' => 'Inbox',
                            'attachment_url' => ($uploadstatus != "Error" && !empty($file_name)) ? mysql_real_escape_string($fileName) : NULL,
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
