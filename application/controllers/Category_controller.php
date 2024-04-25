<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category_controller extends CI_Controller {	
	
	public function __construct() {
		
        parent::__construct();
		
        $user_id = $this->session->userdata('user_id');
		
        if($user_id == NULL){
			
            redirect('xyz');
			
        }
        
    }
	
	public function index(){
		
		if($this->user_model->user_access(1)){
		
			$data = array();
			
			
		//pagination start
			
			$ord = $this->category_model->all_category();
			
		   
			$rows = count($ord);
			
			$page_rows = 10;
			
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
					$paginationCtrls .= '<li><a href="'.base_url().'category?pn='.$previous.'">&laquo;</a></li>';
					
					for($i = $pagenum-4; $i < $pagenum; $i++){
						if($i > 0){
							$paginationCtrls .= '<li><a href="'.base_url().'category?pn='.$i.'">'.$i.'</a></li> ';
						}
					}
				}
				
				$paginationCtrls .= '<li class="active"><a>'.$pagenum.'</a></li> ';
				
				for($i = $pagenum+1; $i <= $last; $i++){
					$paginationCtrls .= '<li> <a href="'.base_url().'category?pn='.$i.'">'.$i.'</a></li> ';
					if($i >= $pagenum+4){
						break;
					}
				}
				
				if ($pagenum != $last) {
					$next = $pagenum + 1;
					$paginationCtrls .= ' <li><a href="'.base_url().'category?pn='.$next.'">&raquo;</a></li> ';
				}
			}


			$data['paginationCtrls'] = $paginationCtrls;
			
			$data['textline2'] = $textline2;
			
		// pagination Ends
			
			
			$data['all_category'] = $this->category_model->category_limit($off,$lim);
			
			$data['admin_main_content'] = $this->load->view('backend/category',$data,true);
			
			$this->load->view('backend/admin_mainframe', $data);
			
		}else{
			
			$sdata = array();
			
			$sdata['no_access'] = "No Access For This User.";
			
			$this->session->set_userdata($sdata);
			
			redirect('dashboard');
			
		}
	}
	
	
	public function save_category() {
		
		if($this->user_model->user_access(1)){

			$sdata = array();

			$this->category_model->save_category();
			
			$sdata['message'] = "Saved Successfully.";
				
			$this->session->set_userdata($sdata);
			
			redirect('category');
		
		}else{
			
			$sdata = array();
			
			$sdata['no_access'] = "No Access For This User.";
			
			$this->session->set_userdata($sdata);
			
			redirect('dashboard');
			
		}
    }
	
	
	public function update_category(){
		
		if($this->user_model->user_access(1)){
		
			$sdata = array();
			
			$this->category_model->update_category(); 
			
			$sdata['message'] = "Updated Successfully.";
			
			$this->session->set_userdata($sdata);
			
			redirect('category');        
		
		}else{
			
			$sdata = array();
			
			$sdata['no_access'] = "No Access For This User.";
			
			$this->session->set_userdata($sdata);
			
			redirect('dashboard');
			
		}
        
    }
	
	
	
	
	public function block_settings(){
		
		if($this->user_model->user_access(12)){
	
			$data = array();
			
			$data['all_block'] = $this->category_model->all_block();
			
			$data['section_category'] = $this->category_model->section_category();
			
			$data['admin_main_content'] = $this->load->view('backend/block',$data,true);
			
			$this->load->view('backend/admin_mainframe', $data);
		
		}else{
			
			$sdata = array();
			
			$sdata['no_access'] = "No Access For This User.";
			
			$this->session->set_userdata($sdata);
			
			redirect('dashboard');
			
		}
		
	}
	
	
	public function update_block(){
		
		if($this->user_model->user_access(12)){
		
			$sdata = array();
			
			$this->category_model->update_block(); 
			
			$sdata['message'] = "Updated Successfully.";
			
			$this->session->set_userdata($sdata);
			
			redirect('block-settings');        
			
		}else{
			
			$sdata = array();
			
			$sdata['no_access'] = "No Access For This User.";
			
			$this->session->set_userdata($sdata);
			
			redirect('dashboard');
			
		}
        
    }

	
}
