<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Jasapedia - Semua Ada</title>
  <!-- Favicon-->
  <link rel="icon" type="image/x-icon" href="<?= base_url() ?>assets/favicon.ico" />
  <!-- Bootstrap icons-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
  <!-- Core theme CSS (includes Bootstrap)-->
  <link href="<?= base_url() ?>assets/css/styles.css" rel="stylesheet" />
  <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
  

</head>

<body>
  <div class="container">
    <header class="blog-header py-3">
      <div class="row flex-nowrap justify-content-between align-items-center">
        <div class="col-4 pt-1">
          <small><a class="link-secondary" href="#">Syarat dan Ketentuan</a></small>
        </div>
        <div class="col-4 text-center">
          <a class="blog-header-logo text-dark" href="<?=base_url()?>">Jasapedia</a>
        </div>
        <div class="col-4 d-flex justify-content-end align-items-center">
          <a class="link-secondary" href="#" aria-label="Search">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="mx-3" role="img" viewBox="0 0 24 24">
              <title>Search</title>
              <circle cx="10.5" cy="10.5" r="7.5" />
              <path d="M21 21l-5.2-5.2" />
            </svg>
          </a>
          <?php 
            if($this->session->userdata('logged_in') == true){
          ?>
          <a class="btn btn-sm" href="<?=base_url()?>account">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
              <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/>
            </svg>
            <?=strtok($this->session->userdata('fullname')," ")?>
          </a>
          <?php
            }else{
          ?>
          <a class="btn btn-sm btn-outline-secondary" href="<?=base_url()?>auth">Masuk / Daftar</a>
          <?php 
            }
          ?>
        </div>
      </div>
    </header>
    <div class="nav-scroller py-1 mb-2">
      <nav class="nav d-flex justify-content-between">
        <?php 
          if(!empty($parentCategory)){
            foreach($parentCategory as $row){
        ?>
        <a class="p-2 link-secondary" href="#"><?=$row['categoryName']?></a>
        <?php 
            }
          }
        ?>
      </nav>
    </div>
  </div>

  <?php 
    // print_r($this->session->userdata());
  ?>