<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct(){
    parent::__construct();
		$this->load->model('Category_model', 'Category_model');
		$this->load->model('Items_model', 'Items_model');
  }

	public function index(){
		$data['featuredItems'] = $this->Items_model->getFeaturedItems();

		$data['pertukangan'] = $this->Items_model->getFeaturedItemsByParentCategoryId(1);
		$data['otomotif'] = $this->Items_model->getFeaturedItemsByParentCategoryId(2);
		$data['rumahtangga'] = $this->Items_model->getFeaturedItemsByParentCategoryId(3);

		$data['page'] = 'frontend/home/index';
		$data['parentCategory'] = $this->Category_model->getParentCategory();
		$this->load->view('frontend/components/mod', $data);
	}
}
