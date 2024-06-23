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
                <form action="<?= base_url('backend/artikel/update/' . $detail_artikel['slug']) ?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-4">
                                <label for="judul" class="form-label">Judul<span class="text-danger">*</span></label>
                                <input type="text" name="judul" id="judul" class="form-control" value="<?= $detail_artikel['judul'] ?>" placeholder="Judul" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-4">
                                <label for="isi" class="form-label">Isi<span class="text-danger">*</span></label>
                                <textarea name="isi" id="isi" rows="5" class="form-control" placeholder="Isi Artikel" required><?= $detail_artikel['isi'] ?></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-4">
                                <label for="url" class="form-label">URL Youtube</label>
                                <input type="text" name="url" id="url" value="<?= $detail_artikel['url'] ?>" class="form-control" placeholder="Url Youtube">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-4">
                                <label for="deskripsi" class="form-label">Deskripsi Youtube</label>
                                <textarea name="deskripsi" rows="5" id="deskripsi" class="form-control" placeholder="Deskripsi"><?= $detail_artikel['deskripsi'] ?></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-4">
                                <label for="deskripsi" class="form-label">Kategori<span class="text-danger">*</span></label>
                                <select name="id_categories" id="id_categories" class="form-control" required>
                                    <option value="">Pilih Kategori</option>
                                    <?php foreach ($category as $row) { ?>
                                        <option value="<?= $row['id'] ?>" <?= $detail_artikel['id_categories'] == $row['id'] ? 'selected' : '' ?> ><?= $row['category'] ?></option>
                                    <?php } ?>
                                </select>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-4">
                                <label for="gambar" class="form-label">Gambar</label>
                                <input type="file" name="gambar" id="gambar" class="form-control" accept=".jpg,.png,.jpeg">
                                <img src="<?= base_url('assets/backend/images/artikel/' . $detail_artikel['gambar']) ?>" width="100px" height="100px" class="center">
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