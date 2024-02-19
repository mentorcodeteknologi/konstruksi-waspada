<header>
    <?php
    // SESSION UNTUK MENGAMBIL DATA SESSION
    $session = session();
    ?>
    <div class="mobile-fix-option"></div>
    <div class="top-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="header-contact">
                    </div>
                </div>
                <div class="col-lg-6 text-end">
                    <ul class="header-dropdown">
                        <li class="onhover-dropdown mobile-account">
                            <i class="fa fa-globe" aria-hidden="true"></i> Blog
                            <ul class="onhover-show-div">
                                <li>
                                    <a href="<?= base_url('/') ?>">Blog</a>
                                </li>
                            </ul>
                        </li>
                        <li class="onhover-dropdown mobile-account">
                            <i class="fa fa-building" aria-hidden="true"></i>User Blacklist
                            <ul class="onhover-show-div">
                                <li> <a href="<?= base_url('user_blacklist_frontend') ?>">User Blacklist</a></li>
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
                                <i class="fa fa-user" aria-hidden="true"></i> My Account</a>
                                <ul class="onhover-show-div">
                                    <li><a href="<?= base_url('login') ?>">Login</a></li>
                                    <li><a href="<?= base_url('register') ?>">Register</a></li>
                                </ul>
                            <?php endif; ?>
                        </li>
                    </ul>
                </div>
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
                            <div id="mySidenav" class="sidenav">
                                <a href="javascript:void(0)" class="sidebar-overlay" onclick="closeNav()"></a>
                                <nav>
                                    <div onclick="closeNav()">
                                        <div class="sidebar-back text-start">
                                            <i class="fa fa-angle-left pe-2" aria-hidden="true"></i> Back
                                        </div>
                                    </div>
                                    <!-- Vertical Menu -->
                                    <ul id="sub-menu" class="sm pixelstrap sm-vertical ">
                                        <li><a href="#">clothing</a>
                                            <ul class="mega-menu clothing-menu">
                                                <li>
                                                    <div class="row m-0">
                                                        <div class="col-xl-4">
                                                            <div class="link-section">
                                                                <h5>women's fashion</h5>
                                                                <ul>
                                                                    <li><a href="#">dresses</a></li>
                                                                    <li><a href="#">skirts</a></li>
                                                                    <li><a href="#">westarn wear</a></li>
                                                                    <li><a href="#">ethic wear</a></li>
                                                                    <li><a href="#">sport wear</a></li>
                                                                </ul>
                                                                <h5>men's fashion</h5>
                                                                <ul>
                                                                    <li><a href="#">sports wear</a></li>
                                                                    <li><a href="#">western wear</a></li>
                                                                    <li><a href="#">ethic wear</a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-4">
                                                            <div class="link-section">
                                                                <h5>accessories</h5>
                                                                <ul>
                                                                    <li><a href="#">fashion jewellery</a></li>
                                                                    <li><a href="#">caps and hats</a></li>
                                                                    <li><a href="#">precious jewellery</a></li>
                                                                    <li><a href="#">necklaces</a></li>
                                                                    <li><a href="#">earrings</a></li>
                                                                    <li><a href="#">wrist wear</a></li>
                                                                    <li><a href="#">ties</a></li>
                                                                    <li><a href="#">cufflinks</a></li>
                                                                    <li><a href="#">pockets squares</a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-4">
                                                            <a href="#" class="mega-menu-banner"><img src="<?= base_url('assets/frontend') ?>/images/mega-menu/fashion.jpg" alt="" class="img-fluid blur-up lazyload"></a>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a href="#">bags</a>
                                            <ul>
                                                <li><a href="#">shopper bags</a></li>
                                                <li><a href="#">laptop bags</a></li>
                                                <li><a href="#">clutches</a></li>
                                                <li><a href="#">purses</a>
                                                    <ul>
                                                        <li><a href="#">purses</a></li>
                                                        <li><a href="#">wallets</a></li>
                                                        <li><a href="#">leathers</a></li>
                                                        <li><a href="#">satchels</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a href="#">footwear</a>
                                            <ul>
                                                <li><a href="#">sport shoes</a></li>
                                                <li><a href="#">formal shoes</a></li>
                                                <li><a href="#">casual shoes</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">watches</a>
                                        </li>
                                        <li><a href="#">Accessories</a>
                                            <ul>
                                                <li><a href="#">fashion jewellery</a></li>
                                                <li><a href="#">caps and hats</a></li>
                                                <li><a href="#">precious jewellery</a></li>
                                                <li><a href="#">more..</a>
                                                    <ul>
                                                        <li><a href="#">necklaces</a></li>
                                                        <li><a href="#">earrings</a></li>
                                                        <li><a href="#">wrist wear</a></li>
                                                        <li><a href="#">accessories</a>
                                                            <ul>
                                                                <li><a href="#">ties</a></li>
                                                                <li><a href="#">cufflinks</a></li>
                                                                <li><a href="#">pockets squares</a></li>
                                                                <li><a href="#">helmets</a></li>
                                                                <li><a href="#">scarves</a></li>
                                                                <li><a href="#">more...</a>
                                                                    <ul>
                                                                        <li><a href="#">accessory gift sets</a></li>
                                                                        <li><a href="#">travel accessories</a></li>
                                                                        <li><a href="#">phone cases</a></li>
                                                                    </ul>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                        <li><a href="#">belts & more</a></li>
                                                        <li><a href="#">wearable</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a href="#">house of design</a>
                                        </li>

                                        <li><a href="#">beauty & personal care</a>
                                            <ul>
                                                <li><a href="#">makeup</a></li>
                                                <li><a href="#">skincare</a></li>
                                                <li><a href="#">premium beaty</a></li>
                                                <li><a href="#">more</a>
                                                    <ul>
                                                        <li><a href="#">fragrances</a></li>
                                                        <li><a href="#">luxury beauty</a></li>
                                                        <li><a href="#">hair care</a></li>
                                                        <li><a href="#">tools & brushes</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a href="#">home & decor</a>
                                        </li>
                                        <li><a href="#">kitchen</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="brand-logo">
                            <a href="index.html"> <img src="<?= base_url('assets/frontend') ?>/images/icon/logo.png" class="img-fluid blur-up lazyload" alt=""></a>
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