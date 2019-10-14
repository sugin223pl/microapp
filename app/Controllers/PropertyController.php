<?php
namespace App\Controller;
use Httpful\Request;
use Josantonius\Session\Session;
use Carbon\Carbon;
class PropertyController extends ResponseController {
    public static function index($id) {
        $HeadJson = self::HeadJson();
        if(isset(Session::get('home')->id) && !empty(Session::get('home')->id)) {
            if(Session::get('home')->id == $id) {
                $home = Session::get('home');
            } else {
                Session::destroy();
                return view('errorpage', ['response' => errorpage(419)]);
            }
        } else {
            $request = json_decode(Request::get(app_token($id, 'get'))->send());
                if(isset($request->status) && $request->status) {
                    $request->csrf = csrf_token();
                    $request->session = Session::id();
                    Session::set('home', $request);
                    $home = Session::get('home');
                } else {
                    Session::destroy();
                    return view('errorpage', ['response' => errorpage(909)]);
                }
        }
        if(isset($home->status) && $home->status) {
            $PageManifest = self::PageManifest($home, $home->csrf);
            $debug = getenv('APP_DEBUG');
            //print_r($home->amenities);
            //exit;
            $islogged = Session::get('isLogged');
            $user = Session::get('user');
            return view('tripadvisor/home', compact('home', 'HeadJson', 'PageManifest', 'debug', 'islogged', 'user'));
        }
    }

    public static function batch($request)
    {
        header('Content-Type: application/json');
        if($request->data->action == 'priceHat') {
            $data = [
                $request->data->aname => [
                    $request->data->url => [
                        "headers" => [
                           "Pragma" => "no-cache",
                           "Cache-Control" => "no-cache, no-store, must-revalidate",
                           "Content-Length" => "68",
                           "Content-Type" => "application/json"
                        ],
                        "body" => [
                              "priceHatApplicable" => false,
                              "isApplicable" => false,
                              "savingsPercent" => 0
                           ],
                        "status" => 200
                    ]
                ]
            ];
            echo json_encode($data); exit;
        } else if($request->data->action == 'recommendations') {
            $data = [
                $request->data->aname => [
                    $request->data->url => [
                        "headers" => [
                            "Cache-Control" => "no-cache, no-store, must-revalidate",
                            "Content-Type" => "application/json",
                            "Pragma" => "no-cache"
                        ],
                        "body" => [],
                        "status" => 200,
                    ]
                ]
            ];
            echo json_encode($data); exit;
        } else if($request->data->action == 'getRapRate') {
            parse_str(parse_url($request->data->url, PHP_URL_QUERY), $array);
            $home = Session::get('home');
            $array['guests'] = ((isset($array['kids']))? ($array['adults'] + $array['kids']) : $array['adults']);
            $array['carbon_start'] = Carbon::parse($array['start']);
            $array['carbon_end'] = Carbon::parse($array['end']);
            $array['start_l'] = date_format($array['carbon_start'], "D, M j, Y");
            $array['end_l'] = date_format($array['carbon_end'], "D, M j, Y");
            $array['first_pay'] = 0;
            $array['first_pay_l'] = 0;
            $array['last_pay'] = 0;
            $array['last_pay_l'] = 0;
            $array['deposit'] = 0;
            $array['fees'] = 18;
            $array['fees_l'] = $array['fees'] ? $home->currency->code . ' ' . number_format($array['fees']) : 0;
            $possible = false;
            
            $array['nights'] = $array['carbon_end']->diffInDays($array['carbon_start']);
                if($array['nights'] < $home->accommodation->min_stay) {
                    $array['errors'] = array(
                        0 => array(
                            "reason" => "MIN_STAY_VIOLATION",
                            "message" => "The dates you have entered are below the minimum stay requirement of " . $home->accommodation->min_stay . " " . plural('night', $home->accommodation->min_stay).  " for this property. Please modify your dates to submit the inquiry."
                        )
                    );
                } else {
                    $array['errors'] = false;
                }


                if($array['nights'] > 0 AND $array['nights'] < 7) {
                    $array['rate'] = $home->rates->nightly;
                } else if($array['nights'] > 6 AND $array['nights'] < 28) {
                    $array['rate'] = $home->rates->weekly;
                } else if($array['nights'] >= 28) {
                    $array['rate'] = $home->rates->monthly;
                    $possible = true;
                }
            $array['rate_l'] = $home->currency->code . ' ' . number_format($array['rate']);
            $array['subtotal'] = ($array['rate'] * $array['nights']);
            $array['subtotal_l'] =  $home->currency->code . ' ' . number_format($array['subtotal']);
            $array['total'] = ($array['subtotal'] + $array['fees']);
            $array['total_l'] = $home->currency->code . ' ' . number_format($array['total']);

                if(isset($home->rates->deposit) && $possible) {
                    $array['deposit'] = $home->rates->deposit;
                    $array['deposit_l'] = $home->currency->code . ' ' . number_format($home->rates->deposit);
                    $array['total'] = ($array['total'] + $array['deposit']);
                    $array['total_l'] = $home->currency->code . ' ' . number_format($array['total']);
                    
                }
                if($home->rates->deposit_rule && $possible) {
                    $array['first_pay'] = ($home->rates->deposit_rule *  $array['rate']) + $array['deposit'];
                    $array['first_pay_l'] = $home->currency->code . ' ' . number_format($array['first_pay']);
                    $array['first_pay_date'] = date('M j, y', strtotime($array['start_l']. ' + '.$home->rates->deposit_rule.' days'));
                    //// 
                    $array['last_pay'] = ($array['total'] - $array['first_pay']);
                    $array['last_pay_l'] = $home->currency->code . ' ' . number_format($array['last_pay']);
                }
            
            $object = (object) $array;
            $home->quote = $object;
            Session::set('home', $home);
            $data = [
                $request->data->aname => [
                    $request->data->url => [
                        "headers" => [
                        "Pragma" => "no-cache",
                        "Cache-Control" => "no-cache, no-store, must-revalidate",
                        "Content-Length" => "1035",
                        "Content-Type" => "application/json"
                        ],
                        "body" => [
                            "view" => [
                                "stayLength" => $array['nights'],
                                "rateInfo" => [
                                    "localizedMinStay" => $home->accommodation->min_stay ." " . plural('night', $home->accommodation->min_stay) . " min. stay",
                                    "localizedSubtotal" =>  $array['subtotal_l'],
                                    "subtotalValueInSessionCurrency" =>  $array['subtotal']
                                ]
                            ],
                            "urldata" => $array,
                            "rapData" => [
                                    "rapSubtotalCurrency" => $home->currency->code,
                                    "isInquiryAllowed" => true,
                                    "rapBaseRate" => $array['subtotal_l'],
                                    "rapBaseRateInSessionCurrency" => $array['subtotal'],
                                    "rapConsolidatedRate" => $array['subtotal_l'],
                                    "rapConsolidatedRateInSessionCurrency" => $array['total'],
                                    "rapTax" => $array['fees'] ? $array['fees_l'] : 0,
                                    "rapOwnerFees" => 0,
                                    "rapDeposit" => $home->rates->deposit ? $home->currency->code . ' ' . number_format($home->rates->deposit) : null,
                                    "rapRefundableDeposit" => $home->rates->deposit ? $home->currency->code . ' ' . number_format($home->rates->deposit) : null,
                                    "rapHasRefundableDeposit" => $home->rates->deposit ? true : false,
                                    "rapBookingFee" => $array['fees'] ? $array['fees_l'] : 0,
                                    "subtotalNumericInSessionCurrency" => $array['subtotal'],
                                    "taxNumericInSessionCurrency" => -1,
                                    "rapAltConsolidatedRate" => null,
                                    "rapFirstPayment" => $array['first_pay_l'] ? $array['first_pay_l'] : 0, // "RON 1,471"
                                    "rapSecondPayment" => $array['last_pay_l'] ? $array['last_pay_l'] : 0, //"RON 3,418"
                                    "rapSecondPaymentDue" => $array['start'], //"02/25/2020"
                                    "rapSubtotal" => $array['subtotal_l'],
                                    "checkoutUrl" => null,
                                    "rapBookable" => "INSTANT",
                                    "isOffsiteBooking" => false,
                                    "getDisplayDiscount" => true,
                                    "rapIsSplitPayment" => $array['first_pay'] ? true : false
                                    ],
                            "errors" => $array['errors'],
                            "validationError" => null,
                            "tipQuoteToken" => "4f11d0dfb9bd1124295580e2757e9e70",
                            "rapRate" => [
                                        "amount" => $array['subtotal'],
                                        "currency" => $home->currency->code,
                                        "minStay" => $home->accommodation->min_stay,
                                        "checkoutDays" => [
                                            "MONDAY",
                                            "TUESDAY",
                                            "WEDNESDAY",
                                            "THURSDAY",
                                            "FRIDAY",
                                            "SATURDAY",
                                            "SUNDAY"
                                        ]
                                    ]
                        ],
                        "status" => 200
                    ]
                ]
            ];
            echo json_encode($data); exit;
        } else {
            $data = [];
            echo json_encode($data); exit;
        }

    }
    public static function clear_session() {
        Session::destroy();
        return view('errorpage', ['response' => errorpage(318)]);
    }
}