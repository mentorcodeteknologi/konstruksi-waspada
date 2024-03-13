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
                echo '<div class="alert alert-success alert-dismissible">' . session()->getFlashdata('pesan') . '</div>';
            }
            ?>
            <div class="table-responsive table-desi">
                <table class="table all-package table-category " id="editableTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Kategori</th>
                            <th>Gambar</th>
                            <th>Isi</th>
                            <th>Url</th>
                            <th>Deskripsi</th>
                            <th>Penulis</th>
                            <th>Created At</th>
                            <th>Update At</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($list_artikel as $value) { ?>
                            <tr class="text-center">
                                <td><?= $no++ ?></td>
                                <td data-field="name"><?= $value['judul'] ?></td>
                                <td data-field="name"><?= $value['category_name'] ?></td>
                                <td>
                                    <img src="<?= base_url('assets/backend/images/artikel/' . $value['gambar']) ?>" width="100px" height="100px" data-field="image" alt="">
                                </td>
                                <td><?= substr($value['isi'], 0, 30) ?></td>
                                <td><?= $value['url'] ?></td>
                                <td><?= substr($value['deskripsi'], 0, 30) ?></td>
                                <td><?= $value['author'] ?></td>
                                <td><?= $value['created_at'] ?></td>
                                <td><?= $value['updated_at'] ?></td>
                                <td>
                                    <a href="<?= base_url('artikel/update/' . $value['slug']) ?>">
                                        <i class="fa fa-edit" title="Edit"></i>
                                    </a>
                                    <a href="<?= base_url('artikel/delete/' . $value['slug']); ?>" onclick="return confirm('Ingin menghapus artikel?')">
                                        <i class="fa fa-trash" title="Delete"></i>
                                    </a>
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