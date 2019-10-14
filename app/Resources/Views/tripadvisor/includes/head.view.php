<?php if($debug = getenv('APP_DEBUG')) { print_r($home); } ?>
<!DOCTYPE html>
<html lang="en" xmlns:og="http://opengraphprotocol.org/schema/">
<head>
    <meta name="csrf-token" content="<?=$home->csrf?>" session-id="<?=$home->session?>">
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <link rel="icon" id="favicon" href="<?=assets('/favicon.ico', $home->app->cdn)?>" type="image/x-icon" />
    <link rel="mask-icon" sizes="any" href="<?=assets('/img2/icons/ta_square.svg', $home->app->cdn)?>" color="#00a680" />
    <meta name="theme-color" content="#00a680" />
    <meta name="format-detection" content="telephone=no" />
    <title>TripAdvisor - <?= $home->name ?></title>
    <meta name="description" content="<?=$home->name?>" />
    <meta http-equiv="content-language" content="en" />
    <meta http-equiv="pragma" content="no-cache" />
    <meta http-equiv="cache-control" content="no-cache,must-revalidate" />
    <meta http-equiv="expires" content="0" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />
    <script type="application/ld+json"><?=$HeadJson?></script>

    <link rel="preload" href="<?=assets('/css2/webfonts/TripAdvisor/TripAdvisor_Regular.woff2?v004.001', $home->app->cdn)?>" as="font" type="font/woff2">
    <link rel="stylesheet" type="text/css" href="<?=assets('/css2/build/concat/vr_responsive_detail_page-v23635749761b.css', $home->app->cdn)?>" data-rup="vr_responsive_detail_page" />
    <link rel="stylesheet" type="text/css" href="<?=assets('/css2/build/concat/long_lived_global-v2423172628b.css', $home->app->cdn)?>" data-rup="long_lived_global" />
    <link rel='stylesheet' type='text/css' href='<?=assets('/components/dist/@ta/platform.runtime.e7e9ab5e5c.css', $home->app->cdn)?>' />
    <link rel='stylesheet' type='text/css' href='<?=assets('/components/dist/@ta/cpm.xxz0ph0l5.72793c8b7e.css', $home->app->cdn)?>' />
    <link rel='stylesheet' type='text/css' href='<?=assets('/components/dist/vr.rental-detail-page-nav.858c534195.css', $home->app->cdn)?>' />
    <link rel='stylesheet' type='text/css' href='<?=assets('/components/dist/vr.traveler-inputs-and-rap.4cb3ecaf70.css', $home->app->cdn)?>' />
    <link rel='stylesheet' type='text/css' href='<?=assets('/components/dist/@ta/vr.traveler-input-picker.056c834a73.css', $home->app->cdn)?>' />
    <link rel='stylesheet' type='text/css' href='<?=assets('/components/dist/@ta/vr.rap.04071e4b6f.css', $home->app->cdn)?>' />
    <link rel='stylesheet' type='text/css' href='<?=assets('/components/dist/@ta/vr.inquiry.5d04491238.css', $home->app->cdn)?>' />
    <link rel='stylesheet' type='text/css' href='<?=assets('/components/dist/@ta/vr.common.7761082e79.css', $home->app->cdn)?>' />
    <link rel='stylesheet' type='text/css' href='<?=assets('/components/dist/ta-common.42d7646dbf.css', $home->app->cdn)?>' />
    <link rel='stylesheet' type='text/css' href='<?=assets('/components/dist/@ta/vr.datepicker.69ab8c1bd0.css', $home->app->cdn)?>' />
    <link rel='stylesheet' type='text/css' href='<?=assets('/components/dist/@ta/overlays.popover.f4f0f4c3d8.css', $home->app->cdn)?>' />
    <link rel='stylesheet' type='text/css' href='<?=assets('/components/dist/@ta/overlays.tooltip.ab25a47a55.css', $home->app->cdn)?>' />
    <link rel='stylesheet' type='text/css' href='<?=assets('/components/dist/@ta/input.text-input.b3914399a1.css', $home->app->cdn)?>' />
    <link rel='stylesheet' type='text/css' href='<?=assets('/components/dist/@ta/input.text-area.e464ebbac9.css', $home->app->cdn)?>' />
    <link rel='stylesheet' type='text/css' href='<?=assets('/components/dist/@ta/overlays.modal.8dd802c577.css', $home->app->cdn)?>' />
    <link rel='stylesheet' type='text/css' href='<?=assets('/components/dist/@ta/common.image-preloader.73e546018d.css', $home->app->cdn)?>' />
    <link rel='stylesheet' type='text/css' href='<?=assets('/components/dist/@ta/input.drop-zone.a2a1035b2d.css', $home->app->cdn)?>' />
    <link rel='stylesheet' type='text/css' href='<?=assets('/components/dist/@ta/overlays.pieces.db26ad7f64.css', $home->app->cdn)?>' />
    <link rel='stylesheet' type='text/css' href='<?=assets('/components/dist/@ta/overlays.fullscreen-overlay.f7198570e4.css', $home->app->cdn)?>' />
    <link rel='stylesheet' type='text/css' href='<?=assets('/components/dist/vr.rental-detail-page-part-2.a2d99be083.css', $home->app->cdn)?>' />
    <link rel='stylesheet' type='text/css' href='<?=assets('/components/dist/@ta/vr.map.4cc6fddfcb.css', $home->app->cdn)?>' />
    <link rel='stylesheet' type='text/css' href='<?=assets('/components/dist/@ta/vr.rental-availability.7a235477f8.css', $home->app->cdn)?>' />
    <link rel='stylesheet' type='text/css' href='<?=assets('/components/dist/@ta/vr.rates-section.27ca676139.css', $home->app->cdn)?>' />
    <link rel='stylesheet' type='text/css' href='<?=assets('/components/dist/@ta/vr.recommendations.cf6acb775c.css', $home->app->cdn)?>' />
    <link rel='stylesheet' type='text/css' href='<?=assets('/components/dist/@ta/vr.owner-solicitation.a7ed3046cc.css', $home->app->cdn)?>' />
    <link rel='stylesheet' type='text/css' href='<?=assets('/components/dist/@ta/vr.more-destinations.7842931fb3.css', $home->app->cdn)?>' />
    <link rel='stylesheet' type='text/css' href='<?=assets('/components/dist/@ta/vr.payment-protection.985f315e3e.css', $home->app->cdn)?>' />
    <link rel='stylesheet' type='text/css' href='<?=assets('/components/dist/@ta/vr.listing-number.8d2cacc0e7.css', $home->app->cdn)?>' />
    <link rel='stylesheet' type='text/css' href='<?=assets('/components/dist/@ta/vr.rental-detail-faqs.c5a91a0f4a.css', $home->app->cdn)?>' />
    <link rel='stylesheet' type='text/css' href='<?=assets('/components/dist/@ta/vr.amenities.b4464ca5e4.css', $home->app->cdn)?>' />
    <link rel='stylesheet' type='text/css' href='<?=assets('/components/dist/@ta/common.location-detail-tag-questions.ac4171774e.css', $home->app->cdn)?>' />
    <link rel='stylesheet' type='text/css' href='<?=assets('/components/dist/@ta/public.maps.ab6f94552b.css', $home->app->cdn)?>' />
    <link rel='stylesheet' type='text/css' href='<?=assets('/components/dist/@ta/maps.zoom-control.0ced2a792f.css', $home->app->cdn)?>' />
    <link rel='stylesheet' type='text/css' href='<?=assets('/components/dist/vr.rental-detail-page-overview-and-amenities.febca25973.css', $home->app->cdn)?>' />
    <link rel='stylesheet' type='text/css' href='<?=assets('/components/dist/@ta/vr.overview.2a91fe795a.css', $home->app->cdn)?>' />
    <link rel='stylesheet' type='text/css' href='<?=assets('/components/dist/@ta/vr.rental-detail-owner.3c4cf1060b.css', $home->app->cdn)?>' />
    <link rel='stylesheet' type='text/css' href='<?=assets('/components/dist/@ta/common.obfuscated-link.cc1aa7bc5f.css', $home->app->cdn)?>' />
    <link rel='stylesheet' type='text/css' href='<?=assets('/components/dist/vr.rental-detail-header.183974e510.css', $home->app->cdn)?>' />
    <link rel='stylesheet' type='text/css' href='<?=assets('/components/dist/@ta/common.breadcrumbs.9c5630b8b5.css', $home->app->cdn)?>' />
    <link rel='stylesheet' type='text/css' href='<?=assets('/components/dist/@ta/trips.trip-flow-selector.6c6c5464e7.css', $home->app->cdn)?>' />
    <link rel='stylesheet' type='text/css' href='<?=assets('/components/dist/@ta/trips.bookmark-icon.6d4fc49405.css', $home->app->cdn)?>' />
    <link rel='stylesheet' type='text/css' href='<?=assets('/components/dist/@ta/overlays.toast.4b38096c40.css', $home->app->cdn)?>' />
    <link rel='stylesheet' type='text/css' href='<?=assets('/components/dist/@ta/common.webview.dd67304f49.css', $home->app->cdn)?>' />
    <link rel='stylesheet' type='text/css' href='<?=assets('/components/dist/@ta/social.login-gate.0a4ee33178.css', $home->app->cdn)?>' />
    <link rel='stylesheet' type='text/css' href='<?=assets('/components/dist/@ta/trips.trip-toasts.f0791aca9b.css', $home->app->cdn)?>' />
    <link rel='stylesheet' type='text/css' href='<?=assets('/components/dist/@ta/overlays.headers.fa61a38e76.css', $home->app->cdn)?>' />
    <link rel='stylesheet' type='text/css' href='<?=assets('/components/dist/@ta/common.text.b0319d92e6.css', $home->app->cdn)?>' />
    <link rel='stylesheet' type='text/css' href='<?=assets('/components/dist/@ta/social.failover.85c4b5ee9b.css', $home->app->cdn)?>' />
    <link rel='stylesheet' type='text/css' href='<?=assets('/components/dist/vr.rental-detail-page-photos.fa1ba5e942.css', $home->app->cdn)?>' />
    <link rel='stylesheet' type='text/css' href='<?=assets('/components/dist/@ta/vr.react-carousel.a2c0bf97e9.css', $home->app->cdn)?>' />
    <link rel='stylesheet' type='text/css' href='<?=assets('/components/dist/@ta/media.media-carousel.6bb2c8de7e.css', $home->app->cdn)?>' />
    <link rel='stylesheet' type='text/css' href='<?=assets('/components/dist/@ta/vr.badging.e8b2fc83d2.css', $home->app->cdn)?>' />
    <link rel='stylesheet' type='text/css' href='<?=assets('/components/dist/@ta/social.onboarding-controller.92ec88f576.css', $home->app->cdn)?>' />
    <link rel='stylesheet' type='text/css' href='<?=assets('/components/dist/@ta/trips.states.f7ac3bac87.css', $home->app->cdn)?>' />
    <link rel='stylesheet' type='text/css' href='<?=assets('/components/dist/@ta/brand.global-nav-action-content-collect.d8aebed5a0.css', $home->app->cdn)?>' />
    <link rel='stylesheet' type='text/css' href='<?=assets('/components/dist/@ta/public.listing.edbca097d3.css', $home->app->cdn)?>' />
    <link rel='stylesheet' type='text/css' href='<?=assets('/components/dist/@ta/memx.google-onetap.6b7ce32f25.css', $home->app->cdn)?>' />
    <link rel='stylesheet' type='text/css' href='<?=assets('/components/dist/@ta/memx.ta-twotap.59c05af42a.css', $home->app->cdn)?>' />
    <link rel='stylesheet' type='text/css' href='<?=assets('/components/dist/@ta/memx.facebook-onetap.1241d2f738.css', $home->app->cdn)?>' />
    <link rel='stylesheet' type='text/css' href='<?=assets('/components/dist/@ta/memx.app-download-dialog.6b850ca3f6.css', $home->app->cdn)?>' />
    <link rel='stylesheet' type='text/css' href='<?=assets('/components/dist/@ta/memx.download-app-button.d303f48907.css', $home->app->cdn)?>' />
    <link rel='stylesheet' type='text/css' href='<?=assets('/components/dist/@ta/memx.open-in-app-button.bf74a09c19.css', $home->app->cdn)?>' />
    <link rel='stylesheet' type='text/css' href='<?=assets('/components/dist/@ta/brand.mobile-global-nav-content-collect.e91c027566.css', $home->app->cdn)?>' />
    
    <script> 
        var csrf_token = '<?=$home->csrf?>';
        var app_url = '<?=$home->url?>';
        var asset_path = '<?=url('tripadvisor')?>';
        var asset_path2 = '<?=assets('', $home->app->cdn)?>';
        var ppbr = '<?=assets('img2/vacationrentals/ftl/payment_protection_badge_rebrand.svg', $home->app->cdn)?>';
    </script>
    <link rel='stylesheet' type='text/css' href='<?=assets('/css/custom.css', $home->app->cdn)?>' />
</head>
<body class="rebrand_2017 desktop_web VacationRentalReview  js_logging" id="BODY_BLOCK_JQUERY_REFLOW">
