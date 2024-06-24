<?= $this->extend('backend/main') ?>

<?= $this->section('content') ?>
<?= $this->include('backend/layouts/card') ?>
<div class="card card-body">
    <div class="row">
        <div class="col-md-4 col-xl-3">


        </div>
        <div class="col-md-8 col-xl-9 text-end d-flex justify-content-md-end justify-content-center mt-3 mt-md-0">
            <button id="btn-add-contact" onclick="hitGetAPI('/api/ready')" class="btn btn-info d-flex align-items-center">
                <i class="ti ti-qrcode text-white me-1 fs-5"></i> Refresh
            </button>
        </div>
    </div>
</div>
<div class="row justify-content-center">
    <!-- column -->
    <div class="col-lg-8 col-md-6">
        <!-- Card -->
        <div class="card card-body">
            <div class="">
                <div class="d-flex justify-content-center">
                    <div class="spinner-border" role="status" id="spinner">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>
                <div id="targetQr" class="mt-3" style="display:block; margin: 0 auto;">
                </div>
                <div id="wa-label">
                    <h2 class="text-center" style="display:none;">SCAN WHATSAPP BOT</h2>
                </div>
                <div id="status-connect" style="display:none;">
                    <h2 class="text-center text-success">WhatsApp Connected</h2>
                    <br>
                </div>
                <div id="status-disconnect" style="display:none;">
                    <h2 class="text-center text-danger">WhatsApp Disconnect</h2>
                    <br>
                    <h6 class="text-center">Refresh Page!</h6>
                </div>
                <div id="error-status" style="display:none;">Somethings Wrong!</div>
            </div>
        </div>
        <!-- Card -->
    </div>
    <!-- column -->
</div>

<?= $this->endSection() ?>
<?= $this->section('addScripts') ?>
<script src="<?= base_url('assets/new_frontend/js') ?>/qrcode.js"></script>
<script src="<?= base_url('assets/new_frontend/js') ?>/pusher.min.js"></script>
<script>
    // Enable pusher logging - don't include this in production
    // Pusher.logToConsole = true;

    var pusher = new Pusher('<?= $pusher["key"] ?>', {
        cluster: '<?= $pusher['cluster']; ?>',
    });

    var channel = pusher.subscribe('my-channel');
    channel.bind('my-event', function(data) {
        let res = JSON.parse(JSON.stringify(data));
        if (res.qr) {
            showQrCode(res.qr);
            show(false);
        } else if (res.code === "status") {
            if (res.message === "Connected") {
                show(true);
                return;
            }
            if (res.message === "Not Connected") {
                show(true);
                return;
            }
            if (res.message === "Disconnected") {
                $('#targetQr').hide();
                $('#wa-label').hide();
                $('#status-connect').hide();
                $('#status-disconnect').show();
                return;
            }

            // if () {
            //     $('#targetQr').hide();
            //     $('#status-connect').show();
            // }
            // if (res.message === "Not Connected") {
            //     $('#targetQr').show();
            //     $('#status-connect').hide();
            // }
        }
        // alert(data);
    });
    // document.addEventListener('contextmenu', function(e) {
    //     e.preventDefault();
    // });
    // document.onkeydown = function(e) {
    //     if(e.keyCode == 123) {
    //         return false; // F12
    //     }
    //     if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)) {
    //         return false; // Ctrl+Shift+I
    //     }
    //     if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)) {
    //         return false; // Ctrl+Shift+J
    //     }
    //     if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)) {
    //         return false; // Ctrl+U
    //     }
    // }
    let waUrl = '<?= $node["url"] . ':' . $node['port'] ?>';
    if ($node['port'] == "" || $url['port'] == null) {
        waUrl = '<?= $node["url"] ?>';
    }

    function hitPostAPI(data, api) {
        $.ajax({
            url: waUrl + api,
            method: 'POST',
            data: data,
            contentType: "application/json",
            dataType: "json",
            beforeSend: function() {
                // $("#targetQr").html("");
                // $("#targetQr").append(`<div class="spinner-border" role="status">
                //                         <span class="visually-hidden">Loading...</span>
                //                       </div>`);
            },
            success: function(res) {
                token = res.token;
                $.ajaxSetup({
                    headers: {
                        'Authorization': `Bearer ${token}`
                    }
                });
                hitGetAPI('/api/qr-code');
            },
            error: function(xhr, status, error) {
                console.error(status, error);
            }
        });
    }

    // function setToken() {
    //     let data = JSON.stringify({
    //         username: "<= $user[0]["url"] ?>",
    //         password: "<= $user[0]["port"] ?>"
    //     });
    //     hitPostAPI(data, '/api/login');
    // }

    function show(bool) {
        $('#spinner').hide();
        if (bool) {
            $('#targetQr').hide();
            $('#wa-label').hide();
            $('#status-connect').show();
            return;
        }
        $('#targetQr').show();
        $('#wa-label').show();
        $('#status-connect').hide();
    };

    function hitGetAPI(api) {
        $('#spinner').show();
        $('#targetQr').hide();
        $('#wa-label').hide();
        $('#status-connect').hide();
        $.ajax({
            url: waUrl + api,
            method: 'GET',
            contentType: "application/json",
            dataType: "json",
            success: function(res) {
                // if (res.status != 200) {
                //     setToken();
                //     return;
                // }

                if (res.status == 200) {
                    if (res.qrData != null) {
                        show(false);
                        showQrCode(res.qrData);
                        return;
                    }
                    show(true);
                }
                // if (res.status) {
                // $('#targetQr').hide();
                // $('#status-connect').show();
                //     // clearInterval(intervalId);
                // } else if (res.qrCodeData) {
                //     showQrCode(res.qrCodeData ?? null);
                // } else {
                //     setToken();

                // }
            },
            error: function(xhr, status, error) {
                console.error(status, error);
                show(true);
            }
        });
    }

    function showQrCode(qrCodeData) {
        $("#targetQr").html("");
        var qr = new QRCode(document.getElementById("targetQr"), {
            text: qrCodeData,
            width: 400,
            height: 400,
            colorDark: "#000000",
            colorLight: "#ffffff",
            correctLevel: QRCode.CorrectLevel.H
        });
        // Tampilkan gambar QR Code di halaman
        // $("#targetQr").append(`<img src="${imageDataUrl}" width="400" height="400" class="border" style="display:block; margin: 0 auto;" >`);

    }
    // // let statQR;
    // // let intervalId; 
    // $(document).ready(() => {
    //     // hitGetAPI("/api/ready");
    //     const socket = new WebSocket('<= $web[0]["url"] . ':' . $web[0]['port'] ?>');
    //     socket.onopen = function(event) {
    //         hitGetAPI("/api/ready");
    //         console.log('Connected to WebSocket server');
    //     };
    //     socket.onmessage = function(event) {
    //         const messageData = JSON.parse(event.data);
    //         if (messageData.code === "qr") {
    //             showQrCode(messageData.message);
    //         } else if (messageData.code === "status") {
    //             if (messageData.message === "Connected") {
    //                 $('#targetQr').hide();
    //                 $('#status-connect').show();
    //             }
    //             if (messageData.message === "Not Connected") {
    //                 $('#targetQr').show();
    //                 $('#status-connect').hide();
    //             }
    //         }

    //     };
    // });
</script>
<?= $this->endSection() ?>