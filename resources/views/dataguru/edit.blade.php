@extends('layouts.index')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header pt-5">
                    <h3 class="card-title">{{ $title }}</h3>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Error!</strong> 
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                        </ul>
                    </div>
                    @endif
                    <form action="{{ route('dataguru.update', $data->id_dataguru) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group mb-2">
                            <label for="">Nama<abbr title="" style="color: black">*</abbr></label>
                            <input type="text" class="form-control" placeholder="Masukkan Nama Guru disini...." name="nama_guru" value="{{ $data->nama_guru }}">
                        </div>
                        <div class="form-group mb-2">
                            <label for="">Nomor Induk Pegawai <abbr title="" style="color: black">*</abbr></label>
                            <input type="number" class="form-control" placeholder="Masukkan NIP disini...." name="nip" value="{{ $data->nip }}">
                        </div>
                        <div class="form-group mb-2">
                            <label for="">Status Kepegawaian <abbr title="" style="color: black">*</abbr></label>
                            <select name="status_pegawai" id="" class="form-control">
                                <option value="{{$data->status_pegawai}}">{{$data->status_pegawai}}</option>
                                <option value="PNS">PNS</option>
                                <option value="PPK">PPK</option>
                                <option value="Honor">Honor</option>
                            </select>
                        </div>
                        <div class="form-group mb-2">
                            <label for="">Jenis Kelamin <abbr title="" style="color: black">*</abbr></label>
                            <select name="jenis_kelamin" id="" class="form-control">
                                <option value="{{$data->jenis_kelamin}}">{{$data->jenis_kelamin}}</option>
                                <option value="L">L</option>
                                <option value="P">P</option>
                            </select>
                        </div>
                        <div class="form-group mb-2">
                            <label for="">Email <abbr title="" style="color: black">*</abbr></label>
                            <input type="email" class="form-control" placeholder="Masukkan Alamat disini...." name="email" value="{{$data->email}}">
                        </div>
                        <div class="form-group mb-2">
                            <label for="">Jabatan <abbr title="" style="color: black">*</abbr></label>
                            <input type="text" class="form-control" placeholder="Masukkan Jabtan disini...." name="jabatan" value="{{$data->jabatan}}">
                        </div>
                        <div class="form-group mb-2">
                            <label for="">Alamat <abbr title="" style="color: black">*</abbr></label>
                            <input type="text" class="form-control" placeholder="Masukkan Alamat disini...." name="alamat" value="{{$data->alamat}}">
                        </div>
                        <div class="form-group mb-2">
                            <label for="">Gambar <abbr title="" style="color: black">*</abbr> </label>
                            <input id="inputImg" type="file" accept="image/*" name="foto_guru" class="form-control">
                            <img class="d-none w-25 h-25 my-2" id="previewImg" src="#" alt="Preview image">
                        </div>
                
                        <button type="submit" class="btn btn-dark"><i class="fas fa-save"></i> Save</button>
                    </form>
            </div>
        </div>
    </div>
@endsection
@section('script')
<script>
    document.getElementById('inputImg').addEventListener('change', function() {
        // Get the file input value and create a URL for the selected image
        var input = this;
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('previewImg').setAttribute('src', e.target.result);
                document.getElementById('previewImg').classList.add("d-block");
            };
            reader.readAsDataURL(input.files[0]);
        }
    });
</script>
<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ),{
            ckfinder: {
                uploadUrl: '{{route('image.upload').'?_token='.csrf_token()}}',
    }
        })
        .catch( error => {
            console.error( error );
        } );
  </script>
  <script>
      CKEDITOR.replace( 'editor', {
          filebrowserUploadUrl: "{{route('image.upload', ['_token' => csrf_token() ])}}",
          filebrowserUploadMethod: 'form'
      });
  </script>
@endsection