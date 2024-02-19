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

            <form action="<?= base_url('perusahaan_blacklist/create') ?>">
                <button type="submit" class="btn btn-primary">+ Tambah Data User blacklist</button>
            </form>
            <br><br><br>


            <div class="table-responsive table-desi">
                <table class="all-package coupon-table table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Perusahaan Penyedia Sewa</th>
                            <th>NIK Terlapor</th>
                            <th>Nama Terlapor</th>
                            <th>Nama Penangung Jawab Terlapor</th>
                            <th>Jenis Pelanggaran</th>
                            <th>merk</th>
                            <th>Type Alat</th>
                            <th>No Seri</th>
                            <th>Durasi</th>
                            <th>Keterangan</th>
                            <th>Nominal Kerugian</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($list_perusahan_blacklist as $value) { ?>
                            <tr class="text-center">
                                <td><?= $no++ ?></td>
                                <td><?= $value['perusahaan'] ?></td>
                                <td><?= $value['npwp'] ?></td>
                                <td><?= $value['nama'] ?></td>
                                <td><?= $value['nama_penanggung_jawab'] ?></td>
                                <td><?= $value['valid'] ?></td>
                                <td><?= $value['jenis_pelanggaran'] ?></td>
                                <td><?= $value['merk'] ?></td>
                                <td><?= $value['type_alat'] ?></td>
                                <td><?= $value['no_seri'] ?></td>
                                <td><?= $value['durasi'] . " Bulan" ?></td>
                                <td><?= $value['keterangan'] ?></td>
                                <td><?= $value['nominal_kerugian'] ?></td>
                                <td><?= $value['created_at'] ?></td>
                                <td><?= $value['updated_at'] ?></td>
                                <td>
                                    <a href="<?= base_url('perusahaan_blacklist/update/' . $value['slug']) ?>" class="btn btn-info btn-sm">Edit</a>
                                    <a href="<?= base_url('perusahaan_blacklist/detail/' . $value['slug']) ?>" class="btn btn-success btn-sm">Detail</a>
                                    <form action="<?= base_url('perusahaan_blacklist/validation/' . $value['slug']); ?>" method="post">
                                        <button type="submit" class="btn btn-primary btn-sm" onclick="return confirm('Apakah Anda yakin ingin validasi data ini?')">Validation</button>
                                    </form>
                                    <form action="<?= base_url('perusahaan_blacklist/delete/' . $value['slug']); ?>" method="post">
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