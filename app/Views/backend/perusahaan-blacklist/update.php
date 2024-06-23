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
        <form action="<?= base_url('backend/perusahaan_blacklist/update/' . $detail_perusahaan_blacklist['slug']) ?>" method="post" enctype="multipart/form-data">
          <?= csrf_field() ?>
          <div class="row">
            <div class="col-md-6">
              <div class="mb-4">
                <label for="npwp" class="form-label">NPWP<span class="text-danger">*</span></label>
                <input type="text" name="npwp" id="npwp" class="form-control" placeholder="No NPWP" value="<?= $detail_perusahaan_blacklist['npwp'] ?>" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-4">
                <label for="nama" class="form-label">Nama Perusahaan<span class="text-danger">*</span></label>
                <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama Perusahaan Blacklist" value="<?= $detail_perusahaan_blacklist['nama'] ?>" required>
              </div>
            </div>

            <div class="col-md-6">
              <div class="mb-4">
                <label for="nama_penanggung_jawab" class="form-label">Nama Penanggung Jawab<span class="text-danger">*</span></label>
                <input type="text" name="nama_penanggung_jawab" id="nama_penanggung_jawab" class="form-control" value="<?= $detail_perusahaan_blacklist['nama_penanggung_jawab'] ?>" placeholder="Nama Penanggung Jawab" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-4">
                <label for="no_hp" class="form-label">No HP<span class="text-danger">*</span></label>
                <input type="text" name="no_hp" id="no_hp" class="form-control" value="62" placeholder="No HP" value="<?= $detail_perusahaan_blacklist['no_hp'] ?>" required>

              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-4">
                <label for="merk" class="form-label">Merk<span class="text-danger">*</span></label>
                <input type="text" name="merk" id="merk" class="form-control" placeholder="Merk" value="<?= $detail_perusahaan_blacklist['merk'] ?>" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-4">
                <label for="type_alat" class="form-label">Type Alat<span class="text-danger">*</span></label>
                <input type="text" name="type_alat" id="type_alat" class="form-control" placeholder="Type Alat" value="<?= $detail_perusahaan_blacklist['type_alat'] ?>" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-4">
                <label for="no_seri" class="form-label">No Seri<span class="text-danger">*</span></label>
                <input type="text" name="no_seri" id="no_seri" class="form-control" placeholder="Nomer Seri" value="<?= $detail_perusahaan_blacklist['no_seri'] ?>" required>
              </div>
            </div>

            
            <div class="col-md-6">
              <div class="mb-4">
                <label for="jenis_pelanggaran" class="form-label">Jenis Pelanggaran<span class="text-danger">*</span></label>
                <Select name="jenis_pelanggaran" id="jenis_pelanggaran" class="form-control" required>
                  <option value=''>Pilih Jenis Pelanggaran</option>
                  <option value='Menggelapkan Alat' <?= $detail_perusahaan_blacklist['jenis_pelanggaran'] ==  'Menggelapkan Alat' ? 'selected' : '' ?>>Menggelapkan Alat</option>
                  <option value='Tidak Membayar Sewa' <?= $detail_perusahaan_blacklist['jenis_pelanggaran'] ==  'Tidak Membayar Sewa' ? 'selected' : '' ?>>Tidak Membayar Sewa</option>
                </Select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-4">
                <label for="mulai_rental" class="form-label">Mulai Rental<span class="text-danger">*</span></label>
                <input type="date" name="mulai_rental" id="mulai_rental" class="form-control" placeholder="Mulai Rental" required value="<?= date('Y-m-d', strtotime($detail_perusahaan_blacklist['mulai_rental'])) ?>">
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-4">
                <label for="akhir_rental" class="form-label">Akhir Rental<span class="text-danger">*</span></label>
                <input type="date" name="akhir_rental" id="akhir_rental" class="form-control" placeholder="Akhir Rental" required value="<?= date('Y-m-d', strtotime($detail_perusahaan_blacklist['akhir_rental'])) ?>">
              </div>
            </div>

            
            <div class="col-md-6">
              <div class="mb-4">
                <label for="nominal_kerugian" class="form-label">Nominal Kerugian<span class="text-danger">*</span></label>
                <input type="number" name="nominal_kerugian" id="nominal_kerugian" class="form-control" placeholder="Nominal Kerugian" value="<?= $detail_perusahaan_blacklist['nominal_kerugian'] ?>" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-4">
                <label for="keterangan" class="form-label">Keterangan</label>
                <input type="text" name="keterangan" id="keterangan" class="form-control" value="<?= $detail_perusahaan_blacklist['keterangan'] ?>" placeholder="Keterangan">
              </div>
            </div>
            <span>Lampiran</span>
            <hr class="form-label">
            <div class="col-md-6">
              <div class="mb-4">
                <labe for="foto_npwp" class="form-label">Foto NPWP</labe>
                <input type="file" name="foto_npwp" id="foto_npwp" class="form-control" accept=".jpg,.png,.jpeg">
                <img src="<?= base_url('assets/backend/images/perusahaan_blacklist/' . $detail_perusahaan_blacklist['slug'] . "/" . $detail_perusahaan_blacklist['foto_npwp']) ?>" width="100px" height="100px" class="center">
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-4">
                <label for="surat_perjanjian" class="form-label">Surat Perjanjian</label>
                <input type="file" name="surat_perjanjian" id="surat_perjanjian" class="form-control" accept="image/*,.pdf,.doc,.docx,.txt">
                <a href="<?= base_url('assets/backend/images/perusahaan_blacklist/' . $detail_perusahaan_blacklist['slug'] . "/" . $detail_perusahaan_blacklist['surat_perjanjian']) ?>" target="_blank">Lihat Surat Perjanjian</a>
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-4">
                <label for="foto_alat" class="form-label">Foto Alat</label>
                <input type="file" name="foto_alat" id="foto_alat" class="form-control" accept=".jpg,.png,.jpeg">
                <img src="<?= base_url('assets/backend/images/perusahaan_blacklist/' . $detail_perusahaan_blacklist['slug'] . "/" . $detail_perusahaan_blacklist['foto_alat']) ?>" width="100px" height="100px" class="center">
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-4">
                <label for="foto_serah_terima_alat" class="form-label">Foto Serah Terima Alat</label>
                <input type="file" name="foto_serah_terima_alat" id="foto_serah_terima_alat" class="form-control" accept=".jpg,.png,.jpeg">
                <img src="<?= base_url('assets/backend/images/perusahaan_blacklist/' . $detail_perusahaan_blacklist['slug'] . "/" . $detail_perusahaan_blacklist['foto_serah_terima_alat']) ?>" width="100px" height="100px" class="center">
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-4">
                <label for="bukti_lainnya" class="form-label">Bukti Lainnya</label>
                <input type="file" name="bukti_lainnya" id="bukti_lainnya" class="form-control" accept=".jpg,.png,.jpeg">
                <img src="<?= base_url('assets/backend/images/perusahaan_blacklist/' . $detail_perusahaan_blacklist['slug'] . "/" . $detail_perusahaan_blacklist['bukti_lainnya']) ?>" width="100px" height="100px" class="center">
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