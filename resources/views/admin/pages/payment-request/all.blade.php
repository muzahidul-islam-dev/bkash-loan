@extends('admin.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex gap-2 justify-content-between">
                        <h2 class="card-title">Services</h2>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-striped mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Service Name</th>
                                    <th>Price</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($paymentRequests as $service)
                                    <tr>
                                        <th scope="row">{{ $service->id }}</th>
                                        <td>{{ $service->name }}</td>
                                        <td>{{ $service->price }}</td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <a href="{{ Route('service.edit', [$service->id]) }}"
                                                    class="btn btn-success btn-sm">
                                                    Edit
                                                </a>
                                                <a href="{{ Route('service.delete', [$service->id]) }}"
                                                    class="btn btn-danger btn-sm">
                                                    Delete
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>


    </div>
@endsection
