@extends('layouts.admin')

@section('content')
    <!-- Basic Tables start -->
    <section class="section">
        <div class="row" id="basic-table">
            @include('admin.categories.list')
            @include('admin.categories.create')
        </div>
    </section>
    <!-- Basic Tables end -->
@endsection
