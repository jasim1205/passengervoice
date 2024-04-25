<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Page_model extends CI_Model {

    
    public function save_page() {
		
		date_default_timezone_set("Asia/Dhaka");
		
        $data = array();
		
        $data['page_title'] = $this->input->post('page_title', true);
	
        $data['page_category_id'] = $this->input->post('page_category_id', true);

        $data['page_status'] = $this->input->post('page_status', true);
		
        $data['page_description'] = $this->input->post('page_description', true);

        if($this->input->post('page_image', true) == ''){

        	$data['page_image'] = 'uploads/no_image.jpg';

        }else {

        	$data['page_image'] = $this->input->post('page_image', true);

        }

		
        $data['page_date'] = date("Y-m-d");
		
        $data['page_time'] = date("H:i:s");
		
		
		
		// $sdata = array(); 
		
  //       $error = "";
        
  //       $config['upload_path'] = 'uploads/page_image/';
  //       $config['allowed_types'] = 'gif|jpg|jpeg|png';
  //       $config['max_size'] = 1500;
  //       $config['max_width'] = 2000;
  //       $config['max_height'] = 2000;
        
  //       $this->load->library('upload',$config);
		
  //       if(!$this->upload->do_upload('page_image')){
			
  //           $error = $this->upload->display_errors();
			
  //           echo $error;
			
  //       }else{
			
  //           $sdata = $this->upload->data();
			
  //           $data['page_image'] = $config['upload_path'].$sdata['file_name'];
			
  //       }		

        $this->db->insert('page_table', $data);
		
    }
	
	public function update_page() {
		
        $data = array();
		
        $page_id = $this->input->post('page_id', true);
		
        $old_image = $this->input->post('old_image', true);
		
        $data['page_title'] = $this->input->post('page_title', true);

         $data['page_image'] = $this->input->post('page_image', true);
		
        $data['page_category_id'] = $this->input->post('page_category_id', true);
			
        $data['page_status'] = $this->input->post('page_status', true);
		
        $data['page_description'] = $this->input->post('page_description', true);
		
		
		// $sdata = array(); 
		
  //       $error = "";
        
  //       $config['upload_path'] = 'uploads/page_image/';
  //       $config['allowed_types'] = 'gif|jpg|jpeg|png';
  //       $config['max_size'] = 1500;
  //       $config['max_width'] = 2000;
  //       $config['max_height'] = 2000;
        
  //       $this->load->library('upload',$config);
		
  //       if(!$this->upload->do_upload('page_image')){
			
  //           $error = $this->upload->display_errors();
			
  //           echo $error;
			
  //       }else{
			
		// 	unlink($old_image);
			
  //           $sdata = $this->upload->data();
			
  //           $data['page_image'] = $config['upload_path'].$sdata['file_name'];
			
  //       }
		
		$this->db->where('page_id', $page_id);
        $this->db->update('page_table', $data);
		
    }

    public function all_page() {
		
        $this->db->select('*');
		
        $this->db->from('page_table');
		    
        $this->db->join('category_table', 'page_table.page_category_id=category_table.category_id', 'left');
		
        $this->db->order_by('page_id', 'DESC');
		
        $query_result = $this->db->get();
		
        $result_info = $query_result->result();
		
        return $result_info;
		
    }

	public function get_page_des() {
        
        $page_id = $this->input->get('page_id', true);

        $this->db->select('*');
		
        $this->db->from('page_table');
		
        $this->db->where('page_id', $page_id);
		
        $query_result = $this->db->get();
		
        $result_info = $query_result->row();
		
        echo $result_info->page_description;
		
    }

	public function page_limit($off,$lim) {
		
        $this->db->select('*');
		
        $this->db->from('page_table');
		    
        $this->db->join('category_table', 'page_table.page_category_id=category_table.category_id', 'left');
		
        $this->db->order_by('page_id', 'DESC');
		
        $this->db->offset($off);
		
        $this->db->limit($lim);
		
        $query_result = $this->db->get();
		
        $result_info = $query_result->result();
		
        return $result_info;
		
    }
	
	public function delete_page($id) {
        
        if($id == 2 || $id == 3){

		
        }else {
            // $this->db->select('*');		
            // $this->db->from('page_table');
            // $this->db->where('page_id',$id);
            
            // $query_result = $this->db->get();
            
            // $result_info = $query_result->row();
            
            // unlink($result_info->page_image);	
            
            $this->db->where('page_id', $id);
            $this->db->delete('page_table');
        }
    }
	
	public function search_page(){		
		
        $search_val = $this->input->get('search_val', true);
		
		$this->db->select('*');
		
        $this->db->from('category_table');
		    
        $this->db->join('page_table', 'category_table.category_id=page_table.page_category_id', 'right');
		
        $this->db->where('category_type','2');
		
		$this->db->like('page_table.page_title',$search_val);
		
        $query_result = $this->db->get();
		
        $return_info = $query_result->result();
		
		
		if(count($return_info) > 0 ){
			
			$ret_data = '
				<thead>
					<tr>
						<th>Title</th>
						<th>Image</th>
						<th>Category</th>
						<th>Status</th>
						<th>Date/Time</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
			';
			
			foreach($return_info as $return_info){
				
				$sts = $return_info->page_status;
				
				if($sts == 0){
					$sts = '<span class="label label-danger">Inactive</span>';
				}
				if($sts == 1){
					$sts = '<span class="label label-success">Active</span>';
				}
				
				$ret_data .= '<tr>
								<td>'.$return_info->page_title.'</td>
								<td>
								
									<img src="'.base_url().$return_info->page_image.'" alt="Default Image" width="auto" height="30px"/>
								
								</td>
								<td>'.$return_info->category_name.'</td>
								<td>'.$sts.'</td>
								<td>'.$return_info->page_date." ".$return_info->page_time.'</td>
								<td>
								
									<button 
								
									page-title="'.$return_info->page_title.'" 
									page-cat-id="'.$return_info->page_category_id.'" 
									page-cat-name="'.$return_info->category_name.'" 
									page-image="'.base_url().$return_info->page_image.'" 
									
									old-image="'.$return_info->page_image.'" 
									
									page-status="'.$return_info->page_status.'"  
									
									class="btn btn-primary btn-xs edit_page" type="button" value="'.$return_info->page_id.'">
									
										<i class="fa fa-edit"></i> Edit
										
									</button>
									
									<a onclick="return confirm(\'Are You Sure?\');" class="btn btn-danger btn-xs" href="'.base_url().'delete-page/'.$return_info->page_id.'">
									
										<i class="fa fa-trash-o"></i> Delete
										
									</a>
									
								</td>
							</tr>';
			}
			
			$ret_data .= "</tbody>";
			
			echo $ret_data;
			

		}else{
			echo "1";
		}

        
    }
	
	
	public function pageD($day) {
		
        $this->db->from('category_table');
		    
        $this->db->join('page_table', 'category_table.category_id=page_table.page_category_id', 'right');
		
        $this->db->where('category_type','4');
		
        $this->db->where('page_table.page_date', date('Y-m-').$day);
		
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
