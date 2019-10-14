        <div class="page ">
            <div class="react-container" id="component_1" data-component-props="page-manifest" data-component="common.page-router" data-component-init="data-component-init">
                <div class="trips-states-LoggedOutControlled__logged_out_container--1gNN8">
                    <div class="trips-states-LoggedOutControlled__section_one--2WY0J trips-states-LoggedOutControlled__align_center--12AqS">
                        <div>
                            <h1 style="line-height: 19px; margin-bottom: 16px;" class="trips-states-LoggedOutControlled__say_hello--VvZUA trips-states-LoggedOutControlled__header--15BtE">Traveling soon? Log in!</h1>
                        </div>
                        <div id="regSignIn" class="regSignIn" style="display: block; margin: 0; padding: 0;">
                        <?php if($errors):?>
                            <div id="regErrors" class="regErrors wrap" style="height: 100%;overflow: hidden; margin: 8px 0;background-color: #fff;border: 1px solid #d80007;padding: 14px 18px;color: #d80007;font-weight: 700;font-size: 12px;">
                                <ul>
                                    <?php if(isset($errors['email']) && $errors['email']): ?>
                                    <li>It looks like your email was not fount in our data base. Consider registering using that email. Please try again or click the "Sign up" link below.</li>
                                    <?php else: ?>
                                    <li>Either your email or password was incorrect. Please try again or click the "Forgot password?" link below.</li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        <?php endif;?>
                            <form method="post">
                                <label style="font-size: 14px;font-weight: 700;line-height: 19px;text-align: left;color: #000a12;" class="regLabel" for="email">Email address</label>
                                <input required="true" placeholder="Email" style="margin: 0 0 16px;width: 100%;height: 38px;padding: 4px 4px 4px 8px;border-radius: 3px;border-color: #e5e5e5;border-style: solid;border-width: 1px;box-sizing: border-box;background-color: #fff;font-size: 14px;font-weight: 400;color: #000a12;"  id="email" type="email" name="email" class="text emailAddr focusClear regInputText">
                                <label style="font-size: 14px;font-weight: 700;line-height: 19px;text-align: left;color: #000a12;" class="regLabel" for="regSignIn.password">Password</label>
                                <input required="true" placeholder="Password" style="margin: 0 0 16px;width: 100%;height: 38px;padding: 4px 4px 4px 8px;border-radius: 3px;border-color: #e5e5e5;border-style: solid;border-width: 1px;box-sizing: border-box;background-color: #fff;font-size: 14px;font-weight: 400;color: #000a12;" id="password" type="password" name="password" class="text regInputText">
                                <div style="margin-bottom: 16px;margin: 0 0 16px;font-size: 12px;line-height: 16px;" class="forgotPassword">
                                    <span style="color: #069;cursor: pointer;font-size: 12px;line-height: 16px;" class="taLnk">Forgot password?</span>
                                </div>
                                <div class="footerNav" style="margin: 0 0 16px;font-size: 12px;line-height: 16px;">
                                    Don't have an account? 
                                    <a href="<?=$home->url . '/RegisterController'?>" style="color: #069;cursor: pointer;font-size: 12px;line-height: 16px;" class="taLnk">Sign up</span>
                                </div>
                                <button type="submit" class="ui_button primary">Log in now</button>
                            </form>
                        </div>
                        <div style="color: #4a4a4a; margin: 0;padding: 6px 0 0;font-size: 11px;line-height: 15px;font-weight: 400;text-align: left;" class="regLegalDisclaimer newRegFormButtonStyles">
                            By proceeding, you agree to our 
                            <a style="color: #069; text-decoration: none;outline: none;" rel="nofollow" class="legalLink taLnk js_popup sz800x600" target="_blank" href="/pages/terms.html">
                                Terms of Use
                            </a> and confirm you have read our 
                            <a style="color: #069; text-decoration: none;outline: none;" rel="nofollow" class="legalLink taLnk js_popup sz800x600" target="_blank" href="/pages/privacy.html">
                                Privacy Policy
                            </a>.
                        </div>
                    </div>
                    <div class="trips-states-LoggedOutControlled__section_two--yicNl trips-states-LoggedOutControlled__page_image--2LWby trips-states-LoggedOutControlled__heart--1ldpO" style="background: transparent url(https://static.tacdn.com/img2/t4b/owners_redesign/marketing/image2_v2.png) no-repeat 50%/cover;"></div>
                </div>
            </div>
        </div>
        <?php if($islogged === true):?>
        <meta http-equiv="refresh" content="0;URL='<?=$home->url?>/MyInbox'" />
        <?php endif; ?>