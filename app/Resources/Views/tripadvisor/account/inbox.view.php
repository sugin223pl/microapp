    <style>
        .railDivider {
            display: inline-block;
            width: 100%;
            height: 1px;
            background-color: #DBDBDB;
        }
        DIV.prw_rup.prw_vr_inbox_notificationCell .blue_notification {
            display: inline-block;
            background: url("<?=assets('/img2/vacationrentals/check_icon_white.png', $home->app->cdn)?>");
            background-image: url("<?=assets('/img2/vacationrentals/check_icon_white.svg', $home->app->cdn)?>"), none;
            background-repeat: no-repeat;
            background-size: 40px 40px;
            width: 42px;
            height: 42px;
        }
        DIV.prw_rup.prw_vr_inbox_notificationCell .white_alert {
            display: inline-block;
            background: url('<?=assets('/img2/vacationrentals/white_alert.png', $home->app->cdn)?>');
            background-image: url('<?=assets('/img2/vacationrentals/white_alert.svg', $home->app->cdn)?>'), none;
            background-repeat: no-repeat;
            background-size: 40px 40px;
            width: 42px;
            height: 42px;
        }
        DIV.prw_rup.prw_vr_inbox_notificationCell .notificationCell .white_countdown_clock {
            display: inline-block;
            background: url('<?=assets('/img2/vacationrentals/white_stop_watch_whole.png', $home->app->cdn)?>');
            background-image: url('<?=assets('/img2/vacationrentals/white_stop_watch_whole.svg', $home->app->cdn)?>'), none;
            background-repeat: no-repeat;
            background-size: 175px 75px;
            width: 177px;
            height: 77px;
        }
        @media (max-width: 767px) {
            DIV.ppr_rup.ppr_priv_vr_lander_blog_link .blogLinkText {
                width: 100%;
            }
            .no-mobile {
                display: none;
            }
            .vrPropertyPhotoScroll {
                width:100%;
                height:auto
            }
        }
        @media (min-width: 767px) {
            .vrPropertyPhotoScroll {
                width:314px;
                height:236px
            }
            DIV.ppr_rup.ppr_priv_vr_lander_blog_link .blogLinkText {
                width: 33%;
            }
        }
        
    </style>
    <div id="vr_ftl_inbox_2016" class="vr_ftl_inbox_2016">
        <?php if($user->has_booking):?>
        <div class="threadStatus no-mobile">
            <div id="taplc_vr_inbox_thread_status_0" class="ppr_rup ppr_priv_vr_inbox_thread_status" data-placement-name="vr_inbox_thread_status">
                <div class="TA">
                    <div class="inboxThreadFlow">
                        <div class="stateItem">
                            <div class="statusIcon ui_icon bubble-rating-full">
                                <div class="popoverHolder ">
                                </div>
                                <div class="statusLine-right completed"></div>
                            </div>
                            <div class="statusTitle completed">
                                Booking request sent
                            </div>
                        </div>
                        <div class="stateItem">
                            <div class="statusIcon ui_icon <?=$booking->confirmed ? 'bubble-rating-full' : 'exclamation-circle'?>">
                                <div class="popoverHolder showPopover">
                                </div>
                                <div class="statusLine-right <?=$booking->confirmed ? 'completed' : 'incompleted'?>"></div>
                            </div>
                            <div class="statusTitle <?=$booking->confirmed ? 'completed' : 'incompleted'?>">
                                Owner accepts
                            </div>
                        </div>
                        <div class="stateItem">
                            <div class="statusIcon ui_icon <?=$booking->confirmed ? 'exclamation-circle' : 'bubble-rating-empty'?>">
                                <div class="popoverHolder ">
                                </div>
                                <div class="statusLine-right incompleted"></div>
                            </div>
                            <div class="statusTitle incompleted">
                                Pay balance
                            </div>
                        </div>
                        <div class="stateItem">
                            <div class="statusIcon ui_icon bubble-rating-empty">
                                <div class="popoverHolder ">
                                </div>
                            </div>
                            <div class="statusTitle incompleted">
                                Booked
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php else:?>
        <div class="threadStatus no-mobile">
            <div id="taplc_vr_inbox_thread_status_0" class="ppr_rup ppr_priv_vr_inbox_thread_status" data-placement-name="vr_inbox_thread_status">
                <div class="TA">
                    <div class="inboxThreadFlow">
                        <div class="stateItem">
                            <div class="statusIcon ui_icon bubble-rating-full">
                                <div class="popoverHolder ">
                                </div>
                                <div class="statusLine-right completed"></div>
                            </div>
                            <div class="statusTitle completed">
                                Booking request sent
                            </div>
                        </div>
                        <div class="stateItem">
                            <div class="statusIcon ui_icon exclamation-circle">
                                <div class="popoverHolder showPopover">
                                </div>
                                <div class="statusLine-right incompleted"></div>
                            </div>
                            <div class="statusTitle incompleted">
                                Owner accepts
                            </div>
                        </div>
                        <div class="stateItem">
                            <div class="statusIcon ui_icon bubble-rating-empty">
                                <div class="popoverHolder ">
                                </div>
                                <div class="statusLine-right incompleted"></div>
                            </div>
                            <div class="statusTitle incompleted">
                                Pay balance
                            </div>
                        </div>
                        <div class="stateItem">
                            <div class="statusIcon ui_icon bubble-rating-empty">
                                <div class="popoverHolder ">
                                </div>
                            </div>
                            <div class="statusTitle incompleted">
                                Booked
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <div class="inboxDetailFrame">
            <?php if($user->has_booking):?>
            <div class="mainColumn">
                <div class="prw_rup prw_vr_inbox_notificationCell" data-prwidget-name="vr_inbox_notificationCell" data-prwidget-init="handlers">
                    <div class="notificationCell hasClock TA ">
                        <span class="notificationImage">
                            <span class="<?=$booking->confirmed ? 'blue_notification' : 'white_alert'?>"></span>
                        </span>
                        <span class="contentContainer">
                            <span id="inboxDetailAlertText" class="notificationText">
                                <span class="headingText">Thank you for your booking request #<?=$booking->code?></span>
                                <span class="bodyText">This property is currently available on our site, but don't worry - you can still contact the owner to discuss your booking via your inbox. For further help, see our <a href="https://www.tripadvisorsupport.com/hc/en/articles/115000305567" target="_blank">FAQ</a>
                            </span>
                        </span>
                        <span class="clearBoth"></span>
                        <div id="inboxAlertBoxRightContent" class="inboxAlertBoxRightContent clearBoth">
                            <a href="<?=$booking->home->url . '/s/'.$user->booking_id.'/BookingStatus'?>">
                                <span class="ui_button original large clearBoth actionButton">View Booking Request</span>
                            </a>
                        </div>
                        <div id="statusClock" class="statusClock fr">
                            <span class="white_countdown_clock fr"></span>
                            <div class="clockGray clockTextContainer">
                                <?=$booking->confirmed ? 'Booking is' : 'Expires in'?>
                                <br><span style="<?=$booking->confirmed ? 'font-size: 14px; padding-top: 8px;' : ''?>" class="countdownClock" id="countdownClock">00:00:00</span></div>
                            <div class="clearBoth"></div>
                        </div>
                        </span>
                    </div>
                </div>
                <div class="conversationCells">
                    <div id="newMessages"></div>
                    <div class="prw_rup prw_vr_inbox_conversationCell" data-prwidget-name="vr_inbox_conversationCell" data-prwidget-init="handlers">
                        <div class="cell TA">
                            <div class="avatarContainer"><img src="<?= $user->avatar ?>"></div>
                            <div class="messageContainer">
                                <div class="nameAndDate"><span class="name"><?= $user->name ?></span><span class="sentDate"><?= $user->created_at ?></span></div>
                                <div class="messageHeader">Booking request for
                                    <a href="<?=$booking->home->slug?>" class="detailLink " target="_blank "><?=$booking->home->name?></a>
                                </div>
                                <div class="datesGuests "><?=$booking->checkin?> - <?=$booking->checkout?> - <?=$booking->booking->guests?>  <?=ucfirst(plural('guest', $booking->booking->guests))?></div>
                                <div class="messageCellBody ">
                                    <?=nl2br($booking->booking->message)?>
                                </div>
                                <div class="messageButtons <?=$booking->confirmed ? '' : 'hidden'?>">
                                    <div class="ui_button original large messageButton">View Payment Details</div>
                                </div>
                                <div class="clearBoth"></div>
                                <div class="paymentInfo" style="display:none;">
                                    <div class="railDivider"></div>
                                    <div style="padding-top:10px;" class="messageHeader">
                                        Payment informations
                                    </div>
                                    <div class="nameAndDate">
                                        <span class="name">
                                        <?=($booking->home->payment->name); ?>
                                        </span>
                                    </div>
                                    <div class="messageCellBody">
                                        <?=($booking->home->payment->details); ?>
                                    </div>
                                    <div class="name">
                                        Here are the payment instructions.
                                        <?=($booking->home->payment->instructions); ?>
                                    </div>
                                    <div class="name">
                                        DUE NOW: <span style="font-weight: 700;font-size: 16px;line-height: 20px;color: #000a12;"><?=($booking->due_now); ?></span>
                                    </div>
                                </div>
                                
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div style="margin: 0;padding: 0;" class="ppr_rup ppr_priv_vr_lander_blog_link">
                    <div style="margin: 0; background: url('<?=$booking->home->img?>') no-repeat center center;-webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover;padding: 0;margin-top: 48px;border-radius: 2px;" class="blogLink">
                        <div style="display: inline-block;text-align: center;font-size: 20px;line-height: 24px;color: #00a680;background-color: rgba(255, 255, 255, 0.9);padding-top: 70px;min-height: 260px;" class="blogLinkText">
                            <div style="margin-bottom: 12px;padding: 0 20px;font-weight: bold;font-size: 28px;line-height: 32px;" class="blogLinkTextSection blogLinkTextTop">TripAdvisor
                                <br>Costomer Support 24/7</div>
                            <div style="margin-bottom: 12px;padding: 0 20px;color: #4a4a4a;" class="blogLinkTextSection blogLinkTextBottom">
                            Payment Confirmation, ID Verification, etc..</div>
                            <a style="    text-align: center;font-size: 20px;line-height: 24px;color: #00a680;" href="<?= $home->url . '/s/'.$booking->code.'/RentalsSupport'?>">
                                <div class="ui_button large secondary">Contact Support</div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="rightRail ">
                <!--trkP:vr_inbox_right_rail-->
                <!-- PLACEMENT vr_inbox_right_rail -->
                <div id="taplc_vr_inbox_right_rail_0 " class="ppr_rup ppr_priv_vr_inbox_right_rail " data-placement-name="vr_inbox_right_rail ">
                    <div class="inboxRightRail TA ">
                        <span class="photoContainer ">
                            <div class="prw_rup prw_vr_listings_photo_scroll " data-prwidget-name="vr_listings_photo_scroll " data-prwidget-init="handlers ">
                                <div class="vrPropertyPhotoScroll">
                                    <img class="vrPropertyPhoto default " src="<?=$booking->home->img?>" itemprop="image " alt=" ">
                                </div>
                            </div>
                        </span>
                        <div class="ftlPropertyInfo ">
                            <div class="propertyName ">
                            <?=$booking->home->name?>
                            </div>
                            <div class="clearBoth divider "></div>
                            <div class="clearBoth divider "></div>
                            <div class="ftlPropertyDetails ">
                            <?=$home->accommodation->bedrooms?> BR / <?=$home->accommodation->bathrooms?> BA / Sleeps <?=$home->accommodation->guests?>
                            </div>
                            <div class="clearBoth divider "></div>
                            <div class="interestDetails ">
                                <?=$booking->checkin?> - <?=$booking->checkout?>
                            </div>
                            <div class="clearBoth divider "></div>
                        </div>
                        <div class="ftlOwnerInfo ">
                            <div class="heading ">
                                About the manager
                            </div>
                            <span class="ownerImgContainer ">
                                <a>
                                    <img class="ownerImg " src="<?=$booking->home->host->img?>">
                                </a>
                            </span>
                            <span class="ownerDetails ">
                                <span class="name "><?=$booking->home->host->name?></span>
                                <div class="languages ">Languages spoken: English, Spanish, Italian</div>
                                <div class="creationDate ">Listed since <?= \Carbon\Carbon::parse($home->host->date->date)->format('F Y')?></div>
                            </span>
                            <div class="clearBoth "></div>
                        </div>
                        <div class="railDivider "></div>
                        <div class="legalText ">
                            In this Inbox, we use "TripAdvisor " to refer to any TripAdvisor Vacation Rentals company you book your stay through: Holiday Lettings, FlipKey or Niumba.
                        </div>
                        <div class="railDivider "></div>
                    </div>
                </div>
            </div>
            <?php else:?>
            <div class="ui_column is-12">
                <div style="position: relative; padding: 24px;border-width: 1px;border-style: solid;border-color: #e5e5e5; border-radius: 2px;background-color: #fff;box-sizing: border-box;" class="ui_card section message">
                    <div style="max-width: 920px;margin: auto;padding: 24px 0;box-sizing: border-box;text-align: center;" class="social-profile-NoContentMessaging__messageContainer--X_Tkq">
                        <div style="margin: 0 0 8px;font-size: 20px;line-height: 24px;font-weight: 700;color: #000a12; padding: 0;text-align: center;" class="social-profile-NoContentMessaging__messageTitle--1cv2F">
                            You have no bookings with TripAdvisor
                        </div>
                        <span style="font-size: 16px;line-height: 20px;color: #767676;text-align: center;" class="social-profile-NoContentMessaging__messageDescription--3Chpg">
                        Book a vacation rental in more than 200 countries. Discover full home rentals, condos, villas, beach rentals, cabins, cottages and more. Thanks to Payment Protection and millions of reviews, you can feel confident booking on TripAdvisor.
                        </span>
                    </div>
                </div>
            </div>
            <div style="margin: 0;padding: 0;" class="ppr_rup ppr_priv_vr_lander_blog_link">
                <div style="margin: 0; background: url(<?=assets('/img2/lander/lander-blog-link-95.jpg', $home->app->cdn)?>) no-repeat center center;-webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover;padding: 0;margin-top: 48px;border-radius: 2px;" class="blogLink">
                    <div style="display: inline-block;text-align: center;font-size: 20px;line-height: 24px;color: #00a680;background-color: rgba(255, 255, 255, 0.9);padding-top: 70px;min-height: 260px;" class="blogLinkText">
                        <div style="margin-bottom: 12px;padding: 0 20px;font-weight: bold;font-size: 28px;line-height: 32px;" class="blogLinkTextSection blogLinkTextTop">TripAdvisor
                            <br>Vacation Rentals Blog </div>
                        <div style="margin-bottom: 12px;padding: 0 20px;color: #4a4a4a;" class="blogLinkTextSection blogLinkTextBottom">Travel tips, stories and inspiration </div>
                        <a style="text-align: center;font-size: 20px;line-height: 24px;color: #00a680;" href="https://www.tripadvisor.com/VacationRentalsBlog/">
                            <div class="ui_button large secondary">Visit our Blog </div>
                        </a>
                    </div>
                </div>
            </div>
            <?php endif;?>
            <div class="clearingDivider "></div>
        </div>
    </div>
</div>
<?php if($user->has_booking):?>
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
    <?php endif; ?>
    <script src="//code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script>
    $('.messageButton').click(function() {
        $(this).toggle('slow');
        $('.paymentInfo').toggle('slow');
    })
    </script>
<?php endif; ?>