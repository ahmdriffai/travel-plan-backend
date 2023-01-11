@extends('layouts.user')

@section('content')
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="{{asset('banner1.jpg')}}" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="{{asset('banner1.jpg')}}" class="d-block w-100" alt="...">
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </a>
</div>
<div class="mt-5">
    <h5 class="my-5">Tempat Terpopuler</h5>
    <div class="row">
        @foreach($places as $place)
        <div class="col-sm-12 col-md-6 col-lg-3">
            <a href="">
                <div class="card">
                    <div class="card-content">
                        <img class="card-img-top img-fluid" src="{{ asset('banner1.jpg') }}" alt="Card image cap" width="100%"/>
                        <div class="card-body">
                            <h4 class="card-title text-capitalize">{{ $place->name }}</h4>
                            <p class="text-sm m-0 p-0 mb-1" style="font-size: 11px"><i class="bi bi-geo-alt text-danger"></i>  {{ $place->location }}</p>
                            <p class="card-text text-sm">
                                Jelly-o sesame snaps cheesecake topping. Cupcake fruitcake macaroon donut pastry gummies tiramisu chocolate bar muffin. Dessert bonbon caramels brownie chocolate bar chocolate tart dragée.
                            </p>
                            <div class="d-flex justify-content-between">
                                <p class="text-sm m-0 p-0 d-flex" style="font-size: 11px"><i class="bi bi-star-fill text-warning"> </i> {{ $place->rating }}</p>
                                <p class="text-sm m-0 p-0 d-flex" style="font-size: 11px">Distance : 12 Km</p>
                            </div>

                        </div>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>
@endsection
