@extends('layouts.app')
@section('title') Events @endsection

@section('content')
    <div class="container">
        <h1 class="page-header font-weight-light text-center">Events</h1>
        <table class="table">
            <thead class="thead-light">
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Venue</th>
                <th>Date</th>
                <th>Ticket Price</th>
                <th>Ticket Sold</th>
            </tr>
            </thead>
            <tbody>
            @foreach($events as $event)
                <tr>
                    <td>{!! $event->id !!}</td>
                    <td><a href="{!! url('admin/event/' . $event->id) !!}">{!! $event->title !!}</a></td>
                    <td>{!! $event->venue !!}</td>
                    <td>{!! $event->starts_at !!}</td>
                    <td>{!! $event->ticket_price !!}</td>
                    <td><a href="{!! url('admin/event/' . $event->id . '/tickets') !!}" class="btn btn-info"> {!! $event->tickets->count() !!} </a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
