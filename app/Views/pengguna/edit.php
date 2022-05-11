<?php $app_identity = app_identity() ?>
<?= $this->extend('layout/template'); ?>

<?= $this->section('library_css'); ?>
<!-- Select2 -->
<link href="<?= base_url(); ?>/assets/vendors/select2/dist/css/select2.min.css" rel="stylesheet">
<!-- bootstrap-daterangepicker -->
<link href="<?= base_url(); ?>/assets/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
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
                        <h2>Edit Data Pengguna <?= $app_identity['app_title']; ?></h2>
                        <div class="nav navbar-right panel_toolbox">
                            <p>* harus diisi</p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <form action="<?= base_url() ?>/pengguna-edit" method="post" enctype="multipart/form-data">
                            <?= csrf_field() ?>
                            <input type="hidden" name="id_user" value="<?= $pengguna->id_user; ?>">
                            <div class="row">
                                <div class="col-sm-12 form-group mb-3">
                                    <label for="fullname">Nama Pengguna*</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('fullname')) ? 'is-invalid' : ''; ?>" id="fullname" name="fullname" value="<?= old('fullname') ? old('fullname') : $pengguna->fullname; ?>" placeholder="Nama Pengguna">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('fullname') ?>
                                    </div>
                                </div>
                                <div class="col-sm-12 form-group mb-3">
                                    <label for="email">Email Pengguna*</label>
                                    <input type="email" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" id="email" name="email" value="<?= old('email') ? old('email') : $pengguna->email; ?>" placeholder="Email Pengguna">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('email') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 form-group mb-3">
                                    <label for="username">Username*</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('username')) ? 'is-invalid' : ''; ?>" id="username" name="username" value="<?= old('username') ? old('username') : $pengguna->username; ?>" placeholder="Username">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('username') ?>
                                    </div>
                                </div>
                                <div class="col-sm-6 form-group mb-3">
                                    <label for="group">Role/Group*</label>
                                    <select class="form-control select2 <?= ($validation->hasError('group')) ? 'is-invalid' : ''; ?>" id="group" name="group" style="width: 100%;">
                                        <option value="" disabled selected>--Pilih Role/Group--</option>
                                        <?php foreach ($group as $rl) : ?>
                                            <option value="<?= $rl['name'] ?>" <?php
                                                                                if (old('group')) {
                                                                                    if (old('group') == $rl['name']) {
                                                                                        print 'selected';
                                                                                    } else {
                                                                                        print '';
                                                                                    }
                                                                                } else {
                                                                                    if ($pengguna->name == $rl['name']) {
                                                                                        print 'selected';
                                                                                    } else {
                                                                                        print '';
                                                                                    }
                                                                                } ?>><?= $rl['name'] ?> - <?= $rl['description'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('group') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 form-group mb-3">
                                    <label for="gender">Jenis Kelamin*</label>
                                    <select class="form-control <?= ($validation->hasError('gender')) ? 'is-invalid' : ''; ?>" id="gender" name="gender">
                                        <option value="" disabled selected>--Pilih Jenis Kelamin--</option>
                                        <option value="L" <?php
                                                            if (old('gender')) {
                                                                if (old('gender') == 'L') {
                                                                    print 'selected';
                                                                } else {
                                                                    print '';
                                                                }
                                                            } else {
                                                                if ($pengguna->gender == 'L') {
                                                                    print 'selected';
                                                                }
                                                            }
                                                            ?>>Laki-laki</option>
                                        <option value="P" <?php
                                                            if (old('gender')) {
                                                                if (old('gender') == 'P') {
                                                                    print 'selected';
                                                                } else {
                                                                    print '';
                                                                }
                                                            } else {
                                                                if ($pengguna->gender == 'P') {
                                                                    print 'selected';
                                                                }
                                                            }
                                                            ?>>Perempuan</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('gender') ?>
                                    </div>
                                </div>
                                <div class="col-sm-6 form-group mb-3">
                                    <label for="phone">No HP*</label>
                                    <input type="text" class="form-control <?= ($validation->hasError('phone')) ? 'is-invalid' : ''; ?>" id="phone" name="phone" value="<?= old('phone') ? old('phone') : $pengguna->phone; ?>" placeholder="No HP Pengguna">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('phone') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 form-group mb-3">
                                    <label for="foto">Foto Pengguna</label>
                                    <div class="row">
                                        <div class="col-sm-3 mb-2">
                                            <img src="<?= base_url(); ?>/uploads/image_user/<?= $pengguna->image_user; ?>" class="img-thumbnail img-preview">
                                        </div>
                                        <div class="col-sm-9">
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" accept="image/*" class="form-control custom-file-input <?= ($validation->hasError('image_user')) ? 'is-invalid' : ''; ?>" id="foto" name="image_user" onchange="previewImg()">
                                                    <label class="custom-file-label" for="image_user">Pilih foto</label>
                                                </div>
                                            </div>
                                            <?php if ($validation->hasError('image_user')) : ?>
                                                <div class="error-validation">
                                                    <?= $validation->getError('image_user') ?>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="mt-0">
                            <div class="row">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-success">Ubah Pengguna</button>
                                    <a href="<?= base_url() ?>/pengguna" class="btn btn-outline-secondary float-right">Kembali</a>
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
<!-- bootstrap-daterangepicker -->
<script src="<?= base_url(); ?>/assets/vendors/moment/min/moment.min.js"></script>
<script src="<?= base_url(); ?>/assets/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
<?= $this->endSection(); ?>

<?= $this->section('page_js'); ?>
<script>
</script>
<?= $this->endSection(); ?>