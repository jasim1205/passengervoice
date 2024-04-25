<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout_controller extends CI_Controller {
	
	public function __construct() {
		
        parent::__construct();
        
        $user_id = $this->session->userdata('user_id');
		
        if ($user_id == NULL) {
			
           redirect('xyz');
		   
        }
    }
	
	 public function index(){
		
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('user_name');
        $this->session->unset_userdata('user_image');
        
        $sdata = array();
		
        $sdata['error']= "You are successfully logout !";
		
        $this->session->set_userdata($sdata);
        
		redirect('xyz');
		
    }
}
