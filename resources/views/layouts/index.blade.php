@php
    $konf = DB::table('settings')->first();
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>{{$konf->instansi_setting}} </title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{asset('admin/vendors/feather/feather.css')}}">
  <link rel="stylesheet" href="{{asset('admin/vendors/mdi/css/materialdesignicons.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin/vendors/ti-icons/css/themify-icons.css')}}">
  <link rel="stylesheet" href="{{asset('admin/vendors/typicons/typicons.css')}}">
  <link rel="stylesheet" href="{{asset('admin/vendors/simple-line-icons/css/simple-line-icons.css')}}">
  <link rel="stylesheet" href="{{asset('admin/vendors/css/vendor.bundle.base.css')}}">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="{{asset('admin/vendors/datatables.net-bs4/dataTables.bootstrap4.css')}}">
  <link rel="stylesheet" href="{{asset('admin/js/select.dataTables.min.css')}}">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{asset('admin/css/vertical-layout-light/style.css')}}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{ asset('logo/'.$konf->favicon_setting) }}" />

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/jqvmap/jqvmap.min.css') }}">
  <script src="{{ asset('admin/js/sweetalert.min.js') }}"></script>
  <link rel="stylesheet" href="{{ asset('admin/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">

</head>
<body>
  <div class="container-scroller"> 
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
        <div class="me-3">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
            <span class="icon-menu"></span>
          </button>
        </div>
        <div>
          <a class="navbar-brand brand-logo" href="{{url('/')}}" target="_blank">
            <img style="widht: 80px; height: 80px;" src="{{ asset('logo/'.$konf->favicon_setting) }}" alt="logo" />
          </a>
          <a class="navbar-brand brand-logo-mini" href="{{url('/')}}" target="_blank">
            <img src="{{ asset('logo/'.$konf->favicon_setting) }}" alt="logo" />
          </a>
        </div>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-top"> 
        <ul class="navbar-nav mt-4">
          <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
            <h1 class="welcome-text"><span class="text-black fw-bold">Absensi Guru Sekolah {{$konf->instansi_setting}}</span></h1>
              <span class="menu-title">Dashboard</span>
            </a>
            Waktu Server Saat Ini: <?php $tg = date('Y-m-d'); 
            echo Carbon\Carbon::parse($tg)->isoFormat('dddd, D MMMM Y'); ?> <span id="clock"></span>
          </li>
        </ul>
        <ul class="navbar-nav ms-auto">
          <li class="nav-item dropdown d-none d-lg-block user-dropdown">
            <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
              <h1 class="welcome-text"><span class="text-black fw-bold">{{Auth::user()->name}}</span></h1>
              <span class="icon-menu text-primary" style="padding-left: 70px;"></span></a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
              <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                this.closest('form').submit();" class="dropdown-item"><i class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>Logout</a>
              </form>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-bs-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      <div class="theme-setting-wrapper">
        <div id="settings-trigger"><i class="ti-settings"></i></div>
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close ti-close"></i>
          <p class="settings-heading">SIDEBAR SKINS</p>
          <div class="sidebar-bg-options selected" id="sidebar-light-theme"><div class="img-ss rounded-circle bg-light border me-3"></div>Light</div>
          <div class="sidebar-bg-options" id="sidebar-dark-theme"><div class="img-ss rounded-circle bg-dark border me-3"></div>Dark</div>
        </div>
      </div>
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas pt-5" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="{{route('dashboard.index')}}">
              <i class="mdi mdi-grid-large menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          @if (Auth::user()->id == 1)
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#master-umum" aria-expanded="false" aria-controls="master-umum">
              <i class="menu-icon mdi mdi-folder-multiple"></i>
              <span class="menu-title">Guru</span>
              <i class="menu-arrow"></i> 
            </a>
            <div class="collapse" id="master-umum">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{route('dataguru.index')}}">Data Guru</a></li>
              </ul>
            </div>
          </li>
          @endif
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#presensi" aria-expanded="false" aria-controls="presensi">
              <i class="menu-icon mdi mdi-folder-multiple"></i>
              <span class="menu-title">Presensi</span>
              <i class="menu-arrow"></i> 
            </a>
            <div class="collapse" id="presensi">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{route('presensihadir.index')}}">Presensi Hadir</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{route('presensipulang.index')}}">Presensi Pulang</a></li>
              </ul>
            </div>
          </li>
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <section>
          @yield('content')
        </section>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        {{-- <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Copyright © 2021. All rights reserved.</span>
          </div>
        </footer> --}}
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="{{asset('admin/vendors/js/vendor.bundle.base.js')}}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="{{asset('admin/vendors/chart.js/Chart.min.js')}}"></script>
  <script src="{{asset('admin/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
  <script src="{{asset('admin/vendors/progressbar.js/progressbar.min.js')}}"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="{{asset('admin/js/off-canvas.js')}}"></script>
  <script src="{{asset('admin/js/hoverable-collapse.js')}}"></script>
  <script src="{{asset('admin/js/template.js')}}"></script>
  <script src="{{asset('admin/js/settings.js')}}"></script>
  <script src="{{asset('admin/js/todolist.js')}}"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="{{asset('admin/js/dashboard.js')}}"></script>
  <script src="{{asset('admin/js/Chart.roundedBarCharts.js')}}"></script>
  <!-- End custom js for this page-->

  <script src="{{ asset('admin/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <!-- ChartJS -->
  <script src="{{ asset('admin/plugins/chart.js/Chart.min.js') }}"></script>
  <!-- Sparkline -->
  <script src="{{ asset('admin/plugins/sparklines/sparkline.js') }}"></script>
  <!-- JQVMap -->
  <script src="{{ asset('admin/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
  <script src="{{ asset('admin/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
  <!-- jQuery Knob Chart -->
  <script src="{{ asset('admin/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
  <!-- daterangepicker -->
  <script src="{{ asset('admin/plugins/moment/moment.min.js') }}"></script>
  <script src="{{ asset('admin/plugins/daterangepicker/daterangepicker.js') }}"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="{{ asset('admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
  <!-- Summernote -->
  {{-- <script src="{{ asset('admin/plugins/summernote/summernote-bs4.min.js') }}"></script> --}}
  <!-- overlayScrollbars -->
  <script src="{{ asset('admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
  <script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>
  <!-- Bootstrap 4 -->
  <script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <!-- DataTables  & Plugins -->
  <script src="{{ asset('admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('admin/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
  <script src="{{ asset('admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('admin/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
  <script src="{{ asset('admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('admin/plugins/jszip/jszip.min.js') }}"></script>
  <script src="{{ asset('admin/plugins/pdfmake/pdfmake.min.js') }}"></script>
  <script src="{{ asset('admin/plugins/pdfmake/vfs_fonts.js') }}"></script>
  <script src="{{ asset('admin/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
  <script src="{{ asset('admin/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
  <script src="{{ asset('admin/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
  <script src="{{ asset('admin/js/imageresize.js') }}"></script>
  {{-- baca gambar --}}
  <script src="{{ asset('admin/js/gambar.js') }}"></script>
  <script type="text/javascript" src="{{ asset('admin/js/gambar.js') }}"></script>

  <script>
    $("#preview_gambar").change(function() {
      bacaGambar(this);
    });
  </script>
  <script src="{{ asset('admin/ckeditor/ckeditor.js') }}"></script>
  {{-- <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script> --}}

  {{-- livesearch --}}
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <script>
    $(function() {
      $("#example1").DataTable({
        "responsive": true,
        "lengthChange": true,
        "autoWidth": true,
        "buttons": ["excel", "pdf", "print"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": true,
        "responsive": true,
      });
      $('#example3').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": true,
        "responsive": true,
      });
      $('#example4').DataTable({
        "paging": true,
        "ordering": true,
        "info": true,
        "searching": true,
        "lengthChange": true,
        "autoWidth": true,
        "responsive": true,
        "language": {
          "url": "http://cdn.datatables.net/plug-ins/1.10.9/i18n/Indonesian.json",
          "sEmptyTable": "Tidak ada data di database"
        }
      });
      $('#example5').DataTable({
        "paging": true,
        "ordering": true,
        "info": true,
        "searching": true,
        "lengthChange": true,
        "autoWidth": true,
        "responsive": true,
        "language": {
          "url": "http://cdn.datatables.net/plug-ins/1.10.9/i18n/Indonesian.json",
          "sEmptyTable": "Tidak ada data di database"
        }
      });
    });
  </script>

  <script>
    function showTime() {
      var a_p = "";
      var today = new Date();
      var curr_hour = today.getHours();
      var curr_minute = today.getMinutes();
      var curr_second = today.getSeconds();
      if (curr_hour < 12) {
        a_p = "AM";
      } else {
        a_p = "PM";
      }
      if (curr_hour == 0) {
        curr_hour = 24;
      }
      if (curr_hour > 24) {
        curr_hour = curr_hour - 24;
      }
      curr_hour = checkTime(curr_hour);
      curr_minute = checkTime(curr_minute);
      curr_second = checkTime(curr_second);
      document.getElementById('clock').innerHTML = curr_hour + ":" + curr_minute + ":" + curr_second + " " + a_p;
    }

    function checkTime(i) {
      if (i < 10) {
        i = "0" + i;
      }
      return i;
    }
    setInterval(showTime, 500);
  </script>
  <script type="text/javascript">
    $('.show_confirm').click(function(event) {
      var form = $(this).closest("form");
      var name = $(this).data("name");
      event.preventDefault();
      swal({
          title: `Yakin ingin menghapus data ini?`,
          text: "Jika di hapus maka data ini akan hilang.",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            form.submit();
          }
        });
    });
  </script>
  @if(session("Sukses"))
  <script type="text/javascript">
    toastr.info("{{ session("
      Sukses ") }}");
  </script>
  @endif
  <script>
    $(document).ready(function() {
      $("#angka").keyup(function() {
        $(this).maskNumber({
          integer: true,
          thousand: "."
        })
      })
    })
  </script>
  <script>
    $("#dropdown").select2({
      theme: "bootstrap4",
      placeholder: "Silahkan Pilih",
    });
  </script>
  <script>
    $("#dropdown2").select2({
      theme: "bootstrap4",
      placeholder: 'Silahkan pilih',
    });
  </script>
  <script>
    $("#dropdown3").select2({
      theme: "bootstrap4",
      placeholder: 'Silahkan pilih',
    });
  </script>
   <script>
    $("#dropdown4").select2({
      theme: "bootstrap4",
      placeholder: 'Silahkan pilih',
    });
  </script>
   <script>
    $("#dropdown5").select2({
      theme: "bootstrap4",
      placeholder: 'Silahkan pilih',
    });
  </script>
   <script>
    $("#dropdown6").select2({
      theme: "bootstrap4",
      placeholder: 'Silahkan pilih',
    });
  </script>
  <script>
    $("#dropdown7").select2({
      theme: "bootstrap4",
      placeholder: 'Silahkan pilih',
    });
  </script>
  <script>
    $("#preview_gambar").change(function() {
      bacaGambar(this);
    });
  </script>
  <script>
    $(document).ready(function() {
      $('#country-dd').on('change', function() {
        var idNegara = this.value;
        $("#state-dd").html('');
        $.ajax({
          url: "{{url('api/fetch-states')}}",
          type: "POST",
          data: {
            id_negara: idNegara,
            _token: '{{csrf_token()}}'
          },
          dataType: 'json',
          success: function(result) {
            $('#state-dd').html('<option value="">Select State</option>');
            $.each(result.provinsi, function(key, value) {
              $("#state-dd").append('<option value="' + value
                .id_provinsi + '">' + value.nama_provinsi + '</option>');
            });
            $('#city-dd').html('<option value="">Select City</option>');
          }
        });
      });
      $('#state-dd').on('change', function() {
        var idProvinsi = this.value;
        $("#city-dd").html('');
        $.ajax({
          url: "{{url('api/fetch-cities')}}",
          type: "POST",
          data: {
            id_provinsi: idProvinsi,
            _token: '{{csrf_token()}}'
          },
          dataType: 'json',
          success: function(res) {
            $('#city-dd').html('<option value="">Select City</option>');
            $.each(res.kota, function(key, value) {
              $("#city-dd").append('<option value="' + value
                .id_kota + '">' + value.nama_kota + '</option>');
            });
          }
        });
      });
    });
  </script>
{{-- Dropdown Comm --}}
<script>
  $(document).ready(function() {
    $('#pusat-dd').on('change', function() {
      var idPusat = this.value;
      $("#region-dd").html('');
      $.ajax({
        url: "{{url('api/fetch-region')}}",
        type: "POST",
        data: {
          id_pusat: idPusat,
          _token: '{{csrf_token()}}'
        },
        dataType: 'json',
        success: function(result) {
          $('#region-dd').html('<option value="">Select Region</option>');
          $.each(result.region, function(key, value) {
            $("#region-dd").append('<option value="' + value
              .id_region + '">' + value.nama_region + '</option>');
          });
          $('#chapter-dd').html('<option value="">Select Chapter</option>');
        }
      });
    });
    $('#region-dd').on('change', function() {
      var idRegion = this.value;
      $("#chapter-dd").html('');
      $.ajax({
        url: "{{url('api/fetch-chapter')}}",
        type: "POST",
        data: {
          id_region: idRegion,
          _token: '{{csrf_token()}}'
        },
        dataType: 'json',
        success: function(res) {
          $('#chapter-dd').html('<option value="">Select Chapter</option>');
          $.each(res.chapter, function(key, value) {
            $("#chapter-dd").append('<option value="' + value
              .id_chapter + '">' + value.nama_chapter + '</option>');
          });
        }
      });
    });
  });
</script>

{{-- dropdown kegiatan --}}
<script>
  $(document).ready(function() {
    $('#kegiatan-dd').on('change', function() {
      var idKegiatan = this.value;
      $("#sub-dd").html('');
      $.ajax({
        url: "{{url('api/fetch-kegiatan')}}",
        type: "POST",
        data: {
          id_kategori_kegiatan: idKegiatan,
          _token: '{{csrf_token()}}'
        },
        dataType: 'json',
        success: function(result) {
          $('#sub-dd').html('<option value="">Select Sub Kategori Kegiatan</option>');
          $.each(result.sub_kategori_kegiatan, function(key, value) {
            $("#sub-dd").append('<option value="' + value
              .id_sub_kategori_kegiatan + '">' + value.nama_sub_kategori_kegiatan + '</option>');
          });
          $('#sub_sub-dd').html('<option value="">Select Sub Sub</option>');
        }
      });
    });
  });
</script>
@yield('script')
</body>

</html>

