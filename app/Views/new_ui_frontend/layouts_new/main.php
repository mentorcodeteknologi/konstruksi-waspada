<!DOCTYPE html>
<html lang="en" dir="ltr" data-bs-theme="light" data-color-theme="Blue_Theme">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Favicon icon-->
    <link rel="shortcut icon" type="image/png" href="<?= base_url('assets/new_frontend') ?>/images/logos/favicon.png" />

    <!-- Core Css -->
    <link rel="stylesheet" href="<?= base_url('assets/new_frontend') ?>/css/styles.css" />

    <title><?= $title; ?></title>
    <!-- Owl Carousel  -->
    <link rel="stylesheet" href="<?= base_url('assets/new_frontend') ?>/libs/owl.carousel/dist/assets/owl.carousel.min.css" />
</head>

<body>
    <!-- Preloader -->
    <div class="preloader">
        <img src="<?= base_url('assets/new_frontend') ?>/images/logos/favicon.png" alt="loader" class="lds-ripple img-fluid" />
    </div>
    <div id="main-wrapper">
        <!-- Sidebar Start -->
        <?= $this->include('new_ui_frontend/layouts_new/sidebar'); ?>
        <!--  Sidebar End -->
        <div class="page-wrapper">
            <!--  Header Start -->
            <?= $this->include('new_ui_frontend/layouts_new/header'); ?>
            <!--  Header End -->
            <?= $this->include('new_ui_frontend/layouts_new/navbar'); ?>


            <div class="body-wrapper">
                <?= $this->renderSection("content"); ?>
                <?= $this->include('new_ui_frontend/layouts_new/footer'); ?>
            </div>
            <script>
                function handleColorTheme(e) {
                    $("html").attr("data-color-theme", e);
                    $(e).prop("checked", !0);
                }
            </script>
            <button class="btn btn-primary p-3 rounded-circle d-flex align-items-center justify-content-center customizer-btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                <i class="icon ti ti-settings fs-7"></i>
            </button>

            <?= $this->include("new_ui_frontend/layouts_new/setting"); ?>
        </div>

        <!--  Search Bar -->
        <?= $this->include("new_ui_frontend/layouts_new/searchbar"); ?>

        <!--  Shopping Cart -->
        <?= $this->include("new_ui_frontend/layouts_new/shoppingchart"); ?>

    </div>
    <div class="dark-transparent sidebartoggler"></div>
    <!-- Import Js Files -->

    <?= $this->include("new_ui_frontend/layouts_new/scripts"); ?>
</body>

</html>