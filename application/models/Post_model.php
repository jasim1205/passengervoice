<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Post_model extends CI_Model {

    public function save_post() {

    	$data = array();
		
        $cats = $this->input->post('post_category_id', true);
		
		if(count($cats) == 0){
			$data['post_category_id'] = 0;
		}else{
			$data['post_category_id'] = implode(",",$cats);
		}
		
		date_default_timezone_set("Asia/Dhaka");

        $data['post_title'] = $this->input->post('post_title', true);

        $data['post_sub_title'] = $this->input->post('post_sub_title', true);

        $data['image_caption'] = $this->input->post('image_caption', true);

        $data['scroll'] = $this->input->post('scroll', true);

        $data['lead_news'] = $this->input->post('lead_news', true);

        $data['top_news'] = $this->input->post('top_news', true);

        $data['category_pin'] = $this->input->post('category_pin', true);

        $data['reporter'] = $this->input->post('reporter', true);

        $data['related_news_id'] = $this->input->post('related_news_id', true);
			
        $data['post_status'] = $this->input->post('post_status', true);
		
        $data['post_description'] = $this->input->post('post_description', false);

        $data['seo_keyword'] = $this->input->post('seo_keyword', true);

        $data['seo_description'] = $this->input->post('seo_description', true);
        

        if($this->input->post('post_image', true) == ''){

        	$data['post_image'] = 'uploads/no_image.jpg';

        }else {

        	$data['post_image'] = $this->input->post('post_image', true);

        }




        $data['posted_by'] = $this->session->userdata('user_id');

        $data['updated_by'] = 0;



		
        $data['post_date'] = date("Y-m-d");
		
        $data['post_time'] = date("H:i:s");
		
		$data['news_views'] = 0;



		
// 		$sdata = array(); 
		
//          $error = "";
        
//          $config['upload_path'] = 'uploads/post_image/';
//          $config['allowed_types'] = 'gif|jpg|jpeg|png';
//          $config['max_size'] = 1500;
//          $config['max_width'] = 2000;
//          $config['max_height'] = 2000;
        
//          $this->load->library('upload',$config);
		
//          if(!$this->upload->do_upload('post_image')){
			
//              $error = $this->upload->display_errors();
			
//              echo $error;
			
//          }else{
			
//              $sdata = $this->upload->data();
			
//              $data['post_image'] = $config['upload_path'].$sdata['file_name'];
			
//          }		

        $this->db->insert('post_table', $data);
		
    }
	
	public function update_post() {

        $data = array();
		
        $cats = $this->input->post('post_category_id', true);
		
		if(count($cats) == 0){
			$data['post_category_id'] = 0;
		}else{
			$data['post_category_id'] = implode(",",$cats);
		}
		
		date_default_timezone_set("Asia/Dhaka");

        $post_id = $this->input->post('post_id', true);	
        
		$data['post_title'] = $this->input->post('post_title', true);

        $data['post_sub_title'] = $this->input->post('post_sub_title', true);

        

        $old_image = $this->input->post('old_image', true);

        $data['image_caption'] = $this->input->post('image_caption', true);

        $data['scroll'] = $this->input->post('scroll', true);

        $data['lead_news'] = $this->input->post('lead_news', true);

        $data['top_news'] = $this->input->post('top_news', true);

        $data['category_pin'] = $this->input->post('category_pin', true);

        $data['reporter'] = $this->input->post('reporter', true);

        $data['related_news_id'] = $this->input->post('related_news_id', true);
			
        $data['post_status'] = $this->input->post('post_status', true);
		
        $data['post_description'] = $this->input->post('post_description', false);

        $data['seo_keyword'] = $this->input->post('seo_keyword', true);

        $data['seo_description'] = $this->input->post('seo_description', true);

        $data['updated_by'] = $this->session->userdata('user_name');


       	$data['post_image'] = $this->input->post('post_image', true);
		
       	$data['updated_date'] = date("Y-m-d");
		
         $data['updated_time'] = date("H:i:s");

		
		$this->db->where('post_id', $post_id);
        $this->db->update('post_table', $data);
    }

    public function all_post( ) {
		
        $this->db->select('*');
		
        $this->db->from('post_table');

		// $this->db->where('posted_by', $user_id); //new line $user_id
		// $this->db->join('user_table', 'user_table.user_id=post_table.posted_by', 'left' );
				
        $this->db->order_by('post_id', 'DESC');
		
        $query_result = $this->db->get();
		
        $result_info = $query_result->result();
		
        return $result_info;
		
    }
	
    public function reporter() {
		
        $this->db->select('*');
		
        $this->db->from('reporter_table');
		
        $this->db->order_by('reporter_id', 'DESC');
		
        $query_result = $this->db->get();
		
        $result_info = $query_result->result();
		
        return $result_info;
		
    }
	public function get_post_des() {

		$post_id = $this->input->get('post_id', true);

        $this->db->select('*');
		
        $this->db->from('post_table');
		
        $this->db->where('post_id', $post_id);
		
        $query_result = $this->db->get();
		
        $result_info = $query_result->row();
		
        echo $result_info->post_description;
	}
	


	
	public function post_limit($off,$lim) {
		
        $this->db->select('*');
		
        $this->db->from('post_table');

        $this->db->join('user_table', 'post_table.posted_by=user_table.user_id', 'left');
		
        $this->db->join('reporter_table', 'post_table.reporter=reporter_table.reporter_id', 'left');
		
        $this->db->order_by('post_id', 'DESC');
		
        $this->db->offset($off);
		
        $this->db->limit($lim);
		
        $query_result = $this->db->get();
		
        $result_info = $query_result->result();
		
        return $result_info;
		
    }
	

	
	public function delete_post($id) {
		
		// $this->db->select('*');		
  //       $this->db->from('post_table');
  //       $this->db->where('post_id',$id);
		// $query_result = $this->db->get();		
  //       $result_info = $query_result->row();
		// unlink($result_info->post_image);		
		
        $this->db->where('post_id', $id);
        $this->db->delete('post_table');
		
    }
	
	public function search_post(){		
		
        $search_val = $this->input->get('search_val', true);
		
		$this->db->select('*');
		
        $this->db->from('post_table');

        $this->db->join('user_table', 'post_table.posted_by=user_table.user_id', 'left');
		
        $this->db->join('reporter_table', 'post_table.reporter=reporter_table.reporter_id', 'left');
		
		$this->db->like('post_title',$search_val);
		
		$this->db->or_where('post_id',$search_val);
		
        $this->db->order_by('post_id', 'DESC');
		
        $query_result = $this->db->get();
		
        $return_info = $query_result->result();
		
		
		if(count($return_info) > 0 ){
			
			$ret_data = '
				<thead>
					<tr>
						<th>ID</th>
						<th>Title</th>
						<th>Image</th>
						<th>Category</th>
						<th>Status</th>
						<th>Date/Time</th>
						<th>Reporter</th>
						<th>Operator</th>
						<th>Views</th>
						<th style="width:70px;">Action</th>
					</tr>
				</thead>
				<tbody>
			';
			
			foreach($return_info as $all_post){
				
				$sts = $all_post->post_status;
				
				if($sts == 0){
					$sts = '<span class="label label-danger">Inactive</span>';
				}
				if($sts == 1){
					$sts = '<span class="label label-success">Active</span>';
				}
				
				$cat_array = explode(',',$all_post->post_category_id);
				
				$category_info = $this->category_model->get_category(1);
				$cat_name = '';
				foreach ($category_info as $category) {
					
					if(in_array($category->category_id, $cat_array)){
						$cat_name .= $category->category_name.", ";
					}
				} 
				
				$ret_data .= '<tr>
								<td>'.$all_post->post_id.'</td>
								<td>'.$all_post->post_title.'</td>
								<td>
								
									<img src="'.base_url().$all_post->post_image.'" alt="'.$all_post->post_title.'" width="auto" height="30px"/>
								
								</td>
								<td>'.$cat_name.'</td>
								<td>'.$sts.'</td>
								<td>'.$all_post->post_date.' '.$all_post->post_time.'</td>
								<td>'.$all_post->reporter_name.'</td>
								<td>'.$all_post->user_name.'</td>
								<td>'.$all_post->news_views.'</td>
								<td>
								
									<button 
								
									post-title="'.$all_post->post_title.'" 
									post-sub-title="'.$all_post->post_sub_title.'" 
									post-image="'.base_url().$all_post->post_image.'" 
									old-image="'.$all_post->post_image.'"
									image-caption="'.$all_post->image_caption.'"
									scroll="'.$all_post->scroll.'"
									lead-news="'.$all_post->lead_news.'"
									top-news="'.$all_post->top_news.'"
									category-pin="'.$all_post->category_pin.'"
									reporter="'.$all_post->reporter.'"
									reporter-name="'.$all_post->reporter_name.'"						
									
									related-news-id="'.$all_post->related_news_id.'"

									post-status="'.$all_post->post_status.'" 
									seo-keyword="'.$all_post->seo_keyword.'" 
									seo-description="'.$all_post->seo_description.'" 
									
									class="btn btn-primary btn-xs edit_post_modal" type="button" value="'.$all_post->post_id.'">
									
										<i class="fa fa-edit"></i>
										
									</button>
									
									<a onclick="return confirm(\'Are You Sure?\');" class="btn btn-danger btn-xs" href="'.base_url().'delete-post/'.$all_post->post_id.'">
									
										<i class="fa fa-trash-o"></i>
										
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
	
	

	
	public function postD($day) {
		
        $this->db->from('category_table');
		    
        $this->db->join('post_table', 'category_table.category_id=post_table.post_category_id', 'right');
		
        $this->db->where('category_type','1');
		
        $this->db->where('post_table.post_date', date('Y-m-').$day);
		
        $query_result = $this->db->get();
		
        $result_info = $query_result->result();
		
        $f = count($result_info);
		
		if($f>0){
			echo $f;
		}else{
			echo 0;
		}
		
    }
	
	public function get_post_cats(){		
		
        $post_id = $this->input->get('post_id', true);
		
		$this->db->select('*');
		
        $this->db->from('post_table');
		
        $this->db->where('post_id', $post_id);
		
        $query_result = $this->db->get();
		
        $return_info = $query_result->row();
		
		
		if($return_info != ''){

			$cat_array = explode(',',$return_info->post_category_id);
										
			$category_info = $this->category_model->get_category(1);

			$ret_data = '';

			foreach ($category_info as $category) {

				if(in_array($category->category_id, $cat_array)){

					$chekc_cat = 'checked';

				}else {
					$chekc_cat = ' ';
				}


				$ret_data .= '
					<label style="width:50%;float:left;font-size:13px;">

						<input type="checkbox" name="post_category_id[]" value="'.$category->category_id.'" '.$chekc_cat.'> '.$category->category_name.'

					</label>
				';
			}

			$ret_data .= '<span class="clearfix"></span>';

			echo $ret_data;
			

		}else{
			echo "1";
		}

        
    }
	
	

}
