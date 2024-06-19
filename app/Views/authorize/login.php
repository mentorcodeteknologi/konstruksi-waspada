<!DOCTYPE html>
<html lang="en" dir="ltr" data-bs-theme="light" data-color-theme="Blue_Theme">

<head>
  <!-- Required meta tags -->
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!-- Favicon icon-->
  <link rel="shortcut icon" type="image/png" href="<?= base_url('assets/new_frontend') ?>/images/logos/favicon.png" />

  <!-- Core Css -->
  <link rel="stylesheet" href="<?= base_url('assets/new_frontend') ?>/css/styles.css" />

  <title>Login | TotalStation</title>
</head>

<body>
  <!-- Preloader -->
  <div class="preloader">
    <img src="<?= base_url('assets/new_frontend') ?>/images/logos/favicon.png" alt="loader" class="lds-ripple img-fluid" />
  </div>
  <div id="main-wrapper">
    <div class="position-relative overflow-hidden radial-gradient min-vh-100 w-100">
      <div class="position-relative z-index-5">
        <div class="row">
          <div class="col-xl-7 col-xxl-8">
            <a href="<?= base_url('login') ?>" class="text-nowrap logo-img d-block px-4 py-9 w-100">
              <!-- <img src="<?= base_url('assets/new_frontend') ?>/images/logos/dark-logo.png" class="dark-logo" alt="Logo-Dark" width="40%"/>
              <img src="<?= base_url('assets/new_frontend') ?>/images/logos/light-logo.png" class="light-logo" alt="Logo-light" width="40%"/> -->
            </a>
            <div class="d-none d-xl-flex align-items-center justify-content-center" style="height: calc(100vh - 80px);">
              <img src="<?= base_url('assets/new_frontend') ?>/images/backgrounds/login-security.svg" alt="" class="img-fluid" width="500">
            </div>
          </div>
          <div class="col-xl-5 col-xxl-4">
            <div class="authentication-login min-vh-100 bg-body row justify-content-center align-items-center p-4">
              <div class="col-sm-8 col-md-6 col-xl-9">
                <h2 class="mb-3 fs-7 fw-bolder">Welcome to TotalStation</h2>
                <p class=" mb-9">Login Dashboard</p>
                <?php
                // NOTIFIKASI 
                if (session()->getFlashdata('pesan')) { ?>
                  <div class="alert alert-danger alert-dismissible bg-danger text-white border-0 fade show" role="alert">
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                    <?= session()->getFlashdata('pesan'); ?>
                  </div>
                <?php } ?>
                <?php
                if (session()->getFlashdata('success')) { ?>
                  <div class="alert alert-success alert-dismissible bg-success text-white border-0 fade show" role="alert">
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                    <?= session()->getFlashdata('success'); ?>
                  </div>
                <?php } ?>

                <form action="<?= base_url('login') ?>" method="post">
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="email@admin.com" aria-describedby="emailHelp">
                  </div>
                  <div class="mb-4">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="********" id="exampleInputPassword1">
                  </div>
                  <div class="d-flex align-items-end justify-content-end mb-4">
                    <!-- <div class="form-check">
                      <input class="form-check-input primary" type="checkbox" value="" id="flexCheckChecked" checked>
                      <label class="form-check-label text-dark" for="flexCheckChecked">
                        Remeber this Device
                      </label>
                    </div> -->
                    <a class="text-primary fw-medium" href="">Forgot Password ?</a>
                  </div>
                  <button type="submit" class="btn btn-primary w-100 py-8 mb-4 rounded-2">Sign In</button>
                  <a href="<?= base_url('/') ?>" class="btn btn-outline-primary w-100 py-8 mb-4 rounded-2">Back to Home</a>
                  <div class="d-flex align-items-center justify-content-center">
                    <p class="fs-4 mb-0 fw-medium">New to TotalStation?</p>
                    <a class="text-primary fw-medium ms-2" href="<?= base_url('register') ?>">Create an account</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="dark-transparent sidebartoggler"></div>
  <!-- Import Js Files -->

  <script src="<?= base_url('assets/new_frontend') ?>/libs/jquery/dist/jquery.min.js"></script>
  <script src="<?= base_url('assets/new_frontend') ?>/js/app.min.js"></script>
  <script src="<?= base_url('assets/new_frontend') ?>/js/app.horizontal.init.js"></script>
  <script src="<?= base_url('assets/new_frontend') ?>/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url('assets/new_frontend') ?>/libs/simplebar/dist/simplebar.min.js"></script>

  <script src="<?= base_url('assets/new_frontend') ?>/js/sidebarmenu.js"></script>
  <script src="<?= base_url('assets/new_frontend') ?>/js/theme.js"></script>

</body>

</html>