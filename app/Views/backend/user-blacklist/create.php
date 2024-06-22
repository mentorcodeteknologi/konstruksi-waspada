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
        <form action="<?= base_url('backend/user_blacklist/create') ?>" method="post" enctype="multipart/form-data">
          <?= csrf_field() ?>
          <div class="row">
            <div class="col-md-6">
              <div class="mb-4">
                <label for="label" class="form-label">NIK</label>
                <input type="text" name="nik" id="nik" class="form-control" placeholder="NIK User" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-4">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama User Blacklist" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-4">
                <label for="nama" class="form-label">Foto KTP</label>
                <input type="file" name="foto_ktp" id="foto_ktp" class="form-control" accept=".jpg,.png,.jpeg" required>
                <img src="" id="viewImg" class="img-fluid mt-2" width="200px">
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-4">
                <label for="no_hp" class="form-label">No HP</label>
                <input type="text" name="no_hp" id="no_hp" class="form-control" value="62" placeholder="No HP" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-4">
                <label for="merk" class="form-label">Merk</label>
                <input type="text" name="merk" id="merk" class="form-control" placeholder="Merk" required>

              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-4">
                <label for="type_alat" class="form-label">Type Alat</label>
                <input type="text" name="type_alat" id="type_alat" class="form-control" placeholder="Type Alat" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-4">
                <label for="no_seri" class="form-label">No Seri</label>
                <input type="text" name="no_seri" id="no_seri" class="form-control" placeholder="Nomer Seri" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-4">
                <label for="surat_perjanjian" class="form-label">Surat Perjanjian</label>
                <input type="file" name="surat_perjanjian" id="surat_perjanjian" class="form-control" accept="image/*,.pdf,.doc,.docx,.txt" required>
                <img src="" id="viewImg" class="img-fluid mt-2" width="200px">
              </div>
            </div>

            <div class="col-md-6">
              <div class="mb-4">
                <label for="foto_alat" class="form-label">Foto Alat</label>
                <input type="file" name="foto_alat" id="foto_alat" class="form-control" accept=".jpg,.png,.jpeg" required>
                <img src="" id="viewImg" class="img-fluid mt-2" width="200px">
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-4">
                <label for="foto_serah_terima_alat" class="form-label">Foto Serah Terima Alat</label>
                <input type="file" name="foto_serah_terima_alat" id="foto_serah_terima_alat" class="form-control" accept=".jpg,.png,.jpeg" required>
                <img src="" id="viewImg" class="img-fluid mt-2" width="200px">
              </div>
            </div>

            <div class="col-md-6">
              <div class="mb-4">
                <label for="mulai_rental" class="form-label">Mulai Rental</label>
                <input type="date" name="mulai_rental" id="mulai_rental" class="form-control" placeholder="Mulai Rental" required value="<?= date('Y-m-d') ?>">
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-4">
                <label for="akhir_rental" class="form-label">Akhir Rental</label>
                <input type="date" name="akhir_rental" id="akhir_rental" class="form-control" placeholder="Akhir Rental" required value="<?= date('Y-m-d') ?>">
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-4">
                <label for="jenis_pelanggaran" class="form-label">Jenis Pelanggaran</label>
                <Select name="jenis_pelanggaran" id="jenis_pelanggaran" class="form-control" required>
                  <option value=''>Pilih Jenis Pelanggaran</option>
                  <option value='Menggelapkan Alat'>Menggelapkan Alat</option>
                  <option value='Tidak Membayar Sewa'>Tidak Membayar Sewa</option>
                </Select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-4">
                <label for="bukti_lainnya" class="form-label">Bukti Lainnya</label>
                <input type="file" name="bukti_lainnya" id="bukti_lainnya" class="form-control" accept=".jpg,.png,.jpeg">
                <img src="" id="viewImg" class="img-fluid mt-2" width="200px">
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-4">
                <label for="nominal_kerugian" class="form-label">Nominal Kerugian</label>
                <input type="text" name="nominal_kerugian" id="nominal_kerugian" class="form-control" placeholder="Nominal Kerugian" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-4">
                <label for="keterangan" class="form-label">Keterangan</label>
                <input type="text" name="keterangan" id="keterangan" class="form-control" placeholder="Keterangan">
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