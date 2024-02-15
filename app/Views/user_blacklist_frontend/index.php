<?= $this->extend('layouts_frontend/main_frontend'); ?>

<?= $this->section('breadcrumb'); ?>
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
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
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
<!--section start-->
<section class="register-page section-b-space">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h3>Form Input User Perorangan Blacklist</h3>
                <div class="theme-card">
                    <form action="" method="post" class="theme-form">
                        <?= csrf_field(); ?>
                        <div class="form-row row">
                            <div class="col-md-6">
                                <label for="review">NIK Terlapor</label>
                                <input type="text" class="form-control" name="nik" id="nik" placeholder="NIK Terlapor" required="">
                            </div>
                            <div class="col-md-6">
                                <label for="review">Nama Terlapor</label>
                                <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Terlapor" required="">
                            </div>
                            <div class="col-md-6">
                                <label for="review">Upload KTP Terlapor</label>
                                <input type="file" class="form-control" name="foto_ktp" id="foto_ktp" placeholder="Upload KTP Terlapor" required="">
                            </div>
                            <div class="col-md-6">
                                <label for="review">No HP Terlapor</label>
                                <input type="text" class="form-control" name="no_hp" id="no_hp" placeholder="No HP Terlapor" required="">
                            </div>
                            <div class="col-md-6">
                                <label for="review">Merek</label>
                                <input type="text" class="form-control" name="merek" id="merek" placeholder="Merek" required="">
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
                                <label for="review">Jenis Pelanggaran</label>
                                <input type="text" class="form-control" name="jenis_pelanggaran" id="jenis_pelanggaran" placeholder="Jenis Pelanggaran" required="">
                            </div>
                        </div>
                        <div class="form-row row">
                            <div class="col-md-6">
                                <label for="review">Mulai Rental</label>
                                <input type="date" class="form-control" name="mulai_rental" id="mulai_rental" placeholder="Mulai Rental" required="">
                            </div>
                            <div class="col-md-6">
                                <label for="review">Akhir Rental</label>
                                <input type="date" class="form-control" name="akhir_rental" id="akhir_rental" placeholder="Akhir Rental" required="">
                            </div>
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
                                <input type="keterangan" class="form-control" id="review" placeholder="Keterangan" required="">
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
</section>
<!--Section ends-->

<!--section start-->
<section class="register-page section-b-space">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h3>Form Input User Perusahaan Blacklist</h3>
                <div class="theme-card">
                    <form class="theme-form">
                        <div class="form-row row">
                            <div class="col-md-6">
                                <label for="email">NPWP Perusahaan Terlapor</label>
                                <input type="text" class="form-control" id="npwp_perusahaan_terlapor" placeholder="NPWP Perusahaan Terlapor" required="">
                            </div>
                            <div class="col-md-6">
                                <label for="review">Nama Perusahaan Terlapor</label>
                                <input type="text" class="form-control" id="nama_perusahaan_terlapor" placeholder="Nama Perusahaan Terlapor" required="">
                            </div>
                            <div class="col-md-6">
                                <label for="review">Upload NPWP Perusahaan Terlapor</label>
                                <input type="file" class="form-control" id="upload_npwp_perusahaan_terlapor" placeholder="Upload NPWP Perusahaan Terlapor" required="">
                            </div>
                            <div class="col-md-6">
                                <label for="review">Nama Penanggung Jawab Terlapor</label>
                                <input type="text" class="form-control" id="nama_penanggung_jawab_terlapor" placeholder="Nama Penanggung Jawab Terlapor" required="">
                            </div>
                            <div class="col-md-6">
                                <label for="review">No HP Perusahaan Terlapor</label>
                                <input type="text" class="form-control" id="no_hp_perusahaan_terlapor" placeholder="No HP Perusahaan Terlapor" required="">
                            </div>
                            <div class="col-md-6">
                                <label for="review">Merk dan Tipe Alat</label>
                                <input type="text" class="form-control" id="merk_dan_tipe_alat" placeholder="Merk dan Tipe Alat" required="">
                            </div>
                            <div class="col-md-6">
                                <label for="review">No Seri</label>
                                <input type="text" class="form-control" id="no_seri" placeholder="No Seri" required="">
                            </div>
                            <div class="col-md-6">
                                <label for="review">Upload Bukti Surat Perjanjian</label>
                                <input type="file" class="form-control" id="upload_bukti_surat_perjanjian" placeholder="Upload Bukti Surat Perjanjian" required="">
                            </div>
                            <div class="col-md-6">
                                <label for="review">Foto Alat</label>
                                <input type="file" class="form-control" id="foto_alat" placeholder="Foto Alat" required="">
                            </div>
                            <div class="col-md-6">
                                <label for="review">Foto Serah Terima Alat</label>
                                <input type="file" class="form-control" id="foto_serah_terima_alat" placeholder="Foto Serah Terima Alat" required="">
                            </div>
                            <div class="col-md-6">
                                <label for="review">Jenis Pelanggaran</label>
                                <input type="text" class="form-control" id="jenis_pelanggaran" placeholder="Jenis Pelanggaran" required="">
                            </div>
                            <div class="col-md-6">
                                <label for="review">Durasi Rental</label>
                                <input type="date" class="form-control" id="durasi_rental" placeholder="Durasi Rental" required="">
                            </div>
                        </div>
                        <div class="form-row row">

                            <div class="col-md-6">
                                <label for="review">Upload Bukti Lainnya</label>
                                <input type="file" class="form-control" id="upload_bukti_lainnya" placeholder="Upload Bukti Lainnya" required="">
                            </div>
                            <div class="col-md-6">
                                <label for="review">Nominal Kerugian</label>
                                <input type="nominal_kerugian" class="form-control" id="review" placeholder="Nominal Kerugian" required="">
                            </div>
                            <div class="col-md-6">
                                <label for="review">Keterangan</label>
                                <input type="keterangan" class="form-control" id="review" placeholder="Keterangan" required="">
                            </div>
                            <div class="col-md-6">
                                <label for="review">Nama Perusahaan Penyedia Sewa</label>
                                <input type="Nama Perusahaan Penyedia Sewa" class="form-control" id="review" placeholder="Nama Perusahaan Penyedia Sewa" required="" readonly>
                            </div>
                        </div>
                        <a href="#" class="btn btn-solid w-auto">Add</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="container mb-5">
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
                            <!-- <th>
                    <button
                      type="button"
                      class="btn btn-primary add-row delete_all"
                    >
                      Delete
                    </button>
                  </th> -->
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
                        <tr>
                            <td>PT TUJUH PILAR TEKNIK</td>
                            <td>2284555485555550</td>
                            <td>ZEZEN ZEAENAL</td>
                            <td>TIDAK MEMBAYAR SEWA</td>
                            <td>Total station sokkia im 52</td>
                            <td>BG5512</td>
                            <td>4 bulan</td>
                            <td>Menunggak kurang lebih 5 bulan</td>
                            <td>25.000.000</td>
                        </tr>
                        <tr>
                            <td>CV.BNT</td>
                            <td>212222355525552</td>
                            <td>FAUZI JAKARIA</td>
                            <td>MENGGELAPKAN ALAT</td>
                            <td>gps rtk comnav t300</td>
                            <td>GX72727AC22</td>
                            <td>7 bulan</td>
                            <td>Menghilangkan 1 set gps rtk comnav </td>
                            <td>98.000.000</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>