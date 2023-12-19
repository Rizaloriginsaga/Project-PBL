@extends('layout.master')

@push('styles')
    <style>
        .btn-back{
            background-color: #925FE2;
            color: white;
        }
        .detail-wrapper{
            background-color: #925FE2;
        }
    </style>
@endpush

@section('content')
    <div class="container py-5">
        <h1 class="title mb-5">Detail Informasi Lomba</h1>
        
        <a class="btn btn-back btn-lg mb-5" href="{{ url()->previous() }}">
            <i class="fa fa-chevron-left" aria-hidden="true"></i>
            <span class="ml-2">Kembali</span>
        </a>

        <div class="detail-wrapper p-5">
            <img src="{{ asset('images/' . $lombaDetail->foto) }}" style="width: 40%" >

            <div class="title pt-3">
                <h2 style="color: white;text-transform: uppercase">{{ $lombaDetail->nama_lomba }}</h2>
            </div>
            <div class="desc">
                <p style="color: white">
                    {{ $lombaDetail->deskripsi }}
                </p>
                <p style="color: white">
                    Tingkat Lomba : {{ $lombaDetail->tingkat_lomba }}
                </p>
            </div>
        </div>

    </div>
@endsection
