<?= $this->extend('new_ui_frontend/layouts_new/main'); ?>
<?= $this->section('content'); ?>

<div class="container-fluid">
<div class="card">
    <div>
        <div class="row gx-0">
            <div class="col-lg-12">
                <div class="p-4 calender-sidebar app-calendar">
                    <div id="calendar"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- BEGIN MODAL -->
<div class="modal fade" id="eventModal" tabindex="-1" aria-labelledby="eventModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="eventModalLabel">
                    Add / Edit Event
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="tanggal_mulai" class="form-label">Tanggal Mulai<span class="text-danger">*</span></label>
                            <input type="date" name="tanggal_mulai" id="tanggal_mulai" class="form-control" placeholder="Tanggal Kegiatan" required>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="tanggal_selesai" class="form-label">Tanggal Selesai<span class="text-danger">*</span></label>
                            <input type="date" name="tanggal_selesai" id="tanggal_selesai" class="form-control" placeholder="Tanggal Kegiatan" required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="nama_kegiatan" class="form-label">Nama Kegiatan<span class="text-danger">*</span></label>
                    <textarea name="nama_kegiatan" id="nama_kegiatan" class="form-control" placeholder="Nama Kegiatan" required> </textarea>
                </div>
                <div class="col-md-12 mt-4">
                    <div><label class="form-label">Urgensi</label></div>
                    <div class="d-flex">
                        <div class="n-chk">
                            <div class="form-check form-check-primary form-check-inline">
                                <input class="form-check-input" type="radio" name="event-level" value="Danger" id="modalDanger" />
                                <label class="form-check-label text-danger" for="modalDanger">High</label>
                            </div>
                        </div>
                        <div class="n-chk">
                            <div class="form-check form-check-danger form-check-inline">
                                <input class="form-check-input" type="radio" name="event-level" value="Warning" id="modalWarning" />
                                <label class="form-check-label text-warning" for="modalWarning">Medium</label>
                            </div>
                        </div>
                        <div class="n-chk">
                            <div class="form-check form-check-success form-check-inline">
                                <input class="form-check-input" type="radio" name="event-level" value="Primary" id="modalPrimary" />
                                <label class="form-check-label text-primary" for="modalPrimary">Low</label>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn" data-bs-dismiss="modal">
                    Close
                </button>
                <button type="button" class="btn btn-success btn-update-event" data-fc-event-public-id="">
                    Update
                </button>
                <button type="button" class="btn btn-danger btn-delete-event">
                    Delete
                </button>
                <button type="button" class="btn btn-primary btn-add-event">
                    Add Event
                </button>
            </div>
        </div>
    </div>
</div>
</div>
<!-- END MODAL -->
<?= $this->endSection() ?>
<?= $this->section('addScripts') ?>
<script src="<?= base_url('assets/new_frontend/libs/fullcalendar/index.global.min.js') ?>"></script>
<script>
    // document.addEventListener('DOMContentLoaded', function() {
    //     var calendarEl = document.getElementById('calendar');
    //     var calendar = new FullCalendar.Calendar(calendarEl, {
    //         initialView: 'dayGridMonth',
    //         events: '<php echo base_url('calendar_data'); ?>'
    //     });
    //     calendar.render();
    // });
    /*========Calender Js=========*/
    /*==========================*/

    document.addEventListener("DOMContentLoaded", function() {
        /*=================*/
        //  Calender Date variable
        /*=================*/
        var newDate = new Date();

        function getDynamicMonth() {
            getMonthValue = newDate.getMonth();
            _getUpdatedMonthValue = getMonthValue + 1;
            if (_getUpdatedMonthValue < 10) {
                return `0${_getUpdatedMonthValue}`;
            } else {
                return `${_getUpdatedMonthValue}`;
            }
        }
        /*=====================*/
        // Calendar Elements and options
        /*=====================*/
        var calendarEl = document.querySelector("#calendar");
        var checkWidowWidth = function() {
            if (window.innerWidth <= 1199) {
                return true;
            } else {
                return false;
            }
        };
        var calendarHeaderToolbar = {
            left: "prev next",
            center: "title",
            right: "dayGridMonth,timeGridWeek,timeGridDay",
        };

        /*=====================*/
        // Active Calender
        /*=====================*/
        var calendar = new FullCalendar.Calendar(calendarEl, {
            selectable: true,
            height: checkWidowWidth() ? 900 : 1052,
            initialView: checkWidowWidth() ? "listWeek" : "dayGridMonth",
            initialDate: `${newDate.getFullYear()}-${getDynamicMonth()}-07`,
            headerToolbar: calendarHeaderToolbar,
            events: '<?php echo base_url("calendar_data"); ?>',
            
        });
        /*=====================*/
        // Calendar Init
        /*=====================*/
        calendar.render();
        var myModal = new bootstrap.Modal(document.getElementById("eventModal"));
        var modalToggle = document.querySelector(".fc-addEventButton-button ");
        document
            .getElementById("eventModal")
            .addEventListener("hidden.bs.modal", function(event) {
                getModalTitleEl.value = "";
                getModalStartDateEl.value = "";
                getModalEndDateEl.value = "";
                var getModalIfCheckedRadioBtnEl = document.querySelector(
                    'input[name="event-level"]:checked'
                );
                if (getModalIfCheckedRadioBtnEl !== null) {
                    getModalIfCheckedRadioBtnEl.checked = false;
                }
            });
    });
</script>
<?= $this->endSection() ?>