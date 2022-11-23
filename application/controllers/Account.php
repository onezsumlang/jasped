<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {
	public function __construct(){
    parent::__construct();
    if(!is_logged_in()){
      redirect('./auth');
    }
		$this->load->model('Category_model', 'Category_model');
		$this->load->model('Users_model', 'Users_model');
		$this->load->model('Stores_model', 'Stores_model');
		$this->load->model('Logs_model', 'Logs_model');
  }

	public function index(){
		$data['page'] = 'frontend/account/index';
		$data['nav'] = 'frontend/account/nav';
		$data['parentCategory'] = $this->Category_model->getParentCategory();
		$this->load->view('frontend/components/mod', $data);
	}

  public function transaction(){
		$data['page'] = 'frontend/account/transaction';
		$data['nav'] = 'frontend/account/nav';
		$data['parentCategory'] = $this->Category_model->getParentCategory();
		$this->load->view('frontend/components/mod', $data);
	}

  public function addStore(){
    $userId = $this->session->userdata('userId');
    $data['stores'] = $this->Stores_model->getStoresByUserId($userId);

		$data['page'] = 'frontend/account/addStore';
		$data['nav'] = 'frontend/account/nav';
		$data['parentCategory'] = $this->Category_model->getParentCategory();
		$this->load->view('frontend/components/mod', $data);
	}

  public function doAddStore(){
    $this->load->helper(array('form', 'url'));
    $this->load->library('form_validation');
    
    $userId = $this->session->userdata('userId');

    if ($this->form_validation->run('addStore') == FALSE){
      $data['stores'] = $this->Stores_model->getStoresByUserId($userId);
      $data['page'] = 'frontend/account/addStore';
      $data['nav'] = 'frontend/account/nav';
      $data['parentCategory'] = $this->Category_model->getParentCategory();
      $this->load->view('frontend/components/mod', $data);
    }else{
      echo "<pre>";print_r($_POST);

      $cntStore = $this->Stores_model->countStoresByUserId($userId);
      $cntStore = $cntStore[0]['cntStore'];
      $cntStore = str_pad($cntStore+1, 2, "0", STR_PAD_LEFT);

      $username = $this->session->userdata('username');
      $storeCode = $username.$cntStore;

      $dataInsert = array(
        'userId'      => $userId,
        'storeCode'   => $storeCode,
        'storeName'   => $this->input->post('storeName'),
        'address'     => $this->input->post('address'),
        'province'    => $this->input->post('province'),
        'city'        => $this->input->post('city'),
        'isActive'    => '1',
        'insertDate'  => date('Y-m-d H:i:s'),
        'lastUpdDate' => date('Y-m-d H:i:s')
      );
      $response = $this->Stores_model->createStore($dataInsert);
      if($response['status']){
        $logs = array(
          'method'  => 'account/doAddStore',
          'detail'  => json_encode(array('regStatus' => true, 'userId' => $userId, 'storeName' => $this->input->post('storeName'), 'province' => $this->input->post('province'), 'city' => $this->input->post('city'))),
          'lastUpdDate' => date('Y-m-d H:i:s')
        );
        $this->Logs_model->createLog($logs);

        $_SESSION['code'] = 200;
        $_SESSION['message'] = "Terimakasih! Toko berhasil ditambahkan!";
        $this->session->mark_as_flash(array('code','message'));
        redirect('account/addStore');
      }else{
        $logs = array(
          'method'  => 'account/doAddStore',
          'detail'  => json_encode(array('regStatus' => false, 'userId' => $userId, 'storeName' => $this->input->post('storeName'), 'province' => $this->input->post('province'), 'city' => $this->input->post('city'))),
          'lastUpdDate' => date('Y-m-d H:i:s')
        );
        $this->Logs_model->createLog($logs);
        $_SESSION['code'] = 404;
        $_SESSION['message'] = "Registrasi toko gagal, silahkan ulang kembali!";
        $this->session->mark_as_flash(array('code', 'message'));
        redirect('account/addStore');
      }
    }
  }

  public function addService($storeCode){
    $store = $this->Stores_model->getStoresByStoreCode($storeCode);
    $data['store'] = $store[0];

    $data['category'] = $this->Category_model->getCategory();

		$data['page'] = 'frontend/account/addService';
		$data['nav'] = 'frontend/account/nav';
		$data['parentCategory'] = $this->Category_model->getParentCategory();
		$this->load->view('frontend/components/mod', $data);
	}

  public function storeTransaction(){
		$data['page'] = 'frontend/account/storeTransaction';
		$data['nav'] = 'frontend/account/nav';
		$data['parentCategory'] = $this->Category_model->getParentCategory();
		$this->load->view('frontend/components/mod', $data);
	}

  public function changeProfile(){
		$data['page'] = 'frontend/account/changeProfile';
		$data['nav'] = 'frontend/account/nav';
		$data['parentCategory'] = $this->Category_model->getParentCategory();
		$this->load->view('frontend/components/mod', $data);
	}

  public function changePassword(){
		$data['page'] = 'frontend/account/changePassword';
		$data['nav'] = 'frontend/account/nav';
		$data['parentCategory'] = $this->Category_model->getParentCategory();
		$this->load->view('frontend/components/mod', $data);
	}
}

