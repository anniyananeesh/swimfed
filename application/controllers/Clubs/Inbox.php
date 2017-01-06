<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inbox extends Club_Controller {

    protected $viewFolder;
    protected $className;

    protected $imageShowPath = CLUBS_SHOW_PATH;

    public function __construct() {

        parent::__construct();
        $this->viewFolder = CLUB_VIEWS . '/messages';
        $this->data['menuActive'] = 'inbox';
        $this->data['ctrlUrl'] = HOST_URL . "/" . ADMIN_URL . "/Inbox";
        $this->load->model( CLUB_VIEWS . '/model_members', 'modelNameAlias');

        $this->className = 'Inbox';

    }

    public function index() {

        $this->data['content'] = $this->viewFolder . '/inbox';
        $this->load->view($this->layout, $this->data);

    }

}
