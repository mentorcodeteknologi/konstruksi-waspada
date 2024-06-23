<?= $this->extend('backend/main') ?>
<?= $this->section('content') ?>
<?= $this->include('backend/layouts/card') ?>
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
<!-- END MODAL -->
<?= $this->endSection() ?>
<?= $this->section('addScripts') ?>
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
        /*=================*/
        // Calender Modal Elements
        /*=================*/
        var getModalTitleEl = document.querySelector("#nama_kegiatan");
        var getModalStartDateEl = document.querySelector("#tanggal_mulai");
        var getModalEndDateEl = document.querySelector("#tanggal_selesai");
        var getModalAddBtnEl = document.querySelector(".btn-add-event");
        var getModalUpdateBtnEl = document.querySelector(".btn-update-event");
        var getModalDeleteBtnEl = document.querySelector(".btn-delete-event");
        var calendarsEvents = {
            Danger: "danger",
            Success: "success",
            Primary: "primary",
            Warning: "warning",
        };
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
            left: "prev next addEventButton",
            center: "title",
            right: "dayGridMonth,timeGridWeek,timeGridDay",
        };
        var calendarEventsList = [{
                id: 1,
                title: "Event Conf.",
                start: `${newDate.getFullYear()}-${getDynamicMonth()}-01`,
                extendedProps: {
                    calendar: "Danger"
                },
            },
            {
                id: 2,
                title: "Seminar #4",
                start: `${newDate.getFullYear()}-${getDynamicMonth()}-07`,
                end: `${newDate.getFullYear()}-${getDynamicMonth()}-10`,
                extendedProps: {
                    calendar: "Success"
                },
            },
            {
                groupId: "999",
                id: 3,
                title: "Meeting #5",
                start: `${newDate.getFullYear()}-${getDynamicMonth()}-09T16:00:00`,
                extendedProps: {
                    calendar: "Primary"
                },
            },
            {
                groupId: "999",
                id: 4,
                title: "Submission #1",
                start: `${newDate.getFullYear()}-${getDynamicMonth()}-16T16:00:00`,
                extendedProps: {
                    calendar: "Warning"
                },
            },
            {
                id: 5,
                title: "Seminar #6",
                start: `${newDate.getFullYear()}-${getDynamicMonth()}-11`,
                end: `${newDate.getFullYear()}-${getDynamicMonth()}-13`,
                extendedProps: {
                    calendar: "Danger"
                },
            },
            {
                id: 6,
                title: "Meeting 3",
                start: `${newDate.getFullYear()}-${getDynamicMonth()}-12T10:30:00`,
                end: `${newDate.getFullYear()}-${getDynamicMonth()}-12T12:30:00`,
                extendedProps: {
                    calendar: "Success"
                },
            },
            {
                id: 7,
                title: "Meetup #",
                start: `${newDate.getFullYear()}-${getDynamicMonth()}-12T12:00:00`,
                extendedProps: {
                    calendar: "Primary"
                },
            },
            {
                id: 8,
                title: "Submission",
                start: `${newDate.getFullYear()}-${getDynamicMonth()}-12T14:30:00`,
                extendedProps: {
                    calendar: "Warning"
                },
            },
            {
                id: 9,
                title: "Attend event",
                start: `${newDate.getFullYear()}-${getDynamicMonth()}-13T07:00:00`,
                extendedProps: {
                    calendar: "Success"
                },
            },
            {
                id: 10,
                title: "Project submission #2",
                start: `${newDate.getFullYear()}-${getDynamicMonth()}-28`,
                extendedProps: {
                    calendar: "Primary"
                },
            },
        ];
        /*=====================*/
        // Calendar Select fn.
        /*=====================*/
        var calendarSelect = function(info) {
            getModalAddBtnEl.style.display = "block";
            getModalUpdateBtnEl.style.display = "none";
            myModal.show();
            getModalStartDateEl.value = info.startStr;
            getModalEndDateEl.value = info.endStr;
        };
        /*=====================*/
        // Calendar AddEvent fn.
        /*=====================*/
        var calendarAddEvent = function() {
            var currentDate = new Date();
            var dd = String(currentDate.getDate()).padStart(2, "0");
            var mm = String(currentDate.getMonth() + 1).padStart(2, "0"); //January is 0!
            var yyyy = currentDate.getFullYear();
            var combineDate = `${yyyy}-${mm}-${dd}`;
            getModalAddBtnEl.style.display = "block";
            getModalUpdateBtnEl.style.display = "none";
            myModal.show();
            getModalStartDateEl.value = combineDate;
            getModalEndDateEl.value = combineDate;
        };

        /*=====================*/
        // Calender Event Function
        /*=====================*/
        var calendarEventClick = function(info) {
            var eventObj = info.event;

            if (eventObj.url) {
                window.open(eventObj.url);

                info.jsEvent.preventDefault();
            } else {
                var getModalEventId = btoa(eventObj._def.publicId);
                var getModalEventLevel = eventObj._def.extendedProps["calendar"];
                var getModalCheckedRadioBtnEl = document.querySelector(
                    `input[value="${getModalEventLevel}"]`
                );

                // Mendapatkan tanggal mulai dan tanggal selesai
                console.log(eventObj);
                var eventStartDate = eventObj._instance.range.start;
                var eventEndDate = eventObj._instance.range.end;

                // Format tanggal jika diperlukan
                var formattedStartDate = eventStartDate ? eventStartDate.toISOString().slice(0, 10) : '';
                var formattedEndDate = eventEndDate ? eventEndDate.toISOString().slice(0, 10) : '';

                getModalTitleEl.value = eventObj.title;
                getModalCheckedRadioBtnEl.checked = true;
                getModalUpdateBtnEl.setAttribute(
                    "data-fc-event-public-id",
                    getModalEventId
                );
                getModalDeleteBtnEl.setAttribute(
                    "data-fc-event-delete-id",
                    getModalEventId
                );
                getModalAddBtnEl.style.display = "none";
                getModalUpdateBtnEl.style.display = "block";

                // Mengisi input tanggal mulai dan tanggal selesai pada modal
                getModalStartDateEl.value = formattedStartDate;
                getModalEndDateEl.value = formattedEndDate;

                myModal.show();
            }
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
            select: calendarSelect,
            unselect: function() {
                console.log("unselected");
            },
            customButtons: {
                addEventButton: {
                    text: "Add Event",
                    click: calendarAddEvent,
                },
            },
            eventClassNames: function({
                event: calendarEvent
            }) {
                const getColorValue =
                    calendarsEvents[calendarEvent._def.extendedProps.calendar];
                return [
                    "event-fc-color fc-bg-" + getColorValue,
                ];
            },

            eventClick: calendarEventClick,
            windowResize: function(arg) {
                if (checkWidowWidth()) {
                    calendar.changeView("listWeek");
                    calendar.setOption("height", 900);
                } else {
                    calendar.changeView("dayGridMonth");
                    calendar.setOption("height", 1052);
                }
            },
        });

        /*=====================*/
        // Update Calender Event
        /*=====================*/
        getModalUpdateBtnEl.addEventListener("click", function() {
            var userID = '<?= session("id") ?>';
            var getPublicID = this.dataset.fcEventPublicId;
            var getTitleUpdatedValue = getModalTitleEl.value;
            var getEvent = calendar.getEventById(atob(getPublicID));
            var getModalUpdatedCheckedRadioBtnEl = document.querySelector('input[name="event-level"]:checked');
            var getModalUpdatedCheckedRadioBtnValue = getModalUpdatedCheckedRadioBtnEl !== null ? getModalUpdatedCheckedRadioBtnEl.value : "";

            var eventData = {
                id_user: userID,
                nama_kegiatan: getTitleUpdatedValue,
                tanggal_mulai: getModalStartDateEl.value,
                tanggal_selesai: getModalEndDateEl.value,
                priority: getModalUpdatedCheckedRadioBtnValue
            };

            $.ajax({
                url: '<?= base_url("calendar/update"); ?>' + '/' + getPublicID,
                type: 'POST',
                contentType: 'application/json',
                data: JSON.stringify(eventData),
                success: function(response) {
                    getEvent.setProp("title", getTitleUpdatedValue);
                    getEvent.setExtendedProp("calendar", getModalUpdatedCheckedRadioBtnValue);
                    calendar.render();
                    myModal.hide();
                },
                error: function(xhr, status, error) {
                    console.error('Error updating event:', error);
                }
            });
        });
        /*=====================*/
        // Delete Calender Event
        /*=====================*/
        getModalDeleteBtnEl.addEventListener("click", function() {
            var getPublicID = getModalUpdateBtnEl.dataset.fcEventPublicId;
            var getEvent = calendar.getEventById(atob(getPublicID));
                    
            $.ajax({
                url: '<?= base_url("calendar/delete"); ?>' + '/' + getPublicID,
                type: 'POST',
                contentType: 'application/json',
                data: JSON.stringify({}),
                success: function(response) {
                    getEvent.remove();
                    calendar.render();
                    myModal.hide();
                },
                error: function(xhr, status, error) {
                    console.error('Error deleting event:', error);
                }
            });
        });
        /*=====================*/
        // Add Calender Event
        /*=====================*/
        getModalAddBtnEl.addEventListener("click", function() {
            var userID = '<?= session("id") ?>';
            var eventTitle = getModalTitleEl.value;
            var getModalCheckedRadioBtnEl = document.querySelector('input[name="event-level"]:checked');
            var getModalCheckedRadioBtnElValue = getModalCheckedRadioBtnEl !== null ? getModalCheckedRadioBtnEl.value : "Primary";

            var eventData = {
                id_user: userID,
                nama_kegiatan: eventTitle,
                tanggal_mulai: getModalStartDateEl.value,
                tanggal_selesai: getModalEndDateEl.value,
                priority: getModalCheckedRadioBtnElValue,
                allDay: true
            };

            $.ajax({
                url: '<?= base_url("calendar/create"); ?>',
                type: 'POST',
                contentType: 'application/json',
                data: JSON.stringify(eventData),
                success: function(response) {
                    calendar.addEvent({
                        id: userID,
                        title: eventTitle,
                        start: getModalStartDateEl.value,
                        end: getModalEndDateEl.value,
                        allDay: true,
                        calendar: getModalCheckedRadioBtnElValue
                    });
                    calendar.render();
                    myModal.hide();
                },
                error: function(xhr, status, error) {
                    console.error('Error creating event:', error);
                    myModal.hide();
                }
            });
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