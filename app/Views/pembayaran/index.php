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

            <?php if ($session->get('role') == "users" && $session->get('status') == "nonactive") { ?>
                <form action="<?= base_url('pembayaran/create') ?>">
                    <button type="submit" class="btn btn-primary">+ Tambah Data Pembayaran</button>
                </form>
                <br><br><br>
            <?php } ?>

            <div class="table-responsive table-desi">
                <table class="all-package coupon-table table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama User</th>
                            <th>Jumlah Pembayaran</th>
                            <th>Bukti Pembayaran</th>
                            <th>Status</th>
                            <?php if ($session->get('role') != "users") { ?>
                                <th>Action</th>
                            <?php } ?>
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

                                <td>
                                    <a href="<?= base_url('assets/backend/images/pembayaran/' . $value['bukti_pembayaran']) ?>" target="_blank">Lihat Bukti Pembayaran</a>
                                </td>
                                <td>
                                    <?php
                                    if ($value['validasi_pembayaran'] == null) {
                                        echo "Masih Dalam Proses";
                                    } else if ($value['validasi_pembayaran'] == 0) {
                                        echo "Tidak Valid";
                                    } else {
                                        echo "Valid";
                                    }
                                    ?>
                                </td>

                                <?php if ($session->get('role') != "users") { ?>
                                    <td>
                                        <?php if ($value['validasi_pembayaran'] == null) { ?>
                                            <form action="<?= base_url('pembayaran/validasi/' . $value['slug']); ?>" method="post">
                                                <button type="submit" class="btn btn-primary btn-sm" onclick="return confirm('Apakah Anda yakin validasi data ini?')">Validasi Pembayaran</button>
                                            </form>
                                            <form action="<?= base_url('pembayaran/tidakvalid/' . $value['slug']); ?>" method="post">
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin data ini tidak valid?')">Tidak Valid</button>
                                            <?php } else { ?>
                                                -
                                            <?php } ?>
                                    </td>
                                <?php } ?>

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