@extends('layout.master')
@section('content')
    <div class="container pt-5">
    @if (Auth::check() && Auth::user()->role == 'admin')
        <div class="row px-2 mb-5">
            <div class="rounded col-5 p-3" style="background-color: #CCACFE">
                <div class="container row">
                    <i class="fa-solid fa-user" style="color: #ffffff;font-size: 75px"></i>
                    <div class="px-5">
                        <h5 class="text-white text-bold">Total Lomba</h5 class="text-white">
                        <h3 class="text-white text-bold">{{$lomba}}</h3>
                    </div>
                </div>
            </div>
            <div class="rounded col-5 offset-2 p-3" style="background-color: #CCACFE">
                <div class="container row">
                    <i class="fa-solid fa-award" style="color: #ffffff;font-size: 75px"></i>
                    <div class="px-5">
                        <h5 class="text-white text-bold">Total Mahasiswa Berprestasi</h5>
                        <h3 class="text-white text-bold">{{$mahasiswa}}</h3>
                    </div>
                </div>
            </div>
        </div>
    @endif
        <div class="rounded" style="background-image: linear-gradient(99deg, #925FE2 53.12%, #DFCFF7 155.43%);">
            <div class="container">
                <div class="row mx-3">
                    <div class="col-sm-12 col-md-10 col-lg-8">
                        <p class="text-white mt-3">November 9, 2023</p>
                        <h2 class="text-white font-weight-bold">Selamat Datang, {{ Auth::user()->nama_lengkap }}</h2>
                    </div>
                    <div class="col-lg-4">
                        <img class="float-left img-fluid" src="{{ asset('assets/img/orang.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
