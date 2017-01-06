<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_messages extends MY_model
{

    protected $table = TBL_MESSAGES;
    protected $primary_key = 'id';


    public function save_batch($data_array) {
       return $this->db->insert_batch($this->table, $data_array);
    }
}
