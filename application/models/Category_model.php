<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Category_model extends CI_Model {

    public function save_category() {
		
        $data = array();
		
        $data['category_name'] = $this->input->post('category_name', true);
		
        $data['category_type'] = $this->input->post('category_type', true);
		
        $data['category_description'] = $this->input->post('category_description', true);
		
        $data['category_status'] = $this->input->post('category_status', true);

        $this->db->insert('category_table', $data);
		
    }
	
	public function update_category() {
		
        $data = array();
        
        $category_id = $this->input->post('category_id', true);
		
        $data['category_name'] = $this->input->post('category_name', true);
		
        $data['category_type'] = $this->input->post('category_type', true);
		
		$data['category_description'] = $this->input->post('category_description', true);
		
		$data['category_status'] = $this->input->post('category_status', true);
		
		$this->db->where('category_id', $category_id);
		
        $this->db->update('category_table', $data);
    }

    public function all_category() {
		
        $this->db->select('*');
		
        $this->db->from('category_table');
		
        $this->db->order_by('category_id', 'DESC');
		
        $query_result = $this->db->get();
		
        $category_info = $query_result->result();
		
        return $category_info;
		
    }
	
	public function category_limit($off,$lim) {
		
        $this->db->select('*');
		
        $this->db->from('category_table');
		
        $this->db->order_by('category_id', 'DESC');
		
        $this->db->offset($off);
		
        $this->db->limit($lim);
		
        $query_result = $this->db->get();
		
        $category_info = $query_result->result();
		
        return $category_info;
		
    }
	
	
	public function get_category($cat_type){
		
        $this->db->select('*');
		
        $this->db->from('category_table');
		
        $this->db->where('category_type', $cat_type);
		
        $this->db->order_by('category_id','DESC');
		
        $query_result = $this->db->get();
		
        $category_info = $query_result->result();
		
        return $category_info;
		
    }

    public function single_category($id){
		
        $this->db->select('*');
		
        $this->db->from('category_table');
		
        $this->db->where('category_id', $id);
		
        $query_result = $this->db->get();
		
        $category_info = $query_result->row();
		
        return $category_info;
		
    }



	public function get_sub_cats(){		
		
        $menu_id = $this->input->get('menu_id', true);
		
		$this->db->select('*');
		
        $this->db->from('category_table');
		
        $this->db->where('category_id',$menu_id);
		
        $query_result = $this->db->get();
		
        $return_info = $query_result->row();
		
		
		if($return_info != ''){

			$cat_array = explode(',',$return_info->sub_menu);
										
			$category_info = $this->category_model->get_category(1);

			$ret_data = '';

			foreach ($category_info as $category) {

				if(in_array($category->category_id, $cat_array)){

					$chekc_cat = 'checked';

				}else {
					$chekc_cat = ' ';
				}


				$ret_data .= '
					<label style="width:50%;float:left;font-size:13px;">

						<input type="checkbox" name="sub_menu[]" value="'.$category->category_id.'" '.$chekc_cat.'> '.$category->category_name.'

					</label>
				';
			}

			$ret_data .= '<span class="clearfix"></span>';

			echo $ret_data;
			

		}else{
			echo "1";
		}

        
    }


    







    public function update_menu() {
		
        $data = array();
		
        $data['menu_position'] = $this->input->post('menu_position', true);
		
        $data['menu_order'] = $this->input->post('menu_order', true);
	
		$cats = $this->input->post('sub_menu', true);
		
		if(count($cats) == 0){
			$data['sub_menu'] = 0;
		}else{
			$data['sub_menu'] = implode(",",$cats);
		}

		$category_id = $this->input->post('category_id', true);
		
		$this->db->where('category_id', $category_id);
		
        $this->db->update('category_table', $data);
    }



	
	
	
	
	public function update_block() {
		
        $data = array();
        
        $id = $this->input->post('category_location_id', true);		
		
		$data['category_id'] = $this->input->post('category_id', true);
		
		$this->db->where('category_location_id', $id);
		
        $this->db->update('category_location', $data);
    }

    public function all_block() {
		
        $this->db->select('*');
		
        $this->db->from('category_location');
		
        $this->db->join('category_table', 'category_location.category_id=category_table.category_id', 'left');
		
        $this->db->order_by('category_location_id', 'DESC');
		
        $query_result = $this->db->get();
		
        $category_info = $query_result->result();
		
        return $category_info;
		
    }
	
	public function section_category() {
		
        $this->db->select('*');
		
        $this->db->from('category_table');
		
        $this->db->where('category_type', 1);
		
        $this->db->where('category_status', 1);
		
        $this->db->order_by('category_id', 'DESC');
		
        $query_result = $this->db->get();
		
        $category_info = $query_result->result();
		
        return $category_info;
		
    }



}
