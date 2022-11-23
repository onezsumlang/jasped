<?php 

class Users_model extends CI_Model{
  public function checkIsEmailExist($email){
		return $this->db->get_where('users', ['email' => $email])->result_array();
	}

  public function checkIsPhoneExist($phone){
		return $this->db->get_where('users', ['phone' => $phone])->result_array();
	}

  public function countUserByYear($regDate){
    $query = "
			SELECT COUNT(*) cntUser FROM users WHERE YEAR(insertDate) = '".date('Y', strtotime($regDate))."'
		";
    return $this->db->query($query)->result_array();
  }

  public function getMemberLogin($email, $password){
    $query = "
			SELECT * FROM users
      WHERE email = '".$email."'
      AND password = md5('".$password."')
		";
    return $this->db->query($query)->result_array();
  }

  public function createUser($data){
		$this->db->db_debug = false;
		
		$result = $this->db->insert('users', $data);
		
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