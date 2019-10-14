<!DOCTYPE html>
<html lang="en" xmlns:og="http://opengraphprotocol.org/schema/">
<head>
    <title>TripAdvisor - Booking Request</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta http-equiv="imagetoolbar" content="no" />
    <meta http-equiv="pragma" content="no-cache" />
    <meta http-equiv="cache-control" content="no-cache,must-revalidate" />
    <meta http-equiv="expires" content="0" />
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link rel="icon" href="<?=assets('/favicon.ico', $home->app->cdn)?>" type="image/x-icon" />
    <link rel='stylesheet' type='text/css' href='<?=assets('/css2/build/concat/vr_ftl_responsive_header-v23952644911b.css', $home->app->cdn)?>' data-rup='vr_ftl_responsive_header' />
    <link rel='stylesheet' type='text/css' href='<?=assets('/css2/build/concat/vr_ftl_payment-v21618390734b.css', $home->app->cdn)?>' data-rup='vr_ftl_payment' />
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel='stylesheet' type='text/css' href='<?=assets('/css2/build/concat/status_page_custom.css', $home->app->cdn)?>'/>
    <?= css('custom'); ?>
</head>
<style>
    html, html body {
        height: auto !important;
    }
    @media print
    {    
        .no-print, .no-print *
        {
            display: none !important;
        }
    }
</style>
<body class="domn_en_US lang_en">
    <div class="ftlHead ftlWrap TA ">
        <div class="ftlHeadBox desktop">
            <a href="<?= $home->slug ?>">
                <span class="smallLogo"></span>
            </a>
            <div class="ftlHeadLinks no-print">
                <DIV ID="taplc_infinity_call_tracking_vr_0" class="ppr_rup ppr_priv_infinity_call_tracking" data-placement-name="infinity_call_tracking:vr"></DIV>
                <div class="customerSupport InfinityHide">
                    <span class="csPhone"></span>
                    <span>Need help? Call TripAdvisor:</span>
                    <span class="InfinityNumber" data-service-number="844-213-0235">844-213-0235</span>
                </div>
            </div>
        </div>
        <div class="ftlHeadBox mobile no-print" onClick="history.go(-1); return false;">
            <div class="left_button">
                <div class="ui_button left_chevron">Back</div>
            </div>
            <div class="headingLogo"></div>
            <div class="right_button"></div>
        </div>
    </div>
    <div id="PAGE" class="PAGE TA">
        <div id="taplc_vr_inbox_header_0" class="ppr_rup ppr_priv_vr_inbox_header no-print" data-placement-name="vr_inbox_header">
            <div style="background-color: black;" class="headersContainer">
                <div style="width: 85.5%;margin: 0 auto;background-color: black;height: 35px;line-height: 35px;font-size: 12px;color: white;" class="tabHeaders">
                    <div style="display: inline-block; margin-right: 5%;" id="inboxTabHeader" class="ftlInboxHeader selected ">
                        <a href="<?=$home->url?>/MyInbox" style="color: inherit;">
                            <div class="title">Inbox</div>
                        </a>
                    </div>
                    <div style="display: inline-block;" id="inboxBack" class="ftlInboxHeader selected ">
                        <a href="<?=$home->slug?>" style="color: inherit;">
                            <div class="title">Home</div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div id="vrPayment" class="vrPayment">
            <div class="mainContainer ">
                <div class="paymentHeader">
                    <div class="innerContainer">
                        <div class="headerText "><span class=""></span>Your booking request has been <?=$booking->confirmed ? 'confirmed' : 'submitted'?>.</div>
                        <span class="printLink ui_icon printer" onclick="window.print();"></span>
                    </div>
                </div>
                <div id="" class="bodyContainer wrap bookingRequestStatus">
                    <div id="container" class="container">
                        <div class="responsive-right-rail-frame">
                            <div class="detailsContainer">
                                <DIV ID="taplc_vr_property_details_0" class="ppr_rup ppr_priv_vr_property_details" data-placement-name="vr_property_details">
                                    <div class="wrap">
                                        <div class="propertyInfoContainer">
                                            <div class="bookingNumberContainer abovePropertyImage">
                                                Booking number: <span class="bookingNumber"><?=$booking->code?></span>
                                            </div>
                                            <div class="shortPropertyInfo">
                                                <div class="propertyImage">
                                                    <img src="<?=$home->img?>">
                                                </div>
                                                <div class="bookingNumberContainer belowPropertyImage">
                                                    Booking number: <span class="bookingNumber"><?=$booking->code?></span>
                                                </div>
                                                <div class="propertyInfo">
                                                    <div class="propertyLink">
                                                        <a class="ftlPropDtlLnk" href="<?=$home->slug?>" target="_blank"><?=$home->name?></a>
                                                    </div>
                                                    <div>
                                                    <?=$home->accommodation->bedrooms?> BR / <?=$home->accommodation->bathrooms?> BA / sleeps <?=$home->accommodation->guests?>
                                                    </div>
                                                    <div class="propertyGeo"><?=$home->location->city?>, <?=$home->location->country?></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </DIV>
                                <!--etk-->
                                <DIV class="prw_rup prw_vr_payment_reservationLineItem" data-prwidget-name="vr_payment_reservationLineItem" data-prwidget-init="handlers">
                                    <div class="reservation_line_items TA">
                                        <div class="badging_and_staydates">
                                            <div class="stayDates "><?=$booking->checkin?> - <?=$booking->checkout?></div>
                                        </div>
                                        <div class="guestsStayLength"><?=$booking->booking->nights?> <?=plural('night', $booking->booking->nights)?> / <?=$booking->booking->guests?>  <?=plural('guest', $booking->booking->guests)?></div>
                                        <div class="ratesAndFees ftlWrap USD USD">
                                            <div class="quoteHeader noConversions"></div>
                                            <table id="detailedQuote" class="detailedQuote">
                                                <tr class="">
                                                    <td>Subtotal</td>
                                                    <td class="right convertible">EUR <?=$booking->booking->subtotal?></td>
                                                    <td class="right convertible hidden"></td>
                                                    <td class="extra"></td>
                                                </tr>
                                                <tr class="dueNow ">
                                                    <td>Due now</td>
                                                    <?php if($booking->booking->first_pay):?>
                                                    <td class="right convertible"><?=$booking->booking->first_pay?></td>
                                                    <?php else:?>
                                                    <td class="right convertible"><?=$booking->due_now?></td>
                                                    <?php endif;?>
                                                    <td class="right convertible hidden"></td>
                                                    <td class="extra"></td>
                                                </tr>
                                                <?php if($booking->booking->first_pay):?>
                                                <tr class="null ">
                                                    <td>Due on <?=$booking->booking->first_pay_date?><span class="autoCharge">* </span></td>
                                                    <td class="right convertible"><?=$booking->booking->last_pay?></td>
                                                    <td class="right convertible hidden"></td>
                                                    <td class="extra"></td>
                                                </tr>
                                                <?php endif;?>
                                            </table>
                                        </div>
                                        <?php if($booking->booking->first_pay):?>
                                        <div class="autoCharge creditCard autoChargeNotice">*We will not automatically charge the remaining balance payment on <span><?=$booking->booking->first_pay_date?></span>. </div>
                                        <?php endif;?>
                                    </div>
                                </DIV>
                                <DIV class="prw_rup prw_vr_payment_deferredLineItem" data-prwidget-name="vr_payment_deferredLineItem" data-prwidget-init="">
                                    <div class="depositDeferredMessageContainer">
                                        <table id="detailedQuote" class="detailedQuote">
                                            <tr class="deferredLineItem">
                                                <td>Maximum damage claim:</td>
                                                <td class="right convertible">$100.00</td>
                                            </tr>
                                        </table>
                                        <div class="depositText"><span class='damageDepositText'>Your stored payment details won’t be charged or authorized (for a hold on funds) unless the Owner makes a claim for property damage within 10 days of your checkout.</span></div>
                                    </div>
                                </DIV>
                            </div>
                        </div>
                        <div id="main" class="main ">
                            <div class="section first last">
                                <div id="statusClock" class="statusClock">
                                    <div class="<?=$booking->confirmed ? 'clockGreen' : 'clockOrange'?>">
                                        <?=$booking->confirmed ? 'Booking is' : 'Expires in'?>
                                        <br><span id="countdownClock" class='countdownClock'>00:00:00</span>
                                    </div>
                                </div>
                                <div class="requestStatusLine">
                                    Thank you! We have asked the owner to review your request and respond within 24 hours.
                                </div>
                                <div class="requestStatusLine">
                                    If your booking is approved, we’ll charge your account for the amount authorized and send a confirmation to <b><?=obfuscateEmail($booking->guest->email)?></b>.
                                </div>
                                <div class="requestStatusLine">
                                    If the owner can't accept your booking or needs to revise the booking request, we'll let you know.
                                </div>
                                <div class="ui_columns is-multiline">
                                    <div class="ui_column is-12">
                                        <div class="paymentDetails">Payment details</div>
                                        <div class="receiptItems">
                                            <div class="receiptItem ">
                                                <div class="receiptHead receiptLine">
                                                    <?php if($booking->booking->first_pay):?>
                                                    <span>
                                                    1st Payment of <?=$booking->booking->first_pay?>
                                                    </span>
                                                    <?php else:?>
                                                    <span>
                                                    Full Payment of <?=$booking->due_now?>
                                                    </span>
                                                    <?php endif;?>
                                                    <span class="paymentDate colRight">Authorized on <?=date("D, M j, Y", strtotime($booking->created_at))?></span>
                                                </div>
                                                <div class="receiptLine">
                                                    <span>
                                                    <?=$home->payment->gateway?>
                                                    </span>
                                                    <span class="colRight">
                                                        @TripAdvisor
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ui_column is-12 no-print">
                                        <div class="contactUsSameTab">
                                            <div class="needHelp">
                                                <div class="taCustomerSupportBold">Need help?</div>
                                                <div>
                                                    <a href="<?=$home->url?>/s/<?=$booking->code?>/RentalsSupport">Contact us</a> to get a hold of TripAdvisor Vacation Rentals Support. Or to confirm a paymentyou've made. Or to send verification documents to owner/host. 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="contactUsNewTab">
                                            <div class="needHelp">
                                                <div class="taCustomerSupportBold">Need help?</div>
                                                <div>
                                                    <a href="<?=$home->url?>/s/<?=$booking->code?>/RentalsSupport">Contact us</a> to get a hold of TripAdvisor Vacation Rentals Support. Or to confirm a paymentyou've made. Or to send verification documents to owner/host.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="no-print" style="margin-top: 20px; min-width:350px;" >
                                <a href="<?=$home->url?>/s/<?=$booking->code?>/RentalsSupport" style="color: #069;cursor: pointer;font-size: 12px;line-height: 16px;" class="taLnk">
                                    <button type="submit" class="ui_button primary">Customer Support</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php if($booking->confirmed):?>
    <script>
        document.getElementById("countdownClock").innerHTML = "CONFIRMED";
    </script>
    <?php else: ?>
    <script>
    // Set the date we're counting down to
        var countDownDate = new Date('<?=strtotime($booking->created_at)?>' * 1000);
        console.log('<?=$booking->created_at?>');
        console.log('<?=strtotime($booking->created_at)?>');
        console.log(countDownDate);
        countDownDate.setHours(countDownDate.getHours() + 24);
        var x = setInterval(function() {
        var now = new Date().getTime();
        var distance = countDownDate - now;
            
        // Time calculations for days, hours, minutes and seconds
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);
        document.getElementById("countdownClock").innerHTML = hours + ":" + minutes + ":" + seconds;
            if (distance < 0) {
                clearInterval(x);
                document.getElementById("countdownClock").innerHTML = "BOOKING REQUEST EXPIRED";
            }
        
        }, 1000);
    </script>

    <script>
    window.onload = setTimeout(function() {
        window.print();
    }, 3000);
    </script>
    <?php endif; ?>
    </body>
</html>
