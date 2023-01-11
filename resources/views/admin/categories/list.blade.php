<div class="col-12 col-md-6">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">List Categories</h4>
        </div>
        <div class="card-content">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-lg">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Category Name</th>
                            <th>Icon</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($i = 1)
                        @foreach($categories as $category)
                            <tr>
                                <td>{{ $i }}</td>
                                <td>{{ $category->name }}</td>
                                <td>-</td>
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
            </div>
        </div>
    </div>
</div>
