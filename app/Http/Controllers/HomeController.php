<?php

namespace App\Http\Controllers;

use App\Event;
use App\EventUser;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Milon\Barcode\DNS1D;
use Milon\Barcode\DNS2D;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::where('active', true)->get();

        return view('welcome', ['events'=> $events]);

    }


    /**
     * Show registration form for an event
     *
     * @return \Illuminate\Http\Response
     */
    public function register($eventId)
    {
        $event = Event::where('id', $eventId)->where('active', true)->first();

        return view('event', ['event'=> $event]);

    }


    /**
     * Save registeration
     *
     * @return \Illuminate\Http\Response
     */
    public function save($eventId)
    {
        request()->validate([
            'name' => 'required|max:55',
            'email' => 'required',
            'mobile' => 'required',
            'type' => 'required',
            'tickets' => 'required',
            'idcard' => 'required|image',
        ]);

        $event = Event::where('id', $eventId)->where('active', true)->first();

        $registrationNo = $this->randomId();

        $user = User::where('email', request('email'))->first();
        if(!$user){
            $user = new User();
            $user->name = request('name');
            $user->email = request('email');
            $user->password = bcrypt(time() . '1234');
            $user->role = 'customer';
            $user->mobile = request('mobile');
            $user->active = true;
            $user->save();
        }

        // store file
        $path = request()->idcard->storeAs('images', $registrationNo . '.jpg');

        $eventUser = new EventUser();
        $eventUser->registration_type = request('type');
        $eventUser->tickets_count = request('tickets');
        $eventUser->registration_no = $registrationNo;
        $eventUser->event_id = $event->id;
        $eventUser->id_card_url = $path;
        $eventUser->user_id = $user->id;
        $eventUser->save();


        return redirect('ticket/'. $eventUser->registration_no)->with('success', 'Registration successful!');

    }


    /**
     * Show ticket details
     *
     * @return \Illuminate\Http\Response
     */
    public function ticket($registrationId)
    {
        $ticket = EventUser::where('registration_no', $registrationId)->with('user', 'event')->first();

        return view('ticket', ['ticket'=> $ticket]);

    }


    /**
     * Show the admin dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {

        $this->middleware('auth');

        $img = 'data:image/png;base64,' . DNS1D::getBarcodePNG("4", "C39+") ;

//        echo '<img src="'.$img.'" alt="barcode"   />';
//
//
//
//        dd();

        $tickets = EventUser::all();
        $selfTicketsCount = $tickets->where('registration_type', 'self')->count();
        $corporateTicketsCount = $tickets->where('registration_type', 'corporate')->count();
        $groupTicketsCount = $tickets->where('registration_type', 'group')->count();
        $othersTicketsCount = $tickets->where('registration_type', 'others')->count();


        return view('admin.home', [
                                    'selfTicketsCount'=> $selfTicketsCount,
                                    'corporateTicketsCount'=> $corporateTicketsCount,
                                    'groupTicketsCount'=> $groupTicketsCount,
                                    'othersTicketsCount'=> $othersTicketsCount,
                                ]);
    }


    /*
     * generate a random string
     */
    public function randomId(){

        $registration_no = str_random(6);

        $validator = \Validator::make(['registration_no'=> $registration_no],['registration_no'=>'unique:event_users,registration_no']);

        if($validator->fails()){
            $this->randomId();
        }

        return $registration_no;
    }
}
