<div class="col-12 col-md-6">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Add Category</h4>
        </div>
        <div class="card-content">
            <div class="card-body">
                {!! Form::open(['route' => 'admin.categories.store', 'method' => 'post']) !!}
                    <div class="form-group">
                        {!! Form::label('name', 'Category Name') !!}
                        <small class="text-muted">eg.<i>wisata, penginapan, wisata sejarah, etc</i></small>
                        {!! Form::text('name', null, ['class' => 'form-control']) !!}
                    </div>
                    {!! Form::submit('Add', ['class' => ['btn', 'btn-primary']]) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
