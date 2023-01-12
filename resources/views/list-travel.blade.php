@extends('layouts.user')

@section('content')
    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Travel Plan</li>
        </ol>
    </nav>
    <section class="section">
        <div class="row" id="basic-table">
            <div class="col-12 col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">List Plan Travel</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <div class="row">

                                @if(count($listTravel) == 0)
                                    <div class="alert alert-light">
                                        Belum ada plan
                                    </div>
                                @endif
                                @foreach($listTravel as $list)
                                <div class="col-md-4 my-4">
                                    <img class="card-img-top img-fluid" src="{{ asset('banner1.jpg') }}" alt="Card image cap" height="100%"/>
                                </div>
                                <div class="col-md-8  my-4">
                                    <h4 class="card-title text-capitalize text-secondary">{{ $list->place->name }}</h4>
                                    <h4 class="card-title">Rp. {{ $list->place->price }} / <small class="fw-normal text-sm">{{ $list->place->unit }}</small></h4>
                                    <p class="text-sm m-0 p-0 mb-1" style="font-size: 11px"><i class="bi bi-geo-alt text-danger"></i>  {{ $list->place->location }}</p>
                                    <p class="text-sm m-0 p-0 d-flex" style="font-size: 11px">Distance : 12 Km</p>

                                    {{--                                    @foreach($place->categories as $category)--}}
{{--                                        <span class="badge bg-secondary text-sm" style="font-size: 10px"># {{ $category->name }}</span>--}}
{{--                                    @endforeach--}}
                                </div>
                                @endforeach
                                    <hr>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="card">
                    <div class="card-content">
                        <div class="card-header">
                            <h4 class="card-title">Estimasi</h4>
                        </div>
                        <div class="card-body">
                            <div class="list-group">
                                <span class="list-group-item">
                                    Biaya Transposrtasi <br>
                                    <p class="fw-bold">Rp. {{ number_format($biayaTransport) }}</p>
                                </span>
                                <span class="list-group-item">
                                    Biaya Wisata <br>
                                    <p class="fw-bold">Rp. {{ number_format($biayaWisata) }}</p>
                                </span>

                                <span class="list-group-item fw-bold">
                                    Total <br>
                                    <p class="fw-bold">Rp. {{ number_format($total) }}</p>
                                </span>
                                <a href="https://maps.google.com" class="btn btn-success btn-block my-3">Lihat Jalur Perjalan</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
