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
         <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
               <div class="x_title">
                  <h2>Profil Pengguna</h2>
                  <div class="clearfix"></div>
               </div>
               <div class="x_content">
                  <div class="col-md-3 col-sm-3  profile_left">
                     <div class="profile_img">
                        <div id="crop-avatar">
                           <!-- Current avatar -->
                           <img class="img-responsive avatar-view" src="<?= base_url(); ?>/uploads/image_user/<?= user()->image_user != '' ? user()->image_user : 'default.png'; ?>" alt="Avatar" width="200px" title="Change the avatar">
                        </div>
                     </div>
                     <h3><?= user()->username; ?></h3>

                     <ul class="list-unstyled user_data">
                        <li>
                           <i class="fa fa-user user-profile-icon"></i> <?= user()->fullname; ?>
                        </li>
                        <li>
                           <i class="fa fa-venus-mars user-profile-icon"></i> <?= user()->gender == 'L' ? 'Laki-laki' : 'Perempuan'; ?>
                        </li>
                        <li>
                           <i class="fa fa-mobile user-profile-icon"></i> <?= user()->phone; ?>
                        </li>
                     </ul>
                  </div>
                  <div class="col-md-9 col-sm-9 ">
                     <div class="" role="tabpanel" data-example-id="togglable-tabs">
                        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                           <li role="presentation" class="<?php if (!(session()->getFlashdata('tag')) || session()->getFlashdata('tag') == 'uprofil') {
                                                               print 'active';
                                                            } ?>"><a href="#uprofil" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Ubah Data Pengguna</a>
                           </li>
                           <li role="presentation" class="<?= session()->getFlashdata('tag') == 'ufoto' ? 'active' : '' ?>"><a href="#ufoto" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Ubah Foto Pengguna</a>
                           </li>
                           <li role="presentation" class="<?= session()->getFlashdata('tag') == 'upassword' ? 'active' : '' ?>"><a href="#upassword" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Ubah Password</a>
                           </li>
                        </ul>
                        <div id="myTabContent" class="tab-content">
                           <div role="tabpanel" class="tab-pane <?php if (!(session()->getFlashdata('tag')) || session()->getFlashdata('tag') == 'uprofil') {
                                                                     print 'active';
                                                                  } else {
                                                                     print 'fade';
                                                                  } ?> " id="uprofil" aria-labelledby="home-tab">
                              <form class="form-horizontal" id="formUbahProfilAdmin" action="<?= base_url() ?>/profile-edit" method="POST">
                                 <?= csrf_field(); ?>
                                 <input type="hidden" name="id_user" value="<?= $user->id ?>">
                                 <div class="form-group row">
                                    <label for="username" class="col-sm-3 col-form-label">Username</label>
                                    <div class="col-sm-9">
                                       <input type="text" class="form-control <?= ($validation->hasError('username')) ? 'is-invalid' : ''; ?>" id="username" name="username" placeholder="Username pengguna" value="<?= old('username') ? old('username') : $user->username ?>">
                                       <div class="invalid-feedback">
                                          <?= $validation->getError('username') ?>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="form-group row">
                                    <label for="fullname" class="col-sm-3 col-form-label">Nama lengkap</label>
                                    <div class="col-sm-9">
                                       <input type="text" class="form-control <?= ($validation->hasError('fullname')) ? 'is-invalid' : ''; ?>" id="fullname" name="fullname" placeholder="Nama lengkap pengguna" value="<?= old('fullname') ? old('fullname') : $user->fullname ?>">
                                       <div class="invalid-feedback">
                                          <?= $validation->getError('fullname') ?>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="form-group row">
                                    <label for="gender" class="col-sm-3 col-form-label">Jenis kelamin</label>
                                    <div class="col-sm-9">
                                       <select class="form-control <?= ($validation->hasError('gender')) ? 'is-invalid' : ''; ?>" id="gender" name="gender">
                                          <option value="" disabled selected>--Pilih Jenis Kelamin--</option>
                                          <option value="L" <?php if (old('gender') == 'L') {
                                                               print 'selected';
                                                            } else {
                                                               if ($user->gender == 'L') {
                                                                  print 'selected';
                                                               } else {
                                                                  print '';
                                                               }
                                                            }
                                                            ?>>Laki-laki</option>
                                          <option value="P" <?php if (old('gender') == 'P') {
                                                               print 'selected';
                                                            } else {
                                                               if ($user->gender == 'P') {
                                                                  print 'selected';
                                                               } else {
                                                                  print '';
                                                               }
                                                            } ?>>Perempuan</option>
                                       </select>
                                       <div class="invalid-feedback">
                                          <?= $validation->getError('gender') ?>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="form-group row">
                                    <label for="phone" class="col-sm-3 col-form-label">No HP</label>
                                    <div class="col-sm-9">
                                       <input type="text" class="form-control <?= ($validation->hasError('phone')) ? 'is-invalid' : ''; ?>" id="phone" name="phone" placeholder="No HP" value="<?= old('phone') ? old('phone') : $user->phone ?>">
                                       <div class="invalid-feedback">
                                          <?= $validation->getError('phone') ?>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="form-group row">
                                    <div class="offset-sm-3 col-sm-9">
                                       <button type="submit" class="btn btn-success">Simpan</button>
                                    </div>
                                 </div>
                              </form>
                           </div>
                           <div role="tabpanel" class="tab-pane <?= session()->getFlashdata('tag') == 'ufoto' ? 'active' : 'fade' ?>" id="ufoto" aria-labelledby="profile-tab">
                              <img src="<?= base_url() ?>/uploads/image_user/<?= $user->image_user != '' ? $user->image_user : 'default.png' ?>" width="30%" class="img-fluid img-preview rounded mx-auto d-block mb-3" alt="">
                              <form class="form-horizontal" action="<?= base_url() ?>/profile-edit-image" method="post" enctype="multipart/form-data">
                                 <?= csrf_field(); ?>
                                 <input type="hidden" name="id_user" value="<?= $user->id ?>">
                                 <div class="form-group row">
                                    <label for="foto" class="col-sm-2 col-form-label">Foto Baru</label>
                                    <div class="col-sm-10">
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
                                 <div class="form-group row">
                                    <div class="offset-sm-2 col-sm-10">
                                       <button type="submit" class="btn btn-success">Simpan dan Upload</button>
                                    </div>
                                 </div>
                              </form>
                           </div>
                           <div role="tabpanel" class="tab-pane <?= session()->getFlashdata('tag') == 'upassword' ? 'active' : 'fade' ?>" id="upassword" aria-labelledby="profile-tab2">
                              <form class="form-horizontal" id="form-password" action="<?= base_url() ?>/profile-edit-password" method="POST">
                                 <?= csrf_field(); ?>
                                 <input type="hidden" name="id_user" value="<?= $user->id ?>">
                                 <div class="form-group row">
                                    <label for="password_lm" class="col-sm-3 col-form-label">Password Lama</label>
                                    <div class="col-sm-9">
                                       <div class="input-group" id="show_hide_password_lm">
                                          <input type="password" class="form-control <?= ($validation->hasError('password_lm')) ? 'is-invalid' : ''; ?>" id="password_lm" name="password_lm" placeholder="Password lama" autocomplete="off">
                                          <div class="input-group-append">
                                             <div class="input-group-text">
                                                <span class="fa fa-eye-slash"></span>
                                             </div>
                                          </div>
                                          <div class="invalid-feedback">
                                             <?= $validation->getError('password_lm') ?>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="form-group row">
                                    <label for="password_br" class="col-sm-3 col-form-label">Password Baru</label>
                                    <div class="col-sm-9">
                                       <div class="input-group" id="show_hide_password">
                                          <input type="password" class="form-control <?= ($validation->hasError('password_br')) ? 'is-invalid' : ''; ?>" id="password_br" name="password_br" placeholder="Password baru" autocomplete="off">
                                          <div class="input-group-append">
                                             <div class="input-group-text">
                                                <span class="fa fa-eye-slash"></span>
                                             </div>
                                          </div>
                                          <div class="invalid-feedback">
                                             <?= $validation->getError('password_br') ?>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="form-group row">
                                    <label for="password_br2" class="col-sm-3 col-form-label">Password Baru (ulangi)</label>
                                    <div class="col-sm-9">
                                       <div class="input-group" id="show_hide_password_conn">
                                          <input type="password" class="form-control <?= ($validation->hasError('password_br2')) ? 'is-invalid' : ''; ?>" id="password_br2" name="password_br2" placeholder="Password baru (ulangi)" autocomplete="off">
                                          <div class="input-group-append">
                                             <div class="input-group-text">
                                                <span class="fa fa-eye-slash"></span>
                                             </div>
                                          </div>
                                          <div class="invalid-feedback">
                                             <?= $validation->getError('password_br2') ?>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="form-group row">
                                    <div class="offset-sm-3 col-sm-9">
                                       <button type="submit" class="btn btn-success">Ubah Password</button>
                                    </div>
                                 </div>
                              </form>
                           </div>
                        </div>
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
<!-- morris.js -->
<script src="<?= base_url(); ?>/assets/vendors/raphael/raphael.min.js"></script>
<script src="<?= base_url(); ?>/assets/vendors/morris.js/morris.min.js"></script>
<!-- bootstrap-progressbar -->
<script src="<?= base_url(); ?>/assets/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
<!-- bootstrap-daterangepicker -->
<script src="<?= base_url(); ?>/assets/vendors/moment/min/moment.min.js"></script>
<script src="<?= base_url(); ?>/assets/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
<?= $this->endSection(); ?>

<?= $this->section('page_js'); ?>

<?= $this->endSection(); ?>