<?php 

class Category_model extends CI_Model{
  public function getParentCategory(){
		return $this->db->get_where('itemcategory', ['parentId' => 0])->result_array();
	}

	public function getCategory(){
		$this->db->order_by('parentId');
		return $this->db->get('itemcategory')->result_array();
	}
}

?>