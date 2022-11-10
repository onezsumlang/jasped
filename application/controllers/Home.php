<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct(){
    parent::__construct();
		$this->load->model('Category_model', 'Category_model');
  }

	public function index(){
		$data['page'] = 'frontend/home/index';
		$data['parentCategory'] = $this->Category_model->getParentCategory();
		$this->load->view('frontend/components/mod', $data);
	}
}
