<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Members extends MY_Controller {

    protected $viewFolder;
    protected $className;

    protected $imageShowPath = CLUBS_SHOW_PATH;
    protected $memberShowPath = MEMBERS_SHOW_PATH;
    protected $passportShowPath = PASSPORT_SHOW_PATH;

    public function __construct() {

        parent::__construct();
        $this->viewFolder = ADMIN_VIEWS . '/Members';
        $this->data['menuActive'] = 'members';
        $this->data['ctrlUrl'] = HOST_URL . "/" . ADMIN_URL . "/Members";
        $this->load->model( ADMIN_VIEWS . '/model_members', 'modelNameAlias');

        $this->className = 'Clubs';

    }

    public function index() {

        $this->data['content'] = $this->viewFolder . '/index';

        $this->data['q'] = (isset($_GET) && $_GET['q'] != "") ? $_GET['q'] : "";

        $join = array(
           array('table' => TBL_CLUBS, 'condition' => TBL_CLUBS . '.id = ' . TBL_MEMBERS . '.club_fk', 'join' => 'LEFT')
        );

        $where = array(TBL_MEMBERS . '.is_active' => 'N');

        if(isset($_GET) && $_GET['q'] != "") {
            $where[TBL_MEMBERS . '.first_name LIKE'] = $_GET['q'] . '%';
        }

        if(isset($_GET) && $_GET['type'] != "all" && $_GET['type'] != NULL) {
            $where[TBL_MEMBERS . '.current_status'] = $_GET['type'];
        }

        $fields = array(TBL_MEMBERS . '.*', TBL_CLUBS . '.name');

        $this->data['records'] = $this->modelNameAlias->fetchFields($fields, $where, array(), null, null, $join);
        $this->load->view($this->layout, $this->data);
        
    }

  }
