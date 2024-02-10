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

                        <form action="<?= base_url('artikel/update/' . $detail_artikel['slug']) ?>" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Judul</label>
                                <input type="text" name="judul" id="judul" class="form-control" placeholder="Judul" value="<?= $detail_artikel['judul'] ?>" required>
                            </div>

                            <div class="form-group">
                                <label>Isi</label>
                                <input type="text" name="isi" id="isi" class="form-control" placeholder="Isi Artikel" value="<?= $detail_artikel['isi'] ?>" required>
                            </div>

                            <div class="form-group">
                                <label>Penulis</label>
                                <input type="text" name="penulis" id="penulis" class="form-control" placeholder="Penulis" value="<?= $detail_artikel['penulis'] ?>" required>
                            </div>

                            <div class="form-group">
                                <img src="<?= base_url('assets/backend/images/artikel/' . $detail_artikel['gambar']) ?>" width="100px" height="100px" class="center">

                                <div class="form-group">
                                    <label>Edit Gambar</label>
                                    <input type="file" name="gambar" id="gambar" class="form-control" accept=".jpg,.png,.jpeg">
                                </div>
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