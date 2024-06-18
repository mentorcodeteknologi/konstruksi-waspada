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
        <!-- <div class="col-md-6 col-lg-8">
            <div class="card blog position-relative overflow-hidden hover-img" style="background-image: url(./assets/images/blog/blog-img9.jpg);">
                <div class="card-body position-relative">
                    <div class="d-flex flex-column justify-content-between h-100">
                        <div class="d-flex align-items-start justify-content-between">
                            <div class="position-relative" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Mollie Underwood">
                                <img src="<?= base_url('assets/new_frontend') ?>/images/profile/user-4.jpg" alt="" class="rounded-circle img-fluid" width="40" height="40">
                            </div>
                            <span class="badge text-bg-primary rounded-3 fs-2 fw-semibold">Gadget</span>
                        </div>
                        <div>
                            <a href="./details.html" class="fs-7 my-4 fw-semibold text-white d-block lh-sm">Early Black Friday
                                Amazon deals: cheap TVs, headphones, laptops</a>
                            <div class="d-flex align-items-center gap-4">
                                <div class="d-flex align-items-center gap-2 text-white fs-3 fw-normal">
                                    <i class="ti ti-eye fs-5"></i>
                                    6006
                                </div>
                                <div class="d-flex align-items-center gap-2 text-white fs-3 fw-normal">
                                    <i class="ti ti-message-2 fs-5"></i>
                                    3
                                </div>
                                <div class="d-flex align-items-center gap-1 text-white fw-normal ms-auto">
                                    <i class="ti ti-point"></i>
                                    <small>Fri, Jan 13</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4">
            <div class="card blog position-relative overflow-hidden hover-img" style="background-image: url(./assets/images/blog/blog-img10.jpg);">
                <div class="card-body position-relative">
                    <div class="d-flex flex-column justify-content-between h-100">
                        <div class="d-flex align-items-start justify-content-between">
                            <div class="position-relative" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Francisco Quinn">
                                <img src="<?= base_url('assets/new_frontend') ?>/images/profile/user-5.jpg" alt="" class="rounded-circle img-fluid" width="40" height="40">
                            </div>
                            <span class="badge text-bg-primary rounded-3 fs-2 fw-semibold">Health</span>
                        </div>
                        <div>
                            <a href="./details.html" class="fs-7 my-4 fw-semibold text-white d-block lh-sm">Presented by Max
                                Rushden with Barry Glendenning, Philippe Auclair</a>
                            <div class="d-flex align-items-center gap-4">
                                <div class="d-flex align-items-center gap-2 text-white fs-3 fw-normal">
                                    <i class="ti ti-eye fs-5"></i>
                                    713
                                </div>
                                <div class="d-flex align-items-center gap-2 text-white fs-3 fw-normal">
                                    <i class="ti ti-message-2 fs-5"></i>
                                    3
                                </div>
                                <div class="d-flex align-items-center gap-1 text-white fw-normal ms-auto">
                                    <i class="ti ti-point"></i>
                                    <small>Wed, Jan 18</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <?php foreach ($artikel as $a) : ?>
            <div class="col-md-6 col-lg-4">
                <div class="card rounded-2 overflow-hidden hover-img">
                    <div class="position-relative">
                        <a href="<?= base_url('blog_details/' . $a['slug']) ?>"><img src="<?= base_url('assets/backend/images/artikel/' . $a['gambar']) ?>" class="img-fluid blur-up lazyload bg-img" alt=""></a>

                        <img src="<?= base_url('assets/new_frontend') ?>/images/profile/user-1.jpg" alt="" class="img-fluid rounded-circle position-absolute bottom-0 start-0 mb-n9 ms-9" width="40" height="40" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="<?= $a['author']; ?>">
                    </div>
                    <div class="card-body p-4">
                        <span class="badge text-bg-light fs-2 rounded-4 py-1 px-2 lh-sm  mt-3">Posted By : <?= $a['author']; ?></span>
                        <a class="d-block my-4 fs-5 text-dark fw-semibold" href="<?= base_url('blog_details/' . $a['slug']) ?>"><?= $a['judul']; ?></a>
                        <p class="d-block my-4 fs-5 text-dark fw-semibold"><?= substr($a['isi'], 0, 150); ?></p>
                        <div class="d-flex align-items-center gap-4">
                            <div class="d-flex align-items-center gap-2"><i class="ti ti-eye text-dark fs-5"></i><?= $a['views']; ?></div>
                            <div class="d-flex align-items-center gap-2"><i class="ti ti-heart text-dark fs-5"></i><?= $a['likes']; ?></div>
                            <div class="d-flex align-items-center fs-2 ms-auto"><i class="ti ti-point text-dark"><?= date('d-m-Y', strtotime($a['created_at'])); ?></i>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
        <!-- <div class="col-md-6 col-lg-4">
            <div class="card rounded-2 overflow-hidden hover-img">
                <div class="position-relative">
                    <a href="javascript:void(0)"><img src="<?= base_url('assets/new_frontend') ?>/images/blog/blog-img11.jpg" class="card-img-top rounded-0" alt="..."></a>
                    <span class="badge text-bg-light fs-2 rounded-4 lh-sm mb-9 me-9 py-1 px-2 fw-semibold position-absolute bottom-0 end-0">2
                        min Read</span>
                    <img src="<?= base_url('assets/new_frontend') ?>/images/profile/user-2.jpg" alt="" class="img-fluid rounded-circle position-absolute bottom-0 start-0 mb-n9 ms-9" width="40" height="40" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Walter Palmer">
                </div>
                <div class="card-body p-4">
                    <span class="badge text-bg-light fs-2 rounded-4 py-1 px-2 lh-sm  mt-3">Social</span>
                    <a class="d-block my-4 fs-5 text-dark fw-semibold" href="">Intel loses bid to revive antitrust case
                        against patent foe Fortress</a>
                    <div class="d-flex align-items-center gap-4">
                        <div class="d-flex align-items-center gap-2"><i class="ti ti-eye text-dark fs-5"></i>4,150</div>
                        <div class="d-flex align-items-center gap-2"><i class="ti ti-message-2 text-dark fs-5"></i>38</div>
                        <div class="d-flex align-items-center fs-2 ms-auto"><i class="ti ti-point text-dark"></i>Sun, Jan 15
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4">
            <div class="card rounded-2 overflow-hidden hover-img">
                <div class="position-relative">
                    <a href="javascript:void(0)"><img src="<?= base_url('assets/new_frontend') ?>/images/blog/blog-img8.jpg" class="card-img-top rounded-0" alt="..."></a>
                    <span class="badge text-bg-light fs-2 rounded-4 lh-sm mb-9 me-9 py-1 px-2 fw-semibold position-absolute bottom-0 end-0">2
                        min Read</span>
                    <img src="<?= base_url('assets/new_frontend') ?>/images/profile/user-3.jpg" alt="" class="img-fluid rounded-circle position-absolute bottom-0 start-0 mb-n9 ms-9" width="40" height="40" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Miguel Kennedy">
                </div>
                <div class="card-body p-4">
                    <span class="badge text-bg-light fs-2 rounded-4 py-1 px-2 lh-sm  mt-3">Health</span>
                    <a class="d-block my-4 fs-5 text-dark fw-semibold" href="">COVID outbreak deepens as more lockdowns
                        loom in China</a>
                    <div class="d-flex align-items-center gap-4">
                        <div class="d-flex align-items-center gap-2"><i class="ti ti-eye text-dark fs-5"></i>9,480</div>
                        <div class="d-flex align-items-center gap-2"><i class="ti ti-message-2 text-dark fs-5"></i>12</div>
                        <div class="d-flex align-items-center fs-2 ms-auto"><i class="ti ti-point text-dark"></i>Sat, Jan 14
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4">
            <div class="card rounded-2 overflow-hidden hover-img">
                <div class="position-relative">
                    <a href="javascript:void(0)"><img src="<?= base_url('assets/new_frontend') ?>/images/blog/blog-img5.jpg" class="card-img-top rounded-0" alt="..."></a>
                    <span class="badge text-bg-light fs-2 rounded-4 lh-sm mb-9 me-9 py-1 px-2 fw-semibold position-absolute bottom-0 end-0">2
                        min Read</span>
                    <img src="<?= base_url('assets/new_frontend') ?>/images/profile/user-5.jpg" alt="" class="img-fluid rounded-circle position-absolute bottom-0 start-0 mb-n9 ms-9" width="40" height="40" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Esther Lindsey">
                </div>
                <div class="card-body p-4">
                    <span class="badge text-bg-light fs-2 rounded-4 py-1 px-2 lh-sm  mt-3">Lifestyle</span>
                    <a class="d-block my-4 fs-5 text-dark fw-semibold" href="">Streaming video way before it was cool, go
                        dark tomorrow</a>
                    <div class="d-flex align-items-center gap-4">
                        <div class="d-flex align-items-center gap-2"><i class="ti ti-eye text-dark fs-5"></i>2252</div>
                        <div class="d-flex align-items-center gap-2"><i class="ti ti-message-2 text-dark fs-5"></i>3</div>
                        <div class="d-flex align-items-center fs-2 ms-auto"><i class="ti ti-point text-dark"></i>Sat, Jan 14
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4">
            <div class="card rounded-2 overflow-hidden hover-img">
                <div class="position-relative">
                    <a href="javascript:void(0)"><img src="<?= base_url('assets/new_frontend') ?>/images/blog/blog-img3.jpg" class="card-img-top rounded-0" alt="..."></a>
                    <span class="badge text-bg-light fs-2 rounded-4 lh-sm mb-9 me-9 py-1 px-2 fw-semibold position-absolute bottom-0 end-0">2
                        min Read</span>
                    <img src="<?= base_url('assets/new_frontend') ?>/images/profile/user-3.jpg" alt="" class="img-fluid rounded-circle position-absolute bottom-0 start-0 mb-n9 ms-9" width="40" height="40" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Leroy Greer">
                </div>
                <div class="card-body p-4">
                    <span class="badge text-bg-light fs-2 rounded-4 py-1 px-2 lh-sm  mt-3">Design</span>
                    <a class="d-block my-4 fs-5 text-dark fw-semibold" href="">Apple is apparently working on a new
                        ‘streamlined’ accessibility for iOS</a>
                    <div class="d-flex align-items-center gap-4">
                        <div class="d-flex align-items-center gap-2"><i class="ti ti-eye text-dark fs-5"></i>5860</div>
                        <div class="d-flex align-items-center gap-2"><i class="ti ti-message-2 text-dark fs-5"></i>38</div>
                        <div class="d-flex align-items-center fs-2 ms-auto"><i class="ti ti-point text-dark"></i>Fri, Jan 13
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4">
            <div class="card rounded-2 overflow-hidden hover-img">
                <div class="position-relative">
                    <a href="javascript:void(0)"><img src="<?= base_url('assets/new_frontend') ?>/images/blog/blog-img2.jpg" class="card-img-top rounded-0" alt="..."></a>
                    <span class="badge text-bg-light fs-2 rounded-4 lh-sm mb-9 me-9 py-1 px-2 fw-semibold position-absolute bottom-0 end-0">2
                        min Read</span>
                    <img src="<?= base_url('assets/new_frontend') ?>/images/profile/user-2.jpg" alt="" class="img-fluid rounded-circle position-absolute bottom-0 start-0 mb-n9 ms-9" width="40" height="40" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Tommy Butler">
                </div>
                <div class="card-body p-4">
                    <span class="badge text-bg-light fs-2 rounded-4 py-1 px-2 lh-sm  mt-3">Lifestyle</span>
                    <a class="d-block my-4 fs-5 text-dark fw-semibold" href="">After Twitter Staff Cuts, Survivors Face
                        ‘Radio Silence</a>
                    <div class="d-flex align-items-center gap-4">
                        <div class="d-flex align-items-center gap-2"><i class="ti ti-eye text-dark fs-5"></i>6315</div>
                        <div class="d-flex align-items-center gap-2"><i class="ti ti-message-2 text-dark fs-5"></i>12</div>
                        <div class="d-flex align-items-center fs-2 ms-auto"><i class="ti ti-point text-dark"></i>Wed, Jan 11
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4">
            <div class="card rounded-2 overflow-hidden hover-img">
                <div class="position-relative">
                    <a href="javascript:void(0)"><img src="<?= base_url('assets/new_frontend') ?>/images/blog/blog-img4.jpg" class="card-img-top rounded-0" alt="..."></a>
                    <span class="badge text-bg-light fs-2 rounded-4 lh-sm mb-9 me-9 py-1 px-2 fw-semibold position-absolute bottom-0 end-0">2
                        min Read</span>
                    <img src="<?= base_url('assets/new_frontend') ?>/images/profile/user-4.jpg" alt="" class="img-fluid rounded-circle position-absolute bottom-0 start-0 mb-n9 ms-9" width="40" height="40" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Donald Holmes">
                </div>
                <div class="card-body p-4">
                    <span class="badge text-bg-light fs-2 rounded-4 py-1 px-2 lh-sm  mt-3">Design</span>
                    <a class="d-block my-4 fs-5 text-dark fw-semibold" href="">Why Figma is selling to Adobe for $20
                        billion</a>
                    <div class="d-flex align-items-center gap-4">
                        <div class="d-flex align-items-center gap-2"><i class="ti ti-eye text-dark fs-5"></i>7570</div>
                        <div class="d-flex align-items-center gap-2"><i class="ti ti-message-2 text-dark fs-5"></i>38</div>
                        <div class="d-flex align-items-center fs-2 ms-auto"><i class="ti ti-point text-dark"></i>Wed, Jan 11
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4">
            <div class="card rounded-2 overflow-hidden hover-img">
                <div class="position-relative">
                    <a href="javascript:void(0)"><img src="<?= base_url('assets/new_frontend') ?>/images/blog/blog-img1.jpg" class="card-img-top rounded-0" alt="..."></a>
                    <span class="badge text-bg-light fs-2 rounded-4 lh-sm mb-9 me-9 py-1 px-2 fw-semibold position-absolute bottom-0 end-0">2
                        min Read</span>
                    <img src="<?= base_url('assets/new_frontend') ?>/images/profile/user-1.jpg" alt="" class="img-fluid rounded-circle position-absolute bottom-0 start-0 mb-n9 ms-9" width="40" height="40" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Eric Douglas">
                </div>
                <div class="card-body p-4">
                    <span class="badge text-bg-light fs-2 rounded-4 py-1 px-2 lh-sm  mt-3">Gadget</span>
                    <a class="d-block my-4 fs-5 text-dark fw-semibold" href="">Garmins Instinct Crossover is a rugged
                        hybrid smartwatch</a>
                    <div class="d-flex align-items-center gap-4">
                        <div class="d-flex align-items-center gap-2"><i class="ti ti-eye text-dark fs-5"></i>6763</div>
                        <div class="d-flex align-items-center gap-2"><i class="ti ti-message-2 text-dark fs-5"></i>12</div>
                        <div class="d-flex align-items-center fs-2 ms-auto"><i class="ti ti-point text-dark"></i>Tue, Jan 10
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
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