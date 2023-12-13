@extends('layout.master')

@section('title', 'Aplikasi Laravel')

@section('content')
<div class="p-3">
        <div class="content-header">
            <div class="container-fluid">
                <h3>Data Kelola Lomba</h3>
                <div class="row mt-3">
                    <div class="form-group col-sm-3">
                        <label>Tingkat Lomba</label>
                        <select class="form-control" style="width: 100%;" id="tingkatLomba">
                            <option selected="selected">Semua</option>
                            <option>Kota</option>
                            <option>Wilker</option>
                            <option>Provinsi</option>
                            <option>Nasional</option>
                            <option>Internasional</option>
                        </select>
                    </div>
                    <div class="form-group col-sm-3">
                        <label>Tanggal Lomba</label>
                        <div class="input-group date" id="reservationdate" data-target-input="nearest">
                            <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa-solid fa-calendar-days"></i></div>
                            </div>
                            <input type="text" class="form-control datetimepicker-input" id="datePicker"
                                data-target="#reservationdate" />
                        </div>
                    </div>
                    <div class="form-group col-sm-2 offset-sm-4 mt-4">
                        <a href="{{ route('excel_lomba') }}" class="btn btn-block btn-danger"><i
                                class="fa-solid fa-file-excel"></i>&ensp;Export Excel</a>
                    </div>
                </div>
                <table class="table table-bordered table-striped" id="tableLomba">
                    <thead>
                        <tr>
                            <th style="width:1%" class="bg-danger text-white">No.</th>
                            <th style="width:5%" class="bg-danger text-white">ID Lomba</th>
                            <th style="width:5%" class="bg-danger text-white">Nama Lomba</th>
                            <th style="width:5%" class="bg-danger text-white">Tingkat Lomba</th>
                            <th style="width:5%" class="bg-danger text-white">Tanggal Posting</th>
                            <th style="width:5%" class="bg-danger text-white">Tanggal Berakhir</th>
                            <th style="width:5%" class="bg-danger text-white">Deskripsi</th>
                            <th style="width:5%" class="bg-danger text-white">Foto</th>
                            <th style="width:5%" class="bg-danger text-white">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataLomba as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->id_lomba }}</td>
                                <td>{{ $data->nama_lomba }}</td>
                                <td>{{ $data->tingkat_lomba }}</td>
                                <td>{{ $data->tanggal_posting }}</td>
                                <td>{{ $data->tanggal_berakhir }}</td>
                                <td>{{ $data->deskripsi }}</td>
                                <td>
                                    @if ($data->foto)
                                        <img src="{{ asset('images/' . $data->foto) }}" alt="Lomba Image" style="max-width: 100px;">
                                    @else
                                        No Image
                                    @endif
                                </td>
                                <td>
                                    <form action="{{ route('lomba.delete', $data->id_lomba) }}" method="post" class="row">
                                    @csrf
                                        <div class="col-sm-4 mt-2">
                                            <a href="{{ route('lomba.edit', $data->id_lomba) }}" class = "btn btn-warning"><i
                                                    class="fa-solid fa-pen"></i></a>
                                        </div>
                                        <div class="col-sm-4 mt-2">
                                            <a href="{{ route('lomba.read', $data->id_lomba) }}" class = "btn btn-warning"><i
                                                    class="fa-solid fa-list-check"></i></a>
                                        </div>
                                        <div class="col-sm-4 mt-2">
                                            <button class = "btn btn-warning"><i
                                                    class="fa-solid fa-trash-can "></i></button>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection