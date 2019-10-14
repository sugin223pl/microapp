<div class="header">
    <div class="masthead">
        <div id="taplc_global_nav_0" class="ppr_rup ppr_priv_global_nav" data-placement-name="global_nav">
            <div class="global-nav has-links" data-non-components>
                <div class="global-nav-top">
                    <div class="global-nav-bar global-nav-green global-nav-2018">
                        <div class="ui_container global-nav-bar-container global-nav-mobile-web-rollout first-view persistent-icons global-nav-2018">
                            <div class="global-nav-hamburger global-nav-icons show-left is-hidden-tablet global-nav-2018">
                                <?php if($islogged === true):?>
                                <a class="trips-icon labeled-trips-icon" href="<?=$home->url . '/MyInbox'?>">
                                    <span class="ui_icon suitcase"></span>
                                </a>
                                <?php else: ?>
                                <a class="trips-icon labeled-trips-icon" href="<?=$home->url . '/LoginController'?>">
                                    <span class="ui_icon suitcase"></span>
                                </a>
                                <?php endif; ?>
                            </div>
                            <a href="<?=$home->slug?>" class="global-nav-logo-2018" data-ahref="L5iaVWyUAKdod"><img src="<?=assets('img2/branding/rebrand/TA_logo_secondary.svg', $home->app->cdn)?>" alt=TripAdvisor class="global-nav-img global-nav-svg" /></a>
                            <?php if($islogged) {  View::include('tripadvisor/includes/brand-header'); } else { ?>
                            <div class="global-nav-actions-2018 global-nav-icons show-right">
                                <div id="taplc_global_nav_action_trips_0" class="ppr_rup ppr_priv_global_nav_action_trips is-shown-at-tablet" data-placement-name="global_nav_action_trips">
                                    <div data-nav-2018-enabled="true" title="Trips">
                                        <div class="react-container component-widget " id='component_9' data-component-props='page-manifest' data-component='@ta/trips.trip-link'>
                                            <a class="trips-icon labeled-trips-icon" href="<?=$home->url . '/LoginController'?>">
                                                <span class="trips-icon-tablet ui_icon suitcase"> 
                                                    <span class="my-trips-label">
                                                        Trips
                                                    </span>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div id="taplc_masthead_search_0 " class="ppr_rup ppr_priv_masthead_search " data-placement-name="masthead_search ">
                                    <div class="masthead-search-button-responsive " title="Search ">
                                        <div class="masthead-search-button ">
                                            <span class="ui_icon search "></span>
                                            <span class="masthead-search-button-label ">Search</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="global-nav-links global-nav-bottom global-nav-white ui_tabs is-hidden-mobile ">
                        <div class="ui_container ui_columns is-gapless ">
                            <div class="links_container ui_column is-11 ">
                                <div id="taplc_global_nav_links_0 " class="ppr_rup ppr_priv_global_nav_links " data-placement-name="global_nav_links ">
                                    <div class="global-nav-links-container ">
                                        <ul class="global-nav-links-menu ">
                                            <li class="nav-sub-item " data-element=".masthead-dropdown-vr"><a class="global-nav-link global-nav-link-2018 ui_tab active " data-tracking-label="vr"><span class="ui_icon vacation-rentals "></span>Vacation Rentals </a></li>
                                            <li class="nav-sub-item " data-element=".masthead-dropdown-shopping "><a class="global-nav-link global-nav-link-2018 ui_tab " data-tracking-label="shopping "><span class="ui_icon shopping-bag-fill "></span>Shopping </a></li>
                                            <li class="nav-sub-item " data-element=".masthead-dropdown-vp "><a class="global-nav-link global-nav-link-2018 ui_tab " data-tracking-label="vp "><span class="ui_icon on-the-beach "></span>Vacation Packages </a></li>
                                            <li class="nav-sub-item " data-element=".masthead-dropdown-cruises "><a class="global-nav-link global-nav-link-2018 ui_tab " data-tracking-label="cruises "><span class="ui_icon cruises "></span>Cruises<span class='new-label'>NEW</span> </a></li>
                                            <li class="nav-sub-item " data-element=".masthead-dropdown-cars "><a class="global-nav-link global-nav-link-2018 ui_tab " data-tracking-label="cars "><span class="ui_icon parking "></span>Rental Cars </a></li>
                                            <li class="nav-sub-item " data-element=".masthead-dropdown-hotels "><a class="global-nav-link global-nav-link-2018 ui_tab " data-tracking-label="hotels "><span class="ui_icon hotels "></span>Hotels </a></li>
                                            <li class="nav-sub-item " data-element=".masthead-dropdown-attractions "><a class="global-nav-link global-nav-link-2018 ui_tab " data-tracking-label="attractions "><span class="ui_icon attractions "></span>Things to do </a></li>
                                            <li class="nav-sub-item " data-element=".masthead-dropdown-restaurants "><a class="global-nav-link global-nav-link-2018 ui_tab " data-tracking-label="restaurants "><span class="ui_icon restaurants "></span>Restaurants </a></li>
                                            <li class="nav-sub-item " data-element=".masthead-dropdown-flights "><a class="global-nav-link global-nav-link-2018 ui_tab " data-tracking-label="flights "><span class="ui_icon flights "></span>Flights </a></li>
                                            <li class="nav-sub-item force-more " data-element=".masthead-dropdown-Forums "><a class=" global-nav-link global-nav-link-2018 ui_tab " data-tracking-label="Forums "><span class="ui_icon forums "></span>Travel Forum </a></li>
                                            <li class="nav-sub-item force-more " data-element=".masthead-dropdown-no_id "><a class=" global-nav-link global-nav-link-2018 ui_tab " data-tracking-label="Airlines "><span class="ui_icon flights "></span>Airlines </a></li>
                                            <li class="nav-sub-item force-more " data-element=".masthead-dropdown-no_id "><a class=" global-nav-link global-nav-link-2018 ui_tab " data-tracking-label="TravelGuide "><span class="ui_icon guides "></span>Travel Guides </a></li>
                                            <li class="nav-sub-item force-more " data-element=".masthead-dropdown-no_id "><a class=" global-nav-link global-nav-link-2018 ui_tab " data-tracking-label="TravelersChoice "><span class="ui_icon travelers-choice-badge "></span>Best of 2019 </a></li>
                                            <li class="nav-sub-item force-more " data-element=".masthead-dropdown-no_id "><a class=" global-nav-link global-nav-link-2018 ui_tab " data-tracking-label="RoadTrips ">Road Trips </a></li>
                                            <li class="nav-sub-item force-more " data-element=".masthead-dropdown-HelpDesk "><a class=" global-nav-link global-nav-link-2018 ui_tab " data-tracking-label="HelpDesk "><span class="ui_icon question-circle "></span>Help Center </a></li>
                                        </ul>
                                        <ul class="global-nav-links-menu-ellipsis is-top-only ">
                                            <li class="global-nav-links-ellipsis ">
                                                <span class="global-nav-link global-nav-link-2018 ui_tab ellipsis ">
                                                    <span class="ui_icon more-horizontal "></span>
                                                </span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="message_container ui_column is-1 "></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="global-nav-no-refresh " id="global-nav-no-refresh-2 ">
                <div id="taplc_global_nav_onpage_assets_0 " class="ppr_rup ppr_priv_global_nav_onpage_assets is-shown-at-tablet " data-placement-name="global_nav_onpage_assets ">
                    <div class="inner ">
                        <div class="ui_container with_masthead ">
                            <h1 class="header heading fr ">Has Internet Access and Washer - Rental in <?=$home->location->city?></h1>
                            <DIV ID="taplc_trip_planner_breadcrumbs_0 " class="ppr_rup ppr_priv_trip_planner_breadcrumbs " data-placement-name="trip_planner_breadcrumbs ">
                                <ul class="breadcrumbs ">
                                    <li class="breadcrumb "><a class="link "><span>Vacation Rentals</span></a>&nbsp;<span class="ui_icon single-chevron-right "></span>&nbsp;</li>
                                    <li class="breadcrumb "><a class="link "><span><?=$home->location->city?></span></a></li>
                                </ul>
                                <script type="application/ld+json ">{}</script>
                            </DIV>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
