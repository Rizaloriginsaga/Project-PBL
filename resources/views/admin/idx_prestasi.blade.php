@extends('layout.master')

@section('content')
    <div class="p-3">
        <div class="content-header">
            <div class="container-fluid">
                <h1>Data Kelola Prestasi</h1>
                <form action="{{ route('prestasi') }}" method="get">
                    <div class="row mt-3">
                        <div class="form-group col-sm-3">
                            <label>Tingkat Prestasi</label>
                            <select class="form-control" style="width: 100%;" id="tingkatPrestasi">
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
                            <a href="{{ route('prestasi') }}" class="btn btn-red ml-2">Reset Filter</a>
                        </div>
                        <div class="form-group col-sm-3 d-flex justify-content-end align-items-end">
                            <a href="{{ route('excel_prestasi') }}" class="btn btn-danger ">
                            <i class="fa-solid fa-file-excel"></i>&ensp;Export Excel</a>
                        </div>
                    </div>
                </form>
                <hr>
                @if(session('success'))
                    <div class="row justify-content-center mt-3 position-absolute-container">
                        <div class="col-md-4 position-absolute">
                            <div class="alert alert-success bg-purple" id="successMessage">
                                {{ session('success') }}
                            </div>
                        </div>
                    </div>
                @endif
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
