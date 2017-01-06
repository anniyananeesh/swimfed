<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_members extends MY_model
{

    protected $table = TBL_MEMBERS;
    protected $primary_key = 'id';

    public function genMemberCode() {

        $this->db->select('code')
                 ->from($this->table)
                 ->limit(1);

        $this->db->order_by('id', 'DESC');

        $result = $this->db->get();

        if($result->num_rows() > 0) {

            $code = $result->result();
            $code = ++$code[0]->code;
            return $code;

        } else {

            return 'MEM20000';
        }

    }
}
