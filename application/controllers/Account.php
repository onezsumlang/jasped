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
		$this->load->model('Items_model', 'Items_model');
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

      $image = '';

      $uploadPath = './assets/uploads/stores/';

      if($_FILES['image']['tmp_name']){
        $old_image = ($this->input->post('old_image') ? $this->input->post('old_image') : '');
        $image = $this->uploadImage($_FILES['image']['tmp_name'], $uploadPath, $old_image);
      }

      $dataInsert = array(
        'userId'      => $userId,
        'storeCode'   => $storeCode,
        'storeName'   => $this->input->post('storeName'),
        'address'     => $this->input->post('address'),
        'province'    => $this->input->post('province'),
        'city'        => $this->input->post('city'),
        'image'       => $image,
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

    $data['items'] = $this->Items_model->getItemsByStoreId($store[0]['storeId']);

    $data['category'] = $this->Category_model->getCategory();

		$data['page'] = 'frontend/account/addService';
		$data['nav'] = 'frontend/account/nav';
		$data['parentCategory'] = $this->Category_model->getParentCategory();
		$this->load->view('frontend/components/mod', $data);
	}

  public function doAddService(){
    $this->load->helper(array('form', 'url'));
    $this->load->library('form_validation');
    
    $userId = $this->session->userdata('userId');
    $storeCode = $this->input->post('storeCode');
    
    $store = $this->Stores_model->getStoresByStoreCode($storeCode);
    $data['store'] = $store[0];

    $data['category'] = $this->Category_model->getCategory();

    if ($this->form_validation->run('addService') == FALSE){
      $data['page'] = 'frontend/account/addService';
      $data['nav'] = 'frontend/account/nav';
      $data['parentCategory'] = $this->Category_model->getParentCategory();
      $this->load->view('frontend/components/mod', $data);
    }else{
      $image1 = '';
      $image2 = '';
      $image3 = '';

      $uploadPath = './assets/uploads/services/';

      if($_FILES['image1']['tmp_name']){
        $old_image1 = ($this->input->post('old_image1') ? $this->input->post('old_image1') : '');
        $image1 = $this->uploadImage($_FILES['image1']['tmp_name'], $uploadPath, $old_image1);
      }

      if($_FILES['image2']['tmp_name']){
        $old_image2 = ($this->input->post('old_image2') ? $this->input->post('old_image2') : '');
        $image2 = $this->uploadImage($_FILES['image2']['tmp_name'], $uploadPath, $old_image2);
      }

      if($_FILES['image3']['tmp_name']){
        $old_image3 = ($this->input->post('old_image3') ? $this->input->post('old_image3') : '');
        $image3 = $this->uploadImage($_FILES['image3']['tmp_name'], $uploadPath, $old_image3);
      }

      $dataInsert = array(
        'itemCategoryId'    => $this->input->post('itemCategoryId'),
        'itemName'          => $this->input->post('itemName'),
        'itemPrice'         => $this->input->post('itemPrice'),
        'itemDescription'   => $this->input->post('itemDescription'),
        'storeId'           => $store[0]['storeId'],
        'image1'            => $image1,
        'image2'            => $image2,
        'image3'            => $image3,
        'discountType'      => '',
        'discountValue'     => '',
        'isActive'          => '1',
        'insertDate'        => date('Y-m-d H:i:s'),
        'lastUpdDate'       => date('Y-m-d H:i:s')
      );
      $response = $this->Items_model->createItem($dataInsert);
      if($response['status']){
        $logs = array(
          'method'  => 'account/doAddService',
          'detail'  => json_encode(array('regStatus' => true, 'userId' => $userId, 'itemName' => $this->input->post('itemName'), 'itemPrice' => $this->input->post('itemPrice'), 'itemDescription' => $this->input->post('itemDescription'))),
          'lastUpdDate' => date('Y-m-d H:i:s')
        );
        $this->Logs_model->createLog($logs);

        $_SESSION['code'] = 200;
        $_SESSION['message'] = "Terimakasih! Jasa berhasil ditambahkan!";
        $this->session->mark_as_flash(array('code','message'));
        redirect('account/addService/'.$storeCode);
      }else{
        $logs = array(
          'method'  => 'account/doAddService',
          'detail'  => json_encode(array('regStatus' => true, 'userId' => $userId, 'itemName' => $this->input->post('itemName'), 'itemPrice' => $this->input->post('itemPrice'), 'itemDescription' => $this->input->post('itemDescription'))),
          'lastUpdDate' => date('Y-m-d H:i:s')
        );
        $this->Logs_model->createLog($logs);
        $_SESSION['code'] = 404;
        $_SESSION['message'] = "Registrasi jasa gagal, silahkan ulang kembali!";
        $this->session->mark_as_flash(array('code', 'message'));
        redirect('account/addService/'.$storeCode);
      }
    }
  }

  public function uploadImage($tmp_name, $path, $old_image){
    $userId = $this->session->userdata('userId');

    if($tmp_name){
      $file_tmp = $tmp_name;
      $data = file_get_contents($file_tmp);
      $base64 = base64_encode($data);
      $image_data = $base64;
    }

    if(!empty($image_data)){
      $image = base64_decode($image_data);
      $image_name = md5(uniqid(rand(), true).$userId);
      $filename = $image_name . '.' . 'png';
      // $path = './assets/uploads/services/';
      file_put_contents($path . $filename, $image);

      if(!empty($old_image)){
        unlink($path . $old_image);
      }

      $config['image_library'] = 'gd2';
      $config['source_image'] = $path . $filename;
      $config['maintain_ratio'] = TRUE;

      $imgdata=exif_read_data($path . $filename, 'IFD0');


      list($width, $height) = getimagesize($tmp_name);
      if ($width >= $height){
          $config['width'] = 450;
      }
      else{
          $config['height'] = 300;
      }
      $config['master_dim'] = 'auto';
      // $config['width']         = 250;
      // $config['height']       = 300;

      $this->load->library('image_lib', $config);

      if (!$this->image_lib->resize()){  
        echo "error";
      }else{

        $this->image_lib->clear();
        $config=array();

        $config['image_library'] = 'gd2';
        $config['source_image'] = $path . $filename;


        switch($imgdata['Orientation']) {
            case 3:
                $config['rotation_angle']='180';
                break;
            case 6:
                $config['rotation_angle']='270';
                break;
            case 8:
                $config['rotation_angle']='90';
                break;
        }

        $this->image_lib->initialize($config); 
        $this->image_lib->rotate();
      }
    }else{
      $filename = $old_image;
    }
    return $filename;
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

