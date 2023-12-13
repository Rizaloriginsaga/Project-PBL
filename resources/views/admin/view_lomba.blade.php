@extends('layout.master')
@section('title', 'Detail Lomba')
@section('content')
<h4 style="margin-left: 20px; margin-top: 20px;">Lihat Data Lomba</h4>
<br>
<a href="/tampil-lomba" class="btn btn-purple" style="margin-left: 20px;">< Kembali</a>
<br>
    <div class="container">
<br>
        <div class="row">
            <div class="col-md-6">
                <form class="row g-3">
                    <div class="col-md-12">
                        <label for="id" class="form-label">ID Lomba:</label>
                        <input type="text" id="id" class="form-control" value="{{ $data->id }}" readonly>
                    </div>
                    <div class="col-md-12">
                        <label for="nama_lomba" class="form-label">Nama Lomba:</label>
                        <input type="text" id="nama_lomba" class="form-control" value="{{ $data->nama_lomba }}" readonly>
                    </div>
                    <div class="col-md-12">
                        <label for="tingkat_lomba" class="form-label">Tingkat Lomba:</label>
                        <input type="text" id="tingkat_lomba" class="form-control" value="{{ $data->tingkat_lomba }}" readonly>
                    </div>
                    <div class="col-md-6">
                        <label for="tanggal_posting" class="form-label">Tanggal Posting:</label>
                        <input type="text" id="tanggal_posting" class="form-control" value="{{ $data->tanggal_posting }}" readonly>
                    </div>
                    <div class="col-md-6">
                        <label for="tanggal_berakhir" class="form-label">Tanggal Berakhir:</label>
                        <input type="text" id="tanggal_berakhir" class="form-control" value="{{ $data->tanggal_berakhir }}" readonly>
                    </div>
                    <div class="col-md-12">
                        <label for="deskripsi" class="form-label">Deskripsi:</label>
                        <textarea id="deskripsi" class="form-control" readonly>{{ $data->deskripsi }}</textarea>
                    </div>
                </form>
            </div>
            <div class="col-md-6">
                <div class="row g-3">
                    <div class="col-md-12">
                        <br>
                        @if ($data->foto)
                            <img src="{{ asset('images/' . $data->foto) }}" alt="Lomba Image" style="max-width: 100%;">
                        @else
                            No Image
                        @endif
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
                </div>
            </div>
        </div>
    </div>
@endsection