<div class="col-12 col-md-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">List Places</h4>
        </div>
        <div class="card-content">
            <div class="mx-4 d-flex justify-content-between">
                <a class="btn btn-primary">Add Place</a>
                {!! Form::open(['method' => 'get']) !!}
                    {!! Form::text('search', $_GET['search'] ?? '', ['class' => 'form-control', 'placeholder' => 'Search ..']) !!}
                {!! Form::close() !!}
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-lg">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Location</th>
                            <th>Categories</th>
                            <th>Summary</th>
                            <th>Price</th>
                            <th>Picture</th>
                            <th>Rating</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($places) == 0)
                            <tr>
                                <td colspan="8" class="text-center">
                                    No matching records found
                                </td>
                            </tr>
                        @endif
                        @php($i = 1)
                        @foreach($places as $place)
                            <tr>
                                <td>{{ $i }}</td>
                                <td>{{ $place->name }}</td>
                                <td>{{ $place->location }}</td>
                                <td>
                                    @foreach($place->categories as $category)
                                        <span class="badge bg-secondary">{{ $category->name }}</span>
                                    @endforeach
                                </td>
                                <td>{!! $place->summary !!} </td>
                                <td class="fw-bold">
                                    Rp. {{ number_format($place->price) }} /
                                    <span class="text-sm">{{ $place->unit }}</span>
                                </td>
                                <td>{{ $place->picture }}</td>
                                <td>{{ $place->rating }}</td>
                                <td class="d-flex">
                                    <a class="btn btn-sm btn-primary me-2">edit</a>
                                    <a class="btn btn-sm btn-danger">delete</a>
                                </td>
                            </tr>
                            @php($i++)
                        @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $places->links() }}
            </div>
        </div>
    </div>
</div>
