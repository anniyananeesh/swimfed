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

                $this->load->library('email');
                $this->config->load('email',true);
                $this->email->from(INFO_EMAIL);
                $this->email->to($_POST['email']);
                $this->email->subject(SITE_NAME.' - Your Club ID Card is here');

                include_once(MISC_PATH."/emails.php");
                $message = $id_card_email;

                $this->email->attach(CARD_UP_PATH . '/' . $_POST['image']);
                $this->email->message($message);

                if ($this->email->send()) {
                    $this->data = array('code' => 200, 'message' => 'success', 'data' => array());
                } else {
                    $this->data = array('code' => 400, 'message' => 'mail relay error', 'data' => array());
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

                  $this->load->library('email');
                  $this->config->load('email',true);
                  $this->email->from(INFO_EMAIL);
                  $this->email->to($record->email);
                  $this->email->subject(SITE_NAME.' - Your password is here');

                  $full_name = $record->name;
                  $password = $record->r_password;

                  include_once(MISC_PATH."/emails.php");
                  $message = $new_password_reset;

                  $this->email->message($message);

                  if ($this->email->send()) {
                      $this->data = array('code' => 200, 'message' => 'success', 'data' => array());
                  } else {
                      $this->data = array('code' => 400, 'message' => 'mail relay error', 'data' => array());
                  }

              }

          }else {

             $this->data = array('code' => 400, 'message' => 'data error', 'data' => array());
          }

          echo json_encode($this->data);

    }

}
