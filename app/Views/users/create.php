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

                        <form action="<?= base_url('users/create') ?>" method="post" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama User" required>
                            </div>

                            <div class="form-group">
                                <label>No NIK/NPWP</label>
                                <input type="text" name="id_card" id="id_card" class="form-control" placeholder="No NIK/No NPWP" required>
                            </div>

                            <div class="form-group">
                                <label>No Whatsapp</label>
                                <input type="text" name="no_hp" id="no_hp" class="form-control" value="+62" placeholder="No Whatsapp" required>
                            </div>

                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Email" required>
                            </div>

                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                            </div>

                            <div class="form-group">
                                <label>Alamat</label>
                                <input type="text" name="alamat" id="alamat" class="form-control" placeholder="Alamat" required>
                            </div>

                            <div class="form-group">
                                <label>Role</label>
                                <Select name="role" id="role" class="form-control" required>
                                    <option value=''>Pilih Role</option>
                                    <option value='admin'>Admin</option>
                                    <option value='users'>Users</option>
                                </Select>
                            </div>

                            <div class="form-group">
                                <label>Nama Perusahaan</label>
                                <input type="text" name="perusahaan" id="perusahaan" class="form-control" placeholder="Perusahaan">
                            </div>

                            <div class="form-group">
                                <label>Jabatan</label>
                                <input type="text" name="jabatan" id="jabatan" class="form-control" placeholder="Jabatan">
                            </div>

                            <div class="form-group">
                                <label>Foto</label>
                                <input type="file" name="foto" id="foto" class="form-control" accept=".jpg,.png,.jpeg">
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