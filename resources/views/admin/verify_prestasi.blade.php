@extends('layout.master')

@section('content')
<div class="content-wrapper p-3">
    <div class="content-header">
      <div class="container-fluid">
        <h1>Verifikasi Data Prestasi</h1>
        <a href="{{url('tampil-prestasi')}}" class="btn btn-primary col-sm-2 mt-3"><i class="fa-solid fa-chevron-left"></i>&ensp;Kembali</a>
        <!--  -->
          
            <table id="example2" class="table table-bordered">
              <thead>
              <tr>
                  <th style="width:1%" class="btn-danger disabled">No.</th>
                  <th style="width:1%" class="btn-danger disabled">Id Prestasi</th>
                  <th style="width:1%" class="btn-danger disabled">NIM</th>
                  <th style="width:1%" class="btn-danger disabled">Nama Mhs</th>
                  <th style="width:1%" class="btn-danger disabled">Nama Prestasi</th>
                  <th style="width:1%" class="btn-danger disabled">Dokumen</th>
                  <th style="width:1%" class="btn-danger disabled">Tingkat Prestasi</th>
                  <th style="width:1%" class="btn-danger disabled">Tanggal Pengeluaran</th>
                  <th style="width:1%" class="btn-danger disabled">Tahun Angkatan</th>
                  <th style="width:1%" class="btn-danger disabled">Jenis Sertifikat</th>
                  <th style="width:1%" class="btn-danger disabled">Status Verifikasi</th>
                  <th style="width:10%" class="btn-danger disabled">Aksi</th>
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
                          @if($data->status_verifikasi == 1)
                              Terverifikasi
                          @else
                              Belum terverifikasi
                          @endif
                      </td>
                      <td>
                        <div class="row">
                          <form action="{{ url('/verifikasi', $data->id) }}" method="post" class="col-sm-6">@csrf
                            <button type="submit" class="btn btn-warning">Verifikasi</button>
                          </form>
                          <form action="{{ url('/unverifikasi', $data->id) }}" method="post" class="col-sm-6">@csrf
                            <button type="submit" class="btn btn-danger">Unverifikasi</button>
                          </form>
                        </div>
                      </td>
                  </tr>
                  @endforeach
              </tbody>  
            </table>
          </div>
      </div>
    </div>
  </div>
@endsection