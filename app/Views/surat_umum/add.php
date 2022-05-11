<?php $app_identity = app_identity() ?>
<?= $this->extend('layout/template'); ?>

<?= $this->section('library_css'); ?>
<!-- Select2 -->
<link href="<?= base_url(); ?>/assets/vendors/select2/dist/css/select2.min.css" rel="stylesheet">
<!-- bootstrap-datetimepicker -->
<link href="<?= base_url(); ?>/assets/vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
<link rel="stylesheet" href="<?= base_url(); ?>/assets/vendors/summernote/dist/summernote-bs4.css">
<!-- Select2 -->
<link href="<?= base_url(); ?>/assets/vendors/select2/dist/css/select2.min.css" rel="stylesheet">
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
            <div class="col-md-12 col-sm-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2><?= $title; ?> <?= $app_identity['app_title']; ?></h2>
                        <div class="nav navbar-right panel_toolbox">
                            <p>* harus diisi</p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <form action="<?= base_url() ?>/surat-umum-add" method="post" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="jenis" value="<?= $jenis; ?>">
                            <div class="row">
                                <div class="col-sm-3 form-group mb-3">
                                    <label for="tgl_surat">Tanggal Surat*</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('tgl_surat')) ? 'is-invalid' : ''; ?>" id="tgl_surat" name="tgl_surat" value="<?= old('tgl_surat'); ?>" placeholder="Tanggal Surat">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('tgl_surat') ?>
                                    </div>
                                </div>
                                <div class="col form-group mb-3">
                                    <label for="pengirim">Pengirim Surat*</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('pengirim')) ? 'is-invalid' : ''; ?>" id="pengirim" name="pengirim" value="<?= old('pengirim'); ?>" placeholder="Pengirim Surat">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('pengirim') ?>
                                    </div>
                                </div>
                                <div class="col form-group mb-3">
                                    <label for="penerima">Penerima Surat*</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('penerima')) ? 'is-invalid' : ''; ?>" id="penerima" name="penerima" value="<?= old('penerima'); ?>" placeholder="Penerima Surat">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('penerima') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 form-group mb-3">
                                    <label for="no_surat">No Surat*</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('no_surat')) ? 'is-invalid' : ''; ?>" id="no_surat" name="no_surat" value="<?= old('no_surat'); ?>" placeholder="No Surat">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('no_surat') ?>
                                    </div>
                                </div>
                                <div class="col-sm-6 form-group mb-3">
                                    <label for="perihal">Perihal surat*</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('perihal')) ? 'is-invalid' : ''; ?>" id="perihal" name="perihal" value="<?= old('perihal'); ?>" placeholder="Perihal surat">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('perihal') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 form-group mb-3">
                                    <label for="isi_surat">Isi Surat*</label>
                                    <textarea class="form-control <?= ($validation->hasError('isi_surat')) ? 'is-invalid' : ''; ?>" id="isi_surat" name="isi_surat" placeholder="Isi Surat"><?= old('isi_surat'); ?></textarea>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('isi_surat') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 form-group mb-3">
                                    <label for="foto">Foto Surat*</label>
                                    <div class="row">
                                        <div class="col-sm-3 mb-2">
                                            <img src="<?= base_url(); ?>/uploads/foto_surat/default.png" class="img-thumbnail img-preview">
                                        </div>
                                        <div class="col-sm-9">
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" accept="image/*" class="form-control custom-file-input <?= ($validation->hasError('foto_surat')) ? 'is-invalid' : ''; ?>" id="foto" name="foto_surat" onchange="previewImg()">
                                                    <label class="custom-file-label" for="foto_surat">Pilih foto</label>
                                                </div>
                                            </div>
                                            <?php if ($validation->hasError('foto_surat')) : ?>
                                                <div class="error-validation">
                                                    <?= $validation->getError('foto_surat') ?>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php if ($jenis == 'OUT') : ?>
                                <div class="row">
                                    <div class="col-sm-12 form-group mb-3">
                                        <label for="surat_masuk">Jawaban Dari Surat Masuk*</label>
                                        <select class="form-control select2 <?= ($validation->hasError('surat_masuk')) ? 'is-invalid' : ''; ?>" id="surat_masuk" name="surat_masuk" style="width: 100%;">
                                            <option value="" disabled selected>--Pilih Surat Masuk--</option>
                                            <?php foreach ($surat_masuk as $sm) : ?>
                                                <option value="<?= $sm['id_surat_umum'] ?>" <?php
                                                                                            if (old('surat_masuk')) {
                                                                                                if (old('surat_masuk') == $sm['id_surat_umum']) {
                                                                                                    print 'selected';
                                                                                                } else {
                                                                                                    print '';
                                                                                                }
                                                                                            } else {
                                                                                                if ($id_surat_masuk == $sm['id_surat_umum']) {
                                                                                                    print 'selected';
                                                                                                } else {
                                                                                                    print '';
                                                                                                }
                                                                                            } ?>><?= $sm['pengirim'] ?> | <?= tanggalIndo($sm['tgl_surat']) ?> | <?= $sm['no_surat'] ?> | <?= $sm['perihal'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('surat_masuk') ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <hr class="mt-0">
                            <div class="row">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-success">Simpan Surat</button>
                                    <a href="<?= previous_url() ?>" class="btn btn-outline-secondary float-right">Kembali</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.content-wrapper -->
<?= $this->endSection(); ?>

<?= $this->section('library_js'); ?>
<!-- Select2 -->
<script src="<?= base_url(); ?>/assets/vendors/select2/dist/js/select2.full.min.js"></script>
<!-- bootstrap-datetimepicker -->
<script src="<?= base_url(); ?>/assets/vendors/moment/min/moment-with-locales.min.js"></script>
<script src="<?= base_url(); ?>/assets/vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
<script src="<?= base_url(); ?>/assets/vendors/summernote/dist/summernote-bs4.js"></script>
<!-- Select2 -->
<script src="<?= base_url(); ?>/assets/vendors/select2/dist/js/select2.full.min.js"></script>
<?= $this->endSection(); ?>

<?= $this->section('page_js'); ?>
<script>
    $(document).ready(function() {
        $('#tgl_surat').datetimepicker({
            format: 'DD-MM-YYYY',
            locale: 'id'
        });
        $('#isi_surat').summernote({
            placeholder: 'Isi Surat',
            tabsize: 2,
            height: 200,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'italic', 'underline', 'clear']],
                ['fontname', ['fontname']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']],
                ['view', ['undo', 'redo', 'codeview']]
            ],
        });
    });
</script>
<?= $this->endSection(); ?>