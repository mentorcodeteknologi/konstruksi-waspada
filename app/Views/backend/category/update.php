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
        <form action="<?= base_url('backend/category/update/' . base64_encode($detail_category['id'])) ?>" method="post" enctype="multipart/form-data">
          <div class="row">
            <div class="col-md-12">
              <div class="mb-4">
                <label for="category" class="form-label">Kategori<span class="text-danger">*</span></label>
                <input type="text" name="category" required placeholder="Kategori..." value="<?= $detail_category['category']?>" class="form-control" id="category">
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