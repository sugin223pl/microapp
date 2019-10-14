<?php
namespace App\Controller;
use Httpful\Request;
use Josantonius\Session\Session;
use Lazer\Classes\Database as Lazer;
use Carbon\Carbon;

class BookingController extends PropertyController {
    public static function index($request) {
        if(Session::get('home') === null) {
            return view('errorpage', ['response' => errorpage(419)]);
        } else {
            $home = Session::get('home');
            if(Session::get('isLogged') === true) {
                $user = Session::get('user');
                $debug = getenv('APP_DEBUG');
                return view('tripadvisor/booking', compact('request', 'home', 'debug', 'user'));
            } else {
                Session::set('back', actual());
                return view('refreshpage', ['redirect' => $home->url . '/LoginController']);
            }
        }
    }
    public static function process($request) {
        if(Session::get('home') !== null) {
            $home = Session::get('home');
            if(Session::get('isLogged') === true) {
                $user = Session::get('user');
                    if($user->has_booking) {
                        return view('errorpage', ['response' => errorpage(801)]);
                        exit;
                    }
                $guest = new \stdClass;
                    foreach($request->data as $key => $val) {
                        $guest->{$key} = $val;
                    }
                $booking = new \stdClass;
                $booking->name = $home->id;
                $booking->checkin = $home->quote->start_l;
                $booking->checkout = $home->quote->end_l;
                $booking->payment_id = $home->payment->id;
                $booking->host_id = $home->host->id;
                $booking->user_id = $home->user->id;
                $booking->due_now = ($home->quote->first_pay ? $home->quote->first_pay_l : $home->quote->total_l);
                $booking->booking = new \stdClass;
                $booking->booking->subtotal = $home->quote->subtotal;
                        if($home->quote->first_pay) {
                            $booking->booking->first_pay = $home->quote->first_pay_l;
                            $booking->booking->first_pay_date = $home->quote->first_pay_date;
                            $booking->booking->last_pay = $home->quote->last_pay_l;
                        } else {
                            $booking->booking->first_pay = null;
                            $booking->booking->first_pay_date = null;
                            $booking->booking->last_pay = null;
                        }
                    $booking->booking->checkin = $booking->checkin;
                    $booking->booking->checkout = $booking->checkout;
                    $booking->booking->guests = $home->quote->guests;
                    $booking->booking->nights = $home->quote->nights;
                    $booking->booking->message = $guest->message;
                    $booking->booking->coupon = null;
                    $booking->guest_name = $guest->name;
                    $booking->guest = $guest;
                    $data = Request::post(app_token($home->id, 'request'))->body(json_encode($booking))->sendsJson()->send();
                    $code = trim($data);
                    $strlen = strlen($code);
                        if($strlen == 10) {
                            $update = Lazer::table('users')->find($user->id);
                            $update->set([
                                'booking_id' => $code,
                                'address' => trim($request->data->address),
                                'prefix' => $request->data->prefix_sg,
                                'phone' => $request->data->phone_sg,
                                'has_booking' => 1
                            ]);
                            $update->save();
                            return view('refreshpage', ['redirect' => $home->url . '/s/'.$code.'/BookingStatus']);
                        } else {
                            return view('errorpage', ['response' => errorpage(417)]);
                        }
            } else {
                return view('refreshpage', ['redirect' => $home->url . '/LoginController']);
            }
        } else {
            return view('errorpage', ['response' => errorpage(419)]);
        }
    }
}