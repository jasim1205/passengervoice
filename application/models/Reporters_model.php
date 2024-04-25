<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Reporters_model extends CI_Model {

    public function save_reporter() {
		
        date_default_timezone_set("Asia/Dhaka");
		
        $data = array();
		
        $data['reporter_name'] = $this->input->post('reporter_name', true);

        $data['reporter_email'] = $this->input->post('reporter_email', true);
		
        $data['reporter_mobile'] = $this->input->post('reporter_mobile', true);
			
        $data['reporter_address'] = $this->input->post('reporter_address', true);
		
        $data['created_by'] = $this->session->userdata('user_id');
		
        $data['created_date'] = date("Y-m-d");
		
        $data['created_time'] = date("H:i:s");
		
		
		
		$sdata = array(); 
		
        $error = "";
        
        $config['upload_path'] = 'uploads/reporter_image/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['max_size'] = 2000;
        $config['max_width'] = 2000;
        $config['max_height'] = 2000;
        
        $this->load->library('upload',$config);
		
        if(!$this->upload->do_upload('reporter_image')){
			
            $error = $this->upload->display_errors();
			
            echo $error;
			
        }else{
			
            $sdata = $this->upload->data();
			
            $data['reporter_image'] = $config['upload_path'].$sdata['file_name'];
			
        }		

        $this->db->insert('reporter_table', $data);
		
    }
	
	public function update_reporter() {
		
        $data = array();
		
        $reporter_id = $this->input->post('reporter_id', true);
		
        $old_image = $this->input->post('old_image', true);
		
        $data['reporter_name'] = $this->input->post('reporter_name', true);

        $data['reporter_email'] = $this->input->post('reporter_email', true);
		
        $data['reporter_mobile'] = $this->input->post('reporter_mobile', true);
			
        $data['reporter_address'] = $this->input->post('reporter_address', true);
		
		$sdata = array();
		
        $error = "";
        
        $config['upload_path'] = 'uploads/reporter_image/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['max_size'] = 1500;
        $config['max_width'] = 2000;
        $config['max_height'] = 2000;
        
        $this->load->library('upload',$config);
		
        if(!$this->upload->do_upload('reporter_image')){
			
            $error = $this->upload->display_errors();
			
            echo $error;
			
        }else{
			
			unlink($old_image);
			
            $sdata = $this->upload->data();
			
            $data['reporter_image'] = $config['upload_path'].$sdata['file_name'];
			
        }
		
		$this->db->where('reporter_id', $reporter_id);
        $this->db->update('reporter_table', $data);
		
    }

    public function all_reporters() {
		
        $this->db->select('*');
		
        $this->db->from('reporter_table');
		
        $this->db->order_by('reporter_id', 'DESC');
		
        $query_result = $this->db->get();
		
        $result_info = $query_result->result();
		
        return $result_info;
		
    }
	
	public function reporters_limit($off,$lim) {
		
        $this->db->select('*');
		
        $this->db->from('reporter_table');

        $this->db->join('user_table', 'user_table.user_id=reporter_table.created_by', 'left' );
		
        $this->db->order_by('reporter_id', 'DESC');
		
        $this->db->offset($off);
		
        $this->db->limit($lim);
		
        $query_result = $this->db->get();
		
        $result_info = $query_result->result();
		
        return $result_info;
		
    }
	

}
