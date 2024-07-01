<?= $this->extend('new_ui_frontend/layouts_new/main'); ?>
<?= $this->section('content'); ?>
<div class="container-fluid">
    <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold mb-8">Blog Detail</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a class="text-muted text-decoration-none" href="<?= base_url("/"); ?>">Home</a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page">Blog Detail</li>
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

    <div class="card rounded-2 overflow-hidden">
        <div class="position-relative">
            <img src="<?= base_url('assets/backend/images/artikel/' . $detail_artikel['gambar']) ?>" class="card-img-top rounded-0 object-fit-contain" height="440" alt="..." style="width: 100%;">
        </div>
        <div class="card-body p-4">
            <span class="badge text-bg-light fs-2 rounded-4 py-1 px-2 lh-sm  mt-3">Posted By : <?= $detail_artikel['author']; ?></span>
            <h2 class="fs-9 fw-semibold my-4"><?= $detail_artikel['judul']; ?></h2>
            <div class="d-flex align-items-center gap-4">
                <div class="d-flex align-items-center gap-2"><i class="ti ti-eye text-dark fs-5"></i><?= $detail_artikel['views']; ?> Views</div>
                <div class="d-flex align-items-center gap-2">
                    <a href="javascript:void(0)" onclick="updateLikes()"><i class="ti ti-heart"></i> <span id="targetLikes"><?= $detail_artikel['likes']; ?></span> Likes</a>
                </div>
                <div class="d-flex align-items-center fs-2 ms-auto"><i class="ti ti-point text-dark"></i>
                    <?= $detail_artikel['created_at']; ?>
                </div>
            </div>
        </div>
        <div class="card-body border-top p-4">
            <!-- <h2 class="fs-8 fw-semibold mb-3">Title of the paragraph</h2> -->
            <p class="mb-3">
                <?=  nl2br(esc($detail_artikel['isi'])); ?>
            </p>
            
            <div class="row border-top mt-7 pt-7">
                <div class="col-md-6">
                    <h4>Youtube : </h4>
                    <iframe width="100%" height="315" src="<?= $detail_artikel['url']; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                </div>
                <div class="col-md-6">
                    <h4>Description :</h4>
                    <textarea class="form-control" disabled rows="14" style="border: none; background-color: white; height: 315px;"><?= $detail_artikel['deskripsi']; ?></textarea>
                </div>
            </div>
            
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <?php if (!session('id')) : ?>
                <h4 class="mb-4 fw-semibold">Please Login First For Post Comments!</h4>
            <?php else : ?>
                <h4 class="mb-4 fw-semibold">Post Comments</h4>
            <?php endif; ?>
            <form action="<?= base_url("blog_details/" . $detail_artikel['slug']) ?>" method="post">
                <?= csrf_field(); ?>
                <textarea class="form-control mb-4" name="comment" placeholder="Write Your Comment" rows="5" <?= session('id') ? 'required' : 'disabled' ?>></textarea>
                <button class="btn btn-primary" type="submit" <?= session('id') ? 'required' : 'disabled' ?>>Post Comment</button>
            </form>
            <div class="d-flex align-items-center gap-3 mb-4 mt-7 pt-8">
                <h4 class="mb-0 fw-semibold">Comments</h4>
                <span class="badge bg-primary-subtle text-primary fs-4 fw-semibold px-6 py-8 rounded"> (<?= count($comments) ?>)</span>
            </div>
            <div class="position-relative">
                <?php if (count($comments) > 0) : ?>
                    <?php foreach ($comments as $c) { ?>
                        <div class="p-4 rounded-2 text-bg-light mb-3">
                            <div class="d-flex align-items-center gap-3">
                                <!-- <img src="<?= base_url('assets/new_frontend') ?>/images/profile/user-2.jpg" alt="" class="rounded-circle" width="33" height="33"> -->
                                <h6 class="fw-semibold mb-0 fs-4"><?= $c['nama']; ?></h6>
                                <span class="p-1 text-muted fs-2 d-inline-block">( <?= $c['created_at'] ?> )</span>
                            </div>
                            <p class="my-3"><?= $c['comment'] ?></p>
                        </div>
                    <?php } ?>
                <?php else : ?>
                    <h4 class="text-center text-secondary m-3">No Comments Found!</h4>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
<?= $this->section('scripts') ?>
<script>
    let times = 0;
    let slug = "<?= $detail_artikel['slug'] ?>";

    function updateLikes() {
        $.ajax({
            url: '<?= base_url("updateLikes") ?>',
            method: 'GET',
            data: {
                "slug": slug,
                "times": times,
            },
            contentType: "application/json",
            dataType: "json",
            success: function(res) {
                times = !res.separator ? times + 1 : 0;
                $("#targetLikes").html("");
                $("#targetLikes").append(res.count.likes);

            },
            error: function(xhr, status, error) {
                console.error(status, error);
            }
        });
    }
</script>
<?= $this->endSection() ?>