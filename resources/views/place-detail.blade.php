@extends('layouts.user')

@section('content')
    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $place->name }}</li>
        </ol>
    </nav>

    <section class="section">
        <div class="row" id="basic-table">
            <div class="col-12 col-md-7">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="image">
                                        <img class="img-fluid" src="{{ asset('banner1.jpg') }}" alt="Card image cap"/>
                                    </div>
                                    <h3 class="card-title text-capitalize text-secondary mt-3">{{ $place->name }}</h3>
                                    <h4 class="card-title">Rp. {{ number_format($place->price) }} / <small class="fw-normal text-sm">{{ $place->unit }}</small></h4>
                                    <p class="text-sm m-0 p-0 mb-1" style="font-size: 11px"><i class="bi bi-geo-alt text-danger"></i>  {{ $place->location }}</p>
                                    @foreach($place->categories as $category)
                                        <span class="badge bg-secondary text-sm my-3" style="font-size: 10px"># {{ $category->name }}</span>
                                    @endforeach
                                    <h6>Summary</h6>
                                    <p class="card-text text-md">
                                        Jelly-o sesame snaps cheesecake topping. Cupcake fruitcake macaroon donut pastry gummies tiramisu chocolate bar muffin. Dessert bonbon caramels brownie chocolate bar chocolate tart dragée.
                                    </p>
                                    <div class="d-flex justify-content-between mb-3">
                                        <p class="text-sm m-0 p-0 d-flex"><i class="bi bi-star-fill text-warning"> </i> {{ $place->rating }}</p>
                                        <p class="text-sm m-0 p-0 d-flex">Distance : 12 Km</p>
                                    </div>
                                    <div class="d-flex mb-3">
                                        {!! Form::open(['route' => 'list-travel.store', 'method' => 'post' ]) !!}
                                            {{ Form::hidden('user_id', Auth::user()->id) }}
                                            {{ Form::hidden('place_id', $place->id) }}
                                            <button type="submit" class="btn btn-primary me-2">Tambah Plan</button>
                                        {!! Form::close() !!}
                                        <a href="https://www.google.com/maps/dir/Kalibeber,+Wonosobo+Regency,+Central+Java/Telaga+Warna,+Dieng,+Wonosobo+Regency,+Central+Java/@-7.2640088,109.8589699,12z/data=!3m1!4b1!4m13!4m12!1m5!1m1!1s0x2e700a81a968392d:0x95518ac088ff6f1b!2m2!1d109.9035395!2d-7.3240392!1m5!1m1!1s0x2e700cefeafe2475:0xec2dd3197faf5f2a!2m2!1d109.9152778!2d-7.2133333" class="btn btn-outline-primary" target="_blank">Petunjuk Arah</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-5">
                <div class="card">
                    <div class="card-content">
                        <div class="card-header">
                            <h4 class="card-title">Tentang</h4>
                        </div>
                        <div class="card-body">
                            <p>
                                Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.

                                The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Location</h5>
                </div>
                <div class="card-body">
                    <div class="googlemaps">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.218082663188!2d109.89945291420506!3d-7.3293862741165325!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7aa080990cd18d%3A0x8953d7b1e26f6ae5!2sUniversitas%20Sains%20Al-Qur&#39;an%20(UNSIQ)!5e0!3m2!1sen!2sid!4v1673479716958!5m2!1sen!2sid"
                            width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
