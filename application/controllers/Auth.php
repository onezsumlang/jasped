<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	public function __construct(){
    parent::__construct();
		$this->load->model('Category_model', 'Category_model');
		$this->load->model('Users_model', 'Users_model');
		$this->load->model('Logs_model', 'Logs_model');
  }

	public function index(){
		$data['page'] = 'frontend/auth/index';
		$data['parentCategory'] = $this->Category_model->getParentCategory();
		$this->load->view('frontend/components/mod', $data);
	}

  public function notification(){
    $data['page'] = 'frontend/auth/notification';
		$data['parentCategory'] = $this->Category_model->getParentCategory();
		$this->load->view('frontend/components/mod', $data);
  }

  public function doLogin(){
    $this->load->helper(array('form', 'url'));
    $this->load->library('form_validation');

    if ($this->form_validation->run('login') == FALSE){
      $data['page'] = 'frontend/auth/index';
      $data['parentCategory'] = $this->Category_model->getParentCategory();
      $this->load->view('frontend/components/mod', $data);
    }else{
      $url = $this->input->post('url');
      $email = $this->input->post('email_login');
      $password = $this->input->post('password_login');
      $response = $this->Users_model->getMemberLogin($email, $password);
      if(!empty($response)){
        print_r($response);
        $data = $response[0];
        $data = array(
          'userId'  			=> $data['userId'],
          'username'  		=> $data['username'],
          'fullname'  		=> $data['fullname'],
          'email'         => $data['email'],
          'logged_in' 		=> TRUE
        );

        $this->session->set_userdata($data);
        if(!empty($url)){
          redirect('./'.$url);
        }else{
          redirect('./');
        }
      }else{
        $_SESSION['code'] = 200;
        $_SESSION['message'] = "Email/Password yang Anda masukan salah!";
        $this->session->mark_as_flash(array('code','message'));
        redirect('auth');
      }
    }
  }

  public function doRegister(){
    $this->load->helper(array('form', 'url'));
    $this->load->library('form_validation');

    if ($this->form_validation->run('register') == FALSE){
      $data['page'] = 'frontend/auth/index';
      $data['parentCategory'] = $this->Category_model->getParentCategory();
      $this->load->view('frontend/components/mod', $data);
    }else{
      $regDate = date('Y-m-d H:i:s');
      $cntUser = $this->Users_model->countUserByYear($regDate);
      $cntUser = $cntUser[0]['cntUser'];
      $cntUser = str_pad($cntUser+1, 4, "0", STR_PAD_LEFT);

      $username = date('ym').$cntUser;
      $fullname = $this->input->post('fullname');
      $email = $this->input->post('email');

      $data = array(
        'fullname'	                => $this->input->post('fullname'),
        'email'	                    => $this->input->post('email'),
        'phone'	                    => $this->input->post('phone'),
        'username'                  => $username,
        'password'                  => md5($this->input->post('password')),
        'insertDate'	              => $regDate
      );

      $response = $this->Users_model->createUser($data);
      if($response['status']){
        // $emailStatus = $this->Email_model->sendEmailSuccessRegistration($fullname, $email, $username);
        // if($emailStatus){    
          $logs = array(
            'method'  => 'auth/doRegister',
            'detail'  => json_encode(array('regStatus' => true, 'fullname' => $fullname, 'email' => $email, 'username' => $username)),
            'lastUpdDate' => date('Y-m-d H:i:s')
          );
          $this->Logs_model->createLog($logs);
        // }
        $_SESSION['code'] = 200;
        $_SESSION['message'] = "Terimakasih! Silahkan cek email untuk konfirmasi email Anda!";
        $_SESSION['redirect'] = "home";
        $this->session->mark_as_flash(array('code','message','redirect'));
        redirect('auth/notification');
      }else{
        $logs = array(
          'method'  => 'auth/doRegister',
          'detail'  => json_encode(array('regStatus' => false, 'fullname' => $fullname, 'email' => $email, 'username' => $username)),
          'lastUpdDate' => date('Y-m-d H:i:s')
        );
        $this->Logs_model->createLog($logs);
        $_SESSION['code'] = 404;
        $_SESSION['message'] = "Registrasi gagal, silahkan ulang kembali!";
        $this->session->mark_as_flash(array('code', 'message'));
        redirect('auth/notification');
      }
    }
  }

  public function isEmailExist($email){
    $check = $this->Users_model->checkIsEmailExist($email);
    if($check){
      return false;
    }else{
      return true;
    }
  }

  public function isPhoneExist($phone){
    $check = $this->Users_model->checkIsPhoneExist($phone);
    if($check){
      return false;
    }else{
      return true;
    }
  }

  public function is_password_strong($pwd){
    if (preg_match('#[0-9]#', $pwd) && preg_match('#[a-zA-Z]#', $pwd)) {
      return TRUE;
    }
    return FALSE;
  }

  public function logout(){
    session_destroy();
		redirect('./');
	}
}
