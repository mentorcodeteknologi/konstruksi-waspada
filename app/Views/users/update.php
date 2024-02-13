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

                        <form action="<?= base_url('users/update/' . $detail_user['encrypt']) ?>" method="post" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama User" value="<?= $detail_user['nama'] ?>" required>
                            </div>

                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" name="email" id="email" class="form-control" placeholder="Email" value="<?= $detail_user['email'] ?>" required>
                            </div>

                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Password" value="<?= $detail_user['password'] ?>" required>
                            </div>

                            <div class=" form-group">
                                <label>Role</label>
                                <Select name="role" id="role" class="form-control" required>
                                    <option value="<?= $detail_user['role'] ?>"><?= ucwords($detail_user['role']) ?></option>
                                    <?php if ($detail_user['role'] == 'admin') { ?>
                                        <option value='user'>User</option>
                                    <?php } else { ?>
                                        <option value='admin'>Admin</option>
                                    <?php  } ?>
                                </Select>
                            </div>

                            <div class=" form-group">
                                <label>Status</label>
                                <Select name="status" id="status" class="form-control" required>
                                    <option value="<?= $detail_user['status'] ?>"><?= ucwords($detail_user['status']) ?></option>
                                    <?php if ($detail_user['status'] == 'active') { ?>
                                        <option value='nonactive'>Non Active</option>
                                    <?php } else { ?>
                                        <option value='active'>Active</option>
                                    <?php  } ?>
                                </Select>
                            </div>

                            <div class="form-group">
                                <label>Nama Perusahaan</label>
                                <input type="text" name="perusahaan" id="perusahaan" class="form-control" placeholder="Perusahaan" value="<?= $detail_user['perusahaan'] ?>">
                            </div>

                            <div class="form-group">
                                <img src="<?= base_url('assets/backend/images/' . $detail_user['foto']) ?>" width="100px" height="100px" class="center">

                                <div class="form-group">
                                    <label>Edit Foto</label>
                                    <input type="file" name="foto" id="foto" class="form-control" accept=".jpg,.png,.jpeg">
                                </div>
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