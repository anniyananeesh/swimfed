<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

    public function __construct() {

        parent::__construct();
    }

    public function index() {

        $this->data['content'] = ADMIN_VIEWS . '/dashboard';
        $this->data['menuActive'] = 'dashboard';

        $this->load->model(ADMIN_VIEWS . '/model_messages', 'modelMessageAlias');
        $this->data['unreadMessages'] = $this->modelMessageAlias->countAllRecordsByCond(array('label' => 'Inbox', 'is_read' => 'N', 'to_fk' => 0));

        $this->load->view($this->layout, $this->data);
    }

}
