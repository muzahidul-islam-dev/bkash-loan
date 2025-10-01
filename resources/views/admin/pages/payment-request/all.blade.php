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
                                    <th>Phone Number</th>
                                    <th>Price</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($paymentRequests as $service)
                                    <tr>
                                        <th scope="row">{{ $service->id }}</th>
                                        <td>{{ $service->service->name }}</td>
                                        <td>{{ $service->phone_number }}</td>
                                        <td>{{ $service->amount }}</td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <button onclick="handleClick('{{ $service->id }}')" class="btn btn-success btn-sm">
                                                    update
                                                </button>
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


        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="" onsubmit="handleSubmit(event)">
                        <div class="modal-body">
                            <div>
                                <label for="payment_url">Payment URL</label>
                                <input type="text" class="form-control" name="payment_url">
                                <input type="hidden" class="form-control" name="id" id="payment_id">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


    </div>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    @push('js')
        <script>
            var myModal = new bootstrap.Modal(document.getElementById('staticBackdrop'), {
                keyboard: false
            })

            function handleClick(id) {
                myModal.show();
                const payment_id = document.getElementById('payment_id')
                payment_id.value = id;
            }

            function handleSubmit(e){
                e.preventDefault();
                const form = e.target;
                const data = {
                    payment_id: form.id.value,
                    payment_url: form.payment_url.value
                }
                axios.post('{{ Route("payment.request.updateURL") }}',data,{
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                }).then(response => {
                    myModal.close();
                });
            }
        </script>
    @endpush
@endsection