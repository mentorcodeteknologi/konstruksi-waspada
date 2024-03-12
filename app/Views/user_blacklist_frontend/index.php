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
                    <h2>User Blacklist</h2>
                </div>
            </div>
            <div class="col-sm-6">
                <nav aria-label="breadcrumb" class="theme-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url('/') ?>">Home</a></li>
                        <li class="breadcrumb-item active">User Blacklist</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb End -->
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<?php

// NOTIFIKASI BERHASIL SIMPAN DATA
if (session()->getFlashdata('pesan')) {
    echo '<div class="alert alert-success alert-dismissible">
                    ' . session()->getFlashdata('pesan') . '</div>';
}
?>
<!--Form Input User Perorangan Blacklist -->
<section class="register-page section-b-space bg-white" id="formPerorangan">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- <h3>User Blacklist</h3> -->
                <!-- Pesan untuk menampilkan sebelum login -->
                <div id="messageBox" style="text-align: center; background-color: #f8d7da; padding: 20px; margin-bottom: 15px;">
                    <p style="font-size: 14px;">Sebelum Anda mengisi form di bawah, silakan login jika Anda sudah punya akun. Jika Anda belum memiliki akun, silakan registrasi terlebih dahulu.</p>
                    <a style="font-size: 12px;" href="<?= base_url('login') ?>" class="btn btn-orange">Login</a>
                    <a style="font-size: 12px;" href="<?= base_url('register') ?>" class="btn btn-orange">Register</a>
                </div>
                <!-- Pesan untuk menampilkan sebelum login -->
                <ul class="nav nav-tabs tab-coupon" id="myTab" role="tablist">
                    <li class="nav-item"><a class="nav-link active show" id="user-tab" data-bs-toggle="tab" href="#user" role="tab" aria-controls="user" aria-selected="true" data-original-title="" title="">List Blacklist</a></li>
                    <?php if ($session->get('logged_in')) : ?>
                    <li class="nav-item"><a class="nav-link" id="add-user-tabs" data-bs-toggle="tab" href="#add-user" role="tab" aria-controls="add-user" aria-selected="false" data-original-title="" title="">Add User Blacklist</a></li>
                    <li class="nav-item"><a class="nav-link" id="add-user-company-tabs" data-bs-toggle="tab" href="#add-user-company" role="tab" aria-controls="add-user-company" aria-selected="false" data-original-title="" title="">Add Perusahaan Blacklist</a></li>
                    <?php endif; ?>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade active show" id="user" role="tabpanel" aria-labelledby="user-tab">
                        <!-- <h4>Blacklist Table</h4> -->
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
                                            <th style="font-size: 12px;">Nama Perusahaan Penyedia Sewa</th>
                                            <th style="font-size: 12px;">NIK Terlapor</th>
                                            <th style="font-size: 12px;">Nama Terlapor</th>
                                            <th style="font-size: 12px;">Jenis Pelanggaran</th>
                                            <th style="font-size: 12px;">Merk dan Tipe Alat</th>
                                            <th style="font-size: 12px;">No Seri</th>
                                            <th style="font-size: 12px;">Durasi Rental</th>
                                            <th style="font-size: 12px;">Keterangan</th>
                                            <th style="font-size: 12px;">Nominal Kerugian</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php foreach ($list_user_blacklist as $value) : ?>
                                            <tr>
                                                <td style="font-size: 12px;"><?= $value['perusahaan'] ?></td>
                                                <td style="font-size: 12px;"><?= $value['nik'] ?></td>
                                                <td style="font-size: 12px;"><?= $value['nama'] ?></td>
                                                <td style="font-size: 12px;"><?= $value['jenis_pelanggaran'] ?></td>
                                                <td style="font-size: 12px;"><?= $value['merk'] ?> <?= $value['type_alat'] ?></td>
                                                <td style="font-size: 12px;"><?= $value['no_seri'] ?></td>
                                                <td style="font-size: 12px;"><?= $value['durasi'] . " Bulan" ?></td>
                                                <td style="font-size: 12px;"><?= $value['keterangan'] ?></td>
                                                <td style="font-size: 12px;"> Rp. <?= number_format($value['nominal_kerugian'])  ?></td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="tab-pane fade" id="add-user" role="tabpanel" aria-labelledby="add-user-tabs">
                        <div class="theme-card">
                            <h3>Form User Blacklist</h3>
                            <form action="<?= base_url('createUserPeroranganBlacklist') ?>" method="post" class="theme-form" enctype="multipart/form-data">
                                <?= csrf_field(); ?>
                                <div class="form-row row">
                                    <div class="col-md-6">
                                        <label for="review">NIK Terlapor</label>
                                        <input type="text" class="form-control" name="nik" id="nik" placeholder="NIK Terlapor" required="" disabled>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="review">Nama Terlapor</label>
                                        <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Terlapor" required="" disabled>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="review">Upload KTP Terlapor</label>
                                        <input type="file" class="form-control" name="foto_ktp" id="foto_ktp" placeholder="Upload KTP Terlapor" required="" disabled>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="review">No HP Terlapor</label>
                                        <input type="text" class="form-control" name="no_hp" id="no_hp" value="62" placeholder="No HP Terlapor" required="" disabled>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="review">Merk</label>
                                        <input type="text" class="form-control" name="merk" id="merk" placeholder="Merk" required="" disabled>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="review">Tipe Alat</label>
                                        <input type="text" class="form-control" name="type_alat" id="type_alat" placeholder="Tipe Alat" required="" disabled>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="review">No Seri</label>
                                        <input type="text" class="form-control" name="no_seri" id="no_seri" placeholder="No Seri" required="" disabled>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="review">Upload Bukti Surat Perjanjian</label>
                                        <input type="file" class="form-control" name="surat_perjanjian" id="surat_perjanjian" placeholder="Upload Bukti Surat Perjanjian" required="" disabled>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="review">Foto Alat</label>
                                        <input type="file" class="form-control" name="foto_alat" id="foto_alat" placeholder="Foto Alat" required="" disabled>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="review">Foto Serah Terima Alat</label>
                                        <input type="file" class="form-control" name="foto_serah_terima_alat" id="foto_serah_terima_alat" placeholder="Foto Serah Terima Alat" required="" disabled>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="jenis_pelanggaran">Jenis Pelanggaran</label>
                                        <select name="jenis_pelanggaran" id="jenis_pelanggaran" class="form-control" required="" disabled>
                                            <option value=''>Pilih Jenis Pelanggaran</option>
                                            <option value='Menggelapkan Alat'>Menggelapkan Alat</option>
                                            <option value='Tidak Membayar Sewa'>Tidak Membayar Sewa</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="mulai_rental">Mulai Rental</label>
                                        <input type="date" class="form-control" name="mulai_rental" id="mulai_rental" placeholder="Mulai Rental" required="" disabled>
                                    </div>
                                </div>
                                <div class="form-row row">
                                    <div class="col-md-6">
                                        <label for="akhir_rental">Akhir Rental</label>
                                        <input type="date" class="form-control" name="akhir_rental" id="akhir_rental" placeholder="Akhir Rental" required="" disabled>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="bukti_lainnya">Upload Bukti Lainnya</label>
                                        <input type="file" class="form-control" name="bukti_lainnya" id="bukti_lainnya" placeholder="Upload Bukti Lainnya" required="" disabled>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="nominal_kerugian">Nominal Kerugian</label>
                                        <input type="text" class="form-control" name="nominal_kerugian" id="nominal_kerugian" placeholder="Nominal Kerugian" required="" disabled>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="keterangan">Keterangan</label>
                                        <input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Keterangan" required="" disabled>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-solid w-auto" disabled>Add</button>
                            </form>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="add-user-company" role="tabpanel" aria-labelledby="add-user-company-tabs">
                        <div class="theme-card">
                            <h3>Form Perusahaan Blacklist</h3>
                            <form action="<?= base_url('createUserPerusahaanBlacklist') ?>" method="post" class="theme-form" enctype="multipart/form-data">
                                <?= csrf_field(); ?>
                                <div class="form-row row">
                                    <div class="col-md-6">
                                        <label for="email">NPWP Perusahaan Terlapor</label>
                                        <input type="text" class="form-control" name="npwp" id="npwp" placeholder="NPWP Perusahaan Terlapor" required="">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="review">Nama Perusahaan Terlapor</label>
                                        <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Perusahaan Terlapor" required="">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="review">Upload NPWP Perusahaan Terlapor</label>
                                        <input type="file" class="form-control" name="foto_npwp" id="foto_npwp" placeholder="Upload NPWP Perusahaan Terlapor" required="">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="review">Nama Penanggung Jawab Terlapor</label>
                                        <input type="text" class="form-control" name="nama_penanggung_jawab" id="nama_penanggung_jawab" placeholder="Nama Penanggung Jawab Terlapor" required="">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="review">No HP Perusahaan Terlapor</label>
                                        <input type="text" class="form-control" name="no_hp" id="no_hp" value="62" placeholder="No HP Perusahaan Terlapor" required="">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="review">Merk</label>
                                        <input type="text" class="form-control" name="merk" id="merk" placeholder="Merek" required="">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="review">Tipe Alat</label>
                                        <input type="text" class="form-control" name="type_alat" id="type_alat" placeholder="Tipe Alat" required="">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="review">No Seri</label>
                                        <input type="text" class="form-control" name="no_seri" id="no_seri" placeholder="No Seri" required="">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="review">Upload Bukti Surat Perjanjian</label>
                                        <input type="file" class="form-control" name="surat_perjanjian" id="surat_perjanjian" placeholder="Upload Bukti Surat Perjanjian" required="">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="review">Foto Alat</label>
                                        <input type="file" class="form-control" name="foto_alat" id="foto_alat" placeholder="Foto Alat" required="">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="review">Foto Serah Terima Alat</label>
                                        <input type="file" class="form-control" name="foto_serah_terima_alat" id="foto_serah_terima_alat" placeholder="Foto Serah Terima Alat" required="">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Jenis Pelanggaran</label>
                                        <Select name="jenis_pelanggaran" id="jenis_pelanggaran" class="form-control" required>
                                            <option value=''>Pilih Jenis Pelanggaran</option>
                                            <option value='Menggelapkan Alat'>Menggelapkan Alat</option>
                                            <option value='Tidak Membayar Sewa'>Tidak Membayar Sewa</option>
                                        </Select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="review">Mulai Rental</label>
                                        <input type="date" class="form-control" name="mulai_rental" id="mulai_rental" placeholder="Mulai Rental" required="">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="review">Akhir Rental</label>
                                        <input type="date" class="form-control" name="akhir_rental" id="akhir_rental" placeholder="Akhir Rental" required="">
                                    </div>
                                </div>
                                <div class="form-row row">
                                    <div class="col-md-6">
                                        <label for="review">Upload Bukti Lainnya</label>
                                        <input type="file" class="form-control" name="bukti_lainnya" id="bukti_lainnya" placeholder="Upload Bukti Lainnya" required="">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="review">Nominal Kerugian</label>
                                        <input type="nominal_kerugian" class="form-control" name="nominal_kerugian" id="nominal_kerugian" placeholder="Nominal Kerugian" required="">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="review">Keterangan</label>
                                        <input type="keterangan" class="form-control" name="keterangan" id="keterangan" placeholder="Keterangan" required="">
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-solid w-auto">Add</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<!--Form Input User Perorangan Blacklist -->


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