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
            <div class="col-md-6 col-lg-4 ">
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
        <!-- Recent & Popular Blog -->
        <div class="col-md-6 col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title fw-semibold">Recent Blog</h5>
                    <!-- <p class="card-subtitle">What's Next in the World of Search?</p> -->
                    <!-- <div class="hstack my-4 gap-3">
                        <a role="alert" class="alert mb-0 py-2 badge bg-primary-subtle text-primary s rounded-pill d-flex align-items-center justify-content-between gap-2 ">Shiela On7 <span data-bs-dismiss="alert">
                                <i class="ti ti-square-x fs-4"></i>
                            </span>
                        </a>
                        <a role="alert" class="alert mb-0 py-2 badge bg-danger-subtle text-danger s rounded-pill d-flex align-items-center justify-content-between gap-2 ">Denny Caknan <span data-bs-dismiss="alert">
                                <i class="ti ti-square-x fs-4"></i>
                            </span>
                        </a>
                    </div> -->
                    <div class="card bg-primary-subtle shadow-none mb-0">
                        <div class="card-body px-3 py-4">
                            <!-- <div class="text-center">
                                <div class="mplayer">
                                    <div id="jp_container_N" class="jp-video-270p jp-state-no-volume">
                                        <div class="jp-type-playlist">
                                            <div id="jplayer_N" class="jp-jplayer hide"></div>
                                            <div class="jp-gui">
                                                <div class="jp-interface">
                                                    <img src="../assets/images/music/album3.jpg" class="rounded poster" alt="album" width="100" />
                                                    <h5 class="mt-3 mb-0 jp-title fw-semibold fs-5"></h5>
                                                    <span class="opacity-75 fs-3 jp-artist"></span>
                                                    <div class="jp-controls">
                                                        <div>
                                                            <a class="jp-repeat btn border-0 round-sm opacity-75 rounded-circle" title="repeat">
                                                                <i class="ti ti-repeat fs-4"></i>
                                                            </a>
                                                            <a class="jp-repeat-off hide btn border-0 round-sm rounded-circle" title="repeat off">
                                                                <i class="ti ti-repeat fs-4 text-primary"></i>
                                                            </a>
                                                        </div>
                                                        <div>
                                                            <a class="jp-previous btn border-0 round-sm opacity-75 rounded-circle">
                                                                <i class="ti ti-chevrons-left fs-4"></i>
                                                            </a>
                                                        </div>
                                                        <div>
                                                            <a class="jp-play btn border-0 text-bg-white text-primary round-sm rounded-circle">
                                                                <i class="ti ti-player-play fs-4"></i>
                                                            </a>
                                                            <a class="jp-pause btn border-0 text-bg-white text-primary round-sm rounded-circle">
                                                                <i class="ti ti-player-pause"></i>
                                                            </a>
                                                        </div>
                                                        <div>
                                                            <a class="jp-next btn border-0 round-sm opacity-75 rounded-circle">
                                                                <i class="ti ti-chevrons-right fs-4"></i>
                                                            </a>
                                                        </div>
                                                        <div>
                                                            <a class="jp-shuffle btn border-0 round-sm opacity-75 rounded-circle" title="shuffle">
                                                                <i class="ti ti-arrows-shuffle-2 fs-4"></i>
                                                            </a>
                                                            <a class="jp-shuffle-off hide btn border-0 round-sm rounded-circle" title="shuffle off">
                                                                <i class="ti ti-arrows-shuffle-2 fs-4 text-primary"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="jp-progress hidden-xs">
                                                        <div class="jp-seek-bar" style="width: 100%">
                                                            <div class="jp-play-bar play-progress" style="width: 0%"></div>
                                                            <div class="jp-current-time current-time"></div>
                                                            <div class="jp-duration duration"></div>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <a class="jp-mute " title="mute">
                                                            <i class="ti ti-volume-3 text-muted fs-4"></i>
                                                        </a>
                                                        <a class="jp-unmute" title="unmute">
                                                            <i class="ti ti-volume fs-4 text-primary"></i>
                                                        </a>
                                                    </div>
                                                    <div class="jp-volume jp-music-volume">
                                                        <div class="jp-volume-bar">
                                                            <div class="jp-volume-bar-value"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="jp-playlist dropup" id="playlist">
                                            <ul class="dropdown-menu bg-inverse m-b-0">
                                                <li class="list-group-item"></li>
                                            </ul>
                                        </div>
                                        <div class="jp-no-solution hide">
                                            <span>Update Required</span> To play the media you will need to either update your browser to a recent version or update your <a href="http://get.adobe.com/flashplayer/" target="_blank">Flash plugin</a>.
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                            <?php foreach ($recentArtikel as $ra) : ?>
                                <div class="d-flex align-items-center mt-3 p-3 bg-hover-light-black rounded border-bottom">
                                    <div class="position-relative d-flex align-items-center">
                                        <!-- <a href="javascript:void(0)" class="stretched-link "></a> -->
                                        <img src="<?= base_url('assets/backend/images/artikel/' . $ra['gambar']) ?>" width="45" class="rounded" alt="album" />
                                        <div class="ms-3">
                                            <h6 class="mb-0 fw-semibold"><?= date('d-m-Y', strtotime($a['created_at'])); ?></h6>
                                            <span class="fs-2"><?= $ra['likes']; ?> Likes</span>
                                        </div>
                                    </div>
                                    <!-- <div class="ms-auto">
                                        <div class="dropdown">
                                            <a class="" href="javascript:void(0)" id="m1" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="ti ti-dots-vertical fs-4"></i>
                                            </a>
                                            <ul class="dropdown-menu" aria-labelledby="m1">
                                                <li>
                                                    <a class="dropdown-item" href="#">
                                                        <i class="ti ti-share text-muted me-1 fs-4"></i>Share </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="#">
                                                        <i class="ti ti-download text-muted me-1 fs-4"></i>Download </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="#">
                                                        <i class="ti ti-info-circle text-muted me-1 fs-4"></i>Get Song Info </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div> -->
                                </div>
                                <div class="d-flex align-items-center mt-3 p-3 bg-hover-light-black rounded border-bottom">
                                    <div class="position-relative d-flex align-items-center">
                                        <!-- <a href="javascript:void(0)" class="stretched-link "></a> -->
                                        <img src="<?= base_url('assets/backend/images/artikel/' . $ra['gambar']) ?>" width="45" class="rounded" alt="album" />
                                        <div class="ms-3">
                                            <h6 class="mb-0 fw-semibold"><?= date('d-m-Y', strtotime($a['created_at'])); ?></h6>
                                            <span class="fs-2"><?= $ra['likes']; ?> Likes</span>
                                        </div>
                                    </div>
                                    <!-- <div class="ms-auto">
                                        <div class="dropdown">
                                            <a class="" href="javascript:void(0)" id="m1" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="ti ti-dots-vertical fs-4"></i>
                                            </a>
                                            <ul class="dropdown-menu" aria-labelledby="m1">
                                                <li>
                                                    <a class="dropdown-item" href="#">
                                                        <i class="ti ti-share text-muted me-1 fs-4"></i>Share </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="#">
                                                        <i class="ti ti-download text-muted me-1 fs-4"></i>Download </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="#">
                                                        <i class="ti ti-info-circle text-muted me-1 fs-4"></i>Get Song Info </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div> -->
                                </div>
                            <?php endforeach ?>
                            <!-- <div class="d-flex align-items-center bg-hover-light-black rounded p-3 border-bottom">
                                <div class="position-relative d-flex align-items-center">
                                    <a href="javascript:void(0)" class="stretched-link "></a>
                                    <img src="../assets/images/music/album2.jpg" width="45" alt="album" class="rounded" />
                                    <div class="ms-3">
                                        <h6 class="mb-0 fw-semibold">As It Was</h6>
                                        <span class="fs-2">As It Was</span>
                                    </div>
                                </div>
                                <div class="ms-auto">
                                    <div class="dropdown">
                                        <a class="" href="javascript:void(0)" id="m2" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="ti ti-dots-vertical fs-4"></i>
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="m2">
                                            <li>
                                                <a class="dropdown-item" href="#">
                                                    <i class="ti ti-share text-muted me-1 fs-4"></i>Share </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="#">
                                                    <i class="ti ti-download text-muted me-1 fs-4"></i>Download </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="#">
                                                    <i class="ti ti-info-circle text-muted me-1 fs-4"></i>Get Song Info </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center p-3 bg-hover-light-black rounded">
                                <div class="position-relative d-flex align-items-center">
                                    <a href="javascript:void(0)" class="stretched-link "></a>
                                    <img src="../assets/images/music/album4.jpg" width="45" alt="album" class="rounded" />
                                    <div class="ms-3">
                                        <h6 class="mb-0 fw-semibold text-truncate w-75">RedTape Anthem</h6>
                                        <span class="fs-2">RedTape Anthem</span>
                                    </div>
                                </div>
                                <div class="ms-auto">
                                    <div class="dropdown">
                                        <a class="" href="javascript:void(0)" id="m3" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="ti ti-dots-vertical fs-4"></i>
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="m3">
                                            <li>
                                                <a class="dropdown-item" href="#">
                                                    <i class="ti ti-share text-muted me-1 fs-4"></i>Share </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="#">
                                                    <i class="ti ti-download text-muted me-1 fs-4"></i>Download </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="#">
                                                    <i class="ti ti-info-circle text-muted me-1 fs-4"></i>Get Song Info </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center p-3 bg-hover-light-black rounded border-bottom">
                                <div class="position-relative d-flex align-items-center">
                                    <a href="javascript:void(0)" class="stretched-link "></a>
                                    <img src="../assets/images/music/album1.jpg" width="45" class="rounded" alt="album" />
                                    <div class="ms-3">
                                        <h6 class="mb-0 fw-semibold">Viva Las</h6>
                                        <span class="fs-2">Viva Las</span>
                                    </div>
                                </div>
                                <div class="ms-auto">
                                    <div class="dropdown">
                                        <a class="" href="javascript:void(0)" id="m1" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="ti ti-dots-vertical fs-4"></i>
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="m1">
                                            <li>
                                                <a class="dropdown-item" href="#">
                                                    <i class="ti ti-share text-muted me-1 fs-4"></i>Share </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="#">
                                                    <i class="ti ti-download text-muted me-1 fs-4"></i>Download </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="#">
                                                    <i class="ti ti-info-circle text-muted me-1 fs-4"></i>Get Song Info </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <h5 class="card-title fw-semibold">Popular Blog</h5>
                    <!-- <p class="card-subtitle">What's Next in the World of Search?</p> -->
                    <!-- <div class="hstack my-4 gap-3">
                        <a role="alert" class="alert mb-0 py-2 badge bg-primary-subtle text-primary s rounded-pill d-flex align-items-center justify-content-between gap-2 ">Shiela On7 <span data-bs-dismiss="alert">
                                <i class="ti ti-square-x fs-4"></i>
                            </span>
                        </a>
                        <a role="alert" class="alert mb-0 py-2 badge bg-danger-subtle text-danger s rounded-pill d-flex align-items-center justify-content-between gap-2 ">Denny Caknan <span data-bs-dismiss="alert">
                                <i class="ti ti-square-x fs-4"></i>
                            </span>
                        </a>
                    </div> -->
                    <div class="card bg-primary-subtle shadow-none mb-0">
                        <div class="card-body px-3 py-4">
                            <!-- <div class="text-center">
                                <div class="mplayer">
                                    <div id="jp_container_N" class="jp-video-270p jp-state-no-volume">
                                        <div class="jp-type-playlist">
                                            <div id="jplayer_N" class="jp-jplayer hide"></div>
                                            <div class="jp-gui">
                                                <div class="jp-interface">
                                                    <img src="../assets/images/music/album3.jpg" class="rounded poster" alt="album" width="100" />
                                                    <h5 class="mt-3 mb-0 jp-title fw-semibold fs-5"></h5>
                                                    <span class="opacity-75 fs-3 jp-artist"></span>
                                                    <div class="jp-controls">
                                                        <div>
                                                            <a class="jp-repeat btn border-0 round-sm opacity-75 rounded-circle" title="repeat">
                                                                <i class="ti ti-repeat fs-4"></i>
                                                            </a>
                                                            <a class="jp-repeat-off hide btn border-0 round-sm rounded-circle" title="repeat off">
                                                                <i class="ti ti-repeat fs-4 text-primary"></i>
                                                            </a>
                                                        </div>
                                                        <div>
                                                            <a class="jp-previous btn border-0 round-sm opacity-75 rounded-circle">
                                                                <i class="ti ti-chevrons-left fs-4"></i>
                                                            </a>
                                                        </div>
                                                        <div>
                                                            <a class="jp-play btn border-0 text-bg-white text-primary round-sm rounded-circle">
                                                                <i class="ti ti-player-play fs-4"></i>
                                                            </a>
                                                            <a class="jp-pause btn border-0 text-bg-white text-primary round-sm rounded-circle">
                                                                <i class="ti ti-player-pause"></i>
                                                            </a>
                                                        </div>
                                                        <div>
                                                            <a class="jp-next btn border-0 round-sm opacity-75 rounded-circle">
                                                                <i class="ti ti-chevrons-right fs-4"></i>
                                                            </a>
                                                        </div>
                                                        <div>
                                                            <a class="jp-shuffle btn border-0 round-sm opacity-75 rounded-circle" title="shuffle">
                                                                <i class="ti ti-arrows-shuffle-2 fs-4"></i>
                                                            </a>
                                                            <a class="jp-shuffle-off hide btn border-0 round-sm rounded-circle" title="shuffle off">
                                                                <i class="ti ti-arrows-shuffle-2 fs-4 text-primary"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="jp-progress hidden-xs">
                                                        <div class="jp-seek-bar" style="width: 100%">
                                                            <div class="jp-play-bar play-progress" style="width: 0%"></div>
                                                            <div class="jp-current-time current-time"></div>
                                                            <div class="jp-duration duration"></div>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <a class="jp-mute " title="mute">
                                                            <i class="ti ti-volume-3 text-muted fs-4"></i>
                                                        </a>
                                                        <a class="jp-unmute" title="unmute">
                                                            <i class="ti ti-volume fs-4 text-primary"></i>
                                                        </a>
                                                    </div>
                                                    <div class="jp-volume jp-music-volume">
                                                        <div class="jp-volume-bar">
                                                            <div class="jp-volume-bar-value"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="jp-playlist dropup" id="playlist">
                                            <ul class="dropdown-menu bg-inverse m-b-0">
                                                <li class="list-group-item"></li>
                                            </ul>
                                        </div>
                                        <div class="jp-no-solution hide">
                                            <span>Update Required</span> To play the media you will need to either update your browser to a recent version or update your <a href="http://get.adobe.com/flashplayer/" target="_blank">Flash plugin</a>.
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                            <?php foreach ($popularArtikel as $pa) : ?>
                                <div class="d-flex align-items-center mt-3 p-3 bg-hover-light-black rounded border-bottom">
                                    <div class="position-relative d-flex align-items-center">
                                        <!-- <a href="javascript:void(0)" class="stretched-link "></a> -->
                                        <img src="<?= base_url('assets/backend/images/artikel/' . $pa['gambar']) ?>" width="45" class="rounded" alt="album" />
                                        <div class="ms-3">
                                            <h6 class="mb-0 fw-semibold"><?= $pa['judul']; ?></h6>
                                            <span class="fs-2"><?= date('d', strtotime($pa['created_at'])); ?> - <?= date('M', strtotime($pa['created_at'])); ?></span>
                                            <span class="fs-2"><?= substr($pa['isi'], 0, 20); ?></span>
                                        </div>
                                    </div>
                                    <!-- <div class="ms-auto">
                                        <div class="dropdown">
                                            <a class="" href="javascript:void(0)" id="m1" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="ti ti-dots-vertical fs-4"></i>
                                            </a>
                                            <ul class="dropdown-menu" aria-labelledby="m1">
                                                <li>
                                                    <a class="dropdown-item" href="#">
                                                        <i class="ti ti-share text-muted me-1 fs-4"></i>Share </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="#">
                                                        <i class="ti ti-download text-muted me-1 fs-4"></i>Download </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="#">
                                                        <i class="ti ti-info-circle text-muted me-1 fs-4"></i>Get Song Info </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div> -->
                                </div>
                            <?php endforeach ?>
                            <!-- <div class="d-flex align-items-center bg-hover-light-black rounded p-3 border-bottom">
                                <div class="position-relative d-flex align-items-center">
                                    <a href="javascript:void(0)" class="stretched-link "></a>
                                    <img src="../assets/images/music/album2.jpg" width="45" alt="album" class="rounded" />
                                    <div class="ms-3">
                                        <h6 class="mb-0 fw-semibold">As It Was</h6>
                                        <span class="fs-2">As It Was</span>
                                    </div>
                                </div>
                                <div class="ms-auto">
                                    <div class="dropdown">
                                        <a class="" href="javascript:void(0)" id="m2" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="ti ti-dots-vertical fs-4"></i>
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="m2">
                                            <li>
                                                <a class="dropdown-item" href="#">
                                                    <i class="ti ti-share text-muted me-1 fs-4"></i>Share </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="#">
                                                    <i class="ti ti-download text-muted me-1 fs-4"></i>Download </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="#">
                                                    <i class="ti ti-info-circle text-muted me-1 fs-4"></i>Get Song Info </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center p-3 bg-hover-light-black rounded">
                                <div class="position-relative d-flex align-items-center">
                                    <a href="javascript:void(0)" class="stretched-link "></a>
                                    <img src="../assets/images/music/album4.jpg" width="45" alt="album" class="rounded" />
                                    <div class="ms-3">
                                        <h6 class="mb-0 fw-semibold text-truncate w-75">RedTape Anthem</h6>
                                        <span class="fs-2">RedTape Anthem</span>
                                    </div>
                                </div>
                                <div class="ms-auto">
                                    <div class="dropdown">
                                        <a class="" href="javascript:void(0)" id="m3" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="ti ti-dots-vertical fs-4"></i>
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="m3">
                                            <li>
                                                <a class="dropdown-item" href="#">
                                                    <i class="ti ti-share text-muted me-1 fs-4"></i>Share </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="#">
                                                    <i class="ti ti-download text-muted me-1 fs-4"></i>Download </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="#">
                                                    <i class="ti ti-info-circle text-muted me-1 fs-4"></i>Get Song Info </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center p-3 bg-hover-light-black rounded border-bottom">
                                <div class="position-relative d-flex align-items-center">
                                    <a href="javascript:void(0)" class="stretched-link "></a>
                                    <img src="../assets/images/music/album1.jpg" width="45" class="rounded" alt="album" />
                                    <div class="ms-3">
                                        <h6 class="mb-0 fw-semibold">Viva Las</h6>
                                        <span class="fs-2">Viva Las</span>
                                    </div>
                                </div>
                                <div class="ms-auto">
                                    <div class="dropdown">
                                        <a class="" href="javascript:void(0)" id="m1" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="ti ti-dots-vertical fs-4"></i>
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="m1">
                                            <li>
                                                <a class="dropdown-item" href="#">
                                                    <i class="ti ti-share text-muted me-1 fs-4"></i>Share </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="#">
                                                    <i class="ti ti-download text-muted me-1 fs-4"></i>Download </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="#">
                                                    <i class="ti ti-info-circle text-muted me-1 fs-4"></i>Get Song Info </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Recent & popular Blog -->
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