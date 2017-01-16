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

    protected $clubCertiUpPath = CLUB_CERTI_UP_PATH;
    protected $sponsorUpPath = SPONSOR_UP_PATH;

    protected $clubCertiShowPath = CLUB_CERTI_SHOW_PATH;
    protected $sponsorShowPath = SPONSOR_SHOW_PATH;

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
        $this->data['activeTab'] = ($activeTab == '') ? 'athlete' : $activeTab;

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

        $this->data['post'] = $post;

        $error = false;
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
              $this->form_validation->set_rules('note', 'Note', 'trim|required|xss_clean');

              $this->form_validation->set_error_delimiters('', '');

              if($this->form_validation->run() == TRUE && !$error) {

                  //Upload images for member
                  //Upload profile image for member
                  $image1_name        = $_FILES["profilePic"]["name"][0];
                  $image1_tmp_name    = $_FILES["profilePic"]["tmp_name"][0];

                  if (!empty($image1_name)) {

                      $File1Name = substr(md5(uniqid(rand())),0,15);
                      $File1Name = "IMG-".$File1Name.strrchr($image1_name,".");

                      $this->upload->initialize(array(
                          'upload_path' => $this->imageUpPath,
                          "encrypt_name" => true,
                          'is_image' => true,
                          'allowed_types' => 'jpg|png',
                          'max_size' => '800',
                          'max_width' => '640',
                          'max_height' => '640',
                      ));

                      $this->upload->do_multi_upload("profilePic");
                      $data = $this->upload->get_multi_upload_data();

                  }

                  //Upload passport front page
                  $image2_name = $_FILES["myfilepassport"]["name"][0];
                  $image2_tmp_name    = $_FILES["myfilepassport"]["tmp_name"][0];

                  if (!empty($image2_name)) {

                      $File1Name = substr(md5(uniqid(rand())),0,15);
                      $File1Name = "IMG-".$File1Name.strrchr($image1_name,".");

                      $this->upload->initialize(array(
                          'upload_path' => $this->passportUpPath,
                          "encrypt_name" => true,
                          'is_image' => true,
                          'allowed_types' => 'jpg|png',
                          'max_size' => '1024',
                          'max_width' => '1024',
                          'max_height' => '1024',
                      ));

                      $this->upload->do_multi_upload("myfilepassport");
                      $dataPassportVisa = $this->upload->get_multi_upload_data();
                  }

                  $image3_name = $_FILES["sponsorfile"]["name"][0];
                  $image3_tmp_name    = $_FILES["sponsorfile"]["tmp_name"][0];

                  if (!empty($image3_name)) {

                      $File1Name = substr(md5(uniqid(rand())),0,15);
                      $File1Name = "IMG-".$File1Name.strrchr($image1_name,".");

                      $this->upload->initialize(array(
                          'upload_path' => $this->sponsorUpPath,
                          "encrypt_name" => true,
                          'is_image' => true,
                          'allowed_types' => 'jpg|png',
                          'max_size' => '1024',
                          'max_width' => '1024',
                          'max_height' => '1024',
                      ));

                      $this->upload->do_multi_upload("sponsorfile");
                      $dataSponsorDetails = $this->upload->get_multi_upload_data();
                  }

                  //Upload member ID Card
                  $image4_name = $_FILES["clubfile"]["name"][0];
                  $image4_tmp_name    = $_FILES["clubfile"]["tmp_name"][0];

                  if (!empty($image4_name)) {

                      $File1Name = substr(md5(uniqid(rand())),0,15);
                      $File1Name = "IMG-".$File1Name.strrchr($image1_name,".");

                      $this->upload->initialize(array(
                          'upload_path' => $this->clubCertiUpPath,
                          "encrypt_name" => true,
                          'is_image' => true,
                          'allowed_types' => 'jpg|png',
                          'max_size' => '1024',
                          'max_width' => '1024',
                          'max_height' => '1024',
                      ));

                      $this->upload->do_multi_upload("clubfile");
                      $dataClubCertificate = $this->upload->get_multi_upload_data();
                  }

                  if($uploadStatusProfileImage != 'Error') {

                      $memCode = $this->modelNameAlias->genMemberCode();

                      $data_array = array(
                          'code' => $memCode,
                          'first_name' => $this->input->post('first_name', TRUE),
                          'image1' => (!empty($image1_name)) ? $data[0]['file_name'] : NULL,
                          'last_name' => $this->input->post('last_name', TRUE),
                          'father_name' => $this->input->post('father_name', TRUE),
                          'gender' => $this->input->post('gender', TRUE),
                          'city' => $this->input->post('city', TRUE),
                          'emirate' => $this->input->post('emirate', TRUE),
                          'country' => $this->input->post('country', TRUE),
                          'contact_no' => $this->input->post('contact_no', TRUE),
                          'club_fk' => $this->mencrypt->decode($this->data['user']['user_id']),
                          'discipline' => $this->input->post('discipline', TRUE),
                          'note' => $this->input->post('note', TRUE),
                          'type' => ucfirst($this->data['activeTab']),
                          'dob' => $this->input->post('dob', TRUE),
                          'passport_no' => $this->input->post('passport_no', TRUE),
                          'passport_expiry' => $this->input->post('passport_expiry', TRUE),
                          'id_card1' => NULL,
                          'image_club_certificate' => NULL,
                          'created_on' => date('Y-m-d h:i:s A'),
                          'updated_on' => date('Y-m-d h:i:s A')
                      );

                      $id = $this->modelNameAlias->save($data_array);

                      //UPload vias details with passport
                      if(is_array($dataPassportVisa) && !empty($dataPassportVisa)) {

                          $this->load->model( CLUB_VIEWS . '/model_visa_images', 'modelVisaImagesAlias');

                          foreach ($dataPassportVisa as $key => $value) {

                              $data_array = array(
                                 'member_fk' => $id,
                                 'image_url' => $value['file_name']
                              );

                              $this->modelVisaImagesAlias->save($data_array);

                          }

                      }

                      //Upload sponsor details
                      if(is_array($dataSponsorDetails) && !empty($dataSponsorDetails)) {

                          $this->load->model( CLUB_VIEWS . '/model_sponsor_images', 'modelSponsorAlias');

                          foreach ($dataSponsorDetails as $key => $value) {

                              $data_array = array(
                                 'member_fk' => $id,
                                 'image_url' => $value['file_name']
                              );

                              $this->modelSponsorAlias->save($data_array);

                          }

                      }

                      //Update club registration ertificate
                      if(is_array($dataClubCertificate) && !empty($dataClubCertificate)) {

                            $data_array = array(
                               'image_club_certificate' => $dataClubCertificate[0]['file_name']
                            );

                            $this->modelNameAlias->save($data_array , array('id' => $id));

                      }

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

        if($record->is_active == 'Y') {
            $this->session->set_flashdata('error_message', 'Member has been activated, so cannot edit');
            redirect($this->data['ctrlUrl'] .'/view/' . $id);
        }

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
        $post['note'] = $record->note;

        $this->data['post'] = $post;

        $this->data['memberShowPath'] = $this->imageShowPath;
        $this->data['passportShowPath'] = $this->passportShowPath;
        $this->data['cardShowPath'] = $this->cardShowPath;
        $this->data['sponsorShowPath'] = $this->sponsorShowPath;
        $this->data['clubCertiShowPath'] = $this->clubCertiShowPath;

        $error = false;
        $uploadStatusProfileImage = '';

        //Get all passport images
        $this->load->model( CLUB_VIEWS . '/model_visa_images', 'modelVisaImagesAlias');
        $this->data['passport_visa_images'] = $this->modelVisaImagesAlias->fetchAll(array('member_fk' => $this->mencrypt->decode($id)), array('id' => 'DESC'));

        //Get all sponsor certificates
        $this->load->model( CLUB_VIEWS . '/model_sponsor_images', 'modelSponsorImagesAlias');
        $this->data['sponsor_images'] = $this->modelSponsorImagesAlias->fetchAll(array('member_fk' => $this->mencrypt->decode($id)), array('id' => 'DESC'));

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
              $this->form_validation->set_rules('note', 'Note', 'trim|required|xss_clean');

              $this->form_validation->set_error_delimiters('', '');

              if($this->form_validation->run() == TRUE && !$error) {

                  //Upload images for member
                  //Upload profile image for member
                  $image1_name        = $_FILES["profilePic"]["name"][0];
                  $image1_tmp_name    = $_FILES["profilePic"]["tmp_name"][0];

                  if (!empty($image1_name)) {

                      $File1Name = substr(md5(uniqid(rand())),0,15);
                      $File1Name = "IMG-".$File1Name.strrchr($image1_name,".");

                      $this->upload->initialize(array(
                          'upload_path' => $this->imageUpPath,
                          "encrypt_name" => true,
                          'is_image' => true,
                          'allowed_types' => 'jpg|png',
                          'max_size' => '800',
                          'max_width' => '640',
                          'max_height' => '640',
                      ));

                      $this->upload->do_multi_upload("profilePic");
                      $data = $this->upload->get_multi_upload_data();
                  }

                  //Upload passport front page
                  $image2_name = $_FILES["myfilepassport"]["name"][0];
                  $image2_tmp_name    = $_FILES["myfilepassport"]["tmp_name"][0];

                  if (!empty($image2_name)) {

                      $File1Name = substr(md5(uniqid(rand())),0,15);
                      $File1Name = "IMG-".$File1Name.strrchr($image1_name,".");

                      $this->upload->initialize(array(
                          'upload_path' => $this->passportUpPath,
                          "encrypt_name" => true,
                          'is_image' => true,
                          'allowed_types' => 'jpg|png',
                          'max_size' => '1024',
                          'max_width' => '1024',
                          'max_height' => '1024',
                      ));

                      $this->upload->do_multi_upload("myfilepassport");
                      $dataPassportVisa = $this->upload->get_multi_upload_data();
                  }

                  $image3_name = $_FILES["sponsorfile"]["name"][0];
                  $image3_tmp_name    = $_FILES["sponsorfile"]["tmp_name"][0];

                  if (!empty($image3_name)) {

                      $File1Name = substr(md5(uniqid(rand())),0,15);
                      $File1Name = "IMG-".$File1Name.strrchr($image1_name,".");

                      $this->upload->initialize(array(
                          'upload_path' => $this->sponsorUpPath,
                          "encrypt_name" => true,
                          'is_image' => true,
                          'allowed_types' => 'jpg|png',
                          'max_size' => '1024',
                          'max_width' => '1024',
                          'max_height' => '1024',
                      ));

                      $this->upload->do_multi_upload("sponsorfile");
                      $dataSponsorDetails = $this->upload->get_multi_upload_data();
                  }

                  //Upload member ID Card
                  $image4_name = $_FILES["clubfile"]["name"][0];
                  $image4_tmp_name    = $_FILES["clubfile"]["tmp_name"][0];

                  if (!empty($image4_name)) {

                      $File1Name = substr(md5(uniqid(rand())),0,15);
                      $File1Name = "IMG-".$File1Name.strrchr($image1_name,".");

                      $this->upload->initialize(array(
                          'upload_path' => $this->clubCertiUpPath,
                          "encrypt_name" => true,
                          'is_image' => true,
                          'allowed_types' => 'jpg|png',
                          'max_size' => '1024',
                          'max_width' => '1024',
                          'max_height' => '1024',
                      ));

                      $this->upload->do_multi_upload("clubfile");
                      $dataClubCertificate = $this->upload->get_multi_upload_data();
                  }

                  if($uploadStatusProfileImage != 'Error') {

                      $data_array = array(
                          'first_name' => $this->input->post('first_name', TRUE),
                          'image1' => (!empty($data)) ? $data[0]['file_name'] : $record->image1,
                          'last_name' => $this->input->post('last_name', TRUE),
                          'father_name' => $this->input->post('father_name', TRUE),
                          'gender' => $this->input->post('gender', TRUE),
                          'city' => $this->input->post('city', TRUE),
                          'emirate' => $this->input->post('emirate', TRUE),
                          'country' => $this->input->post('country', TRUE),
                          'contact_no' => $this->input->post('contact_no', TRUE),
                          'club_fk' => $this->mencrypt->decode($this->data['user']['user_id']),
                          'discipline' => $this->input->post('discipline', TRUE),
                          'note' => $this->input->post('note', TRUE),
                          'dob' => $this->input->post('dob', TRUE),
                          'passport_no' => $this->input->post('passport_no', TRUE),
                          'passport_expiry' => $this->input->post('passport_expiry', TRUE),
                          'id_card1' => (!empty($image4_name)) ? $Image4Name : $record->id_card1,
                          'image_club_certificate' => (!empty($dataClubCertificate)) ? $dataClubCertificate[0]['file_name'] : $record->image_club_certificate,
                          'updated_on' => date('Y-m-d h:i:s A')
                      );

                      $where = array(
                          'id' => $this->mencrypt->decode($id)
                      );

                      $this->modelNameAlias->save($data_array, $where);

                      //UPload vias details with passport
                      if(is_array($dataPassportVisa) && !empty($dataPassportVisa)) {

                          $this->load->model( CLUB_VIEWS . '/model_visa_images', 'modelVisaImagesAlias');

                          foreach ($dataPassportVisa as $key => $value) {

                              $data_array = array(
                                 'member_fk' => $this->mencrypt->decode($id),
                                 'image_url' => $value['file_name']
                              );

                              $this->modelVisaImagesAlias->save($data_array);

                          }

                      }

                      //Upload sponsor details
                      if(is_array($dataSponsorDetails) && !empty($dataSponsorDetails)) {

                          $this->load->model( CLUB_VIEWS . '/model_sponsor_images', 'modelSponsorAlias');

                          foreach ($dataSponsorDetails as $key => $value) {

                              $data_array = array(
                                 'member_fk' => $this->mencrypt->decode($id),
                                 'image_url' => $value['file_name']
                              );

                              $this->modelSponsorAlias->save($data_array);

                          }

                      }

                      $this->addLog($record->code . ' : Member details has been updated by club admin');

                      $this->session->set_flashdata('success_message', 'Member details has been updated');
                      redirect($this->data['ctrlUrl']);

                  }

              }

        }

        $this->load->view($this->layout, $this->data);
    }

    public function delete_file() {

        if(isset($_POST) && $_POST['delete_file'] == 'Y') {

           if($this->modelNameAlias->save(array('image_club_certificate' => NULL), array('id' => $_POST['member']))) {

               if(file_exists($this->clubCertiUpPath . '/' . $_POST['file_name'])) { unlink($this->clubCertiUpPath . '/' . $_POST['file_name']);}

               $this->session->set_flashdata('success_message', 'Club certificate has been deleted');
               redirect($this->data['ctrlUrl'] .'/edit/' . $this->mencrypt->encode($_POST['member']));
           }

        } else {
            $this->session->set_flashdata('error_message', 'Unable to delete this file');
            redirect($this->data['ctrlUrl'] .'/edit/' . $this->mencrypt->encode($_POST['member']));
        }

    }


    public function delete_profile_file() {

        if(isset($_POST) && $_POST['delete_file'] == 'Y') {

           if($this->modelNameAlias->save(array('image1' => NULL), array('id' => $_POST['member']))) {

               if(file_exists($this->imageUpPath . '/' . $_POST['file_name'])) { unlink($this->imageUpPath . '/' . $_POST['file_name']);}

               $this->session->set_flashdata('success_message', 'Profile image has been deleted');
               redirect($this->data['ctrlUrl'] .'/edit/' . $this->mencrypt->encode($_POST['member']));
           }

        } else {
            $this->session->set_flashdata('error_message', 'Unable to delete this file');
            redirect($this->data['ctrlUrl'] .'/edit/' . $this->mencrypt->encode($_POST['member']));
        }

    }

    public function delete_visa_file() {

        if(isset($_POST) && $_POST['delete_file'] == 'Y') {

           $this->load->model( CLUB_VIEWS . '/model_visa_images', 'modelVisaImagesAlias');

           if($this->modelVisaImagesAlias->delete(array('image_url' => $_POST['file_name'], 'member_fk' => $_POST['member']))) {

               if(file_exists($this->passportUpPath . '/' . $_POST['file_name'])) { unlink($this->passportUpPath . '/' . $_POST['file_name']);}

               $this->session->set_flashdata('success_message', 'Passport image has been deleted');
               redirect($this->data['ctrlUrl'] .'/edit/' . $this->mencrypt->encode($_POST['member']));
           }

        } else {
            $this->session->set_flashdata('error_message', 'Unable to delete this file');
            redirect($this->data['ctrlUrl'] .'/edit/' . $this->mencrypt->encode($_POST['member']));
        }

    }

    public function delete_sponsor_file() {

        if(isset($_POST) && $_POST['delete_file'] == 'Y') {

           $this->load->model( CLUB_VIEWS . '/model_sponsor_images', 'modelSponsorImagesAlias');

           if($this->modelSponsorImagesAlias->delete(array('image_url' => $_POST['file_name'], 'member_fk' => $_POST['member']))) {

               if(file_exists($this->sponsorUpPath . '/' . $_POST['file_name'])) { unlink($this->sponsorUpPath . '/' . $_POST['file_name']);}

               $this->session->set_flashdata('success_message', 'Sponsor file has been deleted');
               redirect($this->data['ctrlUrl'] .'/edit/' . $this->mencrypt->encode($_POST['member']));
           }

        } else {
            $this->session->set_flashdata('error_message', 'Unable to delete this file');
            redirect($this->data['ctrlUrl'] .'/edit/' . $this->mencrypt->encode($_POST['member']));
        }

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

    public function view($id) {

        $this->data['content'] = $this->viewFolder . '/view';
        $id = $this->mencrypt->decode($id);

        $this->data['memberShowPath'] = $this->memberShowPath;
        $this->data['passportShowPath'] = $this->passportShowPath;
        $this->data['cardShowPath'] = $this->cardShowPath;
        $this->data['sponsorShowPath'] = $this->sponsorShowPath;
        $this->data['clubCertiShowPath'] = $this->clubCertiShowPath;

        $join = array(
           array('table' => TBL_CLUBS, 'condition' => TBL_CLUBS . '.id = ' . TBL_MEMBERS . '.club_fk', 'join' => 'LEFT')
        );

        $fields = array(TBL_MEMBERS . '.*', TBL_CLUBS . '.name', TBL_CLUBS . '.email as club_email');

        $this->data['record'] = $this->modelNameAlias->fetchRowFields( $fields, array(TBL_MEMBERS . '.id' => $id), array(), $join);

        //Get all passport images
        $this->load->model( CLUB_VIEWS . '/model_visa_images', 'modelVisaImagesAlias');
        $this->data['passport_visa_images'] = $this->modelVisaImagesAlias->fetchAll(array('member_fk' => $id), array('id' => 'DESC'));

        //Get all sponsor certificates
        $this->load->model( CLUB_VIEWS . '/model_sponsor_images', 'modelSponsorImagesAlias');
        $this->data['sponsor_images'] = $this->modelSponsorImagesAlias->fetchAll(array('member_fk' => $id), array('id' => 'DESC'));

        $this->load->view($this->layout, $this->data);

    }

}
