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

                        <form action="<?= base_url('alat_hilang/create') ?>" method="post" enctype="multipart/form-data">
                            <?= csrf_field(); ?>

                            <div class="form-group">
                                <label>Type Alat</label>
                                <input type="text" name="type_alat" id="type_alat" class="form-control" placeholder="Type Alat" required>
                            </div>

                            <div class="form-group">
                                <label>Merk</label>
                                <input type="text" name="merk" id="merk" class="form-control" placeholder="merk" required>
                            </div>

                            <div class="form-group">
                                <label>Serial Number</label>
                                <input type="text" name="serial_number" id="serial_number" class="form-control" placeholder="Serial Number" required>
                            </div>

                            <div class="form-group">
                                <label>Foto</label>
                                <input type="file" name="foto" id="foto" class="form-control" accept=".jpg,.png,.jpeg" required>
                                <img src="" id="viewImg" class="img-fluid mt-2" width="200px">
                            </div>

                            <div class="form-group">
                                <label>Pembelian Dari</label>
                                <input type="text" name="pembelian_dari" id="pembelian_dari" class="form-control" placeholder="Pembelian Dari">
                            </div>

                            <div class="form-group">
                                <label>Tanggal Kehilangan</label>
                                <input type="date" name="tanggal_kehilangan" id="tanggal_kehilangan" class="form-control" placeholder="Tanggal Kehilangan" required value="<?= date('Y-m-d') ?>">
                            </div>

                            <div class="form-group">
                                <label>Surat Kepemilikan</label>
                                <input type="file" name="surat_kepemilikian" id="surat_kepemilikian" class="form-control" accept="image/*,.pdf,.doc,.docx,.txt" required>
                                <img src="" id="viewImg" class="img-fluid mt-2" width="200px">
                            </div>

                            <div class="form-group">
                                <label>Lokasi Kehilangan</label>
                                <input type="text" name="lokasi_kehilangan" id="lokasi_kehilangan" class="form-control" placeholder="Lokasi Kehilangan" required>
                            </div>

                            <div class="form-group">
                                <label>Kronologi Kejadian</label>
                                <input type="text" name="kronologi" id="kronologi" class="form-control" placeholder="Kronologi kejadian" required>
                            </div>

                            <div class="form-group">
                                <label>Nominal Kerugian</label>
                                <input type="number" name="nominal_kerugian" id="nominal_kerugian" class="form-control" placeholder="Nominal Kerugian" required>
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