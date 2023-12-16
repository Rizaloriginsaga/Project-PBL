@extends('layout.master')

@section('content')
    <div class="p-3">
        <div class="content-header">
            <div class="container-fluid">
                <h1>Tambah Data Lomba</h1>
                <a href="{{ url('/tampil-lomba') }}" class="btn btn-purple col-sm-2 mt-3"><i
                        class="fa-solid fa-chevron-left"></i>&ensp;Kembali</a>
                <form id="quickForm" action="{{ route('lomba.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="col-sm-8 offset-sm-2">
                        <div class="card-body">
                            <div class="form-group">
                                <input type="text" name="id_lomba" class="form-control" id="id_lomba"
                                    placeholder="ID Lomba">
                            </div>
                            <div class="form-group">
                                <input type="text" name="nama_lomba" class="form-control" id="nama_lomba" placeholder="Nama Lomba">
                            </div>
                            <div class="form-group">
                                <select class="form-control text-muted" style="width: 100%;" id="tingkat_lomba" name="tingkat_lomba" type="text">
                                    <option>Kabupaten</option>
                                    <option>Provinsi</option>
                                    <option>Nasional</option>
                                    <option>Internasional</option>
                                </select>
                            </div>
                            <div class="row mr-0 ml-0">
                                <div class="form-group col-sm-5">
                                    <div class="input-group date" id="reservationdate1" data-target-input="nearest">
                                        <div class="input-group-append" data-target="#reservationdate1"
                                            data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa-solid fa-calendar-days"></i></div>
                                        </div>
                                        <input type="text" name="tanggal_posting" id="tanggal_posting"
                                            placeholder="Tanggal Posting" class="form-control datetimepicker-input"
                                            data-target="#reservationdate1" />
                                    </div>
                                </div>
                                <div class="form-group col-sm-6 offset-sm-1">
                                    <div class="input-group date" id="reservationdate2" data-target-input="nearest">
                                        <div class="input-group-append" data-target="#reservationdate2"
                                            data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa-solid fa-calendar-days"></i></div>
                                        </div>
                                        <input type="text" name="tanggal_berakhir" id="tanggal_berakhir"
                                            placeholder="Tanggal Berakhir" class="form-control datetimepicker-input"
                                            data-target="#reservationdate2" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="deskripsi" id="deskripsi" row=5 placeholder="Deskripsi"></textarea>
                            </div>
                            <div class="form-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="foto" id="foto">
                                    <label class="custom-file-label text-muted" for="foto"
                                        data-browse="Upload">Foto</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <button type="submit" class="btn btn-purple offset-sm-3 col-sm-2">Tambah</button>
                        <a href="{{ url('/tampil-lomba') }}" class="btn btn-purple offset-sm-2 col-sm-2">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
