<header>
    <?php
    // SESSION UNTUK MENGAMBIL DATA SESSION
    $session = session();
    ?>
    <div class="mobile-fix-option"></div>
    <div class="top-header">
        <div class="container">
            <div class="row ">
                <div class="col-lg-12">
                    <!-- <div class="header-contact">
                    </div> -->
                    <ul class="header-dropdown">
                        <li class="onhover-dropdown mobile-account">
                            <i class="fa fa-globe" aria-hidden="true"></i>
                            <ul class="onhover-show-div">
                                <li>
                                    <a href="<?= base_url('/') ?>">Blog</a>
                                </li>
                            </ul>
                        </li>
                        <li class="onhover-dropdown mobile-account">
                            <i class="fa fa-users" aria-hidden="true"></i>
                            <ul class="onhover-show-div">
                                <li> <a href="<?= base_url('user_blacklist_frontend') ?>">User Blacklist</a></li>
                            </ul>
                        </li>
                        <li class="onhover-dropdown mobile-account">
                            <i class="fa fa-wrench" aria-hidden="true"></i>
                            <ul class="onhover-show-div">
                                <li><a href="<?= base_url('alat_hilang/detail') ?>">Alat Hilang</a></li>
                            </ul>
                        </li>
                        <li class="onhover-dropdown mobile-account">
                            <i class="fa fa-calendar" aria-hidden="true"></i>
                            <ul class="onhover-show-div">
                                <li><a href="<?= base_url('calendar_frontend') ?>">Kalender</a></li>
                            </ul>
                        </li>
                        <?php
                        // Cek apakah pengguna sudah login atau belum
                        $logged_in = false;
                        ?>
                        <li class="onhover-dropdown mobile-account">
                            <?php if ($session->get('logged_in')) : ?>
                                <!-- Jika pengguna sudah login, tampilkan tombol logout -->
                                <i class="fa fa-user" aria-hidden="true"></i><?= $session->get('nama'); ?></a>
                                <ul class="onhover-show-div">
                                    <li><a href="<?= base_url('dashboard'); ?>">Dashboard</a></li>
                                    <li><a href="<?= base_url('logout') ?>">Logout</a></li>
                                </ul>
                            <?php else : ?>
                                <!-- Jika pengguna belum login, tampilkan tombol login -->
                                <i class="fa fa-user" aria-hidden="true"></i></a>
                                <ul class="onhover-show-div">
                                    <li><a href="<?= base_url('login') ?>">Login</a></li>
                                    <li><a href="<?= base_url('register') ?>">Register</a></li>
                                </ul>
                            <?php endif; ?>
                        </li>
                    </ul>
                </div>
                <!-- <div class="col-lg-6 text-end">
                    
                </div> -->
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="main-menu">
                    <div class="menu-left">
                        <div class="navbar">
                            <!-- <a href="javascript:void(0)" onclick="openNav()">
                                    <div class="bar-style"> <i class="fa fa-bars sidebar-bar" aria-hidden="true"></i>
                                    </div>
                                </a> -->

                        </div>
                        <div class="brand-logo">
                            <img src="<?= base_url('assets/frontend') ?>/images/icon/logo.png" class="img-fluid blur-up lazyload" alt="">
                        </div>
                    </div>
                    <div class="menu-right pull-right">
                        <div>
                            <nav id="main-nav">
                                <!-- <div class="toggle-nav"><i class="fa fa-bars sidebar-bar"></i></div> -->
                                <ul id="main-menu" class="sm pixelstrap sm-horizontal">
                                    <li>
                                        <div class="mobile-back text-end">Back<i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
                                    </li>
                                    <li>
                                        <a href="<?= base_url('/') ?>">Blog</a>
                                    </li>
                                    <li>
                                        <a href="<?= base_url('user_blacklist_frontend') ?>">User Blacklist</a>
                                    </li>
                                    <li>
                                        <a href="<?= base_url('alat_hilang/detail') ?>">Alat Hilang</a>
                                    </li>
                                    <li>
                                        <a href="<?= base_url('calendar_frontend') ?>">Kalender</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>