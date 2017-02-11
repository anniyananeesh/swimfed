<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Card extends MY_Controller {

    protected $viewFolder;
    protected $className;

    protected $imageUpPath = CARD_UP_PATH;
    protected $imageShowPath = CARD_SHOW_PATH;

    public function __construct() {

        parent::__construct();
        $this->viewFolder = ADMIN_VIEWS . '/card';
        $this->data['menuActive'] = 'card';
        $this->data['ctrlUrl'] = HOST_URL . "/" . ADMIN_URL . "/Card";
        $this->load->model( ADMIN_VIEWS . '/model_clubs', 'modelNameAlias');
        $this->load->model( ADMIN_VIEWS . '/model_members', 'modelMemberAlias');
        $this->className = 'Card';

    }

    public function create() {

        $this->data['content'] = $this->viewFolder . '/create';

        $post['first_name'] = '';
        $post['last_name'] = '';
        $post['father_name'] = '';
        $post['email'] = '';
        $post['code'] = '';
        $post['dob'] = '';
        $post['club_name'] = '';
        $post['type'] = '';
        $post['age'] = '';

        $this->data['post'] = $post;
        $this->data['card_image'] = NULL;
        $this->data['imageShowPath'] = $this->imageShowPath;

        $error = false;
        $fileName = NULL;
        $uploadstatus = '';

        if($this->input->post()) {

            $this->data['post'] = $this->input->post();

            $this->load->library('form_validation');

            $this->form_validation->set_rules('first_name', 'First name', 'trim|required|xss_clean');
            $this->form_validation->set_rules('last_name', 'Last name', 'trim|required|xss_clean');
            $this->form_validation->set_rules('father_name', 'Father name', 'trim|required|xss_clean');
            $this->form_validation->set_rules('email', 'Email address', 'trim|valid_email|required|xss_clean');
            $this->form_validation->set_rules('code', 'Member code', 'trim|required|xss_clean');
            $this->form_validation->set_rules('dob', 'Date of birth', 'trim|required|xss_clean');
            $this->form_validation->set_rules('club_name', 'Club name', 'trim|required|xss_clean');
            $this->form_validation->set_rules('type', 'Member type', 'trim|required|xss_clean');
            $this->form_validation->set_rules('age', 'Age', 'trim|required|xss_clean');

            $image_name        = $_FILES["userfile"]["name"];
            $image_tmp_name    = $_FILES["userfile"]["tmp_name"];

            if(empty($image_name)) {

                $this->data['Error'] = 'Y';
                $this->data['MSG'] = 'Upload an image for the ID Card';
                $error = true;
            }

            $this->form_validation->set_error_delimiters('', '');

            if($this->form_validation->run() == TRUE && !$error) {

                  if (!empty($image_name))
                  {
                      $fileAttrs = array(
                          'imgPath' => $this->imageUpPath,
                          'maxSize' => '800',
                          'maxWidth' => '320',
                          'maxHeight' => '320',
                          'createThumb' => false
                      );

                      $upload_array   =  $this->upload_image('userfile', $image_name, NULL, $fileAttrs);
                      $ImageName     =   (isset($upload_array["ImageName"])) ? $upload_array["ImageName"] : '';
                      $this->data["MSG"]    =   (isset($upload_array["msg"])) ? $upload_array["msg"] : '';
                      $this->data["Error"]  =   (isset($upload_array["err"])) ? $upload_array["err"] : '';
                      $uploadstatus   =   (isset($upload_array["ups"])) ? $upload_array["ups"] : '';
                  }

                  if($uploadstatus != "Error") {

                      include_once(APPPATH . "/libraries/Image.php");

                      $image = new Image(false, CARD_UP_PATH);
                      $this->data['card_image'] = $image->drawIDCard( $this->input->post(), CARD_UP_PATH . '/' . $ImageName, true);

                      $this->data['Error'] = 'N';
                      $this->data['MSG'] = 'Successfully generated the id card';
                  }

            }

        }

        $this->load->view($this->layout, $this->data);

    }

    public function autogenerate() {

        $this->data['content'] = $this->viewFolder . '/autogenerate';

        $post['member_code'] = '';
        $this->data['post'] = $post;

        $this->data['card_image'] = NULL;
        $this->data['imageShowPath'] = $this->imageShowPath;

        if($this->input->post()) {

              $this->data['post'] = $this->input->post();

              $this->load->library('form_validation');
              $this->form_validation->set_rules('member_code', 'Member code', 'trim|required|xss_clean');
              $this->form_validation->set_error_delimiters('', '');

              if($this->form_validation->run() == TRUE && !$error) {

                  $this->load->model( ADMIN_VIEWS . '/model_members', 'modelMembersAlias');

                  $join = array(
                      array('table' => TBL_CLUBS, 'condition' => TBL_CLUBS . '.id = ' . TBL_MEMBERS . '.club_fk', 'join' => 'LEFT')
                  );

                  $fields = array(
                      TBL_CLUBS . '.name as club_name',
                      TBL_CLUBS . '.email',
                      TBL_MEMBERS . '.first_name',
                      TBL_MEMBERS . '.last_name',
                      TBL_MEMBERS . '.father_name',
                      TBL_MEMBERS . '.dob',
                      TBL_MEMBERS . '.type',
                      TBL_MEMBERS . '.code',
                      TBL_MEMBERS . '.is_active',
                      TBL_MEMBERS . '.club_fk',
                      TBL_MEMBERS . '.image1',
                      TBL_MEMBERS . '.country',
                      TBL_MEMBERS . '.id'
                  );

                  $member  =  $this->modelMembersAlias->fetchRowFields($fields, array('code' => $this->input->post("member_code", TRUE)), array(), $join);

                  if($member->is_active == 'Y') {

                      $data_array = array(
                          'first_name' => $member->first_name,
                          'last_name' => $member->last_name,
                          'father_name' => $member->father_name,
                          'dob' => $member->dob,
                          'type' => $member->type,
                          'age' => $this->ageCalculator($member->dob), // Dob shoul be in format mm/dd/YYYY
                          'club_name' => $member->club_name,
                          'country' => $member->country,
                          'code' => $member->code,
                      );

                      include_once(APPPATH . "/libraries/Image.php");

                      $image = new Image(false, MEMBER_UP_PATH);
                      $this->data['card_image'] = $image->drawIDCard( $data_array, MEMBER_UP_PATH . '/' . $member->image1, false);
                      $this->data['email'] = $member->email;

                      $data_member_array = array(
                          'id_card1' => $this->data['card_image']
                      );

                      $where = array(
                          'id' => $member->id
                      );

                      $this->modelMembersAlias->save( $data_member_array, $where);

                      //Move the image to cards folder
                      rename(MEMBER_UP_PATH . '/' . $this->data['card_image'], CARD_UP_PATH . '/' . $this->data['card_image']);

                      $this->data['Error'] = 'N';
                      $this->data['MSG'] = 'Successfully generated the id card';

                  } else {

                      $approvalUrl = HOST_URL . '/' . ADMIN_URL . '/Clubs/view_member/' . $this->mencrypt->encode($member->club_fk) . '/' . $this->mencrypt->encode($member->id);
                      $this->data['Error'] = 'Y';
                      $this->data['MSG'] = 'This member is not approved, please approve to generate ID card <a href="' . $approvalUrl . '"> Click here to approve</a>';
                  }


              }

        }

        $this->load->view($this->layout, $this->data);

    }

    private function ageCalculator($dob){

        if(!empty($dob)){

            $dob = explode('/', $dob);
            $dobFinal = $dob[1] . '/' . $dob[0] . '/' . $dob[2];

            $birthdate = date('Y', strtotime($dobFinal));
            $today = date('Y');
            $age = $today - $birthdate;
            return $age;
        }else{
            return 0;
        }

    }

    public function batch() {

          $this->data['content'] = $this->viewFolder . '/batch';

          $clubFields = array(
              'id',
              'name'
          );

          $this->data['clubs'] = $this->modelNameAlias->fetchFields($clubFields);

          $this->data['q'] = (isset($_GET) && $_GET['q'] != "") ? $_GET['q'] : "";

          $join = array(
             array('table' => TBL_CLUBS, 'condition' => TBL_CLUBS . '.id = ' . TBL_MEMBERS . '.club_fk', 'join' => 'LEFT')
          );

          $where = array(TBL_MEMBERS . '.is_active' => 'Y');

          if(isset($_GET) && $_GET['q'] != "") {
              $where[TBL_MEMBERS . '.first_name LIKE'] = $_GET['q'] . '%';
          }

          if(isset($_GET) && $_GET['type'] != "all" && $_GET['type'] != NULL) {
              $status = ($_GET['type'] == 'active') ? 'Y' : 'N' ;
              $where[TBL_MEMBERS . '.is_active'] = $status;
          }

          if(isset($_GET) && $_GET['club'] != "") {
              $where[TBL_MEMBERS . '.club_fk'] = $_GET['club'];
          }

          $fields = array(TBL_MEMBERS . '.*', TBL_CLUBS . '.name');

          $this->data['records'] = $this->modelMemberAlias->fetchFields($fields, $where, array(), null, null, $join);
          $this->load->view($this->layout, $this->data);

    }

    public function batch_print() {

        if(isset($_POST) && count($_POST['array_id']) > 0) {

            $join = array(
                array('table' => TBL_CLUBS, 'condition' => TBL_CLUBS . '.id = ' . TBL_MEMBERS . '.club_fk', 'join' => 'LEFT')
            );

            $fields = array(
                TBL_CLUBS . '.name as club_name',
                TBL_MEMBERS . '.first_name',
                TBL_MEMBERS . '.last_name',
                TBL_MEMBERS . '.father_name',
                TBL_MEMBERS . '.dob',
                TBL_MEMBERS . '.type',
                TBL_MEMBERS . '.code',
                TBL_MEMBERS . '.is_active',
                TBL_MEMBERS . '.club_fk',
                TBL_MEMBERS . '.image1',
                TBL_MEMBERS . '.country',
                TBL_MEMBERS . '.id'
            );

            //Keep uploaded photos into this array
            $cardImageCreated = array();

            foreach ($_POST['array_id'] as $key => $value) {

                $member = $this->modelMemberAlias->fetchRowFields($fields, array(TBL_MEMBERS . '.id' => $this->mencrypt->decode($value)), array(), $join);

                if($member->is_active == 'Y') {

                    $data_array = array(
                        'first_name' => $member->first_name,
                        'last_name' => $member->last_name,
                        'father_name' => $member->father_name,
                        'dob' => $member->dob,
                        'type' => $member->type,
                        'age' => $this->ageCalculator($member->dob), // Dob shoul be in format mm/dd/YYYY
                        'club_name' => $member->club_name,
                        'country' => $member->country,
                        'code' => $member->code,
                    );

                    include_once(APPPATH . "/libraries/Image.php");

                    $image = new Image(false, MEMBER_UP_PATH);
                    $this->data['card_image'] = $image->drawIDCard( $data_array, MEMBER_UP_PATH . '/' . $member->image1, false);

                    $data_member_array = array(
                        'id_card1' => $this->data['card_image']
                    );

                    $where = array(
                        'id' => $member->id
                    );

                    $this->modelMemberAlias->save( $data_member_array, $where);

                    //Move the image to cards folder
                    rename(MEMBER_UP_PATH . '/' . $this->data['card_image'], CARD_UP_PATH . '/' . $this->data['card_image']);

                    //Push the card created to a temp array
                    array_push($cardImageCreated, array('file' => CARD_UP_PATH . '/' . $this->data['card_image'], 'name' => 'IDCard_' . $member->code .'.png'));

                }

            }

            //Create a zip file and download the images
            $zip = new ZipArchive(); // Load zip library
            $zip_temp_name = 'IDCards_' . time(); // Zip name
            $zip_name = $zip_temp_name . ".zip";

            if($zip->open($zip_name, ZIPARCHIVE::CREATE)!==TRUE) {

                $this->session->set_flashdata('error_message', 'Sorry zip file creation failed!');
                redirect($this->data['ctrlUrl'] . '/batch');
            }

            foreach($cardImageCreated as $file) {
                if(file_exists($file['file'])) { $zip->addFile($file['file'], $zip_temp_name . '/' . $file['name']); } // Adding files into zip
            }

            $zip->close();

            if(file_exists($zip_name)) {
                // push to download the zip
                header('Content-type: application/zip');
                header('Content-Disposition: attachment; filename="'.$zip_name.'"');
                readfile($zip_name);
                // remove zip file is exists in temp path
                unlink($zip_name);
            }

        } else {

            $this->session->set_flashdata('error_message', ' No member chosen');
            redirect($this->data['ctrlUrl'] . '/batch');
        }

    }

}
