<?= $this->extend('layouts_frontend/main_frontend'); ?>

<?= $this->section('breadcrumb'); ?>
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="page-title">
                    <h2>Blog Details</h2>
                </div>
            </div>
            <div class="col-sm-6">
                <nav aria-label="breadcrumb" class="theme-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url('/') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Blog Details</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<!--section start-->
<section class="blog-detail-page section-b-space ratio2_3 bg-white">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 blog-detail">
                <div class="d-flex d-inline align-self-center">
                    <img src="<?= base_url('assets/backend/images/artikel/' . $detail_artikel['gambar']) ?>" class="img-fluid blur-up lazyload bg-img" alt="">
                </div>
                <h3><?= $detail_artikel['judul']; ?></h3>
                <ul class="post-social">
                    <li><?= $detail_artikel['created_at']; ?></li>
                    <li>Posted By : <?= $detail_artikel['author']; ?></li>
                    <li><a href="javascript:void(0)" onclick="updateLikes()"><i class="fa fa-heart"></i> <span id="targetLikes"><?= $detail_artikel['likes']; ?></span> Likes</a></li>
                    <li><i class="fa fa-eye"></i> <?= $detail_artikel['views']; ?> Views</li>
                    <!-- <li><i class="fa fa-comments"></i>  Comment</li> -->
                </ul>
                <p><?= $detail_artikel['isi']; ?></p>
            </div>
        </div>
        <hr>
        <div class="row section-b-space blog-advance">
            <div class="col">
                <h4>Youtube : </h4>
                <iframe width="100%" height="315" src="<?= $detail_artikel['url']; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </div>
            <div class="col">
                <h4>Description :</h4>
                <textarea class="form-control" disabled rows="12" style="border: none;"><?= $detail_artikel['deskripsi']; ?></textarea>
            </div>
        </div>

        <div class="row">
            <h3>Comments (<?= count($comments) ?>)</h4>
                <div class="col-sm-12 mb-2">
                    <ul class="comment-section">
                        <?php if (count($comments) > 0) : ?>
                            <?php foreach ($comments as $c) { ?>
                                <li>
                                    <div class="media">
                                        <div class="media-body">
                                            <h6><?= $c['nama']; ?><span>( <?= $c['created_at'] ?> )</span></h6>
                                            <p><?= $c['comment'] ?></p>
                                        </div>
                                    </div>
                                </li>
                            <?php } ?>
                        <?php else : ?>
                            <h4 class="text-center text-secondary m-3">No Comments Found!</h4>
                        <?php endif; ?>
                    </ul>
                </div>
        </div>
        <div class="row blog-contact">
            <div class="col-sm-12">
                <?php if (!session('id')) : ?>
                    <h2>Please Login First!</h2>
                <?php endif; ?>
                <form action="<?= base_url("blog_details/" . $detail_artikel['slug']) ?>" method="post" class="theme-form">
                    <?= csrf_field(); ?>
                    <div class="form-row row">
                        <div class="col-md-12">
                            <label for="exampleFormControlTextarea1">Comment</label>
                            <textarea class="form-control" name="comment" placeholder="Write Your Comment" id="exampleFormControlTextarea1" rows="6" <?= session('id') ? 'required' : 'disabled' ?>></textarea>
                        </div>
                        <div class="col-md-12">
                            <button class="btn btn-solid" type="submit" <?= session('id') ? 'required' : 'disabled' ?>>Post Comment</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!--Section ends-->
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