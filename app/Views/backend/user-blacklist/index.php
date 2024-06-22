<?= $this->extend('backend/main') ?>

<?= $this->section('content') ?>
<?= $this->include('backend/layouts/card') ?>
<?php $session = session(); ?>
<div class="widget-content searchable-container list">
  <div class="card card-body">
    <div class="row">
      <div class="col-md-4 col-xl-3">
        <form class="position-relative">
          <input type="text" class="form-control product-search ps-5" id="input-search" placeholder="Search <?= $title; ?>..." />
          <i class="ti ti-search position-absolute top-50 start-0 translate-middle-y fs-6 text-dark ms-3"></i>
        </form>

      </div>
      <div class="col-md-8 col-xl-9 text-end d-flex justify-content-md-end justify-content-center mt-3 mt-md-0">
        <a href="<?= base_url('backend/user_blacklist/create') ?>" id="btn-add-contact" class="btn btn-info d-flex align-items-center">
          <i class="ti ti-users text-white me-1 fs-5"></i> Tambah <?= $title; ?>
        </a>
      </div>

    </div>
  </div>
  <div class="card card-body">
    <div class="table-responsive">
      <table class="all-package coupon-table table table-striped">
        <thead>
          <tr>
            <th>No</th>
            <th>Perusahaan Penyedia Sewa</th>
            <th>NIK Terlapor</th>
            <th>Nama Terlapor</th>
            <!-- <th>Valid</th> -->
            <th>Jenis Pelanggaran</th>
            <th>Merk</th>
            <th>Type Alat</th>
            <th>No Seri</th>
            <th>Durasi</th>
            <th>Keterangan</th>
            <th>Nominal Kerugian</th>
            <!-- <th>Created At</th>
            <th>Updated At</th> -->
            <th>Action</th>
          </tr>
        </thead>

        <tbody>
          <?php
          $no = 1;
          foreach ($list_user_blacklist as $value) { ?>
            <tr class="text-center">
              <td><?= $no++ ?></td>
              <td><?= $value['perusahaan'] ?></td>
              <td><?= $value['nik'] ?></td>
              <td><?= $value['nama'] ?></td>
              <!-- <td><?= $value['valid'] ?></td> -->
              <td><?= $value['jenis_pelanggaran'] ?></td>
              <td><?= $value['merk'] ?></td>
              <td><?= $value['type_alat'] ?></td>
              <td><?= $value['no_seri'] ?></td>
              <td><?= $value['durasi'] . " Bulan" ?></td>
              <td><?= $value['keterangan'] ?></td>
              <td>Rp. <?= number_format($value['nominal_kerugian'], 0, '', '.') ?></td>
              <!-- <td><?= $value['created_at'] ?></td>
              <td><?= $value['updated_at'] ?></td> -->
              <td>
                <div class="dropdown">
                  <a class="text-decoration-none" href="javascript:void(0)" id="dd3" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="ti ti-dots fs-4"></i>
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="dd3">
                    <li>
                      <a href="<?= base_url('backend/user_blacklist/update/' . $value['slug']); ?>" class="dropdown-item d-flex align-items-center text-warning">Edit</a>
                      <a href="<?= base_url('backend/user_blacklist/detail/' . $value['slug']); ?>" class="dropdown-item d-flex align-items-center text-info">Detail</a>
                      <a href="<?= base_url('backend/user_blacklist/delete/' . $value['slug']); ?>" class="dropdown-item d-flex align-items-center text-danger" onclick="return confirm('Ingin menghapus data ?')">Delete</a>
                      <?php if ($session->get('role') == "admin" && $value['valid'] == null) { ?>
                        <a href="<?= base_url('backend/user_blacklist/validation/' . $value['slug']); ?>" class="dropdown-item d-flex align-items-center text-success" onclick="return confirm('Apakah Anda yakin ingin validasi data ini?')">Valid</a>
                        <a href="<?= base_url('backend/user_blacklist/tidakvalid/' . $value['slug']); ?>" class="dropdown-item d-flex align-items-center text-dark" onclick="return confirm('Apakah Anda yakin ingin tidak  validasi data ini?')">Tidak Valid</a>
                      <?php } ?>
                    </li>
                  </ul>
                </div>
              </td>

            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<?= $this->endSection() ?>