<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Subscribers_model extends CI_Model {
	
	public function all_subscribers() {
		
        $this->db->select('*');
		
        $this->db->from('subscribe_table');
		
        $this->db->order_by('subscribe_id', 'DESC');
		
        $query_result = $this->db->get();
		
        $result_info = $query_result->result();
		
        return $result_info;
		
    }
	
	public function subscribers_limit($off,$lim) {
		
        $this->db->select('*');
		
        $this->db->from('subscribe_table');
		
        $this->db->order_by('subscribe_id', 'DESC');
		
        $this->db->offset($off);
		
        $this->db->limit($lim);
		
        $query_result = $this->db->get();
		
        $result_info = $query_result->result();
		
        return $result_info;
		
    }
	
	public function send_newsletters() {
		
		
		$this->db->select('*');
		
        $this->db->from('subscribe_table');
		
        $this->db->order_by('subscribe_id', 'DESC');
		
        $query_result = $this->db->get();
		
        $result_info = $query_result->result();
		
		
		$to = "";
		
		foreach($result_info as $result_info){
			
			$to .= $result_info->subscribe_email." , ";
			
		}
       
       	$data = array();
        $data['contact_name'] = $this->input->post('name', true);
        $data['contact_email'] = $this->input->post('email', true);		
        $data['contact_subject'] = $this->input->post('subject',true);
        $data['contact_message'] = $this->input->post('message', true);
       	
		$subject = $data['contact_subject'];
		
				
		
		$message = "From: ".$data['contact_name']." <".$data['contact_email'].">\r\n \r\nSubject: ".$data['contact_subject']."\r\n \r\nMessage: \r\n".$data['contact_message'];
		
		
		mail($to,$subject,$message);
		
    }

}
