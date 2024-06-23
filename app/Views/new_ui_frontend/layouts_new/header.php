<header class="topbar">
    <?php
    // SESSION UNTUK MENGAMBIL DATA SESSION
    $session = session();
    ?>
    <div class="with-vertical"><!-- ---------------------------------- -->
        <!-- Start Vertical Layout Header -->
        <!-- ---------------------------------- -->
        <nav class="navbar navbar-expand-lg p-0">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link sidebartoggler nav-icon-hover ms-n3" id="headerCollapse" href="javascript:void(0)">
                        <i class="ti ti-menu-2"></i>
                    </a>
                </li>
                <!-- <li class="nav-item d-none d-lg-block">
                    <a class="nav-link nav-icon-hover" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <i class="ti ti-search"></i>
                    </a>
                </li> -->
            </ul>

            <ul class="navbar-nav quick-links d-none d-lg-flex">
                <li class="nav-item dropdown-hover d-none d-lg-block">
                    <a class="nav-link" href="<?= base_url("/"); ?>">Blog</a>
                </li>
                <li class="nav-item dropdown-hover d-none d-lg-block">
                    <a class="nav-link" href="<?= base_url("user_blacklist_frontend"); ?>">User Blacklist</a>
                </li>
                <li class="nav-item dropdown-hover d-none d-lg-block">
                    <a class="nav-link" href="<?= base_url("alat_hilang/detail"); ?>">Alat Hilang</a>
                </li>
                <li class="nav-item dropdown-hover d-none d-lg-block">
                    <a class="nav-link" href="<?= base_url("calendar_frontend"); ?>">Kalender</a>
                </li>
                <!-- ------------------------------- -->
                <!-- start apps Dropdown -->
                <!-- ------------------------------- -->
                <!-- <li class="nav-item dropdown hover-dd d-none d-lg-block">
                    <a class="nav-link" href="javascript:void(0)" data-bs-toggle="dropdown">
                        Apps<span class="mt-1"><i class="ti ti-chevron-down fs-3"></i></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-nav dropdown-menu-animate-up py-0">
                        <div class="row">
                            <div class="col-8">
                                <div class="ps-7 pt-7">
                                    <div class="border-bottom">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="position-relative">
                                                    <a href="../horizontal/app-chat.html" class="d-flex align-items-center pb-9 position-relative">
                                                        <div class="text-bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                            <img src="<?= base_url('assets/new_frontend') ?>/images/svgs/icon-dd-chat.svg" alt="" class="img-fluid" width="24" height="24" />
                                                        </div>
                                                        <div class="d-inline-block">
                                                            <h6 class="mb-1 fw-semibold fs-3">
                                                                Chat Application
                                                            </h6>
                                                            <span class="fs-2 d-block text-body-secondary">New messages arrived</span>
                                                        </div>
                                                    </a>
                                                    <a href="../horizontal/app-invoice.html" class="d-flex align-items-center pb-9 position-relative">
                                                        <div class="text-bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                            <img src="<?= base_url('assets/new_frontend') ?>/images/svgs/icon-dd-invoice.svg" alt="" class="img-fluid" width="24" height="24" />
                                                        </div>
                                                        <div class="d-inline-block">
                                                            <h6 class="mb-1 fw-semibold fs-3">Invoice App</h6>
                                                            <span class="fs-2 d-block text-body-secondary">Get latest invoice</span>
                                                        </div>
                                                    </a>
                                                    <a href="../horizontal/app-contact2.html" class="d-flex align-items-center pb-9 position-relative">
                                                        <div class="text-bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                            <img src="<?= base_url('assets/new_frontend') ?>/images/svgs/icon-dd-mobile.svg" alt="" class="img-fluid" width="24" height="24" />
                                                        </div>
                                                        <div class="d-inline-block">
                                                            <h6 class="mb-1 fw-semibold fs-3">
                                                                Contact Application
                                                            </h6>
                                                            <span class="fs-2 d-block text-body-secondary">2 Unsaved Contacts</span>
                                                        </div>
                                                    </a>
                                                    <a href="../horizontal/app-email.html" class="d-flex align-items-center pb-9 position-relative">
                                                        <div class="text-bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                            <img src="<?= base_url('assets/new_frontend') ?>/images/svgs/icon-dd-message-box.svg" alt="" class="img-fluid" width="24" height="24" />
                                                        </div>
                                                        <div class="d-inline-block">
                                                            <h6 class="mb-1 fw-semibold fs-3">Email App</h6>
                                                            <span class="fs-2 d-block text-body-secondary">Get new emails</span>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="position-relative">
                                                    <a href="../horizontal/page-user-profile.html" class="d-flex align-items-center pb-9 position-relative">
                                                        <div class="text-bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                            <img src="<?= base_url('assets/new_frontend') ?>/images/svgs/icon-dd-cart.svg" alt="" class="img-fluid" width="24" height="24" />
                                                        </div>
                                                        <div class="d-inline-block">
                                                            <h6 class="mb-1 fw-semibold fs-3">
                                                                User Profile
                                                            </h6>
                                                            <span class="fs-2 d-block text-body-secondary">learn more information</span>
                                                        </div>
                                                    </a>
                                                    <a href="../horizontal/app-calendar.html" class="d-flex align-items-center pb-9 position-relative">
                                                        <div class="text-bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                            <img src="<?= base_url('assets/new_frontend') ?>/images/svgs/icon-dd-date.svg" alt="" class="img-fluid" width="24" height="24" />
                                                        </div>
                                                        <div class="d-inline-block">
                                                            <h6 class="mb-1 fw-semibold fs-3">
                                                                Calendar App
                                                            </h6>
                                                            <span class="fs-2 d-block text-body-secondary">Get dates</span>
                                                        </div>
                                                    </a>
                                                    <a href="../horizontal/app-contact.html" class="d-flex align-items-center pb-9 position-relative">
                                                        <div class="text-bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                            <img src="<?= base_url('assets/new_frontend') ?>/images/svgs/icon-dd-lifebuoy.svg" alt="" class="img-fluid" width="24" height="24" />
                                                        </div>
                                                        <div class="d-inline-block">
                                                            <h6 class="mb-1 fw-semibold fs-3">
                                                                Contact List Table
                                                            </h6>
                                                            <span class="fs-2 d-block text-body-secondary">Add new contact</span>
                                                        </div>
                                                    </a>
                                                    <a href="../horizontal/app-notes.html" class="d-flex align-items-center pb-9 position-relative">
                                                        <div class="text-bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                            <img src="<?= base_url('assets/new_frontend') ?>/images/svgs/icon-dd-application.svg" alt="" class="img-fluid" width="24" height="24" />
                                                        </div>
                                                        <div class="d-inline-block">
                                                            <h6 class="mb-1 fw-semibold fs-3">
                                                                Notes Application
                                                            </h6>
                                                            <span class="fs-2 d-block text-body-secondary">To-do and Daily tasks</span>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row align-items-center py-3">
                                        <div class="col-8">
                                            <a class="fw-semibold text-dark d-flex align-items-center lh-1" href="#"><i class="ti ti-help fs-6 me-2"></i>Frequently Asked Questions</a>
                                        </div>
                                        <div class="col-4">
                                            <div class="d-flex justify-content-end pe-4">
                                                <button class="btn btn-primary">Check</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4 ms-n4">
                                <div class="position-relative p-7 border-start h-100">
                                    <h5 class="fs-5 mb-9 fw-semibold">Quick Links</h5>
                                    <ul class="">
                                        <li class="mb-3">
                                            <a class="fw-semibold bg-hover-primary" href="../horizontal/page-pricing.html">Pricing Page</a>
                                        </li>
                                        <li class="mb-3">
                                            <a class="fw-semibold bg-hover-primary" href="../horizontal/authentication-login.html">Authentication Design</a>
                                        </li>
                                        <li class="mb-3">
                                            <a class="fw-semibold bg-hover-primary" href="../horizontal/authentication-register.html">Register Now</a>
                                        </li>
                                        <li class="mb-3">
                                            <a class="fw-semibold bg-hover-primary" href="authentication-error.html">404 Error Page</a>
                                        </li>
                                        <li class="mb-3">
                                            <a class="fw-semibold bg-hover-primary" href="../horizontal/app-notes.html">Notes App</a>
                                        </li>
                                        <li class="mb-3">
                                            <a class="fw-semibold bg-hover-primary" href="../horizontal/page-user-profile.html">User Application</a>
                                        </li>
                                        <li class="mb-3">
                                            <a class="fw-semibold bg-hover-primary" href="../horizontal/page-account-settings.html">Account Settings</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                </li> -->
                <!-- ------------------------------- -->
                <!-- end apps Dropdown -->
                <!-- ------------------------------- -->
            </ul>

            <div class="d-block d-lg-none">
                <img src="<?= base_url('assets/new_frontend') ?>/images/logos/light-logo-2.png" class="dark-logo" width="180" alt="" />
                <img src="<?= base_url('assets/new_frontend') ?>/images/logos/light-logo-2.png" class="light-logo" width="180" alt="" />
            </div>
            <a class="navbar-toggler nav-icon-hover p-0 border-0" href="javascript:void(0)" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="p-2">
                    <!-- <i class="ti ti-dots fs-7"></i> -->
                </span>
            </a>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <div class="d-flex align-items-center justify-content-between">
                    <a href="javascript:void(0)" class="nav-link d-flex d-lg-none align-items-center justify-content-center" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobilenavbar" aria-controls="offcanvasWithBothOptions">
                        <i class="ti ti-align-justified fs-7"></i>
                    </a>
                    <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-center">
                        <!-- ------------------------------- -->
                        <!-- start language Dropdown -->
                        <!-- ------------------------------- -->

                        <!-- ------------------------------- -->
                        <!-- end language Dropdown -->
                        <!-- ------------------------------- -->

                        <!-- ------------------------------- -->
                        <!-- start shopping cart Dropdown -->
                        <!-- ------------------------------- -->

                        <!-- ------------------------------- -->
                        <!-- end shopping cart Dropdown -->
                        <!-- ------------------------------- -->

                        <!-- ------------------------------- -->
                        <!-- start notification Dropdown -->
                        <!-- ------------------------------- -->

                        <!-- ------------------------------- -->
                        <!-- end notification Dropdown -->
                        <!-- ------------------------------- -->

                        <!-- ------------------------------- -->
                        <!-- start profile Dropdown -->
                        <!-- ------------------------------- -->

                        <!-- ------------------------------- -->
                        <!-- end profile Dropdown -->
                        <!-- ------------------------------- -->
                    </ul>
                </div>
            </div>
        </nav>
        <!-- ---------------------------------- -->
        <!-- End Vertical Layout Header -->
        <!-- ---------------------------------- -->

        <!-- ------------------------------- -->
        <!-- apps Dropdown in Small screen -->
        <!-- ------------------------------- -->
        <!--  Mobilenavbar -->


    </div>

    <!-- Horizontal -->
    <div class="app-header with-horizontal">
        <nav class="navbar navbar-expand-xl container-fluid p-0">
            <ul class="navbar-nav">
                <li class="nav-item d-block d-xl-none">
                    <a class="nav-link sidebartoggler ms-n3" id="sidebarCollapse" href="javascript:void(0)">
                        <i class="ti ti-menu-2"></i>
                    </a>
                </li>
                <li class="nav-item d-none d-xl-block">
                    <a href="<?= base_url("/"); ?>" class="text-nowrap nav-link">
                        <img src="<?= base_url('assets/new_frontend') ?>/images/logos/light-logo-2.png" class="dark-logo" width="180" alt="" />
                        <img src="<?= base_url('assets/new_frontend') ?>/images/logos/light-logo-2.png" class="light-logo" width="180" alt="" />
                    </a>
                </li>
                <!-- <li class="nav-item d-none d-xl-block">
                    <a class="nav-link nav-icon-hover" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <i class="ti ti-search"></i>
                    </a>
                </li> -->
            </ul>
            <ul class="navbar-nav quick-links d-none d-xl-flex">
                <li class="nav-item dropdown-hover d-none d-lg-block">
                    <a class="nav-link" href="<?= base_url("/"); ?>">Blog</a>
                </li>
                <li class="nav-item dropdown-hover d-none d-lg-block">
                    <a class="nav-link" href="<?= base_url("user_blacklist_frontend"); ?>">User Blacklist</a>
                </li>
                <li class="nav-item dropdown-hover d-none d-lg-block">
                    <a class="nav-link" href="<?= base_url("alat_hilang/detail"); ?>">Alat Hilang</a>
                </li>
                <li class="nav-item dropdown-hover d-none d-lg-block">
                    <a class="nav-link" href="<?= base_url("calendar_frontend"); ?>">Kalender</a>
                </li>
                <!-- ------------------------------- -->
                <!-- start apps Dropdown -->
                <!-- ------------------------------- -->
                <!-- <li class="nav-item dropdown hover-dd d-none d-lg-block">
                    <a class="nav-link" href="javascript:void(0)" data-bs-toggle="dropdown">
                        My Account<i class="ti ti-chevron-down fs-3"></i><span class="mt-1"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-nav dropdown-menu-animate-up py-0">
                        <div class="row">
                            <div class="col-8">
                                <div class="ps-7 pt-7">
                                    <div class="border-bottom">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="position-relative">
                                                    <a href="../horizontal/app-chat.html" class="d-flex align-items-center pb-9 position-relative">
                                                        <div class="text-bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                            <img src="<?= base_url('assets/new_frontend') ?>/images/svgs/icon-dd-chat.svg" alt="" class="img-fluid" width="24" height="24" />
                                                        </div>
                                                        <div class="d-inline-block">
                                                            <h6 class="mb-1 fw-semibold fs-3">
                                                                Chat Application
                                                            </h6>
                                                            <span class="fs-2 d-block text-body-secondary">New messages arrived</span>
                                                        </div>
                                                    </a>
                                                    <a href="../horizontal/app-invoice.html" class="d-flex align-items-center pb-9 position-relative">
                                                        <div class="text-bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                            <img src="<?= base_url('assets/new_frontend') ?>/images/svgs/icon-dd-invoice.svg" alt="" class="img-fluid" width="24" height="24" />
                                                        </div>
                                                        <div class="d-inline-block">
                                                            <h6 class="mb-1 fw-semibold fs-3">Invoice App</h6>
                                                            <span class="fs-2 d-block text-body-secondary">Get latest invoice</span>
                                                        </div>
                                                    </a>
                                                    <a href="../horizontal/app-contact2.html" class="d-flex align-items-center pb-9 position-relative">
                                                        <div class="text-bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                            <img src="<?= base_url('assets/new_frontend') ?>/images/svgs/icon-dd-mobile.svg" alt="" class="img-fluid" width="24" height="24" />
                                                        </div>
                                                        <div class="d-inline-block">
                                                            <h6 class="mb-1 fw-semibold fs-3">
                                                                Contact Application
                                                            </h6>
                                                            <span class="fs-2 d-block text-body-secondary">2 Unsaved Contacts</span>
                                                        </div>
                                                    </a>
                                                    <a href="../horizontal/app-email.html" class="d-flex align-items-center pb-9 position-relative">
                                                        <div class="text-bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                            <img src="<?= base_url('assets/new_frontend') ?>/images/svgs/icon-dd-message-box.svg" alt="" class="img-fluid" width="24" height="24" />
                                                        </div>
                                                        <div class="d-inline-block">
                                                            <h6 class="mb-1 fw-semibold fs-3">Email App</h6>
                                                            <span class="fs-2 d-block text-body-secondary">Get new emails</span>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="position-relative">
                                                    <a href="../horizontal/page-user-profile.html" class="d-flex align-items-center pb-9 position-relative">
                                                        <div class="text-bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                            <img src="<?= base_url('assets/new_frontend') ?>/images/svgs/icon-dd-cart.svg" alt="" class="img-fluid" width="24" height="24" />
                                                        </div>
                                                        <div class="d-inline-block">
                                                            <h6 class="mb-1 fw-semibold fs-3">
                                                                User Profile
                                                            </h6>
                                                            <span class="fs-2 d-block text-body-secondary">learn more information</span>
                                                        </div>
                                                    </a>
                                                    <a href="../horizontal/app-calendar.html" class="d-flex align-items-center pb-9 position-relative">
                                                        <div class="text-bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                            <img src="<?= base_url('assets/new_frontend') ?>/images/svgs/icon-dd-date.svg" alt="" class="img-fluid" width="24" height="24" />
                                                        </div>
                                                        <div class="d-inline-block">
                                                            <h6 class="mb-1 fw-semibold fs-3">
                                                                Calendar App
                                                            </h6>
                                                            <span class="fs-2 d-block text-body-secondary">Get dates</span>
                                                        </div>
                                                    </a>
                                                    <a href="../horizontal/app-contact.html" class="d-flex align-items-center pb-9 position-relative">
                                                        <div class="text-bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                            <img src="<?= base_url('assets/new_frontend') ?>/images/svgs/icon-dd-lifebuoy.svg" alt="" class="img-fluid" width="24" height="24" />
                                                        </div>
                                                        <div class="d-inline-block">
                                                            <h6 class="mb-1 fw-semibold fs-3">
                                                                Contact List Table
                                                            </h6>
                                                            <span class="fs-2 d-block text-body-secondary">Add new contact</span>
                                                        </div>
                                                    </a>
                                                    <a href="../horizontal/app-notes.html" class="d-flex align-items-center pb-9 position-relative">
                                                        <div class="text-bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                            <img src="<?= base_url('assets/new_frontend') ?>/images/svgs/icon-dd-application.svg" alt="" class="img-fluid" width="24" height="24" />
                                                        </div>
                                                        <div class="d-inline-block">
                                                            <h6 class="mb-1 fw-semibold fs-3">
                                                                Notes Application
                                                            </h6>
                                                            <span class="fs-2 d-block text-body-secondary">To-do and Daily tasks</span>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row align-items-center py-3">
                                        <div class="col-8">
                                            <a class="fw-semibold text-dark d-flex align-items-center lh-1" href="#"><i class="ti ti-help fs-6 me-2"></i>Frequently Asked Questions</a>
                                        </div>
                                        <div class="col-4">
                                            <div class="d-flex justify-content-end pe-4">
                                                <button class="btn btn-primary">Check</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4 ms-n4">
                                <div class="position-relative p-7 border-start h-100">
                                    <h5 class="fs-5 mb-9 fw-semibold">Quick Links</h5>
                                    <ul class="">
                                        <li class="mb-3">
                                            <a class="fw-semibold bg-hover-primary" href="../horizontal/page-pricing.html">Pricing Page</a>
                                        </li>
                                        <li class="mb-3">
                                            <a class="fw-semibold bg-hover-primary" href="../horizontal/authentication-login.html">Authentication Design</a>
                                        </li>
                                        <li class="mb-3">
                                            <a class="fw-semibold bg-hover-primary" href="../horizontal/authentication-register.html">Register Now</a>
                                        </li>
                                        <li class="mb-3">
                                            <a class="fw-semibold bg-hover-primary" href="authentication-error.html">404 Error Page</a>
                                        </li>
                                        <li class="mb-3">
                                            <a class="fw-semibold bg-hover-primary" href="../horizontal/app-notes.html">Notes App</a>
                                        </li>
                                        <li class="mb-3">
                                            <a class="fw-semibold bg-hover-primary" href="../horizontal/page-user-profile.html">User Application</a>
                                        </li>
                                        <li class="mb-3">
                                            <a class="fw-semibold bg-hover-primary" href="../horizontal/page-account-settings.html">Account Settings</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                </li> -->
                <!-- ------------------------------- -->
                <!-- end apps Dropdown -->
                <!-- ------------------------------- -->
            </ul>
            <div class="d-block d-xl-none">
                <a href="<?= base_url("/"); ?>" class="text-nowrap nav-link">
                    <img src="<?= base_url('assets/new_frontend') ?>/images/logos/dark-logo.svg" width="180" alt="" />
                </a>
            </div>
            <a class="navbar-toggler nav-icon-hover p-0 border-0" href="javascript:void(0)" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="p-2">
                    <i class="ti ti-dots fs-7"></i>
                </span>
            </a>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <div class="d-flex align-items-center justify-content-between px-0 px-xl-8">
                    <a href="javascript:void(0)" class="nav-link round-40 p-1 ps-0 d-flex d-xl-none align-items-center justify-content-center" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobilenavbar" aria-controls="offcanvasWithBothOptions">
                        <i class="ti ti-align-justified fs-7"></i>
                    </a>
                    <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-center">
                        <!-- ------------------------------- -->
                        <!-- start language Dropdown -->
                        <!-- ------------------------------- -->

                        <!-- ------------------------------- -->
                        <!-- end language Dropdown -->
                        <!-- ------------------------------- -->

                        <!-- ------------------------------- -->
                        <!-- start shopping cart Dropdown -->
                        <!-- ------------------------------- -->

                        <!-- ------------------------------- -->
                        <!-- end shopping cart Dropdown -->
                        <!-- ------------------------------- -->

                        <!-- ------------------------------- -->
                        <!-- start notification Dropdown -->
                        <!-- ------------------------------- -->

                        <!-- ------------------------------- -->
                        <!-- end notification Dropdown -->
                        <!-- ------------------------------- -->

                        <!-- ------------------------------- -->
                        <!-- start profile Dropdown -->
                        <!-- ------------------------------- -->

                        <li class="nav-item dropdown">
                            <a class="nav-link pe-0" href="javascript:void(0)" id="drop1" data-bs-toggle="dropdown" aria-expanded="false">
                                <div class="d-flex align-items-center">
                                    <div class="user-profile-img">
                                        <!-- <img src="<?= base_url('assets/new_frontend') ?>/images/profile/user-1.jpg" class="rounded-circle" width="35" height="35" alt="" /> -->
                                        My Account<i class="ti ti-chevron-down fs-3"></i>
                                    </div>
                                </div>
                            </a>
                            <div class="dropdown-menu content-dd dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop1">
                                <?php if ($session->get('logged_in')) : ?>
                                    <div class="profile-dropdown position-relative" data-simplebar>
                                        <div class="py-3 px-7 pb-0">
                                            <h5 class="mb-0 fs-5 fw-semibold">User Profile</h5>
                                        </div>
                                        <div class="d-flex align-items-center py-9 mx-7 border-bottom">
                                            <img src="<?= base_url('assets/new_frontend') ?>/images/profile/user-1.jpg" class="rounded-circle" width="80" height="80" alt="" />
                                            <div class="ms-3">
                                                <h5 class="mb-1 fs-3"><?= ucfirst($session->get('nama')); ?></h5>
                                                <span class="mb-1 d-block"><?= $session->get('role'); ?></span>
                                                <!-- <p class="mb-0 d-flex align-items-center gap-2">
                                                    <i class="ti ti-mail fs-4"></i> info@modernize.com
                                                </p> -->
                                            </div>
                                        </div>
                                        <div class="d-grid py-4 px-7 pt-8">
                                            <!-- <div class="upgrade-plan bg-primary-subtle position-relative overflow-hidden rounded-4 p-4 mb-9">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <h5 class="fs-4 mb-3 w-50 fw-semibold">Unlimited Access</h5>
                                                        <button class="btn btn-primary">Upgrade</button>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="m-n4 unlimited-img">
                                                            <img src="<?= base_url('assets/new_frontend') ?>/images/backgrounds/unlimited-bg.png" alt="" class="w-100" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> -->
                                            <a href="<?= base_url('dashboard') ?>" class="btn btn-outline-primary mb-2">Back to dashboard</a>
                                            <a href="<?= base_url('logout') ?>" class="btn btn-outline-primary">Log Out</a>
                                        </div>
                                    </div>
                                <?php else : ?>
                                    <div class="profile-dropdown position-relative" data-simplebar>
                                        <div class="d-grid py-4 px-7 pt-8">
                                            <a href="<?= base_url('login') ?>" class="btn btn-outline-primary mb-2">Log In</a>
                                            <a href="<?= base_url('register') ?>" class="btn btn-outline-primary">Register</a>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </li>
                        <!-- ------------------------------- -->
                        <!-- end profile Dropdown -->
                        <!-- ------------------------------- -->
                    </ul>
                </div>
            </div>
        </nav>

    </div>
    <!-- Horizontal -->
</header>