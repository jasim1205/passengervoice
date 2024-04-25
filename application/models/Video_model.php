<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Video_model extends CI_Model {

    public function save_video() {
		
        date_default_timezone_set("Asia/Dhaka");
		
        $data = array();
		
        $data['video_name'] = $this->input->post('video_name', true);       

         if($this->input->post('video_image', true) == ''){

        	$data['video_image'] = 'uploads/no_image.jpg';

        }else {

        	$data['video_image'] = $this->input->post('video_image', true);

        }

        $data['video_category_id'] = $this->input->post('video_category_id', true);
		
        $data['video_url'] = $this->input->post('video_url', true);
			
        $data['video_status'] = $this->input->post('video_status', true);
		
        $data['video_pin'] = $this->input->post('video_pin', true);
		
        $data['video_description'] = $this->input->post('video_description', true);
		
        $data['video_date'] = date("Y-m-d");
		
        $data['video_time'] = date("H:i:s");
		
		
		
		// $sdata = array(); 
		
  //       $error = "";
        
  //       $config['upload_path'] = 'uploads/video_image/';
  //       $config['allowed_types'] = 'gif|jpg|jpeg|png';
  //       $config['max_size'] = 2000;
  //       $config['max_width'] = 2000;
  //       $config['max_height'] = 2000;
        
  //       $this->load->library('upload',$config);
		
  //       if(!$this->upload->do_upload('video_image')){
			
  //           $error = $this->upload->display_errors();
			
  //           echo $error;
			
  //       }else{
			
  //           $sdata = $this->upload->data();
			
  //           $data['video_image'] = $config['upload_path'].$sdata['file_name'];
			
  //       }		

        $this->db->insert('video_table', $data);
		
    }
	
	public function update_video() {
		
        $data = array();
		
        $video_id = $this->input->post('video_id', true);
		
        $old_image = $this->input->post('old_image', true);
		
        $data['video_name'] = $this->input->post('video_name', true);

        $data['video_image'] = $this->input->post('video_image', true);

        $data['video_category_id'] = $this->input->post('video_category_id', true);
		
        $data['video_url'] = $this->input->post('video_url', true);
			
        $data['video_status'] = $this->input->post('video_status', true);
		
        $data['video_pin'] = $this->input->post('video_pin', true);
		
        $data['video_description'] = $this->input->post('video_description', true);
		
		// $sdata = array();
		
  //       $error = "";
        
  //       $config['upload_path'] = 'uploads/video_image/';
  //       $config['allowed_types'] = 'gif|jpg|jpeg|png';
  //       $config['max_size'] = 1500;
  //       $config['max_width'] = 2000;
  //       $config['max_height'] = 2000;
        
  //       $this->load->library('upload',$config);
		
  //       if(!$this->upload->do_upload('video_image')){
			
  //           $error = $this->upload->display_errors();
			
  //           echo $error;
			
  //       }else{
			
		// 	unlink($old_image);
			
  //           $sdata = $this->upload->data();
			
  //           $data['video_image'] = $config['upload_path'].$sdata['file_name'];
			
  //       }
		
		$this->db->where('video_id', $video_id);
        $this->db->update('video_table', $data);
		
    }

    public function all_video() {
		
        $this->db->select('*');
		
        $this->db->from('video_table');
		
        $this->db->order_by('video_id', 'DESC');
		
        $query_result = $this->db->get();
		
        $result_info = $query_result->result();
		
        return $result_info;
		
    }
	
	public function video_limit($off,$lim) {
		
        $this->db->select('*');
		
        $this->db->from('video_table');

        $this->db->join('category_table', 'category_table.category_id=video_table.video_category_id', 'left' );
		
        $this->db->order_by('video_id', 'DESC');
		
        $this->db->offset($off);
		
        $this->db->limit($lim);
		
        $query_result = $this->db->get();
		
        $result_info = $query_result->result();
		
        return $result_info;
		
    }
	
	public function delete_video($id) {
		
		// $this->db->select('*');		
  //       $this->db->from('video_table');
  //       $this->db->where('video_id',$id);
		// $query_result = $this->db->get();		
  //       $result_info = $query_result->row();
		// unlink($result_info->video_image);		
		
        $this->db->where('video_id', $id);
        $this->db->delete('video_table');
		
    }
	
	
	public function videoD($day) {
		
        $this->db->select('*');
		
        $this->db->from('video_table');
		
        $this->db->where('video_date', date('Y-m-').$day);
		
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
