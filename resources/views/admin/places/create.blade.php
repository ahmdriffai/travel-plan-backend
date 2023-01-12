@extends('layouts.admin')

@section('content')
    <!-- Basic Tables start -->
    <section class="section">
        <div class="row" id="basic-table">
            <div class="col-12 col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Add Place</h4>
                    </div>
                    {!! Form::open(['route' => 'admin.places.store', 'method' => 'post']) !!}
                    <div class="card-content">
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group">
                                    {!! Form::label('name', 'Place Name') !!}
                                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('location', 'Location') !!}
                                    <small class="text-muted"><i>look on <a href="https://maps.google.com" target="_blank" class="link-primary fw-bold">google maps</a> to find location,</i></small>
                                    {!! Form::text('location', null, ['class' => 'form-control']) !!}
                                </div>

                                <div class="form-group">
                                    {!! Form::label('link_map', 'Map') !!}
                                    <small class="text-muted"><i>Lihat panduan <a href="https://www.oketheme.com/cara-mendapatkan-kode-embed-google-maps.html" target="_blank" class="link-primary fw-bold">disini.</a> untuk mengisi link map  <span class="text-danger">Hanya link nya saja</span></i></small>
                                    {!! Form::text('link_map', null, ['class' => 'form-control', 'placeholder' => 'https://https://www.google.com/maps/embed?pb=xxx']) !!}
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('price', 'Price') !!}
                                        <div class="input-group">
                                            <span class="input-group-text">Rp</span>
                                            {!! Form::text('price', null, ['class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('unit', 'Unit') !!}
                                        <small class="text-muted">eg.<i>/kamar, tiket, etc.</i></small>
                                        {!! Form::text('unit', null, ['class' => 'form-control']) !!}
                                    </div>
                                </div>

                                <div class="form-group mt-2">
                                    {!! Form::label('summary', 'Summary') !!}
                                    <textarea name="summary" class="default" cols="30" rows="10">{{ old('summary') ?? '' }}</textarea>
                                </div>

                                <div class="form-group mt-2">
                                    {!! Form::label('description', 'Deskripsion') !!}
                                    <textarea name="description" class="default" cols="30" rows="10">{{ old('description') ?? '' }}</textarea>
                                </div>

                                <div class="form-group">
                                    {!! Form::label('category', 'Category') !!}
                                    <select name="categories[]" class="choices form-select multiple-remove" multiple="multiple">
                                        <optgroup label="Kategori">
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}" @if(in_array($category->id, old('categories') ?? [])) selected @endif>{{ $category->name }}</option>
                                            @endforeach
                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                            {!! Form::submit('Add', ['class' => ['btn', 'btn-primary']]) !!}
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>

        </div>
    </section>
    <!-- Basic Tables end -->
@endsection

@section('script')
    <script src="{{asset('assets/extensions/tinymce/tinymce.min.js')}}"></script>
    <script src="{{asset('assets/js/pages/tinymce.js')}}"></script>
    <script src="{{asset('assets/extensions/choices.js/public/assets/scripts/choices.js')}}"></script>
    <script src="{{asset('assets/js/pages/form-element-select.js')}}"></script>
@endsection
@section('style')
    <link rel="stylesheet" href="{{asset('assets/extensions/choices.js/public/assets/styles/choices.css')}}">
@endsection
