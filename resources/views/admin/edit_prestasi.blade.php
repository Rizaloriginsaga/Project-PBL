@extends('layout.master')

@section('content')
<div class="  p-3">
    <div class="content-header">
      <div class="container-fluid">
        <h1>Edit Data Prestasi</h1>
        <a href="{{url('tampil-prestasi')}}" class="btn btn-purple col-sm-2 mt-3"><i class="fa-solid fa-chevron-left"></i>&ensp;Kembali</a>
            <form id="quickForm" action="{{route('update_prestasi',$data->id)}}" method="post">@csrf
                <div class="col-sm-8 offset-sm-2">
                    <div class="card-body">
                        <div class="form-group">
                            <input type="text" name="idPrestasi" class="form-control" id="idPrestasi" value="{{$data->id_prestasi}}">
                        </div>
                        <div class="form-group">
                            <input type="text" name="nim" class="form-control" id="nim" value="{{$data->nim}}">
                        </div>
                        <div class="form-group">
                            <input type="text" name="namaMahasiswa" class="form-control" id="namaMahasiswa" value="{{$data->mahasiswa->nama}}">
                        </div>
                        <div class="form-group">
                            <input type="text" name="namaPrestasi" class="form-control" id="namaPrestasi" value="{{$data->nama_prestasi}}">
                        </div>
                        <div class="form-group">
                            <select class="form-control text-muted" style="width: 100%;" id="tingkatPrestasi" name="tingkatPrestasi" type="text"> 
                                <option <?php echo ($data->tingkat_prestasi === 'Kabupaten') ? 'selected' : ''; ?>>Kabupaten</option>
                                <option <?php echo ($data->tingkat_prestasi === 'Provinsi') ? 'selected' : ''; ?>>Provinsi</option>
                                <option <?php echo ($data->tingkat_prestasi === 'Nasional') ? 'selected' : ''; ?>>Nasional</option>
                                <option <?php echo ($data->tingkat_prestasi === 'Internasional') ? 'selected' : ''; ?>>Internasional</option>
                            </select>
                        </div>
                        <div class="row mr-0 ml-0">
                            <div class="form-group col-sm-5">
                                <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                    <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa-solid fa-calendar-days"></i></div>
                                    </div>
                                    <input type="text" name="tahunPengeluaran" id="tahunPengeluaran" value="{{$data->tahun_pengeluaran}}" class="form-control datetimepicker-input" data-target="#reservationdate"/>
                                </div>                                
                            </div>
                            <div class="form-group date col-sm-6 offset-sm-1">
                                <input type="text" name="tahunAngkatan" class="form-control" id="tahunAngkatan" value="{{$data->mahasiswa->tahun_angkatan}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <select class="form-control text-muted" style="width: 100%;" id="jenisSertifikat" name="jenisSertifikat" type="text">
                                <option <?php echo ($data->jenis_sertifikat === 'Akademik') ? 'selected' : ''; ?>>Akademik</option>
                                <option <?php echo ($data->jenis_sertifikat === 'Non Akademik') ? 'selected' : ''; ?>>Non Akademik</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input"name="dokumen" id="dokumen" value="{{$data->dokumen}}">
                                <label class="custom-file-label text-muted" for="dokumen" data-browse="Upload">{{$data->dokumen}}</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <button type="submit" class="btn btn-purple offset-sm-3 col-sm-2">Update</button>
                    <a href="{{url('tampil-prestasi')}}" class="btn btn-purple offset-sm-2 col-sm-2">Batal</a>
                </div>
            </form>
        </div>
    </div>
  </div>
@endsection