<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Club_Controller {

    public function __construct() {

        parent::__construct();
        $this->load->model(CLUB_VIEWS . '/model_messages', 'modelMessageAlias');
    }

    public function index() {

        $this->data['content'] = CLUB_VIEWS . '/dashboard';
        $this->data['menuActive'] = 'dashboard';
        $this->data['unreadMessages'] = $this->modelMessageAlias->countAllRecordsByCond(array('label' => 'Inbox', 'is_read' => 'N', 'to_fk' => $this->mencrypt->decode($this->data['user']['user_id'])));
        $this->load->view($this->layout, $this->data);
    }

}
