<?php

namespace App\Http\Controllers\Admin;


use App\Event;
use App\EventUser;
use App\Http\Controllers\Controller;

class TicketController extends Controller
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
     * list of all tickets sold (event registrations)
     * @param registration type
     */
    public function all($type = null){

        if($type){
            $tickets = EventUser::where('registration_type', $type)->with('event', 'user')->paginate(10);
        }
        else{
            $tickets = EventUser::with('event', 'user')->paginate(10);
        }
        // dd($events->toArray());

        return view('admin.ticket.list', ['tickets'=> $tickets, 'type'=> $type]);
    }



    /**
     * show the ticket detail with id
     */
    public function show($registrationId){

        $ticket = EventUser::where('registration_no', $registrationId)->with('user', 'event')->first();
        // dd($ticket->toArray());

        return view('admin.ticket.detail', ['ticket'=> $ticket]);
    }


}
