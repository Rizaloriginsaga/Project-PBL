@extends('layout.master')
@section('content')
    <div class="container-fluid pt-3 pl-4">
        <h3 class="font-weight-bold">Edit Profil</h3>
        <a href="{{ URL::previous() }}" class="btn px-3 bg-purple mb-5"><i
                class="fa-solid fa-angle-left fa-lg mr-2"></i>Kembali</a>
        <div class="row justify-content-between">
            <div class="col-lg-7 col-sm-12">
                <form class="mx-3" action="{{ route('edit_profile') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group py-2">
                        <input class="form-control px-3 py-4 @error('username') is-invalid @enderror" id="username"
                            name="username" type="text" placeholder="username"
                            value="{{ old('username', $data->username) }}" />
                        @if ($errors->has('username'))
                            <span class="error text-danger">{{ $errors->first('username') }}</span>
                        @endif
                    </div>
                    <div class="form-group py-2">
                        <input class="form-control px-3 py-4 @error('nama_lengkap') is-invalid @enderror" id="nama_lengkap"
                            name="nama_lengkap" type="text" placeholder="Nama Lengkap"
                            value="{{ old('nama_lengkap', $data->nama_lengkap) }}" />
                        @if ($errors->has('nama_lengkap'))
                            <span class="error text-danger">{{ $errors->first('nama_lengkap') }}</span>
                        @endif
                    </div>
                    <div class="form-group py-2">
                        <input type="date" class="form-control px-3 py-4 @error('tanggal_lahir') is-invalid @enderror"
                            name="tanggal_lahir" value="{{ old('tanggal_lahir', $data->tanggal_lahir) }}">
                        @if ($errors->has('tanggal_lahir'))
                            <span class="error text-danger">{{ $errors->first('tanggal_lahir') }}</span>
                        @endif
                    </div>
                    <div class="form-group py-2">
                        <input class="form-control px-3 py-4 @error('password') is-invalid @enderror" id="inputPassword"
                            type="password" name="password" placeholder="Password" />
                        @if ($errors->has('password'))
                            <span class="error text-danger">{{ $errors->first('password') }}</span>
                        @endif
                    </div>
                    <div class="form-group py-2">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input py-4 @error('foto_profile') is-invalid @enderror"
                                name="foto_profile" id="foto_profile">
                            <label class="custom-file-label text-muted" for="foto_profile" data-browse="Upload">Foto
                                Profile</label>
                        </div>
                        @if ($errors->has('foto_profile'))
                            <span class="error text-danger">{{ $errors->first('foto_profile') }}</span>
                        @endif
                    </div>

                    <div class="form-group mt-4 mb-0">
                        <button class="btn px-3 bg-purple" type="submit">Simpan</button>
                    </div>
                </form>
            </div>
            <div class="col-lg-4 justify-align-right">
                <img style="height: 300px; width: 300px" class="img-cover"
                    src="{{ asset('assets/foto-profile/' . $data->foto) }}" alt="Foto Profile" id="foto">
            </div>
        </div>
    </div>
    <script language="javascript">
        document.getElementById('foto_profile').addEventListener('change', function(e) {
            var file = e.target.files[0];
            var reader = new FileReader();
            reader.onload = function(e) {
                var image = document.getElementById('foto');
                image.src = e.target.result;
            };
            reader.readAsDataURL(file);
        });
    </script>
@endsection
