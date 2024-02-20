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
        <div class="row section-b-space blog-advance">
            <!-- <div class="col-lg-6">
                <div><img src="assets/4.jpg" class="img-fluid blur-up lazyload bg-img" alt=""></div>
            </div>
            <div class="col-lg-6">
                <div><img src="assets/5.jpg" class="img-fluid blur-up lazyload bg-img" alt=""></div>
            </div>
            <div class="col-lg-6">
                <ul>
                    <li>Donec ut metus sit amet elit consectetur facilisis id vel turpis.</li>
                    <li>Aenean in mi eu elit mollis tincidunt.</li>
                    <li>Etiam blandit metus vitae purus lacinia ultricies.</li>
                    <li>Nunc quis nulla sagittis, faucibus neque a, tempus metus.</li>
                    <li>In scelerisque libero ut mi ornare, a porttitor neque pulvinar.</li>
                    <li>Morbi molestie lacus blandit interdum sodales.</li>
                    <li>Curabitur eleifend velit molestie eleifend interdum.</li>
                    <li>Vestibulum fringilla tortor et lorem sagittis,</li>
                    <li>In scelerisque libero ut mi ornare, a porttitor neque pulvinar.</li>
                    <li>Morbi molestie lacus blandit interdum sodales.</li>
                    <li>Curabitur eleifend velit molestie eleifend interdum.</li>
                </ul>
            </div>
            <div class="col-lg-6">
                <p>Nulla quam turpis, commodo et placerat eu, mollis ut odio. Donec pellentesque egestas consequat.
                    Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nunc at
                    urna dolor. Mauris odio nisi, rhoncus ac justo eget, lacinia iaculis lectus. Pellentesque id
                    dapibus justo. Nunc venenatis non odio sed luctus. Etiam sit amet elit massa.</p>
                <p>Phasellus quis lorem eros. Aliquam non tincidunt nibh. Nulla quis interdum neque. Mauris volutpat
                    neque eu nunc ornare ullamcorper. Sed neque velit, lobortis eget tellus in, pellentesque ornare
                    nibh. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;
                    Maecenas rutrum nisi non nibh egestas lacinia. Cras ut tellus sit amet lacus consequat dictum
                    nec id sapien. Ut pellentesque ac ex ut elementum. Morbi mollis volutpat neque eu volutpat.</p>
                <p>Donec rhoncus massa quis nibh imperdiet dictum. Vestibulum id est sit amet felis fringilla
                    bibendum at at leo. Proin molestie ac nisi eu laoreet. Integer faucibus enim nec ullamcorper
                    tempor. Aenean nec felis dui. Integer tristique odio mi, in volutpat metus posuere eu. Aenean
                    suscipit ipsum nunc, id volutpat lorem hendrerit ac. Sed id elit quam. In ac mauris arcu.
                    Praesent eget lectus sit amet diam vestibulum varius. Suspendisse dignissim mattis leo, nec
                    facilisis erat tempor quis. Vestibulum eu vestibulum ex. Maecenas luctus orci sed blandit
                    fermentum. In vulputate eu metus a faucibus. Suspendisse feugiat condimentum congue.</p>
            </div> -->
        </div>
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

        <div class="row section-b-space">
            <h2>Comments</h2>
            <div class="col-sm-12">
                <ul class="comment-section">
                    <?php foreach ($comments as $c) {?>
                        <li>
                        <div class="media">
                            <div class="media-body">
                                <h6><?= $c['nama']; ?><span>( <?= $c['created_at']?> )</span></h6>
                                <p><?= $c['comment']?></p>
                            </div>
                        </div>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
        <div class="row blog-contact">
            <div class="col-sm-12">
                <h2><?= session('id') ? 'Leave Your Comment' : 'Please Login First!'?></h2>
                <form action="<?= base_url("blog_details/" . $detail_artikel['slug'])?>" method="post" class="theme-form">
                    <?= csrf_field(); ?>
                    <div class="form-row row">
                        <!-- <div class="col-md-12">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="" id="name" placeholder="Enter Your name" required="">
                        </div>
                        <div class="col-md-12">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" name="" id="email" placeholder="Email" required="">
                        </div> -->
                        <div class="col-md-12">
                            <label for="exampleFormControlTextarea1">Comment</label>
                            <textarea class="form-control" name="comment" placeholder="Write Your Comment" id="exampleFormControlTextarea1" rows="6" <?= session('id') ? 'required' : 'disabled'?>></textarea>
                        </div>
                        <div class="col-md-12">
                            <button class="btn btn-solid" type="submit" <?= session('id') ? 'required' : 'disabled'?>>Post Comment</button>
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
    let slug = "<?= $detail_artikel['slug']?>";
    function updateLikes() {
        $.ajax({
            url: '<?= base_url("updateLikes")?>',
            method: 'GET',
            data: {
                "slug" : slug,
                "times" : times,
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