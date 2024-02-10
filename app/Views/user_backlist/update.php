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

                        <form action="<?= base_url('user_blacklist/update/' . $detail_users_backlist['slug']) ?>" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>NIK</label>
                                <input type="text" name="nik" id="nik" class="form-control" placeholder="nik" value="<?= $detail_users_backlist['nik'] ?>" required>
                            </div>

                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" name="nama" id="nama" class="form-control" placeholder="nama" value="<?= $detail_users_backlist['nama'] ?>" required>
                            </div>

                            <div class="form-group">
                                <img src="<?= base_url('assets/backend/images/users_backlist/' . $detail_users_backlist['slug'] . "/" . $detail_users_backlist['foto_ktp']) ?>" width="100px" height="100px" class="center">

                                <div class="form-group">
                                    <label>Edit Foto</label>
                                    <input type="file" name="foto_ktp" id="foto_ktp" class="form-control" accept=".jpg,.png,.jpeg">
                                </div>
                            </div>

                            <div class="form-group">
                                <label>No HP</label>
                                <input type="text" name="no_hp" id="no_hp" class="form-control" placeholder="no_hp" value="<?= $detail_users_backlist['no_hp'] ?>" required>
                            </div>

                            <div class="form-group">
                                <label>Merek</label>
                                <input type="text" name="merek" id="merek" class="form-control" placeholder="merek" value="<?= $detail_users_backlist['merek'] ?>" required>
                            </div>

                            <div class="form-group">
                                <label>Type Alat</label>
                                <input type="text" name="type_alat" id="type_alat" class="form-control" placeholder="type_alat" value="<?= $detail_users_backlist['type_alat'] ?>" required>
                            </div>

                            <div class="form-group">
                                <label>No Seri</label>
                                <input type="text" name="no_seri" id="no_seri" class="form-control" placeholder="no_seri" value="<?= $detail_users_backlist['no_seri'] ?>" required>
                            </div>

                            <div class="form-group">
                                <a href="<?= base_url('assets/backend/images/users_backlist/' . $detail_users_backlist['slug'] . "/" . $detail_users_backlist['surat_perjanjian']) ?>" target="_blank">Lihat Surat Perjanjian</a>

                                <div class="form-group">
                                    <label>Edit Surat Perjanjian</label>
                                    <input type="file" name="surat_perjanjian" id="surat_perjanjian" class="form-control" accept=".jpg,.png,.jpeg">
                                </div>
                            </div>

                            <div class="form-group">
                                <img src="<?= base_url('assets/backend/images/users_backlist/' . $detail_users_backlist['slug'] . "/" . $detail_users_backlist['foto_alat']) ?>" width="100px" height="100px" class="center">

                                <div class="form-group">
                                    <label>Edit Foto Alat</label>
                                    <input type="file" name="foto_alat" id="foto_alat" class="form-control" accept=".jpg,.png,.jpeg">
                                </div>
                            </div>

                            <div class="form-group">
                                <img src="<?= base_url('assets/backend/images/users_backlist/' . $detail_users_backlist['slug'] . "/" . $detail_users_backlist['foto_serah_terima_alat']) ?>" width="100px" height="100px" class="center">

                                <div class="form-group">
                                    <label>Edit Foto Serah Termina Alat</label>
                                    <input type="file" name="foto_serah_terima_alat" id="foto_serah_terima_alat" class="form-control" accept=".jpg,.png,.jpeg">
                                </div>
                            </div>

                            <div class=" form-group">
                                <label>Jenis Pelanggaran</label>
                                <Select name="jenis_pelanggaran" id="jenis_pelanggaran" class="form-control" required>
                                    <option value="<?= $detail_users_backlist['jenis_pelanggaran'] ?>"><?= ucwords($detail_users_backlist['jenis_pelanggaran']) ?></option>
                                    <?php if ($detail_users_backlist['jenis_pelanggaran'] == 'Pelanggaran Ringan') { ?>
                                        <option value='Pelanggaran Sedang'>Pelanggaran Sedang</option>
                                        <option value='Pelanggaran Berat'>Pelanggaran Berat</option>
                                    <?php } else if ($detail_users_backlist['jenis_pelanggaran'] == 'Pelanggaran Sedang') { ?>
                                        <option value='Pelanggaran Ringan'>Pelanggaran Ringan</option>
                                        <option value='Pelanggaran Berat'>Pelanggaran Berat</option>
                                    <?php } else { ?>
                                        <option value='Pelanggaran Ringan'>Pelanggaran Ringan</option>
                                        <option value='Pelanggaran Sedang'>Pelanggaran Sedang</option>
                                    <?php } ?>
                                </Select>
                            </div>

                            <div class="form-group">
                                <label>Muali Rental</label>
                                <input type="date" name="mulai_rental" id="mulai_rental" class="form-control" placeholder="mulai_rental" value="<?= $detail_users_backlist['mulai_rental'] ?>">
                            </div>

                            <div class="form-group">
                                <label>Akhir Rental</label>
                                <input type="date" name="akhir_rental" id="akhir_rental" class="form-control" placeholder="akhir_rental" value="<?= $detail_users_backlist['akhir_rental'] ?>">
                            </div>

                            <div class="form-group">
                                <img src="<?= base_url('assets/backend/images/users_backlist/' . $detail_users_backlist['slug'] . "/" . $detail_users_backlist['bukti_lainnya']) ?>" width="100px" height="100px" class="center">

                                <div class="form-group">
                                    <label>Edit Bukti Lainnya</label>
                                    <input type="file" name="bukti_lainnya" id="bukti_lainnya" class="form-control" accept=".jpg,.png,.jpeg">
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Nominal Kerugian</label>
                                <input type="text" name="nominal_kerugian" id="nominal_kerugian" class="form-control" placeholder="nominal_kerugian" value="<?= $detail_users_backlist['nominal_kerugian'] ?>">
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