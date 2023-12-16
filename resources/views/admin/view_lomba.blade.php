@extends('layout.master')

@section('content')
    <div class="p-3">
        <div class="content-header">
            <div class="container-fluid">
                <h1>Lihat Data Lomba</h1>
                <a href="{{ url('/tampil-lomba') }}" class="btn btn-purple col-sm-2 mt-3">
                <i class="fa-solid fa-chevron-left"></i>&ensp;Kembali</a>
                <div class="row">
                    <form id="quickForm" class="col-sm-7">@csrf
                        <div class="card-body">
                            <div class="form-group">
                                <input type="text" name="id_lomba" class="form-control" id="id_lomba" value="{{ $data->id_lomba }}" disabled>
                            </div>
                            <div class="form-group">
                                <input type="text" name="nama_lomba" class="form-control" id="nama_lomba" value="{{ $data->nama_lomba }}" disabled>
                            </div>
                            <div class="form-group">
                                <input type="text" name="tingkat_lomba" class="form-control" id="tingkat_lomba" value="{{ $data->tingkat_lomba }}" disabled>
                            </div>
                            <div class="row mr-0 ml-0">
                                <div class="form-group col-sm-5">
                                    <div class="input-group date" id="reservationdate1" data-target-input="nearest">
                                        <div class="input-group-append" data-target="#reservationdate1"
                                            data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa-solid fa-calendar-days"></i></div>
                                        </div>
                                        <input type="text" name="tanggal_posting" id="tanggal_posting" value="{{ \Carbon\Carbon::parse($data->tanggal_posting)->format('d-m-Y') }}" class="form-control datetimepicker-input" data-target="#reservationdate1" disabled/>
                                    </div>
                                </div>
                                <div class="form-group col-sm-6 offset-sm-1">
                                    <div class="input-group date" id="reservationdate2" data-target-input="nearest">
                                        <div class="input-group-append" data-target="#reservationdate2"
                                            data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa-solid fa-calendar-days"></i></div>
                                        </div>
                                        <input type="text" name="tanggal_berakhir" id="tanggal_berakhir" value="{{ \Carbon\Carbon::parse($data->tanggal_berakhir)->format('d-m-Y') }}" class="form-control datetimepicker-input" data-target="#reservationdate2" disabled />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="deskripsi" id="deskripsi" rows="5" disabled placeholder="{{$data->deskripsi}}"></textarea>
                            </div>
                        </div>
                    </form>
                    <div class="col-sm-5 pt-3">@csrf
                        <img src="{{ asset('images/' . $data->foto) }}" class="img-thumbnail" width="auto" />
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
