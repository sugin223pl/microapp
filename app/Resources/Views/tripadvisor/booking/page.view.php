        <div id="vrPayment" class="vrPayment">
            <div class="threadStatus">
                <!--trkP:vr_inbox_thread_status-->
                <!-- PLACEMENT vr_inbox_thread_status -->
                <div ID="taplc_vr_inbox_thread_status_0" class="ppr_rup ppr_priv_vr_inbox_thread_status"></div>
                <!--etk-->
            </div>
            <div class="mainContainer ">
                <div class="paymentHeader">
                    <div class="innerContainer">
                        <div class="headerText ">
                            <span class="largeLockIcon"></span>Your Secure Booking
                        </div>
                        <span class="fieldsRequired">
													<span class="star">*&nbsp;</span> required
                        </span>
                        <span id="vrDisplayPaymentCountReservation" class="vrDisplayPaymentCountReservation">
													<div id="payment-count-vehicle" class="payment-count-vehicle" data-tooltip="light" data-position="below" data-options="closeOnDocClick" data-content="
														<div class='pomAssuranceContent'>QkpiXzEwNl9obXc= other travelers have booked this property online using TripAdvisor Payments. When you book your rental using TripAdvisor Payments you are covered by 
															<span onclick='window.open(&quot;/pages/peace_of_mind.html&quot;);' class='pomLink'>Payment Protection</span>.
                    </div>">
                    <div class="vr-sprite-icon-CC-checkmark"></div>
                    <div class="payment-count-text long_number ">
                        <div id="payment-count-container" class="number">106</div>
                        <div class="copy">other travelers have booked this property</div>
                    </div>
                </div>
                </span>
            </div>
        </div>
        <div class="bodyContainer wrap ">
            <div id="container" class="container">
                <div class="responsive-right-rail-frame sticky">
                    <div class="detailsContainer">
                        <!--trkP:vr_property_details-->
                        <!-- PLACEMENT vr_property_details -->
                        <DIV ID="taplc_vr_property_details_0" class="ppr_rup ppr_priv_vr_property_details" data-placement-name="vr_property_details">
                            <div class="wrap">
                                <div class="propertyInfoContainer">
                                    <div class="shortPropertyInfo">
                                        <div class="propertyImage">
                                            <img src="<?=$home->images->{0}?>">
                                        </div>
                                        <div class="propertyInfo">
                                            <div class="propertyLink">
                                                <a class="ftlPropDtlLnk" href="<?=$home->slug?>"><?=$home->name?> </a>
                                            </div>
                                            <div>
                                            <?=$home->accommodation->bedrooms?> BR / <?=$home->accommodation->bathrooms?> BA  / Sleeps <?=$home->accommodation->guests?>
                                            </div>
                                            <div class="propertyGeo"><?=$home->location->city?>, <?=$home->location->country?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </DIV>
                        <!--etk-->
                        <DIV class="prw_rup prw_vr_payment_reservationLineItem">
                            <div class="viewLineItems TA ">View pricing and trip details</div>
                            <div class="reservation_line_items TA ">
                                <div class="badging_and_staydates">
                                    <div class="stayDates "><?=$home->quote->start_l?> - <?=$home->quote->end_l?></div>
                                </div>
                                <div class="guestsStayLength"><?=$home->quote->nights?> <?=plural('night', $home->quote->nights)?> / <?=$home->quote->guests?>  <?=plural('guest', $home->quote->guests)?></div>
                                <div class="ratesAndFees ftlWrap USD EUR">
                                    <div class="quoteHeader"></div>
                                    <table id="detailedQuote" class="detailedQuote">
                                        <tr class="hidden hiddenQuote">
                                            <td>Base rate x <?=$home->quote->nights?> <?=plural('night', $home->quote->nights)?></td>
                                            <td class="right convertible"> <?=$home->quote->subtotal_l?></td>
                                            <td class="extra">
                                                <div class="expandQuote collapse"></div>
                                            </td>
                                        </tr>
                                        <?php if($home->quote->fees):?>
                                        <tr class="hidden hiddenQuote">
                                            <td>Fees</td>
                                            <td class="right convertible"> <?=$home->quote->fees_l?></td>
                                            <td class="extra"></td>
                                        </tr>
                                        <?php endif;?>
                                        <?php if($home->quote->deposit):?>
                                        <tr class="hidden hiddenQuote">
                                            <td>Deposit</td>
                                            <td class="right convertible"> <?=$home->quote->deposit_l?></td>
                                            <td class="extra"></td>
                                        </tr>
                                        <?php endif;?>
                                        <?php if($home->quote->first_pay):?>
                                        <tr class="hidden hiddenQuote">
                                            <td>First payment</td>
                                            <td class="right convertible"> <?=$home->quote->first_pay_l?></td>
                                            <td class="extra"></td>
                                        </tr>
                                        <tr class="hidden hiddenQuote">
                                            <td style="font-size: 12px; color: #656565;" colspan="3">Owner requires payment in advanced for <?=$home->rates->deposit_rule?> nights plus the <?=$home->quote->deposit_l?> Security Deposit. Which will be <b>refunded on <?=$home->quote->end_l?></b></td>
                                        </tr>
                                        <tr class="hidden hiddenQuote">
                                            <td>Due on <?=$home->quote->first_pay_date?> </td>
                                            <td class="right convertible"> <?=$home->quote->last_pay_l?></td>
                                            <td class="extra"></td>
                                        </tr>
                                        <tr class="total">
                                            <td>Due now</td>
                                            <td class="right convertible">
                                                <?=$home->quote->first_pay_l?>
                                            </td>
                                            <td class="extra">
                                                 <div class="expandQuote expand"></div>
                                            </td>
                                        </tr>
                                        <?php else:?>
                                        <tr class="total">
                                            <td>Total</td>
                                            <td class="right convertible">
                                                <?=$home->quote->total_l?>
                                            </td>
                                            <td class="extra">
                                                 <div class="expandQuote expand"></div>
                                            </td>
                                        </tr>
                                        <?php endif;?>
                                    </table>
                                </div>
                                <div class="currencyFlyoutContainer" style="padding: 10px;">
                                    <div class="whyCurrency" style="float:inherit">
                                        Have a voucher code?
                                    </div>
                                    <table id="voucher" class="detailedQuote hidden">
                                        <tr>
                                            <td class="left convertible" style="width: 70%">
                                                <input style="height: 25px;"  id="code" class="inputField inputFieldHalf tabable" type="text" name="voucher" /></td>
                                            <td class="right convertible" style="width: 30%">
                                                <button style="width: 100%;" id="applyVoucher" class="ui_button original" data-tracking="ClickSubmitCardPayment" data-action="submitVault">
                                                    Apply
                                                </button>
                                            </td>
                                        </tr>
                                    </table>
                                    
                                </div>
                            </div>
                        </DIV>
                    </div>
                    <br>
                    <br>
                    <div class="ButtonTop detailsContainer">
                        <div style="padding: 18px 10px;">
                            <div class="SMSText">
                                <input type="checkbox" id="requestSMS" name="requestSMS" value="true" checked>
                                <label for="requestSMS" class="smsLabel">Receive text messages about your inquiry, booking and offers on top attractions near your rental (you can opt out at any time).</label>
                            </div>
                            <div class="formLine submitLine wrap hidden" id="submitDiv">
                                <div>
                                    <div class="buttonWrapper">
                                        <button style="width: 100%;" id="submitButton" class="ui_button original submitButton" data-tracking="ClickSubmitCardPayment" data-action="submitVault">
                                            <span class="lock"></span> Book Now
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="formLine submitLine wrap" id="validateDiv">
                                <div>
                                    <div class="buttonWrapper">
                                        <button style="color:#ffff; width: 100%; border-color: #00a680 #00755a  #00755a  #00a680; background-color: #00a680;" id="validateButton" class="ui_button original validateButton" data-tracking="ClickSubmitCardPayment" data-action="submitVault">
                                            <span class="lock"></span> Validate Form
                                        </button>
                                    </div>
                                </div>
                            </div>  
                        </div>
                    </div>
                </div>
                
                <div id="main" class="main ">
                    <!--trkP:vr_responsive_payment_form-->
                    <!-- PLACEMENT vr_responsive_payment_form -->
                    <DIV ID="taplc_vr_responsive_payment_form_0" class="ppr_rup ppr_priv_vr_responsive_payment_form" data-placement-name="vr_responsive_payment_form">
                        <div id="paymentFormContainer" class="TA">
                            <form method="POST" id="bookingRequestForm" class="bookingForm">
                                <div class="section paymentInfo">
                                    <div class="title">
                                        <div class="titleNumber arrow-right">1</div>
                                        <span class="stepText">Your information</span>
                                        <div class="errorText" style="margin-top:10px; display: none;">Errors</div>
                                    </div>
                                    
                                    <div class="details">
                                        <div class="inquiryInputs">
                                            <div id="logInComponent">
                                                <DIV class="prw_rup prw_vr_payment_user_input" data-prwidget-name="vr_payment_user_input" data-prwidget-init="handlers">
                                                    <div class="formLine wrap nameAndNumber">
                                                        <div class="wrap inputWrapper">
                                                            <label class="inputLabel" for="renterFullName">Your full name
                                                                <span class="formRequired">*</span>
                                                            </label>
                                                            <input value="<?=$user->name?>" placeholder="Your name" id="renterFullName" class="inputField inputFieldHalf tabable" type="text" name="name" required />
                                                        </div>
                                                        <div class="phone wrap inputWrapper last">
                                                            <label class="inputLabel" for="nationalNumber">Phone number
                                                                <span class="formRequired">*</span>
                                                            </label>
                                                            <div class="prw_rup prw_vr_phone_field" data-prwidget-name="vr_phone_field" data-prwidget-init="handlers">
                                                                <div class="smsAndPhone booking-quote-mobile-form" data-validator="BookingFormValidator">
                                                                    <div class="phone">
                                                                        <div id="countryCode" class="countryClass">
                                                                            <div class="selectContent select-content" id="select-content">+44</div>
                                                                            <span class="custom_dropdown_arrow"></span>
                                                                            <?php
                                                                            View::include('tripadvisor/inputs/countryCodeSelect')
                                                                            ?>
                                                                        </div>
                                                                        <input value="<?=$user->phone?>" placeholder="Phone number" type="tel" name="phone_sg" id="renterNumber" class="nationalNumber validate tabable ftlField" size="30" maxlength="32" class="phoneInput" placeholder="" />
                                                                        <input type="hidden" name="phone" id="phone" />
                                                                        <input type="hidden" name="phone_sg" id="phone_sg" />
                                                                        <input type="hidden" name="prefix_sg" id="prefix_sg" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="formLine wrap">
                                                        <div class="wrap inputWrapper">
                                                            <label class="inputLabel" for="email">E-mail address
                                                                <span class="formRequired">*&nbsp;</span>
                                                            </label>
                                                            <input value="<?=$user->email?>" placeholder="Email" id="renterEmail" class="inputField inputFieldHalf tabable" type="text" name="email" required/>
                                                        </div>
                                                    </div>

                                                    <div class="formLine wrap personalMessage inputWrapper">
                                                        <label class="inputLabel" for="address">Adress
                                                                <span class="formRequired">*&nbsp;</span>
                                                            </label>
                                                            <textarea placeholder="Please enter your full address" class="inputField inputFieldExLarge renterMessage tabable validate" name="address" id="renterAddress" required><?=($user->address ? $user->address : '')?></textarea>
                                                    </div>

                                                    <div class="formLine wrap personalMessage inputWrapper">
                                                        <label class="inputLabel" for="renterMessage">Personal message to <?=$home->host->name?>
                                                            <span class="formRequired">*</span>
                                                        </label>
                                                        <textarea placeholder="Please leave a message to the host" class="inputField inputFieldExLarge renterMessage tabable validate" name="message" id="renterMessage" data-required="Enter a message.">Hi! I’d love to come and stay from <?=$home->quote->start_l?> to <?=$home->quote->end_l?>. I look forward to hearing from you.</textarea>
                                                    </div>
                                                </DIV>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class=" paymentInputs section">
                                    <div class="title">
                                        <div class="titleNumber arrow-right">2</div>
                                        <span class="stepText">Payment details</span>
                                    </div>
                                    <DIV class="prw_rup prw_vr_payment_billing_inputs" data-prwidget-name="vr_payment_billing_inputs" data-prwidget-init="handlers">
                                        <div class="paymentTabContainer">
                                            <div class="vrTabs">
                                                <ul class="tabBar">
                                                    <li id="ccTab" class="paymentTab ui_input_radio selected">
                                                        <label><?= $home->payment->gateway ?></label>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="details cc  billing">
                                                <div id="ccTabContents" class="tabContainer ccTabContents">
                                                    <div class="content">
                                                        <div style="clear: both"></div>
                                                        <?= nl2br($home->payment->instructions) ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="summaryPadder"></div>
                                            <div style="clear: both"></div>
                                        </div>
                                    </DIV>
                                </div>
                                <div class="section submit last">
                                    <div class="title">
                                        <div class="titleNumber arrow-right">3</div>
                                        <span class="stepText">Review and book</span>
                                    </div>
                                    <DIV class="prw_rup prw_vr_payment_houseRules" data-prwidget-name="vr_payment_houseRules" data-prwidget-init="">
                                        <div>
                                            <div class="house-rules">
                                                <div class="sectionHeader">House rules </div>
                                                <p style="display: block; font-size: 14px; color: #656565;">
                                                    <?=$home->accommodation->host_rules?>
                                                </p>
                                                    
                                                </p>
                                                <div class="house-rules-bullets">
                                                    <ul class="house-rules-bullets-list">
                                                        
                                                        <li>Pets <?= ($home->accommodation->pets ? '' : 'not') ?> Allowed</li>
                                                        <li>Smoking <?= ($home->accommodation->pets ? '' : 'not') ?> Allowed</li>
                                                        <li><?= ($home->accommodation->pets ? '' : 'Not') ?> Kid-Friendly</li>
                                                    </ul>
                                                    <ul class="house-rules-bullets-list">
                                                        <li>Check in: Flexible</li>
                                                        <li>Check out: Flexible</li>
                                                        <li>Cancellation: <?= ($home->accommodation->cancellation) ?></li>
                                                    </ul>
                                                </div>
                                                <div class="house-rules-more"></div>
                                            </div>
                                        </div>
                                    </DIV>
                                    
                            </form>
                            </div>
                        </DIV>
                        <!--etk-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="ftl_footer" class="section" style="background-color: transparent !important; padding: 0 !important; box-shadow: none;">
        <p style="display: block; font-size: 12px; color: #656565;">
            This booking is facilitated by Holiday Lettings Ltd (part of the TripAdvisor group) but the booking is solely between you and the owner/manager. By clicking above, you agree to the house rules, booking conditions and cancellation policy of the owner/manager, as well as Holiday Lettings’ <a>terms and conditions</a> (which includes <a>chargeback policy</a>) and <a>privacy policy</a>.
        </p>

        <p style="display: block; font-size: 12px; color: #656565;">
            By clicking above, you will become a TripAdvisor member and agree to TripAdvisor’s <a>privacy policy</a> and <a>terms of use</a>. Although Holiday Lettings facilitates your booking, your payment may be processed by another group company, e.g. FlipKey Inc., on behalf of Holiday Lettings.
        </p>
        <hr/>
        <p style="display: block; font-size: 12px; color: #656565;">
            &copy;
            <?=date('Y')?> TripAdvisor
        </p>
    </div>
</div>
</div>
