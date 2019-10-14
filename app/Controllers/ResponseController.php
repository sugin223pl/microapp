<?php
namespace App\Controller;
use Carbon\Carbon;
class ResponseController
{
    public static function HeadJson() {
        $data =  [
            "@context" => "",
            "@type" => "",
            "name" => "",
            "url" => "",
            "image" => "",
            "areaServed" => "",
            "description" => "",
            "aggregateRating" => [],
            "review" => []
         ];
         return json_encode($data);
    }
    public static function PageManifest($home, $csrf) {
        $photos = [];
        foreach($home->images as $no => $image) {
            $photos[] = [
                    "id" => $home->id.$no,
                    "locationId" => $home->id, "width" => 320, "sourceId" => "HL", "thumbnailUrl" => $image,
                    "uimediaType" => "photo", "attachedToReview" => null, "caption" => "", "sourceUrl" => $image,
                    "stdWidth" => 320, "stdHeight" => 240, "height" => 240, "flags" => 1, "largeUrl" => $image,
                    "landscape" => true, "panorama" => false, "legacy" => false, "bestResolutionSourceUrl" => $image,
                    "authorThumbnailUrl" => null, "thuHeight" => 36, "thuWidth" => 48, "uploadedDate" => null, "thumbsUpVotes" => 0, "shortPortrait" => false,
                    "primary" => true, "idealPrimaryPhoto" => true, "shape" => "LANDSCAPE", "shapeCode" => 1, "ts" => 1472430131821, "thumbHeight" => 36,
                    "thumbWidth" => 48, "largestHeight" => 600, "largestWidth" => 800, "blessedImage" => false, "damnedImage" => false, "sequence" => 0,
                    "parent" => null, "path" => "vr-splice-%SIZE%/02/11/b4/e3.jpg", "language" => "", "isPortrait" => false, "smallUrl" => $image,
                    "medUrl" => $image, "jumboUrl" => $image,
                    "description" => "Home Image " . $no
            ];
        }
        $amen = [
            "dsc_corporate" => ["hasFeature" => false, "localizedText" => "Corporate Bookings", "type" => "yn"], 
            "dsc_hiking" => ["hasFeature" => false, "localizedText" => "Hiking Trips", "type" => "yn"],
            "dsc_long_let" => ["hasFeature" => false, "localizedText" => "Long Term Rentals (Over 1 Month)", "type" => "yn"], 
            "dsc_short_rental" => ["hasFeature" => false, "localizedText" => "Short Term Rentals", "type" => "yn"],
            "dsc_city" => ["hasFeature" => false, "localizedText" => "City Getaway", "type" => "yn"],
            "dsc_nightlife" => ["hasFeature" => false, "localizedText" => "Good Nightlife", "type" => "yn"], 
            "dsc_bathrooms" => ["hasFeature" => false, "localizedText" => "# Of Bathrooms", "quantity" => $home->accommodation->bathrooms, "type" => "count"],
            "dsc_sleeps_max" => ["hasFeature" => false, "localizedText" => "Guest Count", "quantity" => $home->accommodation->guests, "type" => "count"],
            "amn_all_pets_temp" => ["hasFeature" => false, "localizedText" => "amn_all_pets_temp: ".$home->accommodation->pets ? 'YES': 'NO'."", "value" => $home->accommodation->pets ? 'YES': 'NO', "type" => "enum"], 
            "amn_children" => ["hasFeature" => false, "localizedText" => "amn_children: ".$home->accommodation->children ? 'YES': 'ASK'."", "value" => $home->accommodation->children ? 'YES': 'ASK', "type" => "enum"],
            "dsc_bedrooms" => ["hasFeature" => false, "localizedText" => "Number Of Bedrooms", "quantity" => $home->accommodation->bedrooms, "type" => "count"], 
            "amn_double_bed" => ["hasFeature" => false, "localizedText" => "Beds:", "quantity" => $home->accommodation->bedrooms, "type" => "count"], 
            "amn_family_bathroom" => ["hasFeature" => false, "localizedText" => "Full Baths", "quantity" => $home->accommodation->bathrooms, "type" => "count"], 
            "amn_smoking_temp" => ["hasFeature" => false, "localizedText" => "amn_smoking_temp: ".$home->accommodation->smoking ? 'YES': 'NO'."", "value" => $home->accommodation->smoking ? 'YES': 'NO', "type" => "enum"], 
            "amn_single_bed" => ["hasFeature" => false, "localizedText" => "Beds", "quantity" => $home->accommodation->beds, "type" => "count"], 
            "amn_toilet_only" => ["hasFeature" => false, "localizedText" => "Half Baths (1)", "quantity" => 1, "type" => "count"], 
            "amn_elderly_temp" => ["hasFeature" => false, "localizedText" => "amn_elderly_temp: YES", "value" => "YES", "type" => "enum"], 
            "amn_lounge_seating" => ["hasFeature" => false, "localizedText" => "Living Room Seats (1)", "quantity" => 1, "type" => "count"], 
            "amn_wheelchair_temp" => ["hasFeature" => false, "localizedText" => "amn_wheelchair_temp: ASK", "value" => "ASK", "type" => "enum"],
        ];
        foreach($home->amenities as $amn) {
            $amnkey = str_replace('.png', '', $amn->filename);
            $amnkey = str_replace('-', '_', $amnkey);
            $amnkey = 'amn_' . $amnkey;
            $amen[$amnkey] = [
                "hasFeature" => true,
                "localizedText" => $amn->name, 
                "type" => "yn"
            ];
        }
        // Original Amenities
        // $amn = [
        //     "amn_stove" => ["hasFeature" => true, "localizedText" => "Stove", "type" => "yn"], 
        //     "amn_baby_monitor" => ["hasFeature" => true, "localizedText" => "Baby Monitor", "type" => "yn"],
        //     "amn_fridge" => ["hasFeature" => true, "localizedText" => "Refrigerator", "type" => "yn"],  
        //     "amn_central_heating" => ["hasFeature" => true, "localizedText" => "Central Heating", "type" => "yn"], 
        //     "amn_washing_machine" => ["hasFeature" => true, "localizedText" => "Washer", "type" => "yn"], 
        //     "amn_towels_provided" => ["hasFeature" => true, "localizedText" => "Towels Provided", "type" => "yn"], 
        //     "amn_freezer" => ["hasFeature" => true, "localizedText" => "Freezer", "type" => "yn"], 
        //     "dsc_cycling" => ["hasFeature" => true, "localizedText" => "Cycling Trips", "type" => "yn"], 
        //     "amn_satellite_tv" => ["hasFeature" => true, "localizedText" => "Cable/satellite TV", "type" => "yn"], 
        //     "amn_iron" => ["hasFeature" => true, "localizedText" => "Iron", "type" => "yn"], 
        //     "amn_hairdryer" => ["hasFeature" => true, "localizedText" => "Hairdryer", "type" => "yn"], 
        //     "amn_stereo" => ["hasFeature" => true, "localizedText" => "Stereo System", "type" => "yn"], 
        //     "amn_dining_seating" => ["localizedText" => "Dining Seats (2)", "quantity" => 2, "type" => "count"], 
        //     "amn_tv" => ["hasFeature" => true, "localizedText" => "TV", "type" => "yn"], 
        //     "amn_mircowave" => ["hasFeature" => true, "localizedText" => "Microwave", "type" => "yn"],
        //     "amn_linens_provided" => ["hasFeature" => true, "localizedText" => "Linens Provided", "type" => "yn"], 
        //     "amn_wifi" => ["hasFeature" => true, "localizedText" => "Wi-Fi", "type" => "yn"], 
        //     "amn_kettle" => ["hasFeature" => true, "localizedText" => "Kettle", "type" => "yn"], 
        //     "amn_internet_access" => ["hasFeature" => true, "localizedText" => "Internet Access", "type" => "yn"],
        //     "amn_toaster" => ["hasFeature" => true, "localizedText" => "Toaster", "type" => "yn"]
        // ];
        $data = [
            "assets" => [], "bundles" => [], "redux" => [
                "i18n" => [
                    "locale" => "en_US", "language" => $home->accommodation->language, "ietfLocale" => "en-US", "isRtl" => false,
                    "currencyCode" => $home->currency->code, "distanceUnit" => "MILES"
                ],
                "api" => [
                    "requests" => [
                        "_data_1_0_vr_rental_6122191" => ["loading" => false, "result" => ["/data/1.0/vr/rental/6122191"], "url" => "/data/1.0/vr/rental/6122191"], "_data_1_0_vr_rental_calendarData_6122191" => [
                            "loading" => false, "result" => ["/data/1.0/vr/rental/calendarData/6122191"], "url" => "/data/1.0/vr/rental/calendarData/6122191"
                        ], "_data_1_0_vr_similarGeos_190454" => ["loading" => false, "result" => ["/data/1.0/vr/similarGeos/190454"], "url" => "/data/1.0/vr/similarGeos/190454"], "_data_1_0_vr_detailBreadcrumbs_6122191" => [
                            "loading" => false, "result" => ["/data/1.0/vr/detailBreadcrumbs/6122191"], "url" => "/data/1.0/vr/detailBreadcrumbs/6122191"
                        ], "_data_1_0_tagQuestions_6122191" => ["loading" => false, "result" => ["/data/1.0/tagQuestions/6122191"], "url" => "/data/1.0/tagQuestions/6122191"]
                    ],
                    "responses" => [
                        "/data/1.0/vr/rental/calendarData/6122191" => [
                            "data" => [
                                "startDate" => "2019/10/01",
                                "endDate" => "2021/05/31", "bookedBits" => [], "lastUpdated" => "2019/09/21"
                            ],
                            "error" => null
                        ],
                        "/data/1.0/vr/similarGeos/190454" => [
                            "data" => [], "error" => null
                        ],
                        "/data/1.0/vr/detailBreadcrumbs/6122191" => [
                            "data" => [], "error" => null
                        ], "/data/1.0/vr/rental/6122191" => [
                            "data" => [
                                "titleInfo" => null, "vrSource" => "HL", "isTravelersChoice" => false,
                                "travelersChoiceModel" => [
                                    "hasClick" => false, "locid" => 0, "pid" => 0, "css" => null, "url" => "/TravelersChoice", "trackData" => null,
                                    "lookbackServlet" => null, "tcImagePath" => null, "text" => null, "sponsoredListing" => null, "toolTip" => null, "icon" => false,
                                    "header" => "/img2/awards/TC_2018_WHITE_L_R_rb.png", "type" => "tc"
                                ], "numOfReviews" => $home->revcount, "isMachineTranslatedHostingStyle" => false, "isMachineTranslatedMarkupFeatureEnabled" => true,
                                "hostingStyleMachineTranslator" => null, "overidePartnerImageAltText" => false, "managerPhotoUrl" => "",
                                "rentalType" => $home->accommodation->room . ' / ' . $home->accommodation->building,
                                "listingLink" => null,
                                "defaultSeasonalRate" => [
                                    "weekendRate" => $home->rates->weekly, "startDate" => "Oct 1, 2018",
                                    "endDate" => "Sep 30, 2022", "minStay" => $home->accommodation->min_stay, "monthlyRate" => $home->rates->monthly, "cost" => $home->rates->nightly, "isDefault" => true
                                ],
                                "baseDailyRate" => $home->rates->nightly,
                                "providerOrdinal" => 0, "canReceiveInquiries" => true, "rentalSource" => ["termsAndConditionsUrl" => "T25LX2h0dHBzOi8vd3d3LmhvbGlkYXlsZXR0aW5ncy5jby51ay9jb250ZW50L3Rlcm1zXzdBQQ=="],
                                "requiresPetInput" => false, "isAffiliate" => false,
                                "bathCount" => $home->accommodation->bathrooms,
                                "sleepCount" => $home->accommodation->guests,
                                "hasCOE" => true,
                                "recentViewCount" => 78,
                                "averageRatingNumber" => 5,
                                "geoCoordinate" => ["lat" => $home->location->lat, "lon" => $home->location->lng],
                                "parentGeo" => ["name" => "Viennale", "url" => "#", "id" => 190454], "contactManagerUrl" => "Iw==",
                                "externalId" => "286494",
                                // OWNER
                                "propertyManager" => [
                                    "payPerLeadDirect" => false, "id" => $home->host->id, "establishedDate" => Carbon::parse($home->host->date->date)->format('Y-m-d'),
                                    "respondedPercentage" => 100, "isRbo" => true, "typeValue" => 3, "localizedResponseTimeString" => "Within a few hours",
                                    "localizedLanguages" => "English, Italian, Spanish", "obfuscatedLanderUrl" => "aHR0cHM6Ly93d3cuZ29vZ2xlLmNvbQ==",
                                    "managerType" => "OWNER", "name" => $home->host->name
                                ],
                                "phoneNumber" => null,
                                "thumbnailUrl" => $home->host->img,
                                "photos" => $photos, "contactManagerUrlWithDates" => "aHR0cHM6Ly93d3cuZ29vZ2xlLmNvbT9xPU1hbmFnZXI=",
                                "isExactMap" => true, "nearbyGeos" => [
                                    [
                                        "anchorText" => $home->host, "url" => "/".$home->id,
                                        "localizedCount" => "2,894"
                                    ]
                                ], "isIndexable" => true, "paymentStats" => [
                                    "totalTips" => 74, "paidTips" => 70, "totalPayments" => 106, "lastYearInquiryCount" => 29,
                                    "lastYearBookingsCount" => 15, "lastYearSameDayResponseRate" => $home->rates->nightly
                                ], "minStay" => -1, "businessInfo" => [
                                    "subscriptionType" => "COMMISSION",
                                    "isFTL" => true, "isSTL" => true, "tipType" => "TIP_INSTANT_BOOK", "QandAListType" => "FTL_LIST_TYPE"
                                ], "isOnlineBookable" => true, "dailyRate" => $home->rates->nightly, "weeklyRate" => ($home->rates->weekly * 7), "bathroomInfo" => $home->accommodation->bathrooms . " Full " . plural('bathroom', $home->accommodation->bathrooms),
                                "bedroomInfo" => $home->accommodation->bedrooms . " " . plural('Bedroom', $home->accommodation->bedrooms), "features" => $amen, "roomCount" => $home->accommodation->bedrooms, "monthlyRate" => ($home->rates->monthly * 30), "formattedSourceID" => "#HL222286494", "supplierLogoSource" => assets('img2/vacationrentals/HL_Supplier_Logo.png', $home->app->cdn),
                                "seasonalRates" => [], "fees" => [], "rentalData" => [], "rateComment" => "For 2, 3 or 4 people the price is quoted in the list.

        For any additional person we charge EUR 20,--", "hostingStyle" => null, "descriptions" => [
                                    "RATE_COMMENT" => [
                                        "text" => "For 2, 3 or 4 people the price is quoted in the list.

        For any additional person we charge EUR 20,--", "status" => "OK", "lang" => $home->accommodation->language, "machineTranslatedSourceLang" => $home->accommodation->language, "machineTranslated" => false
                                    ], "NAME" => [
                                        "text" => $home->name,
                                        "status" => "OK", "lang" => $home->accommodation->language, "machineTranslatedSourceLang" => $home->accommodation->language, "machineTranslated" => false
                                    ], "OVERVIEW" => [
                                        "text" => strip_tags($home->summary, "\r\n"), "status" => "OK", "lang" => $home->accommodation->language, "machineTranslatedSourceLang" => $home->accommodation->language, "machineTranslated" => false
                                    ]
                                ], "showPhoneNumber" => false, "rawPhoneNumber" => null, "isAffiliateProperty" => false, "affiliateLogoUrl" => null,
                                "averageRating" => "4.5", "detailPageUrl" => "/VacationRentalReview",
                                "name" => $home->name, "id" => 6122191
                            ], "error" => null
                        ], "/data/1.0/tagQuestions/6122191" => [
                            "data" => [
                                "questions" => [
                                    ["question" => "Is this vacation rental <span>large?</span>", "id" => 19296], ["question" => "Are there <span>nightlife options</span> close to this vacation rental? ", "id" => 19264], ["question" => "Does this rental have a <span>private beach?</span>", "id" => 19268], ["question" => "Does this rental provide <span>access to a beach?</span>", "id" => 19269], ["question" => "Does this vacation rental have a <span>desk?</span>", "id" => 19274], ["question" => "Does this vacation rental have a <span>dining room?</span>", "id" => 19275], ["question" => "Does this vacation rental have a <span>fenced-in yard?</span>", "id" => 19276], ["question" => "Does this vacation rental have a <span>library?</span>", "id" => 19277], ["question" => "Does this vacation rental have a <span>loft?</span>", "id" => 19278], ["question" => "Does this vacation rental have a <span>steam room?</span>", "id" => 19281]
                                ], "locationId" => 6122191, "securityToken" => "TNI1625!ALdLLb9Fv1mBYdIgjAUacrXyEF3AiDr0dcJhJwj59y9cAjYIv6nnN2QJmFgcCWmzGs8deu1OiBZU6QCpLkxsmB+RQRKKJGZcWjcIsWLHXlLK3n0dkf+wu7eT01FCUY+fcpK8l/PcZQZnEk0+UvIDckkyT2BN+3MvX5/udq4+nM7q",
                                "userReviewUrl" => "/UserReview"
                            ], "error" => null
                        ]
                    ]
                ], "page" => ["name" => "LOCATION_DETAIL", "geoId" => 190454, "detailId" => 6122191, "crossSells" => null], "travelerInfo" => [
                    "hotels" => null,
                    "vr" => ["start" => null, "end" => null, "adults" => 2, "children" => 0], "attractions" => ["singleDate" => "", "fromDate" => "", "toDate" => "", "attractionPaxAdults" => 0, "attractionPaxChildren" => 0], "restaurants" => ["date" => "2019-10-02", "time" => "8:00 PM", "partySize" => "2", "isDefault" => false, "displayDate" => "Wed, 10/2"]
                ], "auth" => [
                    "isMember" => false, "csrfToken" => $csrf,
                    "altSessId" => "54E51D569FC4DCDCC1C2BCC2C1929A9E", "loggedInUserId" => null, "captcha" => null, "fbApi" => [
                        "apiVersion" => "v3.2",
                        "facebookConnectApiKey" => "f1e687a58f0cdac60b7af2317a5febb3", "facebookConnectAppId" => "162729813767876",
                        "facebookConnectAppName" => "tripadvisor", "taServerTime" => 1569968009, "skipFacebookSessionCheck" => false, "sdkUrl" => "//connect.facebook.net/en_US/sdk.js",
                        "facebookPermissions" => "email,user_hometown,user_friends,user_likes,user_location,user_status,user_photos"
                    ]
                ], "route" => ["geo" => "190454", "detail" => "6122191", "page" => "VacationRentalReview"], "overlays" => ["global" => null, "fab" => null, "locals" => [], "toasts" => []], "meta" => [
                    "initialServletName" => "VacationRentalReview", "device" => [
                        "viewportCategory" => "DESKTOP",
                        "userAgentCategory" => "DESKTOP", "os" => ["family" => "UNKNOWN", "majorVersion" => -1], "browser" => ["family" => "UNKNOWN", "majorVersion" => 0]
                    ], "readonlyMode" => false, "initialRelativeUrl" => "/VacationRentalReview",
                    "initialAbsoluteUrl" => "https://www.tripadvisor.com/VacationRentalReview",
                    "baseUrl" => "https://www.tripadvisor.com", "imageCdnUrl" => assets('/', $home->app->cdn), "cookieDomain" => ".tripadvisor.com",
                    "taUnique" => "web354b.86.123.53.56.16D8962AEB7", "isTaReferrer" => false, "referrerUrl" => null, "forceFullSite" => false,
                    "environment" => "Live", "isNativeWebview" => false, "commerceCountryId" => 294457, "impressionData" => ["pageLoadUid" => "XZPPiAoQL2cAAASXFFwAAACQ"], "lineItemsByLoc" => []
                ], "tracking" => [
                    "mcid" => 0, "uid" => "XZPPiAoQL2cAAASXFFwAAACQ", "analytics" => [
                        "cv" => [
                            ["_deleteCustomVar", 1], ["_deleteCustomVar", 47], ["_setCustomVar", 11, "Detail", $home->slug, 3], ["_setCustomVar", 12, "Country", "Austria-190410", 3], ["_setCustomVar", 19, "Region", "Vienna Region-190453", 3], ["_setCustomVar", 25, "Continent", "Europe-4", 3], ["_setCustomVar", 13, "Geo", "Vienna-190454", 3], ["_setCustomVar", 20, "PP", "--", 3], ["_deleteCustomVar", 14], ["_deleteCustomVar", 8], ["_deleteCustomVar", 10]
                        ], "url" => "/VacationRentalReview"
                    ], "searchSessionId" => "106A9FC219DF9DC96209DF4C8539D1BC1569968009033ssid", "sessionId" => "106A9FC219DF9DC96209DF4C8539D1BC",
                    "uniqueId" => "web354b.86.123.53.56.16D8962AEB7", "serverName" => "www.tripadvisor.com", "hostName" => "web354b.b.tripadvisor.com",
                    "vcsRevision" => 1373696, "vcsBranch" => "releases/PRODUCTION_1373642_20191001_0400", "drsInfo" => "ABC.89*AFIL.34*ATTPromo.85*AUC.76*BBML.21*BMP.57*BRDTTD.37*Brand.47*CAKE.86*CAR.8*COM.43*CRS.84*Community.53*Content.31*CoreX.6*EATPIZZA.27*EID.15*EXP.50*Engage.92*FDP.49*FDS.19*FDU.45*FLTMERCH.86*Filters.27*Flights.36*HRATF.71*HSX.99*HSXB.50*IBEX.78*ING.64*INT1.84*INT2.98*ITR.72*L10N.67*ML.26*ML6.96*MM.62*MOBILEAPP.-1*MOF.70*MPS.85*MTA.72*Me2.42*Mem.82*Mobile.29*MobileCore.0*Notifications.86*Other.54*P13N.5*PIE.41*PLS.35*POS.54*PRT.44*RDS1.15*RDS2.59*RDS3.62*RDS4.5*RDS5.23*RET.56*REV.21*REVB.45*REVH.65*REVSD.10*REVSP.76*REVXS.19*RNA.70*RSE1.28*RSE2.15*Rooms.5*S3PO.9*SD40.18*SE2O.17*SEM.57*SEO.92*SORT1.0*Sales.87*Search.95*SiteX.59*Surveys.50*T4B.76*TGT.71*TRP.15*TTD.79*TX.64*Timeline.60*VP.77*VR.3*YM.68*YMB.58",
                    "uvmScore" => "", "retargetingUrl" => "www.tamgrt.com/RT", "domainName" => "www.tripadvisor.com"
                ]
            ], "apolloCache" => null, "urqlCache" => null, "messages" => [
                "onetap_subhead_start_saving" => "Sign in to start saving them",
                "vr_pom_payment_guarantee" => "Receive our exclusive payment protection when you pay for this rental on Tripadvisor. It's how we keep your payment safe, guaranteed.",
                "vr_see_more_amenities" => "See more amenities", "ugc_uploader_photo_v3" => "Post photos",
                "trips_error_default_update_comment" => "There was a problem updating this comment. Please try again.", "MEMX920_42" => "Be in the know, wherever you go.",
                "key_11_id_GOT2_ForumHead3" => "Got questions? Get answers.", "vr_payment_protection" => "Payment Protection",
                "vr_faq_contact_answer_3_216b" => "This owner may contact you via the TripAdvisor Rental Inbox, your personal email, or phone.",
                "vr_pdp_owner_contact_inquiry" => "Have a question?", "vr_rate_info_msg_undated_default_ffffeea6" => "Rates may change depending on season, length of stay and other considerations. Additional fees may also apply; please contact the owner/manager for total price.",
                "vr_detail_availability_viewAll_fffffa80" => "View all months", "vr_detail_howto_171f" => "How to get there",
                "vr_owner_response_rate_responsive_pdp" => "Response Rate:", "vr_fees_applied_ffffdcba" => "Additional fees may be applied by {0,choice,1#manager|1<owner}",
                "trips_lander_title" => "Trips on TripAdvisor", "mtprovider_attribution_microsoft" => "Powered by <b>Microsoft<sup>&reg;</sup> Translator</b>",
                "MEMX920_4" => "Use our app to save ideas from travelers like you.", "MEMX920_3" => "Plan your trip your way",
                "ftl_how_contact" => "How will the owner contact me?", "MEMX920_8" => "Download the app to continue using TripAdvisor.",
                "MEMX920_7" => "Make your next trip uniquely yours", "vr_common_n_dogs_declension" => "{0, plural, one{# dog} other{# dogs}}",
                "trips_error_save_trip_full" => "Oh no! Your Trip has too many items in it. Please remove some items and try saving again.",
                "VRInquireTryRefreshHint_ffffe9f1" => "Try refreshing the page and then resending your inquiry.", "MEMX920_2" => "Get price alerts and nearby traveler favorites with our app.",
                "mobile_gate_get_hotel_flight_alerts" => "Get hotel and flight price alerts", "onetap_message_fomo_flightalerts" => "Don't miss out. Get flight deal alerts.",
                "ftl_not_kid_friendly" => "Not kid-friendly", "vr_see_similar_rentals" => "See similar rentals",
                "upload_video_processing_copy_modal" => "Your post is processing. We will send you a notification when it is ready to view.",
                "vr_setup_listing_283" => "Set up your free listing", "stat_modal_saved_to_tripname_with_bold" => "Saved to <b>{TripName}</b>",
                "vr_owner_terms_apply" => "Owner Terms Apply", "vr_faq_insured_answer2_216b" => "If you pay online via the TripAdvisor Rental Inbox, your payment will be covered by our Payment Protection.",
                "reg_and_join" => "JOIN", "vr_faq_hear_back_answer_216b" => "If you have contacted the owner and haven't heard back, TripAdvisor recommends that you send inquiries to other properties.",
                "common_n_rooms_declension" => "{0, plural, one{# room} other{# rooms}}", "vr_dogs" => "Dog(s)",
                "mobile_gate_save_restaurant_ideas" => "Save restaurant ideas in one place", "vr_list_it_title_283" => "Do you own a vacation rental? List it here.",
                "vr_pdp_bunk_bed_plural" => "{0, plural, one{# Bunk} other{# Bunks}}", "key_6_GOT2_Reshead2" => "Keep track of {geo_name} ideas",
                "onetap_subhead_signin_alerts_deals" => "Sign in to get price alerts and deals",
                "onetap_message_saving_saves_restaurants" => "Keep track of the restaurants you find", "mobile_gate_save_hotels_on_a_map" => "Save hotels + see them on a map",
                "vr_common_cats_plural" => "cats", "vr_mobile_plural_bedrooms" => "{0, plural, one{# bedroom} other{# bedrooms}}",
                "vr_faq_contact_owner_answer_216b" => "If the owner has provided contact information, you may contact him or her directly. Otherwise, it is up to the owner to reply to you.",
                "vr_show_less" => "Show less", "vr_amenities_short_100b" => "Amenities", "onetap_message_subhead_to_get_the_most" => "Sign in to get the most out of TripAdvisor",
                "vr_faq_hear_back_answer2_216b" => "You can send another message via the TripAdvisor Rental Inbox to ask if the property is still available.",
                "trips_error_default_add_item_to_trip" => "There was a problem adding the item to this Trip. Please try again.",
                "vr_view_rate_info_c35" => "View all rate info", "vr_fees_tax_81f" => "Tax", "vr_faq_pay_answer1_216b" => "If the owner approves your stay, he or she will let you know which forms of payment are accepted.",
                "memx_onboarding_unlock_TA" => "Unlock the best of TripAdvisor", "vr_full_page_inquiry_phone_ffffeea6" => "Phone number",
                "vr_see_less_amenities" => "See less amenities", "vr_instant_book_owner_message" => "Book instantly, without waiting for the owner to respond.",
                "key_8_id_GOT2_ForumSub1" => "Sign in to ask your own question", "vr_pdp_king_bed_plural" => "{0, plural, one{# King} other{# Kings}}",
                "onetap_message_unlock" => "Unlock the best of TripAdvisor", "vr_pdp_unknown_bed_plural" => "{0, plural, one{# Unknown} other{# Unknowns}}",
                "location_field_bathrooms" => "Bathrooms", "vr_viewed_property_last_week" => "viewed this property in the past week",
                "trips_stat_modal_profanity_check_native" => "Your Trip could not be created because public Trips cannot contain profanity. Please try again.",
                "mobile_gate_view_restaurants_on_a_map" => "View your saved restaurants on a map", "ftl_property_available" => "How do I know if the property is available?",
                "sign_in_geo_v3" => "Sign in for great {geo_name} ideas", "vr_wire_transfer_info" => "Learn more about paying safely.",
                "vr_instant_book_button_fffff29c" => "Instant Book", "vr_rental_minimum_stay_varies" => $home->accommodation->min_stay . " " . plural('night', $home->accommodation->min_stay) . " min. stay",
                "mobile_gate_save_things_on_a_map" => "Save things to do + see them on a map", "vr_gdpr_inquiry_form_email_optin" => "Receive emails about where to stay plus other deals and offers from TripAdvisor (you can unsubscribe at any time).",
                "plural_adults_da" => "adults", "common_month_year10" => "October {0}", "key_1_GOT2_FlightsSub2" => "Sign in for the best trip ideas for you",
                "common_month_year11" => "November {0}", "ftl_split_pay_reserve" => "Reserve for only", "common_month_year12" => "December {0}",
                "ftl_section_title_faq" => "About this property", "common_n_adults_declension" => "{0, plural, one{# adult} other{# adults}}",
                "vr_send_booking_request_urgency" => "Send a booking request to increase your chances of getting this listing.",
                "key_5_GOT2_Reshead1" => "You’ve got great {geo_name} ideas!", "vr_owner_listed_since_responsive_pdp" => "Member Since",
                "stat_modal_save_to_trip_v2" => "Save to a Trip", "tc_popup_text" => "This award is our highest recognition and is presented annually to the top 1% of businesses across select categories.",
                "vacation_rental_kid_friendly" => "Kid Friendly: {0}", "vacation_rental_smoking_allowed" => "Smoking Allowed: {0}",
                "VRInquireAlerted_171f" => "We have been alerted to the problem but you can also take the following action:",
                "common_day_wed_abbr" => "Wed", "vacation_rental_less" => "less", "trips_error_default_edit_trip" => "There was a problem editing this Trip. Please try again.",
                "stat_modal_change" => "Change", "vr_faq_pay_answer5_216b" => "You must pay via the TripAdvisor Rental Inbox if you want to be covered by our Payment Protection. Once the owner approves your stay, he or she will send you a quote, which will include payment instructions.",
                "pdp_redesign_2015_extra_income" => "Extra income", "global_nav_content_cta_post" => "Post", "onetap_message_saving_money" => "Like saving money?",
                "vr_detail_activities_171f" => "Activities nearby", "plural_guests_da" => "guests", "mobile_tagsbutton_unsure" => "Unsure",
                "common_day_thu_short" => "T", "common_Yes" => "Yes", "pdp_redesign_2015_easy_to_manage" => "Easy to manage",
                "vr_rate_info_msg_dated_detail_ffffeea6" => "The total cost for this property may include additional fees. Please contact the owner/manager for the complete price.",
                "vr_owner_response_time_responsive_pdp" => "Response Time:", "ftl_view_prop_faqs_ffffddea" => "View all property FAQs",
                "vr_faq_insured_answer3_216b" => "If you would like payment protection, ask the owner to sign up to accept online payments on TripAdvisor. Payments made via the TripAdvisor Rental Inbox are covered by our Payment Protection.",
                "vr_detail_default_rate_14cd" => "Default", "ugc_uploader_video_v3" => "Post videos", "vr_about_the_owner" => "About the{0,choice,1# Manager|2# Owner|3# Owner|3< Manager}",
                "vr_wire_transfer_warning" => "Never pay for your vacation rental by wire transfer.", "common_day_mon_abbr" => "Mon",
                "vr_faq_pay_answer2_216b" => "This owner does not currently accept payments via the TripAdvisor inbox.",
                "vr_travelers_booked_this_property_plural" => "{0, plural, one{# other traveler has booked this property} other{# other travelers have booked this property}}",
                "vr_pdp_show_price_vrc6880" => "Show Price", "vr_see_more_rates_and_fees" => "See more rates and fees", "vr_cats" => "Cat(s)",
                "onetap_message_genius_saves_ideas" => "You’ve got great ideas!", "linkify_url_error" => "You have entered an inappropriate URL",
                "vr_fee_with_description" => "{sFeeName} : {nCost} - {sFeeType} - {sDescription}", "memx_gating_mw_appal_or_signin" => "Continue on the TripAdvisor app or sign in",
                "vr_property_has_payment_protection" => "This property has Payment Protection", "engage_question_thanks_short" => "Thanks for helping!",
                "memx_gating_mw_signin_or_appdl" => "Sign in or continue on the TripAdvisor app",
                "mobile_gate_signin_continue_tripadvisor" => "<b>Sign in</b> to continue using TripAdvisor.",
                "vr_bookings_are_first_come_first_served" => "Bookings are first-come, first served.", "vr_location_description_81f" => "Additional Location Information",
                "vr_detail_map_2015_map" => "Map", "vr_ask_81f" => "Ask", "ftl_pets_allowed" => "Pets allowed", "common_day_sat_short" => "S",
                "vr_savings_alert_n_percent_cheaper" => "savings alert: {0}% cheaper", "vr_booking_form_sms_optin_gdpr" => "Receive text messages about your inquiry, booking and offers on top attractions near your rental (you can opt out at any time).",
                "vr_mobile_plural_min_nights_2" => "{0, plural, one{# night minimum} other{# nights minimum}}",
                "COE_lightbox_headline_updated" => "What is Certificate of Excellence?", "vr_interaction_with_guests" => "Interaction with guests",
                "ftl_kid_friendly" => "Kid-friendly", "trip_contains_profanity" => "Your Trip contains profanity and cannot be made public. Please modify your Trip and try again. Questions? View TripAdvisor's <a href=\"https: //www.tripadvisorsupport.com/hc/articles/360008133913-TripAdvisor-s-Content-Policy\">Content Guidelines</a>.",
                "VRInquireSupport_v2_ffffe9f1" => "<div class=\"tipHead\">If that does not work, report your problem with us.</div> Alert us of the problem using our <a href=\"{0}\" rel=\"nofollow\">support form</a>", "vr_detail_additionalAmenities_171f" => "Additional amenities & feature info",
                "vr_mobile_plural_baths" => "{0, plural, one{# bathroom} other{# bathrooms}}", "vr_date_range_span" => "{sFirstDate} - {sSecondDate}",
                "vr_mobile_plural_guests" => "{0, plural, one{# guest} other{# guests}}", "select_trip_header" => "Select a Trip",
                "please_include_message_to_owner" => "Please include a message to the owner", "trips_lander_md" => "Trips makes it easy to save travel plans, build wish lists and map out all your ideas for places to eat, things to do and where to stay — and bring them with you, wherever you go.",
                "vr_checkin_ffffdd04" => "Check in", "vr_travelers_who_send_four_inquiries" => "Travelers who send at least four inquiries tend to find the best fit for their trip.",
                "vr_faq_pay_answer4_216b" => "For this property, you may use a credit card to pay via the TripAdvisor Rental Inbox; the owner may also offer other payment options. ",
                "pdp_redesign_2015_easy_to_manage_content" => "Confirm bookings in one click and track everything from inquiry to check-out – even while you're on the go.",
                "mobile_gate_signin_keep_planning" => "Sign in to keep planning", "vr_detail_carRecommended_171f" => "Car recommended",
                "overview_common" => "Overview", "hotels_save_money" => "SAVE {0}", "vr_faq_contact_answer_216b" => "This owner may contact you via your personal email or phone.",
                "vr_detail_availability_viewFewer_fffffa80" => "View fewer months", "common_Read_more" => "Read more", "ftl_insured" => "Is my payment insured in any way?",
                "ftl_pay" => "How do I pay?", "trips_error_default_add_item_comment_v2" => "There was a problem adding a note to this Trip item. Please try again.",
                "vr_faq_hear_back_answer5_216b" => "If you still don't hear from the owner, TripAdvisor recommends that you send inquiries to other properties.",
                "stat_modal_create_a_trip_v2" => "Create a Trip", "vr_please_refresh" => "Sorry, but something went wrong. Please try refreshing the page.",
                "translation_powered_by_img_provider_v2" => "Translation powered by <img src=\"{imgUri}\" alt=\"{providerName}\">", "vacation_rental_bathrooms_criteria" => "Bathrooms", "vr_pm_languages_ffffdcba" => "Languages spoken:",
                "vr_pdp_sofa_plural" => "{0, plural, one{# Sofa} other{# Sofas}}", "vr_inquiry_phone_input_tip_c35" => "Please enter a valid phone number",
                "vr_faq_hear_back_answer3_216b" => "You can send another message via the TripAdvisor Rental Inbox to check if the property is still available. If the owner has listed a phone number, you can also call to follow up. If you still don't hear from the owner, TripAdvisor recommends that you send inquiries to other properties.",
                "vr_book_now" => "Book Now", "captcha_50f" => "Verification:", "HPSplash_SUAS_Copy1_HL" => "SAVE 10%",
                "hac_guests_label_ffffdfce" => "Guests", "memx_gating_mw_hotel_values" => "Read reviews, save your hotel finds, get price alerts and more.",
                "powered_by_img_provider" => "Powered by <img src=\"{0}\" alt=\"{1}\">", "trips_lander_copy_3b" => "Easily access all your saves while traveling, wherever you go",
                "mobile_gate_save_great_things_in_one_place" => "Save great things to do in one place", "trips_error_general_default" => "There was a problem with this Trip. Please try again.",
                "common_day_fri_abbr" => "Fri", "ftl_hear_back" => "What if I don't hear back from the owner?", "vr_pom_payment_protection" => "Payment Protection",
                "common_day_tue_short" => "T", "vr_responsive_card_per_week" => "per week", "vr_detail_railway_171f" => "Railway:",
                "vr_rate_periods_c35" => "{0,choice,1#Night|2#Week|3#Month}", "key_12_id_GOT2_ForumHead4" => "Join the conversation.",
                "vr_wire_transfer_warning_icon_info" => "We’ll never ask you to pay via wire transfer or directly into a TripAdvisor bank account. If you experience this, please let us know. Pay online through TripAdvisor’s secure website and you'll be covered by our Payment Protection.",
                "vr_calendar_min_stay" => "{nNumNights} night minimum stay required", "post_a_video_modal_header" => "Post a video",
                "ugc_uploader_review_v2" => "Write review", "key_10_id_GOT2_ForumHead2" => "Get advice from travelers",
                "mobile_gate_access_saves_wherever" => "Access your saves wherever you go", "HPSplash_SUAS_Copy2_HL" => "Step up your travel game",
                "trips_log_in_now" => "Log in now", "vr_rap_subtotal_27a" => "Rate for {0} {0,choice,1#night|1<nights}",
                "memx_gating_mw_generic_value" => "Read reviews, save trip ideas, get price alerts, and more.", "vr_estimated_total" => "Estimated Total",
                "memx_gating_mw_hybrid" => "Sign in", "vr_description_less" => "Less", "common_month_year2" => "February {0}",
                "common_month_year3" => "March {0}", "link_uploader_header" => "Post a link", "common_month_year1" => "January {0}",
                "common_month_year6" => "June {0}", "common_month_year7" => "July {0}", "common_month_year4" => "April {0}",
                "common_month_year5" => "May {0}", "vr_detail_access_171f" => "Access", "common_month_year8" => "August {0}",
                "common_month_year9" => "September {0}", "airm_learnMore" => "Learn more", "send_to_a_friend" => "Send to a friend",
                "ftl_peace_of_mind_book_hl_171f" => "Use a credit card to book with our Payment Protection.", "vr_aria_previous_photo" => "Previous Photo",
                "post_photos_form_header" => "Post photos", "vr_fees_81f" => "Fees", "vr_see_similar_rentals_in_geo" => "See similar rentals in {0}",
                "create_trip_general_error_v2" => "There was a problem creating this Trip. Please try again.",
                "vr_inquiry_missing_required_error_ffffdcba" => "You did not fill out all the required fields", "trips_save_CTA" => "Save",
                "vr_instant_book_manager_message" => "Book instantly, without waiting for the manager to respond.",
                "save_all_items_modal_header" => "Save all items to a Trip", "ftl_adults_number" => "{0} Guests",
                "app_download_toast_header" => "Continue with our free app", "stat_modal_view_trip_v2" => "View Trip",
                "ftl_faq_contact_owner_c35" => "How can I contact the owner?", "coe_popup" => "TripAdvisor gives a Certificate of Excellence to accommodations, attractions and restaurants that consistently earn great reviews from travelers.",
                "vr_show_more" => "Show more", "mobile_gate_signin_for_best_tripadvisor" => "Sign in for the best of TripAdvisor",
                "onetap_message_genius_saves_travelideas" => "You’ve got great travel ideas!", "vr_detail_rate2_171f" => "{0}{1,choice,1#/night|2#/week|3#/month}",
                "vr_description_more" => "More", "VRInquireSorry_171f" => "Sorry!", "vr_view_in_rental_inbox" => "View this in your rental inbox",
                "common_day_thu_abbr" => "Thu", "key_3_GOT2_ExpSub3" => "Get ideas of things to do, just for you",
                "mobile_gate_save_travel_on_a_map" => "See your saved travel ideas on a map", "mw_softgate_app_download_cta" => "Open in the App",
                "vacation_rental_pets_allowed" => "Pets Allowed: {0}", "key_2_GOT2_ExpSub2" => "Sign in to discover amazing things to do",
                "ftl_ask_about_kids" => "Ask about kids", "vr_detail_carNotNeeded_171f" => "Car not needed", "vr_fee_without_description" => "{sFeeName} : {nCost} - {sFeeType}",
                "vr_faq_pay_answer3_216b" => "For this property, please use a credit card to pay via the TripAdvisor Rental Inbox. Once the owner approves your stay, he or she will send you a quote, which will include payment instructions.",
                "upload_link_posted_copy_modal_2" => "Your link was posted! <a href=\"{0}\" class=\"{1}\">View it on your profile now.</a>", "vr_common_dogs_plural" => "dogs", "trips_education_amazing_ideas_one_place" => "Trips: your amazing travel ideas, all in one place",
                "social_readonly_message_main" => "Our site is currently undergoing maintenance.", "ftl_quote_rates_title_14cd" => "Quote",
                "vr_pdp_attached_bath" => "{0} Attached (ensuite)", "memx_apphardgate_6" => "Save and organize your travel ideas with the free app.",
                "memx_apphardgate_7" => "Get great tips from travelers who’ve been there with our app.", "memx_apphardgate_5" => "Plan a trip you’ll love",
                "memx_apphardgate_8" => "Plan your trip your way", "memx_apphardgate_9" => "Our app makes it easy to save ideas from travelers like you.",
                "memx_apphardgate_3" => "Find amazing hidden gems from travelers
        who’ve been there.", "soical_loading_error_2" => "Give it another try, please.", "vr_similar_rentals" => "similar rentals",
                "memx_apphardgate_1" => "Get alerts for deals and local traveler favorites with our app.", "vr_pdp_crib_bed_plural" => "{0, plural, one{# Crib} other {# Cribs}}",
                "ftl_inquire_for_rates" => "Inquire for rates", "vr_detail_sleeps_171f" => "Sleeps {0}", "engage_share_another_experience" => "Share another experience before you go.",
                "vacation_rental_per_night_fffff29c" => "Per night", "vr_responsive_card_per_night" => "per night", "vr_call_manager_owner" => "Call{0,choice,1# Manager|2# Owner|3# Owner|3< Manager}",
                "pdp_redesign_2015_extra_income_content" => "Earn money by renting out your home. With no up-front fees and no contract, you keep more for yourself.",
                "ftl_make_inquiry" => "Make Inquiry", "common_day_tue_abbr" => "Tue", "vr_faq_pay_answer7_216b" => "If the owner approves your stay, he or she will let you know which forms of payment are accepted. ",
                "mobile_try_again" => "Try again", "trips_inline_profanity_check" => "Public Trips cannot contain profanity",
                "vr_pdp_queen_bed_plural" => "{0, plural, one{# Queen} other{# Queens}}", "common_n_guests_248" => "{0} {0,choice,1#guest|1<guests}",
                "VRInquireTechnical_171f" => "We have not yet delivered your inquiry due to a technical problem.", "common_day_sat_abbr" => "Sat",
                "ftl_no_pets" => "No pets", "vr_detail_ferry_171f" => "Ferry:", "utility_nav_join" => "Join", "common_day_fri_short" => "F",
                "vacation_rental_more" => "more", "common_n_children_0" => "{0} {0,choice,0#children|1#child|1<children}",
                "vr_pdp_full_bath" => "{0,choice,0#|1#{0} Full bath|1<{0} Full baths}", "mobile_gate_see_reviews_travelers_like_you" => "See reviews from travelers like you",
                "social_no_permission" => "You don't have permission to take this action.", "ugc_uploader_linkPost_v3" => "Post links",
                "vacation_rental_bedrooms_criteria" => "Bedrooms", "vr_full_page_inquiry_name_ffffeea6" => "Your name",
                "vr_about_the_neighborhood" => "About the neighborhood", "vr_studio_room" => "studio", "vr_check_in_too_soon" => "With a check in date so soon, we can't book this for you online. Please change your check in date.",
                "mobile_reviews_plural" => "{0, plural, one{# review} other{# reviews}}", "vr_faq_pay_answer6_216b" => "If the owner approves your stay, he or she will let you know which forms of payment are accepted. This owner does not currently accept payments via the TripAdvisor inbox. You can ask him or her to sign up; payments made via the TripAdvisor Rental Inbox are covered by our Payment Protection.",
                "trips_error_duplicate" => "You already have a Trip with this name.", "stat_modal_saved_to_tripname_with_bold_v3" => "Saved to <a href=\"{TripLink}\" class=\"{TripClass}\"><b>{TripName}</b></a>", "create_trip_success_toast_with_bold" => "<b>{TripName}</b> created!", "more_link" => "More",
                "vr_faq_contact_owner_answer2_216b" => "Initially, you may contact the owner via the TripAdvisor Rental Inbox. This inbox is created after you send your first message or booking request to the owner. After you've made your first payment, you'll be able to see the owner's contact information.",
                "vr_full_page_inquiry_message_ffffeea6" => "Your message", "social_readonly_message_subtext" => "Please check back soon.",
                "ftl_deposit" => "Deposit", "vr_detail_sectionNearby_171f" => "Nearby cities", "vr_detail_carAdvised_171f" => "Car advised",
                "memx_gating_mw_attraction_values" => "Read reviews, save things to do, get free 24 hour cancellation, and more.",
                "vr_pdp_nightly_period_lower" => "{numNights, plural, one{# night} other{# nights}}",
                "pdp_redesign_2015_trusted_by_travelers" => "Trusted by travelers", "vr_pdp_unknown_bathroom" => "{0,choice,0#|1#{0} Unknown type|1<{0} Unknown types}",
                "download_the_app" => "Download the App", "open_in_the_app" => "Open in the app", "vr_find_what_you_looking_for_c35" => "Still can't find what you're looking for?",
                "trips_error_default_edit_privacy" => "There was a problem updating the privacy of this Trip. Please try again.",
                "subhead_plan_right_for_you_free_app" => "Plan a trip that&#39;s right for you with the free app",
                "tch_booking_button_learn_more" => "Learn more", "key_9_id_GOT2_ForumHead1" => "Not seeing the answer to your question?",
                "ftl_split_pay_available" => "Your dates are <span class='{cssClasses}'>Available!<span>", "key_7_id_GOT2_ForumHead1" => "Still have travel questions?",
                "stat_modal_undo" => "Undo", "vr_pdp_shower_bath" => "{0,choice,0#|1#{0} Shower|1<{0} Showers}",
                "vr_detail_anchorAvailability_171f" => "Availability", "vr_common_pets_label" => "Pets", "vr_owner_fees_ffffdcba" => "Owner Fees",
                "vr_inquiry_form_your_email" => "Your Email", "vr_see_less_rates_and_fees" => "See less rates and fees",
                "vr_faq_contact_answer2_216b" => "This owner will contact you via the TripAdvisor Rental Inbox.",
                "vr_tip_send_message_14cd" => "Send Message", "native_onboarding_enable_notifications_be_in_the_know" => "Be in the know, wherever you go",
                "onetap_message_saving_saves_thingstodo" => "Save things to do on your trip", "vr_common_cats_declension" => "{0, plural, one{# cat} other{# cats}}",
                "common_day_sun_abbr" => "Sun", "vr_inquire_on_few_more_rentals" => "Inquire on a few more rentals",
                "vr_inquiry_email_input_tip" => "Please enter a valid email", "vr_inquiry_name_input_tip_c35" => "Please include your first and last name",
                "vr_pdp_full_bed_plural" => "{0, plural, one{# Bedroom} other{# Bedrooms}}", "upload_link_posted_copy_modal_profile" => "Your link was posted!",
                "HPSplash_SUAS_Subhead1" => "Get 10% off your first tour or activity booking. Sign in and we’ll email your single-use promo code.",
                "HPSplash_SUAS_Subhead2" => "Save 10% on your first tour or activity booking. Sign in and we’ll email your single-use promo code.",
                "vr_checkout_ffffdd04" => "Check out", "stat_modal_removed_from_tripname_with_bold_v3" => "Removed from <a href=\"{TripLink}\" class=\"{TripClass}\"><b>{TripName}</b></a>", "ftl_pets_not_allowed" => "Pets not allowed", "upload_photo_posted_copy_modal_2" => "Your photo was posted! <a href=\"{0}\" class=\"{1}\">View it on your profile now.</a>", "memx_gating_mw_restaurant_values" => "Read reviews, then save your restaurant finds to a map.",
                "vr_inquiry_privacy_and_terms_new_tab" => "By sending this message you agree to our <a class=\"termsLink\" target=\"_blank\" href=\"{termsLink}\">Terms of Use</a> and <a class=\"privacyLink\" target=\"_blank\" href=\"{privacyLink}\">Privacy Policy</a>", "ftl_subtotal" => "Subtotal", "vr_price_from_283" => "From", "vr_faq_contact_owner_answer3_216b" => "If the owner has provided contact information, you may contact him or her directly. If not, you can contact the owner via the TripAdvisor Rental Inbox. This inbox is created after you send your first message or booking request to the owner",
                "vr_title_listing_by_ffffdcba_v1" => "Listing {0}", "vr_pdp_half_bath" => "{0,choice,0#|1#{0} Half bath|1<{0} Half baths}",
                "upload_photo_posted_copy_modal_profile" => "Your photo was posted!", "vr_similar_more_171f" => "More {0} destinations:",
                "vr_getting_around" => "Getting around", "airm_apply" => "Apply", "VR_quick_view_more_ffffeea6" => "More",
                "common_day_sun_short" => "S", "new_trip_name_error_msg" => "Please select a new name for your Trip.",
                "mobile_gate_get_hotel_alerts" => "Get hotel price alerts + more", "VRInquireAgain_171f" => "Again, we apologize for any inconvenience.",
                "p13n_category_carousel_numbers" => "{0} of {1}", "trips_education_easy_save_orgaize_map_bring_with_you" => "Trips makes it easy to save, organize and map out all your ideas for places to eat, things to do and where to stay — and bring them with you, wherever you go.",
                "onetap_message_saving_saves_hotels" => "Save hotels for your trip", "trips_error_default_move_item" => "There was a problem moving this Trip item. Please try again.",
                "vr_price_found_is_cheaper_than_others" => "The price you found is <span>{0}% cheaper</span> than other nearby {1} bedroom listings.",
                "ftl_ask_about_pets" => "Ask about pets", "vr_why_total_estimate" => "Why is the total an estimate",
                "vr_pdp_twin_bed_plural" => "{0, plural, one{# Bed} other{# Beds}}", "CertExcellence_ffffdc53" => "Certificate of Excellence",
                "vr_send_a_message_to" => "Send a message to {managerName}", "vr_faq_hear_back_answer4_216b" => "You can send another message via the TripAdvisor Rental Inbox to check if the property is still available. If the owner has listed a phone number, you can also call to follow up. send inquiries to other properties.",
                "terms_and_policy_links" => "By proceeding, you agree to our <a rel=\"nofollow\" class=\"{2}\" target=\"_blank\" href=\"{0}\">Terms of Use</a> and confirm you have read our <a rel=\"nofollow\" class=\"{2}\" target=\"_blank\" href=\"{1}\">Privacy Policy</a>.", "ftl_mobile_house_rules_14cd" => "House Rules", "vr_x_travelers" => "{nNumTravelers} travelers",
                "trips_lander_copy_1" => "Save traveler-recommended places for your trip", "trips_lander_copy_2" => "View the things to do, restaurants and hotels you saved on a map",
                "common_Reviews" => "Reviews", "mg2019_fbot_see_where_friends_traveled" => "See where your friends have traveled",
                "vr_detail_airport_171f" => "Airport:", "vr_faq_pay_answer8_216b" => "This owner does not currently accept payments via the TripAdvisor inbox.",
                "common_Readless" => "Read less", "vr_inquiry_no_thanks_171f" => "no thanks", "see_more_properties" => "Contact property manager",
                "vr_nights_min_stay_plural" => "{0, plural, one{# night} other{# nights}} min stay", "trips_error_unsave" => "There was a problem removing this item from your Trip. Please try again.",
                "vr_faq_insured_answer1_216b" => "Yes. Payments made via the TripAdvisor inbox are covered by our Payment Protection.",
                "social_Saved" => "Saved", "common_children" => "Children", "MEMX771_2" => "Our app has even more ways to plan a trip that’s right for you.",
                "MEMX771_1" => "We’re sending you to a better experience in our app.", "tavrs_common_view_less" => "View less",
                "vr_affiliate_logo" => "{sAffiliateName} logo", "common_day_mon_short" => "M", "what_is_travelers_choice" => "What is Travelers' Choice?",
                "trips_lander_header" => "Traveling soon? Save your amazing ideas all in one place with Trips.", "trips_product_name" => "Trips",
                "common_No" => "No", "reg_error_reload" => "We're sorry, we've encountered an error logging you in. Please reload the page and try again.",
                "pdp_redesign_2015_trusted_by_travelers_content" => "With millions of reviews and protected online payments, TripAdvisor helps travelers book your home with confidence.",
                "common_month_year" => "Month Year", "mobile_gate_save_trip_on_a_map" => "Save trip ideas + see them on a map",
                "common_day_wed_short" => "W", "empty_trip_home_get_started" => "Get started", "vr_aria_next_photo" => "Next Photo",
                "social_loading_error_1" => "Whoops, something went wrong.", "trips_error_default_add_note" => "There was a problem adding a note to this Trip. Please try again.",
                "vr_detail_sectionRates_171f" => "Rates", "vr_inquiry_message_sent" => "Your message has been sent!",
                "vr_property_availability_check_216b" => "First, check the Availability tab on this page to see if your dates are available. If they are, contact the owner via the TripAdvisor Rental Inbox to confirm availability.",
                "geetest_slide_to_verify" => "Slide to verify", "mobile_gate_24_hour_cancellation" => "Book with free 24 hour cancellation"
            ], "features" => [
                "signup_gate_2pv_mw_test" => false,
                "hybrid_gate_2pv_mw_b" => false, "hybrid_gate_2pv_mw_a" => false, "prod_runtime_tracking" => false, "hybrid_gate_4pv_mw_a" => false,
                "hybrid_gate_2pv_mw_d" => false, "hybrid_gate_2pv_mw_c" => false, "t10565_got_contextual_v2_variant_2" => false,
                "memx_reg_dialogs_suppression_test_1_expanded" => true, "hr_urql" => false, "google_onetap_timeout_10s" => true,
                "trips_heart_icon" => false, "signup_gate_2pv_mw_c_ghost" => false, "react_tracking_impressions" => true,
                "app_download_toast" => false, "hydrate_while_loading" => false, "social_2018" => true, "hybrid_gate_2pv_mw_cd_ghost" => false,
                "vr_home_away_phase_1" => true, "t10566_got_contextual_v2_variant_3" => false, "hcom_offer_pixel" => false,
                "memx_reg_dialogs_12h_suppression" => true, "social_2018_login_gate_skip_terms_of_service" => false,
                "tripadvisor_two_tap_desktop" => false, "hard_gate_2nd_pv_copy_test_e" => false, "facebook_onetap_mobile" => false,
                "facebook_onetap_hotel_servlets" => true, "social_2018_login_gate" => true, "google_onetap_web_component_desktop" => true,
                "vr_rates_table_from_pdp_disable" => false, "social_link_posting_enabled" => true,
                "memx_reg_dialogs_suppression_test_2_expanded" => false, "hard_gate_2nd_pv_new_variant_ghost" => false,
                "vr_inquiry_guest_checkout" => false, "google_onetap_web_component" => true, "app_dl_for_got_and_fbot" => false,
                "google_onetap_web_component_mobile" => false, "hard_gate_google_one_tap_2pv_mw" => false, "hybrid_gate_2pv_mw_ab_ghost" => false,
                "hard_gate_2nd_pv_3s_app_redirect" => false, "t10567_got_contextual_v2_variant_4" => false,
                "app_download_toast_including_members" => false, "memx_reg_dialogs_suppression_test_4" => false, "hr_dark_green_icons" => false,
                "memx_reg_dialogs_suppression_test_3" => false, "corex_ghost_tracking" => true, "tripadvisor_two_tap_mobile_adhesion" => false,
                "memx_reg_dialogs_suppression_test_2" => false, "hard_gate_2nd_pv_copy_ghost" => false, "hard_gate_2nd_pv_copy_test_c" => false,
                "memx_reg_dialogs_suppression_test_1" => false, "hard_gate_google_one_tap_2pv_mw_ghost" => false,
                "hard_gate_2nd_pv_copy_test_d" => false, "hard_gate_2nd_pv_copy_test_a" => false, "hard_gate_2nd_pv_copy_test_b" => false,
                "google_onetap_web_component_hotel_servlets" => true, "vr_responsive_detail_page" => true, "signup_gate_2pv_mw_b" => false,
                "signup_gate_2pv_mw_a" => false, "signup_gate_2pv_mw_c" => false, "google_onetap_contextual_message_desktop" => true,
                "react_concurrent_mode" => false, "add_cta_to_global_nav" => true, "t10568_got_contextual_v2_variant_5" => false,
                "trips_pop_stat_modal" => true, "daodao_unify_nav_links_title" => false, "hard_gate_2nd_pv_new_variant_c" => false,
                "trips_skip_check_whitelist_public_trips" => true, "hr_defer_facebook_sdk" => false, "hard_gate_2nd_pv_new_variant_b" => false,
                "hard_gate_2nd_pv_new_variant_a" => false, "email_pop_stat_cookie" => true, "sentryio_js" => false,
                "tripadvisor_two_tap_hotel_servlets" => false, "trips_saves_heart" => true, "hybrid_gate_2pv_mw_test" => false, "mobile_web" => false,
                "google_onetap_web_component_autologin" => true, "google_onetap_web_component_mobile_adhesion" => false,
                "facebook_onetap_desktop" => true, "bcom_partner_photos" => true, "social_at_referencing_profile_links" => true,
                "trips_2018_writes" => true, "media991_fastly_ondemand_resizing" => false, "facebook_limited_permissions" => false,
                "qualtrics_surveys_any" => false, "vr_pdp_tripsearch_inputs" => false, "google_onetap_contextual_message_mobile" => false,
                "trips_bookmark" => true, "pageview_counter_hard_gate_ghost" => false, "serialized_hydration_promises" => true,
                "vr_show_home_away_branding" => true, "signup_gate_2pv_mw_ghost" => false, "homepage_member_gate_suas_2" => false,
                "homepage_member_gate_suas_1" => false, "facebook_onetap_mobile_adhesion" => false, "media_video_upload_enabled" => true,
                "t10564_got_contextual_v2_variant_1" => false, "t10349_facebook_onetap_w_value_copy" => false, "tripadvisor_two_tap_mobile" => false,
                "trips_2018_collab" => true, "google_onetap_inline" => false, "dummy_cache_on_client" => false,
                "disable_reg_dialog_for_hardgate" => false, "mobile_fixed_ad" => false, "media_find_responsive_image" => false, "trips_2018" => true,
                "components_header" => false, "media_photo_upload_enabled" => true, "vr_instant_book_badging" => false, "onetap_onboarding" => true
            ], "renders" => [
                ["id" => "component_11", "props" => [], "package" => "@ta/platform.rum"], ["id" => "component_12", "props" => [], "package" => "@ta/memx.registration-dialog-controller"], [
                    "id" => "mobile-global-nav-content-collect_component_13", "props" => [], "package" => "@ta/brand.mobile-global-nav-content-collect"
                ]
            ], "profilables" => [], "strictModeRoots" => [], "hydrations" => [
                [
                    "id" => "component_1",
                    "props" => [
                        "size" => "970x250-728x90", "position" => "footer", "additionalClass" => "no_reserve_margins", "minWinSize" => "970",
                        "pageLoadRender" => "true"
                    ], "package" => "@ta/cpm.ad-target"
                ], ["id" => "component_2", "props" => [], "package" => "vr.rental-detail-page-nav"], ["id" => "component_3", "props" => [], "package" => "vr.traveler-inputs-and-rap"], ["id" => "component_4", "props" => [], "package" => "vr.rental-detail-page-part-2"], ["id" => "component_5", "props" => [], "package" => "vr.rental-detail-page-overview-and-amenities"], ["id" => "component_6", "props" => [], "package" => "vr.rental-detail-header"], ["id" => "component_7", "props" => [], "package" => "vr.rental-detail-page-photos"], ["id" => "component_8", "props" => [], "package" => "@ta/social.onboarding-controller"], ["id" => "component_9", "props" => [], "package" => "@ta/trips.trip-link"], ["id" => "component_10", "props" => [], "package" => "@ta/brand.global-nav-action-content-collect"]
            ], "lazyLoadedModules" => [], "ssrPreloadedModules" => ["@ta/social.onboarding-modal"]
        ];
        return json_encode($data);
    }
    public static function getRapRate()
    {
        header('Content-Type: application/json');
        echo '{"view":{"stayLength":4,"rateInfo":{"localizedSubtotal":"RON 3,264","subtotalValueInSessionCurrency":3264}},"rapData":{"isInquiryAllowed":true,"rapSubtotalCurrency":"EUR","rapBaseRate":"RON 2,848","rapBaseRateInSessionCurrency":2848,"rapConsolidatedRate":"RON 3,261","rapConsolidatedRateInSessionCurrency":3261,"rapTax":null,"rapOwnerFees":null,"rapDeposit":null,"rapRefundableDeposit":null,"rapHasRefundableDeposit":false,"rapBookingFee":"RON 413","subtotalNumericInSessionCurrency":3261,"taxNumericInSessionCurrency":-1,"rapAltConsolidatedRate":null,"rapFirstPayment":"RON 983","rapSecondPayment":"RON 2,278","rapSecondPaymentDue":"12/26/2019","rapSubtotal":"RON 3,261","checkoutUrl":null,"rapBookable":"INSTANT","isOffsiteBooking":false,"getDisplayDiscount":null,"rapIsSplitPayment":true},"errors":null,"validationError":null,"tipQuoteToken":"2a2c45b64fa23bf060178e589d1fa7ad","rapRate":{"amount":687.00,"currency":"EUR","minStay":3,"checkoutDays":["MONDAY","TUESDAY","WEDNESDAY","THURSDAY","FRIDAY","SATURDAY","SUNDAY"]}}';
        exit;
    }
    public static function GARecord($request)
    {
        http_response_code(200);
        echo '';
        exit;
    }
    public static function DemandLoadAjax($request)
    {
        http_response_code(200);
        exit;
    }
    public static function batched($request)
    {
        header('Content-Type: application/json');
        echo '[{"data":{"authzInfo":{"canPostLink":false,"canUploadVideo":false,"canWriteReview":true,"canPostPhoto":true,"canBoostContent":false,"isBrand":false,"isDestinationExpert":false,"isDestinationMarketer":false,"isInfluencer":false,"isTAStaff":false,"__typename":"AuthZInfo"}}},{"data":{"savesObjects":[{"locationId":6122191,"socialStatistics":{"followCount":0,"isFollowing":false,"isLiked":false,"isBoosted":false,"boostCount":0,"likeCount":0,"isReposted":false,"repostCount":0,"isSaved":false,"tripCount":100,"__typename":"SocialStatistics"},"__typename":"LocationInformation"}]}}]';
        exit;
    }
    public static function ajax()
    {
        http_response_code(200);
        exit;
    }
    public static function maps_provider()
    {
        header('Content-Type: application/json');
        echo '{"mapProvider":"ta-maps-google","mapConfig":{"channel":"ta.desktop.vacationrentalreview"}}';
        exit;
    }
    public static function bundle($request)
    {
        print_r($request->query); exit;
        $name = $_GET['name'];
        header('Content-Type: application/json');
        if($name == '@ta/media.upload-exports') {
            echo '{"dependencies":["vendor-babel","vendor-react-libs","lithium-platform","ta-common","@ta/overlays.headers","@ta/overlays.modal"],"preloads":[],"name":"@ta/media.upload-exports","messages":{"mobile_try_again":"Try again","post_photos_form_header":"Post photos","social_loading_error_1":"Whoops, something went wrong.","soical_loading_error_2":"Give it another try, please.","trips_edit_CTA":"Edit","post_a_video_modal_header":"Post a video","mobile_reviews_plural":"{0, plural, one{# review} other{# reviews}}"},"features":{"sentryio_js":false,"media_find_responsive_image":false,"hydrate_while_loading":false,"bcom_partner_photos":true,"dummy_cache_on_client":false,"react_tracking_impressions":true,"media991_fastly_ondemand_resizing":false},"css":["/components/dist/@ta/media.upload-exports.55340947e5.css","/components/dist/ta-common.42d7646dbf.css","/components/dist/@ta/overlays.headers.fa61a38e76.css","/components/dist/@ta/overlays.modal.8dd802c577.css","/components/dist/@ta/common.image-preloader.73e546018d.css","/components/dist/@ta/input.drop-zone.a2a1035b2d.css","/components/dist/@ta/overlays.pieces.db26ad7f64.css","/components/dist/@ta/overlays.fullscreen-overlay.f7198570e4.css"],"js":["/components/dist/@ta/media.upload-exports.ceb6c7cce8.js","/components/dist/vendor-babel.a094aec3c7.js","/components/dist/vendor-react-libs.ecf6ebce78.js","/components/dist/lithium-platform.0fa9ff21e4.js","/components/dist/ta-common.a895adc67e.js","/components/dist/@ta/overlays.headers.265a494942.js","/components/dist/@ta/overlays.modal.876503d51b.js","/components/dist/vendor-urql.7baca97904.js","/components/dist/@ta/common.image-preloader.738ad31c5b.js","/components/dist/ta-platform.fd6429a95e.js","/components/dist/@ta/events.lifecycle.d7afa1ff04.js","/components/dist/@ta/input.drop-zone.504ebbe6cb.js","/components/dist/vendor-redux-libs.7da53d34a0.js","/components/dist/react-transition-group.9ce7afa8f8.js","/components/dist/@ta/overlays.pieces.adbdd1d04b.js","/components/dist/@ta/events.keyboard-event-listener.519eed493a.js","/components/dist/@ta/overlays.fullscreen-overlay.88a88f779d.js","/components/dist/@ta/common.client.5d1a9ded29.js","/components/dist/vendor-apollo-libs.11d1e57db6.js","/components/dist/vendor-common.86aa9d67a6.js","/components/dist/@ta/platform.sentry.375bd855d4.js","/components/dist/@ta/lithium.portals.e31d027e0b.js","/components/dist/tslib.0824b5dc96.js"]}'; exit;
        } else if($name == '@ta/trips.trip-link') {
            echo '{"dependencies":["vendor-react-libs","vendor-redux-libs","lithium-platform","@ta/trips.states"],"preloads":[],"name":"@ta/trips.trip-link","messages":{"trips_lander_title":"Trips on TripAdvisor","trips_product_name":"Trips","trips_education_amazing_ideas_one_place":"Trips: your amazing travel ideas, all in one place","social_loading_error_1":"Whoops, something went wrong.","trips_lander_md":"Trips makes it easy to save travel plans, build wish lists and map out all your ideas for places to eat, things to do and where to stay — and bring them with you, wherever you go.","social_readonly_message_main":"Our site is currently undergoing maintenance.","trips_education_easy_save_orgaize_map_bring_with_you":"Trips makes it easy to save, organize and map out all your ideas for places to eat, things to do and where to stay — and bring them with you, wherever you go.","trips_lander_copy_3b":"Easily access all your saves while traveling, wherever you go","mobile_reviews_plural":"{0, plural, one{# review} other{# reviews}}","mobile_try_again":"Try again","trips_log_in_now":"Log in now","trips_lander_copy_1":"Save traveler-recommended places for your trip","trips_lander_copy_2":"View the things to do, restaurants and hotels you saved on a map","empty_trip_home_get_started":"Get started","soical_loading_error_2":"Give it another try, please.","social_readonly_message_subtext":"Please check back soon.","trips_lander_header":"Traveling soon? Save your amazing ideas all in one place with Trips."},"features":{"trips_2018_collab":true,"sentryio_js":false,"social_2018_login_gate_skip_terms_of_service":false,"media_find_responsive_image":false,"trips_heart_icon":true,"social_2018_login_gate":true,"hydrate_while_loading":false,"dummy_cache_on_client":false,"bcom_partner_photos":true,"react_tracking_impressions":true,"trips_saves_heart":true,"media991_fastly_ondemand_resizing":false},"css":["/components/dist/@ta/trips.states.f7ac3bac87.css","/components/dist/ta-common.42d7646dbf.css","/components/dist/@ta/social.login-gate.0a4ee33178.css","/components/dist/@ta/overlays.fullscreen-overlay.f7198570e4.css","/components/dist/@ta/overlays.modal.8dd802c577.css","/components/dist/@ta/common.image-preloader.73e546018d.css","/components/dist/@ta/input.drop-zone.a2a1035b2d.css","/components/dist/@ta/overlays.pieces.db26ad7f64.css","/components/dist/@ta/social.failover.85c4b5ee9b.css","/components/dist/@ta/common.webview.dd67304f49.css","/components/dist/@ta/overlays.popover.f4f0f4c3d8.css"],"js":["/components/dist/@ta/trips.trip-link.4e1d7cd44d.js","/components/dist/vendor-react-libs.ecf6ebce78.js","/components/dist/vendor-redux-libs.7da53d34a0.js","/components/dist/lithium-platform.0fa9ff21e4.js","/components/dist/@ta/trips.states.6f105d66d7.js","/components/dist/vendor-babel.a094aec3c7.js","/components/dist/vendor-urql.7baca97904.js","/components/dist/ta-platform.fd6429a95e.js","/components/dist/ta-common.a895adc67e.js","/components/dist/@ta/trips.tracking.b5fdb37ea8.js","/components/dist/@ta/social.login-gate.c35c808ae2.js","/components/dist/@ta/overlays.fullscreen-overlay.88a88f779d.js","/components/dist/@ta/overlays.modal.876503d51b.js","/components/dist/vendor-apollo-libs.11d1e57db6.js","/components/dist/vendor-common.86aa9d67a6.js","/components/dist/@ta/platform.sentry.375bd855d4.js","/components/dist/@ta/lithium.portals.e31d027e0b.js","/components/dist/@ta/common.image-preloader.738ad31c5b.js","/components/dist/@ta/events.lifecycle.d7afa1ff04.js","/components/dist/@ta/input.drop-zone.504ebbe6cb.js","/components/dist/react-transition-group.9ce7afa8f8.js","/components/dist/@ta/overlays.pieces.adbdd1d04b.js","/components/dist/@ta/trips.trip-types.2ba0a6173a.js","/components/dist/@ta/trips.trip-util.bce96502fd.js","/components/dist/@ta/tracking.interactions.430b89b135.js","/components/dist/@ta/social.failover.49617795d9.js","/components/dist/@ta/common.webview.4336c3d4e1.js","/components/dist/@ta/events.keyboard-event-listener.519eed493a.js","/components/dist/@ta/common.client.5d1a9ded29.js","/components/dist/tslib.0824b5dc96.js","/components/dist/@ta/trips.graphql.693bdc1008.js","/components/dist/@ta/common.localstorage.abf4fa9103.js","/components/dist/@ta/overlays.popover.764a497b28.js","/components/dist/@ta/events.event-boundary.ca1a4a2e8c.js","/components/dist/@ta/events.window.22654228ea.js","/components/dist/@ta/overlays.attached-arrow-overlay.35221b8730.js","/components/dist/@ta/overlays.attached-overlay.15cd7aa5ec.js","/components/dist/@ta/overlays.shift.420511a788.js","/components/dist/@ta/events.window-resize.3afb66deca.js"]}'; exit;
        } else if($name == '@ta/brand.mobile-global-nav-content-collect') {
            echo '{"dependencies":["vendor-babel","vendor-react-libs","ta-common","lithium-platform","ta-platform","@ta/common.authz","@ta/tracking.interactions","@ta/social.login-gate","@ta/overlays.modal","@ta/overlays.headers","@ta/public.listing"],"preloads":[],"name":"@ta/brand.mobile-global-nav-content-collect","messages":{"global_nav_content_cta_post":"Post","link_uploader_header":"Post a link","upload_link_posted_copy_modal_2":"Your link was posted! <a href=\"{0}\" class=\"{1}\">View it on your profile now.</a>","hotels_save_money":"SAVE {0}","upload_photo_posted_copy_modal_profile":"Your photo was posted!","social_loading_error_1":"Whoops, something went wrong.","social_readonly_message_main":"Our site is currently undergoing maintenance.","ugc_uploader_photo_v3":"Post photos","post_a_video_modal_header":"Post a video","ugc_uploader_review_v2":"Write review","mobile_reviews_plural":"{0, plural, one{# review} other{# reviews}}","mobile_try_again":"Try again","post_photos_form_header":"Post photos","upload_video_processing_copy_modal":"Your post is processing. We will send you a notification when it is ready to view.","soical_loading_error_2":"Give it another try, please.","upload_photo_posted_copy_modal_2":"Your photo was posted! <a href=\"{0}\" class=\"{1}\">View it on your profile now.</a>","ugc_uploader_video_v3":"Post videos","ugc_uploader_linkPost_v3":"Post links","social_readonly_message_subtext":"Please check back soon.","upload_link_posted_copy_modal_profile":"Your link was posted!"},"features":{"social_link_posting_enabled":true,"sentryio_js":false,"social_2018_login_gate_skip_terms_of_service":false,"dummy_cache_on_client":false,"react_tracking_impressions":true,"add_cta_to_global_nav":true,"media_find_responsive_image":false,"social_2018_login_gate":true,"hydrate_while_loading":false,"media_photo_upload_enabled":true,"bcom_partner_photos":true,"media_video_upload_enabled":true,"media991_fastly_ondemand_resizing":false},"css":["/components/dist/@ta/brand.mobile-global-nav-content-collect.e91c027566.css","/components/dist/ta-common.42d7646dbf.css","/components/dist/@ta/social.login-gate.0a4ee33178.css","/components/dist/@ta/overlays.modal.8dd802c577.css","/components/dist/@ta/overlays.headers.fa61a38e76.css","/components/dist/@ta/public.listing.edbca097d3.css","/components/dist/@ta/common.image-preloader.73e546018d.css","/components/dist/@ta/input.drop-zone.a2a1035b2d.css","/components/dist/@ta/overlays.pieces.db26ad7f64.css","/components/dist/@ta/social.failover.85c4b5ee9b.css","/components/dist/@ta/common.webview.dd67304f49.css","/components/dist/@ta/overlays.fullscreen-overlay.f7198570e4.css","/components/dist/@ta/overlays.popover.f4f0f4c3d8.css"],"js":["/components/dist/@ta/brand.mobile-global-nav-content-collect.5c80996bf6.js","/components/dist/vendor-babel.a094aec3c7.js","/components/dist/vendor-react-libs.ecf6ebce78.js","/components/dist/ta-common.a895adc67e.js","/components/dist/lithium-platform.0fa9ff21e4.js","/components/dist/ta-platform.fd6429a95e.js","/components/dist/@ta/common.authz.c1b1703336.js","/components/dist/@ta/tracking.interactions.430b89b135.js","/components/dist/@ta/social.login-gate.c35c808ae2.js","/components/dist/@ta/overlays.modal.876503d51b.js","/components/dist/@ta/overlays.headers.265a494942.js","/components/dist/@ta/public.listing.be3d1c4aa2.js","/components/dist/@ta/common.image-preloader.738ad31c5b.js","/components/dist/@ta/events.lifecycle.d7afa1ff04.js","/components/dist/@ta/input.drop-zone.504ebbe6cb.js","/components/dist/vendor-redux-libs.7da53d34a0.js","/components/dist/react-transition-group.9ce7afa8f8.js","/components/dist/@ta/overlays.pieces.adbdd1d04b.js","/components/dist/vendor-urql.7baca97904.js","/components/dist/vendor-apollo-libs.11d1e57db6.js","/components/dist/vendor-common.86aa9d67a6.js","/components/dist/@ta/platform.sentry.375bd855d4.js","/components/dist/@ta/lithium.portals.e31d027e0b.js","/components/dist/@ta/common.localstorage.abf4fa9103.js","/components/dist/@ta/social.failover.49617795d9.js","/components/dist/@ta/common.webview.4336c3d4e1.js","/components/dist/@ta/overlays.fullscreen-overlay.88a88f779d.js","/components/dist/@ta/events.keyboard-event-listener.519eed493a.js","/components/dist/@ta/common.client.5d1a9ded29.js","/components/dist/tslib.0824b5dc96.js","/components/dist/@ta/overlays.popover.764a497b28.js","/components/dist/@ta/events.event-boundary.ca1a4a2e8c.js","/components/dist/@ta/events.window.22654228ea.js","/components/dist/@ta/overlays.attached-arrow-overlay.35221b8730.js","/components/dist/@ta/overlays.attached-overlay.15cd7aa5ec.js","/components/dist/@ta/overlays.shift.420511a788.js","/components/dist/@ta/events.window-resize.3afb66deca.js"]}'; exit;
        } else if($name == '@ta/cpm.ad-target') {
            echo '{"dependencies":["vendor-react-libs","lithium-platform","@ta/events.window-resize"],"preloads":[],"name":"@ta/cpm.ad-target","messages":{},"features":{"sentryio_js":false,"hydrate_while_loading":false,"dummy_cache_on_client":false,"react_tracking_impressions":true},"css":["/components/dist/@ta/cpm.xxz0ph0l5.72793c8b7e.css"],"js":["/components/dist/@ta/cpm.xxz0ph0l5.079414de55.js","/components/dist/vendor-react-libs.ecf6ebce78.js","/components/dist/lithium-platform.0fa9ff21e4.js","/components/dist/@ta/events.window-resize.3afb66deca.js","/components/dist/vendor-babel.a094aec3c7.js","/components/dist/vendor-urql.7baca97904.js","/components/dist/ta-platform.fd6429a95e.js","/components/dist/vendor-apollo-libs.11d1e57db6.js","/components/dist/vendor-common.86aa9d67a6.js","/components/dist/vendor-redux-libs.7da53d34a0.js","/components/dist/@ta/platform.sentry.375bd855d4.js","/components/dist/@ta/lithium.portals.e31d027e0b.js","/components/dist/tslib.0824b5dc96.js"]}'; exit;
        } else {
            echo '{"dependencies":null}';
            exit;
        }

    }
    public static function recommendations($homeid)
    {
        header('Content-Type: application/json');
        echo '{}'; exit;
    }
}
