<?= $this->extend('layouts_frontend/main_frontend'); ?>

<?= $this->section('breadcrumb'); ?>
<!-- breadcrumb start -->
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="page-title">
                    <h2>User Login</h2>
                </div>
            </div>
            <div class="col-sm-6">
                <nav aria-label="breadcrumb" class="theme-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url('/') ?>">Home</a></li>
                        <li class="breadcrumb-item active">login</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb End -->
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<!--section start-->
<section class="login-page section-b-space bg-white">
    <div class="container">
        <div class="row">
            <?php
            // NOTIFIKASI BERHASIL SIMPAN DATA
            if (session()->getFlashdata('pesan')) {
                echo '<div class="alert alert-danger alert-dismissible">
                ' . session()->getFlashdata('pesan') . '</div>';
            }
            ?>
            <?php
            // NOTIFIKASI BERHASIL SIMPAN DATA
            if (session()->getFlashdata('success')) {
                echo '<div class="alert alert-success alert-dismissible">
                ' . session()->getFlashdata('success') . '</div>';
            }
            ?>
            <div class="col-lg-12">
                <h3>Login</h3>
                <div class="theme-card">
                    <form action="<?= base_url('otp/'. session('encrypt')) ?>" method="post" class="theme-form" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class="form-group">
                            <label for="otp">OTP Whatsapp</label>
                            <input type="text" class="form-control" name="otp" id="otp" placeholder="Enter your OTP Code" required autofocus>
                        </div>
                        <button type="submit" class="btn btn-solid">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Section ends-->
<?= $this->endSection(); ?>