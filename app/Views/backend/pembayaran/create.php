<?= $this->extend('backend/main') ?>

<?= $this->section('content') ?>
<?= $this->include('backend/layouts/card') ?>

<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="border-bottom title-part-padding">
        <h4 class="card-title mb-0"><?= $subtitle; ?></h4>
      </div>
      <div class="card-body">
        <form action="<?= base_url('backend/pembayaran/create') ?>" method="post" enctype="multipart/form-data">
          <div class="row">
            <div class="col-md-6">
              <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" name="nama" class="form-control" placeholder="Nama User" value="<?= session('nama'); ?>" required readonly>
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-4">
                <label for="jumlah_pembayaran" class="form-label">Jumlah Pembayaran</label>
                <input type="number" name="jumlah_pembayaran" id="jumlah_pembayaran" class="form-control" placeholder="Jumlah Pembayaran" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-4">
                <label for="bukti_pembayaran" class="form-label">Bukti Pembayaran</label>
                <input type="file" name="bukti_pembayaran" id="bukti_pembayaran" class="form-control" accept=".jpg,.png,.jpeg" required>
                <img src="" id="viewImg" class="img-fluid mt-2" width="200px">
              </div>
            </div>


          </div>
          <button class="btn btn-info rounded-pill px-4 mt-3" type="submit">
            Submit
          </button>
        </form>
      </div>
    </div>

  </div>
</div>

<?= $this->endSection() ?>