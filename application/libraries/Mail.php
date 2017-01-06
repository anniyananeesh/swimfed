<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

Class Mail {

    public $ci;

    /*
     * When mail service is inititalized the construct function creates are required packages onto memmory for handling with the scope
     * Parser to parse the template passed
     * My_phpMailer is liobrary to be imported to send the mails ..refer PHPMailer class online
     * Putting the profiler output stautus to false ...otherwise mail will be crashed from sending
     *
     * All Config is kept inside the
     *
     * Location: ./application/config/mail.php
     */
    public function __construct() {

        //Initialize the instance of the Codeigniter framework.
        //No Direct access from library folder
        $this->ci = & get_instance();
        $this->ci->load->library('email');
        $this->ci->config->load('email',true);
    }

    /*
     * Send the mail transfered to this service
     * @params $query Contents
     * @params $template Template to wrap up with
     * @params $mentry Aka Mail Entry Details of mail to be send
     */
    public function send_email( $options, $message) {

          $this->ci->email->from($options['from']);
          $this->ci->email->to($options['to']);
          $this->ci->email->subject($options['subject']);

          $this->ci->email->message($message);

          if ($this->ci->email->send()) {
              return true;
          } else {
              return false;
          }

    }

}
