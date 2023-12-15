@extends('layout.master')

@section('content')
    <div class="p-3">
        <div class="content-header">
            <div class="container-fluid">
                <h1>Data Kelola Prestasi</h1>
                <div class="row mt-3">
                    <div class="form-group col-sm-3">
                        <label>Tingkat Prestasi</label>
                        <select class="form-control" style="width: 100%;" id="tingkatPrestasi">
                            <option selected="selected">Semua</option>
                            <option>Kota</option>
                            <option>Wilker</option>
                            <option>Provinsi</option>
                            <option>Nasional</option>
                            <option>Internasional</option>
                        </select>
                    </div>
                    <div class="form-group col-sm-3">
                        <label>Tanggal Prestasi</label>
                        <div class="input-group date" id="reservationdate" data-target-input="nearest">
                            <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa-solid fa-calendar-days"></i></div>
                            </div>
                            <input type="text" class="form-control datetimepicker-input" id="datePicker"
                                data-target="#reservationdate" />
                        </div>
                    </div>
                    <div class="form-group col-sm-2 offset-sm-4 mt-4">
                        <a href="{{ route('excel_prestasi') }}" class="btn btn-block btn-danger"><i
                                class="fa-solid fa-file-excel"></i>&ensp;Export Excel</a>
                    </div>
                </div>
                <!--  -->
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th style="width:1%" class="bg-danger text-white">No.</th>
                            <th style="width:5%" class="bg-danger text-white">Id Prestasi</th>
                            <th style="width:5%" class="bg-danger text-white">NIM</th>
                            <th style="width:5%" class="bg-danger text-white">Nama Mhs</th>
                            <th style="width:5%" class="bg-danger text-white">Nama Prestasi</th>
                            <th style="width:5%" class="bg-danger text-white">Dokumen</th>
                            <th style="width:5%" class="bg-danger text-white">Tingkat Prestasi</th>
                            <th style="width:5%" class="bg-danger text-white">Tanggal Pengeluaran</th>
                            <th style="width:5%" class="bg-danger text-white">Tahun Angkatan</th>
                            <th style="width:5%" class="bg-danger text-white">Jenis Sertifikat</th>
                            <th style="width:5%" class="bg-danger text-white">Status Verifikasi</th>
                            <th style="width:10%" class="bg-danger text-white">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataPrestasi as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->id_prestasi }}</td>
                                <td>{{ $data->nim }}</td>
                                <td>{{ $data->mahasiswa->nama }}</td>
                                <td>{{ $data->nama_prestasi }}</td>
                                <td>{{ $data->dokumen }}</td>
                                <td>{{ $data->tingkat_prestasi }}</td>
                                <td>{{ $data->tahun_pengeluaran }}</td>
                                <td>{{ $data->mahasiswa->tahun_angkatan }}</td>
                                <td>{{ $data->jenis_sertifikat }}</td>
                                <td>
                                    @if ($data->status_verifikasi == 1)
                                        Terverifikasi
                                    @else
                                        Belum terverifikasi
                                    @endif
                                </td>
                                <td>
                                    <form action="{{ route('delete_prestasi', $data->id) }}" method="post" class="row">
                                        @csrf
                                        <div class="col mt-2">
                                            <a href="{{ route('edit_prestasi', $data->id) }}" class = "btn btn-warning"><i
                                                    class="fa-solid fa-pen"></i></a>
                                        </div>
                                        <div class="col mt-2">
                                            <a href="{{ route('verify_prestasi', $data->id) }}"
                                                class = "btn btn-warning"><i class="fa-solid fa-file-circle-check"></i></a>
                                        </div>
                                        <div class="col mt-2">
                                            <a href="{{ route('view_prestasi', $data->id) }}" class = "btn btn-warning"><i
                                                    class="fa-solid fa-list-check"></i></a>
                                        </div>
                                        <div class="col mt-2">
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
