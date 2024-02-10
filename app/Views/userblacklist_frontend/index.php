<?= $this->extend('layouts_frontend/main_frontend'); ?>

<?= $this->section('breadcrumb'); ?>
<!-- breadcrumb start -->
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="page-title">
                    <h2>User Blacklist</h2>
                </div>
            </div>
            <div class="col-sm-6">
                <nav aria-label="breadcrumb" class="theme-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active">User Blacklist</li>
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
<section class="register-page section-b-space">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h3>Form Input User Perorangan Blacklist</h3>
                <div class="theme-card">
                    <form class="theme-form">
                        <div class="form-row row">
                            <div class="col-md-6">
                                <label for="review">NIK Terlapor</label>
                                <input type="text" class="form-control" id="nik_terlapor" placeholder="NIK Terlapor" required="">
                            </div>
                            <div class="col-md-6">
                                <label for="review">Nama Terlapor</label>
                                <input type="text" class="form-control" id="nama_terlapor" placeholder="Nama Terlapor" required="">
                            </div>
                            <div class="col-md-6">
                                <label for="review">Upload KTP Terlapor</label>
                                <input type="file" class="form-control" id="upload_ktp_terlapor" placeholder="Upload KTP Terlapor" required="">
                            </div>
                            <div class="col-md-6">
                                <label for="review">No HP Terlapor</label>
                                <input type="text" class="form-control" id="no_hp_terlapor" placeholder="No HP Terlapor" required="">
                            </div>
                            <div class="col-md-6">
                                <label for="review">Merk dan Tipe Alat</label>
                                <input type="text" class="form-control" id="merk_dan_tipe_alat" placeholder="Merk dan Tipe Alat" required="">
                            </div>
                            <div class="col-md-6">
                                <label for="review">No Seri</label>
                                <input type="text" class="form-control" id="no_seri" placeholder="No Seri" required="">
                            </div>
                            <div class="col-md-6">
                                <label for="review">Upload Bukti Surat Perjanjian</label>
                                <input type="file" class="form-control" id="upload_bukti_surat_perjanjian" placeholder="Upload Bukti Surat Perjanjian" required="">
                            </div>
                            <div class="col-md-6">
                                <label for="review">Foto Alat</label>
                                <input type="file" class="form-control" id="foto_alat" placeholder="Foto Alat" required="">
                            </div>
                            <div class="col-md-6">
                                <label for="review">Foto Serah Terima Alat</label>
                                <input type="file" class="form-control" id="foto_serah_terima_alat" placeholder="Foto Serah Terima Alat" required="">
                            </div>
                            <div class="col-md-6">
                                <label for="review">Jenis Pelanggaran</label>
                                <input type="text" class="form-control" id="jenis_pelanggaran" placeholder="Jenis Pelanggaran" required="">
                            </div>
                        </div>
                        <div class="form-row row">
                            <div class="col-md-6">
                                <label for="review">Durasi Rental</label>
                                <input type="date" class="form-control" id="durasi_rental" placeholder="Durasi Rental" required="">
                            </div>
                            <div class="col-md-6">
                                <label for="review">Upload Bukti Lainnya</label>
                                <input type="file" class="form-control" id="upload_bukti_lainnya" placeholder="Upload Bukti Lainnya" required="">
                            </div>
                            <div class="col-md-6">
                                <label for="review">Nominal Kerugian</label>
                                <input type="nominal_kerugian" class="form-control" id="review" placeholder="Nominal Kerugian" required="">
                            </div>
                            <div class="col-md-6">
                                <label for="review">Keterangan</label>
                                <input type="keterangan" class="form-control" id="review" placeholder="Keterangan" required="">
                            </div>
                            <div class="col-md-6">
                                <label for="review">Nama Perusahaan Penyedia Sewa</label>
                                <input type="Nama Perusahaan Penyedia Sewa" class="form-control" id="review" placeholder="Nama Perusahaan Penyedia Sewa" required="" readonly>
                            </div>
                        </div>
                        <a href="#" class="btn btn-solid w-auto">Add</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Section ends-->

<!--section start-->
<section class="register-page section-b-space">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h3>Form Input User Perusahaan Blacklist</h3>
                <div class="theme-card">
                    <form class="theme-form">
                        <div class="form-row row">
                            <div class="col-md-6">
                                <label for="email">NPWP Perusahaan Terlapor</label>
                                <input type="text" class="form-control" id="npwp_perusahaan_terlapor" placeholder="NPWP Perusahaan Terlapor" required="">
                            </div>
                            <div class="col-md-6">
                                <label for="review">Nama Perusahaan Terlapor</label>
                                <input type="text" class="form-control" id="nama_perusahaan_terlapor" placeholder="Nama Perusahaan Terlapor" required="">
                            </div>
                            <div class="col-md-6">
                                <label for="review">Upload NPWP Perusahaan Terlapor</label>
                                <input type="file" class="form-control" id="upload_npwp_perusahaan_terlapor" placeholder="Upload NPWP Perusahaan Terlapor" required="">
                            </div>
                            <div class="col-md-6">
                                <label for="review">Nama Penanggung Jawab Terlapor</label>
                                <input type="text" class="form-control" id="nama_penanggung_jawab_terlapor" placeholder="Nama Penanggung Jawab Terlapor" required="">
                            </div>
                            <div class="col-md-6">
                                <label for="review">No HP Perusahaan Terlapor</label>
                                <input type="text" class="form-control" id="no_hp_perusahaan_terlapor" placeholder="No HP Perusahaan Terlapor" required="">
                            </div>
                            <div class="col-md-6">
                                <label for="review">Merk dan Tipe Alat</label>
                                <input type="text" class="form-control" id="merk_dan_tipe_alat" placeholder="Merk dan Tipe Alat" required="">
                            </div>
                            <div class="col-md-6">
                                <label for="review">No Seri</label>
                                <input type="text" class="form-control" id="no_seri" placeholder="No Seri" required="">
                            </div>
                            <div class="col-md-6">
                                <label for="review">Upload Bukti Surat Perjanjian</label>
                                <input type="file" class="form-control" id="upload_bukti_surat_perjanjian" placeholder="Upload Bukti Surat Perjanjian" required="">
                            </div>
                            <div class="col-md-6">
                                <label for="review">Foto Alat</label>
                                <input type="file" class="form-control" id="foto_alat" placeholder="Foto Alat" required="">
                            </div>
                            <div class="col-md-6">
                                <label for="review">Foto Serah Terima Alat</label>
                                <input type="file" class="form-control" id="foto_serah_terima_alat" placeholder="Foto Serah Terima Alat" required="">
                            </div>
                            <div class="col-md-6">
                                <label for="review">Jenis Pelanggaran</label>
                                <input type="text" class="form-control" id="jenis_pelanggaran" placeholder="Jenis Pelanggaran" required="">
                            </div>
                            <div class="col-md-6">
                                <label for="review">Durasi Rental</label>
                                <input type="date" class="form-control" id="durasi_rental" placeholder="Durasi Rental" required="">
                            </div>
                        </div>
                        <div class="form-row row">

                            <div class="col-md-6">
                                <label for="review">Upload Bukti Lainnya</label>
                                <input type="file" class="form-control" id="upload_bukti_lainnya" placeholder="Upload Bukti Lainnya" required="">
                            </div>
                            <div class="col-md-6">
                                <label for="review">Nominal Kerugian</label>
                                <input type="nominal_kerugian" class="form-control" id="review" placeholder="Nominal Kerugian" required="">
                            </div>
                            <div class="col-md-6">
                                <label for="review">Keterangan</label>
                                <input type="keterangan" class="form-control" id="review" placeholder="Keterangan" required="">
                            </div>
                            <div class="col-md-6">
                                <label for="review">Nama Perusahaan Penyedia Sewa</label>
                                <input type="Nama Perusahaan Penyedia Sewa" class="form-control" id="review" placeholder="Nama Perusahaan Penyedia Sewa" required="" readonly>
                            </div>
                        </div>
                        <a href="#" class="btn btn-solid w-auto">Add</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="container mb-5">
    <div class="card">
        <div class="card-header">
            <form class="form-inline search-form search-box">
                <div class="form-group">
                    <input class="form-control-plaintext" type="search" placeholder="Search.." /><span class="d-sm-none mobile-search"><i data-feather="search"></i></span>
                </div>
            </form>
        </div>

        <div class="card-body">
            <h4>User Blacklist Table</h4>
            <div class="table-responsive table-desi">
                <table class="all-package coupon-table table table-striped">
                    <thead>
                        <tr>
                            <!-- <th>
                    <button
                      type="button"
                      class="btn btn-primary add-row delete_all"
                    >
                      Delete
                    </button>
                  </th> -->
                            <th>Nama Perusahaan Penyedia Sewa</th>
                            <th>NIK Terlapor</th>
                            <th>Nama Terlapor</th>
                            <th>Jenis Pelanggaran</th>
                            <th>Merk dan Tipe Alat</th>
                            <th>No Seri</th>
                            <th>Durasi Rental</th>
                            <th>Keterangan</th>
                            <th>Nominal Kerugian</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>PT TUJUH PILAR TEKNIK</td>
                            <td>2284555485555550</td>
                            <td>ZEZEN ZEAENAL</td>
                            <td>TIDAK MEMBAYAR SEWA</td>
                            <td>Total station sokkia im 52</td>
                            <td>BG5512</td>
                            <td>4 bulan</td>
                            <td>Menunggak kurang lebih 5 bulan</td>
                            <td>25.000.000</td>
                        </tr>
                        <tr>
                            <td>CV.BNT</td>
                            <td>212222355525552</td>
                            <td>FAUZI JAKARIA</td>
                            <td>MENGGELAPKAN ALAT</td>
                            <td>gps rtk comnav t300</td>
                            <td>GX72727AC22</td>
                            <td>7 bulan</td>
                            <td>Menghilangkan 1 set gps rtk comnav </td>
                            <td>98.000.000</td>
                        </tr>
                    </tbody>
                    <!-- <tbody>
                <tr data-row-id="1">
                  <td>
                    <input
                      class="checkbox_animated check-it"
                      type="checkbox"
                      value=""
                      id="flexCheckDefault"
                      data-id="1"
                    />
                  </td>

                  <td>
                    <img
                      src="assets/images/dashboard/product/1.jpg"
                      alt="user"
                    />
                  </td>

                  <td>Honor_Mobile.jpg</td>

                  <td>
                    http://www.assets/images/dashboard/product/1.jpg
                  </td>
                </tr>

                <tr data-row-id="2">
                  <td>
                    <input
                      class="checkbox_animated check-it"
                      type="checkbox"
                      value=""
                      id="flexCheckDefault1"
                      data-id="2"
                    />
                  </td>

                  <td>
                    <img
                      src="assets/images/dashboard/product/2.jpg"
                      alt="user"
                    />
                  </td>

                  <td>Samsung_LED_TV.jpeg</td>

                  <td>
                    http://www.assets/images/dashboard/product/2.jpg
                  </td>
                </tr>

                <tr data-row-id="3">
                  <td>
                    <input
                      class="checkbox_animated check-it"
                      type="checkbox"
                      value=""
                      id="flexCheckDefault2"
                      data-id="3"
                    />
                  </td>

                  <td>
                    <img
                      src="assets/images/dashboard/product/3.jpg"
                      alt="user"
                    />
                  </td>

                  <td>Motorola_Bluetooth.jpg</td>

                  <td>
                    http://www.assets/images/dashboard/product/3.jpg
                  </td>
                </tr>

                <tr data-row-id="4">
                  <td>
                    <input
                      class="checkbox_animated check-it"
                      type="checkbox"
                      value=""
                      id="flexCheckDefault3"
                      data-id="4"
                    />
                  </td>

                  <td>
                    <img
                      src="assets/images/dashboard/product/4.jpg"
                      alt="user"
                    />
                  </td>

                  <td>headphones.jpg</td>

                  <td>
                    http://www.assets/images/dashboard/product/4.jpg"
                  </td>
                </tr>

                <tr data-row-id="5">
                  <td>
                    <input
                      class="checkbox_animated check-it"
                      type="checkbox"
                      value=""
                      id="flexCheckDefault4"
                      data-id="5"
                    />
                  </td>

                  <td>
                    <img
                      src="assets/images/dashboard/product/5.jpg"
                      alt="user"
                    />
                  </td>

                  <td>Apple_6s.jpeg</td>

                  <td>
                    http://www.assets/images/dashboard/product/5.jpg"
                  </td>
                </tr>

                <tr data-row-id="6">
                  <td>
                    <input
                      class="checkbox_animated check-it"
                      type="checkbox"
                      value=""
                      id="flexCheckDefault5"
                      data-id="6"
                    />
                  </td>

                  <td>
                    <img
                      src="assets/images/dashboard/product/6.jpg"
                      alt="user"
                    />
                  </td>

                  <td>Apple_6s.jpeg</td>

                  <td>
                    http://www.assets/images/dashboard/product/6.jpg"
                  </td>
                </tr>

                <tr data-row-id="7">
                  <td>
                    <input
                      class="checkbox_animated check-it"
                      type="checkbox"
                      value=""
                      id="flexCheckDefault6"
                      data-id="7"
                    />
                  </td>

                  <td>
                    <img
                      src="assets/images/dashboard/product/7.jpg"
                      alt="user"
                    />
                  </td>

                  <td>Canon_Camera.jpg</td>

                  <td>
                    http://www.assets/images/dashboard/product/7.jpg"
                  </td>
                </tr>

                <tr data-row-id="8">
                  <td>
                    <input
                      class="checkbox_animated check-it"
                      type="checkbox"
                      value=""
                      id="flexCheckDefault7"
                      data-id="8"
                    />
                  </td>

                  <td>
                    <img
                      src="assets/images/dashboard/product/8.jpg"
                      alt="user"
                    />
                  </td>

                  <td>High_Quality_Headphones.jpg</td>

                  <td>
                    http://www.assets/images/dashboard/product/8.jpg"
                  </td>
                </tr>

                <tr data-row-id="9">
                  <td>
                    <input
                      class="checkbox_animated check-it"
                      type="checkbox"
                      value=""
                      id="flexCheckDefault8"
                      data-id="9"
                    />
                  </td>

                  <td>
                    <img
                      src="assets/images/dashboard/product/9.jpg"
                      alt="user"
                    />
                  </td>

                  <td>Home_Theater_Speakers.jpg</td>

                  <td>
                    http://www.assets/images/dashboard/product/9.jpg"
                  </td>
                </tr>

                <tr data-row-id="10">
                  <td>
                    <input
                      class="checkbox_animated check-it"
                      type="checkbox"
                      value=""
                      id="flexCheckDefault9"
                      data-id="10"
                    />
                  </td>

                  <td>
                    <img
                      src="assets/images/dashboard/product/10.jpg"
                      alt="user"
                    />
                  </td>

                  <td>Diamond_Ring.jpg</td>

                  <td>
                    http://www.assets/images/dashboard/product/10.jpg
                  </td>
                </tr>

                <tr data-row-id="11">
                  <td>
                    <input
                      class="checkbox_animated check-it"
                      type="checkbox"
                      value=""
                      id="flexCheckDefault10"
                      data-id="11"
                    />
                  </td>

                  <td>
                    <img
                      src="assets/images/dashboard/product/11.jpg"
                      alt="user"
                    />
                  </td>

                  <td>Diamond_Nacklace.jpeg</td>

                  <td>
                    http://www.assets/images/dashboard/product/11.jpg
                  </td>
                </tr>

                <tr data-row-id="12">
                  <td>
                    <input
                      class="checkbox_animated check-it"
                      type="checkbox"
                      value=""
                      id="flexCheckDefault11"
                      data-id="12"
                    />
                  </td>

                  <td>
                    <img
                      src="assets/images/dashboard/product/12.jpg"
                      alt="user"
                    />
                  </td>

                  <td>Diamond_Earrings.jpeg</td>

                  <td>
                    http://www.assets/images/dashboard/product/12.jpg
                  </td>
                </tr>

                <tr data-row-id="13">
                  <td>
                    <input
                      class="checkbox_animated check-it"
                      type="checkbox"
                      value=""
                      id="flexCheckDefault12"
                      data-id="13"
                    />
                  </td>

                  <td>
                    <img
                      src="assets/images/dashboard/product/13.jpg"
                      alt="user"
                    />
                  </td>

                  <td>Night_lamp.jpg</td>

                  <td>
                    http://www.assets/images/dashboard/product/13.jpg
                  </td>
                </tr>

                <tr data-row-id="14">
                  <td>
                    <input
                      class="checkbox_animated check-it"
                      type="checkbox"
                      value=""
                      id="flexCheckDefault13"
                      data-id="14"
                    />
                  </td>

                  <td>
                    <img
                      src="assets/images/dashboard/product/14.jpg"
                      alt="user"
                    />
                  </td>

                  <td>men's_shoes.jpg</td>

                  <td>
                    http://www.assets/images/dashboard/product/14.jpg
                  </td>
                </tr>

                <tr data-row-id="15">
                  <td>
                    <input
                      class="checkbox_animated check-it"
                      type="checkbox"
                      value=""
                      id="flexCheckDefault14"
                      data-id="15"
                    />
                  </td>

                  <td>
                    <img
                      src="assets/images/dashboard/product/15.jpg"
                      alt="user"
                    />
                  </td>

                  <td>Ledi's_red_top.jpeg</td>

                  <td>
                    http://www.assets/images/dashboard/product/15.jpg
                  </td>
                </tr>

                <tr data-row-id="16">
                  <td>
                    <input
                      class="checkbox_animated check-it"
                      type="checkbox"
                      value=""
                      id="flexCheckDefault15"
                      data-id="16"
                    />
                  </td>

                  <td>
                    <img
                      src="assets/images/dashboard/product/16.jpg"
                      alt="user"
                    />
                  </td>

                  <td>latest_ledis_shoes.jpg</td>

                  <td>
                    http://www.assets/images/dashboard/product/16.jpg
                  </td>
                </tr>

                <tr data-row-id="17">
                  <td>
                    <input
                      class="checkbox_animated check-it"
                      type="checkbox"
                      value=""
                      id="flexCheckDefault16"
                      data-id="17"
                    />
                  </td>

                  <td>
                    <img
                      src="assets/images/dashboard/product/17.jpg"
                      alt="user"
                    />
                  </td>

                  <td>Apple_6s.jpeg</td>

                  <td>
                    http://www.assets/images/dashboard/product/17.jpg
                  </td>
                </tr>

                <tr data-row-id="18">
                  <td>
                    <input
                      class="checkbox_animated check-it"
                      type="checkbox"
                      value=""
                      id="flexCheckDefault17"
                      data-id="18"
                    />
                  </td>

                  <td>
                    <img
                      src="assets/images/dashboard/product/18.jpg"
                      alt="user"
                    />
                  </td>

                  <td>Printer.jpg</td>

                  <td>
                    http://www.assets/images/dashboard/product/18.jpg
                  </td>
                </tr>

                <tr data-row-id="19">
                  <td>
                    <input
                      class="checkbox_animated check-it"
                      type="checkbox"
                      value=""
                      id="flexCheckDefault18"
                      data-id="19"
                    />
                  </td>

                  <td>
                    <img
                      src="assets/images/dashboard/product/19.jpg"
                      alt="user"
                    />
                  </td>

                  <td>High_Quality_Headphones.jpg</td>

                  <td>
                    http://www.assets/images/dashboard/product/19.jpg
                  </td>
                </tr>

                <tr data-row-id="20">
                  <td>
                    <input
                      class="checkbox_animated check-it"
                      type="checkbox"
                      value=""
                      id="flexCheckDefault19"
                      data-id="20"
                    />
                  </td>

                  <td>
                    <img
                      src="assets/images/dashboard/product/20.jpg"
                      alt="user"
                    />
                  </td>

                  <td>Motorola_Bluetooth.jpg</td>

                  <td>
                    http://www.assets/images/dashboard/product/20.jpg
                  </td>
                </tr>
              </tbody> -->
                </table>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>