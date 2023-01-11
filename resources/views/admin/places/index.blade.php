@extends('layouts.admin')

@section('content')
    <!-- Basic Tables start -->
    <section class="section">
        <div class="row" id="basic-table">
            @include('admin.places.list')
        </div>
    </section>
    <!-- Basic Tables end -->
@endsection
