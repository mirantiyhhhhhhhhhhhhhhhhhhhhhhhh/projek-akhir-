@extends('layouts.web')
@section('content')

<div class="row text-center">
    <div class="col">
        <div class="">
        <div class="">
            <h3 class="text-light">{{ $title }}</h3>
        </div>
        <div class="mt-2">
          <div class="row d-flex justify-content-center">
            @if ($message = Session::get('sukses'))
            <div class="alert alert-success alert-dismissible fade show col-md-5" role="alert">
            {{$message}}
            </div>
            @endif
            @if ($message = Session::get('gagal'))
            <div class="alert alert-warning alert-dismissible fade show col-md-5" role="alert">
            {{$message}}
            </div>
            @endif
          </div>
            <form action="{{ route('presensihadirLanding.store') }}" method="POST" enctype="multipart/form-data" id="form">
            @csrf
            @method('POST')
            <div class="row d-flex justify-content-center">
              <div class="col-4">
                <!-- id -->
                <div class="form-group mb-3">
                    <h6 class="text-light">Waktu Server Saat Ini: <?php $tg = date('Y-m-d'); 
                     echo Carbon\Carbon::parse($tg)->isoFormat('dddd, D MMMM Y'); ?> <span id="clock"></span></h6>
                    <input type="text" class="form-control" placeholder="ID Guru" name="id_dataguru" value="{{ old('id_dataguru') }}" id="id_dataguru" hidden>
                    @error('id_dataguru') <small class="text-danger"> {{ $message }} </small> @enderror
                </div>
                <!-- akhir id -->
              </div>
            </div>

            <!-- preview -->
            <div class="form-group d-flex justify-content-center">
                <video id="preview" class="col-md-4 "></video><br>
            </div>
            <div class="form-group d-flex justify-content-center">
                <p class="text-info">Posisikan QR Code Anda didalam Kotak</p>
            </div>
            <!-- akhir preview -->
             <a href="{{url('/')}}" class="btn btn-danger btn-sm">Selesai</a>
            </div>
            </form>
        </div>
    </div>
    </div>

    <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
    <!-- script instacamera -->
    <script type="text/javascript">
        let scanner = new Instascan.Scanner({
          video: document.getElementById('preview')
        });
        scanner.addListener('scan', function(content) {
          console.log(content);
        });
        Instascan.Camera.getCameras().then(function(cameras) {
          if (cameras.length > 0) {
            scanner.start(cameras[0]);
          } else {
            console.error('No cameras found.');
          }
        }).catch(function(e) {
          console.error(e);
        });
        scanner.addListener('scan', function(c) {
          document.getElementById('id_dataguru').value = c;
          document.getElementById('form').submit();
        })
    </script>
@endsection
