@extends('layout.master')

@section('content')
    <div class="p-3">
        <div class="content-header">
            <div class="container-fluid">
                <h1>Data Kelola Lomba</h1>
                <form action="{{ route('lomba.index') }}" method="get">
                    <div class="row mt-3">
                        <div class="form-group col-sm-3">
                            <label>Tingkat Lomba</label>
                            <select class="form-control" style="width: 100%;" id="tingkatLomba">
                                <option selected="selected">Semua</option>
                                <option>Kabupaten</option>
                                <option>Provinsi</option>
                                <option>Nasional</option>
                                <option>Internasional</option>
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="tanggal">Tanggal:</label>
                                <input type="date" name="tanggal" id="tanggal" class="form-control" value="{{ $tanggal }}">
                            </div>
                        </div>
                        <div class="form-group col-sm-3 d-flex justify-content-start align-items-end">
                            <button type="submit" class="btn btn-purple">Filter</button>
                            <a href="{{ route('lomba.index') }}" class="btn btn-red ml-2">Reset Filter</a>
                        </div>
                        <div class="form-group col-sm-3 d-flex justify-content-end align-items-end">
                            <a href="{{ route('excel_lomba') }}" class="btn btn-danger ">
                            <i class="fa-solid fa-file-excel"></i>&ensp;Export Excel</a>
                        </div>
                    </div>
                </form>
                <!--  -->
                <table id="tableLomba" class="table table-bordered table-striped">
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
                            <th style="width:10%" class="bg-danger text-white">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataLomba as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->id_lomba }}</td>
                                <td>{{ $data->nama_lomba }}</td>
                                <td>{{ $data->tingkat_lomba }}</td>
                                <td>{{ \Carbon\Carbon::parse($data->tanggal_posting)->format('d-m-Y') }}</td>
                                <td>{{ \Carbon\Carbon::parse($data->tanggal_berakhir)->format('d-m-Y') }}</td>
                                <td>{{ $data->deskripsi }}</td>
                                <td>
                                    @if ($data->foto)
                                        <img src="{{ asset('images/' . $data->foto) }}" alt="Lomba Image"
                                            style="max-width: 100px;">
                                    @else
                                        No Image
                                    @endif
                                </td>
                                <td>
                                    <form class="row" action="{{ route('lomba.delete', $data->id) }}" method="post">
                                        @csrf
                                        <div class="col mt-2">
                                            <a href="{{ route('lomba.edit', $data->id) }}" class = "btn btn-warning">
                                            <i class="fa-solid fa-pen"></i></a>
                                        </div>
                                        <div class="col mt-2">
                                            <a href="{{ route('lomba.read', $data->id) }}" class = "btn btn-warning">
                                            <i class="fa-solid fa-list-check"></i></a>
                                        </div>
                                        <div class="col mt-2">
                                            <button class = "btn btn-warning">
                                            <i class="fa-solid fa-trash-can "></i></button>
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
