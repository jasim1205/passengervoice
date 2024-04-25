<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Gallary_model extends CI_Model {

    public function save_image() {
		
        date_default_timezone_set("Asia/Dhaka");
		
        $data = array();
		
        $data['image_name'] = $this->input->post('image_name', true);

        if($this->input->post('image_image', true) == ''){

        	$data['image_image'] = 'uploads/no_image.jpg';

        }else {

        	$data['image_image'] = $this->input->post('image_image', true);

        }

        
		
        $data['image_category_id'] = $this->input->post('image_category_id', true);
			
        $data['image_status'] = $this->input->post('image_status', true);
		
        $data['image_date'] = date("Y-m-d");
		
        $data['image_time'] = date("H:i:s");
		
		
		
		// $sdata = array(); 
		
  //       $error = "";
        
  //       $config['upload_path'] = 'uploads/gallary_image/';
  //       $config['allowed_types'] = 'gif|jpg|jpeg|png';
  //       $config['max_size'] = 1500;
  //       $config['max_width'] = 2000;
  //       $config['max_height'] = 2000;
        
  //       $this->load->library('upload',$config);
		
  //       if(!$this->upload->do_upload('image_image')){
			
  //           $error = $this->upload->display_errors();
			
  //           echo $error;
			
  //       }else{
			
  //           $sdata = $this->upload->data();
			
  //           $data['image_image'] = $config['upload_path'].$sdata['file_name'];
			
  //       }		

        $this->db->insert('image_table', $data);
		
    }
	
	
	
	public function update_image() {
		
        $data = array();
		
        $image_id = $this->input->post('image_id', true);
		
        $old_image = $this->input->post('old_image', true);
		
       $data['image_image'] = $this->input->post('image_image', true);
        
        $data['image_name'] = $this->input->post('image_name', true);
		
        $data['image_category_id'] = $this->input->post('image_category_id', true);
			
        $data['image_status'] = $this->input->post('image_status', true);
		
		
		
		// $sdata = array(); 
		
  //       $error = "";
        
  //       $config['upload_path'] = 'uploads/gallary_image/';
  //       $config['allowed_types'] = 'gif|jpg|jpeg|png';
  //       $config['max_size'] = 1500;
  //       $config['max_width'] = 2000;
  //       $config['max_height'] = 2000;
        
  //       $this->load->library('upload',$config);
		
  //       if(!$this->upload->do_upload('image_image')){
			
  //           $error = $this->upload->display_errors();
			
  //           echo $error;
			
  //       }else{
			
		// 	unlink($old_image);
			
  //           $sdata = $this->upload->data();
			
  //           $data['image_image'] = $config['upload_path'].$sdata['file_name'];
			
  //       }
		
		$this->db->where('image_id', $image_id);
        $this->db->update('image_table', $data);
		
    }

    
	

    public function all_gallary() {
		
        $this->db->select('*');
		
        $this->db->from('image_table');
		
        $this->db->order_by('image_id', 'DESC');
		
        $query_result = $this->db->get();
		
        $result_info = $query_result->result();
		
        return $result_info;
		
    }
	
	public function gallary_limit($off,$lim) {
		
        $this->db->select('*');
		
        $this->db->from('image_table');
		    
        $this->db->join('category_table', 'image_table.image_category_id=category_table.category_id', 'left');
		
        $this->db->order_by('image_id', 'DESC');
		
        $this->db->offset($off);
		
        $this->db->limit($lim);
		
        $query_result = $this->db->get();
		
        $result_info = $query_result->result();
		
        return $result_info;
		
    }


	
	
	public function delete_image($id) {
		
		// $this->db->select('*');		
  //       $this->db->from('image_table');
  //       $this->db->where('image_id',$id);
		
		// $query_result = $this->db->get();
		
  //       $result_info = $query_result->row();
		
		//unlink($result_info->image_image);	
		
        $this->db->where('image_id', $id);
        $this->db->delete('image_table');
		
    }
	
	
	
	public function gallaryD($day) {
		
        $this->db->from('category_table');
		    
        $this->db->join('image_table', 'category_table.category_id=image_table.image_category_id', 'right');
		
        $this->db->where('category_type','5');
		
        $this->db->where('image_table.image_date', date('Y-m-').$day);
		
        $query_result = $this->db->get();
		
        $result_info = $query_result->result();
		
        $f = count($result_info);
		
		if($f>0){
			echo $f;
		}else{
			echo 0;
		}
		
    }
	
	
}
