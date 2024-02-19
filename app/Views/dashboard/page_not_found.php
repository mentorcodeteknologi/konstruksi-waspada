<!-- MEMANGGIL LAYOUTS -->
<?= $this->extend('layouts/app'); ?>


<?= $this->section('content'); ?>
<div class="page-body">
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-header-left">
                        <h3>
                            <?= $title ?>
                            <small><?= $subtitle; ?></small>
                        </h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ol class="breadcrumb pull-right">
                        <li class="breadcrumb-item">
                            <a href="index.html">
                                <i data-feather="home"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item active"><?= $subtitle ?></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>


    <!-- section start -->
    <section class="p-0" style="display: flex; justify-content: center; align-items: center; height: 55vh;">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="error-section text-center">
                        <h1>404</h1>
                        <h2>page not found</h2>
                        <a href="<?= base_url('dashboard') ?>" class="btn btn-solid">back to dashboard</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section ends -->
</div>

<?= $this->endSection(); ?>