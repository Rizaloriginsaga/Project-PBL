@extends('layout.master')

@push('styles')
    <style>
        .lomba-wrapper {
            display: flex;
            flex-direction: column;
        }

        .lomba-card {
            display: flex;
            width: 100%;
            background: linear-gradient(90deg, #9360E2 46.2%, rgba(147, 96, 226, 0.00) 99.64%);
            margin-bottom: 5px;
        }

        .lomba-content{
            width: 60%;
            padding: 2rem;
        }

        .lomba-content{
            width: 60%;
            padding: 2rem;
        }

        .lomba-image{
            width: 40%;
        }

        .lomba-image img{
            width: 100%;
        }

        .iconspan {
            float: right;
            margin-right: 8px;
            margin-top: -25px;
            position: relative;
            z-index: 2;
            color: gainsboro;
        }

        .myButton{
            padding: 10px 40px;
            background-color: white;
            text-align: center;
            background-color: #F8F8F8;
            border-radius: 3px;
            border: 2px solid #E8E8E8;
            color: #925FE2;
        }
    </style>
@endpush

@section('content')
    <div class="container pt-5">

        <div class="search-wrapper">
            <form action="#">
                <div class="form-group row">
                    <label for="" class="col-1 col-form-label">Search</label>
                    <div class="col-3">
                        <input type="text" name="search" id="" class="form-control" value="@if (request()->get('search')){{ request()->get('search') }}@endif">
                        <span class="fas fa-search iconspan"></span>
                    </div>
                </div>
            </form>
        </div>


            <div class="lomba-wrapper mb-5">
                @foreach ($lombaAll as $lomba)
                <div class="lomba-card">
                    <div class="lomba-content">
                        <div class="title">
                            <h3 style="color: white;text-transform: uppercase">
                                {{ $lomba->nama_lomba }}
                            </h3>
                        </div>
                        <div class="desc mb-5">
                            <p style="color: white">
                                {{ $lomba->deskripsi }}
                            </p>
                        </div>
                        <div class="buttons">
                            <a class="myButton" href="{{ route('mahasiswa.lomba.show', $lomba->id) }}">
                                Read More ...
                            </a>
                        </div>
                    </div>
                    <div class="lomba-image">
                        <img src="{{ asset('images/' . $lomba->foto) }}">
                    </div>
                </div>
                @endforeach
            </div>


        </div>
@endsection