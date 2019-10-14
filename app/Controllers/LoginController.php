<?php
namespace App\Controller;
use Josantonius\Session\Session;
use Lazer\Classes\Database as Lazer;
use Httpful\Request;
use Carbon\Carbon;
class LoginController {
    public static function inbox($request) {
        if(Session::get('home') === null) {
            return view('errorpage', ['response' => errorpage(419)]);
        } else {
            $home = Session::get('home');
            if(Session::get('isLogged') === true) {
                $user = Session::get('user');
                $booking = Session::get('booking');
                    if($user->has_booking && $booking !== null) {
                        $booking = json_decode(Request::get(app_token($user->booking_id, 'status'))->send());
                        Session::set('booking', $booking);
                        $booking = Session::get('booking');
                    } else {
                        
                    }
                $debug = getenv('APP_DEBUG');
                $errors = false;
                return view('tripadvisor/inbox', compact('request', 'home', 'debug', 'errors', 'user', 'booking'));
            } else {
                return view('refreshpage', ['redirect' => $home->url . '/LoginController']);
            }

        }
    }
    public static function logout($request) {
        if(Session::get('home') === null) {
            return view('errorpage', ['response' => errorpage(419)]);
        } else {
            $home = Session::get('home');
            Session::destroy('user');
            Session::destroy('isLogged');
            return view('refreshpage', ['redirect' => $home->slug]);
        }
    }
    public static function index($request) {
        if(Session::get('home') === null) {
            return view('errorpage', ['response' => errorpage(419)]);
        } else {
            $islogged = Session::get('isLogged');
            $home = Session::get('home');
            $debug = getenv('APP_DEBUG');
            $errors = false;
            return view('tripadvisor/login', compact('request', 'home', 'debug', 'errors', 'islogged'));
        }
    }
    public static function login($request) {
        if(Session::get('home') === null) {
            return view('errorpage', ['response' => errorpage(419)]);
        } else {
            $data = Lazer::table('users')->where('email', '=', $request->data->email)->andWhere('password', '=', md5(trim($request->data->password)))->findAll();
            $is_email = Lazer::table('users')->where('email', '=', $request->data->email)->findAll();
            $is_email = $is_email->count() ? true : false;
            $home = Session::get('home');
            $debug = getenv('APP_DEBUG');
            $islogged = Session::get('isLogged');
            if($data->count() === 1) {
                $user = (object) $data->asArray()[0];
                Session::set('isLogged', true);
                Session::set('user', $user);
                $back = (Session::get('back') ? Session::get('back') : $home->slug);
                Session::destroy('back');
                return view('refreshpage', ['redirect' => $back]);
            } elseif($is_email === false) {
                $errors = ['email' => true];
                return view('tripadvisor/login', compact('request', 'home', 'debug', 'errors', 'islogged'));
            } else {
                $errors = true;
                return view('tripadvisor/login', compact('request', 'home', 'debug', 'errors', 'islogged'));
            }
        }
    }
    public static function register_index($request) {
        if(Session::get('home') === null) {
            return view('errorpage', ['response' => errorpage(419)]);
        } else {
            $islogged = Session::get('isLogged');
            $home = Session::get('home');
            $debug = getenv('APP_DEBUG');
            $errors = false;
            return view('tripadvisor/register', compact('request', 'home', 'debug', 'errors', 'islogged'));
        }
    }
    public static function register($request) {
        if(Session::get('home') === null) {
            return view('errorpage', ['response' => errorpage(419)]);
        } else {
            $home = Session::get('home');
            $debug = getenv('APP_DEBUG');
            $errors = [];
            $password = md5($request->data->password);
            $repassword = md5($request->data->repassword);
            if (!filter_var(trim($request->data->email), FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = 'Invalid email address.';
            } else if($password != $repassword) {
                $errors['password'] = 'Both passwords must match.';
            } else if(Lazer::table('users')->where('email', '=', trim($request->data->email))->findAll()->count()) {
                $errors['user'] = 'It seems that you already have a user.';
            }

            if(empty($errors)) {
                
                $user = Lazer::table('users');
                $user->name = $request->data->name;
                $user->email = $request->data->email;
                $user->password = $password;
                $user->avatar = gravatar($request->data->email);
                $user->booking_id = null;
                $user->created_at = date('d/m/Y');
                $user->save();
                $data = Lazer::table('users')->where('email', '=', trim($request->data->email))->findAll();
                $user = (object) $data->asArray()[0];
                Session::set('isLogged', true);
                Session::set('user', $user);
                return view('refreshpage', ['redirect' => $home->slug]);
            } else {
                $islogged = Session::get('isLogged');
                return view('tripadvisor/register', compact('request', 'home', 'debug', 'errors', 'islogged'));
            }
        }
    }
}