<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings_controller extends CI_Controller {	
	
	public function __construct() {
		
        parent::__construct();
		
        $user_id = $this->session->userdata('user_id');
		
        if($user_id == NULL){
			
            redirect('xyz');
			
        }         
    }
	
	public function index(){
	
		$data = array();		
	
        $data['get_settings'] = $this->settings_model->get_settings();
		
        $data['admin_main_content'] = $this->load->view('backend/settings',$data,true);
		
        $this->load->view('backend/admin_mainframe', $data);
		
	}
	
	
	public function save_settings () {
		
        $sdata = array();

        $confirmation = $this->settings_model->save_settings();
		
		if($confirmation == '1'){
			$sdata['message'] = "Saved Successfully. Please Re-login to see the changes.";
		}
		
		if($confirmation == '2'){
			$sdata['error'] = "Invalid Information.";
		}
		
			
		$this->session->set_userdata($sdata);
		
		redirect('settings');
		
    }
}
