<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Members extends Club_Controller {

    protected $viewFolder;
    protected $className;

    protected $imageShowPath = MEMBER_SHOW_PATH;
    protected $imageUpPath = MEMBER_UP_PATH;

    protected $passportUpPath = PASSPORT_UP_PATH;
    protected $passportShowPath = PASSPORT_SHOW_PATH;

    protected $cardUpPath = CARD_UP_PATH;
    protected $cardShowPath = CARD_SHOW_PATH;

    public function __construct() {

        parent::__construct();
        $this->viewFolder = CLUB_VIEWS . '/members';
        $this->data['menuActive'] = 'members';
        $this->data['ctrlUrl'] = HOST_URL . "/" . CLUB_URL . "/Members";
        $this->load->model( CLUB_VIEWS . '/model_members', 'modelNameAlias');

        $this->className = 'Members';

    }

    public function index() {

        $this->data['content'] = $this->viewFolder . '/index';

        $this->data['q'] = (isset($_GET) && $_GET['q'] != "") ? $_GET['q'] : "";

        $join = array(
           array('table' => TBL_CLUBS, 'condition' => TBL_CLUBS . '.id = ' . TBL_MEMBERS . '.club_fk', 'join' => 'LEFT')
        );

        if(isset($_GET) && $_GET['q'] != "") {
            $where[TBL_MEMBERS . '.first_name LIKE'] = $_GET['q'] . '%';
        }

        if(isset($_GET) && $_GET['type'] != "all" && $_GET['type'] != NULL) {
            $where[TBL_MEMBERS . '.current_status'] = $_GET['type'];
        }

        $where[TBL_MEMBERS . '.club_fk'] = $this->mencrypt->decode($this->data['user']['user_id']);

        $fields = array(TBL_MEMBERS . '.*', TBL_CLUBS . '.name');

        $this->data['records'] = $this->modelNameAlias->fetchFields($fields, $where, array(), null, null, $join);
        $this->load->view($this->layout, $this->data);

    }

    public function add($activeTab = '') {

        $this->data['content'] = $this->viewFolder . '/add';
        $this->data['activeTab'] = ($activeTab == '') ? 'player' : $activeTab;

        $post['first_name'] = '';
        $post['last_name'] = '';
        $post['father_name'] = '';
        $post['gender'] = '';
        $post['dob'] = '';
        $post['passport_no'] = '';
        $post['passport_expiry'] = '';
        $post['country'] = '';
        $post['emirate'] = '';
        $post['city'] = '';
        $post['contact_no'] = '';
        $post['discipline'] = '';
        $post['role'] = '';
        $post['note'] = '';
        $post['current_status'] = '';

        $this->data['post'] = $post;

        $error = false;
        $Image1Name = NULL;
        $Image2Name = NULL;
        $Image3Name = NULL;
        $Image4Name = NULL;
        $uploadStatusProfileImage = '';

        if($this->input->post()) {

              $this->data['post'] = $this->input->post();

              $this->load->library('form_validation');

              $this->form_validation->set_rules('first_name', 'First name', 'trim|required|xss_clean');
              $this->form_validation->set_rules('last_name', 'Last name', 'trim|required|xss_clean');
              $this->form_validation->set_rules('father_name', 'Father name', 'trim|required|xss_clean');
              $this->form_validation->set_rules('gender', 'Gender', 'trim|required|xss_clean');
              $this->form_validation->set_rules('dob', 'Date of birth', 'trim|required|xss_clean');
              $this->form_validation->set_rules('passport_no', 'Passport no.', 'trim|required|xss_clean');
              $this->form_validation->set_rules('passport_expiry', 'Passport expiry', 'trim|required|xss_clean');
              $this->form_validation->set_rules('country', 'Country', 'trim|required|xss_clean');
              $this->form_validation->set_rules('emirate', 'Emirate', 'trim|required|xss_clean');
              $this->form_validation->set_rules('city', 'City', 'trim|required|xss_clean');
              $this->form_validation->set_rules('contact_no', 'Contact no.', 'trim|required|xss_clean');
              $this->form_validation->set_rules('discipline', 'Discipline', 'trim|required|xss_clean');
              $this->form_validation->set_rules('role', 'Member role', 'trim|required|xss_clean');
              $this->form_validation->set_rules('note', 'Note', 'trim|required|xss_clean');
              $this->form_validation->set_rules('current_status', 'Current status', 'trim|required|xss_clean');

              $this->form_validation->set_error_delimiters('', '');

              if($this->form_validation->run() == TRUE && !$error) {

                  //Upload images for member
                  //Upload profile image for member
                  $image1_name        = $_FILES["userfile"]["name"];
                  $image1_tmp_name    = $_FILES["userfile"]["tmp_name"];

                  if (!empty($image1_name)) {

                      $fileAttrs = array(
                          'imgPath' => $this->imageUpPath,
                          'maxSize' => '800',
                          'maxWidth' => '640',
                          'maxHeight' => '640',
                          'createThumb' => false
                      );

                      $upload_array   =  $this->upload_image('userfile', $image1_name, NULL, $fileAttrs);
                      $Image1Name     =   (isset($upload_array["ImageName"])) ? $upload_array["ImageName"] : '';
                      $this->data["MSG"]    =   (isset($upload_array["msg"])) ? 'Profile image :' . $upload_array["msg"] : '';
                      $this->data["Error"]  =   (isset($upload_array["err"])) ? $upload_array["err"] : '';
                      $uploadStatusProfileImage   =   (isset($upload_array["ups"])) ? $upload_array["ups"] : '';
                  }

                  //Upload passport front page
                  $image2_name = $_FILES["passportfront"]["name"];
                  $image2_tmp_name    = $_FILES["passportfront"]["tmp_name"];

                  if (!empty($image2_name)) {

                      $fileAttrs = array(
                          'imgPath' => $this->passportUpPath,
                          'maxSize' => '1024',
                          'maxWidth' => '1024',
                          'maxHeight' => '1024',
                          'createThumb' => false
                      );

                      $upload_array   =  $this->upload_image('passportfront', $image2_name, NULL, $fileAttrs);
                      $Image2Name     =   (isset($upload_array["ImageName"])) ? $upload_array["ImageName"] : '';
                      $this->data["MSG"]    =   (isset($upload_array["msg"])) ? 'Passport front image :' . $upload_array["msg"] : '';
                      $this->data["Error"]  =   (isset($upload_array["err"])) ? $upload_array["err"] : '';
                      $uploadStatusProfileImage   =   (isset($upload_array["ups"])) ? $upload_array["ups"] : '';
                  }

                  //Upload passport visa page
                  $image3_name = $_FILES["passportvisa"]["name"];
                  $image3_tmp_name    = $_FILES["passportvisa"]["tmp_name"];

                  if (!empty($image3_name)) {

                      $fileAttrs = array(
                          'imgPath' => $this->passportUpPath,
                          'maxSize' => '1024',
                          'maxWidth' => '1024',
                          'maxHeight' => '1024',
                          'createThumb' => false
                      );

                      $upload_array   =  $this->upload_image('passportvisa', $image3_name, NULL, $fileAttrs);
                      $Image3Name     =   (isset($upload_array["ImageName"])) ? $upload_array["ImageName"] : '';
                      $this->data["MSG"]    =   (isset($upload_array["msg"])) ? 'Passport front image :' . $upload_array["msg"] : '';
                      $this->data["Error"]  =   (isset($upload_array["err"])) ? $upload_array["err"] : '';
                      $uploadStatusProfileImage   =   (isset($upload_array["ups"])) ? $upload_array["ups"] : '';
                  }

                  //Upload member ID Card
                  $image4_name = $_FILES["idcard"]["name"];
                  $image4_tmp_name    = $_FILES["idcard"]["tmp_name"];

                  if (!empty($image4_name)) {

                      $fileAttrs = array(
                          'imgPath' => $this->cardUpPath,
                          'maxSize' => '1024',
                          'maxWidth' => '1024',
                          'maxHeight' => '1024',
                          'createThumb' => false
                      );

                      $upload_array   =  $this->upload_image('idcard', $image4_name, NULL, $fileAttrs);
                      $Image4Name     =   (isset($upload_array["ImageName"])) ? $upload_array["ImageName"] : '';
                      $this->data["MSG"]    =   (isset($upload_array["msg"])) ? 'Passport front image :' . $upload_array["msg"] : '';
                      $this->data["Error"]  =   (isset($upload_array["err"])) ? $upload_array["err"] : '';
                      $uploadStatusProfileImage   =   (isset($upload_array["ups"])) ? $upload_array["ups"] : '';
                  }

                  if($uploadStatusProfileImage != 'Error') {

                      $memCode = $this->modelNameAlias->genMemberCode();

                      $data_array = array(
                          'code' => $memCode,
                          'first_name' => $this->input->post('first_name', TRUE),
                          'image1' => (!empty($image1_name)) ? $Image1Name : NULL,
                          'last_name' => $this->input->post('last_name', TRUE),
                          'father_name' => $this->input->post('father_name', TRUE),
                          'gender' => $this->input->post('gender', TRUE),
                          'city' => $this->input->post('city', TRUE),
                          'emirate' => $this->input->post('emirate', TRUE),
                          'country' => $this->input->post('country', TRUE),
                          'contact_no' => $this->input->post('contact_no', TRUE),
                          'club_fk' => $this->mencrypt->decode($this->data['user']['user_id']),
                          'discipline' => $this->input->post('discipline', TRUE),
                          'role' => $this->input->post('role', TRUE),
                          'note' => $this->input->post('note', TRUE),
                          'current_status' => $this->input->post('current_status', TRUE),
                          'type' => $this->data['activeTab'],
                          'dob' => $this->input->post('dob', TRUE),
                          'passport_no' => $this->input->post('passport_no', TRUE),
                          'passport_expiry' => $this->input->post('passport_expiry', TRUE),
                          'passport_image1' => (!empty($image2_name)) ? $Image2Name : NULL,
                          'passport_image2' => (!empty($image3_name)) ? $Image3Name : NULL,
                          'id_card1' => (!empty($image4_name)) ? $Image4Name : NULL,
                          'id_card1' => (!empty($image4_name)) ? $Image4Name : NULL,
                          'created_on' => date('Y-m-d h:i:s A'),
                          'updated_on' => date('Y-m-d h:i:s A')
                      );

                      $this->modelNameAlias->save($data_array);

                      $this->addLog($memCode . ' : Member details has been added by club admin');

                      $this->session->set_flashdata('success_message', 'Member details has been added');
                      redirect($this->data['ctrlUrl'] . '/add/' . $this->data['activeTab']);
                  }

              }

        }

        $this->load->view($this->layout, $this->data);

    }

    public function edit($id) {

        $this->data['content'] = $this->viewFolder . '/edit';
        $this->data['record'] = $record = $this->modelNameAlias->fetchById($this->mencrypt->decode($id));

        $post['first_name'] = $record->first_name;
        $post['last_name'] = $record->last_name;
        $post['father_name'] = $record->father_name;
        $post['gender'] = $record->gender;
        $post['dob'] = $record->dob;
        $post['passport_no'] = $record->passport_no;
        $post['passport_expiry'] = $record->passport_expiry;
        $post['country'] = $record->country;
        $post['emirate'] = $record->emirate;
        $post['city'] = $record->city;
        $post['contact_no'] = $record->contact_no;
        $post['discipline'] = $record->discipline;
        $post['role'] = $record->role;
        $post['note'] = $record->note;
        $post['current_status'] = $record->current_status;

        $this->data['post'] = $post;

        $this->data['cardShowPath'] = $this->cardShowPath;
        $this->data['passportShowPath'] = $this->passportShowPath;
        $this->data['memberShowPath'] = $this->imageShowPath;

        $error = false;
        $Image1Name = NULL;
        $Image2Name = NULL;
        $Image3Name = NULL;
        $Image4Name = NULL;
        $uploadStatusProfileImage = '';

        if($this->input->post()) {

              $this->data['post'] = $this->input->post();

              $this->load->library('form_validation');

              $this->form_validation->set_rules('first_name', 'First name', 'trim|required|xss_clean');
              $this->form_validation->set_rules('last_name', 'Last name', 'trim|required|xss_clean');
              $this->form_validation->set_rules('father_name', 'Father name', 'trim|required|xss_clean');
              $this->form_validation->set_rules('gender', 'Gender', 'trim|required|xss_clean');
              $this->form_validation->set_rules('dob', 'Date of birth', 'trim|required|xss_clean');
              $this->form_validation->set_rules('passport_no', 'Passport no.', 'trim|required|xss_clean');
              $this->form_validation->set_rules('passport_expiry', 'Passport expiry', 'trim|required|xss_clean');
              $this->form_validation->set_rules('country', 'Country', 'trim|required|xss_clean');
              $this->form_validation->set_rules('emirate', 'Emirate', 'trim|required|xss_clean');
              $this->form_validation->set_rules('city', 'City', 'trim|required|xss_clean');
              $this->form_validation->set_rules('contact_no', 'Contact no.', 'trim|required|xss_clean');
              $this->form_validation->set_rules('discipline', 'Discipline', 'trim|required|xss_clean');
              $this->form_validation->set_rules('role', 'Member role', 'trim|required|xss_clean');
              $this->form_validation->set_rules('note', 'Note', 'trim|required|xss_clean');
              $this->form_validation->set_rules('current_status', 'Current status', 'trim|required|xss_clean');

              $this->form_validation->set_error_delimiters('', '');

              if($this->form_validation->run() == TRUE && !$error) {

                  //Upload images for member
                  //Upload profile image for member
                  $image1_name        = $_FILES["userfile"]["name"];
                  $image1_tmp_name    = $_FILES["userfile"]["tmp_name"];

                  if (!empty($image1_name)) {

                      $fileAttrs = array(
                          'imgPath' => $this->imageUpPath,
                          'maxSize' => '800',
                          'maxWidth' => '640',
                          'maxHeight' => '640',
                          'createThumb' => false
                      );

                      $upload_array   =  $this->upload_image('userfile', $image1_name, $record->image1, $fileAttrs);
                      $Image1Name     =   (isset($upload_array["ImageName"])) ? $upload_array["ImageName"] : '';
                      $this->data["MSG"]    =   (isset($upload_array["msg"])) ? 'Profile image :' . $upload_array["msg"] : '';
                      $this->data["Error"]  =   (isset($upload_array["err"])) ? $upload_array["err"] : '';
                      $uploadStatusProfileImage   =   (isset($upload_array["ups"])) ? $upload_array["ups"] : '';
                  }

                  //Upload passport front page
                  $image2_name = $_FILES["passportfront"]["name"];
                  $image2_tmp_name    = $_FILES["passportfront"]["tmp_name"];

                  if (!empty($image2_name)) {

                      $fileAttrs = array(
                          'imgPath' => $this->passportUpPath,
                          'maxSize' => '1024',
                          'maxWidth' => '1024',
                          'maxHeight' => '1024',
                          'createThumb' => false
                      );

                      $upload_array   =  $this->upload_image('passportfront', $image2_name, $record->passport_image1, $fileAttrs);
                      $Image2Name     =   (isset($upload_array["ImageName"])) ? $upload_array["ImageName"] : '';
                      $this->data["MSG"]    =   (isset($upload_array["msg"])) ? 'Passport front image :' . $upload_array["msg"] : '';
                      $this->data["Error"]  =   (isset($upload_array["err"])) ? $upload_array["err"] : '';
                      $uploadStatusProfileImage   =   (isset($upload_array["ups"])) ? $upload_array["ups"] : '';
                  }

                  //Upload passport visa page
                  $image3_name = $_FILES["passportvisa"]["name"];
                  $image3_tmp_name    = $_FILES["passportvisa"]["tmp_name"];

                  if (!empty($image3_name)) {

                      $fileAttrs = array(
                          'imgPath' => $this->passportUpPath,
                          'maxSize' => '1024',
                          'maxWidth' => '1024',
                          'maxHeight' => '1024',
                          'createThumb' => false
                      );

                      $upload_array   =  $this->upload_image('passportvisa', $image3_name, $record->passport_image2, $fileAttrs);
                      $Image3Name     =   (isset($upload_array["ImageName"])) ? $upload_array["ImageName"] : '';
                      $this->data["MSG"]    =   (isset($upload_array["msg"])) ? 'Passport front image :' . $upload_array["msg"] : '';
                      $this->data["Error"]  =   (isset($upload_array["err"])) ? $upload_array["err"] : '';
                      $uploadStatusProfileImage   =   (isset($upload_array["ups"])) ? $upload_array["ups"] : '';
                  }

                  //Upload member ID Card
                  $image4_name = $_FILES["idcard"]["name"];
                  $image4_tmp_name    = $_FILES["idcard"]["tmp_name"];

                  if (!empty($image4_name)) {

                      $fileAttrs = array(
                          'imgPath' => $this->cardUpPath,
                          'maxSize' => '1024',
                          'maxWidth' => '1024',
                          'maxHeight' => '1024',
                          'createThumb' => false
                      );

                      $upload_array   =  $this->upload_image('idcard', $image4_name, $record->id_card1, $fileAttrs);
                      $Image4Name     =   (isset($upload_array["ImageName"])) ? $upload_array["ImageName"] : '';
                      $this->data["MSG"]    =   (isset($upload_array["msg"])) ? 'Passport front image :' . $upload_array["msg"] : '';
                      $this->data["Error"]  =   (isset($upload_array["err"])) ? $upload_array["err"] : '';
                      $uploadStatusProfileImage   =   (isset($upload_array["ups"])) ? $upload_array["ups"] : '';
                  }

                  if($uploadStatusProfileImage != 'Error') {

                      $data_array = array(
                          'first_name' => $this->input->post('first_name', TRUE),
                          'image1' => (!empty($image1_name)) ? $Image1Name : $record->image1,
                          'last_name' => $this->input->post('last_name', TRUE),
                          'father_name' => $this->input->post('father_name', TRUE),
                          'gender' => $this->input->post('gender', TRUE),
                          'city' => $this->input->post('city', TRUE),
                          'emirate' => $this->input->post('emirate', TRUE),
                          'country' => $this->input->post('country', TRUE),
                          'contact_no' => $this->input->post('contact_no', TRUE),
                          'club_fk' => $this->mencrypt->decode($this->data['user']['user_id']),
                          'discipline' => $this->input->post('discipline', TRUE),
                          'role' => $this->input->post('role', TRUE),
                          'note' => $this->input->post('note', TRUE),
                          'current_status' => $this->input->post('current_status', TRUE),
                          'dob' => $this->input->post('dob', TRUE),
                          'passport_no' => $this->input->post('passport_no', TRUE),
                          'passport_expiry' => $this->input->post('passport_expiry', TRUE),
                          'passport_image1' => (!empty($image2_name)) ? $Image2Name : $record->passport_image1,
                          'passport_image2' => (!empty($image3_name)) ? $Image3Name : $record->passport_image2,
                          'id_card1' => (!empty($image4_name)) ? $Image4Name : $record->id_card1,
                          'updated_on' => date('Y-m-d h:i:s A')
                      );

                      $where = array(
                          'id' => $this->mencrypt->decode($id)
                      );

                      $this->modelNameAlias->save($data_array, $where);

                      $this->addLog($record->code . ' : Member details has been updated by club admin');

                      $this->session->set_flashdata('success_message', 'Member details has been updated');
                      redirect($this->data['ctrlUrl']);

                  }

              }

        }

        $this->load->view($this->layout, $this->data);
    }

    public function delete($id) {

        if($id) {

            $record = $this->modelNameAlias->fetchById($this->mencrypt->decode($id));

            $where = array(
                'id' => $this->mencrypt->decode($id)
            );

            $this->modelNameAlias->delete($where);
            $this->addLog($record->code . ' : Member details has been deleted by club admin');

            $this->session->set_flashdata('success_message', 'Member details has been deleted');
            redirect($this->data['ctrlUrl']);

        } else {

            $this->session->set_flashdata('error_message', 'Something went wrong :(');
            redirect($this->data['ctrlUrl']);
        }

    }

}
