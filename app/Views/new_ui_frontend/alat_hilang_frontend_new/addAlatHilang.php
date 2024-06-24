<div class="card">
    <div class="card-body">
        <div class="mb-3">
            <h5 class="mb-0">Form Kehilangan Alat</h5>
        </div>
        <form action="<?= base_url('alat_hilang/createAlatHilang') ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <div class="form-body">
                <div class="row">
                    <div class="col-md-6">
                        <label for="type_alat">Type ALat</label>
                        <div class="mb-3">
                            <input type="text" class="form-control" name="type_alat" id="type_alat" placeholder="Type Alat" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="merk">Merk</label>
                        <div class="mb-3">
                            <input type="text" class="form-control" name="merk" id="merk" placeholder="Merk" required />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="serial_number">Serial Number</label>
                        <div class="mb-3">
                            <input type="text" class="form-control" name="serial_number" id="serial_number" placeholder="Serial Number" required />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="foto">Upload Foto Alat</label>
                        <div class="mb-3">
                            <input type="file" class="form-control" name="foto" id="foto" placeholder="Upload Foto Alat" accept="image/*,.pdf,.doc,.docx,.txt" required />
                            <!-- <img src="" id="viewImg" class="img-fluid mt-2" width="200px"> -->
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="pembelian_dari">Pembelian Dari</label>
                        <div class="mb-3">
                            <input type="text" class="form-control" name="pembelian_dari" id="pembelian_dari" placeholder="Pembelian Dari" required />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="tanggal_kehilangan">Tanggal Kehilangan</label>
                        <div class="mb-3">
                            <input type="date" class="form-control" name="tanggal_kehilangan" id="tanggal_kehilangan" placeholder="Tanggal Kehilangan<" required />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="surat_kepemilikian">Upload Surat Kepemilikan/Kwetansi</label>
                        <div class="mb-3">
                            <input type="file" class="form-control" name="surat_kepemilikian" id="surat_kepemilikian" placeholder="Upload Surat Kepemilikan/Kwetansi" accept="image/*,.pdf,.doc,.docx,.txt" required />
                            <!-- <img src="" id="viewImg" class="img-fluid mt-2" width="200px"> -->
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="lokasi_kehilangan">Lokasi Kehilangan</label>
                        <div class="mb-3">
                            <input type="text" class="form-control" name="lokasi_kehilangan" id="lokasi_kehilangan" placeholder="Lokasi Kehilangan" required />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="nominal_kerugian">Nominal Kerugian (Rp.)</label>
                        <div class="mb-3">
                            <input type="number" class="form-control" name="nominal_kerugian" id="nominal_kerugian" placeholder="Nominal Kerugian (Rp.)" required />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="kronologi">Kronologis Kejadian </label>
                            <textarea name="kronologi" id="kronologi" cols="30" rows="10" class="form-control"></textarea>
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