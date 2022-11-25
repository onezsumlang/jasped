<div class="container mb-5">
  
  <div class="row">
    <?php
      $this->load->view($nav);
    ?>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4" style="border-left: 1px solid #ddd;padding-bottom: 30px;">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Toko</h1>
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
        <div class="col-md-4">
          <h5>Tambah Toko</h5>
          <form class="needs-validation" action="<?=base_url()?>account/doAddStore" method="post" enctype="multipart/form-data" novalidate>
            <div class="row g-3">
              <div class="col-12">
                <label for="storeName" class="form-label">Nama Toko</label>
                <input type="text" class="form-control" id="storeName" name="storeName" placeholder="Nama Toko" value="<?= set_value('storeName') ?>">
                <small class="fieldError text-danger"><?= form_error('storeName') ?></small>
              </div>
              <div class="col-12">
                <label for="storeName" class="form-label">Alamat</label>
                <textarea class="form-control" name="address" id="address" placeholder="Alamat Toko"></textarea>
              </div>
              <div class="col-12">
                <label for="storeName" class="form-label">Propinsi</label>
                <select class="form-control" name="province" id="province">
                  <option value="">--Pilih Propinsi--</option>
                  <option value="DKI Jakarta" <?=set_value('province') == "DKI Jakarta" ? "selected" : ""?>>DKI Jakarta</option>
                </select>
                <small class="fieldError text-danger"><?= form_error('province') ?></small>
              </div>
              <div class="col-12">
                <label for="storeName" class="form-label">Kota/Kabupaten</label>
                <select class="form-control" name="city" id="city">
                  <option value="">--Pilih Kota/Kabupaten--</option>
                  <option value="Jakarta Pusat" <?=set_value('city') == "Jakarta Pusat" ? "selected" : ""?>>Jakarta Pusat</option>
                  <option value="Jakarta Barat" <?=set_value('city') == "Jakarta Barat" ? "selected" : ""?>>Jakarta Barat</option>
                </select>
                <small class="fieldError text-danger"><?= form_error('city') ?></small>
              </div>
              <div class="col-12">
                <label for="image" class="form-label">Gambar Toko</label>
                <img src="<?= base_url() ?>assets/images/add-photo.jpg" style="width:100%;" id="preview_image" />
                <input type="file" accept="image/*"  class="form-control" id="image" name="image" placeholder="Gambar Toko" value="<?= set_value('image') ?>" onchange="preview_imageone(event)">
                <small class="fieldError text-danger"><?= form_error('image') ?></small>
                <script type='text/javascript'>
                  function preview_imageone(event) {
                    var reader = new FileReader();
                    reader.onload = function() {
                      var output = document.getElementById('preview_image');
                      output.src = reader.result;
                    }
                    reader.readAsDataURL(event.target.files[0]);
                  }
                </script>
              </div>
            </div>
            <hr class="my-3">

            <button class="w-100 btn btn-success btn-sm" type="submit">Simpan</button>
          </form>
        </div>
        <div class="col-md-8">
          <h5>Toko Anda</h5>
          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th scope="col" width="30">#</th>
                  <th scope="col">Nama Toko</th>
                  <th scope="col">Kota/Kab.</th>
                  <th scope="col">Jumlah Jasa</th>
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                  if(!empty($stores)){
                    $no=1;
                    foreach($stores as $row){
                ?>
                <tr>
                  <td><?=$no?></td>
                  <td><?=$row['storeName']?></td>
                  <td><?=$row['city']?></td>
                  <td></td>
                  <td>
                    <a href="<?=base_url()?>account/addService/<?=$row['storeCode']?>" class="" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Tambah Jasa">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#198754" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
                      </svg>
                    </a>
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
                  <td colspan="4">Tidak ada data</td>
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