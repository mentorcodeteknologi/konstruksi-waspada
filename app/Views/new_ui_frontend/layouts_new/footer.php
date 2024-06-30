<div class="my-5">&nbsp;</div>
<footer id="footer" class="footer p-5 bg-primary-subtle">
    <div class="container py-2">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div>
                    <h4>About</h4>
                </div>
                <div>
                    <p id="total-station-text">Total Station</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div>
                    <h4>Article Update</h4>
                </div>
                <div>
                    <ul>
                        <?php foreach ($footerRecentArtikel as $fra) : ?>
                            <li><a href="<?= base_url('blog_details/' . $fra['slug']) ?>"><?= $fra['judul'] ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div>
                    <h4>Popular Article</h4>
                </div>
                <div>
                    <ul>
                        <?php foreach ($footerPopularArtikel as $fpa) : ?>
                            <li><a href="<?= base_url('blog_details/' . $fpa['slug']) ?>"><?= $fpa['judul'] ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="mb-5"></div>
</footer>