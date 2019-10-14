<?php
use App\Controller\PropertyController;
use App\Controller\BookingController;
use App\Controller\HomeController;
use App\Controller\LoginController;
use App\Controller\StatusController;
use App\Controller\ContactController;

$debug = getenv('APP_DEBUG');
Flight::route('/test/(@var)', function($var) {
    $request = Flight::request();
    HomeController::test($request, $var);
});
Flight::route('(/tripadvisor.com)/MyInbox', function() {
    $request = Flight::request();
    LoginController::inbox($request);
});

Flight::route('(/tripadvisor.com)/logout', function() {
    $request = Flight::request();
    LoginController::logout($request);
});
Flight::route('POST (/tripadvisor.com)/LoginController', function() {
    $request = Flight::request();
    LoginController::login($request);
});
Flight::route('(/tripadvisor.com)/LoginController', function() {
    $request = Flight::request();
    LoginController::index($request);
});
Flight::route('POST (/tripadvisor.com)/RegisterController', function() {
    $request = Flight::request();
    LoginController::register($request);
});
Flight::route('(/tripadvisor.com)/RegisterController', function() {
    $request = Flight::request();
    LoginController::register_index($request);
});
Flight::route('/', function() {
    return view('errorpage', ['response' => errorpage(301)]);
});
Flight::route('(/@one(/@two(/@three)))/clear', function() {
    PropertyController::clear_session();
});
Flight::route('/error/@code', function($code) {
    HomeController::error($code);
});
Flight::route('(/tripadvisor.com)/i/@id:[0-9]{8}/@slug', function($id) {
    PropertyController::index($id);
});
Flight::route('POST (/tripadvisor.com)/BookingRequest', function() {
    $request = Flight::request();
    BookingController::process($request);
});
Flight::route('(/tripadvisor.com)/BookingRequest', function() {
    $request = Flight::request();
    BookingController::index($request);
});

Flight::route('(/tripadvisor.com)/s/@code/BookingStatus', function($code) {
    $request = Flight::request();
    $request->code = $code;
    StatusController::index($request);
});
Flight::route('(/tripadvisor.com)/s/@code/RentalsSupport', function($code) {
    $request = Flight::request();
    $request->code = $code;
    ContactController::index($request);
});
// RESPONSES ================================================================
//=====================================================================HERE//


Flight::route('POST /tripadvisor/data/1.0/batch', function() {
    $request = Flight::request();
    PropertyController::batch($request);
}, true);
Flight::route('/tripadvisor/data/bundle', function() {
    $request = Flight::request();
    PropertyController::bundle($request);
});
Flight::route('/tripadvisor/data/1.0/vr/getRapRate', function() {
    PropertyController::getRapRate();
});
Flight::route('/tripadvisor/data/1.0/vr/rental/@homeid:[0-9]{8}/recommendations', function($homeid) {
    PropertyController::recommendations($homeid);
});
Flight::route('/tripadvisor/data/1.0/maps/provider', function() {
    PropertyController::maps_provider();
});
Flight::route('/tripadvisor/VacationRentalsAjax', function() {
    PropertyController::ajax();
});
Flight::route('/tripadvisor/GARecord', function() {
    $request = Flight::request();
    PropertyController::GARecord($request);
}, true);
Flight::route('POST /tripadvisor/DemandLoadAjax', function() {
    $request = Flight::request();
    PropertyController::DemandLoadAjax($request);
}, true);
Flight::route('POST /tripadvisor/batched', function() {
    $request = Flight::request();
    PropertyController::batched($request);
}, true);
Flight::start();