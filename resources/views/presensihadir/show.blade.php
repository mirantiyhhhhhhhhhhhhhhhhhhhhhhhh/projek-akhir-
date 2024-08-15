@extends('layouts.index')
@section('content')
<div class="data">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{ $title }} </h3>
                <a href="{{ route('presensihadir.index') }}" class="btn btn-warning" style="float: right;"><i class="fas fa-arrow-left"></i> Kembali</a>
            </div>
            <div class="card-body table table-responsive">
                <table class="table">
                    <tr>
                        <th style="width: 30%;">Nomor Induk Pegawai</th>
                        <th style="width: 20px;">:</th>
                        @if ($result->nip == null)
                        <td> --- </td>
                        @else
                        <td>{{ $result->nip }}</td>
                        @endif
                    </tr>
                    <tr>
                        <th style="width: 30%;">Nama</th>
                        <th style="width: 20px;">:</th>
                        <td>{{ $result->nama_guru }}</td>
                    </tr>
                    <tr>
                        <th style="width: 30%;">Status Pegawai</th>
                        <th style="width: 20px;">:</th>
                        <td>{{ $result->status_pegawai }}</td>
                    </tr>
                    <tr>
                        <th style="width: 30%;">Jenis Kelamin</th>
                        <th style="width: 20px;">:</th>
                        @if ($result->jenis_kelamin == 'L')
                        <td>Laki-Laki</td>
                        @endif
                        @if ($result->jenis_kelamin == 'P')
                        <td>Perempuan</td>
                        @endif
                    </tr>
                    <tr>
                        <th style="width: 30%;">Email</th>
                        <th style="width: 20px;">:</th>
                        <td>{{ $result->email }}</td>
                    </tr>
                    <tr>
                        <th style="width: 30%;">Jabatan</th>
                        <th style="width: 20px;">:</th>
                        <td>{{ $result->jabatan }}</td>
                    </tr>
                    <tr>
                        <th style="width: 30%;">Alamat</th>
                        <th style="width: 20px;">:</th>
                        <td>{{ $result->alamat }}</td>
                    </tr>
                    <tr>
                        <th style="width: 30%;">Waktu Presensi Hadir</th>
                        <th style="width: 20px;">:</th>
                        <td>{{ $result->waktu_presensi_hari}} {{ $result->waktu_presensi_jam}}</td>
                    </tr>
                    <tr>
                        <th style="width: 30%;">Foto</th>
                        <th style="width: 20px;">:</th>
                        <td><img src="{{ asset('file/guru/'.$result->foto_guru) }}" alt="" style="width: 100px; heihgt: 100px;"></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')

</script>
@endsection