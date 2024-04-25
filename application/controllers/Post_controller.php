<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post_controller extends CI_Controller {	
	
	public function __construct() {
		
        parent::__construct();
		
        $user_id = $this->session->userdata('user_id');
		
        if($user_id == NULL){
			
            redirect('xyz');
			
        }
		
		if($this->user_model->user_access(3) == FALSE){
			
			$sdata = array();
			
			$sdata['no_access'] = "No Access For This User.";
			
			$this->session->set_userdata($sdata);
			
			redirect('dashboard');
			
		}
		
    }
	
	public function index(){
	
		$data = array();		
	
        $data['get_category'] = $this->category_model->get_category(1);
		
        $data['reporter'] = $this->post_model->reporter();

        $data['all_media'] = $this->archive_model->archive_media();

        $data['meta'] = $this->meta_model->get_meta();
		
        $data['admin_main_content'] = $this->load->view('backend/new_post',$data,true);
		
        $this->load->view('backend/admin_mainframe', $data);
		
	}

	
	public function search_post(){
	
		$ret = $this->post_model->search_post();
		echo $ret;
		
	}

	public function get_post_des() {
		$ret = $this->post_model->get_post_des();
		echo $ret;
	}


	
	public function all_post_list(){
	
		$data = array();
		
    
	//////pagination
	
		$ord = $this->post_model->all_post();		
	   
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
				$paginationCtrls .= '<li><a href="'.base_url().'all-post?pn='.$previous.'">&laquo;</a></li>';
				
				for($i = $pagenum-4; $i < $pagenum; $i++){
					if($i > 0){
						$paginationCtrls .= '<li><a href="'.base_url().'all-post?pn='.$i.'">'.$i.'</a></li> ';
					}
				}
			}
			
			$paginationCtrls .= '<li class="active"><a>'.$pagenum.'</a></li> ';
			
			for($i = $pagenum+1; $i <= $last; $i++){
				$paginationCtrls .= '<li> <a href="'.base_url().'all-post?pn='.$i.'">'.$i.'</a></li> ';
				if($i >= $pagenum+4){
					break;
				}
			}
			
			if ($pagenum != $last) {
				$next = $pagenum + 1;
				$paginationCtrls .= ' <li><a href="'.base_url().'all-post?pn='.$next.'">&raquo;</a></li> ';
			}
		}

		

		$data['paginationCtrls'] = $paginationCtrls;
		
		$data['textline2'] = $textline2;
		
	// pagination Ends
	
		
        $data['reporter'] = $this->post_model->reporter();
		
		$data['all_post'] = $this->post_model->post_limit($off,$lim);
		
        $data['get_category'] = $this->category_model->get_category(1);

       // $data['all_media'] = $this->archive_model->archive_media();
		
        $data['admin_main_content'] = $this->load->view('backend/all_post_list',$data,true);


		
        $this->load->view('backend/admin_mainframe', $data);
		
	}
	
	

	
	
	
	public function save_post() {
		
        $sdata = array();

        $this->post_model->save_post();
		
		$sdata['message'] = "Saved Successfully.";
			
		$this->session->set_userdata($sdata);
		
		redirect('new-post');
		
    }

	public function update_post(){
		
		$sdata = array();
		
		$this->post_model->update_post();

		$data['all_media'] = $this->archive_model->archive_media();
		
		$sdata['message'] = "Updated Successfully";
		
		$this->session->set_userdata($sdata);
		
		redirect('all-post');
        
		
        
    }
	


	public function delete_post($id){
		
		$sdata = array();
		
		$this->post_model->delete_post($id);
		
		$sdata['message'] = "Deleted Successfully";
		
		$this->session->set_userdata($sdata);
		
		redirect('all-post');	
        
    }
	
	public function get_post_cats() {
		$ret = $this->post_model->get_post_cats();
		echo $ret;
	}

}
