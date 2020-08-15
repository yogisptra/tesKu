<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('asset/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="{{asset('asset/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('asset/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">

  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('asset/dist/css/adminlte.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('asset/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('asset/plugins/daterangepicker/daterangepicker.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{asset('asset/plugins/summernote/summernote-bs4.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- Data Table -->
  <link rel="stylesheet" href="{{asset('asset/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('asset/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{asset('asset/plugins/summernote/summernote-bs4.css')}}">
  <!-- alert -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  @include('layouts.header')
  @include('layouts.sidebar')
  @include('sweet::alert')
   <div class="content-wrapper">
    @yield('content')
  </div>
</div>

<!-- jQuery -->
  <script src="{{asset('asset/plugins/jquery/jquery.min.js')}}"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="{{asset('asset/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="{{asset('asset/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  
  <!-- Summernote -->
  <script src="{{asset('asset/plugins/summernote/summernote-bs4.min.js')}}"></script>
  <!-- overlayScrollbars -->
  <script src="{{asset('asset/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
  <!-- AdminLTE App -->
  <script src="{{asset('asset/dist/js/adminlte.js')}}"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="{{asset('asset/dist/js/pages/dashboard.js')}}"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="{{asset('asset/dist/js/demo.js')}}"></script>
  <script src="{{asset('asset/plugins/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('asset/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
  <script src="{{asset('asset/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
  <script src="{{asset('asset/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
  <!-- AdminLTE App -->

  <!-- AdminLTE for demo purposes -->
  <script src="{{asset('asset/dist/js/demo.js')}}"></script>
  <!-- page script -->
  <!-- Alert -->
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true,
        "autoWidth": false,
      });
    });

    </script>
    <!-- Summernote -->
    <script>
     $(document).ready(function() {

          $('.textarea').summernote();

     });
    </script>
       <!-- Alert -->
    <script>

        $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
          function delete_mobil(id, name){
                swal({
                title: "Hapus Data?",
                text: "Jika dihapus, Data tidak akan bisa kembali!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url : "{{ url('admin/mobil')}}" + '/' + id,
                        type : "POST",
                        data : {'_method' : 'DELETE', id},
                        success: function(data){
                            swal("Berhasi!, Data Berhasi di Hapus", {
                            icon: "success",
                            });
                            location.reload();
                        },
                        error : function(){
                            swal({
                                title: 'Opps...',
                                type : 'error',
                                timer : '1500'
                            })
                        }
                    })
                } 
            });
        }

        // Alert Add Mobil
         $('#save_mobil').on('click', function (e)  {
                  e.preventDefault();
                
                  swal({
                  title: "Apakah data benar?",
                  text: "Apabila anda yakin, Data akan tersimpan!",
                  icon: "success",
                  buttons: true,
                  dangerMode: true,
                }).then((result) =>{
                    if(result){

                      console.log(result);
                      $("#addform").submit();
                    } else {
                          swal("Data gagal disimpan!");
                      }
                });
            
          });
        
        // Alert Add Merk
         $('#save_merk').on('click', function (e)  {
          e.preventDefault();
        
          swal({
                title: "Apakah data benar?",
                text: "Apabila anda yakin, Data akan tersimpan!",
                icon: "success",
                buttons: true,
                dangerMode: true,
              }).then((result) =>{
                  if(result){

                    console.log(result);
                    $("#addform_merk").submit();
                        swal("Data berhasil disimpan!");
                  } else {
                        swal("Data gagal disimpan!");
                    }
              });
            
          });

         // Alert Delete Merk
         $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
          function delete_merk(id, name){
                swal({
                title: "Hapus Data?",
                text: "Jika dihapus, Data tidak akan bisa kembali!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url : "{{ url('admin/merk')}}" + '/' + id,
                        type : "POST",
                        data : {'_method' : 'DELETE', id},
                        success: function(data){
                            swal("Berhasi!, Data Berhasi di Hapus", {
                            icon: "success",
                            });
                            location.reload();
                        },
                        error : function(){
                            swal({
                                title: 'Opps...',
                                type : 'error',
                                timer : '1500'
                            })
                        }
                    })
                } 
            });
        } 
   </script>
</body>

</html>