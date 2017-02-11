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
        $this->viewFolder = ADMIN_VIEWS . '/members';
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

    public function import() {

        $this->load->model( ADMIN_VIEWS . '/model_temp_members', 'modelNamesAlias');
        $this->load->model( ADMIN_VIEWS . '/model_members', 'modelMemberssAlias');
        $records = $this->modelNamesAlias->fetchAll();
 
        foreach ($records as $key => $value) {

            $memCode = $this->modelMemberssAlias->genMemberCode();

            $data_array = array(
                'code' => $memCode,
                'first_name' => $value->first_name,
                'image1' => $value->image1,
                'last_name' => $value->last_name,
                'father_name' => $value->father_name,
                'gender' => $value->gender,
                'city' => $value->city,
                'emirate' => $value->emirate,
                'country' => $value->country,
                'contact_no' => $value->contact_no,
                'club_fk' => $value->club_fk,
                'discipline' => $value->discipline,
                'note' => $value->note,
                'type' => $value->type,
                'dob' => $value->dob,
                'passport_no' => $value->passport_no,
                'passport_expiry' => $value->passport_expiry,
                'id_card1' => $value->id_card1,
                'image_club_certificate' => $value->image_club_certificate,
                'created_on' => date('Y-m-d h:i:s A'),
                'updated_on' => date('Y-m-d h:i:s A')
            );

            $sponsorDetails = $this->modelNamesAlias->getMemberSponsorDetails($value->id);
            $passportDetails = $this->modelNamesAlias->getMemberPassportDetails($value->id);

            $id = $this->modelMemberssAlias->save($data_array);
            var_dump($id);
            foreach ($sponsorDetails as $key => $value) {
                $this->modelMemberssAlias->addSponsor(array('member_fk' => $id, 'image_url' => $value->image_url));
            }

            foreach ($passportDetails as $key => $value) {
                $this->modelMemberssAlias->addPassport(array('member_fk' => $id, 'image_url' => $value->image_url));
            }

        }

    }

}
