<?= $this->extend('backend/main') ?>

<?= $this->section('content') ?>
<?= $this->include('backend/layouts/card') ?>
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
                <a href="<?= base_url('backend/pembayaran/create') ?>" id="btn-add-contact" class="btn btn-info d-flex align-items-center">
                    <i class="ti ti-users text-white me-1 fs-5"></i> Tambah <?= $title; ?>
                </a>
            </div>
        </div>
    </div>
    <div class="card card-body">
        <div class="table-responsive table-desi">
            <table class="all-package coupon-table table table-striped">
                <thead>
                    <tr class="text-center">
                        <th>No</th>
                        <th>Nama User</th>
                        <th>Jumlah Pembayaran</th>
                        <th>Bukti Pembayaran</th>
                        <th>Status</th>
                        <?php if (session('role') != "users") { ?>
                            <th>Action</th>
                        <?php } ?>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $no = 1;
                    foreach ($list_pembayaran as $value) { ?>
                        <tr>
                            <td class="text-center"><?= $no++ ?></td>
                            <td><?= $value['nama_user'] ?></td>
                            <td class="text-end">Rp. <?= number_format($value['jumlah_pembayaran'], 0, '', '.') ?></td>

                            <td class="text-center">
                                <a href="<?= base_url('assets/backend/images/pembayaran/' . $value['bukti_pembayaran']) ?>" target="_blank">Lihat Bukti Pembayaran</a>
                            </td>
                            <td class="text-center">
                                <?php
                                if ($value['validasi_pembayaran'] == null) {
                                    echo "<span class='badge bg-primary'>Masih Dalam Proses</span>";
                                } else if ($value['validasi_pembayaran'] == 0) {
                                    echo "<span class='badge bg-danger'>Tidak Valid</span>";
                                } else {
                                    echo "<span class='badge bg-success'>Valid</span>";
                                }
                                ?>
                            </td>

                            <?php if (session('role') != "users") { ?>
                                <td class="text-center">
                                    <?php if ($value['validasi_pembayaran'] == null) { ?>
                                        <form action="<?= base_url('backend/pembayaran/validasi/' . $value['slug']); ?>" method="post">
                                            <button type="submit" class="btn btn-success btn-sm mb-2" onclick="return confirm('Apakah Anda yakin validasi data ini?')">Validasi Pembayaran</button>
                                        </form>
                                        <form action="<?= base_url('backend/pembayaran/tidakvalid/' . $value['slug']); ?>" method="post">
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin data ini tidak valid?')">Tidak Valid</button>
                                        <?php } else { ?>
                                            -
                                        <?php } ?>
                                </td>
                            <?php } ?>

                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection() ?>