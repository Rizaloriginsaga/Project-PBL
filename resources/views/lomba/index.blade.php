@extends('layout.master')

@section('title', 'Aplikasi Laravel')

@section('content')
    <br>
    <div class="container">
        <h3>Data Kelola Lomba</h3>
        <br>
        <form action="{{ route('lomba.index') }}" method="get">
            <div class="row">
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="tingkat_lomba">Tingkat Lomba:</label>
                        <select name="tingkat_lomba" id="tingkat_lomba" class="form-control">
                            <option value="Semua" @if($tingkatLomba === 'Semua') selected @endif>Semua</option>
                            <option value="Kabupaten" @if($tingkatLomba === 'Kabupaten') selected @endif>Kabupaten</option>
                            <option value="Provinsi" @if($tingkatLomba === 'Provinsi') selected @endif>Provinsi</option>
                            <option value="Nasional" @if($tingkatLomba === 'Nasional') selected @endif>Nasional</option>
                            <option value="Internasional" @if($tingkatLomba === 'Internasional') selected @endif>Internasional</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="tanggal">Tanggal:</label>
                        <input type="date" name="tanggal" id="tanggal" class="form-control" value="{{ $tanggal }}">
                    </div>
                </div>
                <div class="col-md-4 d-flex align-items-end">
    <div class="form-group">
        <button type="submit" class="btn btn-primary mt-4">Filter</button>
        <a href="{{ route('lomba.index') }}" class="btn btn-secondary mt-4 ml-2">Reset Filter</a>
    </div>
</div>
            </div>
        </form>

        <div style="text-align: right;">
            <a href="{{ route('excel') }}" class="btn btn-danger">Export Excel</a>
        </div>

        <hr>
        <br>
        <a href="{{ route('lomba.create') }}" class="btn btn-primary">Tambah Data +</a>
        <br>
        <br>
        <table class="table table-bordered table-striped" id="table-lomba">
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
                <style>
                    table.table-bordered>thead>tr>th,
                    table.table-bordered>tbody>tr>th,
                    table.table-bordered>tfoot>tr>th,
                    table.table-bordered>thead>tr>td,
                    table.table-bordered>tbody>tr>td,
                    table.table-bordered>tfoot>tr>td {
                        border: 1px solid #808080 !important; /* Mengganti warna garis tabel menjadi abu biasa */
                    }
                </style>
            </thead>
            <tbody>
                @foreach ($dataLomba as $data)
                    @php
                        $showRow = ($tingkatLomba === 'Semua' || $data->tingkat_lomba === $tingkatLomba);
                    @endphp
                    <tr @if (!$showRow) style="display: none;" @endif>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $data->id }}</td>
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
                            <form action="{{ route('lomba.delete', $data->id) }}" method="post">
                                @csrf
                                <a href="{{ route('lomba.edit', $data->id) }}" class="btn btn-link p-0" title="Edit">
                                    <img src="{{ asset('images/icons/editdocument_105148.png') }}" alt="Edit Icon"
                                        style="max-width: 20px; margin-right: 10px;">
                                </a>
                                <a href="{{ route('lomba.read', $data->id) }}" class="btn btn-link p-0" title="Read">
                                    <img src="{{ asset('images/icons/disk_file_icon_238381.png') }}" alt="Read Icon"
                                        style="max-width: 20px; margin-right: 10px;">
                                </a>
                                <button class="btn btn-link p-0" type="submit">
                                    <img src="{{ asset('images/icons/delete_4219.png') }}" alt="Delete Icon"
                                        style="max-width: 20px; margin-right: 10px;">
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
