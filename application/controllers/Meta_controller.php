<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Meta_controller extends CI_Controller {	
	
	public function __construct() {
		
        parent::__construct();
		
        $user_id = $this->session->userdata('user_id');
		
        if($user_id == NULL){
			
            redirect('xyz');
			
        }
		
		if($this->user_model->user_access(11) == FALSE){
			
			$sdata = array();
			
			$sdata['no_access'] = "No Access For This User.";
			
			$this->session->set_userdata($sdata);
			
			redirect('dashboard');
			
		}
    }
	
	public function index(){
	
		$data = array();		
	
        $data['get_meta'] = $this->meta_model->get_meta();
		
        $data['admin_main_content'] = $this->load->view('backend/meta',$data,true);
		
        $this->load->view('backend/admin_mainframe', $data);
		
	}
	
	
	public function save_meta() {
		
        $sdata = array();

        $this->meta_model->save_meta();
		
		$sdata['message'] = "Saved Successfully.";
			
		$this->session->set_userdata($sdata);
		
		redirect('meta');
		
    }
}
