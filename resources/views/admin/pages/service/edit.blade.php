@extends('admin.layout')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Add Service</h4>

                    <form action="{{ Route('service.update', [$service->id]) }}" method="post">
                        @csrf
                        <div class="mb-3 row">
                            <label for="name" class="col-md-1 col-form-label">Title</label>
                            <div class="col-md-11">
                                <input class="form-control" placeholder="Title" name="name" value="{{ old('name', $service->name)}}" type="text"
                                    id="name">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="name" class="col-md-1 col-form-label">Price</label>
                            <div class="col-md-11">
                                <input class="form-control" placeholder="Price" name="price" value="{{ old('price', $service->price) }}" type="text"
                                    id="name">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <div class="row">
                                <label for="name" class="col-md-1 col-form-label"></label>
                                <div class="col-md-11">

                                    <h3>Options</h3>
                                </div>
                            </div>

                        </div>
                        <div class="mb-3 row" id="description">
                            @foreach ($service->service_values as $value)
                                <div class="mb-3 row">
                                    <label for="description" class="col-md-1 col-form-label"></label>
                                    <div class="col-md-11">
                                        <textarea class="form-control" placeholder="Description" name="description[]" type="text" id="description">{{ $value->description }}</textarea>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                        <div class="mb-3 row">
                            <div class="row">
                                <label for="name" class="col-md-1 col-form-label"></label>
                                <div class="col-md-11">
                                    <button onclick="handleAddPrice(event)" class="btn btn-success d-inline">Add</button>
                                </div>
                            </div>

                        </div>

                        <br>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </form>

                </div>
            </div>
        </div> <!-- end col -->
    </div>
    <script>
        function handleAddPrice(e) {
            e.preventDefault();
            const html = `<div class="mb-3 row">
                                <label for="description" class="col-md-1 col-form-label"></label>
                                <div class="col-md-11">
                                    <div class="d-flex gap-1 align-items-center">
                                      <textarea class="form-control" placeholder="Description" name="description[]" type="text" id="description"></textarea>
                                      <button type="button" onclick="handleDelete(event)" class="btn btn-danger">Delete</button>
                                    </div>
                                </div>
                            </div>`
            const description = document.getElementById('description')
            description.innerHTML += html
        }

        function handleDelete(e) {
            e.target.parentElement.parentElement.parentElement.remove();
        }
    </script>
@endsection
