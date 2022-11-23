<?php 

class Stores_model extends CI_Model{
  public function getStoresByUserId($userId){
		return $this->db->get_where('stores', ['userId' => $userId])->result_array();
	}

	public function getStoresByStoreCode($storeCode){
		return $this->db->get_where('stores', ['storeCode' => $storeCode])->result_array();
	}

	public function countStoresByUserId($userId){
    $query = "
			SELECT COUNT(*) cntStore FROM stores WHERE userId = '".$userId."'
		";
    return $this->db->query($query)->result_array();
  }

  public function createStore($data){
		$this->db->db_debug = false;
		
		$result = $this->db->insert('stores', $data);
		
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