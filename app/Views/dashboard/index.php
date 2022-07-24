<?php $app_identity = app_identity(); ?>
<?= $this->extend('layout/template'); ?>

<?= $this->section('library_css'); ?>
<!-- bootstrap-progressbar -->
<link href="<?= base_url(); ?>/assets/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
<style>
   .panel_toolbox {
      float: right;
      min-width: 15px !important;
   }
</style>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="right_col" role="main">
   <!-- top tiles -->
   <div class="row">
      <div class="col-md-12">
         <div class="jumbotron mb-1 py-1">
            <h1>Selamat Datang <?= (user()->fullname) ? user()->fullname : user()->username; ?></h1>
            <p><?= $app_identity['app_name']; ?></p>
         </div>
      </div>
   </div>
   <div class="row tile_count">
      <div class="col-lg-2 col-md-4 col-sm-6 tile_stats_count">
         <span class="count_top"><i class="fa fa-file-code-o"></i> Surat Biasa (Masuk)</span>
         <div class="count"><?= $sBiasaIN; ?></div>
         <span class="count_bottom">Total Surat</span>
      </div>
      <div class="col-lg-2 col-md-4 col-sm-6 tile_stats_count">
         <span class="count_top"><i class="fa fa-file-code-o"></i> Surat Biasa (Keluar)</span>
         <div class="count"><?= $sBiasaOUT; ?></div>
         <span class="count_bottom">Total Surat</span>
      </div>
      <div class="col-lg-2 col-md-4 col-sm-6 tile_stats_count">
         <span class="count_top"><i class="fa fa-file-code-o"></i> Surat Rahasia (Masuk)</span>
         <div class="count"><?= $sRahasiaIN; ?></div>
         <span class="count_bottom">Total Surat</span>
      </div>
      <div class="col-lg-2 col-md-4 col-sm-6 tile_stats_count">
         <span class="count_top"><i class="fa fa-file-code-o"></i> Surat Rahasia (Keluar)</span>
         <div class="count"><?= $sRahasiaOUT; ?></div>
         <span class="count_bottom">Total Surat</span>
      </div>
      <div class="col-lg-2 col-md-4 col-sm-6 tile_stats_count">
         <span class="count_top"><i class="fa fa-file-powerpoint-o"></i> Surat Pasien Umum</span>
         <div class="count green"><?= $sPasienUmum; ?></div>
         <span class="count_bottom">Total Surat</span>
      </div>
      <div class="col-lg-2 col-md-4 col-sm-6 tile_stats_count">
         <span class="count_top"><i class="fa fa-file-powerpoint-o"></i> Surat Pasien BPJS</span>
         <div class="count green"><?= $sPasienBPJS; ?></div>
         <span class="count_bottom">Total Surat</span>
      </div>
   </div>
   <!-- /top tiles -->

   <div class="row">
      <div class="col-md-6 col-sm-6 ">
         <div class="x_panel tile fixed_height_320 overflow_hidden">
            <div class="x_title">
               <h2>Data Surat Umum</h2>
               <ul class="nav navbar-right panel_toolbox">
                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                  </li>
               </ul>
               <div class="clearfix"></div>
            </div>
            <div class="x_content">
               <table class="" style="width:100%">
                  <tr>
                     <th style="width:37%;">
                        <p>Kategori</p>
                     </th>
                     <th>
                        <div class="col-lg-7 col-md-7 col-sm-7 ">
                           <p class="">Keterangan</p>
                        </div>
                     </th>
                  </tr>
                  <tr>
                     <td>
                        <canvas id="chartSuratUmum" height="140" width="140" style="margin: 15px 10px 10px 0"></canvas>
                     </td>
                     <td>
                        <table class="tile_info">
                           <tr>
                              <td>
                                 <p><i class="fa fa-square blue"></i>Surat Biasa (Masuk) </p>
                              </td>
                           </tr>
                           <tr>
                              <td>
                                 <p><i class="fa fa-square green"></i>Surat Biasa (Keluar) </p>
                              </td>
                           </tr>
                           <tr>
                              <td>
                                 <p><i class="fa fa-square purple"></i>Surat Rahasia (Masuk) </p>
                              </td>
                           </tr>
                           <tr>
                              <td>
                                 <p><i class="fa fa-square aero"></i>Surat Rahasia (Keluar) </p>
                              </td>
                           </tr>
                        </table>
                     </td>
                  </tr>
               </table>
            </div>
         </div>
      </div>
      <div class="col-md-6 col-sm-6 ">
         <div class="x_panel tile fixed_height_320 overflow_hidden">
            <div class="x_title">
               <h2>Data Surat Pasien</h2>
               <ul class="nav navbar-right panel_toolbox">
                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                  </li>
               </ul>
               <div class="clearfix"></div>
            </div>
            <div class="x_content">
               <table class="" style="width:100%">
                  <tr>
                     <th style="width:37%;">
                        <p>Kategori</p>
                     </th>
                     <th>
                        <div class="col-lg-7 col-md-7 col-sm-7 ">
                           <p class="">Keterangan</p>
                        </div>
                     </th>
                  </tr>
                  <tr>
                     <td>
                        <canvas id="chartSuratPasien" height="140" width="140" style="margin: 15px 10px 10px 0"></canvas>
                     </td>
                     <td>
                        <table class="tile_info">
                           <tr>
                              <td>
                                 <p><i class="fa fa-square red"></i>Pasien Umum </p>
                              </td>
                           </tr>
                           <tr>
                              <td>
                                 <p><i class="fa fa-square aero"></i>Pasien BPJS </p>
                              </td>
                           </tr>
                        </table>
                     </td>
                  </tr>
               </table>
            </div>
         </div>
      </div>
   </div>
</div>
<?= $this->endSection(); ?>

<?= $this->section('library_js'); ?>
<!-- Chart.js -->
<script src="<?= base_url() ?>/assets/vendors/Chart.js/dist/Chart.min.js"></script>
<!-- bootstrap-progressbar -->
<script src="<?= base_url(); ?>/assets/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
<?= $this->endSection(); ?>

<?= $this->section('page_js'); ?>
<script>
   var chartSuratUmumSetting = {
      type: "pie",
      tooltipFillColor: "rgba(51, 51, 51, 0.55)",
      data: {
         labels: ["Surat Rahasia (Keluar)", "Surat Rahasia (Masuk)", "Surat Biasa (Keluar)", "Surat Biasa (Masuk)"],
         datasets: [{
            data: [<?= $sRahasiaOUT; ?>, <?= $sRahasiaIN; ?>, <?= $sBiasaOUT; ?>, <?= $sBiasaIN; ?>],
            backgroundColor: ["#BDC3C7", "#9B59B6", "#26B99A", "#3498DB"],
            hoverBackgroundColor: ["#CFD4D8", "#B370CF", "#36CAAB", "#49A9EA"],
         }, ],
      },
      options: {
         legend: false,
         responsive: true,
      },
   };
   var chartSuratUmumElement = $('#chartSuratUmum');
   var chartSuratUmum = new Chart(chartSuratUmumElement, chartSuratUmumSetting);

   var chartSuratPasienSetting = {
      type: "doughnut",
      tooltipFillColor: "rgba(51, 51, 51, 0.55)",
      data: {
         labels: ["Pasien BPJS", "Pasien Umum"],
         datasets: [{
            data: [<?= $sPasienBPJS; ?>, <?= $sPasienUmum; ?>],
            backgroundColor: ["#BDC3C7", "#E74C3C"],
            hoverBackgroundColor: ["#CFD4D8", "#E95E4F"],
         }, ],
      },
      options: {
         legend: false,
         responsive: true,
      },
   };
   var chartSuratPasienElement = $('#chartSuratPasien');
   var chartSuratPasien = new Chart(chartSuratPasienElement, chartSuratPasienSetting);
</script>
<?= $this->endSection(); ?>