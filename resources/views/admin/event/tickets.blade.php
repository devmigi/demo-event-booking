@extends('layouts.app')
@section('title') Tickets | {!! $event->title !!}@endsection

@section('content')
    <div class="container">
        <h1 class="page-header font-weight-light text-center">Tickets | {!! $event->title !!}</h1>
        <table class="table">
            <thead class="thead-light">
            <tr>
                <th>Registration ID</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Type</th>
                <th>No. of Tickets</th>
                <th>Purchased At</th>
            </tr>
            </thead>
            <tbody>
            @foreach($event->tickets as $ticket)
                <tr>
                    <td><a href="{!! url('admin/ticket/' . $ticket->registration_no) !!}">{!! $ticket->registration_no !!}</a></td>
                    <td>{!! $ticket->user->email !!}</td>
                    <td>{!! $ticket->user->mobile !!}</td>
                    <td>{!! $ticket->registration_type !!}</td>
                    <td>{!! $ticket->tickets_count !!}</td>
                    <td>{!! $ticket->created_at !!}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
