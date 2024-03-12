<?= $this->extend('layouts_frontend/main_frontend'); ?>

<?= $this->section('breadcrumb'); ?>
<?php
// SESSION UNTUK MENGAMBIL DATA SESSION
$session = session();
?>

<!-- breadcrumb start -->
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="page-title">
                    <h2>Alat Hilang</h2>
                </div>
            </div>
            <div class="col-sm-6">
                <nav aria-label="breadcrumb" class="theme-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url('/') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Alat Hilang</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb End -->
<?= $this->endSection(); ?>
<?php

// NOTIFIKASI BERHASIL SIMPAN DATA
if (session()->getFlashdata('pesan')) {
    echo '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' . session()->getFlashdata('pesan') . '</div>';
}
?>

<?= $this->section('content'); ?>
<section class="register-page section-b-space bg-white" id="formPerorangan">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- <h3>Alat Hilang</h3> -->
                <!-- Pesan untuk menampilkan sebelum login -->
                <div id="messageBox" style="text-align: center; background-color: #f8d7da; padding: 20px; margin-bottom: 15px;">
                    <p style="font-size: 14px;">Sebelum Anda mengisi form di bawah, silakan login jika Anda sudah punya akun. Jika Anda belum memiliki akun, silakan registrasi terlebih dahulu.</p>
                    <a style="font-size: 12px;" href="<?= base_url('login') ?>" class="btn btn-orange">Login</a>
                    <a style="font-size: 12px;" href="<?= base_url('register') ?>" class="btn btn-orange">Register</a>
                </div>
                <!-- Pesan untuk menampilkan sebelum login -->
                <ul class="nav nav-tabs tab-coupon" id="myTab" role="tablist">
                    <li class="nav-item"><a class="nav-link active show" id="alathilang-tab" data-bs-toggle="tab" href="#alathilang" role="tab" aria-controls="alathilang" aria-selected="true" data-original-title="" title="">List Alat Hilang</a></li>

                    <?php if ($session->get('logged_in')) : ?>
                    <li class="nav-item"><a class="nav-link" id="add-alathilang-tabs" data-bs-toggle="tab" href="#add-alathilang" role="tab" aria-controls="add-alathilang" aria-selected="false" data-original-title="" title="">Add Alat Hilang</a></li>
                    <?php endif; ?>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade active show" id="alathilang" role="tabpanel" aria-labelledby="alathilang-tab">
                        <!-- <h4>Alat Hilang Table</h4> -->
                        <?php if ($session->get('logged_in')) : ?>
                            <div class="table-responsive table-desi">
                                <form class="form-inline search-form search-box mb-3">
                                    <div class="form-group">
                                        <input class="form-control-plaintext" type="search" placeholder="Search.." /><span class="d-sm-none mobile-search"><i data-feather="search"></i></span>
                                    </div>
                                </form>
                                <table class="all-package coupon-table table table-striped">
                                    <thead>
                                        <tr>
                                            <th style="font-size: 12px;">PEMILIK ALAT</th>
                                            <th style="font-size: 12px;">NO HP</th>
                                            <th style="font-size: 12px;">TYPE ALAT DAN MERK</th>
                                            <th style="font-size: 12px;">SERIAL NUMBER</th>
                                            <th style="font-size: 12px;">TANGGAL KEHILANGAN</th>
                                            <th style="font-size: 12px;">LOKASI KEHILANGAN</th>
                                            <th style="font-size: 12px;">KRONOLOGIS KEJADIAN</th>
                                            <th style="font-size: 12px;">STATUS KEPEMILIKAN</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        foreach ($list_alat_hilang as $value) { ?>
                                            <tr>
                                                <td style="font-size: 12px;"><?= $value['nama'] ?></td>
                                                <td style="font-size: 12px;"><?= $value['no_hp'] ?></td>
                                                <td style="font-size: 12px;"><?= $value['type_alat'] ?> <?= $value['merk'] ?></td>
                                                <td style="font-size: 12px;"><?= $value['serial_number'] ?></td>
                                                <td style="font-size: 12px;"><?= $value['tanggal_kehilangan'] ?></td>
                                                <td style="font-size: 12px;"><?= $value['lokasi_kehilangan'] ?></td>
                                                <td style="font-size: 12px;"><?= $value['kronologi'] ?></td>
                                                <td style="font-size: 12px;"><?php
                                                                                if ($value['valid'] == null) {
                                                                                    echo "Menunggu Validasi";
                                                                                } else if ($value['valid'] == 0) {
                                                                                    echo "Tidak Valid";
                                                                                } else {
                                                                                    echo "Valid";
                                                                                }
                                                                                ?></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="tab-pane fade" id="add-alathilang" role="tabpanel" aria-labelledby="add-alathilang-tabs">
                        <div class="theme-card">
                            <h3>Form Kehilangan Alat</h3>
                            <form action="<?= base_url('alat_hilang/createAlatHilang') ?>" method="post" class="theme-form" enctype="multipart/form-data">
                                <?= csrf_field(); ?>
                                <div class="form-row row">
                                    <div class="col-md-6">
                                        <label for="review">Type Alat</label>
                                        <input type="text" name="type_alat" id="type_alat" class="form-control" placeholder="Type Alat" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="review">Merk</label>
                                        <input type="text" name="merk" id="merk" class="form-control" placeholder="Merk" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="review">Serial Number</label>
                                        <input type="text" name="serial_number" id="serial_number" class="form-control" placeholder="Serial Number" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="review">Upload Foto Alat</label>
                                        <input type="file" class="form-control" name="foto" id="foto" placeholder="Upload Foto Alat" required="">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="review">Pembelian Dari</label>
                                        <input type="text" class="form-control" name="pembelian_dari" id="pembelian_dari" placeholder="Pembelian Dari" required="">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="review">Tanggal Kehilangan</label>
                                        <input type="date" class="form-control" name="tanggal_kehilangan" id="tanggal_kehilangan" placeholder="Tanggal Kehilangan" required="">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="review">Upload Surat Kepemilikan/Kwetansi</label>
                                        <input type="file" class="form-control" name="surat_kepemilikian" id="surat_kepemilikian" placeholder="Upload Surat Kepemilikan/Kwetansi" required="">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="review">Lokasi Kehilangan</label>
                                        <input type="text" name="lokasi_kehilangan" id="lokasi_kehilangan" class="form-control" placeholder="Lokasi Kehilangan" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="review">Nominal Kerugian (Rp.)</label>
                                        <input type="number" class="form-control" name="nominal_kerugian" id="nominal_kerugian" placeholder="Nominal kerugian" required="">
                                    </div>
                                    <div class="col-md-12">
                                        <label for="review">Kronologis Kejadian </label>
                                        <textarea name="kronologi" id="kronologi" cols="30" rows="10" class="form-control"></textarea>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-solid w-auto mt-3">Add</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    // Cek apakah pengguna telah login atau belum
    var logged_in = <?= ($session->get('logged_in') ? 'true' : 'false') ?>;

    // Fungsi untuk menampilkan atau menyembunyikan pesan
    function toggleMessageBox() {
        var messageBox = document.getElementById('messageBox');
        messageBox.style.display = logged_in ? 'none' : 'block';
    }

    // Fungsi untuk menonaktifkan elemen formulir
    function disableFormElements(formId) {
        var form = document.getElementById(formId);
        var inputElements = form.querySelectorAll('input, select, textarea');
        for (var i = 0; i < inputElements.length; i++) {
            inputElements[i].setAttribute('disabled', 'true');
        }

        var submitButtons = form.querySelectorAll('button[type="submit"]');
        for (var j = 0; j < submitButtons.length; j++) {
            submitButtons[j].setAttribute('disabled', 'true');
        }
    }

    // Fungsi untuk mengaktifkan elemen formulir
    function enableFormElements(formId) {
        var form = document.getElementById(formId);
        var inputElements = form.querySelectorAll('input, select, textarea');
        for (var i = 0; i < inputElements.length; i++) {
            inputElements[i].removeAttribute('disabled');
        }

        var submitButtons = form.querySelectorAll('button[type="submit"]');
        for (var j = 0; j < submitButtons.length; j++) {
            submitButtons[j].removeAttribute('disabled');
        }
    }

    // Memeriksa status login saat memuat halaman
    toggleMessageBox();
    if (!logged_in) {
        disableFormElements('formPerorangan');
        disableFormElements('formPerusahaan');
    } else {
        enableFormElements('formPerorangan');
        enableFormElements('formPerusahaan');
    }
</script>
<?= $this->endSection(); ?>