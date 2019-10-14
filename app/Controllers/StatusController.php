<?php
namespace App\Controller;
use Httpful\Request;
use Josantonius\Session\Session;
use Carbon\Carbon;

class StatusController extends PropertyController {
    public static function index($request) {
        Session::destroy('user');
        Session::destroy('isLogged');
            if(isset(Session::get('bookings')->code) && !empty(Session::get('bookings')->home)) {
                if(Session::get('booking')->code == $request->code) {
                    $booking = Session::get('booking');
                } else {
                    Session::destroy();
                    return view('refreshpage');
                }
            } else {
                $booking = json_decode(Request::get(app_token($request->code, 'status'))->send());
            }
            if($booking->status ==! false) {
                Session::set('booking', $booking);
                $booking = Session::get('booking');
                $home = $booking->home;
                //unset($booking->home);
                return view('tripadvisor/status', compact('booking', 'home'));
            } else {
                return view('errorpage', ['response' => errorpage(418)]);
            }
        
    }
}