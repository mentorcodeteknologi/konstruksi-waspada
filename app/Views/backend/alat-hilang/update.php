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
        <form action="<?= base_url('backend/alat_hilang/update/' . $detail_alat_hilang['slug']) ?>" method="post" enctype="multipart/form-data">
          <?= csrf_field() ?>
          <div class="row">
            <div class="col-md-6">
              <div class="mb-4">
                <label for="tanggal_kehilangan" class="form-label">Tanggal Kehilangan</label>
                <input type="date" name="tanggal_kehilangan" id="tanggal_kehilangan" class="form-control" placeholder="tanggal_kehilangan" value="<?= $detail_alat_hilang['tanggal_kehilangan'] ?>" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-4">
                <label for="type_alat" class="form-label">Type Alat</label>
                <input type="text" name="type_alat" id="type_alat" class="form-control" placeholder="Type Alat" value="<?= $detail_alat_hilang['type_alat'] ?>" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-4">
                <label for="merk" class="form-label">Merk</label>
                <input type="text" name="merk" id="merk" class="form-control" placeholder="Merk" value="<?= $detail_alat_hilang['merk'] ?>" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-4">
                <label for="serial_number" class="form-label">Serial Number</label>
                <input type="text" name="serial_number" id="serial_number" class="form-control" placeholder="serial_number" value="<?= $detail_alat_hilang['serial_number'] ?>" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-4">
                <label for="foto" class="form-label">Foto</label>
                <input type="file" name="foto" id="foto" class="form-control" accept=".jpg,.png,.jpeg">

              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-4">
                <label for="pembelian_dari" class="form-label">Pembelian Dari</label>
                <input type="text" name="pembelian_dari" id="pembelian_dari" class="form-control" placeholder="pembelian_dari" value="<?= $detail_alat_hilang['pembelian_dari'] ?>" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-4">
                <label for="surat_kepemilikian" class="form-label">Surat Kepemilikan</label>
                <input type="file" name="surat_kepemilikian" id="surat_kepemilikian" class="form-control" accept="image/*,.pdf,.doc,.docx,.txt">
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-4">
                <label for="lokasi_kehilangan" class="form-label">Lokasi Kehilangan</label>
                <input type="text" name="lokasi_kehilangan" id="lokasi_kehilangan" class="form-control" placeholder="lokasi_kehilangan" value="<?= $detail_alat_hilang['lokasi_kehilangan'] ?>" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-4">
                <label for="nominal_kerugian" class="form-label">Nominal Kerugian</label>
                <input type="number" name="nominal_kerugian" id="nominal_kerugian" class="form-control" placeholder="nominal_kerugian" value="<?= $detail_alat_hilang['nominal_kerugian'] ?>" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-4">
                
                <div class="row border p-3">
                  <div class="col-2"> <label for="nominal_kerugian" class="form-label d-flex me-4">Foto</label></div>
                  <div class="col"> <img src="<?= base_url('assets/backend/images/alat_hilang/' . $detail_alat_hilang['foto']) ?>" width="100px" height="100px" class="center"></div>
                  <div class="col-2"> <label for="nominal_kerugian" class="form-label d-flex me-4">Surat</label></div>
                  <div class="col"> <a href="<?= base_url('assets/backend/images/alat_hilang/' . $detail_alat_hilang['surat_kepemilikian']) ?>" target="_blank">Lihat Surat</a></div>
                </div>
                
              </div>
            </div>
            <div class="col-md-12">
              <div class="mb-4">
                <label for="kronologi" class="form-label">Kronologi</label>
                <textarea name="kronologi" class="form-control" id="kronologi" cols="30" rows="10" required>
                <?= $detail_alat_hilang['kronologi'] ?>
                </textarea>
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