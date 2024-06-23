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
        <form action="<?= base_url('backend/alat_hilang/create') ?>" method="post" enctype="multipart/form-data">
          <?= csrf_field() ?>
          <div class="row">
            <div class="col-md-6">
              <div class="mb-4">
                <label for="tanggal_kehilangan" class="form-label">Tanggal Kehilangan<span class="text-danger">*</span></label>
                <input type="date" name="tanggal_kehilangan" id="tanggal_kehilangan" class="form-control" placeholder="Tanggal Kehilangan" required value="<?= date('Y-m-d') ?>">
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-4">
                <label for="type_alat" class="form-label">Type Alat<span class="text-danger">*</span></label>
                <input type="text" name="type_alat" id="type_alat" class="form-control" placeholder="Type Alat" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-4">
                <label for="merk" class="form-label">Merk<span class="text-danger">*</span></label>
                <input type="text" name="merk" id="merk" class="form-control" placeholder="Merk" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-4">
                <label for="serial_number" class="form-label">Serial Number<span class="text-danger">*</span></label>
                <input type="text" name="serial_number" id="serial_number" class="form-control" placeholder="Serial Number" required>
              </div>
            </div>
            
            <div class="col-md-6">
              <div class="mb-4">
                <label for="pembelian_dari" class="form-label">Pembelian Dari<span class="text-danger">*</span></label>
                <input type="text" name="pembelian_dari" id="pembelian_dari" class="form-control" placeholder="Pembelian Dari">
              </div>
            </div>
            
            <div class="col-md-6">
              <div class="mb-4">
                <label for="lokasi_kehilangan" class="form-label">Lokasi Kehilangan<span class="text-danger">*</span></label>
                <input type="text" name="lokasi_kehilangan" id="lokasi_kehilangan" class="form-control" placeholder="Lokasi Kehilangan" required>
              </div>
            </div>
            
            <div class="col-md-6">
              <div class="mb-4">
                <label for="nominal_kerugian" class="form-label">Nominal Kerugian<span class="text-danger">*</span></label>
                <input type="number" name="nominal_kerugian" id="nominal_kerugian" class="form-control" placeholder="Nominal Kerugian" required>
              </div>
            </div>
            <div class="col-md-12">
              <div class="mb-4">
                <label for="kronologi" class="form-label">Kronologi<span class="text-danger">*</span></label>
                <textarea name="kronologi" class="form-control" id="kronologi" cols="30" rows="10" required></textarea>
              </div>
            </div>

            <span>Lampiran</span>
            <hr class="form-label">
            <div class="col-md-6">
              <div class="mb-4">
                <label for="surat_kepemilikian" class="form-label">Surat Kepemilikan<span class="text-danger">*</span></label>
                <input type="file" name="surat_kepemilikian" id="surat_kepemilikian" class="form-control" accept="image/*,.pdf,.doc,.docx,.txt" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-4">
                <label for="foto" class="form-label">Foto<span class="text-danger">*</span></label>
                <input type="file" name="foto" id="foto" class="form-control" accept="image/*,.pdf,.doc,.docx,.txt" required>
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