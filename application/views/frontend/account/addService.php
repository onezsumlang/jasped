<div class="container mb-5">
  <div class="row">
    <?php
      $this->load->view($nav);

      function buildTree($array,$id_key = 'id',$parent_key = 'parent_id'){
        $res = [];
        foreach($array as $y){
          $array_with_id[$y[$id_key]] = $y;
        }
        foreach($array_with_id as $key => $element){
          if($element[$parent_key]){
            $array_with_id[$element[$parent_key]]['childrens'][$key] = &$array_with_id[$key];
          }else{
            $res[$element[$id_key]] = &$array_with_id[$key];
          }
        }
        return $res;
      }
      // $res = buildTree($category, 'categoryId', 'parentId');
      // echo "<pre>";print_r($res);echo "</pre>";
    ?>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4" style="border-left: 1px solid #ddd;padding-bottom: 30px;">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tambah Jasa pada Toko "<?=$store['storeName']?>"</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
          </div>
          <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <span data-feather="calendar"></span>
            This week
          </button>
        </div>
      </div>
      <?php
        if ($this->session->flashdata('code')) {
      ?>
      <div class="row">
        <div class="col-md-12">
          <div class="alert alert-info alert-dismissible show" role="alert">
            <strong>Alert!</strong> <em><?= $this->session->flashdata('code') . " - " . $this->session->flashdata('message') ?></em>
          </div>
        </div>
      </div>
      <?php
        }
      ?>
      <div class="row">
        <div class="col-md-12">
          <h5>Tambah Jasa</h5>
          <form class="needs-validation" action="<?=base_url()?>account/doAddService" method="post" enctype="multipart/form-data" novalidate>
            <div class="row g-3">
              <div class="col-4">
                <label for="itemCategoryId" class="form-label">Kategori Jasa</label>
                <select class="form-control" name="itemCategoryId" id="itemCategoryId">
                  <option value="">--Kategori Jasa--</option>
                  <?php 
                    if(!empty($category)){
                      $category = buildTree($category, 'categoryId', 'parentId');
                      foreach($category as $row){
                  ?>
                  <option value="<?=$row['categoryId']?>" <?=set_value('itemCategoryId') == $row['categoryId'] ? "selected" : ""?>><?=$row['categoryName']?></option>
                  <?php 
                        if(isset($row['childrens'])){
                          foreach($row['childrens'] as $row_child){
                  ?>
                  <option value="<?=$row_child['categoryId']?>" <?=set_value('itemCategoryId') == $row_child['categoryId'] ? "selected" : ""?>>-- <?=$row_child['categoryName']?></option>
                  <?php
                          }
                        }
                      }
                    }
                  ?>
                </select>
                <small class="fieldError text-danger"><?= form_error('itemCategoryId') ?></small>
              </div>
              <div class="col-4">
                <label for="itemName" class="form-label">Nama Jasa</label>
                <input type="text" class="form-control" id="itemName" name="itemName" placeholder="Nama Jasa" value="<?= set_value('itemName') ?>">
                <small class="fieldError text-danger"><?= form_error('itemName') ?></small>
              </div>
              <div class="col-4">
                <label for="itemPrice" class="form-label">Harga</label>
                <input type="text" class="form-control" id="itemPrice" name="itemPrice" placeholder="Harga" value="<?= set_value('itemPrice') ?>">
                <small class="fieldError text-danger"><?= form_error('itemPrice') ?></small>
              </div>
              <div class="col-12">
                <label for="itemDescription" class="form-label">Deskripsi</label>
                <textarea class="form-control" id="itemDescription" name="itemDescription" placeholder="Deskripsi"><?= set_value('itemDescription') ?></textarea>
                <small class="fieldError text-danger"><?= form_error('itemDescription') ?></small>
              </div>
              <div class="col-4">
                <label for="image1" class="form-label">Gambar Utama</label>
                <img src="<?= base_url() ?>assets/images/add-photo.jpg" style="width:100%;" id="preview_image1" />
                <input type="file" accept="image/*"  class="form-control" id="image1" name="image1" placeholder="Gambar Utama" value="<?= set_value('image1') ?>" onchange="preview_imageone(event)">
                <small class="fieldError text-danger"><?= form_error('image1') ?></small>
                <script type='text/javascript'>
                  function preview_imageone(event) {
                    var reader = new FileReader();
                    reader.onload = function() {
                      var output = document.getElementById('preview_image1');
                      output.src = reader.result;
                    }
                    reader.readAsDataURL(event.target.files[0]);
                  }
                </script>
              </div>
              <div class="col-4">
                <label for="image2" class="form-label">Gambar Tambahan</label>
                <img src="<?= base_url() ?>assets/images/add-photo.jpg" style="width:100%;" id="preview_image2" />
                <input type="file" accept="image/*"  class="form-control" id="image2" name="image2" placeholder="Gambar Tambahan" value="<?= set_value('image2') ?>" onchange="preview_imagetwo(event)">
                <small class="fieldError text-danger"><?= form_error('image2') ?></small>
                <script type='text/javascript'>
                  function preview_imagetwo(event) {
                    var reader = new FileReader();
                    reader.onload = function() {
                      var output = document.getElementById('preview_image2');
                      output.src = reader.result;
                    }
                    reader.readAsDataURL(event.target.files[0]);
                  }
                </script>
              </div>
              <div class="col-4">
                <label for="image3" class="form-label">Gambar Tambahan</label>
                <img src="<?= base_url() ?>assets/images/add-photo.jpg" style="width:100%;" id="preview_image3" />
                <input type="file" accept="image/*"  class="form-control" id="image3" name="image3" placeholder="Gambar Tambahan" value="<?= set_value('image3') ?>" onchange="preview_imagethree(event)">
                <small class="fieldError text-danger"><?= form_error('image3') ?></small>
                <script type='text/javascript'>
                  function preview_imagethree(event) {
                    var reader = new FileReader();
                    reader.onload = function() {
                      var output = document.getElementById('preview_image3');
                      output.src = reader.result;
                    }
                    reader.readAsDataURL(event.target.files[0]);
                  }
                </script>
              </div>
            </div>
            <hr class="my-3">
            <input type="hidden" name="storeCode" value="<?=$store['storeCode']?>" />
            <button class="w-100 btn btn-success btn-sm" type="submit">Simpan</button>
          </form>
        </div>
      </div>
      <div class="row mt-3">
        <div class="col-md-12">
          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th scope="col" width="30">#</th>
                  <th scope="col">Nama Jasa</th>
                  <th scope="col">Kategori</th>
                  <th scope="col">Harga</th>
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                  if(!empty($items)){
                    $no=1;
                    foreach($items as $row){
                ?>
                <tr>
                  <td><?=$no?></td>
                  <td>
                    <img src="<?=base_url()?>assets/uploads/services/<?=$row['image1']?>" width="60" /><br/>
                    <strong><?=$row['itemName']?></strong>
                  </td>
                  <td><?=$row['categoryName']?></td>
                  <td><?=number_format($row['itemPrice'])?></td>
                  <td>
                    <a href="" class="" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Sembunyikan Toko">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#dc3545" class="bi bi-dash-circle-fill" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4.5 7.5a.5.5 0 0 0 0 1h7a.5.5 0 0 0 0-1h-7z"/>
                      </svg>
                    </a>
                  </td>
                </tr>
                <?php
                      $no++;
                    }
                  }else{
                ?>
                <tr>
                  <td colspan="5">Tidak ada data</td>
                </tr>
                <?php
                  }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </main>
  </div>
</div>