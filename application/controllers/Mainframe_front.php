<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mainframe_front extends CI_Controller {

	public function index(){
		
		$data = array();
		
		$data['meta'] = $this->frontend_model->meta();
		
		$data['menu'] = $data['footer_menu'] = $this->frontend_model->menu();
		
		$data['scroll_news'] = $this->frontend_model->scroll_news();

		$data['slider_news'] = $this->frontend_model->slider_news();
		
		$data['home_videos'] = $this->frontend_model->home_video();

		//$data['home_tv_video'] = $this->frontend_model->home_video(60);
		
		$data['home_gallary']  = $this->frontend_model->home_gallary();
		
		$data['latest_news'] = $this->frontend_model->latest_news();
		
		$data['most_viewed'] = $this->frontend_model->most_viewed();
		
		$data['main_content'] = $this->load->view('frontend/home',$data,true);
		
		$this->load->view('frontend/mainframe', $data);
		
	}
	
	


	public function category($id){
		
		$data = array();
		
		$data['category_pin'] = $category_pin = $this->frontend_model->category_pin($id);
		
		//pagination start

		$cpin = '';

		if(isset($category_pin->post_id)) {
			$cpin = $category_pin->post_id;
		}
		
		$ord = $this->frontend_model->news($id,$cpin);
		
		$rows = count($ord);

		$page_rows = 21;

		$last = ceil($rows/$page_rows);

		if($last < 1){
			$last = 1;
		}

		$pagenum = 1;

		// Get pagenum from URL vars if it is present, else it is = 1
		if(isset($_GET['pn'])){
			
			$pagenum = preg_replace('#[^0-9]#', '', $_GET['pn']);
			
		}

		// This makes sure the page number isn't below 1, or more than our $last page
		if ($pagenum < 1) {
			
			$pagenum = 1; 
			
		} else if ($pagenum > $last) { 

			$pagenum = $last; 
			
		}

		//$limit = 'LIMIT ' .($pagenum - 1) * $page_rows .',' .$page_rows;

		$off = ($pagenum - 1) * $page_rows;

		$lim = $page_rows;


		$textline2 = "Page <b>$pagenum</b> of <b>$last</b>";

		$paginationCtrls = '';

		if($last != 1){

			if ($pagenum > 1) {
				$previous = $pagenum - 1;
				$paginationCtrls .= '<li><a href="'.base_url().'category/'.$id.'?pn='.$previous.'">&laquo;</a></li>';
				
				for($i = $pagenum-4; $i < $pagenum; $i++){
					if($i > 0){
						$paginationCtrls .= '<li><a href="'.base_url().'category/'.$id.'?pn='.$i.'">'.$i.'</a></li> ';
					}
				}
			}
			
			$paginationCtrls .= '<li class="active"><a>'.$pagenum.'</a></li> ';
			
			for($i = $pagenum+1; $i <= $last; $i++){
				$paginationCtrls .= '<li> <a href="'.base_url().'category/'.$id.'?pn='.$i.'">'.$i.'</a></li> ';
				if($i >= $pagenum+4){
					break;
				}
			}
			
			if ($pagenum != $last) {
				$next = $pagenum + 1;
				$paginationCtrls .= ' <li><a href="'.base_url().'category/'.$id.'?pn='.$next.'">&raquo;</a></li> ';
			}
		}



		$data['paginationCtrls'] = $paginationCtrls;

		$data['textline2'] = $textline2;

		// pagination Ends


		$data['news'] = $this->frontend_model->news_limit($off,$lim,$id,$cpin);		
		
		$data['meta'] = $this->frontend_model->meta();
		
		$data['menu'] = $data['footer_menu'] = $this->frontend_model->menu();
		
		$data['scroll_news'] = $this->frontend_model->scroll_news();
		
		$data['sidebar_latest'] = $this->frontend_model->sidebar_latest($cpin);
		
		$data['news_category'] = $this->frontend_model->get_category_single($id);
		
		$data['main_content'] = $this->load->view('frontend/category',$data,true);
		
		$this->load->view('frontend/mainframe', $data);
		
	}

	public function news_view($id){
		
		$data = array();
		
		$data['news_view'] = $news_view = $this->frontend_model->news_view($id);
		
		$data['scroll_news'] = $this->frontend_model->scroll_news();
		
		$news_cats = explode(",",$news_view->post_category_id);

		$data['related'] = $this->frontend_model->related($id,$news_cats[0]);
		
		$data['sidebar_latest'] = $this->frontend_model->sidebar_latest($id);
		
		$data['meta'] = $this->frontend_model->meta();
		
		$data['menu'] = $data['footer_menu'] = $this->frontend_model->menu();
		
		$data['main_content'] = $this->load->view('frontend/single',$data,true);
		
		$this->load->view('frontend/mainframe', $data);
		
	}
	
	public function search_news(){
		
		$data = array();
		
		$data['search_news'] = $this->frontend_model->search_news();
		
		$data['scroll_news'] = $this->frontend_model->scroll_news();
		
		$data['sidebar_latest'] = $this->frontend_model->sidebar_latest(1);
		
		$data['meta'] = $this->frontend_model->meta();
		
		$data['menu'] = $data['footer_menu'] = $this->frontend_model->menu();
		
		$data['main_content'] = $this->load->view('frontend/search',$data,true);
		
		$this->load->view('frontend/mainframe', $data);
		
	}
	
	public function video(){
		
		$data = array();
		
		//pagination start
		
		$ord = $this->frontend_model->video();
		
		$rows = count($ord);

		$page_rows = 18;

		$last = ceil($rows/$page_rows);

		if($last < 1){
			$last = 1;
		}

		$pagenum = 1;

		// Get pagenum from URL vars if it is present, else it is = 1
		if(isset($_GET['pn'])){
			
			$pagenum = preg_replace('#[^0-9]#', '', $_GET['pn']);
			
		}

		// This makes sure the page number isn't below 1, or more than our $last page
		if ($pagenum < 1) {
			
			$pagenum = 1; 
			
		} else if ($pagenum > $last) { 

			$pagenum = $last; 
			
		}

		//$limit = 'LIMIT ' .($pagenum - 1) * $page_rows .',' .$page_rows;

		$off = ($pagenum - 1) * $page_rows;

		$lim = $page_rows;


		$textline2 = "Page <b>$pagenum</b> of <b>$last</b>";

		$paginationCtrls = '';

		if($last != 1){

			if ($pagenum > 1) {
				$previous = $pagenum - 1;
				$paginationCtrls .= '<li><a href="'.base_url().'front-video?pn='.$previous.'">&laquo;</a></li>';
				
				for($i = $pagenum-4; $i < $pagenum; $i++){
					if($i > 0){
						$paginationCtrls .= '<li><a href="'.base_url().'front-video?pn='.$i.'">'.$i.'</a></li> ';
					}
				}
			}
			
			$paginationCtrls .= '<li class="active"><a>'.$pagenum.'</a></li> ';
			
			for($i = $pagenum+1; $i <= $last; $i++){
				$paginationCtrls .= '<li> <a href="'.base_url().'front-video?pn='.$i.'">'.$i.'</a></li> ';
				if($i >= $pagenum+4){
					break;
				}
			}
			
			if ($pagenum != $last) {
				$next = $pagenum + 1;
				$paginationCtrls .= ' <li><a href="'.base_url().'front-video?pn='.$next.'">&raquo;</a></li> ';
			}
		}



		$data['paginationCtrls'] = $paginationCtrls;

		$data['textline2'] = $textline2;

		// pagination Ends


		$data['front_video'] = $this->frontend_model->video_limit($off,$lim);
		
		$data['meta'] = $this->frontend_model->meta();
		
		$data['menu'] = $data['footer_menu'] = $this->frontend_model->menu();
		
		$data['scroll_news'] = $this->frontend_model->scroll_news();
		
		$data['sidebar_latest'] = $this->frontend_model->sidebar_latest(1);
		
		$data['main_content'] = $this->load->view('frontend/video',$data,true);
		
		$this->load->view('frontend/mainframe', $data);
		
	}
	

	public function gallary(){
		
		$data = array();

		//pagination start
		
		$ord = $this->frontend_model->photo_feed();
		
		$rows = count($ord);

		$page_rows = 18;

		$last = ceil($rows/$page_rows);

		if($last < 1){
			$last = 1;
		}

		$pagenum = 1;

		// Get pagenum from URL vars if it is present, else it is = 1
		if(isset($_GET['pn'])){
			
			$pagenum = preg_replace('#[^0-9]#', '', $_GET['pn']);
			
		}

		// This makes sure the page number isn't below 1, or more than our $last page
		if ($pagenum < 1) {
			
			$pagenum = 1; 
			
		} else if ($pagenum > $last) { 

			$pagenum = $last; 
			
		}

		//$limit = 'LIMIT ' .($pagenum - 1) * $page_rows .',' .$page_rows;

		$off = ($pagenum - 1) * $page_rows;

		$lim = $page_rows;


		$textline2 = "Page <b>$pagenum</b> of <b>$last</b>";

		$paginationCtrls = '';

		if($last != 1){

			if ($pagenum > 1) {
				$previous = $pagenum - 1;
				$paginationCtrls .= '<li><a href="'.base_url().'chobighor?pn='.$previous.'">&laquo;</a></li>';
				
				for($i = $pagenum-4; $i < $pagenum; $i++){
					if($i > 0){
						$paginationCtrls .= '<li><a href="'.base_url().'chobighor?pn='.$i.'">'.$i.'</a></li> ';
					}
				}
			}
			
			$paginationCtrls .= '<li class="active"><a>'.$pagenum.'</a></li> ';
			
			for($i = $pagenum+1; $i <= $last; $i++){
				$paginationCtrls .= '<li> <a href="'.base_url().'chobighor?pn='.$i.'">'.$i.'</a></li> ';
				if($i >= $pagenum+4){
					break;
				}
			}
			
			if ($pagenum != $last) {
				$next = $pagenum + 1;
				$paginationCtrls .= ' <li><a href="'.base_url().'chobighor?pn='.$next.'">&raquo;</a></li> ';
			}
		}



		$data['paginationCtrls'] = $paginationCtrls;

		$data['textline2'] = $textline2;

		// pagination Ends


		$data['gallary'] = $this->frontend_model->photo_feed_limit($off,$lim);
		
		$data['meta'] = $this->frontend_model->meta();
		
		$data['menu'] = $data['footer_menu'] = $this->frontend_model->menu();
		
		$data['scroll_news'] = $this->frontend_model->scroll_news();
		
		$data['sidebar_latest'] = $this->frontend_model->sidebar_latest(1);
		
		$data['main_content'] = $this->load->view('frontend/photo',$data,true);
		
		$this->load->view('frontend/mainframe', $data);
		
	}
	
	
	public function page($id){
		
		$data = array();
		
		$data['page'] = $this->frontend_model->page($id);
		
		$data['scroll_news'] = $this->frontend_model->scroll_news();
		
		$data['sidebar_latest'] = $this->frontend_model->sidebar_latest(1);
		
		$data['meta'] = $this->frontend_model->meta();
		
		$data['menu'] = $data['footer_menu'] = $this->frontend_model->menu();
		
		$data['main_content'] = $this->load->view('frontend/page',$data,true);
		
		$this->load->view('frontend/mainframe', $data);
		
	}
	
	public function contact_send(){
		
        $this->frontend_model->send_contact();
		
        $data = array();
		
        $data['message'] = "Sent successfully";
		
        $this->session->set_userdata($data);
		
		redirect('/');
    }
		
	public function save_subscribe(){
	
		$subscribe = $this->frontend_model->save_subscribe();
		echo $subscribe;
		
	}
	
	public function contact(){
		
		$data = array();
		
		$data['top_image'] = $this->frontend_model->get_image(8);

		$data['footer_image'] = $this->frontend_model->get_image(20);
		
		$data['meta'] = $this->frontend_model->meta();
		
		$data['main_content'] = $this->load->view('frontend/contact',$data,true);
		
		$this->load->view('frontend/mainframe', $data);
		
	}
	
	
	
	
	
	
	
	
	
    
    ////visitor
    
    
    
    
    public function get_visitor () {
        
        
        function ip_info($ip = NULL, $purpose = "location", $deep_detect = TRUE) {
            
            $output = NULL;
            if (filter_var($ip, FILTER_VALIDATE_IP) === FALSE) {
                $ip = $_SERVER["REMOTE_ADDR"];
                if ($deep_detect) {
                    if (filter_var(@$_SERVER['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP))
                        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
                    if (filter_var(@$_SERVER['HTTP_CLIENT_IP'], FILTER_VALIDATE_IP))
                        $ip = $_SERVER['HTTP_CLIENT_IP'];
                }
            }
            
            $purpose    = str_replace(array("name", "\n", "\t", " ", "-", "_"), NULL, strtolower(trim($purpose)));
            $support    = array("country", "countrycode", "state", "region", "city", "location", "address");
            $continents = array(
                "AF" => "Africa",
                "AN" => "Antarctica",
                "AS" => "Asia",
                "EU" => "Europe",
                "OC" => "Australia (Oceania)",
                "NA" => "North America",
                "SA" => "South America"
            );
            if (filter_var($ip, FILTER_VALIDATE_IP) && in_array($purpose, $support)) {
                $ipdat = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip));
                if (@strlen(trim($ipdat->geoplugin_countryCode)) == 2) {
                    switch ($purpose) {
                        case "location":
                            $output = array(
                                "city"           => @$ipdat->geoplugin_city,
                                "state"          => @$ipdat->geoplugin_regionName,
                                "country"        => @$ipdat->geoplugin_countryName,
                                "country_code"   => @$ipdat->geoplugin_countryCode,
                                "continent"      => @$continents[strtoupper($ipdat->geoplugin_continentCode)],
                                "continent_code" => @$ipdat->geoplugin_continentCode
                            );
                            break;
                        case "address":
                            $address = array($ipdat->geoplugin_countryName);
                            if (@strlen($ipdat->geoplugin_regionName) >= 1)
                                $address[] = $ipdat->geoplugin_regionName;
                            if (@strlen($ipdat->geoplugin_city) >= 1)
                                $address[] = $ipdat->geoplugin_city;
                            $output = implode(", ", array_reverse($address));
                            break;
                        case "city":
                            $output = @$ipdat->geoplugin_city;
                            break;
                        case "state":
                            $output = @$ipdat->geoplugin_regionName;
                            break;
                        case "region":
                            $output = @$ipdat->geoplugin_regionName;
                            break;
                        case "country":
                            $output = @$ipdat->geoplugin_countryName;
                            break;
                        case "countrycode":
                            $output = @$ipdat->geoplugin_countryCode;
                            break;
                    }
                }
            }
            return $output;
        }
        
		function get_client_ip() {
			$ipaddress = '';
			if (isset($_SERVER['HTTP_CLIENT_IP']))
				$ipaddress = $_SERVER['HTTP_CLIENT_IP'];
			else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
				$ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
			else if(isset($_SERVER['HTTP_X_FORWARDED']))
				$ipaddress = $_SERVER['HTTP_X_FORWARDED'];
			else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
				$ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
			else if(isset($_SERVER['HTTP_FORWARDED']))
				$ipaddress = $_SERVER['HTTP_FORWARDED'];
			else if(isset($_SERVER['REMOTE_ADDR']))
				$ipaddress = $_SERVER['REMOTE_ADDR'];
			else
				$ipaddress = 'UNKNOWN';
			return $ipaddress;
		}
		
		$c_ip = get_client_ip();
		
		$user_country = ip_info($c_ip, "Country");
        
        $data = array();
        
        $confirm_id = $this->input->get('confirm_id', true);
        
        if($confirm_id == "1"){
            
            $find_visitor = $this->frontend_model->find_visitor();
            
            if($find_visitor != NULL){
               
               
              
                $all_ip_list = $find_visitor->visitor_statistics_visitor_ip;
                
                $sep_ip = explode(", ",$all_ip_list);
                
                if (in_array($c_ip, $sep_ip)) {
                    
                    
                    
                }else{
                    
                    $insert_ip = $all_ip_list.$c_ip.", ";
                    
                    
                    $all_country_list = $find_visitor->visitor_statistics_country;
                
                    $sep_country = explode(", ",$all_country_list);
                    
                    if (in_array($user_country, $sep_country)) {
                        
                        $insert_country = $all_country_list;
                        
                    }else{
                        
                        if($all_country_list != ''){
							$insert_country = $all_country_list.', '.$user_country;
						}else {
							$insert_country = $user_country;
						}
                        
                        
                    }
                    
                    
                    $this->frontend_model->update_visitor($find_visitor->visitor_statistics_id, $find_visitor->visitor_statistics_visitor_count, $insert_country, $insert_ip);
                    
                }
                
               // 
                
            }else{
                //echo "not found";
                $this->frontend_model->insert_visitor($c_ip,$user_country);
                
            }
            
            
            
        }
		
            
    }
    
    
    
    ////adddd
    
    
    
    
    public function ad_statistics () {
        
        
        function ip_info($ip = NULL, $purpose = "location", $deep_detect = TRUE) {
            
            $output = NULL;
            if (filter_var($ip, FILTER_VALIDATE_IP) === FALSE) {
                $ip = $_SERVER["REMOTE_ADDR"];
                if ($deep_detect) {
                    if (filter_var(@$_SERVER['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP))
                        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
                    if (filter_var(@$_SERVER['HTTP_CLIENT_IP'], FILTER_VALIDATE_IP))
                        $ip = $_SERVER['HTTP_CLIENT_IP'];
                }
            }
            
            $purpose    = str_replace(array("name", "\n", "\t", " ", "-", "_"), NULL, strtolower(trim($purpose)));
            $support    = array("country", "countrycode", "state", "region", "city", "location", "address");
            $continents = array(
                "AF" => "Africa",
                "AN" => "Antarctica",
                "AS" => "Asia",
                "EU" => "Europe",
                "OC" => "Australia (Oceania)",
                "NA" => "North America",
                "SA" => "South America"
            );
            if (filter_var($ip, FILTER_VALIDATE_IP) && in_array($purpose, $support)) {
                $ipdat = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip));
                if (@strlen(trim($ipdat->geoplugin_countryCode)) == 2) {
                    switch ($purpose) {
                        case "location":
                            $output = array(
                                "city"           => @$ipdat->geoplugin_city,
                                "state"          => @$ipdat->geoplugin_regionName,
                                "country"        => @$ipdat->geoplugin_countryName,
                                "country_code"   => @$ipdat->geoplugin_countryCode,
                                "continent"      => @$continents[strtoupper($ipdat->geoplugin_continentCode)],
                                "continent_code" => @$ipdat->geoplugin_continentCode
                            );
                            break;
                        case "address":
                            $address = array($ipdat->geoplugin_countryName);
                            if (@strlen($ipdat->geoplugin_regionName) >= 1)
                                $address[] = $ipdat->geoplugin_regionName;
                            if (@strlen($ipdat->geoplugin_city) >= 1)
                                $address[] = $ipdat->geoplugin_city;
                            $output = implode(", ", array_reverse($address));
                            break;
                        case "city":
                            $output = @$ipdat->geoplugin_city;
                            break;
                        case "state":
                            $output = @$ipdat->geoplugin_regionName;
                            break;
                        case "region":
                            $output = @$ipdat->geoplugin_regionName;
                            break;
                        case "country":
                            $output = @$ipdat->geoplugin_countryName;
                            break;
                        case "countrycode":
                            $output = @$ipdat->geoplugin_countryCode;
                            break;
                    }
                }
            }
            return $output;
        }
        
		function get_client_ip() {
			$ipaddress = '';
			if (isset($_SERVER['HTTP_CLIENT_IP']))
				$ipaddress = $_SERVER['HTTP_CLIENT_IP'];
			else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
				$ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
			else if(isset($_SERVER['HTTP_X_FORWARDED']))
				$ipaddress = $_SERVER['HTTP_X_FORWARDED'];
			else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
				$ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
			else if(isset($_SERVER['HTTP_FORWARDED']))
				$ipaddress = $_SERVER['HTTP_FORWARDED'];
			else if(isset($_SERVER['REMOTE_ADDR']))
				$ipaddress = $_SERVER['REMOTE_ADDR'];
			else
				$ipaddress = 'UNKNOWN';
			return $ipaddress;
		}
		
		$c_ip = get_client_ip();
		
		$user_country = ip_info($c_ip, "Country");
        
        
        
        
        
        $data = array();
        
        $add_id = $this->input->get('add_id', true);
		
        $result_ad_date_id = $this->frontend_model->check_ad_date_id($add_id);
        
        
        
        if($result_ad_date_id != NULL){
            
          //  echo $result_ad_date_id->ad_statistics_id." \ ";
          //  echo $result_ad_date_id->ad_statistics_click_count;
          
            $list_country = $result_ad_date_id->ad_statistics_user_country;
            
            $sep_country = explode(", ",$list_country);
            
            if (in_array($user_country, $sep_country)) {
                
                $insert_country = $list_country;
                
            }else{
                
                $insert_country = $list_country.$user_country.", ";
				
                if($list_country != ''){
					
					$insert_country = $list_country.', '.$user_country;
					
				}else {
					
					$insert_country = $user_country;
					
				}
            }
            
            $this->frontend_model->update_ad_count($result_ad_date_id->ad_statistics_id, $result_ad_date_id->ad_statistics_click_count, $insert_country);
            
        }else{
            //echo "not found";
            $this->frontend_model->insert_ad_count($add_id,$user_country);
            
        }
        
        
    }
    
	
	
	
	
	
	
}
