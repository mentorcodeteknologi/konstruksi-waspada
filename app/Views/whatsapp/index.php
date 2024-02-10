<!-- MEMANGGIL SESSION LOGIN -->
<?php $session = session(); ?>

<!-- MEMANGGIL LAYOUTS -->
<?= $this->extend('layouts/app'); ?>

<?= $this->section('content'); ?>
<div class="page-body">
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-header-left">
                        <h3>
                            <?= $title ?>
                            <small><?= $subtitle; ?></small>
                        </h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ol class="breadcrumb pull-right">
                        <li class="breadcrumb-item">
                            <a href="/dashboard">
                                <i data-feather="home"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item active"><?= $title ?></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <button class="btn btn-primary btn-sm">Refresh QR</button>
    
            <?php
    
            // NOTIFIKASI BERHASIL SIMPAN DATA
            if (session()->getFlashdata('pesan')) {
                echo '<div class="alert alert-success alert-dismissible">
                 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' . session()->getFlashdata('pesan') . '</div>';
            }
            ?>
    
            <div class="row justify-content-center">
                <div class="col-lg text-center">
                    <div id="targetQr">
                        <img src="<?= base_url('/assets/frontend/1.jpg')?>" width="400" height="400" class="border" style="display:block; margin: 0 auto;" >
                    </div>
                </div>
            </div>
    
    
           
        </div>
    </div>




</div>
<!-- Container-fluid Ends-->


<?= $this->endSection(); ?>

<?= $this->section('scripts') ?>
<script>
    let statQR;
   $(document).ready(function(){
    getQR();
   });

    
</script>
<?= $this->endSection(); ?>