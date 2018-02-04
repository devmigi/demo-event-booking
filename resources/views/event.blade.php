@extends('layouts.front')

@section('content')
<div class="container">

    <h1 class="page-header font-weight-light text-center">Book Tickets | {!! $event->title !!}</h1>

    <div class="card">
        <div class="card-body bg-light">
            <form method="post" enctype="multipart/form-data">

                {!! csrf_field() !!}

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="" value="{!! old('name') !!}" required>
                        <div class="invalid-feedback">
                            Valid first name is required.
                        </div>
                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="email">Email </label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="you@example.com" value="{!! old('email') !!}">
                        <div class="invalid-feedback">
                            Please enter a valid email address.
                        </div>
                    </div>
                    @if ($errors->has('email'))
                        <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                    @endif
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="mobile">Mobile Number</label>
                        <input type="text" class="form-control" name="mobile" id="mobile" placeholder="" value="{!! old('mobile') !!}">
                        <div class="invalid-feedback">
                            Please enter a mobile nnumber.
                        </div>
                        @if ($errors->has('mobile'))
                            <span class="help-block">
                                <strong>{{ $errors->first('mobile') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="type">Registration Type</label>
                        <select class="custom-select d-block w-100" name="type" id="type" required>
                            <option value="">Choose...</option>
                            <option>Self</option>
                            <option>Group</option>
                            <option>Corporate</option>
                            <option>Others</option>
                        </select>
                        <div class="invalid-feedback">
                            Please select a registration type.
                        </div>
                    </div>
                    @if ($errors->has('type'))
                        <span class="help-block">
                                <strong>{{ $errors->first('type') }}</strong>
                            </span>
                    @endif
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="tickets">Number of Tickets</label>
                        <select class="custom-select d-block w-100" name="tickets" id="type" required>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                            <option>9</option>
                            <option>10</option>
                        </select>
                        <div class="invalid-feedback">
                            Please enter a mobile nnumber.
                        </div>
                        @if ($errors->has('tickets'))
                            <span class="help-block">
                                <strong>{{ $errors->first('tickets') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="idcard">ID Card</label>
                        <input type="file" class="form-control" name="idcard" id="idcard" placeholder="" required>
                        <div class="invalid-feedback">
                            Please select a valid image
                        </div>
                        @if ($errors->has('idcard'))
                            <span class="help-block">
                                <strong>{{ $errors->first('idcard') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 text-center">
                        <br>
                        <button class="btn btn-primary btn-lg"> Register </button>
                    </div>
                </div>

            </form>
        </div>

    </div>


</div>
@endsection


@section('page-script')

@endsection