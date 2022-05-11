<?php $app_identity = app_identity(); ?>
<?= $this->extend('layout/template'); ?>

<?= $this->section('library_css'); ?>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="right_col" role="main">
   <div class="">
      <div class="page-title">
         <div class="title_left">
            <h3>Fixed Sidebar <small> Just add class <strong>menu_fixed</strong></small></h3>
         </div>
      </div>
   </div>
</div>
<?= $this->endSection(); ?>

<?= $this->section('library_js'); ?>

<?= $this->endSection(); ?>

<?= $this->section('page_js'); ?>
<?= $this->endSection(); ?>