<!DOCTYPE html>
<html lang="en" dir="ltr" data-bs-theme="light" data-color-theme="Blue_Theme">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

    <!-- Favicon icon-->
    <link rel="shortcut icon" type="image/png" href="<?= base_url('assets/new_frontend') ?>/images/logos/favicon.png" />

    <!-- Core Css -->
    <link rel="stylesheet" href="<?= base_url('assets/new_frontend') ?>/css/styles.css" />

    <title>OTP | TotalStation</title>
</head>

<body>
    <!-- Preloader -->
    <div class="preloader">
        <img src="<?= base_url('assets/new_frontend') ?>/images/logos/favicon.png" alt="loader" class="lds-ripple img-fluid" />
    </div>
    <div id="main-wrapper">
        <div class="position-relative overflow-hidden radial-gradient min-vh-100 w-100 d-flex align-items-center justify-content-center">
            <div class="d-flex align-items-center justify-content-center w-100">
                <div class="row justify-content-center w-100">
                    <div class="col-md-8 col-lg-10 col-xxl-8">
                        <div class="card mb-0">
                            <div class="card-body">
                                <a href="#" class="text-nowrap logo-img text-center d-block mb-5 w-100">
                                    <img src="<?= base_url('assets/new_frontend') ?>/images/logos/light-logo-2.png" class="dark-logo" alt="Logo-Dark" width="30%" />
                                    <img src="<?= base_url('assets/new_frontend') ?>/images/logos/dark-logo.png" class="light-logo" alt="Logo-light" width="30%" />
                                </a>
                                <?php
                                if (session()->getFlashdata('success')) { ?>
                                    <div class="alert alert-success alert-dismissible bg-success text-white border-0 fade show" role="alert">
                                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                                        <?= session()->getFlashdata('success'); ?>
                                    </div>
                                <?php } ?>
                                <form action="<?= base_url('otp/' . session('encrypt')) ?>" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="kode" class="form-label">OTP Whatsapp<span class="text-danger">*</span></label>
                                                <input type="text" name="kode" required class="form-control" placeholder="OTP" id="kode">
                                                <span class="m-2">Pastikan nomor telah terdaftar <strong>Whatsapp</strong></span>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary w-100 py-8 mb-4 rounded-2">Submit</button>
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
    <script src="<?= base_url('assets/new_frontend') ?>/js/app.init.js"></script>
    <script src="<?= base_url('assets/new_frontend') ?>/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('assets/new_frontend') ?>/libs/simplebar/dist/simplebar.min.js"></script>

    <script src="<?= base_url('assets/new_frontend') ?>/js/sidebarmenu.js"></script>
    <script src="<?= base_url('assets/new_frontend') ?>/js/theme.js"></script>

</body>

</html>