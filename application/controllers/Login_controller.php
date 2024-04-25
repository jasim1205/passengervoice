<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_controller extends CI_Controller {
	
	public function __construct() {
		
        parent::__construct();
        
        $user_id = $this->session->userdata('user_id');
		
        if ($user_id != NULL) {
			
           redirect('dashboard');
		   
        }
    }
	
	public function index(){
		
		$data = array();		
	
        $data['get_meta'] = $this->meta_model->get_meta();
		
		$this->load->view('backend/login',$data);
		
	}
	
	public function check_login(){
		
		$user_email = $this->input->post('user_email', true);
		
        $user_password = $this->input->post('user_password', true);
		
        $result = $this->login_model->check_user_login_info($user_email, $user_password);
		
        $sdata = array();
		
        if ($result) {
			
            $sdata['user_id'] = $result->user_id;
            $sdata['user_name'] = $result->user_name;
            $sdata['user_image'] = $result->user_image;
            $sdata['user_role'] = $result->user_role;
			
            $this->session->set_userdata($sdata);
			
            redirect('dashboard');
			
        } else {
			
            $sdata['error'] = "Invalid Login !";
			
            $this->session->set_userdata($sdata);
			
            redirect('xyz');
			
        }
		
	}
}
