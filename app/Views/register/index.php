<?= $this->extend('layouts_frontend/main_frontend'); ?>

<?= $this->section('breadcrumb'); ?>
<!-- breadcrumb start -->
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="page-title">
                    <h2>create account</h2>
                </div>
            </div>
            <div class="col-sm-6">
                <nav aria-label="breadcrumb" class="theme-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">create account</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb End -->
<!-- flashdata message -->
<?php if (session()->getFlashdata('success')) : ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong><?= session()->getFlashdata('success'); ?></strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>
<!-- flashdata message -->
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<!--section start-->
<section class="register-page section-b-space">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h3>create account</h3>
                <div class="theme-card">
                    <form action="/authregister" method="post" class="theme-form">
                        <?= csrf_field(); ?>
                        <div class="form-row row">
                            <div class="col-md-6">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" required="">
                            </div>
                            <div class="col-md-6">
                                <label for="review">Perusahaan</label>
                                <input type="text" class="form-control" name="perusahaan" id="perusahaan" placeholder="Perusahaan" required="">
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="role" class="form-control" value="user" readonly hidden>
                            </div>
                            <!-- <div class="col-md-6">
                                <label for="review">Jabatan</label>
                                <input type="text" class="form-control" id="jabatan" placeholder="Jabatan" required="">
                            </div> -->
                            <!-- <div class="col-md-6">
                                <label for="review">No.NPWP/KTP</label>
                                <input type="text" class="form-control" id="no_npwp_ktp" placeholder="No.NPWP/KTP" required="">
                            </div>
                            <div class="col-md-6">
                                <label for="review">Alamat</label>
                                <input type="text" class="form-control" id="alamat" placeholder="Alamat" required="">
                            </div>
                            <div class="col-md-6">
                                <label for="review">No Handphone</label>
                                <input type="text" class="form-control" id="no_handphone" placeholder="No Handphone" required="">
                            </div> -->
                        </div>
                        <div class="form-row row">
                            <div class="col-md-6">
                                <label for="email">email</label>
                                <input type="text" class="form-control" name="email" id="email" placeholder="Email" required="">
                            </div>
                            <div class="col-md-6">
                                <label for="review">Password</label>
                                <input type="password" class="form-control" name="password" id="review" placeholder="Enter your password" required="">
                            </div><button type="syubmit" class="btn btn-solid w-auto">create Account</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Section ends-->
<?= $this->endSection(); ?>