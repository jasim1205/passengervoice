<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Settings_model extends CI_Model {
	

    public function save_settings() {
		
        $data = array();
		
		$user_id = $this->session->userdata('user_id');
		
        $data['user_name'] = $this->input->post('user_name', true);
		
        $email = $this->input->post('user_email', true);		
		
        $password = $this->input->post('user_password', true);
		
        $old_email = $this->input->post('old_email', true);
		
        $old_password = $this->input->post('old_password', true);
		
        $retype_password = $this->input->post('retype_password', true);
		
		
		$con = 0;
		
		if($old_email != '' && $email != ''){
			
			$this->db->select('*');
		
			$this->db->from('user_table');
			
			$this->db->where('user_id', $user_id);
			
			$this->db->where('user_email', $old_email);
			
			$query_result = $this->db->get();
			
			$result_info = $query_result->result();
			
			if(count($result_info) > 0){
				
				$data['user_email'] = $this->input->post('user_email', true);
				
				$con = 1;
				
			}else {
				
				$con = 2;
				
			}
			
		}
		
		
		
		if($old_password != '' && $password != '' && $retype_password != ''){
			
			if($password === $retype_password){
				
				$this->db->select('*');
		
				$this->db->from('user_table');
				
				$this->db->where('user_id', $user_id);
				
				$this->db->where('user_password', md5($old_password));
				
				$query_result = $this->db->get();
				
				$result_info = $query_result->result();
				
				if(count($result_info) > 0){
					
					$data['user_password'] = md5($this->input->post('user_password', true));
					
					$con = 1;
					
				}else {
					
					$con = 2;
					
				}
				
			}else {
				
				$con = 2;
				
			}
			
			
		}
		
		
		if($con == 0 || $con == 1){
			
			$sdata = array();
			
			$error = "";
			
			$config['upload_path'] = 'uploads/user_image/';
			$config['allowed_types'] = 'gif|jpg|jpeg|png';
			$config['max_size'] = 1500;
			$config['max_width'] = 2000;
			$config['max_height'] = 2000;        
			$this->load->library('upload',$config);
			
			if(!$this->upload->do_upload('user_image')){
				
				$error = $this->upload->display_errors();
				
				echo $error;
				
			}else{
				
				
				$sdata = $this->upload->data();
				
				$data['user_image'] = $config['upload_path'].$sdata['file_name'];
				
			}
			
			
			$this->db->where('user_id', $user_id);
			$this->db->update('user_table', $data);
			
			return '1';

		}else {
			
			return '2';
			
		}
		
		
    }
	
	
	public function get_settings() {
		
        $this->db->select('*');
		
        $this->db->from('user_table');
		
        $this->db->where('user_id', $this->session->userdata('user_id'));
		
        $query_result = $this->db->get();
		
        $result_info = $query_result->result();
		
        return $result_info;
		
    }
	
	

}
