<!-- MEMANGGIL SESSION LOGIN -->
<?php $session = session(); ?>

<!-- MEMANGGIL LAYOUTS -->
<?= $this->extend('layouts/app'); ?>

<?= $this->section('content'); ?>

<div class="page-body">
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-header-left">
                        <h3>
                            <?= $title ?>
                            <small><?= $subtitle; ?></small>
                        </h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ol class="breadcrumb pull-right">
                        <li class="breadcrumb-item">
                            <a href="index.html">
                                <i data-feather="home"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item active"><?= $title ?></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>


    <div class="container-fluid bulk-cate">
        <div class="card">
            <!-- form start -->
            <div class="card-body">
                <div class="row ">
                    <div class="col-sm-12 ">

                        <form action="<?= base_url('perusahaan_blacklist/create') ?>" method="post" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <div class="form-group">
                                <label>NPWP</label>
                                <input type="text" name="npwp" id="npwp" class="form-control" placeholder="No NPWP" required>
                            </div>

                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama User Blacklist" required>
                            </div>

                            <div class="form-group">
                                <label>Foto NPWP</label>
                                <input type="file" name="foto_npwp" id="foto_npwp" class="form-control" accept=".jpg,.png,.jpeg" required>
                                <img src="" id="viewImg" class="img-fluid mt-2" width="200px">
                            </div>

                            <div class="form-group">
                                <label>Nama Penanggung Jawab</label>
                                <input type="text" name="nama_penanggung_jawab" id="nama_penanggung_jawab" class="form-control" placeholder="Nama Penanggung Jawab" required>
                            </div>

                            <div class="form-group">
                                <label>No HP</label>
                                <input type="text" name="no_hp" id="no_hp" class="form-control" value="+62" placeholder="No HP" required>
                            </div>

                            <div class="form-group">
                                <label>Merk</label>
                                <input type="text" name="merk" id="merk" class="form-control" placeholder="Merk" required>
                            </div>

                            <div class="form-group">
                                <label>Type Alat</label>
                                <input type="text" name="type_alat" id="type_alat" class="form-control" placeholder="Type Alat" required>
                            </div>

                            <div class="form-group">
                                <label>No Seri</label>
                                <input type="text" name="no_seri" id="no_seri" class="form-control" placeholder="Nomer Seri" required>
                            </div>

                            <div class="form-group">
                                <label>Surat Perjanjian</label>
                                <input type="file" name="surat_perjanjian" id="surat_perjanjian" class="form-control" accept="image/*,.pdf,.doc,.docx,.txt" required>
                                <img src="" id="viewImg" class="img-fluid mt-2" width="200px">
                            </div>

                            <div class="form-group">
                                <label>Foto Alat</label>
                                <input type="file" name="foto_alat" id="foto_alat" class="form-control" accept=".jpg,.png,.jpeg" required>
                                <img src="" id="viewImg" class="img-fluid mt-2" width="200px">
                            </div>

                            <div class="form-group">
                                <label>Foto Serah Terima Alat</label>
                                <input type="file" name="foto_serah_terima_alat" id="foto_serah_terima_alat" class="form-control" accept=".jpg,.png,.jpeg" required>
                                <img src="" id="viewImg" class="img-fluid mt-2" width="200px">
                            </div>

                            <div class="form-group">
                                <label>Jenis Pelanggaran</label>
                                <Select name="jenis_pelanggaran" id="jenis_pelanggaran" class="form-control" required>
                                    <option value=''>Pilih Jenis Pelanggaran</option>
                                    <option value='Menggelapkan Alat'>Menggelapkan Alat</option>
                                    <option value='Tidak Membayar Sewa'>Tidak Membayar Sewa</option>
                                </Select>
                            </div>

                            <div class="form-group">
                                <label>Mulai Rental</label>
                                <input type="date" name="mulai_rental" id="mulai_rental" class="form-control" placeholder="Mulai Rental" required value="<?= date('Y-m-d') ?>">
                            </div>

                            <div class="form-group">
                                <label>Akhir Rental</label>
                                <input type="date" name="akhir_rental" id="akhir_rental" class="form-control" placeholder="Akhir Rental" required value="<?= date('Y-m-d') ?>">
                            </div>

                            <div class=" form-group">
                                <label>Bukti Lainnya</label>
                                <input type="file" name="bukti_lainnya" id="bukti_lainnya" class="form-control" accept=".jpg,.png,.jpeg">
                                <img src="" id="viewImg" class="img-fluid mt-2" width="200px">
                            </div>

                            <div class="form-group">
                                <label>Nominal Kerugian</label>
                                <input type="text" name="nominal_kerugian" id="nominal_kerugian" class="form-control" placeholder="Nominal Kerugian" required>
                            </div>

                            <div class="form-group">
                                <label>Keterangan</label>
                                <input type="text" name="keterangan" id="keterangan" class="form-control" placeholder="Keterangan">
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <button type="reset" class="btn btn-warning">Reset</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>



</div>
<!-- Container-fluid Ends-->

<?= $this->endSection(); ?>