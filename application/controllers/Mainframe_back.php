<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mainframe_back extends CI_Controller {	
	
	public function __construct() {
		
        parent:: __construct();
		
        $user_id = $this->session->userdata('user_id');
		
        if($user_id == NULL){
			
            redirect('xyz');
			
        }         
    }
	
	public function index(){
	
		$data = array();
		
        $data['admin_main_content'] = $this->load->view('backend/dashboard','',true);
		
        $this->load->view('backend/admin_mainframe', $data);
		
	}
	
	
	public function about(){
	
		$data = array();
		
        $data['admin_main_content'] = $this->load->view('backend/about','',true);
		
        $this->load->view('backend/admin_mainframe', $data);
		
	}
	
}
