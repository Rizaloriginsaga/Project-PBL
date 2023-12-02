@extends('layout.master')
@section('content')
    <div class="bg-purple">
        <div class="container text-dark">
            <div class="row h-100 justify-content-center align-items-center">
                <div class="col-lg-5">
                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                        <div class="card-body">
                            <div class="row justify-content-center">
                                <img src="{{ asset('assets/img/logo.png') }}" class="img-responsive img-body">
                                <h1 class="align-self-center ml-2">PRESMIPOLI</h1>
                            </div>
                            <p class="mx-5 mt-5 text-center">Silahkan isi form register di bawah ini</p>
                            <hr style="height:3px;border:none;color:#606060;background-color:#606060;">
                            <form class="mx-3" action="{{ url('register') }}" method="POST">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label class="font-weight-normal mb-1" for="username">Masukkan username berupa NIM
                                        anda</label>
                                    <input class="form-control px-3 py-4" id="username" name="username" type="text"
                                        placeholder="NIM/NIK" />
                                    @if ($errors->has('username'))
                                        <span class="error text-danger">{{ $errors->first('username') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-normal mb-1" for="inputPassword">Masukkan password baru
                                        anda</label>
                                    <input class="form-control px-3 py-4" id="inputPassword" type="password" name="password"
                                        placeholder="Password" />
                                    @if ($errors->has('password'))
                                        <span class="error text-danger">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-normal mb-1" for="inputKonfirmasiPassword">Konfirmasi password
                                        baru anda</label>
                                    <input class="form-control px-3 py-4" id="inputKonfirmasiPassword" type="password"
                                        name="konfirmasi_password" placeholder="Password" />
                                    @if ($errors->has('konfirmasi_password'))
                                        <span class="error text-danger">{{ $errors->first('konfirmasi_password') }}</span>
                                    @endif
                                </div>

                                <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                    <button class="btn btn-info w-100 btn-block mb-3" type="submit">Register</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
