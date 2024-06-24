<aside class="left-sidebar with-horizontal">
    <?php
    // SESSION UNTUK MENGAMBIL DATA SESSION
    $session = session();
    ?>
    <!-- Sidebar scroll-->
    <div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar container-fluid">
            <ul id="sidebarnav">
                <!-- ============================= -->
                <!-- Home -->
                <!-- ============================= -->
                <!-- <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">BLog</span>
                </li> -->
                <!-- =================== -->
                <!-- blog -->
                <!-- =================== -->
                <li class="sidebar-item">
                    <!-- <a class="sidebar-link" href="<?= base_url("/"); ?>" aria-expanded="false">
                        <span>
                            <i class="ti ti-aperture"></i>
                        </span>
                        <span class="hide-menu">BLog</span>
                    </a> -->
                    <!-- <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item">
                            <a href="<?= base_url("/"); ?>" class="sidebar-link">
                                <i class="ti ti-aperture"></i>
                                <span class="hide-menu">BLog</span>
                            </a>
                        </li>
                    </ul> -->
                </li>
                <!-- ============================= -->
                <!-- user blacklist -->
                <!-- ============================= -->
                <!-- <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">User Blacklist</span>
                </li> -->
                <li class="sidebar-item">
                    <!-- <a class="sidebar-link" href="<?= base_url("user_blacklist_frontend"); ?>" aria-expanded="false">
                        <span>
                            <i class="ti ti-user-x"></i>
                        </span>
                        <span class="hide-menu">User BLacklist</span>
                    </a> -->
                    <!-- <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item">
                            <a href="<?= base_url("user_blacklist_frontend"); ?>" class="sidebar-link">
                                <i class="ti ti-user-x"></i>
                                <span class="hide-menu">User Blacklist</span>
                            </a>
                        </li>
                    </ul> -->
                </li>
                <!-- ============================= -->
                <!-- alat hilang -->
                <!-- ============================= -->
                <!-- <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Alat Hilang</span>
                </li> -->
                <li class="sidebar-item">
                    <!-- <a class="sidebar-link" href="<?= base_url("alat_hilang/detail"); ?>" aria-expanded="false">
                        <span>
                            <i class="ti ti-tool"></i>
                        </span>
                        <span class="hide-menu">Alat Hilang</span>
                    </a> -->
                    <!-- <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item">
                            <a href="<?= base_url("alat_hilang/detail"); ?>" class=" sidebar-link">
                                <i class="ti ti-tool"></i>
                                <span class="hide-menu">ALat Hilang</span>
                            </a>
                        </li>
                    </ul> -->
                </li>
                <!-- ============================= -->
                <!-- kalender -->
                <!-- ============================= -->
                <!-- <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Kalender</span>
                </li> -->
                <li class="sidebar-item">
                    <!-- <a class="sidebar-link" href="<?= base_url("calendar_frontend"); ?>" aria-expanded="false">
                        <span>
                            <i class="ti ti-calendar"></i>
                        </span>
                        <span class="hide-menu">Kalender</span>
                    </a> -->
                    <!-- <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item">
                            <a href="<?= base_url("calendar_frontend"); ?>" class="sidebar-link">
                                <i class="ti ti-calendar"></i>
                                <span class="hide-menu">Kalender</span>
                            </a>
                        </li>
                    </ul> -->
                </li>
                <!-- ============================= -->
                <!-- My Account -->
                <!-- ============================= -->
                <!-- <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">My Account</span>
                </li> -->
                <!-- <?php
                        // Cek apakah pengguna sudah login atau belum
                        $logged_in = false;
                        ?> -->
                <!-- <?php if ($session->get('logged_in')) : ?>
                    <li class="sidebar-item">
                        <a class="sidebar-link has-arrow" href="#" aria-expanded="false">
                            <span>
                                <i class="ti ti-user-circle"></i>
                            </span>
                            <span class="hide-menu"><?= $session->get('nama'); ?></span>
                        </a>
                        <ul aria-expanded="false" class="collapse first-level">
                            <li class="sidebar-item">
                                <a href="<?= base_url('dashboard') ?>" class="sidebar-link">
                                    <i class="ti ti-home"></i>
                                    <span class="hide-menu">Back to dashboard</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="<?= base_url('logout') ?>" class="sidebar-link">
                                    <i class="ti ti-logout"></i>
                                    <span class="hide-menu">Logout</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                <?php else : ?>
                    <li class="sidebar-item">
                        <a class="sidebar-link has-arrow" href="#" aria-expanded="false">
                            <span>
                                <i class="ti ti-user-circle"></i>
                            </span>
                            <span class="hide-menu">My Account</span>
                        </a>
                        <ul aria-expanded="false" class="collapse first-level">
                            <li class="sidebar-item">
                                <a href="<?= base_url("login"); ?>" class="sidebar-link">
                                    <i class="ti ti-login"></i>
                                    <span class="hide-menu">Login</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="<?= base_url("register"); ?>" class="sidebar-link">
                                    <i class="ti ti-registered"></i>
                                    <span class="hide-menu">Register</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                <?php endif; ?> -->
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->

</aside>