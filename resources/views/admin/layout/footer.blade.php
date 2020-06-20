<?php 
$sek  = date('Y');
$awal = $sek-100;
?>
<script>
$( ".datepicker" ).datepicker({
  inline: true,
  changeYear: true,
  changeMonth: true,
  dateFormat: "yy-mm-dd",
  yearRange: "<?php echo $awal ?>:<?php echo date('Y') ?>"
});

$( ".tanggal" ).datepicker({
  inline: true,
  changeYear: true,
  changeMonth: true,
  dateFormat: "dd-mm-yy",
  yearRange: "<?php echo $awal ?>:<?php echo date('Y') ?>"
});
</script>
<script>
@if ($message = Session::get('sukses'))
// Notifikasi
swal ( "Berhasil" ,  "<?php echo $message ?>" ,  "success" )
@endif

@if ($message = Session::get('warning'))
// Notifikasi
swal ( "Oops.." ,  "<?php echo $message ?>" ,  "warning" )
@endif

// Popup Delete
$(document).on("click", ".delete-link", function(e){
    e.preventDefault();
    url = $(this).attr("href");
    swal({
            title:"Yakin akan menghapus data ini?",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: 'btn btn-danger',
            cancelButtonClass: 'btn btn-success',
            buttonsStyling: false,
            confirmButtonText: "Delete",
            cancelButtonText: "Cancel",
            closeOnConfirm: false,
            showLoaderOnConfirm: true,
        },
        function(isConfirm){
            if(isConfirm){
                $.ajax({
                    url: url,
                    success: function(resp){
                        window.location.href = url;
                    }
                });
                }
            return false;
        });
    });

// Popup approval
// Popup Delete
$(document).on("click", ".approval-link", function(e){
    e.preventDefault();
    url = $(this).attr("href");
    swal({
            title:"Anda yakin ingin menyetujui data ini?",
            type: "info",
            showCancelButton: true,
            confirmButtonClass: 'btn btn-danger',
            cancelButtonClass: 'btn btn-success',
            buttonsStyling: false,
            confirmButtonText: "Ya, Setujui",
            cancelButtonText: "Cancel",
            closeOnConfirm: false,
            showLoaderOnConfirm: true,
        },
        function(isConfirm){
            if(isConfirm){
                $.ajax({
                    url: url,
                    success: function(resp){
                        window.location.href = url;
                    }
                });
                }
            return false;
        });
    });

// TINYMCE
tinymce.init({
  selector: '.konten',
  height: 300,
  content_css: '{{ asset("public/template/assets/vendor/bootstrap/css/bootstrap.min.css") }}',
  content_css_cors: true,
  content_style: 'div { margin: 10px; border: 5px solid red; padding: 10px; }',
  plugins: 'print preview paste searchreplace autolink directionality visualblocks visualchars code fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount imagetools colorpicker textpattern code preview help',
  toolbar: 'formatselect | fontsizeselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent | image | table | hr media removeformat code preview',
  visual_table_class: 'tiny-table',
   fontsize_formats: "8px 10px 12px 14px 18px 24px 36px"
 });
// Simpple
tinymce.init({
  selector: '.simple',
  menubar: false,
  plugins: [
    'advlist autolink lists link image charmap print preview anchor',
    'searchreplace visualblocks code fullscreen',
    'insertdatetime media table paste code help wordcount image media'
  ],
  toolbar: 'undo redo | formatselect | media | image | ' +
  'bold italic backcolor | alignleft aligncenter ' +
  'alignright alignjustify | bullist numlist outdent indent | ' +
  'removeformat | help',
  content_css: '{{ asset("public/template/assets/vendor/bootstrap/css/bootstrap.min.css") }}',
  content_css_cors: true
});
// File manager
// tinymce.init({
//     selector: ".konten",
//     theme: "modern",
//     height: 300,
//    plugins: [
//     "advlist autolink link image media filemanager code responsivefilemanager"
//   ],
//   toolbar1: "undo redo | bold italic underline | forecolor backcolor",
//   toolbar2: "| responsivefilemanager | link unlink | image media | code",
//   image_advtab: true,
//   external_filemanager_path: "./filemanager/",
//   filemanager_title: "Responsive Filemanager",
//   external_plugins: {
//     "responsivefilemanager": "plugins/responsivefilemanager/plugin.min.js",
//     "filemanager": "{{ asset('public/filemanager/plugin.min.js') }}"
//     // "filemanager": "../../filemanager/plugin.min.js"
//   },
//  });
</script>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Yakin akan logout?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Klik <strong>"Logout"</strong> di bawah ini untuk memastikan Anda keluar dari sistem.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal"><i class="fa fa-times"></i> Batalkan</button>
          <a class="btn btn-primary" href="{{ asset('login/logout') }}"><i class="fa fa-sign-out-alt"></i> Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="{{ asset('public/admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <!-- Core plugin JavaScript-->
  <script src="{{ asset('public/admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
  <!-- Custom scripts for all pages-->
  <script src="{{ asset('public/admin/js/sb-admin-2.min.js') }}"></script>
  <!-- Page level plugins -->
  <script src="{{ asset('public/admin/vendor/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('public/admin/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
  <!-- Page level custom scripts -->
  <script src="{{ asset('public/admin/js/demo/datatables-demo.js') }}"></script>
</body>
</html>