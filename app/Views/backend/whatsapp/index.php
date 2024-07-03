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
    <div class="col-lg-4 col-md-4">
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
                <div id="wa-label" style="display:none;">
                    <h2 class="text-center">SCAN WHATSAPP</h2>
                </div>
                <div id="status-connect" style="display:none;">
                    <h2 class="text-center text-success">WhatsApp Connected</h2>
                </div>
                <div id="status-disconnect" style="display:none;">
                    <h2 class="text-center text-danger">WhatsApp Disconnect</h2>
                </div>
                <div id="status-error" style="display:none;">
                    <h2 class="text-center text-danger">Somethings Wrong!</h2>
                    <br>
                    <h6 class="text-center">Please check server!</h6>
                </div>
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
    var pusher = new Pusher('<?= $pusher["key"] ?>', {
        cluster: '<?= $pusher['cluster']; ?>',
    });

    var channel = pusher.subscribe('my-channel');
    channel.bind('my-event', function(data) {
        let res = JSON.parse(JSON.stringify(data));
        $('#status-connect').hide();
        $('#status-error').hide();
        $('#status-disconnect').hide();
        console.log(res);
        if (res.message === "Connected") {
            show(true);
            return;
        }
        if (res.message === "Not Connected") {
            if (res.qr != null) {
                show(false);
                showQrCode(res.qr);
                return;
            }
            $("#targetQr").html("");
            $("#targetQr").append(`<div class="spinner-border" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                      </div>`);
            $("#targetQr").append(`<span>Please wait...</span>`);
        }
        if (res.message === "Disconnected") {
            disconnect();
            return;
        }
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
    <?php if ($node['port'] == "" || $node['port'] == null) { ?>
        waUrl = '<?= $node["url"] ?>';
    <?php } ?>

    function hitPostAPI(data, api) {
        $.ajax({
            url: waUrl + api,
            method: 'POST',
            data: data,
            contentType: "application/json",
            dataType: "json",
            beforeSend: function() {

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

    function disconnect() {
        $('#spinner').hide();
        $('#targetQr').hide();
        $('#wa-label').hide();
        $('#status-connect').hide();
        $('#status-disconnect').show();
    }
    function errorServer() {
        $('#spinner').hide();
        $('#targetQr').hide();
        $('#wa-label').hide();
        $('#status-connect').hide();
        $('#status-error').show();
    }

    function hitGetAPI(api) {
        $('#spinner').show();
        $('#targetQr').hide();
        $('#wa-label').hide();
        $('#status-connect').hide();
        $('#status-error').hide();
        $('#status-disconnect').hide();
        
        $.ajax({
            url: waUrl + api,
            method: 'GET',
            contentType: "application/json",
            dataType: "json",
            beforeSend: function() {
                $("#targetQr").html("");
                $("#targetQr").append(`<div class="spinner-border" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                      </div>
                                      <span>Please wait...</span>`);
            },
            success: function(res) {
                console.log(res);
                if (res.message === "Connected") {
                    show(true);
                }
                if (res.message === "Not Connected") {
                    if (res.qr != null) {
                        show(false);
                        showQrCode(res.qr);
                        return;
                    }

                }
            },
            error: function(xhr, status, error) {
                console.error(status, error);
                errorServer();
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
    $(document).ready(() => {
        hitGetAPI("/api/ready");
    });
</script>
<?= $this->endSection() ?>