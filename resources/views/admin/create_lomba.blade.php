@extends('layout.master')

@section('content')
<br>
<h4 style="margin-left: 10px;">Tambah Data Lomba</h4>
<br>
<a href="/tampil-lomba" class="btn btn-purple" style="margin-left: 10px;">< Kembali</a>
<br>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            
            <!-- Pengkondisian validasi form -->
            @if ($errors->any()) 
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li> {{$error}}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form action="{{route('lomba.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="id_lomba">ID Lomba <span class="text-danger">*</span></label>
                    <input class="form-control" type="text" name="id_lomba" id="id_lomba">
                </div>
                <div class="form-group">
                    <label for="nama_lomba">Nama Lomba <span class="text-danger">*</span></label>
                    <input class="form-control" type="text" name="nama_lomba" id="nama_lomba">
                </div>
                <div class="form-group">
                    <label for="tingkat_lomba">Tingkat Lomba <span class="text-danger">*</span></label>
                    <input class="form-control" type="text" name="tingkat_lomba" id="tingkat_lomba">
                </div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="tanggal_posting">Tanggal Posting <span class="text-danger">*</span></label>
                        <input class="form-control" type="date" name="tanggal_posting" id="tanggal_posting">
                    </div>
                    <div class="col-md-6">
                        <label for="tanggal_berakhir">Tanggal Berakhir <span class="text-danger">*</span></label>
                        <input class="form-control" type="date" name="tanggal_berakhir" id="tanggal_berakhir">
                    </div>
                </div>
                <div class="form-group">
                    <label for="deskripsi">Deskripsi <span class="text-danger">*</span></label>
                    <input class="form-control" type="text" name="deskripsi" id="deskripsi">
                </div>
                <div class="form-group">
                    <label for="foto">Foto <span class="text-danger">*</span></label>
                    <input class="form-control" type="file" name="foto" id="foto">
                </div>
                <div class="text-center mt-3">
    <button type="submit" class="btn btn-purple mx-2">Tambah</button>
    <a href="/tampil-lomba" class="btn btn-purple mx-2">Batal</a>
</div>

            </form>
        </div>
    </div>
</div>
@endsection