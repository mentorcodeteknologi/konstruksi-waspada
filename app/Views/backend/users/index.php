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
        <a href="<?= base_url('backend/users/create')?>" id="btn-add-contact" class="btn btn-info d-flex align-items-center">
          <i class="ti ti-users text-white me-1 fs-5"></i> Tambah <?= $title; ?>
        </a>
      </div>

      <!-- <div class="modal fade" id="addContactModal" tabindex="-1" role="dialog" aria-labelledby="addContactModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
          <div class="modal-content p-2">
            <div class="modal-header d-flex align-items-center">
              <h5 class="modal-title"><?= $title; ?></h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('register') ?>" method="post" enctype="multipart/form-data">
              <div class="modal-body">
                <div class="add-contact-box">
                  <div class="add-contact-content">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="mb-3">
                          <label for="email" class="form-label">Email</label>
                          <input type="email" name="email" required class="form-control i-email" placeholder="contoh@admin.com" id="email" aria-describedby="emailHelp">
                          <span class="validation-text text-danger"></span>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="mb-4">
                          <label for="password" class="form-label">Password</label>
                          <input type="password" name="password" required placeholder="***********" class="form-control i-password" id="password">
                          <span class="validation-text text-danger"></span>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="mb-4">
                          <label for="nama" class="form-label">Nama</label>
                          <input type="text" name="nama" required placeholder="Nama..." class="form-control i-nama" id="nama">
                          <span class="validation-text text-danger"></span>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="mb-4">
                          <label for="id_card" class="form-label">NIK/NPWP</label>
                          <input type="text" name="id_card" required placeholder="..................." class="form-control i-id_card" id="id_card">
                          <span class="validation-text text-danger"></span>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="mb-4">
                          <label for="no_hp" class="form-label">No. HP (Whatsapp)</label>
                          <input type="text" name="no_hp" required placeholder="62......." class="form-control i-no_hp" id="no_hp">
                          <span class="validation-text text-danger"></span>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="mb-4">
                          <label for="alamat" class="form-label">Alamat</label>
                          <textarea class="form-control i-alamat" required name="alamat" id="alamat" cols="20" rows="1" placeholder="Alamat..."></textarea>
                          <span class="validation-text text-danger"></span>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="mb-4">
                          <label for="perusahaan" class="form-label">Nama Perusahaan</label>
                          <input type="text" name="perusahaan" required placeholder="Nama Perusahaan" class="form-control i-perusahaan" id="perusahaan">
                          <span class="validation-text text-danger"></span>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="mb-4">
                          <label for="jabatan" class="form-label">Jabatan</label>
                          <input type="text" name="jabatan" required placeholder="Jabatan....." class="form-control i-jabatan" id="jabatan">
                          <span class="validation-text text-danger"></span>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="mb-4">
                          <label for="foto" class="form-label">Foto</label>
                          <input class="form-control" required name="foto" type="file" id="formFile">
                          <span class="validation-text text-danger"></span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button id="btn-add" class="btn btn-success rounded-pill px-4">Add</button>
                <button id="btn-edit" class="btn btn-success rounded-pill px-4">Save</button>
                <button class="btn btn-danger rounded-pill px-4" data-bs-dismiss="modal"> Discard </button>
              </div>
            </form>
          </div>
        </div>
      </div> -->
      <!-- Konten tambahan di sini -->
    </div>
  </div>
  <?= $table; ?>
</div>

<?= $this->endSection() ?>