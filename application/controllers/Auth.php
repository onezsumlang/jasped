<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	public function __construct(){
    parent::__construct();
		$this->load->model('Category_model', 'Category_model');
  }

	public function index(){
		$data['page'] = 'frontend/auth/index';
		$data['parentCategory'] = $this->Category_model->getParentCategory();
		$this->load->view('frontend/components/mod', $data);
	}

  public function doLogin(){
    echo "<pre>";print_r($_POST);
  }

  public function doRegister(){
    echo "<pre>";print_r($_POST);
  }
}
