<?php 

class Logs_model extends CI_Model{
  public function createLog($data){
		$this->db->db_debug = false;
		
		$result = $this->db->insert('logs', $data);
		
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

?>