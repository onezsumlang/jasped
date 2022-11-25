<?php
$config = array(
  'login' => array(
    array(
      'field'   => 'email_login',
      'label'   => 'Email',
      'rules'   => 'trim|required',
      'errors'  => array(
        'required'  => '%s harus diisi'
      )
    ),
    array(
      'field'   => 'password_login',
      'label'   => 'Password',
      'rules'   => 'trim|required',
      'errors'  => array(
        'required'  => '%s harus diisi'
      )
    )
  ),
  'register' => array(
    array(
      'field'   => 'fullname',
      'label'   => 'Nama Lengkap',
      'rules'   => 'trim|required',
      'errors'  => array(
        'required'  => '%s harus diisi'
      )
    ),
    array(
      'field'   => 'email',
      'label'   => 'Email',
      'rules'   => 'trim|required|callback_isEmailExist',
      'errors'  => array(
        'required'      => '%s harus diisi',
        'valid_email'   => '%s tidak valid',
        'isEmailExist'  => '%s sudah terdaftar'
      )
    ),
    array(
      'field'   => 'phone',
      'label'   => 'Phone (WA)',
      'rules'   => 'trim|required|callback_isPhoneExist',
      'errors'  => array(
        'required'      => '%s harus diisi',
        'isPhoneExist'  => '%s sudah terdaftar'
      )
    ),
    array(
      'field'   => 'password',
      'label'   => 'Password',
      'rules'   => 'trim|required|min_length[8]|xss_clean|callback_is_password_strong',
      'errors'  => array(
        'required'  => '%s harus diisi',
        'min_length'  => '%s minimum 8 karakter',
        'is_password_strong'  => '%s harus kombinasi huruf besar, huruf kecil dan angka'
      )
    ),
    array(
      'field'   => 'repassword',
      'label'   => 'Re-Password',
      'rules'   => 'trim|required|matches[password]',
      'errors'  => array(
        'required'  => '%s harus diisi',
        'matches'   => '%s tidak sama'
      )
    ),
    array(
      'field'   => 'm-agree',
      'label'   => 'Syarat & Ketentuan',
      'rules'   => 'trim|required',
      'errors'  => array(
        'required'  => '%s harus dicheck'
      )
    )
  ),
  'addStore' => array(
    array(
      'field'   => 'storeName',
      'label'   => 'Nama Toko',
      'rules'   => 'trim|required',
      'errors'  => array(
        'required'  => '%s harus diisi'
      )
    ),
    array(
      'field'   => 'province',
      'label'   => 'Propinsi',
      'rules'   => 'trim|required',
      'errors'  => array(
        'required'  => '%s harus diisi'
      )
    ),
    array(
      'field'   => 'city',
      'label'   => 'Kota/Kabupaten',
      'rules'   => 'trim|required',
      'errors'  => array(
        'required'  => '%s harus diisi'
      )
    )
  ),
  'addService' => array(
    array(
      'field'   => 'itemCategoryId',
      'label'   => 'Kategori',
      'rules'   => 'trim|required',
      'errors'  => array(
        'required'  => '%s harus dipilih'
      )
    ),
    array(
      'field'   => 'itemName',
      'label'   => 'Nama Jasa',
      'rules'   => 'trim|required',
      'errors'  => array(
        'required'  => '%s harus diisi'
      )
    ),
    array(
      'field'   => 'itemPrice',
      'label'   => 'Harga',
      'rules'   => 'trim|required',
      'errors'  => array(
        'required'  => '%s harus diisi'
      )
    ),
    array(
      'field'   => 'itemDescription',
      'label'   => 'Deskripsi',
      'rules'   => 'trim|required',
      'errors'  => array(
        'required'  => '%s harus diisi'
      )
    ),
  ),
);
?>