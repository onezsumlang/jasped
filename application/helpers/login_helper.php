<?php

function is_logged_in(){
  // Get current CodeIgniter instance
  $CI = &get_instance();
  // We need to use $CI->session instead of $this->session
  $user = $CI->session->userdata('logged_in');
  if (!isset($user)) {
    return false;
  } else {
    return true;
  }
}

function is_admin_logged_in(){
  // Get current CodeIgniter instance
  $CI = &get_instance();
  // We need to use $CI->session instead of $this->session
  $user = $CI->session->userdata('xadmin');
  // $user = $user['admin_logged_in'];
  if (!isset($user['admin_logged_in'])) {
    return false;
  } else {
    return true;
  }
}