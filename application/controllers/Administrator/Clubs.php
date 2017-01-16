<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clubs extends MY_Controller {

    protected $viewFolder;
    protected $className;

    protected $imageShowPath = CLUBS_SHOW_PATH;
    protected $memberShowPath = MEMBER_SHOW_PATH;
    protected $passportShowPath = PASSPORT_SHOW_PATH;
    protected $cardShowPath = CARD_SHOW_PATH;
    protected $clubCertiShowPath = CLUB_CERTI_SHOW_PATH;
    protected $sponsorShowPath = SPONSOR_SHOW_PATH;

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
        $where[TBL_CLUBS . '.is_active'] = 'Y';

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

    public function members_export($id) {

        //load our new PHPExcel library
        $this->load->library('excel');
        //activate worksheet number 1
        $this->excel->setActiveSheetIndex(0);

        $club = $this->modelNameAlias->fetchById($this->mencrypt->decode($id));

        //name the worksheet
        $this->excel->getActiveSheet()->setTitle($club->name . 'Member\'s list');

        $fields = array(
           'first_name',
           'last_name',
           'code',
           'father_name',
           'gender',
           'city',
           'emirate',
           'country',
           'contact_no',
           'discipline',
           'dob',
           'passport_no',
           'passport_expiry',
           'is_active',
           'created_on'
        );

        $this->excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(20);
        $this->excel->getActiveSheet()->getStyle('B1')->getFont()->setSize(20);
        $this->excel->getActiveSheet()->getStyle('C1')->getFont()->setSize(20);
        $this->excel->getActiveSheet()->getStyle('D1')->getFont()->setSize(20);
        $this->excel->getActiveSheet()->getStyle('E1')->getFont()->setSize(20);
        $this->excel->getActiveSheet()->getStyle('F1')->getFont()->setSize(20);
        $this->excel->getActiveSheet()->getStyle('G1')->getFont()->setSize(20);
        $this->excel->getActiveSheet()->getStyle('H1')->getFont()->setSize(20);
        $this->excel->getActiveSheet()->getStyle('I1')->getFont()->setSize(20);
        $this->excel->getActiveSheet()->getStyle('J1')->getFont()->setSize(20);
        $this->excel->getActiveSheet()->getStyle('K1')->getFont()->setSize(20);
        $this->excel->getActiveSheet()->getStyle('L1')->getFont()->setSize(20);
        $this->excel->getActiveSheet()->getStyle('M1')->getFont()->setSize(20);
        $this->excel->getActiveSheet()->getStyle('N1')->getFont()->setSize(20);
        $this->excel->getActiveSheet()->getStyle('O1')->getFont()->setSize(20);

        $this->excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle('B1')->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle('C1')->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle('D1')->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle('E1')->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle('F1')->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle('G1')->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle('H1')->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle('I1')->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle('J1')->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle('K1')->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle('L1')->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle('M1')->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle('N1')->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle('O1')->getFont()->setBold(true);

         $this->excel->getActiveSheet()->setCellValue('A1', "First Name");
         $this->excel->getActiveSheet()->setCellValue('B1', "Last Name");
         $this->excel->getActiveSheet()->setCellValue('C1', "Code");
         $this->excel->getActiveSheet()->setCellValue('D1', "Father's Name");
         $this->excel->getActiveSheet()->setCellValue('E1', "Gender");

         $this->excel->getActiveSheet()->setCellValue('F1', "City");
         $this->excel->getActiveSheet()->setCellValue('G1', "Emirate");
         $this->excel->getActiveSheet()->setCellValue('H1', "Country");
         $this->excel->getActiveSheet()->setCellValue('I1', "Phone");
         $this->excel->getActiveSheet()->setCellValue('J1', "Descipline");
         $this->excel->getActiveSheet()->setCellValue('K1', "Date of birth");
         $this->excel->getActiveSheet()->setCellValue('L1', "Passport No");
         $this->excel->getActiveSheet()->setCellValue('M1', "Passport Expiry");
         $this->excel->getActiveSheet()->setCellValue('N1', "Status");
         $this->excel->getActiveSheet()->setCellValue('O1', "Member since");

         $this->excel->getActiveSheet()->getColumnDimensionByColumn('A')->setAutoSize(true);
         $this->excel->getActiveSheet()->getColumnDimensionByColumn('B')->setAutoSize(true);
         $this->excel->getActiveSheet()->getColumnDimensionByColumn('C')->setAutoSize(true);
         $this->excel->getActiveSheet()->getColumnDimensionByColumn('D')->setAutoSize(true);
         $this->excel->getActiveSheet()->getColumnDimensionByColumn('E')->setAutoSize(true);
         $this->excel->getActiveSheet()->getColumnDimensionByColumn('F')->setAutoSize(true);
         $this->excel->getActiveSheet()->getColumnDimensionByColumn('G')->setAutoSize(true);
         $this->excel->getActiveSheet()->getColumnDimensionByColumn('H')->setAutoSize(true);
         $this->excel->getActiveSheet()->getColumnDimensionByColumn('I')->setAutoSize(true);
         $this->excel->getActiveSheet()->getColumnDimensionByColumn('J')->setAutoSize(true);
         $this->excel->getActiveSheet()->getColumnDimensionByColumn('K')->setAutoSize(true);
         $this->excel->getActiveSheet()->getColumnDimensionByColumn('L')->setAutoSize(true);
         $this->excel->getActiveSheet()->getColumnDimensionByColumn('M')->setAutoSize(true);
         $this->excel->getActiveSheet()->getColumnDimensionByColumn('N')->setAutoSize(true);
         $this->excel->getActiveSheet()->getColumnDimensionByColumn('O')->setAutoSize(true);

        $users = $this->modelMembersAlias->fetchFields($fields, array('club_fk' => $this->mencrypt->decode($id)));

        // Add data
       for ($i = 0; $i < count($users); $i++) {
         $this->excel->getActiveSheet()->setCellValue('A' . ($i + 2), $users[$i]->first_name)
                                       ->setCellValue('B' . ($i + 2), $users[$i]->last_name)
                                       ->setCellValue('C' . ($i + 2), $users[$i]->code)
                                       ->setCellValue('D' . ($i + 2), $users[$i]->father_name)
                                       ->setCellValue('E' . ($i + 2), ucfirst($users[$i]->gender))
                                       ->setCellValue('F' . ($i + 2), $users[$i]->city)
                                       ->setCellValue('G' . ($i + 2), $users[$i]->emirate)
                                       ->setCellValue('H' . ($i + 2), $users[$i]->country)
                                       ->setCellValue('I' . ($i + 2), $users[$i]->contact_no)
                                       ->setCellValue('J' . ($i + 2), $users[$i]->discipline)
                                       ->setCellValue('K' . ($i + 2), date('d F Y', strtotime($users[$i]->dob)))
                                       ->setCellValue('L' . ($i + 2), $users[$i]->passport_no)
                                       ->setCellValue('M' . ($i + 2), $users[$i]->passport_expiry)
                                       ->setCellValue('N' . ($i + 2), ($users[$i]->is_active == 'Y') ? 'Enabled' : 'Disabled')
                                       ->setCellValue('O' . ($i + 2), date('d F Y', strtotime($users[$i]->created_on)));

       }

        $time = date('d_m_Y');
        $filename = 'Excel_' . $club->name . '_' . $time . '.xls';

        header('Content-Type: application/vnd.ms-excel'); //mime type
        header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
        header('Cache-Control: max-age=0'); //no cache

        //save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
        //if you want to save it as .XLSX Excel 2007 format
        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');

        //force user to download the Excel file without writing it to server's HD
        $objWriter->save('php://output');
    }

    public function view_member($id, $memberID) {

        $this->data['content'] = $this->viewFolder . '/view_member';
        $this->data['sidemenu_club_active'] = 'sidemenu-admin-clubs';
        $this->data['club_id'] = $id;

        $this->data['memberShowPath'] = $this->memberShowPath;
        $this->data['passportShowPath'] = $this->passportShowPath;
        $this->data['cardShowPath'] = $this->cardShowPath;
        $this->data['sponsorShowPath'] = $this->sponsorShowPath;
        $this->data['clubCertiShowPath'] = $this->clubCertiShowPath;

        $join = array(
           array('table' => TBL_CLUBS, 'condition' => TBL_CLUBS . '.id = ' . TBL_MEMBERS . '.club_fk', 'join' => 'LEFT')
        );

        $fields = array(TBL_MEMBERS . '.*', TBL_CLUBS . '.name', TBL_CLUBS . '.email as club_email');

        //Get all passport images
        $this->load->model( CLUB_VIEWS . '/model_visa_images', 'modelVisaImagesAlias');
        $this->data['passport_visa_images'] = $this->modelVisaImagesAlias->fetchAll(array('member_fk' => $this->mencrypt->decode($memberID)), array('id' => 'DESC'));

        //Get all sponsor certificates
        $this->load->model( CLUB_VIEWS . '/model_sponsor_images', 'modelSponsorImagesAlias');
        $this->data['sponsor_images'] = $this->modelSponsorImagesAlias->fetchAll(array('member_fk' => $this->mencrypt->decode($memberID)), array('id' => 'DESC'));

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

    public function export() {

         //load our new PHPExcel library
         $this->load->library('excel');
         //activate worksheet number 1
         $this->excel->setActiveSheetIndex(0);
         //name the worksheet
         $this->excel->getActiveSheet()->setTitle('Clubs list');

         $fields = array(
            'name',
            'club_code',
            'email',
            'username',
            'emirate',
            'address',
            'pincode',
            'url',
            'contact_person',
            'contact_no',
            'fax_no',
            'created_on'
         );

         $this->excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(20);
         $this->excel->getActiveSheet()->getStyle('B1')->getFont()->setSize(20);
         $this->excel->getActiveSheet()->getStyle('C1')->getFont()->setSize(20);
         $this->excel->getActiveSheet()->getStyle('D1')->getFont()->setSize(20);
         $this->excel->getActiveSheet()->getStyle('E1')->getFont()->setSize(20);
         $this->excel->getActiveSheet()->getStyle('F1')->getFont()->setSize(20);
         $this->excel->getActiveSheet()->getStyle('G1')->getFont()->setSize(20);
         $this->excel->getActiveSheet()->getStyle('H1')->getFont()->setSize(20);
         $this->excel->getActiveSheet()->getStyle('I1')->getFont()->setSize(20);
         $this->excel->getActiveSheet()->getStyle('J1')->getFont()->setSize(20);
         $this->excel->getActiveSheet()->getStyle('K1')->getFont()->setSize(20);
         $this->excel->getActiveSheet()->getStyle('L1')->getFont()->setSize(20);

         $this->excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
         $this->excel->getActiveSheet()->getStyle('B1')->getFont()->setBold(true);
         $this->excel->getActiveSheet()->getStyle('C1')->getFont()->setBold(true);
         $this->excel->getActiveSheet()->getStyle('D1')->getFont()->setBold(true);
         $this->excel->getActiveSheet()->getStyle('E1')->getFont()->setBold(true);
         $this->excel->getActiveSheet()->getStyle('F1')->getFont()->setBold(true);
         $this->excel->getActiveSheet()->getStyle('G1')->getFont()->setBold(true);
         $this->excel->getActiveSheet()->getStyle('H1')->getFont()->setBold(true);
         $this->excel->getActiveSheet()->getStyle('I1')->getFont()->setBold(true);
         $this->excel->getActiveSheet()->getStyle('J1')->getFont()->setBold(true);
         $this->excel->getActiveSheet()->getStyle('K1')->getFont()->setBold(true);
         $this->excel->getActiveSheet()->getStyle('L1')->getFont()->setBold(true);

          $this->excel->getActiveSheet()->setCellValue('A1', "Name");
          $this->excel->getActiveSheet()->setCellValue('B1', "Club Code");
          $this->excel->getActiveSheet()->setCellValue('C1', "Email");
          $this->excel->getActiveSheet()->setCellValue('D1', "Username");
          $this->excel->getActiveSheet()->setCellValue('E1', "Emirate");

          $this->excel->getActiveSheet()->setCellValue('F1', "Address");
          $this->excel->getActiveSheet()->setCellValue('G1', "Pincode");
          $this->excel->getActiveSheet()->setCellValue('H1', "URL");
          $this->excel->getActiveSheet()->setCellValue('I1', "Contact Person");
          $this->excel->getActiveSheet()->setCellValue('J1', "Phone");
          $this->excel->getActiveSheet()->setCellValue('K1', "Fax");
          $this->excel->getActiveSheet()->setCellValue('L1', "Member since");

          $this->excel->getActiveSheet()->getColumnDimensionByColumn('A')->setAutoSize(true);
          $this->excel->getActiveSheet()->getColumnDimensionByColumn('B')->setAutoSize(true);
          $this->excel->getActiveSheet()->getColumnDimensionByColumn('C')->setAutoSize(true);
          $this->excel->getActiveSheet()->getColumnDimensionByColumn('D')->setAutoSize(true);
          $this->excel->getActiveSheet()->getColumnDimensionByColumn('E')->setAutoSize(true);
          $this->excel->getActiveSheet()->getColumnDimensionByColumn('F')->setAutoSize(true);
          $this->excel->getActiveSheet()->getColumnDimensionByColumn('G')->setAutoSize(true);
          $this->excel->getActiveSheet()->getColumnDimensionByColumn('H')->setAutoSize(true);
          $this->excel->getActiveSheet()->getColumnDimensionByColumn('I')->setAutoSize(true);
          $this->excel->getActiveSheet()->getColumnDimensionByColumn('J')->setAutoSize(true);
          $this->excel->getActiveSheet()->getColumnDimensionByColumn('K')->setAutoSize(true);
          $this->excel->getActiveSheet()->getColumnDimensionByColumn('L')->setAutoSize(true);

         $users = $this->modelNameAlias->fetchFields($fields, array());

         // Add data
        for ($i = 0; $i < count($users); $i++) {
        	$this->excel->getActiveSheet()->setCellValue('A' . ($i + 2), $users[$i]->name)
        	                              ->setCellValue('B' . ($i + 2), $users[$i]->club_code)
        	                              ->setCellValue('C' . ($i + 2), $users[$i]->email)
        	                              ->setCellValue('D' . ($i + 2), $users[$i]->username)
        	                              ->setCellValue('E' . ($i + 2), $users[$i]->emirate)
                                        ->setCellValue('F' . ($i + 2), $users[$i]->address)
                                        ->setCellValue('G' . ($i + 2), $users[$i]->pincode)
                                        ->setCellValue('H' . ($i + 2), $users[$i]->url)
                                        ->setCellValue('I' . ($i + 2), $users[$i]->contact_person)
                                        ->setCellValue('J' . ($i + 2), $users[$i]->contact_no)
                                        ->setCellValue('K' . ($i + 2), $users[$i]->fax_no)
                                        ->setCellValue('L' . ($i + 2), date('d F Y', strtotime($users[$i]->created_on)));

        }

         $filename = 'Excel_' . time() . '.xls';

         header('Content-Type: application/vnd.ms-excel'); //mime type
         header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
         header('Cache-Control: max-age=0'); //no cache

         //save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
         //if you want to save it as .XLSX Excel 2007 format
         $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');

         //force user to download the Excel file without writing it to server's HD
         $objWriter->save('php://output');
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
