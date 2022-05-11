<?php $app_identity = app_identity() ?>
<?= $this->extend('layout/template'); ?>

<?= $this->section('library_css'); ?>
<!-- Select2 -->
<link href="<?= base_url(); ?>/assets/vendors/select2/dist/css/select2.min.css" rel="stylesheet">
<!-- bootstrap-datetimepicker -->
<link href="<?= base_url(); ?>/assets/vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
<!-- iCheck -->
<link href="<?= base_url(); ?>/assets/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
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
                        <form action="<?= base_url() ?>/surat-pasien-edit" method="post" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="id_surat_pasien" value="<?= $surat['id_surat_pasien']; ?>">
                            <div class="row">
                                <div class="col-sm-3 form-group mb-3">
                                    <label for="tgl_surat">Tanggal Surat*</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('tgl_surat')) ? 'is-invalid' : ''; ?>" id="tgl_surat" name="tgl_surat" value="<?= old('tgl_surat') ? old('tgl_surat') : format_tanggal($surat['tgl_surat']); ?>" placeholder="Tanggal Surat">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('tgl_surat') ?>
                                    </div>
                                </div>
                                <div class="col form-group mb-3">
                                    <label for="nama_pasien">Nama Pasien*</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('nama_pasien')) ? 'is-invalid' : ''; ?>" id="nama_pasien" name="nama_pasien" value="<?= old('nama_pasien') ? old('nama_pasien') : $surat['nama_pasien']; ?>" placeholder="Nama Pasien">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('nama_pasien') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3 form-group mb-3">
                                    <label for="tgl_masuk">Tgl Masuk Pasien*</label>
                                    <input type="datetime-local" class="form-control <?= ($validation->hasError('tgl_masuk')) ? 'is-invalid' : ''; ?>" id="tgl_masuk" name="tgl_masuk" value="<?= old('tgl_masuk') ? old('tgl_masuk') : date('Y-m-d\TH:i', strtotime($surat['tgl_masuk'])); ?>" placeholder="Tgl Masuk Pasien">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('tgl_masuk') ?>
                                    </div>
                                </div>
                                <div class="col-sm-3 form-group mb-3">
                                    <label for="tgl_keluar">Tgl Keluar Pasien*</label>
                                    <input type="datetime-local" class="form-control <?= ($validation->hasError('tgl_keluar')) ? 'is-invalid' : ''; ?>" id="tgl_keluar" name="tgl_keluar" value="<?= old('tgl_keluar') ? old('tgl_keluar') : date('Y-m-d\TH:i', strtotime($surat['tgl_keluar'])); ?>" placeholder="Tgl Keluar Pasien">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('tgl_keluar') ?>
                                    </div>
                                </div>
                                <div class="col form-group mb-3">
                                    <label for="diagnosa">Diagnosa*</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('diagnosa')) ? 'is-invalid' : ''; ?>" id="diagnosa" name="diagnosa" value="<?= old('diagnosa') ? old('diagnosa') : $surat['diagnosa']; ?>" placeholder="Diagnosa">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('diagnosa') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3 form-group mb-3">
                                    <label for="jenis_surat">Jenis Pasien*</label>
                                    <div class="radio">
                                        <input type="radio" value="1" name="jenis_surat" <?php
                                                                                            if (old('jenis_surat')) {
                                                                                                if (old('jenis_surat') == '1')
                                                                                                    print 'checked';
                                                                                            } else {
                                                                                                if ($surat['jenis_surat'] == '1')
                                                                                                    print 'checked';
                                                                                            }
                                                                                            ?> id="jenis_surat_1"> <label for="jenis_surat_1">Umum</label>
                                        <input type="radio" value="2" name="jenis_surat" <?php
                                                                                            if (old('jenis_surat')) {
                                                                                                if (old('jenis_surat') == '2')
                                                                                                    print 'checked';
                                                                                            } else {
                                                                                                if ($surat['jenis_surat'] == '2')
                                                                                                    print 'checked';
                                                                                            }
                                                                                            ?> id="jenis_surat_2"> <label for="jenis_surat_2">BPJS</label>
                                    </div>
                                    <?php if ($validation->hasError('jenis_surat')) : ?>
                                        <div class="error-validation">
                                            <?= $validation->getError('jenis_surat') ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="col form-group mb-3" id="bpjs" style="display: none;">
                                    <label for="no_bpjs">No BPJS*</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('no_bpjs')) ? 'is-invalid' : ''; ?>" id="no_bpjs" name="no_bpjs" value="<?= old('no_bpjs') ? old('no_bpjs') : $surat['no_bpjs']; ?>" placeholder="No BPJS">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('no_bpjs') ?>
                                    </div>
                                </div>
                                <div class="col form-group mb-3">
                                    <label for="tagihan">Tagihan (Rp.)*</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('tagihan')) ? 'is-invalid' : ''; ?>" id="tagihan" name="tagihan" value="<?= old('tagihan') ? old('tagihan') : $surat['tagihan']; ?>" placeholder="Tagihan">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('tagihan') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 form-group mb-3">
                                    <label for="foto">Foto Surat</label>
                                    <div class="row">
                                        <div class="col-sm-3 mb-2">
                                            <img src="<?= base_url(); ?>/uploads/foto_surat/<?= $surat['foto_surat']; ?>" class="img-thumbnail img-preview">
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
                            <hr class="mt-0">
                            <div class="row">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-success">Ubah Surat</button>
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
<!-- iCheck -->
<script src="<?= base_url(); ?>/assets/vendors/iCheck/icheck.min.js"></script>
<!-- jquery.inputmask -->
<script src="<?= base_url(); ?>/assets/vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>
<?= $this->endSection(); ?>

<?= $this->section('page_js'); ?>
<script>
    $(document).ready(function() {
        let jenis_surat = $('input[type=radio][name=jenis_surat]:checked').val();
        if (jenis_surat == 2) {
            $('#bpjs').show();
        } else {
            $('#bpjs').hide();
        }
        $('#tgl_surat').datetimepicker({
            format: 'DD-MM-YYYY',
            locale: 'id'
        });
    });
    $('input[type=radio][name=jenis_surat]').change(function(e) {
        e.preventDefault();
        let jenis_surat = $('input[type=radio][name=jenis_surat]:checked').val();
        if (jenis_surat == 2) {
            $('#bpjs').show();
        } else {
            $('#bpjs').hide();
        }
    });
</script>
<?= $this->endSection(); ?>