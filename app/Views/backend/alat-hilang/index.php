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
        <a href="<?= base_url('backend/alat_hilang/create') ?>" id="btn-add-contact" class="btn btn-info d-flex align-items-center">
          <i class="ti ti-users text-white me-1 fs-5"></i> Tambah <?= $title; ?>
        </a>
      </div>

    </div>
  </div>
  <div class="card card-body">
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
              <td>Rp. <?= number_format($value['nominal_kerugian'], 0, '', '.') ?></td>
              <td>
                <?php
                if ($value['valid'] == null) {
                  echo "Menunggu Validasi";
                } else if ($value['valid'] == 0) {
                  echo "Tidak Valid";
                } else {
                  echo "Valid";
                }
                ?>
              </td>
              <td>
                <?php if ($session->get('role') == "admin") { ?>
                  <a href="<?= base_url('backend/alat_hilang/update/' . $value['slug']) ?>" class="btn btn-info btn-sm mb-2">Edit</a>
                  <form action="<?= base_url('backend/alat_hilang/delete/' . $value['slug']); ?>" method="post">
                    <button type="submit" class="btn btn-danger btn-sm mb-2" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                  </form>
                  <?php if ($value['valid'] == null) { ?>
                    <form action="<?= base_url('backend/alat_hilang/validation/' . $value['slug']); ?>" method="post">
                      <button type="submit" class="btn btn-success btn-sm mb-2" onclick="return confirm('Apakah Anda yakin ingin memvalidasi data ini?')">Validasi</button>
                    </form>
                    <form action="<?= base_url('backend/alat_hilang/notvalid/' . $value['slug']); ?>" method="post">
                      <button type="submit" class="btn btn-warning btn-sm" onclick="return confirm('Apakah Anda yakin ingin bahwa data ini tidak valid?')">Tidak Valid</button>
                    </form>
                  <?php } ?>
                <?php } ?>
              </td>

            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<?= $this->endSection() ?>