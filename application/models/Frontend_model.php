<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Frontend_model extends CI_Model {

	public function meta() {
		
        $this->db->select('*');
		
        $this->db->from('meta_table');
		
        $this->db->where('meta_id', 1);
		
        $query_result = $this->db->get();
		
        $result_info = $query_result->row();
		
        return $result_info;
		
    }
    
    public function menu(){
		
		$this->db->select('*');
		
        $this->db->from('category_table');
		
        $this->db->where('category_type', 1);
		
        $this->db->where('category_status', 1);
		
        $this->db->where('menu_position', 1);
		
        $this->db->order_by('menu_order', 'ASC');
		
        $query_result = $this->db->get();
		
        $result_info = $query_result->result();
		
        return $result_info;
		
    }
	
    
    public function get_category_single($id){
		
		$this->db->select('*');
		
        $this->db->from('category_table');
		
        $this->db->where('category_id', $id);
		
        $query_result = $this->db->get();
		
        $result_info = $query_result->row();
		
        return $result_info;
		
    }
    
	
    
    public function get_ad($id){
		
		$this->db->select('*');
		
        $this->db->from('advertisement');
		
        $this->db->where('advertisement_location', $id);
		
        $this->db->where('advertisement_status', 1);
		
        $this->db->order_by('advertisement_id','DESC');
		
        $query_result = $this->db->get();
		
        $result_info = $query_result->row();
		
        return $result_info;
		
    }
	
	public function scroll_news(){
		
		$this->db->select('*');
		
        $this->db->from('post_table');
		
        $this->db->where('post_status', 1);
		
        $this->db->where('scroll', 1);
		
        $this->db->order_by('post_id', 'DESC');
		
        $this->db->limit(5);
		
        $query_result = $this->db->get();
		
        $result_info = $query_result->result();
		
        return $result_info;
		
    }
	
	public function slider_news(){
		
		$this->db->select('*');
		
        $this->db->from('post_table');

        $this->db->join('reporter_table', 'post_table.reporter=reporter_table.reporter_id', 'left');
		
        $this->db->where('post_status', 1);
		
        $this->db->where('top_news', 1);
		
        $this->db->order_by('post_id', 'DESC');
		
        $query_result = $this->db->get();
		
        $result_info = $query_result->result();
		
        return $result_info;
		
    }
	public function lead_news(){
		
		$this->db->select('*');
		
        $this->db->from('post_table');

        $this->db->join('reporter_table', 'post_table.reporter=reporter_table.reporter_id', 'left');
		
        $this->db->where('post_status', 1);
		
        $this->db->where('lead_news', 1);
		
        $this->db->order_by('post_id', 'DESC');
		
        $query_result = $this->db->get();
		
        $result_info = $query_result->row();
		
        return $result_info;
		
    }
	
	public function news_by_cat($cat_id,$lim,$off){
		
		$this->db->select('*');
		
        $this->db->from('post_table');
		
        $this->db->join('reporter_table', 'post_table.reporter=reporter_table.reporter_id', 'left');
        
        $this->db->where('FIND_IN_SET("'.$cat_id.'",post_category_id) !=',0);
		
        $this->db->where('post_status', 1);
		
        $this->db->order_by('post_id', 'DESC');
		
		if($lim > 0){
			$this->db->limit($lim);
		}
        if($off > 0){
			$this->db->offset($off);	
		}
		
        $query_result = $this->db->get();
		
		if($lim == 1){
			$result_info = $query_result->row();
		}else{
			$result_info = $query_result->result();
		}
        
		
        return $result_info;
		
    }
	
	
	public function category_location($id){
		
		$this->db->select('*');
		
        $this->db->from('category_location');
		
		$this->db->join('category_table','category_location.category_id=category_table.category_id','left');

		$this->db->join('post_table','category_location.category_id=post_table.post_category_id','left');

		$this->db->order_by('post_table.post_title', 'DESC');

        $this->db->where('category_location.category_location_id', $id);
		
        $query_result = $this->db->get();
		
        $result_info = $query_result->row();
		
        return $result_info;
		
    }
    
	public function most_viewed(){
		
		$this->db->select('*');
		
        $this->db->from('post_table');
		
        $this->db->where('post_status', 1);
		
        $this->db->order_by('news_views', 'DESC');
		
        $this->db->limit(20);
		
        $query_result = $this->db->get();
		
        $result_info = $query_result->result();
		
        return $result_info;
		
    }
		
	public function search_news(){
		
		if(isset($_GET['s']) && $_GET['s'] != ''){		
		
			$this->db->select('*');
			
			$this->db->from('post_table');
			
			$this->db->join('reporter_table', 'post_table.reporter=reporter_table.reporter_id', 'left');
			
			$this->db->where('post_status', 1);
			
			$this->db->like('post_title', $_GET['s']);
			
			$this->db->order_by('post_id', 'DESC');
			
			$query_result = $this->db->get();
			
			$result_info = $query_result->result();
			
			return $result_info;
			
		}
    }
	
	public function sidebar_latest($skip_id = false){
		
		$this->db->select('*');
		
        $this->db->from('post_table');
		
        $this->db->join('reporter_table', 'post_table.reporter=reporter_table.reporter_id', 'left');
		
        $this->db->where('post_status', 1);

        if($skip_id){
        	$this->db->where('post_id !=', $skip_id);
        }
		
        
		
        $this->db->order_by('post_id', 'DESC');
		
        $this->db->limit(4);
		
        $query_result = $this->db->get();
		
        $result_info = $query_result->result();
		
        return $result_info;
		
    }
		
	public function latest_news(){
		
		$this->db->select('*');
		
        $this->db->from('post_table');
		
        $this->db->where('post_status', 1);
		
        $this->db->order_by('post_id', 'DESC');
		
        $this->db->limit(20);
		
        $query_result = $this->db->get();
		
        $result_info = $query_result->result();
		
        return $result_info;
		
    }
    	
	public function category_pin($id){
		
		$this->db->select('*');
		
        $this->db->from('post_table');
		
        $this->db->join('reporter_table', 'post_table.reporter=reporter_table.reporter_id', 'left');
        
        $this->db->where('FIND_IN_SET("'.$id.'",post_category_id) !=',0);
		
        $this->db->where('post_status', 1);
		
		$this->db->where('category_pin', 1);
		
        $this->db->order_by('post_id', 'DESC');
		
        $query_result = $this->db->get();
		
        $result_info = $query_result->row();
		
        return $result_info;
		
    }
//for archive start
	public function archive($ar_date){
		
		$this->db->select('*');
		
        $this->db->from('post_table');
		
        $this->db->join('reporter_table', 'post_table.reporter=reporter_table.reporter_id', 'left');
        
        $this->db->where('FIND_IN_SET("'.$ar_date.'",post_category_id) !=',0);
		
        $this->db->where('post_status', 1);

        $this->db->where('post_date', $ar_date);
		
		// $this->db->where('category_pin', 1);
		
        $this->db->order_by('post_id', 'DESC');
		
        $query_result = $this->db->get();
		
        $result_info = $query_result->row();
		
        return $result_info;
		
    }
    public function get_post_by_date($ar_date){
		
		$this->db->select('*');
		
        $this->db->from('post_table');
		
        $this->db->where('post_date', $ar_date);
		
        $query_result = $this->db->get();
		
        $result_info = $query_result->row();
		
        return $result_info;
		
    }
    // public function post_limit($off,$lim,$ar_date,$skip_id = false) {
		
    //     $this->db->select('*');
		
    //     $this->db->from('post_table');
		
    //     $this->db->join('reporter_table', 'post_table.reporter=reporter_table.reporter_id', 'left');
        
    //     $this->db->where('FIND_IN_SET("'.$ar_date.'",post_category_id) !=',0);
		
    //     $this->db->where('post_date', $ar_date);

    //     $this->db->where('post_status', 1);

    //       if($skip_id){
		
    //     	$this->db->where('post_id !=', $skip_id);

    //     }
		
		
		
    //     $this->db->order_by('post_id', 'DESC');
		
    //     $this->db->offset($off);
		
    //     $this->db->limit($lim);
		
    //     $query_result = $this->db->get();
		
    //     $result_info = $query_result->result();
		
    //     return $result_info;
		
    // }
    	
	// public function posts($ar_date,$skip_id = false){
		
	// 	$this->db->select('*');
		
    //     $this->db->from('post_table');
		
    //     $this->db->join('reporter_table', 'post_table.reporter=reporter_table.reporter_id', 'left');
        
    //     $this->db->where('FIND_IN_SET("'.$ar_date.'",post_category_id) !=',0);
		
    //     $this->db->where('post_date', $ar_date);

    //     $this->db->where('post_status', 1);

    //     if($skip_id){
		
    //     	$this->db->where('post_id !=', $skip_id);

    //     }
		
    //     $this->db->order_by('post_id', 'DESC');
		
    //     $query_result = $this->db->get();
		
    //     $result_info = $query_result->result();
		
    //     return $result_info;
		
    // }
//for archive end


	public function news($id,$skip_id = false){
		
		$this->db->select('*');
		
        $this->db->from('post_table');
		
        $this->db->join('reporter_table', 'post_table.reporter=reporter_table.reporter_id', 'left');
        
        $this->db->where('FIND_IN_SET("'.$id.'",post_category_id) !=',0);
		
        $this->db->where('post_status', 1);

        if($skip_id){
		
        	$this->db->where('post_id !=', $skip_id);

        }
		
        $this->db->order_by('post_id', 'DESC');
		
        $query_result = $this->db->get();
		
        $result_info = $query_result->result();
		
        return $result_info;
		
    }

	
    public function news_limit($off,$lim,$id,$skip_id = false) {
		
        $this->db->select('*');
		
        $this->db->from('post_table');
		
        $this->db->join('reporter_table', 'post_table.reporter=reporter_table.reporter_id', 'left');
        
        $this->db->where('FIND_IN_SET("'.$id.'",post_category_id) !=',0);
		
        $this->db->where('post_status', 1);

          if($skip_id){
		
        	$this->db->where('post_id !=', $skip_id);

        }
		
		
		
        $this->db->order_by('post_id', 'DESC');
		
        $this->db->offset($off);
		
        $this->db->limit($lim);
		
        $query_result = $this->db->get();
		
        $result_info = $query_result->result();
		
        return $result_info;
		
    }
	    
    public function news_view($id){
		
		$this->db->select('*');
		
        $this->db->from('post_table');
		
        $this->db->join('reporter_table', 'post_table.reporter=reporter_table.reporter_id', 'left');
		
        $this->db->where('post_status', 1);
		
        $this->db->where('post_id', $id);
		
        $query_result = $this->db->get();
		
        $result_info = $query_result->row();
		
        return $result_info;
		
    }
    
    public function related($skip_id,$cat_id){

        $this->db->select('*');
		
        $this->db->from('post_table');
		
        $this->db->join('reporter_table', 'post_table.reporter=reporter_table.reporter_id', 'left');
		
        $this->db->where('post_status', 1);
		
        $this->db->where('post_id !=', $skip_id);
        
        $this->db->where('FIND_IN_SET("'.$cat_id.'",post_category_id) !=',0);
		
        $this->db->order_by('post_id', 'DESC');

        $this->db->limit(6);
		
        $query_result = $this->db->get();
		
        $result_info = $query_result->result();
		
        return $result_info;
    }
	
	
	
	public function page($id){
		
		$this->db->select('*');
		
        $this->db->from('page_table');
		
        $this->db->where('page_id', $id);
		
        $this->db->where('page_status', 1);
		
        $query_result = $this->db->get();
		
        $result_info = $query_result->row();
		
        return $result_info;
		
    }
	
	
	public function pages(){
		
		$this->db->select('*');
		
        $this->db->from('page_table');
		
        $this->db->where('page_status', 1);
		
        $query_result = $this->db->get();
		
        $result_info = $query_result->result();
		
        return $result_info;
		
    }

    
	public function photo_feed(){
		
		$this->db->select('*');
		
        $this->db->from('image_table');		
		
        $this->db->where('image_status', 1);
		
        $this->db->order_by('image_id', 'DESC');
		
        $query_result = $this->db->get();
		
        $result_info = $query_result->result();
		
        return $result_info;
		
    }
    
    public function photo_feed_limit($off,$lim) {
		
        $this->db->select('*');
		
        $this->db->from('image_table');
		
        $this->db->where('image_status', 1);
		
        $this->db->order_by('image_id', 'DESC');
		
        $this->db->offset($off);
		
        $this->db->limit($lim);
		
        $query_result = $this->db->get();
		
        $result_info = $query_result->result();
		
        return $result_info;
		
    }	
	
	
	public function home_video(){
		
		$this->db->select('*');
		
        $this->db->from('video_table');		
		
        $this->db->where('video_status', 1);
		
        $this->db->where('video_pin', 1);
		
        $this->db->order_by('video_id', 'DESC');
		
        $query_result = $this->db->get();
		
        $result_info = $query_result->result();
		
        return $result_info;
		
	}
	
	public function home_gallary(){
		
		$this->db->select('*');
		
        $this->db->from('image_table');		
		
        $this->db->where('image_status', 1);
		
        $this->db->order_by('image_id', 'DESC');
		
        $this->db->limit(5);
		
        $query_result = $this->db->get();
		
        $result_info = $query_result->result();
		
        return $result_info;
		
	}
		
	public function video(){
		
		$this->db->select('*');
		
        $this->db->from('video_table');		
		
        $this->db->where('video_status', 1);
		
        $this->db->order_by('video_id', 'DESC');
		
        $query_result = $this->db->get();
		
        $result_info = $query_result->result();
		
        return $result_info;
		
    }
    
    public function video_limit($off,$lim) {
		
        $this->db->select('*');
		
        $this->db->from('video_table');
		
        $this->db->where('video_status', 1);
		
        $this->db->order_by('video_id', 'DESC');
		
        $this->db->offset($off);
		
        $this->db->limit($lim);
		
        $query_result = $this->db->get();
		
        $result_info = $query_result->result();
		
        return $result_info;
		
    }

	
	public function send_contact() {
       
        $data = array();
        $data['contact_name'] = $this->input->post('contact_name', true);
        $data['contact_number'] = $this->input->post('contact_number', true);
        $data['contact_email'] = $this->input->post('contact_email', true);		
        $data['contact_headline'] = $this->input->post('contact_headline',true);
        $data['contact_details'] = $this->input->post('contact_details', true);
       	
        //$to = "oneey@outlook.com";
       $to = "pvoice2020@gmail.com";
        
		$subject = $data['contact_headline'];
		
				
		
		$message = "From: ".$data['contact_name']." <".$data['contact_email'].">\r\n \r\n\ Number: ".$data['contact_number']."\r\n \r\n\ News Headline: ".$data['contact_headline']."\r\n \r\n Message: \r\n".$data['contact_details'];
		
		
		mail($to,$subject,$message);
		
    }
		
	public function save_subscribe(){		
		
		date_default_timezone_set("Asia/Dhaka");
        
		$data = array();
		
        $data['subscribe_email'] = $this->input->get('subscribe', true);
		
        $data['subscribe_date'] = date("Y-m-d");
		
        $data['subscribe_time'] = date("H:i:s");
		
        $res = $this->db->insert('subscribe_table', $data);

        if ($res){
			echo '1';
		}
    }
	
	
	
	
	
	///visitor
    
    
    public function insert_visitor($c_ip,$user_country) {
        
        $data = array();
        
        date_default_timezone_set("Asia/Dhaka");
        
		$current_date = date("d-m-Y");
        
        $data['visitor_statistics_date'] = $current_date;
        
        $data['visitor_statistics_visitor_count '] = 1;
		
		if($user_country != ''){
			
			$data['visitor_statistics_country'] = $user_country;
        
		}
        
        $data['visitor_statistics_visitor_ip'] = $c_ip.", ";
        
        $this->db->insert('visitor_statistics', $data);
        
    }
    
    
    public function find_visitor() {
        
        date_default_timezone_set("Asia/Dhaka");
        
		$current_date = date("d-m-Y");
        
        $this->db->select('*');
        
        $this->db->from('visitor_statistics');
        
        $this->db->where('visitor_statistics_date', $current_date);
        
        $query_result = $this->db->get();
        
        $result = $query_result->row();
        
        if($result){
            
            return $result;
            
        }
        
        
    }
    
    
    
    public function update_visitor($id, $count, $insert_country, $insert_ip) {
        
        $data = array();
        
        $data['visitor_statistics_visitor_count'] = $count + 1;
        
        $data['visitor_statistics_country'] = $insert_country;
        
        $data['visitor_statistics_visitor_ip'] = $insert_ip;
        
        $this->db->where('visitor_statistics_id', $id);
        
        $this->db->update('visitor_statistics', $data);
        
    }
    
    
    //ads
	
	
	////// ad statistics

    public function check_ad_date_id($add_id) {
        
        date_default_timezone_set("Asia/Dhaka");
        
		$current_date = date("d-m-Y");
        
        $this->db->select('*');
        
        $this->db->from('ad_statistics_table');
        
        $this->db->where('ad_statistics_date', $current_date);
        
        $this->db->where('ad_statistics_ad_id', $add_id);
        
        $query_result = $this->db->get();
        
        $result = $query_result->row();
        
        if($result){
            
            return $result;
            
        }
        
        
        
    }
    
    
    public function insert_ad_count($add_id,$user_country) {
        
        $data = array();
        
        date_default_timezone_set("Asia/Dhaka");
        
		$current_date = date("d-m-Y");
        
        $data['ad_statistics_date'] = $current_date;
        
        $data[' ad_statistics_ad_id '] = $add_id;
        
        $data['ad_statistics_click_count'] = 1;
		
		if($user_country != ''){
			
			$data['ad_statistics_user_country'] = $user_country;
        
		}
        
        $this->db->insert('ad_statistics_table', $data);
        
    }
    
    
    public function update_ad_count($id,$count,$insert_country) {
        
        $data = array();
        
        $data['ad_statistics_click_count'] = 1+$count;
        
        $data['ad_statistics_user_country'] = $insert_country;
        
        $this->db->where('ad_statistics_id', $id);
        
        $this->db->update('ad_statistics_table', $data);
        
    }
    
    
	
}
