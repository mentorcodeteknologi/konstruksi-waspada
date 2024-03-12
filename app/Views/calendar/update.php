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

                        <form action="<?= base_url('calendar/update/' . base64_encode($detail_calendar['id'])) ?>" method="post" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Tanggal Mulai</label>
                                        <input type="date" name="tanggal_mulai" id="tanggal_mulai" class="form-control" value="<?= $detail_calendar['tanggal_mulai'] ?>"  placeholder="Tanggal Kegiatan" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Tanggal Selesai</label>
                                        <input type="date" name="tanggal_selesai" id="tanggal_selesai" value="<?= $detail_calendar['tanggal_selesai'] ?>"  class="form-control" placeholder="Tanggal Kegiatan" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Nama Kegiatan</label>
                                <input type="text" name="nama_kegiatan" id="nama_kegiatan" class="form-control" placeholder="Nama Kegiatan" value="<?= $detail_calendar['nama_kegiatan'] ?>" required>
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