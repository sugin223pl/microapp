<?php
namespace App\Controller;
use Lazer\Classes\Database as Lazer;
use Lazer\Classes\Helpers\Validate as Validate;
use Lazer\Classes\LazerException as LazerException;

class HomeController {
    public static function usersDB() {
        try {
            Validate::table('users')->exists();
        } catch(LazerException $e) {
            Lazer::create('users', array(
                'name' => 'string',
                'email' => 'string',
                'password' => 'string',
                'avatar' => 'string',
                'address' => 'string',
                'prefix' => 'string',
                'phone' => 'string',
                'booking_id' => 'string',
                'has_booking' => 'integer',
                'created_at' => 'string'
            ));
        } 
    }

    public function index() {
        return view('home');
    }
    public static function error($code) {
        return view('errorpage', ['response' => errorpage($code)]);
    }

    public static function CreditCardForm() {
        return view('tripadvisor/card');
    }
    public function show() {
        $id = Flight::get('id');
        return view('home', compact('id'));
    }
}