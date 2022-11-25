<?php 

class Items_model extends CI_Model{
	public function getItemsByStoreId($storeId){
    $this->db->select('items.*, itemcategory.categoryName');
    $this->db->join('itemcategory', 'items.itemCategoryId = itemcategory.categoryId', 'LEFT');
		return $this->db->get_where('items', ['storeId' => $storeId])->result_array();
	}

  public function getFeaturedItems(){
    $this->db->select('items.*, itemcategory.categoryName, stores.storeName');
    $this->db->join('itemcategory', 'items.itemCategoryId = itemcategory.categoryId', 'LEFT');
    $this->db->join('stores', 'items.storeId = stores.storeName', 'LEFT');
    $this->db->limit(4);
		return $this->db->get_where('items')->result_array();
	}

  public function getFeaturedItemsByParentCategoryId($parentId){
    $this->db->select('items.*, itemcategory.categoryName, stores.storeName');
    $this->db->join('itemcategory', 'items.itemCategoryId = itemcategory.categoryId OR items.itemCategoryId = itemcategory.parentId', 'LEFT');
    $this->db->join('stores', 'items.storeId = stores.storeName', 'LEFT');
    $this->db->limit(4);
		return $this->db->get_where('items', ['itemcategory.parentId' => $parentId])->result_array();
	}

  public function createItem($data){
		$this->db->db_debug = false;
		
		$result = $this->db->insert('items', $data);
		
		if($this->db->affected_rows() > 0){
			$response = array(
				'status'	=> true
			);
			return $response;
		}else{
			$error = $this->db->error();
			$response = array(
				'status'	=> false,
				'code'		=> $error['code'],
				'message'	=> $error['message']
			);
			return $response;
		}
		$this->db->db_debug = true;
	}
}