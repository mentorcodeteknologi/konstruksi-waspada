<aside class="left-sidebar with-vertical">
    <div><!-- ---------------------------------- -->
        <!-- Start Vertical Layout Sidebar -->
        <!-- ---------------------------------- -->
        <div class="brand-logo d-flex align-items-center justify-content-between">
            <a href="<?= base_url('backend/dashboard') ?>" class="text-nowrap logo-img">
                <img src="<?= base_url('assets/new_frontend') ?>/images/logos/light-logo-2.png" class="dark-logo mt-3" alt="Logo-Dark" width="100%"/>
                <img src="<?= base_url('assets/new_frontend') ?>/images/logos/dark-logo.png" class="light-logo mt-3" alt="Logo-light" width="100%" />
            </a>
            <a href="javascript:void(0)" class="sidebartoggler ms-auto text-decoration-none fs-5 d-block d-xl-none">
                <i class="ti ti-x"></i>
            </a>
        </div>


        <nav class="sidebar-nav scroll-sidebar" data-simplebar>
            <ul id="sidebarnav">
                <!-- ---------------------------------- -->
                <!-- Home -->
                <!-- ---------------------------------- -->
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Home</span>
                </li>
                <!-- ---------------------------------- -->
                <!-- Dashboard -->
                <!-- ---------------------------------- -->
                <li class="sidebar-item">
                    <a class="sidebar-link" href="<?= base_url('backend/dashboard') ?>" aria-expanded="false">
                        <span>
                            <i class="ti ti-aperture"></i>
                        </span>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="<?= base_url('backend/users') ?>" aria-expanded="false">
                        <span>
                            <i class="ti ti-users"></i>
                        </span>
                        <span class="hide-menu">Users</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="#" aria-expanded="false">
                        <span>
                            <i class="ti ti-currency-dollar"></i>
                        </span>
                        <span class="hide-menu">Pembayaran</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="<?= base_url('backend/category') ?>" aria-expanded="false">
                        <span>
                            <i class="ti ti-category"></i>
                        </span>
                        <span class="hide-menu">Kategori</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="#" aria-expanded="false">
                        <span>
                            <i class="ti ti-news"></i>
                        </span>
                        <span class="hide-menu">Artikel</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="<?= base_url('backend/alat_hilang') ?>" aria-expanded="false">
                        <span>
                            <i class="ti ti-crane-off"></i>
                        </span>
                        <span class="hide-menu">Alat Hilang</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="<?= base_url('backend/user_blacklist') ?>" aria-expanded="false">
                        <span>
                            <i class="ti ti-user-off"></i>
                        </span>
                        <span class="hide-menu">Users Blacklist</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="<?= base_url('backend/perusahaan_blacklist') ?>" aria-expanded="false">
                        <span>
                            <i class="ti ti-building"></i>
                        </span>
                        <span class="hide-menu">Perusahaan Blacklist</span>
                    </a>
                </li>
                

                <!-- ---------------------------------- -->
                <!-- Admin -->
                <!-- ---------------------------------- -->
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Admin</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="<?= base_url('backend/calendar') ?>" aria-expanded="false">
                        <span>
                            <i class="ti ti-calendar"></i>
                        </span>
                        <span class="hide-menu">Kalender</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="#" aria-expanded="false">
                        <span>
                            <i class="ti ti-qrcode"></i>
                        </span>
                        <span class="hide-menu">Scan QR Whatsapp</span>
                    </a>
                </li>
                
                
                <li class="sidebar-item">
                    <a class="sidebar-link" href="<?= base_url('/') ?>" aria-expanded="false">
                        <span>
                            <i class="ti ti-arrow-left"></i>
                        </span>
                        <span class="hide-menu">Back To Home</span>
                    </a>
                </li>
                
            </ul>
        </nav>

        <div class="fixed-profile p-3 mx-4 mb-2 bg-secondary-subtle rounded sidebar-ad mt-3">
            <div class="hstack gap-3">
                <div class="john-img">
                    <img src="<?= base_url('assets/new_frontend') ?>/images/profile/user-1.jpg" class="rounded-circle" width="40" height="40" alt="" />
                </div>
                <div class="john-title">
                    <h6 class="mb-0 fs-4 fw-semibold"><?= ucfirst(session('nama'))?></h6>
                    <span class="fs-2"><?= session('role')?></span>
                </div>
                <a href="<?= base_url('logout')?>" class="border-0 bg-transparent text-primary ms-auto" tabindex="0" type="button" aria-label="logout" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="logout">
                    <i class="ti ti-power fs-6"></i>
                </a>
            </div>
        </div>

        <!-- ---------------------------------- -->
        <!-- Start Vertical Layout Sidebar -->
        <!-- ---------------------------------- -->
    </div>
</aside>