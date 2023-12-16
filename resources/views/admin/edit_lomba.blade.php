@extends('layout.master')

@section('content')
<div class="  p-3">
    <div class="content-header">
      <div class="container-fluid">
        <h1>Edit Data Prestasi</h1>
        <a href="{{url('/tampil-lomba')}}" class="btn btn-purple col-sm-2 mt-3"><i class="fa-solid fa-chevron-left"></i>&ensp;Kembali</a>
            <form id="quickForm" action="{{route('lomba.update', $data->id)}}" method="post">@csrf
                <div class="col-sm-8 offset-sm-2">
                    <div class="card-body">
                    <div class="form-group">
                        <input type="text" name="id_lomba" class="form-control" id="id_lomba" value="{{$data->id_lomba}}">
                    </div>
                    <div class="form-group">
                        <input type="text" name="nama_lomba" class="form-control" id="nama_lomba" value="{{$data->nama_lomba}}">
                    </div>
                    <div class="form-group">
                        <select class="form-control text-muted" style="width: 100%;" id="tingkat_lomba" name="tingkat_lomba" type="text"> 
                            <option <?php echo ($data->tingkat_lomba === 'Kabupaten') ? 'selected' : ''; ?>>Kabupaten</option>
                            <option <?php echo ($data->tingkat_lomba === 'Provinsi') ? 'selected' : ''; ?>>Provinsi</option>
                            <option <?php echo ($data->tingkat_lomba === 'Nasional') ? 'selected' : ''; ?>>Nasional</option>
                            <option <?php echo ($data->tingkat_lomba === 'Internasional') ? 'selected' : ''; ?>>Internasional</option>
                        </select>
                    </div>
                    <div class="row mr-0 ml-0">
                        <div class="form-group col-sm-5">
                            <div class="input-group date" id="reservationdate1" data-target-input="nearest">
                                <div class="input-group-append" data-target="#reservationdate1"
                                    data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa-solid fa-calendar-days"></i></div>
                                </div>
                                <input type="text" name="tanggal_posting" id="tanggal_posting" value="{{$data->tanggal_posting}}" class="form-control datetimepicker-input"
                                    data-target="#reservationdate1" />
                            </div>
                        </div>
                        <div class="form-group col-sm-6 offset-sm-1">
                            <div class="input-group date" id="reservationdate2" data-target-input="nearest">
                                <div class="input-group-append" data-target="#reservationdate2"
                                    data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa-solid fa-calendar-days"></i></div>
                                </div>
                                <input type="text" name="tanggal_berakhir" id="tanggal_berakhir" value="{{$data->tanggal_berakhir}}" class="form-control datetimepicker-input"
                                    data-target="#reservationdate2" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" name="deskripsi" id="deskripsi" row=5>{{$data->deskripsi}}</textarea>
                    </div>
                    <div class="form-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input"name="dokumen" id="dokumen" value="{{$data->foto}}">
                            <label class="custom-file-label text-muted" for="dokumen" data-browse="Upload">{{$data->foto}}</label>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="row">
                    <button type="submit" class="btn btn-purple offset-sm-3 col-sm-2">Update</button>
                    <a href="{{url('tampil-lomba')}}" class="btn btn-purple offset-sm-2 col-sm-2">Batal</a>
                </div>
            </form>
        </div>
    </div>
  </div>
@endsection