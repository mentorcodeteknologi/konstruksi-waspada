<?php
// SESSION UNTUK MENGAMBIL DATA SESSION
$session = session();
?>
<!-- Page Header Start-->
<div class="page-main-header">
    <div class="main-header-right row">
        <div class="main-header-left d-lg-none w-auto">
            <div class="logo-wrapper">
                <a href="index.html">
                    <img class="blur-up lazyloaded d-block d-lg-none" src="assets/images/dashboard/multikart-logo-black.png" alt="">
                </a>
            </div>
        </div>
        <div class="mobile-sidebar w-auto">
            <div class="media-body text-end switch-sm">
                <label class="switch">
                    <a href="javascript:void(0)">
                        <i id="sidebar-toggle" data-feather="align-left"></i>
                    </a>
                </label>
            </div>
        </div>
        <div class="nav-right col">
            <ul class="nav-menus">
                <!-- <li>
                    <form class="form-inline search-form">
                        <div class="form-group">
                            <input class="form-control-plaintext" type="search" placeholder="Search..">
                            <span class="d-sm-none mobile-search">
                                <i data-feather="search"></i>
                            </span>
                        </div>
                    </form>
                </li> -->
                <li>
                    <a class="text-dark" href="#!" onclick="javascript:toggleFullScreen()">
                        <i data-feather="maximize-2"></i>
                    </a>
                </li>

                <li class="onhover-dropdown">
                    <div class="media align-items-center">
                        <?php
                        $foto = ($session->get('foto') == 'default.png') ? base_url('assets/backend/images/') . $session->get('foto') : base_url('assets/backend/images/profile/') . $session->get('encrypt') . "/" . $session->get('foto');
                        ?>
                        <img class="align-self-center pull-right img-50 blur-up lazyloaded" src="<?= $foto; ?>" alt="header-user">
                        <div class="dotted-animation">
                            <span class="animate-circle"></span>
                            <span class="main-circle"></span>
                        </div>
                    </div>
                    <ul class="profile-dropdown onhover-show-div p-20 profile-dropdown-hover">
                        <li>
                            <a href="<?= base_url('users/edit-profile/') . $session->get('encrypt'); ?>">
                                <i data-feather="user"></i>Edit Profile
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url('logout'); ?>">
                                <i data-feather="log-out"></i>Logout
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
            <div class="d-lg-none mobile-toggle pull-right">
                <i data-feather="more-horizontal"></i>
            </div>
        </div>
    </div>
</div>
<!-- Page Header Ends -->