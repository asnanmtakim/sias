<?php $app_identity = app_identity(); ?>
<?= $this->extend('layout/template'); ?>

<?= $this->section('library_css'); ?>
<link rel="stylesheet" href="<?= base_url(); ?>/assets/vendors/magnific-popup/dist/magnific-popup.css">
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="right_col" role="main">
   <div class="">
      <div class="page-title">
         <div class="title_left">
            <h3><?= $title; ?></h3>
         </div>
      </div>

      <div class="clearfix"></div>

      <div class="row">
         <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
               <div class="x_title">
                  <h2><?= $title; ?> <?= $app_identity['app_title']; ?></h2>
                  <div class="clearfix"></div>
               </div>
               <div class="x_content">

                  <div class="col-md-7 col-sm-7">
                     <div class="product-image">
                        <a href="<?= base_url(); ?>/uploads/foto_surat/<?= $surat['foto_surat']; ?>" class="image-link">
                           <img src="<?= base_url(); ?>/uploads/foto_surat/<?= $surat['foto_surat']; ?>" alt="Image Surat" />
                        </a>
                     </div>
                  </div>

                  <div class="col-md-5 col-sm-5">
                     <hr class="my-2">
                     <div class="row">
                        <label class="col-4 my-0 font-weight-bold">
                           Tanggal Surat
                        </label>
                        <div class="col-8">
                           <?= tanggalIndo($surat['tgl_surat']); ?>
                        </div>
                     </div>
                     <hr class="my-2">
                     <div class="row">
                        <label class="col-4 my-0 font-weight-bold">
                           Nama Pasien
                        </label>
                        <div class="col-8">
                           <?= $surat['nama_pasien']; ?>
                        </div>
                     </div>
                     <hr class="my-2">
                     <div class="row">
                        <label class="col-4 my-0 font-weight-bold">
                           Tanggal Masuk
                        </label>
                        <div class="col-8">
                           <?= tanggalIndoJam($surat['tgl_masuk']); ?>
                        </div>
                     </div>
                     <hr class="my-2">
                     <div class="row">
                        <label class="col-4 my-0 font-weight-bold">
                           Tanggal Keluar
                        </label>
                        <div class="col-8">
                           <?= tanggalIndoJam($surat['tgl_keluar']); ?>
                        </div>
                     </div>
                     <hr class="my-2">
                     <div class="row">
                        <label class="col-4 my-0 font-weight-bold">
                           Diagnosa
                        </label>
                        <div class="col-8">
                           <?= $surat['diagnosa']; ?>
                        </div>
                     </div>
                     <hr class="my-2">
                     <div class="row">
                        <label class="col-4 my-0 font-weight-bold">
                           Jenis Pasien
                        </label>
                        <div class="col-8">
                           <?= $surat['jenis_surat'] == 1 ? 'Umum' : 'BPJS'; ?>
                        </div>
                     </div>
                     <hr class="my-2">
                     <?php if ($surat['jenis_surat'] == 2) : ?>
                        <div class="row">
                           <label class="col-4 my-0 font-weight-bold">
                              No BPJS
                           </label>
                           <div class="col-8">
                              <?= $surat['no_bpjs']; ?>
                           </div>
                        </div>
                        <hr class="my-2">
                     <?php endif; ?>
                     <div class="row">
                        <label class="col-4 my-0 font-weight-bold">
                           Tagihan
                        </label>
                        <div class="col-8">
                           Rp. <?= format_rupiah($surat['tagihan']); ?>
                        </div>
                     </div>
                     <hr class="my-2">
                     <br>
                     <div class="">
                        <a href="<?= base_url(); ?>/surat-pasien-edit/<?= $surat['id_surat_pasien']; ?>" class="btn btn-sm btn-warning" title="Edit"><i class="fa fa-pencil"></i> Edit</a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<?= $this->endSection(); ?>

<?= $this->section('library_js'); ?>
<script src="<?= base_url(); ?>/assets/vendors/magnific-popup/dist/jquery.magnific-popup.js"></script>
<?= $this->endSection(); ?>

<?= $this->section('page_js'); ?>
<script>
   $('.image-link').magnificPopup({
      type: 'image',
      mainClass: 'mfp-with-zoom', // this class is for CSS animation below

      zoom: {
         enabled: true, // By default it's false, so don't forget to enable it
         duration: 300, // duration of the effect, in milliseconds
         easing: 'ease-in-out', // CSS transition easing function
         opener: function(openerElement) {
            return openerElement.is('img') ? openerElement : openerElement.find('img');
         }
      },
      callbacks: {
         open: function() {
            $(".mfp-figure figure").css("cursor", "zoom-in");
            zoom(zoom_percent);
         },
         close: function() {
            zoom_percent = "100";
         }
      }
   });
</script>
<?= $this->endSection(); ?>