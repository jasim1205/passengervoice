<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Statistics_model extends CI_Model {

    
    public function site_statistics_list() {
        
        date_default_timezone_set("Asia/Dhaka");
        
		$current_date = date("m-Y");
        
        $this->db->select('*');
        
        $this->db->from('visitor_statistics');
        
        $this->db->like('visitor_statistics_date', $current_date);
		
        $this->db->order_by('visitor_statistics_id', 'DESC');
        
        $query_result = $this->db->get();
        
        $result = $query_result->result();
        
        return $result;
        
    }
    
        
    
    public function search_site_statistics() {

        $date_from = $this->input->get('date_from', true);
		
        $date_to = $this->input->get('date_to', true);
        
        $this->db->from('visitor_statistics');
		
		$this->db->where('visitor_statistics_date >=', $date_from);
		
		$this->db->where('visitor_statistics_date <=', $date_to);
		
        $this->db->order_by('visitor_statistics_id', 'DESC');
		
        $result = $this->db->get();
		
        $result_data = $result->result(); 

        $return_data = "<thead>
							<tr>
								<th>Date</th>
								<th>Visitors Countries</th>
								<th>Total Unique Visitors</th>
							</tr>
						</thead>
						<tbody>";

        foreach ($result_data as $result_data) {
			
        	$return_data .= "
				<tr>
					<td>".$result_data->visitor_statistics_date."</td>
					<td>".$result_data->visitor_statistics_country."</td>
					<td>".$result_data->visitor_statistics_visitor_count."</td>
				</tr>";

        }
		
		$return_data .= '</tbody>';
		
		if($result_data != ''){
			
			echo $return_data;
			
		}else{
			
			echo $return_data = '<h4 class="text-center">Nothing Found</h4>';
			
		}
       
    }
    
    public function search_site_total() {

        $date_from = $this->input->get('date_from', true);
		
        $date_to = $this->input->get('date_to', true);
        
        $this->db->from('visitor_statistics');
		
		$this->db->where('visitor_statistics_date >=', $date_from);
		
		$this->db->where('visitor_statistics_date <=', $date_to);
		
        $result = $this->db->get();
		
        $result_data = $result->result(); 
		
        $rwe = 0;

        foreach ($result_data as $result_data) {
			
            $rwe += $result_data->visitor_statistics_visitor_count;

        }

        return $rwe;
        
        
       
    }
	
	
	
	
	//ads
    
    public function ad_statistics_list() {
        
        date_default_timezone_set("Asia/Dhaka");
        
		$current_date = date("m-Y");
        
        $this->db->select('*');
        
        $this->db->from('ad_statistics_table');
        
        $this->db->join('advertisement','advertisement.advertisement_id=ad_statistics_table.ad_statistics_ad_id');
        
        $this->db->like('ad_statistics_date', $current_date);
		
        $this->db->order_by('ad_statistics_id', 'DESC');
        
        $query_result = $this->db->get();
        
        $result = $query_result->result();
        
        return $result;
        
    }
	
	
    public function all_ads() {
        
        $this->db->select('*');
        
        $this->db->from('advertisement');
        
        $query_result = $this->db->get();
        
        $result = $query_result->result();
        
        return $result;
        
    }
    
    public function search_ad_statistics() {

        $date_from = $this->input->get('date_from', true);
		
        $date_to = $this->input->get('date_to', true);
		
        $advertisement_id = $this->input->get('advertisement_id', true);
        
        $this->db->from('ad_statistics_table');
        
        $this->db->join('advertisement','advertisement.advertisement_id=ad_statistics_table.ad_statistics_ad_id');
		
		$this->db->where('ad_statistics_date >=', $date_from);
		
		$this->db->where('ad_statistics_date <=', $date_to);
		
		if($advertisement_id != ''){
		
			$this->db->where('ad_statistics_ad_id', $advertisement_id);
			
		}
		
        $this->db->order_by('ad_statistics_id', 'DESC');
		
        $result = $this->db->get();
		
        $result_data = $result->result(); 

        $return_data = "<thead>
							<tr>
								<th>Date</th>
								<th>Advertisement</th>
								<th>Image</th>
								<th>Total Clicks</th>
								<th>Countries</th>
							</tr>
						</thead>
						<tbody>";
		
		$i = 0;
		
        foreach ($result_data as $result_data) {
			$i++;
        	$return_data .= "
				<tr>
					<td>".$result_data->ad_statistics_date."</td>
					<td>".$result_data->advertisement_name."</td>
					<td><img src='".base_url().$result_data->advertisement_image."' alt='".$result_data->advertisement_name."' width='auto' height='40px'/></td>
					<td>".$result_data->ad_statistics_click_count."</td>
					<td>".$result_data->ad_statistics_user_country."</td>
				</tr>";

        }
		
		$return_data .= '</tbody>';
		
		if($i > 0){
			
			echo $return_data;
			
		}else{
			
			echo $return_data = '<h4 class="text-center">Nothing Found</h4>';
			
		}
       
    }
	

	
	
	
	// for dashboard
	
	public function visitor_stats($current_date) {
        
        date_default_timezone_set("Asia/Dhaka");
        
        $this->db->select('*');
        
        $this->db->from('visitor_statistics');
        
		if($current_date != ''){
			$this->db->like('visitor_statistics_date', $current_date);
		}
        $this->db->order_by('visitor_statistics_id', 'DESC');
        
        $query_result = $this->db->get();
        
        $result = $query_result->result();
        
        $i = 0;
		
		foreach($result as $result){
			$i += $result->visitor_statistics_visitor_count;
		}
        echo $i;
    }
	
	public function country_stats($current_date) {
        
        date_default_timezone_set("Asia/Dhaka");
        
        $this->db->select('*');
        
        $this->db->from('visitor_statistics');
        
		if($current_date != ''){
			$this->db->like('visitor_statistics_date', $current_date);
		}
        $this->db->order_by('visitor_statistics_id', 'DESC');
        
        $query_result = $this->db->get();
        
        $result = $query_result->result();
        
        $i = 0;
		$country = $common_country = '';
		
		foreach($result as $result){
			
			$country .= $result->visitor_statistics_country.", ";
			
		}
		
		$country_array = explode(", ",$country);
			
		$pages_printed = array();
		
		for($x=0;$x<(count($country_array)-1);$x++){
			
			$page = $country_array[$x];
			
			if (!isset($pages_printed[$page])) {
				
				$pages_printed[$page] = true;
				
				$i++;
			}
		}
		
		
        echo $i;
    }
	
	
	public function all_visited_countries($current_date) {
        
        date_default_timezone_set("Asia/Dhaka");
        
        $this->db->select('*');
        
        $this->db->from('visitor_statistics');
        
		if($current_date != ''){
			$this->db->like('visitor_statistics_date', $current_date);
		}
        $this->db->order_by('visitor_statistics_id', 'DESC');
        
        $query_result = $this->db->get();
        
        $result = $query_result->result();
        
        $i = 0;
		$country = $common_country = '';
		
		foreach($result as $result){
			
			$country .= $result->visitor_statistics_country.", ";
			
		}
		
		$country_array = explode(", ",$country);
			
		$pages_printed = array();
		
		for($x=0;$x<(count($country_array)-1);$x++){
			
			$page = $country_array[$x];
			
			if (!isset($pages_printed[$page])) {
				
				$pages_printed[$page] = true;
				
				if($x == 0){
					$common_country .= $page;
				}else{
					$common_country .= ','.$page;
				}
				
			}
		}
		
		
        $common_country_array = explode(",",$common_country);
		
		return $common_country_array;
    }
	
	public function visited_countries_day_visited($current_date,$country) {
        
        date_default_timezone_set("Asia/Dhaka");
        
        $this->db->select('*');
        
        $this->db->from('visitor_statistics');
        
		if($current_date != ''){
			$this->db->like('visitor_statistics_date', $current_date);
		}
		
		$this->db->like('visitor_statistics_country', $country);
		
        $this->db->order_by('visitor_statistics_id', 'DESC');
        
        $query_result = $this->db->get();
        
        $result = $query_result->result();
        
        echo count($result);
    }
	
	
}
