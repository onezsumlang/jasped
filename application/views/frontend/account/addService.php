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
      <div class="row">
        <div class="col-md-4">
          <h5>Tambah Jasa</h5>
          <form class="needs-validation" action="<?=base_url()?>account/doAddStore" method="post" novalidate>
            <div class="row g-3">
              <div class="col-12">
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
                <small class="fieldError text-danger"><?= form_error('city') ?></small>
              </div>
              <div class="col-12">
                <label for="itemName" class="form-label">Nama Jasa</label>
                <input type="text" class="form-control" id="itemName" name="itemName" placeholder="Nama Jasa" value="<?= set_value('itemName') ?>">
                <small class="fieldError text-danger"><?= form_error('itemName') ?></small>
              </div>
              <div class="col-12">
                <label for="itemPrice" class="form-label">Harga</label>
                <input type="text" class="form-control" id="itemPrice" name="itemPrice" placeholder="Nama Jasa" value="<?= set_value('itemPrice') ?>">
                <small class="fieldError text-danger"><?= form_error('itemPrice') ?></small>
              </div>
              <div class="col-12">
                <label for="itemDescription" class="form-label">Deskripsi</label>
                <textarea class="form-control" id="itemDescription" name="itemDescription" placeholder="Deskripsi"><?= set_value('itemDescription') ?></textarea>
                <small class="fieldError text-danger"><?= form_error('itemDescription') ?></small>
              </div>
              <div class="col-12">
                <label for="image1" class="form-label">Gambar Utama</label>
                <input type="file" class="form-control" id="image1" name="image1" placeholder="Gambar Utama" value="<?= set_value('image1') ?>">
                <small class="fieldError text-danger"><?= form_error('image1') ?></small>
              </div>
              <div class="col-12">
                <label for="image2" class="form-label">Gambar Tambahan</label>
                <input type="file" class="form-control" id="image2" name="image2" placeholder="Gambar Tambahan" value="<?= set_value('image2') ?>">
                <small class="fieldError text-danger"><?= form_error('image2') ?></small>
              </div>
              <div class="col-12">
                <label for="image3" class="form-label">Gambar Tambahan</label>
                <input type="file" class="form-control" id="image3" name="image3" placeholder="Gambar Tambahan" value="<?= set_value('image3') ?>">
                <small class="fieldError text-danger"><?= form_error('image3') ?></small>
              </div>
            </div>
            <hr class="my-3">

            <button class="w-100 btn btn-success btn-sm" type="submit">Simpan</button>
          </form>
        </div>
      </div>
    </main>
  </div>
</div>