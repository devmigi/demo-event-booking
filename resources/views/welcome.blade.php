@extends('layouts.front')
@section('title') Latitude Event Registrations @endsection

@section('content')
    <div class="container">
        <h1 class="page-header font-weight-light text-center">
            Events
        </h1>

        <div>
            <div class="row">

                @foreach($events as $event)
                    <div class="col-md-6 mb-3">
                        <div class="card text-center">
                            <div class="card-header">
                                {!! $event->venue !!}
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">{!! $event->title !!}</h5>
                                <p class="card-text">Entry Fee: ₹{!! $event->ticket_price !!}</p>
                                <a href="{!! url('event/' . $event->id) !!}" class="btn btn-primary">Book Tickets</a>
                            </div>

                        </div>
                        <br>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
@endsection
