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
<!--Form Input User Perorangan Blacklist -->
<section class="register-page section-b-space" id="formPerorangan">
    <div class="container">
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <div class="col-lg-12">
                        <h3>Form Input User Perorangan Blacklist</h3>
                        <ul class="nav nav-tabs tab-coupon" id="myTab" role="tablist">
                            <li class="nav-item"><a class="nav-link active show" id="user-tab" data-bs-toggle="tab" href="#user" role="tab" aria-controls="user" aria-selected="true" data-original-title="" title="">List Blacklist</a></li>
                            <li class="nav-item"><a class="nav-link" id="add-user-tabs" data-bs-toggle="tab" href="#add-user" role="tab" aria-controls="add-user" aria-selected="false" data-original-title="" title="">Add User Blacklist</a></li>
                            <li class="nav-item"><a class="nav-link" id="add-user-company-tabs" data-bs-toggle="tab" href="#add-user-company" role="tab" aria-controls="add-user-company" aria-selected="false" data-original-title="" title="">Add Perusahaan Blacklist</a></li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade active show" id="user" role="tabpanel" aria-labelledby="user-tab">
                                <h4>Blacklist Table</h4>
                                <div class="table-responsive table-desi">
                                    <form class="form-inline search-form search-box mb-3">
                                        <div class="form-group">
                                            <input class="form-control-plaintext" type="search" placeholder="Search.." /><span class="d-sm-none mobile-search"><i data-feather="search"></i></span>
                                        </div>
                                    </form>
                                    <table class="all-package coupon-table table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Nama Perusahaan Penyedia Sewa</th>
                                                <th>NIK Terlapor</th>
                                                <th>Nama Terlapor</th>
                                                <th>Jenis Pelanggaran</th>
                                                <th>Merk dan Tipe Alat</th>
                                                <th>No Seri</th>
                                                <th>Durasi Rental</th>
                                                <th>Keterangan</th>
                                                <th>Nominal Kerugian</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php foreach ($list_perusahan_blacklist as $value) : ?>
                                                <tr>
                                                    <td><?= $value['perusahaan'] ?></td>
                                                    <td><?= $value['npwp'] ?></td>
                                                    <td><?= $value['nama'] ?></td>
                                                    <td><?= $value['nama_penanggung_jawab'] ?></td>
                                                    <td><?= $value['valid'] ?></td>
                                                    <td><?= $value['jenis_pelanggaran'] ?></td>
                                                    <td><?= $value['merk'] ?></td>
                                                    <td><?= $value['type_alat'] ?></td>
                                                    <td><?= $value['no_seri'] ?></td>
                                                    <td><?= $value['durasi'] . " Bulan" ?></td>
                                                    <td><?= $value['keterangan'] ?></td>
                                                    <td><?= $value['nominal_kerugian'] ?></td>
                                                </tr>
                                            <?php endforeach ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="add-user" role="tabpanel" aria-labelledby="add-user-tabs">
                                <div class="theme-card">
                                <h3>Form User Blacklist</h3>
                                    <form action="<?= base_url('createUserPeroranganBlacklist') ?>" method="post" class="theme-form" enctype="multipart/form-data">
                                        <?= csrf_field(); ?>
                                        <div class="form-row row">
                                            <!-- Masukkan pesan di sini -->
                                            <div class="col-md-12">
                                                <div id="messageBox" style="text-align: center; background-color: #f8d7da; padding: 20px; margin-bottom: 15px; display: none;">
                                                    <p style="font-size: 18px;">Sebelum anda mengisi form di bawah.</p>
                                                    <p style="font-size: 18px;">Silahkan login jika anda sudah punya akun, jika anda belum memiliki akun silahkan registrasi terlebih dahulu.</p>
                                                    <a href="<?= base_url('login') ?>" class="btn btn-orange">Login</a>
                                                    <a href="<?= base_url('register') ?>" class="btn btn-orange">Register</a>
                                                </div>
                                            </div>
                                        </div>
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
                                                <input type="text" class="form-control" name="no_hp" id="no_hp" placeholder="No HP Terlapor" required="" disabled>
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
                                            <div class="col-md-6">
                                                <label for="review">Nama Perusahaan Penyedia Sewa</label>
                                                <input type="text" class="form-control" id="review" placeholder="Nama Perusahaan Penyedia Sewa" required="" readonly disabled>
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
                                            <!-- Masukkan pesan di sini -->
                                            <div class="col-md-12">
                                                <div id="pesan" style="text-align: center; background-color: #f8d7da; padding: 20px; margin-bottom: 15px; display: none;">
                                                    <p style="font-size: 18px;">Sebelum anda mengisi form di bawah.</p>
                                                    <p style="font-size: 18px;">Silahkan login jika anda sudah punya akun, jika anda belum memiliki akun silahkan registrasi terlebih dahulu.</p>
                                                    <a href="<?= base_url('login') ?>" class="btn btn-orange">Login</a>
                                                    <a href="<?= base_url('register') ?>" class="btn btn-orange">Register</a>
                                                </div>
                                            </div>
                                        </div>
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
                                                <input type="text" class="form-control" name="no_hp" id="no_hp" placeholder="No HP Perusahaan Terlapor" required="">
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
                                            <div class="col-md-6">
                                                <label for="review">Nama Perusahaan Penyedia Sewa</label>
                                                <input type="Nama Perusahaan Penyedia Sewa" class="form-control" id="review" placeholder="Nama Perusahaan Penyedia Sewa" required="" readonly>
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
        </div>
    </div>
</section>
<!--Form Input User Perorangan Blacklist -->

<!--Form Input User Perusahaan Blacklist-->

<!--Form Input User Perusahaan Blacklist-->

<!-- user blacklist table -->
<!-- <div class="container mb-5">
    <div class="card">
        <div class="card-header">
            <form class="form-inline search-form search-box">
                <div class="form-group">
                    <input class="form-control-plaintext" type="search" placeholder="Search.." /><span class="d-sm-none mobile-search"><i data-feather="search"></i></span>
                </div>
            </form>
        </div>

        <div class="card-body">
            <h4>User Blacklist Table</h4>
            <div class="table-responsive table-desi">
                <table class="all-package coupon-table table table-striped">
                    <thead>
                        <tr>
                            <th>
                    <button
                      type="button"
                      class="btn btn-primary add-row delete_all"
                    >
                      Delete
                    </button>
                  </th>
                            <th>Nama Perusahaan Penyedia Sewa</th>
                            <th>NIK Terlapor</th>
                            <th>Nama Terlapor</th>
                            <th>Jenis Pelanggaran</th>
                            <th>Merk dan Tipe Alat</th>
                            <th>No Seri</th>
                            <th>Durasi Rental</th>
                            <th>Keterangan</th>
                            <th>Nominal Kerugian</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($user as $u) : ?>
                            <tr>
                                <td><?= $u['perusahaan'] ?></td>
                                <td><?= $u['nik'] ?></td>
                                <td><?= $u['nama'] ?></td>
                                <td><?= $u['jenis_pelanggaran'] ?></td>
                                <td><?= $u['merk'] ?> <?= $u['type_alat'] ?></td>
                                <td><?= $u['no_seri'] ?></td>
                                <td><?= $u['durasi'] . " Bulan" ?></td>
                                <td><?= $u['keterangan'] ?></td>
                                <td><?= $u['nominal_kerugian'] ?></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div> -->
<!-- user blacklist table-->

<!-- user perusahaan blacklist table -->
<div class="container mb-5">
    <div class="card">
        <div class="card-header">

        </div>

        <div class="card-body">

        </div>
    </div>
</div>
<!-- user perusahaan blacklist table-->

<script>
    // Cek apakah pengguna telah login atau belum
    var logged_in = <?= ($session->get('logged_in') ? 'true' : 'false') ?>;

    // Jika pengguna belum login, tampilkan pesan di dalam form
    if (!logged_in) {
        document.getElementById("messageBox").style.display = "block";
        document.getElementById("pesan").style.display = "block";
    } else {
        // Jika pengguna sudah login, aktifkan elemen formulir
        var inputElements = document.querySelectorAll('#formPerorangan input, #formPerusahaan input, #formPerusahaan select');
        for (var i = 0; i < inputElements.length; i++) {
            inputElements[i].removeAttribute('disabled');
        }

        // Aktifkan tombol submit pada kedua form
        var submitButtons = document.querySelectorAll('#formPerorangan button[type="submit"], #formPerusahaan button[type="submit"]');
        for (var j = 0; j < submitButtons.length; j++) {
            submitButtons[j].removeAttribute('disabled');
        }

        // Aktifkan dropdown jenis pelanggaran pada formulir pertama
        var dropdownJenisPelanggaran = document.getElementById("jenis_pelanggaran");
        dropdownJenisPelanggaran.removeAttribute('disabled');
    }
</script>
<?= $this->endSection(); ?>