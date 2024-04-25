<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Archive_model extends CI_Model {

	public function save_media() {
		
        date_default_timezone_set("Asia/Dhaka");
		
        $data = array();
		
        $data['media_date'] = date("Y-m-d");
		
        $data['media_time'] = date("H:i:s");
		
		$img_path = 'uploads/media_image/';

		$year = date('Y');

	    $month = date('m');

	    $path = $img_path . $year . "/" . $month;
	    
	     if (!is_dir($path)) {
	        mkdir($path, 0777, true);
	    }
		
		$sdata = array(); 
		
        $error = "";
        
        $config['upload_path'] = $path ."/";
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['max_size'] = 1500;
        $config['max_width'] = 2000;
        $config['max_height'] = 2000;
        $config['file_name'] = $_FILES['media_image']['name'];
            
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



    public function search_media(){		
		
        $search_val = $this->input->get('search_val',true);
		
		$this->db->select('*');
		
        $this->db->from('media_table');
		
		$this->db->like('media_image', $search_val);
		
        $this->db->order_by('media_id', 'DESC');
		
        $query_result = $this->db->get();
		
        $return_info = $query_result->result();
		
		
		if(count($return_info) > 0 ){
			$ret_data = '<div class="col-md-12 col-sm-12 col-xs-12 no_padding">';
			
			foreach($return_info as $all_media){
				
				$ret_data .= '
					<div class="col-md-3 col-sm-4 col-xs-12">
		      			<div class="mImg">
			      			
		      				<img src="'.base_url().$all_media->media_image.'" alt="'.$all_media->media_image.'">
			      		
			      			<div class="img-hov">
			      				<a mimg-name="'.$all_media->media_image.'"
			      				mimg-url="'.base_url().$all_media->media_image.'"  class="btn" data-dismiss="modal">Insert</a>
			      			</div>
			      		</div>
		      		</div>
				';
			}
			$ret_data .= '</div>';

			echo $ret_data;
			

		}else{
			echo "<h4 class='text-center'>Nothing Found.</h4>";
		}

        
    }

 

    public function get_media(){		
		
		$this->db->select('*');
		
        $this->db->from('media_table');
		
        $this->db->order_by('media_id', 'DESC');

        $this->db->limit(20);
		
        $query_result = $this->db->get();
		
        $return_info = $query_result->result();
		
		
		if(count($return_info) > 0 ){
			$ret_data = '<div class="col-md-12 col-sm-12 col-xs-12 no_padding">';
			
			foreach($return_info as $all_media){
				
				$ret_data .= '
					<div class="col-md-3 col-sm-4 col-xs-12">
		      			<div class="mImg">
			      			
		      				<img src="'.base_url().$all_media->media_image.'" alt="'.$all_media->media_image.'">
			      		
			      			<div class="img-hov">
			      				<a mimg-name="'.$all_media->media_image.'"
			      				mimg-url="'.base_url().$all_media->media_image.'"  class="btn" data-dismiss="modal">Insert</a>
			      			</div>
			      		</div>
		      		</div>
				';
			}
			$ret_data .= '</div>';

			echo $ret_data;
			

		}else{
			echo "<h4 class='text-center'>Nothing Found.</h4>";
		}

        
    }



    public function archive_media() {
		
        $this->db->select('*');
		
        $this->db->from('media_table');
		
        $this->db->order_by('media_id', 'DESC');

        $this->db->limit(20);
		
        $query_result = $this->db->get();
		
        $result_info = $query_result->result();
		
        return $result_info;
		
    }
	
	
}
