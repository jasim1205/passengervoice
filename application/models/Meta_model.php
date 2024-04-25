<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Meta_model extends CI_Model {

    public function save_meta() {
		
        $data = array();
		
        $data['site_name'] = $this->input->post('site_name', true);
		
        $data['site_title'] = $this->input->post('site_title', true);
		
        $data['site_keywords'] = $this->input->post('site_keywords', true);
		
        $data['site_email'] = $this->input->post('site_email', true);
		
        $data['site_number'] = $this->input->post('site_number', true);
		
        $data['site_description'] = $this->input->post('site_description', true);
		
        $data['facebook'] = $this->input->post('facebook', true);
		
        $data['twitter'] = $this->input->post('twitter', true);
		
        $data['linkedin'] = $this->input->post('linkedin', true);
		
        $data['google'] = $this->input->post('google', true);
		
        $data['youtube'] = $this->input->post('youtube', true);
			
        $data['site_address_1'] = $this->input->post('site_address_1', false);
		
        $data['site_address_2'] = $this->input->post('site_address_2', false);
		
        $data['site_address_3'] = $this->input->post('site_address_3', false);
		
        $data['site_address_4'] = $this->input->post('site_address_4', false);
		
        $data['map_latitude'] = $this->input->post('map_latitude', true);
		
        $data['map_longitude'] = $this->input->post('map_longitude', true);
		
        $data['google_play'] = $this->input->post('google_play', true);
		
        $data['apple_store'] = $this->input->post('apple_store', true);
		
		
		$sdata = array(); 
		
        $error = "";
        
        $config['upload_path'] = 'uploads/meta_image/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png|pdf';
        $config['max_size'] = 15000;
        $config['max_width'] = 2000;
        $config['max_height'] = 2000;        
        $this->load->library('upload',$config);
		
        if(!$this->upload->do_upload('site_logo')){
			
            $error = $this->upload->display_errors();
			
            echo $error;
			
        }else{
			
			
            $sdata = $this->upload->data();
			
            $data['site_logo'] = $config['upload_path'].$sdata['file_name'];
			
        }
		
		if(!$this->upload->do_upload('site_icon')){
			
            $error = $this->upload->display_errors();
			
            echo $error;
			
        }else{			
			
            $sdata = $this->upload->data();
			
            $data['site_icon'] = $config['upload_path'].$sdata['file_name'];
			
        }
        

		if(!$this->upload->do_upload('basfee_list')){
			
            $error = $this->upload->display_errors();
			
            echo $error;
			
        }else{			
			
            $pdata = $this->upload->data();
			
            $data['basfee_list'] = $config['upload_path'].$pdata['file_name'];
			
        }
		
		$this->db->where('meta_id', 1);
        $this->db->update('meta_table', $data);
		
    }
	
	
	public function get_meta() {
		
        $this->db->select('*');
		
        $this->db->from('meta_table');
		
        $this->db->where('meta_id', 1);
		
        $query_result = $this->db->get();
		
        $result_info = $query_result->row();
		
        return $result_info;
		
    }
	
	

}
