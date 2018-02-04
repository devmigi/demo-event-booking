<?php

namespace App\Http\Controllers\Admin;


use App\Event;
use App\EventUser;
use App\Http\Controllers\Controller;

class EventController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * show the list of events
     */
    public function all(){

        $events = Event::with('tickets.user')->paginate(10);
        // dd($events->toArray());

        return view('admin.event.list', ['events'=> $events]);
    }




    /**
     * Show the details of single event (with registrations)
     *
     * @param $eventId
     */
    public function show($eventId){

        $event = Event::where('id', $eventId)->with('tickets.user')->first();
        // dd($event->toArray());

        return view('admin.event.detail', ['event'=> $event]);

    }



    /**
     * show the ticket detail with id
     */
    public function tickets($eventId){

        $event = Event::where('id', $eventId)->with('tickets.user')->first();
        // dd($ticket->toArray());

        return view('admin.event.tickets', ['event'=> $event]);
    }



}
