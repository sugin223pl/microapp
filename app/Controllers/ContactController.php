<?php
namespace App\Controller;
use Josantonius\Session\Session;
use Httpful\Request;

class ContactController {
    public static function index($request) {
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
            $sent = $request->query->sent ? true: false;
            if($request->method == 'POST') {
                $files = '';
                    foreach($request->data as $name => $value) {
                        if(is_array($value)) {
                            foreach($value as $file) {
                                $url_bun = $file;
                                $file = pathinfo($url_bun);
                                $files .= '<a href="' . $url_bun . '" download target="_blank">Download</a> '.$file['filename'].' ('.strtoupper($file['extension']).')<br>';
                            }
                        }
                    }
                    if($files) {
                        $request->data->message = '<h3>TripAdvisor</h3>' . $request->data->message . '<hr align="left" style="width: 250px;"><b>Documents:</b><br>' . $files . '<hr align="left" style="width: 250px;"><small>' . $request->data->name . ' - on ' . date('l, F j, H:i:s') . '</small>';
                    } else {
                        $request->data->message = '<h3>TripAdvisor</h3>' . $request->data->message . '<hr align="left" style="width: 250px;"><small>' . $request->data->name . ' - on ' . date('l, F j, H:i:s') . '</small>';
                    }
                    
                unset($request->data->documents);
                $sent = self::sendMail($request->data);
                $redirect = $home->url . '/s/'.$request->data->code.'/RentalsSupport?sent=1';
                return view('refreshpage', ['redirect' => $redirect]);
            }
            return view('tripadvisor/contact', compact('booking', 'home', 'request', 'sent'));
        } else {
            return view('errorpage', ['response' => errorpage(418)]);
        }
    }
    public static function sendMail($formdata) {
        $data = new \stdClass();
        $data->id = $formdata['id'];
        $data->cc = $formdata['host_email'];
        $data->fromemail = $formdata['email'];
        $data->fromname = $formdata['name'];
        $data->html = $formdata['message'];
        $data->subject = $formdata['subject'];
        return Request::post(app_token($data->id, 'mail'))->body(json_encode($data))->sendsJson()->send();
    }
}