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
<<<<<<< HEAD
    <div class="card">
        <div class="card-body">
    
            <?php
    
            // NOTIFIKASI BERHASIL SIMPAN DATA
            if (session()->getFlashdata('pesan')) {
                echo '<div class="alert alert-success alert-dismissible">
                 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' . session()->getFlashdata('pesan') . '</div>';
            }
            ?>
    
            <form action="<?= base_url('users/create') ?>">
                <button type="submit" class="btn btn-primary">+ Tambah Data Users</button>
            </form>
            <br><br><br>
    
    
            <!-- class="table table-bordered table-striped" -->
            <div class="table-responsive table-desi">
                <table id="example1" class="all-package coupon-table table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Foto</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Action</th>
=======

    <div class="card-body">

        <?php

        // NOTIFIKASI BERHASIL SIMPAN DATA
        if (session()->getFlashdata('pesan')) {
            echo '<div class="alert alert-success alert-dismissible">
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' . session()->getFlashdata('pesan') . '</div>';
        }
        ?>

        <form action="<?= base_url('users/create') ?>">
            <button type="submit" class="btn btn-primary">+ Tambah Data Users</button>
        </form>
        <br><br><br>


        <!-- class="table table-bordered table-striped" -->
        <div class="table-responsive table-desi">
            <table id="example1" class="all-package coupon-table table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>NO. NIK/NPWP</th>
                        <th>NO Whatsapp</th>
                        <th>Email</th>
                        <th>Alamat</th>
                        <th>Foto</th>
                        <th>Perusahaan</th>
                        <th>Jabatan</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $no = 1;
                    foreach ($list_user as $value) { ?>
                        <tr class="text-center">
                            <td><?= $no++ ?></td>
                            <td><?= $value['nama'] ?></td>
                            <td><?= $value['id_card'] ?></td>
                            <td><?= $value['no_hp'] ?></td>
                            <td><?= $value['email'] ?></td>
                            <td><?= $value['alamat'] ?></td>
                            <td><img src="<?= base_url('assets/backend/images/' . $value['foto']) ?>" width="50px" height="50px"></td>
                            <td><?= $value['perusahaan'] ?></td>
                            <td><?= $value['jabatan'] ?></td>
                            <td><?= $value['role'] ?></td>
                            <td><?= $value['status'] ?></td>
                            <td><?= $value['created_at'] ?></td>
                            <td><?= $value['updated_at'] ?></td>
                            <td>
                                <a href="<?= base_url('users/update/' . $value['encrypt']) ?>" class="btn btn-info btn-sm">Edit</a>
                            </td>

>>>>>>> fc52ac68fb167a1387c3f1019517afc17eb789c8
                        </tr>
                    </thead>
    
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($list_user as $value) { ?>
                            <tr class="text-center">
                                <td><?= $no++ ?></td>
                                <td><?= $value['nama'] ?></td>
                                <td><?= $value['email'] ?></td>
                                <td><img src="<?= base_url('assets/backend/images/' . $value['foto']) ?>" width="50px" height="50px"></td>
                                <td><?= $value['role'] ?></td>
                                <td><?= $value['status'] ?></td>
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




</div>
<!-- Container-fluid Ends-->

<?= $this->endSection(); ?>

<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>