<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Send extends MY_Controller {

    protected $viewFolder;
    protected $className;

    protected $imageShowPath = CLUBS_SHOW_PATH;

    public function __construct() {

        parent::__construct();
        $this->viewFolder = ADMIN_VIEWS . '/messages';
        $this->data['menuActive'] = 'send';
        $this->data['ctrlUrl'] = HOST_URL . "/" . ADMIN_URL . "/Send";

        $this->className = 'Send';

    }

    public function index() {

        $this->data['content'] = $this->viewFolder . '/send-messages';
        $this->load->view($this->layout, $this->data);

    }

}
