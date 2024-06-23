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

    <title>Register | TotalStation</title>
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

                                <a href="<?= base_url('register') ?>" class="text-nowrap logo-img text-center d-block mb-5 w-100">
                                    <img src="<?= base_url('assets/new_frontend') ?>/images/logos/light-logo-2.png" class="dark-logo" alt="Logo-Dark" width="30%" />
                                    <img src="<?= base_url('assets/new_frontend') ?>/images/logos/dark-logo.png" class="light-logo" alt="Logo-light" width="30%" />
                                </a>
                                <?php
                                // NOTIFIKASI 
                                if (session()->getFlashdata('pesan')) { ?>
                                    <div class="alert alert-danger alert-dismissible bg-danger text-white border-0 fade show" role="alert">
                                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                                        <?= session()->getFlashdata('pesan'); ?>
                                    </div>
                                <?php } ?>
                                <form action="<?= base_url('/register') ?>" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Email</label>
                                                <input type="email" name="email" required class="form-control" placeholder="contoh@admin.com" id="exampleInputEmail1" aria-describedby="emailHelp">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-4">
                                                <label for="exampleInputPassword1" class="form-label">Password</label>
                                                <input type="password" name="password" required placeholder="***********" class="form-control" id="exampleInputPassword1">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-4">
                                                <label for="exampleInputPassword1" class="form-label">Nama</label>
                                                <input type="text" name="nama" required placeholder="Nama..." class="form-control" id="exampleInputPassword1">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-4">
                                                <label for="exampleInputPassword1" class="form-label">NIK/NPWP</label>
                                                <input type="text" name="id_card" required placeholder="..................." class="form-control" id="exampleInputPassword1">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-4">
                                                <label for="exampleInputPassword1" class="form-label">No. HP (Whatsapp)</label>
                                                <input type="text" name="no_hp" required placeholder="62......." class="form-control" id="exampleInputPassword1">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-4">
                                                <label for="exampleInputPassword1" class="form-label">Alamat</label>
                                                <textarea class="form-control" required name="alamat" id="alamat" cols="20" rows="1" placeholder="Alamat..."></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-4">
                                                <label for="exampleInputPassword1" class="form-label">Nama Perusahaan</label>
                                                <input type="text" name="perusahaan" required placeholder="Nama Perusahaan" class="form-control" id="exampleInputPassword1">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-4">
                                                <label for="exampleInputPassword1" class="form-label">Jabatan</label>
                                                <input type="text" name="jabatan" required placeholder="Jabatan....." class="form-control" id="exampleInputPassword1">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-4">
                                                <label for="exampleInputPassword1" class="form-label">Foto</label>
                                                <input class="form-control" required name="foto" type="file" id="formFile">
                                            </div>
                                        </div>
                                    </div>



                                    <button type="submit" class="btn btn-primary w-100 py-8 mb-4 rounded-2">Sign Up</button>
                                    <div class="d-flex align-items-center">
                                        <p class="fs-4 mb-0 text-dark">Already have an Account?</p>
                                        <a class="text-primary fw-medium ms-2" href="<?= base_url('login') ?>">Sign In</a>
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
    <script src="<?= base_url('assets/new_frontend') ?>/js/app.init.js"></script>
    <script src="<?= base_url('assets/new_frontend') ?>/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('assets/new_frontend') ?>/libs/simplebar/dist/simplebar.min.js"></script>

    <script src="<?= base_url('assets/new_frontend') ?>/js/sidebarmenu.js"></script>
    <script src="<?= base_url('assets/new_frontend') ?>/js/theme.js"></script>

</body>

</html>