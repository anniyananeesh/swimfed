<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_temp_members extends MY_model
{

    protected $table = TBL_TEMP_MEMBERS;
    protected $primary_key = 'id';

    protected $sponsorTable = 'tbl_temp_members_sponsor_images';
    protected $passportTable = 'tbl_temp_members_visa_images';

    public function getMemberSponsorDetails($id) {

        $this->db->select('*')
                 ->from($this->sponsorTable)
                 ->where(array('member_fk' => $id));

        $result = $this->db->get();

        if($result->num_rows() > 0) {
           return $result->result();
        } else {
           return false;
        }

    }

    public function getMemberPassportDetails($id) {

        $this->db->select('*')
                 ->from($this->passportTable)
                 ->where(array('member_fk' => $id));

        $result = $this->db->get();

        if($result->num_rows() > 0) {
           return $result->result();
        } else {
           return false;
        }

    } 

}
