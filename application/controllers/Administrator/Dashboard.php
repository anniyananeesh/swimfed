<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

    public function __construct() {

        parent::__construct();
    }

    public function index() {

        $this->data['content'] = ADMIN_VIEWS . '/dashboard';
        $this->data['menuActive'] = 'dashboard';
        $this->load->view($this->layout, $this->data);
    }

}
