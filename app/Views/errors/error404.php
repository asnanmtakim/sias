<?php $app_identity = app_identity(); ?>
<?= $this->extend('layout/template'); ?>

<?= $this->section('library_css'); ?>
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
         <div class="col-12">
            <div class="col-middle">
               <div class="text-center">
                  <h1 class="error-number">404</h1>
                  <h2><?= $message; ?></h2>
                  </p>
                  <a href="<?= previous_url(); ?>" class="btn btn-sm btn-secondary mt-5" type="button">Kembali</a>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<?= $this->endSection(); ?>

<?= $this->section('library_js'); ?>

<?= $this->endSection(); ?>

<?= $this->section('page_js'); ?>
<?= $this->endSection(); ?>