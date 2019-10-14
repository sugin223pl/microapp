    <div id="taplc_global_nav_geopill_vr_responsive_0" class="ppr_rup ppr_priv_global_nav_geopill is-shown-at-tablet" data-placement-name="global_nav_geopill:vr_responsive">
        <div class="global-nav-geopill global-nav-geopill-2018" style="background-color: inherit; padding: 0 6px 0 6px; padding-top: 2px;">
            <span class="ui_pill inverted">
                <?=$user->name?>
            </span>
        </div>
        <div class="global-nav-geopill global-nav-geopill-2018" style="background-color: inherit; padding: 0 6px 0 6px; padding-top: 2px;">
            <span class="hidden"><?=$home->url . '/logout'?></span>
            <a href="<?=$home->url . '/logout'?>" class="ui_pill inverted" style="color:inherit; font-weight: 400; text-decoration: none;">
                Log out
            </a>
        </div>
    </div>
    <div class="global-nav-actions-2018 global-nav-icons show-right">
        <div id="taplc_global_nav_action_trips_0" class="ppr_rup ppr_priv_global_nav_action_trips is-shown-at-tablet" data-placement-name="global_nav_action_trips">
            <div data-nav-2018-enabled="true" title="Trips">
                <div class="react-container component-widget " id='component_9' data-component-props='page-manifest' data-component='@ta/trips.trip-link'>
                    <a class="trips-icon labeled-trips-icon" href="<?=$home->url . '/MyInbox'?>">
                        <span class="trips-icon-tablet ui_icon suitcase"> 
                            <span class="my-trips-label">
                                Trips
                            </span>
                        </span>
                    </a>
                </div>
            </div>
        </div>

        <div id="taplc_global_nav_action_profile_0" class="ppr_rup ppr_priv_global_nav_action_profile is-shown-at-tablet" data-placement-name="global_nav_action_profile">
            <div class="global-nav-profile global-nav-utility">
                <div class="global-nav-utility-activator global-nav-utility-activator-2018" title="Profile">
                    <span class="ui_avatar labeled-profile-icon small">
                        <img src="<?=$user->avatar?>" alt="<?=$user->name?>">
                    </span>
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