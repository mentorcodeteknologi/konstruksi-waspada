<?= $this->extend('layouts_frontend/main_frontend'); ?>

<?= $this->section('breadcrumb'); ?>
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
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active">Alat Hilang</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb End -->
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<section class="register-page section-b-space">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h3>Form Kehilangan Alat</h3>
                <div class="theme-card">
                    <form class="theme-form">
                        <div class="form-row row">
                            <div class="col-md-6">
                                <label for="review">NIK/NPWP</label>
                                <input type="text" class="form-control" id="nama_pemilik" value="Relasi Field User" readonly="" required="">
                            </div>
                            <div class="col-md-6">
                                <label for="review">Nama Pemilik</label>
                                <input type="text" class="form-control" id="nama_pemilik" value="Relasi Field User" readonly="" required="">
                            </div>
                            <div class="col-md-6">
                                <label for="review">No Hp</label>
                                <input type="text" class="form-control" id="nama_terlapor" value="0821543548" readonly="" required="">
                            </div>
                            <div class="col-md-6">
                                <label for="review">Type Alat</label>
                                <input type="file" class="form-control" id="upload_ktp_terlapor" placeholder="Type Alat" required="">
                            </div>
                            <div class="col-md-6">
                                <label for="review">Serial Number</label>
                                <input type="text" class="form-control" id="no_hp_terlapor" placeholder="Serial Number" required="">
                            </div>
                            <div class="col-md-6">
                                <label for="review">Upload Foto Alat</label>
                                <input type="file" class="form-control" id="upload_bukti_surat_perjanjian" placeholder="Upload Foto Alat" required="">
                            </div>
                            <div class="col-md-6">
                                <label for="review">Pembelian Dari</label>
                                <input type="text" class="form-control" id="merk_dan_tipe_alat" placeholder="Pembelian Dari" required="">
                            </div>
                            <div class="col-md-6">
                                <label for="review">Tanggal Kehilangan</label>
                                <input type="date" class="form-control" id="durasi_rental" placeholder="Tanggal Kehilangan" required="">
                            </div>
                            <div class="col-md-6">
                                <label for="review">Upload Surat Kepemilikan/Kwetansi</label>
                                <input type="file" class="form-control" id="upload_bukti_surat_perjanjian" placeholder="Upload Surat Kepemilikan/Kwetansi" required="">
                            </div>
                            <div class="col-md-6">
                                <label for="review">Lokasi Kehilangan</label>
                                <input type="file" class="form-control" id="foto_alat" placeholder="Foto Alat" required="">
                            </div>
                            <div class="col-md-6">
                                <label for="review">Nominal Kerugian (Rp.)</label>
                                <input type="number" class="form-control" id="jenis_pelanggaran" placeholder="Jenis Pelanggaran" required="">
                            </div>
                            <div class="col-md-12">
                                <label for="review">Kronologis Kejadian </label>
                                <textarea name="" id="" cols="30" rows="10" class="form-control">
                                    </textarea>
                            </div>

                        </div>
                        <!-- <div class="form-row row">
                                <div class="col-md-6">
                                    <label for="review">Durasi Rental</label>
                                    <input type="date" class="form-control" id="durasi_rental" placeholder="Durasi Rental" required="">
                                </div>
                                <div class="col-md-6">
                                    <label for="review">Upload Bukti Lainnya</label>
                                    <input type="file" class="form-control" id="upload_bukti_lainnya" placeholder="Upload Bukti Lainnya"
                                        required="">
                                </div>
                                <div class="col-md-6">
                                    <label for="review">Nominal Kerugian</label>
                                    <input type="nominal_kerugian" class="form-control" id="review"
                                        placeholder="Nominal Kerugian" required="">
                                </div>
                                <div class="col-md-6">
                                    <label for="review">Keterangan</label>
                                    <input type="keterangan" class="form-control" id="review"
                                        placeholder="Keterangan" required="">
                                </div>
                                <div class="col-md-6">
                                    <label for="review">Nama Perusahaan Penyedia Sewa</label>
                                    <input type="Nama Perusahaan Penyedia Sewa" class="form-control" id="review"
                                        placeholder="Nama Perusahaan Penyedia Sewa" required="" readonly>
                                </div>
                            </div> -->
                        <a href="#" class="btn btn-solid w-auto mt-3">Add</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>