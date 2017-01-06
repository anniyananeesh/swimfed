<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Setup extends Club_Controller {

    public function __construct() {

        parent::__construct();
        $this->load->model(CLUB_VIEWS . '/model_users', 'modelNameAlias');
    }

    public function index() {

        $this->data['content'] = CLUB_VIEWS . '/setup';
        $this->data['menuActive'] = 'setup';

        $fields = array(
            'club_code',
            'name',
            'email',
            'emirate'
        );

        $this->data['record'] = $this->modelNameAlias->fetchRowFields($fields, array('id' => $this->mencrypt->decode($this->data['user']['user_id'])));

        $post['name'] = $this->data['record']->name;
        $post['emirate'] = $this->data['record']->emirate;
        $post['email'] = $this->data['record']->email;
        $post['address'] = '';
        $post['pincode'] = '';
        $post['url'] = '';
        $post['contact_person'] = '';
        $post['contact_no'] = '';
        $post['fax_no'] = '';

        $this->data['post'] = $post;

        if($this->input->post()) {

              $this->data['post'] = $this->input->post();

              $this->load->library('form_validation');

              $this->form_validation->set_rules('name', 'Name', 'trim|required|xss_clean');
              $this->form_validation->set_rules('address', 'Address', 'trim|required|xss_clean');
              $this->form_validation->set_rules('pincode', 'Pincode', 'trim|required|xss_clean');
              $this->form_validation->set_rules('emirate', 'Emirate', 'trim|required|xss_clean');
              $this->form_validation->set_rules('url', 'URL', 'trim|required|xss_clean');
              $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|xss_clean');
              $this->form_validation->set_rules('contact_person', 'Contact person', 'trim|required|xss_clean');
              $this->form_validation->set_rules('contact_no', 'Contact no.', 'trim|required|xss_clean');
              $this->form_validation->set_rules('fax_no', 'Fax no.', 'trim|required|xss_clean');

              $this->form_validation->set_error_delimiters('', '');

              if($this->form_validation->run() == TRUE && !$error) {

                  $data_array = array(
                      'name' => $this->input->post('name', TRUE),
                      'address' => $this->input->post('address', TRUE),
                      'pincode' => $this->input->post('pincode', TRUE),
                      'emirate' => $this->input->post('emirate', TRUE),
                      'url' => $this->input->post('url', TRUE),
                      'email' => $this->input->post('email', TRUE),
                      'contact_person' => $this->input->post('contact_person', TRUE),
                      'contact_no' => $this->input->post('contact_no', TRUE),
                      'fax_no' => $this->input->post('fax_no', TRUE),
                      'updated_on' => date('Y-m-d h:i:s a')
                  );

                  $where = array(
                      'id' => $this->mencrypt->decode($this->data['user']['user_id'])
                  );

                  $this->modelNameAlias->save($data_array, $where);

                  $this->addLog($this->data['record']->name . ' : Club details has been updated by club admin');

                  $this->session->set_flashdata('success_message', 'Club details has been updated');
                  redirect(CLUB_URL . '/Dashboard');

              }

        }

        $this->load->view($this->layout, $this->data);
    }

}
