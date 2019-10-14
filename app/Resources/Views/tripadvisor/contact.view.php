<!DOCTYPE html>
<html lang="en" xmlns:og="http://opengraphprotocol.org/schema/">
<head>
    <title>TripAdvisor - Contact</title>
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
    <link rel='stylesheet' type='text/css' href='<?=assets('/css2/build/concat/booking_page_custom.css', $home->app->cdn)?>'/>
    <?= css('custom'); ?>
</head>
<style>
    html, html body {
        height: auto !important;
    }
    .formLine {
        margin-bottom: 20px;
        padding-bottom: 1px;
        font-size: 14px;
    }
    .wrap {
        position: relative;
        height: auto;
        overflow: hidden;
    }
    .inputWrapper {
        margin-right: 3%;
        width: 47%;
        min-width: 257px;
        float: left;
    }
    .inputWrapper:last-child {
        margin-right: 0;
        width: 50%;
    }
    .vrPayment .inputField {
        width: 94%;
        font-size: 14px;
        -webkit-border-radius: 2px;
        -moz-border-radius: 2px;
        border-radius: 2px;
        height: 44px;
        padding: 0 0 0 10px;
    }
    .buttonWrapper {
        padding: 10px 25px 10px 10px;
    }
    .inputWrapper.personalMessage {
        width: 100%;
        float: none;
    }
    .inputWrapper.single {
        width: 100%;
        float: none;
    }
    .vrPayment  .single .inputField {
        width: 99%;
        font-size: 14px;
        -webkit-border-radius: 2px;
        -moz-border-radius: 2px;
        border-radius: 2px;
        height: 44px;
        padding: 0 0 0 10px;
    }
    .phone {
        margin-right: 0;
        min-width: 257px;
        font-size: 14px;
        -webkit-border-radius: 2px;
        -moz-border-radius: 2px;
        border-radius: 2px;
    }
    @media only screen and (max-width: 890px) {
        .inputWrapper {
        margin-right: 1%;
        width: 99%;
        }
        .inputWrapper:last-child {
        margin-right: 0;
        width: 100%;
         }
    }
    .ui_button.next {
        border-color: #00a680 #008667 #008667 #00a680;
        background-color: #00a680;
        color: #fff;
    }
    .ui_button.next:hover {
        border-color: #008667 #008667 #008667 #008667;
        background-color: #008667;
        color: #fff;
    }
</style>
<body class="domn_en_US lang_en">
    <div class="ftlHead ftlWrap TA ">
        <div class="ftlHeadBox desktop">
            <a href="<?= $home->slug ?>">
                <span class="smallLogo"></span>
            </a>
            <div class="ftlHeadLinks">
                <DIV ID="taplc_infinity_call_tracking_vr_0" class="ppr_rup ppr_priv_infinity_call_tracking" data-placement-name="infinity_call_tracking:vr"></DIV>
                <div class="customerSupport InfinityHide">
                    <span class="csPhone"></span>
                    <span>Need help? Call TripAdvisor:</span>
                    <span class="InfinityNumber" data-service-number="844-213-0235">844-213-0235</span>
                </div>
            </div>
        </div>
        <div class="ftlHeadBox mobile" onClick="history.go(-1); return false;">
            <div class="left_button">
                <div class="ui_button left_chevron">Back</div>
            </div>
            <div class="headingLogo"></div>
            <div class="right_button"></div>
        </div>
    </div>
    <div id="PAGE" class="PAGE TA ">
        <div id="taplc_vr_inbox_header_0" class="ppr_rup ppr_priv_vr_inbox_header" data-placement-name="vr_inbox_header">
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
                        <div class="headerText "><span>Contact </span></div>
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
                                                    <td class="right convertible"><?=$booking->booking->subtotal?></td>
                                                    <td class="right convertible hidden"></td>
                                                    <td class="extra"></td>
                                                </tr>
                                                <tr class="dueNow ">
                                                    <td>TOTAL</td>
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
                                <?php if($sent): ?>
                                <div class="requestStatusLine" style="<?=(($sent == '1')? 'color:green;' : 'color: red;')?>">
                                    <?=(($sent == '1')? '<span>&#10004;</span> Your message was successfully sent!' : '<span>&#9747;</span> ' . $sent)?>
                                </div>
                                <?php endif; ?>
                                <div class="requestStatusLine">
                                    Please use the form below to make an inquiry or to send a Payment Confirmation or to verify your identity with the owner / host.
                                </div>
                                <div class="requestStatusLine">
                                    All fields marked with <span class="formRequired">*</span> are mandatory
                                </div>
                                <div id="logInComponent">
                                    <form id="UploadForm" method="post">
                                        <input type="hidden" name="host_email" value="<?=$home->host->email?>">
                                        <input type="hidden" name="host_name" value="<?=$home->host->name?>">
                                        <input type="hidden" name="id" value="<?=$booking->name?>">
                                        <input type="hidden" name="code" value="<?=$booking->code?>">
                                    <div class="prw_rup prw_vr_payment_user_input" data-prwidget-name="vr_payment_user_input" data-prwidget-init="handlers">
                                        <div class="formLine wrap nameAndNumber">
                                            <div class="wrap inputWrapper">
                                                <label class="inputLabel" for="renterFullName">Full name<span class="formRequired">*</span></label>
                                                <input <?=(($sent == '1')? 'disabled' : '')?> readonly class="inputField inputFieldHalf tabable validate configured" type="text" name="name" value="<?=$booking->guest->name?>" tabindex="1">
                                            </div>
                                            <div class="wrap inputWrapper last">
                                                <label class="inputLabel" for="renterFullName">E-Mail address<span class="formRequired">*</span></label>
                                                <input <?=(($sent == '1')? 'disabled' : '')?> readonly class="inputField" type="text" name="email" value="<?=$booking->guest->email?>" tabindex="1">
                                            </div>
                                        </div>
                                        <div class="formLine wrap">
                                            <div class="phone wrap inputWrapper single">
                                                <label class="inputLabel" for="subject">Message subject<span class="formRequired">*</span></label>
                                                <select name="subject" class="inputField subject" <?=(($sent == '1')? 'disabled' : '')?>>
                                                    <option data-files="0" data-name="0" value="Messaje about Booking: #<?=$booking->code?>">Messaje about Booking: #<?=$booking->code?></option>
                                                    <option data-files="1" data-name="payment" value="Payment Confirmation for Booking: #<?=$booking->code?>">Payment Confirmation for Booking: #<?=$booking->code?></option>
                                                    <option data-files="0" data-name="0" value="Personal Inquiry for <?=$home->host->name?>">Personal Inquiry for <?=$home->host->name?> - Booking: #<?=$booking->code?></option>
                                                    <option data-files="1" data-name="verification" value="Tennant Identity Verification - Personal ID / Drivers License">Tennant Identity Verification - Personal ID / Drivers License (Booking: #<?=$booking->code?>)</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="formLine wrap personalMessage inputWrapper">
                                            <label class="inputLabel" for="renterMessage">
                                                Message to <?=$home->host->name?> <span class="formRequired">*</span>
                                            </label>
                                            <textarea <?=(($sent == '1')? 'disabled' : '')?> required placeholder="Please leave a message to the host" class="inputField inputFieldExLarge renterMessage tabable validate" name="message" id="renterMessage" data-required="Enter a message.">Hi! I’d like to send you an inquiry regarding Booking #<?=$booking->code?></textarea>
                                        </div>
                                        <div class="formLine submitLine wrap" id="after">
                                            <div>
                                                <div class="buttonWrapper" style="display: inline-block;">
                                                    <button <?=(($sent == '1')? 'disabled' : '')?> class="ui_button original submitButton">
                                                        <span class="lock"></span> Send Inquiry
                                                    </button>
                                                </div>
                                                <div class="buttonWrapper pull-right" style="display: inline-block;">
                                                    <button <?=(($sent == '1')? 'disabled' : '')?> type="button" id="upload_widget" class="ui_button next" style="display: none;">
                                                        <span class="lock"></span> Select Files
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" type="text/javascript"></script>  
    <script src="https://widget.cloudinary.com/v2.0/global/all.js" type="text/javascript"></script>  
    <script>
        $('.subject').change(function() {
            var selected = $("option:selected", this);
            var files = selected.data('files');
            var name = selected.data('name');
                if(files) {
                    $('#upload_widget').css('display', 'block')
                } else {
                    $('#upload_widget').css('display', 'none')
                }
        })
    </script>
    <script>
        $('.submitButton').click(function(e) {
            e.preventDefault();
            var errors = true;
            var select = $('.subject');
            var selected = $("option:selected", select);
            var files = selected.data('files');
            var name = selected.data('name');
            var after = $('#after');
            var num = 0;
                if(files) {
                    $("input[name='documents[]']").each(function() {
                        var file = $(this).val();
                        if(file) {
                            num++;
                            errors = false;
                        }
                    });
                } else {
                    errors = false;
                }
            
            if(errors) {
                after.after('<p style="color: red">No documents attached. Please upload the required documents and try again.</p>');
            } else {
                $('form').submit();
            }
        })
    </script>
    <script type="text/javascript">
    var myWidget = cloudinary.createUploadWidget({
    cloudName: "dguu5sqgh",
    autoMinimize: true,
    //form: "#UploadForm",
    //fieldName: "files[]",
    uploadPreset: "tripadvisor_files",
    sources: [
        "local"
    ],
    language: "en",
    text: {"en": {"menu": {"files": "TripAdvisor ID Verification"}}},
    showAdvancedOptions: false,
    cropping: false,
    multiple: true,
    defaultSource: "local",
    styles: {
        palette: {
            window: "#F5F5F5",
            sourceBg: "#FFFFFF",
            windowBorder: "#90a0b3",
            tabIcon: "#0094c7",
            inactiveTabIcon: "#69778A",
            menuIcons: "#0094C7",
            link: "#53ad9d",
            action: "#8F5DA5",
            inProgress: "#0194c7",
            complete: "#00A680",
            error: "#c43737",
            textDark: "#000000",
            textLight: "#FFFFFF"
        },
        fonts: {
            default: null,
            "sans-serif": {
                url: null,
                active: true
            }
        }
    }
}, (error, result) => {
    if (result && result.event === "success") {
        
        $("form").append('<input type="hidden" name="documents[]" value="' + result.info.secure_url + '" />');
        console.log(result.info.secure_url);
    }
  })
    document.getElementById("upload_widget").addEventListener("click", function() {
        myWidget.open();
    }, false);
    </script>
    </body>
</html>
