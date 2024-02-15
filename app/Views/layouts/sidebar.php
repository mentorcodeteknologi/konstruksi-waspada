<?php
// SESSION UNTUK MENGAMBIL DATA SESSION
$session = session();
?>


<!-- Page Body Start-->
<div class="page-body-wrapper">

    <!-- Page Sidebar Start-->
    <div class="page-sidebar">
        <div class="main-header-left d-none d-lg-block">
            <div class="logo-wrapper">
                <a href="index.html">
                    <img class="d-none d-lg-block blur-up lazyloaded" src="<?= base_url('assets/backend') ?>/images/dashboard/multikart-logo.png" alt="">
                </a>
            </div>
        </div>
        <div class="sidebar custom-scrollbar">
            <a href="javascript:void(0)" class="sidebar-back d-lg-none d-block"><i class="fa fa-times" aria-hidden="true"></i></a>
            <div class="sidebar-user">
                <img class="img-60" src="<?= base_url('assets/backend/images/') . $session->get('foto') ?>" alt=" #">
                <div>
                    <h6 class="f-14"><?= $session->get('nama'); ?></h6>
                    <p><?= $session->get('role'); ?></p>
                </div>
            </div>
            <ul class="sidebar-menu">
                <li>
                    <a class="sidebar-header" href="<?= base_url('dashboard'); ?>">
                        <i data-feather="home"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <!-- HALAMAN KELOLA USER KHUSUS ROLE ADMIN -->
                <?php if ($session->get('role') == 'admin') { ?>
                    <li>
                        <a class="sidebar-header" href="<?= base_url('users'); ?>">
                            <i data-feather="user"></i>
                            <span>Users</span>
                        </a>
                    </li>
                <?php } ?>
                <li>
                    <a class="sidebar-header" href="<?= base_url('pembayaran'); ?>">
                        <i data-feather="dollar-sign"></i>
                        <span>Pembayaran</span>
                    </a>
                </li>
                <li>
                    <a class="sidebar-header" href="<?= base_url('artikel'); ?>">
                        <i data-feather="camera"></i>
                        <span>Artikel</span>
                    </a>
                </li>
                <li>
                    <a class="sidebar-header" href="<?= base_url('alat_hilang'); ?>">
                        <i data-feather="tool"></i>
                        <span>Alat Hilang</span>
                    </a>
                </li>
                <li>
                    <a class="sidebar-header" href="<?= base_url('user_blacklist'); ?>">
                        <i data-feather="users"></i>
                        <span>User Blacklist</span>
                    </a>
                </li>
                <li>
                    <a class="sidebar-header" href="<?= base_url('kalender'); ?>">
                        <i data-feather="calendar"></i>
                        <span>Kalender</span>
                    </a>
                </li>
                <li>
                    <a class="sidebar-header" href="<?= base_url('scan_qr'); ?>">
                        <i data-feather="tablet"></i>
                        <span>Scan QR Whatsapp</span>
                    </a>
                </li>
                <li>
                    <a class="sidebar-header" href="<?= base_url('logout'); ?>">
                        <i data-feather="log-out"></i>
                        <span>Logout</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <!-- Page Sidebar Ends-->

    <!-- Right sidebar Start-->
    <div class="right-sidebar" id="right_side_bar">
        <div>
            <div class="container p-0">
                <div class="modal-header p-l-20 p-r-20">
                    <div class="col-sm-8 p-0">
                        <h6 class="modal-title font-weight-bold">FRIEND LIST</h6>
                    </div>
                    <div class="col-sm-4 text-end p-0">
                        <i class="me-2" data-feather="settings"></i>
                    </div>
                </div>
            </div>
            <div class="friend-list-search mt-0">
                <input type="text" placeholder="search friend">
                <i class="fa fa-search"></i>
            </div>
            <div class="p-l-30 p-r-30 friend-list-name">
                <div class="chat-box">
                    <div class="people-list friend-list">
                        <ul class="list">
                            <li class="clearfix">
                                <img class="rounded-circle user-image blur-up lazyloaded" src="<?= base_url('assets/backend') ?>/images/dashboard/user.jpg" alt="">
                                <div class="status-circle online"></div>
                                <div class="about">
                                    <div class="name">Vincent Porter</div>
                                    <div class="status">Online</div>
                                </div>
                            </li>
                            <li class="clearfix">
                                <img class="rounded-circle user-image blur-up lazyloaded" src="<?= base_url('assets/backend') ?>/images/dashboard/user1.jpg" alt="">
                                <div class="status-circle away"></div>
                                <div class="about">
                                    <div class="name">Ain Chavez</div>
                                    <div class="status">28 minutes ago</div>
                                </div>
                            </li>
                            <li class="clearfix">
                                <img class="rounded-circle user-image blur-up lazyloaded" src="<?= base_url('assets/backend') ?>/images/dashboard/user2.jpg" alt="">
                                <div class="status-circle online"></div>
                                <div class="about">
                                    <div class="name">Kori Thomas</div>
                                    <div class="status">Online</div>
                                </div>
                            </li>
                            <li class="clearfix">
                                <img class="rounded-circle user-image blur-up lazyloaded" src="<?= base_url('assets/backend') ?>/images/dashboard/user3.jpg" alt="">
                                <div class="status-circle online"></div>
                                <div class="about">
                                    <div class="name">Erica Hughes</div>
                                    <div class="status">Online</div>
                                </div>
                            </li>
                            <li class="clearfix">
                                <img class="rounded-circle user-image blur-up lazyloaded" src="<?= base_url('assets/backend') ?>/images/dashboard/user3.jpg" alt="">
                                <div class="status-circle offline"></div>
                                <div class="about">
                                    <div class="name">Ginger Johnston</div>
                                    <div class="status">2 minutes ago</div>
                                </div>
                            </li>
                            <li class="clearfix">
                                <img class="rounded-circle user-image blur-up lazyloaded" src="<?= base_url('assets/backend') ?>/images/dashboard/user5.jpg" alt="">
                                <div class="status-circle away"></div>
                                <div class="about">
                                    <div class="name">Prasanth Anand</div>
                                    <div class="status">2 hour ago</div>
                                </div>
                            </li>
                            <li class="clearfix">
                                <img class="rounded-circle user-image blur-up lazyloaded" src="<?= base_url('assets/backend') ?>/images/dashboard/designer.jpg" alt="">
                                <div class="status-circle online"></div>
                                <div class="about">
                                    <div class="name">Hileri Jecno</div>
                                    <div class="status">Online</div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Right sidebar Ends-->