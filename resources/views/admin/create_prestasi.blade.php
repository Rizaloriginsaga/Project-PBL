@extends('layout.master')

@section('content')
    <div class="p-3">
        <div class="content-header">
            <div class="container-fluid">
                <h1>Tambah Data Prestasi</h1>
                <a href="{{ url('tampil-prestasi') }}" class="btn btn-purple col-sm-2 mt-3"><i
                        class="fa-solid fa-chevron-left"></i>&ensp;Kembali</a>
                <form id="quickForm" action="{{ route('store_prestasi') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="col-sm-8 offset-sm-2">
                        <div class="card-body">
                            <div class="form-group">
                                <input type="text" name="idPrestasi" class="form-control" id="idPrestasi"
                                    placeholder="No Sertifikat">
                            </div>
                            <div class="form-group">
                                <input type="text" name="nim" class="form-control" id="nim" placeholder="NIM">
                            </div>
                            <div class="form-group">
                                <input type="text" name="namaMahasiswa" class="form-control" id="namaMahasiswa"
                                    placeholder="Nama Mahasiswa">
                            </div>
                            <div class="form-group">
                                <input type="text" name="namaPrestasi" class="form-control" id="namaPrestasi"
                                    placeholder="Nama Prestasi">
                            </div>
                            <div class="form-group">
                                <select class="form-control text-muted" style="width: 100%;" id="tingkatPrestasi" name="tingkatPrestasi" type="text">
                                    <option>Kabupaten</option>
                                    <option>Provinsi</option>
                                    <option>Nasional</option>
                                    <option>Internasional</option>
                                </select>
                            </div>
                            <div class="row mr-0 ml-0">
                                <div class="form-group col-sm-5">
                                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                        <div class="input-group-append" data-target="#reservationdate"
                                            data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa-solid fa-calendar-days"></i></div>
                                        </div>
                                        <input type="text" name="tahunPengeluaran" id="tahunPengeluaran"
                                            placeholder="Tahun Pengeluaran" class="form-control datetimepicker-input"
                                            data-target="#reservationdate" />
                                    </div>
                                </div>
                                <div class="form-group date col-sm-6 offset-sm-1">
                                    <input type="text" name="tahunAngkatan" class="form-control" id="tahunAngkatan"
                                        placeholder="Tahun Angkatan">
                                </div>
                            </div>
                            <div class="form-group">
                                <select class="form-control text-muted" style="width: 100%;" id="jenisSertifikat" name="jenisSertifikat" type="text">
                                    <option>Akademik</option>
                                    <option>Non Akademik</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="dokumen" id="dokumen">
                                    <label class="custom-file-label text-muted" for="dokumen"
                                        data-browse="Upload">Dokumen</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <button type="submit" class="btn btn-purple offset-sm-3 col-sm-2">Tambah</button>
                        <a href="{{ url('tampil-prestasi') }}" class="btn btn-purple offset-sm-2 col-sm-2">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
