<?php $app_identity = app_identity(); ?>
<?= $this->extend('layout/template'); ?>

<?= $this->section('library_css'); ?>
<!-- Datatables -->
<link href="<?= base_url(); ?>/assets/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
<link href="<?= base_url(); ?>/assets/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
<link href="<?= base_url(); ?>/assets/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
<link href="<?= base_url(); ?>/assets/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
<link href="<?= base_url(); ?>/assets/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="<?= base_url(); ?>/assets/vendors/magnific-popup/dist/magnific-popup.css">
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
                  <h2>Data Surat Keluar <?= $app_identity['app_title']; ?></h2>
                  <div class="nav navbar-right panel_toolbox">
                     <a href="<?= base_url(); ?>/surat-keluar-add" class="btn btn-sm btn-success"><i class="fa fa-plus-circle"></i> Tambah</a>
                  </div>
                  <div class="clearfix"></div>
               </div>
               <div class="x_content">
                  <div class="row">
                     <div class="col-sm-6 col-md-3 mb-3">
                        <label for="select_type">Jenis</label>
                        <select class="form-control select2" id="select_type">
                           <option value="" selected>Semua Jenis</option>
                           <option value="1" <?= session()->get('type') == '1' ? 'selected' : ''; ?>>Biasa</option>
                           <option value="2" <?= session()->get('type') == '2' ? 'selected' : ''; ?>>Rahasia</option>
                           <?php if (in_groups('superadmin')) : ?>
                              <option value="3" <?= session()->get('type') == '3' ? 'selected' : ''; ?>>Sangat Rahasia</option>
                           <?php endif; ?>
                        </select>
                     </div>
                     <div class="col-sm-6 col-md-3 mb-3">
                        <label for="select_pengirim">Pengirim</label>
                        <select class="form-control select2" id="select_pengirim">
                           <option value="" selected>Semua Pengirim</option>
                           <?php foreach ($pengirim as $prm) : ?>
                              <option value="<?= $prm['pengirim']; ?>" <?= session()->get('pengirim') == $prm['pengirim'] ? 'selected' : ''; ?>><?= $prm['pengirim']; ?></option>
                           <?php endforeach; ?>
                        </select>
                     </div>
                     <div class="col-sm-6 col-md-3 mb-3">
                        <label for="select_penerima">Penerima</label>
                        <select class="form-control select2" id="select_penerima">
                           <option value="" selected>Semua Penerima</option>
                           <?php foreach ($penerima as $pnm) : ?>
                              <option value="<?= $pnm['penerima']; ?>" <?= session()->get('penerima') == $pnm['penerima'] ? 'selected' : ''; ?>><?= $pnm['penerima']; ?></option>
                           <?php endforeach; ?>
                        </select>
                     </div>
                     <div class="col-sm-6 col-md-3 mb-3">
                        <label for="select_perihal">Perihal</label>
                        <select class="form-control select2" id="select_perihal">
                           <option value="" selected>Semua Perihal</option>
                           <?php foreach ($perihal as $prh) : ?>
                              <option value="<?= $prh['perihal']; ?>" <?= session()->get('perihal') == $prh['perihal'] ? 'selected' : ''; ?>><?= $prh['perihal']; ?></option>
                           <?php endforeach; ?>
                        </select>
                     </div>
                  </div>
                  <hr class="mt-0">
                  <div class="row">
                     <div class="card-box table-responsive">
                        <table id="tb-data" class="table table-striped table-bordered table-hover" style="width:100%">
                           <thead>
                              <tr>
                                 <th class="text-center">
                                    #
                                 </th>
                                 <th>Jenis Surat</th>
                                 <th>Tanggal Surat</th>
                                 <th>Pengirim</th>
                                 <th>Penerima</th>
                                 <th>No Surat</th>
                                 <th>Perihal</th>
                                 <th>Foto</th>
                                 <th>Surat Masuk</th>
                                 <th>Aksi</th>
                              </tr>
                           </thead>
                           <tbody>
                           </tbody>
                        </table>
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
<!-- Datatables -->
<script src="<?= base_url(); ?>/assets/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url(); ?>/assets/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="<?= base_url(); ?>/assets/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url(); ?>/assets/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
<script src="<?= base_url(); ?>/assets/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="<?= base_url(); ?>/assets/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url(); ?>/assets/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url(); ?>/assets/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
<script src="<?= base_url(); ?>/assets/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
<script src="<?= base_url(); ?>/assets/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url(); ?>/assets/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
<script src="<?= base_url(); ?>/assets/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
<script src="<?= base_url(); ?>/assets/vendors/jszip/dist/jszip.min.js"></script>
<script src="<?= base_url(); ?>/assets/vendors/pdfmake/build/pdfmake.min.js"></script>
<script src="<?= base_url(); ?>/assets/vendors/pdfmake/build/vfs_fonts.js"></script>
<script src="<?= base_url(); ?>/assets/vendors/magnific-popup/dist/jquery.magnific-popup.js"></script>
<!-- Select2 -->
<script src="<?= base_url(); ?>/assets/vendors/select2/dist/js/select2.full.min.js"></script>
<?= $this->endSection(); ?>

<?= $this->section('page_js'); ?>

<script>
   var table;
   $(document).ready(function() {
      table = $('#tb-data').DataTable({
         responsive: true,
         autoWidth: false,
         processing: true,
         serverSide: true,
         language: table_language(),
         ajax: {
            url: BASE_URL + "/surat-keluar-all",
            data: function(d) {
               d.type = $('#select_type').val();
               d.pengirim = $('#select_pengirim').val();
               d.penerima = $('#select_penerima').val();
               d.perihal = $('#select_perihal').val();
            }
         },
         order: [],
         columns: [{
               data: 'no',
               orderable: false
            },
            {
               data: 'type',
               className: 'text-center'
            },
            {
               data: 'tgl_surat'
            },
            {
               data: 'pengirim'
            },
            {
               data: 'penerima'
            },
            {
               data: 'no_surat',
            },
            {
               data: 'perihal'
            },
            {
               data: 'foto_surat',
               orderable: false
            },
            {
               data: 'id_surat_masuk',
               orderable: false
            },
            {
               data: 'action',
               orderable: false
            }
         ],
         fnDrawCallback: function() {
            $('.image-link').magnificPopup({
               type: 'image',
               mainClass: 'mfp-with-zoom',
               zoom: {
                  enabled: true,
                  duration: 300,
                  easing: 'ease-in-out',
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
         },
      });

      $('#select_type').change(function(event) {
         var id = $(this).val()
         var name = 'type'
         setSess(name, id).done(function(res) {
            table.ajax.reload();
         })
      });
      $('#select_pengirim').change(function(event) {
         var id = $(this).val()
         var name = 'pengirim'
         setSess(name, id).done(function(res) {
            table.ajax.reload();
         })
      });
      $('#select_penerima').change(function(event) {
         var id = $(this).val()
         var name = 'penerima'
         setSess(name, id).done(function(res) {
            table.ajax.reload();
         })
      });
      $('#select_perihal').change(function(event) {
         var id = $(this).val()
         var name = 'perihal'
         setSess(name, id).done(function(res) {
            table.ajax.reload();
         })
      });

      $(".dataTables_filter input")
         .unbind()
         .bind("input", function(e) {
            // If the length is 3 or more characters, or the user pressed ENTER, search
            if (this.value.length >= 3 || e.keyCode == 13) {
               table.search(this.value).draw();
            }
            if (this.value == "") {
               table.search(this.value).draw();
            }
            return;
         });
   });

   function hapussuratumum(id) {
      Swal.fire({
         title: 'Yakin hapus data surat?',
         text: "Data yang sudah dihapus tidak bisa dikembalikan!",
         icon: 'warning',
         showCancelButton: true,
         confirmButtonColor: '#d33',
         confirmButtonText: 'Ya, hapus',
         cancelButtonText: 'Batal'
      }).then((result) => {
         if (result.isConfirmed) {
            location.href = BASE_URL + "/surat-umum-delete/" + id;
         }
      })
   }
</script>
<?= $this->endSection(); ?>