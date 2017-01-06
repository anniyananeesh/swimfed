<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Message extends MY_Controller {

    protected $className;

    public function __construct() {

        parent::__construct();
        $this->data['menuActive'] = 'message';
        $this->className = 'Message';

    }

    public function index() {

       if($this->input->post()) {

            $this->load->library('form_validation');

            $this->form_validation->set_rules('subject', 'Subject', 'trim|required|xss_clean');
            $this->form_validation->set_rules('message', 'Email message body', 'trim|required|xss_clean');

            $this->form_validation->set_error_delimiters('', '');

            if ($this->form_validation->run() == TRUE) {

                include_once(APPPATH . "/libraries/Mail.php");
                $mail = new Mail();

                $message_body = $this->input->post("message", TRUE);

                include_once(MISC_PATH."/emails.php");

                $options = array(
                    'from' => INFO_EMAIL,
                    'to' => $this->input->post("emailID", TRUE),
                    'subject' => $this->input->post("subject", TRUE)
                );

                $mail->send_email( $options, $common_message_format);

                $this->session->set_flashdata('success_message', 'Your email has been send');
                redirect($this->input->post('redirect_uri', TRUE));

            }  else {

                $this->session->set_flashdata('error_message', 'You form has errors . Email not sent');
                redirect($this->input->post('redirect_uri', TRUE));

            }

        }

    }

}
