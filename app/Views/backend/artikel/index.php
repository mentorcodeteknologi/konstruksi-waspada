<?= $this->extend('backend/main') ?>
<?= $this->section('content') ?>
<?= $this->include('backend/layouts/card') ?>
<div class="card card-body">
    <div class="row">
        <div class="col-md-4 col-xl-3">
            <form class="position-relative">
                <input type="text" class="form-control product-search ps-5" id="input-search" placeholder="Search <?= $title; ?>..." />
                <i class="ti ti-search position-absolute top-50 start-0 translate-middle-y fs-6 text-dark ms-3"></i>
            </form>

        </div>
        <div class="col-md-8 col-xl-9 text-end d-flex justify-content-md-end justify-content-center mt-3 mt-md-0">
            <a href="<?= base_url('backend/artikel/create') ?>" id="btn-add-contact" class="btn btn-info d-flex align-items-center">
                <i class="ti ti-users text-white me-1 fs-5"></i> Tambah <?= $title; ?>
            </a>
        </div>
    </div>
</div>
<div class="row">
    <?php if (count($list_artikel) > 0) { ?>
        <div class="col-md-6 col-lg-12">
            <div class="card blog position-relative overflow-hidden hover-img" style="background-image: url(<?= base_url('assets/backend/images/artikel/' . $list_artikel[0]['gambar']) ?>);">
                <div class="card-body position-relative">
                    <div class="d-flex flex-column justify-content-between h-100">
                        <div class="d-flex align-items-start justify-content-between">
                            <div class="position-relative" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Mollie Underwood">
                                <img src="<?= base_url('assets/new_frontend') ?>/images/profile/user-1.jpg" alt="" class="rounded-circle img-fluid" width="40" height="40">
                            </div>
                            <span class="badge text-bg-primary rounded-3 fs-2 fw-semibold"><?= $list_artikel[0]['category_name']; ?></span>
                        </div>
                        <div>
                            <a href="<?= base_url('backend/artikel/update/' . $list_artikel[0]['slug']) ?>" class="fs-7 my-4 fw-semibold text-white d-block lh-sm"><?= $list_artikel[0]['judul']; ?></a>
                            <div class="d-flex align-items-center gap-4">
                                <!-- <div class="d-flex align-items-center gap-2 text-white fs-3 fw-normal">
                                    <a href="<?= base_url('backend/artikel/update')?>" class="text-white"><i class="ti ti-eye fs-5"></i></a>
                                </div> -->
                                <div class="d-flex align-items-center gap-2 text-white fs-3 fw-normal">
                                    <a href="<?= base_url('backend/artikel/update/' . $list_artikel[0]['slug']) ?>" class="text-white"><i class="ti ti-pencil fs-5"></i></a>
                                </div>
                                <div class="d-flex align-items-center gap-2 text-white fs-3 fw-normal">
                                    <a href="<?= base_url('backend/artikel/delete/' . $list_artikel[0]['slug']) ?>" class="text-white" onclick="return confirm('Ingin menghapus data?')"><i class="ti ti-trash fs-5"></i></a>
                                </div>
                                <div class="d-flex align-items-center gap-1 text-white fw-normal ms-auto">
                                    <i class="ti ti-point"></i>
                                    <small><?= date('l, d F Y', strtotime($list_artikel[0]['created_at'])) ?></small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    <?php foreach ($list_artikel as $index => $value) {
        if ($index > 0) {
    ?>
            <div class="col-md-6 col-lg-4">
                <div class="card rounded-2 overflow-hidden hover-img">
                    <div class="position-relative">
                        <a href="<?= base_url('backend/artikel/update/' . $value['slug']) ?>"><img src="<?= base_url('assets/backend/images/artikel/' . $value['gambar']) ?>" class="card-img-top rounded-0" alt="..."></a>
                        <span class="badge text-bg-light fs-2 rounded-4 lh-sm mb-9 me-9 py-1 px-2 fw-semibold position-absolute bottom-0 end-0"><?= $value['author']; ?></span>
                        <img src="<?= base_url('assets/new_frontend') ?>/images/profile/user-1.jpg" alt="" class="img-fluid rounded-circle position-absolute bottom-0 start-0 mb-n9 ms-9" width="40" height="40" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="<?= $value['author']; ?>">
                    </div>
                    <div class="card-body p-4">
                        <span class="badge text-bg-light fs-2 rounded-4 py-1 px-2 lh-sm  mt-3"><?= $value['category_name']; ?></span>
                        <a class="d-block my-4 fs-5 text-dark fw-semibold" href="<?= base_url('backend/artikel/update/' . $value['slug']) ?>"><?= $value['judul']; ?></a>
                        <div class="d-flex align-items-center gap-4">
                            <!-- <div class="d-flex align-items-center gap-2"><a href="#"><i class="ti ti-eye fs-5"></i></a></div> -->
                            <div class="d-flex align-items-center gap-2"><a href="<?= base_url('backend/artikel/update/' . $value['slug']) ?>"><i class="ti ti-pencil fs-5"></i></a></div>
                            <div class="d-flex align-items-center gap-2"><a href="<?= base_url('backend/artikel/delete/' . $value['slug']) ?>" onclick="return confirm('Ingin menghapus data?')"><i class="ti ti-trash fs-5"></i></a></div>
                            <div class="d-flex align-items-center fs-2 ms-auto"><i class="ti ti-point text-dark"></i> <?= date('l, d F Y', strtotime($value['created_at'])) ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    <?php }
    } ?>
    <?= $pager->links('artikel', 'custom_pagination') ?>
    


</div>
<div class="mb-5"></div>
<?= $this->endSection() ?>