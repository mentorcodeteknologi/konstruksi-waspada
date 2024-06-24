<?= $this->extend('new_ui_frontend/layouts_new/main'); ?>
<?= $this->section('content'); ?>
<?php
// SESSION UNTUK MENGAMBIL DATA SESSION
$session = session();
?>

<div class="container-fluid">
    <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold mb-8">User Blacklist</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a class="text-muted text-decoration-none" href="<?= base_url("/"); ?>">Home</a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page">User Blacklist</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-3">
                    <div class="text-center mb-n5">
                        <img src="<?= base_url('assets/new_frontend') ?>/images/breadcrumb/ChatBc.png" alt="" class="img-fluid mb-n4" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php

    // NOTIFIKASI BERHASIL SIMPAN DATA
    if (session()->getFlashdata('pesan')) {
        echo '<div class="alert alert-success alert-dismissible">
                    ' . session()->getFlashdata('pesan') . '</div>';
    }
    ?>

    <div class="col-md-12">
        <!-- ---------------------start Tab with dropdown ---------------- -->
        <div class="card">
            <div class="card-body">
                <div class="mb-3">
                    <?php if (!$session->get('logged_in')) : ?>
                        <h6 class="mb-0">Sebelum anda mengisi form di bawah, silakan login jika anda sudah punya akun. Jika Anda belum memiliki akun, silakan registrasi terlebih dahulu.</h6>
                    <?php endif; ?>
                </div>
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="user-tab" data-bs-toggle="tab" href="#user" role="tab" aria-controls="user" aria-expanded="true">
                            <span>List user blacklist</span>
                        </a>
                    </li>
                    <?php if ($session->get('logged_in')) : ?>
                        <li class="nav-item">
                            <a class="nav-link" id="addUser-tab" data-bs-toggle="tab" href="#addUser" role="tab" aria-controls="addUser">
                                <span>Add user blacklist</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="addPerusahaan-tab" data-bs-toggle="tab" href="#addPerusahaan" role="tab" aria-controls="addPerusahaan">
                                <span>Add perusahaan blacklist</span>
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
                <div class="tab-content tabcontent-border p-3" id="myTabContent">
                    <?php if ($session->get('logged_in')) : ?>
                        <div role="tabpanel" class="tab-pane fade show active" id="user" aria-labelledby="user-tab">
                            <div class="row">
                                <?php foreach ($list_user_blacklist as $value) : ?>
                                    <div class="col-md-4">
                                        <div class="card hover-img">
                                            <div class="card-body p-4 text-center border-bottom">
                                                <img src="<?= base_url('assets/new_frontend') ?>/images/profile/user-1.jpg" alt="" class="rounded-circle mb-3" width="80" height="80">
                                                <h5 class="fw-semibold mb-0 fs-5">Nama Terlapor : <?= $value['nama'] ?></h5>
                                                <span class="text-dark fs-2">NIK terlapor : <?= $value['nik'] ?></span>
                                            </div>
                                            <ul class="px-2 py-2 list-unstyled d-flex align-items-center justify-content-center mb-0">
                                                <button class="btn bg-primary-subtle text-primary mb-3 w-50" data-bs-toggle="modal" data-bs-target="#with-grid-modal<?= $value['slug'] ?>">Detail</button>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="modal fade" id="with-grid-modal<?= $value['slug'] ?>" tabindex="-1" aria-labelledby="scroll-long-inner-modal" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable">
                                            <div class="modal-content">
                                                <div class="modal-header d-flex align-items-center">
                                                    <h4 class="modal-title" id="myLargeModalLabel">
                                                        Detail
                                                    </h4>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="container-fluid">
                                                        <div class="card-body p-4 text-center">
                                                            <img src="<?= base_url('assets/new_frontend') ?>/images/profile/user-1.jpg" alt="" class="rounded-circle mb-3" width="80" height="80">
                                                            <div class="row m-3 text-start">
                                                                <div class="col">
                                                                    Nama Terlapor : <?= $value['nama'] ?>
                                                                </div>
                                                            </div>
                                                            <div class="row m-3 text-start">
                                                                <div class="col">
                                                                    NIK terlapor : <?= $value['nik'] ?>
                                                                </div>
                                                            </div>
                                                            <div class="row m-3 text-start">
                                                                <div class="col">
                                                                    Nama Perusahaan Penyedia Sewa : <?= $value['perusahaan'] ?>
                                                                </div>
                                                            </div>
                                                            <div class="row m-3 text-start">
                                                                <div class="col">
                                                                    Jenis Pelanggaran : <?= $value['jenis_pelanggaran'] ?>
                                                                </div>
                                                            </div>
                                                            <div class="row m-3 text-start">
                                                                <div class="col">
                                                                    Merk dan Tipe Alat : <?= $value['merk'] ?> - <?= $value['type_alat'] ?>
                                                                </div>
                                                            </div>
                                                            <div class="row m-3 text-start">
                                                                <div class="col">
                                                                    No Seri : <?= $value['no_seri'] ?>
                                                                </div>
                                                            </div>
                                                            <div class="row m-3 text-start">
                                                                <div class="col">
                                                                    Durasi Rental : <?= $value['durasi'] . " Bulan" ?>
                                                                </div>
                                                            </div>
                                                            <div class="row m-3 text-start">
                                                                <div class="col">
                                                                    Keterangan : <?= $value['keterangan'] ?>
                                                                </div>
                                                            </div>
                                                            <div class="row m-3 text-start">
                                                                <div class="col">
                                                                    Nominal Kerugian : Rp. <?= number_format($value['nominal_kerugian'])  ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn bg-danger-subtle text-danger font-medium waves-effect text-start" data-bs-dismiss="modal">
                                                        Close
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- sample modal content -->
                                <?php endforeach ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="tab-pane fade" id="addUser" role="tabpanel" aria-labelledby="addUser-tab">
                        <div class="row">
                            <div class="col-12">
                                <!-- --------------------- start Grid With Row Label ---------------- -->
                                <?= $this->include("new_ui_frontend/user_blacklist_frontend_new/addUser"); ?>
                                <!-- --------------------- end Grid With Row Label---------------- -->
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="addPerusahaan" role="tabpanel" aria-labelledby="addPerusahaan-tab">
                        <div class="row">
                            <div class="col-12">
                                <!-- --------------------- start Grid With Row Label ---------------- -->
                                <?= $this->include("new_ui_frontend/user_blacklist_frontend_new/addPerusahaan"); ?>
                                <!-- --------------------- end Grid With Row Label---------------- -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- --------------------- end Tab with dropdown---------------- -->
    </div>
</div>


<?= $this->endSection(); ?>