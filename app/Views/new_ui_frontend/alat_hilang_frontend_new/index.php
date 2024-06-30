<?= $this->extend('new_ui_frontend/layouts_new/main'); ?>
<?= $this->section('content'); ?>
<?php
// SESSION UNTUK MENGAMBIL DATA SESSION
$session = session();
?>

<div class="container-fluid">
    <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold mb-8">Alat Hilang</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a class="text-muted text-decoration-none" href="<?= base_url("/"); ?>">Home</a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page">Alat Hilang</li>
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

    <?php
    // NOTIFIKASI BERHASIL SIMPAN DATA
    if (session()->getFlashdata('success')) {
        echo '<div class="alert alert-success alert-dismissible">
                ' . session()->getFlashdata('success') . '</div>';
    }
    ?>
    <div class="col-md-12">
        <!-- ---------------------start Tab with dropdown ---------------- -->
        <div class="card">
            <div class="card-body">
                <div class="mb-3">
                    <?php if (!$session->get('logged_in')) : ?>
                        <h6 class="mb-0">Untuk melihat data silahkan login terlebih dahulu</h6>
                    <?php endif; ?>
                </div>
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="alathilang-tab" data-bs-toggle="tab" href="#alathilang" role="tab" aria-controls="alathilang" aria-expanded="true">
                            <span>List alat hilang</span>
                        </a>
                    </li>
                    <?php if ($session->get('logged_in')) : ?>
                        <li class="nav-item">
                            <a class="nav-link" id="addAlatHilang-tab" data-bs-toggle="tab" href="#addAlatHilang" role="tab" aria-controls="addAlatHilang">
                                <span>Add alat hilang</span>
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
                <div class="tab-content tabcontent-border p-3" id="myTabContent">
                    <?php
                    $is_logged_in = $session->get('logged_in');
                    ?>
                    <div role="tabpanel" class="tab-pane fade show active" id="alathilang" aria-labelledby="alathilang-tab">
                        <div class="row">
                            <?php if ($session->get('logged_in')) : ?>
                                <?php foreach ($list_alat_hilang as $value) : ?>
                                    <div class="col-md-4">
                                        <div class="card hover-img <?= $is_logged_in ? '' : 'blur' ?>">
                                            <div class="card-body p-4 text-center border-bottom">
                                                <img src="<?= base_url('assets/new_frontend') ?>/images/profile/user-1.jpg" alt="" class="rounded-circle mb-3" width="80" height="80">
                                                <h5 class="fw-semibold mb-0 fs-5">Pemilik Alat : <?= $value['nama'] ?></h5>
                                            </div>
                                            <ul class="px-2 py-2 list-unstyled d-flex align-items-center justify-content-center mb-0">
                                                <button class="btn bg-primary-subtle text-primary mb-3 w-50" data-bs-toggle="modal" data-bs-target="#with-grid-modal<?= $value['slug'] ?>">Detail</button>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="modal fade" id="with-grid-modal<?= $value['slug'] ?>" tabindex="-1" aria-labelledby="scroll-long-inner-modal" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable">
                                            <div class="modal-content">
                                                <div class="modal-header d-flex align-items-center">
                                                    <h4 class="modal-title" id="myLargeModalLabel">
                                                        Detail
                                                    </h4>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="container-fluid">
                                                        <div class="card-body p-4 text-center">
                                                            <img src="<?= base_url('assets/new_frontend') ?>/images/profile/user-1.jpg" alt="" class="rounded-circle mb-3" width="80" height="80">
                                                            <div class="row m-3 text-start">
                                                                <div class="col">
                                                                    Pemilik ALat : <?= $value['nama'] ?>
                                                                </div>
                                                            </div>
                                                            <div class="row m-3 text-start">
                                                                <div class="col">
                                                                    Nomor HP : <?= $value['no_hp'] ?>
                                                                </div>
                                                            </div>
                                                            <div class="row m-3 text-start">
                                                                <div class="col">
                                                                    Merk dan Tipe Alat : <?= $value['merk'] ?> - <?= $value['type_alat'] ?>
                                                                </div>
                                                            </div>
                                                            <div class="row m-3 text-start">
                                                                <div class="col">
                                                                    Serial Number : <?= $value['serial_number'] ?>
                                                                </div>
                                                            </div>
                                                            <div class="row m-3 text-start">
                                                                <div class="col">
                                                                    Tanggal Kehilangan : <?= date('d-m-Y', strtotime($value['tanggal_kehilangan']))  ?>
                                                                </div>
                                                            </div>
                                                            <div class="row m-3 text-start">
                                                                <div class="col">
                                                                    Lokasi Kehilangan : <?= $value['lokasi_kehilangan'] ?>
                                                                </div>
                                                            </div>
                                                            <div class="row m-3 text-start">
                                                                <div class="col">
                                                                    Kronologis Kejadian : <?= $value['kronologi'] ?>
                                                                </div>
                                                            </div>
                                                            <div class="row m-3 text-start">
                                                                <div class="col">
                                                                    Status Kepemilikan :
                                                                    <?php
                                                                    if ($value['valid'] == null) {
                                                                        echo "Menunggu Validasi";
                                                                    } else if ($value['valid'] == 0) {
                                                                        echo "Tidak Valid";
                                                                    } else {
                                                                        echo "Valid";
                                                                    }
                                                                    ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn bg-danger-subtle text-danger font-medium waves-effect text-start" data-bs-dismiss="modal">
                                                        Close
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- sample modal content -->
                                <?php endforeach ?>
                            <?php else : ?>
                                <div class="col-md-4">
                                    <div class="card hover-img <?= $is_logged_in ? '' : 'blur' ?>">
                                        <div class="card-body p-4 text-center border-bottom">
                                            <img src="<?= base_url('assets/new_frontend') ?>/images/profile/user-1.jpg" alt="" class="rounded-circle mb-3" width="80" height="80">
                                            <h5 class="fw-semibold mb-0 fs-5">Pemilik Alat : xxxxxx</h5>
                                        </div>
                                        <ul class="px-2 py-2 list-unstyled d-flex align-items-center justify-content-center mb-0">
                                            <button class="btn bg-primary-subtle text-primary mb-3 w-50" data-bs-toggle="modal" data-bs-target="#with-grid-modal">Detail</button>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card hover-img <?= $is_logged_in ? '' : 'blur' ?>">
                                        <div class="card-body p-4 text-center border-bottom">
                                            <img src="<?= base_url('assets/new_frontend') ?>/images/profile/user-1.jpg" alt="" class="rounded-circle mb-3" width="80" height="80">
                                            <h5 class="fw-semibold mb-0 fs-5">Pemilik Alat : xxxxxx</h5>
                                        </div>
                                        <ul class="px-2 py-2 list-unstyled d-flex align-items-center justify-content-center mb-0">
                                            <button class="btn bg-primary-subtle text-primary mb-3 w-50" data-bs-toggle="modal" data-bs-target="#with-grid-modal">Detail</button>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card hover-img <?= $is_logged_in ? '' : 'blur' ?>">
                                        <div class="card-body p-4 text-center border-bottom">
                                            <img src="<?= base_url('assets/new_frontend') ?>/images/profile/user-1.jpg" alt="" class="rounded-circle mb-3" width="80" height="80">
                                            <h5 class="fw-semibold mb-0 fs-5">Pemilik Alat : xxxxxx</h5>
                                        </div>
                                        <ul class="px-2 py-2 list-unstyled d-flex align-items-center justify-content-center mb-0">
                                            <button class="btn bg-primary-subtle text-primary mb-3 w-50" data-bs-toggle="modal" data-bs-target="#with-grid-modal">Detail</button>
                                        </ul>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="addAlatHilang" role="tabpanel" aria-labelledby="addAlatHilang-tab">
                        <div class="row">
                            <div class="col-12">
                                <!-- --------------------- start Grid With Row Label ---------------- -->
                                <?= $this->include("new_ui_frontend/alat_hilang_frontend_new/addAlatHilang"); ?>
                                <!-- --------------------- end Grid With Row Label---------------- -->
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- --------------------- end Tab with dropdown---------------- -->
    </div>
</div>


<?= $this->endSection(); ?>