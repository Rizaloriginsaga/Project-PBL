@extends('layout.master')
@section('title', 'Aplikasi Laravel')
@section('content')
<br>
<h4 style="margin-left: 10px;">Edit Data Lomba</h4>
<br>
<a href="/tampil-lomba" class="btn btn-purple" style="margin-left: 10px;">< Kembali</a>
<br>
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

            <form action="{{route('lomba.update', $data->id)}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="kode">ID Lomba <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="id" id="id"
                value="{{$data->id}}">
</div>
<div class="form-group">
                <label for="kode">Nama Lomba <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="nama_lomba" id="nama_lomba"
                value="{{$data->nama_lomba}}">
</div>
<div class="form-group">
    <label for="tingkat_lomba">Tingkat Lomba <span class="text-danger">*</span></label>
    <select class="form-control" name="tingkat_lomba" id="tingkat_lomba">
        <option value="{{$data->tingkat_lomba}}" selected>{{$data->tingkat_lomba}}</option>
        <option value="Kabupaten">Kabupaten</option>
        <option value="Provinsi">Provinsi</option>
        <option value="Nasional">Nasional</option>
        <option value="Internasional">Internasional</option>
    </select>
</div>
<div class="form-group row">
<div class="col-md-6">
                <label for="kode">Tanggal Posting <span class="text-danger">*</span></label>
                <input class="form-control" type="date" name="tanggal_posting" id="tanggal_posting"
                value="{{$data->tanggal_posting}}">
</div>
<div class="col-md-6">
                <label for="kode">Tanggal Berakhir <span class="text-danger">*</span></label>
                <input class="form-control" type="date" name="tanggal_berakhir" id="tanggal_berakhir"
                value="{{$data->tanggal_berakhir}}">
</div>  
<div class="form-group">
                        <label for="deskripsi">Deskripsi <span class="text-danger">*</span></label>
                        <textarea class="form-control" name="deskripsi" id="deskripsi" rows="5">{{$data->deskripsi}}</textarea>
                    </div>
<div class="form-group">
                <label for="kode">Foto <span class="text-danger">*</span></label>
                <input class="form-control" type="file" name="foto" id="foto" 
                value="{{$data->foto}}">
            </div>
            <style>
.btn-purple {
    background-color: #9360E2; /* Ganti dengan kode warna ungu yang Anda inginkan */
    color: #fff; /* Ganti dengan warna teks yang sesuai */
}

.btn-purple:hover {
    background-color: #9360E2; /* Ganti dengan warna ungu yang berbeda saat tombol dihover */
}
</style>
            <br>
            <br>
<div class="text-center mt-3">
    <button type="submit" class="btn btn-purple mx-2" style="margin-top: 10px;">Update</button>
    <a href="{{url('tampil-lomba')}}" class="btn btn-purple mx-2" style="margin-top: 10px;">Batal</a>
</div>
</form>
</div>
</div>
</div>
@endsection