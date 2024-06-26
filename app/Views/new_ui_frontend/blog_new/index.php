<?= $this->extend('new_ui_frontend/layouts_new/main'); ?>
<?= $this->section('content'); ?>

<div class="container-fluid">
    <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold mb-8">Blog</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a class="text-muted text-decoration-none" href="<?= base_url("/"); ?>">Home</a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page">Blog</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-3">
                    <div class="text-center mb-n5">
                        <img src="<?= base_url('assets/new_frontend') ?>/images/breadcrumb/ChatBc.png" alt="" class="img-fluid mb-n4" />
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Artikel -->
        <div class="col-xl-9 col-lg-8 col-md-7">
            <div class="row">
                <?php foreach ($artikel as $a) : ?>
                    <div class="col-md-6 mb-4">
                        <div class="card rounded-2 overflow-hidden hover-img">
                            <div class="position-relative">
                                <a href="<?= base_url('blog_details/' . $a['slug']) ?>">
                                    <img src="<?= base_url('assets/backend/images/artikel/' . $a['gambar']) ?>" class="img-fluid blur-up lazyload bg-img" alt="">
                                </a>
                                <span class="badge text-bg-primary fs-2 rounded-4 lh-sm mb-9 me-9 py-1 px-2 fw-semibold position-absolute bottom-0 end-0"><?= $a['category_name']; ?></span>
                                <img src="<?= base_url('assets/new_frontend') ?>/images/profile/user-1.jpg" alt="" class="img-fluid rounded-circle position-absolute bottom-0 start-0 mb-n9 ms-9" width="40" height="40" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="<?= $a['author']; ?>">
                            </div>
                            <div class="card-body p-4">
                                <span class="badge text-bg-light fs-2 rounded-4 py-1 px-2 lh-sm mt-3">Posted By : <?= $a['author']; ?></span>
                                <span class="badge text-bg-light fs-2 rounded-4 py-1 px-2 lh-sm mt-3"><?= date('d-m-Y', strtotime($a['created_at'])); ?></span>
                                <a class="d-block my-4 fs-5 text-dark fw-semibold" href="<?= base_url('blog_details/' . $a['slug']) ?>"><?= $a['judul']; ?></a>
                                <p class="d-block my-4 fs-5 text-dark"><?= substr($a['isi'], 0, 150); ?></p>
                                <div class="d-flex align-items-center gap-4">
                                    <div class="d-flex align-items-center gap-2"><i class="ti ti-eye text-dark fs-5"></i><?= $a['views']; ?></div>
                                    <div class="d-flex align-items-center gap-2"><i class="ti ti-heart text-dark fs-5"></i><?= $a['likes']; ?></div>
                                    <!-- <div class="d-flex align-items-center fs-2 ms-auto"><i class="ti ti-point text-dark"><?= date('d-m-Y', strtotime($a['created_at'])); ?></i></div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
        <!-- Artikel -->

        <!-- Recent & Popular artikel -->
        <div class="col-xl-3 col-lg-4 col-md-5">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title fw-semibold">Recent Blog</h5>
                    <div class="card bg-primary-subtle shadow-none mb-0">
                        <div class="card-body px-3 py-4">
                            <?php foreach ($recentArtikel as $ra) : ?>
                                <div class="d-flex align-items-center mt-3 p-3 bg-hover-light-black rounded border-bottom">
                                    <div class="position-relative d-flex align-items-center">
                                        <img src="<?= base_url('assets/backend/images/artikel/' . $ra['gambar']) ?>" width="45" class="rounded" alt="album" />
                                        <div class="ms-3">
                                            <h6 class="mb-0 fw-semibold"><?= date('d-m-Y', strtotime($ra['created_at'])); ?></h6>
                                            <span class="fs-2"><?= $ra['likes']; ?> Likes</span>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach ?>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <h5 class="card-title fw-semibold">Popular Blog</h5>
                    <div class="card bg-primary-subtle shadow-none mb-0">
                        <div class="card-body px-3 py-4">
                            <?php foreach ($popularArtikel as $pa) : ?>
                                <div class="d-flex align-items-center mt-3 p-3 bg-hover-light-black rounded border-bottom">
                                    <div class="position-relative d-flex align-items-center">
                                        <img src="<?= base_url('assets/backend/images/artikel/' . $pa['gambar']) ?>" width="45" class="rounded" alt="album" />
                                        <div class="ms-3">
                                            <h6 class="mb-0 fw-semibold"><?= $pa['judul']; ?></h6>
                                            <span class="fs-2"><?= date('d', strtotime($pa['created_at'])); ?> - <?= date('M', strtotime($pa['created_at'])); ?></span>
                                            <p style="font-size: 10px;"><?= substr($pa['isi'], 0, 10); ?></p>
                                            <span style="font-size: 10px;"><?= $pa['views']; ?> Views</span>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- <nav aria-label="...">
        <ul class="pagination justify-content-center mb-0 mt-4">
            <li class="page-item">
                <a class="page-link border-0 rounded-circle text-dark round-32 d-flex align-items-center justify-content-center" href="#"><i class="ti ti-chevron-left"></i></a>
            </li>
            <li class="page-item active" aria-current="page">
                <a class="page-link border-0 rounded-circle round-32 mx-1 d-flex align-items-center justify-content-center" href="#">1</a>
            </li>
            <li class="page-item">
                <a class="page-link border-0 rounded-circle text-dark round-32 mx-1 d-flex align-items-center justify-content-center" href="#">2</a>
            </li>
            <li class="page-item">
                <a class="page-link border-0 rounded-circle text-dark round-32 mx-1 d-flex align-items-center justify-content-center" href="#">3</a>
            </li>
            <li class="page-item">
                <a class="page-link border-0 rounded-circle text-dark round-32 mx-1 d-flex align-items-center justify-content-center" href="#">4</a>
            </li>
            <li class="page-item">
                <a class="page-link border-0 rounded-circle text-dark round-32 mx-1 d-flex align-items-center justify-content-center" href="#">5</a>
            </li>
            <li class="page-item">
                <a class="page-link border-0 rounded-circle text-dark round-32 mx-1 d-flex align-items-center justify-content-center" href="#">...</a>
            </li>
            <li class="page-item">
                <a class="page-link border-0 rounded-circle text-dark round-32 mx-1 d-flex align-items-center justify-content-center" href="#">10</a>
            </li>
            <li class="page-item">
                <a class="page-link border-0 rounded-circle text-dark round-32 d-flex align-items-center justify-content-center" href="#"><i class="ti ti-chevron-right"></i></a>
            </li>
        </ul>
    </nav> -->
</div>
<?= $this->endSection(); ?>