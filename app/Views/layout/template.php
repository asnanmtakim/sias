<?php $app_identity = app_identity() ?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
   <!-- Meta, title, CSS, favicons, etc. -->
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">

   <title><?= $app_identity['app_title']; ?> | <?= $title; ?></title>

   <!-- Favicons -->
   <link href="<?= $app_identity['app_icon']; ?>" rel="icon">
   <link href="<?= $app_identity['app_icon']; ?>" rel="apple-touch-icon">

   <!-- Bootstrap -->
   <link href="<?= base_url(); ?>/assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
   <!-- Font Awesome -->
   <link href="<?= base_url(); ?>/assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
   <!-- NProgress -->
   <link href="<?= base_url(); ?>/assets/vendors/nprogress/nprogress.css" rel="stylesheet">
   <!-- jQuery custom content scroller -->
   <link href="<?= base_url(); ?>/assets/vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css" rel="stylesheet" />
   <!-- Sweetalert2 -->
   <link href="<?= base_url(); ?>/assets/vendors/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet" />
   <!-- Toastr -->
   <link href="<?= base_url(); ?>/assets/vendors/toastr/toastr.css" rel="stylesheet" />
   <?= $this->renderSection('library_css'); ?>

   <!-- Custom Theme Style -->
   <link href="<?= base_url(); ?>/assets/build/css/custom.css" rel="stylesheet">
</head>

<body class="nav-md">
   <div class="container body">
      <div class="main_container">
         <div class="col-md-3 left_col menu_fixed">
            <div class="left_col scroll-view">
               <div class="navbar nav_title" style="border: 0;">
                  <a href="<?= base_url(); ?>" class="site_title"><img src="<?= $app_identity['app_brand']; ?>" width="50px" alt=""> <span><?= $app_identity['app_title']; ?></span></a>
               </div>

               <div class="clearfix"></div>

               <!-- menu profile quick info -->
               <div class="profile clearfix">
                  <div class="profile_pic">
                     <img src="<?= base_url(); ?>/uploads/image_user/<?= user()->image_user != '' ? user()->image_user : 'default.png'; ?>" alt="..." class="img-circle profile_img">
                  </div>
                  <div class="profile_info">
                     <span>Selamat Datang,</span>
                     <h2><?= user()->fullname != '' ? user()->fullname : user()->username; ?></h2>
                  </div>
               </div>
               <!-- /menu profile quick info -->

               <br />

               <!-- sidebar menu -->
               <?= $this->include('layout/sidebar'); ?>
               <!-- /sidebar menu -->

               <!-- /menu footer buttons -->
               <div class="sidebar-footer hidden-small">
                  <a data-toggle="tooltip" data-placement="top" title="Logout" href="<?= base_url('logout'); ?>">
                     <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                  </a>
               </div>
               <!-- /menu footer buttons -->
            </div>
         </div>

         <!-- top navigation -->
         <?= $this->include('layout/navbar'); ?>
         <!-- /top navigation -->

         <!-- Main Content -->
         <?= $this->renderSection('content'); ?>
         <!-- /page content -->

         <!-- footer content -->
         <footer>
            <div class="pull-right">
               <?= $app_identity['app_title']; ?> Design by <a href="https://instagram.com/asnanmtakim">Asnanmtakim</a>
            </div>
            <div class="clearfix"></div>
         </footer>
         <!-- /footer content -->
      </div>
   </div>

   <!-- jQuery -->
   <script src="<?= base_url(); ?>/assets/vendors/jquery/dist/jquery.min.js"></script>
   <!-- Bootstrap -->
   <script src="<?= base_url(); ?>/assets/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
   <!-- FastClick -->
   <script src="<?= base_url(); ?>/assets/vendors/fastclick/lib/fastclick.js"></script>
   <!-- NProgress -->
   <script src="<?= base_url(); ?>/assets/vendors/nprogress/nprogress.js"></script>
   <!-- jQuery custom content scroller -->
   <script src="<?= base_url(); ?>/assets/vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
   <!-- Sweetalert2 -->
   <script src="<?= base_url(); ?>/assets/vendors/sweetalert2/dist/sweetalert2.all.min.js"></script>
   <!-- Toastr -->
   <script src="<?= base_url(); ?>/assets/vendors/toastr/toastr.min.js"></script>
   <!-- bs-custom-file-input -->
   <script src="<?= base_url() ?>/assets/vendors/bs-custom-file-input/bs-custom-file-input.min.js"></script>

   <?= $this->renderSection('library_js'); ?>

   <!-- Custom Theme Scripts -->
   <script src="<?= base_url(); ?>/assets/build/js/custom.js"></script>

   <script>
      var BASE_URL = "<?= base_url() ?>";
      $(document).ready(function() {
         bsCustomFileInput.init();
      });

      function setSess(name, value) {
         return $.ajax({
            type: "POST",
            url: BASE_URL + "/home/setSess",
            data: {
               sessName: name,
               sessValue: value,
            },
            dataType: "json",
            success: function(res) {},
         });
      }
   </script>
   <?php if (session()->getFlashdata('message_error')) { ?>
      <script>
         $(document).ready(function() {
            toastr["success"]("<?= session()->getFlashdata('message_error'); ?>")

            toastr.options = {
               "closeButton": false,
               "debug": false,
               "newestOnTop": false,
               "progressBar": false,
               "positionClass": "toast-top-right",
               "preventDuplicates": false,
               "onclick": null,
               "showDuration": "300",
               "hideDuration": "1000",
               "timeOut": "5000",
               "extendedTimeOut": "1000",
               "showEasing": "swing",
               "hideEasing": "linear",
               "showMethod": "fadeIn",
               "hideMethod": "fadeOut"
            }
         });
      </script>
   <?php } ?>
   <?php if (session()->getFlashdata('message_success')) { ?>
      <script>
         $(document).ready(function() {
            toastr["success"]("<?= session()->getFlashdata('message_success'); ?>")

            toastr.options = {
               "closeButton": false,
               "debug": false,
               "newestOnTop": false,
               "progressBar": false,
               "positionClass": "toast-top-right",
               "preventDuplicates": false,
               "onclick": null,
               "showDuration": "300",
               "hideDuration": "1000",
               "timeOut": "5000",
               "extendedTimeOut": "1000",
               "showEasing": "swing",
               "hideEasing": "linear",
               "showMethod": "fadeIn",
               "hideMethod": "fadeOut"
            }
         });
      </script>
   <?php } ?>
   <?= $this->renderSection('page_js'); ?>
</body>

</html>