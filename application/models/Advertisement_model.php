<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Advertisement_model extends CI_Model {

    public function save_advertisement() {
		
        date_default_timezone_set("Asia/Dhaka");
		
        $data = array();
		
        $data['advertisement_name'] = $this->input->post('advertisement_name', true);

        $data['custom_ad_code'] = $this->input->post('custom_ad_code', true);
		
        $data['advertisement_url'] = $this->input->post('advertisement_url', true);
			
        $data['advertisement_location'] = $this->input->post('advertisement_location', true);
		
        $data['advertisement_status'] = $this->input->post('advertisement_status', true);
		
		
		
        $data['created_by'] = $this->session->userdata('user_id');
		
        $data['created_date'] = date("Y-m-d");
		
        $data['created_time'] = date("H:i:s");
		
		
		
		$sdata = array(); 
		
        $error = "";
        
        $config['upload_path'] = 'uploads/ad_image/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['max_size'] = 100000;
        $config['max_width'] = 200000;
        $config['max_height'] = 200000;
        
        $this->load->library('upload',$config);
		
        if(!$this->upload->do_upload('advertisement_image')){
			
            $error = $this->upload->display_errors();
			
            echo $error;
			
        }else{
			
            $sdata = $this->upload->data();
			
            $data['advertisement_image'] = $config['upload_path'].$sdata['file_name'];
			
        }		

        $this->db->insert('advertisement', $data);
		
    }
	
	public function update_advertisement() {
		
        $data = array();
		
        $advertisement_id = $this->input->post('advertisement_id', true);
		
        $old_image = $this->input->post('old_image', true);
		
        $data['advertisement_name'] = $this->input->post('advertisement_name', true);

        $data['custom_ad_code'] = $this->input->post('custom_ad_code', true);
		
        $data['advertisement_url'] = $this->input->post('advertisement_url', true);
			
        $data['advertisement_location'] = $this->input->post('advertisement_location', true);
		
        $data['advertisement_status'] = $this->input->post('advertisement_status', true);
		
		$sdata = array();
		
        $error = "";
        
        $config['upload_path'] = 'uploads/ad_image/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['max_size'] = 100000;
        $config['max_width'] = 200000;
        $config['max_height'] = 200000;
        
        $this->load->library('upload',$config);
		
        if(!$this->upload->do_upload('advertisement_image')){
			
            $error = $this->upload->display_errors();
			
            echo $error;
			
        }else{
			
			unlink($old_image);
			
            $sdata = $this->upload->data();
			
            $data['advertisement_image'] = $config['upload_path'].$sdata['file_name'];
			
        }
		
		$this->db->where('advertisement_id', $advertisement_id);
        $this->db->update('advertisement', $data);
		
    }

	public function get_location() {
		
        $this->db->select('*');
		
        $this->db->from('ad_location');
		
        $this->db->order_by('location_id', 'DESC');
		
        $query_result = $this->db->get();
		
        $result_info = $query_result->result();
		
        return $result_info;
		
    }
	
    public function all_advertisement() {
		
        $this->db->select('*');
		
        $this->db->from('advertisement');
		
        $this->db->order_by('advertisement_id', 'DESC');
		
        $query_result = $this->db->get();
		
        $result_info = $query_result->result();
		
        return $result_info;
		
    }
	
	
	public function advertisement_limit($off,$lim) {
		
        $this->db->select('*');
		
        $this->db->from('advertisement');

        $this->db->join('ad_location', 'ad_location.location_id=advertisement.advertisement_location', 'left' );

        $this->db->join('user_table', 'user_table.user_id=advertisement.created_by', 'left' );
		
        $this->db->order_by('advertisement_id', 'DESC');
		
        $this->db->offset($off);
		
        $this->db->limit($lim);
		
        $query_result = $this->db->get();
		
        $result_info = $query_result->result();
		
        return $result_info;
		
    }
	
	public function delete_advertisement($id) {
		
		$this->db->select('*');		
        $this->db->from('advertisement');
        $this->db->where('advertisement_id',$id);
		$query_result = $this->db->get();		
        $result_info = $query_result->row();
		unlink($result_info->advertisement_image);		
		
        $this->db->where('advertisement_id', $id);
        $this->db->delete('advertisement');
		
    }
	

}
