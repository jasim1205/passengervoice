<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Media_model extends CI_Model {

    public function save_media() {
		
        date_default_timezone_set("Asia/Dhaka");
		
        $data = array();
		
        $data['media_date'] = date("Y-m-d");
		
        $data['media_time'] = date("H:i:s");
		
		
		
		$sdata = array(); 
		
        $error = "";
        
        $config['upload_path'] = 'uploads/media_image/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['max_size'] = 1500;
        $config['max_width'] = 2000;
        $config['max_height'] = 2000;
        
        $this->load->library('upload',$config);
		
        if(!$this->upload->do_upload('media_image')){
			
            $error = $this->upload->display_errors();
			
            echo $error;
			
        }else{
			
            $sdata = $this->upload->data();
			
            $data['media_image'] = $config['upload_path'].$sdata['file_name'];
			
        }		

        $this->db->insert('media_table', $data);
		
    }


	
	
	
    public function all_media() {
		
        $this->db->select('*');
		
        $this->db->from('media_table');
		
        $this->db->order_by('media_id', 'DESC');
		
        $query_result = $this->db->get();
		
        $result_info = $query_result->result();
		
        return $result_info;
		
    }
	
	public function media_limit($off,$lim) {
		
        $this->db->select('*');
		
        $this->db->from('media_table');
		
        $this->db->order_by('media_id', 'DESC');
		
        $this->db->offset($off);
		
        $this->db->limit($lim);
		
        $query_result = $this->db->get();
		
        $result_info = $query_result->result();
		
        return $result_info;
		
    }


	
	
	// public function delete_media($id) {
		
	// 	$this->db->select('*');		
 //        $this->db->from('media_table');
 //        $this->db->where('media_id',$id);
		
	// 	$query_result = $this->db->get();
		
 //        $result_info = $query_result->row();
		
	// 	unlink($result_info->media_image);	
		
 //        $this->db->where('media_id', $id);
 //        $this->db->delete('media_table');
		
 //    }
	
	public function mediaD($day) {
		
        $this->db->from('media_table');
		
        $this->db->where('media_date', date('Y-m-').$day);
		
        $query_result = $this->db->get();
		
        $result_info = $query_result->result();
		
        $f = count($result_info);
		
		if($f>0){
			echo $f;
		}else{
			echo 0;
		}
		
    }




    public function search_media(){		
		
        $search_val = $this->input->get('search_val', true);
		
		$this->db->select('*');
		
        $this->db->from('media_table');
		
		$this->db->like('media_image', $search_val);
		
        $this->db->order_by('media_id', 'DESC');
		
        $query_result = $this->db->get();
		
        $return_info = $query_result->result();
		
		
		if(count($return_info) > 0 ){
			
			$ret_data = '<div class="col-md-12 col-sm-12 col-xs-12 no_padding">';
			
			foreach($return_info as $all_media){
				
		
				$ret_data .= '<div class="media_img no_padding col-md-2 col-sm-4 col-xs-6">
					
						<img src="'. base_url().$all_media->media_image.'" alt="'.$all_media->media_image.'" class="img-thumbnail" />
						
					
						
						<span img-url="'.base_url().$all_media->media_image.'">Copy</span>
					</div>
					';
			}
			
			$ret_data .= "</div>";
			
			echo $ret_data;
			

		}else{
			echo "<h4 class='text-center'>Nothing Found.</h4>";
		}

        
    }
	
}
