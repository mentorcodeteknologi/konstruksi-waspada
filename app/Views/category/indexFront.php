<?= $this->extend('layouts_frontend/main_frontend'); ?>

<?= $this->section('breadcrumb'); ?>
<?php
// SESSION UNTUK MENGAMBIL DATA SESSION
$session = session();
?>
<!-- breadcrumb start -->
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="page-title">
                    <h2><?= $title; ?></h2>
                </div>
            </div>
            <div class="col-sm-6">
                <nav aria-label="breadcrumb" class="theme-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url('/') ?>">Home</a></li>
                        <li class="breadcrumb-item active"><?= $title; ?></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb End -->
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="page-body">
    <!-- Container-fluid starts-->
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div id='calendar'></div>

            </div>
        </div>
    </div>




</div>
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.min.js'></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            events: '<?php echo base_url('calendar_data'); ?>'
        });
        calendar.render();
    });
</script>
<?= $this->endSection(); ?>