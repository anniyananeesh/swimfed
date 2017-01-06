<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Compose extends MY_Controller {

    protected $viewFolder;
    protected $className;

    protected $fileUpPath = ATTACHMENTS_UP_PATH;
    protected $fileShowPath = ATTACHMENTS_SHOW_PATH;

    public function __construct() {

        parent::__construct();
        $this->viewFolder = ADMIN_VIEWS . '/messages';
        $this->data['menuActive'] = 'compose';
        $this->data['ctrlUrl'] = HOST_URL . "/" . ADMIN_URL . "/Compose";

        $this->load->model(ADMIN_VIEWS . '/model_messages', 'modelNameAlias');
        $this->load->model(ADMIN_VIEWS . '/model_clubs', 'modelClubAlias');
        $this->className = 'Compose';

    }

    public function index() {

        $this->data['content'] = $this->viewFolder . '/compose';

        $fields = array('name', 'club_code', 'id');
        $this->data['records_clubs'] = $this->modelClubAlias->fetchFields($fields, array('is_active' => 'Y'));

        $post['send_all'] = false;
        $post['to_address'] = array();
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

            if(!$this->input->post('send_all') && count($this->input->post('to_address')) == 0) {

                $this->data['Error'] = 'Y';
                $this->data['MSG'] = 'Either put the recipient addresses or choose send all';
                $error = true;
            }

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

                  $toAddress = array();

                  if($this->input->post('send_all')) {

                      foreach ($this->data['records_clubs'] as $key => $value) {
                         array_push($toAddress, $value->id);
                      }

                  } else {

                      $toAddressRaw = $this->input->post('to_address');

                      foreach ($toAddressRaw as $key => $value) {
                          array_push($toAddress, $this->mencrypt->decode($value));
                      }

                  }

                  if($uploadstatus != "Error") {

                        $data_array = array();

                        if(is_array($toAddress) && !empty($toAddress)) {

                            foreach ($toAddress as $key => $value) {

                                array_push(
                                    $data_array,
                                    array(
                                        'from_fk' => 0,
                                        'to_fk' => $value,
                                        'message' => $this->input->post('message'),
                                        'label' => 'Inbox',
                                        'attachment_url' => ($uploadstatus != "Error" && !empty($file_name)) ? mysql_real_escape_string($fileName) : NULL,
                                        'created_on' => date('Y-m-d h:i:s a')
                                    )
                                );

                            }

                            $this->modelNameAlias->save_batch($data_array);
                            $this->session->set_flashdata('success_message', 'Message has been send to ' . count($toAddress) . ' recipient(s)');
                            redirect($this->data['ctrlUrl']);

                        } else {

                          $this->data['Error'] = 'Y';
                          $this->data['MSG'] = 'Something went wrong. please refresh the page';

                        }

                  }

            }

        }

        $this->load->view($this->layout, $this->data);

    }

}
