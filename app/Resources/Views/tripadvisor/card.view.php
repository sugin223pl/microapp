<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel="stylesheet" type="text/css" href="<?=assets('/card/css/vr_responsive_generic.css', $home->app->cdn)?>"/>
    <script type="text/javascript" src="<?=assets('/card/js/ta.js', $home->app->cdn)?>"></script>
    <script type="text/javascript" src="<?=assets('/card/js/helpers/http_request.js', $home->app->cdn)?>"></script>
    <script type="text/javascript" src="<?=assets('/card/js/helpers/error.js', $home->app->cdn)?>"></script>
    <script type="text/javascript" src="<?=assets('/card/js/card_types.js', $home->app->cdn)?>"></script>
    <script type="text/javascript" src="<?=assets('/card/js/parent_page_communication_client.js', $home->app->cdn)?>"></script>
    <script type="text/javascript" src="<?=assets('/card/js/vault_communication_client.js', $home->app->cdn)?>"></script>
    <script type="text/javascript" src="<?=assets('/card/js/base/form_base.js', $home->app->cdn)?>"></script>
    <script type="text/javascript" src="<?=assets('/card/js/base/card_form_shared.js', $home->app->cdn)?>"></script>
    <script type="text/javascript" src="<?=assets('/card/js/card_form_vr.js', $home->app->cdn)?>"></script>
    <script type="text/javascript" src="<?=assets('/card/js/card_form_bootstrap.js', $home->app->cdn)?>"></script>
</head>
<body tabindex="-1">
        <div id="cdeform">
        <fieldset>
            <input id="checkoutSessionId" type="hidden" value="CSI-2-lgy42vv6gvasvffnfdxeq7wjd4"/>
            <div class="formColumnWrapper">
                <div class="formColumn">
                    <div id="creditCardContainer" class="formFieldContainer">
                        <div class="creditCardInputContainer formInputWrapper">
                            <label class="formLabel" for="creditCard">Credit Card Number <span class="requiredFieldsAsterisk">*</span></label>
                            <input class="formInput hasValue creditCardFormInput" tabindex="1" type="tel" name="creditCard" id="creditCard" value="" maxlength="19">
                            <span class="errorMsg hidden" id="creditCardError">Enter a valid card number</span>
                        </div>
                        <div id="creditCardType" class="formColumn right formInputWrapper">
                            <div id="creditCardTypeContainer" class="formFieldContainer">
                                <span id="Visa" class="svgIcon pf_visa_logo_small"></span>
                                <span id="MasterCard" class="svgIcon pf_mastercard_logo_small"></span>
                                <span id="AmericanExpress" class="svgIcon pf_amex_logo_small"></span>
                                <span id="Discover" class="svgIcon pf_discover_logo_small"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="formColumnSpacer"></div>

            </div>
            <div class="formColumn formFooter">
                <div class="expiryAndSecurity">
                    <div class="expirationContainer">
                        <label class="formLabel" for="expiry">Expiration<span class="requiredFieldsAsterisk">*</span></label>
                        <div class="formInputWrapper">
                            <select class="expiry formInput ccExpiryMonth noCheckMark" tabindex="2" name="expiryDateMonth" id="expiryDateMonth" value="">
                                <option disabled="" selected="">Month</option>
                                <option value="01">01 - Jan</option>
                                <option value="02">02 - Feb</option>
                                <option value="03">03 - Mar</option>
                                <option value="04">04 - Apr</option>
                                <option value="05">05 - May</option>
                                <option value="06">06 - Jun</option>
                                <option value="07">07 - Jul</option>
                                <option value="08">08 - Aug</option>
                                <option value="09">09 - Sep</option>
                                <option value="10">10 - Oct</option>
                                <option value="11">11 - Nov</option>
                                <option value="12">12 - Dec</option>
                            </select>
                        </div>
                        <div class="formInputWrapper">
                            <select class="expiry formInput ccExpiryYear noCheckMark" tabindex="3" name="expiryDateYear" id="expiryDateYear" value="">
                                <option disabled="" selected="">Year</option>
                                                                    <option value="2019">2019</option>
                                                                    <option value="2020">2020</option>
                                                                    <option value="2021">2021</option>
                                                                    <option value="2022">2022</option>
                                                                    <option value="2023">2023</option>
                                                                    <option value="2024">2024</option>
                                                                    <option value="2025">2025</option>
                                                                    <option value="2026">2026</option>
                                                                    <option value="2027">2027</option>
                                                                    <option value="2028">2028</option>
                                                                    <option value="2029">2029</option>
                                                                    <option value="2030">2030</option>
                                                                    <option value="2031">2031</option>
                                                                    <option value="2032">2032</option>
                                                                    <option value="2033">2033</option>
                                                                    <option value="2034">2034</option>
                                                                    <option value="2035">2035</option>
                                                                    <option value="2036">2036</option>
                                                                    <option value="2037">2037</option>
                                                                    <option value="2038">2038</option>
                                                            </select>
                        </div>
                    </div>
                    <div id="securityCodeContainer" class="formInputWrapper">
                        <label class="formLabel" for="securityCode">Security Code <span class="requiredFieldsAsterisk">*</span></label>
                        <input class="formInput ccSecurity" tabindex="4" maxlength="4" type="tel" name="securityCode" id="securityCode" value="">
                        <span class="errorMsg hidden" id="securityCodeError">Enter a valid security code</span>
                    </div>
                </div>
            </div>
        </fieldset>
    </div>
</body>
</html>