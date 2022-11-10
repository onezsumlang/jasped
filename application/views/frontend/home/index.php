<link href="<?=base_url()?>assets/css/carousel.css" rel="stylesheet" />
<div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="<?=base_url()?>assets/images/sliders/1.jpg"/>

      <div class="container">
        <div class="carousel-caption text-start">
          <h1>Manfaatkan Keahlianmu</h1>
          <p>Yukk manfaatkan keahlian yang kamu punya!</p>
          <p><a class="btn btn-lg btn-primary" href="#">Bergabung Sekarang</a></p>
        </div>
      </div>
    </div>
    <div class="carousel-item">
      <img src="<?=base_url()?>assets/images/sliders/2.jpg"/>

      <div class="container">
        <div class="carousel-caption">
          <h1>Cari kebutuhan Anda</h1>
          <p>Pilih kebutuhan Anda di Jasapedia</p>
        </div>
      </div>
    </div>
    <div class="carousel-item">
      <img src="<?=base_url()?>assets/images/sliders/3.jpg"/>

      <div class="container">
        <div class="carousel-caption text-end">
          <h1>Beragam kategori jasa</h1>
          <p>Temukan layanan jasa yang Anda butuhkan</p>
          <p><a class="btn btn-lg btn-primary" href="#">Kategori Layanan</a></p>
        </div>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<!-- Section-->
<section class="py-5">
  <div class="container px-4 px-lg-5 mt-5">
    <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
      <div class="col mb-5">
        <div class="card h-100">
          <!-- Product image-->
          <img class="card-img-top" src="<?=base_url()?>assets/dummy/jasa-bersih-toren-air.jpg" alt="..." />
          <!-- Product details-->
          <div class="card-body p-4">
            <div class="text-center">
              <!-- Product name-->
              <h5 class="fw-bolder">Jasa Bersihkan Toren Air</h5>
              <!-- Product reviews-->
              <div class="d-flex justify-content-center small text-warning mb-2">
                <div class="bi-star-fill"></div>
                <div class="bi-star-fill"></div>
                <div class="bi-star-fill"></div>
                <div class="bi-star-fill"></div>
                <div class="bi-star-fill"></div>
              </div>
              <!-- Product price-->
              Rp100k - Rp150k
            </div>
          </div>
          <!-- Product actions-->
          <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
            <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Lihat</a></div>
          </div>
        </div>
      </div>
      <div class="col mb-5">
        <div class="card h-100">
          <!-- Sale badge-->
          <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div>
          <!-- Product image-->
          <img class="card-img-top" src="<?=base_url()?>assets/dummy/jasa-tanaman-002.jpg" alt="..." />
          <!-- Product details-->
          <div class="card-body p-4">
            <div class="text-center">
              <!-- Product name-->
              <h5 class="fw-bolder">Tukang Tanaman</h5>
              <!-- Product reviews-->
              <div class="d-flex justify-content-center small text-warning mb-2">
                <div class="bi-star-fill"></div>
                <div class="bi-star-fill"></div>
                <div class="bi-star-fill"></div>
                <div class="bi-star-fill"></div>
                <div class="bi-star-fill"></div>
              </div>
              <!-- Product price-->
              <span class="text-muted text-decoration-line-through">Rp4,000k</span>
              Rp3,000k
            </div>
          </div>
          <!-- Product actions-->
          <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
            <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Add to cart</a></div>
          </div>
        </div>
      </div>
      <div class="col mb-5">
        <div class="card h-100">
          <!-- Sale badge-->
          <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div>
          <!-- Product image-->
          <img class="card-img-top" src="<?=base_url()?>assets/dummy/service-ac-003.jpg" alt="..." />
          <!-- Product details-->
          <div class="card-body p-4">
            <div class="text-center">
              <!-- Product name-->
              <h5 class="fw-bolder">Service AC</h5>
              <!-- Product price-->
              <span class="text-muted text-decoration-line-through">Rp250k</span>
              Rp200k
            </div>
          </div>
          <!-- Product actions-->
          <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
            <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Add to cart</a></div>
          </div>
        </div>
      </div>
      <div class="col mb-5">
        <div class="card h-100">
          <!-- Product image-->
          <img class="card-img-top" src="<?=base_url()?>assets/dummy/004.jpg" alt="..." />
          <!-- Product details-->
          <div class="card-body p-4">
            <div class="text-center">
              <!-- Product name-->
              <h5 class="fw-bolder">Service Mesin Cuci</h5>
              <!-- Product reviews-->
              <div class="d-flex justify-content-center small text-warning mb-2">
                <div class="bi-star-fill"></div>
                <div class="bi-star-fill"></div>
                <div class="bi-star-fill"></div>
                <div class="bi-star-fill"></div>
                <div class="bi-star-fill"></div>
              </div>
              <!-- Product price-->
              Rp200k
            </div>
          </div>
          <!-- Product actions-->
          <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
            <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Add to cart</a></div>
          </div>
        </div>
      </div>
      <div class="col mb-5">
        <div class="card h-100">
          <!-- Product image-->
          <img class="card-img-top" src="<?=base_url()?>assets/dummy/005.jpg" alt="..." />
          <!-- Product details-->
          <div class="card-body p-4">
            <div class="text-center">
              <!-- Product name-->
              <h5 class="fw-bolder">Renovasi Rumah</h5>
              <!-- Product reviews-->
              <div class="d-flex justify-content-center small text-warning mb-2">
                <div class="bi-star-fill"></div>
                <div class="bi-star-fill"></div>
                <div class="bi-star-fill"></div>
                <div class="bi-star-fill"></div>
                <div class="bi-star-fill"></div>
              </div>
              <!-- Product price-->
              Harga Menyesuaikan
            </div>
          </div>
          <!-- Product actions-->
          <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
            <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Add to cart</a></div>
          </div>
        </div>
      </div>
      <div class="col mb-5">
        <div class="card h-100">
          <!-- Product image-->
          <img class="card-img-top" src="<?=base_url()?>assets/dummy/006.jpg" alt="..." />
          <!-- Product details-->
          <div class="card-body p-4">
            <div class="text-center">
              <!-- Product name-->
              <h5 class="fw-bolder">Renovasi Dapur</h5>
              <!-- Product reviews-->
              <div class="d-flex justify-content-center small text-warning mb-2">
                <div class="bi-star-fill"></div>
                <div class="bi-star-fill"></div>
                <div class="bi-star-fill"></div>
                <div class="bi-star-fill"></div>
                <div class="bi-star-fill"></div>
              </div>
              <!-- Product price-->
              Mulai dari Rp500k
            </div>
          </div>
          <!-- Product actions-->
          <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
            <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Add to cart</a></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>