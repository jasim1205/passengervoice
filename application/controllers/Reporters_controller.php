<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reporters_controller extends CI_Controller {	
	
	public function __construct() {
		
        parent::__construct();
		
        $user_id = $this->session->userdata('user_id');
		
        if($user_id == NULL){
			
            redirect('xyz');
			
        }
		
		if($this->user_model->user_access(8) == FALSE){
			
			$sdata = array();
			
			$sdata['no_access'] = "No Access For This User.";
			
			$this->session->set_userdata($sdata);
			
			redirect('dashboard');
			
		}
    }
	
	public function index(){
	
		$data = array();
		
		//pagination start
		
		$ord = $this->reporters_model->all_reporters();
		
	   
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
				$paginationCtrls .= '<li><a href="'.base_url().'reporters?pn='.$previous.'">&laquo;</a></li>';
				
				for($i = $pagenum-4; $i < $pagenum; $i++){
					if($i > 0){
						$paginationCtrls .= '<li><a href="'.base_url().'reporters?pn='.$i.'">'.$i.'</a></li> ';
					}
				}
			}
			
			$paginationCtrls .= '<li class="active"><a>'.$pagenum.'</a></li> ';
			
			for($i = $pagenum+1; $i <= $last; $i++){
				$paginationCtrls .= '<li> <a href="'.base_url().'reporters?pn='.$i.'">'.$i.'</a></li> ';
				if($i >= $pagenum+4){
					break;
				}
			}
			
			if ($pagenum != $last) {
				$next = $pagenum + 1;
				$paginationCtrls .= ' <li><a href="'.base_url().'reporters?pn='.$next.'">&raquo;</a></li> ';
			}
		}

		

		$data['paginationCtrls'] = $paginationCtrls;
		
		$data['textline2'] = $textline2;
		
		// pagination Ends
		
		
        $data['all_reporters'] = $this->reporters_model->reporters_limit($off,$lim);
		
        $data['admin_main_content'] = $this->load->view('backend/reporters',$data,true);
		
        $this->load->view('backend/admin_mainframe', $data);
		
	}
	
	
	public function save_reporter() {
		
        $sdata = array();

        $this->reporters_model->save_reporter();
		
		$sdata['message'] = "Saved Successfully.";
			
		$this->session->set_userdata($sdata);
		
		redirect('reporters');
		
    }
	
	
	public function update_reporter(){
		
		$sdata = array();
		
		$this->reporters_model->update_reporter(); 
		
		$sdata['message'] = "Updated Successfully.";
		
		$this->session->set_userdata($sdata);
		
		redirect('reporters');        
		
        
    }
	
	
	
}
