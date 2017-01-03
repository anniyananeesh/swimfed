<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Model_clubs extends MY_Model
{

    protected $table = TBL_CLUBS;
    protected $primary_key = 'id';

    public function __construct() {

    }

    public function genClubCode() {

        $this->db->select('club_code')
                 ->from($this->table)
                 ->limit(1);

        $this->db->order_by('id', 'DESC');

        $result = $this->db->get();

        if($result->num_rows() > 0) {

            $code = $result->result();
            $code = ++$code[0]->club_code;
            return $code;

        } else {

            return 'AAA20000';
        }

    }

    public function genUniqTkn($username) {

        $token = time() . rand(10, 5000) . sha1(rand(10, 5000)) . md5(__FILE__);
        $token = str_shuffle($token);
        $token = sha1($token) . md5(microtime()) . md5($username);
        return $token;
    }

    public function genPwdHashKey($password, $token) {

        return md5(md5($token) . md5($password));
    }

}
