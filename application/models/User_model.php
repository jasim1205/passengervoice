<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User_model extends CI_Model {

    public function save_user() {
		
        date_default_timezone_set("Asia/Dhaka");
		
        $data = array();
		
        $data['user_name'] = $this->input->post('user_name', true);

        $data['user_email'] = $this->input->post('user_email', true);
		
        $data['user_password'] = md5($this->input->post('user_pass', true));
			
        $data['user_mobile'] = $this->input->post('user_mobile', true);
		
        $data['user_role'] = $this->input->post('user_role', true);
		
        $data['user_status'] = $this->input->post('user_status', true);
		
        $data['created_by'] = $this->session->userdata('user_id');
		
        $data['created_date'] = date("Y-m-d");
		
        $data['created_time'] = date("H:i:s");
		
		
		
		$sdata = array(); 
		
        $error = "";
        
        $config['upload_path'] = 'uploads/user_image/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['max_size'] = 2000;
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

        $this->db->insert('user_table', $data);
		
    }
	
	public function update_user() {
		
        $data = array();
		
        $user_id = $this->input->post('user_id', true);
		
        $old_image = $this->input->post('old_image', true);
		
        $data['user_name'] = $this->input->post('user_name', true);

        $data['user_email'] = $this->input->post('user_email', true);
		
		if($this->input->post('user_pass', true) != ''){
			$data['user_password'] = md5($this->input->post('user_pass', true));
		}
        
			
        $data['user_mobile'] = $this->input->post('user_mobile', true);
		
        $data['user_role'] = $this->input->post('user_role', true);
		
        $data['user_status'] = $this->input->post('user_status', true);
		
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
			
			unlink($old_image);
			
            $sdata = $this->upload->data();
			
            $data['user_image'] = $config['upload_path'].$sdata['file_name'];
			
        }
		
		$this->db->where('user_id', $user_id);
        $this->db->update('user_table', $data);
		
    }

    public function all_user() {
		
        $this->db->select('*');
		
        $this->db->from('user_table');
		
        $this->db->where('user_id !=', 1);
		
        $this->db->order_by('user_id', 'DESC');
		
        $query_result = $this->db->get();
		
        $result_info = $query_result->result();
		
        return $result_info;
		
    }
	
	public function user_limit($off,$lim) {
		
        $this->db->select('*');
		
        $this->db->from('user_table');
		
        $this->db->where('user_id !=', 1);
		
        $this->db->order_by('user_id', 'DESC');
		
        $this->db->offset($off);
		
        $this->db->limit($lim);
		
        $query_result = $this->db->get();
		
        $result_info = $query_result->result();
		
        return $result_info;
		
    }
	
	public function get_role() {
		
        $this->db->select('*');
		
        $this->db->from('role_settings');
		
        $this->db->where('role_id', 1);
		
        $query_result = $this->db->get();
		
        $result_info = $query_result->row();
		
        return $result_info;
		
    }
	
	public function update_role() {
		
        $data = array();
		
		
        $bb = $this->input->post('senior_editor_role', true);
        $cc = $this->input->post('sub_editor_role', true);
		
        $data['senior_editor_role'] = implode(",",$bb);
        $data['sub_editor_role'] = implode(",",$cc);
		
		$this->db->where('role_id', 1);
        $this->db->update('role_settings', $data);
		
    }
	
	
	public function user_access($features){
		
        
        $admin_role = $this->session->userdata('user_role');
		
        
        $this->db->select('*');
		
        $this->db->from('role_settings');
		
        $this->db->where('role_id', 1);
		
        $query_result = $this->db->get();
		
        $all_roles = $query_result->row();		
		
		
        $roles[1] = $all_roles->admin_role;
        $roles[2] = $all_roles->senior_editor_role;
        $roles[3] = $all_roles->sub_editor_role;
        
        $get_features = explode(",",$roles[$admin_role]);
        
        if(in_array($features,$get_features)){
			
            return true;
			
        }else{
			
            return false;
			
        }
    }
	

}
