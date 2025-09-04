@extends('admin.layout')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Payment Configuration</h4>
                    <br>
                    <form action="{{ Route('payment.save') }}" method="post">
                        @csrf
                        <div class="mb-3 row">
                            <label for="username" class="col-md-1 col-form-label">Username</label>
                            <div class="col-md-11">
                                <input class="form-control" value="{{ old('username', $paymentData?->username) }}"
                                    placeholder="Username" name="username" type="text" id="username">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="password" class="col-md-1 col-form-label">Password</label>
                            <div class="col-md-11">
                                <input class="form-control" value="{{ old('password', $paymentData?->password) }}"
                                    placeholder="Password" name="password" type="text" id="password">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="app_key" class="col-md-1 col-form-label">App Key</label>
                            <div class="col-md-11">
                                <input class="form-control" value="{{ old('app_key', $paymentData?->app_key) }}"
                                    placeholder="App Key" name="app_key" type="text" id="app_key">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="secret_key" class="col-md-1 col-form-label">Secret Key</label>
                            <div class="col-md-11">
                                <input class="form-control" value="{{ old('secret_key', $paymentData?->secret_key) }}"
                                    placeholder="Secret Key" name="secret_key" type="text" id="secret_key">
                            </div>
                        </div>


                        <br>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </form>

                </div>
            </div>
        </div> <!-- end col -->
    </div>
@endsection
