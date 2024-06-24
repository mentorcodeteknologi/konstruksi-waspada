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
        <form action="<?= base_url('backend/users/create') ?>" method="post" enctype="multipart/form-data">
          <div class="row">
            <div class="col-md-6">
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email<span class="text-danger">*</span></label>
                <input type="email" name="email" required class="form-control" placeholder="contoh@admin.com" id="exampleInputEmail1" aria-describedby="emailHelp">
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-4">
                <label for="exampleInputPassword1" class="form-label">Password<span class="text-danger">*</span></label>
                <input type="password" name="password" required placeholder="***********" class="form-control" id="exampleInputPassword1">
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-4">
                <label for="exampleInputPassword1" class="form-label">Nama<span class="text-danger">*</span></label>
                <input type="text" name="nama" required placeholder="Nama..." class="form-control" id="exampleInputPassword1">
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-4">
                <label for="exampleInputPassword1" class="form-label">NIK/NPWP<span class="text-danger">*</span></label>
                <input type="text" name="id_card" required placeholder="..................." class="form-control" id="exampleInputPassword1">
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-4">
                <label for="exampleInputPassword1" class="form-label">No. HP (Whatsapp)<span class="text-danger">*</span></label>
                <input type="text" name="no_hp" required placeholder="62......." class="form-control" id="exampleInputPassword1">
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-4">
                <label for="exampleInputPassword1" class="form-label">Alamat<span class="text-danger">*</span></label>
                <textarea class="form-control" required name="alamat" id="alamat" cols="20" rows="1" placeholder="Alamat..."></textarea>
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-4">
                <label for="exampleInputPassword1" class="form-label">Nama Perusahaan<span class="text-danger">*</span></label>
                <input type="text" name="perusahaan" required placeholder="Nama Perusahaan" class="form-control" id="exampleInputPassword1">
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-4">
                <label for="exampleInputPassword1" class="form-label">Jabatan<span class="text-danger">*</span></label>
                <input type="text" name="jabatan" required placeholder="Jabatan....." class="form-control" id="exampleInputPassword1">
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-4">
                <div class="form-group">
                  <label>Role<span class="text-danger">*</span></label>
                  <Select name="role" id="role" class="form-control" required>
                    <option value=''>Pilih Role</option>
                    <option value='admin'>Admin</option>
                    <option value='users'>Users</option>
                  </Select>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-4">
                <label for="exampleInputPassword1" class="form-label">Foto<span class="text-danger">*</span></label>
                <input class="form-control" required name="foto" type="file" id="formFile">
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-4">
                <div class="form-check">
                  <input class="form-check-input primary" type="checkbox" value="1" name="status" id="status" checked>
                  <label class="form-check-label text-dark" for="status">
                    Active?
                  </label>
                </div>
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