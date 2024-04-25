<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Archive_controller extends CI_Controller {	
	
	
	public function save_media() {
		
        $sdata = array();

        $this->archive_model->save_media();
		
		$sdata['message'] = "Saved Successfully.";
			
		$this->session->set_userdata($sdata);
		
		redirect('media');
		
    }
	

    public function search_media(){
	
		$ret = $this->archive_model->search_media();
		echo $ret;
		
	}



	public function get_media(){
	
		$ret = $this->archive_model->get_media();
		echo $ret;
		
	}

	

	
}
