<?= $this->extend('new_ui_frontend/layouts_new/main'); ?>
<?= $this->section('content'); ?>

<div class="container-fluid">
    <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold mb-8">User Blacklist</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a class="text-muted text-decoration-none" href="<?= base_url("/"); ?>">Home</a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page">User Blacklist</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-3">
                    <div class="text-center mb-n5">
                        <img src="<?= base_url('assets/new_frontend') ?>/images/breadcrumb/ChatBc.png" alt="" class="img-fluid mb-n4" />
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <!-- ---------------------start Tab with dropdown ---------------- -->
        <div class="card">
            <div class="card-body">
                <div class="mb-3">
                    <!-- <h5 class="mb-0">Tab with dropdown</h5> -->
                </div>
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="user-tab" data-bs-toggle="tab" href="#user" role="tab" aria-controls="user" aria-expanded="true">
                            <span>List user blacklist</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="addUser-tab" data-bs-toggle="tab" href="#addUser" role="tab" aria-controls="addUser">
                            <span>Add user blacklist</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="addPerusahaan-tab" data-bs-toggle="tab" href="#addPerusahaan" role="tab" aria-controls="addPerusahaan">
                            <span>Add perusahaan blacklist</span>
                        </a>
                    </li>
                </ul>
                <div class="tab-content tabcontent-border p-3" id="myTabContent">
                    <div role="tabpanel" class="tab-pane fade show active" id="user" aria-labelledby="user-tab">
                        <div class="row">
                            <?php foreach ($list_user_blacklist as $value) : ?>
                                <div class="col-md-4">
                                    <div class="card hover-img">
                                        <div class="card-body p-4 text-center border-bottom">
                                            <img src="<?= base_url('assets/new_frontend') ?>/images/profile/user-1.jpg" alt="" class="rounded-circle mb-3" width="80" height="80">
                                            <h5 class="fw-semibold mb-0 fs-5"><?= $value['nama'] ?></h5>
                                            <span class="text-dark fs-2">NIK terlapor : <?= $value['nik'] ?></span>
                                        </div>
                                        <ul class="px-2 py-2 list-unstyled d-flex align-items-center justify-content-center mb-0">
                                            <button class="btn bg-primary-subtle text-primary mb-3 w-50" data-bs-toggle="modal" data-bs-target="#bs-example-modal-md<?= $value['slug'] ?>">Detail</button>
                                        </ul>
                                    </div>
                                </div>
                                <!-- sample modal content -->
                                <div id="bs-example-modal-md<?= $value['slug'] ?>" class="modal fade" tabindex="-1" aria-labelledby="bs-example-modal-md" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header d-flex align-items-center">
                                                <h4 class="modal-title" id="myModalLabel">
                                                    Detail User Blacklist
                                                </h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <h4>
                                                    Nama Terlapor : <?= $value['nama'] ?>
                                                </h4>
                                                <li>Nama Perusahaan Penyedia Sewa : <?= $value['perusahaan'] ?></li>
                                                <li>NIK Terlapor : <?= $value['nik'] ?></li>
                                                <li>Jenis Pelanggaran : <?= $value['jenis_pelanggaran'] ?></li>
                                                <li>Merk dan Tipe Alat : <?= $value['merk'] ?> - <?= $value['type_alat'] ?></li>
                                                <li>No Seri : <?= $value['no_seri'] ?></li>
                                                <li>Durasi Rental : <?= $value['durasi'] . " Bulan" ?></li>
                                                <li>Keterangan : <?= $value['keterangan'] ?></li>
                                                <li>Nominal Kerugian : Rp. <?= number_format($value['nominal_kerugian'])  ?></li>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn bg-danger-subtle text-danger font-medium waves-effect" data-bs-dismiss="modal">
                                                    Close
                                                </button>
                                            </div>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                            <?php endforeach ?>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="addUser" role="tabpanel" aria-labelledby="addUser-tab">
                        <div class="row">
                            <div class="col-12">
                                <!-- --------------------- start Grid With Row Label ---------------- -->
                                <div class="card">
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <h5 class="mb-0">User Blacklist Form</h5>
                                        </div>
                                        <form action="<?= base_url('createUserPeroranganBlacklist') ?>" method="post" enctype="multipart/form-data">
                                            <?= csrf_field(); ?>
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label for="nik">NIK Terlapor</label>
                                                        <div class="mb-3">
                                                            <input type="text" class="form-control" name="nik" id="nik" placeholder="NIK Terlapor" required />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="nama">Nama Terlapor</label>
                                                        <div class="mb-3">
                                                            <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Terlapor" required />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="no_hp">No HP Terlapor</label>
                                                        <div class="mb-3">
                                                            <input type="text" class="form-control" name="no_hp" id="no_hp" value="62" placeholder="No HP Terlapor" required />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="foto_ktp">Upload KTP Terlapor</label>
                                                        <div class="mb-3">
                                                            <input type="file" class="form-control" name="foto_ktp" id="foto_ktp" placeholder="Upload KTP Terlapor" required />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="merk">Merk</label>
                                                        <div class="mb-3">
                                                            <input type="text" class="form-control" name="merk" id="merk" placeholder="Merk" required />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="type_alat">Type Alat</label>
                                                        <div class="mb-3">
                                                            <input type="text" class="form-control" name="type_alat" id="type_alat" placeholder="Tipe Alat" required />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="no_seri">No Seri</label>
                                                        <div class="mb-3">
                                                            <input type="text" class="form-control" name="no_seri" id="no_seri" placeholder="No Seri" required />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="surat_perjanjian">Upload Bukti Surat Perjanjian</label>
                                                        <div class="mb-3">
                                                            <input type="file" class="form-control" name="surat_perjanjian" id="surat_perjanjian" placeholder="Upload Bukti Surat Perjanjian" required />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="foto_alat">Foto ALat</label>
                                                        <div class="mb-3">
                                                            <input type="file" class="form-control" name="foto_alat" id="foto_alat" placeholder="Foto Alat" required />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="foto_serah_terima_alat">Foto Serah Terima ALat</label>
                                                        <div class="mb-3">
                                                            <input type="file" class="form-control" name="foto_serah_terima_alat" id="foto_serah_terima_alat" placeholder="Foto Serah Terima Alat" required />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="jenis_pelanggaran">Jenis Pelanggaran</label>
                                                        <div class="mb-3">
                                                            <select name="jenis_pelanggaran" id="jenis_pelanggaran" class="form-control" required>
                                                                <option value=''>Pilih Jenis Pelanggaran</option>
                                                                <option value='Menggelapkan Alat'>Menggelapkan Alat</option>
                                                                <option value='Tidak Membayar Sewa'>Tidak Membayar Sewa</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="mulai_rental">Mulai Rental</label>
                                                        <div class="mb-3">
                                                            <input type="date" class="form-control" name="mulai_rental" id="mulai_rental" placeholder="Mulai Rental" required />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="akhir_rental">Akhir Rental</label>
                                                        <div class="mb-3">
                                                            <input type="date" class="form-control" name="akhir_rental" id="akhir_rental" placeholder="Akhir Rental" required />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="bukti_lainnya">Upload Bukti Lainnya</label>
                                                        <div class="mb-3">
                                                            <input type="file" class="form-control" name="bukti_lainnya" id="bukti_lainnya" placeholder="Upload Bukti Lainnya" required />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="nominal_kerugian">Nominal Kerugian</label>
                                                        <div class="mb-3">
                                                            <input type="text" class="form-control" name="nominal_kerugian" id="nominal_kerugian" placeholder="Nominal Kerugian" required />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="keterangan">Keterangan</label>
                                                        <div class="mb-3">
                                                            <input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Keterangan" required />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-actions">
                                                <div class="text-end">
                                                    <button type="submit" class="btn bg-primary-subtle text-primary font-medium">
                                                        Submit
                                                    </button>
                                                    <button type="reset" class="btn bg-danger-subtle text-danger font-medium">
                                                        Reset
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- --------------------- end Grid With Row Label---------------- -->
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="addPerusahaan" role="tabpanel" aria-labelledby="addPerusahaan-tab">
                        <p>
                            add perusahaan blacklist
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- --------------------- end Tab with dropdown---------------- -->
    </div>
</div>


<?= $this->endSection(); ?>