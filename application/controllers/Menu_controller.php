<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu_controller extends CI_Controller {	
	
	public function __construct() {
		
        parent::__construct();
		
        $user_id = $this->session->userdata('user_id');
		
        if($user_id == NULL){
			
            redirect('xyz');
			
        }
		
		if($this->user_model->user_access(2) == FALSE){
			
			$sdata = array();
			
			$sdata['no_access'] = "No Access For This User.";
			
			$this->session->set_userdata($sdata);
			
			redirect('dashboard');
			
		}
	}
	
	public function index(){	
		
		
        $data['menu_category'] = $this->category_model->get_category(1);
		
        $data['admin_main_content'] = $this->load->view('backend/menu',$data,true);
		
        $this->load->view('backend/admin_mainframe', $data);
		
	}
	
	
	public function save_category() {
		
        $sdata = array();

        $this->category_model->save_category();
		
		$sdata['message'] = "Saved Successfully.";
			
		$this->session->set_userdata($sdata);
		
		redirect('category');
		
    }
	
	
	public function update_menu(){
		
		$sdata = array();
		
		$this->category_model->update_menu(); 
		
		$sdata['message'] = "Updated Successfully.";
		
		$this->session->set_userdata($sdata);
		
		redirect('menu');        
		
        
    }

    public function get_sub_cats() {
		$ret = $this->category_model->get_sub_cats();
		echo $ret;
	}
	
}
