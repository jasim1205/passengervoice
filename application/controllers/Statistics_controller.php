<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Statistics_controller extends CI_Controller {	
	
	public function __construct() {
		
        parent::__construct();
		
        $user_id = $this->session->userdata('user_id');
		
        if($user_id == NULL){
			
            redirect('xyz');
			
        }
		
		if($this->user_model->user_access(13) == FALSE){
			
			$sdata = array();
			
			$sdata['no_access'] = "No Access For This User.";
			
			$this->session->set_userdata($sdata);
			
			redirect('dashboard');
			
		}
    }
	
	public function visitor_statistics(){
	
		$data = array();
		
		$data['meta'] = $this->meta_model->get_meta();
	
        $data['site_statistics_list'] = $data['site_statistics_list2'] = $this->statistics_model->site_statistics_list();
		
        $data['admin_main_content'] = $this->load->view('backend/visitor_statistics',$data,true);
		
        $this->load->view('backend/admin_mainframe', $data);
		
	}
	
	 public function search_site_statistics() {

        $data = array();

       	echo $data['search_site_statistics'] = $this->statistics_model->search_site_statistics();

    }
    
    public function search_site_total() {

        $data = array();

       	echo $data['search_site_total'] = $this->statistics_model->search_site_total();

    } 
	
	
	
	public function ad_statistics(){
	
		$data = array();
		
		$data['meta'] = $this->meta_model->get_meta();
		
		$data['all_ads'] = $this->statistics_model->all_ads();
	
        $data['ad_statistics_list'] = $data['ad_statistics_list2'] = $this->statistics_model->ad_statistics_list();
		
        $data['admin_main_content'] = $this->load->view('backend/ad_statistics',$data,true);
		
        $this->load->view('backend/admin_mainframe', $data);
		
	}
	
	public function search_ad_statistics() {

        $data = array();

       	echo $data['search_ad_statistics'] = $this->statistics_model->search_ad_statistics();

    }
	

}
