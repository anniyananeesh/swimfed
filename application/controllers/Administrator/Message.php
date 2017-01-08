<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Message extends MY_Controller {

    protected $className;

    public function __construct() {

        parent::__construct();
        $this->data['menuActive'] = 'message';
        $this->className = 'Message';
        $this->load->model( ADMIN_VIEWS . "/model_messages", "modelMessageAlias");
    }

    public function index() {

       if($this->input->post()) {

            $this->load->library('form_validation');

            $this->form_validation->set_rules('subject', 'Subject', 'trim|required|xss_clean');
            $this->form_validation->set_rules('message', 'Email message body', 'trim|required|xss_clean');

            $this->form_validation->set_error_delimiters('', '');

            if ($this->form_validation->run() == TRUE) {

                $data_array = array(
                    'from_fk' => 0,
                    'to_fk' => $this->mencrypt->decode($this->input->post("emailID", TRUE)),
                    'message' => $this->input->post("message", TRUE),
                    'label' => 'Inbox',
                    'attachment_url' => NULL,
                    'created_on' => date('Y-m-d h:i:s a')
                );

                $this->modelMessageAlias->save($data_array);

                $this->session->set_flashdata('success_message', 'Your email has been send');
                redirect($this->input->post('redirect_uri', TRUE));

            }  else {

                $this->session->set_flashdata('error_message', 'You form has errors . Email not sent');
                redirect($this->input->post('redirect_uri', TRUE));

            }

        }

    }

}
