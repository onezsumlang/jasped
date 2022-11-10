<!-- Header-->
<header class="bg-dark py-5">
  <div class="container px-4 px-lg-5 my-5">
    <div class="text-center text-white">
      <h1 class="display-4 fw-bolder">Otentikasi</h1>
      <p class="lead fw-normal text-white-50 mb-0">Silahkan login atau daftar</p>
    </div>
  </div>
</header>
<section class="py-3">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <main class="form-signin">
          <form action="<?=base_url()?>auth/doLogin" method="post">
            <span class="fw-normal">Silahkan masuk menggunakan akun Anda</span><br /><br />

            <div class="form-floating">
              <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com">
              <label for="email">Email address</label>
            </div>
            <div class="form-floating">
              <input type="password" class="form-control" name="password" id="password" placeholder="Password">
              <label for="password">Password</label>
            </div>

            <div class="checkbox mb-3">
              <label>
                <input type="checkbox" value="remember-me"> Remember me
              </label>
            </div>
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
                  <input type="text" class="form-control" name="fullname" id="fullname" placeholder="Nama Lengkap">
                  <label for="fullname">Nama Lengkap</label>
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
                  <input type="text" class="form-control" name="email" id="email" placeholder="Nama Lengkap">
                  <label for="email">Email</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-floating">
                  <input type="text" class="form-control" name="phone" id="phone" placeholder="Tanggal Lahir">
                  <label for="phone">No. Handphone</label>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-floating">
                  <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                  <label for="password">Password</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-floating">
                  <input type="password" class="form-control" id="rePassword" name="rePassword" placeholder="Konfirmasi Password">
                  <label for="password">Konfirmasi Password</label>
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