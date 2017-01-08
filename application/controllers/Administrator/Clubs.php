<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clubs extends MY_Controller {

    protected $viewFolder;
    protected $className;

    protected $imageShowPath = CLUBS_SHOW_PATH;
    protected $memberShowPath = MEMBER_SHOW_PATH;
    protected $passportShowPath = PASSPORT_SHOW_PATH;
    protected $cardShowPath = CARD_SHOW_PATH;

    public function __construct() {

        parent::__construct();
        $this->viewFolder = ADMIN_VIEWS . '/clubs';
        $this->data['menuActive'] = 'clubs';
        $this->data['ctrlUrl'] = HOST_URL . "/" . ADMIN_URL . "/Clubs";
        $this->load->model( ADMIN_VIEWS . '/model_clubs', 'modelNameAlias');
        $this->load->model( ADMIN_VIEWS . '/model_members', 'modelMembersAlias');

        $this->className = 'Clubs';

    }

    public function index() {

        $this->data['content'] = $this->viewFolder . '/index';

        if($this->input->post()) {

            $where = array(
               'name LIKE ' => $this->input->post('q', TRUE) . '%'
            );

            $this->data['records'] = $this->modelNameAlias->fetchAll($where);

        } else {
           $this->data['records'] = $this->modelNameAlias->fetchAll();
        }

        $this->load->view($this->layout, $this->data);
    }

    public function add() {

        $this->data['content'] = $this->viewFolder . '/add';

        $post['name'] = '';
        $post['club_code'] = '';
        $post['email'] = '';
        $post['username'] = '';
        $post['emirate'] = '';

        $this->data['post'] = $post;

        if($this->input->post()) {

            $this->data['post'] = $this->input->post();

            $this->load->library('form_validation');

            $this->form_validation->set_rules('name', 'Name', 'trim|required|xss_clean');
            $this->form_validation->set_rules('club_code', 'Club Code', 'trim|required|xss_clean');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean');
            //$this->form_validation->set_rules('emirate', 'Emirates', 'trim|required|xss_clean');
            $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean|callback_validate_username');
            $this->form_validation->set_rules('password', 'Password', 'trim|min_length[8]|max_length[12]|matches[cpassword]|required');
            $this->form_validation->set_rules('cpassword', 'Confirm Password', 'trim|required');

            $this->form_validation->set_message('required','Required %s field');
            $this->form_validation->set_message('matches','Passwords should be the same...!');
            $this->form_validation->set_error_delimiters('', '');

            if($this->form_validation->run() == TRUE) {

                $uniqueToken = $this->modelNameAlias->genUniqTkn($this->input->post("username", TRUE));
                $hashKey = $this->modelNameAlias->genPwdHashKey($this->input->post("password", TRUE), $uniqueToken);

                $data_array = array(
                    'name' => $this->input->post("name", TRUE),
                    'club_code' => $this->input->post("club_code", TRUE),
                    'email' => $this->input->post("email", TRUE),
                    'emirate' => $this->input->post("emirate", TRUE),
                    'username' => $this->input->post("username", TRUE),
                    'unique_token' => $uniqueToken,
                    'hash_key' => $hashKey,
                    'r_password' => $this->input->post("password", TRUE),
                    'created_on' => date('Y-m-d h:i:s A'),
                    'updated_on' => date('Y-m-d h:i:s A')
                );

                $this->modelNameAlias->save($data_array);

                //Send an email to the registered club email
                $full_name = $this->input->post("name", TRUE);
                $club_code = $this->input->post("club_code", TRUE);
                $email = $this->input->post("email", TRUE);
                $username = $this->input->post("username", TRUE);
                $password = $this->input->post("password", TRUE);

                $this->load->library('email');
                $this->config->load('email', true);
                $this->email->from('no-reply@avenirevents.com', $name);
                $this->email->to($email);
                $this->email->subject(SITE_NAME . ' - Your account has been created with us.');

                include_once(MISC_PATH . "/emails.php");
                $message = $activation_email;

                $this->email->message($message);
                $this->email->send(); //Email send to the club email

                $this->addLog($this->className . " added with new title :- ". $this->input->post("name", TRUE));

                $this->session->set_flashdata('success_message', $this->className . ' added');
                redirect($this->data['ctrlUrl']);

            }

        }

        $this->load->view($this->layout, $this->data);

    }

    public function validate_username($str)
    {
        $where = array('username' => $str);

        if($this->modelNameAlias->isExist($where)) {

            $this->form_validation->set_message('validate_username', 'Wait ! somebody already took this username :( | Try another one ...');
            return false;
        } else {

            return true;
        }

    }

    public function view($id) {

        $this->data['content'] = $this->viewFolder . '/view';
        $this->data['sidemenu_club_active'] = 'sidemenu-admin-clubs';
        $this->data['club_id'] = $id;
        $this->data['record'] = $this->modelNameAlias->fetchById($this->mencrypt->decode($id));

        $this->data['imageShowPath'] = $this->imageShowPath;

        $this->load->view($this->layout, $this->data);
    }

    public function members($id) {

        $this->data['content'] = $this->viewFolder . '/members';
        $this->data['sidemenu_club_active'] = 'sidemenu-admin-clubs';
        $this->data['club_id'] = $id;
        $this->data['q'] = (isset($_GET) && $_GET['q'] != "") ? $_GET['q'] : "";

        $join = array(
           array('table' => TBL_CLUBS, 'condition' => TBL_CLUBS . '.id = ' . TBL_MEMBERS . '.club_fk', 'join' => 'LEFT')
        );

        $where = array();
        $where['club_fk'] = $this->mencrypt->decode($id);

        if(isset($_GET) && $_GET['q'] != "") {
            $where['first_name LIKE'] = $_GET['q'] . '%';
        }

        if(isset($_GET) && $_GET['type'] != "all" && $_GET['type'] != NULL) {
            $where['current_status'] = $_GET['type'];
        }

        $fields = array(TBL_MEMBERS . '.*', TBL_CLUBS . '.name');

        $this->data['records'] = $this->modelMembersAlias->fetchFields($fields, $where, array(), null, null, $join);
        $this->load->view($this->layout, $this->data);

    }

    public function view_member($id, $memberID) {

        $this->data['content'] = $this->viewFolder . '/view_member';
        $this->data['sidemenu_club_active'] = 'sidemenu-admin-clubs';
        $this->data['club_id'] = $id;

        $this->data['memberShowPath'] = $this->memberShowPath;
        $this->data['passportShowPath'] = $this->passportShowPath;
        $this->data['cardShowPath'] = $this->cardShowPath;

        $join = array(
           array('table' => TBL_CLUBS, 'condition' => TBL_CLUBS . '.id = ' . TBL_MEMBERS . '.club_fk', 'join' => 'LEFT')
        );

        $fields = array(TBL_MEMBERS . '.*', TBL_CLUBS . '.name', TBL_CLUBS . '.email as club_email');

        $this->data['record'] = $this->modelMembersAlias->fetchRowFields( $fields, array(TBL_MEMBERS . '.id' => $this->mencrypt->decode($memberID)), array(), $join);
        $this->load->view($this->layout, $this->data);

    }

    public function settings($id) {

        $this->data['content'] = $this->viewFolder . '/settings';
        $this->data['sidemenu_club_active'] = 'sidemenu-admin-clubs';
        $this->data['club_id'] = $id;

        $fields = array(
           'name',
           'club_code',
           'id',
           'username',
           'r_password'
        );

        $this->data['record'] = $this->modelNameAlias->fetchRowFields($fields, array('id' => $this->mencrypt->decode($id)));

        if($this->input->post()) {

              $this->load->library('form_validation');

              $this->form_validation->set_rules('password', 'Password', 'trim|min_length[8]|max_length[12]|matches[cpassword]|required');
              $this->form_validation->set_rules('cpassword', 'Confirm password', 'trim|xss_clean');

              $this->form_validation->set_error_delimiters('', '');

              if($this->form_validation->run() == TRUE) {

                $hashKey = $this->modelNameAlias->genPwdHashKey($this->input->post("password", TRUE), $this->data['record']->unique_token);

                $data_array = array(
                    'hash_key' => $hashKey,
                    'r_password' => $this->input->post("password", TRUE),
                    'updated_on' => date('Y-m-d h:i:s A')
                );

                $where = array(
                    'id' => $this->mencrypt->decode($id)
                );

                $this->modelNameAlias->save($data_array, $where);

                $this->addLog($this->className . " settings changed the password");

                $this->session->set_flashdata('success_message', $this->className . ' added');
                redirect($this->data['ctrlUrl'] . '/settings/' . $id);

            } else {

                $this->data['Error'] = 'Y';
                $this->data['MSG'] = 'Your form has errors';
                $error = true;

            }

        }

        $this->load->view($this->layout, $this->data);
    }

    public function member_status( $clubID, $memberID, $status) {

        $record = $this->modelMembersAlias->fetchById($this->mencrypt->decode($memberID));

        if($record) {

            $this->modelMembersAlias->save(array('is_active' => $status), array('id' => $record->id));

            $this->addLog( "Member status changed : ". $record->name);
            $this->session->set_flashdata('success_message', 'Member status changed');
            redirect($this->data['ctrlUrl'] . '/view_member/' . $clubID . '/' . $memberID);

        } else {

            $this->session->set_flashdata('error_message', ' No record found');
            redirect($this->data['ctrlUrl']);
        }
    }

    public function delete($id) {

        $record = $this->modelNameAlias->fetchById($this->mencrypt->decode($id));

        if($record) {

            $this->modelNameAlias->delete(array('id' => $this->mencrypt->decode($id)));

            $this->addLog($this->className . " deleted a club with name :- ". $record->name);
            $this->session->set_flashdata('success_message', $this->className . ' deleted');
            redirect($this->data['ctrlUrl']);

        } else {

            $this->session->set_flashdata('error_message', ' No record found');
            redirect($this->data['ctrlUrl']);
        }

    }

}
