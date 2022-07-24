<?php $app_identity = app_identity(); ?>
<!-- sidebar menu -->
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
   <div class="menu_section">
      <h3>Panel User</h3>
      <ul class="nav side-menu">
         <li><a href="<?= base_url(); ?>"><i class="fa fa-home"></i>Dashboard</a></li>
         <li><a href="<?= base_url(); ?>/profile"><i class="fa fa-user"></i>Profil</a></li>
      </ul>
      <?php if (in_groups('superadmin')) : ?>
         <h3 class="mt-3">Panel Pimpinan</h3>
         <ul class="nav side-menu">
            <li class="<?= $page == 'pengguna' ? 'active' : ''; ?>"><a href="<?= base_url(); ?>/pengguna"><i class="fa fa-users"></i>Data Pengguna</a></li>
            <li class="<?= ($page == 'surat_masuk' || $page == 'surat_keluar') ? 'active' : ''; ?>"><a><i class="fa fa-file-code-o"></i>Data Surat Umum <span class="fa fa-chevron-down"></span></a>
               <ul class="nav child_menu" style="display: <?= ($page == 'surat_masuk' || $page == 'surat_keluar') ? 'block' : 'none'; ?>;">
                  <li class="<?= $page == 'surat_masuk' ? 'current-page' : ''; ?>"><a href="<?= base_url(); ?>/surat-masuk">Surat Masuk</a></li>
                  <li class="<?= $page == 'surat_keluar' ? 'current-page' : ''; ?>"><a href="<?= base_url(); ?>/surat-keluar">Surat Keluar</a></li>
               </ul>
            </li>
         </ul>
      <?php endif; ?>
      <h3 class="mt-3">Panel Administrasi</h3>
      <ul class="nav side-menu">
         <?php if (in_groups('admin')) : ?>
            <li class="<?= ($page == 'surat_masuk' || $page == 'surat_keluar') ? 'active' : ''; ?>"><a><i class="fa fa-file-code-o"></i>Data Surat Umum <span class="fa fa-chevron-down"></span></a>
               <ul class="nav child_menu" style="display: <?= ($page == 'surat_masuk' || $page == 'surat_keluar') ? 'block' : 'none'; ?>;">
                  <li class="<?= $page == 'surat_masuk' ? 'current-page' : ''; ?>"><a href="<?= base_url(); ?>/surat-masuk">Surat Masuk</a></li>
                  <li class="<?= $page == 'surat_keluar' ? 'current-page' : ''; ?>"><a href="<?= base_url(); ?>/surat-keluar">Surat Keluar</a></li>
               </ul>
            </li>
         <?php endif; ?>
         <li class="<?= $page == 'surat_pasien' ? 'active' : ''; ?>"><a href="<?= base_url(); ?>/surat-pasien"><i class="fa fa-file-powerpoint-o"></i>Data Surat Pasien</a></li>
      </ul>
   </div>
</div>
<!-- /sidebar menu -->