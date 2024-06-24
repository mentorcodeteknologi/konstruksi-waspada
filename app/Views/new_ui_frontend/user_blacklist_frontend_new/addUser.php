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