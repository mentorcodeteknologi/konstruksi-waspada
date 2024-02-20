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

            <form action="<?= base_url('alat_hilang/create') ?>">
                <button type="submit" class="btn btn-primary">+ Tambah Data Alat Hilang</button>
            </form>
            <br><br><br>


            <div class="table-responsive table-desi">
                <table class="all-package coupon-table table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIK / NPWP</th>
                            <th>Nama Pemilik</th>
                            <th>Nomer Hp</th>
                            <th>Type</th>
                            <th>Merk</th>
                            <th>Serial Number</th>
                            <th>Foto</th>
                            <th>Pembelian Dari</th>
                            <th>Tanggal Kehilangan</th>
                            <th>Surat Kepemilikan</th>
                            <th>Lokasi Kehilangan</th>
                            <th>Kronologi Kejadian</th>
                            <th>Nominal Kerugian</th>
                            <th>Status Publish</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($list_alat_hilang as $value) { ?>
                            <tr class="text-center">
                                <td><?= $no++ ?></td>
                                <td><?= $value['id_card'] ?></td>
                                <td><?= $value['nama'] ?></td>
                                <td><?= $value['no_hp'] ?></td>
                                <td><?= $value['type_alat'] ?></td>
                                <td><?= $value['merk'] ?></td>
                                <td><?= $value['serial_number'] ?></td>
                                <td><img src="<?= base_url('assets/backend/images/alat_hilang/' . $value['foto']) ?>" width="50px" height="50px"></td>
                                <td><?= $value['pembelian_dari'] ?></td>
                                <td><?= $value['tanggal_kehilangan'] ?></td>
                                <td><a href="<?= base_url('assets/backend/images/alat_hilang/' . $value['surat_kepemilikian']) ?>" target="_blank">Lihat Surat Kepemilikan</a></td>
                                <td><?= $value['lokasi_kehilangan'] ?></td>
                                <td><?= $value['kronologi'] ?></td>
                                <td><?= $value['nominal_kerugian'] ?></td>
                                <td><?= $value['valid'] == 0 ? "Menunggu Validasi" : "Publish" ?></td>
                                <td>
                                    <a href="<?= base_url('alat_hilang/update/' . $value['slug']) ?>" class="btn btn-info btn-sm">Edit</a>
                                    <form action="<?= base_url('alat_hilang/delete/' . $value['slug']); ?>" method="post">
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                                    </form>
                                    <?php if ($session->get('role') == "admin") { ?>
                                        <form action="<?= base_url('alat_hilang/validasi/' . $value['slug']); ?>" method="post">
                                            <button type="submit" class="btn btn-success btn-sm" onclick="return confirm('Apakah Anda yakin ingin memvalidasi data ini?')">Validasi</button>
                                        <?php } ?>
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