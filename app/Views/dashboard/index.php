<!-- MEMANGGIL SESSION LOGIN -->
<?php $session = session(); ?>

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
                        <h3>Dashboard
                            <small>Multikart Admin panel</small>
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
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->

    <!-- KONDISI JIKA ROLE BUKAN ADMIN ATAU STATUS TIDAK AKTIF -->
    <?php if ($session->get('role') != "admin" || $session->get('status') != "active") { ?>
        <section class="p-0" style="display: flex; justify-content: center; align-items: center;">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="error-section text-center">
                            <a href="<?= base_url('pembayaran/create') ?>" class="btn btn-solid">Go to Premium</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <br><br><br>
    <?php } ?>

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-xxl-3 col-md-6 xl-50">
                <div class="card o-hidden widget-cards">
                    <div class="warning-box card-body">
                        <div class="media static-top-widget align-items-center">
                            <div class="icons-widgets">
                                <div class="align-self-center text-center">
                                    <i data-feather="navigation" class="font-warning"></i>
                                </div>
                            </div>
                            <div class="media-body media-doller">
                                <span class="m-0">Earnings</span>
                                <h3 class="mb-0">$ <span class="counter">6659</span><small> This
                                        Month</small>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-3 col-md-6 xl-50">
                <div class="card o-hidden widget-cards">
                    <div class="secondary-box card-body">
                        <div class="media static-top-widget align-items-center">
                            <div class="icons-widgets">
                                <div class="align-self-center text-center">
                                    <i data-feather="box" class="font-secondary"></i>
                                </div>
                            </div>
                            <div class="media-body media-doller">
                                <span class="m-0">Products</span>
                                <h3 class="mb-0">$ <span class="counter">9856</span><small> This
                                        Month</small>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-3 col-md-6 xl-50">
                <div class="card o-hidden widget-cards">
                    <div class="primary-box card-body">
                        <div class="media static-top-widget align-items-center">
                            <div class="icons-widgets">
                                <div class="align-self-center text-center"><i data-feather="message-square" class="font-primary"></i></div>
                            </div>
                            <div class="media-body media-doller"><span class="m-0">Messages</span>
                                <h3 class="mb-0">$ <span class="counter">893</span><small> This
                                        Month</small></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-3 col-md-6 xl-50">
                <div class="card o-hidden widget-cards">
                    <div class="danger-box card-body">
                        <div class="media static-top-widget align-items-center">
                            <div class="icons-widgets">
                                <div class="align-self-center text-center"><i data-feather="users" class="font-danger"></i></div>
                            </div>
                            <div class="media-body media-doller"><span class="m-0">New Vendors</span>
                                <h3 class="mb-0">$ <span class="counter">5631</span><small> This
                                        Month</small></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->
</div>

<?= $this->endSection(); ?>