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
    <div class="card">
        <div class="card-body">

            <?php

            // NOTIFIKASI BERHASIL SIMPAN DATA
            if (session()->getFlashdata('pesan')) {
                echo '<div class="alert alert-success alert-dismissible">
                    ' . session()->getFlashdata('pesan') . '</div>';
            }
            ?>

            <form action="<?= base_url('category/create') ?>">
                <button type="submit" class="btn btn-primary">+ Tambah Data Kategori</button>
            </form>
            <br><br><br>


            <div class="table-responsive table-desi">
                <table class="all-package coupon-table table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Kategori</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($list_category as $value) { ?>
                            <tr class="text-center">
                                <td><?= $no++ ?></td>
                                <td><?= $value['category'] ?></td>
                                <td><?= $value['created_at'] ?></td>
                                <td><?= $value['updated_at'] ?></td>
                                <td>
                                    <a href="<?= base_url('category/update/' . base64_encode($value['id'])) ?>" class="btn btn-info btn-sm">Edit</a>
                                    <form action="<?= base_url('category/delete/' . base64_encode($value['id'])); ?>" method="post">
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                                    </form>
                                </td>

                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>




</div>
<!-- Container-fluid Ends-->

<?= $this->endSection(); ?>