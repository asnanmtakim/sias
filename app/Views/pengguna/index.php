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
                  <h2>Data Pengguna <?= $app_identity['app_title']; ?></h2>
                  <div class="nav navbar-right panel_toolbox">
                     <a href="<?= base_url(); ?>/pengguna-add" class="btn btn-sm btn-success"><i class="fa fa-plus-circle"></i> Tambah</a>
                  </div>
                  <div class="clearfix"></div>
               </div>
               <div class="x_content">
                  <div class="row">
                     <div class="card-box table-responsive">
                        <table id="tb-data" class="table table-striped table-bordered" style="width:100%">
                           <thead>
                              <tr>
                                 <th class="text-center">
                                    #
                                 </th>
                                 <th>Nama Pengguna</th>
                                 <th>Role</th>
                                 <th>Gender</th>
                                 <th>No HP</th>
                                 <th>Foto</th>
                                 <th>Status</th>
                                 <th>Aksi</th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php
                              $no = 1;
                              foreach ($pengguna as $pgn) : ?>
                                 <tr>
                                    <td><?= $no; ?></td>
                                    <td><?= $pgn->fullname; ?></td>
                                    <td><?= $pgn->description; ?></td>
                                    <td><?= $pgn->gender == 'L' ? 'Laki-laki' : 'Perempuan'; ?></td>
                                    <td><?= $pgn->phone; ?></td>
                                    <td class="text-center">
                                       <a href="<?= base_url(); ?>/uploads/image_user/<?= $pgn->image_user != '' ? $pgn->image_user : 'default.png'; ?>" class="image-link">
                                          <img alt="image" src="<?= base_url(); ?>/uploads/image_user/<?= $pgn->image_user != '' ? $pgn->image_user : 'default.png'; ?>" class="rounded" width="30" height="30">
                                       </a>
                                    </td>
                                    <td class="text-center">
                                       <h6><span class="badge badge-<?= $pgn->active == 1 ? 'success' : 'danger'; ?>"><?= $pgn->active == 1 ? 'Active' : 'Not active'; ?></span></h6>
                                    </td>
                                    <td class="text-center">
                                       <div class="btn-group" role="group">
                                          <button class="btn btn-sm btn-info item_detail" data-id="<?= $pgn->id_user; ?>"><i class="fa fa-info-circle"></i></button>
                                          <a href="<?= base_url(); ?>/pengguna-edit/<?= $pgn->username; ?>" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></a>
                                          <a href="javascript:hapuspengguna('<?= $pgn->username; ?>')" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                       </div>
                                    </td>
                                 </tr>
                              <?php
                                 $no++;
                              endforeach;
                              ?>
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

<div class="modal fade text-left" id="modal-detail" tabindex="-1" role="dialog" aria-labelledby="modal-detail" aria-hidden="true">
   <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title">Detail Pengguna</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body pb-0">
            <div class="invoice p-0">
               <div class="invoice-print">
                  <div class="row">
                     <div class="col-lg-12">
                        <div class="invoice-title mb-0 mt-0">
                           <h6></h6>
                        </div>
                     </div>
                  </div>
                  <div class="row mt-1">
                     <div class="col-md-12">
                        <div class="row justify-content-md-center">
                           <div class="col-md-4 mb-2" id="img-detail"></div>
                        </div>
                        <div class="table-responsive">
                           <table class="table table-sm table-hover" id="tb-detail">
                              <tbody>
                              </tbody>
                           </table>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="modal-footer">
            <button type="button" data-dismiss="modal" aria-label="Close" class="btn btn-sm btn-outline-danger">Close</button>
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
<?= $this->endSection(); ?>

<?= $this->section('page_js'); ?>
<script>
   $("#tb-data").DataTable({
      "responsive": true,
      "lengthChange": true,
      "autoWidth": false,
      "language": table_language(),
      "fnDrawCallback": function() {
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
            }
         });
      },
      "columnDefs": [{
         "sortable": false,
         "targets": [5, 7]
      }]
   });
   $(document).off("click", "table#tb-data button.item_detail")
      .on("click", "table#tb-data button.item_detail", function(e) {
         e.preventDefault();
         let id = $(this).attr("data-id");
         $.ajax({
            type: "POST",
            url: BASE_URL + "/pengguna/getOnePengguna",
            data: {
               id: id
            },
            dataType: "json",
            success: function(res) {
               if (res.status == 200) {
                  $("#modal-detail").modal({
                     backdrop: false
                  });
                  $("#modal-detail div.invoice-title h6").html('Pengguna ' + res.data.fullname);
                  let img = '<img alt="image" src="' + BASE_URL + '/uploads/image_user/' + res.data.image_user + '" class="img-thumbnail">'
                  var t = '<tr> <th width="25%">Nama</th>';
                  t += '<td>' + res.data.fullname + '</td>';
                  t += '</tr>';
                  t += '<tr><th width="25%">Email</th>';
                  t += '<td>' + res.data.email + '</td></tr>';
                  t += '<tr><th width="25%">Username</th>';
                  t += '<td>' + res.data.username + '</td></tr>';
                  t += '<tr><th width="25%">Role</th>';
                  t += '<td>' + res.data.description + '</td></tr>';
                  t += '<tr><th width="25%">Jenis Kelamin</th>';
                  t += '<td>' + ((res.data.gender == 'L') ? 'Laki-laki' : 'Perempuan') + '</td></tr>';
                  t += '<tr><th width="25%">No HP</th>';
                  t += '<td>' + res.data.phone + '</td></tr>';
                  $('#img-detail').html('');
                  console.log(img);
                  $('#img-detail').html(img);
                  $('#tb-detail tbody').html('');
                  $('#tb-detail tbody').html(t);
               } else {
                  Swal.fire({
                     title: "Error",
                     text: res.pesan,
                     icon: "error",
                     confirmButtonClass: "btn btn-danger",
                     buttonsStyling: false,
                  });
               }
            }
         });
      });

   function hapuspengguna(id) {
      Swal.fire({
         title: 'Yakin hapus data pengguna?',
         text: "Hapus pengguna " + id + ", data yang sudah dihapus tidak bisa dikembalikan!",
         icon: 'warning',
         showCancelButton: true,
         confirmButtonColor: '#d33',
         confirmButtonText: 'Ya, hapus',
         cancelButtonText: 'Batal'
      }).then((result) => {
         if (result.isConfirmed) {
            location.href = "<?= base_url() ?>/pengguna-delete/" + id;
         }
      })
   }
</script>
<?= $this->endSection(); ?>