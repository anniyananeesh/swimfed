<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Trash extends MY_Controller {

    protected $viewFolder;
    protected $className;

    protected $imageShowPath = CLUBS_SHOW_PATH;

    public function __construct() {

        parent::__construct();
        $this->viewFolder = ADMIN_VIEWS . '/messages';
        $this->data['menuActive'] = 'trash';
        $this->data['ctrlUrl'] = HOST_URL . "/" . ADMIN_URL . "/Trash";

        $this->className = 'Trash';

    }

    public function index() {

        $this->data['content'] = $this->viewFolder . '/trash';
        $this->load->view($this->layout, $this->data);

    }

}
