<!-- Header-->
<header class="bg-dark py-5">
  <div class="container px-4 px-lg-5 my-5">
    <div class="text-center text-white">
      <h1 class="display-4 fw-bolder">Masuk/Daftar</h1>
      <p class="lead fw-normal text-white-50 mb-0">Silahkan masuk atau daftar</p>
    </div>
  </div>
</header>
<section class="py-3">
  <div class="container">
    <?php
    if ($this->session->flashdata('code')) {
    ?>
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <div class="alert alert-info alert-dismissible show" role="alert">
          <strong>Alert!</strong> <em><?= $this->session->flashdata('code') . " - " . $this->session->flashdata('message') ?></em>
        </div>
      </div>
    </div>
    <?php
    }
    ?>
    <div class="row">
      <div class="col-md-6">
        <main class="form-signin">
          <form action="<?=base_url()?>auth/doLogin" method="post">
            <span class="fw-normal">Silahkan masuk menggunakan akun Anda</span><br /><br />

            <div class="form-floating">
              <input type="email" class="form-control" name="email_login" id="email_login" placeholder="name@example.com" value="<?= set_value('email_login') ?>">
              <label for="email_login">Email address</label>
              <small class="fieldError text-danger"><?= form_error('email_login') ?></small>
            </div>
            <div class="form-floating">
              <input type="password" class="form-control" name="password_login" id="password_login" placeholder="Password" value="<?= set_value('password_login') ?>">
              <label for="password_login">Password</label>
              <small class="fieldError text-danger"><?= form_error('password_login') ?></small>
            </div>

            <div class="checkbox mb-3">
              <label>
                <input type="checkbox" value="remember-me"> Remember me
              </label>
            </div>
            <input type="hidden" name="url" id="url" value="<?=isset($_GET['url']) ? $_GET['url'] : ''?>" />
            <button class="w-100 btn btn-lg btn-primary" type="submit">Masuk</button>
          </form>
        </main>
      </div>
      <div class="col-md-6">
        <main class="form-signup">
          <form action="<?=base_url()?>auth/doRegister" method="post">
            <span class="fw-normal">Ayo bergabung bersama Jasapedia</span><br /><br />
            <div class="row">
              <div class="col-md-6">
                <div class="form-floating">
                  <input type="text" class="form-control" name="fullname" id="fullname" placeholder="Nama Lengkap" value="<?= set_value('fullname') ?>">
                  <label for="fullname">Nama Lengkap</label>
                  <small class="fieldError text-danger"><?= form_error('fullname') ?></small>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-floating">
                  <input type="date" class="form-control" name="birthdate" id="birthdate" placeholder="Tanggal Lahir">
                  <label for="birthdate">Tanggal Lahir</label>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-floating">
                  <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?= set_value('email') ?>">
                  <label for="email">Email</label>
                  <small class="fieldError text-danger"><?= form_error('email') ?></small>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-floating">
                  <input type="text" class="form-control" name="phone" id="phone" placeholder="No. Handphone" value="<?= set_value('phone') ?>">
                  <label for="phone">No. Handphone</label>
                  <small class="fieldError text-danger"><?= form_error('phone') ?></small>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-floating">
                  <input type="password" class="form-control" id="password" name="password" placeholder="Password" value="<?= set_value('password') ?>">
                  <label for="password">Password</label>
                  <small class="fieldError text-danger"><?= form_error('password') ?></small>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-floating">
                  <input type="password" class="form-control" id="repassword" name="repassword" placeholder="Konfirmasi Password" value="<?= set_value('repassword') ?>">
                  <label for="password">Konfirmasi Password</label>
                  <small class="fieldError text-danger"><?= form_error('repassword') ?></small>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="checkbox mb-3">
                  <label>
                    <input type="checkbox" id="m-agree" name="m-agree" value="tnc"> Syarat & Ketentuan
                  </label>
                  <small class="fieldError text-danger"><?= form_error('m-agree') ?></small>
                </div>
              </div>
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Daftar</button>
          </form>
        </main>
      </div>
    </div>
  </div>
</section>