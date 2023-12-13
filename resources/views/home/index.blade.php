@extends('layout.master')
@section('content')
    <div class="container pt-5">
        <div class="" style="background-image: linear-gradient(99deg, #925FE2 53.12%, #DFCFF7 155.43%);">
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
