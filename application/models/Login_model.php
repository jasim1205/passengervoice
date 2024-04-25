<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login_model extends CI_Model {

    public function check_user_login_info($email, $password) {
		
        $this->db->select('*');
        $this->db->from('user_table');
        $this->db->where('user_status', 1);
        $this->db->where('user_email', $email);
        $this->db->where('user_password', md5($password));
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
		
    }

}
