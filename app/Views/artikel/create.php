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

                        <form action="<?= base_url('artikel/create') ?>" method="post" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <div class="form-group">
                                <label>Judul</label>
                                <input type="text" name="judul" id="judul" class="form-control" placeholder="Judul" required>
                            </div>

                            <div class="form-group">
                                <label>Kategori</label>
                                <select name="id_categories" id="id_categories" class="form-control" required>
                                    <option value="">Pilih Kategori</option>
                                    <?php foreach ($category as $row) { ?>
                                        <option value="<?= $row['id'] ?>"><?= $row['category'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Isi</label>
                                <textarea name="isi" id="isi" class="form-control" placeholder="Isi Artikel" required> </textarea>
                            </div>

                            <!-- <div class="form-group">
                                <label>Penulis</label>
                                <input type="text" name="penulis" id="penulis" class="form-control" placeholder="Penulis" required>
                            </div> -->

                            <div class="form-group">
                                <label>URL Youtube</label>
                                <input type="text" name="url" id="url" class="form-control" placeholder="Url Youtube">
                            </div>

                            <div class="form-group">
                                <label>Deskripsi</label>
                                <textarea name="deskripsi" id="deskripsi" class="form-control" placeholder="Deskripsi" required> </textarea>
                            </div>

                            <div class="form-group">
                                <label>Gambar</label>
                                <input type="file" name="gambar" id="gambar" class="form-control" accept=".jpg,.png,.jpeg" required>
                                <img src="" id="viewImg" class="img-fluid mt-2" width="200px">
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