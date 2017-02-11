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


    public function inbox_partial($search = "") {

        $this->load->model(ADMIN_VIEWS . '/model_messages', 'modelMessageAlias');

        $join = array(
            array('table' => TBL_CLUBS, 'condition' => TBL_CLUBS . '.id = ' . TBL_MESSAGES . '.from_fk', 'join' => 'LEFT')
        );

        $fields = array(
            TBL_CLUBS . '.name as club_name',
            TBL_CLUBS . '.image1 as club_logo',
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
        $records= $this->modelMessageAlias->fetchFields($fields, array( TBL_CLUBS.'.name LIKE' => $search . "%", TBL_MESSAGES . '.label' => 'Inbox', TBL_MESSAGES . '.to_fk' => 0), array( TBL_MESSAGES.'.created_on' => 'DESC'), null, null, $join);

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

        $this->load->view(ADMIN_VIEWS . "/partials/inbox-partial", $this->data);
    }


    public function send_message_partial($search = "") {

        $this->load->model(ADMIN_VIEWS . '/model_messages', 'modelMessageAlias');

        $join = array(
            array('table' => TBL_CLUBS, 'condition' => TBL_CLUBS . '.id = ' . TBL_MESSAGES . '.to_fk', 'join' => 'LEFT')
        );

        $fields = array(
            TBL_CLUBS . '.name as club_name',
            TBL_CLUBS . '.image1 as club_logo',
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
        $records= $this->modelMessageAlias->fetchFields($fields, array( TBL_CLUBS.'.name LIKE' => $search . "%", TBL_MESSAGES . '.label' => 'Inbox', TBL_MESSAGES . '.from_fk ' => 0), array( TBL_MESSAGES.'.created_on' => 'DESC'), null, null, $join);

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

        $this->load->view(ADMIN_VIEWS . "/partials/send-messages-partial", $this->data);
    }

    public function trash_partial($search = "") {

        $this->load->model(ADMIN_VIEWS . '/model_messages', 'modelMessageAlias');

        $join = array(
            array('table' => TBL_CLUBS, 'condition' => TBL_CLUBS . '.id = ' . TBL_MESSAGES . '.from_fk', 'join' => 'LEFT')
        );

        $fields = array(
            TBL_CLUBS . '.name as club_name',
            TBL_CLUBS . '.image1 as club_logo',
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
        $records= $this->modelMessageAlias->fetchFields($fields, array( TBL_CLUBS.'.name LIKE' => $search . "%", TBL_MESSAGES . '.label' => 'Trash', TBL_MESSAGES . '.to_fk ' => 0), array( TBL_MESSAGES.'.created_on' => 'DESC'), null, null, $join);

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

        $this->load->view(ADMIN_VIEWS . "/partials/trash-partial", $this->data);
    }

    public function inbox_message_delete() {

        if(isset($_POST['emails'])) {

            if(is_array($_POST['emails']) && count($_POST['emails']) > 0 && !empty($_POST['emails'])) {

                $this->load->model(ADMIN_VIEWS . '/model_messages', 'modelMessageAlias');

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

                $this->load->model(ADMIN_VIEWS . '/model_messages', 'modelMessageAlias');

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

            $this->load->model(ADMIN_VIEWS . '/model_messages', 'modelMessageAlias');

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

                $this->load->model(ADMIN_VIEWS . '/model_messages', 'modelMessageAlias');

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

                $this->load->model(ADMIN_VIEWS . '/model_messages', 'modelMessageAlias');

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

            $this->load->model(ADMIN_VIEWS . '/model_messages', 'modelMessageAlias');

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

                $this->load->model(ADMIN_VIEWS . '/model_messages', 'modelMessageAlias');

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

                  $this->load->model(ADMIN_VIEWS . '/model_clubs', 'modelClubAlias');
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

}
