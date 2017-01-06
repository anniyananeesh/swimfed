<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Send extends Club_Controller {

    protected $viewFolder;
    protected $className;

    protected $imageShowPath = CLUBS_SHOW_PATH;

    public function __construct() {

        parent::__construct();
        $this->viewFolder = CLUB_VIEWS . '/messages';
        $this->data['menuActive'] = 'send';
        $this->data['ctrlUrl'] = HOST_URL . "/" . CLUB_URL . "/Send";

        $this->className = 'Send';

    }

    public function index() {

        $this->data['content'] = $this->viewFolder . '/send-messages';
        $this->load->view($this->layout, $this->data);

    }

}
