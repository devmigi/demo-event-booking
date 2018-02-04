@extends('layouts.app')
@section('title') Ticket: {{ $ticket->registration_no  }} @endsection

@section('content')
    <div class="container">
        <h1 class="page-header font-weight-light text-center">Ticket <code style="text-transform: capitalize">{!! $ticket->registration_no !!}</code> | {!! $ticket->event->title !!}</h1>

        <div class="card">
            <div class="card-body bg-light">

                <div class="row justify-content-center" style="line-height: 28px">
                    <div class="col-6">
                        <div class="row justify-content-center">
                            <div class="col-6 text-right">  <strong>Event</strong> : </div>
                            <div class="col-6"> <strong>{!! $ticket->event->title !!}</strong> </div>
                            <br><br>
                        </div>

                        <div class="row justify-content-center">
                            <div class="col-6 text-right">  Name : </div>
                            <div class="col-6"> {!! $ticket->user->name !!} </div>
                        </div>

                        <div class="row justify-content-center">
                            <div class="col-6 text-right">  Email : </div>
                            <div class="col-6"> {!! $ticket->user->email !!} </div>
                        </div>

                        <div class="row justify-content-center">
                            <div class="col-6 text-right">  Mobile : </div>
                            <div class="col-6"> {!! $ticket->user->mobile !!} </div>
                        </div>

                        <div class="row justify-content-center">
                            <div class="col-6 text-right">  Purchased : </div>
                            <div class="col-6"> {!! $ticket->created_at !!} </div>
                        </div>

                        <div class="row justify-content-center">
                            <div class="col-6 text-right">  Type : </div>
                            <div class="col-6"> {!! $ticket->registration_type !!} </div>
                        </div>

                        <div class="row justify-content-center">
                            <div class="col-6 text-right">  Qty. : </div>
                            <div class="col-6"> {!! $ticket->tickets_count !!} </div>
                        </div>
                    </div>


                    <div class="col-3">
                        <img src="{!! asset('storage/' . $ticket->id_card_url) !!}" class="img-responsive">
                    </div>

                </div>


            </div>
        </div>


    </div>
@endsection
