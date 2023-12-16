@extends('layout.master')

@section('content')
    <div class="p-3">
        <div class="content-header">
            <div class="container-fluid">
                <h1>Lihat Data Prestasi</h1>
                <a href="{{ url('tampil-prestasi') }}" class="btn btn-purple col-sm-2 mt-3">
                <i class="fa-solid fa-chevron-left"></i>&ensp;Kembali</a>
                <div class="row">
                    <form id="quickForm" class="col-sm-7">@csrf
                        <div class="card-body">
                            <div class="form-group">
                                <input type="text" name="idPrestasi" class="form-control" id="idPrestasi" value="{{ $data->id_prestasi }}" disabled>
                            </div>
                            <div class="form-group">
                                <input type="text" name="nim" class="form-control" id="nim" value="{{ $data->nim }}" disabled>
                            </div>
                            <div class="form-group">
                                <input type="text" name="namaMahasiswa" class="form-control" id="namaMahasiswa" value="{{ $data->mahasiswa->nama }}" disabled>
                            </div>
                            <div class="form-group">
                                <input type="text" name="namaPrestasi" class="form-control" id="namaPrestasi" value="{{ $data->nama_prestasi }}" disabled>
                            </div>
                            <div class="form-group">
                                <input type="text" name="tingkatPrestasi" class="form-control" id="tingkatPrestasi" value="{{ $data->tingkat_prestasi }}" disabled>
                            </div>
                            <div class="row mr-0 ml-0">
                                <div class="form-group col-sm-5">
                                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                        <div class="input-group-append" data-target="#reservationdate"
                                            data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa-solid fa-calendar-days"></i></div>
                                        </div>
                                        <input type="text" name="tahunPengeluaran" id="tahunPengeluaran"
                                            value="{{ $data->tahun_pengeluaran }}" class="form-control datetimepicker-input"
                                            data-target="#reservationdate" disabled />
                                    </div>
                                </div>
                                <div class="form-group date col-sm-6 offset-sm-1">
                                    <input type="text" name="tahunAngkatan" class="form-control" id="tahunAngkatan"
                                        value="{{ $data->mahasiswa->tahun_angkatan }}" disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" name="jenisSertifikat" class="form-control" id="jenisSertifikat"
                                    value="{{ $data->jenis_sertifikat }}" disabled>
                            </div>
                        </div>
                    </form>
                    <div class="col-sm-5 pt-3">@csrf
                        <img src="{{ asset('images/' . $data->dokumen) }}" class="img-thumbnail" width="auto" />
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
