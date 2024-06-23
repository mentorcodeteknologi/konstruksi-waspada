<!DOCTYPE html>
<html lang="en" dir="ltr" data-bs-theme="light" data-color-theme="Blue_Theme">

<head>
  <!-- Required meta tags -->
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<!-- Favicon icon-->
<link
  rel="shortcut icon"
  type="image/png"
  href="<?= base_url('assets/new_frontend') ?>/images/logos/favicon.png"
/>

<!-- Core Css -->
<link rel="stylesheet" href="<?= base_url('assets/new_frontend') ?>/css/styles.css" />

  <title>Not Found</title>
</head>

<body>
  <!-- Preloader -->
  <div class="preloader">
    <img src="<?= base_url('assets/new_frontend') ?>/images/logos/favicon.png" alt="loader" class="lds-ripple img-fluid" />
  </div>
  <div id="main-wrapper">
    <div class="position-relative overflow-hidden min-vh-100 w-100 d-flex align-items-center justify-content-center">
      <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">
          <div class="col-lg-4">
            <div class="text-center">
              <img src="<?= base_url('assets/new_frontend') ?>/images/backgrounds/errorimg.svg" alt="" class="img-fluid" width="500">
              <h1 class="fw-semibold mb-7 fs-9">Opps!!!</h1>
              <h4 class="fw-semibold mb-7">This page you are looking for could not be found.</h4>
              <a class="btn btn-primary" onclick="window.history.back();" role="button">Back</a>
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
<script src="<?= base_url('assets/new_frontend') ?>/js/app.init.js"></script>
<script src="<?= base_url('assets/new_frontend') ?>/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('assets/new_frontend') ?>/libs/simplebar/dist/simplebar.min.js"></script>

<script src="<?= base_url('assets/new_frontend') ?>/js/sidebarmenu.js"></script>
<script src="<?= base_url('assets/new_frontend') ?>/js/theme.js"></script>

</body>

</html>