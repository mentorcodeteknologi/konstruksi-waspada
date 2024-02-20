<?= $this->extend('layouts_frontend/main_frontend'); ?>

<?= $this->section('breadcrumb'); ?>
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="page-title">
                    <h2>blog</h2>
                </div>
            </div>
            <div class="col-sm-6">
                <nav aria-label="breadcrumb" class="theme-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url('/') ?>">Home</a></li>
                        <li class="breadcrumb-item active">blog</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<section class="section-b-space blog-page ratio2_3 bg-white">
    <div class="container">
        <div class="row">
            <div class="col-xl-9 col-lg-8 col-md-7">
                <?php foreach ($artikel as $a) : ?>
                    <div class="row blog-media">
                        <div class="col-xl-6">
                            <div class="blog-left">
                                <a href="<?= base_url('blog_details/' . $a['slug']) ?>"><img src="<?= base_url('assets/backend/images/artikel/' . $a['gambar']) ?>" class="img-fluid blur-up lazyload bg-img" alt=""></a>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="blog-right">
                                <div>
                                    <h6><?= date('d-m-Y', strtotime($a['created_at'])); ?></h6> <a href="<?= base_url('blog_details/' . $a['slug']) ?>">
                                        <h4><?= $a['judul']; ?></h4>
                                    </a>
                                    <ul class="post-social">
                                        <li>Posted By : <?= $a['author']; ?></li>
                                        <li><i class="fa fa-heart"></i> <?= $a['likes']; ?> Likes</li>
                                        <li><i class="fa fa-eye"></i> <?= $a['views']; ?> Views</li>
                                    </ul>
                                    <p><?= substr($a['isi'], 0, 150); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
                <!-- <div class="row blog-media">
                    <div class="col-xl-6">
                        <div class="blog-left">
                            <a href="#"><img src="<?= base_url('assets/frontend') ?>/1.jpg" width="315" height="300" class="img-fluid blur-up lazyload bg-img" alt=""></a>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="blog-right">
                            <div>
                                <h6>25 January 2018</h6> <a href="blog-details.html">
                                    <h4>you how all this mistaken idea of denouncing pleasure and praising pain was
                                        born.</h4>
                                </a>
                                <ul class="post-social">
                                    <li>Posted By : Admin Admin</li>
                                    <li><i class="fa fa-heart"></i> 5 Hits</li>
                                    <li><i class="fa fa-comments"></i> 10 Comment</li>
                                </ul>
                                <p>Consequences that are extremely painful. Nor again is there anyone who loves or
                                    pursues or desires to obtain pain of itself, because it is pain, but because
                                    occasionally circumstances occur in which toil and pain can procure him some
                                    great pleasure.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row blog-media">
                    <div class="col-xl-6">
                        <div class="blog-left">
                            <a href="#"><img src="<?= base_url('assets/frontend') ?>/1.jpg" class="img-fluid blur-up lazyload bg-img" alt=""></a>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="blog-right">
                            <div>
                                <h6>25 January 2018</h6> <a href="blog-details.html">
                                    <h4>you how all this mistaken idea of denouncing pleasure and praising pain was
                                        born.</h4>
                                </a>
                                <ul class="post-social">
                                    <li>Posted By : Admin Admin</li>
                                    <li><i class="fa fa-heart"></i> 5 Hits</li>
                                    <li><i class="fa fa-comments"></i> 10 Comment</li>
                                </ul>
                                <p>Consequences that are extremely painful. Nor again is there anyone who loves or
                                    pursues or desires to obtain pain of itself, because it is pain, but because
                                    occasionally circumstances occur in which toil and pain can procure him some
                                    great pleasure.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row blog-media">
                    <div class="col-xl-6">
                        <div class="blog-left">
                            <a href="#"><img src="<?= base_url('assets/frontend') ?>/1.jpg" class="img-fluid blur-up lazyload bg-img" alt=""></a>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="blog-right">
                            <div>
                                <h6>25 January 2018</h6> <a href="#">
                                    <h4>you how all this mistaken idea of denouncing pleasure and praising pain was
                                        born.</h4>
                                </a>
                                <ul class="post-social">
                                    <li>Posted By : Admin Admin</li>
                                    <li><i class="fa fa-heart"></i> 5 Hits</li>
                                    <li><i class="fa fa-comments"></i> 10 Comment</li>
                                </ul>
                                <p>Consequences that are extremely painful. Nor again is there anyone who loves or
                                    pursues or desires to obtain pain of itself, because it is pain, but because
                                    occasionally circumstances occur in which toil and pain can procure him some
                                    great pleasure.</p>
                            </div>
                        </div>
                    </div>
                </div> -->

            </div>

            <div class="col-xl-3 col-lg-4 col-md-5">
                <div class="blog-sidebar">
                    <div class="theme-card">
                        <h4>Recent Blog</h4>
                        <ul class="recent-blog">
                            <?php foreach ($recentArtikel as $ra) : ?>
                                <li>
                                    <div class="media"> <img class="img-fluid blur-up lazyload" src="<?= base_url('assets/backend/images/artikel/' . $ra['gambar']) ?>" alt="Generic placeholder image">
                                        <div class="media-body align-self-center">
                                            <h6><?= date('d-m-Y', strtotime($a['created_at'])); ?></h6>
                                            <p> <?= $ra['likes']; ?> Likes</p>
                                        </div>
                                    </div>
                                </li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                    <div class="theme-card">
                        <h4>Popular Blog</h4>
                        <ul class="popular-blog">
                            <?php foreach ($popularArtikel as $pa) : ?>
                                <li>
                                    <div class="media">
                                        <div class="blog-date"><span><?= date('d', strtotime($pa['created_at'])); ?></span><span><?= date('M', strtotime($pa['created_at'])); ?></span></div>
                                        <div class="media-body align-self-center">
                                            <h6><?= $pa['judul']; ?></h6>
                                            <p> <?= $ra['views']; ?> Views</p>
                                        </div>
                                    </div>
                                    <p><?= substr($a['isi'], 0, 20); ?></p>
                                </li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>
