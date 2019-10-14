<?php $css_request = (($request->method == 'POST') ? '/css2/build/concat/status_page_custom.css' : '/css2/build/concat/booking_page_custom.css');?>

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
    <link rel="stylesheet" type='text/css' href="https:////cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel='stylesheet' type='text/css' href='<?=assets($css_request, $home->app->cdn)?>'/>
    <link rel="stylesheet" type='text/css' href="<?=assets('/css/custom-new.css', $home->app->cdn)?>">
</head>

