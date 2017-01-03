<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrator extends CI_Controller
{

    protected $data;

    public function __construct() {

       parent::__construct();
       $this->data = array();
    }

    public function getUniqueCodeClub() {

        $this->load->model(ADMIN_VIEWS . '/model_clubs', 'modelClubAlias');
        $code = $this->modelClubAlias->genClubCode();

        $this->data = array('code' => 200, 'message' => 'success', 'data' => $code);
        echo json_encode($this->data);
    }

}
