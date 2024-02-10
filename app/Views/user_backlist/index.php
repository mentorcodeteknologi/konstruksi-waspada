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

        <form action="<?= base_url('user_blacklist/create') ?>">
            <button type="submit" class="btn btn-primary">+ Tambah Data User Backlist</button>
        </form>
        <br><br><br>


        <div class="table-responsive table-desi">
            <table class="all-package coupon-table table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>Foto KTP</th>
                        <th>No HP</th>
                        <th>Merek</th>
                        <th>Type Alat</th>
                        <th>Nomer Seri</th>
                        <th>Surat Perjanjian</th>
                        <th>Foto Alat</th>
                        <th>Foto Serah Terima Alat</th>
                        <th>Jenis Pelanggaran</th>
                        <th>Mulai Rental</th>
                        <th>Akhir Rental</th>
                        <th>Bukti Lainnya</th>
                        <th>Nominal Kerugian</th>
                        <th>Slug</th>
                        <th>Users</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $no = 1;
                    foreach ($list_user_backlist as $value) { ?>
                        <tr class="text-center">
                            <td><?= $no++ ?></td>
                            <td><?= $value['nik'] ?></td>
                            <td><?= $value['nama'] ?></td>
                            <td><img src="<?= base_url('assets/backend/images/user_backlist/' . $value['slug'] . "/" . $value['foto_ktp']) ?>" width="50px" height="50px"></td>
                            <td><?= $value['foto_ktp'] ?></td>
                            <td><?= $value['no_hp'] ?></td>
                            <td><?= $value['merek'] ?></td>
                            <td><?= $value['type_alat'] ?></td>
                            <td><?= $value['no_seri'] ?></td>
                            <td><?= $value['surat_perjanjian'] ?></td>
                            <td><img src="<?= base_url('assets/backend/images/user_backlist/' .  $value['slug'] . "/" . $value['foto_alat']) ?>" width="50px" height="50px"></td>
                            <td><img src="<?= base_url('assets/backend/images/user_backlist/' .  $value['slug'] . "/" . $value['foto_serah_terima_alat']) ?>" width="50px" height="50px"></td>
                            <td><img src="<?= base_url('assets/backend/images/user_backlist/' .  $value['slug'] . "/" . $value['jenis_pelanggaran']) ?>" width="50px" height="50px"></td>
                            <td><?= $value['mulai_rental'] ?></td>
                            <td><?= $value['akhir_rental'] ?></td>
                            <td><?= $value['bukti_lainnya'] ?></td>
                            <td><?= $value['nominal_kerugian'] ?></td>
                            <td><?= $value['slug'] ?></td>
                            <td><?= $value['user'] ?></td>
                            <td><?= $value['created_at'] ?></td>
                            <td><?= $value['updated_at'] ?></td>
                            <td>
                                <a href="<?= base_url('users/update/' . $value['encrypt']) ?>" class="btn btn-info btn-sm">Edit</a>
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