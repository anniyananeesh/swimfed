<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clubs extends CI_Controller
{

    protected $data;
    protected $userSession;

    public function __construct() {

       parent::__construct();
       $this->data = array();
       $this->data['user'] = $this->userSession = $this->session->userdata('data_logged');
    }

    public function inbox_partial($search = "") {

        $this->load->model(CLUB_VIEWS . '/model_messages', 'modelMessageAlias');

        $fields = array(
            TBL_MESSAGES . '.*'
        );

        $this->data['noEmails'] = false;
        $this->data['fileUpPath'] = ATTACHMENTS_UP_PATH;
        $this->data['fileShowPath'] = ATTACHMENTS_SHOW_PATH;

        //Club images thumb and full image folders;
        $this->data['imgFullShowPath'] = CLUBS_SHOW_PATH;

        $this->data['dateToday'] = date('Y-m-d');
        $this->data['dateYesterday'] = date("Y-m-d", strtotime("-1 days"));

        //Messages inbox
        //TBL_CLUBS.'.club_code LIKE' => $search . "%q", TBL_CLUBS.'.name LIKE' => $search . "%q",
        $records= $this->modelMessageAlias->fetchFields($fields, array( TBL_MESSAGES.'.message LIKE' => "%" . $search . "%", TBL_MESSAGES . '.label' => 'Inbox', TBL_MESSAGES . '.to_fk' => $this->mencrypt->decode($this->userSession['user_id'])), array( TBL_MESSAGES.'.created_on' => 'DESC'));

        $sortedData = array();

        if($records) {

            foreach ($records as $element) {

                $date = date("Y-m-d", strtotime($element->created_on));

                if ( ! isSet($sortedData[$date]) ) {
                    $sortedData[$date] = array($element);
                } else {
                    $sortedData[$date][] = $element;
                }

            }

        }

        //If sorted data has no values then make it null
        $this->data["records"] = (!empty($sortedData)) ? $sortedData : NULL;

        //Check if all emails count is zero then noEmails set condition will be false
        $this->data['noEmails'] = (count($this->data["records"]) == 0) ? true : false;

        $this->load->view(CLUB_VIEWS . "/partials/inbox-partial", $this->data);
    }


    public function send_message_partial($search = "") {

        $this->load->model(CLUB_VIEWS . '/model_messages', 'modelMessageAlias');

        $fields = array(
            TBL_MESSAGES . '.*'
        );

        $this->data['noEmails'] = false;
        $this->data['fileUpPath'] = ATTACHMENTS_UP_PATH;
        $this->data['fileShowPath'] = ATTACHMENTS_SHOW_PATH;

        //Club images thumb and full image folders;
        $this->data['imgFullShowPath'] = CLUBS_SHOW_PATH;

        $this->data['dateToday'] = date('Y-m-d');
        $this->data['dateYesterday'] = date("Y-m-d", strtotime("-1 days"));

        //Messages inbox
        //TBL_CLUBS.'.club_code LIKE' => $search . "%q", TBL_CLUBS.'.name LIKE' => $search . "%q",
        $records= $this->modelMessageAlias->fetchFields($fields, array( TBL_MESSAGES.'.message LIKE' => "%" . $search . "%", TBL_MESSAGES . '.label' => 'Inbox', TBL_MESSAGES . '.from_fk ' => $this->mencrypt->decode($this->userSession['user_id'])), array( TBL_MESSAGES.'.created_on' => 'DESC'));

        $sortedData = array();

        if($records) {

            foreach ($records as $element) {

                $date = date("Y-m-d", strtotime($element->created_on));

                if ( ! isSet($sortedData[$date]) ) {
                    $sortedData[$date] = array($element);
                } else {
                    $sortedData[$date][] = $element;
                }

            }

        }

        //If sorted data has no values then make it null
        $this->data["records"] = (!empty($sortedData)) ? $sortedData : NULL;

        //Check if all emails count is zero then noEmails set condition will be false
        $this->data['noEmails'] = (count($this->data["records"]) == 0) ? true : false;

        $this->load->view(CLUB_VIEWS . "/partials/send-messages-partial", $this->data);
    }

    public function trash_partial($search = "") {

        $this->load->model(CLUB_VIEWS . '/model_messages', 'modelMessageAlias');

        $fields = array(
            TBL_MESSAGES . '.*'
        );

        $this->data['noEmails'] = false;
        $this->data['fileUpPath'] = ATTACHMENTS_UP_PATH;
        $this->data['fileShowPath'] = ATTACHMENTS_SHOW_PATH;

        //Club images thumb and full image folders;
        $this->data['imgFullShowPath'] = CLUBS_SHOW_PATH;

        $this->data['dateToday'] = date('Y-m-d');
        $this->data['dateYesterday'] = date("Y-m-d", strtotime("-1 days"));

        //Messages inbox
        //TBL_CLUBS.'.club_code LIKE' => $search . "%q", TBL_CLUBS.'.name LIKE' => $search . "%q",
        $records= $this->modelMessageAlias->fetchFields($fields, array( TBL_MESSAGES.'.message LIKE' => "%" . $search . "%", TBL_MESSAGES . '.label' => 'Trash', TBL_MESSAGES . '.to_fk ' => $this->mencrypt->decode($this->userSession['user_id'])), array( TBL_MESSAGES.'.created_on' => 'DESC'), null, null, $join);

        $sortedData = array();

        if($records) {

            foreach ($records as $element) {

                $date = date("Y-m-d", strtotime($element->created_on));

                if ( ! isSet($sortedData[$date]) ) {
                    $sortedData[$date] = array($element);
                } else {
                    $sortedData[$date][] = $element;
                }

            }

        }

        //If sorted data has no values then make it null
        $this->data["records"] = (!empty($sortedData)) ? $sortedData : NULL;

        //Check if all emails count is zero then noEmails set condition will be false
        $this->data['noEmails'] = (count($this->data["records"]) == 0) ? true : false;

        $this->load->view(CLUB_VIEWS . "/partials/trash-partial", $this->data);
    }

    public function inbox_message_delete() {

        if(isset($_POST['emails'])) {

            if(is_array($_POST['emails']) && count($_POST['emails']) > 0 && !empty($_POST['emails'])) {

                $this->load->model(CLUB_VIEWS . '/model_messages', 'modelMessageAlias');

                foreach ($_POST['emails'] as $key => $value) {
                    $this->modelMessageAlias->save(array('label' => 'Trash'), array('id' => $this->mencrypt->decode($value)));
                }

                $this->data = array('code' => 200, 'message' => 'success', 'data' => array());
            }else {

               $this->data = array('code' => 400, 'message' => 'data error', 'data' => array());
            }


        } else {

            $this->data = array('code' => 400, 'message' => 'Error: no data', 'data' => array());
        }

        echo json_encode($this->data);

    }

    public function trash_message_delete() {

        if(isset($_POST['emails'])) {

            if(is_array($_POST['emails']) && count($_POST['emails']) > 0 && !empty($_POST['emails'])) {

                $this->load->model(CLUB_VIEWS . '/model_messages', 'modelMessageAlias');

                foreach ($_POST['emails'] as $key => $value) {
                    $this->modelMessageAlias->delete(array('id' => $this->mencrypt->decode($value)));
                }

                $this->data = array('code' => 200, 'message' => 'success', 'data' => array());
            }else {

               $this->data = array('code' => 400, 'message' => 'data error', 'data' => array());
            }


        } else {

            $this->data = array('code' => 400, 'message' => 'Error: no data', 'data' => array());
        }

        echo json_encode($this->data);

    }

    public function trash_single_email_delete() {

        if(!empty($_POST['email'])) {

            $this->load->model(CLUB_VIEWS . '/model_messages', 'modelMessageAlias');

            $this->modelMessageAlias->delete(array('id' => $this->mencrypt->decode($_POST['email'])));
            $this->data = array('code' => 200, 'message' => 'success', 'data' => array());
        }else {

           $this->data = array('code' => 400, 'message' => 'data error', 'data' => array());
        }

        echo json_encode($this->data);

    }

    public function trash_move_inbox() {

        if(isset($_POST['emails'])) {

            if(is_array($_POST['emails']) && count($_POST['emails']) > 0 && !empty($_POST['emails'])) {

                $this->load->model(CLUB_VIEWS . '/model_messages', 'modelMessageAlias');

                foreach ($_POST['emails'] as $key => $value) {
                    $this->modelMessageAlias->save(array('label' => 'Inbox'), array('id' => $this->mencrypt->decode($value)));
                }

                $this->data = array('code' => 200, 'message' => 'success', 'data' => array());
            }else {

               $this->data = array('code' => 400, 'message' => 'data error', 'data' => array());
            }


        } else {

            $this->data = array('code' => 400, 'message' => 'Error: no data', 'data' => array());
        }

        echo json_encode($this->data);

    }

    public function inbox_reply_email(){

        if(isset($_POST)) {

            if(isset($_POST['message']) && $_POST['message'] != "") {

                $this->load->model(CLUB_VIEWS . '/model_messages', 'modelMessageAlias');

                $data_array = array(
                    'from_fk' => $_POST['fromID'],
                    'to_fk' => $this->mencrypt->decode($_POST['toID']),
                    'message' => $_POST['message'],
                    'label' => 'Inbox',
                    'created_on' => date('Y-m-d h:i:s a')
                );

                $this->modelMessageAlias->save($data_array);

                $this->data = array('code' => 200, 'message' => 'success', 'data' => array());
            } else {

                $this->data = array('code' => 400, 'message' => 'Error: no data', 'data' => array());
            }

        }  else {
            $this->data = array('code' => 400, 'message' => 'Error: no data', 'data' => array());
        }

        echo json_encode($this->data);

    }

    public function inbox_single_email_trash() {

        if(!empty($_POST['email'])) {

            $this->load->model(CLUB_VIEWS . '/model_messages', 'modelMessageAlias');

            $this->modelMessageAlias->save(array('label' => 'Trash'), array('id' => $this->mencrypt->decode($_POST['email'])));
            $this->data = array('code' => 200, 'message' => 'success', 'data' => array());
        }else {

           $this->data = array('code' => 400, 'message' => 'data error', 'data' => array());
        }

        echo json_encode($this->data);

    }

    public function inbox_set_mark_status() {

        if(isset($_POST)) {

            if(isset($_POST['mark']) && isset($_POST['email']) && $_POST['mark'] == 'Y') {

                $this->load->model(CLUB_VIEWS . '/model_messages', 'modelMessageAlias');

                $this->modelMessageAlias->save(array('is_read' => 'Y'), array('id' => $this->mencrypt->decode($_POST['email'])));
                $countUnreadEmails = $this->modelMessageAlias->countAllRecordsByCond(array('is_read' => 'N', 'to_fk' => 0));

                $this->data = array('code' => 200, 'message' => 'success', 'data' => $countUnreadEmails);

            }

        }else {

           $this->data = array('code' => 400, 'message' => 'data error', 'data' => array());
        }

        echo json_encode($this->data);

    }

    public function send_card_email() {

        if(isset($_POST)) {

            if(isset($_POST['image']) && isset($_POST['email'])) {

              include_once(MISC_PATH."/emails.php");
              $message = $id_card_email;

              $this->load->library('My_PHPMailer');
              $mail = new PHPMailer();
              $mail->IsSMTP();
              $mail->isHTML(true);
              $mail->SMTPAuth   = true;
              $mail->SMTPSecure = "tls";
              $mail->Host       = 'smtp.gmail.com';
              $mail->Port       = 587;
              $mail->Username   = 'aneesh.dgweb@gmail.com';
              $mail->Password   = 'dexterlab@2012';
              $mail->SetFrom(INFO_EMAIL, '<Support Desk>');
              $mail->AddReplyTo(INFO_EMAIL, '<Support Desk>');
              $mail->Subject    = SITE_NAME.' - Your Club ID Card is here';
              $mail->Body      =  $message;
              $mail->AltBody    = '---';
              $mail->AddAddress($_POST['email'],'');
              $mail->addAttachment(CARD_UP_PATH . '/' . $_POST['image'], 'ID_Card.jpg');

              if(!$mail->send()) {
                  $this->data = array('code' => 400, 'message' => 'mail relay error', 'data' => array('info' => $mail->ErrorInfo));
              } else {
                  $this->data = array('code' => 200, 'message' => 'success', 'data' => array());
              }

            }

        }else {

           $this->data = array('code' => 400, 'message' => 'data error', 'data' => array());
        }

        echo json_encode($this->data);

    }

    public function send_password_club() {

          if(isset($_POST)) {

              if(isset($_POST['user'])) {

                  $this->load->model(CLUB_VIEWS . '/model_clubs', 'modelClubAlias');
                  $record = $this->modelClubAlias->fetchById($this->mencrypt->decode($_POST['user']));

                  $full_name = $record->name;
                  $password = $record->r_password;

                  include_once(MISC_PATH."/emails.php");
                  $message = $new_password_reset;

                  $this->load->library('My_PHPMailer');
                  $mail = new PHPMailer();
                  $mail->IsSMTP();
                  $mail->isHTML(true);
                  $mail->SMTPAuth   = true;
                  $mail->SMTPSecure = "tls";
                  $mail->Host       = 'smtp.gmail.com';
                  $mail->Port       = 587;
                  $mail->Username   = 'aneesh.dgweb@gmail.com';
                  $mail->Password   = 'dexterlab@2012';
                  $mail->SetFrom(INFO_EMAIL, '<Support Desk>');
                  $mail->AddReplyTo(INFO_EMAIL, '<Support Desk>');
                  $mail->Subject    = SITE_NAME.' - Your password is here';
                  $mail->Body      =  $message;
                  $mail->AltBody    = '---';
                  $mail->AddAddress($record->email,$record->name);

                  if(!$mail->send()) {
                      $this->data = array('code' => 400, 'message' => 'mail relay error', 'data' => array('info' => $mail->ErrorInfo));
                  } else {
                      $this->data = array('code' => 200, 'message' => 'success', 'data' => array());
                  }

              }

          }else {

             $this->data = array('code' => 400, 'message' => 'data error', 'data' => array());
          }

          echo json_encode($this->data);

    }

    public function upload_member_image() {

        $output_dir = MEMBER_UP_PATH .'/';

        if (isset($_FILES["myfile"])) {

            $ret = array();

            $error = $_FILES["myfile"]["error"];

            if (!is_array($_FILES["myfile"]["name"]))  {

                $fileName = $_FILES["myfile"]["name"];

                $Image1Name = substr(md5(uniqid(rand())), 0, 15);
                $Image1Name = "IMG-" . $Image1Name . strrchr($fileName, ".");

                move_uploaded_file($_FILES["myfile"]["tmp_name"], $output_dir . $Image1Name);
                $ret['file'] = $Image1Name;

            }  else  {

                $fileCount = count($_FILES["myfile"]["name"]);

                for ($i = 0; $i < $fileCount; $i++) {

                    $fileName = $_FILES["myfile"]["name"][$i];

                    $Image1Name = substr(md5(uniqid(rand())), 0, 15);
                    $Image1Name = "IMG-" . $Image1Name . strrchr($fileName, ".");

                    move_uploaded_file($_FILES["myfile"]["tmp_name"][$i], $output_dir . $Image1Name);
                    $ret['file'] = $Image1Name;

                }

            }

            echo json_encode($ret);

        }

    }

    public function upload_other_details() {

        $output_dir = PASSPORT_UP_PATH . '/';

        if (isset($_FILES["myfilepassport"])) {

            $ret = array();

            $error = $_FILES["myfilepassport"]["error"];

            if (!is_array($_FILES["myfilepassport"]["name"]))  {

                $fileName = $_FILES["myfilepassport"]["name"];

                $Image1Name = substr(md5(uniqid(rand())), 0, 15);
                $Image1Name = "IMG-" . $Image1Name . strrchr($fileName, ".");

                move_uploaded_file($_FILES["myfilepassport"]["tmp_name"], $output_dir . $Image1Name);
                $ret['file'] = $Image1Name;

            }  else  {

                $fileCount = count($_FILES["myfilepassport"]["name"]);

                for ($i = 0; $i < $fileCount; $i++) {

                    $fileName = $_FILES["myfilepassport"]["name"][$i];

                    $Image1Name = substr(md5(uniqid(rand())), 0, 15);
                    $Image1Name = "IMG-" . $Image1Name . strrchr($fileName, ".");

                    move_uploaded_file($_FILES["myfilepassport"]["tmp_name"][$i], $output_dir . $Image1Name);
                    $ret['file'] = $Image1Name;

                }

            }

            echo json_encode($ret);

        }

    }

    public function upload_sponsor() {

        $output_dir = SPONSOR_UP_PATH . '/';

        if (isset($_FILES["sponsorfile"])) {

            $ret = array();

            $error = $_FILES["sponsorfile"]["error"];

            if (!is_array($_FILES["sponsorfile"]["name"]))  {

                $fileName = $_FILES["sponsorfile"]["name"];

                $Image1Name = substr(md5(uniqid(rand())), 0, 15);
                $Image1Name = "IMG-" . $Image1Name . strrchr($fileName, ".");

                move_uploaded_file($_FILES["sponsorfile"]["tmp_name"], $output_dir . $Image1Name);
                $ret['file'] = $Image1Name;

            }  else  {

                $fileCount = count($_FILES["sponsorfile"]["name"]);

                for ($i = 0; $i < $fileCount; $i++) {

                    $fileName = $_FILES["sponsorfile"]["name"][$i];

                    $Image1Name = substr(md5(uniqid(rand())), 0, 15);
                    $Image1Name = "IMG-" . $Image1Name . strrchr($fileName, ".");

                    move_uploaded_file($_FILES["sponsorfile"]["tmp_name"][$i], $output_dir . $Image1Name);
                    $ret['file'] = $Image1Name;

                }

            }

            echo json_encode($ret);

        }

    }

    public function upload_club_certificate() {

        $output_dir = CLUB_CERTI_UP_PATH . '/';

        if (isset($_FILES["clubfile"])) {

            $ret = array();

            $error = $_FILES["clubfile"]["error"];

            if (!is_array($_FILES["clubfile"]["name"]))  {

                $fileName = $_FILES["clubfile"]["name"];

                $Image1Name = substr(md5(uniqid(rand())), 0, 15);
                $Image1Name = "IMG-" . $Image1Name . strrchr($fileName, ".");

                move_uploaded_file($_FILES["clubfile"]["tmp_name"], $output_dir . $Image1Name);
                $ret['file'] = $Image1Name;

            }  else  {

                $fileCount = count($_FILES["clubfile"]["name"]);

                for ($i = 0; $i < $fileCount; $i++) {

                    $fileName = $_FILES["clubfile"]["name"][$i];

                    $Image1Name = substr(md5(uniqid(rand())), 0, 15);
                    $Image1Name = "IMG-" . $Image1Name . strrchr($fileName, ".");

                    move_uploaded_file($_FILES["clubfile"]["tmp_name"][$i], $output_dir . $Image1Name);
                    $ret['file'] = $Image1Name;

                }

            }

            echo json_encode($ret);

        }

    }

    public function add_member() {

        $postdata = file_get_contents("php://input");
        $request  = json_decode($postdata);
        $this->load->model( CLUB_VIEWS . '/model_members', 'modelNameAlias');
        $user = $this->session->userdata('data_logged');

        $error = FALSE;

        @$first_name = $request->first_name;
        @$last_name = $request->last_name;
        @$father_name = $request->father_name;
        @$gender = $request->gender;
        @$dob = $request->dob;
        @$passport_no = $request->passport_no;
        @$passport_expiry = $request->passport_expiry;
        @$country = $request->country;
        @$city = $request->city;
        @$emirate = $request->emirate;
        @$contact_no = $request->contact_no;
        @$discipline = $request->discipline;
        @$note = $request->note;
        @$type = $request->type;

        $memCode = $this->modelNameAlias->genMemberCode();

        if (!$error) {

            $data_array = array(
                'code' => $memCode,
                'first_name' => @$first_name,
                'image1' =>  NULL,
                'last_name' => @$last_name,
                'father_name' => @$father_name,
                'gender' => @$gender,
                'city' => @$city,
                'emirate' => @$emirate,
                'country' => @$country,
                'contact_no' => @$contact_no,
                'club_fk' => $this->mencrypt->decode($user['user_id']),
                'discipline' => @$discipline,
                'note' => @$note,
                'type' => @$type,
                'dob' => @$dob,
                'passport_no' => @$passport_no,
                'passport_expiry' => @$passport_expiry,
                'id_card1' => NULL,
                'image_club_certificate' => NULL,
                'created_on' => date('Y-m-d h:i:s A'),
                'updated_on' => date('Y-m-d h:i:s A')
            );

            $id = $this->modelNameAlias->save($data_array);

            if ($id) {

                $data = array(
                    'error' => FALSE,
                    'data' => array(
                        'key' => $id,
                        'code' => $memCode,
                        'name' => @$first_name . ' ' . @$last_name
                    ),
                    'message' => 'account created',
                    'code' => 200
                );

            } else {

                $data = array(
                    'error' => TRUE,
                    'message' => 'Something went wrong :(',
                    'code' => 400
                );

            }

        }

        echo json_encode($data);

    }

    public function set_profile_image() {

        $postdata = file_get_contents("php://input");
        $request  = json_decode($postdata);
        $this->load->model( CLUB_VIEWS . '/model_members', 'modelNameAlias');

        @$id = $request->id;
        @$file = $request->file;

        $save = array(
           'image1' => @$file
        );

        $id = $this->modelNameAlias->save($save, array('id' => @$id));

        if ($id) {

            $data = array(
                'error' => FALSE,
                'message' => 'account updated'
            );

        } else {

            $data = array(
                'error' => TRUE,
                'message' => 'Something went wrong :('
            );
        }

        echo json_encode($data);

    }

    public function set_visa_image() {

        $postdata = file_get_contents("php://input");
        $request  = json_decode($postdata);
        $this->load->model( CLUB_VIEWS . '/model_visa_images', 'modelNameAlias');

        @$id = $request->id;
        @$file = $request->file;

        $save = array(
           'member_fk' => @$id,
           'image_url' => @$file
        );

        $id = $this->modelNameAlias->save($save);

        if ($id) {

            $data = array(
                'error' => FALSE,
                'message' => 'account updated'
            );

        } else {

            $data = array(
                'error' => TRUE,
                'message' => 'Something went wrong :('
            );
        }

        echo json_encode($data);

    }

    public function set_sponsor_details() {

        $postdata = file_get_contents("php://input");
        $request  = json_decode($postdata);
        $this->load->model( CLUB_VIEWS . '/model_sponsor_images', 'modelNameAlias');

        @$id = $request->id;
        @$file = $request->file;

        $save = array(
           'member_fk' => @$id,
           'image_url' => @$file
        );

        $id = $this->modelNameAlias->save($save);

        if ($id) {

            $data = array(
                'error' => FALSE,
                'message' => 'account updated'
            );

        } else {

            $data = array(
                'error' => TRUE,
                'message' => 'Something went wrong :('
            );
        }

        echo json_encode($data);

    }

    public function set_club_certificate() {

        $postdata = file_get_contents("php://input");
        $request  = json_decode($postdata);
        $this->load->model( CLUB_VIEWS . '/model_members', 'modelNameAlias');

        @$id = $request->id;
        @$file = $request->file;

        $save = array(
           'image_club_certificate' => @$file
        );

        $id = $this->modelNameAlias->save($save, array('id' => @$id));

        if ($id) {

            $data = array(
                'error' => FALSE,
                'message' => 'account updated'
            );

        } else {

            $data = array(
                'error' => TRUE,
                'message' => 'Something went wrong :('
            );
        }

        echo json_encode($data);

    }

}
