<script src="<?= base_url('assets/new_frontend') ?>/libs/jquery/dist/jquery.min.js"></script>
<script src="<?= base_url('assets/new_frontend') ?>/js/app.min.js"></script>
<script src="<?= base_url('assets/new_frontend') ?>/js/app.init.js"></script>
<script src="<?= base_url('assets/new_frontend') ?>/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('assets/new_frontend') ?>/libs/simplebar/dist/simplebar.min.js"></script>

<script src="<?= base_url('assets/new_frontend') ?>/js/sidebarmenu.js"></script>
<script src="<?= base_url('assets/new_frontend') ?>/js/theme.js"></script>



<?php switch ($title) {
    case 'Dashboard':
        echo '<script src="' . base_url('assets/new_frontend/libs/owl.carousel/dist/owl.carousel.min.js') . '"></script>';
        echo '<script src="' . base_url('assets/new_frontend/libs/apexcharts/dist/apexcharts.min.js') . '"></script>';
        echo '<script src="' . base_url('assets/new_frontend/js/dashboards/dashboard.js') . '"></script>';
        break;
    case 'Users':
        echo '<script src="' . base_url('assets/new_frontend/libs/fullcalendar/index.global.min.js') . '"></script>';
        echo '<script src="' . base_url('assets/new_frontend/js/apps/contact.js') . '"></script>';
        break;
    default:
        // No default script
        break;
} ?>