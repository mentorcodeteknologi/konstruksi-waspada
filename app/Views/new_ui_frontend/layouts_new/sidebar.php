<aside class="left-sidebar with-vertical">
    <?php
    // SESSION UNTUK MENGAMBIL DATA SESSION
    $session = session();
    ?>
    <div><!-- ---------------------------------- -->
        <!-- Start Vertical Layout Sidebar -->
        <!-- ---------------------------------- -->
        <div class="brand-logo d-flex align-items-center justify-content-between">
            <a href="<?= base_url("/"); ?>" class="text-nowrap logo-img">
                <img src="<?= base_url('assets/new_frontend') ?>/images/logos/light-logo-2.png" class="dark-logo" width="180" alt="Logo-Dark" />
                <img src="<?= base_url('assets/new_frontend') ?>/images/logos/light-logo-2.png" class="light-logo" width="180" alt="Logo-light" />
            </a>
            <a href="javascript:void(0)" class="sidebartoggler ms-auto text-decoration-none fs-5 d-block d-xl-none">
                <i class="ti ti-x"></i>
            </a>
        </div>


        <nav class="sidebar-nav scroll-sidebar" data-simplebar>
            <ul id="sidebarnav">
                <!-- ---------------------------------- -->
                <!-- Menu -->
                <!-- ---------------------------------- -->
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Menu</span>
                </li>
                <!-- ---------------------------------- -->
                <!-- Home / BLog -->
                <!-- ---------------------------------- -->
                <li class="sidebar-item">
                    <a class="sidebar-link" href="<?= base_url("/"); ?>" aria-expanded="false">
                        <span>
                            <i class="ti ti-aperture"></i>
                        </span>
                        <span class="hide-menu">Blog</span>
                    </a>
                </li>
                <!-- ---------------------------------- -->
                <!-- User Blacklist -->
                <!-- ---------------------------------- -->
                <li class="sidebar-item">
                    <a class="sidebar-link" href="<?= base_url("user_blacklist_frontend"); ?>" aria-expanded="false">
                        <span>
                            <i class="ti ti-user-x"></i>
                        </span>
                        <span class="hide-menu">User Blacklist</span>
                    </a>
                </li>
                <!-- ---------------------------------- -->
                <!-- Alat Hilang -->
                <!-- ---------------------------------- -->
                <li class="sidebar-item">
                    <a class="sidebar-link" href="<?= base_url("alat_hilang/detail"); ?>" aria-expanded="false">
                        <span>
                            <i class="ti ti-tool"></i>
                        </span>
                        <span class="hide-menu">Alat Hilang</span>
                    </a>
                </li>
                <!-- ---------------------------------- -->
                <!-- Kalender -->
                <!-- ---------------------------------- -->
                <li class="sidebar-item">
                    <a class="sidebar-link" href="<?= base_url("calendar_frontend"); ?>" aria-expanded="false">
                        <span>
                            <i class="ti ti-calendar"></i>
                        </span>
                        <span class="hide-menu">Kalender</span>
                    </a>
                </li>
                <!-- ---------------------------------- -->
                <!-- My Account -->
                <!-- ---------------------------------- -->
                <?php
                // Cek apakah pengguna sudah login atau belum
                $logged_in = false;
                ?>
                <?php if ($session->get('logged_in')) : ?>
                    <li class="sidebar-item">
                        <a class="sidebar-link has-arrow" href="#" aria-expanded="false">
                            <span class="d-flex">
                                <i class="ti ti-user-circle"></i>
                            </span>
                            <span class="hide-menu"><?= $session->get('nama'); ?></span>
                        </a>
                        <ul aria-expanded="false" class="collapse first-level">
                            <li class="sidebar-item">
                                <a href="<?= base_url('dashboard') ?>" class="sidebar-link">
                                    <div class="round-16 d-flex align-items-center justify-content-center">
                                        <i class="ti ti-home"></i>
                                    </div>
                                    <span class="hide-menu">Back to dashboard</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="<?= base_url('logout') ?>" class="sidebar-link">
                                    <div class="round-16 d-flex align-items-center justify-content-center">
                                        <i class="ti ti-logout"></i>
                                    </div>
                                    <span class="hide-menu">Logout</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                <?php else : ?>
                    <li class="sidebar-item">
                        <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                            <span class="d-flex">
                                <i class="ti ti-user-circle"></i>
                            </span>
                            <span class="hide-menu">My Account</span>
                        </a>
                        <ul aria-expanded="false" class="collapse first-level">
                            <li class="sidebar-item">
                                <a href="<?= base_url('login') ?>" class="sidebar-link">
                                    <div class="round-16 d-flex align-items-center justify-content-center">
                                        <i class="ti ti-login"></i>
                                    </div>
                                    <span class="hide-menu">Login</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="<?= base_url('register') ?>" class="sidebar-link">
                                    <div class="round-16 d-flex align-items-center justify-content-center">
                                        <i class="ti ti-registered"></i>
                                    </div>
                                    <span class="hide-menu">Register</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                <?php endif; ?>
            </ul>
        </nav>

        <!-- <div class="fixed-profile p-3 mx-4 mb-2 bg-secondary-subtle rounded sidebar-ad mt-3">
            <div class="hstack gap-3">
                <div class="john-img">
                    <img src="<?= base_url('assets/new_frontend') ?>/images/profile/user-1.jpg" class="rounded-circle" width="40" height="40" alt="" />
                </div>
                <div class="john-title">
                    <h6 class="mb-0 fs-4 fw-semibold">Mathew</h6>
                    <span class="fs-2">Designer</span>
                </div>
                <button class="border-0 bg-transparent text-primary ms-auto" tabindex="0" type="button" aria-label="logout" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="logout">
                    <i class="ti ti-power fs-6"></i>
                </button>
            </div>
        </div> -->

        <!-- ---------------------------------- -->
        <!-- Start Vertical Layout Sidebar -->
        <!-- ---------------------------------- -->
    </div>
</aside>