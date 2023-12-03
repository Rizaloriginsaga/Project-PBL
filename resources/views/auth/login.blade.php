@extends('layout.master')
@section('content')
    <div class="bg-purple">
        <div class="container text-dark">
            <div class="row h-100 justify-content-center align-items-center">
                <div class="col-lg-5">
                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                        {{-- Error Alert --}}
                        @if (session('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('error') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <div class="card-body">
                            <div class="row justify-content-center">
                                <img src="{{ asset('assets/img/logo.png') }}" class="img-responsive img-body">
                                <h1 class="align-self-center ml-2">PRESMIPOLI</h1>
                            </div>
                            <p class="mx-5 mt-5">Buat kamu yang sudah terdaftar, silahkan masuk dengan akunmu</p>
                            <hr style="height:3px;border:none;color:#606060;background-color:#606060;">
                            <form class="mx-3" action="{{ url('login') }}" method="POST">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    @error('login_gagal')
                                        <div class="mx-3 alert alert-danger alert-dismissible fade show text-white"
                                            role="alert">
                                            <span class="alert-inner--text">
                                                {{ $message }}</span>
                                            <button type="button" class="close text-white" data-dismiss="alert"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    @enderror
                                    <label class="font-weight-normal mb-1" for="username">Username</label>
                                    <input class="form-control px-3 py-4" id="username" name="username" type="text"
                                        placeholder="NIM/NIK" />
                                    @if ($errors->has('username'))
                                        <span class="error text-danger">{{ $errors->first('username') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-normal mb-1" for="inputPassword">Password</label>
                                    <input class="form-control px-3 py-4" id="inputPassword" type="password" name="password"
                                        placeholder="Password" />
                                    @if ($errors->has('password'))
                                        <span class="error text-danger">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>
                                <div class="row justify-content-between">
                                    <div class="col">
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox">
                                                <input class="custom-control-input" id="ingatSaya" type="checkbox" />
                                                <label class="custom-control-label font-weight-normal" for="ingatSaya">Ingat
                                                    Saya</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col text-right">
                                        <a class="font-weight-light" href="#">Lupa Sandi ?</a>
                                    </div>
                                </div>
                                <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                    <button class="btn w-100 btn-primary btn-block btn-login btn-info"
                                        type="submit">Login</button>
                                </div>
                            </form>
                            <div class="text-center">
                                <p class="font-weight-light">Belum punya akun? Silahkan <a
                                        href="{{ route('register') }}">register</a>
                                    terlebih dahulu</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
