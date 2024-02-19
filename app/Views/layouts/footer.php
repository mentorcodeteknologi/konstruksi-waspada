<!-- footer start-->
<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 footer-copyright text-start">
                <p class="mb-0">Copyright 2019 © Multikart All rights reserved.</p>
            </div>
            <div class="col-md-6 pull-right text-end">
                <p class=" mb-0">Hand crafted & made with<i class="fa fa-heart"></i></p>
            </div>
        </div>
    </div>
</footer>
<!-- footer end-->
</div>

</div>

<!-- latest jquery-->
<script src="<?= base_url('assets/backend') ?>/js/jquery-3.3.1.min.js"></script>


<!-- Bootstrap js-->
<script src="<?= base_url('assets/backend') ?>/js/bootstrap.bundle.min.js"></script>

<!-- feather icon js-->
<script src="<?= base_url('assets/backend') ?>/js/icons/feather-icon/feather.min.js"></script>
<script src="<?= base_url('assets/backend') ?>/js/icons/feather-icon/feather-icon.js"></script>

<!-- Sidebar jquery-->
<script src="<?= base_url('assets/backend') ?>/js/sidebar-menu.js"></script>

<!--chartist js-->
<script src="<?= base_url('assets/backend') ?>/js/chart/chartist/chartist.js"></script>

<!--chartjs js-->
<script src="<?= base_url('assets/backend') ?>/js/chart/chartjs/chart.min.js"></script>

<!-- lazyload js-->
<script src="<?= base_url('assets/backend') ?>/js/lazysizes.min.js"></script>

<!--copycode js-->
<script src="<?= base_url('assets/backend') ?>/js/prism/prism.min.js"></script>
<script src="<?= base_url('assets/backend') ?>/js/clipboard/clipboard.min.js"></script>
<script src="<?= base_url('assets/backend') ?>/js/custom-card/custom-card.js"></script>

<!--counter js-->
<script src="<?= base_url('assets/backend') ?>/js/counter/jquery.waypoints.min.js"></script>
<script src="<?= base_url('assets/backend') ?>/js/counter/jquery.counterup.min.js"></script>
<script src="<?= base_url('assets/backend') ?>/js/counter/counter-custom.js"></script>

<!--peity chart js-->
<script src="<?= base_url('assets/backend') ?>/js/chart/peity-chart/peity.jquery.js"></script>

<!-- Apex Chart Js -->
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

<!--sparkline chart js-->
<script src="<?= base_url('assets/backend') ?>/js/chart/sparkline/sparkline.js"></script>

<!--Customizer admin-->
<script src="<?= base_url('assets/backend') ?>/js/admin-customizer.js"></script>

<!--dashboard custom js-->
<script src="<?= base_url('assets/backend') ?>/js/dashboard/default.js"></script>

<!--right sidebar js-->
<script src="<?= base_url('assets/backend') ?>/js/chat-menu.js"></script>

<!--height equal js-->
<script src="<?= base_url('assets/backend') ?>/js/height-equal.js"></script>

<!-- lazyload js-->
<script src="<?= base_url('assets/backend') ?>/js/lazysizes.min.js"></script>

<!--script admin-->
<script src="<?= base_url('assets/backend') ?>/js/admin-script.js"></script>
<script src="<?= base_url('assets/backend') ?>/js/qrcode.js"></script>

<script>
    // Mendapatkan elemen input nomor WhatsApp
    var inputNoHP = document.getElementById("no_hp");

    // Menambahkan event listener untuk event "input"
    inputNoHP.addEventListener("input", function() {
        // Mendapatkan nilai yang dimasukkan oleh pengguna
        var inputValue = this.value;

        // Menghapus karakter selain angka
        inputValue = inputValue.replace(/\D/g, '');

        // Memastikan bahwa karakter pertama adalah "+62"
        if (!inputValue.startsWith("62")) {
            inputValue = "62" + inputValue;
        }

        // Mengatur nilai input dengan karakter "+62" dan nomor HP yang dimasukkan oleh pengguna
        this.value = "+" + inputValue.substring(0, 2) + inputValue.substring(2);
    });

    // Menangani kasus ketika semua input dihapus
    inputNoHP.addEventListener("keydown", function(event) {
        if (event.key === "Backspace" && inputNoHP.value.length === 3) {
            event.preventDefault();
        }
    });
</script>

<script>
    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function() {
            $(this).remove();
        });
    }, 6000);
</script>

<script>
    const host = 'http://localhost:3000';
    let token = null;

    function setDataTable() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    }

    function setToken() {
        let data = JSON.stringify({
            username: "user",
            password: "password"
        });
        hitPostAPI(data, '/api/login');
    }

    function hitPostAPI(data, api) {
        $.ajax({
            url: host + api,
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
                // console.log(token);
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

    function hitGetAPI(api) {
        $.ajax({
            url: host + api,
            method: 'GET',
            contentType: "application/json",
            dataType: "json",
            success: function(res) {
                if (res.status) {
                    $('#targetQr').hide();
                    $('#status').show();
                    clearInterval(intervalId);
                } else if (res.qrCodeData) {
                    showQrCode(res.qrCodeData);
                } else {
                    setToken();

                }
            },
            error: function(xhr, status, error) {
                console.error(status, error);
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
</script>
<?= $this->renderSection('scripts'); ?>

</body>

</html>