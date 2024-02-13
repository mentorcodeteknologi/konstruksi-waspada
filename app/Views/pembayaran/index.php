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

    <div class="card-body">

        <?php

        // NOTIFIKASI BERHASIL SIMPAN DATA
        if (session()->getFlashdata('pesan')) {
            echo '<div class="alert alert-success alert-dismissible">
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' . session()->getFlashdata('pesan') . '</div>';
        }
        ?>

        <form action="<?= base_url('pembayaran/create') ?>">
            <button type="submit" class="btn btn-primary">+ Tambah Data Pembayaran</button>
        </form>
        <br><br><br>


        <div class="table-responsive table-desi">
            <table class="all-package coupon-table table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama User</th>
                        <th>Jumlah Pembayaran</th>
                        <th>Bukti Pembayaran</th>
                        <th>Slug</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $no = 1;
                    foreach ($list_pembayaran as $value) { ?>
                        <tr class="text-center">
                            <td><?= $no++ ?></td>
                            <td><?= $value['nama_user'] ?></td>
                            <td><?= $value['jumlah_pembayaran'] ?></td>
                            <td><img src="<?= base_url('assets/backend/images/pembayaran' . $value['bukti_pembayaran']) ?>" width="50px" height="50px"></td>
                            <td><?= $value['slug'] ?></td>
                            <td>
                                <a href="<?= base_url('pembayaran/validasi/' . $value['slug']) ?>" class="btn btn-primary btn-sm">Validasi Pembayaran</a>
                            </td>

                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>




</div>
<!-- Container-fluid Ends-->

<?= $this->endSection(); ?>