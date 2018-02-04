@extends('layouts.app')
@section('title') Tickets @endsection

@section('content')
    <div class="container">
        <h1 class="page-header font-weight-light text-center">
            Tickets
            @if($type) | <span style="text-transform: capitalize">{!! $type !!}</span> @endif
        </h1>
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
            @foreach($tickets as $ticket)
                <tr>
                    <td><a href="{!! url('admin/ticket/' . $ticket->registration_no) !!}" style="text-transform: capitalize">{!! $ticket->registration_no !!}</a></td>
                    <td>{!! $ticket->event->title !!}</td>
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
